<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLogModel extends WB_Model
{
    private $_table = 'wbs_sys_admin_login_log';

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
        $column = 'wLogIdx, wAdminId, wLoginDatm, wLoginIp, wIsLogin, wLoginLogCcd';

        return $this->_conn->getListResult($this->_table, $column, $arr_condition, $limit, 0, ['wLogIdx' => 'desc']);
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
                L.wLogIdx, L.wAdminId, L.wLoginIp, L.wLoginDatm, L.wLoginLogCcd
                    , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                    , R.wRoleName           
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table . ' as L 
                left join wbs_sys_admin as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join wbs_sys_admin_role as R
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
            where 1=1
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
