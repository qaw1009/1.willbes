<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWProfessorModel extends WB_Model
{
    private $_table = [
        'pms_professor' => 'wbs_pms_professor',
        'professor' => 'lms_professor',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * WBS 교수 기본정보 목록 조회
     * @param $search_type
     * @param $site_code
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listSearchProfessor($search_type = '', $site_code = '', $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'WP.wProfIdx, WP.wProfId, WP.wProfName, WP.wProfNickName, WP.wSampleUrl, WP.wProfProfile, WP.wBookContent, WP.wIsUse, WP.wRegDatm, WP.wRegAdminIdx, A.wAdminName as wRegAdminName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['pms_professor'] . ' as WP
                left join ' . $this->_table['admin'] . ' as A 
                    on WP.wRegAdminIdx = A.wAdminIdx and A.wIsStatus = "Y"              
        ';

        $binds = [];
        if ($search_type == 'professor' && empty($site_code) === false) {
            $column .= ', if(P.ProfIdx is not null, "Y", "N") as IsRegist';
            $from .= 'left join ' . $this->_table['professor'] . ' as P on WP.wProfIdx = P.wProfIdx and P.SiteCode = ? and P.IsStatus = "Y"';
            $binds = [$site_code];
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = ' where WP.wIsStatus = "Y"' . $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit, $binds);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
