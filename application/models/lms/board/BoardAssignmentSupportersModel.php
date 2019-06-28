<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardAssignmentSupportersModel extends BoardModel
{
    private $_this_table = [
        'lms_board_assignment' => 'lms_board_assignment',
        'lms_supporters' => 'lms_supporters',
    ];

    public function listAllSupportersForMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                Board.*, SP.SupportersIdx, SP.SupportersYear, SP.SupportersNumber, S.SiteName, M.MemId, M.MemName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM (
                SELECT a.BmIdx, b.BaIdx AS Idx, a.SiteCode, b.BoardIdx, b.Title, a.SupportersIdx, b.MemIdx, b.RegDatm, '과제' AS SupportersTypeName
                ,IFNULL(fn_board_attach_data_assignment(b.BaIdx,0),'N') AS AttachFileName
                FROM {$this->_table} AS a
                INNER JOIN {$this->_this_table['lms_board_assignment']} AS b ON a.BoardIdx = b.BoardIdx AND b.IsStatus = 'Y'
                WHERE a.BmIdx = '104' AND a.IsStatus = 'Y'
                UNION ALL                
                SELECT a.BmIdx, a.BoardIdx AS Idx, a.SiteCode, a.BoardIdx, a.Title, a.SupportersIdx, a.RegMemIdx AS MemIdx, a.RegDatm, '제안/토론' AS SupportersTypeName
                ,IFNULL(fn_board_attach_data(a.BoardIdx),'N') AS AttachFileName
                FROM {$this->_table} AS a
                WHERE BmIdx = '105' AND IsStatus = 'Y'
            ) AS Board
            
            INNER JOIN {$this->_this_table['lms_supporters']} AS SP ON Board.SupportersIdx = SP.SupportersIdx
            INNER JOIN {$this->_table_sys_site} AS S ON Board.SiteCode = S.SiteCode
            INNER JOIN {$this->_table_member} AS M ON Board.MemIdx = M.MemIdx
        ";

        // 사이트 권한 추가
        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'Board.SiteCode' => get_auth_site_codes()
            ]
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 상세 정보 조회
     * @param $column
     * @param $ba_idx
     * @param $board_idx
     * @return mixed
     */
    public function findBoardForAssignmentSupporters($column, $ba_idx, $board_idx)
    {
        //과제관련파일
        $where_file_admin = $this->_conn->makeWhere(['EQ' => ['BoardIdx' => $board_idx,'IsStatus' => 'Y','RegType' => 1]]);
        $where_file_admin = $where_file_admin->getMakeWhere(false);

        //과제제출관련파일
        $where_file_user = $this->_conn->makeWhere(['EQ' => ['BaIdx' => $ba_idx,'IsStatus' => 'Y','RegType' => 0]]);
        $where_file_user = $where_file_user->getMakeWhere(false);

        $arr_condition = [
            'EQ' => [
                'BaIdx' => $ba_idx
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere($where);

        $from = "
            FROM
            (
                SELECT BaIdx, BoardIdx, Title, Content, MemIdx, RegDatm
                FROM lms_board_assignment
                {$where}
            )
            AS a
            INNER JOIN lms_board AS b ON a.BoardIdx = b.BoardIdx            
            INNER JOIN lms_member AS m ON a.MemIdx = m.MemIdx
            INNER JOIN lms_supporters AS s ON b.SupportersIdx = s.SupportersIdx
            
            LEFT OUTER JOIN (
                SELECT BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                FROM lms_board_attach
                {$where_file_admin}
                GROUP BY BoardIdx
            ) AS c ON a.BoardIdx = c.BoardIdx
            
            LEFT OUTER JOIN (
                SELECT BaIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                FROM lms_board_attach
                {$where_file_user}
                GROUP BY BaIdx
            ) AS d ON a.BaIdx = d.BaIdx
        ";

        return $this->_conn->query('select '.$column .$from)->row_array();
    }

    /**
     * 제안/토론 데이터 조회
     * @param $column
     * @param $arr_condition
     * @param $arr_condition_file
     * @return mixed
     */
    public function findSuggestForSupporters($column, $arr_condition, $arr_condition_file)
    {
        $from = "
            FROM {$this->_table} as LB
            INNER JOIN {$this->_table_supporters} AS SP ON LB.SupportersIdx = SP.SupportersIdx
            LEFT OUTER JOIN (
                select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                from {$this->_table_attach}
                where IsStatus = 'Y' ";
        if (isset($arr_condition_file['reg_type']) === true) {
            $from .= "and RegType = {$arr_condition_file['reg_type']} ";
        }
        if (isset($arr_condition_file['attach_file_type']) === true) {
            $from .= "and AttachFileType = {$arr_condition_file['attach_file_type']} ";
        }
        $from .= "GROUP BY BoardIdx
                ) as LBA ON LB.BoardIdx = LBA.BoardIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON LB.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN2 ON LB.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select STRAIGHT_JOIN ' . $column .$from .$where)->row_array();
    }

    /**
     * 특정 회원 과제 현황
     * @param $member_idx
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForAssignmentSupportersMember($member_idx, $is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                b.BoardIdx, a.BaIdx, a.MemIdx, b.Title, b.SupportersStartDate, b.SupportersEndDate,
                IFNULL(a.Title, "") AS AssignmentTitle, a.AssignmentStatusCcd, a.RegDatm AS AssignmentRegDatm,
                fn_ccd_name(a.AssignmentStatusCcd) AS AssignmentStatusCcdName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table} AS b
            LEFT JOIN {$this->_this_table['lms_board_assignment']} AS a ON b.BoardIdx = a.BoardIdx AND a.MemIdx = '{$member_idx}'
            INNER JOIN {$this->_this_table['lms_supporters']} AS s ON b.SupportersIdx = s.SupportersIdx AND s.IsUse = 'Y'
        ";

        // 사이트 권한 추가
        $arr_condition = array_merge_recursive($arr_condition,[
            'IN' => [
                'b.SiteCode' => get_auth_site_codes()
            ]
        ]);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}