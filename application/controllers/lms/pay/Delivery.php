<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Delivery extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'pay/deliveryInfo', 'member/manageMember', 'service/point', 'sys/code', 'crm/send/sms');
    protected $helpers = array();
    private $_prod_type = null;
    private $_tab = null;
    private $_delivery_pay_status_ccd = array();
    private $_list_add_join = array('delivery_address', 'delivery_info_all');

    public function __construct()
    {
        parent::__construct();

        $this->_prod_type = get_var($this->uri->rsegment(3), 'book');
        $this->_tab = get_var($this->uri->rsegment(4), 'invoice');      // tab (invoice, prepare, complete, cancel)

        // 교재배송관리용 결제상태 공통코드
        $this->_delivery_pay_status_ccd = array_values(array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund']));
        
        // 추가 조인 테이블
        if (in_array($this->_tab, ['prepare', 'cancel']) === true) {
            $this->_list_add_join[] = 'refund';
        }
    }

    /**
     * 교재배송관리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['ProdType', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        $arr_prod_type_ccd = array_filter_keys($codes[$this->_group_ccd['ProdType']], array_filter_keys($this->orderListModel->_prod_type_ccd, ['book', 'freebie']));
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], $this->_delivery_pay_status_ccd);

        $this->load->view('pay/delivery/index_' . $this->_tab, [
            'arr_prod_type_ccd' => $arr_prod_type_ccd,
            'arr_pay_status_ccd' => $arr_pay_status_ccd
        ]);
    }

    /**
     * 교재배송관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $order_cnt = 0;
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);

            // 주문식별자 기준 조회건수 조회
            $order_cnt = array_get($this->orderListModel->listAllOrder('count(distinct O.OrderIdx) as tOrderCnt', $arr_condition, null, null, [], $this->_list_add_join, false), '0.tOrderCnt', 0);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'order_cnt' => $order_cnt
        ]);
    }

    /**
     * 교재배송관리 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd')
            ],
            'IN' => [
                'P.ProdTypeCcd' => [$this->orderListModel->_prod_type_ccd['book'], $this->orderListModel->_prod_type_ccd['freebie']],
                'O.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
            ],
            'RAW' => [
                'OPD.OrderProdDeliveryIdx is ' => 'not null'    // 주문배송정보가 있는 경우만
            ],
            /*'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                    'ODA.Receiver' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'O.OrderIdx' => $this->_reqP('search_prod_value'),
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'P.ProdCode' => $this->_reqP('search_prod_value'),
                    'OPD.InvoiceNo' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],*/
        ];

        // 회원 검색
        $arr_mem_condition = $this->_getListMemConditions($this->_reqP('search_member_keyword'), $this->_reqP('search_member_value'));

        // 상품 검색
        $arr_prod_condition = $this->_getListProdConditions($this->_reqP('search_prod_keyword'), $this->_reqP('search_prod_value'));

        // 조건 병합
        $arr_condition = array_replace_recursive($arr_condition, $arr_mem_condition, $arr_prod_condition);

        // 배송료 조건
        switch ($this->_reqP('search_delivery_price_type')) {
            case 'normal' :
                    $arr_condition['GT']['O.DeliveryPrice'] = 0;
                break;
            case 'add' :
                    $arr_condition['GT']['O.DeliveryAddPrice'] = 0;
                break;
        }

        // 탭별 조회 조건
        switch ($this->_tab) {
            case 'invoice' :
                $arr_condition['EQ']['OP.PayStatusCcd'] = $this->orderListModel->_pay_status_ccd['paid'];
                $arr_condition['ORG0']['EQ']['OPD.DeliveryStatusCcd'] = $this->orderListModel->_delivery_status_ccd['invoice'];
                $arr_condition['ORG0']['RAW']['OPD.DeliveryStatusCcd is '] = 'null';
                break;
            case 'prepare' :
                $arr_condition['IN']['OP.PayStatusCcd'] = $this->_delivery_pay_status_ccd;
                $arr_condition['EQ']['OPD.DeliveryStatusCcd'] = $this->orderListModel->_delivery_status_ccd['prepare'];
                break;
            case 'complete' :
                $arr_condition['EQ']['OP.PayStatusCcd'] = $this->orderListModel->_pay_status_ccd['paid'];
                $arr_condition['EQ']['OPD.DeliveryStatusCcd'] = $this->orderListModel->_delivery_status_ccd['complete'];
                break;
            case 'cancel' :
                $arr_condition['EQ']['OP.PayStatusCcd'] = $this->orderListModel->_pay_status_ccd['refund'];
                $arr_condition['EQ']['OPD.DeliveryStatusCcd'] = $this->orderListModel->_delivery_status_ccd['cancel'];
                break;
        }

        // 날짜 검색
        $search_start_hour = get_var($this->_reqP('search_start_hour'), '00');
        $search_end_hour = get_var($this->_reqP('search_end_hour'), '23');
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01')) . ' ' . $search_start_hour . ':00:00';
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t')) . ' ' . $search_end_hour . ':59:59';

        switch ($this->_reqP('search_date_type')) {
            case 'invoice' :
                $arr_condition['BET'] = ['OPD.InvoiceRegDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'complete' :
                $arr_condition['BET'] = ['OPD.DeliverySendDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'cancel' :
                $arr_condition['BET'] = ['OPD.StatusUpdDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'refund' :
                $arr_condition['BET'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BET'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 교재배송관리 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = [];
        $column = '';
        $file_name = '';

        switch ($this->_tab) {
            case 'invoice' :
                $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제완료일', '상품명', '결제금액', '배송료', '추가배송료', '수령인명', '수령인휴대폰번호', '배송지우편번호', '배송지주소', '배송지상세주소'];
                $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, CompleteDatm, ProdName, RealPayPrice, tDeliveryPrice, tDeliveryAddPrice, Receiver, ReceiverPhone, ZipCode, Addr1, Addr2';
                $file_name = '송장등록';
                break;
            case 'prepare' :
                $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제완료일', '상품명', '결제금액', '배송료', '추가배송료', '결제상태', '환불완료일'
                    , '수령인명', '수령인휴대폰번호', '배송지우편번호', '배송지주소', '배송지상세주소', '송장번호', '송장번호등록자', '송장번호등록일', '송장번호수정자', '송장번호수정일'];
                $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, CompleteDatm, ProdName, RealPayPrice, tDeliveryPrice, tDeliveryAddPrice, PayStatusCcdName, "" as RefundDatm
                    , Receiver, ReceiverPhone, ZipCode, Addr1, Addr2, InvoiceNo, InvoiceRegAdminName, InvoiceRegDatm, InvoiceUpdAdminName, InvoiceUpdDatm';
                $file_name = '발송준비';
                break;
            case 'complete' :
                $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제완료일', '상품명', '결제금액', '배송료', '추가배송료', '수령인명', '수령인휴대폰번호'
                    , '배송지우편번호', '배송지주소', '배송지상세주소', '송장번호', '송장번호등록자', '송장번호등록일', '송장번호수정자', '송장번호수정일', '발송완료승인자', '발송완료승인일'];
                $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, CompleteDatm, ProdName, RealPayPrice, tDeliveryPrice, tDeliveryAddPrice, Receiver, ReceiverPhone
                    , ZipCode, Addr1, Addr2, InvoiceNo, InvoiceRegAdminName, InvoiceRegDatm, InvoiceUpdAdminName, InvoiceUpdDatm, DeliverySendAdminName, DeliverySendDatm';
                $file_name = '발송완료';
                break;
            case 'cancel' :
                $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제완료일', '상품명', '결제금액', '배송료', '추가배송료', '결제상태', '환불완료일'
                    , '수령인명', '수령인휴대폰번호', '배송지우편번호', '배송지주소', '배송지상세주소', '송장번호', '송장번호등록자', '송장번호등록일', '송장번호수정자', '송장번호수정일', '발송전취소자', '발송전취소일'];
                $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, CompleteDatm, ProdName, RealPayPrice, tDeliveryPrice, tDeliveryAddPrice, PayStatusCcdName, "" as RefundDatm
                    , Receiver, ReceiverPhone, ZipCode, Addr1, Addr2, InvoiceNo, InvoiceRegAdminName, InvoiceRegDatm, InvoiceUpdAdminName, InvoiceUpdDatm, StatusUpdAdminName, StatusUpdDatm';
                $file_name = '발송전취소';
                break;
            default :
                show_error('잘못된 접근 입니다.');
                break;
        }

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
        $last_query = $this->orderListModel->getLastQuery();

        // export excel
        $this->_makeExcel('교재배송_' . $file_name . '리스트', $list, $headers, true, $last_query);
    }

    /**
     * 송장엑셀파일 샘플 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = STORAGEPATH . 'resources/sample/sample_invoice.xlsx';
        force_download($file_path, null);
    }

    /**
     * 송장번호 등록/수정
     */
    public function redata()
    {
        $data_src = get_var($this->_reqP('data_src'), 'form');
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'data_src', 'label' => '데이터소스', 'rules' => 'trim|required|in_list[form,excel]']
        ];
        
        if ($data_src == 'form') {
            $rules = array_merge_recursive($rules, [
                ['field' => 'params', 'label' => '송장번호', 'rules' => 'trim|required']
            ]);
        } else {
            $rules = array_merge_recursive($rules, [
                ['field' => 'attach_invoice_file', 'label' => '송장엑셀파일', 'rules' => 'callback_validateFileRequired[attach_invoice_file]']
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $is_regist = $this->_reqP('_method') == 'POST' ? true : false;
        if ($data_src == 'form') {
            $idx_column = $is_regist === true ? 'OrderIdx' : 'OrderProdIdx';
            $params = json_decode($this->_reqP('params'), true);
        } else {
            $idx_column = 'OrderNo';
            $params = $this->_getInvoiceExcelData();

            if ($params === false) {
                return $this->json_error('송장엑셀파일 읽기에 실패했습니다.');
            }
        }

        $result = $this->deliveryInfoModel->modifyInvoiceNo($is_regist, $idx_column, $params);

        return $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 업로드된 송장엑셀파일 변환 (주문번호 => 송장번호)
     * @return array|bool
     */
    private function _getInvoiceExcelData()
    {
        try {
            $this->load->library('excel');
            $data = $this->excel->readExcel($_FILES['attach_invoice_file']['tmp_name']);
            $data = array_pluck($data, 'B', 'A');
        } catch (\Exception $e) {
            return false;
        }

        return $data;
    }

    /**
     * 발송전취소, 발송완료승인 상태 업데이트
     */
    public function restatus()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'status', 'label' => '변경배송상태', 'rules' => 'trim|required|in_list[complete,cancel]'],
            ['field' => 'params', 'label' => '주문상품식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->deliveryInfoModel->modifyDeliveryStatus($this->_reqP('status'), json_decode($this->_reqP('params'), true));

        $this->json_result($result, '배송상태가 변경 되었습니다.', $result);
    }

    /**
     * 송장번호 초기화
     */
    public function init()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'status', 'label' => '변경배송상태', 'rules' => 'trim|required|in_list[init]'],
            ['field' => 'params', 'label' => '주문상품식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->deliveryInfoModel->modifyDeliveryInit(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '송장번호가 초기화되었습니다.', $result);
    }

    /**
     * 프린트 폼
     * @return mixed
     */
    public function print()
    {
        $data = [];
        $params = json_decode($this->_req('params'), true);
        $delivery_status = $this->_req('status');

        if (empty($params) === true || empty($delivery_status) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 기본 조건
        $arr_condition = [
            'EQ' => [
                'OP.PayStatusCcd' => $this->orderListModel->_pay_status_ccd['paid']
            ],
            'IN' => [
                'O.OrderIdx' => array_values($params),
                'P.ProdTypeCcd' => [$this->orderListModel->_prod_type_ccd['book'], $this->orderListModel->_prod_type_ccd['freebie']]
            ]
        ];

        if ($delivery_status == 'invoice') {
            $arr_condition['RAW']['OPD.DeliveryStatusCcd is '] = 'null';
        } else {
            $arr_condition['EQ']['OPD.DeliveryStatusCcd'] = $this->orderListModel->_delivery_status_ccd['complete'];
        }

        // 주문정보 조회 (회원정보 추가)
        $order_rows = $this->orderListModel->listAllOrder(false, $arr_condition, null, null, [], array_merge($this->_list_add_join, ['member_info']));

        if (empty($order_rows) === false) {
            $tmp_order_idx = 0;
            foreach ($order_rows as $idx => $order_row) {
                if ($tmp_order_idx != $order_row['OrderIdx']) {
                    $data[$order_row['OrderIdx']]['order'] = $order_row;
                }
                $data[$order_row['OrderIdx']]['order_prod'][] = $order_row;

                $tmp_order_idx = $order_row['OrderIdx'];
            }
        }

        return $this->load->view('pay/delivery/print', [
            'data' => $data
        ]);        
    }

    /**
     * 배송지주소 수정 폼
     * @param array $params
     * @return mixed
     */
    public function editAddr($params = [])
    {
        $order_idx = element('0', $params);
        if (empty($order_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 주문상품, 배송지 정보 조회
        $order_rows = $this->orderListModel->listAllOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, [], ['delivery_address']);
        if (empty($order_rows) === true) {
            return $this->json_error('주문정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        return $this->load->view('pay/delivery/edit_addr', [
            'order_idx' => $order_idx,
            'data' => [
                'order' => element('0', $order_rows),
                'order_prod' => $order_rows,
                'order_cnt' => count($order_rows)
            ]
        ]);
    }

    /**
     * 배송지주소 수정
     */
    public function modifyAddr()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver', 'label' => '받는사람이름', 'rules' => 'trim|required'],
            ['field' => 'zipcode', 'label' => '우편번호', 'rules' => 'trim|required|integer'],
            ['field' => 'addr1', 'label' => '주소', 'rules' => 'trim|required'],
            ['field' => 'addr2', 'label' => '상세주소', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->orderModel->modifyOrderDeliveryAddress($this->_reqP(null, false));

        $this->json_result($result, '수정되었습니다.', $result);
    }

    /**
     * 모아시스 송장등록 주문조회
     */
    public function targetExcelNew()
    {
        // 송장등록 주문조회
        $search_start_date = $this->_reqP('search_start_date');
        $search_start_hour = $this->_reqP('search_start_hour');
        $search_end_date = $this->_reqP('search_end_date');
        $search_end_hour = $this->_reqP('search_end_hour');
        $search_site_code = $this->_reqP('search_site_code');

        if (empty($search_start_date) === true || empty($search_start_hour) === true || empty($search_end_date) === true || empty($search_end_hour) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $search_start_datm = $search_start_date . ' ' . $search_start_hour . ':00:00';
        $search_end_datm = $search_end_date . ' ' . $search_end_hour . ':59:59';

        $data = $this->deliveryInfoModel->getDeliveryTargetOrderData($search_start_datm, $search_end_datm, $search_site_code);
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }
        $last_query = $this->deliveryInfoModel->getLastQuery();

        // 주문 데이터 가공
        $results = [];

        foreach ($data as $idx => $row) {
            $results[$idx]['ShippingNo'] = $row['ShippingNo'];
            $results[$idx]['Receiver'] = $row['Receiver'];
            $results[$idx]['Addr'] = $row['ZipCode'] . ' ' . $row['Addr'];
            $results[$idx]['ReceiverPhone'] = $row['ReceiverPhone'];
            $results[$idx]['wBookName'] = $row['wBookName'];
            $results[$idx]['wIsbn'] = $row['wIsbn'];
            $results[$idx]['OutProdCode'] = '';
            $results[$idx]['OrderProdQty'] = (int) $row['OrderProdQty'];
            $results[$idx]['SupplyRate'] = 100;
            $results[$idx]['Present'] = '';
            $results[$idx]['DeliveryMemo'] = $row['DeliveryMemo'];
        }

        // export excel
        $headers = ['출고번호', '수취인명', '수취인주소', '수취인전화번호', '도서명', 'ISBN', '상품코드', '수량', '공급률', '증정', '비고(택배메시지)'];
        $this->_makeExcel('교재배송_배송요청', $results, $headers, true, $last_query);
    }

    /**
     * 모아시스 송장등록 주문조회 (이전버전)
     */
    public function targetExcel()
    {
        // 송장등록 주문조회
        $search_start_date = $this->_reqP('search_start_date');
        $search_start_hour = $this->_reqP('search_start_hour');
        $search_end_date = $this->_reqP('search_end_date');
        $search_end_hour = $this->_reqP('search_end_hour');
        $search_site_code = $this->_reqP('search_site_code');

        if (empty($search_start_date) === true || empty($search_start_hour) === true || empty($search_end_date) === true || empty($search_end_hour) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $search_start_datm = $search_start_date . ' ' . $search_start_hour . ':00:00';
        $search_end_datm = $search_end_date . ' ' . $search_end_hour . ':59:59';

        $data = $this->deliveryInfoModel->getDeliveryTargetOrderData($search_start_datm, $search_end_datm, $search_site_code);
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }
        $last_query = $this->deliveryInfoModel->getLastQuery();

        // 주문 데이터 가공 (동일주문건 배송지정보 1번째 주문상품건에만 표기)
        $prev_order_idx = null;
        $order_prod_seq = 1;
        $results = [];

        foreach ($data as $idx => $row) {
            if ($row['OrderIdx'] != $prev_order_idx) {
                $order_prod_seq = 1;

                $results[$idx]['OutDate'] = $row['OutDate'];
                $results[$idx]['Receiver'] = $row['Receiver'];
                $results[$idx]['ReceiverPhone'] = $row['ReceiverPhone'];
                $results[$idx]['OrderProdSeq'] = $order_prod_seq;
                $results[$idx]['wBookIdx'] = $row['wBookIdx'];
                $results[$idx]['wBookName'] = $row['wBookName'];
                $results[$idx]['OrderPrice'] = (int) $row['OrderPrice'];
                $results[$idx]['OrderProdQty'] = (int) $row['OrderProdQty'];
                $results[$idx]['SupplyRate'] = 100;
                $results[$idx]['RealPayPrice'] = (int) $row['RealPayPrice'];
                $results[$idx]['Type1'] = '위탁';
                $results[$idx]['Type2'] = '';
                $results[$idx]['SupplyLocation'] = '창고';
                $results[$idx]['ZipCode'] = $row['ZipCode'];
                $results[$idx]['Addr'] = $row['Addr'];
                $results[$idx]['DeliveryMemo'] = $row['DeliveryMemo'];
            } else {
                $results[$idx]['OutDate'] = '';
                $results[$idx]['Receiver'] = '';
                $results[$idx]['ReceiverPhone'] = '';
                $results[$idx]['OrderProdSeq'] = $order_prod_seq;
                $results[$idx]['wBookIdx'] = $row['wBookIdx'];
                $results[$idx]['wBookName'] = $row['wBookName'];
                $results[$idx]['OrderPrice'] = (int) $row['OrderPrice'];
                $results[$idx]['OrderProdQty'] = (int) $row['OrderProdQty'];
                $results[$idx]['SupplyRate'] = 100;
                $results[$idx]['RealPayPrice'] = (int) $row['RealPayPrice'];
                $results[$idx]['Type1'] = '';
                $results[$idx]['Type2'] = '';
                $results[$idx]['SupplyLocation'] = '';
                $results[$idx]['ZipCode'] = '';
                $results[$idx]['Addr'] = '';
                $results[$idx]['DeliveryMemo'] = '';
            }

            $prev_order_idx = $row['OrderIdx'];
            $order_prod_seq++;
        }

        // export excel
        $headers = ['출고일자', '이름', '연락처', '순번', '도서코드', '교재명', '정가', '출고부수', '공급율', '출고금액', '구분1', '구분2', '출고위치', '우편번호', '주소', '비고'];
        $this->_makeExcel('교재배송_모아시스', $results, $headers, true, $last_query);
    }

    /**
     * CNPlus 송장등록 주문조회
     */
    public function cnplusExcel()
    {
        // 송장등록 주문조회
        $search_start_date = $this->_reqP('search_start_date');
        $search_start_hour = $this->_reqP('search_start_hour');
        $search_end_date = $this->_reqP('search_end_date');
        $search_end_hour = $this->_reqP('search_end_hour');
        $search_site_code = $this->_reqP('search_site_code');

        if (empty($search_start_date) === true || empty($search_start_hour) === true || empty($search_end_date) === true || empty($search_end_hour) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        $search_start_datm = $search_start_date . ' ' . $search_start_hour . ':00:00';
        $search_end_datm = $search_end_date . ' ' . $search_end_hour . ':59:59';

        $data = $this->deliveryInfoModel->getDeliveryCNPlusOrderData($search_start_datm, $search_end_datm, $search_site_code);
        if (empty($data) === true) {
            show_alert('데이터가 없습니다.', 'back');
        }
        $last_query = $this->deliveryInfoModel->getLastQuery();

        // export excel
        $headers = ['수령인명', '전화번호', '핸드폰번호', '우편번호', '배송주소', '배송메시지', '도서코드', '출판사', 'ISBN', '정가', '판매가', '주문수량', '결제금액', '교재명', '주문번호'];
        $numerics = ['wOrgPrice', 'OrderPrice', 'RealPayPrice'];    // 숫자형 변환 대상 컬럼
        $this->_makeExcel('교재배송_CN플러스', $data, $headers, true, $last_query, $numerics);
    }
}
