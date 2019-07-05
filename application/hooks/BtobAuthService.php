<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'AdminAuthService.php';

class BtobAuthService extends AdminAuthService
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
     * 로그인한 제휴사 관리자의 권한유형에 맞는 메뉴 목록 조회
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
            from lms_btob_admin_menu as M 
                inner join lms_btob_admin_menu as G
                    on M.GroupMenuIdx = G.MenuIdx and G.IsStatus = "Y" and G.IsUse = "Y"
                left join lms_btob_admin_menu as P
                    on M.ParentMenuIdx = P.MenuIdx and P.IsStatus = "Y" and P.IsUse = "Y"        
        ';
        $where = ' where M.IsStatus = "Y" and M.IsUse = "Y" and M.BtobIdx = ?';
        $binds[] = $this->_CI->session->userdata('btob.btob_idx');

        // 제휴사관리자일 경우 권한 테이블 추가 조인
        if ($role_type != 'S') {
            $from .= '
                inner join lms_btob_admin_role_r_menu as RM
                    on RM.MenuIdx = M.MenuIdx and RM.IsStatus = "Y"
                inner join lms_btob_admin_role as R
                    on R.RoleIdx = RM.RoleIdx and R.IsStatus = "Y" and R.IsUse = "Y"                
            ';
            $where .= ' and RM.RoleIdx = ?';
            $binds[] = $role_idx;
        }

        $order_by_offset_limit = ' order by TreeNum asc';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where . $order_by_offset_limit, $binds);

        return $query->result_array();
    }

    /**
     * 제휴사 관리자별 권한유형 정보 조회
     * @return array
     */
    public function getAdminRole()
    {
        $results = [];

        $column = 'A.RoleIdx, R.RoleName, R.RoleType, if(R.RoleType = "B", A.AdminBranchCcd, "A") as AuthBranchCcd';
        $from = '
            from lms_btob_admin as A left join lms_btob_admin_role as R
	            on A.RoleIdx = R.RoleIdx and R.IsUse = "Y" and R.IsStatus = "Y"    
        ';
        $where = ' where A.AdminIdx = ? and A.IsUse = "Y" and A.IsStatus = "Y"';

        // 쿼리 실행
        $query = $this->_db->query('select ' . $column . $from . $where, [$this->_CI->session->userdata('btob.admin_idx')]);
        $results['Role'] = $query->row_array();

        return $results;
    }

    /**
     * 제휴사 관리자 권한 세션 설정
     * @param array $auth_data
     */
    public function setSessionAdminAuthData($auth_data = [])
    {
        $sess_admin_auth = $this->_CI->session->userdata('btob.admin_auth_data');

        if (empty($sess_admin_auth) === true || serialize($sess_admin_auth) != serialize($auth_data)) {
            $this->_CI->session->set_userdata('btob.admin_auth_data', $auth_data);
        }
    }

    /**
     * 사용하지 않는 메소드
     * @param array $menus
     * @return array
     */
    public function getAdminSettings($menus = [])
    {
        return [];
    }

    /**
     * 사용하지 않는 메소드
     * @return void
     */
    public function setTransLogin()
    {
        // do nothing
    }
}