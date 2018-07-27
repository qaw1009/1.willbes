<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCoupon extends \app\controllers\FrontController
{
    protected $models = array('couponF', 'order/cartF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 쿠폰적용
     * @return CI_Output
     */
    public function index()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $cart_idx = $this->_req('cart_idx');
        if (empty($cart_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 장바구니 조회
        $cart_data = $this->cartFModel->findCartByCartIdx($cart_idx, $sess_mem_idx);
        if (empty($cart_data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 쿠폰조회 전달 기본 파라미터
        $arr_param = ['SiteCode' => $cart_data['SiteCode'], 'CateCode' => $cart_data['CateCode']];

        // 전체보유 쿠폰조회
        $results['all'] = $this->couponFModel->listMemberCoupon(false, $arr_param, null, null, ['CD.IssueDatm' => 'desc']);

        // 적용가능한 쿠폰조회
        $arr_param = array_merge($arr_param, [
            'ApplyTypeCcd' => $this->cartFModel->_coupon_apply_type_ccd[$cart_data['ProdTypeCcd']],
            'LecTypeCcd' => $this->cartFModel->_coupon_lec_type_ccd[$cart_data['LearnPatternCcd']],
            'SchoolYear' => $cart_data['SchoolYear'],
            'CourseIdx' => $cart_data['CourseIdx'],
            'SubjectIdx' => $cart_data['SubjectIdx'],
            'ProfIdx' => $cart_data['ProfIdx'],
            'ProdCode' => $cart_data['ProdCode'],
        ]);

        $results['usable'] = $this->couponFModel->listMemberProductCoupon(false, $arr_param, null, null, ['CD.IssueDatm' => 'desc']);

        $this->load->view('site/order/my_coupon_list', [
            'ele_id' => $this->_req('ele_id'),
            'arr_cart_prod_type_name' => $this->cartFModel->_cart_prod_type_name,
            'arr_cart_prod_type_idx' => $this->cartFModel->_cart_prod_type_idx,
            'cart_data' => $cart_data,
            'results' => $results
        ]);
    }
}
