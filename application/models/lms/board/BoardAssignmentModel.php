<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardAssignmentModel extends BoardModel
{
    private $_table_board_assignment = 'lms_board_assignment';

    public function listAllBoardForAssignment($is_count, $target_condition = [], $arr_condition = [], $sub_query_condition = [], $site_code = '', $limit = null, $offset = null, $order_by = [], $column = '*')
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

        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $from = "
        FROM
        (
        SELECT BaIdx
            FROM {$this->_table_board_assignment}
            {$target_query_where}
        ) AS ta
        INNER JOIN {$this->_table_board_assignment} AS a ON ta.BaIdx = a.BaIdx
        
        INNER JOIN (
            SELECT BoardIdx, SiteCode, CampusCcd, Title, Content, IsStatus, IsUse
            FROM {$this->_table}
            {$sub_query_where}
        ) AS b ON a.BoardIdx = b.BoardIdx
        
        INNER JOIN {$this->_table_member} AS c ON a.MemIdx = c.MemIdx
        LEFT OUTER JOIN {$this->_table_professor} AS d ON a.ReplyRegProfIdx = d.ProfIdx
        
        LEFT OUTER JOIN (
            SELECT BaIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
            FROM {$this->_table_attach}
            WHERE IsStatus = 'Y' AND RegType = 0
            GROUP BY BaIdx
        ) AS e ON a.BaIdx = e.BaIdx
        ";

        if (empty($site_code) === false) {
            $arr_condition['EQ']['b.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['b.SiteCode'] = get_auth_site_codes(false, true);
        }

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