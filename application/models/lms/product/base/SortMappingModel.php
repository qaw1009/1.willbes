<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SortMappingModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
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
    public function listAllSortMapping($arr_condition = [])
    {
        $colum = 'U.*, A.wAdminName as LastRegAdminName
            , (select count(*) from ' . $this->_table['subject_r_category'] . ' where SiteCode = U.SiteCode and CateCode = U.LastCateCode) as CateSubjectCnt
            , (select count(*) from ' . $this->_table['subject_r_category_r_code'] . ' where SiteCode = U.SiteCode and CateCode = U.LastCateCode) as ComplexSubjectCnt
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
            ) as U inner join ' . $this->_table['admin'] . ' as A
                on U.LastRegAdminIdx = A.wAdminIdx 
        ';

        $arr_condition['IN']['U.SiteCode'] = get_auth_site_codes();
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = $this->_conn->makeOrderBy(['SiteCode' => 'asc', 'BOrderNum' => 'asc', 'MOrderNum' => 'asc'])->getMakeOrderBy();

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return $query->result_array();
    }

    /**
     * 복합연결 목록 조회
     * @param $site_code
     * @param $cate_code
     * @param $group_child_ccd
     * @return mixed
     */
    public function listChildSubjectMapping($site_code, $cate_code, $group_child_ccd)
    {
        $colum = 'PSC.ChildCcd, max(CC.CcdName) as ChildName, GROUP_CONCAT(PS.SubjectName order by PS.SubjectIdx asc separator ", ") as SubjectNames';
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
                and CC.GroupCcd = ? and CC.IsUse = "Y" and CC.IsStatus = "Y"                
                and PS.IsUse = "Y" and PS.IsStatus = "Y"                           
                and PSC.IsStatus = "Y"
        ';
        $group_by = ' group by PSC.ChildCcd';
        $order_by = ' order by PSC.ChildCcd asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $group_by . $order_by, [$site_code, $cate_code, $group_child_ccd]);

        return $query->result_array();
    }

    /**
     * 과목 연결 데이터 조회
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
        if ($conn_type != 'category') {
            $_table_key .= '_r_code';
            $_and_condition = ' and PSC.ChildCcd = ?';
            $_binds = [$child_ccd, $site_code, $cate_code];
        }

        $colum = 'PS.SubjectIdx, PS.SubjectName, ifnull(PSC.SubjectIdx, "") as RSubjectIdx';
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
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by, $_binds);

        return $query->result_array();
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
        $_table_key = 'subject_r_category';
        $_arr_condition = ['SiteCode' => $site_code, 'CateCode' => $cate_code, 'IsStatus' => 'Y'];

        // 복합연결일 경우
        if ($conn_type != 'category') {
            $_table_key .= '_r_code';
            $_arr_condition['ChildCcd'] = $child_ccd;
        }

        try {
            $_table = $this->_table[$_table_key];
            $arr_subject_idx = (is_null($arr_subject_idx) === true) ? [] : array_values(array_unique($arr_subject_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 과목 연결 데이터 조회
            $data = $this->_conn->getListResult($_table, 'SubjectIdx', ['EQ' => $_arr_condition]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'SubjectIdx');

                // 기존 등록된 과목 연결 데이터 삭제 처리 (전달된 과목 식별자 중에 기 등록된 과목 식별자가 없다면 삭제 처리)
                foreach ($data as $ori_subject_idx) {
                    if (in_array($ori_subject_idx, $arr_subject_idx) === false) {
                        $upd_query = $this->_conn->set([
                            'IsStatus' => 'N',
                            'UpdAdminIdx' => $admin_idx
                        ])->where('SiteCode', $site_code)->where('CateCode', $cate_code)->where('SubjectIdx', $ori_subject_idx);

                        // 복합연결일 경우
                        if ($conn_type != 'category') {
                            $upd_query = $upd_query->where('ChildCcd', $child_ccd);
                        }

                        $is_update = $upd_query->update($_table);
                        if ($is_update === false) {
                            throw new \Exception('기 설정된 과목 연결 데이터 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 과목 식별자 중에 전달된 과목 식별자가 없다면 등록 처리)
            foreach ($arr_subject_idx as $subject_idx) {
                if (in_array($subject_idx, $data) === false) {
                    $ins_query = $this->_conn->set([
                        'SiteCode' => $site_code,
                        'CateCode' => $cate_code,
                        'SubjectIdx' => $subject_idx,
                        'RegAdminIdx' => $admin_idx,
                        'RegIp' => $this->input->ip_address()
                    ]);

                    // 복합연결일 경우
                    if ($conn_type != 'category') {
                        $ins_query = $ins_query->set('ChildCcd', $child_ccd);
                    }

                    $is_insert = $ins_query->insert($_table);
                    if ($is_insert === false) {
                        throw new \Exception('과목 연결 데이터 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
