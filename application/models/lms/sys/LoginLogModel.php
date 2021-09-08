<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLogModel extends WB_Model
{
    private $_table = [
        'admin_login_log' => 'lms_sys_admin_login_log',
        'admin_r_admin_role' => 'lms_sys_admin_r_admin_role',
        'admin_role' => 'lms_sys_admin_role',
        'admin' => 'wbs_sys_admin',
        'wcode' => 'wbs_sys_code'
    ];

    private $_ccd = [
        'wDept' => '109',
        'wPosition' => '110',
        'wLoginLog' => '117'
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
        $column = 'L.LogIdx, L.wAdminId, L.LoginDatm, L.LoginIp, L.IsLogin, L.LoginLogCcd, WCL.wCcdName as LoginLogCcdName';

        return $this->_conn->getJoinListResult($this->_table['admin_login_log'] . ' as L', 'left', $this->_table['wcode'] . ' as WCL'
            , 'L.LoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y" and WCL.wGroupCcd = "' . $this->_ccd['wLoginLog'] . '"'
            , $column, $arr_condition, $limit, 0, ['L.LogIdx' => 'desc']);
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
            $in_column = 'count(0) AS numrows';
            $column = 'numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'L.LogIdx, L.wAdminId, L.LoginIp, L.LoginDatm, L.LoginLogCcd
                , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                , R.RoleName
                , WCD.wCcdName as wAdminDeptCcdName, WCP.wCcdName as wAdminPositionCcdName, WCL.wCcdName as LoginLogCcdName                           
            ';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

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
                left join ' . $this->_table['wcode'] . ' as WCD
                    on A.wAdminDeptCcd = WCD.wCcd and WCD.wIsStatus = "Y" and WCD.wGroupCcd = "' . $this->_ccd['wDept'] . '"
                left join ' . $this->_table['wcode'] . ' as WCP
                    on A.wAdminPositionCcd = WCP.wCcd and WCP.wIsStatus = "Y" and WCP.wGroupCcd = "' . $this->_ccd['wPosition'] . '"
                left join ' . $this->_table['wcode'] . ' as WCL
                    on L.LoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y" and WCL.wGroupCcd = "' . $this->_ccd['wLoginLog'] . '"
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
