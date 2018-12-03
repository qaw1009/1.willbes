<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardTpassModel extends BoardModel
{
    private $_table_board_tpass_member_authority = 'lms_board_tpass_member_authority';

    /**
     * 자료실권한부여 회원 목록
     * @param $is_count
     * @param array $target_condition
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return mixed
     */
    public function listAllBoardForTpassMemberAuthority($is_count, $target_condition = [], $arr_condition = [], $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if ($is_count === true) {
            $column = 'STRAIGHT_JOIN count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $target_query_where = $this->_conn->makeWhere($target_condition);
        $target_query_where = $target_query_where->getMakeWhere(false);

        $from = "
        FROM (
            SELECT BtmaIdx, MemIdx, ValidStartDate, ValidEndDate, ValidDay, ValidReason, RegDatm, RegAdminIdx, RetireDatm, RetireAdminIdx
            FROM {$this->_table_board_tpass_member_authority}
            {$target_query_where}
        ) AS a
        INNER JOIN {$this->_table_member} AS b ON a.MemIdx = b.MemIdx
        INNER JOIN {$this->_table_sys_admin} AS c ON a.RegAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        INNER JOIN {$this->_table_sys_admin} AS d ON a.RetireAdminIdx = d.wAdminIdx AND d.wIsStatus='Y'
        ";

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('b.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('b.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('b.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('b.CampusCcd', "''", false);
        $where_campus->or_where('b.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}