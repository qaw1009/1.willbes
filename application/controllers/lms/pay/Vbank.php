<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Vbank extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_vbank_pay_status_ccd = array();

    public function __construct()
    {
        parent::__construct();

        // 무통장입금용 결제상태 공통코드
        foreach ($this->orderListModel->_pay_status_ccd as $key => $val) {
            if (strpos($key, 'vbank') !== false) {
                $this->_vbank_pay_status_ccd[] = $val;
            }
        }
    }

    /**
     * 무통장입금신청현황 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'ProdType', 'LearnPattern', 'PayStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));
        
        // 결제상태에서 무통장입금 관련 값만 필터링
        $arr_pay_status_ccd = array_filter_keys($codes[$this->_group_ccd['PayStatus']], $this->_vbank_pay_status_ccd);
        
        $this->load->view('pay/vbank/index', [
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_prod_type_ccd' => $codes[$this->_group_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_group_ccd['LearnPattern']],
            'arr_pay_status_ccd' => $arr_pay_status_ccd
        ]);
    }

    /**
     * 무통장입금신청현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->orderListModel->listAllOrder(true, $arr_condition);

        if ($count > 0) {
            $list = $this->orderListModel->listAllOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $this->_getListOrderBy());
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 무통장입금신청현황 조회 조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.PayRouteCcd' => $this->orderListModel->_pay_route_ccd['pg'],
                'O.PayMethodCcd' => $this->orderListModel->_pay_method_ccd['vbank'],
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'O.IsEscrow' => $this->_reqP('search_chk_is_escrow'),
                'OP.IsUseCoupon' => $this->_reqP('search_chk_is_coupon')
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes(),   //사이트 권한 추가
                'OP.PayStatusCcd' => $this->_vbank_pay_status_ccd
            ],
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
            case 'vbank_cancel' :
                $arr_condition['BDT'] = ['O.VBankCancelDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'vbank_expire' :
                $arr_condition['BDT'] = ['O.VBankExpireDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 무통장입금신청현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '가상계좌신청일', '가상계좌취소일', '가상계좌만료일', '입금은행', '계좌번호', '입금자명'
            , '총 실결제금액', '사용강좌포인트', '사용교재포인트', '상품구분', '상품명', '결제금액', '결제상태', '할인율', '쿠폰적용여부'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, VBankOrderDatm, VBankCancelDatm, VBankExpireDatm, VBankCcdName, VBankAccountNo
            , VBankDepositName, tRealPayPrice, tUseLecPoint, tUseBookPoint, ProdTypeCcdName, ProdName, RealPayPrice, PayStatusCcdName, DiscRate, IsUseCoupon';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy());
        $last_query = $this->orderListModel->getLastQuery();

        // export excel
        $this->_makeExcel('무통장입금신청현황리스트', $list, $headers, true, $last_query);
    }
}
