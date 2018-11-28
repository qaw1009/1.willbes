<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 강좌리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getListLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = ' STRAIGHT_JOIN count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = " STRAIGHT_JOIN
                     A.ProdCode, A.ProdName, A.IsNew, A.IsBest, A.IsUse, A.RegDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,Ac.CcdName as ProdTypeCcd_Name
                    ,B.CourseIdx, B.SubjectIdx, B.LearnPatternCcd, B.SchoolYear
                    ,B.MultipleApply
                    ,B.wLecIdx, B.StudyStartDate
                    ,Ba.CourseName, Bb.SubjectName, Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as LecTypeCcd_Name
                    ,Bf.CcdName as FreeLecTypeCcd_Name
                    ,Be.wProgressCcd_Name, Be.wUnitCnt, Be.wUnitLectureCnt
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,E.ProfIdx_String, E.wProfName_String
                    ,F.DivisionCount
                    ,Z.wAdminName
                    ,(
                        SELECT COUNT(*) FROM lms_order_product as OP WHERE
                        OP.PayStatusCcd IN ('676001', '676007') 
                        AND OP.ProdCode = A.ProdCode 
                    ) as Count 
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
                    FROM
                        lms_product A
                            left outer join lms_sys_code Aa on A.SaleStatusCcd = Aa.Ccd and Aa.IsStatus='Y'
                            left outer join lms_site Ab on A.SiteCode = Ab.SiteCode
                            join lms_sys_code Ac on A.ProdTypeCcd = Ac.Ccd and Ac.IsStatus='Y'
                        join lms_product_lecture B on A.ProdCode = B.ProdCode
                            left outer join lms_product_course Ba on B.CourseIdx = Ba.CourseIdx and Ba.IsStatus='Y'
                            left outer join lms_product_subject Bb on B.SubjectIdx = Bb.SubjectIdx and Bb.IsStatus='Y'
                            left outer join lms_sys_code Bc on B.LearnPatternCcd = Bc.Ccd and Bc.IsStatus='Y'
                            left outer join lms_sys_code Bd on B.LecTypeCcd = Bd.Ccd and Bd.IsStatus='Y'
                            left outer join lms_sys_code Bf on B.FreeLecTypeCcd = Bf.Ccd and Bf.IsStatus='Y'
                            left outer join wbs_cms_lecture_combine_lite Be on B.wLecIdx = Be.wLecIdx and Be.cp_wAdminIdx='{$this->session->userdata('admin_idx')}'
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus='Y'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus='Y'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd='613001' and D.IsStatus='Y'
                        left outer join vw_product_r_professor_concat E on A.ProdCode = E.ProdCode
                        left outer join (select ProdCode, count(*) as DivisionCount from lms_product_division where IsStatus='Y' group by ProdCode) as F on A.ProdCode = F.ProdCode
                        left outer join wbs_sys_admin Z on A.RegAdminIdx = Z.wAdminIdx
                     WHERE A.IsStatus='Y'
        ";

        // 사이트 권한 추가
        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 수강중인 회원 리스트
     */
    public function getListStudent()
    {
        
    }
}