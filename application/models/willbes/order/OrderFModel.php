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
     * @param string $cart_type [장바구니 구분, 강좌 : on_lecture, 교재 : book]
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
        $total_order_price = 0;
        $total_prod_pay_price = 0;
        $total_coupon_disc_price = 0;
        $total_save_point = 0;
        $is_delivery_info = false;
        $is_on_package = false;
        $arr_is_freebies_trans = [];
        $use_point = get_var($use_point, 0);

        foreach ($cart_rows as $idx => $row) {
            // 장바구니 구분과 실제 상품구분 값 비교 (강좌 : on_lecture, 교재 : book)
            if ($cart_type != $row['CartType']) {
                return '장바구니와 주문상품의 구분이 일치하지 않습니다.';
            }

            // 상품 결제금액 초기화
            $row['RealPayPrice'] = $row['RealSalePrice'];

            if ($make_type == 'order') {
                // 주문정보 입력에서 필요한 데이터 생성
                // 상품구분명 / 상품구분명 색상 class 번호 (단강좌 : on_lecture / 1, 패키지: on_package / 2, 교재 : book / 3)
                $row['CartProdTypeName'] = $this->_cart_prod_type_name[$row['CartProdType']];
                $row['CartProdTypeNum'] = $this->_cart_prod_type_idx[$row['CartProdType']];

                // 강좌시작일 설정
                $row['DefaultStudyStartDate'] = $row['DefaultStudyEndDate'] = $row['IsStudyStartDate'] = '';
                if ($row['IsLecStart'] == 'Y') {
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
                $row['CouponDiscPrice'] = $this->getCouponDiscPrice(element($row['CartIdx'], $arr_coupon_detail_idx), $row);
                $row['RealPayPrice'] -= $row['CouponDiscPrice'];
                $total_coupon_disc_price += $row['CouponDiscPrice'];
            }

            // 적립 포인트
            if (($make_type == 'pay' && $use_point > 0) || $row['IsPoint'] != 'Y') {
                $row['RealSavePoint'] = 0;
            } else {
                $row['RealSavePoint'] = $row['PointSaveType'] == 'R' ? $row['RealPayPrice'] * ($row['PointSavePrice'] / 100) : $row['PointSavePrice'];
            }

            // 강좌상품일 경우 사은품/무료교재 배송료 부과여부
            if ($row['CartProdType'] == 'on_lecture') {
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];
            }

            // 배송정보 입력 여부
            if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                $is_delivery_info = true;
            }

            // 패키지상품 포함 여부
            if ($is_on_package === false && $row['CartProdType'] === 'on_package') {
                $is_on_package = true;
            }

            // 전체상품 주문금액, 결제금액
            $total_order_price += $row['RealSalePrice'];
            $total_prod_pay_price += $row['RealPayPrice'];
            $total_save_point += $row['RealSavePoint'];

            $results['list'][] = $row;
        }

        // 사용포인트 체크
        if ($make_type == 'pay' && $use_point > 0) {
            $check_use_point = $this->checkUsePoint($cart_type, $use_point, $total_prod_pay_price, $is_on_package);
            if ($check_use_point !== true) {
                return $check_use_point;
            }

            $results['use_point'] = $use_point;     // 사용포인트
        }
        
        // 배송료 계산
        if ($cart_type == 'on_lecture') {
            $results['delivery_price'] = $this->getLectureDeliveryPrice($arr_is_freebies_trans);
        } else {
            $results['delivery_price'] = $this->getBookDeliveryPrice($total_order_price);
        }

        $results['total_prod_cnt'] = count($results['list']);   // 전체상품 갯수
        $results['total_order_price'] = $total_order_price;     // 전체 주문금액
        $results['total_pay_price'] = $total_prod_pay_price + $results['delivery_price'] - $use_point;    // 전체상품 결제금액 + 배송료 - 사용포인트
        $results['total_save_point'] = $total_save_point;     // 전체 적립예정포인트
        $results['is_delivery_info'] = $is_delivery_info;   // 배송정보 입력 여부
        $results['is_on_package'] = $is_on_package;   // 패키지상품 포함 여부
        $results['repr_prod_name'] = $results['list'][0]['ProdName'] . ($results['total_prod_cnt'] > 1 ? ' 외 ' . ($results['total_prod_cnt'] - 1) . '건' : '');   // 대표 주문상품명

        return $results;
    }

    /**
     * 주문상품 쿠폰적용 할인금액 리턴
     * @param $coupon_detail_idx
     * @param array $cart_row
     * @return int
     */
    public function getCouponDiscPrice($coupon_detail_idx, $cart_row = [])
    {
        // 사용자 쿠폰 모델 로드
        $this->load->loadModels(['couponF']);

        if (empty($coupon_detail_idx) === true || empty($cart_row) === true || $cart_row['IsCoupon'] != 'Y') {
            return 0;
        }

        $arr_param = [
            'SiteCode' => $cart_row['SiteCode'],
            'CateCode' => $cart_row['CateCode'],
            'ApplyTypeCcd' => $this->_coupon_apply_type_ccd[$cart_row['ProdTypeCcd']],
            'LecTypeCcd' => $this->_coupon_lec_type_ccd[$cart_row['LearnPatternCcd']],
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
            return 0;
        }

        return $coupon_row['DiscType'] === 'R' ? (int) ($cart_row['RealSalePrice'] * ($coupon_row['DiscRate'] / 100)) : $coupon_row['DiscRate'];
    }

    /**
     * 사용포인트 체크
     * @param string $point_type [포인트 구분, 강좌 : on_lecture, 교재 : book]
     * @param int $use_point [사용 포인트]
     * @param int $total_prod_pay_price [전체상품 결제금액, 배송료 제외]
     * @param bool $is_on_package [패키지상품 포함 여부]
     * @return bool|string
     */
    public function checkUsePoint($point_type, $use_point = 0, $total_prod_pay_price = 0, $is_on_package = false)
    {
        // 회원 보유포인트     // TODO : 회원포인트 조회 로직 추가 필요
        $arr_has_point = ['on_lecture' => 3000, 'book' => 3000];

        $has_point = element($point_type, $arr_has_point, 0); // 보유포인트
        $use_min_point = config_item('use_min_point');  // 최소 사용 포인트
        $use_point_unit = config_item('use_point_unit');    // 포인트 사용 단위
        $use_max_point_rate = config_item('use_max_point_rate');    // 결제금액 대비 포인트 사용 가능 최대 비율
        $use_max_point = (int) ($total_prod_pay_price * ($use_max_point_rate / 100));

        if ($use_point < 1 || $total_prod_pay_price < 1) {
            return true;
        }

        if ($has_point < $use_point) {
            return '보유 포인트가 부족합니다.';
        }

        if ($is_on_package === true) {
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
                'CartType' => element('cart_type', $input),
                'CartIdxs' => implode(',', element('cart_idx', $input)),
                'SiteCode' => element('site_code', $params),
                'CateCode' => element('cate_code', $params),
                'PgCcd' => element('pg_ccd', $params),
                'PayMethodCcd' => element('pay_method_ccd', $input),
                'ReprProdName' => element('repr_prod_name', $params),
                'ReqPayPrice' => element('req_pay_price', $params),
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
}
