<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderCalcModel extends BaseOrderModel
{
    private $_in_tax_rate = 0.03;   // 소득세
    private $_re_tax_rate = 0.03 * 0.1;    // 주민세

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 단강좌&사용자/운영자패키지(일반형) 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일]
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
                    , (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as DivisionIncomeTax #I
                    , (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as DivisionResidentTax #J
                    , (U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')) as FinalCalcPrice
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PCO.CourseName, PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CSP.CcdName as SalePatternCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수/과목별 합계 or 전체합계
                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice
                    , sum(U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as tDivisionIncomeTax, sum(U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as tDivisionResidentTax
                    , TRUNCATE(sum(U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')), 0) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        // 결제완료일, 환불완료일 조건 => union으로 대체 (and (O.CompleteDatm between ? and ? or OPR.RefundDatm between ? and ?))
        $raw_query = '
            select ' . $in_column . '
			from (
					select OrderIdx
					from ' . $this->_table['order'] . '
					where CompleteDatm between ? and ?
					union
					select OrderIdx
					from ' . $this->_table['order_product_refund'] . '
					where RefundDatm between ? and ?			
			    ) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on O.OrderIdx = OP.OrderIdx
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
                $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , (RD.PgFeePrice * RD.ProdDivisionRate) as DivisionPgFeePrice #D		
                        , ((RD.DivisionPayPrice - RD.DivisionRefundPrice - (RD.PgFeePrice * RD.ProdDivisionRate)) * RD.ProdCalcRate) as DivisionCalcPrice #H		
                    from (
                        select RR.*
                            , (RR.RealPayPrice * RR.ProdDivisionRate) as DivisionPayPrice #C
                            , (RR.RefundPrice * RR.ProdDivisionRate) as DivisionRefundPrice #E
                            , if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, RR.CardPayPrice * RR.PgFee, RR.PgFee), 0) as PgFeePrice #D1			 
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
                // 교수/과목별 합계 or 전체합계 group by
                $query .= ' group by U.ProfIdx, U.SubjectIdx';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, PgFee, PgFeePrice, left(CompleteDatm, 10) as CompleteDate
                , RefundPrice, left(RefundDatm, 10) as RefundDate, PayStatusName, LgCateName, LearnPatternCcdName, ifnull(PackTypeCcdName, SalePatternCcdName) as ProdDetailTypeName
                , ProdCode, ProdName, CourseName, ProdCodeSub, ProdNameSub, SubjectName, wProfName, ProdDivisionRate, DivisionPayPrice, DivisionPgFeePrice, DivisionRefundPrice
                , ProdCalcPerc, DivisionCalcPrice, DivisionIncomeTax, DivisionResidentTax, FinalCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 운영자패키지(선택형) 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일]
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
                    , (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as DivisionIncomeTax #I
                    , (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as DivisionResidentTax #J
                    , (U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')) as FinalCalcPrice
                    , if(U.RefundPrice > 0, U.OriRefundDatm, null) as RefundDatm
                    , if(U.RefundPrice > 0, "환불완료", "결제완료") as PayStatusName
                    , M.MemId, M.MemName
                    , PCO.CourseName, PSU.SubjectName, WPF.wProfName
                    , SC.CateName as LgCateName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName, CSP.CcdName as SalePatternCcdName
                    , CLP.CcdName as LearnPatternCcdName, CPT.CcdName as PackTypeCcdName';
            } else {
                // 교수/과목별 합계 or 전체합계
                $column = 'sum(U.RealPayPrice) as tRealPayPrice, sum(U.RefundPrice) as tRefundPrice, sum(U.PgFeePrice) as tPgFeePrice                
                    , sum(U.DivisionPayPrice) as tDivisionPayPrice, sum(U.DivisionRefundPrice) as tDivisionRefundPrice, sum(U.DivisionPgFeePrice) as tDivisionPgFeePrice
                    , sum(U.DivisionCalcPrice) as tDivisionCalcPrice
                    , sum(U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as tDivisionIncomeTax, sum(U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as tDivisionResidentTax
                    , TRUNCATE(sum(U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')), 0) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        // 결제완료일, 환불완료일 조건 => union으로 대체 (and (O.CompleteDatm between ? and ? or OPR.RefundDatm between ? and ?))
        $raw_query = '
            select ' . $in_column . '
			from (
					select OrderIdx
					from ' . $this->_table['order'] . '
					where CompleteDatm between ? and ?
					union
					select OrderIdx
					from ' . $this->_table['order_product_refund'] . '
					where RefundDatm between ? and ?				 
			    ) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on O.OrderIdx = OP.OrderIdx
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
                $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , (RD.RealPayPrice * RD.ProdDivisionRate) as DivisionPayPrice #C
                        , (RD.RefundPrice * RD.ProdDivisionRate) as DivisionRefundPrice #E
                        , (RD.PgFeePrice * RD.ProdDivisionRate) as DivisionPgFeePrice #D
                        , (((RD.RealPayPrice * RD.ProdDivisionRate) - (RD.RefundPrice * RD.ProdDivisionRate) - (RD.PgFeePrice * RD.ProdDivisionRate)) * RD.ProdCalcRate) as DivisionCalcPrice #H		
                    from (
                        select RR.*
                            , (RR.DivisionSalePrice / RR.TotalSalePrice) as ProdDivisionRate #B
                            , if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, RR.CardPayPrice * RR.PgFee, RR.PgFee), 0) as PgFeePrice #D1			 
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
                // 교수/과목별 합계 or 전체합계 group by
                $query .= ' group by U.ProfIdx, U.SubjectIdx';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, PgFee, PgFeePrice, left(CompleteDatm, 10) as CompleteDate
                , RefundPrice, left(RefundDatm, 10) as RefundDate, PayStatusName, LgCateName, LearnPatternCcdName, ifnull(PackTypeCcdName, SalePatternCcdName) as ProdDetailTypeName
                , ProdCode, ProdName, CourseName, ProdCodeSub, ProdNameSub, SubjectName, wProfName, ProdDivisionRate, DivisionPayPrice, DivisionPgFeePrice, DivisionRefundPrice
                , ProdCalcPerc, DivisionCalcPrice, DivisionIncomeTax, DivisionResidentTax, FinalCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 기간제패키지 강사료 정산 조회
     * @param string $prod_type [온라인/학원 구분, lecture/offLecture]
     * @param array $arr_search_date [결제시작일,종료일]
     * @param bool|string $is_count [조회구분, sum : 교수/과목별합계, tSum : 전체합계, true : 주문목록 카운트, false : 주문목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCalcPeriodPack($prod_type, $arr_search_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 상세보기 주문목록 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = 'if(O.CompleteDatm between ? and ?, OP.RealPayPrice, 0) as RealPayPrice
				, if(O.CompleteDatm between ? and ?, OP.CardPayPrice, 0) as CardPayPrice
				, if(OPR.RefundDatm between ? and ?, OPR.RefundPrice, 0) as RefundPrice
				, PL.StudyPeriod, floor(PL.StudyPeriod / 30) as StudyPeriodMonth
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
                    , (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as DivisionIncomeTax #I
                    , (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as DivisionResidentTax #J
                    , (U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')) as FinalCalcPrice
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
                    , sum(U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') as tDivisionIncomeTax, sum(U.DivisionCalcPrice * ' . $this->_re_tax_rate . ') as tDivisionResidentTax
                    , TRUNCATE(sum(U.DivisionCalcPrice - (U.DivisionCalcPrice * ' . $this->_in_tax_rate . ') - (U.DivisionCalcPrice * ' . $this->_re_tax_rate . ')), 0) as tFinalCalcPrice';

                if ($is_count === 'sum') {
                    // 교수/과목별 합계일 경우만 (전체합계가 아닌 경우)
                    $column .= ', U.ProfIdx, U.SubjectIdx, U.StudyPeriodMonth, max(U.StudyPeriod) as StudyPeriod, PSU.SubjectName, WPF.wProfName';
                }
            }
        }

        // 조회 로우 from 쿼리
        // 결제완료일, 환불완료일 조건 => union으로 대체 (and (O.CompleteDatm between ? and ? or OPR.RefundDatm between ? and ?))
        $raw_query = '
            select ' . $in_column . '
			from (
					select OrderIdx
					from ' . $this->_table['order'] . '
					where CompleteDatm between ? and ?
					union
					select OrderIdx
					from ' . $this->_table['order_product_refund'] . '
					where RefundDatm between ? and ?				
			    ) as BO
			    inner join ' . $this->_table['order'] . ' as O
			        on BO.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on O.OrderIdx = OP.OrderIdx
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

        // 기간조회 조건 바인딩
        $search_start_date = $arr_search_date[0] . ' 00:00:00';
        $search_end_date = $arr_search_date[1] . ' 23:59:59';

        if ($is_count === true) {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date];
            $query = $raw_query;
        } else {
            $raw_binds = [$search_start_date, $search_end_date, $search_start_date, $search_end_date, $search_start_date, $search_end_date,
                $search_start_date, $search_end_date, $search_start_date, $search_end_date];

            $query = 'select ' . $column . '
                from (
                    select RD.*             
                        , concat(RD.ProdContribRate * 100, "%") as ProdContribPerc
                        , concat(RD.ProdCalcRate * 100, "%") as ProdCalcPerc                               
                        , (RD.RealPayPrice * RD.ProdContribRate) as DivisionPayPrice #C
                        , (RD.RefundPrice * RD.ProdContribRate) as DivisionRefundPrice #E
                        , (RD.PgFeePrice * RD.ProdContribRate) as DivisionPgFeePrice #D
                        , (((RD.RealPayPrice * RD.ProdContribRate) - (RD.RefundPrice * RD.ProdContribRate) - (RD.PgFeePrice * RD.ProdContribRate)) / RD.StudyPeriodMonth) as DivisionMonthPrice #F	
                        , ((((RD.RealPayPrice * RD.ProdContribRate) - (RD.RefundPrice * RD.ProdContribRate) - (RD.PgFeePrice * RD.ProdContribRate)) / RD.StudyPeriodMonth) * RD.ProdCalcRate) as DivisionCalcPrice #H                        		
                    from (
                        select RR.*                            
                            , if(RR.LgCateCode = "3002", 1 / RR.ProfSubjectCnt, fn_split(RR.ProfCalcData, ":", 1) / 100) as ProdContribRate
                            , (fn_split(RR.ProfCalcData, ":", 2) / 100) as ProdCalcRate
                            , if(RR.RealPayPrice > RR.RefundPrice, if(RR.PgFee < 1, RR.CardPayPrice * RR.PgFee, RR.PgFee), 0) as PgFeePrice #D1                            		 
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
                // 교수/과목별 합계 or 전체합계 group by
                $query .= ' group by U.ProfIdx, U.SubjectIdx, U.StudyPeriodMonth';
            }
        }

        // 상세보기 주문목록 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, RealPayPrice, PgFee, PgFeePrice, left(CompleteDatm, 10) as CompleteDate
                , RefundPrice, left(RefundDatm, 10) as RefundDate, PayStatusName, LgCateName, LearnPatternCcdName, PackTypeCcdName, ProdCode, ProdName
                , StudyPeriodMonth, SubjectName, wProfName, ProdContribPerc, DivisionPayPrice, DivisionPgFeePrice, DivisionRefundPrice
                , DivisionMonthPrice, ProdCalcPerc, DivisionCalcPrice, DivisionIncomeTax, DivisionResidentTax, FinalCalcPrice';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }
}
