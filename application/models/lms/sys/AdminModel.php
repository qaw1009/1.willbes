<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends WB_Model
{
    private $_table = [
        'site' => 'lms_site',
        'site_r_campus' => 'lms_site_r_campus',
        'admin_r_site_campus' => 'lms_sys_admin_r_site_campus',
        'admin_r_admin_role' => 'lms_sys_admin_r_admin_role',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin'
    ];
    private $_ccd = [
        'Campus' => '605'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 운영자 계정 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listAdmin($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '*';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $in_colum = '
                A.wAdminIdx, A.wAdminId, A.wAdminName, A.wAdminPositionCcd, A.wAdminDeptCcd, A.wAdminPhone1, A.wAdminPhone2, A.wAdminPhone3, A.wAdminMail
                    , A.wIsUse, A.wRegDatm, A.wRegAdminIdx                                        
                    , ifnull(AR.RoleIdx, "") as RoleIdx
                    , if((select count(*) from ' . $this->_table['admin_r_site_campus'] . ' where wAdminIdx = A.wAdminIdx and IsStatus = "Y") > 0, "Y", "N") as IsSiteCampus
                    , (case when A.wAdminIdx = A.wRegAdminIdx 
                            then A.wAdminName
                            else (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wRegAdminIdx and wIsStatus = "Y")
                      end) as wRegAdminName       
            ';

        $from = '
            from ' . $this->_table['admin'] . ' as A 
                left join ' . $this->_table['admin_r_admin_role'] . ' as AR 
                    on A.wAdminIdx = AR.wAdminIdx and AR.IsStatus = "Y"
            where A.wIsApproval = "Y" and A.wIsStatus = "Y"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from ( select ' . $in_colum . $from . ' ) U '. $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 운영자 계정 수정 폼을 위한 데이터 조회
     * @param $admin_idx
     * @return array
     */
    public function findAdminForModify($admin_idx)
    {
        $column = 'A.wAdminIdx, A.wAdminId, A.wAdminName, A.wAdminPositionCcd, A.wAdminDeptCcd, A.wAdminPhone1, A.wAdminPhone2, A.wAdminPhone3, A.wAdminMail';
        $column .= ' , A.wIsUse, A.wRegDatm, A.wRegAdminIdx, A.wUpdDatm, A.wUpdAdminIdx';
        $column .= ' , ifnull(AR.RoleIdx, "") as RoleIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(A.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = A.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';

        return $this->_conn->getJoinFindResult($this->_table['admin'] . ' as A', 'left', $this->_table['admin_r_admin_role'] . ' as AR', 'A.wAdminIdx = AR.wAdminIdx and AR.IsStatus = "Y"',
            $column, ['EQ' => ['A.wAdminIdx' => $admin_idx]]);
    }

    /**
     * 운영자별 사이트, 캠퍼스 권한 부여 목록
     * @param $admin_idx
     * @return array
     */
    public function listAdminSiteCampus($admin_idx)
    {
        $column = 'S.SiteCode, S.SiteName
            , if(ASC1.SiteCode is not null, "Y", "N") as IsPermSite
            , if(SC.SiteCode is not null, GROUP_CONCAT(DISTINCT SC.CampusCcd, "::", C.CcdName, "::", if(ASC2.CampusCcd is not null, "Y", "N") order by SC.CampusCcd separator ","), "0") as CampusCcds
        ';
        $from = '
            from ' . $this->_table['site'] . ' as S 
                left join ' . $this->_table['site_r_campus'] . ' as SC
                    on S.SiteCode = SC.SiteCode and SC.IsStatus = "Y"
                left join ' . $this->_table['admin_r_site_campus'] . ' as ASC1
                    on ASC1.wAdminIdx = ? and S.SiteCode = ASC1.SiteCode and ASC1.IsStatus = "Y"
                left join ' . $this->_table['admin_r_site_campus'] . ' as ASC2
                    on ASC2.wAdminIdx = ? and S.SiteCode = ASC2.SiteCode and SC.CampusCcd = ASC2.CampusCcd and ASC2.IsStatus = "Y"
                left join ' . $this->_table['code'] . ' as C 
                    on SC.CampusCcd = C.Ccd and C.GroupCcd = ? and C.IsUse = "Y" and C.IsStatus = "Y"        
        ';
        $where = ' where S.IsUse = "Y" and S.IsStatus = "Y"';
        $group_by = ' group by S.SiteCode';
        $order_by = ' order by S.SiteCode';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by, [$admin_idx, $admin_idx, $this->_ccd['Campus']]);

        return $query->result_array();
    }

    /**
     * 운영자 권한유형, 사이트, 캠퍼스 권한 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyAdmin($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $admin_idx = element('idx', $input);

            // 사이트, 캠퍼스 권한 등록/삭제
            $is_update = $this->replaceSiteCampus(element('site_code', $input, []), element('campus_ccd', $input, []), $admin_idx);
            if ($is_update !== true) {
                throw new \Exception($is_update);
            }
            
            // 운영자 권한 변경
            $is_update = $this->_replaceAdminRole(element('role_idx', $input), $admin_idx);
            if ($is_update !== true) {
                throw new \Exception($is_update);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 운영자별 사이트, 캠퍼스 등록/삭제
     * @param array $arr_site_code
     * @param array $arr_campus_ccd
     * @param $admin_idx
     * @return bool|string
     */
    public function replaceSiteCampus($arr_site_code = [], $arr_campus_ccd = [], $admin_idx)
    {
        try {
            $_table = $this->_table['admin_r_site_campus'];
            $sess_admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 사이트, 캠퍼스 조회
            $list = $this->_conn->getListResult($_table, 'SiteCode, CampusCcd', ['EQ' => ['wAdminIdx' => $admin_idx, 'IsStatus' => 'Y']]);
            $data = [];
            foreach ($list as $row) {
                $data[$row['SiteCode']][] = $row['CampusCcd'];
            }

            // 기존 등록된 사이트, 캠퍼스 삭제 처리 (전달된 사이트, 캠퍼스 중에 기 등록된 사이트, 캠퍼스가 없다면 삭제 처리)
            if (count($data) > 0) {
                $tmp_arr_campus_ccd = $arr_campus_ccd;
                foreach ($data as $ori_site_code => $ori_arr_campus_ccd) {
                    // 캠퍼스가 없는 사이트일 경우 디폴트 캠퍼스 배열 생성
                    if (in_array($ori_site_code, $arr_site_code) === true && isset($tmp_arr_campus_ccd[$ori_site_code]) === false) {
                        $tmp_arr_campus_ccd[$ori_site_code][0] = '0';
                    }

                    foreach ($ori_arr_campus_ccd as $ori_campus_ccd) {
                        if (in_array($ori_campus_ccd, element($ori_site_code, $tmp_arr_campus_ccd, [])) === false) {
                            $is_update = $this->_conn->set([
                                'IsStatus' => 'N',
                                'UpdAdminIdx' => $sess_admin_idx
                            ])->where('wAdminIdx', $admin_idx)->where('SiteCode', $ori_site_code)->where('CampusCcd', $ori_campus_ccd)->update($_table);

                            if ($is_update === false) {
                                throw new \Exception('기 설정된 캠퍼스 수정에 실패했습니다.');
                            }
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 사이트, 캠퍼스 중에 전달된 사이트, 캠퍼스가 없다면 등록 처리)
            $tmp_arr_campus_ccd = $arr_campus_ccd;
            foreach ($arr_site_code as $site_code) {
                if (empty($site_code) === false) {
                    // 캠퍼스가 없는 사이트일 경우 디폴트 캠퍼스 배열 생성
                    isset($tmp_arr_campus_ccd[$site_code]) === false && $tmp_arr_campus_ccd[$site_code][0] = '0';

                    foreach ($tmp_arr_campus_ccd[$site_code] as $campus_ccd) {
                        if (in_array($campus_ccd, element($site_code, $data, [])) === false) {
                            $is_insert = $this->_conn->set([
                                'wAdminIdx' => $admin_idx,
                                'SiteCode' => $site_code,
                                'CampusCcd' => $campus_ccd,
                                'RegAdminIdx' => $sess_admin_idx,
                                'RegIp' => $this->input->ip_address()
                            ])->insert($_table);

                            if ($is_insert === false) {
                                throw new \Exception('캠퍼스 등록에 실패했습니다.');
                            }
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 운영자 권한 변경 (목록에서 직접 실행)
     * @param string $role_idx
     * @param $admin_idx
     * @return array|bool
     */
    public function replaceAdminRole($role_idx = '', $admin_idx)
    {
        $this->_conn->trans_begin();

        try {
            $is_update = $this->_replaceAdminRole($role_idx, $admin_idx);
            if ($is_update !== true) {
                throw new \Exception($is_update);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 운영자 권한 변경
     * @param string $role_idx
     * @param $admin_idx
     * @return bool|string
     */
    private function _replaceAdminRole($role_idx, $admin_idx)
    {
        try {
            $_table = $this->_table['admin_r_admin_role'];
            $sess_admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 권한 조회
            $chk_row = $this->_conn->getListResult($_table, 'RoleIdx', ['EQ' => ['wAdminIdx' => $admin_idx, 'IsStatus' => 'Y']], 1, 0, ['ArIdx' => 'desc']);
            if (empty($chk_row) === false) {
                // 기존 설정된 권한과 변경할 권한이 동일하다면 신규등록 안함
                if ($role_idx == $chk_row[0]['RoleIdx']) {
                    return true;
                }

                // 권한이 변경되었다면 기존 설정된 권한 삭제 처리
                $is_update = $this->_conn->set('IsStatus', 'N')->set('UpdAdminIdx', $sess_admin_idx)
                    ->where('wAdminIdx', $admin_idx)->where('IsStatus', 'Y')->update($_table);
                if ($is_update === false) {
                    throw new \Exception('기 설정된 권한유형 수정에 실패했습니다.');
                }
            }

            // 신규 권한 등록
            if (empty($role_idx) === false) {
                $data = [
                    'wAdminIdx' => $admin_idx,
                    'RoleIdx' => $role_idx,
                    'RegAdminIdx' => $sess_admin_idx,
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($data)->insert($_table) === false) {
                    throw new \Exception('권한유형 등록에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
