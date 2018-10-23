<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Delivery extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'pay/deliveryInfo', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_prod_type = null;
    private $_tab = null;
    private $_delivery_pay_status_ccd = array();
    private $_list_add_join = array('delivery_address', 'delivery_info');

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
        $arr_pay_status_ccd = array_filter_keys($this->codeModel->getCcd($this->_group_ccd['PayStatus']), $this->_delivery_pay_status_ccd);

        $this->load->view('pay/order/delivery/index_' . $this->_tab, [
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
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
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
                'P.ProdTypeCcd' => $this->orderListModel->_prod_type_ccd['book'],
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd')
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes()   //사이트 권한 추가
            ],
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                    'ODA.Receiver' => $this->_reqP('search_member_value')
                ]
            ],
            'ORG2' => [
                'LKR' => [
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'OPD.InvoiceNo' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],
        ];

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
                    $arr_condition['RAW']['OPD.DeliveryStatusCcd is '] = 'null';
                break;
        }

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'vbank' :
                $arr_condition['EQ'] = ['O.PayMethodCcd' => $this->orderListModel->_pay_method_ccd['vbank']];
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 교재배송관리 조회 order by 배열 리턴
     * @return array
     */
    private function _getListOrderBy()
    {
        return ['O.OrderIdx' => 'desc', 'OP.OrderProdIdx' => 'asc'];
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
            default :
                show_error('잘못된 접근 입니다.');
                break;
        }

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('교재배송관리(' . $file_name . ')리스트', $list, $headers);
    }

    /**
     * 송장엑셀파일 샘플 다운로드
     */
    public function sampleDownload()
    {
        $this->load->helper('download');
        $file_path = PUBLICURL . 'uploads/' . config_item('upload_prefix_dir') . '/_sample_download/sample_invoice.xlsx';
        public_download($file_path);
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
            $idx_column = 'OrderIdx';
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
}
