<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/support/BaseSupportFModel.php';

class SupportBoardTwoWayFModel extends BaseSupportFModel
{
    // 첨부 이미지 수
    public $_attach_img_cnt = 2;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 게시판 글 목록 추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listBoard($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        $column = ($is_count === true) ? $is_count :  $column;
        $result = $this->_conn->getListResult($this->_table['twoway_board'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();
        return $result;
    }

    /**
     * 게시글 조회
     * @param $board_idx
     * @param array $arr_condition
     * @param string $column
     * @return array|int
     */
    public function findBoard($board_idx,$arr_condition=[],$column='*',$limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'BoardIdx' => $board_idx,
            ]
        ]);
        $result = $this->_conn->getListResult($this->_table['twoway_board'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();exit;
        return element('0', $result, []);
    }

    /**
     * 게시판 글 등록
     * @param $inputData
     * @return array|bool
     */
    public function addBoard($inputData = [])
    {
        $set_board_category_data = [];
        $set_board_attach_data = [];

        $board_data = $inputData['board'];
        $board_category_data = $inputData['board_r_category'];

        $this->_conn->trans_begin();
        try {
            $board_data = array_merge($board_data,[
                'RegMemIdx'=> $this->session->userdata('mem_idx'),
                'RegMemId'=> $this->session->userdata('mem_id'),
                'RegMemName'=> $this->session->userdata('mem_name'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($board_data)->insert($this->_table['lms_board']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            if ($board_data['SiteCode'] != config_item('app_intg_site_code')) {
                $set_board_category_data['BoardIdx'] = $board_idx;
                $set_board_category_data['CateCode'] = $board_category_data['site_category'];
                $set_board_category_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                $set_board_category_data['RegIp'] = $this->input->ip_address();
                if ($this->addBoardCategory($set_board_category_data) === false) {
                    throw new \Exception('게시판 등록에 실패했습니다.');
                }
            }

            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/board/' . $board_data['BmIdx'] . '/' . date('Ymd');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($board_idx), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite'].',max_size:'.$this->upload_file_rule['max_size']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BoardIdx'] = $board_idx;
                    $set_board_attach_data['RegType'] = 0;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                    $set_board_attach_data['RegIp'] = $this->input->ip_address();

                    if ($this->addBoardAttach($set_board_attach_data) === false) {
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

    public function modifyBoard($inputData = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $board_idx = $idx;
            $board_data = $inputData['board'];
            $board_category_data = $inputData['board_r_category'];

            $result = $this->findBoard($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $board_data = array_merge($board_data,[
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($board_data)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table['lms_board']) === false) {
                throw new \Exception('게시판 수정에 실패했습니다.');
            }

            // 카테고리
            if ($board_data['SiteCode'] != config_item('app_intg_site_code')) {
                // 카테고리삭제
                $up_cate_data['BoardIdx'] = $board_idx;
                if ($this->updateBoardCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 수정에 실패했습니다.');
                }

                $set_board_category_data['BoardIdx'] = $board_idx;
                $set_board_category_data['CateCode'] = $board_category_data['site_category'];
                $set_board_category_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                $set_board_category_data['RegIp'] = $this->input->ip_address();
                if ($this->addBoardCategory($set_board_category_data) === false) {
                    throw new \Exception('게시판 수정에 실패했습니다.');
                }
            }

            // 파일 수정
            $reg_type = 0;              //0:일반유저등록, 1:관리자등록
            $attach_file_type = 0;      //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->modifyBoardAttach($board_idx, $board_data, $reg_type, $attach_file_type);
            if ($is_attach !== true) {
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
     * 상담게시글 답변완료글 제외
     * @param $idx
     * @param $reply_status_ccd_complete
     * @return array|bool
     */
    public function boardDelete($idx, $reply_status_ccd_complete)
    {
        $this->_conn->trans_begin();
        try {
            $board_idx = $idx;
            $result = $this->findBoard($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdMemIdx'=> $this->session->userdata('mem_idx'),
                'UpdMemId'=> $this->session->userdata('mem_id'),
                'UpdMemName'=> $this->session->userdata('mem_name'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('BoardIdx', $board_idx)
                ->where('IsStatus', 'Y')
                ->where_not_in('ReplyStatusCcd', $reply_status_ccd_complete)
                ->update($this->_table['lms_board']);

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
}