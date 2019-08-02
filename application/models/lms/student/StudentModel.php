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
            $column = '  count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = " 
                     A.ProdCode, A.ProdName, A.IsNew, A.IsBest, A.IsUse, A.RegDatm
                    ,Aa.CcdName as SaleStatusCcd_Name,A.SiteCode,Ab.SiteName
                    ,Ac.CcdName as ProdTypeCcd_Name
                    ,B.CourseIdx, B.SubjectIdx, B.LearnPatternCcd, B.SchoolYear
                    ,B.MultipleApply
                    ,B.wLecIdx, B.StudyStartDate, B.StudyEndDate
                    ,Ba.CourseName, Bb.SubjectName, Bc.CcdName as LearnPatternCcd_Name
                    ,Bd.CcdName as LecTypeCcd_Name
                    ,Bf.CcdName as FreeLecTypeCcd_Name
                    ,Be.wProgressCcd_Name, Be.wUnitCnt, Be.wUnitLectureCnt
                    ,C.CateCode
                    ,Ca.CateName, Cb.CateName as CateName_Parent
                    ,D.SalePrice, D.SaleRate, D.RealSalePrice
                    ,E.ProfIdx_String, E.wProfName_String
                    ,Z.wAdminName
                    ,(
                        SELECT COUNT(*) FROM lms_order_product as OP WHERE
                        OP.PayStatusCcd IN ('676001', '676007') 
                        AND OP.ProdCode = A.ProdCode 
                    ) as Count
                    ,(
                        SELECT COUNT(*) FROM
                            lms_order_product as OP
                            join lms_product_r_sublecture as rs on rs.ProdCode = OP.ProdCode and rs.IsStatus = 'Y'
                        WHERE
                            OP.PayStatusCcd IN ('676001', '676007')
                            AND rs.ProdCodeSub = A.ProdCode
                            AND rs.ProdCodeSub <> rs.ProdCode
                    ) as CountPkg
                    ,B.PackTypeCCd, Bg.CcdName as PackTypeCcd_Name, B.FreeLecTypeCcd, Bh.CcdName as FreeLecTypeCcd_Name
                    ,Bi.CcdName as PackStudyPeriod_Name
                    
                    ,B.StudyPatternCcd ,Bj.CcdName as StudyPatternCcd_Name
                    ,B.StudyApplyCcd ,Bk.CcdName as StudyApplyCcd_Name
                    ,B.CampusCcd ,Bl.CcdName as CampusCcd_Name
                    ,B.AcceptStatusCcd ,Bm.CcdName as AcceptStatusCcd_Name
                    ,B.SchoolStartYear ,B.SchoolStartMonth, B.FixNumber, B.IsLecOpen
                    ,DATE_FORMAT(A.SaleStartDatm,'%Y-%m-%d') as SaleStartDatm
                    ,DATE_FORMAT(A.SaleStartDatm,'%H') as SaleStartHour
                    ,DATE_FORMAT(A.SaleEndDatm,'%Y-%m-%d') as SaleEndDatm
                    ,DATE_FORMAT(A.SaleEndDatm,'%H') as SaleEndHour
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
                            left outer join wbs_cms_lecture_basics Be on B.wLecIdx = Be.wLecIdx
                            left outer join lms_sys_code Bf on B.FreeLecTypeCcd = Bf.Ccd and Bf.IsStatus='Y'
                            left outer join lms_sys_code Bg on B.PackTypeCcd = Bg.Ccd and Bg.IsStatus='Y'
                            left outer join lms_sys_code Bh on B.FreeLecTypeCcd = Bh.Ccd and Bh.IsStatus='Y'
                            left outer join lms_sys_code Bi on B.StudyPeriod = Bi.CcdValue and Bi.IsStatus='Y' and Bi.GroupCcd='650'
                            left outer join lms_sys_code Bj on B.StudyPatternCcd = Bj.Ccd and Bj.IsStatus='Y'
                            left outer join lms_sys_code Bk on B.StudyApplyCcd = Bk.Ccd and Bk.IsStatus='Y'
                            left outer join lms_sys_code Bl on B.CampusCcd = Bl.Ccd
                            left outer join lms_sys_code Bm on B.AcceptStatusCcd = Bm.Ccd
                            
                        join lms_product_r_category C on A.ProdCode = C.ProdCode and C.IsStatus='Y'
                            join lms_sys_category Ca on C.CateCode = Ca.CateCode  and Ca.IsStatus='Y'
                            left outer join lms_sys_category Cb on Ca.ParentCateCode = Cb.CateCode
                        left outer join lms_product_sale D on A.ProdCode = D.ProdCode and D.SaleTypeCcd='613001' and D.IsStatus='Y'
                        left outer join vw_product_r_professor_concat_repr E on A.ProdCode = E.ProdCode
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
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getStudentList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = '  count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = "  M.MemIdx, M.MemName, M.MemId, fn_dec(M.PhoneEnc) as Phone, fn_dec(M.MailEnc) as Mail
                ,OP.SalePatternCcd, OPa.CcdName as SalePatternCcd_Name, OP.RealPayPrice as Price
                ,O.OrderIdx, O.payRouteCcd, Oa.CcdName as PayRouteCcd_Name, O.PayMethodCcd, Ob.CcdName as PayMethodCcd_Name
                ,O.CompleteDatm as PayDate, ifnull(A.wAdminName, '') as AdminName
                ,(SELECT RealLecEndDate FROM lms_my_lecture AS ML WHERE ML.OrderProdIdx = OP.OrderProdIdx LIMIT 1) AS EndDate
                ,fn_order_sub_product_data(OP.OrderProdIdx) as OrderSubProdData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
                    FROM 
                        lms_order_product AS OP
                            left outer join lms_sys_code OPa on OP.SalePatternCcd = OPa.Ccd and OPa.IsStatus='Y'
                        join lms_order as O on O.OrderIdx = OP.OrderIdx
                            left outer join lms_sys_code Oa on O.PayRouteCcd = Oa.Ccd and Oa.IsStatus='Y'
                            left outer join lms_sys_code Ob on O.PayMethodCcd = Ob.Ccd and Ob.IsStatus='Y'
                            left outer join wbs_sys_admin A on A.wAdminIdx = O.RegAdminIdx
                        join lms_member as M on M.MemIdx = O.MemIdx
                        join lms_member_otherinfo as MI ON MI.MemIdx = M.MemIdx
                    WHERE OP.PayStatusCcd in ('676001', '676007')                    
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 엑셀용 리스트 뽑기
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getStudentExcelList($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        $in_column = "  M.MemIdx, M.MemName, M.MemId, fn_dec(M.PhoneEnc) as Phone, fn_dec(M.MailEnc) as Mail
            ,OP.SalePatternCcd, OPa.CcdName as SalePatternCcd_Name, OP.RealPayPrice as Price
            ,O.OrderIdx, O.payRouteCcd, Oa.CcdName as PayRouteCcd_Name, O.PayMethodCcd, Ob.CcdName as PayMethodCcd_Name
            ,O.CompleteDatm as PayDate, A.wAdminName as AdminName, OP.OrderProdIdx, OP.ProdCode
            ,(SELECT RealLecEndDate FROM lms_my_lecture AS ML WHERE ML.OrderProdIdx = OP.OrderProdIdx LIMIT 1) AS EndDate
            ,fn_order_sub_product_data(OP.OrderProdIdx) as OrderSubProdData
        ";
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = "
                    FROM 
                        lms_order_product AS OP
                            left outer join lms_sys_code OPa on OP.SalePatternCcd = OPa.Ccd and OPa.IsStatus='Y'
                        join lms_order as O on O.OrderIdx = OP.OrderIdx
                            left outer join lms_sys_code Oa on O.PayRouteCcd = Oa.Ccd and Oa.IsStatus='Y'
                            left outer join lms_sys_code Ob on O.PayMethodCcd = Ob.Ccd and Ob.IsStatus='Y'
                            left outer join wbs_sys_admin A on A.wAdminIdx = O.RegAdminIdx
                        join lms_member as M on M.MemIdx = O.MemIdx
                        join lms_member_otherinfo as MI ON MI.MemIdx = M.MemIdx
                    WHERE OP.PayStatusCcd in ('676001', '676007')                    
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit)->result_array();
    }


    /**
     * 수강중인 회원 리스트 오프단과용
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getOffStudentList($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = '  count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {

            $column = "  M.MemIdx, M.MemName, M.MemId, fn_dec(M.PhoneEnc) as Phone, fn_dec(M.MailEnc) as Mail
                ,OP.SalePatternCcd, OPa.CcdName as SalePatternCcd_Name, OP.RealPayPrice as Price
                ,O.OrderIdx, O.payRouteCcd, Oa.CcdName as PayRouteCcd_Name, O.PayMethodCcd, Ob.CcdName as PayMethodCcd_Name
                ,O.CompleteDatm as PayDate, ifnull(A.wAdminName, '') as AdminName,
                (SELECT RealLecEndDate FROM lms_my_lecture AS ML WHERE ML.OrderProdIdx = OP.OrderProdIdx LIMIT 1) AS EndDate,
                IF(P.LearnPatternCcd = '615007', 'Y', 'N') AS IsPkg,
                P1.ProdName
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
                    FROM 
                        lms_order_product AS OP
                            left outer join lms_sys_code OPa on OP.SalePatternCcd = OPa.Ccd and OPa.IsStatus='Y'
                        join lms_order as O on O.OrderIdx = OP.OrderIdx
                            left outer join lms_sys_code Oa on O.PayRouteCcd = Oa.Ccd and Oa.IsStatus='Y'
                            left outer join lms_sys_code Ob on O.PayMethodCcd = Ob.Ccd and Ob.IsStatus='Y'
                            left outer join wbs_sys_admin A on A.wAdminIdx = O.RegAdminIdx
                        join lms_member AS M on M.MemIdx = O.MemIdx
                        join lms_member_otherinfo AS MI ON MI.MemIdx = M.MemIdx
                        join lms_product_lecture AS P ON P.ProdCode = OP.ProdCode
                        join lms_product AS P1 ON P1.ProdCode = OP.ProdCode
                    WHERE OP.PayStatusCcd in ('676001', '676007')    
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }


    /**
     * 엑셀용 리스트 뽑기 오프 단과용
     * @param $column
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function getOffStudentExcelList($column, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {

        $in_column = "  M.MemIdx, M.MemName, M.MemId, fn_dec(M.PhoneEnc) as Phone, fn_dec(M.MailEnc) as Mail
            ,OP.SalePatternCcd, OPa.CcdName as SalePatternCcd_Name, OP.RealPayPrice as Price
            ,O.OrderIdx, O.payRouteCcd, Oa.CcdName as PayRouteCcd_Name, O.PayMethodCcd, Ob.CcdName as PayMethodCcd_Name
            ,O.CompleteDatm as PayDate, A.wAdminName as AdminName, OP.OrderProdIdx, OP.ProdCode,
            (SELECT RealLecEndDate FROM lms_my_lecture AS ML WHERE ML.OrderProdIdx = OP.OrderProdIdx LIMIT 1) AS EndDate,
            IF(P.LearnPatternCcd = '615007', 'Y', 'N') AS IsPkg,
            CONCAT(P1.ProdName, ' [',P1.ProdCode,']') AS ProdName 
        ";
        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        $from = "
                    FROM 
                        lms_order_product AS OP
                            left outer join lms_sys_code OPa on OP.SalePatternCcd = OPa.Ccd and OPa.IsStatus='Y'
                        join lms_order as O on O.OrderIdx = OP.OrderIdx
                            left outer join lms_sys_code Oa on O.PayRouteCcd = Oa.Ccd and Oa.IsStatus='Y'
                            left outer join lms_sys_code Ob on O.PayMethodCcd = Ob.Ccd and Ob.IsStatus='Y'
                            left outer join wbs_sys_admin A on A.wAdminIdx = O.RegAdminIdx
                        join lms_member AS M on M.MemIdx = O.MemIdx
                        join lms_member_otherinfo AS MI ON MI.MemIdx = M.MemIdx
                        join lms_product_lecture AS P ON P.ProdCode = OP.ProdCode
                        join lms_product AS P1 ON P1.ProdCode = OP.ProdCode
                    WHERE OP.PayStatusCcd in ('676001', '676007')
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        return $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit)->result_array();
    }

    //
    public function getProdCode($ProdCode)
    {
        $query = "SELECT DISTINCT ProdCode FROM lms_product_r_sublecture where IsStatus = 'Y' AND ProdCodeSub = {$ProdCode}";
        return $this->_conn->query($query)->result_array();
    }

}