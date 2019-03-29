<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardAssignmentModel extends BoardModel
{
    private $_table_board_assignment = 'lms_board_assignment';

    /**
     * TODO : 관리자식별자를 이용해서 교수식별자
     * 첨삭게시판 유저등록 리스트
     * @param $is_count
     * @param array $target_condition
     * @param array $arr_condition
     * @param array $sub_query_condition
     * @param string $site_code
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $column
     * @return mixed
     */
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

    /**
     * 첨삭게시판 상세 정보 조회
     * @param $column
     * @param $ba_idx
     * @param $board_idx
     * @return mixed
     */
    public function findBoardForAssignment($column, $ba_idx, $board_idx)
    {
        //과제관련파일
        $where_file_admin = $this->_conn->makeWhere(['EQ' => ['BoardIdx' => $board_idx,'IsStatus' => 'Y','RegType' => 1]]);
        $where_file_admin = $where_file_admin->getMakeWhere(false);

        //과제제출관련파일
        $where_file_user = $this->_conn->makeWhere(['EQ' => ['BaIdx' => $ba_idx,'IsStatus' => 'Y','RegType' => 0]]);
        $where_file_user = $where_file_user->getMakeWhere(false);

        //제출된과제에 대한 답변관련 파일
        $where_file_prof = $this->_conn->makeWhere(['EQ' => ['BaIdx' => $ba_idx,'IsStatus' => 'Y','RegType' => 1]]);
        $where_file_prof = $where_file_prof->getMakeWhere(false);

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
                SELECT BaIdx, BoardIdx, Content, ReplyContent, MemIdx, IsReply, RegDatm, ReplyRegDatm, ReplyRegAdminIdx
                FROM lms_board_assignment
                {$where}
            )
            AS a
            INNER JOIN lms_board AS b ON a.BoardIdx = b.BoardIdx            
            INNER JOIN lms_member AS f ON a.MemIdx = f.MemIdx
            INNER JOIN lms_member_otherinfo AS f2 ON a.MemIdx = f2.MemIdx
            
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
            
            LEFT OUTER JOIN (
                SELECT BaIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName, GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                FROM lms_board_attach
                {$where_file_prof}
                GROUP BY BaIdx
            ) AS e ON a.BaIdx = e.BaIdx
        ";

        return $this->_conn->query('select '.$column .$from)->row_array();
    }

    /**
     * 첨삭게시판 교수답변등록
     * @param $data
     * @param $arr_assignment_status_ccd
     * @param $is_reply
     * @return array|bool
     */
    public function modifyAssignmentBoard($data, $arr_assignment_status_ccd, $is_reply)
    {
        $this->_conn->trans_begin();
        try {
            $ba_idx = $data['ba_idx'];
            if (empty($ba_idx) === true) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $result_data = $this->findBoardForAssignment('a.BaIdx', $data['ba_idx'], $data['board_idx']);

            if (count($result_data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $board_data = [
                'IsReply' => $is_reply,
                'AssignmentStatusCcd' => $arr_assignment_status_ccd,
                'ReplyContent' => $data['board_content'],
                'ReplyRegDatm' => date('Y-m-d H:i:s'),
                'ReplyRegAdminIdx' => $this->session->userdata('admin_idx'),
                'ReplyRegIp' => $this->input->ip_address()
            ];

            $this->_conn->set($board_data)->where('BaIdx', $data['ba_idx']);
            if ($this->_conn->update($this->_table_board_assignment) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            //파일저장
            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $data['bm_idx'] . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($ba_idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BaIdx'] = $data['ba_idx'];
                    $set_board_attach_data['RegType'] = 1;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->_addBoardAttach($set_board_attach_data) === false) {
                        throw new \Exception('게시판 등록에 실패했습니다.');
                    }
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 첨삭데이터 삭제
     * 제출된 데이터만 삭제 가능
     * @param $idx
     * @return array|bool
     */
    public function boardDeleteForAssignment($idx)
    {
        $this->_conn->trans_begin();
        try {
            $ba_idx = $idx;
            $admin_idx = $this->session->userdata('admin_idx');
            $result = $this->_findBoardData($ba_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdAdminIdx' => $admin_idx,
                'UpdAdminDatm' => date('Y-m-d H:i:s')
            ])->where('BaIdx', $ba_idx)->where('IsStatus', 'Y')->where('AssignmentStatusCcd', '698002')->update($this->_table_board_assignment);

            if ($is_update === false) {
                throw new \Exception('데이터 삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 단일 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findBoardData($idx)
    {
        $column = 'BaIdx';
        $from = "
            FROM {$this->_table_board_assignment}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BaIdx' => $idx,
                'AssignmentStatusCcd' => '698002',
                'IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }
}