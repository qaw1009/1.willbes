<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class ProfSalesModel extends BaseOrderModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 강사매출 조회
     * @param string $sales_type [매출구분 (lecture, package, packagePeriod, offLecture, offPackage)]
     * @param array $arr_search_date [시작일자, 종료일자, 개강일/종강일 구분 (학원강좌)]
     * @param null|int $prof_idx [교수식별자]
     * @param bool $is_count [조회상세구분 (true : 카운트, false : 목록, sum : 전체합계, excel : 엑셀다운로드)
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listProfSales($sales_type, $arr_search_date, $prof_idx = null, $is_count = true, $arr_condition = [], $limit = null, $offset = null)
    {
        // 온라인/학원 구분
        $on_off_type = starts_with($sales_type, 'off') === true ? 'off' : 'on';

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $in_column = 'RR.ProfIdx, RR.ProdCode';
        } else {
            $in_column = 'RR.ProfIdx, RR.ProdCode
                , sum(ifnull(RR.RealPayPrice, 0)) as tRealPayPrice
                , sum(ifnull(RR.RefundPrice, 0)) as tRefundPrice
                , sum(ifnull(RR.RealPayPrice, 0) - ifnull(RR.RefundPrice, 0)) as tRemainPrice
                , count(RR.OrderProdIdx) as tOrderProdCnt';

            // 결제/환불완료 건수
            if ($on_off_type == 'on') {
                $in_column .= ', sum(if(RR.RefundPrice is null, 1, 0)) as tRealPayCnt
                    , sum(if(RR.RefundPrice is not null, 1, 0)) as tRefundCnt';
            } else {
                $in_column .= ', sum(if(RR.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tRealPayCnt
                    , sum(if(RR.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '", 1, 0)) as tRefundCnt';
            }

            if ($is_count === 'sum') {
                $column = 'sum(U.tRealPayPrice) as tRealPayPrice, sum(U.tRefundPrice) as tRefundPrice, sum(U.tRemainPrice) as tRemainPrice
                    , sum(U.tRealPayCnt) as tRealPayCnt, sum(U.tRefundCnt) as tRefundCnt';
            } else {
                if ($is_count === 'excel') {
                    $column = $this->_getListSalesQuery('excel_column', $sales_type);
                } else {
                    $column = 'U.*, PS.SalePrice, PS.RealSalePrice, WPF.wProfName';
                }

                $in_column .= ', max(RR.ProdName) as ProdName, SC.CateName as LgCateName
                    ' . $this->_getListSalesQuery('column', $sales_type);
            }
        }

        // 조회 로우 from 쿼리
        $raw_query = '
            select ' . $in_column . '
            from (
                ' . $this->{'_get' . ucfirst($on_off_type) . 'LectureBaseQuery'}($sales_type, $arr_search_date, $prof_idx) . '
                ' . $this->_conn->makeWhere($arr_condition)->getMakeWhere(true) . '
            ) as RR
        ';

        if ($is_count === false || $is_count === 'excel') {
            $raw_query .= '     	
                left join ' . $this->_table['category'] . ' as SC
                    on RR.LgCateCode = SC.CateCode and SC.IsStatus = "Y"	                 
            ' . $this->_getListSalesQuery('from', $sales_type);
        }

        $raw_query .= 'group by RR.ProfIdx, RR.ProdCode';

        // 최종 쿼리
        $query = 'select ' . $column . ' from (' . $raw_query . ') as U';

        if ($is_count === false || $is_count === 'excel') {
            $query .= '
                left join ' . $this->_table['product_sale'] . ' as PS
                    on U.ProdCode = PS.ProdCode and PS.SaleTypeCcd = "613001" and PS.IsStatus = "Y"
                left join ' . $this->_table['professor'] . ' as PF		
                    on U.ProfIdx = PF.ProfIdx and PF.IsStatus = "Y"	
                left join ' . $this->_table['pms_professor'] . ' as WPF
                    on PF.wProfIdx = WPF.wProfIdx and WPF.wIsStatus = "Y"            
            ';
        }

        if ($is_count === false || $is_count === 'excel') {
            $query .= ' order by ' . $this->_getListSalesQuery('order_by', $sales_type) . ', U.ProfIdx, U.ProdCode';
            is_null($limit) === false && is_null($offset) === false && $query .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        // 쿼리 실행
        $result = $this->_conn->query($query);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 학습형태별 매출조회 관련 쿼리 리턴
     * @param string $type [쿼리타입]
     * @param string $sales_type [매출구분]
     * @return mixed
     */
    private function _getListSalesQuery($type, $sales_type)
    {
        $from = '';
        $column = '';
        $excel_column = '';
        $order_by = '';

        switch ($sales_type) {
            case 'lecture' :
                // 단강좌
                $from .= '
                    left join ' . $this->_table['course'] . ' as PCO
                        on RR.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on RR.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"                
                ';
                $column .= ', concat(max(RR.StudyPeriod), "일") as StudyPeriod, PCO.CourseName, PSU.SubjectName';
                $excel_column .= 'U.LgCateName, U.ProdCode, U.ProdName, U.CourseName, U.SubjectName, WPF.wProfName, U.StudyPeriod, PS.RealSalePrice, PS.SalePrice
                    , U.tRealPayCnt, U.tRefundCnt, U.tRemainPrice';
                $order_by .= 'U.tRemainPrice desc';
                break;
            case 'package' :
            case 'packagePeriod' :
                // 운영자/사용자/기간제패키지
                $from .= '';
                $column .= ', concat(max(RR.StudyPeriod), "일") as StudyPeriod, fn_ccd_name(max(RR.PackTypeCcd)) as PackTypeCcdName';
                $excel_column .= 'U.LgCateName, U.ProdCode, U.ProdName, U.PackTypeCcdName, WPF.wProfName, U.StudyPeriod, PS.RealSalePrice, PS.SalePrice
                    , U.tRealPayCnt, U.tRefundCnt';
                $order_by .= 'U.tRealPayCnt desc';
                break;
            case 'offLecture' :
                // 학원단과
                $from .= '
                    left join ' . $this->_table['code'] . ' as CCA
                        on RR.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"                                
                    left join ' . $this->_table['course'] . ' as PCO
                        on RR.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on RR.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"                
                ';
                $column .= ', max(RR.StudyStartDate) as StudyStartDate, max(RR.StudyEndDate) as StudyEndDate, CCA.CcdName as CampusCcdName, PCO.CourseName, PSU.SubjectName';
                $excel_column .= 'U.CampusCcdName, U.LgCateName, U.ProdCode, U.ProdName, U.CourseName, U.SubjectName, WPF.wProfName, U.StudyStartDate, U.StudyEndDate
                    , PS.RealSalePrice, PS.SalePrice, U.tRealPayCnt, U.tRefundCnt, U.tRemainPrice';
                $order_by .= 'U.tRemainPrice desc';
                break;
            case 'offPackage' :
                // 학원종합반
                $from .= '
                    left join ' . $this->_table['code'] . ' as CCA
                        on RR.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"                
                ';
                $column .= ', max(RR.StudyStartDate) as StudyStartDate, max(RR.StudyEndDate) as StudyEndDate, CCA.CcdName as CampusCcdName';
                $excel_column .= 'U.CampusCcdName, U.LgCateName, U.ProdCode, U.ProdName, WPF.wProfName, U.StudyStartDate, U.StudyEndDate, PS.RealSalePrice, PS.SalePrice
                    , U.tRealPayCnt, U.tRefundCnt';
                $order_by .= 'U.tRealPayCnt desc';
                break;
        }

        return ${$type};
    }

    /**
     * 강사매출 주문조회
     * @param string $sales_type [매출구분 (lecture, package, packagePeriod, offLecture, offPackage)]
     * @param array $arr_search_date [시작일자, 종료일자, 개강일/종강일 구분 (학원강좌)]
     * @param null|int $prof_idx [교수식별자]
     * @param bool $is_count [조회상세구분 (true : 카운트, false : 목록, sum : 전체합계, excel : 엑셀다운로드)
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listProfOrder($sales_type, $arr_search_date, $prof_idx = null, $is_count = true, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        // 온라인/학원 구분
        $on_off_type = starts_with($sales_type, 'off') === true ? 'off' : 'on';

        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            if ($is_count === 'sum') {
                $column = 'sum(ifnull(RR.RealPayPrice, 0)) as tRealPayPrice, sum(ifnull(RR.RefundPrice, 0)) as tRefundPrice, count(RR.OrderProdIdx) as tOrderProdCnt';

                // 결제/환불완료 건수
                if ($on_off_type == 'on') {
                    $column .= ', sum(if(RR.RefundPrice is null, 1, 0)) as tRealPayCnt
                        , sum(if(RR.RefundPrice is not null, 1, 0)) as tRefundCnt';
                } else {
                    $column .= ', sum(if(RR.PayStatusCcd = "' . $this->_pay_status_ccd['paid'] . '", 1, 0)) as tRealPayCnt
                        , sum(if(RR.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '", 1, 0)) as tRefundCnt';
                }
            } else {
                $column = 'RR.OrderIdx, RR.OrderNo, RR.SiteCode, RR.MemIdx, RR.OrderProdIdx, RR.ProdCode, RR.PayChannelCcd, RR.PayRouteCcd, RR.PayMethodCcd, RR.PayStatusCcd
                    , RR.RealPayPrice, RR.CompleteDatm, RR.RefundPrice';

                // 환불일시, 결제상태
                if ($on_off_type == 'on') {
                    $column .= ', if(RR.RefundPrice is not null, RR.RefundDatm, null) as RefundDatm, if(RR.RefundPrice is not null, "환불완료", "결제완료") as PayStatusName';
                } else {
                    $column .= ', RR.RefundDatm, CPS.CcdName as PayStatusName';
                }

                $column .= ', M.MemName, M.MemId, fn_dec(M.PhoneEnc) as MemPhone, CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName';
            }
        }

        // 조회 로우 from 쿼리
        $from = '
            from (
                ' . $this->{'_get' . ucfirst($on_off_type) . 'LectureBaseQuery'}($sales_type, $arr_search_date, $prof_idx) . '
            ) as RR
                left join lms_member as M
                    on RR.MemIdx = M.MemIdx                  
        ';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 매출목록 조회일 경우 공통코드명, 카테고리명 조회
        if ($is_count === false || $is_count === 'excel') {
            $from .= '                                    
                left join ' . $this->_table['code'] . ' as CPC
                    on RR.PayChannelCcd = CPC.Ccd and CPC.IsStatus = "Y" and CPC.GroupCcd = "' . $this->_group_ccd['PayChannel'] . '"
                left join ' . $this->_table['code'] . ' as CPR
                    on RR.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y" and CPR.GroupCcd = "' . $this->_group_ccd['PayRoute'] . '"
                left join ' . $this->_table['code'] . ' as CPM
                    on RR.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y" and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '"                   
                left join ' . $this->_table['code'] . ' as CPS
                    on RR.PayStatusCcd = CPS.Ccd and CPS.IsStatus = "Y" and CPS.GroupCcd = "' . $this->_group_ccd['PayStatus'] . '"                                                  	                                     
            ';
        }

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName 
                , RealPayPrice, CompleteDatm, RefundPrice, RefundDatm, PayStatusName';
            $query = 'select ' . $excel_column . ' from (select ' . $column . $from . $where . ') as ED' . $order_by_offset_limit;
        } else {
            $query = 'select ' . $column . $from . $where . $order_by_offset_limit;
        }

        $result = $this->_conn->query($query);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 온라인매출 기본 쿼리
     * @param string $sales_type [매출구분 (lecture, package, packagePeriod)]
     * @param array $arr_search_date [시작일자, 종료일자]
     * @param null|int $prof_idx [교수식별자]
     * @return string
     */
    private function _getOnLectureBaseQuery($sales_type, $arr_search_date, $prof_idx = null)
    {
        $start_date = $arr_search_date[0] . ' 00:00:00';
        $end_date = $arr_search_date[1] . ' 23:59:59';
        $from = '';
        $column = '';
        $where = '';

        if (empty($prof_idx) === false && is_array($prof_idx) === false) {
            $prof_idx = (array) $prof_idx;
        }

        switch ($sales_type) {
            case 'lecture' :
                // 단강좌
                $from .= '
                    inner join ' . $this->_table['product_division'] . ' as PD
                        on PD.ProdCode = OP.ProdCode and PD.ProdCodeSub = OP.ProdCode and PD.IsStatus = "Y"                    
                ';
                $column .= ', PD.ProfIdx, PL.CourseIdx, PL.SubjectIdx, PL.StudyPeriod';
                $where .= 'and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['on_lecture'] . '")';
                $where .= $this->_conn->makeWhereIn('PD.ProfIdx', $prof_idx)->getMakeWhere(true);
                break;
            case 'package' :
                // 운영자/사용자패키지
                $from .= '
                    inner join ' . $this->_table['order_sub_product'] . ' as OSP		
                        on OP.OrderProdIdx = OSP.OrderProdIdx                
                    inner join ' . $this->_table['product_division'] . ' as PD
                        on PD.ProdCode = if(PL.PackTypeCcd = "' . $this->_adminpack_lecture_type_ccd['normal'] . '", OP.ProdCode, OSP.ProdCodeSub) and PD.ProdCodeSub = OSP.ProdCodeSub and PD.IsStatus = "Y"                    
                ';
                $column .= ', PD.ProfIdx, PL.StudyPeriod, PL.PackTypeCcd';
                $where .= 'and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['userpack_lecture'] . '", "' . $this->_learn_pattern_ccd['adminpack_lecture'] . '")';
                $where .= $this->_conn->makeWhereIn('PD.ProfIdx', $prof_idx)->getMakeWhere(true);
                break;
            case 'packagePeriod' :
                // 기간제패키지
                $from .= '
                    inner join ' . $this->_table['order_product_prof_subject'] . ' as OPP
                        on OP.OrderProdIdx = OPP.OrderProdIdx                    
                ';
                $column .= ', OPP.ProfIdx, OPP.SubjectIdx, PL.StudyPeriod, PL.PackTypeCcd';
                $where .= 'and PL.LearnPatternCcd in ("' . $this->_learn_pattern_ccd['periodpack_lecture'] . '")';
                $where .= $this->_conn->makeWhereIn('OPP.ProfIdx', $prof_idx)->getMakeWhere(true);
                break;
        }

        $query = /** @lang text */ '   
            select if(O.CompleteDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . ', OP.RealPayPrice, null) as RealPayPrice	
                , if(OPR.RefundDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . ', OPR.RefundPrice, null) as RefundPrice
                , O.CompleteDatm, OPR.RefundDatm
                , O.OrderIdx, O.OrderNo, O.MemIdx, O.SiteCode, OP.OrderProdIdx, OP.ProdCode, P.ProdName
                , O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, OP.PayStatusCcd, OP.SalePatternCcd
                , left(PC.CateCode, 4) as LgCateCode 
                ' . $column . '
            from (     
                select RO.OrderIdx, ROP.OrderProdIdx
                from ' . $this->_table['order'] . ' as RO
                    inner join ' . $this->_table['order_product'] . ' as ROP
                        on RO.OrderIdx = ROP.OrderIdx
                where RO.CompleteDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . '
                    and ROP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                    and ROP.RealPayPrice > 0
                union
                select OrderIdx, OrderProdIdx
                from ' . $this->_table['order_product_refund'] . '
                where RefundDatm between ' . $this->_conn->escape($start_date) . ' and ' . $this->_conn->escape($end_date) . '	
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
                ' . $from . '
            where OP.RealPayPrice > 0
				and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
				and P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture'] . '"  
				' . $where . '          					                   	            
        ';

        return $query;
    }

    /**
     * 학원매출 기본 쿼리
     * @param string $sales_type [매출구분 (offLecture, offPackage)]
     * @param array $arr_search_date [개강일/종강일 구분 (StudyStartDate, StudyEndDate), 시작일자, 종료일자]
     * @param null|int|array $prof_idx [교수식별자]
     * @return string
     */
    private function _getOffLectureBaseQuery($sales_type, $arr_search_date, $prof_idx = null)
    {
        if (empty($prof_idx) === false && is_array($prof_idx) === false) {
            $prof_idx = (array) $prof_idx;
        }

        if ($sales_type == 'offLecture') {
            $raw_query = /** @lang text */ '
                select PD.ProfIdx, P.ProdCode, P.ProdName, P.SiteCode
                    , PL.CampusCcd, PL.CourseIdx, PL.SubjectIdx
                    , json_object("StudyStartDate", PL.StudyStartDate, "StudyEndDate", PL.StudyEndDate) as StudyPeriod
                from ' . $this->_table['product'] . ' as P
                    inner join ' . $this->_table['product_lecture'] . ' as PL
                        on PL.ProdCode = P.ProdCode
                    inner join ' . $this->_table['product_division'] . ' as PD
                        on PD.ProdCode = P.ProdCode and PD.ProdCodeSub = P.ProdCode and PD.IsStatus = "Y"
                where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
                    and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture'] . '"
                    and `PL`.`'. $arr_search_date[2] .'` between ' . $this->_conn->escape($arr_search_date[0]) . ' and ' . $this->_conn->escape($arr_search_date[1]) . '            
            ';
            $raw_query .= $this->_conn->makeWhereIn('PD.ProfIdx', $prof_idx)->getMakeWhere(true);
        } else {
            $raw_query = /** @lang text */ '
                select SPD.ProfIdx, P.ProdCode, P.ProdName, P.SiteCode
                    , PL.CampusCcd, SPL.CourseIdx, SPL.SubjectIdx
                    , (select json_object("StudyStartDate", min(B.StudyStartDate), "StudyEndDate", max(B.StudyEndDate)) 
                        from ' . $this->_table['product_r_sublecture'] . ' as A
                            inner join ' . $this->_table['product_lecture'] . ' as B
                                on A.ProdCodeSub = B.ProdCode
                        where A.ProdCode = P.ProdCode
                            and A.IsStatus = "Y") as StudyPeriod
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
                where P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture'] . '"
                    and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture'] . '"
                    and `SPL`.`'. $arr_search_date[2] .'` between ' . $this->_conn->escape($arr_search_date[0]) . ' and ' . $this->_conn->escape($arr_search_date[1]) . '             
            ';
            $raw_query .= $this->_conn->makeWhere(['IN' => ['SPD.ProfIdx' => $prof_idx]])->getMakeWhere(true);
        }

        $query = /** @lang text */ '
            select TA.ProfIdx, TA.ProdCode, TA.ProdName, TA.SiteCode, TA.CampusCcd, TA.CourseIdx, TA.SubjectIdx
                , json_value(TA.StudyPeriod, "$.StudyStartDate") as StudyStartDate, json_value(TA.StudyPeriod, "$.StudyEndDate") as StudyEndDate
                , O.OrderIdx, O.OrderNo, O.MemIdx, OP.OrderProdIdx, O.PayChannelCcd, O.PayRouteCcd, O.PayMethodCcd, OP.PayStatusCcd, OP.SalePatternCcd
                , OP.RealPayPrice, O.CompleteDatm, OPR.RefundPrice, OPR.RefundDatm
                , left(PC.CateCode, 4) as LgCateCode
            from (
                ' . $raw_query . '
            ) as TA	
                inner join ' . $this->_table['order_product'] . ' as OP
                    on OP.ProdCode = TA.ProdCode
                inner join ' . $this->_table['order'] . ' as O
                    on OP.OrderIdx = O.OrderIdx
                left join ' . $this->_table['order_product_refund'] . ' as OPR
                    on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on PC.ProdCode = TA.ProdCode and PC.IsStatus = "Y"				
            where OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")
                and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['free'] . '")
        ';

        return $query;
    }
}
