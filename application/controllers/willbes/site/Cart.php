<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends \app\controllers\FrontController
{
    protected $models = array('order/cartF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();

        // 수동 로그인
        $this->session->set_userdata('mem_idx', '5051707');
        $this->session->set_userdata('mem_id', 'bsshin');
        $this->session->set_userdata('mem_name', '신봉석');
        $this->session->set_userdata('is_login', true);
    }

    public function index($params = [])
    {
        $this->load->view('site/cart/index', [
        ]);
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

        $this->json_result($result, '', $result, $returns);
    }
}
