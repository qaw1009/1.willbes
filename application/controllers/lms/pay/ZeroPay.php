<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class ZeroPay extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('delivery_info', 'refund', 'my_lecture');
    private $_tel1_ccd = '672';
    private $_phone1_ccd = '673';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 0원결제현황 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['ProdType', 'LearnPattern', 'PayStatus', 'DeliveryStatus', 'AdminReason']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        // 결제상태 공통코드에서 0원결제용 코드만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], array_filter_keys($this->orderListModel->_pay_status_ccd, ['paid', 'refund']));

        $this->load->view('pay/zero_pay/index', [
            'arr_prod_type_ccd' => $codes[$this->_group_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_group_ccd['LearnPattern']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_delivery_status_ccd' => $codes[$this->_group_ccd['DeliveryStatus']],
            'arr_admin_reason_ccd' => $codes[$this->_group_ccd['AdminReason']],
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 0원결제현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->orderListModel->listAllOrder(true, $arr_condition, null, null, [], $this->_list_add_join);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy(), $this->_list_add_join);

            $list = array_map(function ($row) {
                $arr_my_lec_data = json_decode($row['MyLecData'], true);
                $row['LecStartDate'] = $arr_my_lec_data[0]['LecStartDate'];
                $row['LecExpireDay'] = $arr_my_lec_data[0]['LecExpireDay'];
                $row['wUnitCnt'] = empty($arr_my_lec_data[0]['wUnitIdxs']) === false ? count(explode(',', $arr_my_lec_data[0]['wUnitIdxs'])) : '';

                return $row;
            }, $list);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 0원결제현황 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.PayRouteCcd' => $this->orderListModel->_pay_route_ccd['zero'],
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.AdminReasonCcd' => $this->_reqP('search_admin_reason_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'OPD.DeliveryStatusCcd' => $this->_reqP('search_delivery_status_ccd')
            ],
            'IN' => ['O.SiteCode' => get_auth_site_codes()],    //사이트 권한 추가
            'ORG1' => [
                'LKR' => [
                    'M.MemName' => $this->_reqP('search_member_value'),
                    'M.MemId' => $this->_reqP('search_member_value'),
                    'M.Phone3' => $this->_reqP('search_member_value'),
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'O.OrderIdx' => $this->_reqP('search_prod_value'),
                    'O.OrderNo' => $this->_reqP('search_prod_value'),
                    'P.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],
        ];

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'refund' :
                $arr_condition['BDT'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'delivery_send' :
                $arr_condition['BDT'] = ['OPD.DeliverySendDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 0원결제현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제완료일', '상품구분', '상품명', '회차수', '결제상태', '환불완료일', '환불완료자'
            , '수강시작일', '수강기간', '부여사유유형', '기타사유'];
        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, CompleteDatm, ProdTypeCcdName, ProdName
            , if(json_value(MyLecData, "$[0].wUnitIdxs") != "", fn_str_count(concat(json_value(MyLecData, "$[0].wUnitIdxs"), ","), ","), "") as wUnitCnt
            , PayStatusCcdName, RefundDatm, RefundAdminName
            , json_value(MyLecData, "$[0].LecStartDate") as LecStartDate, json_value(MyLecData, "$[0].LecExpireDay") as LecExpireDay, AdminReasonCcdName, AdminEtcReason';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
        $last_query = $this->orderListModel->getLastQuery();

        // export excel
        $this->_makeExcel('0원결제현황리스트', $list, $headers, true, $last_query);
    }

    /**
     * 0원결제 등록 폼
     * @return object|string
     */
    public function create()
    {
        // 등록할 상품구분 공통코드 조회
        $arr_prod_type_target_key = ['on_lecture', 'off_lecture', 'book'];
        $arr_prod_type_target_ccd = array_filter_keys($this->orderListModel->_prod_type_ccd, $arr_prod_type_target_key);
        $arr_prod_type_target_name = $this->codeModel->getCcd($this->_group_ccd['ProdType'], '', ['IN' => ['Ccd' => array_values($arr_prod_type_target_ccd)]]);

        // 지역번호, 휴대폰번호 공통코드 조회
        $codes = $this->codeModel->getCcdInArray([$this->_tel1_ccd, $this->_phone1_ccd, $this->_group_ccd['AdminReason']]);

        return $this->load->view('pay/zero_pay/create', [
            'arr_prod_type_target_ccd' => $arr_prod_type_target_ccd,
            'arr_prod_type_target_name' => $arr_prod_type_target_name,
            'arr_admin_reason_ccd' => $codes[$this->_group_ccd['AdminReason']],
            'arr_tel1_ccd' => $codes[$this->_tel1_ccd],
            'arr_phone1_ccd' => $codes[$this->_phone1_ccd]
        ]);
    }

    /**
     * 0원결제 주문 등록
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'prod_type', 'label' => '상품구분', 'rules' => 'trim|required'],
            ['field' => 'is_lec_unit', 'label' => '온라인강좌 등록구분', 'rules' => 'callback_validateRequiredIf[prod_type,on_lecture]'],
            ['field' => 'wUnitCode[]', 'label' => '회차식별자', 'rules' => 'callback_validateRequiredIf[is_lec_unit,Y]'],
            ['field' => 'prod_code[]', 'label' => '상품식별자', 'rules' => 'trim|required'],
            ['field' => 'lec_start_date', 'label' => '수강시작일', 'rules' => 'callback_validateRequiredIf[prod_type,on_lecture]'],
            ['field' => 'lec_expire_day', 'label' => '수강제공기간', 'rules' => 'callback_validateRequiredIf[prod_type,on_lecture]'],
            ['field' => 'admin_reason_ccd', 'label' => '부여사유유형', 'rules' => 'trim|required'],
            ['field' => 'admin_etc_reason', 'label' => '상세부여사유', 'rules' => 'trim|required'],
            ['field' => 'mem_idx[]', 'label' => '회원 선택', 'rules' => 'trim|required'],
            ['field' => 'receiver', 'label' => '받는사람 이름', 'rules' => 'trim|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'zipcode', 'label' => '받는사람 우편번호', 'rules' => 'trim|integer|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'addr1', 'label' => '받는사람 주소', 'rules' => 'trim|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'addr2', 'label' => '받는사람 상세주소', 'rules' => 'trim|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'receiver_phone1', 'label' => '받는사람 휴대폰번호1', 'rules' => 'trim|integer|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'receiver_phone2', 'label' => '받는사람 휴대폰번호2', 'rules' => 'trim|integer|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'receiver_phone3', 'label' => '받는사람 휴대폰번호3', 'rules' => 'trim|integer|callback_validateRequiredIf[prod_type,book]'],
            ['field' => 'delivery_price', 'label' => '배송료', 'rules' => 'trim|integer|callback_validateRequiredIf[prod_type,book]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->orderModel->procAdminOrder('zero', $this->_reqP(null, false));

        $this->json_result($result, '등록 되었습니다.', $result);
    }
}
