<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF', 'order/orderListF', 'memberF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 사용하는 그룹공통코드
    private $_tel1_ccd = '672';
    private $_phone1_ccd = '673';

    public function __construct()
    {
        parent::__construct();
    }

    public function test($params = [])
    {
        $d = date('YmdHi', strtotime(date('Y-m-d H:i:s') . ' +7 day'));

        dd($d);
    }

    /**
     * 주문하기 폼
     * @param array $params
     */
    public function index($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $sess_cart_idx = $this->orderFModel->checkSessCartIdx();
        $cart_type = $this->_req('tab');    // 장바구니 구분

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, 'N');

        // 장바구니 데이터 가공 (전체주문금액, 배송비, 적립예정포인트 계산 등 필요 데이터 가공)
        $results = $this->orderFModel->getMakeCartReData('order', $cart_type, $cart_rows);
        if (is_array($results) === false) {
            show_alert($results, 'back');
        }

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        // 회원 보유포인트     // TODO : 회원포인트 조회 로직 추가 필요 (강좌, 교재 포인트 구분하여 조회)
        $results['point'] = 3000;
        $results['point_type_name'] = $this->orderFModel->_point_type_name[$cart_type];

        // 지역번호, 휴대폰번호 공통코드 조회
        $codes = $this->codeModel->getCcdInArray([$this->_tel1_ccd, $this->_phone1_ccd]);

        $this->load->view('site/order/index', [
            'arr_tel1_ccd' => $codes[$this->_tel1_ccd],
            'arr_phone1_ccd' => $codes[$this->_phone1_ccd],
            'results' => $results
        ]);
    }

    /**
     * 주문완료 페이지
     * @param array $params
     */
    public function complete($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $order_no = $this->_req('order_no');
        if (empty($order_no) === true) {
            show_alert('필수 파라미터 오류입니다.', site_url('/cart/index'), false);
        }
        
        // 주문정보 조회
        $results['order'] = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);
        if (empty($results['order']) === true) {
            show_alert('주문정보 데이터가 없습니다.', site_url('/cart/index'), false);
        }

        $order_idx = $results['order']['OrderIdx']; // 주문식별자
        $is_vbank = $results['order']['IsVBank'];   // 가상계좌 결제여부

        // 가상계좌 결제가 아닐 경우 영수증 출력 URL 조회
        if ($is_vbank == 'N') {
            $pg_config_file = 'pg_' . config_app('PgDriver', 'inisis');
            $this->load->config($pg_config_file, true, true);

            $results['order']['ReceiptUrl'] = str_replace('{{$tid$}}', $results['order']['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 주문상품 목록 조회
        $results['order_product'] = $this->orderListFModel->listOrderProduct(false
            , ['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $sess_mem_idx]]
            , null, null, ['OP.OrderProdIdx' => 'asc']);

        // 주문배송정보 조회
        $results['order_delivery'] = $this->orderListFModel->findOrderDeliveryAddressByOrderIdx($order_idx, $sess_mem_idx);

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        $this->load->view('site/order/complete', [
            'arr_prod_type_name' => $this->cartFModel->_cart_prod_type_name,
            'arr_prod_type_idx' => $this->cartFModel->_cart_prod_type_idx,
            'results' => $results
        ]);
    }

    /**
     * 사용포인트 체크
     * @return mixed
     */
    public function checkUsePoint()
    {
        // 전달 폼 데이터
        $arr_input = $this->_reqP(null, false);

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[on_lecture,off_lecture,book]'],
            ['field' => 'use_point', 'label' => '사용포인트', 'rules' => 'trim|required|integer'],
            ['field' => 'total_prod_pay_price', 'label' => '전체상품결제금액', 'rules' => 'trim|required|integer'],
            ['field' => 'is_package', 'label' => '패키지상품여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 사용포인트 체크
        $check_use_point = $this->orderFModel->checkUsePoint(
            element('cart_type', $arr_input), element('use_point', $arr_input, 0),
            element('total_prod_pay_price', $arr_input, 0),
            element('is_package', $arr_input, 'N') == 'Y' ? true : false
        );

        return $this->json_result(true, '', [], ['is_check' => $check_use_point]);
    }

    /**
     * 회원 식별자 기준 최근 배송정보 조회
     */
    public function recentDeliveryAddress()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        // 최근 배송정보 조회
        $arr_condition = ['EQ' => ['O.MemIdx' => $this->session->userdata('mem_idx')]];
        $list = $this->orderListFModel->listOrderDeliveryAddress(false, $arr_condition, 1, 0, ['O.OrderIdx' => 'desc']);
        $data = element('0', $list, []);

        $this->json_result(true, '', [], $data);
    }
}
