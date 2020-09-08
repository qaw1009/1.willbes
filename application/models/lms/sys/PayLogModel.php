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

    /**
     * 결제일자, 상점아이디, 결제방법별 연동 통계
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @param array $arr_condition [조회조건]
     * @return array
     */
    public function listPayStats($search_start_date, $search_end_date, $arr_condition = [])
    {
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $column = 'RegDate, PgMid, concat(RegDate, "_", PgMid) as RowspanSrc, PayMethod, count(0) as PayCnt, sum(ReqPayPrice) as PayPrice, sum(if(PayMethod = "Card", CardPayPrice, 0)) as CardPayPrice';
        $from = '
            from (
                select PgMid
                    , (case 
                        when PayMethod in ("Card", "VCard", "CARD") then "Card"
                        when PayMethod in ("DirectBank", "BANK") then "DirectBank"
                        when PayMethod in ("VBank", "VBANK") then "VBank"
                        else "etc"
                      end) as PayMethod
                    , ReqPayPrice		  
                    , if(PayDetailCode in ("97", "98"), 0, ReqPayPrice) as CardPayPrice
                    , left(RegDatm, 10) as RegDate
                from ' . $this->_table['pay'] . '
                where PayType in ("PA", "MP")
                    and ResultCode in ("0000", "00")
                    and RegDatm between ? and ?
                union all
                select PgMid
                    , "VDeposit" as PayMethod
                    , RealPayPrice as ReqPayPrice
                    , 0 as CardPayPrice
                    , left(RegDatm, 10) as RegDate
                from ' . $this->_table['deposit'] . '
                where RegDatm between ? and ?
                    and ErrorMsg is null
            ) as U
            ' . $where . '
            group by RegDate, PgMid, PayMethod
            order by RegDate desc, PgMid asc, PayMethod asc            
        ';

        return $this->_conn->query('select ' . $column . $from, [$search_start_date, $search_end_date, $search_start_date, $search_end_date])->result_array();
    }

    /**
     * 결제일자, 상점아이디, 결제취소 타입별 연동 통계
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @param array $arr_condition [조회조건]
     * @return mixed
     */
    public function listCancelStats($search_start_date, $search_end_date, $arr_condition = [])
    {
        $search_start_date .= ' 00:00:00';
        $search_end_date .= ' 23:59:59';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        $column = 'RegDate, PgMid, concat(RegDate, "_", PgMid) as RowspanSrc, PayType, count(0) as CancelCnt
            , ifnull(sum(if(ResultCode in ("00", "0000"), 1, 0)), 0) as SuccCnt, ifnull(sum(if(ResultCode in ("00", "0000"), 0, 1)), 0) as FailCnt';

        $from = '
            from (
                select PgMid, PayType, ResultCode, left(RegDatm, 10) as RegDate
                from ' . $this->_table['pay'] . ' 
                where PayType in ("CA", "NC", "RP")
                    and RegDatm between ? and ?
            ) as U
            ' . $where . '
            group by RegDate, PgMid, PayType
            order by RegDate desc, PgMid asc, PayType asc            
        ';

        return $this->_conn->query('select ' . $column . $from, [$search_start_date, $search_end_date])->result_array();
    }
}
