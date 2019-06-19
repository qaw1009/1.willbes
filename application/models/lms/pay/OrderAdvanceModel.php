<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderAdvanceModel extends BaseOrderModel
{
    private $_pp_division_rate = 1;   // 기간제패키지 안분율
    private $_pp_calc_rate = 30;    // 기간제패키지 정산율

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 온라인강좌 선수금 조회 (환불주문건은 잔여일수, 잔여금액 => 0, 부분환불주문건의 사용금액은 환불일 당일 잔여금액, 환불일 이후 0원)
     * TODO : lms_my_lecture > IX_lms_My_Lecture_LecEndDate (LecEndDate) 인덱스 삭제 또는 명칭 변경 불가 (인덱스 강제적용)
     * @param string $base_date [기준일자]
     * @param bool|string $is_count [조회구분, true : 카운트, false : 목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listAdvanceLecture($base_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = '? as BaseDate 
				, ML.OrderIdx, ML.OrderProdIdx, ML.ProdCode, ML.ProdCodeSub, ML.LecStartDate, ML.LecEndDate, ML.RealLecEndDate
				, datediff(ML.LecEndDate, ML.LecStartDate) + 1 as LecExpireDay  #, ML.LecExpireDay
				, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, OP.SalePatternCcd, O.CompleteDatm
				, if(OPR.RefundDatm <= ?, OPR.RefundDatm, null) as RefundDatm
				, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RealPayPrice, OP.RealPayPrice) as RealPayPrice		
				, if(OPR.RefundDatm <= ?, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", OSP.RefundPrice, OPR.RefundPrice), 0) as RefundPrice					
				, P.ProdName, PL.LearnPatternCcd, PL.PackTypeCcd
				, SP.ProdName as ProdNameSub
				, ifnull(PD.ProfIdx, SPD.ProfIdx) as ProfIdx
				, ifnull(PD.ProdDivisionRate, SPD.ProdDivisionRate) as OriProdDivisionRate
				, ifnull(PD.ProdCalcRate, SPD.ProdCalcRate) as OriProdCalcRate
				, SPS.SalePrice
				, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", (
					select sum(B.SalePrice)
					from ' . $this->_table['order_sub_product'] . ' as A 
						inner join ' . $this->_table['product_sale'] . ' as B
							on A.ProdCodeSub = B.ProdCode and B.SaleTypeCcd = "613001" and B.IsStatus = "Y" 
					where A.OrderProdIdx = ML.OrderProdIdx			
				  ), null) as TotalSalePrice		
				, (select sum(ExtenDay) 
					from ' . $this->_table['lecture_extend'] . ' 
					where TargetOrderIdx = ML.OrderIdx and TargetProdCode = ML.ProdCode
						and TargetProdCodeSub = if(PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '"), ML.ProdCodeSub, 0)
				  ) as tExtenDays	
				, (select sum(PauseDays)
					from ' . $this->_table['lecture_pause_history'] . ' 
					where OrderIdx = ML.OrderIdx and OrderProdIdx = ML.OrderProdIdx and ProdCode = ML.ProdCode
						and ProdCodeSub = if(PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '"), ML.ProdCodeSub, 0)				
						and IsDel = "N"
				  ) as tPauseDays			  
				, (select concat("[", group_concat(JSON_OBJECT("PausePeriod", concat(PauseStartDate, "~", PauseEndDate), "PauseDays", PauseDays)), "]")
					from ' . $this->_table['lecture_pause_history'] . ' 
					where OrderIdx = ML.OrderIdx and OrderProdIdx = ML.OrderProdIdx and ProdCode = ML.ProdCode
						and ProdCodeSub = if(PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '"), ML.ProdCodeSub, 0)
						and IsDel = "N"
				  ) as tPauseData
				, (select PauseEndDate
					from ' . $this->_table['lecture_pause_history'] . ' 
					where OrderIdx = ML.OrderIdx and OrderProdIdx = ML.OrderProdIdx and ProdCode = ML.ProdCode
						and ProdCodeSub = if(PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '"), ML.ProdCodeSub, 0)
						and IsDel = "N"
						and PauseStartDate <= ?
					order by PauseEndDate desc limit 1				
				  ) as LastPauseEndDate';

            $column = 'U.*
                , round(U.DivisionPayPrice * (U.ProdCalcRate / 100)) as DivisionCalcPrice
                , round((U.DivisionPayPrice / U.LecExpireDay) * U.LecRemainDay) as DivisionRemainPrice
                , (select case
                    when U.RefundDatm is not null and date_format(U.RefundDatm, "%Y-%m-%d") != U.BaseDate then 0 
                    else (U.DivisionPayPrice - round((U.DivisionPayPrice / U.LecExpireDay) * U.LecRemainDay))
                  end) as DivisionUsePrice                                
                , json_value(U.tPauseData, "$[0].PausePeriod") as LecPausePeriod1
                , json_value(U.tPauseData, "$[1].PausePeriod") as LecPausePeriod2
                , json_value(U.tPauseData, "$[2].PausePeriod") as LecPausePeriod3	
                , if(U.RefundDatm is not null, "환불완료", "결제완료") as PayStatusName
                , (select case
                    when U.RefundDatm is not null then "환불완료"
                    when U.LecStartDate > U.BaseDate then "수강대기"
                    when U.LecStartDate <= U.BaseDate and (U.LastPauseEndDate is null or U.LastPauseEndDate < U.BaseDate) then "수강중"
                    when U.LecStartDate <= U.BaseDate and U.LastPauseEndDate >= U.BaseDate then "일시정지"
                  end) as StudyStatusName	
                , M.MemId, M.MemName
                , WPF.wProfName
                , CPR.CcdName as PayRouteCcdName
                , CPM.CcdName as PayMethodCcdName
                , CSP.CcdName as SalePatternCcdName
                , CLP.CcdName as LearnPatternCcdName
                , CPT.CcdName as PackTypeCcdName';
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
			from ' . $this->_table['my_lecture'] . ' as ML force index (IX_lms_My_Lecture_LecEndDate)   # 인덱스 강제 적용
				inner join ' . $this->_table['order'] . ' as O
					on ML.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on ML.OrderIdx = O.OrderIdx and ML.OrderProdIdx = OP.OrderProdIdx and ML.ProdCode = OP.ProdCode
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on ML.OrderIdx = OPR.OrderIdx and ML.OrderProdIdx = OPR.OrderProdIdx		
				left join ' . $this->_table['order_sub_product'] . ' as OSP
					on ML.OrderProdIdx = OSP.OrderProdIdx and ML.ProdCodeSub = OSP.ProdCodeSub
				inner join ' . $this->_table['product'] . ' as P
					on ML.ProdCode = P.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as PL
					on ML.ProdCode = PL.ProdCode 
					    and ML.ProdCodeSub = if(PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '"), ML.ProdCode, ML.ProdCodeSub)			
				left join ' . $this->_table['product'] . ' as SP		
					on ML.ProdCodeSub = SP.ProdCode
				left join ' . $this->_table['product_division'] . ' as PD
					on PD.ProdCode = ML.ProdCode and PD.ProdCodeSub = ML.ProdCodeSub and PD.IsStatus = "Y"
						and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '") 
						and (PL.PackTypeCcd is null or PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '")   # 단강좌, 운영자패키지일반형 	
				left join ' . $this->_table['product_division'] . ' as SPD
					on SPD.ProdCode = ML.ProdCodeSub and SPD.ProdCodeSub = ML.ProdCodeSub and SPD.IsStatus = "Y"
						and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['userpack_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '") 
						and (PL.PackTypeCcd is null or PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '")   # 사용자패키지, 운영자패키지선택형
				left join ' . $this->_table['product_sale'] . ' as SPS		
					on ML.ProdCodeSub = SPS.ProdCode and SPS.SaleTypeCcd = "613001" and SPS.IsStatus = "Y"
						and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '" 
						and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '"   # 운영자패키지선택형 정상가 조회 (안분율 계산)	
			where ML.LecEndDate >= ?
			    and O.CompleteDatm <= ?
				and OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
				and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"
        ';

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // where 조건 바인딩
        $base_datm = $base_date . ' 23:59:59';
        $raw_binds = [$base_date, $base_datm, $base_datm, $base_date, $base_date, $base_datm];

        if ($is_count === true) {
            $query = $raw_query;
        } else {
            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , concat(RD.ProdCalcRate, "%") as ProdCalcPerc
                        , if(RD.RefundDatm is not null, 0, (RD.LecExpireDay - RD.LecUseDay)) as LecRemainDay
                        , round(RD.RemainPrice * RD.ProdDivisionRate) as DivisionPayPrice			
                    from (
                        select RR.*
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPrice
                            , greatest(0, datediff(date_add(RR.BaseDate, interval 1 day), RR.LecStartDate)) as LecUseDay	
                            , ifnull((select case
                                when RR.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '", "' . $this->_learn_pattern_ccd['userpack_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '") 
                                        and (RR.PackTypeCcd is null or RR.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '") 
                                    then RR.OriProdDivisionRate     # 단강좌, 사용자패키지, 운영자패키지일반형 
                                when RR.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '" and RR.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '" 
                                    then (RR.SalePrice * RR.OriProdDivisionRate) / RR.TotalSalePrice    # 운영자패키지선택형
                                when RR.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '" 
                                    then ' . $this->_pp_division_rate . '  # 기간제패키지
                                else 0
                              end), 0) as ProdDivisionRate	
                            , ifnull(if(RR.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture'] . '", ' . $this->_pp_calc_rate . ', RR.OriProdCalcRate), 0) as ProdCalcRate	  			 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"
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

            // order by, offset, limit
            $query .= ' order by U.OrderIdx desc';
            is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, LearnPatternCcdName, ifnull(PackTypeCcdName, SalePatternCcdName) as ProdDetailTypeName
                , ProdCode, ProdName, ProdCodeSub, ProdNameSub, wProfName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PayStatusName, RemainPrice, ProdDivisionRate, DivisionPayPrice, ProdCalcPerc, DivisionCalcPrice, LecStartDate, LecEndDate, RealLecEndDate, tExtenDays, tPauseDays
                , LecPausePeriod1, LecPausePeriod2, LecPausePeriod3, StudyStatusName, LecExpireDay, LecRemainDay, LecUseDay, DivisionRemainPrice, DivisionUsePrice, BaseDate';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 학원강좌 선수금 조회 (환불주문건은 잔여강의일수, 잔여금액 => 0, 부분환불주문건의 사용금액은 환불일 당일 잔여금액, 환불일 이후 0원)
     * TODO : lms_my_lecture > IX_lms_My_Lecture_LecEndDate (LecEndDate) 인덱스 삭제 또는 명칭 변경 불가 (인덱스 강제적용)
     * @param string $base_date [기준일자]
     * @param bool|string $is_count [조회구분, true : 카운트, false : 목록, excel : 엑셀다운로드]
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listAdvanceOffLecture($base_date, $is_count, $arr_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            // 카운트
            $in_column = 'count(*) AS numrows';
            $column = '';
        } else {
            $in_column = '? as BaseDate 
				, ML.OrderIdx, ML.OrderProdIdx, ML.ProdCode, ML.ProdCodeSub, ML.LecStartDate, ML.LecEndDate
				, O.OrderNo, O.MemIdx, O.PayRouteCcd, O.PayMethodCcd, OP.SalePatternCcd, O.CompleteDatm
				, if(OPR.RefundDatm <= ?, OPR.RefundDatm, null) as RefundDatm
				, OP.RealPayPrice		
				, if(OPR.RefundDatm <= ?, OPR.RefundPrice, 0) as RefundPrice					
				, P.ProdName, PL.LearnPatternCcd, PL.PackTypeCcd, PL.CampusCcd
				, SP.ProdName as ProdNameSub
				, ifnull(PL.Amount, SPL.Amount) as LecAmount	
				, ifnull(PL.SubjectIdx, SPL.SubjectIdx) as SubjectIdx
				, ifnull(PD.ProfIdx, SPD.ProfIdx) as ProfIdx	
				, ifnull(PD.ProdDivisionRate, SPD.ProdDivisionRate) as OriProdDivisionRate
				, ifnull(PD.ProdCalcRate, SPD.ProdCalcRate) as OriProdCalcRate
				, SPS.SalePrice
				, if(PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '", (
					select sum(B.SalePrice)
					from ' . $this->_table['order_sub_product'] . ' as A 
						inner join ' . $this->_table['product_sale'] . ' as B
							on A.ProdCodeSub = B.ProdCode and B.SaleTypeCcd = "613001" and B.IsStatus = "Y" 
					where A.OrderProdIdx = ML.OrderProdIdx			
				  ), null) as TotalSalePrice
				, (select count(0)
					from ' . $this->_table['product_lecture_date'] . ' 
					where ProdCode = ML.ProdCodeSub 
						and IsStatus = "Y"
						and LecDate <= ?) as LecUseAmount';

            $column = 'U.*
                , round(U.DivisionPayPrice * (U.ProdCalcRate / 100)) as DivisionCalcPrice
                , round((U.DivisionPayPrice / U.LecAmount) * U.LecRemainAmount) as DivisionRemainPrice
                , (select case
                    when U.RefundDatm is not null and date_format(U.RefundDatm, "%Y-%m-%d") != U.BaseDate then 0 
                    else (U.DivisionPayPrice - round((U.DivisionPayPrice / U.LecAmount) * U.LecRemainAmount))
                  end) as DivisionUsePrice                 
                , if(U.RefundDatm is not null, "환불완료", "결제완료") as PayStatusName
                , M.MemId, M.MemName
                , PSU.SubjectName
                , WPF.wProfName
                , CPR.CcdName as PayRouteCcdName
                , CPM.CcdName as PayMethodCcdName
                , CLP.CcdName as LearnPatternCcdName
                , CPT.CcdName as PackTypeCcdName
                , CCA.CcdName as CampusCcdName';
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
			from ' . $this->_table['my_lecture'] . ' as ML force index (IX_lms_My_Lecture_LecEndDate)   # 인덱스 강제 적용
				inner join ' . $this->_table['order'] . ' as O
					on ML.OrderIdx = O.OrderIdx
				inner join ' . $this->_table['order_product'] . ' as OP
					on ML.OrderIdx = O.OrderIdx and ML.OrderProdIdx = OP.OrderProdIdx and ML.ProdCode = OP.ProdCode
				left join ' . $this->_table['order_product_refund'] . ' as OPR
					on ML.OrderIdx = OPR.OrderIdx and ML.OrderProdIdx = OPR.OrderProdIdx		
				left join ' . $this->_table['order_sub_product'] . ' as OSP
					on ML.OrderProdIdx = OSP.OrderProdIdx and ML.ProdCodeSub = OSP.ProdCodeSub
				inner join ' . $this->_table['product'] . ' as P
					on ML.ProdCode = P.ProdCode
				inner join ' . $this->_table['product_lecture'] . ' as PL
					on ML.ProdCode = PL.ProdCode
				left join ' . $this->_table['product'] . ' as SP		
					on ML.ProdCodeSub = SP.ProdCode
				left join ' . $this->_table['product_lecture'] . ' as SPL		
					on ML.ProdCodeSub = SPL.ProdCode		
				left join ' . $this->_table['product_division'] . ' as PD
					on PD.ProdCode = ML.ProdCode and PD.ProdCodeSub = ML.ProdCodeSub and PD.IsStatus = "Y"
						and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['off_lecture'] . '", "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '") 
						and (PL.PackTypeCcd is null or PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '")	    # 단과, 종합반일반형 	
				left join ' . $this->_table['product_division'] . ' as SPD
					on SPD.ProdCode = ML.ProdCodeSub and SPD.ProdCodeSub = ML.ProdCodeSub and SPD.IsStatus = "Y"
						and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" 
						and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '"	    # 종합반선택형
				left join ' . $this->_table['product_sale'] . ' as SPS		
					on ML.ProdCodeSub = SPS.ProdCode and SPS.SaleTypeCcd = "613001" and SPS.IsStatus = "Y"
						and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" 
						and PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '"     # 종합반선택형 정상가 조회 (안분율 계산)			
			where ML.LecEndDate >= ?
			    and O.CompleteDatm <= ?
				and OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
				and P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
        ';

        // where 조건
        $raw_query .= $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        // where 조건 바인딩
        $base_datm = $base_date . ' 23:59:59';
        $raw_binds = [$base_date, $base_datm, $base_datm, $base_date, $base_date, $base_datm];

        if ($is_count === true) {
            $query = $raw_query;
        } else {
            $query = 'select ' . $column . '
                from (
                    select RD.*
                        , concat(RD.ProdCalcRate, "%") as ProdCalcPerc		
                        , round(RD.RemainPrice * RD.ProdDivisionRate) as DivisionPayPrice							
                    from (
                        select RR.*
                            , if(RR.RefundDatm is not null, 0, (RR.LecAmount - RR.LecUseAmount)) as LecRemainAmount
                            , (RR.RealPayPrice - RR.RefundPrice) as RemainPrice
                            , ifnull((select case
                                when RR.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['off_lecture'] . '", "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '") 
                                        and (RR.PackTypeCcd is null or RR.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '") 
                                    then RR.OriProdDivisionRate
                                when RR.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '" and RR.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['choice'] . '" 
                                    then (RR.SalePrice * RR.OriProdDivisionRate) / RR.TotalSalePrice
                                else 0
                              end), 0) as ProdDivisionRate
                            , ifnull(RR.OriProdCalcRate, 0) as ProdCalcRate	  	  			 
                        from ('
                            . $raw_query . '
                        ) as RR				
                    ) as RD
                ) as U
                    left join ' . $this->_table['member'] . ' as M
                        on U.MemIdx = M.MemIdx
                    left join ' . $this->_table['subject'] . ' as PSU		
                        on U.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"		
                    left join ' . $this->_table['professor'] . ' as PF		
                        on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                    left join ' . $this->_table['pms_professor'] . ' as WPF
                        on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPR
                        on U.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPM
                        on U.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y"	
                    left join ' . $this->_table['code'] . ' as CLP
                        on U.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CPT
                        on U.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CCA
                        on U.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"';

            // order by, offset, limit
            $query .= ' order by U.OrderIdx desc';
            is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 엑셀다운로드
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayRouteCcdName, PayMethodCcdName, LearnPatternCcdName, ifnull(PackTypeCcdName, "") as ProdDetailTypeName, CampusCcdName
                , ProdCode, ProdName, ProdCodeSub, ProdNameSub, wProfName, SubjectName, RealPayPrice, left(CompleteDatm, 10) as CompleteDate, RefundPrice, left(RefundDatm, 10) as RefundDate
                , PayStatusName, RemainPrice, ProdDivisionRate, DivisionPayPrice, ProdCalcPerc, DivisionCalcPrice, LecStartDate, LecEndDate, LecAmount, LecRemainAmount, LecUseAmount
                , DivisionRemainPrice, DivisionUsePrice, BaseDate';
            $query = 'select ' . $excel_column . ' from (' . $query . ') as ED order by OrderIdx desc';
        }

        // 쿼리 실행
        $result = $this->_conn->query($query, $raw_binds);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }
}
