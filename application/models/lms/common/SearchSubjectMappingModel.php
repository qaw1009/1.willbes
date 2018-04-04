<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchSubjectMappingModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'category' => 'lms_sys_category',
        'subject' => 'lms_product_subject',
        'subject_r_category' => 'lms_product_subject_r_category',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 카테고리 과목 연결 목록 조회 (교수관리 > 카테고리 검색)
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listSearchSubjectMapping($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $colum = '
                PSC.CsIdx, S.SiteCode, S.SiteName
                    , C.CateCode, C.CateName, ifnull(PC.CateCode, "") as ParentCateCode, ifnull(PC.CateName, "") as ParentCateName
                    , concat(S.SiteName, if(PC.CateCode is null, "", concat(" > ", PC.CateName)), " > ", C.CateName, " > ", PS.SubjectName) as CateSubjectRouteName	
                    , PS.SubjectIdx, PS.SubjectName, PSC.RegDatm, PSC.RegAdminIdx, A.wAdminName as RegAdminName	                
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                left join ' . $this->_table['category'] . ' as PC
                    on C.ParentCateCode = PC.CateCode and PC.IsStatus = "Y"
                inner join ' . $this->_table['subject'] . ' as PS
                    on S.SiteCode = PS.SiteCode
                inner join ' . $this->_table['subject_r_category'] . ' as PSC
                    on S.SiteCode = PSC.SiteCode and C.CateCode = PSC.CateCode and PS.SubjectIdx = PSC.SubjectIdx
                inner join ' . $this->_table['admin'] . ' as A
                    on PSC.RegAdminIdx = A.wAdminIdx
            where S.IsStatus = "Y"
                and C.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"
                and PSC.IsStatus = "Y"                 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
