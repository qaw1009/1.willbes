<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLogModel extends WB_Model
{
    private $_table = [
        'admin_login_log' => 'wbs_sys_admin_login_log',
        'admin_role' => 'wbs_sys_admin_role',
        'admin' => 'wbs_sys_admin',
        'code' => 'wbs_sys_code'
    ];

    private $_ccd = [
        'wDept' => '109',
        'wPosition' => '110',
        'wLoginLog' => '117'
    ];

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 최근 로그인 로그 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @return array
     */
    public function listTopLoginLog($arr_condition = [], $limit = null)
    {
        $column = 'L.wLogIdx, L.wAdminId, L.wLoginDatm, L.wLoginIp, L.wIsLogin, L.wLoginLogCcd, WCL.wCcdName as wLoginLogCcdName';

        return $this->_conn->getJoinListResult($this->_table['admin_login_log'] . ' as L', 'left', $this->_table['code'] . ' as WCL'
            , 'L.wLoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y" and WCL.wGroupCcd = "' . $this->_ccd['wLoginLog'] . '"'
            , $column, $arr_condition, $limit, 0, ['L.wLogIdx' => 'desc']);
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
            $column = 'L.wLogIdx, L.wAdminId, L.wLoginIp, L.wLoginDatm, L.wLoginLogCcd
                , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                , R.wRoleName
                , WCD.wCcdName as wAdminDeptCcdName, WCP.wCcdName as wAdminPositionCcdName, WCL.wCcdName as wLoginLogCcdName      
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin_login_log'] . ' as L 
                left join ' . $this->_table['admin'] . ' as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join ' . $this->_table['admin_role'] . ' as R
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
                left join ' . $this->_table['code'] . ' as WCD
                    on A.wAdminDeptCcd = WCD.wCcd and WCD.wIsStatus = "Y" and WCD.wGroupCcd = "' . $this->_ccd['wDept'] . '"
                left join ' . $this->_table['code'] . ' as WCP
                    on A.wAdminPositionCcd = WCP.wCcd and WCP.wIsStatus = "Y" and WCP.wGroupCcd = "' . $this->_ccd['wPosition'] . '"
                left join ' . $this->_table['code'] . ' as WCL
                    on L.wLoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y" and WCL.wGroupCcd = "' . $this->_ccd['wLoginLog'] . '"                    
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
