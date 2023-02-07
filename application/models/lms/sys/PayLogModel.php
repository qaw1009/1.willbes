<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayLogModel extends WB_Model
{
    private $_table = [
        'pay' => 'lms_order_payment',
        'deposit' => 'lms_order_deposit',
        'escrow' => 'lms_order_escrow',
        'order' => 'lms_order'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 결제관련 로그 조회
     * @param string $log_type [로그타입 (pay : 결제/취소, deposit : 가상계좌입금통보, escrow : 에스크로)
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
                'deposit' => 'PL.DepositIdx, PL.OrderNo, PL.MsgSeq, PL.PgDriver, O.PgMid, PL.PgTid
                    , if(PL.RealPayPrice = 0, O.RealPayPrice, PL.RealPayPrice) as RealPayPrice
                    , if(PL.VBankAccountNo = "", O.VBankAccountNo, PL.VBankAccountNo) as VBankAccountNo
	                , if(PL.DepositBankName = "", fn_ccd_name(O.VBankCcd), PL.DepositBankName) as DepositBankName
                    , PL.VBankCode, PL.DepositName, PL.DepositDatm, PL.ErrorMsg, PL.RegDatm, PL.RegIp',
                'escrow' => 'PL.EscrowIdx, PL.OrderNo, PL.PgDriver, PL.PgMid, PL.EscrowParam1, PL.EscrowParam2, PL.EscrowDatm, PL.ResultCode, PL.ResultMsg, PL.IsResend, PL.RegDatm
                    , if(PL.ResultCode = "0000", "Y", "N") as IsSuccess
                    , fn_ccd_name(PL.EscrowParam1) as EscrowParam1Name'
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
                        when PayMethod in ("Card", "VCard", "CARD", "ECard") then "Card"
                        when PayMethod in ("DirectBank", "BANK", "Bank") then "DirectBank"
                        when PayMethod in ("VBank", "VBANK") then "VBank"
                        else "etc"
                      end) as PayMethod
                    , ReqPayPrice		  
                    , if(PayDetailCode in ("93", "94", "96", "97", "98"), 0, ReqPayPrice) as CardPayPrice
                    , left(RegDatm, 10) as RegDate
                from ' . $this->_table['pay'] . '
                where PayType in ("PA", "MP")
                    and ResultCode in ("0000", "00")
                    and RegDatm between ? and ?
                union all
                select O.PgMid
                    , "VDeposit" as PayMethod
                    , O.RealPayPrice as ReqPayPrice
                    , 0 as CardPayPrice
                    , left(OD.RegDatm, 10) as RegDate
                from ' . $this->_table['deposit'] . ' as OD
                    left join ' . $this->_table['order'] . ' as O
                        on OD.OrderNo = O.OrderNo                
                where OD.RegDatm between ? and ?
                    and OD.ErrorMsg is null
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
            , ifnull(sum(if(ResultCode in ("00", "0000"), 1, 0)), 0) as SuccCnt, ifnull(sum(if(ResultCode in ("00", "0000"), 0, 1)), 0) as FailCnt
            , ifnull(sum(if(ResultCode in ("00", "0000"), ifnull(CancelPrice, 0), 0)), 0) as CancelPrice';

        $from = '
            from (
                select A.PgMid, A.PayType, A.ResultCode, left(A.RegDatm, 10) as RegDate
                    , ifnull(A.ReqPayPrice, B.ReqPayPrice) as CancelPrice
                from ' . $this->_table['pay'] . ' as A
                    left join ' . $this->_table['pay'] . ' as B
                        on A.OrderNo = B.OrderNo 				
                            and A.PayType = "CA" and A.ResultCode in ("00", "0000") and A.ReqPayPrice is null
                            and B.PayType in ("PA", "MP") and B.ResultCode in ("00", "0000")                 
                where A.PayType in ("CA", "NC", "RP")
                    and A.RegDatm between ? and ?
            ) as U
            ' . $where . '
            group by RegDate, PgMid, PayType
            order by RegDate desc, PgMid asc, PayType asc            
        ';

        return $this->_conn->query('select ' . $column . $from, [$search_start_date, $search_end_date])->result_array();
    }

    /**
     * 에스크로 재발송여부 컬럼 업데이트
     * @param int $escrow_idx [에스크로식별자]
     * @return array|bool
     */
    public function modifyEscrowIsResend($escrow_idx)
    {
        try {
            $is_update = $this->_conn->set('IsResend', 'Y')->where('EscrowIdx', $escrow_idx)->update($this->_table['escrow']);
            if ($is_update === false) {
                throw new \Exception('에스크로 로그 수정에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return error_result($e, true);
        }

        return true;
    }
}
