<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HolidayModel extends WB_Model
{
    private $_table = [
        'holiday' => 'lms_holiday',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function getList($arr_condition, $isCount = false, $limit = null, $offset = null, $order_by = [] )
    {
        if ($isCount === true) {
            $column = 'COUNT(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'H.*
                ,A1.wAdminName AS regAdminName
                ,A2.wAdminName AS updAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            FROM ' . $this->_table['holiday'] . ' AS H 
                LEFT JOIN ' . $this->_table['admin'] . ' AS A1 ON A1.wAdminIdx = H.RegAdminIdx  
                LEFT JOIN ' . $this->_table['admin'] . ' AS A2 ON A2.wAdminIdx = H.UpdAdminIdx
            WHERE 1 = 1
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('SELECT ' . $column . $from . $where . $order_by_offset_limit);

        return ($isCount === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function store($data)
    {
        if($this->_conn->set($data)
                ->set('RegAdminIdx',$this->session->userdata('admin_idx'))
                ->set('RegIp',$this->input->ip_address())
                ->insert($this->_table['holiday']) == true){
            return true;
        }

        return false;
    }

    public function set($data, $idx)
    {
        if($this->_conn->set($data)
            ->set('UpdAdminIdx',$this->session->userdata('admin_idx'))
            ->set('UpdDatm','NOW()', false)
            ->set('UpdIp',$this->input->ip_address())
            ->where('hIdx', $idx)
            ->update($this->_table['holiday']) == false){
            return false;
        }
        return true;
    }

}
