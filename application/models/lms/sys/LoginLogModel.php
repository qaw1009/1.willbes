<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLogModel extends WB_Model
{
    private $_table = [
        'admin_login_log' => 'lms_sys_admin_login_log',
        'admin_r_admin_role' => 'lms_sys_admin_r_admin_role',
        'admin_role' => 'lms_sys_admin_role',
        'admin' => 'wbs_sys_admin',
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 최근 로그인 로그 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @return array
     */
    public function listTopLoginLog($arr_condition = [], $limit = null)
    {
        $column = 'LogIdx, wAdminId, LoginDatm, LoginIp, IsLogin, LoginLogCcd';

        return $this->_conn->getListResult($this->_table['admin_login_log'], $column, $arr_condition, $limit, 0, ['LogIdx' => 'desc']);
    }

    /**
     * 로그인 로그 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLoginLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                L.LogIdx, L.wAdminId, L.LoginIp, L.LoginDatm, L.LoginLogCcd
                    , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                    , R.RoleName           
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin_login_log'] . ' as L 
                left join ' . $this->_table['admin'] . ' as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join ' . $this->_table['admin_r_admin_role'] . ' as AR
                    on A.wAdminIdx = AR.wAdminIdx and AR.IsStatus = "Y"                   
                left join ' . $this->_table['admin_role'] . ' as R
                    on AR.RoleIdx = R.RoleIdx and R.IsStatus = "Y"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
