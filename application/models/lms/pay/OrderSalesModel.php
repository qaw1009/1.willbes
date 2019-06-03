<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderSalesModel extends BaseOrderModel
{
    /**
     * 매출현황 주문조회
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param string $search_type [조회구분 (전체: all, 실매출: real_pay)]
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSalesOrder($start_date, $end_date, $search_type, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            if ($is_count === 'sum') {
                $column = 'sum(ifnull(BO.RealPayPrice, 0)) as tRealPayPrice, sum(ifnull(BO.RefundPrice, 0)) as tRefundPrice
                    , count(BO.OrderProdIdx) as tOrderProdCnt, sum(if(BO.RefundPrice is null, 1, 0)) as tRealPayCnt, sum(if(BO.RefundPrice is null, 0, 1)) as tRefundCnt';
            } else {
                $column = 'BO.OrderIdx, BO.OrderNo, BO.SiteCode, BO.MemIdx, BO.OrderProdIdx, BO.ProdCode, BO.PayChannelCcd, BO.PayRouteCcd, BO.PgCcd, BO.PayMethodCcd
                    , BO.PayStatusCcd, BO.SalePatternCcd
                    , BO.RealPayPrice, BO.CompleteDatm, BO.RefundPrice, BO.RefundDatm
                    , if(BO.RefundPrice is null, "결제완료", "환불완료") as PayStatusName
                    , P.ProdTypeCcd, P.ProdName, PL.LearnPatternCcd, PC.CateCode 
                    , M.MemName, M.MemId, fn_dec(M.PhoneEnc) as MemPhone
                    , CPC.CcdName as PayChannelCcdName, CPR.CcdName as PayRouteCcdName, CPM.CcdName as PayMethodCcdName
                    , if(BO.SalePatternCcd != "' . $this->_sale_pattern_ccd['normal'] . '", CSP.CcdName, "") as SalePatternCcdName
                    , CPT.CcdName as ProdTypeCcdName, CLP.CcdName as LearnPatternCcdName, SC.CateName 
                    , json_value(CPM.CcdEtc, if(BO.PgCcd != "", concat("$.fee.", BO.PgCcd), "$.fee")) as PgFee';
            }
        }

        $from = '
            from (
                ' . $this->_getBaseOrder($start_date, $end_date, $search_type) . '
            ) as BO
                inner join ' . $this->_table['product'] . ' as P
                    on BO.ProdCode = P.ProdCode
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on BO.ProdCode = PL.ProdCode
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on BO.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as SC
                    on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"                       
                left join ' . $this->_table['member'] . ' as M
                    on BO.MemIdx = M.MemIdx            
        ';

        // 매출현황 목록 조회일 경우 공통코드명, 카테고리명 조회
        if ($is_count === false || $is_count === 'excel') {
            $from .= '                  
                left join ' . $this->_table['code'] . ' as CPC
                    on BO.PayChannelCcd = CPC.Ccd and CPC.IsStatus = "Y" and CPC.GroupCcd = "' . $this->_group_ccd['PayChannel'] . '"
                left join ' . $this->_table['code'] . ' as CPR
                    on BO.PayRouteCcd = CPR.Ccd and CPR.IsStatus = "Y" and CPR.GroupCcd = "' . $this->_group_ccd['PayRoute'] . '"
                left join ' . $this->_table['code'] . ' as CPM
                    on BO.PayMethodCcd = CPM.Ccd and CPM.IsStatus = "Y" and CPM.GroupCcd = "' . $this->_group_ccd['PayMethod'] . '"                   
                left join ' . $this->_table['code'] . ' as CSP
                    on BO.SalePatternCcd = CSP.Ccd and CSP.IsStatus = "Y" and CSP.GroupCcd = "' . $this->_group_ccd['SalePattern'] . '"                                                      	
                left join ' . $this->_table['code'] . ' as CPT
                    on P.ProdTypeCcd = CPT.Ccd and CPT.IsStatus = "Y" and CPT.GroupCcd = "' . $this->_group_ccd['ProdType'] . '"
                left join ' . $this->_table['code'] . ' as CLP
                    on PL.LearnPatternCcd = CLP.Ccd and CLP.IsStatus = "Y" and CLP.GroupCcd = "' . $this->_group_ccd['LearnPattern'] . '"                                     
            ';
        }

        // 일반, 수강연장, 재수강 판매형태만 조회
        $from .= 'where BO.SalePatternCcd in ("' . $this->_sale_pattern_ccd['normal'] . '", "' . $this->_sale_pattern_ccd['extend'] . '", "' . $this->_sale_pattern_ccd['retake'] . '")';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        if ($is_count === 'excel') {
            $excel_column = 'OrderNo, MemName, MemId, MemPhone, PayChannelCcdName, PayRouteCcdName, PayMethodCcdName, CateName
                , concat(ProdTypeCcdName, if(SalePatternCcdName != "", concat(" (", SalePatternCcdName, ")"), "")) as ProdTypeCcdName            
                , LearnPatternCcdName, ProdName, RealPayPrice, PgFee, CompleteDatm, RefundPrice, RefundDatm, PayStatusName';
            $query = 'select ' . $excel_column . ' from (select ' . $column . $from . $where . ') as ED' . $order_by_offset_limit;
        } else {
            $query = 'select ' . $column . $from . $where . $order_by_offset_limit;
        }

        $result = $this->_conn->query($query);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 매출현황 통계 조회
     * @param string $learn_pattern [학습형태+교재]
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param string $search_type [조회구분 (전체: all, 실매출: real_pay)]
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listStatsOrder($learn_pattern, $start_date, $end_date, $search_type, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            if ($is_count === 'sum') {
                $column = 'sum(SU.tRealPayPrice) as tRealPayPrice, sum(SU.tRefundPrice) as tRefundPrice, sum(SU.tRealPayPrice - SU.tRefundPrice) as tRemainPrice
                    , sum(SU.tOrderProdCnt) as tOrderProdCnt, sum(SU.tRealPayCnt) as tRealPayCnt, sum(SU.tRefundCnt) as tRefundCnt';
            } else {
                $column = 'SU.ProdCode, SU.tRealPayPrice, SU.tRefundPrice, (SU.tRealPayPrice - SU.tRefundPrice) as tRemainPrice
                    , SU.tOrderProdCnt, SU.tRealPayCnt, SU.tRefundCnt
                    , P.ProdName, SC.CateName, PS.SalePrice, PS.RealSalePrice, CSS.CcdName as SaleStatusCcdName';
                $column .= $this->_getListStatsQuery('column', $learn_pattern);
            }
        }

        $from = '
            from (
                select BO.SiteCode, BO.ProdCode, sum(ifnull(BO.RealPayPrice, 0)) as tRealPayPrice, sum(ifnull(BO.RefundPrice, 0)) as tRefundPrice
                    , count(BO.OrderProdIdx) as tOrderProdCnt, sum(if(BO.RefundPrice is null, 1, 0)) as tRealPayCnt, sum(if(BO.RefundPrice is null, 0, 1)) as tRefundCnt
                from (
                    ' . $this->_getBaseOrder($start_date, $end_date, $search_type) . '
                ) as BO
                where BO.SalePatternCcd in ("' . $this->_sale_pattern_ccd['normal'] . '", "' . $this->_sale_pattern_ccd['extend'] . '", "' . $this->_sale_pattern_ccd['retake'] . '")
                group by BO.SiteCode, BO.ProdCode                                    
            ) as SU    
                inner join ' . $this->_table['product'] . ' as P
                    on SU.ProdCode = P.ProdCode
                left join ' . $this->_table['product_lecture'] . ' as PL
                    on SU.ProdCode = PL.ProdCode
                left join ' . $this->_table['product_sale'] . ' as PS
                    on SU.ProdCode = PS.ProdCode and PS.SaleTypeCcd = "613001" and PS.IsStatus = "Y"
                left join ' . $this->_table['product_r_category'] . ' as PC
                    on SU.ProdCode = PC.ProdCode and PC.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as SC
                    on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"     
                left join ' . $this->_table['code'] . ' as CSS
                    on P.SaleStatusCcd = CSS.Ccd and CSS.IsStatus = "Y"
                ' . $this->_getListStatsQuery('from', $learn_pattern) . '
            where ' . $this->_getListStatsQuery('where', $learn_pattern) . '
        ';

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        if ($is_count === 'excel') {
            $excel_column = 'CateName, ProdCode, ProdName, ' . $this->_getListStatsQuery('excel_column', $learn_pattern) . ', tRemainPrice';
            $query = 'select ' . $excel_column . ' from (select ' . $column . $from . $where . ') as ED' . $order_by_offset_limit;
        } else {
            $query = 'select ' . $column . $from . $where . $order_by_offset_limit;
        }

        $result = $this->_conn->query($query);

        return ($is_count === true) ? $result->row(0)->numrows : $result->result_array();
    }

    /**
     * 학습형태별 매출현황 통계조회 관련 쿼리 리턴
     * @param string $type [쿼리타입]
     * @param string $learn_pattern [학습형태+교재]
     * @return mixed
     */
    private function _getListStatsQuery($type, $learn_pattern)
    {
        $from = '';
        $column = '';
        $excel_column = '';
        $where = '';

        switch ($learn_pattern) {
            case 'on_lecture' :
                // 단강좌
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['on_lecture']. '"';
                $from .= '
                    left join ' . $this->_table['course'] . ' as PCO
                        on PL.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on PL.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['product_professor_concat_repr'] . ' as VPP
                        on SU.ProdCode = VPP.ProdCode
                    left join ' . $this->_table['cms_lecture_basics'] . ' as VCL
                        on PL.wLecIdx = VCL.wLecIdx                        	
                    left join ' . $this->_table['code'] . ' as CLT
                        on PL.LecTypeCcd = CLT.Ccd and CLT.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CLT.CcdName as LecTypeCcdName, PCO.CourseName, PSU.SubjectName, VPP.wProfName_String
                    , VCL.wProgressCcd_Name, VCL.wUnitCnt, VCL.wUnitLectureCnt';
                $excel_column .= 'SchoolYear, LecTypeCcdName, CourseName, SubjectName, wProfName_String
                    , concat(wProgressCcd_Name, " (", wUnitCnt, "/", wUnitLectureCnt, ")") as wProgressCcd_Name, RealSalePrice, SalePrice, SaleStatusCcdName';
                break;
            case 'userpack_lecture' :
                // 사용자 패키지
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['userpack_lecture']. '"';
                $from .= '';
                $column .= ', PL.SchoolYear';
                $excel_column .= 'SchoolYear, SaleStatusCcdName';
                break;
            case 'adminpack_lecture' :
                // 운영자 패키지
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['adminpack_lecture']. '"';
                $from .= '
                    left join ' . $this->_table['code'] . ' as CPT
                        on PL.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CPT.CcdName as PackTypeCcdName';
                $excel_column .= 'SchoolYear, PackTypeCcdName, RealSalePrice, SalePrice, SaleStatusCcdName';
                break;
            case 'periodpack_lecture' :
                // 기간제 패키지
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['on_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['periodpack_lecture']. '"';
                $from .= '
                    left join ' . $this->_table['code'] . ' as CPT
                        on PL.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"                
                    left join ' . $this->_table['code'] . ' as CPP
                        on PL.StudyPeriod = CPP.CcdValue and CPP.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CPT.CcdName as PackTypeCcdName, CPP.CcdName as PackPeriodCcdName';
                $excel_column .= 'SchoolYear, PackTypeCcdName, PackPeriodCcdName, RealSalePrice, SalePrice, SaleStatusCcdName';
                break;
            case 'off_lecture' :
                // 단과반
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_lecture']. '"';
                $from .= '
                    left join ' . $this->_table['course'] . ' as PCO
                        on PL.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on PL.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['product_professor_concat_repr'] . ' as VPP
                        on SU.ProdCode = VPP.ProdCode	
                    left join ' . $this->_table['code'] . ' as CCA
                        on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on PL.StudyPatternCcd = CSP.Ccd and CSP.IsStatus = "Y"        
                    left join ' . $this->_table['code'] . ' as CAS
                        on PL.AcceptStatusCcd = CAS.Ccd and CAS.IsStatus = "Y"';
                $column .= ', CCA.CcdName as CampusCcdName, PL.SchoolYear, CSP.CcdName as StudyPatternCcdName, PL.SchoolStartYear, PL.SchoolStartMonth
                    , PL.StudyStartDate, PL.StudyEndDate, PCO.CourseName, PSU.SubjectName, VPP.wProfName_String, PL.IsLecOpen, CAS.CcdName as AcceptStatusCcdName';
                $excel_column .= 'CampusCcdName, SchoolYear, StudyPatternCcdName, concat(SchoolStartYear, "/", SchoolStartMonth) as SchoolStartYearMonth
                    , StudyStartDate, StudyEndDate, CourseName, SubjectName, wProfName_String, RealSalePrice, SalePrice
                    , if(IsLecOpen = "Y", "개설", "폐강") as IsLecOpenName, AcceptStatusCcdName';
                break;
            case 'off_pack_lecture' :
                // 종합반
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['off_lecture']. '" and PL.LearnPatternCcd = "' . $this->_learn_pattern_ccd['off_pack_lecture']. '"';
                $from .= '
                    left join ' . $this->_table['code'] . ' as CCA
                        on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on PL.StudyPatternCcd = CSP.Ccd and CSP.IsStatus = "Y"        
                    left join ' . $this->_table['code'] . ' as CAS
                        on PL.AcceptStatusCcd = CAS.Ccd and CAS.IsStatus = "Y"';
                $column .= ', CCA.CcdName as CampusCcdName, PL.SchoolYear, CSP.CcdName as StudyPatternCcdName, PL.SchoolStartYear, PL.SchoolStartMonth
                    , PL.IsLecOpen, CAS.CcdName as AcceptStatusCcdName
                    , (select concat(min(B.StudyStartDate), "~", max(B.StudyEndDate)) 
                        from ' . $this->_table['product_r_sublecture'] . ' as A
                            inner join ' . $this->_table['product_lecture'] . ' as B
                                on A.ProdCodeSub = B.ProdCode
                        where A.ProdCode = SU.ProdCode
                            and A.IsStatus = "Y") as StudyPeriod';
                $excel_column .= 'CampusCcdName, SchoolYear, StudyPatternCcdName, concat(SchoolStartYear, "/", SchoolStartMonth) as SchoolStartYearMonth
                    , left(StudyPeriod, 10) as StudyStartDate, right(StudyPeriod, 10) as StudyEndDate, RealSalePrice, SalePrice
                    , if(IsLecOpen = "Y", "개설", "폐강") as IsLecOpenName, AcceptStatusCcdName';
                break;
            case 'book' :
                // 교재
                $where .= 'P.ProdTypeCcd = "' . $this->_prod_type_ccd['book']. '"';
                $from .= '
                    left join ' . $this->_table['product_book'] . ' as PB
                        on SU.ProdCode = PB.ProdCode		
                    left join ' . $this->_table['product_book_professor_subject_concat'] . ' as VPB
                        on SU.ProdCode = VPB.ProdCode			
                    left join ' . $this->_table['bms_book_combine'] . ' as VBB
                        on PB.wBookIdx = VBB.wBookIdx';
                $column .= ', VPB.ProfSubjectNames, VBB.wPublName, VBB.wAuthorNames, VBB.wIsbn';
                $excel_column .= 'concat(wIsbn, " ") as wIsbn, ProfSubjectNames, wPublName, wAuthorNames, RealSalePrice, SalePrice, SaleStatusCcdName, tRealPayCnt';
                break;
            default :
                break;
        }

        return ${$type};
    }

    /**
     * 월비스전체매출현황 통계
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param string $search_type [조회구분 (전체: all, 실매출: real_pay)]
     * @param array $arr_condition
     * @param string $column
     * @return mixed
     */
    public function listAllStatsOrder($start_date, $end_date, $search_type, $arr_condition = [], $column = '')
    {
        if (empty($column) === true) {
            $column = 'ifnull(U.SiteCode, "9999") as SiteCode, ifnull(U.ProdTypeCcd, "999999") as ProdTypeCcd, ifnull(U.LgCateCode, "9999") as LgCateCode
                , U.tRealPayPrice, U.tRefundPrice, (U.tRealPayPrice - U.tRefundPrice) as tRemainPrice
                , U.tOrderProdCnt, U.tRealPayCnt, U.tRefundCnt
                , ifnull(S.SiteName, "") as SiteName, ifnull(C.CcdName, "") as ProdTypeCcdName, ifnull(SC.CateName, "") as LgCateName';
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 전체, 사이트코드, 강좌상품 rollup 데이터 추출 포함 (강좌 이외 상품 rollup 데이터 제외 처리)
        $prod_type_in_query = '"' . $this->_prod_type_ccd['on_lecture'] . '", "' . $this->_prod_type_ccd['off_lecture'] . '"';

        // 실결제금액 0원 초과 or 조회일자 이전 환불건만 조회
        $from = '
            from (
                select BO.SiteCode, P.ProdTypeCcd, ifnull(SC.GroupCateCode, "0000") as LgCateCode
                    , sum(ifnull(BO.RealPayPrice, 0)) as tRealPayPrice, sum(ifnull(BO.RefundPrice, 0)) as tRefundPrice
                    , count(BO.OrderProdIdx) as tOrderProdCnt, sum(if(BO.RefundPrice is null, 1, 0)) as tRealPayCnt, sum(if(BO.RefundPrice is null, 0, 1)) as tRefundCnt
                from ( 
                    ' . $this->_getBaseOrder($start_date, $end_date, $search_type) . '
                ) as BO 
                    inner join ' . $this->_table['product'] . ' as P
                        on BO.ProdCode = P.ProdCode
                    left join ' . $this->_table['product_r_category'] . ' as PC
                        on BO.ProdCode = PC.ProdCode and PC.IsStatus = "Y" and P.ProdTypeCcd in (' . $prod_type_in_query . ')
                    left join ' . $this->_table['category'] . ' as SC
                        on PC.CateCode = SC.CateCode and SC.IsStatus = "Y"
                where BO.SalePatternCcd in ("' . $this->_sale_pattern_ccd['normal'] . '", "' . $this->_sale_pattern_ccd['extend'] . '", "' . $this->_sale_pattern_ccd['retake'] . '")
                    ' . $where . '         
                group by BO.SiteCode, P.ProdTypeCcd, LgCateCode 
                with rollup      
            ) as U
                left join ' . $this->_table['site'] . ' as S
                    on U.SiteCode = S.SiteCode and S.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as C
                    on U.ProdTypeCcd = C.Ccd and C.GroupCcd = "' . $this->_group_ccd['ProdType'] . '" and C.IsStatus = "Y"
                left join ' . $this->_table['category'] . ' as SC
                    on U.LgCateCode = SC.CateCode and SC.IsStatus = "Y"
            where U.SiteCode is null
                or U.ProdTypeCcd is null
                or U.ProdTypeCcd in (' . $prod_type_in_query . ') 
                or (U.ProdTypeCcd not in (' . $prod_type_in_query . ') and U.LgCateCode = "0000")
            order by SiteCode, ProdTypeCcd, LgCateCode                                       
        ';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from);

        return $query->result_array();
    }

    /**
     * 기준 주문조회
     * @param string $start_date [조회시작일자]
     * @param string $end_date [조회종료일자]
     * @param string $search_type [조회구분 (전체: all, 실매출: real_pay)]
     * @return string
     */
    private function _getBaseOrder($start_date, $end_date, $search_type = 'all')
    {
        $where = '';
        if ($search_type == 'real_pay') {
            $where .= ' and OP.RealPayPrice > 0';
        }

        $query = /** @lang text */ '
            select O.OrderIdx, O.OrderNo, O.SiteCode, O.MemIdx, OP.OrderProdIdx, OP.ProdCode
                , O.PayChannelCcd, O.PayRouteCcd, O.PgCcd, O.PayMethodCcd, OP.PayStatusCcd, OP.SalePatternCcd
                , OP.RealPayPrice
                , O.CompleteDatm
                , if(OPR.RefundDatm > ' . $this->_conn->escape($end_date . ' 23:59:59') . ', null, OPR.RefundPrice) as RefundPrice
                , if(OPR.RefundDatm > ' . $this->_conn->escape($end_date . ' 23:59:59') . ', null, OPR.RefundDatm) as RefundDatm	
            from ' . $this->_table['order'] . ' as O
                inner join ' . $this->_table['order_product'] . ' as OP
                    on O.OrderIdx = OP.OrderIdx
                left join ' . $this->_table['order_product_refund'] . ' as OPR        
                    on O.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
            where O.CompleteDatm between ' . $this->_conn->escape($start_date . ' 00:00:00') . ' and ' . $this->_conn->escape($end_date . ' 23:59:59') . '
                and OP.PayStatusCcd in ("' . $this->_pay_status_ccd['paid'] . '", "' . $this->_pay_status_ccd['refund'] . '")               
                and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['zero'] . '", "' . $this->_pay_route_ccd['free'] . '")
            ' . $where . '                
            union all
            select O.OrderIdx, O.OrderNo, O.SiteCode, O.MemIdx, OP.OrderProdIdx, OP.ProdCode
                , O.PayChannelCcd, O.PayRouteCcd, O.PgCcd, O.PayMethodCcd, OP.PayStatusCcd, OP.SalePatternCcd
                , null as RealPayPrice
                , CompleteDatm
                , OPR.RefundPrice
                , OPR.RefundDatm
            from ' . $this->_table['order_product_refund'] . ' as OPR
                inner join ' . $this->_table['order'] . ' as O
                    on OPR.OrderIdx = O.OrderIdx
                inner join ' . $this->_table['order_product'] . ' as OP
                    on OP.OrderIdx = OPR.OrderIdx and OP.OrderProdIdx = OPR.OrderProdIdx
            where OPR.RefundDatm between ' . $this->_conn->escape($start_date . ' 00:00:00') . ' and ' . $this->_conn->escape($end_date . ' 23:59:59') . '
                and OP.PayStatusCcd = "' . $this->_pay_status_ccd['refund'] . '"
                and O.CompleteDatm < ' . $this->_conn->escape($start_date . ' 00:00:00') . '
                and O.PayRouteCcd not in ("' . $this->_pay_route_ccd['zero'] . '", "' . $this->_pay_route_ccd['free'] . '") 
            ' . $where
        ;

        return $query;
    }
}
