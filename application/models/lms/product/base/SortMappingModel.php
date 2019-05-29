<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SortMappingModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'course' => 'lms_product_course',
        'course_r_category' => 'lms_product_course_r_category',
        'subject' => 'lms_product_subject',
        'subject_r_category' => 'lms_product_subject_r_category',
        'subject_r_category_r_code' => 'lms_product_subject_r_category_r_code',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 소트매핑 목록 조회
     * @param array $arr_condition
     * @return array
     */
    public function listSortMapping($arr_condition = [])
    {
        $column = 'U.*, A.wAdminName as LastRegAdminName
            , (select count(0) from ' . $this->_table['course_r_category'] . ' where SiteCode = U.SiteCode and CateCode = U.BCateCode) as CateCourseCnt
            , (select count(0) from ' . $this->_table['subject_r_category'] . ' where SiteCode = U.SiteCode and CateCode = U.BCateCode) as CateSubjectCnt
            , (select count(0) from ' . $this->_table['subject_r_category_r_code'] . ' where SiteCode = U.SiteCode and CateCode = U.BCateCode) as ComplexSubjectCnt
        ';
        $from = '
            from (
                select SiteCode, SiteName 
                    , BCateCode, BCateName, BCateDepth, BOrderNum, BIsUse
                    , MCateCode, MCateName, MCateDepth, MOrderNum, MIsUse
                    , if(LastCateDepth = 1, BCateCode, MCateCode) as LastCateCode
                    , if(LastCateDepth = 1, BRegAdminIdx, MRegAdminIdx) as LastRegAdminIdx
                    , if(LastCateDepth = 1, BRegDatm, MRegDatm) as LastRegDatm
                from (
                    select S.SiteCode, S.SiteName
                        , BC.CateCode as BCateCode, BC.CateName as BCateName, BC.CateDepth as BCateDepth, BC.OrderNum as BOrderNum
                        , BC.IsUse as BIsUse, BC.RegAdminIdx as BRegAdminIdx, BC.RegDatm as BRegDatm
                        , MC.CateCode as MCateCode, MC.CateName as MCateName, MC.CateDepth as MCateDepth, MC.OrderNum as MOrderNum
                        , MC.IsUse as MIsUse, MC.RegAdminIdx as MRegAdminIdx, MC.RegDatm as MRegDatm
                        , greatest(BC.CateDepth, ifnull(MC.CateDepth, 0)) as LastCateDepth
                    from ' . $this->_table['site'] . ' as S
                        inner join ' . $this->_table['category'] . ' as BC
                            on S.SiteCode = BC.SiteCode
                        left join ' . $this->_table['category'] . ' as MC
                            on MC.GroupCateCode = BC.CateCode and MC.CateDepth = 2 and MC.IsStatus = "Y"
                    where S.IsStatus = "Y" and BC.CateDepth = 1 and BC.IsStatus = "Y"
                ) as I
            ) as U 
                left join ' . $this->_table['admin'] . ' as A
                    on U.LastRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
        ';

        // 사이트 권한 추가
        $arr_condition['IN']['U.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['SiteCode' => 'asc', 'BOrderNum' => 'asc', 'MOrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 소트맵핑 과정 연결 데이터 조회
     * @param $site_code
     * @param $cate_code
     * @return mixed
     */
    public function listCourseMapping($site_code, $cate_code)
    {
        $column = 'PCO.CourseIdx, PCO.CourseName, ifnull(PCC.CourseIdx, "") as RCourseIdx';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                inner join ' . $this->_table['course'] . ' as PCO
                    on S.SiteCode = PCO.SiteCode
                left join ' . $this->_table['course_r_category'] . ' as PCC
                    on S.SiteCode = PCC.SiteCode and C.CateCode = PCC.CateCode and PCO.CourseIdx = PCC.CourseIdx and PCC.IsStatus = "Y"            
        ';
        $where = '
            where S.SiteCode = ? and S.IsStatus = "Y"
                and C.CateCode = ? and C.IsStatus = "Y"
                and PCO.IsUse = "Y" and PCO.IsStatus = "Y"            
        ';
        $order_by = ' order by PCO.CourseIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, [$site_code, $cate_code]);

        return $query->result_array();
    }

    /**
     * 소트맵핑 과목 연결 데이터 조회
     * @param $conn_type
     * @param $site_code
     * @param $cate_code
     * @param string $child_ccd
     * @return mixed
     */
    public function listSubjectMapping($conn_type, $site_code, $cate_code, $child_ccd = '')
    {
        $_table_key = 'subject_r_category';
        $_and_condition = '';
        $_binds = [$site_code, $cate_code];

        // 복합연결일 경우
        if ($conn_type == 'complex') {
            $_table_key .= '_r_code';
            $_and_condition = ' and PSC.ChildCcd = ?';
            $_binds = [$child_ccd, $site_code, $cate_code];
        }

        $column = 'PS.SubjectIdx, PS.SubjectName, ifnull(PSC.SubjectIdx, "") as RSubjectIdx';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on S.SiteCode = PS.SiteCode
                left join ' . $this->_table[$_table_key] . ' as PSC
                    on S.SiteCode = PSC.SiteCode and C.CateCode = PSC.CateCode and PS.SubjectIdx = PSC.SubjectIdx' . $_and_condition . ' and PSC.IsStatus = "Y"            
        ';
        $where = '
            where S.SiteCode = ? and S.IsStatus = "Y"
                and C.CateCode = ? and C.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"            
        ';
        $order_by = ' order by PS.SubjectIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by, $_binds);

        return $query->result_array();
    }

    /**
     * 소트맵핑 복합연결 목록 조회
     * @param $site_code
     * @param $cate_code
     * @param $group_child_ccd
     * @return mixed
     */
    public function listChildSubjectMapping($site_code, $cate_code, $group_child_ccd)
    {
        $column = 'PSC.ChildCcd, max(CC.CcdName) as ChildName, GROUP_CONCAT(PS.SubjectName order by PS.SubjectIdx asc separator ", ") as SubjectNames';
        $from = '
            from ' . $this->_table['site'] . ' as S
                inner join ' . $this->_table['category'] . ' as C
                    on S.SiteCode = C.SiteCode
                inner join ' . $this->_table['subject'] . ' as PS
                    on S.SiteCode = PS.SiteCode
                inner join ' . $this->_table['subject_r_category_r_code'] . ' as PSC
                    on S.SiteCode = PSC.SiteCode and C.CateCode = PSC.CateCode and PS.SubjectIdx = PSC.SubjectIdx
                inner join ' . $this->_table['code'] . ' as CC
                    on CC.Ccd = PSC.ChildCcd            
        ';
        $where = '
            where S.SiteCode = ? and S.IsStatus = "Y"
                and C.CateCode = ? and C.IsStatus = "Y"
                and PS.IsStatus = "Y"                           
                and PSC.IsStatus = "Y"             
                and CC.GroupCcd = ? and CC.IsStatus = "Y" and CC.IsUse="Y"
        ';
        $group_by = ' group by PSC.ChildCcd';
        $order_by = ' order by PSC.ChildCcd asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by, [$site_code, $cate_code, $group_child_ccd]);

        return $query->result_array();
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
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
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
                    on C.ParentCateCode = PC.CateCode and PC.IsUse = "Y" and PC.IsStatus = "Y"
                inner join ' . $this->_table['subject'] . ' as PS
                    on S.SiteCode = PS.SiteCode
                inner join ' . $this->_table['subject_r_category'] . ' as PSC
                    on S.SiteCode = PSC.SiteCode and C.CateCode = PSC.CateCode and PS.SubjectIdx = PSC.SubjectIdx
                left join ' . $this->_table['admin'] . ' as A
                    on PSC.RegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where S.IsUse = "Y" and S.IsStatus = "Y"
                and C.IsUse = "Y"and C.IsStatus = "Y"
                and PS.IsUse = "Y" and PS.IsStatus = "Y"
                and PSC.IsStatus = "Y"                 
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 과목 연결 등록/수정
     * @param array $input
     * @return array|bool
     */
    public function replaceSortMapping($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $conn_type = element('_conn_type', $input);
            $site_code = element('_site_code', $input);
            $cate_code = element('_cate_code', $input);
            $child_ccd = element('child_ccd', $input, '');
            $arr_subject_idx = element('subject_idx', $input);

            if ($this->_replaceSubjectMapping($conn_type, $arr_subject_idx, $site_code, $cate_code, $child_ccd) === false) {
                throw new \Exception('과목 연결에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 과목 연결 데이터 저장
     * @param $conn_type
     * @param $arr_subject_idx
     * @param $site_code
     * @param $cate_code
     * @param $child_ccd
     * @return bool|string
     */
    private function _replaceSubjectMapping($conn_type, $arr_subject_idx, $site_code, $cate_code, $child_ccd = '')
    {
        $_arr_condition = ['SiteCode' => $site_code, 'CateCode' => $cate_code, 'IsStatus' => 'Y'];

        if ($conn_type == 'course') {
            $_table_key = 'course_r_category';
            $_key_column = 'CourseIdx';
            $_title = '과정';
        } else {
            $_table_key = 'subject_r_category';
            $_key_column = 'SubjectIdx';
            $_title = '과목';

            // 복합연결일 경우
            if ($conn_type == 'complex') {
                $_table_key .= '_r_code';
                $_arr_condition['ChildCcd'] = $child_ccd;
            }
        }

        try {
            $_table = $this->_table[$_table_key];
            $arr_subject_idx = (is_null($arr_subject_idx) === true) ? [] : array_values(array_unique($arr_subject_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 과목 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, $_key_column, ['EQ' => $_arr_condition]);
            if (count($data) > 0) {
                $data = array_pluck($data, $_key_column);

                // 기존 등록된 과목 연결 데이터 삭제 처리 (전달된 과목 식별자 중에 기 등록된 과목 식별자가 없다면 삭제 처리)
                $arr_delete_subject_idx = array_diff($data, $arr_subject_idx);
                if (count($arr_delete_subject_idx) > 0) {
                    $upd_query = $this->_conn->set([
                        'IsStatus' => 'N',
                        'UpdAdminIdx' => $admin_idx
                    ])->where('SiteCode', $site_code)->where('CateCode', $cate_code)->where_in($_key_column, $arr_delete_subject_idx);

                    // 복합연결일 경우
                    if ($conn_type == 'complex') {
                        $upd_query = $upd_query->where('ChildCcd', $child_ccd);
                    }

                    $is_update = $upd_query->update($_table);
                    if ($is_update === false) {
                        throw new \Exception('기 설정된 ' . $_title . ' 연결 데이터 수정에 실패했습니다.');
                    }
                }
            }

            // 신규 등록 (기 등록된 과목 식별자 중에 전달된 과목 식별자가 없다면 등록 처리)
            $arr_insert_subject_idx = array_diff($arr_subject_idx, $data);
            foreach ($arr_insert_subject_idx as $subject_idx) {
                $ins_query = $this->_conn->set([
                    'SiteCode' => $site_code,
                    'CateCode' => $cate_code,
                    $_key_column => $subject_idx,
                    'RegAdminIdx' => $admin_idx,
                    'RegIp' => $this->input->ip_address()
                ]);

                // 복합연결일 경우
                if ($conn_type == 'complex') {
                    $ins_query = $ins_query->set('ChildCcd', $child_ccd);
                }

                $is_insert = $ins_query->insert($_table);
                if ($is_insert === false) {
                    throw new \Exception($_title . ' 연결 데이터 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
