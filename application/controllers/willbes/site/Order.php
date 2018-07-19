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
        $sess_cart_idx = $this->orderFModel->checkSessCartIdx();

        // 장바구니 조회
        $list = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, $this->_cate_code, $sess_cart_idx);

        $results = [];
        $results['price'] = 0;
        $arr_is_freebies_trans = [];
        foreach ($list as $idx => $row) {
            $row['CartProdTypeName'] = $this->orderFModel->_cart_prod_type_name[$row['CartProdType']];
            $row['CartProdTypeNum'] = array_flip(array_keys($this->orderFModel->_cart_prod_type_name))[$row['CartProdType']] + 1;
            $results['list'][] = $row;

            // 강좌상품일 경우 사은품/무료교재 배송료 부과여부
            if ($row['CartProdType'] != 'book') {
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];
            }

            // 전체 주문금액
            $results['price'] += $row['RealSalePrice'];
        }

        // 배송료 계산
        if (empty($arr_is_freebies_trans) === false) {
            $results['cart_type'] = 'on_lecture';   // 강좌상품
            $results['cart_type_name'] = '강좌';
            $results['delivery_price'][$results['cart_type']] = $this->orderFModel->getLectureDeliveryPrice($arr_is_freebies_trans);
        } else {
            $results['cart_type'] = 'book'; // 교재상품
            $results['cart_type_name'] = '교재';
            $results['delivery_price'][$results['cart_type']] = $this->orderFModel->getBookDeliveryPrice($results['price']);
        }

        $this->load->view('site/order/index', [
            'results' => $results
        ]);
    }

    private function _checkUsableCartIdx()
    {

    }
}
