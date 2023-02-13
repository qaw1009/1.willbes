<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyCoupon extends \app\controllers\FrontController
{
    protected $models = array('couponF', 'order/cartF', 'order/orderF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 쿠폰적용 목록 페이지
     * @return mixed
     */
    public function index()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $cart_idx = $this->_req('cart_idx');
        $cart_type = $this->_req('cart_type');

        // 필수 파라미터 체크
        if (empty($cart_idx) === true || empty($cart_type) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 장바구니 식별자 세션 체크
        $sess_cart_idx = $this->cartFModel->checkSessCartIdx(false);
        if ($sess_cart_idx === false) {
            return $this->json_error('잘못된 접근입니다.');
        }

        // 제휴할인 식별자 세션 체크
        $sess_aff_idx = $this->cartFModel->checkSessAffIdx($this->_req('aff_idx'));
        if ($sess_aff_idx === false) {
            return $this->json_error('잘못된 접근입니다.[2]');
        }

        // 이미 선택한 쿠폰 식별자
        $arr_coupon_detail_idx = json_decode($this->_req('coupon_detail_idx'), true);

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, 'N', false, $this->_req('cart_sub_type'));

        // 장바구니 데이터 가공 (이미 선택한 쿠폰 적용안함)
        $cart_results = $this->orderFModel->getMakeCartReData('apply_coupon', $cart_type, $cart_rows, [], 0, '', $sess_aff_idx);
        if (is_array($cart_results) === false) {
            return $this->json_error($cart_results, _HTTP_NOT_FOUND);
        }

        // 장바구니 데이터 추출 (장바구니식별자 파라미터와 동일한 장바구니 데이터 추출)
        $cart_data = [];
        foreach ($cart_results['list'] as $row) {
            if ($cart_idx == $row['CartIdx']) {
                $cart_data = $row;
                break;
            }
        }

        if (empty($cart_data) === true) {
            return $this->json_error('장바구니 데이터가 없습니다.', _HTTP_NOT_FOUND);
        }

        /*// 장바구니 조회
        $cart_data = $this->cartFModel->findCartByCartIdx($cart_idx, $sess_mem_idx);
        if (empty($cart_data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }*/

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

        // 모의고사 응시형태
        $mock_take_form_ccd = array_get(json_decode($cart_data['PostData'], true), 'mock_exam.take_form');

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
            'MockTakeFormCcd' => $mock_take_form_ccd,
            'ProdCode' => $cart_data['ProdCode'],
        ];

        $results['usable'] = $this->couponFModel->listMemberProductCoupon(false, $arr_param, null, null, ['CD.CdIdx' => 'desc']);

        return $this->load->view('site/order/my_coupon_list', [
            'ele_id' => $this->_req('ele_id'),
            'arr_coupon_detail_idx' => $arr_coupon_detail_idx,
            'cart_data' => $cart_data,
            'results' => $results
        ]);
    }
}
