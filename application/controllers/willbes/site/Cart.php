<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends \app\controllers\FrontController
{
    protected $models = array('order/cartF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 장바구니 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // 장바구니 식별자 세션 삭제
        $this->_destroySessCartIdx();

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 장바구니 조회
        $list = $this->cartFModel->listValidCart($this->session->userdata('mem_idx'), $this->_site_code, $this->_cate_code);

        $results = [];
        $is_delivery_price = false;
        foreach ($list as $idx => $row) {
            // 상품 목록, 배송료 배열 키 (on_lecture : 온라인강좌, book : 교재)
            $base_key = array_search($row['ProdTypeCcd'], $this->cartFModel->_prod_type_ccd);

            // 상품 갯수, 상품 금액 배열 키 (on_lecture : 단강좌, on_package : 패키지, book : 교재)
            $sub_key = $row['IsPackage'] == 'Y' ? 'on_package' : $base_key;
            $count_key = 'count.' . $sub_key;
            $price_key = 'price.' . $sub_key;

            // 온라인강좌 배송료부과 여부 (다수의 강좌상품 중 배송료부과 상품이 하나라도 있을 경우 배송료 부과)
            if ($is_delivery_price === false && $base_key == 'on_lecture' && $row['IsFreebiesTrans'] == 'Y') {
                $is_delivery_price = true;
            }

            // 상품 갯수
            array_set($results, $count_key, array_get($results, $count_key, 0) + 1);

            // 상품 금액
            array_set($results, $price_key, array_get($results, $price_key, 0) + $row['RealSalePrice']);

            // 강좌, 교재 목록 구분
            $results['list'][$base_key][] = $row;
        }

        // 강좌 배송료
        $results['delivery_price']['on_lecture'] = $is_delivery_price === true ? config_app('DeliveryPrice', 0) : 0;

        // 교재 배송료
        $results['delivery_price']['book'] = isset($results['price']['book']) === true && intval($results['price']['book']) < config_app('DeliveryFreePrice', 0) ? config_app('DeliveryPrice', 0) : 0;

        $this->load->view('site/cart/index', [
            'arr_input' => $arr_input,
            'results' => $results
        ]);
    }

    /**
     * 결제 페이지 이동
     * @param array $params
     */
    public function toPay($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_idx[]', 'label' => '장바구니 식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        // 장바구니 식별자 세션 생성
        $this->_makeSessCartIdx($this->_reqP('cart_idx'));

        $this->json_result(true, '', [], ['ret_url' => site_url('/pay/index/cate/' . $this->_cate_code)]);
    }

    /**
     * 장바구니 저장
     * @param array $params
     * @return CI_Output
     */
    public function store($params = [])
    {
        $_learn_pattern = $this->_reqP('learn_pattern');
        $_is_direct_pay = $this->_reqP('is_direct_pay');
        $_only_prod_code = $this->_reqP('only_prod_code');
        $_prod_code = empty($this->_reqP('prod_code')) === false ? $this->_reqP('prod_code') : (array) $_only_prod_code;
        $returns = [];

        if (empty($_prod_code) === true || empty($_learn_pattern) === true || empty($_is_direct_pay) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 장바구니 저장
        $result = $this->cartFModel->addCart($_learn_pattern, [
            'prod_code' => $_prod_code,
            'site_code' => $this->_site_code,
            'cate_code' => $this->_cate_code,
            'is_direct_pay' => $_is_direct_pay,
            'is_visit_pay' => get_var($this->_reqP('is_visit_pay'), 'N')
        ]);

        if (empty($_only_prod_code) === true || (empty($_only_prod_code) === false && $_is_direct_pay == 'Y')) {
            // 개별상품 장바구니 담기 이외에 리턴 URL 지정
            $returns['ret_url'] = $_is_direct_pay == 'Y' ? site_url('/pay/index/cate/' . $this->_cate_code) : site_url('/cart/index/cate/' . $this->_cate_code);
        }

        // 바로결제일 경우 장바구니 식별자 세션 생성
        if ($result['ret_cd'] === true && $_is_direct_pay == 'Y') {
            $this->_makeSessCartIdx($result['ret_data']);
        }

        $this->json_result($result['ret_cd'], '', $result, $returns);
    }

    /**
     * 장바구니 선택삭제/개별삭제
     * @param array $params
     */
    public function destroy($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'cart_idx', 'label' => '장바구니 식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->cartFModel->removeCart(json_decode($this->_reqP('cart_idx'), true));

        $this->json_result($result, '삭제 되었습니다.', $result);        
    }

    /**
     * 장바구니 식별자 세션 생성
     * @param array $arr_cart_idx
     */
    private function _makeSessCartIdx($arr_cart_idx = [])
    {
        $this->session->set_userdata('usable_cart_idx', $arr_cart_idx);
    }

    /**
     * 장바구니 식별자 세션 삭제
     */
    private function _destroySessCartIdx()
    {
        $this->session->unset_userdata('usable_cart_idx');
    }
}
