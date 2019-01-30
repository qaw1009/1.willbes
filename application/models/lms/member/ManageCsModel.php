<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageCsModel extends WB_Model
{
    private $_table = [
        'member_cs' => 'lms_member_cs'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function list($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if($is_count === true) {
            $column = ' COUNT(*) AS rownums ';
            $order_by_offset_limit = '';

        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "FROM {$this->_table['member_cs']}";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $rows = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $rows->row(0)->rownums : $rows->result_array();
    }
}