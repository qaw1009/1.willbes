<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderCalcModel extends BaseOrderModel
{
    public $_in_tax_rate = 0.03;   // 소득세
    public $_re_tax_rate = 0.03 * 0.1;    // 주민세

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 단강좌&사용자/운영자패키지(일반형) 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일,수강개월수(사용안함)]
     * @param bool|string $is_count [조회구분, sum : 교수/과목별합계, tSum : 전체합계, true : 주문목록 카운트, false : 주문목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcLecture($prod_type, $arr_search_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = 'if(O.CompleteDatm between ? and ?, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RealPayPrice, OP.RealPayPrice), 0) as RealPayPrice
                , if(O.CompleteDatm between ? and ?, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RealPayPrice, OP.CardPayPrice), 0) as CardPayPrice
                , if(OPR.RefundDatm between ? and ?, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.RefundPrice), 0) as RefundPrice
                , if(OPR.RefundDatm between ? and ?, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.CardRefundPrice), 0) as CardRefundPrice
                , ifnull(SPL.SubjectIdx, PL.SubjectIdx) as SubjectIdx
                , PD.ProfIdx, PD.ProdDivisionRate, (PD.ProdCalcRate / 100) as ProdCalcRate, concat(PD.ProdCalcRate, "%") as ProdCalcPerc
                , json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee';

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $in_column .= ', O.OrderIdx, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, O.CompleteDatm, OPR.RefundDatm as OriRefundDatm
                    , OP.OrderProdIdx, OP.ProdCode, OP.SalePatternCcd
                    , P.ProdName, PL.LearnPatternCcd, PL.PackTypeCcd, left(PC.CateCode, 4) as LgCateCode
                    , OSP.ProdCodeSub, SP.ProdName as ProdNameSub                               
                    , ifnull(SPL.CourseIdx, PL.CourseIdx) as CourseIdx';

                $column = 'U.*
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PCO.CourseName, PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CSP.CcdName as SalePatternCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수/과목별 합계 or 전체합계
                /*// 기존 소득세, 주민세, 지급액 계산
                , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) as tDivisionIncomeTax
                , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tDivisionResidentTax
                , sum(U.DivisionCalcPrice) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tFinalCalcPrice*/

                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice, sum(U.DivisionCalcPayPrice) as tDivisionCalcPayPrice, sum(U.DivisionCalcRefundPrice) as tDivisionCalcRefundPrice
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)) as tDivisionIncomeTax
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0)) as tDivisionResidentTax
                    , ((sum(U.DivisionCalcPayPrice)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0))
                        - (sum(U.DivisionCalcRefundPrice)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0))) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
			from (
                select RO.OrderIdx, ROP.OrderProdIdx
                from ' . $this->_table['order'] . ' as RO
                    inner join ' . $this->_table['order_product'] . ' as ROP
                        on RO.OrderIdx = ROP.OrderIdx
                where RO.CompleteDatm between ? and ?
                    and ROP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                    and ROP.RealPayPrice > 0
                union
                select OrderIdx, OrderProdIdx
                from ' . $this->_table['order_product_refund'] . '
                where RefundDatm between ? and ?	
                    and RefundPrice > 0					
			) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on BO.OrderIdx = OP.OrderIdx and BO.OrderProdIdx = OP.OrderProdIdx
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
				inner join ' . $this->_table['product'] . ' as P
					on OP.ProdCode = P.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as PL
					on OP.ProdCode = PL.ProdCode
				left join ' . $this->_table['product_r_category'] . ' as PC
					on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
				left join ' . $this->_table['order_sub_product'] . ' as OSP		
					on OP.OrderProdIdx = OSP.OrderProdIdx 
				left join ' . $this->_table['product'] . ' as SP		
					on OSP.ProdCodeSub = SP.ProdCode
				left join ' . $this->_table['product_lecture'] . ' as SPL
					on OSP.ProdCodeSub = SPL.ProdCode
				inner join ' . $this->_table['product_division'] . ' as PD
					on PD.ProdCode = if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.ProdCodeSub, OP.ProdCode) and PD.ProdCodeSub = ifnull(OSP.ProdCodeSub, OP.ProdCode) and PD.IsStatus = "Y"
				left join ' . $this->_table['code'] . ' as CPM
					on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"
			where OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")				
				and (PL.PackTypeCcd is null or PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '")';

        if ($prod_type === 'lecture') {
            // 온라인강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
				and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '")';
        } else {
            // 학원강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
				and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['off_lecture'] . '", "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '")';
        }

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 기간조회 조건 바인딩
        $search_start_date = $arr_search_date[0] . ' 00:00:00';
        $search_end_date = $arr_search_date[1] . ' 23:59:59';

        if ($is_count === true) {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];
            $query = $raw_query;
        } else {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date,
                $search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0) as DivisionPgFeePrice #E	
                        , TRUNCATE((RD.DivisionPayPrice - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0) as DivisionCalcPayPrice #H1
                        , TRUNCATE(RD.DivisionRefundPrice * RD.ProdCalcRate, 0) as DivisionCalcRefundPrice #H2
                        , (TRUNCATE((RD.DivisionPayPrice - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0) 
                            - TRUNCATE(RD.DivisionRefundPrice * RD.ProdCalcRate, 0)) as DivisionCalcPrice #H=H1-H2
                    from (
                        select RR.*
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPayPrice
                            , TRUNCATE(RR.RealPayPrice * RR.ProdDivisionRate, 0) as DivisionPayPrice #C
                            , TRUNCATE(RR.RefundPrice * RR.ProdDivisionRate, 0) as DivisionRefundPrice #D
                            , TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) as PgFeePrice #E1			 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U';

            if ($is_count !== 'tSum') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드 or 교수/과목별 합계 (=> 전체합계가 아닌 경우)
                $query .= '
                    left join ' . $this->_table['subject'] . ' as PSU		
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"';
            }

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $query .= '
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['course'] . ' as PCO		
                        on U.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['category'] . ' as SC
                        on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on U.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y"		
                    left join ' . $this->_table['code'] . ' as CLP
                        on U.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPT
                        on U.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"';

                if ($is_count === false) {
                    // 상세보기 주문목록 order by, offset, limit
                    $query .= ' order by U.OrderIdx desc';
                    is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                }
            } else {
                // 교수/과목별 합계 or 전체합계 group by, order by
                $query .= ' group by U.ProfIdx, U.SubjectIdx';
                $query .= ' order by tDivisionCalcPrice desc';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PgFee, PgFeePrice, PayStatusName, LgCateName, LearnPatternCcdName, ifnull(PackTypeCcdName, SalePatternCcdName) as ProdDetailTypeName
                , ProdCode, ProdName, CourseName, ProdCodeSub, ProdNameSub, SubjectName, wProfName, ProdDivisionRate, DivisionPayPrice, DivisionRefundPrice, DivisionPgFeePrice
                , ProdCalcPerc, DivisionCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 운영자패키지(선택형) 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일,수강개월수(사용안함)]
     * @param bool|string $is_count [조회구분, sum : 교수/과목별합계, tSum : 전체합계, true : 주문목록 카운트, false : 주문목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcAdminPackChoice($prod_type, $arr_search_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = 'if(O.CompleteDatm between ? and ?, OP.RealPayPrice, 0) as RealPayPrice
				, if(O.CompleteDatm between ? and ?, OP.CardPayPrice, 0) as CardPayPrice
				, if(OPR.RefundDatm between ? and ?, OPR.RefundPrice, 0) as RefundPrice
				, if(OPR.RefundDatm between ? and ?, OPR.CardRefundPrice, 0) as CardRefundPrice
				, SPL.SubjectIdx
				, SPD.ProfIdx, (SPD.ProdCalcRate / 100) as ProdCalcRate, concat(SPD.ProdCalcRate, "%") as ProdCalcPerc
				, (SPS.SalePrice * SPD.ProdDivisionRate) as DivisionSalePrice
				, (select sum(B.SalePrice) 
					from ' . $this->_table['order_sub_product'] . ' as A 
						inner join ' . $this->_table['product_sale'] . ' as B
							on A.ProdCodeSub = B.ProdCode and B.SaleTypeCcd = "613001" and B.IsStatus = "Y"
					where A.OrderProdIdx = OP.OrderProdIdx) as TotalSalePrice
				, json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee';

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $in_column .= ', O.OrderIdx, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, O.CompleteDatm, OPR.RefundDatm as OriRefundDatm
                    , OP.OrderProdIdx, OP.ProdCode, OP.SalePatternCcd
                    , P.ProdName, PL.LearnPatternCcd, PL.PackTypeCcd, left(PC.CateCode, 4) as LgCateCode                    
                    , OSP.ProdCodeSub, SP.ProdName as ProdNameSub                   
                    , SPL.CourseIdx, SPS.SalePrice, SPD.ProdDivisionRate as DivisionRate';

                $column = 'U.*
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PCO.CourseName, PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CSP.CcdName as SalePatternCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수/과목별 합계 or 전체합계
                /*// 기존 소득세, 주민세, 지급액 계산
                , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) as tDivisionIncomeTax
                , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tDivisionResidentTax
                , sum(U.DivisionCalcPrice) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tFinalCalcPrice*/

                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice, sum(U.DivisionCalcPayPrice) as tDivisionCalcPayPrice, sum(U.DivisionCalcRefundPrice) as tDivisionCalcRefundPrice
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)) as tDivisionIncomeTax
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0)) as tDivisionResidentTax
                    , ((sum(U.DivisionCalcPayPrice)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0))
                        - (sum(U.DivisionCalcRefundPrice)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0))) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
			from (
                select RO.OrderIdx, ROP.OrderProdIdx
                from ' . $this->_table['order'] . ' as RO
                    inner join ' . $this->_table['order_product'] . ' as ROP
                        on RO.OrderIdx = ROP.OrderIdx
                where RO.CompleteDatm between ? and ?
                    and ROP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                    and ROP.RealPayPrice > 0
                union
                select OrderIdx, OrderProdIdx
                from ' . $this->_table['order_product_refund'] . '
                where RefundDatm between ? and ?	
                    and RefundPrice > 0					 
            ) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on BO.OrderIdx = OP.OrderIdx and BO.OrderProdIdx = OP.OrderProdIdx
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
				inner join ' . $this->_table['product'] . ' as P
					on OP.ProdCode = P.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as PL
					on OP.ProdCode = PL.ProdCode
				left join ' . $this->_table['product_r_category'] . ' as PC
					on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
				inner join ' . $this->_table['order_sub_product'] . ' as OSP		
					on OP.OrderProdIdx = OSP.OrderProdIdx 
				inner join ' . $this->_table['product'] . ' as SP		
					on OSP.ProdCodeSub = SP.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as SPL
					on OSP.ProdCodeSub = SPL.ProdCode
				inner join ' . $this->_table['product_division'] . ' as SPD
					on OSP.ProdCodeSub = SPD.ProdCode and OSP.ProdCodeSub = SPD.ProdCodeSub and SPD.IsStatus = "Y"
				inner join ' . $this->_table['product_sale'] . ' as SPS		
					on OSP.ProdCodeSub = SPS.ProdCode and SPS.SaleTypeCcd = "613001" and SPS.IsStatus = "Y"
				left join ' . $this->_table['code'] . ' as CPM
					on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"
			where OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
				and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '"';

        if ($prod_type === 'lecture') {
            // 온라인강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
				and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '"';
        } else {
            // 학원강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
				and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"';
        }

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 기간조회 조건 바인딩
        $search_start_date = $arr_search_date[0] . ' 00:00:00';
        $search_end_date = $arr_search_date[1] . ' 23:59:59';

        if ($is_count === true) {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];
            $query = $raw_query;
        } else {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date,
                $search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , TRUNCATE(RD.RealPayPrice * RD.ProdDivisionRate, 0) as DivisionPayPrice #C
                        , TRUNCATE(RD.RefundPrice * RD.ProdDivisionRate, 0) as DivisionRefundPrice #D
                        , TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0) as DivisionPgFeePrice #E                      
                        , TRUNCATE((TRUNCATE(RD.RealPayPrice * RD.ProdDivisionRate, 0) - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0) as DivisionCalcPayPrice #H1                        
                        , TRUNCATE(TRUNCATE(RD.RefundPrice * RD.ProdDivisionRate, 0) * RD.ProdCalcRate, 0) as DivisionCalcRefundPrice #H2
                        , (TRUNCATE((TRUNCATE(RD.RealPayPrice * RD.ProdDivisionRate, 0) - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0)
                            - TRUNCATE(TRUNCATE(RD.RefundPrice * RD.ProdDivisionRate, 0) * RD.ProdCalcRate, 0)) as DivisionCalcPrice #H=H1-H2
                    from (
                        select RR.*
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPayPrice
                            , ifnull(RR.DivisionSalePrice / RR.TotalSalePrice, 0) as ProdDivisionRate #B
                            , TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) as PgFeePrice #E1			 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U';

            if ($is_count !== 'tSum') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드 or 교수/과목별 합계 (=> 전체합계가 아닌 경우)
                $query .= '
                    left join ' . $this->_table['subject'] . ' as PSU		
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"';
            }

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $query .= '
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['course'] . ' as PCO		
                        on U.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['category'] . ' as SC
                        on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on U.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y"		
                    left join ' . $this->_table['code'] . ' as CLP
                        on U.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPT
                        on U.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"';

                if ($is_count === false) {
                    // 상세보기 주문목록 order by, offset, limit
                    $query .= ' order by U.OrderIdx desc';
                    is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                }
            } else {
                // 교수/과목별 합계 or 전체합계 group by, order by
                $query .= ' group by U.ProfIdx, U.SubjectIdx';
                $query .= ' order by tDivisionCalcPrice desc';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PgFee, PgFeePrice, PayStatusName, LgCateName, LearnPatternCcdName, ifnull(PackTypeCcdName, SalePatternCcdName) as ProdDetailTypeName
                , ProdCode, ProdName, CourseName, ProdCodeSub, ProdNameSub, SubjectName, wProfName, ProdDivisionRate, DivisionPayPrice, DivisionRefundPrice, DivisionPgFeePrice
                , ProdCalcPerc, DivisionCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 기간제패키지 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일,수강개월수]
     * @param bool|string $is_count [조회구분, sum : 교수/과목별합계, tSum : 전체합계, true : 주문목록 카운트, false : 주문목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcPeriodPack($prod_type, $arr_search_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        // 수강일수, 수강개월수 기본 컬럼
        $in_column = 'if(O.PayRouteCcd = "' . $this->_pay_route_ccd['admin_pay'] . '", ML.LecExpireDay, PL.StudyPeriod) as StudyPeriod
				, if(O.PayRouteCcd = "' . $this->_pay_route_ccd['admin_pay'] . '", if(ML.LecExpireDay < 30, 1, floor(ML.LecExpireDay / 30)), floor(PL.StudyPeriod / 30)) as StudyPeriodMonth';

        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $column = 'count(*) AS numrows';
        } else {
            $in_column .= '
                , if(O.CompleteDatm between ? and ?, OP.RealPayPrice, 0) as RealPayPrice
				, if(O.CompleteDatm between ? and ?, OP.CardPayPrice, 0) as CardPayPrice
				, if(OPR.RefundDatm between ? and ?, OPR.RefundPrice, 0) as RefundPrice
				, if(OPR.RefundDatm between ? and ?, OPR.CardRefundPrice, 0) as CardRefundPrice
				, left(PC.CateCode, 4) as LgCateCode
				, OPP.ProfIdx, OPP.SubjectIdx
				, (select count(0) from ' . $this->_table['order_product_prof_subject'] . ' where OrderProdIdx = OP.OrderProdIdx) as ProfSubjectCnt
				, (select concat(ContribRate, ":", CalcRate) 
					from ' . $this->_table['professor_calculate_rate'] . ' 
					where ProfIdx = OPP.ProfIdx 
						and LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '" 
						and O.CompleteDatm between ApplyStartDatm and ApplyEndDatm 
						and IsStatus = "Y" 
					order by ProfCalcIdx desc 
					limit 1) as ProfCalcData			
				, json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee                
            ';

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $in_column .= ', O.OrderIdx, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, O.CompleteDatm, OPR.RefundDatm as OriRefundDatm
                    , OP.OrderProdIdx, OP.ProdCode, OP.SalePatternCcd
                    , P.ProdName, PL.LearnPatternCcd, PL.PackTypeCcd';

                $column = 'U.*
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수/과목별 합계 or 전체합계
                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionMonthPrice) as tDivisionMonthPrice, sum(U.DivisionCalcPrice) as tDivisionCalcPrice                    
                    , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) as tDivisionIncomeTax          
                    , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tDivisionResidentTax    
                    , sum(U.DivisionCalcPrice) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, U.StudyPeriodMonth, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
			from (
                select RO.OrderIdx, ROP.OrderProdIdx
                from ' . $this->_table['order'] . ' as RO
                    inner join ' . $this->_table['order_product'] . ' as ROP
                        on RO.OrderIdx = ROP.OrderIdx
                where RO.CompleteDatm between ? and ?
                    and ROP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                    and ROP.RealPayPrice > 0
                union
                select OrderIdx, OrderProdIdx
                from ' . $this->_table['order_product_refund'] . '
                where RefundDatm between ? and ?	
                    and RefundPrice > 0			
            ) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on BO.OrderIdx = OP.OrderIdx and BO.OrderProdIdx = OP.OrderProdIdx
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
				inner join ' . $this->_table['product'] . ' as P
					on OP.ProdCode = P.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as PL
					on OP.ProdCode = PL.ProdCode
				left join ' . $this->_table['product_r_category'] . ' as PC
					on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
				inner join ' . $this->_table['order_product_prof_subject'] . ' as OPP
					on OP.OrderProdIdx = OPP.OrderProdIdx
				left join ' . $this->_table['my_lecture'] . ' as ML
					on O.OrderIdx = ML.OrderIdx and OP.OrderProdIdx = ML.OrderProdIdx and OP.ProdCode = ML.ProdCode and OP.ProdCode = ML.ProdCodeSub
					    and O.PayRouteCcd = "' . $this->_pay_route_ccd['admin_pay'] . '"					
				left join ' . $this->_table['code'] . ' as CPM
					on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"							
			where OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")';

        if ($prod_type === 'lecture') {
            // 온라인강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
				and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '"';
        } else {
            // 학원강좌
            $raw_query .= ' and P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
				and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '"';
        }

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 수강개월수 where 조건
        $raw_where = '';
        if (empty(element('2', $arr_search_date)) === false) {
            $raw_where = ' where RR.StudyPeriodMonth = ' . $this->_conn->escape($arr_search_date[2]);
        }

        // 기간조회 조건 바인딩
        $search_start_date = $arr_search_date[0] . ' 00:00:00';
        $search_end_date = $arr_search_date[1] . ' 23:59:59';

        if ($is_count === true) {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];
            $query = 'select ' . $column . ' from (' . $raw_query . ') as RR' . $raw_where;
        } else {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date,
                $search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*             
                        , concat(RD.ProdContribRate * 100, "%") as ProdContribPerc
                        , concat(RD.ProdCalcRate * 100, "%") as ProdCalcPerc                               
                        , TRUNCATE(RD.RealPayPrice * RD.ProdContribRate, 0) as DivisionPayPrice #C
                        , TRUNCATE(RD.RefundPrice * RD.ProdContribRate, 0) as DivisionRefundPrice #D
                        , TRUNCATE(RD.PgFeePrice * RD.ProdContribRate, 0) as DivisionPgFeePrice #E                      
                        , TRUNCATE((
                            TRUNCATE(RD.RealPayPrice * RD.ProdContribRate, 0) - 
                            TRUNCATE(RD.RefundPrice * RD.ProdContribRate, 0) - 
                            TRUNCATE(RD.PgFeePrice * RD.ProdContribRate, 0)
                            ) / RD.StudyPeriodMonth, 0) as DivisionMonthPrice #F	
                        , TRUNCATE(TRUNCATE((
                            TRUNCATE(RD.RealPayPrice * RD.ProdContribRate, 0) - 
                            TRUNCATE(RD.RefundPrice * RD.ProdContribRate, 0) - 
                            TRUNCATE(RD.PgFeePrice * RD.ProdContribRate, 0)
                            ) / RD.StudyPeriodMonth, 0) * RD.ProdCalcRate, 0) as DivisionCalcPrice #H                                                                               		
                    from (
                        select RR.*                
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPayPrice            
                            , if(RR.LgCateCode = "3002", 1 / RR.ProfSubjectCnt, fn_split(RR.ProfCalcData, ":", 1) / 100) as ProdContribRate
                            , (fn_split(RR.ProfCalcData, ":", 2) / 100) as ProdCalcRate
                            , TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) as PgFeePrice #E1                            		 
                        from ('
                            . $raw_query . '
                        ) as RR'
                        . $raw_where . '
                    ) as RD
                ) as U';

            if ($is_count !== 'tSum') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드 or 교수/과목별 합계 (=> 전체합계가 아닌 경우)
                $query .= '
                    left join ' . $this->_table['subject'] . ' as PSU		
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"';
            }

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $query .= '
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['category'] . ' as SC
                        on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"	
                    left join ' . $this->_table['code'] . ' as CLP
                        on U.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPT
                        on U.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"';

                if ($is_count === false) {
                    // 상세보기 주문목록 order by, offset, limit
                    $query .= ' order by U.OrderIdx desc';
                    is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                }
            } else {
                // 교수/과목별 합계 or 전체합계 group by, order by
                $query .= ' group by U.ProfIdx, U.SubjectIdx, U.StudyPeriodMonth';
                //$query .= ' order by tDivisionCalcPrice desc';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PgFee, PgFeePrice, PayStatusName, LgCateName, LearnPatternCcdName, PackTypeCcdName, ProdCode, ProdName
                , StudyPeriodMonth, SubjectName, wProfName, ProdContribPerc, DivisionPayPrice, DivisionRefundPrice, DivisionPgFeePrice
                , DivisionMonthPrice, ProdCalcPerc, DivisionCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 학원강좌 개강일/종강일 기준 강사료 정산 조회 (학원강좌 전용)
     * @param int $prof_idx [교수식별자]
     * @param string $study_date_type [개강일, 종강일 구분 (StudyStartDate, StudyEndDate)
     * @param string $study_start_date [시작일자]
     * @param string $study_end_date [종료일자]
     * @param bool|string $is_count [조회구분, sum : 교수/상품별합계, tSum : 주문목록합계, true : 주문목록 카운트, false : 주문목록, excel : 주문목록 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcOffLecture($prof_idx, $study_date_type, $study_start_date, $study_end_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            // 기본 로우 컬럼
            $in_column = 'TA.ProfIdx, TA.ProdCode, TA.ProdName, TA.ProdCodeSub, TA.ProdNameSub, TA.SiteCode
				, TA.LearnPatternCcd, TA.PackTypeCcd, TA.CampusCcd
				, TA.StudyStartDate, TA.StudyEndDate, TA.CourseIdx, TA.SubjectIdx
				, if(TA.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", ifnull(
					TA.ProdSalePrice / 
					(select sum(B.SalePrice) 
						from ' . $this->_table['order_sub_product'] . ' as A 
							inner join ' . $this->_table['product_sale'] . ' as B 
								on A.ProdCodeSub = B.ProdCode and B.SaleTypeCcd = "613001" and B.IsStatus = "Y" 
						where A.OrderProdIdx = OP.OrderProdIdx)
				  , 0), TA.ProdDivisionRate) as ProdDivisionRate 
				, (TA.ProdCalcRate / 100) as ProdCalcRate, concat(TA.ProdCalcRate, "%") as ProdCalcPerc
				, OP.RealPayPrice, OP.CardPayPrice, ifnull(OPR.RefundPrice, 0) as RefundPrice, ifnull(OPR.CardRefundPrice, 0) as CardRefundPrice
				, O.OrderIdx, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd
				, OP.OrderProdIdx, OP.SalePatternCcd, OP.PayStatusCcd
				, O.CompleteDatm, OPR.RefundDatm
				, left(PC.CateCode, 4) as LgCateCode
				, json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee';

            if ($is_count === false || $is_count === 'excel') {
                $column = 'U.*
	                , WPF.wProfName
                    , M.MemId, M.MemName
                    , PCO.CourseName, PSU.SubjectName, SC.CateName as LgCateName
                    , CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CPS.CcdName as PayStatusCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수식별자, 상품코드별 합계
                $column = 'U.ProfIdx';

                if ($is_count == 'sum') {
                    $column .= ', U.ProdCode, U.ProdCodeSub
                        , WPF.wProfName 
                        , fn_ccd_name(max(U.LearnPatternCcd)) as LearnPatternCcdName
                        , if(U.ProdCode = U.ProdCodeSub, "", fn_ccd_name(max(U.PackTypeCcd))) as PackTypeCcdName
                        , fn_ccd_name(max(U.CampusCcd)) as CampusCcdName
                        , if(U.ProdCode = U.ProdCodeSub, "", max(U.ProdName)) as ProdName
                        , max(U.ProdNameSub) as ProdNameSub
                        , max(U.StudyStartDate) as StudyStartDate
                        , max(U.StudyEndDate) as StudyEndDate';
                }

                $column .= ', sum(if(U.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tRemainPayCnt
                    , sum(U.RealPayPrice) as tRealPayPrice
                    , sum(U.RefundPrice) as tRefundPrice
                    , sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice
                    , sum(U.DivisionRefundPrice) as tDivisionRefundPrice
                    , sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionRemainPrice) as tDivisionRemainPrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice
                    , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) as tDivisionIncomeTax
                    , TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tDivisionResidentTax
                    , sum(U.DivisionCalcPrice) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcPrice) * ' . $this->_re_tax_rate . ', 0) as tFinalCalcPrice
                ';
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
            from (
				select PD.ProfIdx, P.ProdCode, P.ProdCode as ProdCodeSub, P.ProdName, P.ProdName as ProdNameSub, P.SiteCode
					, PL.LearnPatternCcd, PL.PackTypeCcd, PL.CampusCcd
					, PL.StudyStartDate, PL.StudyEndDate, PL.CourseIdx, PL.SubjectIdx 
					, PD.ProdDivisionRate
					, PD.ProdCalcRate
					, null as ProdSalePrice
				from ' . $this->_table['product'] . ' as P
					inner join ' . $this->_table['product_lecture'] . ' as PL
						on PL.ProdCode = P.ProdCode
					inner join ' . $this->_table['product_division'] . ' as PD
						on PD.ProdCode = P.ProdCode and PD.ProdCodeSub = P.ProdCode and PD.IsStatus = "Y"
				where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
					and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '"
					and PD.ProfIdx = ?
					and `PL`.`'. $study_date_type .'` between ? and ?
				union all
				select SPD.ProfIdx, P.ProdCode, PRS.ProdCodeSub, P.ProdName, SP.ProdName as ProdNameSub, P.SiteCode
					, PL.LearnPatternCcd, PL.PackTypeCcd, PL.CampusCcd
					, SPL.StudyStartDate, SPL.StudyEndDate, SPL.CourseIdx, SPL.SubjectIdx
					, if(PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '", ifnull(PD.ProdDivisionRate, 0), null) as ProdDivisionRate
					, if(PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '", ifnull(PD.ProdCalcRate, 0), SPD.ProdCalcRate) as ProdCalcRate
					, if(PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", SPS.SalePrice * SPD.ProdDivisionRate, null) as ProdSalePrice
				from ' . $this->_table['product'] . ' as P
					inner join ' . $this->_table['product_lecture'] . ' as PL
						on PL.ProdCode = P.ProdCode
					inner join ' . $this->_table['product_r_sublecture'] . ' as PRS
						on PRS.ProdCode = P.ProdCode and PRS.IsStatus = "Y"
					left join ' . $this->_table['product_division'] . ' as PD
						on PD.ProdCode = P.ProdCode and PD.ProdCodeSub = PRS.ProdCodeSub and PD.IsStatus = "Y"
					inner join ' . $this->_table['product'] . ' as SP
						on SP.ProdCode = PRS.ProdCodeSub
					inner join ' . $this->_table['product_lecture'] . ' as SPL
						on SPL.ProdCode = SP.ProdCode
					inner join ' . $this->_table['product_division'] . ' as SPD
						on SPD.ProdCode = SP.ProdCode and SPD.ProdCodeSub = SP.ProdCode and SPD.IsStatus = "Y"
					left join ' . $this->_table['product_sale'] . ' as SPS
						on SPS.ProdCode = SP.ProdCode and SPS.SaleTypeCcd = "613001" and SPS.IsStatus = "Y" and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '"
				where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
					and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"
					and SPD.ProfIdx = ?
					and `SPL`.`'. $study_date_type .'` between ? and ?       
            ) as TA
				inner join ' . $this->_table['order_product'] . ' as OP
					on OP.ProdCode = TA.ProdCode
				inner join ' . $this->_table['order'] . ' as O
					on OP.OrderIdx = O.OrderIdx		
				left join ' . $this->_table['order_sub_product'] . ' as OSP
					on OSP.OrderProdIdx = OP.OrderProdIdx and OSP.ProdCodeSub = TA.ProdCodeSub
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
				left join ' . $this->_table['product_r_category'] . ' as PC
					on PC.ProdCode = TA.ProdCode and PC.IsStatus = "Y"				
				left join ' . $this->_table['code'] . ' as CPM
					on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"		            
			where OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
			    and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['free'] . '")
				and (TA.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '" or (TA.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" and OSP.ProdCodeSub is not null))                            
        ';

        // 교수식별자, 조회일자 바인딩
        $raw_binds = [$prof_idx, $study_start_date, $study_end_date, $prof_idx, $study_start_date, $study_end_date];

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 최종 쿼리
        if ($is_count === true) {
            $query = $raw_query;
        } else {
            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , (RD.DivisionPayPrice - RD.DivisionRefundPrice) as DivisionRemainPrice
                        , TRUNCATE((RD.DivisionPayPrice - RD.DivisionRefundPrice - RD.DivisionPgFeePrice) * RD.ProdCalcRate, 0) as DivisionCalcPrice
                    from (
                        select RR.* 
                            , RR.RealPayPrice - RR.RefundPrice as RemainPrice
                            , TRUNCATE(RR.RealPayPrice * RR.ProdDivisionRate, 0) as DivisionPayPrice
                            , TRUNCATE(RR.RefundPrice * RR.ProdDivisionRate, 0) as DivisionRefundPrice
                            , TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) as PgFeePrice
                            , TRUNCATE(TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) * RR.ProdDivisionRate, 0) as DivisionPgFeePrice			 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"            
            ';

            if ($is_count === false || $is_count === 'excel') {
                // 주문목록
                $query .= '
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['course'] . ' as PCO
                        on U.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"	
                    left join ' . $this->_table['category'] . ' as SC
                        on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"        
                    left join ' . $this->_table['code'] . ' as CPS
                        on U.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y"                
                    left join ' . $this->_table['code'] . ' as CLP
                        on U.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPT
                        on U.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"                                                  	                    
                ';

                if ($is_count === false) {
                    $query .= ' order by U.OrderIdx desc';
                    is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                }
            } else {
                if ($is_count == 'sum') {
                    $query .= ' group by U.ProfIdx, U.ProdCode, U.ProdCodeSub';
                    $query .= ' order by tDivisionCalcPrice desc';
                }
            }
        }

        // 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PgFee, PgFeePrice, PayStatusCcdName, LgCateName, LearnPatternCcdName, PackTypeCcdName, ProdCode, ProdName
                , CourseName, ProdCodeSub, ProdNameSub, SubjectName, wProfName, ProdDivisionRate, DivisionPayPrice, DivisionRefundPrice, DivisionRemainPrice, DivisionPgFeePrice
                , ProdCalcPerc, DivisionCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 모의고사 강사료 정산 조회
     * @param string $prod_type [상품구분값, mockTest (고정값)]
     * @param array $arr_search_date [결제시작일,종료일]
     * @param bool|string $is_count [조회구분, sum : 교수/과목별합계, tSum : 전체합계, true : 주문목록 카운트, false : 주문목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcMockTest($prod_type, $arr_search_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = 'if(O.CompleteDatm between ? and ?, OP.RealPayPrice, 0) as RealPayPrice
                , if(O.CompleteDatm between ? and ?, OP.CardPayPrice, 0) as CardPayPrice
                , if(OPR.RefundDatm between ? and ?, OPR.RefundPrice, 0) as RefundPrice
                , if(OPR.RefundDatm between ? and ?, OPR.CardRefundPrice, 0) as CardRefundPrice
                , MRP.SubjectIdx, MP.ProfIdx
                , ifnull(1 / (select count(0) from ' . $this->_table['mock_register_r_paper'] . ' where MrIdx = MR.MrIdx), 0) as ProdDivisionRate
                , (select CalcRate 
					from ' . $this->_table['professor_calculate_rate'] . ' 
					where ProfIdx = MP.ProfIdx
						and LearnPatternCcd = "' . $this->_prod_type_ccd['mock_exam'] . '" 
						and O.CompleteDatm between ApplyStartDatm and ApplyEndDatm 
						and IsStatus = "Y" 
					order by ProfCalcIdx desc 
					limit 1) as ProfCalcData                               
                , json_value(CPM.CcdEtc, if(O.PgCcd != "", concat("$.fee.", O.PgCcd), "$.fee")) as PgFee';

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $in_column .= ', O.OrderIdx, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, O.CompleteDatm, OPR.RefundDatm as OriRefundDatm
				    , OP.OrderProdIdx, OP.ProdCode, OP.SalePatternCcd
				    , P.ProdName, left(PC.CateCode, 4) as LgCateCode';

                $column = 'U.*
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName';
            } else {
                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice, sum(U.DivisionCalcPayPrice) as tDivisionCalcPayPrice, sum(U.DivisionCalcRefundPrice) as tDivisionCalcRefundPrice
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)) as tDivisionIncomeTax
                    , (TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0) - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0)) as tDivisionResidentTax
                    , ((sum(U.DivisionCalcPayPrice)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcPayPrice) * ' . $this->_re_tax_rate . ', 0))
                        - (sum(U.DivisionCalcRefundPrice)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_in_tax_rate . ', 0)
                        - TRUNCATE(sum(U.DivisionCalcRefundPrice) * ' . $this->_re_tax_rate . ', 0))) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
            from (
                select RO.OrderIdx, ROP.OrderProdIdx
                from ' . $this->_table['order'] . ' as RO
                    inner join ' . $this->_table['order_product'] . ' as ROP
                        on RO.OrderIdx = ROP.OrderIdx
                where RO.CompleteDatm between ? and ?
                    and ROP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                    and ROP.RealPayPrice > 0
                union
                select OrderIdx, OrderProdIdx
                from ' . $this->_table['order_product_refund'] . '
                where RefundDatm between ? and ?	
                    and RefundPrice > 0					
            ) as BO
                inner join ' . $this->_table['order'] . ' as O
                    on BO.OrderIdx = O.OrderIdx
                inner join ' . $this->_table['order_product'] . ' as OP
                    on BO.OrderIdx = OP.OrderIdx and BO.OrderProdIdx = OP.OrderProdIdx
                left join ' . $this->_table['order_product_refund'] . ' as OPR
                    on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                inner join ' . $this->_table['product'] . ' as P
                    on OP.ProdCode = P.ProdCode
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on OP.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                inner join ' . $this->_table['mock_register'] . ' as MR
                    on BO.OrderProdIdx = MR.OrderProdIdx and MR.IsStatus = "Y"
                inner join ' . $this->_table['mock_register_r_paper'] . ' as MRP
                    on MR.MrIdx = MRP.MrIdx
                inner join ' . $this->_table['mock_paper'] . ' as MP
                    on MRP.MpIdx = MP.MpIdx and MP.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CPM
                    on O.PayMethodCcd = CPM.Ccd and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '" and CPM.IsStatus = "Y"
            where OP.RealPayPrice > 0
                and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")				
                and P.ProdTypeCcd = "' . $this->_prod_type_ccd['mock_exam'] . '"';

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // 기간조회 조건 바인딩
        $search_start_date = $arr_search_date[0] . ' 00:00:00';
        $search_end_date = $arr_search_date[1] . ' 23:59:59';

        if ($is_count === true) {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];
            $query = $raw_query;
        } else {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date,
                $search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0) as DivisionPgFeePrice #E
                        , TRUNCATE((RD.DivisionPayPrice - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0) as DivisionCalcPayPrice #H1
                        , TRUNCATE(RD.DivisionRefundPrice * RD.ProdCalcRate, 0) as DivisionCalcRefundPrice #H2
                        , (TRUNCATE((RD.DivisionPayPrice - TRUNCATE(RD.PgFeePrice * RD.ProdDivisionRate, 0)) * RD.ProdCalcRate, 0) 
                            - TRUNCATE(RD.DivisionRefundPrice * RD.ProdCalcRate, 0)) as DivisionCalcPrice #H=H1-H2
                    from (
                        select RR.*
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPayPrice
                            , TRUNCATE(RR.RealPayPrice * RR.ProdDivisionRate, 0) as DivisionPayPrice #C
                            , TRUNCATE(RR.RefundPrice * RR.ProdDivisionRate, 0) as DivisionRefundPrice #D
                            , TRUNCATE(if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, (RR.CardPayPrice - RR.CardRefundPrice) * RR.PgFee, RR.PgFee), 0), 0) as PgFeePrice #E1	
                            , (RR.ProfCalcData / 100) as ProdCalcRate
                            , concat(RR.ProfCalcData, "%") as ProdCalcPerc                                		 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U';

            if ($is_count !== 'tSum') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드 or 교수/과목별 합계 (=> 전체합계가 아닌 경우)
                $query .= '
                    left join ' . $this->_table['subject'] . ' as PSU		
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"';
            }

            if ($is_count === false || $is_count === 'excel') {
                // 상세보기 주문목록 or 상세보기 주문목록 엑셀다운로드
                $query .= '
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['category'] . ' as SC
                        on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"';

                if ($is_count === false) {
                    // 상세보기 주문목록 order by, offset, limit
                    $query .= ' order by U.OrderIdx desc';
                    is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
                }
            } else {
                // 교수/과목별 합계 or 전체합계 group by, order by
                $query .= ' group by U.ProfIdx, U.SubjectIdx';
                $query .= ' order by tDivisionCalcPrice desc';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PgFee, PgFeePrice, PayStatusName, LgCateName, ProdCode, ProdName, SubjectName, wProfName
                , ProdDivisionRate, DivisionPayPrice, DivisionRefundPrice, DivisionPgFeePrice, ProdCalcPerc, DivisionCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }
}
