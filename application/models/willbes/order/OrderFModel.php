<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/order/BaseOrderFModel.php';

class OrderFModel extends BaseOrderFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원식별자 기준 최근 배송정보 조회
     * @param $mem_idx
     * @return mixed
     */
    public function getRecentDeliveryAddress($mem_idx)
    {
        $column = 'OD.Receiver
            , OD.ReceiverTel1, if(length(OD.ReceiverTel2Enc) > 0, fn_dec(OD.ReceiverTel2Enc), "") as ReceiverTel2, OD.ReceiverTel3, if(length(OD.ReceiverTelEnc) > 0, fn_dec(OD.ReceiverTelEnc), "") as ReceiverTel
            , OD.ReceiverPhone1, fn_dec(OD.ReceiverPhone2Enc) as ReceiverPhone2, OD.ReceiverPhone3, fn_dec(OD.ReceiverPhoneEnc) as ReceiverPhone
            , OD.ZipCode, OD.Addr1, fn_dec(OD.Addr2Enc) as Addr2, OD.DeliveryMemo';
        $arr_condition = ['EQ' => ['O.MemIdx' => $mem_idx]];

        $data = $this->_conn->getJoinListResult($this->_table['order'] . ' as O', 'inner', $this->_table['order_delivery_address'] . ' as OD'
            , 'O.OrderIdx = OD.OrderIdx'
            , $column, $arr_condition, 1, 0, ['O.OrderIdx' => 'desc']
        );

        return element('0', $data, []);
    }

    /**
     * @param string $make_type [데이터 생성구분, 주문 : order, 결제 : pay]
     * @param string $cart_type [장바구니 구분, 온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book]
     * @param array $cart_rows [유효한 장바구니 데이터]
     * @param array $arr_coupon_detail_idx [장바구니별 적용된 사용자쿠폰 식별자]
     * @param int $use_point [결제 사용 포인트]
     * @return array|string
     */
    public function getMakeCartReData($make_type, $cart_type, $cart_rows = [], $arr_coupon_detail_idx = [], $use_point = 0)
    {
        if (empty($cart_rows) === true) {
            return '장바구니 데이터가 없습니다.';
        }

        $results = [];
        $total_prod_cnt = 0;
        $total_prod_order_price = 0;
        $total_prod_pay_price = 0;
        $total_coupon_disc_price = 0;
        $total_save_point = 0;
        $delivery_price = 0;
        $delivery_pay_price = 0;
        $is_delivery_info = false;
        $is_package = false;
        $arr_user_coupon_idx = [];
        $use_point = get_var($use_point, 0);

        foreach ($cart_rows as $idx => $row) {
            // 장바구니 구분과 실제 상품구분 값 비교 (온라인강좌 : on_lecture, 학원강좌 : off_lecture, 교재 : book, 기타 : etc (배송료))
            if ($cart_type != $row['CartType'] && $row['CartType'] != 'etc') {
                return '장바구니와 주문상품의 구분이 일치하지 않습니다.';
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
                    if (empty($row['StudyStartDate']) === false && date('Y-m-d') < $row['StudyStartDate']) {
                        // 개강일이 오늘 날짜보다 이후 인 경우 (개강하지 않은 상품)
                        $row['DefaultStudyStartDate'] = $row['StudyStartDate'];
                        $row['IsStudyStartDate'] = 'N';
                    } else {
                        // 이미 개강한 상품
                        $row['DefaultStudyStartDate'] = date('Y-m-d', strtotime(date('Y-m-d') . ' +8 day'));
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
            if (($make_type == 'pay' && $use_point > 0) || $row['IsPoint'] != 'Y' || $row['CartType'] == 'off_lecture' || $row['CartProdType'] == 'delivery_price') {
                $row['RealSavePoint'] = 0;
            } else {
                $row['RealSavePoint'] = $row['PointSaveType'] == 'R' ? (int) ($row['RealPayPrice'] * ($row['PointSavePrice'] / 100)) : $row['PointSavePrice'];
            }

            // 배송정보 입력 여부
            if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                $is_delivery_info = true;
            }

            // 패키지상품 포함 여부
            if ($is_package === false && ends_with($row['CartProdType'], '_package') === true) {
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

            $results['list'][] = $row;
        }

        // 사용포인트 체크 (학원강좌일 경우 포인트 사용 불가)
        if ($make_type == 'pay' && $use_point > 0) {
            $check_use_point = $this->checkUsePoint($cart_type, $use_point, $total_prod_pay_price, $is_package);
            if ($check_use_point !== true) {
                return $check_use_point;
            }
        }

        $results['total_prod_cnt'] = $total_prod_cnt;   // 전체상품 갯수
        $results['total_prod_order_price'] = $total_prod_order_price;     // 전체 상품주문금액
        $results['delivery_price'] = $delivery_price;   // 주문 배송료
        $results['total_pay_price'] = $total_prod_pay_price + $delivery_pay_price - $use_point;    // 실제 결제금액 + 실제 결제 배송료 - 사용포인트
        $results['total_coupon_disc_price'] = $total_coupon_disc_price; // 전체 쿠폰할인금액
        $results['total_save_point'] = $total_save_point;     // 전체 적립예정포인트
        $results['user_coupon_idxs'] = $arr_user_coupon_idx;     // 유효한 사용자 쿠폰식별자 배열
        $results['use_point'] = $use_point;     // 사용포인트
        $results['is_delivery_info'] = $is_delivery_info;   // 배송정보 입력 여부
        $results['is_package'] = $is_package;   // 패키지상품 포함 여부
        $results['repr_prod_name'] = $results['list'][0]['ProdName'] . ($results['total_prod_cnt'] > 1 ? ' 외 ' . ($results['total_prod_cnt'] - 1) . '건' : '');   // 대표 주문상품명
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
        // 사용자 쿠폰 모델 로드
        $this->load->loadModels(['couponF']);

        if (empty($coupon_detail_idx) === true || empty($cart_row) === true || $cart_row['IsCoupon'] != 'Y') {
            return ['UserCouponIdx' => '', 'CouponDiscPrice' => 0, 'CouponDiscType' => 'R', 'CouponDiscRate' => 0];
        }

        $arr_param = [
            'SiteCode' => $cart_row['SiteCode'],
            'CateCode' => $cart_row['CateCode'],
            'ApplyTypeCcd' => $this->_coupon_apply_type_ccd[$cart_row['ProdTypeCcd']],
            'LecTypeCcd' => element($cart_row['LearnPatternCcd'], $this->_coupon_lec_type_ccd),
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
     * @param int $total_prod_pay_price [전체상품 결제금액, 배송료 제외]
     * @param bool $is_package [패키지상품 포함 여부]
     * @return bool|string
     */
    public function checkUsePoint($cart_type, $use_point = 0, $total_prod_pay_price = 0, $is_package = false)
    {
        // 회원 보유포인트     // TODO : 회원포인트 조회 로직 추가 필요 (강좌, 교재 포인트 구분하여 조회)
        $has_point = 3000;
        $use_min_point = config_item('use_min_point');  // 최소 사용 포인트
        $use_point_unit = config_item('use_point_unit');    // 포인트 사용 단위
        $use_max_point_rate = config_item('use_max_point_rate');    // 결제금액 대비 포인트 사용 가능 최대 비율
        $use_max_point = (int) ($total_prod_pay_price * ($use_max_point_rate / 100));

        if ($use_point < 1 || $total_prod_pay_price < 1) {
            return true;
        }

        if ($cart_type == 'off_lecture') {
            return '학원강좌 상품은 포인트 사용이 불가능합니다.';
        }

        if ($has_point < $use_point) {
            return '보유 포인트가 부족합니다.';
        }

        if ($is_package === true) {
            return '패키지 상품은 포인트 사용이 불가능합니다.';
        }

        if ($use_point < $use_min_point || $has_point < $use_min_point || ($use_point % $use_point_unit != 0)) {
            return '포인트는 ' . number_format($use_min_point) . 'P부터 ' . $use_point_unit . 'P 단위로 사용 가능합니다.';
        }

        if ($use_point > $use_max_point) {
            return '포인트는 주문금액의 ' . $use_max_point_rate . '%까지만 사용 가능합니다.' . PHP_EOL . '(최대 사용가능 포인트 : ' . number_format($use_max_point) . 'P)';
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
        $this->load->loadModels(['order/cartF']);   // 장바구니 모델 로드
        $order_no = $pay_results['order_no'];   // 결제모듈에서 전달받은 주문번호

        $this->_conn->trans_begin();
        
        try {
            $sess_mem_idx = $this->session->userdata('mem_idx');    // 회원 식별자 세션
            $sess_cart_idx = $this->cartFModel->checkSessCartIdx(false);    // 장바구니 식별자 세션 체크
            $sess_order_no = $this->checkSessOrderNo(false);    // 주문번호 세션 체크

            if ($sess_cart_idx === false || $sess_order_no === false || $order_no != $sess_order_no) {
                throw new \Exception('잘못된 접근입니다.');
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
                throw new \Exception('잘못된 접근입니다.');
            }

            $post_data = unserialize($post_row['PostData']);    // 주문 폼 데이터 unserialize
            $arr_user_coupon_idx = json_decode($post_row['UserCouponIdxJson'], true);   // 사용자 쿠폰
            $is_pay_method_vbank = $this->_pay_method_ccd['vbank'] == $post_row['PayMethodCcd'];   // 가상계좌 여부
            $pay_method_ccd = $is_pay_method_vbank === true ? $this->_pay_status_ccd['vbank_wait'] : $this->_pay_status_ccd['paid'];    // 주문완료 결제상태공통코드 (결제완료/입금대기)
            $is_escrow = element('is_escrow', $post_data, 'N'); // 에스크로 결제 여부
            
            // 장바구니 조회
            $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $post_row['SiteCode'], null, $sess_cart_idx, null, null, 'N');

            // 장바구니 데이터 가공
            $cart_results = $this->orderFModel->getMakeCartReData(
                'pay', $post_row['CartType'], $cart_rows, $arr_user_coupon_idx, $post_row['UsePoint']
            );

            if (is_array($cart_results) === false) {
                throw new \Exception($cart_results);
            }

            // TODO : 테스트 (추후 주석 삭제)
/*            // 결제요청금액, 실제결제금액, 장바구니 재계산 금액이 모두 일치하는지 여부 확인
            if ($pay_results['total_pay_price'] != $post_row['ReqPayPrice'] || $pay_results['total_pay_price'] != $cart_results['total_pay_price']) {
                throw new \Exception('결제금액정보가 올바르지 않습니다.');
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
                'CashPayPrice' => '0',
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

            if ($is_pay_method_vbank === false) {
                $this->_conn->set('CompleteDatm', 'NOW()', false);
            }

            if ($this->_conn->set($data)->insert($this->_table['order']) === false) {
                throw new \Exception('주문 정보 등록에 실패했습니다.');
            }

            // 주문 식별자
            $order_idx = $this->_conn->insert_id();

            // 주문상품 데이터 등록
            foreach ($cart_results['list'] as $idx => $cart_row) {
                $is_order_product = $this->addOrderProduct($order_idx, $pay_method_ccd, $is_escrow, $cart_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }
            
            // 추가 배송료 주문상품 데이터 등록
            if ($post_row['DeliveryAddPrice'] > 0) {
                $is_order_product = $this->addOrderProductForDeliveryAddPrice($order_idx, $pay_method_ccd, $post_row['SiteCode']);
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
            
            // TODO : 포인트 적립/차감

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
            // 장바구니 식별자, 주문번호 세션 삭제
            $this->destroySessCartIdx();
            $this->destroySessOrderNo();
        }

        return ['ret_cd' => true, 'ret_data' => $order_no];
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

            $data = [
                'OrderIdx' => $order_idx,
                'MemIdx' => $sess_mem_idx,
                'ProdCode' => element('ProdCode', $input),
                'ProdCodeSub' => element('ProdCodeSub', $input),
                'ParentProdCode' => element('ParentProdCode', $input),
                'SaleTypeCcd' => element('SaleTypeCcd', $input),
                'PayStatusCcd' => $pay_status_ccd,
                'OrderPrice' => element('RealSalePrice', $input),
                'RealPayPrice' => element('RealPayPrice', $input),
                'CardPayPrice' => element('RealPayPrice', $input),
                'CashPayPrice' => 0,
                'DiscPrice' => element('CouponDiscPrice', $input, 0),
                'DiscRate' => element('CouponDiscRate', $input, 0),
                'DiscType' => element('CouponDiscType', $input, 'R'),
                'DiscReason' => (empty($user_coupon_idx) === false  ? '쿠폰사용' : ''),
                'UsePoint' => element('RealUsePoint', $input, 0),   // TODO : 상품결제금액별 사용포인트 분할 계산 값 저장 필요
                'SavePoint' => element('RealSavePoint', $input, 0),
                'IsUseCoupon' => (empty($user_coupon_idx) === false  ? 'Y' : 'N'),
                'UserCouponIdx' => $user_coupon_idx
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_product']) === false) {
                throw new \Exception('주문상품 정보 등록에 실패했습니다.');
            }

            // 주문상품 식별자
            $order_prod_idx = $this->_conn->insert_id();

            // 주문상품배송정보 데이터 등록
            if (element('IsDeliveryInfo', $input, 'N') == 'Y') {
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
                $this->load->loadModels(['couponF']);   // 쿠폰 모델 로드
                
                $is_udpate = $this->couponFModel->modifyUseMemberCoupon($user_coupon_idx, $order_prod_idx);
                if ($is_udpate !== true) {
                    throw new \Exception($is_udpate);
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
     * @return bool|string
     */
    public function addOrderProductForDeliveryAddPrice($order_idx, $pay_status_ccd, $site_code)
    {
        $this->load->loadModels(['product/productF']);  // 기본상품모델 로드

        try {
            // 추가 배송료 상품 조회
            $prod_rows = $this->productFModel->listSalesProduct('delivery_add_price', false, ['EQ' => ['SiteCode' => $site_code]], 1, 0, ['ProdCode' => 'desc']);
            if (empty($prod_rows) === true) {
                throw new \Exception('추가 배송료 상품이 존재하지 않습니다.', _HTTP_NOT_FOUND);
            }

            $prod_row = element('0', $prod_rows);
            $prod_row['ProdPriceData'] = element('0', json_decode($prod_row['ProdPriceData'], true));

            $data = [
                'ProdCode' => $prod_rows['ProdCode'],
                'ProdCodeSub' => '',
                'ParentProdCode' => $prod_rows['ProdCode'],
                'SaleTypeCcd' => $prod_row['ProdPriceData']['SaleTypeCcd'],
                'OrderPrice' => $prod_row['ProdPriceData']['SalePrice'],
                'RealPayPrice' => $prod_row['ProdPriceData']['RealSalePrice'],
                'CardPayPrice' => $prod_row['ProdPriceData']['RealSalePrice']
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
}
