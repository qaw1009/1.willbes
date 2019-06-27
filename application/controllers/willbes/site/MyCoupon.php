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
     * 쿠폰적용 목록 페이지
     * @return CI_Output
     */
    public function index()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $cart_idx = $this->_req('cart_idx');
        if (empty($cart_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 이미 선택한 쿠폰 식별자
        $arr_coupon_detail_idx = json_decode($this->_req('coupon_detail_idx'), true);

        // 장바구니 조회
        $cart_data = $this->cartFModel->findCartByCartIdx($cart_idx, $sess_mem_idx);
        if (empty($cart_data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 상품구분명 / 상품구분명 색상 class 번호
        $cart_data['CartProdTypeName'] = $this->cartFModel->_cart_prod_type_name[$cart_data['CartProdType']];
        $cart_data['CartProdTypeNum'] = $this->cartFModel->_cart_prod_type_idx[$cart_data['CartProdType']];

        // 상품 결제금액
        $cart_data['RealPayPrice'] = $cart_data['RealSalePrice'] * $cart_data['ProdQty'];

        // 전체보유 쿠폰조회 조건
        $arr_condition = [
            'EQ' => [
                'C.SiteCode' => $cart_data['SiteCode'],
                'C.CouponTypeCcd' => $this->couponFModel->_coupon_type_ccd['coupon']
            ]            
        ];

        // 전체보유 쿠폰조회
        $results['all'] = $this->couponFModel->listMemberCoupon(false, $arr_condition, null, null, ['CD.CdIdx' => 'desc']);

        // 쿠폰적용구분 공통코드
        if (ends_with($cart_data['SalePatternCcd'], '001') === true) {
            // 판매형태 공통코드가 일반일 경우 상품구분 공통코드로 확인
            $coupon_apply_type_ccd = element($cart_data['ProdTypeCcd'], $this->couponFModel->_coupon_apply_type_ccd);
        } else {
            // 판매형태 공통코드가 일반이 아닐 경우 판매형태 공통코드로 확인
            $coupon_apply_type_ccd = element($cart_data['SalePatternCcd'], $this->couponFModel->_coupon_apply_type_ccd);
        }

        // 적용가능한 쿠폰조회
        $arr_param = [
            'SiteCode' => $cart_data['SiteCode'],
            'CouponTypeCcd' => $this->couponFModel->_coupon_type_ccd['coupon'],
            'CateCode' => $cart_data['CateCode'],
            'ApplyTypeCcd' => $coupon_apply_type_ccd,
            'LecTypeCcd' => element($cart_data['LearnPatternCcd'], $this->couponFModel->_coupon_lec_type_ccd),
            'RealSalePrice' => $cart_data['RealSalePrice'],
            'SchoolYear' => $cart_data['SchoolYear'],
            'CourseIdx' => $cart_data['CourseIdx'],
            'SubjectIdx' => $cart_data['SubjectIdx'],
            'ProfIdx' => $cart_data['ProfIdx'],
            'ProdCode' => $cart_data['ProdCode'],
        ];

        $results['usable'] = $this->couponFModel->listMemberProductCoupon(false, $arr_param, null, null, ['CD.CdIdx' => 'desc']);

        $this->load->view('site/order/my_coupon_list', [
            'ele_id' => $this->_req('ele_id'),
            'arr_coupon_detail_idx' => $arr_coupon_detail_idx,
            'cart_data' => $cart_data,
            'results' => $results
        ]);
    }
}
