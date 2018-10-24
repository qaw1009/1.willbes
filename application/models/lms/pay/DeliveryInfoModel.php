<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class DeliveryInfoModel extends BaseOrderModel
{
    /**
     * 송장번호 등록/수정
     * @param bool $is_regist [등록/수정 여부]
     * @param string $idx_column [주문조회 컬럼명 (OrderIdx, OrderNo, OrderProdIdx)]
     * @param array $params [송장번호 배열, 주문식별자 or 주문번호 or 주문상품식별자 => 송장번호]
     * @return array|bool
     */
    public function modifyInvoiceNo($is_regist, $idx_column, $params = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $column_prefix = 'Invoice' . ($is_regist === true ? 'Reg' : 'Upd');

            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $order_idx => $invoice_no) {
                if (empty($order_idx) === false && empty($invoice_no) === false && is_numeric($order_idx) === true && is_numeric($invoice_no)) {
                    // 수정할 배송정보 셋팅
                    $data = [
                        'InvoiceNo' => trim($invoice_no),
                        $column_prefix . 'AdminIdx' => $sess_admin_idx
                    ];

                    // 등록일 경우 배송상태 추가 (발송준비)
                    if ($is_regist === true) {
                        $data['DeliveryStatusCcd'] = $this->_delivery_status_ccd['prepare'];
                    }

                    // 주문정보 조회
                    $order_prod_rows = $this->_conn->getJoinListResult($this->_table['order'] . ' as O', 'inner', $this->_table['order_product'] . ' as OP'
                        , 'O.OrderIdx = OP.OrderIdx', 'OP.OrderProdIdx', ['EQ' => ['OP.' . $idx_column => trim($order_idx)]]
                    );

                    if (empty($order_prod_rows) === false) {
                        $arr_order_prod_idx = array_pluck($order_prod_rows, 'OrderProdIdx');
                        $is_update = $this->_conn->set($data)->set($column_prefix . 'Datm', 'NOW()', false)->where_in('OrderProdIdx', $arr_order_prod_idx)
                            ->update($this->_table['order_product_delivery_info']);

                        if ($is_update === false) {
                            throw new \Exception('송장번호 등록에 실패했습니다.');
                        }
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
     * 주문상품별 배송상태 수정
     * @param string $delivery_status [변경할 배송상태 (발송완료 : complete, 발송전취소 : cancel)
     * @param array $params [주문상품식별자 배열, 순차번호 => 주문상품식별자]
     * @return array|bool
     */
    public function modifyDeliveryStatus($delivery_status, $params = [])
    {
        $this->_conn->trans_begin();

        try {
            $sess_admin_idx = $this->session->userdata('admin_idx');
            $delivery_status_ccd = $this->_delivery_status_ccd[$delivery_status];   // 배송상태공통코드

            if ($delivery_status == 'complete') {
                $column_prefix = 'DeliverySend';
                $check_pay_status_ccd = $this->_pay_status_ccd['paid'];
                $check_error_msg = '결제완료된 주문만 발송완료 승인이 가능합니다.';
            } else {
                $column_prefix = 'StatusUpdDatm';
                $check_pay_status_ccd = $this->_pay_status_ccd['refund'];
                $check_error_msg = '환불완료된 주문만 발송전 취소가 가능합니다.';
            }

            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $idx => $order_prod_idx) {
                // 주문상품 조회
                $order_prod_row = $this->_conn->getFindResult($this->_table['order_product'], 'OrderProdIdx, PayStatusCcd', [
                    'EQ' => ['OrderProdIdx' => $order_prod_idx]
                ]);

                if (empty($order_prod_row) === true) {
                    throw new \Exception('주문상품 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                // 결제상태 체크
                if ($check_pay_status_ccd != $order_prod_row['PayStatusCcd']) {
                    throw new \Exception($check_error_msg);
                }

                // 배송상태 수정
                $data = ['DeliveryStatusCcd' => $delivery_status_ccd, $column_prefix . 'AdminIdx' => $sess_admin_idx];
                $is_update = $this->_conn->set($data)->set($column_prefix . 'Datm', 'NOW()', false)->where('OrderProdIdx', $order_prod_idx)
                    ->update($this->_table['order_product_delivery_info']);

                if ($is_update === false) {
                    throw new \Exception('배송상태 수정에 실패했습니다.');
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
