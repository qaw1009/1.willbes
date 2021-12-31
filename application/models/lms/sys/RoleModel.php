<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleModel extends WB_Model
{
    private $_table = [
        'admin_role' => 'lms_sys_admin_role',
        'admin_role_r_menu' => 'lms_sys_admin_role_r_menu',
        'menu' => 'lms_sys_menu',
        'admin' => 'wbs_sys_admin'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
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
        $column = 'R.RoleIdx, R.RoleName, R.RoleDesc, R.IsUse, R.RegDatm, R.RegAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $arr_condition['EQ']['R.IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['admin_role'] . ' as R', $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * 권한유형 코드 목록 조회
     * @return array
     */
    public function getRoleArray()
    {
        $data = $this->_conn->getListResult($this->_table['admin_role'], 'RoleIdx, RoleName', [
            'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']
        ], null, null, [
            'RoleIdx' => 'asc'
        ]);

        return array_pluck($data, 'RoleName', 'RoleIdx');
    }

    /**
     * 권한유형 관리 수정 폼을 위한 데이터 조회 
     * @param $role_idx
     * @return array
     */
    public function findRoleForModify($role_idx)
    {
        $column = 'R.RoleIdx, R.RoleName, R.RoleDesc, R.SubRoleJson, R.IsUse, R.RegDatm, R.RegAdminIdx, R.UpdDatm, R.UpdAdminIdx';
        $column .= ' , (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.RegAdminIdx and wIsStatus = "Y") as RegAdminName';
        $column .= ' , if(R.UpdAdminIdx is null, "", (select wAdminName from ' . $this->_table['admin'] . ' where wAdminIdx = R.UpdAdminIdx and wIsStatus = "Y")) as UpdAdminName';

        return $this->_conn->getFindResult($this->_table['admin_role'] . ' as R', $column, [
            'EQ' => ['R.RoleIdx' => $role_idx]
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
            $sub_role = element('sub_role', $input);
            $sub_role_json = empty($sub_role) === true ? null : json_encode($sub_role);

            $data = [
                'RoleName' => element('role_name', $input),
                'RoleDesc' => element('role_desc', $input),
                'SubRoleJson' => $sub_role_json,
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['admin_role']) === false) {
                throw new \Exception('데이터 저장에 실패했습니다.');
            }

            // 등록된 역할식별자
            $role_idx = $this->_conn->insert_id();

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
            $sub_role = element('sub_role', $input);
            $sub_role_json = empty($sub_role) === true ? null : json_encode($sub_role);

            $data = [
                'RoleName' => element('role_name', $input),
                'RoleDesc' => element('role_desc', $input),
                'SubRoleJson' => $sub_role_json,
                'IsUse' => element('is_use', $input),
                'UpdAdminIdx' => $this->session->userdata('admin_idx')
            ];
            $this->_conn->set($data)->where('RoleIdx', $role_idx);

            if ($this->_conn->update($this->_table['admin_role']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
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
     * 권한유형별 메뉴 목록 조회
     * @param int $role_idx
     * @return array
     */
    public function listRoleMenu($role_idx = 0)
    {
        $role_idx = (is_null($role_idx) === true) ? 0 : $role_idx;
        $column = 'M.*, ifnull(RBM.MenuIdx, 0) as RBMenuIdx, ifnull(RMM.MenuIdx, 0) as RMMenuIdx, ifnull(RSM.MenuIdx, 0) as RSMenuIdx';
        $from = '
            from (
                select BMenuIdx, BMenuName, BParentMenuIdx, BOrderNum, MMenuIdx, MMenuName, MParentMenuIdx, MOrderNum, SMenuIdx, SMenuName, SParentMenuIdx, SOrderNum
                    , GroupMenuIdx
                    , if(LastMenuDepth = 1, BMenuUrl, if(LastMenuDepth = 2, MMenuUrl, SMenuUrl)) as LastMenuUrl
                from (
                    select BM.MenuIdx as BMenuIdx, BM.MenuName as BMenuName, BM.ParentMenuIdx as BParentMenuIdx, BM.MenuUrl as BMenuUrl, BM.OrderNum as BOrderNum	
                        , MM.MenuIdx as MMenuIdx, MM.MenuName as MMenuName, MM.ParentMenuIdx as MParentMenuIdx, MM.MenuUrl as MMenuUrl, MM.OrderNum as MOrderNum
                        , SM.MenuIdx as SMenuIdx, SM.MenuName as SMenuName, SM.ParentMenuIdx as SParentMenuIdx, SM.MenuUrl as SMenuUrl, SM.OrderNum as SOrderNum
                        , BM.GroupMenuIdx
                        , greatest(BM.MenuDepth, ifnull(MM.MenuDepth, 0), ifnull(SM.MenuDepth, 0)) as LastMenuDepth		
                    from ' . $this->_table['menu'] . ' as BM
                        left join ' . $this->_table['menu'] . ' as MM
                            on MM.GroupMenuIdx = BM.MenuIdx and MM.MenuDepth = 2 and MM.IsUse = "Y" and MM.IsStatus = "Y"
                        left join ' . $this->_table['menu'] . ' as SM
                            on SM.ParentMenuIdx = MM.MenuIdx and SM.MenuDepth = 3 and SM.IsUse = "Y" and SM.IsStatus = "Y"
                    where BM.MenuDepth = 1 and BM.IsUse = "Y" and BM.IsStatus = "Y"
                ) as I
            ) as M left join ' . $this->_table['admin_role_r_menu'] . ' as RBM
                    on M.BMenuIdx = RBM.MenuIdx and RBM.IsStatus = "Y" and RBM.RoleIdx = ? 
                left join ' . $this->_table['admin_role_r_menu'] . ' as RMM
                    on M.MMenuIdx = RMM.MenuIdx and RMM.IsStatus = "Y" and RMM.RoleIdx = ?
                left join ' . $this->_table['admin_role_r_menu'] . ' as RSM
                    on M.SMenuIdx = RSM.MenuIdx and RSM.IsStatus = "Y" and RSM.RoleIdx = ?            
        ';
        $order_by = ' order by BOrderNum asc, MOrderNum asc, SOrderNum asc';

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
            $data = $this->_conn->getListResult($_table, 'MenuIdx', ['EQ' => ['RoleIdx' => $role_idx, 'IsStatus' => 'Y']]);
            if (count($data) > 0) {
                $data = array_pluck($data, 'MenuIdx');

                // 기존 등록된 메뉴 삭제 처리 (전달된 메뉴식별자 중에 기 등록된 메뉴식별자가 없다면 삭제 처리)
                foreach ($data as $ori_menu_idx) {
                    if (in_array($ori_menu_idx, $arr_menu_idx) === false) {
                        $is_update = $this->_conn->set([
                            'IsStatus' => 'N',
                            'UpdAdminIdx' => $admin_idx
                        ])->where('RoleIdx', $role_idx)->where('MenuIdx', $ori_menu_idx)->update($_table);

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
                        'RoleIdx' => $role_idx,
                        'MenuIdx' => $menu_idx,
                        'RegAdminIdx' => $admin_idx,
                        'RegIp' => $this->input->ip_address()
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