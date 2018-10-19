<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderModel extends WB_Model
{
    protected $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_sub_product' => 'lms_order_sub_product',
        'order_product_delivery_info' => 'lms_order_product_delivery_info',
        'order_delivery_address' => 'lms_order_delivery_address',
        'order_memo' => 'lms_order_memo',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_book' => 'lms_product_book',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'product_division' => 'lms_product_division',
        'product_r_product' => 'lms_product_r_product',
        'product_professor_concat' => 'vw_product_r_professor_concat',
        'bms_book' => 'wbs_bms_book',
        'my_lecture' => 'lms_my_lecture',
        'member' => 'lms_member',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    // 공통그룹코드 => 결제채널, 결제루트, 결제방법, 상품구분, 학습형태, 결제상태, 배송상태
    public $_group_ccd = ['PayChannel' => '669', 'PayRoute' => '670', 'PayMethod' => '604', 'ProdType' => '636', 'LearnPattern' => '615', 'PayStatus' => '676', 'DeliveryStatus' => '677'];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재, 사은품, 배송료, 추가 배송료, 독서실, 사물함, 예치금, 수강연장, 재수강, 모의고사)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003', 'freebie' => '636004', 'delivery_price' => '636005', 'delivery_add_price' => '636006'
        , 'reading_room' => '636007', 'locker' => '636008', 'deposit' => '636009', 'extend_lecture' => '636010', 'again_lecture' => '636011', 'mock_exam' => '636012'
    ];

    // 학습형태 공통코드 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지, 무료강좌, 단과반, 종합반)
    public $_learn_pattern_ccd = ['on_lecture' => '615001', 'userpack_lecture' => '615002', 'adminpack_lecture' => '615003', 'periodpack_lecture' => '615004', 'on_free_lecture' => '615005', 'off_lecture' => '615006', 'off_pack_lecture' => '615007'];

    // 운영자패키지 타입 공통코드 (일반형, 선택형)
    public $_adminpack_lecture_type_ccd = ['normal' => '648001', 'choice' => '648002'];

    // 결제루트 공통코드
    public $_pay_route_ccd = ['pg' => '670001', 'visit' => '670002', 'zero' => '670003', 'free' => '670004', 'alliance' => '670005'];

    // 결제방법 공통코드
    public $_pay_method_ccd = ['card' => '604001', 'direct_bank' => '604002', 'vbank' => '604003', 'phone' => '604004'];

    // 결제상태 공통코드 (결제완료, 입금대기, 입금대기취소, 입금대기만료, 접수대기, 환불완료, 신청완료, 취소완료)
    public $_pay_status_ccd = ['paid' => '676001', 'vbank_wait' => '676002', 'vbank_wait_cancel' => '676003', 'vbank_wait_expire' => '676004', 'receipt_wait' => '676005', 'refund' => '676006', 'apply' => '676007', 'cancel' => '676008'];

    // 판매가능 공통코드 (판매가능, 판매중, 접수중 (학원 단과, 종합반 접수상태))
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001', 'accept' => '675002'];

    public function __construct()
    {
        parent::__construct('lms');
    }
}
