<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends WB_Model
{
    private $_table = [
        'admin_role' => 'wbs_sys_admin_role',
        'admin_role_r_cp' => 'wbs_sys_admin_role_r_cp',
        'admin_role_r_menu' => 'wbs_sys_admin_role_r_menu',
        'menu' => 'wbs_sys_menu',
        'cp' => 'wbs_sys_cp',
        'admin' => 'wbs_sys_admin'
    ];
    
    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 권한유형 관리 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listRole($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'R.wRoleIdx, R.wRoleName, R.wIsUse, R.wRegDatm, R.wRegAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $arr_condition['EQ']['R.wIsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['admin_role'] . ' as R', $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 권한유형 코드 목록 조회
     * @return array
     */
    public function getRoleArray()
    {
        $data = $this->_conn->getListResult($this->_table['admin_role'], 'wRoleIdx, wRoleName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wRoleIdx' => 'asc'
        ]);

        return array_pluck($data, 'wRoleName', 'wRoleIdx');
    }

    /**
     * 권한유형 관리 수정 폼을 위한 데이터 조회 
     * @param $role_idx
     * @return array
     */
    public function findRoleForModify($role_idx)
    {
        $column = 'R.wRoleIdx, R.wRoleName, R.wIsUse, R.wRegDatm, R.wRegAdminIdx, R.wUpdDatm, R.wUpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.wRegAdminIdx and wIsStatus = "Y") as wRegAdminName';
        $column .= ' , if(R.wUpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.wUpdAdminIdx and wIsStatus = "Y")) as wUpdAdminName';

        return $this->_conn->getFindResult($this->_table['admin_role'] . ' as R', $column, [
            'EQ' => ['R.wRoleIdx' => $role_idx]
        ]);
    }

    /**
     * 권한유형 저장
     * @param array $input
     * @return array|bool
     */
    public function addRole($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wRoleName' => element('role_name', $input),
                'wIsUse' => element('is_use', $input),
                'wRegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($data)->insert($this->_table['admin_role']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // 등록된 역할식별자
            $role_idx = $this->_conn->insert_id();

            // 권한유형별 CP사 정보 등록
            if ($this->replaceRoleCp(element('cp_idx', $input), $role_idx) !== true) {
                throw new \Exception('CP사 정보 등록에 실패했습니다.');
            }

            // 권한유형별 메뉴 정보 등록
            if ($this->replaceRoleMenu(element('menu_idx', $input), $role_idx) !== true) {
                throw new \Exception('메뉴 정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 권한유형 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyRole($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $role_idx = element('idx', $input);

            $data = [
                'wRoleName' => element('role_name', $input),
                'wIsUse' => element('is_use', $input),
                'wUpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($data)->where('wRoleIdx', $role_idx);

            if ($this->_conn->update($this->_table['admin_role']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 권한유형별 CP사 정보 등록
            if ($this->replaceRoleCp(element('cp_idx', $input), $role_idx) !== true) {
                throw new \Exception('CP사 정보 등록에 실패했습니다.');
            }

            // 권한유형별 메뉴 정보 등록
            if ($this->replaceRoleMenu(element('menu_idx', $input), $role_idx) !== true) {
                throw new \Exception('메뉴 정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 권한유형별 CP사 목록 조회
     * @param int $role_idx
     * @return array
     */
    public function listRoleCp($role_idx = 0)
    {
        $role_idx = (is_null($role_idx) === true) ? 0 : $role_idx;
        $column = 'C.wCpIdx, C.wCpName, ifnull(RC.wCpIdx, 0) as wRCpIdx';
        $from = '
            from ' . $this->_table['cp'] . ' as C 
                left join ' . $this->_table['admin_role_r_cp'] . ' as RC
                    on C.wCpIdx = RC.wCpIdx and RC.wIsStatus = "Y" and RC.wRoleIdx = ?	
            where C.wIsUse = "Y" and C.wIsStatus = "Y"       
        ';
        $order_by_offset_limit = ' order by C.wCpIdx asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by_offset_limit, [$role_idx]);

        return $query->result_array();
    }

    /**
     * 권한유형별 CP사 등록
     * @param array $arr_cp_idx
     * @param $role_idx
     * @return bool|string
     */
    public function replaceRoleCp($arr_cp_idx = [], $role_idx)
    {
        try {
            $_table = $this->_table['admin_role_r_cp'];
            $arr_cp_idx = (is_null($arr_cp_idx) === true) ? [] : array_values(array_unique($arr_cp_idx));
            $admin_idx = $this->session->userdata('admin_idx');

            // 기존 설정된 CP사 조회
            $data = $this->_conn->getListResult($_table, 'wCpIdx', ['EQ' => ['wRoleIdx' => $role_idx, 'wIsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'wCpIdx');

                // 기존 등록된 CP사 삭제 처리 (전달된 CP사 식별자 중에 기 등록된 CP사 식별자가 없다면 삭제 처리)
                foreach ($data as $ori_cp_idx) {
                    if (in_array($ori_cp_idx, $arr_cp_idx) === false) {
                        $is_update = $this->_conn->set([
                            'wIsStatus' => 'N',
                            'wUpdAdminIdx' => $admin_idx
                        ])->where('wRoleIdx', $role_idx)->where('wCpIdx', $ori_cp_idx)->update($_table);

                        if ($is_update === false) {
                            throw new \Exception('기 설정된 CP사 정보 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 CP사 식별자 중에 전달된 CP사 식별자가 없다면 등록 처리)
            foreach ($arr_cp_idx as $cp_idx) {
                if (in_array($cp_idx, $data) === false) {
                    $is_insert = $this->_conn->set([
                        'wRoleIdx' => $role_idx,
                        'wCpIdx' => $cp_idx,
                        'wRegAdminIdx' => $admin_idx
                    ])->insert($_table);

                    if ($is_insert === false) {
                        throw new \Exception('신규 CP사 정보 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 권한유형별 메뉴 목록 조회
     * @param int $role_idx
     * @return array
     */
    public function listRoleMenu($role_idx = 0)
    {
        $role_idx = (is_null($role_idx) === true) ? 0 : $role_idx;
        $column = 'M.*, ifnull(RBM.wMenuIdx, 0) as wRBMenuIdx, ifnull(RMM.wMenuIdx, 0) as wRMMenuIdx, ifnull(RSM.wMenuIdx, 0) as wRSMenuIdx';
        $from = '
            from (
                select wBMenuIdx, wBMenuName, wBParentMenuIdx, wBOrderNum, wMMenuIdx, wMMenuName, wMParentMenuIdx, wMOrderNum, wSMenuIdx, wSMenuName, wSParentMenuIdx, wSOrderNum
                    , wGroupMenuIdx
                    , if(wLastMenuDepth = 1, wBMenuUrl, if(wLastMenuDepth = 2, wMMenuUrl, wSMenuUrl)) as wLastMenuUrl
                from (
                    select BM.wMenuIdx as wBMenuIdx, BM.wMenuName as wBMenuName, BM.wParentMenuIdx as wBParentMenuIdx, BM.wMenuUrl as wBMenuUrl, BM.wOrderNum as wBOrderNum	
                        , MM.wMenuIdx as wMMenuIdx, MM.wMenuName as wMMenuName, MM.wParentMenuIdx as wMParentMenuIdx, MM.wMenuUrl as wMMenuUrl, MM.wOrderNum as wMOrderNum
                        , SM.wMenuIdx as wSMenuIdx, SM.wMenuName as wSMenuName, SM.wParentMenuIdx as wSParentMenuIdx, SM.wMenuUrl as wSMenuUrl, SM.wOrderNum as wSOrderNum
                        , BM.wGroupMenuIdx
                        , greatest(BM.wMenuDepth, ifnull(MM.wMenuDepth, 0), ifnull(SM.wMenuDepth, 0)) as wLastMenuDepth		
                    from ' . $this->_table['menu'] . ' as BM
                        left join ' . $this->_table['menu'] . ' as MM
                            on MM.wGroupMenuIdx = BM.wMenuIdx and MM.wMenuDepth = 2 and MM.wIsUse = "Y" and MM.wIsStatus = "Y"
                        left join ' . $this->_table['menu'] . ' as SM
                            on SM.wParentMenuIdx = MM.wMenuIdx and SM.wMenuDepth = 3 and SM.wIsUse = "Y" and SM.wIsStatus = "Y"
                    where BM.wMenuDepth = 1 and BM.wIsUse = "Y" and BM.wIsStatus = "Y"
                ) as I
            ) as M 
                left join ' . $this->_table['admin_role_r_menu'] . ' as RBM
                    on M.wBMenuIdx = RBM.wMenuIdx and RBM.wIsStatus = "Y" and RBM.wRoleIdx = ? 
                left join ' . $this->_table['admin_role_r_menu'] . ' as RMM
                    on M.wMMenuIdx = RMM.wMenuIdx and RMM.wIsStatus = "Y" and RMM.wRoleIdx = ?
                left join ' . $this->_table['admin_role_r_menu'] . ' as RSM
                    on M.wSMenuIdx = RSM.wMenuIdx and RSM.wIsStatus = "Y" and RSM.wRoleIdx = ?            
        ';
        $order_by = ' order by wBOrderNum asc, wMOrderNum asc, wSOrderNum asc';

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $order_by, [$role_idx, $role_idx, $role_idx]);

        return $query->result_array();
    }

    /**
     * 권한유형별 메뉴 등록
     * @param array $arr_menu_idx
     * @param $role_idx
     * @return array|bool
     */
    public function replaceRoleMenu($arr_menu_idx = [], $role_idx)
    {
        try {
            $_table = $this->_table['admin_role_r_menu'];
            $arr_menu_idx = (is_null($arr_menu_idx) === true) ? [] : array_values(array_unique($arr_menu_idx));
            $admin_idx = $this->session->userdata('admin_idx');
            
            // 기존 설정된 메뉴 조회
            $data = $this->_conn->getListResult($_table, 'wMenuIdx', ['EQ' => ['wRoleIdx' => $role_idx, 'wIsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'wMenuIdx');

                // 기존 등록된 메뉴 삭제 처리 (전달된 메뉴식별자 중에 기 등록된 메뉴식별자가 없다면 삭제 처리)
                foreach ($data as $ori_menu_idx) {
                    if (in_array($ori_menu_idx, $arr_menu_idx) === false) {
                        $is_update = $this->_conn->set([
                            'wIsStatus' => 'N',
                            'wUpdAdminIdx' => $admin_idx
                        ])->where('wRoleIdx', $role_idx)->where('wMenuIdx', $ori_menu_idx)->update($_table);

                        if ($is_update === false) {
                            throw new \Exception('기 설정된 메뉴정보 수정에 실패했습니다.');
                        }
                    }
                }
            }

            // 신규 등록 (기 등록된 메뉴식별자 중에 전달된 메뉴식별자가 없다면 등록 처리)
            foreach ($arr_menu_idx as $menu_idx) {
                if (in_array($menu_idx, $data) === false) {
                    $is_insert = $this->_conn->set([
                        'wRoleIdx' => $role_idx,
                        'wMenuIdx' => $menu_idx,
                        'wRegAdminIdx' => $admin_idx
                    ])->insert($_table);

                    if ($is_insert === false) {
                        throw new \Exception('신규 메뉴정보 등록에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}