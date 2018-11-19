<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderModel extends BaseOrderModel
{
    public function __construct()
    {
        parent::__construct();

        // 사용 모델 로드
        $this->load->loadModels(['pay/salesProduct', 'pay/orderList']);
    }

    /**
     * 가상계좌결제 주문 계좌취소
     * @param int $order_idx
     * @return array|bool
     */
    public function cancelVbankOrder($order_idx)
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');

            // 주문정보 조회
            $order_row = $this->orderListModel->findOrderByOrderIdx($order_idx);
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

            // 주문 데이터 가상계좌 취소 업데이트
            $is_cancel = $this->_conn->set('VBankCancelDatm', 'NOW()', false)
                ->where('OrderIdx', $order_idx)->where('MemIdx', $order_row['MemIdx'])->update($this->_table['order']);
            if ($is_cancel === false) {
                throw new \Exception('계좌 취소 업데이트에 실패했습니다.');
            }

            // 주문상품 데이터 취소 업데이트
            $is_cancel = $this->_conn->set('PayStatusCcd', $this->_pay_status_ccd['vbank_wait_cancel'])->set('UpdDatm', 'NOW()', false)
                ->set('UpdAdminIdx', $sess_admin_idx)->where('OrderIdx', $order_idx)->where('MemIdx', $order_row['MemIdx'])->update($this->_table['order_product']);
            if ($is_cancel === false) {
                throw new \Exception('주문상품 결제상태 업데이트에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;        
    }

    /**
     * 주문상품 환불 처리
     * @param array $input
     * @return array|bool
     */
    public function refundOrderProduct($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 쿠폰 발급, 포인트 모델 로드
            $this->load->loadModels(['service/couponIssue', 'service/point']);

            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $order_idx = element('order_idx', $input);
            $order_prod_param = json_decode(base64_decode(element('params', $input)), true);

            // 주문상품 조회
            $arr_condition = [
                'EQ' => ['O.OrderIdx' => $order_idx, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']],
                'IN' => ['OP.OrderProdIdx' => array_keys($order_prod_param), 'O.SiteCode' => get_auth_site_codes()]
            ];

            $order_prod_data = $this->orderListModel->listAllOrder(false, $arr_condition);
            if (empty($order_prod_data) === true) {
                throw new \Exception('주문상품 데이터가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 환불요청된 주문상품식별자의 개수와 조회된 주문상품 개수가 다를 경우 에러 리턴
            if (count($order_prod_data) != count(array_keys($order_prod_param))) {
                throw new \Exception('환불요청된 주문상품 중에서 이미 처리된 상품이 있습니다.', _HTTP_NOT_FOUND);
            }

            // 환불신청 데이터 저장
            $data = [
                'OrderIdx' => $order_idx,
                'RefundBankCcd' => element('refund_bank_ccd', $input),
                'RefundAccountNo' => element('refund_account_no', $input),
                'RefundDepositName' => element('refund_deposit_name', $input),
                'RefundReason' => element('refund_reason', $input),
                'RefundMemo' => element('refund_memo', $input),
                'IsApproval' => element('is_approval', $input, 'N'),
                'IsBankRefund' => 'Y',   // TODO : PG 연동 후 수정 필요
                'RefundReqAdminIdx' => $sess_admin_idx,
                'RefundReqIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_refund_request']) === false) {
                throw new \Exception('환불요청 정보 등록에 실패했습니다.');
            }

            $refund_req_idx = $this->_conn->insert_id();    // 환불요청식별자

            foreach ($order_prod_data as $row) {
                $card_refund_price = array_get($order_prod_param, $row['OrderProdIdx'] . '.card_refund_price', 0);
                $cash_refund_price = array_get($order_prod_param, $row['OrderProdIdx'] . '.cash_refund_price', 0);
                $is_point_refund = array_get($order_prod_param, $row['OrderProdIdx'] . '.is_point_refund', 'N');
                $is_coupon_refund = array_get($order_prod_param, $row['OrderProdIdx'] . '.is_coupon_refund', 'N');
                $reco_point_idx = null;
                $reco_coupon_idx = null;

                // 0원결제가 아닌 경우 환불금액 확인
                if ($row['RealPayPrice'] > 0 && $card_refund_price + $cash_refund_price < 1) {
                    throw new \Exception('환불요청 금액이 올바르지 않습니다.');
                }

                // 자동지급 쿠폰 회수 (온라인, 학원강좌일 경우만 실행, 쿠폰 복구보다 먼저 실행되어야 함 => 나중에 실행되면 복구된 쿠폰도 다시 회수 처리됨)
                if ($row['ProdTypeCcd'] == $this->_prod_type_ccd['on_lecture'] || $row['ProdTypeCcd'] == $this->_prod_type_ccd['off_lecture']) {
                    $is_retire_auto_coupon = $this->couponIssueModel->modifyRetireCouponDetailByOrderProdIdx($row['MemIdx'], $row['OrderProdIdx']);
                    if ($is_retire_auto_coupon !== true) {
                        throw new \Exception($is_retire_auto_coupon);
                    }
                }

                // 쿠폰 복구
                if ($is_coupon_refund == 'Y' && $row['IsUseCoupon'] == 'Y') {
                    // 사용자 쿠폰 조회
                    $coupon_data = $this->couponIssueModel->findCouponDetailByCdIdx($row['UserCouponIdx'], 'CouponIdx');

                    // 사용자 쿠폰 등록
                    $data = [
                        'coupon_idx' => $coupon_data['CouponIdx'], 'mem_idx' => [$row['MemIdx']], 'issue_type' => 'refund', 'issue_order_prod_idx' => $row['OrderProdIdx']
                    ];

                    $is_add_coupon = $this->couponIssueModel->addCouponDetail($data);
                    if ($is_add_coupon !== true) {
                        throw new \Exception($is_add_coupon);
                    }

                    // 발급된 사용자 쿠폰 식별자 조회
                    $reco_coupon_idx = array_get($this->couponIssueModel->listCouponDetail('CdIdx'
                        , ['EQ' => ['CouponIdx' => $coupon_data['CouponIdx'], 'MemIdx' => $row['MemIdx'], 'IssueTypeCcd' => $this->couponIssueModel->_issue_type_ccd['refund']]]
                        , 1, 0, ['CdIdx' => 'desc']
                    ), '0.CdIdx');
                }

                // 사용포인트 복구 or 적립포인트 회수
                if (($is_point_refund == 'Y' && $row['UsePoint'] > 0) || $row['SavePoint'] > 0) {
                    // 포인트 구분
                    $point_type = $row['ProdTypeCcd'] == $this->_prod_type_ccd['book'] ? 'book' : 'lecture';

                    // 사용포인트 복구
                    if ($is_point_refund == 'Y' && $row['UsePoint'] > 0) {
                        // 포인트 적립
                        $data = [
                            'site_code' => $row['SiteCode'], 'order_idx' => $order_idx, 'order_prod_idx' => $row['OrderProdIdx'],
                            'reason_ccd' => $this->pointModel->_point_save_reason_ccd['refund'], 'valid_days' => 3
                        ];

                        $is_add_point = $this->pointModel->addSavePoint($point_type, $row['UsePoint'], $row['MemIdx'], $data);
                        if ($is_add_point !== true) {
                            throw new \Exception($is_add_point);
                        }

                        // 적립된 포인트 식별자 조회
                        $reco_point_idx = array_get($this->pointModel->listSavePoint('PointIdx'
                            , ['EQ' => ['MemIdx' => $row['MemIdx'], 'OrderIdx' => $order_idx, 'OrderProdIdx' => $row['OrderProdIdx'], 'ReasonCcd' => $this->pointModel->_point_save_reason_ccd['refund']]]
                            , 1, 0, ['PointIdx' => 'desc']
                        ), '0.PointIdx');
                    }
                    
                    // 적립포인트 회수
                    if ($row['SavePoint'] > 0) {
                        $data = [
                            'site_code' => $row['SiteCode'], 'order_idx' => $order_idx, 'order_prod_idx' => $row['OrderProdIdx'],
                            'reason_ccd' => $this->pointModel->_point_use_reason_ccd['refund']
                        ];

                        $is_retire_point = $this->pointModel->addUsePoint($point_type, $row['SavePoint'], $row['MemIdx'], $data, true);
                        if ($is_retire_point !== true) {
                            throw new \Exception($is_retire_point);
                        }
                    }
                }

                // 환불상품 데이터 저장
                $data = [
                    'RefundReqIdx' => $refund_req_idx,
                    'OrderIdx' => $order_idx,
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'RefundPrice' => $card_refund_price + $cash_refund_price,
                    'DeductPrice' => 0,
                    'CardRefundPrice' => $card_refund_price,
                    'CashRefundPrice' => $cash_refund_price,
                    'CardDeductPrice' => 0,
                    'CashDeductPrice' => 0,
                    'IsPointRefund' => $is_point_refund,
                    'RecoPointIdx' => $reco_point_idx,
                    'IsCouponRefund' => $is_coupon_refund,
                    'RecoCouponIdx' => $reco_coupon_idx,
                    'RefundAdminIdx' => $sess_admin_idx,
                    'RefundIp' => $reg_ip
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product_refund']) === false) {
                    throw new \Exception('환불상품 정보 등록에 실패했습니다.');
                }

                // 주문상품 결제상태 변경 (환불완료)
                $data = [
                    'PayStatusCcd' => $this->_pay_status_ccd['refund'], 'UpdAdminIdx' => $sess_admin_idx
                ];

                $is_pay_status_update = $this->_conn->set($data)->set('UpdDatm', 'NOW()', false)
                    ->where('OrderProdIdx', $row['OrderProdIdx'])->where('OrderIdx', $order_idx)->where('PayStatusCcd', $this->_pay_status_ccd['paid'])
                    ->update($this->_table['order_product']);
                if ($is_pay_status_update === false) {
                    throw new \Exception('주문상품 결제상태 수정에 실패했습니다.');
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
     * 관리자 주문 등록
     * @param string $pay_route [결제루트구분]
     * @param array $input
     * @return array|bool
     */
    public function procAdminOrder($pay_route, $input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 주문메모, 사이트 모델 로드
            $this->load->loadModels(['pay/orderMemo', 'sys/site']);
            
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $site_code = element('site_code', $input);  // 사이트 코드
            $arr_mem_idx = element('mem_idx', $input, []);
            $arr_prod_info = element('prod_code', $input, []);  // 상품코드:상품타입:학습형태공통코드
            $arr_available_learn_pattern = ['on_lecture', 'adminpack_lecture', 'off_lecture', 'book', 'mock_exam'];     // 주문가능 상품구분
            $total_order_price = 0;   // 전체주문금액
            $total_order_prod_price = 0;    // 전체상품주문금액
            $total_real_pay_price = 0;  // 전체실결제금액
            $total_disc_price = 0;  // 전체할인금액
            $delivery_price = element('delivery_price', $input, 0);     // 배송료
            $is_delivery_info = false;  // 배송정보 등록 여부
            $arr_prod_row = [];    // 상품조회 결과 배열

            // 상품코드 기준으로 주문상품 조회
            foreach ($arr_prod_info as $prod_info) {
                // 상품정보 변수 할당
                list($prod_code, $prod_type, $learn_pattern_ccd) = explode(':', $prod_info);

                // 학습형태 조회 (단강좌, 운영자 일반형 패키지, 교재 상품만 장바구니 등록 가능)
                $learn_pattern = $this->getLearnPattern($prod_type, $learn_pattern_ccd);
                if ($learn_pattern === false || in_array($learn_pattern, $arr_available_learn_pattern) === false) {
                    throw new \Exception('주문하실 수 없는 상품입니다.' . PHP_EOL . '온라인 단강좌, 운영자 일반형 패키지, 학원 단과, 교재, 모의고사 상품만 등록 가능합니다.', _HTTP_BAD_REQUEST);
                }

                // 상품정보 조회
                $column = 'ProdCode, SiteCode, ProdName, ProdPriceData';
                $learn_pattern == 'adminpack_lecture' && $column .= ', PackTypeCcd, fn_product_sublecture_codes(ProdCode) as ProdCodeSub';

                $row = $this->salesProductModel->findSalesProductByProdCode($learn_pattern, $prod_code, $column);
                if (empty($row) === true) {
                    throw new \Exception('판매 중인 상품만 주문하실 수 있습니다.', _HTTP_NOT_FOUND);
                }

                // 운영자 선택형 패키지는 주문 불가
                if ($learn_pattern == 'adminpack_lecture' && $row['PackTypeCcd'] != $this->_adminpack_lecture_type_ccd['normal']) {
                    throw new \Exception('운영자 선택형 패키지는 주문하실 수 없습니다.', _HTTP_BAD_REQUEST);
                }

                $row['OrderProdType'] = $learn_pattern;     // 주문상품타입
                $learn_pattern != 'adminpack_lecture' && $row['ProdCodeSub'] = '';  // 상품코드서브 설정 (운영자 일반형 패키지 이 외에는 데이터 없음 처리)
                $row['IsVisitPay'] = 'N';   // 방문결제 여부
                $row['IsDeliveryInfo'] = 'N';   // 배송여부 설정 (상품정보 데이터 무시)

                // 배송여부 체크 (교재일 경우만)
                if ($is_delivery_info === false && $learn_pattern == 'book') {
                    $is_delivery_info = true;
                    $row['IsDeliveryInfo'] = 'Y';
                }

                // 판매형태 공통코드, 회차 설정
                if (element('is_lec_unit', $input, 'N') == 'Y') {
                    $row['SalePatternCcd'] = $this->_sale_pattern_ccd['unit'];
                    $row['wUnitIdxs'] = implode(',', element('wUnitCode', $input));
                } else {
                    $row['SalePatternCcd'] = $this->_sale_pattern_ccd['normal'];
                    $row['wUnitIdxs'] = null;
                }

                // 수강정보 설정
                $row['UserStudyStartDate'] = element('lec_start_date', $input);
                $row['UserStudyPeriod'] = element('lec_expire_day', $input);

                // 판매가격정보 설정
                $arr_prod_price_data = json_decode($row['ProdPriceData'], true);
                if (empty($arr_prod_price_data) === true || isset($arr_prod_price_data[0]['RealSalePrice']) === false) {
                    throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
                $row['SaleTypeCcd'] = $arr_prod_price_data[0]['SaleTypeCcd'];
                $row['RealSalePrice'] = $arr_prod_price_data[0]['RealSalePrice'];
                $row['RealPayPrice'] = 0;
                $row['DiscPrice'] = $row['RealSalePrice'];  // 할인금액 = 판매금액
                $row['DiscRate'] = 100;
                $row['DiscType'] = 'R';

                // 전체주문 관련 금액 합산
                $total_order_price += $arr_prod_price_data[0]['RealSalePrice'];
                $total_order_prod_price += $arr_prod_price_data[0]['RealSalePrice'];
                $total_real_pay_price += $pay_route === 'zero' ? 0 : $arr_prod_price_data[0]['RealSalePrice'];
                $arr_prod_row[] = $row;
            }

            $total_order_price += $delivery_price;      // 전체주문금액 + 배송료
            $total_real_pay_price += $delivery_price;   // 전체실결제금액 + 배송료
            $total_disc_price = $total_order_prod_price;    // 전체할인금액 = 전체상품주문금액
            $repr_prod_name = $arr_prod_row[0]['ProdName'] . (count($arr_prod_row) > 1 ? ' 외 ' . (count($arr_prod_row) - 1) . '건' : '');    // 대표상품명
            $pay_route_ccd = element($pay_route, $this->_pay_route_ccd, $this->_pay_route_ccd['zero']);     // 결제루트 공통코드
            $pay_method_ccd = $delivery_price > 0 ? $this->_pay_method_ccd['willbes_bank'] : '';    // 결제방법 공통코드 (배송료가 있을 경우 윌비스 계좌이체)

            foreach ($arr_mem_idx as $mem_idx) {
                // 주문 데이터 등록
                $data = [
                    'OrderNo' => $this->makeOrderNo(),
                    'MemIdx' => $mem_idx,
                    'SiteCode' => $site_code,
                    'ReprProdName' => $repr_prod_name,
                    'PayChannelCcd' => $this->_pay_channel_ccd['pc'],
                    'PayRouteCcd' => $pay_route_ccd,
                    'PayMethodCcd' => $pay_method_ccd,
                    'PgCcd' => '',
                    'PgMid' => '',
                    'PgTid' => '',
                    'OrderPrice' => $total_order_price,
                    'OrderProdPrice' => $total_order_prod_price,
                    'RealPayPrice' => $total_real_pay_price,
                    'CardPayPrice' => $total_real_pay_price,
                    'CashPayPrice' => 0,
                    'DeliveryPrice' => $delivery_price,
                    'DeliveryAddPrice' => 0,
                    'DiscPrice' => $total_disc_price,
                    'UseLecPoint' => 0,
                    'UseBookPoint' => 0,
                    'SaveLecPoint' => 0,
                    'SaveBookPoint' => 0,
                    'IsEscrow' => 'N',
                    'IsCashReceipt' => 'N',
                    'IsDelivery' => ($is_delivery_info === true ? 'Y' : 'N'),
                    'IsVisitPay' => 'N',
                    'AdminRegReason' => element('admin_reg_reason', $input),
                    'RegAdminIdx' => $sess_admin_idx,
                    'OrderIp' => $reg_ip
                ];

                if ($this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)->insert($this->_table['order']) === false) {
                    throw new \Exception('주문정보 등록에 실패했습니다.');
                }

                // 주문 식별자
                $order_idx = $this->_conn->insert_id();

                // 주문상품 등록
                foreach ($arr_prod_row as $prod_row) {
                    $is_order_product = $this->addOrderProduct($order_idx, $mem_idx, $this->_pay_status_ccd['paid'], $prod_row);
                    if ($is_order_product !== true) {
                        throw new \Exception($is_order_product);
                    }
                }

                if ($delivery_price > 0) {
                    // 배송료 주문상품 등록
                    $is_delivery_order_product = $this->addOrderProductForDeliveryPrice($order_idx, $mem_idx, $this->_pay_status_ccd['paid'], $site_code, $delivery_price, 0);
                    if ($is_delivery_order_product !== true) {
                        throw new \Exception($is_delivery_order_product);
                    }

                    // 배송료 입금관련 주문메모 등록
                    $order_memo = element('order_memo', $input);
                    if (empty($order_memo) === false) {
                        $is_add_memo = $this->orderMemoModel->_addOrderMemo([
                            'order_idx' => $order_idx,
                            'memo_type_ccd' => $this->_order_memo_type_ccd['delivery_price'],
                            'order_memo' => $order_memo
                        ]);
                        if ($is_add_memo !== true) {
                            throw new \Exception($is_add_memo);
                        }
                    }
                }

                // 주문배송정보 등록
                if ($is_delivery_info === true) {
                    $is_order_delivery_address = $this->addOrderDeliveryAddress($order_idx, $input);
                    if ($is_order_delivery_address !== true) {
                        throw new \Exception($is_order_delivery_address);
                    }
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
     * 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @param string $pay_status_ccd [결제상태공통코드]
     * @param array $input [상품정보 배열]
     * @return bool|string
     */
    public function addOrderProduct($order_idx, $mem_idx, $pay_status_ccd, $input = [])
    {
        try {
            $order_prod_type = element('OrderProdType', $input);   // 주문상품타입
            $site_code = element('SiteCode', $input);   // 사이트코드
            $prod_code = element('ProdCode', $input);   // 상품코드
            $arr_prod_code_sub = empty(element('ProdCodeSub', $input)) === false ? explode(',', element('ProdCodeSub', $input)) : [];   // 패키지의 서브상품코드 배열
            $is_visit_pay = element('IsVisitPay', $input, 'N');     // 방문결제 여부
            $is_delivery_info = element('IsDeliveryInfo', $input, 'N');     // 주문상품배송정보 입력 여부

            // 주문상품 등록
            $data = [
                'OrderIdx' => $order_idx,
                'MemIdx' => $mem_idx,
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => element('SaleTypeCcd', $input),
                'SalePatternCcd' => element('SalePatternCcd', $input),
                'PayStatusCcd' => $pay_status_ccd,
                'OrderPrice' => element('RealSalePrice', $input, 0),
                'RealPayPrice' => element('RealPayPrice', $input, 0),
                'CardPayPrice' => element('CardPayPrice', $input, 0),
                'CashPayPrice' => element('CashPayPrice', $input, 0),
                'DiscPrice' => element('DiscPrice', $input, 0),
                'DiscRate' => element('DiscRate', $input, 0),
                'DiscType' => element('DiscType', $input, 'R'),
                'UsePoint' => 0,
                'SavePoint' => 0,
                'IsUseCoupon' => 'N',
                'UserCouponIdx' => 0
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
                        'RealPayPrice' => 0
                    ];

                    if ($this->_conn->set($data)->insert($this->_table['order_sub_product']) === false) {
                        throw new \Exception('주문상품서브 정보 등록에 실패했습니다.');
                    }
                }
            }

            // 나의 강의정보 등록 (온라인 강좌, 학원 강좌일 경우만 실행)
            if (strpos($order_prod_type, '_lecture') !== false) {
                // 나의 강좌수정정보 데이터 등록
                $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $order_prod_type, $prod_code, $arr_prod_code_sub, $input);
                if ($is_add_my_lecture !== true) {
                    throw new \Exception($is_add_my_lecture);
                }
            }

            // 주문상품배송정보 데이터 등록 (방문결제가 아닐 경우)
            if ($is_delivery_info == 'Y' && $is_visit_pay == 'N') {
                // 택배사 공통코드 조회
                $delivery_comp_ccd = element('DeliveryCompCcd', $this->siteModel->findSite('DeliveryCompCcd', ['EQ' => ['SiteCode' => $site_code]]));

                $data = [
                    'OrderProdIdx' => $order_prod_idx,
                    'DeliveryCompCcd' => $delivery_comp_ccd,
                    'IsEscrowSend' => 'N'
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product_delivery_info']) === false) {
                    throw new \Exception('주문상품 배송정보 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 배송료 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @param string $pay_status_ccd [결제상태 공통코드]
     * @param int $site_code [사이트코드]
     * @param null|int $card_pay_price [카드결제금액]
     * @param null|int $cash_pay_price [현금결제금액]
     * @return bool|string
     */
    public function addOrderProductForDeliveryPrice($order_idx, $mem_idx, $pay_status_ccd, $site_code, $card_pay_price = null, $cash_pay_price = null)
    {
        try {
            $learn_pattern = 'delivery_price';

            // 배송료 상품 조회
            $row = element('0', $this->salesProductModel->listSalesProduct($learn_pattern, 'ProdCode, ProdPriceData'
                , ['EQ' => ['SiteCode' => $site_code]], 1, 0, ['ProdCode' => 'desc']));
            if (empty($row) === true) {
                throw new \Exception('배송료 상품이 존재하지 않습니다.', _HTTP_NOT_FOUND);
            }

            // 판매가격 정보
            $prod_price_data = element('0', json_decode($row['ProdPriceData'], true));

            is_null($card_pay_price) === true && $card_pay_price = $prod_price_data['RealSalePrice'];
            is_null($cash_pay_price) === true && $cash_pay_price = 0;
            $delivery_price = $card_pay_price + $cash_pay_price;

            // 주문상품 등록
            $data = [
                'OrderIdx' => $order_idx,
                'MemIdx' => $mem_idx,
                'ProdCode' => $row['ProdCode'],
                'SaleTypeCcd' => $prod_price_data['SaleTypeCcd'],
                'SalePatternCcd' => $this->_sale_pattern_ccd['normal'],
                'PayStatusCcd' => $pay_status_ccd,
                'OrderPrice' => $delivery_price,
                'RealPayPrice' => $delivery_price,
                'CardPayPrice' => $card_pay_price,
                'CashPayPrice' => $cash_pay_price,
                'DiscPrice' => 0,
                'DiscRate' => 0,
                'DiscType' => 'R',
                'UsePoint' => 0,
                'SavePoint' => 0,
                'IsUseCoupon' => 'N',
                'UserCouponIdx' => 0
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_product']) === false) {
                throw new \Exception('배송료 주문상품 등록에 실패했습니다.');
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
     * @param string $learn_pattern [학습형태]
     * @param int $prod_code [상품코드]
     * @param array $arr_prod_code_sub [상품코드서브]
     * @param array $input [상품정보 배열]
     * @return bool|string
     */
    public function addMyLecture($order_idx, $order_prod_idx, $learn_pattern, $prod_code, $arr_prod_code_sub = [], $input = [])
    {
        try {
            $user_study_start_date = element('UserStudyStartDate', $input, '');     // 사용자 지정 수강시작일
            $user_study_period = element('UserStudyPeriod', $input, 0);     // 사용자 지정 수강일수

            if ($learn_pattern == 'on_lecture' || $learn_pattern == 'adminpack_lecture' || $learn_pattern == 'periodpack_lecture' || $learn_pattern == 'on_free_lecture' || $learn_pattern == 'off_lecture') {
                // 단강좌, 운영자패키지, 기간제패키지, 무료강좌, 학원 단과
                // 강좌 시작일, 종료일, 수강기간, 배수시간 조회
                $row = $this->salesProductModel->findProductLectureInfo($prod_code);
                if (empty($row) === true) {
                    throw new \Exception('수강정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                // 수강시작일, 수강종료일 조회
                $arr_lec_date = $this->getMyLectureLecStartEndDate($learn_pattern, $row['StudyStartDate'], $row['StudyEndDate'], $row['StudyPeriod'], $user_study_start_date, $user_study_period);

                // 나의 강좌수강정보 등록
                $data = [
                    'OrderIdx' => $order_idx,
                    'OrderProdIdx' => $order_prod_idx,
                    'ProdCode' => $prod_code,
                    'wUnitIdxs' => ($learn_pattern == 'on_lecture' ? element('wUnitIdxs', $input) : null),  // 온라인 단강좌일 경우만 회차등록 가능
                    'LecStartDate' => $arr_lec_date['lec_start_date'],
                    'LecEndDate' => $arr_lec_date['lec_end_date'],
                    'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                    'LecExpireTime' => $row['MultipleAllLecSec'],
                    'RealLecExpireTime' => $row['MultipleAllLecSec'],
                    'LecExpireDay' => $arr_lec_date['lec_expire_day'],
                    'RealLecExpireDay' => $arr_lec_date['lec_expire_day']
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
                $rows = $this->salesProductModel->findProductLectureInfo($arr_prod_code_sub);

                foreach ($rows as $idx => $row) {
                    // 수강시작일, 수강종료일 조회
                    $arr_lec_date = $this->getMyLectureLecStartEndDate($this->_learn_pattern_ccd[$row['LearnPatternCcd']], $row['StudyStartDate'], $row['StudyEndDate'], $row['StudyPeriod'], $user_study_start_date, $user_study_period);

                    // 나의 강좌수강정보 등록
                    $data = [
                        'OrderIdx' => $order_idx,
                        'OrderProdIdx' => $order_prod_idx,
                        'ProdCode' => $prod_code,
                        'LecStartDate' => $arr_lec_date['lec_start_date'],
                        'LecEndDate' => $arr_lec_date['lec_end_date'],
                        'RealLecEndDate' => $arr_lec_date['lec_end_date'],
                        'LecExpireTime' => $row['MultipleAllLecSec'],
                        'RealLecExpireTime' => $row['MultipleAllLecSec'],
                        'LecExpireDay' => $arr_lec_date['lec_expire_day'],
                        'RealLecExpireDay' => $arr_lec_date['lec_expire_day']
                    ];

                    if ($this->_conn->set($data)->set('ProdCodeSub', $row['ProdCode'])->insert($this->_table['my_lecture']) === false) {
                        throw new \Exception('나의 강좌수강정보 등록에 실패했습니다.');
                    }
                }
            } else {
                throw new \Exception('학습형태 정보가 일치하지 않습니다.', _HTTP_BAD_REQUEST);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 학습형태별 수강시작일, 수강종료일, 수강일수 리턴
     * @param string $learn_pattern [학습형태]
     * @param string $study_start_date [개강일]
     * @param string $study_end_date [종강일]
     * @param int $study_period [수강일수]
     * @param string $user_study_start_date [사용자설정 수강시작일]
     * @param int $user_study_period [사용자설정 수강일수]
     * @return array
     */
    public function getMyLectureLecStartEndDate($learn_pattern, $study_start_date, $study_end_date, $study_period, $user_study_start_date = '', $user_study_period = 0)
    {
        is_numeric($user_study_period) === true && $user_study_period > 0 && $study_period = $user_study_period;    // 사용자설정 수강일수 우선
        $today_date = date('Y-m-d');    // 결제일
        $lec_start_date = '';
        $lec_end_date = '';

        switch ($learn_pattern) {
            case 'on_lecture' :
            case 'on_free_lecture' :
            case 'adminpack_lecture' :
            case 'periodpack_lecture' :
                // 단강좌, 무료강좌, 운영자패키지, 기간제패키지
                if (empty($study_start_date) === false && empty($user_study_start_date) === false && $study_start_date <= $user_study_start_date) {
                    $lec_start_date = $user_study_start_date;    // 사용자 설정 수강시작일이 개강일보다 이후일 경우만 수강시작일로 설정
                } else {
                    $lec_start_date = empty($study_start_date) === false && $today_date <= $study_start_date ? $study_start_date : $today_date;     // 결제일이 개강일보다 이전일 경우 수강시작일은 개강일로 설정
                }
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

        return ['lec_start_date' => $lec_start_date, 'lec_end_date' => $lec_end_date, 'lec_expire_day' => $study_period];
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
