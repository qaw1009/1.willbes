<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderFModel extends WB_Model
{
    public $_table = [
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_delivery_address' => 'lms_order_delivery_address',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_book' => 'lms_product_book',
        'product_sale' => 'lms_product_sale',
        'product_division' => 'lms_product_division',
        'product_r_product' => 'lms_product_r_product',
        'bms_book' => 'wbs_bms_book',
    ];

    // 장바구니 구분명
    public $_cart_type_name = ['on_lecture' => '강좌', 'book' => '교재'];

    // 장바구니 상품타입명
    public $_cart_prod_type_name = ['on_lecture' => '강좌', 'on_package' => '패키지', 'book' => '교재'];

    // 장바구니 상품타입 순번
    public $_cart_prod_type_idx = ['on_lecture' => '1', 'on_package' => '2', 'book' => '3'];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003'];

    // 학습형태 공통코드 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지)
    public $_learn_pattern_ccd = ['on_lecture' => '615001', 'user_package' => '615002', 'admin_package' => '615003', 'period_package' => '615004'];

    // 패키지 학습형태 공통코드 (사용자패키지, 운영자패키지, 기간제패키지)
    public $_package_pattern_ccd = ['615002', '615003', '615004'];

    // 운영자패키지 타입 공통코드 (일반형, 선택형)
    public $_admin_package_type_ccd = ['normal' => '648001', 'choice' => '648002'];

    // 판매가능 공통코드 (판매가능, 판매중)
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001'];

    // 수강생 교재 공통코드
    public $_student_book_ccd = '610003';

    // 상품타입과 쿠폰적용구분 공통코드 맵핑 (온라인강좌, 학원강좌, 교재, 사은품, 배송료)
    public $_coupon_apply_type_ccd = ['636001' => '645001', '636002' => '645004', '636003' => '645005', '636004' => 'x', 'delivery_price' => '645006'];

    // 학습형태와 쿠폰상세구분 공통코드 맵핑 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지, 무료강좌, 단과반, 종합반)
    public $_coupon_lec_type_ccd = ['615001' => '646001', '615002' => 'x', '615003' => '646002', '615004' => '646003', '615005' => 'x', '615006' => '646004', '615007' => '646005'];

    // 장바구니 식별자 세션명
    public $_sess_cart_idx_name = 'usable_cart_idx';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌상품 배송료 계산 (미부과 상품이 하나라도 있을 경우 0원)
     * @param array $arr_is_freebies_trans [강좌상품별 사은품/무료교재 배송료 부과여부 배열]
     * @return int
     */
    public function getLectureDeliveryPrice($arr_is_freebies_trans = [])
    {
        return empty($arr_is_freebies_trans) === true || array_search('N', $arr_is_freebies_trans) !== false ? 0 : config_app('DeliveryPrice', 0);
    }

    /**
     * 교재상품 배송료 계산
     * @param $price
     * @return int
     */
    public function getBookDeliveryPrice($price)
    {
        return $price > 0 && $price < config_app('DeliveryFreePrice', 0) ? config_app('DeliveryPrice', 0) : 0;
    }

    /**
     * 장바구니 식별자 세션 체크 및 리턴
     * @return mixed
     */
    public function checkSessCartIdx()
    {
        $sess_cart_idx = $this->session->userdata($this->_sess_cart_idx_name);
        empty($sess_cart_idx) === true && show_alert('잘못된 접근입니다.', site_url('/cart/index/cate/' . config_app('CateCode')), false);

        return $sess_cart_idx;
    }

    /**
     * 장바구니 식별자 세션 생성
     * @param array $arr_cart_idx
     */
    public function makeSessCartIdx($arr_cart_idx = [])
    {
        $this->session->set_userdata($this->_sess_cart_idx_name, $arr_cart_idx);
    }

    /**
     * 장바구니 식별자 세션 삭제
     */
    public function destroySessCartIdx()
    {
        $this->session->unset_userdata($this->_sess_cart_idx_name);
    }
}
