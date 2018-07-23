<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF', 'memberF', '_lms/sys/wCode');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
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
        $list = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, $this->_cate_code, $sess_cart_idx);

        $results = [];
        $total_price = 0;
        $arr_is_freebies_trans = [];
        foreach ($list as $idx => $row) {
            // 장바구니 구분과 실제 상품구분 값 비교
            if ($cart_type != $row['CartProdType']) {
                show_alert('필수 파라미터 오류입니다.', site_url('/cart/index/cate/' . $this->_cate_code), false);
            }

            $row['CartProdTypeName'] = $this->orderFModel->_cart_prod_type_name[$row['CartProdType']];  // 상품구분명
            $row['CartProdTypeNum'] = array_flip(array_keys($this->orderFModel->_cart_prod_type_name))[$row['CartProdType']] + 1;   // 상품구분명 class number
            $results['list'][] = $row;

            // 강좌상품일 경우 사은품/무료교재 배송료 부과여부
            if ($row['CartProdType'] == 'on_lecture') {
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];
            }

            // 전체 주문금액
            $total_price += $row['RealSalePrice'];
        }

        // 배송료 계산
        if ($cart_type === 'on_lecture') {
            $results['delivery_price'] = $this->orderFModel->getLectureDeliveryPrice($arr_is_freebies_trans);
        } else {
            $results['delivery_price'] = $this->orderFModel->getBookDeliveryPrice($results['price']);
        }

        $results['cart_type'] = $cart_type;     // 장바구니 구분
        $results['cart_type_name'] = $this->orderFModel->_cart_type_name[$cart_type];   // 장바구니 구분명
        $results['total_price'] = $total_price;     // 전체 주문금액

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        // 지역번호, 휴대폰번호 공통코드 조회
        $codes = $this->wCodeModel->getCcdInArray(['101', '102']);

        $this->load->view('site/order/index', [
            'arr_tel1_ccd' => $codes['101'],
            'arr_phone1_ccd' => $codes['102'],
            'results' => $results
        ]);
    }

    private function _checkUsableCartIdx()
    {

    }
}
