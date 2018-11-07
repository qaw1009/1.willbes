<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderModel extends BaseOrderModel
{
    public function __construct()
    {
        parent::__construct();

        // 사용 모델 로드
        $this->load->loadModels(['pay/orderList']);
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

                if ($card_refund_price + $cash_refund_price < 1) {
                    throw new \Exception('환불요청 금액이 올바르지 않습니다.');
                }

                // 쿠폰 복구
                if ($is_coupon_refund == 'Y' && $row['IsUseCoupon'] == 'Y') {
                    // 사용자 쿠폰 발급 모델 로드
                    $this->load->loadModels(['service/couponIssue']);

                    // 사용자 쿠폰 조회
                    $coupon_data = $this->couponIssueModel->findCouponDetailByCdIdx($row['UserCouponIdx'], 'CouponIdx');

                    // 사용자 쿠폰 등록
                    $data = [
                        'coupon_idx' => $coupon_data['CouponIdx'], 'mem_idx' => [$row['MemIdx']], 'issue_type' => 'refund'
                    ];

                    $is_add_coupon = $this->couponIssueModel->addCouponDetail($data);
                    if ($is_add_coupon !== true) {
                        throw new \Exception($is_add_coupon['ret_msg']);
                    }

                    // 발급된 사용자 쿠폰 식별자 조회
                    $reco_coupon_idx = array_get($this->couponIssueModel->listCouponDetail('CdIdx'
                        , ['EQ' => ['CouponIdx' => $coupon_data['CouponIdx'], 'MemIdx' => $row['MemIdx'], 'IssueTypeCcd' => $this->couponIssueModel->_issue_type_ccd['refund']]]
                        , 1, 0, ['CdIdx' => 'desc']
                    ), '0.CdIdx');
                }
                
                // 사용포인트 복구 or 적립포인트 회수
                if (($is_point_refund == 'Y' && $row['UsePoint'] > 0) || $row['SavePoint'] > 0) {
                    // 포인트 모델 로드
                    $this->load->loadModels(['service/point']);

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
}
