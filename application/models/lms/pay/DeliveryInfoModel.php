<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class DeliveryInfoModel extends BaseOrderModel
{
    /**
     * 송장번호 등록/수정
     * @param bool $is_regist [등록/수정 여부]
     * @param string $idx_column [주문조회 컬럼명 (OrderIdx, OrderNo)]
     * @param array $params [송장번호 배열, 주문식별자(번호) => 송장번호]
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
                if (empty($order_idx) === false && empty($invoice_no) === false) {
                    // 수정할 배송정보 셋팅
                    $data = [
                        'InvoiceNo' => trim($invoice_no),
                        $column_prefix . 'AdminIdx' => $sess_admin_idx
                    ];

                    // 등록일 경우 배송상태 추가 (송장등록)
                    if ($is_regist === true) {
                        $data['DeliveryStatusCcd'] = $this->_delivery_status_ccd['invoice'];
                    }

                    // 주문정보 조회
                    $order_prod_rows = $this->_conn->getJoinListResult($this->_table['order'] . ' as O', 'inner', $this->_table['order_product'] . ' as OP'
                        , 'O.OrderIdx = OP.OrderIdx', 'OP.OrderProdIdx', ['EQ' => ['O.' . $idx_column => trim($order_idx)]]
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
}
