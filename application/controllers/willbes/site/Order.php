<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF');
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
        $sess_cart_idx = $this->cartFModel->checkSessCartIdx();

        // 장바구니 조회
        $cart_list = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, $this->_cate_code, $sess_cart_idx);

        $this->load->view('site/order/index', [
        ]);
    }

    private function _checkUsableCartIdx()
    {

    }
}
