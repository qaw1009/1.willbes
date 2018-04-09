<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMasterLectureModel extends WB_Model
{
    private $_table = [
       'masterlecture' => 'wbs_cms_lecture_combine'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 마스터강의 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLecture($is_count ,$arr_condition=[] ,$limit=null ,$offset=null ,$order_by=[])
    {
        if ($is_count === true) {
            $column = ' count(*) as numrows ';
            $order_by_offset_limit = '';
        } else {
            $column = ' * ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = '
                    from
                        '.$this->_table['masterlecture'].'
                    where 1=1 
                    ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' .$column .$from .$where. $order_by_offset_limit);
        //echo $this->_conn->last_query();
        return ($is_count===true) ? $query->row(0)->numrows : $query->result_array();

    }


}