<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DDayFModel extends WB_Model
{
    private $_table = [
        'dday' => 'lms_dday',
        'dday_category' => 'lms_dday_r_category'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 금일 이후 시험일정 디데이 조회
     * @param array $arr_condition [추가 조회조건]
     * @param string $limit
     * @return mixed
     */
    public function getDDays($arr_condition = [], $limit = '')
    {
        $column = 'a.DIdx, a.DayTitle, a.DayMainTitle, a.DayDatm, datediff(NOW(), a.DayDatm) as DDay';
        $arr_condition = array_merge_recursive($arr_condition, [
            'RAW' => ['a.DayDatm >= ' => 'DATE_FORMAT(NOW(), "%Y-%m-%d")'],
            'EQ' => ['a.IsUse' => 'Y', 'a.IsStatus' => 'Y', 'b.IsStatus' => 'Y']
        ]);
        // where 조건
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['a.DayDatm' => 'asc'])->getMakeOrderBy();
        if (empty($limit) === false) {
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, 0)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['dday']} AS a
            INNER JOIN {$this->_table['dday_category']} AS b ON a.DIdx = b.DIdx
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return $query->result_array();
    }
}
