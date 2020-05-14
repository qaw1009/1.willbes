<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLogModel extends WB_Model
{
    private $_table = [
        'pay' => 'lms_order_payment',
        'deposit' => 'lms_order_deposit',
        'order' => 'lms_order'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 결제관련 로그 조회
     * @param string $log_type [로그타입 (pay : 결제/취소, deposit : 가상계좌입금통보)
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listPayLog($log_type, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = $is_count;

        if (is_bool($is_count) === true && $is_count === false) {
            $defined_column = [
                'pay' => 'PL.PayIdx, PL.OrderNo, PL.PayType, PL.PgDriver, PL.PgMid, PL.PgTid, PL.PayMethod, PL.PayDetailCode, PL.ReqPayPrice, PL.ApprovalNo, PL.ApprovalDatm
                    , PL.ResultCode, PL.ResultMsg, PL.ResultPgTid, PL.ResultPayPrice, PL.ReqReason, PL.RegDatm',
                'deposit' => 'PL.DepositIdx, PL.OrderNo, PL.MsgSeq, PL.PgDriver, PL.PgMid, PL.PgTid, PL.RealPayPrice, PL.VBankCode, PL.VBankAccountNo
                    , PL.DepositBankName, PL.DepositName, PL.DepositDatm, PL.ErrorMsg, PL.RegDatm, PL.RegIp'
            ];

            $column = element($log_type, $defined_column, 'PL.*') . ', O.OrderIdx';
        }

        return $this->_conn->getJoinListResult($this->_table[$log_type] . ' as PL', 'left', $this->_table['order'] . ' as O', 'PL.OrderNo = O.OrderNo'
            , $column, $arr_condition, $limit, $offset, $order_by);
    }
}
