<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\BaseController
{
    protected $models = array('pay/orderList', 'pay/orderMemo', 'member/manageMember', 'service/point', 'sys/code');
    protected $helpers = array();
    private $_ccd = array();

    public function __construct()
    {
        parent::__construct();

        $this->_ccd = $this->orderModel->_ccd;
    }

    /**
     * 전체결제현황 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(array_values($this->_ccd));

        $this->load->view('pay/order/order/index', [
            'arr_pay_route_ccd' => $codes[$this->_ccd['PayRoute']],
            'arr_pay_method_ccd' => $codes[$this->_ccd['PayMethod']],
            'arr_prod_type_ccd' => $codes[$this->_ccd['ProdType']],
            'arr_learn_pattern_ccd' => $codes[$this->_ccd['LearnPattern']],
            'arr_pay_status_ccd' => $codes[$this->_ccd['PayStatus']],
            'arr_delivery_status_ccd' => $codes[$this->_ccd['DeliveryStatus']]
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
        $count = $this->orderListModel->listOrder(true, $arr_condition);

        if ($count > 0) {
            $list = $this->orderListModel->listOrder(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['O.OrderIdx' => 'desc', 'OP.OrderProdIdx' => 'asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 전체결제현황 목록 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['주문번호', '운영사이트', '회원명', '회원아이디', '회원휴대폰번호', '결제채널', '결제루트', '결제수단', '결제완료일 (가상계좌신청일)', '총 실결제금액', '사용강좌포인트', '사용교재포인트'
            , '총 환불금액', '총 남은금액', '상품구분', '상품명', '결제금액', '환불금액', '결제상태', '배송상태', '쿠폰적용'];

        $arr_condition = $this->_getListConditions();
        $list = $this->orderListModel->listExcelOrder($arr_condition, ['O.OrderIdx' => 'desc', 'OP.OrderProdIdx' => 'asc']);

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('전체결제현황리스트', $list, $headers);
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
                'O.SiteCode' => $this->_reqP('search_site_code'),
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'),
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'),
                'P.ProdTypeCcd' => $this->_reqP('search_prod_type_ccd'),
                'PL.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'OP.PayStatusCcd' => $this->_reqP('search_pay_status_ccd'),
                //'OPD.DeliveryStatusCcd' => $this->_reqP('search_delivery_status_ccd'),
                'O.IsEscrow' => $this->_reqP('search_chk_is_escrow'),
                'OP.IsUseCoupon' => $this->_reqP('search_chk_is_coupon'),
                //'OPR.IsApproval' => $this->_reqP('search_chk_is_approval'),
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

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));

        switch ($this->_reqP('search_date_type')) {
            case 'paid' :
                $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'vbank' :
                $arr_condition['EQ'] = ['O.PayMethodCcd' => $this->orderModel->_pay_method_ccd['vbank']];
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
/*            case 'refund' :
                $arr_condition['BDT'] = ['OPR.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'delivery_send' :
                $arr_condition['BDT'] = ['OPD.DeliverySendDatm' => [$search_start_date, $search_end_date]];
                break;*/
            default :
                $arr_condition['BDT'] = ['O.OrderDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        return $arr_condition;
    }

    /**
     * 전체결제현황 수정폼
     * @param array $params
     */
    public function show($params = [])
    {
        $order_idx = $params[0];
        if (empty($order_idx) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 주문 조회
        $data = $this->orderListModel->listOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]]);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $order_data = element('0', $data, []);

        // 가상계좌 결제가 아닐 경우 영수증 출력 URL 조회
        if ($order_data['PayRouteCcd'] === $this->orderModel->_pay_route_ccd['pg'] && $order_data['PayMethodCcd'] !== $this->orderModel->_pay_method_ccd['vbank']) {
            $pg_config_file = 'pg_' . $order_data['PgDriver'];
            $this->load->config($pg_config_file, true, true);
            $order_data['ReceiptUrl'] = str_replace('{{$tid$}}', $order_data['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 회원정보
        $mem_data = $this->manageMemberModel->getMember($order_data['MemIdx']);

        // 회원포인트 조회
        $point_data = $this->pointModel->getMemberPoint($order_data['MemIdx']);

        $this->load->view('pay/order/order/show', [
            'idx' => $order_idx,
            'data' => [
                'order' => $order_data,
                'order_prod' => $data,
                'mem' => $mem_data,
                'mem_point' => $point_data
            ],
        ]);
    }
}
