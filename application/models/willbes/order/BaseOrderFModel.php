<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderFModel extends WB_Model
{
    public $_table = [
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_book' => 'lms_product_book',
        'product_sale' => 'lms_product_sale',
        'product_r_product' => 'lms_product_r_product',
        'bms_book' => 'wbs_bms_book',
    ];

    // 장바구니 구분명
    public $_cart_type_name = ['on_lecture' => '강좌', 'book' => '교재'];

    // 장바구니 상품타입명
    public $_cart_prod_type_name = ['on_lecture' => '강좌', 'on_package' => '패키지', 'book' => '교재'];

    // 상품타입 공통코드
    public $_prod_type_ccd = ['on_lecture' => '636001', 'book' => '636003'];

    // 학습형태 공통코드
    public $_learn_pattern_ccd = ['on_lecture' => '615001', 'user_package' => '615002', 'admin_package' => '615003', 'period_package' => '615004'];

    // 패키지 학습형태 공통코드
    public $_package_pattern_ccd = ['615002', '615003', '615004'];

    // 판매가능 공통코드
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001'];

    // 수강생 교재 공통코드
    public $_student_book_ccd = '610003';

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
