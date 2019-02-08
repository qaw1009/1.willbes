<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CsModel extends WB_Model
{
    private $_table = [
        'cs_tech_manual' => 'lms_cs_tech_manual',
        'sys_admin' => 'wbs_sys_admin'
    ];
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 목록 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listManageCs($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                CS.CtmIdx, CS.IssueDivisionCcd, CS.Title, CS.Content, CS.ReadCnt, CS.DispType, CS.IsUse, CS.IsStatus, CS.RegDatm, CS.RegAdminIdx, CS.RegIp, CS.UpdDatm, CS.UpdAdminIdx,
                fn_ccd_name(CS.IssueDivisionCcd) AS CS.IssueDivisionCcdName, ADMIN.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['cs_tech_manual']} as CS
            LEFT OUTER JOIN {$this->_table['sys_admin']} as ADMIN ON CS.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 데이터 조회
     * @param string $column
     * @param array $arr_condition
     */
    public function findCsForModify($column = '*', $arr_condition = [])
    {
        return null;
    }
}