<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends WB_Model
{
    private $_table = 'lms_board';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 게시판리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $colum
     * @return mixed
     */
    public function listAllBoard($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $colum = '*')
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            /*$colum = '
                L.wLogIdx, L.wAdminId, L.wLoginIp, L.wLoginDatm, L.wLoginLogCcd
                    , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                    , R.wRoleName
            ';*/

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        /*$from = '
            from ' . $this->_table . ' as L 
                left join wbs_sys_admin as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join wbs_sys_admin_role as R
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
            where 1=1
        ';*/
        $from = "
            from {$this->_table}
            where 1=1
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}