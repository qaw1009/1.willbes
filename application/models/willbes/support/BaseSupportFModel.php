<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupportFModel extends WB_Model
{
    protected $_table = [
        'board' => 'vw_board as b'
        ,'twoway_board' => 'vw_board_twoway as b'
        ,'board_qna' => 'vw_board_qna'
        ,'lms_board' => 'lms_board'
        ,'lms_board_log' => 'lms_board_read_log'
        ,'lms_board_r_category' => 'lms_board_r_category'
        ,'lms_board_attach' => 'lms_board_attach'
        ,'menu' => 'lms_site_menu'
        ,'code' => 'lms_sys_code'
        ,'site' => 'lms_site'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 구분 목록 조회 (학원,온라인 사이트정보의 IsCampus 값으로 구분)
     */
    public function listSiteOnOffType()
    {
        $this->_conn->select("IF(IsCampus='Y','학원','온라인') AS SiteTypeName, IsCampus");
        $this->_conn->from($this->_table['site']);
        $this->_conn->group_by('IsCampus');
        $data = $this->_conn->get()->result_array();
        $data = array_pluck($data, 'SiteTypeName', 'IsCampus');
        return $data;
    }

    public function getSiteOnOffType($site_code)
    {
        $column = 'SiteCode, IsCampus';

        $arr_condition = [
            'EQ' => [
                'SiteCode' => $site_code,
                'IsStatus' => 'Y'
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = '
            FROM '.$this->_table['site'].'
        ';
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * FAQ 구분 목록 추출
     * @return mixed
     */
    public function listFaqCcd()
    {
        $arr_condition = [
        ];
        $column = 'A.Ccd, A.GroupCcd, A.CcdName, B.subFaqData';

        $from  = '
            from 
                '.$this->_table['code'].' A
                left outer join
                    (
                        SELECT 
                        GroupCcd,
                        CONCAT(\'[\', GROUP_CONCAT(JSON_OBJECT(
                                \'GroupCcd\', GroupCcd,
                                \'Ccd\', Ccd,
                                \'CcdName\', CcdName
                            )), \']\') AS subFaqData
                        FROM '.$this->_table['code'].' 
                        WHERE CcdDesc=\'faq_use\' AND GroupCcd != 0 AND IsStatus=\'Y\' AND IsUse = \'Y\'  
                        GROUP BY GroupCcd
                        order by OrderNum ASC
                    ) B on A.Ccd = B.GroupCcd
            WHERE 
            A.CcdDesc=\'faq_use\' and A.GroupCcd=0 AND A.IsStatus=\'Y\' AND A.IsUse = \'Y\' 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }


    /**
     * Campus 목록 추출
     * @param $site_code
     * @return mixed
     */
    public function listCampusCcd($site_code)
    {
        $arr_condition=[
            'EQ' => ['A.SiteCode'=>$site_code]
        ];

        $column = 'B.SiteCode,B.CampusCcd,C.CcdName';

        $from  = '
            from 
                lms_site A 
                join lms_site_r_campus B on A.SiteCode = B.SiteCode
                join '.$this->_table['code'].' C on B.CampusCcd = C.Ccd 
            WHERE 
                A.IsCampus=\'Y\' and A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' and C.IsUse=\'Y\'
        ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by C.OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }


    /**
     * 학습프로그램 목록 추출
     * @return mixed
     */
    public function listProgramCcd()
    {
        $arr_condition=[
            'EQ' => ['GroupCcd'=>'671']
        ];

        $column = 'Ccd,CcdName, CcdValue, CcdDesc, CcdEtc';

        $from = '
            from 
                '.$this->_table['code'] .'
            WHERE 
                IsStatus=\'Y\' and IsUse=\'Y\'
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by OrderNum ASC';

        $query = $this->_conn->query('select '. $column . $from . $where. $order_by);
        return $query->result_array();
    }


    /**
     * 게시글 조회수 수정 및 로그정보 저장
     * @param $board_idx
     * @return array|bool|string
     */
    public function modifyBoardRead($board_idx)
    {
        if(empty($board_idx)) {
            return '게시글번호가 없습니다.';
        }

        $this->_conn->trans_begin();
        try{
            #-----  조회수 업데이트
            $this->_conn->set('ReadCnt', 'ReadCnt+1',false)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table['lms_board']) === false) {
                throw new \Exception('조회수 수정에 실패했습니다.');
            }

            #----- 로그 저장
            $log_data = [
                'BoardIdx' => $board_idx
                ,'MemIdx' => sess_data('mem_idx')
                ,'UserAgent' => substr($this->input->user_agent(),0,99)
                ,'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($log_data)->insert($this->_table['lms_board_log']) === false) {
                throw new \Exception('로그 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();

        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        //echo $this->_conn->last_query();
        return true;
    }

    /**
     * 파일 수정
     * 파일 등록 상태에 따른 DB insert, update 분기 처리
     * update 발생 시 파일 삭제 처리
     * @param $board_idx
     * @param $board_data
     * @param $reg_type
     * @param $attach_file_type
     * @return array|bool
     */
    protected function modifyBoardAttach($board_idx, $board_data, $reg_type, $attach_file_type)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['size'];
            $arr_board_attach = $this->_getBoardAttachArray($board_idx, $reg_type, $attach_file_type);
            $arr_board_attach_keys = array_keys($arr_board_attach);

            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/board/' . $board_data['BmIdx'] . '/' . date('Ymd');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx), $upload_sub_dir);

            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($board_attach_data as $key => $val) {
                /*if (empty($val) === false && $val != 'blob') {*/
                if ($val > 0) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['BoardIdx'] = $board_idx;
                        $set_board_attach_data['RegType'] = $reg_type;
                        $set_board_attach_data['AttachFileType'] = $attach_file_type;
                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        $set_board_attach_data['RegIp'] = $this->input->ip_address();

                        if ($this->_addBoardAttach($set_board_attach_data) === false) {
                            throw new \Exception('파일 등록에 실패했습니다.');
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

                        $whereData = [
                            'BoardFileIdx' => $arr_board_attach_keys[$key]
                        ];
                        $this->_updateBoardAttach($set_board_attach_data, $whereData);
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
     * 게시판 식별자 기준 파일 목록 조회
     * @param $board_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|int
     */
    private function _getBoardAttachArray($board_idx, $reg_type, $attach_file_type)
    {
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y',
                'BoardIdx' => $board_idx,
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
     * 파일 등록
     * @param $inputData
     * @return bool
     */
    private function _addBoardAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['lms_board_attach']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 수정
     * @param $input
     * @param $whereData
     * @return bool
     */
    private function _updateBoardAttach($input, $whereData)
    {
        try {
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['lms_board_attach']) === false) {
                throw new \Exception('파일 수정에 실패했습니다.');
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
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_file_names[] = 'board_' . $board_idx . '_0' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}