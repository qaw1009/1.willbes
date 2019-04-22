<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrderFModel extends WB_Model
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
        'order_post_data' => 'lms_order_post_data',
        'product' => 'lms_product',
        'product_lecture' => 'lms_product_lecture',
        'product_book' => 'lms_product_book',
        'product_r_category' => 'lms_product_r_category',
        'product_sale' => 'lms_product_sale',
        'product_division' => 'lms_product_division',
        'product_r_product' => 'lms_product_r_product',
        'product_r_autocoupon' => 'lms_product_r_autocoupon',
        'product_sms' => 'lms_product_sms',
        'bms_book' => 'wbs_bms_book',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'my_lecture' => 'lms_my_lecture',
        'cert_apply' => 'lms_cert_apply',
        'code' => 'lms_sys_code'
    ];

    // 장바구니 상품타입명
    public $_cart_prod_type_name = ['on_lecture' => '강좌', 'off_lecture' => '강좌', 'on_pack_lecture' => '패키지', 'off_pack_lecture' => '패키지', 'book' => '교재',
        'delivery_price' => '배송', 'delivery_add_price' => '배송', 'freebie' => '사은품', 'mock_exam' => '모의고사'
    ];

    // 장바구니 상품타입 순번
    public $_cart_prod_type_idx = ['on_lecture' => '1', 'off_lecture' => '1', 'on_pack_lecture' => '2', 'off_pack_lecture' => '2', 'book' => '3',
        'delivery_price' => '4', 'delivery_add_price' => '4', 'freebie' => '4', 'mock_exam' => '3'
    ];

    // 상품타입 공통코드 (온라인강좌, 학원강좌, 교재, 사은품, 배송료, 추가 배송료, 독서실, 사물함, 예치금, 모의고사)
    public $_prod_type_ccd = ['on_lecture' => '636001', 'off_lecture' => '636002', 'book' => '636003', 'freebie' => '636004', 'delivery_price' => '636005', 'delivery_add_price' => '636006'
        , 'reading_room' => '636007', 'locker' => '636008', 'deposit' => '636009', 'mock_exam' => '636010'
    ];

    // 학습형태 공통코드 (단강좌, 사용자패키지, 운영자패키지, 기간제패키지, 무료강좌, 단과반, 종합반)
    public $_learn_pattern_ccd = ['on_lecture' => '615001', 'userpack_lecture' => '615002', 'adminpack_lecture' => '615003', 'periodpack_lecture' => '615004', 'on_free_lecture' => '615005', 'off_lecture' => '615006', 'off_pack_lecture' => '615007'];

    // 온라인 패키지 학습형태 공통코드 (사용자패키지, 운영자패키지, 기간제패키지)
    public $_on_pack_lecture_pattern_ccd = ['615002', '615003', '615004'];

    // 운영자패키지 타입 공통코드 (일반형, 선택형)
    public $_adminpack_lecture_type_ccd = ['normal' => '648001', 'choice' => '648002'];

    // 학원상품 수강신청 구분 공통코드 (방문, 온라인, 방문+온라인)
    public $_off_study_apply_ccd = ['visit' => '654001', 'online' => '654002', 'visit_online' => '654003'];

    // 판매형태 공통코드 (일반, 재수강, 수강연장)
    public $_sale_pattern_ccd = ['normal' => '694001', 'retake' => '694002', 'extend' => '694003', 'unit' => '694004', 'auto' => '694005'];

    // 판매가능 공통코드 (판매가능, 판매중 (WBS))
    public $_available_sale_status_ccd = ['product' => '618001', 'book' => '112001'];

    // 포인트 구분명 (장바구니 구분명과 맵핑)
    public $_point_type_name = ['on_lecture' => '강좌', 'off_lecture' => '강좌', 'book' => '교재', 'mock_exam' => '강좌'];

    // 포인트적용 공통코드 (전체, 강좌, 교재)
    public $_point_apply_ccd = ['all' => '635001', 'lecture' => '635002', 'book' => '635003'];

    // 결제방법 공통코드
    public $_pay_method_ccd = ['card' => '604001', 'direct_bank' => '604002', 'vbank' => '604003', 'phone' => '604004'];

    // 결제채널 공통코드
    public $_pay_channel_ccd = ['pc' => '669001', 'm' => '669002', 'app' => '669003'];

    // 결제루트 공통코드 (온라인PG, 방문결제, 0원결제, 무료결제, 제휴사결제, 온라인0원)
    public $_pay_route_ccd = ['pg' => '670001', 'visit' => '670002', 'zero' => '670003', 'free' => '670004', 'alliance' => '670005', 'on_zero' => '670006'];

    // 결제상태 공통코드 (결제완료, 입금대기, 입금대기취소, 입금대기만료, 접수대기, 환불완료, 신청완료, 취소완료)
    public $_pay_status_ccd = ['paid' => '676001', 'vbank_wait' => '676002', 'vbank_wait_cancel' => '676003', 'vbank_wait_expire' => '676004', 'receipt_wait' => '676005', 'refund' => '676006', 'apply' => '676007', 'cancel' => '676008'];

    // 배송상태 공통코드 (송장등록, 발송준비, 발송취소, 발송완료)
    public $_delivery_status_ccd = ['invoice' => '677001', 'prepare' => '677002', 'cancel' => '677003', 'complete' => '677004'];

    // 결제은행 공통 그룹코드
    public $_bank_group_ccd = '678';

    // 장바구니 식별자 세션명
    public $_sess_cart_idx_name = 'usable_cart_idx';

    // 학원 방문결제 장바구니 세션 아이디 세션명
    public $_sess_cart_sess_id = 'make_sessionid';

    // 주문번호 세션명
    public $_sess_order_no_name = 'order_no';
    
    // 중복 접근방지 주문번호 세션명
    public $_sess_proc_order_no_name = 'proc_order_no';

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
     * 교재상품 배송료 계산 (무료교재일 경우 배송료 부과)
     * @param $price
     * @return int
     */
    public function getBookDeliveryPrice($price)
    {
        return $price < config_app('DeliveryFreePrice', 0) ? config_app('DeliveryPrice', 0) : 0;
    }

    /**
     * 추가 배송료 계산
     * @param $zipcode
     * @return int
     */
    public function getDeliveryAddPrice($zipcode)
    {
        return in_array(substr($zipcode, 0, 2), config_item('delivery_add_price_charge_zipcode')) === true ? config_app('DeliveryAddPrice', 0) : 0;
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

    /**
     * 장바구니 식별자 세션 체크 및 리턴
     * @param bool $is_error_alert 세션값이 없을 경우 스크립트 에러 리턴 여부
     * @return bool|mixed
     */
    public function checkSessCartIdx($is_error_alert = true)
    {
        $sess_cart_idx = $this->session->userdata($this->_sess_cart_idx_name);

        if (empty($sess_cart_idx) === true) {
            if ($is_error_alert === true) {
                show_alert('잘못된 접근입니다.', site_url('/cart/index'), false);
            } else {
                return false;
            }
        }

        return $sess_cart_idx;
    }

    /**
     * 장바구니 식별자 세션 생성
     * @param array $arr_cart_idx
     */
    public function makeSessCartIdx($arr_cart_idx = [])
    {
        $this->destroySessCartIdx();
        $this->session->set_userdata($this->_sess_cart_idx_name, $arr_cart_idx);
    }

    /**
     * 장바구니 식별자 세션 삭제
     */
    public function destroySessCartIdx()
    {
        $this->session->unset_userdata($this->_sess_cart_idx_name);
    }

    /**
     * 주문번호 세션 체크 및 리턴
     * @param bool $is_error_alert 세션값이 없을 경우 스크립트 에러 리턴 여부
     * @return mixed
     */
    public function checkSessOrderNo($is_error_alert = true)
    {
        $sess_order_no = $this->session->userdata($this->_sess_order_no_name);

        if (empty($sess_order_no) === true) {
            if ($is_error_alert === true) {
                show_alert('잘못된 접근입니다.', site_url('/cart/index'), false);
            } else {
                return false;
            }
        }

        return $sess_order_no;
    }

    /**
     * 주문번호 세션 생성
     * @param string $order_no
     */
    public function makeSessOrderNo($order_no = '')
    {
        $this->destroySessOrderNo();
        empty($order_no) === true && $order_no = $this->makeOrderNo();
        $this->session->set_userdata($this->_sess_order_no_name, $order_no);
    }

    /**
     * 주문번호 세션 삭제
     */
    public function destroySessOrderNo()
    {
        $this->session->unset_userdata($this->_sess_order_no_name);
    }

    /**
     * 중복 접근방지 주문번호 세션과 주문번호 비교, 주문번호가 동일하다면 에러 처리 
     * @param int $order_no
     * @param bool $is_error_alert
     * @return bool|mixed
     */
    public function checkSessProcOrderNo($order_no, $is_error_alert = true)
    {
        $sess_proc_order_no = $this->session->userdata($this->_sess_proc_order_no_name);

        if ($sess_proc_order_no == $order_no) {
            if ($is_error_alert === true) {
                show_alert('잘못된 접근입니다.', site_url('/cart/index'), false);
            } else {
                return false;
            }
        }

        return $sess_proc_order_no;
    }    

    /**
     * 중복 접근방지 주문번호 세션 생성
     * @param string $order_no
     */
    public function makeSessProcOrderNo($order_no)
    {
        $this->destroySessProcOrderNo();
        $this->session->set_userdata($this->_sess_proc_order_no_name, $order_no);
    }

    /**
     * 중복 접근방지 주문번호 세션 삭제
     */
    public function destroySessProcOrderNo()
    {
        $this->session->unset_userdata($this->_sess_proc_order_no_name);
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
     * 상품코드 재정의 및 강좌, 교재상품 혼재 여부 리턴
     * @param string $learn_pattern [학습형태]
     * @param array $arr_prod_code [상품코드배열, 상품코드:가격구분 공통코드:부모상품코드:학습형태(교재구매일 경우만 존재, book)]
     * @return array
     */
    public function makeProdCodeArray($learn_pattern, $arr_prod_code)
    {
        $results = [];
        $lecture_cnt = 0;
        $book_cnt = 0;

        foreach ($arr_prod_code as $idx => $val) {
            $tmp_arr = explode(':', $val);

            if (isset($tmp_arr[3]) === true && empty($tmp_arr[3]) === false) {
                if ($tmp_arr[3] == 'book') {
                    $book_cnt++;
                } else {
                    $lecture_cnt++;
                }

                $_learn_pattern = $tmp_arr[3];
            } else {
                if ($tmp_arr[0] == $tmp_arr[2]) {
                    $_learn_pattern = $learn_pattern;
                    $lecture_cnt++;
                } else {
                    $_learn_pattern = 'book';
                    $book_cnt++;
                }
            }

            $results['data'][$tmp_arr[0]] = ['LearnPattern' => $_learn_pattern, 'ProdCode' => $tmp_arr[0], 'SaleTypeCcd' => $tmp_arr[1], 'ParentProdCode' => $tmp_arr[2]];
        }

        $results['is_mixed'] = $lecture_cnt > 0 && $book_cnt > 0;

        return $results;
    }
}
