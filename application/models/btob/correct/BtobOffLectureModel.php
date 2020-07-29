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
        'lms_correct_unit' => 'lms_correct_unit',
        'lms_correct_unit_assignment' => 'lms_correct_unit_assignment',
        'lms_product' => 'lms_product'
        ,'lms_product_lecture' => 'lms_product_lecture'
        ,'lms_product_course' => 'lms_product_course'
        ,'lms_product_subject' => 'lms_product_subject'
        ,'lms_product_r_category' => 'lms_product_r_category'
        ,'vw_product_r_professor_concat_repr' => 'vw_product_r_professor_concat_repr'
        ,'lms_site' => 'lms_site'
        ,'lms_sys_code' => 'lms_sys_code'
        ,'lms_sys_category' => 'lms_sys_category'
        ,'lms_correct_assign' => 'lms_correct_assign'
        ,'lms_correct_assign_detail' => 'lms_correct_assign_detail'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 첨삭용 상품정보
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param bool $is_authority
     * @return mixed
     */
    public function listLecture($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $is_authority = true)
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
                ,(
                    SELECT COUNT(*) AS cnt FROM '.$this->_table['lms_correct_unit'].' WHERE ProdCode = A.ProdCode AND IsStatus = \'Y\'
                ) AS unitCount #회차수
                ,(
                    SELECT COUNT(*) AS cnt
                    FROM '.$this->_table['lms_correct_unit'].' AS a1
                    INNER JOIN '.$this->_table['lms_correct_unit_assignment'].' AS b1 ON a1.CorrectIdx = b1.CorrectIdx
                    WHERE a1.ProdCode = A.ProdCode AND a1.IsStatus = \'Y\' AND b1.IsStatus = \'Y\'
                ) AS assignMentCount #제출인원
                ,(
                    SELECT COUNT(*) AS cnt
                    FROM '.$this->_table['lms_correct_unit'].' AS a1
                    INNER JOIN '.$this->_table['lms_correct_unit_assignment'].' AS b1 ON a1.CorrectIdx = b1.CorrectIdx
                    WHERE a1.ProdCode = A.ProdCode AND a1.IsStatus = \'Y\' AND b1.IsStatus = \'Y\' AND IsReply = \'N\'
                ) AS replyNCount #미채점
                ,(
                    SELECT COUNT(*) AS cnt
                    FROM '.$this->_table['lms_correct_unit'].' AS a1
                    INNER JOIN '.$this->_table['lms_correct_unit_assignment'].' AS b1 ON a1.CorrectIdx = b1.CorrectIdx
                    WHERE a1.ProdCode = A.ProdCode AND a1.IsStatus = \'Y\' AND b1.IsStatus = \'Y\' AND IsReply = \'Y\'
                ) AS replyYCount #채점완료
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

        if ($is_authority === false) {
            $from .= "
                INNER JOIN (
                    SELECT a.ProdCode
                    FROM {$this->_table['lms_correct_assign']} AS a
                    INNER JOIN {$this->_table['lms_correct_assign_detail']} AS b ON a.CaIdx = b.CaIdx
                    WHERE b.AssignAdminIdx = '{$this->session->userdata('btob.admin_idx')}'
                    GROUP BY a.ProdCode
                ) AS assign ON A.ProdCode = assign.ProdCode
            ";
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $where .= "AND FIND_IN_SET('{$this->_ccd['correct_option_ccd']}',A.OptionCcds)";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}