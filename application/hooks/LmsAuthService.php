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
     * @param string $role_type
     * @return array
     */
    public function getAuthMenu($role_idx, $role_type = '')
    {
        $column = '
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
                    on M.ParentMenuIdx = P.MenuIdx and P.IsStatus = "Y" and P.IsUse = "Y"' . (SUB_DOMAIN == 'tzone' ? ' and P.IsTzone = "Y"' : '') . '
                inner join lms_sys_admin_role_r_menu as RM
                    on RM.MenuIdx = M.MenuIdx and RM.IsStatus = "Y"
                inner join lms_sys_admin_role as R
                    on R.RoleIdx = RM.RoleIdx and R.IsStatus = "Y" and R.IsUse = "Y"        
        ';

        $where = ' where M.IsStatus = "Y" and M.IsUse = "Y" and RM.RoleIdx = ?';

        // tzone으로 접근할 경우 tzone 메뉴만 노출
        if (SUB_DOMAIN == 'tzone') {
            $where .= ' and M.IsTzone = "Y" and G.IsTzone = "Y"';
        }

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

        $data = $this->_db->getListResult('lms_sys_admin_settings', 'SettingType, SettingValue', [
            'EQ' => ['wAdminIdx' => $this->_CI->session->userdata('admin_idx'), 'IsStatus' => 'Y']
        ], null, null, ['SettingIdx' => 'asc']);

        if (count($data) > 0) {
            foreach ($data as $row) {
                if ($row['SettingType'] != 'favorite') {
                    $results[$row['SettingType']] = $row['SettingValue'];
                } else {
                    if (isset($menu_names[$row['SettingValue']]) === true && isset($menu_urls[$row['SettingValue']]) === true) {
                        $results[$row['SettingType']][$row['SettingValue']] = ['MenuName' => $menu_names[$row['SettingValue']], 'MenuUrl' => $menu_urls[$row['SettingValue']]];
                    }
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

        // 권한유형 조회
        $column = 'R.RoleIdx, R.RoleName';
        $from = '
            from lms_sys_admin_role as R inner join lms_sys_admin_r_admin_role as AR
    	            on R.RoleIdx = AR.RoleIdx  
                inner join wbs_sys_admin as A
                    on A.wAdminIdx = AR.wAdminIdx
        ';
        $where = ' where AR.wAdminIdx = ? and R.IsUse = "Y" and R.IsStatus = "Y" and AR.IsStatus = "Y" and A.wIsUse = "Y" and A.wIsStatus = "Y"';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where, [$this->_CI->session->userdata('admin_idx')]);
        $results['Role'] = $query->row_array();

        // 사이트, 캠퍼스 권한 조회
        $results['Site'] = $this->_getAdminSiteCampus();

        return $results;
    }

    /**
     * 관리자별 사이트, 캠퍼스 권한 조회
     * @return array
     */
    private function _getAdminSiteCampus()
    {
        $results = [];
        $admin_idx = $this->_CI->session->userdata('admin_idx');

        $column = 'S.SiteCode, S.SiteName, S.IsCampus, ifnull(GROUP_CONCAT(distinct ASC2.CampusCcd, "::", C.CcdName order by ASC2.CampusCcd asc separator ","), "") as CampusCcds';
        $from = '
            from lms_site as S
                inner join lms_sys_admin_r_site_campus as ASC1
                    on S.SiteCode = ASC1.SiteCode and ASC1.IsStatus = "Y"
                left join lms_site_r_campus as SC
                    on S.SiteCode = SC.SiteCode and SC.IsStatus = "Y"
                inner join lms_sys_admin_r_site_campus as ASC2
                    on S.SiteCode = ASC2.SiteCode and (ASC2.CampusCcd = "0" or SC.CampusCcd = ASC2.CampusCcd) and ASC2.IsStatus = "Y"
                left join lms_sys_code as C 
                    on ASC2.CampusCcd = C.Ccd and C.GroupCcd = ? and C.IsUse = "Y" and C.IsStatus = "Y"            
        ';
        $where = ' where S.IsUse = "Y" and S.IsStatus = "Y" and ASC1.wAdminIdx = ? and ASC2.wAdminIdx = ?';
        $order_by = ' group by S.SiteCode order by S.SiteCode';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where . $order_by, ['605', $admin_idx, $admin_idx]);
        $list = $query->result_array();

        foreach ($list as $idx => $row) {
            $results[$row['SiteCode']]['SiteCode'] = $row['SiteCode'];
            $results[$row['SiteCode']]['SiteName'] = $row['SiteName'];
            $results[$row['SiteCode']]['IsCampus'] = $row['IsCampus'];
            $results[$row['SiteCode']]['CampusCcds'] = [];

            if (empty($row['CampusCcds']) === false) {
                $arr_campus_ccds = explode(',', $row['CampusCcds']);
                foreach ($arr_campus_ccds as $campus_ccd) {
                    $arr_campus_ccd = explode('::', $campus_ccd);
                    $results[$row['SiteCode']]['CampusCcds'][$arr_campus_ccd[0]] = $arr_campus_ccd[1];
                }
            }
        }

        return $results;
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
        } catch (\Exception $e) {
            log_message('error', $e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage());
        }
    }
}