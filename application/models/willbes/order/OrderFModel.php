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

            // 적립 포인트 (학원강좌, 배송료 상품일 경우 포인트 적립 불가)
            if (($make_type == 'pay' && $use_point > 0) || $row['IsPoint'] != 'Y') {
                $row['RealSavePoint'] = 0;
            } else {
                $row['RealSavePoint'] = $row['PointSaveType'] == 'R' ? (int) ($row['RealPayPrice'] * ($row['PointSavePrice'] / 100)) : $row['PointSavePrice'];
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
     * @param $coupon_detail_idx
     * @param array $cart_row
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
                'SavePoint' => element('save_point', $params),
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

            if ($sess_cart_idx === false || $sess_order_no === false || $order_no != $sess_order_no) {
                throw new \Exception('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
            }

            // 주문요청 데이터 조회
            $post_row = $this->_conn->getFindResult($this->_table['order_post_data'],
                'CartType, CartIdxs, SiteCode, PgCcd, PayMethodCcd, ReprProdName, OrderProdPrice, ReqPayPrice, DeliveryPrice, DeliveryAddPrice, CouponDiscPrice, UsePoint, SavePoint, UserCouponIdxJson, PostData',
                ['EQ' => ['OrderNo' => $order_no, 'MemIdx' => $sess_mem_idx]]
            );

            if (empty($post_row) === true) {
                throw new \Exception('주문요청 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 장바구니 식별자 세션과 결제요청 장바구니 식별자 비교
            if (empty(array_diff($sess_cart_idx, explode(',', $post_row['CartIdxs']))) === false) {
                throw new \Exception('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
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

            // TODO : 테스트 (추후 주석 삭제)
/*            // 결제요청금액, 실제결제금액, 장바구니 재계산 금액이 모두 일치하는지 여부 확인
            if ($pay_results['total_pay_price'] != $post_row['ReqPayPrice'] || $pay_results['total_pay_price'] != $cart_results['total_pay_price']) {
                throw new \Exception('결제금액이 일치하지 않습니다.', _HTTP_BAD_REQUEST);
            }*/

            // 주문 데이터 등록
            $data = [
                'OrderNo' => $order_no,
                'MemIdx' => $sess_mem_idx,
                'SiteCode' => $post_row['SiteCode'],
                'ReprProdName' => $post_row['ReprProdName'],
                'PayChannelCcd' => element(APP_DEVICE, $this->_pay_channel_ccd),
                'PayRouteCcd' => element('pg', $this->_pay_route_ccd),
                'PayMethodCcd' => $post_row['PayMethodCcd'],
                'PgCcd' => $post_row['PgCcd'],
                'PgMid' => $pay_results['mid'],
                'PgTid' => $pay_results['tid'],
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
                'SaveLecPoint' => ($post_row['CartType'] == 'book' ? 0 : $post_row['SavePoint']),
                'SaveBookPoint' => ($post_row['CartType'] == 'book' ? $post_row['SavePoint'] : 0),
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
                $learn_pattern = array_search($cart_row['LearnPatternCcd'], $this->_learn_pattern_ccd);
                $learn_pattern === false && $learn_pattern = $cart_row['CartProdType'];

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
                ->where_in('CartIdx', $sess_cart_idx)->where('MemIdx', $sess_mem_idx)->update($this->_table['cart']);
            if ($is_complete_update === false) {
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
     * @return bool|string
     */
    public function addOrderProduct($order_idx, $pay_status_ccd, $is_escrow = 'N', $input = [])
    {
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $user_coupon_idx = element('UserCouponIdx', $input, 0);
            $cart_type = element('CartType', $input);   // 장바구니 타입
            $cart_prod_type = element('CartProdType', $input);   // 장바구니 상품 타입
            $site_code = element('SiteCode', $input);   // 사이트코드
            $prod_code = element('ProdCode', $input);   // 상품코드
            $arr_prod_code_sub = empty(element('ProdCodeSub', $input)) === false ? explode(',', element('ProdCodeSub', $input)) : [];   // 패키지의 서브상품코드 배열

            $point_type = $cart_type == 'book' ? 'book' : 'lecture';    // 포인트 구분
            $real_use_point = element('RealUsePoint', $input, 0);   // 사용포인트
            $real_pay_price = element('RealPayPrice', $input) - $real_use_point;    // 실결제금액에서 사용포인트 차감
            $real_save_point = element('RealSavePoint', $input, 0);     // 적립포인트
            $is_visit_pay = element('IsVisitPay', $input, 'N');     // 방문결제 여부
            $is_delivery_info = element('IsDeliveryInfo', $input, 'N');     // 주문상품배송정보 입력 여부
            $ca_idx = element('CaIdx', $input);     // 인증신청식별자
            
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
                'CardPayPrice' => $real_pay_price,
                'CashPayPrice' => 0,
                'DiscPrice' => element('CouponDiscPrice', $input, 0),
                'DiscRate' => element('CouponDiscRate', $input, 0),
                'DiscType' => element('CouponDiscType', $input, 'R'),
                'UsePoint' => $real_use_point,
                'SavePoint' => $real_save_point,
                'IsUseCoupon' => (empty($user_coupon_idx) === false  ? 'Y' : 'N'),
                'UserCouponIdx' => $user_coupon_idx,
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

            // 나의 강좌수정정보 데이터 등록 (온라인강좌, 학원강좌일 경우만)
            if ($cart_type == 'on_lecture' || $cart_type == 'off_lecture') {
                $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $prod_code, $arr_prod_code_sub, element('UserStudyStartDate', $input, ''));
                if ($is_add_my_lecture !== true) {
                    throw new \Exception($is_add_my_lecture);
                }
            }

            // 주문상품배송정보 데이터 등록 (방문결제가 아닐 경우)
            if ($is_delivery_info == 'Y' && $is_visit_pay == 'N') {
                $data = [
                    'OrderProdIdx' => $order_prod_idx,
                    'DeliveryCompCcd' => config_app('DeliveryCompCcd'),
                    'IsEscrowSend' => $is_escrow
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product_delivery_info']) === false) {
                    throw new \Exception('주문상품 배송정보 등록에 실패했습니다.');
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
                $is_point_save = $this->pointFModel->addOrderSavePoint($point_type, $real_save_point, $site_code, $order_idx, $order_prod_idx);
                if ($is_point_save !== true) {
                    throw new \Exception($is_point_save);
                }
            }

            // 회원 포인트 사용
            if ($real_use_point > 0) {
                $is_point_use = $this->pointFModel->addOrderUsePoint($point_type, $real_use_point, $site_code, $order_idx, $order_prod_idx);
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
            $prod_row['ProdPriceData'] = element('0', json_decode($prod_row['ProdPriceData'], true));

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

            if ($this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $data) !== true) {
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
     * @param string $user_study_start_date [사용자 지정 강좌시작일]
     * @return bool|string
     */
    public function addMyLecture($order_idx, $order_prod_idx, $prod_code, $arr_prod_code_sub = [], $user_study_start_date = '')
    {
        try {
            $row = $this->productFModel->findProductLectureInfo($prod_code);
            if (empty($row) === true) {
                throw new \Exception('상품정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            $learn_pattern = array_search($row['LearnPatternCcd'], $this->_learn_pattern_ccd);  // 학습형태

            if ($learn_pattern == 'on_lecture' || $learn_pattern == 'adminpack_lecture' || $learn_pattern == 'periodpack_lecture' || $learn_pattern == 'on_free_lecture'
                || $learn_pattern == 'off_lecture') {
                // 단강좌, 운영자패키지, 기간제패키지, 무료강좌, 학원 단과
                // 수강시작일, 수강종료일 조회
                $arr_lec_date = $this->getMyLectureLecStartEndDate($row['LearnPatternCcd'], $row['StudyStartDate'], $row['StudyEndDate'], $row['StudyPeriod'], $user_study_start_date);

                $data = [
                    'OrderIdx' => $order_idx,
                    'OrderProdIdx' => $order_prod_idx,
                    'ProdCode' => $prod_code,
                    'LecStartDate' => $arr_lec_date['lec_start_date'],
                    'LecEndDate' => $arr_lec_date['lec_end_date'],
                    'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                    'LecStudyTime' => $row['MultipleAllLecSec'],
                    'RealLecStudyTime' => $row['MultipleAllLecSec'],
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
                    // 수강시작일, 수강종료일 조회
                    $arr_lec_date = $this->getMyLectureLecStartEndDate($prod_row['LearnPatternCcd'], $prod_row['StudyStartDate'], $prod_row['StudyEndDate'], $prod_row['StudyPeriod'], $user_study_start_date);

                    $data = [
                        'OrderIdx' => $order_idx,
                        'OrderProdIdx' => $order_prod_idx,
                        'ProdCode' => $prod_code,
                        'LecStartDate' => $arr_lec_date['lec_start_date'],
                        'LecEndDate' => $arr_lec_date['lec_end_date'],
                        'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                        'LecStudyTime' => $prod_row['MultipleAllLecSec'],
                        'RealLecStudyTime' => $prod_row['MultipleAllLecSec'],
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
     * @return array|bool
     */
    public function procVisitOrder($site_code)
    {
        $this->_conn->trans_begin();

        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $sess_cart_sess_id = $this->session->userdata($this->_sess_cart_sess_id);   // 학원 방문결제 장바구니 세션 아이디 세션
            $order_no = $this->makeOrderNo();   // 주문번호 생성
            $cart_type = 'off_lecture';     // 장바구니 타입
            $pay_status_ccd = $this->_pay_status_ccd['receipt_wait'];    // 주문완료 결제상태공통코드 (접수대기)

            // 장바구니 조회
            $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $site_code, null, null, null, null, 'Y');

            // 장바구니 데이터 가공
            $cart_results = $this->getMakeCartReData('pay', $cart_type, $cart_rows, [], 0, '', 'Y');

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
                'CardPayPrice' => $cart_results['total_pay_price'],
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
                'GwIdx' => $this->session->userdata('gw_idx'),
                'OrderIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['order']) === false) {
                throw new \Exception('주문정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($cart_results['list'] as $idx => $cart_row) {
                // 상품 판매여부 체크
                $learn_pattern = array_search($cart_row['LearnPatternCcd'], $this->_learn_pattern_ccd);
                $learn_pattern === false && $learn_pattern = $cart_row['CartProdType'];

                $is_prod_check = $this->cartFModel->checkProduct($learn_pattern, $site_code, $cart_row['ProdCode'], $cart_row['ParentProdCode'], 'Y');
                if ($is_prod_check !== true) {
                    throw new \Exception($is_prod_check);
                }

                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $cart_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            // 주문완료 장바구니 업데이트 (주문식별자, 만료일시 -> 현재시각으로 업데이트)
            $is_complete_update = $this->_conn->set('ConnOrderIdx', $order_idx)->set('ExpireDatm', 'NOW()', false)
                ->where('SessId', $sess_cart_sess_id)->where('MemIdx', $sess_mem_idx)->where('IsVisitPay', 'Y')->update($this->_table['cart']);
            if ($is_complete_update === false) {
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

                $is_order_product = $this->addOrderProduct($order_idx, $pay_status_ccd, 'N', $data);
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
                'EQ' => ['O.OrderNo' => $order_no, 'O.PgTid' => $deposit_results['tid'], 'O.PgMid' => $deposit_results['mid']]
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

            if ($order_row['RealPayPrice'] != $deposit_results['total_pay_price']) {
                throw new \Exception('결제금액 정보가 올바르지 않습니다.', _HTTP_BAD_REQUEST);
            }

            // 주문 식별자
            $order_idx = $order_row['OrderIdx'];

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

            // 회원포인트 적립
            if ($order_row['SaveLecPoint'] > 0 || $order_row['SaveBookPoint'] > 0) {
                // 주문상품 목록 조회
                $order_prod_rows = $this->orderListFModel->listOrderProduct(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, ['OP.OrderProdIdx' => 'asc']);
                foreach ($order_prod_rows as $idx => $order_prod_row) {
                    if ($order_prod_row['SavePoint'] > 0) {
                        $point_type = $order_prod_row['OrderProdType'] == 'book' ? 'book' : 'lecture';

                        $is_point_save = $this->pointFModel->addOrderSavePoint($point_type, $order_prod_row['SavePoint'], $order_row['SiteCode'], $order_idx, $order_prod_row['OrderProdIdx']);
                        if ($is_point_save !== true) {
                            throw new \Exception($is_point_save);
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
}
