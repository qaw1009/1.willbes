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
    // 결제방법 구분값
    private $_pay_method = [
        'card' => "'Card', 'CARD', 'VCard', 'ECard'",
        'bank' => "'DirectBank', 'Bank', 'BANK'",
        'vbank' => "'VBank', 'VBANK'"
    ];
    private $_req_pay_type = "'PA', 'MP'";          // 결제요청 연동구분값
    private $_cancel_pay_type = "'CA', 'NC', 'RP'"; // 결제취소 연동구분값
    private $_succ_result_code = "'00', '0000'";    // 연동성공값

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
     * 결제방법별 로그 조회
     * @param string $pay_method [결제방법 (card, bank, vbank)]
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @param bool|string $is_count [조회구분 (true: 카운트, false: 목록, string: 컬럼지정, sum: 합계)]
     * @param array $arr_condition [조회조건]
     * @param null|int $limit
     * @param null|int $offset
     * @return mixed
     */
    public function listPayMethodLog($pay_method, $search_start_date, $search_end_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        $arr_query = $this->_getPayMethodLogQuery($pay_method, $search_start_date, $search_end_date);   // 결제방법별 쿼리
        $is_all_from = false;
        $order_by_offset_limit = '';

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            if ($is_count === 'sum') {
                $column = $arr_query['sum_column'];
            } else {
                if (is_bool($is_count) === true) {
                    $column = 'TA.*, O.OrderIdx';
                } elseif ($is_count == 'excel') {
                    $column = $arr_query['excel_column'];
                } else {
                    $column = $is_count;
                }

                $is_all_from = true;
                $order_by_offset_limit = $this->_conn->makeOrderBy($arr_query['order_by'])->getMakeOrderBy();
                $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            }
        }

        $from = '
            from (
                ' . $arr_query['from'] . '
            ) as TA                
        ';

        if ($is_all_from === true) {
            $from .= '
                left join ' . $this->_table['order'] . ' as O
                    on TA.OrderNo = O.OrderNo            
            ';
        }

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, $arr_query['bind']);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 결제방법별 조회쿼리 리턴
     * @param string $pay_method [결제방법 (card, bank, vbank)]
     * @param string $search_start_date [조회시작일자]
     * @param string $search_end_date [조회종료일자]
     * @return array
     */
    private function _getPayMethodLogQuery($pay_method, $search_start_date, $search_end_date)
    {
        $search_start_date = $search_start_date . ' 00:00:00';
        $search_end_date = $search_end_date . ' 23:59:59';

        if ($pay_method == 'vbank') {
            // 집계컬럼
            $sum_column = 'count(0) as tPayCnt
                , count(distinct OrderNo) as tOrderCnt
                , sum(if(PayType in ("WA", "PA"), 1, 0)) as tReqPayCnt
                , sum(if(PayType in ("WA", "PA"), ReqPayPrice, 0)) as tReqPayPrice
                , sum(if(PayType = "PA", 1, 0)) as tDepositCnt
                , sum(if(PayType = "PA", DepositPrice, 0)) as tDepositPrice
                , sum(if(PayType in ("WA", "PA"), 0, 1)) as tCancelCnt
                , sum(CancelPrice) as tCancelPrice
                , sum(if(PayType = "PA", DepositPrice, CancelPrice)) as tPayPrice';

            // 엑셀컬럼
            $excel_column = 'TA.OrderNo, TA.PgDriver, TA.PayType, TA.PgMid, TA.PgTid, TA.PayDetailCode, TA.ReqPayPrice, TA.VBankDatm, TA.DepositPrice, TA.DepositDatm, TA.CancelPrice, TA.CancelDatm';

            // from (입금대기, 결제완료, 결제취소)
            $from = /** @lang text */ '
                select PA.PayIdx, PA.OrderNo, "WA" as PayType, PA.PgDriver, PA.PgMid, PA.PgTid, PA.PayDetailCode, PA.ResultCode
                    , PA.ReqPayPrice, 0 as DepositPrice, 0 as CancelPrice
                    , PA.RegDatm as VBankDatm, null as DepositDatm, null as CancelDatm, PA.RegDatm as RegDatm
                from ' . $this->_table['pay'] . ' as PA
                    left join ' . $this->_table['deposit'] . ' as DP
                        on PA.OrderNo = DP.OrderNo and DP.ErrorMsg is null
                where PA.RegDatm between ? and ?
                    and PA.PayType in (' . $this->_req_pay_type . ')
                    and PA.PayMethod in (' . $this->_pay_method[$pay_method] . ')
                    and PA.ResultCode in (' . $this->_succ_result_code . ')
                    and DP.DepositIdx is null
                union all
                select PA.PayIdx, PA.OrderNo, "PA" as PayType, PA.PgDriver, PA.PgMid, PA.PgTid, PA.PayDetailCode, "00" as ResultCode
                    , PA.ReqPayPrice, PA.ReqPayPrice as DepositPrice, 0 as CancelPrice
                    , PA.RegDatm as VBankDatm, DP.DepositDatm, null as CancelDatm, DP.DepositDatm as RegDatm
                from ' . $this->_table['deposit'] . ' as DP
                    inner join ' . $this->_table['pay'] . ' as PA
                        on DP.OrderNo = PA.OrderNo
                where DP.RegDatm between ? and ?
                    and DP.ErrorMsg is null
                    and PA.PayType in (' . $this->_req_pay_type . ')
                    and PA.PayMethod in (' . $this->_pay_method[$pay_method] . ')
                    and PA.ResultCode in (' . $this->_succ_result_code . ')	
                union all
                select CA.PayIdx, CA.OrderNo, CA.PayType, CA.PgDriver, CA.PgMid, CA.PgTid, PA.PayDetailCode, CA.ResultCode
                    , PA.ReqPayPrice, PA.ReqPayPrice as DepositPrice, (ifnull(CA.ReqPayPrice, PA.ReqPayPrice) * -1) as CancelPrice
                    , PA.RegDatm as VBankDatm, DP.DepositDatm, CA.RegDatm as CancelDatm, CA.RegDatm as RegDatm
                from ' . $this->_table['pay'] . ' as CA
                    inner join ' . $this->_table['pay'] . ' as PA
                        on CA.OrderNo = PA.OrderNo	
                    inner join ' . $this->_table['deposit'] . ' as DP
                        on CA.OrderNo = DP.OrderNo
                where CA.RegDatm between ? and ?
                    and CA.PayType in (' . $this->_cancel_pay_type . ')
                    and CA.ResultCode in (' . $this->_succ_result_code . ')
                    and PA.PayType in (' . $this->_req_pay_type . ')
                    and PA.PayMethod in (' . $this->_pay_method[$pay_method] . ')
                    and PA.ResultCode in (' . $this->_succ_result_code . ')
                    and DP.ErrorMsg is null
            ';

            // 바인딩
            $bind = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            // 정렬순서
            $order_by = ['TA.RegDatm' => 'desc'];
        } else {
            // 집계컬럼
            $sum_column = 'count(0) as tPayCnt
                , count(distinct OrderNo) as tOrderCnt
                , sum(if(PayType = "PA", 1, 0)) as tReqPayCnt
                , sum(if(PayType = "PA", ReqPayPrice, 0)) as tReqPayPrice
                , sum(if(PayType = "PA", 0, 1)) as tCancelCnt
                , sum(CancelPrice) as tCancelPrice
                , sum(if(PayType = "PA", ReqPayPrice, CancelPrice)) as tPayPrice';

            // 엑셀컬럼
            $excel_column = 'TA.OrderNo, TA.PgDriver, TA.PayType, TA.PgMid, TA.PgTid, TA.PayDetailCode, TA.ReqPayPrice, TA.RegDatm, TA.CancelPrice, TA.CancelDatm';

            // from (결제완료, 결제취소)
            $from = /** @lang text */ '
                select PayIdx, OrderNo, "PA" as PayType, PgDriver, PgMid, PgTid, PayDetailCode, ResultCode
                    , ReqPayPrice, 0 as CancelPrice, RegDatm, null as CancelDatm
                from ' . $this->_table['pay'] . '
                where RegDatm between ? and ?
                    and PayType in (' . $this->_req_pay_type . ')
                    and PayMethod in (' . $this->_pay_method[$pay_method] . ')
                    and ResultCode in (' . $this->_succ_result_code . ')
                union all
                select CA.PayIdx, CA.OrderNo, CA.PayType, CA.PgDriver, CA.PgMid, CA.PgTid, PA.PayDetailCode, CA.ResultCode
                    , PA.ReqPayPrice, (ifnull(CA.ReqPayPrice, PA.ReqPayPrice) * -1) as CancelPrice, PA.RegDatm, CA.RegDatm as CancelDatm
                from ' . $this->_table['pay'] . ' as CA
                    inner join ' . $this->_table['pay'] . ' as PA
                        on CA.OrderNo = PA.OrderNo	
                where CA.RegDatm between ? and ?
                    and CA.PayType in (' . $this->_cancel_pay_type . ')
                    and CA.ResultCode in (' . $this->_succ_result_code . ')
                    and PA.PayType in (' . $this->_req_pay_type . ')
                    and PA.PayMethod in (' . $this->_pay_method[$pay_method] . ')
                    and PA.ResultCode in (' . $this->_succ_result_code . ')
            ';

            // 바인딩
            $bind = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];

            // 정렬순서
            $order_by = ['TA.PayIdx' => 'desc'];
        }

        return [
            'sum_column' => $sum_column,
            'excel_column' => $excel_column,
            'from' => $from,
            'bind' => $bind,
            'order_by' => $order_by
        ];
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
                        when PayMethod in (' . $this->_pay_method['card'] . ') then "Card"
                        when PayMethod in (' . $this->_pay_method['bank'] . ') then "DirectBank"
                        when PayMethod in (' . $this->_pay_method['vbank'] . ') then "VBank"
                        else "etc"
                      end) as PayMethod
                    , ReqPayPrice		  
                    , if(PayDetailCode in ("93", "94", "96", "97", "98"), 0, ReqPayPrice) as CardPayPrice
                    , left(RegDatm, 10) as RegDate
                from ' . $this->_table['pay'] . '
                where PayType in (' . $this->_req_pay_type . ')
                    and ResultCode in (' . $this->_succ_result_code . ')
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
            , ifnull(sum(if(ResultCode in (' . $this->_succ_result_code . '), 1, 0)), 0) as SuccCnt
            , ifnull(sum(if(ResultCode in (' . $this->_succ_result_code . '), 0, 1)), 0) as FailCnt
            , ifnull(sum(if(ResultCode in (' . $this->_succ_result_code . '), ifnull(CancelPrice, 0), 0)), 0) as CancelPrice';

        $from = '
            from (
                select A.PgMid, A.PayType, A.ResultCode, left(A.RegDatm, 10) as RegDate
                    , ifnull(A.ReqPayPrice, B.ReqPayPrice) as CancelPrice
                from ' . $this->_table['pay'] . ' as A
                    left join ' . $this->_table['pay'] . ' as B
                        on A.OrderNo = B.OrderNo 				
                            and A.PayType = "CA" and A.ResultCode in (' . $this->_succ_result_code . ') and A.ReqPayPrice is null
                            and B.PayType in (' . $this->_req_pay_type . ') and B.ResultCode in (' . $this->_succ_result_code . ')                 
                where A.PayType in (' . $this->_cancel_pay_type . ')
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
