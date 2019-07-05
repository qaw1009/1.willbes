<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminAuthService.php';

class WbsAuthService extends AdminAuthService
{
    public function __construct()
    {
        parent::__construct('wbs');
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * 로그인한 관리자의 권한유형에 맞는 메뉴 목록 조회
     * @param $role_idx
     * @param string $role_type
     * @return array
     */
    public function getAuthMenu($role_idx, $role_type = '')
    {
        $column = '
            M.wMenuIdx as MenuIdx, M.wMenuName as MenuName, M.wParentMenuIdx as ParentMenuIdx, M.wGroupMenuIdx as GroupMenuIdx, M.wMenuDepth as MenuDepth
                , M.wMenuUrl as MenuUrl, M.wUrlType as UrlType, M.wUrlTarget as UrlTarget, M.wIconClassName as IconClassName
                , (case M.wMenuDepth
                    when 1 then (G.wOrderNum * 10000) + 0
                    when 2 then (G.wOrderNum * 10000) + (M.wOrderNum * 100)
                    when 3 then (G.wOrderNum * 10000) + (P.wOrderNum * 100) + M.wOrderNum 
                  end) as TreeNum
                , (case M.wMenuDepth
                    when 1 then G.wMenuName
                    when 2 then concat(G.wMenuName, ">", M.wMenuName)
                    when 3 then concat(G.wMenuName, ">", P.wMenuName, ">", M.wMenuName) 
                  end) as UrlRouteName        
        ';

        $from = '
            from wbs_sys_menu as M 
                inner join wbs_sys_menu as G
                    on M.wGroupMenuIdx = G.wMenuIdx and G.wIsStatus = "Y" and G.wIsUse = "Y"
                left join wbs_sys_menu as P
                    on M.wParentMenuIdx = P.wMenuIdx and P.wIsStatus = "Y" and P.wIsUse = "Y"
                inner join wbs_sys_admin_role_r_menu as RM
                    on RM.wMenuIdx = M.wMenuIdx and RM.wIsStatus = "Y"
                inner join wbs_sys_admin_role as R
                    on R.wRoleIdx = RM.wRoleIdx and R.wIsStatus = "Y" and R.wIsUse = "Y"        
        ';

        $where = ' where M.wIsStatus = "Y" and M.wIsUse = "Y" and RM.wRoleIdx = ?';
        $order_by_offset_limit = ' order by TreeNum asc';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where . $order_by_offset_limit, [$role_idx]);

        return $query->result_array();
    }

    /**
     * 관리자 환경설정 정보 조회
     * @param array $menus
     * @return array
     */
    public function getAdminSettings($menus = [])
    {
        $results = [];
        $menu_names = array_pluck($menus, 'MenuName', 'MenuIdx');
        $menu_urls = array_pluck($menus, 'MenuUrl', 'MenuIdx');

        $data = $this->_db->getListResult('wbs_sys_admin_settings', 'wSettingType, wSettingValue', [
            'EQ' => ['wAdminIdx' => $this->_CI->session->userdata('admin_idx'), 'wIsStatus' => 'Y']
        ], null, null, ['wSettingIdx' => 'asc']);

        if (count($data) > 0) {
            foreach ($data as $row) {
                if ($row['wSettingType'] != 'favorite') {
                    $results[$row['wSettingType']] = $row['wSettingValue'];
                } else {
                    $results[$row['wSettingType']][$row['wSettingValue']] = ['MenuName' => $menu_names[$row['wSettingValue']], 'MenuUrl' => $menu_urls[$row['wSettingValue']]];
                }
            }
        }

        return $results;
    }

    /**
     * 관리자별 권한유형 정보 조회
     * @return array
     */
    public function getAdminRole()
    {
        $results = [];

        $column = 'A.wRoleIdx as RoleIdx, R.wRoleName as RoleName';
        $from = '
            from wbs_sys_admin_role as R inner join wbs_sys_admin as A
	            on R.wRoleIdx = A.wRoleIdx    
        ';
        $where = ' where A.wAdminIdx = ? and R.wIsUse = "Y" and R.wIsStatus = "Y" and A.wIsUse = "Y" and A.wIsStatus = "Y"';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where, [$this->_CI->session->userdata('admin_idx')]);
        $results['Role'] = $query->row_array();

        return $results;
    }

    /**
     * LCMS 전환 로그인 로그 저장, 접속 사이트 세션 갱신 (LMS => WBS)
     * @return void
     */
    public function setTransLogin()
    {
        try {
            $data = [
                'wAdminId' => $this->_CI->session->userdata('admin_id'),
                'wLoginIp' => $this->_CI->input->ip_address(),
                'wIsLogin' => 'Y',
                'wLoginLogCcd' => '117010'
            ];
            $this->_db->set($data)->set('wLoginDatm', 'NOW()', false);

            if ($this->_db->insert('wbs_sys_admin_login_log') === false) {
                throw new \Exception('관리자 LCMS 전환 로그인 로그 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage());
        }
    }
}