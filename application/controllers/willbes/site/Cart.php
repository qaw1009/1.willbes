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
        $this->cartFModel->destroySessCartIdx();

        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        // 장바구니 조회
        $list = $this->cartFModel->listValidCart($this->session->userdata('mem_idx'), $this->_site_code, $this->_cate_code);

        $results = [];
        foreach ($list as $idx => $row) {
            // 상품 갯수, 상품 금액 배열 키 (on_lecture : 단강좌, on_package : 패키지, book : 교재)
            $count_key = 'count.' . $row['CartProdType'];
            $price_key = 'price.' . $row['CartProdType'];

            // 상품 갯수
            array_set($results, $count_key, array_get($results, $count_key, 0) + 1);

            // 상품 금액
            array_set($results, $price_key, array_get($results, $price_key, 0) + $row['RealSalePrice']);

            // 강좌, 교재 목록 구분, 배송료 배열 키 (on_lecture : 온라인강좌, book : 교재)
            $results['list'][$row['CartType']][] = $row;
        }

        // 온라인 강좌 배송료
        $results['delivery_price']['on_lecture'] = $this->cartFModel->getLectureDeliveryPrice(array_pluck(array_get($results, 'list.on_lecture', []), 'IsFreebiesTrans'));

        // 교재 배송료
        $results['delivery_price']['book'] = $this->cartFModel->getBookDeliveryPrice(array_get($results, 'price.book', 0));

        $this->load->view('site/cart/index', [
            'arr_input' => $arr_input,
            'results' => $results
        ]);
    }

    /**
     * 수강생교재의 부모상품 유효한 장바구니 존재 여부 및 주문 여부 확인
     * @param array $params
     */
    public function checkStudentBook($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'prod_code', 'label' => '상품 식별자', 'rules' => 'trim|required'],
            ['field' => 'parent_prod_code', 'label' => '부모상품 식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $prod_code = $this->_reqP('prod_code');
        $parent_prod_code = $this->_reqP('parent_prod_code');
        
        // 부모상품 주문여부 및 장바구니 확인
        $returns['is_ordered'] = $this->cartFModel->checkStudentBook($prod_code, $parent_prod_code);

        $this->json_result(true, '', [], $returns);
    }

    /**
     * 주문 페이지 이동
     * @param array $params
     */
    public function toOrder($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_idx[]', 'label' => '장바구니 식별자', 'rules' => 'trim|required'],
            ['field' => 'cart_type', 'label' => '장바구니 구분', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        // 장바구니 식별자 세션 생성
        $this->cartFModel->makeSessCartIdx($this->_reqP('cart_idx'));

        $this->json_result(true, '', [], ['ret_url' => site_url('/order/index/cate/' . $this->_cate_code . '?tab=' . $this->_reqP('cart_type'))]);
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
        $_only_cart_type = $this->_reqP('only_cart_type');
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
            $returns['ret_url'] = $_is_direct_pay == 'Y' ? site_url('/order/index/cate/' . $this->_cate_code . '/?tab=' . $_only_cart_type) : site_url('/cart/index/cate/' . $this->_cate_code);
        }

        // 바로결제일 경우 장바구니 식별자 세션 생성
        if ($result['ret_cd'] === true && $_is_direct_pay == 'Y') {
            $this->cartFModel->makeSessCartIdx($result['ret_data']);
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
}
