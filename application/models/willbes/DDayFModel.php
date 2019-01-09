<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DDayFModel extends WB_Model
{
    private $_table = [
        'dday' => 'lms_dday'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 금일 이후 시험일정 디데이 조회
     * @param array $arr_condition [추가 조회조건]
     * @return array
     */
    public function getDDays($arr_condition = [])
    {
        $column = 'DIdx, DayTitle, DayDatm, datediff(NOW(), DayDatm) as DDay';
        $arr_condition = array_merge_recursive($arr_condition, [
            'RAW' => ['DayDatm >= ' => 'DATE_FORMAT(NOW(), "%Y-%m-%d")'],
            'EQ' => ['IsUse' => 'Y', 'IsStatus' => 'Y']
        ]);

        return $this->_conn->getListResult($this->_table['dday'], $column, $arr_condition, null, null, ['DayDatm' => 'asc']);
    }
}
