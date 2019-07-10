<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderModel extends BaseOrderModel
{
    public function __construct()
    {
        parent::__construct();

        // 사용 모델 로드
        $this->load->loadModels(['_lms/pay/salesProduct', '_lms/pay/orderList', '_lms/sys/site']);
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
            $is_refund = $this->_refundOrderProduct($input);
            if ($is_refund !== true) {
                throw new \Exception($is_refund);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 주문상품 환불 처리 실행
     * @param array $input
     * @return array|bool
     */
    public function _refundOrderProduct($input = [])
    {
        try {
            // 쿠폰 발급, 포인트 모델 로드
            $this->load->loadModels(['_lms/service/couponIssue', '_lms/service/point']);

            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $order_idx = element('order_idx', $input);
            $order_prod_param = json_decode(base64_decode(element('params', $input)), true);
            $is_pg_refund = element('is_pg_refund', $input, 'N');   // 연동환불 여부
            $refund_bank_ccd = str_first_pos_before(element('refund_bank_ccd', $input, ''), ':');   // 은행코드
            $pg_bank_ccd = str_first_pos_after(element('refund_bank_ccd', $input, ''), ':');    // PG사 은행코드
            $refund_account_no = element('refund_account_no', $input, '');
            $refund_deposit_name = element('refund_deposit_name', $input, '');
            $refund_admin_idx = element('refund_admin_idx', $input, $sess_admin_idx);   // 환불요청 관리자식별자
            
            // 요청 환불금액 합계
            $sum_req_refund_price = array_sum(array_pluck($order_prod_param, 'card_refund_price')) + array_sum(array_pluck($order_prod_param, 'cash_refund_price'));
            $sum_card_refund_price = 0;

            // 주문조회
            $order_data = $this->orderListModel->findOrderByOrderIdx($order_idx);
            if (empty($order_data) === true) {
                throw new \Exception('주문 데이터가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 가상계좌 환불일 경우 환불계좌정보 체크
            if ($is_pg_refund == 'Y' && $order_data['IsVBank'] == 'Y') {
                if (empty($refund_bank_ccd) === true || empty($pg_bank_ccd) === true || empty($refund_account_no) === true || empty($refund_deposit_name) === true) {
                    throw new \Exception('가상계좌 환불에 필요한 환불계좌 정보가 없습니다.', _HTTP_BAD_REQUEST);
                }
            }

            // 주문상품 조회
            $arr_condition = [
                'EQ' => ['O.OrderIdx' => $order_idx, 'OP.PayStatusCcd' => $this->_pay_status_ccd['paid']],
                'IN' => ['OP.OrderProdIdx' => array_keys($order_prod_param)]
            ];

            $order_prod_data = $this->orderListModel->findOrderProduct($arr_condition);
            if (empty($order_prod_data) === true) {
                throw new \Exception('주문상품 데이터가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 환불요청된 주문상품식별자의 개수와 조회된 주문상품 개수가 다를 경우 에러 리턴
            if (count($order_prod_data) != count(array_keys($order_prod_param))) {
                throw new \Exception('환불요청된 주문상품 중에서 이미 처리된 상품이 있습니다.', _HTTP_BAD_REQUEST);
            }

            // 환불구분
            $refund_type = 'B';
            if ($sum_req_refund_price > 0) {
                if ($is_pg_refund == 'Y') {
                    $refund_type = 'P';
                }
            } else {
                $refund_type = 'N';
            }

            // 환불신청 데이터 저장
            $data = [
                'OrderIdx' => $order_idx,
                'RefundType' => $refund_type,
                'RefundBankCcd' => $refund_bank_ccd,
                'RefundAccountNo' => $refund_account_no,
                'RefundDepositName' => $refund_deposit_name,
                'RefundReason' => element('refund_reason', $input),
                'RefundMemo' => element('refund_memo', $input),
                'IsApproval' => element('is_approval', $input, 'N'),
                'RefundReqAdminIdx' => $refund_admin_idx,
                'RefundReqIp' => $reg_ip
            ];

            if ($this->_conn->set($data)->insert($this->_table['order_refund_request']) === false) {
                throw new \Exception('환불요청 정보 등록에 실패했습니다.');
            }

            $refund_req_idx = $this->_conn->insert_id();    // 환불요청식별자

            foreach ($order_prod_data as $row) {
                $card_refund_price = array_get($order_prod_param, $row['OrderProdIdx'] . '.card_refund_price', 0);
                $cash_refund_price = array_get($order_prod_param, $row['OrderProdIdx'] . '.cash_refund_price', 0);
                $card_deduct_price = $row['CardPayPrice'] - $card_refund_price;     // 카드공제금액
                $cash_deduct_price = $row['CashPayPrice'] - $cash_refund_price;     // 현금공제금액
                $is_point_refund = array_get($order_prod_param, $row['OrderProdIdx'] . '.is_point_refund', 'N');
                $is_coupon_refund = array_get($order_prod_param, $row['OrderProdIdx'] . '.is_coupon_refund', 'N');
                $arr_sub_refund_price = array_get($order_prod_param, $row['OrderProdIdx'] . '.sub_refund_price', '');   // 사용자패키지 단강좌별 환불금액
                $reco_point_idx = null;
                $reco_coupon_idx = null;

                // 0원결제가 아닌 경우 환불금액 확인
                if ($row['RealPayPrice'] > 0 && $card_refund_price + $cash_refund_price < 1) {
                    throw new \Exception('환불요청 금액이 올바르지 않습니다.');
                }
                
                // 공제금액 확인
                if ($card_deduct_price < 0 || $cash_deduct_price < 0) {
                    throw new \Exception('환불요청 금액이 실결제금액보다 큽니다.');
                }

                // 자동지급 쿠폰 회수 (온라인, 학원강좌일 경우만 실행, 쿠폰 복구보다 먼저 실행되어야 함 => 나중에 실행되면 복구된 쿠폰도 다시 회수 처리됨)
                if ($row['ProdTypeCcd'] == $this->_prod_type_ccd['on_lecture'] || $row['ProdTypeCcd'] == $this->_prod_type_ccd['off_lecture']) {
                    $is_retire_auto_coupon = $this->couponIssueModel->modifyRetireCouponDetailByOrderProdIdx($row['MemIdx'], $row['OrderProdIdx'], $refund_admin_idx);
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
                    // 사용포인트 복구
                    if ($is_point_refund == 'Y' && $row['UsePoint'] > 0) {
                        // 사용포인트 구분
                        $use_point_type = $row['ProdTypeCcd'] == $this->_prod_type_ccd['book'] ? 'book' : 'lecture';

                        // 포인트 적립
                        $data = [
                            'site_code' => $row['SiteCode'], 'order_idx' => $order_idx, 'order_prod_idx' => $row['OrderProdIdx'],
                            'reason_ccd' => $this->pointModel->_point_save_reason_ccd['refund'], 'valid_days' => 3
                        ];

                        $is_add_point = $this->pointModel->addSavePoint($use_point_type, $row['UsePoint'], $row['MemIdx'], $data);
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
                    if ($row['SavePoint'] > 0 && empty($row['SavePointType']) === false) {
                        $data = [
                            'site_code' => $row['SiteCode'], 'order_idx' => $order_idx, 'order_prod_idx' => $row['OrderProdIdx'],
                            'reason_ccd' => $this->pointModel->_point_use_reason_ccd['refund']
                        ];

                        $is_retire_point = $this->pointModel->addUsePoint($row['SavePointType'], $row['SavePoint'], $row['MemIdx'], $data, true);
                        if ($is_retire_point !== true) {
                            throw new \Exception($is_retire_point);
                        }
                    }
                }

                // 독서실/사물함 좌석취소
                if ($row['ProdTypeCcd'] == $this->_prod_type_ccd['reading_room'] || $row['ProdTypeCcd'] == $this->_prod_type_ccd['locker']) {
                    $this->load->loadModels(['_lms/pass/readingRoom']);

                    $is_seat_cancel = $this->readingRoomModel->refundReadingRoom($row['ProdCode'], $order_idx);
                    if ($is_seat_cancel !== true) {
                        throw new \Exception($is_seat_cancel);
                    }
                }

                // 환불상품 데이터 저장
                $data = [
                    'RefundReqIdx' => $refund_req_idx,
                    'OrderIdx' => $order_idx,
                    'OrderProdIdx' => $row['OrderProdIdx'],
                    'RefundPrice' => $card_refund_price + $cash_refund_price,
                    'DeductPrice' => $card_deduct_price + $cash_deduct_price,
                    'CardRefundPrice' => $card_refund_price,
                    'CashRefundPrice' => $cash_refund_price,
                    'CardDeductPrice' => $card_deduct_price,
                    'CashDeductPrice' => $cash_deduct_price,
                    'IsPointRefund' => $is_point_refund,
                    'RecoPointIdx' => $reco_point_idx,
                    'IsCouponRefund' => $is_coupon_refund,
                    'RecoCouponIdx' => $reco_coupon_idx,
                    'RefundAdminIdx' => $refund_admin_idx,
                    'RefundIp' => $reg_ip
                ];

                if ($this->_conn->set($data)->insert($this->_table['order_product_refund']) === false) {
                    throw new \Exception('환불상품 정보 등록에 실패했습니다.');
                }

                // 주문상품 결제상태 변경 (환불완료)
                $data = ['PayStatusCcd' => $this->_pay_status_ccd['refund'], 'UpdAdminIdx' => $refund_admin_idx];

                $is_pay_status_update = $this->_conn->set($data)->set('UpdDatm', 'NOW()', false)
                    ->where('OrderProdIdx', $row['OrderProdIdx'])->where('OrderIdx', $order_idx)->where('PayStatusCcd', $this->_pay_status_ccd['paid'])
                    ->update($this->_table['order_product']);
                if ($is_pay_status_update === false) {
                    throw new \Exception('주문상품 결제상태 수정에 실패했습니다.');
                }

                // 사용자패키지 단강좌별 환불금액 업데이트
                if (empty($arr_sub_refund_price) === false) {
                    foreach ($arr_sub_refund_price as $order_prod_sub_idx => $sub_row) {
                        $is_sub_prod_update = $this->_conn->set('RefundPrice', $sub_row['card_refund_price'] + $sub_row['cash_refund_price'])
                            ->where('OrderProdIdx', $row['OrderProdIdx'])->where('OrderProdSubIdx', $order_prod_sub_idx)
                            ->update($this->_table['order_sub_product']);
                        if ($is_sub_prod_update === false) {
                            throw new \Exception('주문상품서브 환불금액 수정에 실패했습니다.');
                        }
                    }
                }

                // 요청 카드환불금액 합계
                $sum_card_refund_price += $card_refund_price;
            }

            // PG사 취소연동 (PG사 결제 and 카드환불금액이 0 이상)
            if ($refund_type == 'P' && $order_data['PayRouteCcd'] == $this->_pay_route_ccd['pg'] && $sum_card_refund_price > 0) {
                // pg 라이브러리 로드
                $this->load->driver('pg', ['driver' => get_var($order_data['PgDriver'], 'inisis')]);

                // 총실결제금액보다 합계 카드환불금액이 작을 경우 부분취소
                if ($order_data['tRealPayPrice'] > $sum_card_refund_price) {
                    // 총환불금액이 반영된 총실결제금액 (이전 총실결제금액, 현재 실행되는 환불금액은 반영되지 않음)
                    $total_remain_pay_price = $order_data['tRealPayPrice'] - $order_data['tRefundPrice'];

                    // 로컬서버일 경우 이전 총실결제금액, 카드환불금액 고정 ==> TODO : 서버 환경별 실행
                    if (ENVIRONMENT == 'local') {
                        $temp_total_refund_price = element('tempTRefundPrice', $this->_conn->getFindResult($this->_table['order_refund_request'],
                            'count(*) * 100 as tempTRefundPrice',
                            ['EQ' => ['OrderIdx' => $order_idx, 'RefundType' => 'P']]), 0);

                        $total_remain_pay_price = 1000 - $temp_total_refund_price + 100;
                        $sum_card_refund_price = 100;
                    }

                    // 부분취소
                    $cancel_results = $this->pg->repay([
                        'order_no' => $order_data['OrderNo'], 'mid' => $order_data['PgMid'], 'tid' => $order_data['PgTid'],
                        'total_remain_pay_price' => $total_remain_pay_price, 'cancel_price' => $sum_card_refund_price,
                        'refund_bank_code' => $pg_bank_ccd, 'refund_account_no' => $refund_account_no, 'refund_deposit_name' => $refund_deposit_name
                    ], $order_data['IsVBank']);

                    if ($cancel_results['result'] === false) {
                        throw new \Exception('PG사 부분취소에 실패했습니다. (' . $cancel_results['result_msg'] . ')');
                    }

                    // 부분취소 신규 거래번호 업데이트
                    if (empty($cancel_results['repay_tid']) === false) {
                        $is_repay_tid_update = $this->_conn->set('PgRepayTid', $cancel_results['repay_tid'])
                            ->where('RefundReqIdx', $refund_req_idx)->update($this->_table['order_refund_request']);
                    }
                } else {
                    // 결제취소
                    $cancel_results = $this->pg->cancel([
                        'order_no' => $order_data['OrderNo'], 'mid' => $order_data['PgMid'], 'tid' => $order_data['PgTid'],
                        'cancel_reason' => element('refund_reason', $input, ''),
                        'refund_bank_code' => $pg_bank_ccd, 'refund_account_no' => $refund_account_no, 'refund_deposit_name' => $refund_deposit_name
                    ], $order_data['IsVBank']);

                    if ($cancel_results['result'] === false) {
                        throw new \Exception('PG사 결제취소에 실패했습니다. (' . $cancel_results['result_msg'] . ')');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
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
            $is_proc = $this->_procAdminOrder($pay_route, $input);
            if ($is_proc !== true) {
                throw new \Exception($is_proc);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 관리자 주문 등록 실행
     * @param string $pay_route [결제루트구분]
     * @param array $input
     * @return bool|string
     */
    public function _procAdminOrder($pay_route, $input = [])
    {
        try {
            // 주문메모 모델 로드
            $this->load->loadModels(['_lms/pay/orderMemo']);
            
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $site_code = element('site_code', $input);  // 사이트 코드
            $arr_mem_idx = element('mem_idx', $input, []);
            $arr_prod_info = element('prod_code', $input, []);  // 상품코드:상품타입:학습형태공통코드
            $total_order_price = 0;   // 전체주문금액
            $total_order_prod_price = 0;    // 전체상품주문금액
            $total_disc_price = 0;  // 전체할인금액
            $total_real_pay_price = 0;  // 전체실결제금액
            $real_pay_price = element('real_pay_price', $input, 0);     // 관리자유료결제 실결제금액
            $delivery_price = element('delivery_price', $input, 0);     // 배송료
            $is_delivery_info = false;  // 배송정보 등록 여부
            $arr_prod_row = [];    // 상품조회 결과 배열

            // 상품코드 기준으로 주문상품 데이터 생성
            foreach ($arr_prod_info as $prod_info) {
                // 상품정보 변수 할당
                list($prod_code, $prod_type, $learn_pattern_ccd) = explode(':', $prod_info);

                // 상품정보 조회
                $learn_pattern = $this->getLearnPattern($prod_type, $learn_pattern_ccd);
                $column = 'ProdCode, SiteCode, ProdName';

                // 기간제패키지 제외한 패키지 상품일 경우 서브강좌 조회, 기간제패키지일 경우 패키지타입공통코드 조회
                if (strpos($learn_pattern, 'pack_') !== false) {
                    if ($learn_pattern == 'periodpack_lecture') {
                        $column .= ', PackTypeCcd';
                    } else {
                        $column .= ', fn_product_sublecture_codes(ProdCode) as ProdCodeSub';
                    }
                }

                $row = $this->salesProductModel->findSalesProductByProdCode($learn_pattern, $prod_code, $column, false);
                if (empty($row) === true) {
                    throw new \Exception('상품정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $row['OrderProdType'] = $learn_pattern;     // 주문상품타입
                $row['IsVisitPay'] = 'N';   // 방문결제 여부
                $row['IsDeliveryInfo'] = 'N';   // 배송여부 설정 (상품정보 데이터 무시)

                // 배송여부 체크 (교재일 경우만)
                if ($learn_pattern == 'book') {
                    $row['IsDeliveryInfo'] = 'Y';
                }

                if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                    $is_delivery_info = true;
                }

                // 기간제패키지일 경우 연결된 과목/교수 정보 조회
                if ($learn_pattern == 'periodpack_lecture') {
                    $row['SubjectProfData'] = $this->salesProductModel->findPeriodPackageSubjectProfIdx($prod_code);
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

                // 판매가격 정보 조회 및 확인
                $prod_price_data_query = $this->_conn->query('select ifnull(fn_product_saleprice_data(?), "N") as ProdPriceData', [$prod_code]);
                $row['ProdPriceData'] = $prod_price_data_query->row(0)->ProdPriceData;

                $arr_prod_price_data = json_decode($row['ProdPriceData'], true);
                if (empty($arr_prod_price_data) === true || isset($arr_prod_price_data[0]['SaleTypeCcd']) === false) {
                    throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
                $row['SaleTypeCcd'] = $arr_prod_price_data[0]['SaleTypeCcd'];   // 판매타입 공통코드
                $row['RealSalePrice'] = $arr_prod_price_data[0]['RealSalePrice'];   // 판매금액

                // 결제금액, 할인금액 설정
                if ($pay_route === 'zero') {
                    $row['RealPayPrice'] = 0;
                    $row['CardPayPrice'] = 0;
                    $row['DiscPrice'] = $row['RealSalePrice'];  // 할인금액 = 판매금액
                    $row['DiscRate'] = 100;
                    $row['DiscType'] = 'R';                    
                } else {
                    // 판매금액보다 실결제금액이 크다면
                    if ($row['RealSalePrice'] < $real_pay_price) {
                        throw new \Exception('결제금액은 판매금액을 초과하여 입력하실 수 없습니다.', _HTTP_BAD_REQUEST);
                    }

                    $row['RealPayPrice'] = $real_pay_price;
                    $row['CardPayPrice'] = $real_pay_price;
                    $row['DiscPrice'] = $row['RealSalePrice'] - $real_pay_price;  // 할인금액 = 판매금액 - 실결제금액
                    $row['DiscRate'] = $row['RealSalePrice'] - $real_pay_price;
                    $row['DiscType'] = 'P';
                }

                // 전체주문 관련 금액 합산
                $total_order_price += $row['RealSalePrice'];
                $total_order_prod_price += $row['RealSalePrice'];
                $total_disc_price += $row['DiscPrice'];
                $total_real_pay_price += $row['RealPayPrice'];
                $arr_prod_row[] = $row;
            }

            $total_order_price += $delivery_price;      // 전체주문금액 + 배송료
            $total_real_pay_price += $delivery_price;   // 전체실결제금액 + 배송료
            $repr_prod_name = $arr_prod_row[0]['ProdName'] . (count($arr_prod_row) > 1 ? ' 외 ' . (count($arr_prod_row) - 1) . '건' : '');    // 대표상품명

            // 결제루트, 결제방법 공통코드
            if ($pay_route == 'zero') {
                $pay_route_ccd = $this->_pay_route_ccd['zero'];     // 결제루트 : 0원결제
                $pay_method_ccd = $total_real_pay_price > 0 ? $this->_pay_method_ccd['willbes_bank'] : '';  // 결제방법 : 배송료가 있을 경우 윌비스 계좌이체
            } else {
                $pay_route_ccd = $this->_pay_route_ccd['admin_pay'];     // 결제루트 : 관리자유료결제
                $pay_method_ccd = $this->_pay_method_ccd['admin_pay'];  // 결제방법 : 관리자유료결제
            }

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
                    'BtobIdx' => element('btob_idx', $input),
                    'BtobCaIdx' => element('btob_ca_idx', $input),
                    'AdminReasonCcd' => element('admin_reason_ccd', $input),
                    'AdminEtcReason' => element('admin_etc_reason', $input),
                    'RegAdminIdx' => element('reg_admin_idx', $input, $sess_admin_idx),
                    'OrderIp' => $reg_ip
                ];

                if ($this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)->insert($this->_table['order']) === false) {
                    throw new \Exception('주문정보 등록에 실패했습니다.');
                }

                // 주문 식별자
                $order_idx = $this->_conn->insert_id();

                // 주문상품 등록
                foreach ($arr_prod_row as $prod_row) {
                    $is_order_product = $this->addOrderProduct($order_idx, $mem_idx, $this->_pay_status_ccd['paid'], false, $prod_row);
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 주문상품 등록
     * @param int $order_idx [주문식별자]
     * @param int $mem_idx [회원식별자]
     * @param string $pay_status_ccd [결제상태공통코드]
     * @param bool $is_auto_add [자동 강좌, 쿠폰 지급 여부]
     * @param array $input [상품정보 배열]
     * @return bool|string
     */
    public function addOrderProduct($order_idx, $mem_idx, $pay_status_ccd, $is_auto_add = true, $input = [])
    {
        try {
            $order_prod_type = element('OrderProdType', $input);   // 주문상품타입
            $site_code = element('SiteCode', $input);   // 사이트코드
            $prod_code = element('ProdCode', $input);   // 상품코드
            $arr_prod_code_sub = empty(element('ProdCodeSub', $input)) === false ? explode(',', element('ProdCodeSub', $input)) : [];   // 패키지의 서브상품코드 배열
            $arr_subject_prof_idx = element('SubjectProfData', $input, []);     // 주문상품 과목/교수 연결 데이터 (기간제패키지)
            $is_visit_pay = element('IsVisitPay', $input, 'N');     // 방문결제 여부
            $is_delivery_info = element('IsDeliveryInfo', $input, 'N');     // 주문상품배송정보 입력 여부
            $real_pay_price = element('RealPayPrice', $input, 0);   // 실결제금액

            // 주문상품 등록
            $data = [
                'OrderIdx' => $order_idx,
                'MemIdx' => $mem_idx,
                'ProdCode' => $prod_code,
                'SaleTypeCcd' => element('SaleTypeCcd', $input),
                'SalePatternCcd' => element('SalePatternCcd', $input),
                'PayStatusCcd' => $pay_status_ccd,
                'OrderPrice' => element('RealSalePrice', $input, 0),
                'RealPayPrice' => $real_pay_price,
                'CardPayPrice' => element('CardPayPrice', $input, 0),
                'CashPayPrice' => element('CashPayPrice', $input, 0),
                'DiscPrice' => element('DiscPrice', $input, 0),
                'DiscRate' => element('DiscRate', $input, 0),
                'DiscType' => element('DiscType', $input, 'R'),
                'DiscReason' => element('DiscReason', $input),
                'UsePoint' => 0,
                'SavePoint' => 0,
                'SavePointType' => '',
                'IsUseCoupon' => 'N',
                'UserCouponIdx' => 0,
                'TargetOrderIdx' => element('TargetOrderIdx', $input),
                'TargetProdCode' => element('TargetProdCode', $input),
                'TargetProdCodeSub' => element('TargetProdCodeSub', $input)
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

            // 주문상품 과목/교수 연결 등록 (기간제선택형패키지)
            if (empty($arr_subject_prof_idx) === false) {
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
            }

            // 나의 강의정보 등록(온라인 강좌, 학원 강좌일 경우만 실행)
            if (strpos($order_prod_type, '_lecture') !== false) {
                // 나의 강좌수정정보 데이터 등록
                $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $order_prod_type, $prod_code, $arr_prod_code_sub, $input);
                if ($is_add_my_lecture !== true) {
                    throw new \Exception($is_add_my_lecture);
                }

                // 실결제금액이 0원이면 자동지급 안함
                if ($is_auto_add === true && $real_pay_price > 0) {
                    // 자동지급 주문상품 데이터 등록
                    $is_add_auto_product = $this->addOrderProductForAutoProduct($order_idx, $prod_code, $mem_idx, $pay_status_ccd, $input);
                    if ($is_add_auto_product !== true) {
                        throw new \Exception($is_add_auto_product);
                    }

                    // 자동지급 쿠폰 데이터 등록 (결제상태가 결제완료일 경우)
                    if ($pay_status_ccd == $this->_pay_status_ccd['paid']) {
                        $is_add_auto_coupon = $this->addAutoMemberCoupon($order_prod_idx, $prod_code, $mem_idx);
                        if ($is_add_auto_coupon !== true) {
                            throw new \Exception($is_add_auto_coupon);
                        }
                    }
                }
            }

            // 주문상품배송정보 데이터 등록 (교재만, 방문결제가 아닐 경우)
            if ($order_prod_type == 'book' && $is_delivery_info == 'Y' && $is_visit_pay == 'N') {
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

            // 판매가격 정보 확인
            $prod_price_data = json_decode($row['ProdPriceData'], true);
            if (empty($prod_price_data) === true || isset($prod_price_data[0]['SaleTypeCcd']) === false) {
                throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
            }
            $prod_price_data = element('0', $prod_price_data);

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
                'SavePointType' => '',
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

    /**
     * 자동지급 강좌/사은품 주문상품 등록 (사은품 배송정보 등록안함)
     * @param int $order_idx [주문식별자]
     * @param int $prod_code [상품코드]
     * @param int $mem_idx [회원식별자]
     * @param string $pay_status_ccd [결제상태 공통코드]
     * @param array $input [상품정보 배열]
     * @return bool|string
     */
    public function addOrderProductForAutoProduct($order_idx, $prod_code, $mem_idx, $pay_status_ccd, $input = [])
    {
        try {
            // 자동지급 상품 조회
            $column = 'PP.ProdCodeSub, PP.ProdTypeCcd, PL.LearnPatternCcd';
            $from = '
                from ' . $this->_table['product_r_product'] . ' as PP
                    inner join ' . $this->_table['product'] . ' as P
                        on PP.ProdCodeSub = P.ProdCode and PP.ProdTypeCcd = P.ProdTypeCcd
                    left join ' . $this->_table['product_lecture'] . ' as PL
                        on PP.ProdCodeSub = PL.ProdCode
                where PP.ProdCode = ? and PP.ProdTypeCcd in (?, ?) and PP.IsStatus = "Y" and P.IsStatus = "Y"';
            $rows = $this->_conn->query('select ' . $column . $from, [$prod_code, $this->_prod_type_ccd['on_lecture'], $this->_prod_type_ccd['freebie']])->result_array();

            // 자동지급 상품이 없을 경우
            if (empty($rows) === true) {
                return true;
            }

            foreach ($rows as $row) {
                // 주문상품 등록
                $data = [
                    'OrderIdx' => $order_idx,
                    'MemIdx' => $mem_idx,
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
                if ($row['ProdTypeCcd'] === $this->_prod_type_ccd['on_lecture']) {
                    $learn_pattern = $this->getLearnPattern($row['ProdTypeCcd'], $row['LearnPatternCcd']);
                    $is_add_my_lecture = $this->addMyLecture($order_idx, $order_prod_idx, $learn_pattern, $row['ProdCodeSub'], [], [
                        'UserStudyStartDate' => element('UserStudyStartDate', $input, ''),
                        'UserStudyPeriod' => element('UserStudyPeriod', $input, 0)
                    ]);
                    if ($is_add_my_lecture !== true) {
                        throw new \Exception($is_add_my_lecture);
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
     * @param int $order_prod_idx [주문식별자]
     * @param int $prod_code [상품코드]
     * @param int $mem_idx [회원식별자]
     * @return bool|string
     */
    public function addAutoMemberCoupon($order_prod_idx, $prod_code, $mem_idx)
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

            // 쿠폰발급 모델 로드
            $this->load->loadModels(['_lms/service/couponIssue']);
            
            foreach ($rows as $row) {
                // 사용자 쿠폰 등록
                $data = [
                    'coupon_idx' => $row['AutoCouponIdx'], 'mem_idx' => [$mem_idx], 'issue_type' => 'order', 'issue_order_prod_idx' => $order_prod_idx
                ];

                $is_add_coupon = $this->couponIssueModel->addCouponDetail($data);
                if ($is_add_coupon !== true) {
                    throw new \Exception($is_add_coupon);
                }                
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 방문결제 주문 등록
     * @param array $input
     * @return array|bool
     */
    public function procVisitOrder($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 결제금액 체크
            $is_check = $this->checkVisitOrder($input);
            if ($is_check !== true) {
                throw new \Exception($is_check);
            }

            // 방문결제 등록
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $reg_ip = $this->input->ip_address();
            $mem_idx = element('mem_idx', $input);
            $site_code = element('site_code', $input);
            $arr_prod_info = element('prod_code', $input, []);  // 상품코드:상품타입:학습형태공통코드
            $arr_available_learn_pattern = ['off_lecture', 'book', 'reading_room', 'locker', 'deposit'];     // 주문가능 상품구분
            $total_order_price = 0;
            $total_real_pay_price = 0;
            $total_card_pay_price = 0;
            $total_cash_pay_price = 0;
            $total_disc_price = 0;
            $is_auto_add = true;    // 자동지급 상품, 쿠폰 부여 여부
            $arr_prod_row = [];    // 상품조회 결과 배열
            $arr_prod_code = [];    // 상품코드 배열

            if (empty($arr_prod_info) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 상품코드 기준으로 주문상품 데이터 생성
            foreach ($arr_prod_info as $idx => $prod_info) {
                // 상품정보 변수 할당
                list($prod_code, $prod_type, $learn_pattern_ccd) = explode(':', $prod_info);

                // 학습형태 조회 (학원 단과, 교재, 독서실, 사물함, 예치금 상품만 주문 가능)
                $learn_pattern = $this->getLearnPattern($prod_type, $learn_pattern_ccd);
                if ($learn_pattern === false || in_array($learn_pattern, $arr_available_learn_pattern) === false) {
                    throw new \Exception('주문하실 수 없는 상품입니다.' . PHP_EOL . '학원 단과, 교재, 독서실, 사물함, 예치금 상품만 등록 가능합니다.', _HTTP_BAD_REQUEST);
                }

                // 상품정보 조회
                $column = 'ProdCode, SiteCode, ProdName';
                $row = $this->salesProductModel->findSalesProductByProdCode($learn_pattern, $prod_code, $column);
                if (empty($row) === true) {
                    throw new \Exception('판매 중인 상품만 주문하실 수 있습니다.', _HTTP_NOT_FOUND);
                }

                $row['OrderProdType'] = $learn_pattern;     // 주문상품타입
                $row['IsVisitPay'] = 'Y';   // 방문결제 여부
                $row['IsDeliveryInfo'] = 'N';   // 배송여부 설정 (상품정보 데이터 무시)
                $row['SalePatternCcd'] = $this->_sale_pattern_ccd['normal'];
                $row['PayStatusCcd'] = $this->_pay_status_ccd['paid'];

                // 판매가격 정보 조회 및 확인
                $prod_price_data_query = $this->_conn->query('select ifnull(fn_product_saleprice_data(?), "N") as ProdPriceData', [$prod_code]);
                $row['ProdPriceData'] = $prod_price_data_query->row(0)->ProdPriceData;

                $arr_prod_price_data = json_decode($row['ProdPriceData'], true);
                if (empty($arr_prod_price_data) === true || isset($arr_prod_price_data[0]['SaleTypeCcd']) === false) {
                    throw new \Exception('판매가격 정보가 없습니다.', _HTTP_NOT_FOUND);
                }
                $row['SaleTypeCcd'] = $arr_prod_price_data[0]['SaleTypeCcd'];
                $row['RealSalePrice'] = $arr_prod_price_data[0]['SalePrice'];
                $row['RealPayPrice'] = array_get($input, 'real_pay_price.' . $idx, 0);
                $row['CardPayPrice'] = array_get($input, 'card_pay_price.' . $idx, 0);
                $row['CashPayPrice'] = array_get($input, 'cash_pay_price.' . $idx, 0);
                $row['DiscPrice'] = $row['RealSalePrice'] - $row['RealPayPrice'];
                $row['DiscRate'] = array_get($input, 'disc_rate.' . $idx, 0);
                $row['DiscType'] = array_get($input, 'disc_type.' . $idx, 'R');
                $row['DiscReason'] = get_var(array_get($input, 'disc_reason.' . $idx), null);

                // 독서실, 사물함 연장 타겟주문정보 설정
                $row['TargetOrderIdx'] = get_var(array_get($input, 'target_order_idx.' . $idx), null);
                if (empty($row['TargetOrderIdx']) === false) {
                    $row['TargetProdCode'] = $row['ProdCode'];
                    $row['TargetProdCodeSub'] = $row['ProdCode'];
                }

                // 전체주문 관련 금액 합산
                $total_order_price += $row['RealSalePrice'];
                $total_real_pay_price += $row['RealPayPrice'];
                $total_card_pay_price += $row['CardPayPrice'];
                $total_cash_pay_price += $row['CashPayPrice'];
                $total_disc_price += $row['DiscPrice'];
                $arr_prod_row[] = $row;
                $arr_prod_code[] = $prod_code;
            }

            // 주문 데이터 등록 (방문결제는 배송료, 쿠폰 사용, 포인트 사용/적립, 주문배송주소 등록 없음)
            $repr_prod_name = $arr_prod_row[0]['ProdName'] . (count($arr_prod_row) > 1 ? ' 외 ' . (count($arr_prod_row) - 1) . '건' : '');    // 대표상품명
            
            // 실결제금액이 0원이면 자동지급 안함 (0원결제(방문))
            if ($total_real_pay_price < 1) {
                $is_auto_add = false;
            }

            $data = [
                'OrderNo' => $this->makeOrderNo(),
                'MemIdx' => $mem_idx,
                'SiteCode' => $site_code,
                'ReprProdName' => $repr_prod_name,
                'PayChannelCcd' => $this->_pay_channel_ccd['pc'],
                'PayRouteCcd' => $this->_pay_route_ccd['visit'],
                'PayMethodCcd' => element('pay_method_ccd', $input),
                'PgCcd' => '',
                'PgMid' => '',
                'PgTid' => '',
                'OrderPrice' => $total_order_price,
                'OrderProdPrice' => $total_order_price,
                'RealPayPrice' => $total_real_pay_price,
                'CardPayPrice' => $total_card_pay_price,
                'CashPayPrice' => $total_cash_pay_price,
                'DeliveryPrice' => 0,
                'DeliveryAddPrice' => 0,
                'DiscPrice' => $total_disc_price,
                'UseLecPoint' => 0,
                'UseBookPoint' => 0,
                'SaveLecPoint' => 0,
                'SaveBookPoint' => 0,
                'IsEscrow' => 'N',
                'IsCashReceipt' => 'N',
                'IsDelivery' => 'N',
                'IsVisitPay' => 'Y',
                'VisitPayCardCcd' => element('card_ccd', $input),
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
                $is_order_product = $this->addOrderProduct($order_idx, $mem_idx, $this->_pay_status_ccd['paid'], $is_auto_add, $prod_row);
                if ($is_order_product !== true) {
                    throw new \Exception($is_order_product);
                }
            }

            // 독서실 좌석배정 등록
            if (empty(element('rdr_prod_code', $input)) === false) {
                $this->load->loadModels(['_lms/pass/readingRoom']);

                $data = [
                    'prod_code' => element('rdr_prod_code', $input),
                    'rdr_master_order_idx' => element('rdr_master_order_idx', $input),
                    'rdr_is_extension' => element('rdr_is_extension', $input),
                    'serial_num' => element('rdr_serial_num', $input),
                    'seat_status' => element('rdr_seat_status', $input),
                    'rdr_use_start_date' => element('rdr_use_start_date', $input),
                    'rdr_use_end_date' => element('rdr_use_end_date', $input),
                    'rdr_memo' => element('rdr_memo', $input)
                ];

                if ($this->readingRoomModel->addSeat($data, $order_idx) !== true) {
                    throw new \Exception('좌석 배정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();

            // 주문상품 자동문자 발송 (리턴결과 처리안함)
            $this->sendOrderProductAutoSms($arr_prod_code, $mem_idx);
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 방문결제 결제완료 처리 (주문 데이터 수정)
     * @param array $input
     * @return array|bool
     */
    public function procVisitOrderComplete($input = [])
    {
        $this->_conn->trans_begin();

        try {
            // 결제금액 체크
            $is_check = $this->checkVisitOrder($input);
            if ($is_check !== true) {
                throw new \Exception($is_check);
            }

            // 방문결제 수정
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $mem_idx = element('mem_idx', $input);
            $order_idx = element('order_idx', $input);
            $arr_order_prod_idx = element('order_prod_idx', $input);
            $total_real_pay_price = 0;
            $total_card_pay_price = 0;
            $total_cash_pay_price = 0;
            $total_disc_price = 0;
            $arr_prod_code = [];    // 상품코드 배열

            if (empty($order_idx) === true || empty($arr_order_prod_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 주문상품 조회
            $arr_condition = [
                'EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $mem_idx, 'OP.PayStatusCcd' => $this->_pay_status_ccd['receipt_wait']],
                'IN' => ['OP.OrderProdIdx' => $arr_order_prod_idx]
            ];

            $order_prod_data = $this->orderListModel->findOrderProduct($arr_condition);
            if (empty($order_prod_data) === true) {
                throw new \Exception('주문상품 데이터가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 결제완료 처리할 주문상품식별자의 개수와 조회된 주문상품 개수가 다를 경우 에러 리턴
            if (count($order_prod_data) != count($arr_order_prod_idx)) {
                throw new \Exception('요청된 주문상품 중에서 이미 처리된 상품이 있습니다.', _HTTP_BAD_REQUEST);
            }

            // 주문상품 수정
            foreach ($arr_order_prod_idx as $idx => $order_prod_idx) {
                foreach ($order_prod_data as $row) {
                    if ($row['OrderProdIdx'] == $order_prod_idx) {
                        // 할인금액
                        $real_pay_price = array_get($input, 'real_pay_price.' . $idx, 0);
                        $card_pay_price = array_get($input, 'card_pay_price.' . $idx, 0);
                        $cash_pay_price = array_get($input, 'cash_pay_price.' . $idx, 0);
                        $disc_price = $row['OrderPrice'] - $real_pay_price;

                        $data = [
                            'RealPayPrice' => $real_pay_price,
                            'CardPayPrice' => $card_pay_price,
                            'CashPayPrice' => $cash_pay_price,
                            'DiscPrice' => $disc_price,
                            'DiscRate' => array_get($input, 'disc_rate.' . $idx, 0),
                            'DiscType' => array_get($input, 'disc_type.' . $idx, 'R'),
                            'DiscReason' => get_var(array_get($input, 'disc_reason.' . $idx), null)
                        ];

                        $is_update = $this->_conn->set($data)
                            ->where('OrderIdx', $order_idx)->where('OrderProdIdx', $order_prod_idx)->where('MemIdx', $mem_idx)
                            ->where('PayStatusCcd', $this->_pay_status_ccd['receipt_wait'])
                            ->update($this->_table['order_product']);
                        if ($is_update === false || $this->_conn->affected_rows() < 1) {
                            throw new \Exception('주문상품 정보 수정에 실패했습니다.');
                        }

                        // 자동지급 쿠폰 데이터 등록 (학원 강좌일 경우만 실행, 0원결제(방문)일 경우 지급 안함)
                        if ($real_pay_price > 0 && $row['ProdTypeCcd'] === $this->_prod_type_ccd['off_lecture']) {
                            $is_add_auto_coupon = $this->addAutoMemberCoupon($order_prod_idx, $row['ProdCode'], $mem_idx);
                            if ($is_add_auto_coupon !== true) {
                                throw new \Exception($is_add_auto_coupon);
                            }
                        }

                        // 전체주문 관련 금액 합산
                        $total_real_pay_price += $real_pay_price;
                        $total_card_pay_price += $card_pay_price;
                        $total_cash_pay_price += $cash_pay_price;
                        $total_disc_price += $disc_price;
                        $arr_prod_code[] = $row['ProdCode'];

                        break;
                    }
                }
            }

            // 주문상품 결제완료 업데이트 (자동지급 강좌, 사은품 포함)
            $is_update = $this->_conn->set('PayStatusCcd', $this->_pay_status_ccd['paid'])->set('UpdDatm', 'NOW()', false)
                ->set('UpdAdminIdx', $sess_admin_idx)
                ->where('OrderIdx', $order_idx)->where('MemIdx', $mem_idx)
                ->where('PayStatusCcd', $this->_pay_status_ccd['receipt_wait'])
                ->update($this->_table['order_product']);
            if ($is_update === false || $this->_conn->affected_rows() < 1) {
                throw new \Exception('주문상품 결제완료 업데이트에 실패했습니다.');
            }

            // 주문 수정
            $data = [
                'PayMethodCcd' => element('pay_method_ccd', $input),
                'RealPayPrice' => $total_real_pay_price,
                'CardPayPrice' => $total_card_pay_price,
                'CashPayPrice' => $total_cash_pay_price,
                'DiscPrice' => $total_disc_price,
                'VisitPayCardCcd' => element('card_ccd', $input)
            ];

            $is_update = $this->_conn->set($data)->set('CompleteDatm', 'NOW()', false)
                ->where('OrderIdx', $order_idx)->where('MemIdx', $mem_idx)
                ->where('PayRouteCcd', $this->_pay_route_ccd['visit'])->where('CompleteDatm is ', 'null', false)
                ->update($this->_table['order']);
            if ($is_update === false || $this->_conn->affected_rows() < 1) {
                throw new \Exception('주문 정보 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();

            // 주문상품 자동문자 발송 (리턴결과 처리안함)
            $this->sendOrderProductAutoSms($arr_prod_code, $mem_idx);
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 방문결제 결제금액, 좌석배정 정보 체크
     * @param array $input
     * @return bool|string
     */
    public function checkVisitOrder($input = [])
    {
        $arr_prod_info = element('prod_code', $input, []);  // 상품코드:상품타입:학습형태공통코드
        $arr_order_price = element('order_price', $input);
        $arr_real_pay_price = element('real_pay_price', $input);
        $arr_card_pay_price = element('card_pay_price', $input);
        $arr_cash_pay_price = element('cash_pay_price', $input);
        $arr_disc_rate = element('disc_rate', $input);
        $arr_disc_type = element('disc_type', $input);
        $total_real_pay_price = element('total_real_pay_price', $input);
        $total_card_pay_price = element('total_card_pay_price', $input);
        $total_cash_pay_price = element('total_cash_pay_price', $input);
        $sum_real_pay_price = 0;
        $sum_card_pay_price = 0;
        $sum_cash_pay_price = 0;

        // 카드 + 현금 = 결제금액 일치여부 확인
        foreach ($arr_real_pay_price as $idx => $real_pay_price) {
            if ($real_pay_price != ($arr_card_pay_price[$idx] + $arr_cash_pay_price[$idx])) {
                return ($idx + 1) . '번째 상품의 카드, 현금 결제금액이 올바르지 않습니다.';
            }

            $disc_price = $arr_disc_type[$idx] === 'R' ? (int) ($arr_order_price[$idx] * ($arr_disc_rate[$idx] / 100)) : $arr_disc_rate[$idx];
            if ($arr_order_price[$idx] != ($real_pay_price + $disc_price)) {
                return ($idx + 1) . '번째 상품의 실결제금액이 올바르지 않습니다.';
            }

            $sum_real_pay_price += $real_pay_price;
            $sum_card_pay_price += $arr_card_pay_price[$idx];
            $sum_cash_pay_price += $arr_cash_pay_price[$idx];
        }

        if ($total_real_pay_price != $sum_real_pay_price || $total_card_pay_price != $sum_card_pay_price || $total_cash_pay_price != $sum_cash_pay_price) {
            return '결제금액별 합계가 일치하지 않습니다.';
        }

        if (empty($arr_prod_info) === false) {
            foreach ($arr_prod_info as $idx => $prod_info) {
                // 상품정보 변수 할당
                list($prod_code, $prod_type, $learn_pattern_ccd) = explode(':', $prod_info);

                // 독서실, 사물함 상품일 경우 좌석배정 정보 확인
                if ($prod_type == 'reading_room' || $prod_type == 'locker') {
                    $arr_rdr_prod_code = element('rdr_prod_code', $input, []);

                    if (in_array($prod_code, $arr_rdr_prod_code) === false) {
                        return '좌석 배정 정보가 없습니다.';
                    }

                    foreach ($arr_rdr_prod_code as $rdr_idx => $rdr_prod_code) {
                        if (empty(array_get($input, 'rdr_serial_num.' . $rdr_idx)) === true || empty(array_get($input, 'rdr_use_start_date.' . $rdr_idx)) === true
                            || empty(array_get($input, 'rdr_use_end_date.' . $rdr_idx)) === true) {
                            return '좌석 배정 상세 정보가 없습니다.';
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * 환불요청 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyOrderRefundRequest($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $order_idx = element('order_idx', $input);
            $refund_req_idx = element('refund_req_idx', $input);

            // 환불요청정보 조회
            $row = $this->orderListModel->findOrderRefundRequest($order_idx, $refund_req_idx);
            if (empty($row) === true) {
                throw new \Exception('데이터가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 환불요청 데이터 저장
            $data = [
                'RefundReason' => element('refund_reason', $input),
                'RefundMemo' => element('refund_memo', $input),
                'RefundReqUpdAdminIdx' => $sess_admin_idx
            ];

            // 계좌환불일 경우만 계좌정보 수정 가능
            if ($row['RefundType'] == 'B') {
                $data = array_merge($data, [
                    'RefundBankCcd' => element('refund_bank_ccd', $input, ''),
                    'RefundAccountNo' => element('refund_account_no', $input, ''),
                    'RefundDepositName' => element('refund_deposit_name', $input, '')
                ]);
            }

            $is_update = $this->_conn->set($data)->set('RefundReqUpdDatm', 'NOW()', false)
                ->where('RefundReqIdx', $refund_req_idx)
                ->where('OrderIdx', $order_idx)
                ->update($this->_table['order_refund_request']);

            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 배송지 정보 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyOrderDeliveryAddress($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $order_idx = element('order_idx', $input);
            $receiver = element('receiver', $input);

            // 송장번호 등록여부 체크
            $inv_no_reg_cnt = element('InvoiceNoRegCnt'
                , $this->_conn->getJoinFindResult($this->_table['order_product_delivery_info'] . ' as OPD', 'inner', $this->_table['order_product'] . ' as OP'
                , 'OPD.OrderProdIdx = OP.OrderProdIdx'
                , 'sum(if(ifnull(OPD.InvoiceNo, "") = "", 0, 1)) as InvoiceNoRegCnt'
                , ['EQ' => ['OP.OrderIdx' => $order_idx]]), -1);
            if ($inv_no_reg_cnt < 0) {
                throw new \Exception('주문 배송정보가 없습니다.');
            } elseif ($inv_no_reg_cnt > 0) {
                throw new \Exception('송장번호가 이미 등록된 상태로 배송지 수정이 불가능합니다.');
            }

            // 배송지 데이터 수정
            $data = [
                'ZipCode' => element('zipcode', $input),
                'Addr1' => element('addr1', $input),
                'UpdUserType' => 'A',
                'UpdUserIdx' => $sess_admin_idx,
                'UpdIp' => $this->input->ip_address()
            ];

            $is_update = $this->_conn->set($data)
                ->set('Addr2Enc', 'fn_enc("' . element('addr2', $input, '') . '")', false)
                ->where('OrderIdx', $order_idx)
                ->where('Receiver', $receiver)
                ->update($this->_table['order_delivery_address']);

            if ($is_update === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 주문상품 자동문자 발송
     * @param array $arr_prod_code
     * @param int $mem_idx
     * @return bool|string
     */
    public function sendOrderProductAutoSms($arr_prod_code, $mem_idx)
    {
        try {
            if (empty($arr_prod_code) === true || empty($mem_idx) === true) {
                throw new \Exception('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
            }

            // 자동문자 조회
            $sms_row = $this->_conn->getJoinListResult($this->_table['product_sms'] . ' as PSM', 'inner', $this->_table['product'] . ' as P'
                , 'PSM.ProdCode = P.ProdCode and PSM.IsStatus = "Y" and P.IsSms = "Y" and P.IsStatus = "Y"'
                , 'PSM.SendTel as SendSmsTel, PSM.Memo as SendSmsMsg'
                , ['IN' => ['PSM.ProdCode' => $arr_prod_code]]
            );
            if (empty($sms_row) === true) {
                return true;
            }

            // 회원 휴대폰번호 조회
            $mem_row = $this->_conn->getFindResult($this->_table['member'], 'fn_dec(PhoneEnc) as MemPhone', ['EQ' => ['MemIdx' => $mem_idx]]);
            if (empty($mem_row) === true) {
                throw new \Exception('회원 정보가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 자동문자 발송
            $this->load->library('sendSms');
            foreach ($sms_row as $row) {
                if (empty($row['SendSmsTel']) === false && empty($row['SendSmsMsg']) === false) {
                    $this->sendsms->send($mem_row['MemPhone'], $row['SendSmsMsg'], $row['SendSmsTel']);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
