<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pay/BaseOrder.php';

class RefundProc extends BaseOrder
{
    protected $models = array('pay/orderList', 'pay/order', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_list_add_join = array('delivery_info', 'refund');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 환불처리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $arr_target_group_ccd = array_filter_keys($this->_group_ccd, ['PayRoute', 'PayMethod', 'ProdType', 'LearnPattern', 'PayStatus', 'DeliveryStatus']);
        $codes = $this->codeModel->getCcdInArray(array_values($arr_target_group_ccd));

        $this->load->view('pay/refund/index_proc', [
            'arr_pay_route_ccd' => $codes[$this->_group_ccd['PayRoute']],
            'arr_pay_method_ccd' => $codes[$this->_group_ccd['PayMethod']],
            'arr_prod_type_ccd' => $codes[$this->_group_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_group_ccd['LearnPattern']],
            'arr_pay_status_ccd' => $codes[$this->_group_ccd['PayStatus']],
            'arr_delivery_status_ccd' => $codes[$this->_group_ccd['DeliveryStatus']],
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 환불처리 목록 조회
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
     * 환불처리 조회 조건 리턴 
     * @return array
     */
    private function _getListConditions()
    {
        // 기본조건
        $arr_condition = [
            'EQ' => [
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                'OPD.DeliveryStatusCcd' => $this->_reqP('search_delivery_status_ccd'),
                'O.IsEscrow' => $this->_reqP('search_chk_is_escrow'),
                'OP.IsUseCoupon' => $this->_reqP('search_chk_is_coupon'),
                'ORR.IsApproval' => $this->_reqP('search_chk_is_approval'),
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
                'LKR' => [
                    'O.OrderNo' => $this->_reqP('search_prod_value')
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

        // 결제완료된 주문상품이 1건이라도 있는 경우만 노출
        $raw_query = '(select count(*) from ' . $this->orderListModel->_table['order_product'] . ' where OrderIdx = O.OrderIdx and PayStatusCcd = "' . $this->orderListModel->_pay_status_ccd['paid'] . '") >';
        $arr_condition['RAW'][$raw_query] = '0';

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
     * 환불처리 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '가상계좌신청일', '주문일', '결제완료일', '총 실결제금액', '사용강좌포인트', '사용교재포인트'
            , '총 환불금액', '총 남은금액', '상품구분', '상품명', '결제금액', '환불금액', '결제상태', '배송상태', '할인율', '쿠폰적용여부'];

        $column = 'OrderNo, SiteName, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, VBankOrderDatm, OrderDatm, CompleteDatm
            , tRealPayPrice, tUseLecPoint, tUseBookPoint, tRefundPrice, (tRealPayPrice - cast(tRefundPrice as int)) as tRemainPrice
            , ProdTypeCcdName, ProdName, RealPayPrice, RefundPrice, PayStatusCcdName, DeliveryStatusCcdName, DiscRate, IsUseCoupon';

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelAllOrder($column, $arr_condition, $this->_getListOrderBy(), $this->_list_add_join);

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('환불처리리스트', $list, $headers);
    }

    /**
     * 환불 처리하기 폼
     * @return mixed
     */
    public function create()
    {
        $order_idx = $this->_reqG('order_idx');
        $order_prod_param = json_decode($this->_reqG('params'), true);
        $params = base64_encode($this->_reqG('params'));
        $total_refund_price = 0;

        if (empty($order_idx) === true || count($order_prod_param) < 1) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_VALIDATION_ERROR);
        }

        // 주문상품 조회
        $arr_condition = [
            'EQ' => [
                'O.OrderIdx' => $order_idx,
                'OP.PayStatusCcd' => $this->orderListModel->_pay_status_ccd['paid']
            ],
            'IN' => [
                'OP.OrderProdIdx' => array_keys($order_prod_param),
                'O.SiteCode' => get_auth_site_codes()
            ]
        ];

        $order_prod_data = $this->orderListModel->listAllOrder(false, $arr_condition);
        if (empty($order_prod_data) === true) {
            return $this->json_error('주문상품 데이터가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 총 환불금액 합산
        foreach ($order_prod_param as $row) {
            $total_refund_price += $row['card_refund_price'] + $row['cash_refund_price'];
        }

        // 은행코드 조회
        $arr_bank_ccd = $this->codeModel->getCcd($this->_group_ccd['Bank']);

        return $this->load->view('pay/refund/create', [
            'arr_bank_ccd' => $arr_bank_ccd,
            'params' => $params,    // 전달받은 주문상품 파라미터 base64_encode
            'order_idx' => $order_idx,
            'order_prod_param' => $order_prod_param,    // 주문상품 파라미터 json_decode
            'order_prod_data' => $order_prod_data,      // 조회된 주문상품 데이터
            'total_refund_price' => $total_refund_price
        ]);        
    }

    /**
     * 환불 처리하기
     * @return mixed
     */
    public function store()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'params', 'label' => '주문상품정보', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }
        
        // 환불계좌 입력값 체크
        if (empty($this->_reqP('refund_bank_ccd')) === false || empty($this->_reqP('refund_account_no')) === false || empty($this->_reqP('refund_deposit_name')) === false) {
            if (!(empty($this->_reqP('refund_bank_ccd')) === false && empty($this->_reqP('refund_account_no')) === false && empty($this->_reqP('refund_deposit_name')) === false)) {
                return $this->json_error('환불계좌정보를 모두 입력해 주세요.', _HTTP_BAD_REQUEST);
            }
        }

        $result = $this->orderModel->refundOrderProduct($this->_reqP(null, false));

        return $this->json_result($result, '환불이 정상적으로 처리되었습니다.', $result);
    }

    /**
     * 환불산출금액확인 폼
     */
    public function calc()
    {
        var_dump($_GET);
        $this->load->view('pay/refund/calc', [

        ]);
    }
}
