<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseProductFModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'course' => 'lms_product_course',
        'subject' => 'lms_product_subject',
        'subject_r_category' => 'lms_product_subject_r_category',
        'subject_r_category_r_code' => 'lms_product_subject_r_category_r_code',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'professor_r_subject_r_category' => 'lms_professor_r_subject_r_category',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 과정 데이터 조회
     * @param $site_code
     * @return array
     */
    public function listCourse($site_code)
    {
        $column = 'PC.CourseIdx, PC.CourseName';
        $arr_condition = [
            'EQ' => [
                'PC.SiteCode' => $site_code, 'PC.IsUse' => 'Y', 'PC.IsStatus' => 'Y',
                'S.IsUse' => 'Y', 'S.IsStatus' => 'Y',
            ]
        ];

        return $this->_conn->getJoinListResult($this->_table['course'] . ' as PC', 'inner', $this->_table['site'] . ' as S', 'PC.SiteCode = S.SiteCode'
            , $column, $arr_condition, null, null, ['PC.OrderNum' => 'asc']
        );
    }

    /**
     * 카테고리별 과목 데이터 조회
     * @param string $site_code
     * @param null|string $cate_code
     * @return mixed
     */
    public function listSubjectCategoryMapping($site_code, $cate_code = null)
    {
        $column = 'PSC.CateCode, PSC.SubjectIdx, PS.SubjectName';
        $from = '
            from ' . $this->_table['subject_r_category'] . ' as PSC 
                inner join ' . $this->_table['site'] . ' as S
                    on PSC.SiteCode = S.SiteCode
                inner join ' . $this->_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx
            where PSC.SiteCode = ? and PSC.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere(['EQ' => ['PSC.CateCode' => $cate_code]]);
        $where = $where->getMakeWhere(true);
        $order_by = ' order by SC.OrderNum asc, PS.OrderNum asc, PSC.CsIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$site_code]);

        return $query->result_array();
    }

    /**
     * 직렬별 과목 데이터 조회
     * @param $site_code
     * @param null|string $cate_code
     * @param null|string $child_ccd
     * @return mixed
     */
    public function listSubjectSeriesMapping($site_code, $cate_code = null, $child_ccd = null)
    {
        $add_join = $group_by = '';
        if (empty($child_ccd) === true) {
            $column = 'PSC.CateCode, PSC.SubjectIdx, max(PS.SubjectName) as SubjectName';
            $group_by = ' group by PSC.CateCode, PSC.SubjectIdx';
        } else {
            $column = 'PSC.CateCode, PSC.SubjectIdx, PS.SubjectName, PSC.ChildCcd, CD.CcdName as ChildName';
            $add_join = ' inner join ' . $this->_table['code'] . ' as CD on PSC.ChildCcd = CD.Ccd';
        }

        $from = '
            from ' . $this->_table['subject_r_category_r_code'] . ' as PSC 
                inner join ' . $this->_table['site'] . ' as S
                    on PSC.SiteCode = S.SiteCode
                inner join ' . $this->_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx' . $add_join . '
            where PSC.SiteCode = ? and PSC.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere(['EQ' => ['PSC.CateCode' => $cate_code, 'PSC.ChildCcd' => $child_ccd]]);
        $where = $where->getMakeWhere(true);
        $order_by = ' order by SC.OrderNum asc, PS.OrderNum asc, PSC.CsIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by, [$site_code]);

        return $query->result_array();
    }

    /**
     * 카테고리별 직렬 데이터 조회
     * @param $site_code
     * @param null|string $cate_code
     * @return mixed
     */
    public function listSeriesCategoryMapping($site_code, $cate_code = null)
    {
        $column = 'PSC.CateCode, PSC.ChildCcd, fn_ccd_name(PSC.ChildCcd) as ChildName';
        $from = '
            from ' . $this->_table['subject_r_category_r_code'] . ' as PSC 
                inner join ' . $this->_table['site'] . ' as S
                    on PSC.SiteCode = S.SiteCode
                inner join ' . $this->_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
            where PSC.SiteCode = ? and PSC.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsStatus = "Y"            
        ';

        $where = $this->_conn->makeWhere(['EQ' => ['PSC.CateCode' => $cate_code]]);
        $where = $where->getMakeWhere(true);
        $order_by = ' group by PSC.CateCode, PSC.ChildCcd order by SC.OrderNum asc, PSC.CsIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$site_code]);

        return $query->result_array();
    }

    /**
     * 과목별 교수 데이터 조회
     * @param $site_code
     * @param null|$cate_code
     * @param null|$subject_idx
     * @return mixed
     */
    public function listProfessorSubjectMapping($site_code, $cate_code = null, $subject_idx = null)
    {
        $column = 'PSC.CateCode, P.ProfIdx, P.wProfIdx, WP.wProfName, P.ProfNickName, PSC.SubjectIdx, PS.SubjectName';
        $from = '
            from ' . $this->_table['professor_r_subject_r_category'] . ' as PSC
                inner join ' . $this->_table['professor'] . ' as P
                    on PSC.ProfIdx = P.ProfIdx
                inner join ' . $this->_table['pms_professor'] . ' as WP
                    on P.wProfIdx = WP.wProfIdx
                inner join ' . $this->_table['site'] . ' as S
                    on P.SiteCode = S.SiteCode
                inner join ' . $this->_table['category'] . ' as SC
                    on PSC.CateCode = SC.CateCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on PSC.SubjectIdx = PS.SubjectIdx
            where P.SiteCode = ? and P.IsUse = "Y" and P.IsStatus = "Y"
                and WP.wIsUse = "Y" and WP.wIsStatus = "Y"
                and PSC.IsStatus = "Y"
                and S.IsUse = "Y" and S.IsStatus = "Y"
                and SC.IsUse = "Y" and SC.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"	        
        ';

        $where = $this->_conn->makeWhere(['EQ' => ['PSC.CateCode' => $cate_code, 'PSC.SubjectIdx' => $subject_idx]]);
        $where = $where->getMakeWhere(true);
        $order_by = ' order by SC.OrderNum asc, PS.OrderNum asc, PSC.PcIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$site_code]);

        return $query->result_array();
    }
}
