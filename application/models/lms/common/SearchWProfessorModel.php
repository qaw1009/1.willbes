<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWProfessorModel extends WB_Model
{
    private $_table = [
        'professor' => 'wbs_pms_professor',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * WBS 교수 기본정보 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return int|array
     */
    public function listSearchProfessor($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $colum = 'P.wProfIdx, P.wProfId, P.wProfName, P.wProfNickName, P.wSampleUrl, P.wProfProfile, P.wBookContent, P.wIsUse, P.wRegDatm, P.wRegAdminIdx, A.wAdminName as wRegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['professor'] . ' as P
                left join ' . $this->_table['admin'] . ' as A 
                    on P.wRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"
            where P.wIsUse = "Y" and P.wIsStatus = "Y"  
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
