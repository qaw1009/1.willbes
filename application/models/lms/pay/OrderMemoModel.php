<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderMemoModel extends BaseOrderModel
{
    /**
     * 주문 메모 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listOrderMemo($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true && $is_count === false) {
            $column = 'OM.OrderMemoIdx, OM.OrderIdx, OM.OrderMemo, OM.IsStatus, OM.RegDatm, OM.RegAdminIdx, A.wAdminName as RegAdminName';
        } else {
            $column = $is_count;
        }

        $arr_condition['EQ']['OM.IsStatus'] = 'Y';

        return $this->_conn->getJoinListResult($this->_table['order_memo'] . ' as OM', 'left', $this->_table['admin'] . ' as A'
            , 'OM.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"', $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 주문 메모 저장
     * @param array $input
     * @return array|bool
     */
    public function addOrderMemo($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $data = [
                'OrderIdx' => element('order_idx', $input),
                'OrderMemo' => element('order_memo', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            // 과정 등록
            if ($this->_conn->set($data)->insert($this->_table['order_memo']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
