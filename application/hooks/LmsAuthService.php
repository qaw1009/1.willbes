<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminAuthService.php';

class LmsAuthService extends AdminAuthService
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * 로그인한 관리자의 권한유형에 맞는 메뉴 목록 조회
     * @param $role_idx
     * @return array
     */
    public function getAuthMenu($role_idx)
    {
        $colum = '
            M.MenuIdx, M.MenuName, M.ParentMenuIdx, M.GroupMenuIdx, M.MenuDepth, M.MenuUrl, M.UrlType, M.UrlTarget, M.IconClassName
                , (case M.MenuDepth
                    when 1 then (G.OrderNum * 10000) + 0
                    when 2 then (G.OrderNum * 10000) + (M.OrderNum * 100)
                    when 3 then (G.OrderNum * 10000) + (P.OrderNum * 100) + M.OrderNum 
                  end) as TreeNum
                , (case M.MenuDepth
                    when 1 then G.MenuName
                    when 2 then concat(G.MenuName, ">", M.MenuName)
                    when 3 then concat(G.MenuName, ">", P.MenuName, ">", M.MenuName) 
                  end) as UrlRouteName        
        ';

        $from = '
            from lms_sys_menu as M 
                inner join lms_sys_menu as G
                    on M.GroupMenuIdx = G.MenuIdx and G.IsStatus = "Y" and G.IsUse = "Y"
                left join lms_sys_menu as P
                    on M.ParentMenuIdx = P.MenuIdx and P.IsStatus = "Y" and P.IsUse = "Y"
                inner join lms_sys_admin_role_r_menu as RM
                    on RM.MenuIdx = M.MenuIdx and RM.IsStatus = "Y"
                inner join lms_sys_admin_role as R
                    on R.RoleIdx = RM.RoleIdx and R.IsStatus = "Y" and R.IsUse = "Y"        
        ';

        $where = ' where M.IsStatus = "Y" and M.IsUse = "Y" and RM.RoleIdx = ?';
        $order_by_offset_limit = ' order by TreeNum asc';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $colum . $from . $where . $order_by_offset_limit, [$role_idx]);

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

        $data = $this->_db->getListResult('lms_sys_admin_settings', 'SettingType, SettingValue', [
            'EQ' => ['wAdminIdx' => $this->_CI->session->userdata('admin_idx'), 'IsStatus' => 'Y']
        ], null, null, ['SettingIdx' => 'asc']);

        if (count($data) > 0) {
            foreach ($data as $row) {
                if ($row['SettingType'] != 'favorite') {
                    $results[$row['SettingType']] = $row['SettingValue'];
                } else {
                    $results[$row['SettingType']][$row['SettingValue']] = ['MenuName' => $menu_names[$row['SettingValue']], 'MenuUrl' => $menu_urls[$row['SettingValue']]];
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
        $colum = 'R.RoleIdx, R.RoleName';
        $from = '
            from lms_sys_admin_role as R inner join lms_sys_admin_r_admin_role as AR
    	            on R.RoleIdx = AR.RoleIdx  
                inner join wbs_sys_admin as A
                    on A.wAdminIdx = AR.wAdminIdx
        ';
        $where = ' where AR.wAdminIdx = ? and R.IsUse = "Y" and R.IsStatus = "Y" and AR.IsStatus = "Y" and A.wIsUse = "Y" and A.wIsStatus = "Y"';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $colum . $from . $where, [$this->_CI->session->userdata('admin_idx')]);

        return $query->row_array();
    }

    /**
     * LCMS 전환 로그인 로그 저장, 접속 사이트 세션 갱신 (WBS => LMS)
     * @return void
     */
    public function setTransLogin()
    {
        try {
            $data = [
                'wAdminId' => $this->_CI->session->userdata('admin_id'),
                'LoginIp' => $this->_CI->input->ip_address(),
                'IsLogin' => 'Y',
                'LoginLogCcd' => '117009'
            ];
            $this->_db->set($data)->set('LoginDatm', 'NOW()', false);

            if ($this->_db->insert('lms_sys_admin_login_log') === false) {
                throw new \Exception('관리자 LCMS 전환 로그인 로그 등록에 실패했습니다.');
            }

            // 접속 사이트 세션 갱신
            $this->setSessionAdminConnSites();
        } catch (\Exception $e) {
            log_message('error', $e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage());
        }
    }
}