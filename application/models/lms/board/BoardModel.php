<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends WB_Model
{
    private $_table = 'lms_board';
    private $_table_r_category = 'lms_board_r_category';
    private $_table_r_attach = 'lms_board_r_attach';
    private $_table_sys_site = 'lms_site';
    private $_table_sys_admin = 'wbs_sys_admin';
    // 첨부 이미지 수
    public $_attach_img_cnt = 2;

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 게시판리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $colum
     * @return mixed
     */
    public function listAllBoard($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $colum = '*')
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
            //$order_by_offset_limit .= $this->_conn->makeLimitOffset(20, 0)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as LB
            LEFT OUTER JOIN (
                select BoardIdx, GROUP_CONCAT(CateCode) AS CateCode
                from {$this->_table_r_category}
                group by BoardIdx
            ) as LBC ON LB.BoardIdx = LBC.BoardIdx
            LEFT OUTER JOIN (
                select BoardIdx, AttachFileType, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName
                from {$this->_table_r_attach}
                where IsStatus = 'Y'
            ) as LBA ON LB.BoardIdx = LBA.BoardIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LC ON LB.SiteCode = LC.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} B ON LB.RegAdminIdx = B.wAdminIdx and B.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function addBoard($inputData)
    {
        $set_board_category_data = [];
        $set_board_attach_data = [];

        $board_data = $inputData['board'];
        $board_category_data = $inputData['board_r_category']['site_category'];

        $this->_conn->trans_begin();
        try {
            // 데이터 등록
            if ($this->_conn->set($board_data)->insert($this->_table) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            foreach ($board_category_data as $key => $val) {
                $set_board_category_data['BoardIdx'] = $board_idx;
                $set_board_category_data['CateCode'] = $val;
                if ($this->_addBoardCatagory($set_board_category_data) === false) {
                    throw new \Exception('게시판 등록에 실패했습니다.');
                }
            }

            $this->load->library('upload');
            //$upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;
            $upload_sub_dir = SUB_DOMAIN . '/board/' . $board_data['BmIdx'];

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BoardIdx'] = $board_idx;
                    $set_board_attach_data['RegType'] = 1;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $attach_files['file_path'];
                    $set_board_attach_data['AttachFileName'] = $attach_files['raw_name'];
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
     * 게시글 복제
     * @param $board_idx
     * @return array|bool
     */
    public function boardCopy($board_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_board_category = $this->_getBoardCategory($board_idx);

            if (count($arr_board_category) <= 0) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }

            $insert_column = '
                BmIdx, SiteCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeGroupCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, ProfIdx, SubjectCcd, LecIdx, Title, Content, ReadCnt, SettingReadCnt, OrderNum, IsUse, IsStatus, RegDatm, RegMemIdx, 
                RegAdminIdx, RegIp, UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $select_column = '
                BmIdx, SiteCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeGroupCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, ProfIdx, SubjectCcd, LecIdx, CONCAT("복사본-",Title) AS Title, Content, ReadCnt, SettingReadCnt, OrderNum, IsUse, IsStatus, RegDatm, RegMemIdx, 
                RegAdminIdx, RegIp, UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $query = "insert into {$this->_table} ({$insert_column})
                select {$select_column} from {$this->_table}
                where BoardIdx = {$board_idx}";
            $result = $this->_conn->query($query);
            $insert_board_idx = $this->_conn->insert_id();

            if ($result === true) {
                foreach ($arr_board_category as $key => $val) {
                    $set_board_category_data['BoardIdx'] = $insert_board_idx;
                    $set_board_category_data['CateCode'] = $val['CateCode'];
                    if ($this->_addBoardCatagory($set_board_category_data) === false) {
                        throw new \Exception('카테고리 등록에 실패했습니다.');
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
     * 게시판 카테고리 조회
     * @param $board_idx
     * @return mixed
     */
    private function _getBoardCategory($board_idx)
    {
        $colum = 'CateCode';
        $from = "
            FROM {$this->_table_r_category}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BoardIdx' => $board_idx
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where);
        $query = $query->result_array();

        return $query;
    }

    /**
     * 카테고리 등록
     * @param $inputData
     * @return bool
     */
    private function _addBoardCatagory($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_r_category) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * 파일 등록
     * @param $inputData
     * @return bool
     */
    private function _addBoardAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_r_attach) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * 파일명 배열 생성
     * @param $board_idx
     * @return array
     */
    private function _getAttachImgNames($board_idx)
    {
        $attach_file_names = [];
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_file_names[] = 'board_' . $board_idx . '_0' . $i;
        }

        return $attach_file_names;
    }
}