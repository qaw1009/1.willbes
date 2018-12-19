<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/lms/pay/BaseOrderModel.php';

class OrderStatsModel extends BaseOrderModel
{
    /**
     * 매출현황 조회
     * @param string $learn_pattern
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listStatsOrder($learn_pattern, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if (is_bool($is_count) === true) {
            if ($is_count === true) {
                $column = 'count(*) AS numrows';
            } else {
                $column = 'SU.ProdCode, SU.SumPayPrice, SU.SumRefundPrice, (SU.SumPayPrice - SU.SumRefundPrice) as SumRemainPrice, SU.OrderProdCnt
                    , P.ProdName, GSC.CateName as LgCateName, PS.SalePrice, PS.RealSalePrice, CSS.CcdName as SaleStatusCcdName';
                $column .= $this->_getAddListQuery('column', $learn_pattern);
            }
        } else {
            $column = $is_count;
        }

        $from = $this->_getListFrom($learn_pattern, $arr_condition['SU']);

        // where 조건
        $where = $this->_conn->makeWhere($arr_condition['OUT']);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = '';
        empty($order_by) === false && $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        is_null($limit) === false && is_null($offset) === false && $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        // 쿼리 실행
        $query = $this->_conn->query('select straight_join ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 매출현황 조회 from절 리턴
     * @param string $learn_pattern [학습형태]
     * @param array $arr_su_condition [매출합계 조회 조건]
     * @return string
     */
    private function _getListFrom($learn_pattern, $arr_su_condition)
    {
        // 매출합계 where 조건
        $where = $this->_conn->makeWhere($arr_su_condition);
        $where = $where->getMakeWhere(false);

        $from = '
            from (
                select OP.ProdCode, ifnull(sum(OP.RealPayPrice), 0) as SumPayPrice, ifnull(sum(OPR.RefundPrice), 0) as SumRefundPrice, count(*) as OrderProdCnt
                from ' . $this->_table['order'] . ' as O
                    inner join ' . $this->_table['order_product'] . ' as OP
                        on O.OrderIdx = OP.OrderIdx
                    inner join ' . $this->_table['product'] . ' as P
                        on OP.ProdCode = P.ProdCode
                    left join ' . $this->_table['product_lecture'] . ' as PL
                        on OP.ProdCode = PL.ProdCode
                    left join ' . $this->_table['order_product_refund'] . ' as OPR
                        on OP.OrderProdIdx = OPR.OrderProdIdx
            ' . $where . '                                    
                group by OP.ProdCode
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
                left join ' . $this->_table['category'] . ' as GSC
                    on SC.GroupCateCode = GSC.CateCode and SC.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as CSS
                    on P.SaleStatusCcd = CSS.Ccd and CSS.IsStatus = "Y"                                        
        ';

        return $from . $this->_getAddListQuery('from', $learn_pattern);
    }

    /**
     * 학습형태별 컬럼, 조인 테이블 쿼리 리턴
     * @param string $add_type [리턴할 쿼리 구분 : from, column, excel_column (엑셀다운로드용 컬럼)]
     * @param string $learn_pattern [학습형태]
     * @return mixed
     */
    private function _getAddListQuery($add_type, $learn_pattern)
    {
        $from = '';
        $column = '';
        $excel_column = '';

        switch ($learn_pattern) {
            case 'on_lecture' :
                // 단강좌
                $from .= '
                    left join ' . $this->_table['course'] . ' as PCO
                        on PL.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on PL.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['product_professor_concat'] . ' as VPP
                        on SU.ProdCode = VPP.ProdCode	
                    left join ' . $this->_table['cms_lecture_combine_lite'] . ' as VCL
                        on PL.wLecIdx = VCL.wLecIdx and VCL.cp_wAdminIdx = ' . $this->session->userdata('admin_idx') . '
                    left join ' . $this->_table['code'] . ' as CLT
                        on PL.LecTypeCcd = CLT.Ccd and CLT.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CLT.CcdName as LecTypeCcdName, PCO.CourseName, PSU.SubjectName, VPP.wProfName_String
                    , VCL.wProgressCcd_Name, VCL.wUnitCnt, VCL.wUnitLectureCnt';
                break;
            case 'userpack_lecture' :
                // 사용자 패키지
                $from .= '';
                $column .= ', PL.SchoolYear';
                break;
            case 'adminpack_lecture' :
                // 운영자 패키지
                $from .= '
                    left join ' . $this->_table['code'] . ' as CPT
                        on PL.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CPT.CcdName as PackTypeCcdName';
                break;
            case 'periodpack_lecture' :
                // 기간제 패키지
                $from .= '
                    left join ' . $this->_table['code'] . ' as CPT
                        on PL.PackTypeCcd = CPT.Ccd and CPT.IsStatus = "Y"                
                    left join ' . $this->_table['code'] . ' as CPP
                        on PL.StudyPeriod = CPP.CcdValue and CPP.IsStatus = "Y"';
                $column .= ', PL.SchoolYear, CPT.CcdName as PackTypeCcdName, CPP.CcdName as PackPeriodCcdName';
                break;
            case 'off_lecture' :
                // 단과반
                $from .= '
                    left join ' . $this->_table['course'] . ' as PCO
                        on PL.CourseIdx = PCO.CourseIdx and PCO.IsStatus = "Y"
                    left join ' . $this->_table['subject'] . ' as PSU
                        on PL.SubjectIdx = PSU.SubjectIdx and PSU.IsStatus = "Y"
                    left join ' . $this->_table['product_professor_concat'] . ' as VPP
                        on SU.ProdCode = VPP.ProdCode	
                    left join ' . $this->_table['code'] . ' as CCA
                        on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on PL.StudyPatternCcd = CSP.Ccd and CSP.IsStatus = "Y"        
                    left join ' . $this->_table['code'] . ' as CAS
                        on PL.AcceptStatusCcd = CAS.Ccd and CAS.IsStatus = "Y"';
                $column .= ', CCA.CcdName as CampusCcdName, PL.SchoolYear, CSP.CcdName as StudyPatternCcdName, PL.SchoolStartYear, PL.SchoolStartMonth
                    , PCO.CourseName, PSU.SubjectName, VPP.wProfName_String, PL.IsLecOpen, CAS.CcdName as AcceptStatusCcdName';
                break;
            case 'off_pack_lecture' :
                // 종합반
                $from .= '
                    left join ' . $this->_table['code'] . ' as CCA
                        on PL.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"
                    left join ' . $this->_table['code'] . ' as CSP
                        on PL.StudyPatternCcd = CSP.Ccd and CSP.IsStatus = "Y"        
                    left join ' . $this->_table['code'] . ' as CAS
                        on PL.AcceptStatusCcd = CAS.Ccd and CAS.IsStatus = "Y"';
                $column .= ', CCA.CcdName as CampusCcdName, PL.SchoolYear, CSP.CcdName as StudyPatternCcdName, PL.SchoolStartYear, PL.SchoolStartMonth
                    , PL.IsLecOpen, CAS.CcdName as AcceptStatusCcdName';
                break;
            case 'book' :
                // 교재
                $from .= '
                    left join ' . $this->_table['product_book'] . ' as PB
                        on SU.ProdCode = PB.ProdCode		
                    left join ' . $this->_table['product_book_professor_subject_concat'] . ' as VPB
                        on SU.ProdCode = VPB.ProdCode			
                    left join ' . $this->_table['bms_book_combine'] . ' as VBB
                        on PB.wBookIdx = VBB.wBookIdx';
                $column .= ', VPB.ProfSubjectNames, VBB.wPublName, VBB.wAuthorNames';
                break;
            default :
                break;
        }

        return ${$add_type};
    }
}
