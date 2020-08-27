<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentProductFModel extends WB_Model
{
    protected $_table = [
        'lms_correct_unit' => 'lms_correct_unit',
        'lms_correct_unit_assignment' => 'lms_correct_unit_assignment',
        'lms_board_attach' => 'lms_board_attach'
    ];

    //등록파일 rule 설정
    protected $upload_file_rule = [
        'allowed_types' => 'pdf',
        'overwrite' => 'false',
        'max_size' => 5120 //2560
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 첨삭리스트
     * @param string $column
     * @param array $arr_condition
     * @param array $arr_condition_sub
     * @param array $orderby
     * @return mixed
     */
    public function listCorrectAssignment($column = '*', $arr_condition = [], $arr_condition_sub = [], $orderby = [])
    {
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $where_sub = $this->_conn->makeWhere($arr_condition_sub)->getMakeWhere(true);
        $order_by = $this->_conn->makeOrderBy($orderby)->getMakeOrderBy();

        $from = "
            FROM {$this->_table['lms_correct_unit']} AS lcu
            LEFT JOIN {$this->_table['lms_correct_unit_assignment']} AS lcua ON lcu.CorrectIdx = lcua.CorrectIdx {$where_sub}
        ";

        return $this->_conn->query('SELECT '. $column. $from. $where. $order_by)->result_array();
    }

    /**
     * 첨삭데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @param array $arr_condition_sub
     * @param string $join_type
     * @return mixed
     */
    public function findCorrectAssignment($column = '*', $arr_condition = [], $arr_condition_sub = [], $join_type = 'inner')
    {
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);
        $where_sub = $this->_conn->makeWhere($arr_condition_sub)->getMakeWhere(true);

        $from = "
            FROM {$this->_table['lms_correct_unit']} AS lcu
            {$join_type} JOIN {$this->_table['lms_correct_unit_assignment']} AS lcua ON lcu.CorrectIdx = lcua.CorrectIdx {$where_sub}
        ";

        return $this->_conn->query('SELECT '. $column. $from. $where)->row_array();
    }

    /**
     * 과제 제출
     * @param array $inputData
     * @return array|bool
     */
    public function addCorrectForAssignment($inputData = [])
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['lms_correct_unit_assignment']) === false) {
                throw new \Exception('과제 등록에 실패했습니다.');
            }
            $cua_idx = $this->_conn->insert_id();

            $sum_size = 0;
            if (empty($_FILES['attach_file']) === false) {
                foreach ($_FILES['attach_file']['size'] as $key => $size) {
                    $sum_size += $size;
                }

                $sum_size_mb = round($sum_size / 1024);
                if ($sum_size_mb > $this->upload_file_rule['max_size']) {
                    throw new \Exception('첨부파일 총합 최대 5MB까지 등록 가능합니다.');
                }
            }

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/correct/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cua_idx), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['CuaIdx'] = $cua_idx;
                    $set_board_attach_data['RegType'] = 0;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                    $set_board_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->_conn->set($set_board_attach_data)->insert($this->_table['lms_board_attach']) === false) {
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
     * 과제 수정
     * @param array $inputData
     * @param string $cua_idx
     * @return array|bool
     */
    public function modifyCorrectForAssignment($inputData = [], $cua_idx = '')
    {
        $this->_conn->trans_begin();
        try {
            $join_type = 'inner';
            $arr_condition = [
                'EQ' => [
                    'lcu.CorrectIdx' => element('CorrectIdx', $inputData),
                    'lcua.CuaIdx' => $cua_idx,
                    'lcu.IsStatus' => 'Y',
                    'lcu.IsUse' => 'Y'
                ]
            ];

            $arr_condition_sub = [
                'EQ' => [
                    'lcua.MemIdx' => $this->session->userdata('mem_idx'),
                    /*'lcua.IsStatus' => 'Y'*/
                ]
            ];
            $result = $this->findCorrectAssignment('*', $arr_condition, $arr_condition_sub, $join_type);
            if (empty($result)) {
                throw new \Exception('등록된 데이터가 없습니다.');
            }

            $inputData = array_merge($inputData,[
                'IsStatus' => 'Y',
                'UpdMemIdx' => $this->session->userdata('mem_idx'),
                'UpdDatm' => date('Y-m-d H:i:s'),
                'UpIp' => $this->input->ip_address()
            ]);

            $this->_conn->set($inputData)->where('CuaIdx', $cua_idx);
            if ($this->_conn->update($this->_table['lms_correct_unit_assignment']) === false) {
                throw new \Exception('제출된 과제 수정에 실패했습니다');
            }

            $reg_type = 0;              //0:일반유저등록, 1:관리자등록
            $attach_file_type = 0;      //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->_modifyBoardAttachForAssignment($cua_idx, $reg_type, $attach_file_type);
            if ($is_attach !== true) {
                throw new \Exception(empty($is_attach['ret_msg']) === true ? '파일 등록에 실패했습니다.' : $is_attach['ret_msg']);
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 첨삭 파일 수정
     * @param $cua_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|bool
     */
    private function _modifyBoardAttachForAssignment($cua_idx, $reg_type, $attach_file_type)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['size'];
            $arr_board_attach = $this->_getBoardAttachArray($cua_idx, $reg_type, $attach_file_type, 'CuaIdx');
            $arr_board_attach_keys = array_keys($arr_board_attach);

            $sum_size = 0;
            if (empty($_FILES['attach_file']) === false) {
                foreach ($_FILES['attach_file']['size'] as $key => $size) {
                    $sum_size += $size;
                }

                $sum_size_mb = round($sum_size / 1024);
                if ($sum_size_mb > $this->upload_file_rule['max_size']) {
                    throw new \Exception('첨부파일 총합 최대 5MB까지 등록 가능합니다.');
                }
            }

            $this->load->library('upload');
            $upload_sub_dir = config_item('upload_prefix_dir') . '/correct/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cua_idx) , $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($board_attach_data as $key => $val) {
                if ($val > 0) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['CuaIdx'] = $cua_idx;
                        $set_board_attach_data['RegType'] = $reg_type;
                        $set_board_attach_data['AttachFileType'] = $attach_file_type;
                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                        $set_board_attach_data['RegIp'] = $this->input->ip_address();

                        if ($this->_conn->set($set_board_attach_data)->insert($this->_table['lms_board_attach']) === false) {
                            throw new \Exception('게시판 등록에 실패했습니다.');
                        }
                    } else {
                        //up, 기존 파일 삭제
                        $this->load->helper('file');
                        $real_img_path = public_to_upload_path($arr_board_attach[$arr_board_attach_keys[$key]]);
                        /*if (@unlink($real_img_path) === false) {
                            throw new \Exception('이미지 삭제에 실패했습니다.');
                        }*/

                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['UpdMemIdx'] = $this->session->userdata('mem_idx');
                        $set_board_attach_data['UpdDatm'] = date('Y-m-d H:i:s');

                        $whereData = [
                            'BoardFileIdx' => $arr_board_attach_keys[$key]
                        ];
                        $this->_conn->set($set_board_attach_data)->where($whereData);
                        if ($this->_conn->update($this->_table['lms_board_attach']) === false) {
                            throw new \Exception('파일 수정에 실패했습니다.');
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 첨삭게시글 파일 조회
     * @param $idx
     * @param $reg_type
     * @param $attach_file_type
     * @param $where_column
     * @return array
     */
    private function _getBoardAttachArray($idx, $reg_type, $attach_file_type, $where_column)
    {
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y',
                $where_column => $idx,
                'RegType' => $reg_type,
                'AttachFileType' => $attach_file_type,
            ]
        ];
        $data = $this->_conn->getListResult($this->_table['lms_board_attach'], 'BoardFileIdx, CONCAT(AttachFilePath, AttachFileName) AS FileInfo', $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'FileInfo', 'BoardFileIdx');

        return $data;
    }

    /**
     * 이미지명 리턴
     * @param $idx
     * @return array
     */
    private function _getAttachImgNames($idx)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= 5; $i++) {
            $attach_file_names[] = 'correct_' . $idx . '_0' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}