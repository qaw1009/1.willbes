<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH . 'models/lms/board/BoardModel.php';

class BoardSupportersModel extends BoardModel
{
    private $_table_supporters = 'lms_supporters';

    public function listAllNoticeForSupporters($is_count, $arr_condition = [], $site_code = '', $limit = null, $offset = null, $order_by = [], $column = '*')
    {
        if ($is_count === true) {
            $column = 'STRAIGHT_JOIN count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column .= '
                ,IFNULL(FN_BOARD_CATECODE_DATA_LMS(LB.BoardIdx),\'N\') AS CateCode
                ,IFNULL(fn_board_attach_data(LB.BoardIdx),NULL) AS AttachFileName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} AS LB
            INNER JOIN {$this->_table_supporters} AS SP ON LB.SupportersIdx = SP.SupportersIdx
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON LB.RegMemIdx = MEM.MemIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON LB.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        if (empty($site_code) === false) {
            $arr_condition['EQ']['LB.SiteCode'] = $site_code;
        } else {
            $arr_condition['IN']['LB.SiteCode'] = get_auth_site_codes(false, true);
        }

        $where_temp = $this->_conn->makeWhere($arr_condition);
        $where_temp = $where_temp->getMakeWhere(false);

        // 캠퍼스 권한
        $arr_auth_campus_ccds = get_auth_all_campus_ccds();
        $where_campus = $this->_conn->group_start();
        foreach ($arr_auth_campus_ccds as $set_site_ccd => $set_campus_ccd) {
            $where_campus->or_group_start();
            $where_campus->or_where('LB.SiteCode',$set_site_ccd);
            $where_campus->group_start();
            $where_campus->where('LB.CampusCcd', $this->codeModel->campusAllCcd);
            $where_campus->or_where_in('LB.CampusCcd', $set_campus_ccd);
            $where_campus->group_end();
            $where_campus->group_end();
        }
        $where_campus->or_where('LB.CampusCcd', "''", false);
        $where_campus->or_where('LB.CampusCcd IS NULL');
        $where_campus->group_end();
        $where_campus = $where_campus->getMakeWhere(true);

        // 쿼리 실행
        $where = $where_temp . $where_campus;
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function findNoticeForSupporters($column, $arr_condition, $arr_condition_file)
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
     * 게시판 글 등록
     * @param $inputData
     * @return array|bool
     */
    public function addNoticeForSupporters($inputData = [])
    {
        $set_board_attach_data = [];
        $this->_conn->trans_begin();
        try {
            $inputData = array_merge($inputData,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($inputData)->insert($this->_table) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $inputData['BmIdx'] . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx, $inputData['BmIdx']), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BoardIdx'] = $board_idx;
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

    public function modifyNoticeForSupporters($inputData = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->_findBoardData($idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            // board update
            $inputData = array_merge($inputData,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($inputData)->where('BoardIdx', $idx);
            if ($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 파일 수정
            $reg_type = 1;              //0:일반유저등록, 1:관리자등록
            $attach_file_type = 0;      //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->_modifyBoardAttach($idx, $inputData, $reg_type, $attach_file_type);
            if ($is_attach !== true) {
                throw new \Exception($is_attach);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 게시판 이전글
     * @param $arr_condition
     * @return mixed
     */
    public function findNoticePreviousForSupporters($arr_condition)
    {
        $column = 'A.BoardIdx, A.Title';
        $from = "
            FROM {$this->_table} AS A
            INNER JOIN {$this->_table_supporters} AS SP ON A.SupportersIdx = SP.SupportersIdx
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON A.RegMemIdx = MEM.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.BoardIdx'=>'DESC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1, 0)->getMakeLimitOffset();

        $query = $this->_conn->query('select '.$column . $from .$where . $order_by_offset_limit);
        return $query->row_array();
    }

    /**
     * 게시판 다음글
     * @param $arr_condition
     * @return mixed
     */
    public function findNoticeNextForSupporters($arr_condition)
    {
        $column = 'A.BoardIdx, A.Title';
        $from = "
            FROM {$this->_table} AS A
            INNER JOIN {$this->_table_supporters} AS SP ON A.SupportersIdx = SP.SupportersIdx
            LEFT OUTER JOIN {$this->_table_member} AS MEM ON A.RegMemIdx = MEM.MemIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy(['A.BoardIdx'=>'ASC'])->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset(1, 0)->getMakeLimitOffset();

        $query = $this->_conn->query('select '.$column . $from .$where . $order_by_offset_limit);
        return $query->row_array();
    }

    /**
     * 단일 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findBoardData($idx)
    {
        $column = 'LB.BoardIdx, LB.OrderNum';
        $from = "
            FROM {$this->_table} AS LB
            INNER JOIN {$this->_table_supporters} AS SP ON LB.SupportersIdx = SP.SupportersIdx
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'LB.BoardIdx' => $idx,
                'LB.IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
    }
}