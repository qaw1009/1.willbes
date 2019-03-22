<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLogModel extends WB_Model
{
    private $_table = [
        'pay' => 'lms_order_payment',
        'deposit' => 'lms_order_deposit'
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
                'pay' => 'PayIdx, OrderNo, PayType, PgDriver, PgMid, PgTid, PayMethod, PayDetailCode, ReqPayPrice, ApprovalNo, ApprovalDatm
                    , ResultCode, ResultMsg, ResultPgTid, ResultPayPrice, ReqReason, RegDatm',
                'deposit' => 'DepositIdx, OrderNo, MsgSeq, PgDriver, PgMid, PgTid, RealPayPrice, VBankCode, VBankAccountNo, DepositBankName, DepositName, DepositDatm
                    , ErrorMsg, RegDatm, RegIp'
            ];

            $column = element($log_type, $defined_column, '*');
        }

        return $this->_conn->getListResult($this->_table[$log_type], $column, $arr_condition, $limit, $offset, $order_by);
    }
}
