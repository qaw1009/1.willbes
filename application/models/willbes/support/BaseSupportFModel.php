<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupportFModel extends WB_Model
{
    protected $_table = [
        'board' => 'vw_board as b'
        ,'twoway_board' => 'vw_board_twoway as b'
        ,'board_2' => 'vw_board_2 as b'
        ,'board_find' => 'vw_board_find as b'
        ,'twoway_board_2' => 'vw_board_twoway_2 as b'
        ,'twoway_board_find' => 'vw_board_twoway_find as b'
        ,'board_qna' => 'vw_board_qna'
        ,'lms_board' => 'lms_board'
        ,'lms_board_log' => 'lms_board_read_log'
        ,'lms_board_r_category' => 'lms_board_r_category'
        ,'lms_sys_category' => 'lms_sys_category'
        ,'lms_board_attach' => 'lms_board_attach'
        ,'lms_board_assignment' => 'lms_board_assignment'
        ,'lms_board_assignment_r_schedule_date' => 'lms_board_assignment_r_schedule_date'
        ,'lms_board_r_comment' => 'lms_board_r_comment'
        ,'lms_member' => 'lms_member'
        ,'menu' => 'lms_site_menu'
        ,'code' => 'lms_sys_code'
        ,'site' => 'lms_site'
        ,'mylecture_pkg' => 'vw_pkg_mylecture'
        ,'mylecture_on' => 'vw_on_mylecture'
        ,'board_tpass_member_authority' => 'lms_board_tpass_member_authority'
        ,'lms_order_product' => 'lms_order_product'
        ,'lms_mock_register' => 'lms_mock_register'
        ,'lms_professor' => 'lms_professor'
    ];

    //등록파일 rule 설정
    protected $upload_file_rule = [
        'allowed_types' => 'hwp|doc|pdf|jpg|gif|png|zip',
        'overwrite' => 'false',
        'max_size' => 5120 //2560
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
     * @param string $site_code
     * @return mixed
     */
    public function listFaqCcd($site_code = '')
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
                        AND json_value(CcdEtc, "$.'.$site_code.'") = \'Y\'
                        GROUP BY GroupCcd
                        order by OrderNum ASC
                    ) B on A.Ccd = B.GroupCcd
            WHERE 
            A.CcdDesc=\'faq_use\' and A.GroupCcd=0 AND A.IsStatus=\'Y\' AND A.IsUse = \'Y\'
            AND json_value(A.CcdEtc, "$.'.$site_code.'") = \'Y\' 
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
     * 수강목록 조회
     * @param array $arr_condition
     * @return array|mixed
     */
    public function getOnMyLectureArray($arr_condition = [])
    {
        $query = "SELECT STRAIGHT_JOIN DISTINCT ProdCodeSub, ProdName";
        $query .= " FROM {$this->_table['mylecture_on']}";

        $where = $this->_conn->makeWhere($arr_condition);
        $query .= $where->getMakeWhere(false);

        $query = $this->_conn->query($query);
        $data = $query->result_array();

        $data = array_pluck($data, 'ProdName', 'ProdCodeSub');
        return $data;
    }

    /**
     * 게시판 댓글 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listComment($is_count, $arr_condition=[], $column = null, $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['lms_board_r_comment']} as a
            LEFT JOIN {$this->_table['lms_member']} AS b ON a.RegMemIdx = b.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 게시판 댓글 등록
     * @param array $requestData
     * @return array|bool
     */
    public function addComment($requestData = [])
    {
        $this->_conn->trans_begin();
        try {
            $inputData = [
                'BoardIdx' => $requestData['board_idx'],
                'RegMemIdx' => $this->session->userdata('mem_idx'),
                'RegType' => '0',
                'Comment' => $requestData['comment'],
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($inputData)->insert($this->_table['lms_board_r_comment']) === false) {
                throw new \Exception('댓글 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 댓글 삭제 처리
     * @param $comment_idx
     * @return array|bool
     */
    public function delComment($comment_idx)
    {
        $this->_conn->trans_begin();
        try {
            $result = $this->_findCommentData($comment_idx, 'BoardCmtIdx');
            if (empty($result)) {
                throw new \Exception('조회된 댓글이 없습니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('BoardCmtIdx', $comment_idx)->where('IsStatus', 'Y')->update($this->_table['lms_board_r_comment']);

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

    private function _findCommentData($idx, $column = '*')
    {
        $from = "
            FROM {$this->_table['lms_board_r_comment']}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BoardCmtIdx' => $idx,
                'IsStatus' => 'Y'
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);
        $query = $query->row_array();

        return $query;
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
            $arr_board_attach = $this->_getBoardAttachArray($board_idx, $reg_type, $attach_file_type, 'BoardIdx');
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
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $board_data['BmIdx'] . '/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($board_idx) , $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($board_attach_data as $key => $val) {
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

                        if ($this->addBoardAttach($set_board_attach_data) === false) {
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
     * 첨삭게시판 파일 수정
     * @param $bm_idx
     * @param $ba_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|bool
     */
    protected function modifyBoardAttachForAssignment($bm_idx, $ba_idx, $reg_type, $attach_file_type)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['size'];
            $arr_board_attach = $this->_getBoardAttachArray($ba_idx, $reg_type, $attach_file_type, 'BaIdx');
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
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/' . $bm_idx . '/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($ba_idx) , $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($board_attach_data as $key => $val) {
                if ($val > 0) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['BaIdx'] = $ba_idx;
                        $set_board_attach_data['RegType'] = $reg_type;
                        $set_board_attach_data['AttachFileType'] = $attach_file_type;
                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                        $set_board_attach_data['RegIp'] = $this->input->ip_address();

                        if ($this->addBoardAttach($set_board_attach_data) === false) {
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
     * 카테고리 등록
     * @param $inputData
     * @return bool
     */
    protected function addBoardCategory($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['lms_board_r_category']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 카테고리 업데이트
     * @param $whereData
     * @return bool
     */
    protected function updateBoardCategory($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdMemIdx'] = $this->session->userdata('mem_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table['lms_board_r_category']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
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
    protected function addBoardAttach($inputData)
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
     * 파일명 배열 생성
     * @param $board_idx
     * @return array
     */
    protected function getAttachImgNames($board_idx)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_file_names[] = 'board_' . $board_idx . '_0' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }

    /**
     * 캠퍼스 기본 조건 셋팅 [query string]
     * @return string
     */
    protected function addDefWhereOfCampus()
    {
        $where = '
            AND CASE WHEN (b.SiteCode = \'2002\') THEN b.CampusCcd IN (
                SELECT CampusCcd FROM lms_site_r_campus WHERE SiteCode = \'2002\' AND IsStatus = \'Y\'
            ) OR CampusCcd = \'605999\' OR ISNULL(CampusCcd)
            WHEN (b.SiteCode = \'2004\') THEN b.CampusCcd IN (
                SELECT CampusCcd FROM lms_site_r_campus WHERE SiteCode = \'2004\' AND IsStatus = \'Y\'
            ) OR CampusCcd = \'605999\' OR ISNULL(CampusCcd)
            ELSE TRUE
            END
        ';
        return $where;
    }

    /**
     * 캠퍼스 기본 조건 셋팅 [query builder]
     * @return array
     */
    protected function addDefConditionOfCampus()
    {
        $add_condition = [
            "RAW" => [
                'CASE WHEN ' =>
                    "(b.SiteCode = '2002') THEN b.CampusCcd IN (
                        SELECT CampusCcd FROM lms_site_r_campus WHERE SiteCode = '2002' AND IsStatus = 'Y'
                    ) OR CampusCcd = '605999' OR ISNULL(CampusCcd)
                    WHEN (b.SiteCode = '2004') THEN b.CampusCcd IN (
                        SELECT CampusCcd FROM lms_site_r_campus WHERE SiteCode = '2004' AND IsStatus = 'Y'
                    ) OR CampusCcd = '605999' OR ISNULL(CampusCcd)
                    ELSE TRUE
                    END"
            ]
        ];

        return $add_condition;
    }

    /**
     * 게시판 식별자 기준 파일 목록 조회
     * @param $idx
     * @param $reg_type
     * @param $attach_file_type
     * @param $where_column
     * @return array|int
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
}