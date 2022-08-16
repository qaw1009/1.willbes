<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class Order extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('delivery_info', 'refund');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 전체결제현황 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayChannel', 'PayRoute', 'Pg', 'PayMethod', 'ProdType', 'LearnPattern', 'SalePattern', 'PayStatus', 'DeliveryStatus', 'PackType', 'UserPackType']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        $this->load->view('pay/order/index', [
            'arr_pay_channel_ccd' => $codes[$this->_group_ccd['PayChannel']],
            'arr_pay_route_ccd' => $codes[$this->_group_ccd['PayRoute']],
            'arr_pg_ccd' => $codes[$this->_group_ccd['Pg']],
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_prod_type_ccd' => $codes[$this->_group_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_group_ccd['LearnPattern']],
            'arr_sale_pattern_ccd' => $codes[$this->_group_ccd['SalePattern']],
            'arr_pay_status_ccd' => $codes[$this->_group_ccd['PayStatus']],
            'arr_delivery_status_ccd' => $codes[$this->_group_ccd['DeliveryStatus']],
            'arr_pack_type_ccd' => $codes[$this->_group_ccd['PackType']],
            'arr_userpack_type_ccd' => $codes[$this->_group_ccd['UserPackType']],
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 전체결제현황 목록 조회
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
     * 전체결제현황 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.MemIdx' => $this->_reqP('search_member_idx'),
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayChannelCcd' => $this->_reqP('search_pay_channel_ccd'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PgCcd' => $this->_reqP('search_pg_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'PL.PackTypeCcd' => $this->_reqP('search_pack_type_ccd'),
                'OP.SalePatternCcd' => $this->_reqP('search_sale_pattern_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'OPD.DeliveryStatusCcd' => $this->_reqP('search_delivery_status_ccd'),
                'O.IsEscrow' => $this->_reqP('search_chk_is_escrow'),
                'OP.IsUseCoupon' => $this->_reqP('search_chk_is_coupon'),
                'ORR.IsApproval' => $this->_reqP('search_chk_is_approval'),
            ],
            'IN' => [
                'O.SiteCode' => get_auth_site_codes(),  // 사이트 권한 추가
            ],
            /*'ORG1' => [
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
                    'P.ProdCode' => $this->_reqP('search_prod_value'),
                    'OOI.CertNo' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'P.ProdName' => $this->_reqP('search_prod_value')
                ],
            ],*/
        ];

        // 추가정보 조건
        if ($this->_reqP('search_chk_is_remark') == 'Y') {
            $arr_condition['RAW']['OP.Remark is'] = ' not null';
        }

        // 회원 검색
        $arr_mem_condition = $this->_getListMemConditions($this->_reqP('search_member_keyword'), $this->_reqP('search_member_value'));

        // 상품 검색
        $arr_prod_condition = $this->_getListProdConditions($this->_reqP('search_prod_keyword'), $this->_reqP('search_prod_value'));

        // 조건 병합
        $arr_condition = array_replace_recursive($arr_condition, $arr_mem_condition, $arr_prod_condition);

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'paid' :
                $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'vbank' :
                $arr_condition['EQ']['O.PayMethodCcd'] = $this->orderListModel->_pay_method_ccd['vbank'];
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'refund' :
                $arr_condition['BDT'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'delivery_send' :
                $arr_condition['BDT'] = ['OPD.DeliverySendDatm' => [$search_start_date, $search_end_date]];
                break;
            default :
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 전체결제현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '가상계좌신청일', '주문일', '결제완료일', '총 실결제금액', '사용강좌포인트', '사용교재포인트'
            , '총 환불금액', '총 남은금액', '상품구분', '상품명', '결제금액', '환불금액', '결제상태', '환불완료일', '환불완료자', '배송상태', '할인율', '쿠폰적용여부'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, VBankOrderDatm, OrderDatm, CompleteDatm
            , tRealPayPrice, tUseLecPoint, tUseBookPoint, tRefundPrice, (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice
            , ProdTypeCcdName, ProdName, RealPayPrice, RefundPrice, PayStatusCcdName, RefundDatm, RefundAdminName, DeliveryStatusCcdName, DiscRate, IsUseCoupon';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);
        $last_query = $this->orderListModel->getLastQuery();

        // export excel
        $this->_makeExcel('전체결제현황리스트', $list, $headers, true, $last_query);
    }
}
