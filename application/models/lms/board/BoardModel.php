<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends WB_Model
{
    private $_table = 'lms_board';
    private $_table_r_category = 'lms_board_r_category';
    private $_table_r_attach = 'lms_board_r_attach';
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
            /*$colum = '
                L.wLogIdx, L.wAdminId, L.wLoginIp, L.wLoginDatm, L.wLoginLogCcd
                    , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wAdminDeptCcd, A.wAdminPositionCcd, A.wIsUse
                    , R.wRoleName
            ';*/

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        /*$from = '
            from ' . $this->_table . ' as L 
                left join wbs_sys_admin as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join wbs_sys_admin_role as R
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
            where 1=1
        ';*/
        $from = "
            from {$this->_table}
            where 1=1
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(true);

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