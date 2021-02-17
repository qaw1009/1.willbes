<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class SsamCalcModel extends BaseOrderModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 임용 정산목록 조회
     * @param string $calc_type [정산구분 (lectureSM, offLectureSM)]
     * @param array|int $prof_idx [교수식별자]
     * @param int $site_code [사이트코드]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param bool|string $is_count [조회구분 (true : 카운트, false : 목록, string : 컬럼지정, TOTAL : 전체합계)]
     * @param array $arr_condition [조회조건]
     * @return mixed
     */
    public function listProfCalc($calc_type, $prof_idx, $site_code, $start_date, $end_date, $is_count, $arr_condition = [])
    {
        $group_by = '';
        $rollup = '';
        $order_by_offset_limit = '';

        if ($is_count == 'TOTAL') {
            $in_column = 'sum(RD.DivisionCalcRatePrice) as tDivisionCalcRatePrice';
            $column = '*';
        } else {
            if ($is_count === true) {
                $in_column = 'RD.ProdCodeSub, RD.PayTypeCcd';
                $column = 'count(*) AS numrows';
            } else {
                $in_column = 'ifnull(RD.ProdCodeSub, "TOTAL") as ProdCodeSub
                    , ifnull(RD.PayTypeCcd, "PROD") as PayTypeCcd
                    , max(RD.ProfIdx) as ProfIdx
                    , if(RD.PayTypeCcd is not null, max(RD.ProdNameSub), "") as ProdNameSub
                    , if(RD.PayTypeCcd is not null, max(RD.SalePrice), "") as SalePrice
                    , count(0) as tPayCnt
                    , sum(RD.DivisionPayPrice) as tDivisionPayPrice
                    , sum(RD.DivisionRefundPrice) as tDivisionRefundPrice
                    , sum(RD.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(RD.DivisionCalcPrice) as tDivisionCalcPrice
                    , sum(RD.DivisionCalcRatePrice) as tDivisionCalcRatePrice
                    , fn_ccd_name(RD.PayTypeCcd) as PayTypeCcdName
                ';

                if (is_bool($is_count) === true) {
                    $column = '*';
                } else {
                    $column = $is_count;
                }

                $rollup = ' with rollup';
                $order_by_offset_limit = ' order by U.ProdCodeSub asc, U.PayTypeCcd asc';
            }

            $group_by = ' group by RD.ProdCodeSub, RD.PayTypeCcd' . $rollup;
        }

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $from = '
            from (
                select ROUND(RR.RealPayPrice * RR.ProdDivisionRate, 0) as DivisionPayPrice
                    , ROUND(RR.RefundPrice * RR.ProdDivisionRate, 0) as DivisionRefundPrice
                    , ROUND(RR.PgFeePrice * RR.ProdDivisionRate, 0) as DivisionPgFeePrice
                    , ROUND((RR.RealPayPrice - RR.RefundPrice - RR.PgFeePrice) * RR.ProdDivisionRate, 0) as DivisionCalcPrice		
			        , ROUND(ROUND((RR.RealPayPrice - RR.RefundPrice - RR.PgFeePrice) * RR.ProdDivisionRate, 0) * RR.ProdCalcRate, 0) as DivisionCalcRatePrice
                    , RR.*
                from (
                    select TA.OrderIdx, TA.OrderProdIdx, TA.ProdCode, TA.ProdCodeSub
                        , if(TA.PayMethodCcd = "", TA.PayRouteCcd, TA.PayMethodCcd) as PayTypeCcd
                        , TA.CompleteDatm, ifnull(TA.RealPayPrice, 0) as RealPayPrice, ifnull(TA.CardPayPrice, 0) as CardPayPrice, ifnull(TA.CashPayPrice, 0) as CashPayPrice
                        , TA.RefundDatm, ifnull(TA.RefundPrice, 0) as RefundPrice, ifnull(TA.CardRefundPrice, 0) as CardRefundPrice, ifnull(TA.CashRefundPrice, 0) as CashRefundPrice
                        , TA.LearnPatternCcd, TA.PackTypeCcd
                        , TA.PgFee
                        , if(TA.PgFee > 0 and ifnull(TA.RealPayPrice, 0) > ifnull(TA.RefundPrice, 0),
                            TRUNCATE(if(TA.PgFee < 1, ROUND((ifnull(TA.CardPayPrice, 0) - ifnull(TA.CardRefundPrice, 0)) * cast(TA.PgFee as decimal(10, 5)), 0), TA.PgFee), 0)
                          , 0) as PgFeePrice
                        , SP.ProdName as ProdNameSub			  
                        , SPS.SalePrice
                        , ifnull(
                            if(TA.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", (
                                (SPS.SalePrice * PD.ProdDivisionRate) / (
                                    select sum(B.SalePrice) 
                                    from ' . $this->_table['order_sub_product'] . ' as A
                                        inner join ' . $this->_table['product_sale'] . ' as B
                                            on A.ProdCodeSub = B.ProdCode
                                    where A.OrderProdIdx = TA.OrderProdIdx
                                        and B.SaleTypeCcd = TA.SaleTypeCcd
                                        and B.IsStatus = "Y")					
                            ), PD.ProdDivisionRate)
                          , 0) as ProdDivisionRate
                        , (PD.ProdCalcRate / 100) as ProdCalcRate
                        , PD.ProfIdx                        
                    ' . $this->_getBaseFrom($calc_type, $site_code, $start_date, $end_date) . '
                    where PD.ProfIdx in ?
                    ' . $where . '                                                    
                ) as RR                      
            ) as RD
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $group_by . ') U' . $order_by_offset_limit, [(array) $prof_idx]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 임용 수강생현황 조회
     * @param string $calc_type [정산구분 (lectureStudSM, offLectureStudSM)]
     * @param array|int $prof_idx [교수식별자]
     * @param int $site_code [사이트코드]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param bool|string $is_count [조회구분 (true : 카운트, false : 목록, string : 컬럼지정)]
     * @param array $arr_condition [조회조건]
     * @return mixed
     */
    public function listProfStudent($calc_type, $prof_idx, $site_code, $start_date, $end_date, $is_count, $arr_condition = [])
    {
        if ($is_count === true) {
            $in_column = 'RD.ProdCodeSub';
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'ifnull(RD.ProdCodeSub, "TOTAL") as ProdCodeSub
                , max(RD.ProfIdx) as ProfIdx                
                , if(RD.ProdCodeSub is not null, max(RD.ProdNameSub), "") as ProdNameSub                
                , count(0) as tPayCnt
                , sum(if(RD.ProdCode = RD.ProdCodeSub, 0, 1)) as tPayPackCnt
                , sum(RD.RemainPrice) as tRemainPrice
            ';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

            $order_by_offset_limit = ' order by U.ProdCodeSub asc';
        }

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $from = '
            from (
                select (RR.RealPayPrice - RR.RefundPrice) as RemainPrice
                    , RR.*
                from (
                    select TA.OrderIdx, TA.OrderProdIdx, TA.ProdCode, TA.ProdCodeSub
                        , ifnull(TA.RealPayPrice, 0) as RealPayPrice
                        , ifnull(TA.RefundPrice, 0) as RefundPrice
                        , SP.ProdName as ProdNameSub			  
                        , PD.ProfIdx                
                    ' . $this->_getBaseFrom($calc_type, $site_code, $start_date, $end_date) . '
                    where PD.ProfIdx in ?
                    ' . $where . '                                                    
                ) as RR                      
            ) as RD
            group by RD.ProdCodeSub
            with rollup
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . ') U' . $order_by_offset_limit, [(array) $prof_idx]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 임용 정산대상 주문목록 조회
     * @param string $calc_type [정산구분 (lectureSM, offLectureSM, lectureStudSM, offLectureStudSM)]
     * @param int $prof_idx [교수식별자]
     * @param int $site_code [사이트코드]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param bool|string $is_count [조회구분 (true : 카운트, false : 목록, string : 컬럼지정)]
     * @param array $arr_condition [조회조건]
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listProfOrder($calc_type, $prof_idx, $site_code, $start_date, $end_date, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $in_column = 'count(*) AS numrows';
            $column = 'numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'TA.OrderIdx, TA.OrderProdIdx, TA.ProdCode, TA.ProdCodeSub
                , TA.OrderNo, TA.MemIdx, TA.SiteCode, TA.PayChannelCcd, TA.PayRouteCcd, TA.PayMethodCcd
                , TA.CompleteDatm, TA.RealPayPrice, TA.RefundDatm, TA.RefundPrice				
                , TA.SalePatternCcd
                , SP.ProdName as ProdNameSub
                , if(TA.ProdCode = TA.ProdCodeSub, "단과", "패키지") as LecPackTypeName
                , if(TA.RefundDatm is not null, "환불완료", "결제완료") as PayStatusName
                , M.MemName, M.MemId, fn_dec(M.PhoneEnc) as MemPhone
                , CPC.CcdName as PayChannelCcdName
                , CPR.CcdName as PayRouteCcdName
                , CPM.CcdName as PayMethodCcdName
                , CSP.CcdName as SalePatternCcdName
            ';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = $this->_getBaseFrom($calc_type, $site_code, $start_date, $end_date) . '
                left join ' . $this->_table['member'] . ' as M
                    on TA.MemIdx = M.MemIdx
                left join ' . $this->_table['code'] . ' as CPC
                    on TA.PayChannelCcd = CPC.Ccd and CPC.IsStatus = "Y" and CPC.GroupCcd = "' . $this->_group_ccd['PayChannel'] . '"
                left join ' . $this->_table['code'] . ' as CPR
                    on TA.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y" and CPR.GroupCcd = "' . $this->_group_ccd['PayRoute'] . '"
                left join ' . $this->_table['code'] . ' as CPM
                    on TA.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y" and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '"
                left join ' . $this->_table['code'] . ' as CSP
                    on TA.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y" and CSP.GroupCcd = "' . $this->_group_ccd['SalePattern'] . '"
            where PD.ProfIdx = ?               
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit, [$prof_idx]);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 임용 정산대상 주문조회 From절 리턴
     * @param string $calc_type [정산구분 (lectureSM, offLectureSM)]
     * @param int $site_code [사이트코드]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @return string
     */
    public function _getBaseFrom($calc_type, $site_code, $start_date, $end_date)
    {
        $start_date = $start_date . ' 00:00:00';
        $end_date = $end_date . ' 23:59:59';

        if (starts_with($calc_type, 'lecture') === true) {
            $where = '
                and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
                and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '")                
            ';
        } else {
            $where = '
                and P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"                
            ';
        }

        return '
            from (
                select O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, ifnull(OSP.ProdCodeSub, OP.ProdCode) as ProdCodeSub
					, O.OrderNo, O.MemIdx, O.SiteCode, O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd
					, O.CompleteDatm
					, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RealPayPrice, OP.RealPayPrice) as RealPayPrice
					, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RealPayPrice, OP.CardPayPrice) as CardPayPrice
					, OP.CashPayPrice	
					, if(OPR.RefundDatm > ' . $this->_conn->escape($end_date) . ', null, OPR.RefundDatm) as RefundDatm
				    , if(OPR.RefundDatm > ' . $this->_conn->escape($end_date) . ', null, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.RefundPrice)) as RefundPrice
				    , if(OPR.RefundDatm > ' . $this->_conn->escape($end_date) . ', null, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.CardRefundPrice)) as CardRefundPrice
				    , if(OPR.RefundDatm > ' . $this->_conn->escape($end_date) . ', null, OPR.CashRefundPrice) as CashRefundPrice
				    , OP.SaleTypeCcd, OP.SalePatternCcd
				    , PL.LearnPatternCcd, PL.PackTypeCcd
				    , ifnull(json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")), 0) as PgFee
				from ' . $this->_table['order'] . ' as O
					inner join ' . $this->_table['order_product'] . ' as OP
						on O.OrderIdx = OP.OrderIdx		
					inner join ' . $this->_table['product'] . ' as P
						on OP.ProdCode = P.ProdCode
					inner join ' . $this->_table['product_lecture'] . ' as PL
						on OP.ProdCode = PL.ProdCode
					left join ' . $this->_table['order_sub_product'] . ' as OSP
						on OP.OrderProdIdx = OSP.OrderProdIdx
					left join ' . $this->_table['order_product_refund'] . ' as OPR
						on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
				    left join ' . $this->_table['code'] . ' as CPM
				        on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "604" and CPM.IsStatus = "Y"		
				where O.CompleteDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . '
					and O.SiteCode = ' . $this->_conn->escape($site_code) . '
					and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['free'] . '")
					and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                ' . $where . '
                union all
                select O.OrderIdx, OP.OrderProdIdx, OP.ProdCode, ifnull(OSP.ProdCodeSub, OP.ProdCode) as ProdCodeSub
                    , O.OrderNo, O.MemIdx, O.SiteCode, O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd
                    , O.CompleteDatm
                    , null as RealPayPrice
                    , null as CardPayPrice
                    , null as CashPayPrice
                    , OPR.RefundDatm
                    , if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.RefundPrice) as RefundPrice
                    , if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.CardRefundPrice) as CardRefundPrice
                    , OPR.CashRefundPrice
                    , OP.SaleTypeCcd, OP.SalePatternCcd
                    , PL.LearnPatternCcd, PL.PackTypeCcd
                    , 0 as PgFee
                from ' . $this->_table['order_product_refund'] . ' as OPR
                    inner join ' . $this->_table['order'] . ' as O
                        on OPR.OrderIdx = O.OrderIdx
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on OPR.OrderIdx = OP.OrderIdx and OPR.OrderProdIdx = OP.OrderProdIdx		
                    inner join ' . $this->_table['product'] . ' as P
                        on OP.ProdCode = P.ProdCode
                    inner join ' . $this->_table['product_lecture'] . ' as PL
                        on OP.ProdCode = PL.ProdCode
                    left join ' . $this->_table['order_sub_product'] . ' as OSP
                        on OP.OrderProdIdx = OSP.OrderProdIdx		
                where OPR.RefundDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . '
                    and O.CompleteDatm < ' . $this->_conn->escape($start_date) . '                
                    and O.SiteCode = ' . $this->_conn->escape($site_code) . '	
                    and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['free'] . '")	
                    and OP.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '"
                ' . $where . '                                                  					
            ) as TA
				inner join ' . $this->_table['product'] . ' as SP
					on SP.ProdCode = TA.ProdCodeSub
				inner join ' . $this->_table['product_sale'] . ' as SPS
					on SPS.ProdCode = TA.ProdCodeSub and SPS.SaleTypeCcd = TA.SaleTypeCcd and SPS.IsStatus = "Y"
				inner join ' . $this->_table['product_division'] . ' as PD
					on PD.ProdCode = if(TA.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '" or TA.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", TA.ProdCodeSub, TA.ProdCode)
						and PD.ProdCodeSub = TA.ProdCodeSub
						and PD.IsStatus = "Y"            
        ';
    }
}
