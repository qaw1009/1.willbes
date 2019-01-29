<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageLectureModel extends WB_Model
{
    protected $_table = [
        'mylec' => 'lms_my_lecture',
        'lec_unit' => 'vw_unit_mylecture',
        'mylecture' => 'vw_on_mylecture',
        'myofflecture' => 'vw_off_mylecture',
        'mylecture_pkg' => 'vw_pkg_mylecture',
        'start_log' => 'lms_my_lecture_history',
        'admin' => 'wbs_sys_admin',
        'pause_log' => 'lms_lecture_pause_history',
        'extend' => 'lms_lecture_extend',
        'down_log' => 'lms_lecture_data_download_log',
        'order_product' => 'lms_order_product',
        'device' => 'lms_member_device'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }


    public function getLecture($is_count, $cond, $is_off = false)
    {
        if($is_count == true){
            $query = "SELECT COUNT(*) AS rownums ";
        } else {
            $query = "SELECT *, TO_DAYS(RealLecEndDate) - TO_DAYS(NOW()) +1 AS remainDays
            ";
        }

        if($is_off == true){
            $query .= " FROM {$this->_table['myofflecture']} ";
        } else {
            $query .= " FROM {$this->_table['mylecture']} ";
        }


        $where = $this->_conn->makeWhere($cond);
        $query .= $where->getMakeWhere(false);
        //$query .= $this->_conn->makeOrderBy($order)->getMakeOrderBy();
        $result = $this->_conn->query($query);
        return ($is_count == true) ? $result->row(0)->rownums : $result->result_array();
    }

    public function getPkg()
    {

    }



}