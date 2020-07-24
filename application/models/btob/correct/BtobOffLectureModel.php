<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobOffLectureModel extends WB_Model
{
    public $_ccd = [
        'correct_option_ccd' => '731001',
        'learn_pattern' => '615006',
        'prod_type' => '636002',
    ];

    private $_table = [
        'lms_product' => 'lms_product'
        ,'lms_product_lecture' => 'lms_product_lecture'
        ,'lms_product_course' => 'lms_product_course'
        ,'lms_product_subject' => 'lms_product_subject'
        ,'lms_product_r_category' => 'lms_product_r_category'
        ,'vw_product_r_professor_concat_repr' => 'vw_product_r_professor_concat_repr'
        ,'lms_site' => 'lms_site'
        ,'lms_sys_code' => 'lms_sys_code'
        ,'lms_sys_category' => 'lms_sys_category'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                A.ProdCode,A.ProdName,A.ProdNameShort,A.IsNew,A.IsBest,A.IsUse,A.RegDatm
                ,DATE_FORMAT(SaleStartDatm,\'%Y-%m-%d\') AS SaleStartDatm,DATE_FORMAT(SaleEndDatm,\'%Y-%m-%d\') AS SaleEndDatm
                ,Aa.CcdName AS SaleStatusCcd_Name,A.SiteCode,Ab.SiteName,Ac.CcdName AS ProdTypeCcd_Name
                ,B.CourseIdx,B.SubjectIdx,B.LearnPatternCcd,B.SchoolYear,B.FixNumber,B.StudyStartDate,B.StudyEndDate,B.IsLecOpen
                ,B.SchoolStartYear,B.SchoolStartMonth,B.AcceptStatusCcd,B.OrderNum,B.ProfChoiceStartDate,B.ProfChoiceEndDate,B.LecSaleType
                ,Ba.CourseName,Bb.SubjectName,E.wProfName_String
                ,Bg.CcdName AS CampusCcd_Name,Bc.CcdName AS LearnPatternCcd_Name,Bd.CcdName AS StudyPatternCcd_Name,Be.CcdName AS StudyApplyCcd_Name
                ,Ca.CateName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['lms_product']} A
            INNER JOIN {$this->_table['lms_sys_code']} Aa ON A.SaleStatusCcd = Aa.Ccd AND Aa.IsStatus='Y'
            INNER JOIN {$this->_table['lms_site']} Ab ON A.SiteCode = Ab.SiteCode
            INNER JOIN {$this->_table['lms_sys_code']} Ac ON A.ProdTypeCcd = Ac.Ccd AND Ac.IsStatus='Y'
            INNER JOIN {$this->_table['lms_product_lecture']} B ON A.ProdCode = B.ProdCode
            LEFT OUTER JOIN {$this->_table['lms_product_course']} Ba ON B.CourseIdx = Ba.CourseIdx AND Ba.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['lms_product_subject']} Bb ON B.SubjectIdx = Bb.SubjectIdx AND Bb.IsStatus='Y'
            INNER JOIN {$this->_table['lms_sys_code']} Bc ON B.LearnPatternCcd = Bc.Ccd AND Bc.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['lms_sys_code']} Bd ON B.StudyPatternCcd = Bd.Ccd AND Bd.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['lms_sys_code']} Be ON B.StudyApplyCcd = Be.Ccd AND Be.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['lms_sys_code']} Bg ON B.CampusCcd = Bg.Ccd
            INNER JOIN {$this->_table['lms_product_r_category']} C ON A.ProdCode = C.ProdCode AND C.IsStatus='Y'
            INNER JOIN {$this->_table['lms_sys_category']} Ca ON C.CateCode = Ca.CateCode  AND Ca.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['vw_product_r_professor_concat_repr']} E ON A.ProdCode = E.ProdCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= "AND FIND_IN_SET('{$this->_ccd['correct_option_ccd']}',A.OptionCcds)";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}