<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_member',
        'info' => 'lms_member_otherinfo'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회원 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $column = ' M.MemIdx AS MemIdx, M.MemID, M.MemName, M.JoinDate ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = ' FROM ' . $this->_table['member'] . ' AS M
            INNER JOIN ' . $this->_table['info'] . ' AS I ON I.MemIdx = M.MemIdx ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->rownums : $query->result_array();
    }



}