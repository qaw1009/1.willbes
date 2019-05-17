<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class OrderFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();

        // 사용 모델 로드
        $this->load->loadModels(['product/productF', 'couponF', 'pointF', 'order/cartF', 'order/orderListF']);
    }

    /**
     * 장바구니 데이터 가공
     * @param string $make_type [데이터 생성구분, 주문 : order, 결제 : pay, 사용포인트 체크 : check_use_point]
     * @param string $cart_type [장바구니 구분, 온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book]
     * @param array $cart_rows [유효한 장바구니 데이터]
     * @param array $arr_coupon_detail_idx [장바구니별 적용된 사용자쿠폰 식별자]
     * @param int $use_point [결제 사용 포인트]
     * @param string $zipcode [배송지 주소 우편번호 (추가 배송료 계산용)]
     * @param string $is_visit_pay [방문결제여부]
     * @return array|bool|string
     */
    public function getMakeCartReData($make_type, $cart_type, $cart_rows = [], $arr_coupon_detail_idx = [], $use_point = 0, $zipcode = '', $is_visit_pay = 'N')
    {
        if (empty($cart_rows) === true) {
            return '장바구니 데이터가 없습니다.';
        }

        $results = [];
        $total_prod_cnt = 0;
        $total_prod_order_price = 0;
        $total_prod_pay_price = 0;
        $total_use_point_target_price = 0;
        $total_coupon_disc_price = 0;
        $total_save_lec_point = 0;
        $total_save_book_point = 0;
        $total_save_point = 0;
        $delivery_price = 0;
        $delivery_pay_price = 0;
        $delivery_add_price = 0;
        $is_delivery_info = false;
        $is_package = false;
        $arr_user_coupon_idx = [];
        $use_point = get_var($use_point, 0);

        foreach ($cart_rows as $idx => $row) {
            // 장바구니 구분과 실제 상품구분 값 비교 (온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book, 기타 : etc (배송료))
            if ($cart_type != $row['CartType'] && $row['CartType'] != 'etc') {
                return '장바구니와 주문상품의 구분이 일치하지 않습니다.';
            }

            // 사용자 패키지 가격 확인
            if ($row['LearnPatternCcd'] == $this->_learn_pattern_ccd['userpack_lecture']) {
                if (empty($row['CalcPriceData']) === true || $row['CalcPriceData'] == 'NODATA') {
                    return '사용자 패키지 가격정보가 올바르지 않습니다.';
                }

                // 주문상품서브 가격정보
                $row['SubRealSalePrice'] = json_decode($row['SubRealSalePrice'], true);
            }

            // 주문정보 입력에서만 수강생교재 체크
            if ($make_type == 'order') {
                if ($row['CartProdType'] == 'book') {
                    $check_student_book = $this->cartFModel->checkStudentBook($row['SiteCode'], $row['ProdCode'], $row['ParentProdCode']);
                    if ($check_student_book !== true) {
                        return $check_student_book;
                    }
                }
            }

            // 상품 결제금액 초기화
            $row['RealPayPrice'] = $row['RealSalePrice'];

            if ($make_type == 'order') {
                // 주문정보 입력에서 필요한 데이터 생성
                // 상품구분명 / 상품구분명 색상 class 번호
                $row['CartProdTypeName'] = $this->_cart_prod_type_name[$row['CartProdType']];
                $row['CartProdTypeNum'] = $this->_cart_prod_type_idx[$row['CartProdType']];

                // 강좌시작일 설정 (온라인강좌 + 강좌시작일 설정 가능일 경우)
                $row['DefaultStudyStartDate'] = $row['DefaultStudyEndDate'] = $row['IsStudyStartDate'] = '';

                if ($row['CartType'] == 'on_lecture' && $row['IsLecStart'] == 'Y') {
                    $today_date = date('Y-m-d');    // 결제일

                    if (empty($row['StudyStartDate']) === false && $today_date < $row['StudyStartDate']) {
                        // 개강일이 오늘 날짜보다 이후 인 경우 (개강하지 않은 상품)
                        $row['DefaultStudyStartDate'] = $row['StudyStartDate'];     // 개강일
                        $row['IsStudyStartDate'] = 'N';
                    } else {
                        // 이미 개강한 상품
                        $row['DefaultStudyStartDate'] = date('Y-m-d', strtotime($today_date . ' +7 day'));    // 결제일 익일 + 7일
                        $row['IsStudyStartDate'] = 'Y';
                    }
                    $row['DefaultStudyEndDate'] = date('Y-m-d', strtotime($row['DefaultStudyStartDate'] . ' +' . ($row['StudyPeriod'] - 1) . ' day'));
                }
            } else {
                // 결제할 경우 쿠폰할인금액 조회
                $coupon_disc_row = $this->getCouponDiscPrice(element($row['CartIdx'], $arr_coupon_detail_idx, ''), $row);
                $row['UserCouponIdx'] = $coupon_disc_row['UserCouponIdx'];
                $row['CouponDiscPrice'] = $coupon_disc_row['CouponDiscPrice'];
                $row['CouponDiscType'] = $coupon_disc_row['CouponDiscType'];
                $row['CouponDiscRate'] = $coupon_disc_row['CouponDiscRate'];

                $row['RealPayPrice'] -= $row['CouponDiscPrice'];
                $total_coupon_disc_price += $row['CouponDiscPrice'];
                $arr_user_coupon_idx[$row['CartIdx']] = $row['UserCouponIdx'];
            }

            // 적립 포인트 (학원강좌, 배송료 상품일 경우 포인트 적립 불가, 포인트/쿠폰을 사용한 경우 포인트 적립 불가)
            $row['RealSavePoint'] = 0;
            $row['RealSaveLecPoint'] = 0;
            $row['RealSaveBookPoint'] = 0;

            if (($make_type == 'pay' && ($use_point > 0 || $row['CouponDiscPrice'] > 0)) || $row['IsPoint'] != 'Y') {
                // do nothing
            } else {
                $row['RealSavePoint'] = $row['PointSaveType'] == 'R' ? (int) ($row['RealPayPrice'] * ($row['PointSavePrice'] / 100)) : $row['PointSavePrice'];

                if ($row['PointApplyCcd'] == $this->_point_apply_ccd['book']) {
                    $row['RealSaveBookPoint'] = $row['RealSavePoint'];
                } else {
                    $row['RealSaveLecPoint'] = $row['RealSavePoint'];
                }
            }

            // 배송정보 입력 여부
            if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                $is_delivery_info = true;
            }

            // 패키지상품 포함 여부
            if ($is_package === false && ends_with($row['CartProdType'], '_pack_lecture') === true) {
                $is_package = true;
            }

            if ($row['CartProdType'] == 'delivery_price') {
                // 주문 배송료, 실제 결제 배송료
                $delivery_price = $row['RealSalePrice'];
                $delivery_pay_price = $row['RealPayPrice'];
            } else {
                // 전체상품 주문금액, 실제 결제금액, 실제 적립 포인트, 전체상품수
                $total_prod_order_price += $row['RealSalePrice'];
                $total_prod_pay_price += $row['RealPayPrice'];
                $total_save_lec_point += $row['RealSaveLecPoint'];
                $total_save_book_point += $row['RealSaveBookPoint'];
                $total_save_point += $row['RealSavePoint'];
                $total_prod_cnt++;
            }

            if ($row['IsUsePoint'] == 'Y') {
                // 포인트 사용 가능상품의 실제 결제금액 합계 (온라인 단강좌, 온라인 수강연장, 교재상품만 구매할 경우 사용 가능)
                $total_use_point_target_price += $row['RealPayPrice'];
            }

            $results['list'][] = $row;
        }

        // 사용포인트 체크 (온라인 단강좌, 교재상품만 구매할 경우 사용 가능)
        if ($make_type == 'pay' || $make_type == 'check_use_point') {
            $check_use_point = $this->checkUsePoint($cart_type, $use_point, $total_use_point_target_price);

            if ($make_type == 'pay') {
                if ($check_use_point !== true) {
                    return $check_use_point;
                }
            } else {
                return $check_use_point;
            }
        }

        // 추가 배송료 계산
        if ($make_type == 'pay' && $delivery_price > 0) {
            $delivery_add_price = $this->getDeliveryAddPrice($zipcode);
        }

        $results['total_prod_cnt'] = $total_prod_cnt;   // 전체상품 갯수 (배송료 상품 제외)
        $results['total_prod_order_price'] = $total_prod_order_price;     // 전체 상품주문금액
        $results['total_prod_pay_price'] = $total_prod_pay_price;     // 전체 상품결제금액
        $results['total_use_point_target_price'] = $total_use_point_target_price;     // 포인트 사용 가능상품의 실제 결제금액
        $results['delivery_price'] = $delivery_price;   // 배송료
        $results['delivery_pay_price'] = $delivery_pay_price;   // 실제 결제 배송료
        $results['delivery_add_price'] = $delivery_add_price;   // 추가 배송료
        $results['total_pay_price'] = $total_prod_pay_price + $delivery_pay_price + $delivery_add_price - $use_point;    // 실제 결제금액 + 실제 결제 배송료 + 추가 배송료 - 사용포인트
        $results['total_coupon_disc_price'] = $total_coupon_disc_price; // 전체 쿠폰할인금액
        $results['user_coupon_idxs'] = $arr_user_coupon_idx;     // 유효한 사용자 쿠폰식별자 배열
        $results['total_save_lec_point'] = $total_save_lec_point;     // 전체 적립예정 강좌포인트
        $results['total_save_book_point'] = $total_save_book_point;     // 전체 적립예정 교재포인트
        $results['total_save_point'] = $total_save_point;     // 전체 적립예정포인트
        $results['use_point'] = $use_point;     // 사용포인트
        $results['is_delivery_info'] = $is_delivery_info;   // 배송정보 입력 여부
        $results['is_package'] = $is_package;   // 패키지상품 포함 여부
        $results['is_available_use_point'] = $total_use_point_target_price > 0;  // 포인트 사용 가능여부
        $results['repr_prod_name'] = $results['list'][0]['ProdName'] . ($total_prod_cnt > 1 ? ' 외 ' . ($total_prod_cnt - 1) . '건' : '');   // 대표 주문상품명
        $results['cart_type'] = $cart_type;

        return $results;
    }

    /**
     * 주문상품 쿠폰적용 할인금액 리턴
     * @param int $coupon_detail_idx [사용자쿠폰식별자]
     * @param array $cart_row [상품별 장바구니 데이터 배열]
     * @return array
     */
    public function getCouponDiscPrice($coupon_detail_idx, $cart_row = [])
    {
        if (empty($coupon_detail_idx) === true || empty($cart_row) === true || $cart_row['IsCoupon'] != 'Y') {
            return ['UserCouponIdx' => '', 'CouponDiscPrice' => 0, 'CouponDiscType' => 'R', 'CouponDiscRate' => 0];
        }

        // 쿠폰적용구분 공통코드
        if (ends_with($cart_row['SalePatternCcd'], '001') === true) {
            // 판매형태 공통코드가 일반일 경우 상품구분 공통코드로 확인
            $coupon_apply_type_ccd = element($cart_row['ProdTypeCcd'], $this->couponFModel->_coupon_apply_type_ccd);
        } else {
            // 판매형태 공통코드가 일반이 아닐 경우 판매형태 공통코드로 확인
            $coupon_apply_type_ccd = element($cart_row['SalePatternCcd'], $this->couponFModel->_coupon_apply_type_ccd);
        }

        $arr_param = [
            'SiteCode' => $cart_row['SiteCode'],
            'CateCode' => $cart_row['CateCode'],
            'CouponTypeCcd' => $this->couponFModel->_coupon_type_ccd['coupon'],
            'ApplyTypeCcd' => $coupon_apply_type_ccd,
            'LecTypeCcd' => element($cart_row['LearnPatternCcd'], $this->couponFModel->_coupon_lec_type_ccd),
            'RealSalePrice' => $cart_row['RealSalePrice'],
            'SchoolYear' => $cart_row['SchoolYear'],
            'CourseIdx' => $cart_row['CourseIdx'],
            'SubjectIdx' => $cart_row['SubjectIdx'],
            'ProfIdx' => $cart_row['ProfIdx'],
            'ProdCode' => $cart_row['ProdCode'],
            'CdIdx' => $coupon_detail_idx
        ];

        // 쿠폰 정보
        $coupon_row = element('0', $this->couponFModel->listMemberProductCoupon(false, $arr_param), []);
        if (empty($coupon_row) === true) {
            return ['UserCouponIdx' => '', 'CouponDiscPrice' => 0, 'CouponDiscType' => 'R', 'CouponDiscRate' => 0];
        }
        
        // 할인금액 계산
        $coupon_disc_price = $coupon_row['DiscType'] === 'R' ? (int) ($cart_row['RealSalePrice'] * ($coupon_row['DiscRate'] / 100)) : $coupon_row['DiscRate'];

        return ['UserCouponIdx' => $coupon_detail_idx, 'CouponDiscPrice' => $coupon_disc_price, 'CouponDiscType' => $coupon_row['DiscType'], 'CouponDiscRate' => $coupon_row['DiscRate']];
    }

    /**
     * 사용포인트 체크
     * @param string $cart_type [장바구니 구분, 온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book]
     * @param int $use_point [사용 포인트]
     * @param int $total_use_point_target_price [포인트 사용 가능상품의 실제 결제금액 합계, 온라인 단강좌, 온라인 수강연장, 교재 상품만 포인트 사용 가능]
     * @return bool|string
     */
    public function checkUsePoint($cart_type, $use_point, $total_use_point_target_price)
    {
        if ($use_point < 1) {
            return true;
        }

        if ($total_use_point_target_price < 1) {
            return '온라인 단강좌, 수강연장, 교재 상품만 포인트 사용이 가능합니다.';
        }

        // 사용 포인트 설정
        $use_min_point = config_item('use_min_point');  // 최소 사용 포인트
        $use_point_unit = config_item('use_point_unit');    // 포인트 사용 단위
        $use_max_point_rate = config_item('use_max_point_rate');    // 결제금액 대비 포인트 사용 가능 최대 비율
        $use_max_point = (int) ($total_use_point_target_price * ($use_max_point_rate / 100));

        if ($use_point > $use_max_point) {
            return '포인트는 주문금액의 ' . $use_max_point_rate . '%까지만 사용 가능합니다.' . PHP_EOL . '(최대 사용가능 포인트 : ' . number_format($use_max_point) . 'P)';
        }

        // 회원 보유포인트
        $has_point = $this->pointFModel->getMemberPoint($cart_type == 'book' ? 'book' : 'lecture');

        if ($has_point < $use_point) {
            return '보유 포인트가 부족합니다.';
        }

        if ($use_point < $use_min_point || $has_point < $use_min_point || ($use_point % $use_point_unit != 0)) {
            return '포인트는 ' . number_format($use_min_point) . 'P부터 ' . $use_point_unit . 'P 단위로 사용 가능합니다.';
        }

        return true;
    }

    /**
     * 결제요청시 주문 입력값 저장
     * @param array $params [결제요청 필수 파라미터]
     * @param array $input [주문 폼 데이터]
     * @return array|bool
     */
    public function addOrderPostData($params = [], $input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'OrderNo' => element('order_no', $params),
                'MemIdx' => $this->session->userdata('mem_idx'),
                'CartType' => element('cart_type', $params),
                'CartIdxs' => implode(',', element('cart_idxs', $params)),
                'SiteCode' => element('site_code', $params),
                'PgCcd' => element('pg_ccd', $params),
                'PayMethodCcd' => element('pay_method_ccd', $params),
                'ReprProdName' => element('repr_prod_name', $params),
                'OrderProdPrice' => element('order_prod_price', $params),
                'ReqPayPrice' => element('req_pay_price', $params),
                'DeliveryPrice' => element('delivery_price', $params),
                'DeliveryAddPrice' => element('delivery_add_price', $params),
                'CouponDiscPrice' => element('coupon_disc_price', $params),
                'UsePoint' => element('use_point', $params),
                'SaveLecPoint' => element('save_lec_point', $params, 0),
                'SaveBookPoint' => element('save_book_point', $params, 0),
                'UserCouponIdxJson' => element('user_coupon_idx_json', $params, ''),
                'PostData' => serialize($input),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_post_data']) === false) {
                throw new \Exception('주문요청 데이터 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 주문요청 데이터 삭제
     * @param $order_no
     * @param string $mem_idx
     * @return array|bool
     */
    public function removeOrderPostData($order_no, $mem_idx = '')
    {
        $this->_conn->trans_begin();

        try {
            if (empty($order_no) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            $is_delete = $this->_conn->makeWhere(['EQ' => ['OrderNo' => $order_no, 'MemIdx' => $mem_idx]])->delete($this->_table['order_post_data']);
            if ($is_delete === false) {
                throw new \Exception('주문요청 데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 주문 데이터 등록
     * @param array $pay_results
     * @return array|bool
     */
    public function procOrder($pay_results = [])
    {
        $order_no = $pay_results['order_no'];   // 결제모듈에서 전달받은 주문번호

        $this->_conn->trans_begin();
        
        try {
            // 중복 접근 방지
            $this->checkSessProcOrderNo($order_no);
            $this->makeSessProcOrderNo($order_no);
            
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $sess_cart_idx = $this->checkSessCartIdx(false);    // 장바구니 식별자 세션 체크
            $sess_order_no = $this->checkSessOrderNo(false);    // 주문번호 세션 체크

            if ($sess_cart_idx === false || $sess_order_no === false || $order_no != $sess_order_no || isset($pay_results['total_pay_price']) === false) {
                throw new \Exception('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
            }

            // 주문요청 데이터 조회
            $post_row = $this->_conn->getFindResult($this->_table['order_post_data'],
                'CartType, CartIdxs, SiteCode, PgCcd, PayMethodCcd, ReprProdName, OrderProdPrice, ReqPayPrice, DeliveryPrice, DeliveryAddPrice, CouponDiscPrice, UsePoint, SaveLecPoint, SaveBookPoint, UserCouponIdxJson, PostData',
                ['EQ' => ['OrderNo' => $order_no, 'MemIdx' => $sess_mem_idx]]
            );

            if (empty($post_row) === true) {
                throw new \Exception('주문요청 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 장바구니 식별자 세션과 결제요청 장바구니 식별자 비교
            if (empty(array_diff($sess_cart_idx, explode(',', $post_row['CartIdxs']))) === false) {
                throw new \Exception('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
            }

            // PG결제일 경우 필수 파라미터 체크
            if (isset($pay_results['mid']) === true || $pay_results['total_pay_price'] > 0) {
                if (empty(element('mid', $pay_results)) === true) {
                    throw new \Exception('PG사 상점 아이디가 없습니다.', _HTTP_BAD_REQUEST);
                }

                if (empty(element('tid', $pay_results)) === true) {
                    throw new \Exception('PG사 결제 거래번호가 없습니다.', _HTTP_BAD_REQUEST);
                }

                if (empty($post_row['PgCcd']) === true || empty($post_row['PayMethodCcd']) === true) {
                    throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
                }
            }

            $post_data = unserialize($post_row['PostData']);    // 주문 폼 데이터 unserialize
            $arr_user_coupon_idx = json_decode($post_row['UserCouponIdxJson'], true);   // 사용자 쿠폰
            $is_vbank = $this->_pay_method_ccd['vbank'] == $post_row['PayMethodCcd'];   // 가상계좌 여부
            $pay_status_ccd = $is_vbank === true ? $this->_pay_status_ccd['vbank_wait'] : $this->_pay_status_ccd['paid'];    // 주문완료 결제상태공통코드 (결제완료/입금대기)
            $is_escrow = element('is_escrow', $post_data, 'N'); // 에스크로 결제 여부
            
            // 장바구니 조회
            $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $post_row['SiteCode'], null, $sess_cart_idx, null, null, 'N');

            // 장바구니 데이터 가공
            $cart_results = $this->getMakeCartReData(
                'pay', $post_row['CartType'], $cart_rows, $arr_user_coupon_idx, $post_row['UsePoint'], element('zipcode', $post_data, '')
            );

            if (is_array($cart_results) === false) {
                throw new \Exception($cart_results);
            }

            // 로컬서버가 아닐 경우 체크 ==> TODO : 서버 환경별 실행
            if (ENVIRONMENT != 'local') {
                // 결제요청금액, 실제결제금액, 장바구니 재계산 금액이 모두 일치하는지 여부 확인
                if ($pay_results['total_pay_price'] != $post_row['ReqPayPrice'] || $pay_results['total_pay_price'] != $cart_results['total_pay_price']) {
                    throw new \Exception('결제금액이 일치하지 않습니다.', _HTTP_BAD_REQUEST);
                }
            }

            // 주문 데이터 등록
            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $post_row['SiteCode'],
                'ReprProdName' => $post_row['ReprProdName'],
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => $cart_results['total_pay_price'] > 0 ? element('pg', $this->_pay_route_ccd) : element('on_zero', $this->_pay_route_ccd),   // PG결제 or 온라인 0원결제
                'PayMethodCcd' => $post_row['PayMethodCcd'],
                'PgCcd' => $post_row['PgCcd'],
                'PgMid' => element('mid', $pay_results, ''),
                'PgTid' => element('tid', $pay_results, ''),
                'OrderPrice' => $post_row['OrderProdPrice'] + $post_row['DeliveryPrice'] + $post_row['DeliveryAddPrice'],
                'OrderProdPrice' => $post_row['OrderProdPrice'],
                'RealPayPrice' => $cart_results['total_pay_price'],
                'CardPayPrice' => $cart_results['total_pay_price'],
                'CashPayPrice' => 0,
                'DeliveryPrice' => $post_row['DeliveryPrice'],
                'DeliveryAddPrice' => $post_row['DeliveryAddPrice'],
                'DiscPrice' => $post_row['CouponDiscPrice'],
                'UseLecPoint' => ($post_row['CartType'] == 'book' ? 0 : $post_row['UsePoint']),
                'UseBookPoint' => ($post_row['CartType'] == 'book' ? $post_row['UsePoint'] : 0),
                'SaveLecPoint' => $post_row['SaveLecPoint'],
                'SaveBookPoint' => $post_row['SaveBookPoint'],
                'IsEscrow' => $is_escrow,
                'IsCashReceipt' => 'N',
                'IsDelivery' => ($cart_results['is_delivery_info'] === true ? 'Y' : 'N'),
                'IsVisitPay' => 'N',
                'GwIdx' => $this->session->userdata('gw_idx'),
                'OrderIp' => $this->input->ip_address()
            ];

            if ($is_vbank === false) {
                $this->_conn->set('CompleteDatm', 'NOW()', false);
            } else {
                // PG사 은행코드에 해당하는 공통코드 조회
                $ccd_row = $this->_conn->getFindResult($this->_table['code'], 'Ccd', [
                    'EQ' => ['GroupCcd' => $this->_bank_group_ccd],
                    'RAW' => ['json_value(CcdEtc, "$.' . $post_row['PgCcd'] . '") = ' => $pay_results['vbank_code']]
                ]);
                $vbank_ccd = empty($ccd_row) === true ? $pay_results['vbank_name'] : $ccd_row['Ccd'];

                $data = array_merge($data, [
                    'VBankCcd' => $vbank_ccd,
                    'VBankAccountNo' => $pay_results['vbank_account_no'],
                    'VBankDepositName' => $pay_results['vbank_deposit_name'],
                    'VBankExpireDatm' => $pay_results['vbank_expire_datm']
                ]);
            }

            if ($this->_conn->set($data)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터에 사용포인트 컬럼 추가 (실제 결제금액 대비 사용 포인트 분할)
            if ($post_row['UsePoint'] > 0 && $cart_results['total_use_point_target_price'] > 0) {
                $cart_results['list'] = $this->getUsePointDivisionCartData($post_row['UsePoint'], $cart_results['total_use_point_target_price'], $cart_results['list']);
            }

            // 주문상품 데이터 등록
            foreach ($cart_results['list'] as $idx => $cart_row) {
                // 상품 판매여부 체크
                $learn_pattern = $this->getLearnPattern($cart_row['ProdTypeCcd'], $cart_row['LearnPatternCcd']);

                $is_prod_check = $this->cartFModel->checkProduct($learn_pattern, $post_row['SiteCode'], $cart_row['ProdCode'], $cart_row['ParentProdCode'], 'N');
                if ($is_prod_check !== true) {
                    throw new \Exception($is_prod_check);
                }

                // 사용자 지정 강좌시작일
                $cart_row['UserStudyStartDate'] = array_get($post_data, 'study_start_date.' . $cart_row['CartIdx']);
                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, $is_escrow, $cart_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            // 추가 배송료 주문상품 데이터 등록
            if ($post_row['DeliveryAddPrice'] > 0) {
                $is_order_product = $this->addOrderProductForDeliveryAddPrice($order_idx, $pay_status_ccd, $post_row['SiteCode'], $post_row['DeliveryAddPrice']);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            // 주문배송주소 데이터 등록
            if ($cart_results['is_delivery_info'] === true) {
                $is_order_delivery_address = $this->addOrderDeliveryAddress($order_idx, $post_data);
                if ($is_order_delivery_address !== true) {
                    throw new \Exception($is_order_delivery_address);
                }
            }

            // 주문완료 장바구니 업데이트 (주문식별자, 만료일시 -> 현재시각으로 업데이트)
            $is_complete_update = $this->_conn->set('ConnOrderIdx', $order_idx)->set('ExpireDatm', 'NOW()', false)
                ->where_in('CartIdx', $sess_cart_idx)->where('MemIdx', $sess_mem_idx)
                ->update($this->_table['cart']);
            if ($is_complete_update === false || $this->_conn->affected_rows() < 1) {
                throw new \Exception('장바구니 주문 식별자 업데이트에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        } finally {
            // 장바구니 식별자, 주문번호, 중복 접근방지 주문번호 세션 삭제
            $this->destroySessCartIdx();
            $this->destroySessOrderNo();
            $this->destroySessProcOrderNo();
        }

        return ['ret_cd' => true, 'ret_data' => $order_no];
    }

    /**
     * 주문상품 등록 대상 데이터에 사용포인트를 각 상품별로 분할 계산하여 사용포인트 컬럼 추가 후 리턴
     * @param int $use_point [결제 사용 포인트]
     * @param int $total_use_point_target_price [포인트 사용 가능상품의 실제 결제금액]
     * @param array $cart_rows [유효한 장바구니 데이터]
     * @return array
     */
    public function getUsePointDivisionCartData($use_point, $total_use_point_target_price, $cart_rows = [])
    {
        if ($use_point < 1 || $total_use_point_target_price < 1) {
            return $cart_rows;
        }

        $min_idx = 0;
        $max_idx = 0;
        $min_price = 0;
        $max_price = 0;
        $total_div_point = 0;
        $n = 0;

        foreach ($cart_rows as $idx => $row) {
            if ($row['CartProdType'] == 'on_lecture' || $row['CartProdType'] == 'book') {
                $rate = round($row['RealPayPrice'] / $total_use_point_target_price, 7);
                $cart_rows[$idx]['RealUsePoint'] = round($use_point * $rate);
                $total_div_point += $cart_rows[$idx]['RealUsePoint'];

                if ($n == 0) {
                    $min_price = $row['RealPayPrice'];
                    $max_price = $row['RealPayPrice'];
                } else {
                    if ($min_price > $row['RealPayPrice']) {
                        $min_price = $row['RealPayPrice'];
                        $min_idx = $idx;
                    } elseif ($max_price < $row['RealPayPrice']) {
                        $max_price = $row['RealPayPrice'];
                        $max_idx = $idx;
                    }
                }

                $n++;
            } else {
                $cart_rows[$idx]['RealUsePoint'] = 0;
            }
        }

        // 사용포인트와 분할포인트 합계 차이
        $diff_use_point = $use_point - $total_div_point;

        if ($diff_use_point > 0) {
            $cart_rows[$min_idx]['RealUsePoint'] += $diff_use_point;    // 분할포인트 합계가 작을 경우 가장 작은 결제금액을 가진 주문상품에 사용포인트 플러스
        } elseif ($diff_use_point < 0) {
            $cart_rows[$max_idx]['RealUsePoint'] += $diff_use_point;    // 분할포인트 합계가 클 경우 가장 큰 결제금액을 가진 주문상품에 사용포인트 마이너스
        }

        return $cart_rows;
    }

    /**
     * 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param string $pay_status_ccd [결제상태 공통코드]
     * @param string $is_escrow [에스크로 결제 여부, Y/N]
     * @param array $input [상품별 장바구니 데이터 배열]
     * @param bool $is_auto_add [자동지급강좌/쿠폰 지급여부]
     * @return bool|string
     */
    public function addOrderProduct($order_idx, $pay_status_ccd, $is_escrow = 'N', $input = [], $is_auto_add = true)
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $user_coupon_idx = element('UserCouponIdx', $input, 0);
            $cart_type = element('CartType', $input);   // 장바구니 타입
            $cart_prod_type = element('CartProdType', $input);   // 장바구니 상품 타입
            $site_code = element('SiteCode', $input);   // 사이트코드
            $prod_code = element('ProdCode', $input);   // 상품코드
            $learn_pattern_ccd = element('LearnPatternCcd', $input);    // 학습형태
            $pack_type_ccd = element('PackTypeCcd', $input);    // 패키지구분
            $arr_prod_code_sub = empty(element('ProdCodeSub', $input)) === false ? explode(',', element('ProdCodeSub', $input)) : [];   // 패키지의 서브상품코드 배열
            $use_point_type = $cart_type == 'book' ? 'book' : 'lecture';    // 사용포인트 구분
            $real_use_point = element('RealUsePoint', $input, 0);   // 사용포인트
            $real_pay_price = element('RealPayPrice', $input) - $real_use_point;    // 실결제금액에서 사용포인트 차감
            $save_point_type = element('PointApplyCcd', $input) == $this->_point_apply_ccd['book'] ? 'book' : 'lecture';    // 적립포인트 구분
            $real_save_point = element('RealSavePoint', $input, 0);     // 적립포인트
            $is_visit_pay = element('IsVisitPay', $input, 'N');     // 방문결제 여부
            $is_delivery_info = element('IsDeliveryInfo', $input, 'N');     // 주문상품배송정보 입력 여부
            $ca_idx = element('CaIdx', $input);     // 인증신청식별자
            $post_data = element('PostData', $input);   // 장바구니 저장 데이터
            
            // 실결제금액 체크
            if ($real_pay_price < 0) {
                throw new \Exception('주문상품 결제금액이 올바르지 않습니다.');
            }

            // 인증신청식별자 체크
            if (empty($ca_idx) === false) {
                $cert_row = $this->_conn->getFindResult($this->_table['cert_apply'], 'CaIdx', ['EQ' => ['CaIdx' => $ca_idx, 'MemIdx' => $sess_mem_idx, 'ApprovalStatus' => 'Y']]);
                if (empty($cert_row['CaIdx']) === true) {
                    throw new \Exception('주문상품 인증신청 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
            }

            // 주문상품서브 파라미터 체크 (사용자패키지, 운영자패키지, 종합반일 경우만 체크)
            if (in_array($learn_pattern_ccd, [$this->_learn_pattern_ccd['userpack_lecture'], $this->_learn_pattern_ccd['adminpack_lecture'], $this->_learn_pattern_ccd['off_pack_lecture']]) === true) {
                if (empty($arr_prod_code_sub) === true) {
                    throw new \Exception('주문상품서브 정보가 없습니다.');
                }
            }

            // 주문상품 등록
            $data = [
                'OrderIdx' => $order_idx,
                'MemIdx' => $sess_mem_idx,
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => element('SaleTypeCcd', $input),
                'SalePatternCcd' => element('SalePatternCcd', $input),
                'PayStatusCcd' => $pay_status_ccd,
                'OrderPrice' => element('RealSalePrice', $input),
                'RealPayPrice' => $real_pay_price,
                'CardPayPrice' => ($is_visit_pay == 'N' ? $real_pay_price : 0),     // 방문결제일 경우 0원, 실 결제시 금액 설정됨
                'CashPayPrice' => 0,
                'DiscPrice' => element('CouponDiscPrice', $input, 0),
                'DiscRate' => element('CouponDiscRate', $input, 0),
                'DiscType' => element('CouponDiscType', $input, 'R'),
                'UsePoint' => $real_use_point,
                'SavePoint' => $real_save_point,
                'SavePointType' => ($real_save_point > 0 ? $save_point_type : ''),
                'IsUseCoupon' => (empty($user_coupon_idx) === false  ? 'Y' : 'N'),
                'UserCouponIdx' => $user_coupon_idx,
                'TargetOrderIdx' => element('TargetOrderIdx', $input),
                'TargetProdCode' => element('TargetProdCode', $input),
                'TargetProdCodeSub' => element('TargetProdCodeSub', $input),
                'CaIdx' => $ca_idx
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_product']) === false) {
                throw new \Exception('주문상품 정보 등록에 실패했습니다.');
            }

            // 주문상품 식별자
            $order_prod_idx = $this->_conn->insert_id();

            // 주문상품서브 등록
            if (empty($arr_prod_code_sub) === false) {
                foreach ($arr_prod_code_sub as $idx => $prod_code_sub) {
                    $data = [
                        'OrderProdIdx' => $order_prod_idx,
                        'ProdCodeSub' => $prod_code_sub,
                        'RealPayPrice' => array_get(element('SubRealSalePrice', $input, []), $prod_code_sub, 0)
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['order_sub_product']) === false) {
                        throw new \Exception('주문상품서브 정보 등록에 실패했습니다.');
                    }
                }
            }

            // 주문상품 과목/교수 연결 등록 (기간제패키지)
            if ($learn_pattern_ccd == $this->_learn_pattern_ccd['periodpack_lecture']) {
                if ($pack_type_ccd == $this->_adminpack_lecture_type_ccd['normal']) {
                    // 일반형
                    $arr_subject_prof_idx = $this->productFModel->findPeriodPackageSubjectProfIdx($prod_code);
                    if (empty($arr_subject_prof_idx) === true) {
                        throw new \Exception('기간제 일반형 패키지 과목/교수 정보가 없습니다.');
                    }

                    foreach ($arr_subject_prof_idx as $subject_prof_row) {
                        $data = [
                            'OrderProdIdx' => $order_prod_idx,
                            'ProfIdx' => $subject_prof_row['ProfIdx'],
                            'SubjectIdx' => $subject_prof_row['SubjectIdx']
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['order_product_prof_subject']) === false) {
                            throw new \Exception('주문상품 과목/교수 정보 등록에 실패했습니다.');
                        }
                    }
                } else {
                    // 선택형
                    $arr_subject_prof_idx = element('subject_prof_idx', (array) json_decode($post_data, true), []);
                    $arr_subject_prof_idx = array_unique($arr_subject_prof_idx);    // 중복 제거
                    if (empty($arr_subject_prof_idx) === true) {
                        throw new \Exception('기간제 선택형 패키지 과목/교수 정보가 없습니다.');
                    }

                    foreach ($arr_subject_prof_idx as $subject_prof_idx) {
                        $data = [
                            'OrderProdIdx' => $order_prod_idx,
                            'ProfIdx' => str_first_pos_after($subject_prof_idx, ':'),
                            'SubjectIdx' => str_first_pos_before($subject_prof_idx, ':')
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['order_product_prof_subject']) === false) {
                            throw new \Exception('주문상품 과목/교수 정보 등록에 실패했습니다.');
                        }
                    }
                }
            }

            // 온라인강좌, 학원강좌일 경우만 실행
            if ($cart_type == 'on_lecture' || $cart_type == 'off_lecture') {
                // 나의 강좌수정정보 데이터 등록
                $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $prod_code, $arr_prod_code_sub, $input);
                if ($is_add_my_lecture !== true) {
                    throw new \Exception($is_add_my_lecture);
                }

                if ($is_auto_add === true) {
                    // 자동지급 주문상품 데이터 등록
                    $is_add_auto_product = $this->addOrderProductForAutoProduct($order_idx, $prod_code, $pay_status_ccd, $input);
                    if ($is_add_auto_product !== true) {
                        throw new \Exception($is_add_auto_product);
                    }
                }
            }

            // 모의고사 접수정보 등록
            if ($cart_type == 'mock_exam') {
                $is_mock_register = $this->addMockRegister($order_prod_idx, $prod_code, $post_data);
                if ($is_mock_register !== true) {
                    throw new \Exception($is_mock_register);
                }
            }

            // 주문상품배송정보 데이터 등록 (교재만, 방문결제가 아닐 경우)
            if ($cart_type == 'book' && $is_delivery_info == 'Y' && $is_visit_pay == 'N') {
                $data = [
                    'OrderProdIdx' => $order_prod_idx,
                    'DeliveryCompCcd' => config_app('DeliveryCompCcd'),
                    'IsEscrowSend' => $is_escrow
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product_delivery_info']) === false) {
                    throw new \Exception('주문상품 배송정보 등록에 실패했습니다.');
                }
            }

            // 온라인강좌, 학원강좌, 모의고사 일 경우만 자동지급 쿠폰 데이터 등록 (결제상태가 결제완료일 경우)
            if ($cart_type == 'on_lecture' || $cart_type == 'off_lecture' || $cart_type == 'mock_exam') {
                if ($is_auto_add === true) {
                    if ($pay_status_ccd == $this->_pay_status_ccd['paid']) {
                        $is_add_auto_coupon = $this->addAutoMemberCoupon($order_prod_idx, $prod_code);
                        if ($is_add_auto_coupon !== true) {
                            throw new \Exception($is_add_auto_coupon);
                        }
                    }
                }
            }

            // 회원쿠폰 사용 업데이트
            if (empty($user_coupon_idx) === false) {
                $is_coupon_udpate = $this->couponFModel->modifyUseMemberCoupon($user_coupon_idx, $order_prod_idx);
                if ($is_coupon_udpate !== true) {
                    throw new \Exception($is_coupon_udpate);
                }
            }

            // 회원포인트 적립 (결제상태가 결제완료일 경우)
            if ($real_save_point > 0 && $pay_status_ccd == $this->_pay_status_ccd['paid']) {
                $is_point_save = $this->pointFModel->addOrderSavePoint($save_point_type, $real_save_point, $site_code, $order_idx, $order_prod_idx);
                if ($is_point_save !== true) {
                    throw new \Exception($is_point_save);
                }
            }

            // 회원 포인트 사용
            if ($real_use_point > 0) {
                $is_point_use = $this->pointFModel->addOrderUsePoint($use_point_type, $real_use_point, $site_code, $order_idx, $order_prod_idx);
                if ($is_point_use !== true) {
                    throw new \Exception($is_point_use);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 모의고사 응시정보 등록
     * @param int $order_prod_idx [주문상품식별자]
     * @param int $prod_code [상품코드]
     * @param string $post_data [응시정보 json 데이터]
     * @return bool|string
     */
    public function addMockRegister($order_prod_idx, $prod_code, $post_data)
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $input = element('mock_exam', json_decode($post_data, true));    // 응시정보 데이터
            $input_subjects = array_filter(array_merge((array) element('subject_ess', $input), (array) element('subject_sub', $input)));     // 응시정보 과목 데이터

            if (empty($input) === true || empty($input_subjects) === true) {
                throw new \Exception('모의고사 응시정보가 없습니다.');
            }

            // 모의고사 접수등록
            // 접수번호 초기값 (경찰 5자리, 공무원 8자리)
            switch (config_app('SiteGroupCode')) {
                case '1001' : $first_take_number = '10001'; break;
                case '1002' : $first_take_number = '10000001'; break;
                default : $first_take_number = '10001'; break;
            }

            $query = /** @lang text */ 'insert into ' . $this->_table['mock_register'] . ' (ProdCode, MemIdx, OrderProdIdx, TakeNumber, TakeMockPart, TakeForm, TakeArea, AddPoint)
                select ?, ?, ?, ifnull(max(cast(TakeNumber as int)) + 1, ?), ?, ?, ?, ? from ' . $this->_table['mock_register'] . ' where ProdCode = ?';

            $is_mock_register = $this->_conn->query($query, [
                $prod_code, $sess_mem_idx, $order_prod_idx, $first_take_number,
                element('take_part', $input, ''), element('take_form', $input, ''),
                element('take_area', $input, ''), element('add_point', $input, 0),
                $prod_code
            ]);

            if ($is_mock_register === false) {
                throw new \Exception('모의고사 접수등록에 실패했습니다.');
            }

            // 모의고사 접수식별자 조회
            $mr_idx = array_get($this->_conn->getListResult($this->_table['mock_register'], 'MrIdx', [
                'EQ' => ['ProdCode' => $prod_code, 'MemIdx' => $sess_mem_idx, 'OrderProdIdx' => $order_prod_idx]
            ], 1, 0, ['MrIdx' => 'desc']), '0.MrIdx');

            if (empty($mr_idx) === true) {
                throw new \Exception('모의고사 접수식별자 조회에 실패했습니다.');
            }

            // 모의고사 접수 시험지 연결 데이터 등록
            foreach ($input_subjects as $subject) {
                $arr_subject = explode('|', $subject);
                $is_mock_register_paper = $this->_conn->set([
                    'MrIdx' => $mr_idx, 'ProdCode' => $prod_code, 'MpIdx' => element('0', $arr_subject), 'SubjectIdx' => element('1', $arr_subject)
                ])->insert($this->_table['mock_register_r_paper']);

                if ($is_mock_register_paper === false) {
                    throw new \Exception('모의고사 접수과목 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 자동지급 강좌/사은품 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param int $prod_code [상품코드]
     * @param string $pay_status_ccd [결제상태 공통코드]
     * @param array $input [상품별 장바구니 데이터 배열]
     * @return bool|string
     */
    public function addOrderProductForAutoProduct($order_idx, $prod_code, $pay_status_ccd, $input = [])
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션

            // 자동지급 상품 조회
            $rows = $this->_conn->getJoinListResult($this->_table['product_r_product'] . ' as PP', 'inner', $this->_table['product'] . ' as P'
                , 'PP.ProdCodeSub = P.ProdCode and PP.ProdTypeCcd = P.ProdTypeCcd'
                , 'PP.ProdCodeSub, PP.ProdTypeCcd', [
                    'EQ' => ['PP.ProdCode' => $prod_code, 'PP.IsStatus' => 'Y', 'P.IsStatus' => 'Y'],
                    'IN' => ['PP.ProdTypeCcd' => [$this->_prod_type_ccd['on_lecture'], $this->_prod_type_ccd['freebie']]]
                ]);

            // 자동지급 상품이 없을 경우
            if (empty($rows) === true) {
                return true;
            }

            foreach ($rows as $row) {
                // 주문상품 등록
                $data = [
                    'OrderIdx' => $order_idx,
                    'MemIdx' => $sess_mem_idx,
                    'ProdCode' => $row['ProdCodeSub'],
                    'SaleTypeCcd' => element('SaleTypeCcd', $input),
                    'SalePatternCcd' => $this->_sale_pattern_ccd['auto'],
                    'PayStatusCcd' => $pay_status_ccd,
                    'OrderPrice' => 0,
                    'RealPayPrice' => 0,
                    'CardPayPrice' => 0,
                    'CashPayPrice' => 0,
                    'DiscPrice' => 0,
                    'DiscRate' => 0,
                    'DiscType' => 'R',
                    'UsePoint' => 0,
                    'SavePoint' => 0,
                    'SavePointType' => '',
                    'IsUseCoupon' => 'N',
                    'UserCouponIdx' => 0
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product']) === false) {
                    throw new \Exception('자동지급 주문상품 정보 등록에 실패했습니다.');
                }

                // 주문상품 식별자
                $order_prod_idx = $this->_conn->insert_id();

                // 온라인 강좌일 경우 나의 강좌수정정보 데이터 등록
                if ($row['ProdTypeCcd'] == $this->_prod_type_ccd['on_lecture']) {
                    $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $row['ProdCodeSub'], [], [
                        'UserStudyStartDate' => element('UserStudyStartDate', $input, '')
                    ]);
                    if ($is_add_my_lecture !== true) {
                        throw new \Exception($is_add_my_lecture);
                    }
                } elseif ($row['ProdTypeCcd'] == $this->_prod_type_ccd['freebie']) {
                    // 사은품일 경우 주문상품배송정보 데이터 등록 (방문결제가 아닐 경우)
                    if (element('IsDeliveryInfo', $input) == 'Y' && element('IsVisitPay', $input) == 'N') {
                        $data = [
                            'OrderProdIdx' => $order_prod_idx,
                            'DeliveryCompCcd' => config_app('DeliveryCompCcd'),
                            'IsEscrowSend' => 'N'
                        ];

                        if ($this->_conn->set($data)->insert($this->_table['order_product_delivery_info']) === false) {
                            throw new \Exception('자동지급 사은품 배송정보 등록에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 자동지급 쿠폰 등록
     * @param int $order_prod_idx [주문상품식별자]
     * @param int $prod_code [상품코드]
     * @param string $mem_idx [회원식별자]
     * @return bool|string
     */
    public function addAutoMemberCoupon($order_prod_idx, $prod_code, $mem_idx = '')
    {
        try {
            // 자동지급 쿠폰 조회
            $rows = $this->_conn->getListResult($this->_table['product_r_autocoupon'], 'AutoCouponIdx', [
                'EQ' => ['ProdCode' => $prod_code, 'IsStatus' => 'Y']
            ]);

            // 자동지급 쿠폰이 없을 경우
            if (empty($rows) === true) {
                return true;
            }

            foreach ($rows as $row) {
                // 쿠폰등록
                $result = $this->couponFModel->addMemberCoupon('coupon', $row['AutoCouponIdx'], false, 'order', $order_prod_idx, $mem_idx);
                if ($result['ret_cd'] !== true) {
                    // TODO : 주문결제가 정상적으로 진행되도록 에러 리턴 안함
                    //throw new \Exception($result['ret_msg']);
                    logger('OrderFModel > addAutoMemberCoupon ==> ' . $result['ret_msg'] . ' (ProdCode = ' . $prod_code . ')', [], 'error');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 추가 배송료 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param string $pay_status_ccd [결제상태 공통코드]
     * @param int $site_code [사이트코드]
     * @param int $delivery_add_price [추가 배송료 (결제금액 확인용)]
     * @return bool|string
     */
    public function addOrderProductForDeliveryAddPrice($order_idx, $pay_status_ccd, $site_code, $delivery_add_price)
    {
        try {
            $learn_pattern = 'delivery_add_price';

            // 추가 배송료 상품 조회
            $prod_rows = $this->productFModel->listSalesProduct($learn_pattern, false, ['EQ' => ['SiteCode' => $site_code]], 1, 0, ['ProdCode' => 'desc']);
            if (empty($prod_rows) === true) {
                throw new \Exception('추가 배송료 상품이 존재하지 않습니다.', _HTTP_NOT_FOUND);
            }

            $prod_row = element('0', $prod_rows);

            // 판매가격 정보 확인
            $prod_row['ProdPriceData'] = json_decode($prod_row['ProdPriceData'], true);
            if (empty($prod_row['ProdPriceData']) === true || isset($prod_row['ProdPriceData'][0]['SaleTypeCcd']) === false) {
                throw new \Exception('추가 배송료 가격 정보가 없습니다.', _HTTP_NOT_FOUND);
            }
            $prod_row['ProdPriceData'] = element('0', $prod_row['ProdPriceData']);

            if ($delivery_add_price != $prod_row['ProdPriceData']['RealSalePrice']) {
                throw new \Exception('추가 배송료 금액이 일치하지 않습니다.');
            }

            $data = [
                'CartType' => 'etc',
                'CartProdType' => $learn_pattern,
                'SiteCode' => $site_code,
                'ProdCode' => $prod_row['ProdCode'],
                'SaleTypeCcd' => $prod_row['ProdPriceData']['SaleTypeCcd'],
                'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                'RealSalePrice' => $prod_row['ProdPriceData']['SalePrice'],
                'RealPayPrice' => $prod_row['ProdPriceData']['RealSalePrice']
            ];

            if ($this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $data, false) !== true) {
                throw new \Exception('추가 배송료 주문상품 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 나의 강좌수정정보 데이터 등록
     * @param int $order_idx [주문식별자]
     * @param int $order_prod_idx [주문상품식별자]
     * @param int $prod_code [상품코드]
     * @param array $arr_prod_code_sub [상품코드서브]
     * @param array $input [상품별 장바구니 데이터 배열]
     * @return bool|string
     */
    public function addMyLecture($order_idx, $order_prod_idx, $prod_code, $arr_prod_code_sub = [], $input = [])
    {
        try {
            $row = $this->productFModel->findProductLectureInfo($prod_code);
            if (empty($row) === true) {
                throw new \Exception('상품정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $learn_pattern = array_search($row['LearnPatternCcd'], $this->_learn_pattern_ccd);  // 학습형태
            $sale_pattern_ccd = element('SalePatternCcd', $input, $this->_sale_pattern_ccd['normal']);      // 판매형태 공통코드
            $user_study_start_date = element('UserStudyStartDate', $input, '');     // 사용자 지정 강좌시작일

            if ($learn_pattern == 'on_lecture' || $learn_pattern == 'adminpack_lecture' || $learn_pattern == 'periodpack_lecture' || $learn_pattern == 'on_free_lecture'
                || $learn_pattern == 'off_lecture') {
                // 단강좌, 운영자패키지, 기간제패키지, 무료강좌, 학원 단과
                // 단강좌 수강연장일 경우
                if ($learn_pattern == 'on_lecture' && $sale_pattern_ccd == $this->_sale_pattern_ccd['extend']) {
                    $row['StudyPeriod'] = element('ExtenDay', $input);

                    if (empty($row['StudyPeriod']) === true) {
                        throw new \Exception('수강연장 신청일수가 없습니다.');
                    }

                    // 타겟주문상품 중에서 가장 큰 실제강좌종료일자 + 1 day 조회
                    $target_order_idx = element('TargetOrderIdx', $input);
                    $row['StudyStartDate'] = element('NextStudyStartDate',
                        $this->_conn->getJoinFindResult($this->_table['my_lecture'] . ' as ML', 'inner', $this->_table['order_product'] . ' as OP', 'ML.OrderProdIdx = OP.OrderProdIdx'
                            ,'date_add(max(ML.RealLecEndDate), interval 1 day) as NextStudyStartDate', [
                            'EQ' => [
                                'ML.ProdCode' => element('TargetProdCode', $input), 'ML.ProdCodeSub' => element('TargetProdCodeSub', $input),
                                'OP.MemIdx' => $this->session->userdata('mem_idx'), 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']
                            ],
                            'RAW' => [
                                'ML.OrderIdx in ' => '(select OrderIdx from ' . $this->_table['order_product'] . ' where OrderIdx = "' . $target_order_idx . '" or TargetOrderIdx = "' . $target_order_idx . '")'
                            ]
                        ])
                    );

                    if (empty($row['StudyStartDate']) === true) {
                        throw new \Exception('수강연장 수강시작일자 조회에 실패했습니다.');
                    }
                }

                // 수강시작일, 수강종료일 조회
                $arr_lec_date = $this->getMyLectureLecStartEndDate($row['LearnPatternCcd'], $row['StudyStartDate'], $row['StudyEndDate'], $row['StudyPeriod'], $user_study_start_date);

                $data = [
                    'OrderIdx' => $order_idx,
                    'OrderProdIdx' => $order_prod_idx,
                    'ProdCode' => $prod_code,
                    'LecStartDate' => $arr_lec_date['lec_start_date'],
                    'LecEndDate' => $arr_lec_date['lec_end_date'],
                    'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                    'LecExpireTime' => $row['MultipleAllLecSec'],
                    'RealLecExpireTime' => $row['MultipleAllLecSec'],
                    'LecExpireDay' => $row['StudyPeriod'],
                    'RealLecExpireDay' => $row['StudyPeriod']
                ];

                if (empty($arr_prod_code_sub) === true) {
                    if ($this->_conn->set($data)->set('ProdCodeSub', $prod_code)->insert($this->_table['my_lecture']) === false) {
                        throw new \Exception('나의 강좌수강정보 등록에 실패했습니다.');
                    }
                } else {
                    foreach ($arr_prod_code_sub as $idx => $prod_code_sub) {
                        if ($this->_conn->set($data)->set('ProdCodeSub', $prod_code_sub)->insert($this->_table['my_lecture']) === false) {
                            throw new \Exception('나의 강좌수강정보 등록에 실패했습니다.');
                        }
                    }
                }
            } elseif ($learn_pattern == 'userpack_lecture' || $learn_pattern == 'off_pack_lecture') {
                // 사용자패키지, 학원 종합반 (단강좌, 학원 단과 속성 정보를 등록함)
                // 단강좌, 학원단과 정보 조회
                $prod_rows = $this->productFModel->findProductLectureInfo($arr_prod_code_sub);
                foreach ($prod_rows as $idx => $prod_row) {
                    // 사용자패키지일 경우 패키지 판매정보의 수강연장일수 합산
                    if ($learn_pattern == 'userpack_lecture') {
                        $prod_row['StudyPeriod'] = $prod_row['StudyPeriod'] + element('AddExtenDay', $input, 0);
                    }

                    // 수강시작일, 수강종료일 조회
                    $arr_lec_date = $this->getMyLectureLecStartEndDate($prod_row['LearnPatternCcd'], $prod_row['StudyStartDate'], $prod_row['StudyEndDate'], $prod_row['StudyPeriod'], $user_study_start_date);

                    $data = [
                        'OrderIdx' => $order_idx,
                        'OrderProdIdx' => $order_prod_idx,
                        'ProdCode' => $prod_code,
                        'LecStartDate' => $arr_lec_date['lec_start_date'],
                        'LecEndDate' => $arr_lec_date['lec_end_date'],
                        'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                        'LecExpireTime' => $prod_row['MultipleAllLecSec'],
                        'RealLecExpireTime' => $prod_row['MultipleAllLecSec'],
                        'LecExpireDay' => $prod_row['StudyPeriod'],
                        'RealLecExpireDay' => $prod_row['StudyPeriod']
                    ];

                    if ($this->_conn->set($data)->set('ProdCodeSub', $prod_row['ProdCode'])->insert($this->_table['my_lecture']) === false) {
                        throw new \Exception('나의 강좌수강정보 등록에 실패했습니다.');
                    }
                }
            } else {
                throw new \Exception('상품 학습형태 정보가 일치하지 않습니다.', _HTTP_BAD_REQUEST);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 학습형태별 수강시작일, 수강종료일 리턴
     * @param string $learn_pattern_ccd [학습형태공통코드]
     * @param string $study_start_date [개강일]
     * @param string $study_end_date [종강일]
     * @param int $study_period [수강일수]
     * @param string $user_study_start_date [사용자설정 수강시작일]
     * @return array
     */
    public function getMyLectureLecStartEndDate($learn_pattern_ccd, $study_start_date, $study_end_date, $study_period, $user_study_start_date = '')
    {
        $today_date = date('Y-m-d');    // 결제일
        $learn_pattern = array_search($learn_pattern_ccd, $this->_learn_pattern_ccd);
        $lec_start_date = '';
        $lec_end_date = '';

        switch ($learn_pattern) {
            case 'on_lecture' :
            case 'adminpack_lecture' :
            case 'periodpack_lecture' :
                // 단강좌, 운영자패키지, 기간제패키지
                if (empty($study_start_date) === false && empty($user_study_start_date) === false && $study_start_date <= $user_study_start_date) {
                    $lec_start_date = $user_study_start_date;    // 사용자 설정 수강시작일이 개강일보다 이후일 경우만 수강시작일로 설정
                } else {
                    $lec_start_date = empty($study_start_date) === false && $today_date <= $study_start_date ? $study_start_date : $today_date;     // 결제일이 개강일보다 이전일 경우 수강시작일은 개강일로 설정
                }
                $lec_end_date = date('Y-m-d', strtotime($lec_start_date . ' +' . ($study_period - 1) . ' day'));
                break;
            case 'on_free_lecture' :
                // 무료강좌
                $lec_start_date = empty($study_start_date) === false && $today_date <= $study_start_date ? $study_start_date : $today_date;     // 결제일이 개강일보다 이전일 경우 수강시작일은 개강일로 설정
                $lec_end_date = date('Y-m-d', strtotime($lec_start_date . ' +' . ($study_period - 1) . ' day'));
                break;
            case 'off_lecture' :
                // 학원 단과
                $lec_start_date = $study_start_date;
                $lec_end_date = $study_end_date;
                break;
            default :
                break;  // 사용자패키지, 학원 종합반은 단강좌, 학원 단과 개강일과 수강일수 설정값을 사용
        }

        return ['lec_start_date' => $lec_start_date, 'lec_end_date' => $lec_end_date];
    }

    /**
     * 주문배송주소 정보 등록
     * @param int $order_idx [주문식별자]
     * @param array $input [주문배송주소 데이터 배열]
     * @return bool|string
     */
    public function addOrderDeliveryAddress($order_idx, $input = [])
    {
        try {
            $receiver_tel = element('receiver_tel1', $input) . '' . element('receiver_tel2', $input) . '' . element('receiver_tel3', $input);
            $receiver_phone = element('receiver_phone1', $input) . '' . element('receiver_phone2', $input) . '' . element('receiver_phone3', $input);

            $data = [
                'OrderIdx' => $order_idx,
                'Receiver' => element('receiver', $input),
                'ReceiverTel1' => element('receiver_tel1', $input),
                'ReceiverTel3' => element('receiver_tel3', $input),
                'ReceiverPhone1' => element('receiver_phone1', $input),
                'ReceiverPhone3' => element('receiver_phone3', $input),
                'ZipCode' => element('zipcode', $input),
                'Addr1' => element('addr1', $input),
                'DeliveryMemo' => element('delivery_memo', $input),
            ];

            $this->_conn->set($data)
                ->set('ReceiverTel2Enc', 'fn_enc("' . element('receiver_tel2', $input, '') . '")', false)
                ->set('ReceiverTelEnc', 'fn_enc("' . $receiver_tel . '")', false)
                ->set('ReceiverPhone2Enc', 'fn_enc("' . element('receiver_phone2', $input, '') . '")', false)
                ->set('ReceiverPhoneEnc', 'fn_enc("' . $receiver_phone . '")', false)
                ->set('Addr2Enc', 'fn_enc("' . element('addr2', $input, '') . '")', false);

            if ($this->_conn->insert($this->_table['order_delivery_address']) === false) {
                throw new \Exception('주문 배송주소 정보 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 방문결제 주문 데이터 등록
     * @param int $site_code [사이트코드]
     * @param array $input [직접방문접수 장바구니 저장 데이터]
     * @return array|bool
     */
    public function procVisitOrder($site_code, $input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $sess_cart_sess_id = $this->session->userdata($this->_sess_cart_sess_id);   // 학원 방문결제 장바구니 세션 아이디 세션
            $sess_gw_idx = $this->session->userdata('gw_idx');
            $order_no = $this->makeOrderNo();   // 주문번호 생성
            $cart_type = 'off_lecture';     // 장바구니 타입
            $pay_status_ccd = $this->_pay_status_ccd['receipt_wait'];    // 주문완료 결제상태공통코드 (접수대기)
            $is_direct_pay = empty($input) === true ? 'N' : 'Y';
            $is_visit_pay = 'Y';
            $arr_cart_idx = null;   // 직접방문접수 장바구니 식별자
            $arr_order_cart_idx = null;     // 주문상품 장바구니 식별자
            $reg_ip = $this->input->ip_address();

            // 직접방문접수일 경우 장바구니 데이터 저장
            if ($is_direct_pay == 'Y') {
                $add_learn_pattern = element('learn_pattern', $input);
                $arr_add_prod_code = element('data', $this->makeProdCodeArray($add_learn_pattern, element('prod_code', $input, [])), []);

                foreach ($arr_add_prod_code as $add_prod_code => $add_prod_row) {
                    $add_prod_sub_code = '';
                    if (empty(element('prod_code_sub', $input)) === false) {
                        // 서브 강좌가 있는 경우 (종합반)
                        $add_prod_sub_code = implode(',', element('prod_code_sub', $input, []));
                    }

                    // 장바구니 저장 데이터
                    $add_data = [
                        'MemIdx' => $sess_mem_idx,
                        'SiteCode' => $site_code,
                        'ProdCode' => $add_prod_code,
                        'ProdCodeSub' => $add_prod_sub_code,
                        'ParentProdCode' => $add_prod_row['ParentProdCode'],
                        'SaleTypeCcd' => $add_prod_row['SaleTypeCcd'],
                        'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                        'IsDirectPay' => $is_direct_pay,
                        'IsVisitPay' => $is_visit_pay,
                        'GwIdx' => $sess_gw_idx,
                        'SessId' => $sess_cart_sess_id,
                        'RegIp' => $reg_ip
                    ];

                    $add_cart_idx = $this->cartFModel->_addCart($add_data);
                    if (is_numeric($add_cart_idx) === false) {
                        throw new \Exception($add_cart_idx);
                    }

                    // 저장된 장바구니 식별자 저장
                    $arr_cart_idx[] = $add_cart_idx;
                }

                if (empty($arr_cart_idx) === true) {
                    throw new \Exception('등록된 장바구니 데이터가 없습니다.');
                }
            }

            // 장바구니 조회
            $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $site_code, null, $arr_cart_idx, null, $is_direct_pay, $is_visit_pay);

            // 장바구니 데이터 가공
            $cart_results = $this->getMakeCartReData('pay', $cart_type, $cart_rows, [], 0, '', $is_visit_pay);

            if (is_array($cart_results) === false) {
                throw new \Exception($cart_results);
            }

            // 주문 데이터 등록 (방문결제는 배송료, 쿠폰 사용, 포인트 사용/적립, 주문배송주소 등록 없음)
            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $site_code,
                'ReprProdName' => $cart_results['repr_prod_name'],
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => element('visit', $this->_pay_route_ccd),
                'PayMethodCcd' => '',
                'PgCcd' => '',
                'PgMid' => '',
                'PgTid' => '',
                'OrderPrice' => $cart_results['total_prod_order_price'],
                'OrderProdPrice' => $cart_results['total_prod_order_price'],
                'RealPayPrice' => $cart_results['total_pay_price'],
                'CardPayPrice' => 0,
                'CashPayPrice' => 0,
                'DeliveryPrice' => 0,
                'DeliveryAddPrice' => 0,
                'DiscPrice' => 0,
                'UseLecPoint' => 0,
                'UseBookPoint' => 0,
                'SaveLecPoint' => 0,
                'SaveBookPoint' => 0,
                'IsEscrow' => 'N',
                'IsCashReceipt' => 'N',
                'IsDelivery' => 'N',
                'IsVisitPay' => 'Y',
                'GwIdx' => $sess_gw_idx,
                'OrderIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($cart_results['list'] as $idx => $cart_row) {
                // 상품 판매여부 체크
                $learn_pattern = $this->getLearnPattern($cart_row['ProdTypeCcd'], $cart_row['LearnPatternCcd']);

                $is_prod_check = $this->cartFModel->checkProduct($learn_pattern, $site_code, $cart_row['ProdCode'], $cart_row['ParentProdCode'], $is_visit_pay);
                if ($is_prod_check !== true) {
                    throw new \Exception($is_prod_check);
                }

                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $cart_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }

                // 주문상품 장바구니 식별자
                $arr_order_cart_idx[] = $cart_row['CartIdx'];
            }

            // 주문완료 장바구니 업데이트 (주문식별자, 만료일시 -> 현재시각으로 업데이트)
            $is_complete_update = $this->_conn->set('ConnOrderIdx', $order_idx)->set('ExpireDatm', 'NOW()', false)
                ->where('SessId', $sess_cart_sess_id)->where('MemIdx', $sess_mem_idx)->where('IsVisitPay', $is_visit_pay)
                ->where('ConnOrderIdx is ', 'null', false)
                ->where('IsDirectPay', $is_direct_pay)->where_in('CartIdx', $arr_order_cart_idx)
                ->update($this->_table['cart']);

            if ($is_complete_update === false || $this->_conn->affected_rows() < 1) {
                throw new \Exception('장바구니 주문 식별자 업데이트에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 무료강좌 주문 데이터 등록
     * @param array $arr_prod_code [상품코드배열, 상품코드:가격구분 공통코드:부모상품코드]
     * @param int $site_code [사이트코드]
     * @return array|bool
     */
    public function procFreeOrder($arr_prod_code, $site_code)
    {
        $this->_conn->trans_begin();

        try {
            $learn_pattern = 'on_free_lecture';
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $order_no = $this->makeOrderNo();   // 주문번호 생성
            $arr_temp_prod_code = $this->makeProdCodeArray($learn_pattern, $arr_prod_code);
            $arr_prod_code = element('data', $arr_temp_prod_code);
            $arr_prod_name = [];
            $pay_status_ccd = $this->_pay_status_ccd['apply'];    // 주문완료 결제상태공통코드 (신청완료)

            // 상품 판매여부 체크
            foreach ($arr_prod_code as $prod_code => $prod_row) {
                $chk_data = $this->cartFModel->checkProduct($learn_pattern, $site_code, $prod_code, $prod_code, 'N', true);
                if (is_array($chk_data) === false) {
                    throw new \Exception($chk_data);
                }

                $arr_prod_name[] = $chk_data['ProdName'];
            }

            // 대표 주문상품명
            $repr_prod_name = $arr_prod_name[0] . (count($arr_prod_name) > 1 ? ' 외 ' . (count($arr_prod_name) - 1) . '건' : '');

            // 주문 데이터 등록
            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $site_code,
                'ReprProdName' => $repr_prod_name,
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => element('free', $this->_pay_route_ccd),
                'PayMethodCcd' => '',
                'PgCcd' => '',
                'PgMid' => '',
                'PgTid' => '',
                'OrderPrice' => 0,
                'OrderProdPrice' => 0,
                'RealPayPrice' => 0,
                'CardPayPrice' => 0,
                'CashPayPrice' => 0,
                'DeliveryPrice' => 0,
                'DeliveryAddPrice' => 0,
                'DiscPrice' => 0,
                'UseLecPoint' => 0,
                'UseBookPoint' => 0,
                'SaveLecPoint' => 0,
                'SaveBookPoint' => 0,
                'IsEscrow' => 'N',
                'IsCashReceipt' => 'N',
                'IsDelivery' => 'N',
                'IsVisitPay' => 'N',
                'GwIdx' => $this->session->userdata('gw_idx'),
                'OrderIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($arr_prod_code as $prod_code => $prod_row) {
                $data = [
                    'CartType' => 'on_lecture',
                    'CartProdType' => 'on_free_lecture',
                    'SiteCode' => $site_code,
                    'ProdCode' => $prod_code,
                    'SaleTypeCcd' => $prod_row['SaleTypeCcd'],
                    'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                    'RealSalePrice' => 0,
                    'RealPayPrice' => 0
                ];

                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $data, false);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 자동주문 데이터 등록
     * @param string $req_type [요청구분 (수동: manual, 이벤트: event, 회원가입이벤트: join, 인증 : cert)]
     * @param string|array $req_code [요청구분별 식별자 (수동: 상품코드, 이벤트: 이벤트식별자, 회원가입이벤트: 없음, 인증 : 인증식별자)]
     * @return bool|string
     */
    public function procAutoOrder($req_type, $req_code = '')
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $order_no = $this->makeOrderNo();   // 주문번호 생성
            $pay_status_ccd = $this->_pay_status_ccd['paid'];    // 주문완료 결제상태공통코드 (결제완료)
            // 자동주문 가능 학습형태 (단강좌, 운영자패키지, 무료강좌, 학원단과, 학원종합반)
            $target_learn_pattern_ccd = [
                $this->_learn_pattern_ccd['on_lecture'], $this->_learn_pattern_ccd['adminpack_lecture'], $this->_learn_pattern_ccd['on_free_lecture'],
                $this->_learn_pattern_ccd['off_lecture'], $this->_learn_pattern_ccd['off_pack_lecture']
            ];
            $admin_reason_ccd = '705008';   // 부여사유공통코드 (디폴트 : 이벤트자동부여)
            $admin_etc_reason = null;   // 상세부여사유 (연관식별자가 있을 경우 추가)
            $total_prod_order_price = 0;    // 전체상품주문금액
            $order_prod_data = [];  // 주문상품 데이터
            $arr_prod_code = [];    // 주문상품 상품코드

            // 상품코드 추출
            switch ($req_type) {
                case 'event' :
                    // 이벤트식별자 기준으로 자동지급상품 조회
                    $admin_reason_ccd = '705008';   // 부여사유공통코드 (이벤트자동부여)
                    $admin_etc_reason = '이벤트코드=>' . $req_code;
                    break;
                case 'join' :
                    // 해당 이벤트신청타입의 유효한 최근 1건의 이벤트식별자를 기준으로 자동지급상품 조회 (회원가입이벤트)
                    $admin_reason_ccd = '705007';   // 부여사유공통코드 (회원가입자동부여)
                    $admin_etc_reason = '이벤트코드=>' . $req_code;
                    break;
                case 'cert' :
                    // 인증모델 load
                    $this->load->loadModels(['cert/certApplyF']);

                    // 해당 인증상품 조회
                    $cert_data = $this->certApplyFModel->listProductByCertIdx($req_code, ['EQ' => ['A.CertConditionCCd' => '685004']]);
                    $arr_prod_code = array_pluck($cert_data, 'ProdCode');

                    $admin_reason_ccd = '705009';   // 부여사유공통코드 (인증완료자동부여)
                    $admin_etc_reason = '인증코드=>' . $req_code;
                    break;
                default :
                    $arr_prod_code = (array) $req_code;
                    break;
            }

            // 상품코드 체크 (자동주문상품이 없을 경우)
            if (empty($arr_prod_code) === true) {
                return true;
            }

            // 회원식별자 세션 체크
            if (empty($sess_mem_idx) === true) {
                return '로그인 정보가 없습니다.';
            }

            // 상품정보 조회
            $prod_data = $this->productFModel->findRawProductByProdCode($arr_prod_code, '', ['IN' => ['PL.LearnPatternCcd' => $target_learn_pattern_ccd]]);
            if (empty($prod_data) === true) {
                return '상품정보 조회에 실패했습니다.';
            }

            // 주문상품 데이터 생성
            $tmp_site_code = '';
            foreach ($prod_data as $prod_row) {
                $learn_pattern = $this->getLearnPattern($prod_row['ProdTypeCcd'], $prod_row['LearnPatternCcd']);

                // 사이트코드 체크
                if (empty($tmp_site_code) === false && $tmp_site_code != $prod_row['SiteCode']) {
                    throw new \Exception('사이트코드가 일치하지 않습니다.', _HTTP_BAD_REQUEST);
                }

                // 상품코드서브
                $prod_code_sub = in_array($learn_pattern, ['adminpack_lecture', 'off_pack_lecture']) === true ? $prod_row['ProdCodeSub'] : '';

                // 판매가격 정보 조회 및 확인
                if ($prod_row['ProdPriceData'] == 'N') {
                    throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
                $prod_price_data = element('0', json_decode($prod_row['ProdPriceData'], true));

                // 주문상품 데이터 가공
                $order_prod_data[] = [
                    'CartType' => array_search($prod_row['ProdTypeCcd'], $this->_prod_type_ccd),
                    'CartProdType' => $learn_pattern,
                    'SiteCode' => $prod_row['SiteCode'],
                    'ProdCode' => $prod_row['ProdCode'],
                    'ProdCodeSub' => $prod_code_sub,
                    'ProdName' => $prod_row['ProdName'],
                    'LearnPatternCcd' => $prod_row['LearnPatternCcd'],
                    'PackTypeCcd' => $prod_row['PackTypeCcd'],
                    'SaleTypeCcd' => $prod_price_data['SaleTypeCcd'],
                    'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                    'RealSalePrice' => $prod_price_data['RealSalePrice'],
                    'RealPayPrice' => 0,
                    'CouponDiscPrice' => $prod_price_data['RealSalePrice'],
                    'CouponDiscRate' => '100',
                    'CouponDiscType' => 'R'
                ];

                $tmp_site_code = $prod_row['SiteCode'];
                $total_prod_order_price += $prod_price_data['RealSalePrice'];
            }

            // 주문 데이터 등록
            $site_code = $order_prod_data[0]['SiteCode'];   // 사이트코드
            $repr_prod_name = $order_prod_data[0]['ProdName'] . (count($order_prod_data) > 1 ? ' 외 ' . (count($order_prod_data) - 1) . '건' : '');   // 대표 주문상품명

            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $site_code,
                'ReprProdName' => $repr_prod_name,
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => element('zero', $this->_pay_route_ccd),
                'PayMethodCcd' => '',
                'PgCcd' => '',
                'PgMid' => '',
                'PgTid' => '',
                'OrderPrice' => $total_prod_order_price,
                'OrderProdPrice' => $total_prod_order_price,
                'RealPayPrice' => 0,
                'CardPayPrice' => 0,
                'CashPayPrice' => 0,
                'DeliveryPrice' => 0,
                'DeliveryAddPrice' => 0,
                'DiscPrice' => $total_prod_order_price,
                'UseLecPoint' => 0,
                'UseBookPoint' => 0,
                'SaveLecPoint' => 0,
                'SaveBookPoint' => 0,
                'IsEscrow' => 'N',
                'IsCashReceipt' => 'N',
                'IsDelivery' => 'N',
                'IsVisitPay' => 'N',
                'GwIdx' => $this->session->userdata('gw_idx'),
                'AdminReasonCcd' => $admin_reason_ccd,
                'AdminEtcReason' => $admin_etc_reason,
                'OrderIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($order_prod_data as $order_prod_row) {
                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $order_prod_row, false);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 수강권 주문 데이터 등록
     * @param array $arr_prod_data [쿠폰연결상품 데이터]
     * @param int $site_code [사이트코드]
     * @param int $coupon_detail_idx [사용자 쿠폰 식별자]
     * @return bool|string
     */
    public function procVoucherOrder($arr_prod_data, $site_code, $coupon_detail_idx)
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $order_no = $this->makeOrderNo();   // 주문번호 생성
            $pay_status_ccd = $this->_pay_status_ccd['paid'];    // 주문완료 결제상태공통코드 (결제완료)
            $total_prod_order_price = 0;    // 전체상품주문금액
            $order_prod_data = [];

            // 상품 판매여부 체크
            foreach ($arr_prod_data as $prod_row) {
                $learn_pattern = $this->getLearnPattern($prod_row['ProdTypeCcd'], $prod_row['LearnPatternCcd']);

                $chk_data = $this->cartFModel->checkProduct($learn_pattern, $site_code, $prod_row['ProdCode'], $prod_row['ProdCode'], 'N', true);
                if (is_array($chk_data) === false) {
                    throw new \Exception($chk_data);
                }

                // 학습형태 체크
                if ($learn_pattern != 'on_lecture' && $learn_pattern != 'adminpack_lecture' && $learn_pattern != 'periodpack_lecture') {
                    throw new \Exception('주문이 불가능한 상품입니다.');
                }

                // 상품코드서브
                $prod_code_sub = $learn_pattern == 'adminpack_lecture' ? $chk_data['ProdCodeSub'] : '';

                // 판매가격 정보 조회 및 확인
                $prod_price_data_query = $this->_conn->query('select ifnull(fn_product_saleprice_data(?), "N") as ProdPriceData', [$prod_row['ProdCode']]);
                $prod_price_data = $prod_price_data_query->row(0)->ProdPriceData;
                
                $prod_price_data = json_decode($prod_price_data, true);
                if (empty($prod_price_data) === true || isset($prod_price_data[0]['SaleTypeCcd']) === false) {
                    throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
                $prod_price_data = element('0', $prod_price_data);

                // 주문상품 데이터 가공
                $order_prod_data[] = [
                    'CartType' => array_search($prod_row['ProdTypeCcd'], $this->_prod_type_ccd),
                    'CartProdType' => $learn_pattern,
                    'SiteCode' => $site_code,
                    'ProdCode' => $prod_row['ProdCode'],
                    'ProdCodeSub' => $prod_code_sub,
                    'ProdName' => $chk_data['ProdName'],
                    'LearnPatternCcd' => $prod_row['LearnPatternCcd'],
                    'PackTypeCcd' => $prod_row['PackTypeCcd'],
                    'SaleTypeCcd' => $prod_price_data['SaleTypeCcd'],
                    'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                    'RealSalePrice' => $prod_price_data['RealSalePrice'],
                    'RealPayPrice' => 0,
                    'CouponDiscPrice' => $prod_price_data['RealSalePrice'],
                    'CouponDiscRate' => 100,
                    'CouponDiscType' => 'R',
                    'UserCouponIdx' => $coupon_detail_idx
                ];

                $total_prod_order_price += $prod_price_data['RealSalePrice'];
            }

            // 주문 데이터 등록
            $repr_prod_name = $order_prod_data[0]['ProdName'] . (count($order_prod_data) > 1 ? ' 외 ' . (count($order_prod_data) - 1) . '건' : '');   // 대표 주문상품명

            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $site_code,
                'ReprProdName' => $repr_prod_name,
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => element('on_zero', $this->_pay_route_ccd),
                'PayMethodCcd' => '',
                'PgCcd' => '',
                'PgMid' => '',
                'PgTid' => '',
                'OrderPrice' => $total_prod_order_price,
                'OrderProdPrice' => $total_prod_order_price,
                'RealPayPrice' => 0,
                'CardPayPrice' => 0,
                'CashPayPrice' => 0,
                'DeliveryPrice' => 0,
                'DeliveryAddPrice' => 0,
                'DiscPrice' => $total_prod_order_price,
                'UseLecPoint' => 0,
                'UseBookPoint' => 0,
                'SaveLecPoint' => 0,
                'SaveBookPoint' => 0,
                'IsEscrow' => 'N',
                'IsCashReceipt' => 'N',
                'IsDelivery' => 'N',
                'IsVisitPay' => 'N',
                'GwIdx' => $this->session->userdata('gw_idx'),
                'OrderIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($order_prod_data as $order_prod_row) {
                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $order_prod_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        return true;
    }

    /**
     * 가상계좌 입금통보 결과 수신 후 결제완료 업데이트
     * @param array $deposit_results
     * @return array|bool
     */
    public function procDepositComplete($deposit_results = [])
    {
        $order_no = $deposit_results['order_no'];   // 결제모듈에서 전달받은 주문번호

        $this->_conn->trans_begin();

        try {
            // 주문정보 조회
            $order_row = $this->orderListFModel->findOrder([
                'EQ' => ['O.OrderNo' => $order_no, 'O.PgMid' => $deposit_results['mid']]
            ]);

            if (empty($order_row) === true) {
                throw new \Exception('주문내역이 없습니다.', _HTTP_NOT_FOUND);
            }

            if ($order_row['PayRouteCcd'] != $this->_pay_route_ccd['pg'] || $order_row['IsVBank'] == 'N') {
                throw new \Exception('무통장입금(가상계좌)으로 결제한 주문만 처리가 가능합니다.', _HTTP_BAD_REQUEST);
            }

            if (empty($order_row['CompleteDatm']) === false) {
                throw new \Exception('이미 결제완료 처리된 주문내역 입니다.', _HTTP_BAD_REQUEST);
            }

            if (empty($order_row['VBankCancelDatm']) === false) {
                throw new \Exception('이미 취소 처리된 주문내역입니다.', _HTTP_BAD_REQUEST);
            }

            if ($order_row['RealPayPrice'] != $deposit_results['total_pay_price']) {
                throw new \Exception('결제금액 정보가 올바르지 않습니다.', _HTTP_BAD_REQUEST);
            }
            
            // 주문정보
            $order_idx = $order_row['OrderIdx'];    // 주문 식별자
            $mem_idx = $order_row['MemIdx'];    // 회원 식별자
            $order_date = substr($order_row['OrderDatm'], 0, 10);   // 주문일자 (Y-m-d)

            // 주문정보 완료일시 업데이트
            $is_update = $this->_conn->set('CompleteDatm', $deposit_results['deposit_datm'])
                ->where('OrderIdx', $order_idx)->where('OrderNo', $order_no)->update($this->_table['order']);
            if ($is_update === false) {
                throw new \Exception('주문정보 완료일시 업데이트에 실패했습니다.');
            }

            // 주문상품 결제완료 업데이트
            $is_update = $this->_conn->set('PayStatusCcd', $this->_pay_status_ccd['paid'])->set('UpdDatm', 'NOW()', false)
                ->where('OrderIdx', $order_idx)->update($this->_table['order_product']);
            if ($is_update === false) {
                throw new \Exception('주문상품 결제완료 업데이트에 실패했습니다.');
            }

            // 주문상품 목록 조회
            $order_prod_rows = $this->orderListFModel->listOrderProduct(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, ['OP.OrderProdIdx' => 'asc']);
            foreach ($order_prod_rows as $idx => $order_prod_row) {
                // 포인트 적립
                if ($order_prod_row['SavePoint'] > 0 && empty($order_prod_row['SavePointType']) === false) {
                    $is_point_save = $this->pointFModel->addOrderSavePoint($order_prod_row['SavePointType'], $order_prod_row['SavePoint'], $order_prod_row['SiteCode'], $order_idx, $order_prod_row['OrderProdIdx'], $mem_idx);
                    if ($is_point_save !== true) {
                        throw new \Exception($is_point_save);
                    }
                }

                // 자동지급 쿠폰 데이터 등록 (온라인강좌, 학원강좌, 모의고사 일 경우만 실행)
                if ($order_prod_row['ProdTypeCcd'] == $this->_prod_type_ccd['on_lecture'] || $order_prod_row['ProdTypeCcd'] == $this->_prod_type_ccd['off_lecture'] || $order_prod_row['ProdTypeCcd'] == $this->_prod_type_ccd['mock_exam']) {
                    $is_add_auto_coupon = $this->addAutoMemberCoupon($order_prod_row['OrderProdIdx'], $order_prod_row['ProdCode'], $mem_idx);
                    if ($is_add_auto_coupon !== true) {
                        throw new \Exception($is_add_auto_coupon);
                    }
                }

                // 온라인강좌 운영자/기간제 패키지일 경우 주문일 당일 입금완료가 아닐 경우 수강 시작/종료일을 결제일자 기준으로 업데이트
                if ($order_prod_row['LearnPatternCcd'] == $this->_learn_pattern_ccd['adminpack_lecture'] || $order_prod_row['LearnPatternCcd'] == $this->_learn_pattern_ccd['periodpack_lecture']) {
                    // 결제일자 - 주문일자
                    $diff_days = diff_days(date('Y-m-d'), $order_date);

                    if ($diff_days > 0) {
                        $is_lec_date_update = $this->_conn->set('LecStartDate', date('Y-m-d'))
                            ->set('LecEndDate', 'date_add(LecEndDate, interval ' . $diff_days . ' day)', false)
                            ->set('RealLecEndDate', 'date_add(RealLecEndDate, interval ' . $diff_days . ' day)', false)
                            ->where('OrderIdx', $order_idx)->where('OrderProdIdx', $order_prod_row['OrderProdIdx'])->where('ProdCode', $order_prod_row['ProdCode'])
                            ->update($this->_table['my_lecture']);

                        if ($is_lec_date_update !== true) {
                            throw new \Exception('수강 시작/종료일 업데이트에 실패했습니다.');
                        }
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'ret_data' => $order_no];
    }

    /**
     * 주문 취소 (가상계좌만 취소 가능)
     * @param $order_no
     * @return array|bool
     */
    public function cancelOrder($order_no)
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션

            // 주문정보 조회
            $order_row = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);
            if (empty($order_row) === true) {
                throw new \Exception('주문내역이 없습니다.', _HTTP_NOT_FOUND);
            }

            if ($order_row['PayRouteCcd'] != $this->_pay_route_ccd['pg'] || $order_row['IsVBank'] == 'N') {
                throw new \Exception('무통장입금(가상계좌)으로 결제한 주문만 취소 가능합니다.', _HTTP_BAD_REQUEST);
            }

            if (empty($order_row['VBankCancelDatm']) === false) {
                throw new \Exception('이미 취소한 주문내역입니다.', _HTTP_BAD_REQUEST);
            }

            if ($order_row['VBankExpireDatm'] < date('Y-m-d H:i:s')) {
                throw new \Exception('입금기한이 만료된 주문내역입니다.', _HTTP_BAD_REQUEST);
            }

            $order_idx = $order_row['OrderIdx'];    // 주문식별자

            // 주문 데이터 가상계좌 취소 업데이트
            $is_cancel = $this->_conn->set('VBankCancelDatm', 'NOW()', false)
                ->where('OrderIdx', $order_idx)->where('MemIdx', $sess_mem_idx)->update($this->_table['order']);
            if ($is_cancel === false) {
                throw new \Exception('주문 취소에 실패했습니다.');
            }

            // 주문상품 데이터 취소 업데이트
            $is_cancel = $this->_conn->set('PayStatusCcd', $this->_pay_status_ccd['vbank_wait_cancel'])->set('UpdDatm', 'NOW()', false)
                ->where('OrderIdx', $order_idx)->where('MemIdx', $sess_mem_idx)->update($this->_table['order_product']);
            if ($is_cancel === false) {
                throw new \Exception('주문상품 취소에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 결제완료, 가상계좌신청완료 SMS 발송, 주문상품 자동문자 메시지 발송
     * @param $order_no
     */
    public function sendOrderSms($order_no)
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $sess_mem_name = $this->session->userdata('mem_name');
        $sess_mem_phone = $this->session->userdata('mem_phone');
        $callback_number = '1544-5006';

        if (empty($order_no) === false && empty($sess_mem_idx) === false && empty($sess_mem_phone) === false) {
            // 주문정보 조회
            $data = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);

            if (empty($data) === false) {
                $this->load->library('sendSms');

                if ($data['IsVBank'] == 'Y') {
                    //$sms_msg = '[윌비스] 가상계좌 ' . config_item('vbank_account_name') . ' ' . str_replace('은행', '', $data['VBankName']);
                    //$sms_msg .= ' ' . $data['VBankAccountNo'] . ' (' . date('n/j', strtotime($data['VBankExpireDatm'])) . '까지 유효)';
                    // 가상계좌 메시지 변경 (2019.05.09)
                    $sms_msg = config_item('vbank_account_name') . ' ' . str_replace('은행', '', $data['VBankName']);
                    $sms_msg .= ' 계좌번호 ' . $data['VBankAccountNo'] . ' 금액 : ' . number_format($data['RealPayPrice']);
                    $sms_msg .= ' (~' . date('n/j', strtotime($data['VBankExpireDatm'])) . ')';
                } else {
                    $sms_msg = '[윌비스] ' . $sess_mem_name . '님 결제완료되셨습니다. [주문번호 ' . $order_no . ']';
                }
                
                $this->sendsms->send($sess_mem_phone, $sms_msg, $callback_number);

                // 주문상품 자동문자발송 메시지 조회 및 발송
                $sms_data = $this->orderListFModel->getOrderProductAutoSmsMsg($order_no, $sess_mem_idx);
                if (empty($sms_data) === false) {
                    foreach ($sms_data as $sms_row) {
                        if (empty($sms_row['SendSmsTel']) === false && empty($sms_row['SendSmsMsg']) === false) {
                            $this->sendsms->send($sess_mem_phone, str_replace(PHP_EOL, ' ', $sms_row['SendSmsMsg']), $sms_row['SendSmsTel']);                   
                        }
                    }
                }
            }
        }
    }
}
