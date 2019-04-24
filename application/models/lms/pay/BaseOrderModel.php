<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderModel extends WB_Model
{
    public $_table = [
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',
        'cart' => 'lms_cart',
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_sub_product' => 'lms_order_sub_product',
        'order_product_prof_subject' => 'lms_order_product_prof_subject',
        'order_product_delivery_info' => 'lms_order_product_delivery_info',
        'order_delivery_address' => 'lms_order_delivery_address',
        'order_refund_request' => 'lms_order_refund_request',
        'order_product_refund' => 'lms_order_product_refund',
        'order_product_activity_log' => 'lms_order_product_activity_log',
        'order_memo' => 'lms_order_memo',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_lecture_date' => 'lms_product_lecture_date',
        'product_book' => 'lms_product_book',
        'product_book_professor_subject_concat' => 'vw_product_book_r_professor_subject_concat',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'product_division' => 'lms_product_division',
        'product_r_product' => 'lms_product_r_product',
        'product_r_sublecture' => 'lms_product_r_sublecture',
        'product_r_autocoupon' => 'lms_product_r_autocoupon',
        'product_professor_concat' => 'vw_product_r_professor_concat',
        'product_professor_concat_repr' => 'vw_product_r_professor_concat_repr',
        'professor' => 'lms_professor',
        'professor_calculate_rate' => 'lms_professor_calculate_rate',
        'pms_professor' => 'wbs_pms_professor',
        'bms_book' => 'wbs_bms_book',
        'bms_book_combine' => 'wbs_bms_book_combine',
        'my_lecture' => 'lms_my_lecture',
        'lecture_studyinfo' => 'lms_lecture_studyinfo',
        'lecture_extend' => 'lms_lecture_extend',
        'lecture_pause_history' => 'lms_lecture_pause_history',
        'cms_lecture_basics' => 'wbs_cms_lecture_basics',
        'member' => 'lms_member',
        'member_info' => 'lms_member_otherinfo',
        'category' => 'lms_sys_category',
        'course' => 'lms_product_course',
        'subject' => 'lms_product_subject',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];

    // 공통그룹코드 => 결제채널, 결제루트, 결제방법, PG사, 상품구분, 학습형태, 판매형태, 결제상태, 배송상태, 택배사, 결제은행, 결제카드, 관리자부여사유
    public $_group_ccd = ['PayChannel' => '669', 'PayRoute' => '670', 'PayMethod' => '604', 'Pg' => '603', 'ProdType' => '636', 'LearnPattern' => '615', 'SalePattern' => '694'
        , 'PayStatus' => '676', 'DeliveryStatus' => '677', 'DeliveryComp' => '606', 'Bank' => '678', 'Card' => '697', 'AdminReason' => '705', 'Campus' => '605'
    ];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재, 사은품, 배송료, 추가 배송료, 독서실, 사물함, 예치금, 모의고사)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003', 'freebie' => '636004', 'delivery_price' => '636005', 'delivery_add_price' => '636006'
        , 'reading_room' => '636007', 'locker' => '636008', 'deposit' => '636009', 'mock_exam' => '636010'
    ];

    // 학습형태 공통코드 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지, 무료강좌, 단과반, 종합반)
    public $_learn_pattern_ccd = ['on_lecture' => '615001', 'userpack_lecture' => '615002', 'adminpack_lecture' => '615003', 'periodpack_lecture' => '615004', 'on_free_lecture' => '615005', 'off_lecture' => '615006', 'off_pack_lecture' => '615007'];

    // 운영자패키지 타입 공통코드 (일반형, 선택형)
    public $_adminpack_lecture_type_ccd = ['normal' => '648001', 'choice' => '648002'];

    // 판매형태 공통코드 (일반, 재수강, 수강연장)
    public $_sale_pattern_ccd = ['normal' => '694001', 'retake' => '694002', 'extend' => '694003', 'unit' => '694004', 'auto' => '694005'];

    // 판매가능 공통코드 (판매가능, 판매중, 접수중 (학원 단과, 종합반 접수상태))
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001', 'accept' => '675002'];

    // 포인트적용 공통코드 (전체, 강좌, 교재)
    public $_point_apply_ccd = ['all' => '635001', 'lecture' => '635002', 'book' => '635003'];

    // 결제채널 공통코드
    public $_pay_channel_ccd = ['pc' => '669001', 'm' => '669002', 'app' => '669003'];

    // 결제루트 공통코드 (온라인PG, 방문결제, 0원결제, 무료결제, 제휴사결제, 온라인0원, 관리자유료결제)
    public $_pay_route_ccd = ['pg' => '670001', 'visit' => '670002', 'zero' => '670003', 'free' => '670004', 'alliance' => '670005', 'on_zero' => '670006', 'admin_pay' => '670007'];

    // 결제방법 공통코드 (신용카드, 실시간계좌이체, 가상계좌, 휴대폰, 윌비스계좌이체, 방문카드, 방문현금, 방문현금+카드, 방문0원, 관리자유료결제)
    public $_pay_method_ccd = ['card' => '604001', 'direct_bank' => '604002', 'vbank' => '604003', 'phone' => '604004', 'willbes_bank' => '604005', 'visit_card' => '604006', 'visit_cash' => '604007', 'visit_card_cash' => '604008', 'visit_zero' => '604009', 'admin_pay' => '604010'];

    // 결제상태 공통코드 (결제완료, 입금대기, 입금대기취소, 입금대기만료, 접수대기, 환불완료, 신청완료, 취소완료)
    public $_pay_status_ccd = ['paid' => '676001', 'vbank_wait' => '676002', 'vbank_wait_cancel' => '676003', 'vbank_wait_expire' => '676004', 'receipt_wait' => '676005', 'refund' => '676006', 'apply' => '676007', 'cancel' => '676008'];

    // 배송상태 공통코드 (송장등록, 발송준비, 발송취소, 발송완료)
    public $_delivery_status_ccd = ['invoice' => '677001', 'prepare' => '677002', 'cancel' => '677003', 'complete' => '677004'];

    // 주문메모 공통코드 (일반, 배송료입금정보)
    public $_order_memo_type_ccd = ['normal' => '695001', 'delivery_price' => '695002'];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 주문번호 생성 및 리턴 (년월일시분초 (14) + microtime (3) + 랜덤숫자 (3) = 20자리)
     * @return string
     */
    public function makeOrderNo()
    {
        return date_format(date_create(), 'YmdHisv') . '' . str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
    }

    /**
     * 상품타입과 학습형태 공통코드를 조합하여 학습형태 (뷰 테이블) 리턴
     * @param $prod_type
     * @param $learn_pattern_ccd
     * @return false|int|string
     */
    public function getLearnPattern($prod_type, $learn_pattern_ccd)
    {
        $learn_pattern = array_search($learn_pattern_ccd, $this->_learn_pattern_ccd);

        if ($learn_pattern === false) {
            if (is_numeric($prod_type) === true) {
                $learn_pattern = array_search($prod_type, $this->_prod_type_ccd);
            } else {
                $learn_pattern = $prod_type;
            }
        }

        return $learn_pattern;
    }
}
