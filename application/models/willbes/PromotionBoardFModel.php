<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromotionBoardFModel extends WB_Model
{
    private $_table = [
        'event_promotion_board' => 'lms_event_promotion_board'
        ,'event_promotion_board_file' => 'lms_event_promotion_board_file'
        ,'lms_member' => 'lms_member'
    ];

    private $_attach_img_cnt = '10';
    private $_upload_file_rule = [
        'allowed_types' => 'hwp|doc|pdf|zip|jpg|gif|png|jpeg|bmp',
        'overwrite' => 'false',
        'max_size' => 5120 //2560
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 프로모션용 게시판 리스트
     * @param bool $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param false $is_use_promotion_board_file
     * @return mixed
     */
    public function listPromotionBoard($is_count = true, $arr_condition=[], $limit = null, $offset = null, $is_use_promotion_board_file = false)
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = "
                a.EpbIdx,a.PromotionCode,a.BoardType,a.Title,a.Content,a.AreaName,a.SubjectName,a.ProfName,a.Score
                ,DATE_FORMAT(a.RegDatm, '%Y.%m.%d') as RegDatm,a.RegMemIdx,b.MemId,b.MemName
                ,IF(a.BoardType='1','합격수기','수강후기') AS BoardTypeName
            ";
            if ($is_use_promotion_board_file === true) {
                $column .= ",IFNULL((SELECT CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', EpbfIdx,
                        'FilePath', FileFullPath,
                        'FileName', FileName,
                        'RealName', FileRealName
                    )), ']') AS AttachData
                    FROM {$this->_table['event_promotion_board_file']} AS f
                    WHERE f.EpbIdx = a.EpbIdx AND f.IsStatus = 'Y'
                ),'N') AS AttachData";
            }
            $order_by = ['a.EpbIdx' => 'desc'];

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            from {$this->_table['event_promotion_board']} as a
            inner join {$this->_table['lms_member']} as b on a.RegMemIdx = b.MemIdx
        ";

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * @param string $column
     * @param array $arr_condition
     * @return mixed
     */
    public function findPromotionBoard($column='*', $arr_condition=[])
    {
        $from = " FROM {$this->_table['event_promotion_board']}";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 프로모션용 게시판 등록
     * @param array $form_data
     * @return array|bool
     */
    public function addPromotionBoard($form_data = [])
    {
        $this->_conn->trans_begin();
        try {
            $input_data = $this->_setInputData($form_data);
            if ($this->_conn->set($input_data)->insert($this->_table['event_promotion_board']) === false) {
                throw new \Exception('등록에 실패했습니다.');
            }
            $epb_idx = $this->_conn->insert_id();

            if ($this->_addPromotionBoardFile($epb_idx) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 프로모션용 게시판 삭제
     * @param $idx
     * @return array|bool
     */
    public function deletePromotionBoard($idx)
    {
        $this->_conn->trans_begin();
        try {
            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdMemIdx'=> $this->session->userdata('mem_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('EpbIdx', $idx)
                ->where('IsStatus', 'Y');
            $is_update = $is_update->update($this->_table['event_promotion_board']);

            if ($is_update === false) {
                throw new \Exception('삭제에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    private function _setInputData($form_data = [])
    {
        $input_data = [
            'PromotionCode' => element('promotion_code', $form_data)
            ,'BoardType' => element('board_type', $form_data)
            ,'Title' => element('board_title', $form_data)
            ,'Content' => element('board_content', $form_data)
            ,'IsStatus' => 'Y'
            ,'AreaName' => element('area_name', $form_data)
            ,'SubjectName' => element('subject_name', $form_data)
            ,'ProfName' => element('prof_name', $form_data)
            ,'Score' => element('score', $form_data)
            ,'RegMemIdx' => $this->session->userdata('mem_idx')
            ,'RegDatm' => date("Y-m-d H:i:s")
            ,'RegIp' => $this->input->ip_address()
        ];

        return $input_data;
    }

    /**
     * 프로모션용 게시판 파일 등록
     * @param $epb_idx
     * @return bool
     */
    private function _addPromotionBoardFile($epb_idx)
    {
        try {
            $this->load->library('upload');
            $sum_size = 0;
            if (empty($_FILES['attach_file']) === false) {
                foreach ($_FILES['attach_file']['size'] as $key => $size) {
                    $sum_size += $size;
                }

                $sum_size_mb = round($sum_size / 1024);
                if ($sum_size_mb > $this->_upload_file_rule['max_size']) {
                    throw new \Exception('첨부파일 총합 최대 5MB까지 등록 가능합니다.');
                }
            }

            $upload_dir = config_item('upload_prefix_dir') . '/promotion/board/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getFileNames($epb_idx), $upload_dir
                ,'allowed_types:'.$this->_upload_file_rule['allowed_types'].',overwrite:'.$this->_upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (empty($attach_files) === false) {
                    $set_attach_data['EpbIdx'] = $epb_idx;
                    $set_attach_data['FileFullPath'] = $this->upload->_upload_url . $upload_dir . '/';
                    $set_attach_data['FileName'] = $attach_files['orig_name'];
                    $set_attach_data['FileRealName'] = $attach_files['client_name'];
                    $set_attach_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                    $set_attach_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addEventAttach($set_attach_data) === false) {
                        throw new \Exception('fail');
                    }
                }
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _addEventAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['event_promotion_board_file']) === false) {
                throw new \Exception('fail');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    private function _getFileNames($idx)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_file_names[] = 'board_' . $idx . '_' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}