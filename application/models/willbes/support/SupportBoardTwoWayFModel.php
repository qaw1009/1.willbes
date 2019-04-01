<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/support/BaseSupportFModel.php';

class SupportBoardTwoWayFModel extends BaseSupportFModel
{
    // 첨부 이미지 수
    public $_attach_img_cnt = 7;
    public $_attach_assignment_file_cnt = 5;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 게시판 글 목록 추출
     * @param $is_count
     * @param array $arr_condition
     * @param null $cate_code
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listBoard($is_count, $arr_condition=[], $cate_code, $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', BoardFileIdx,
                        'FileType', AttachFiletype,
                        'FilePath', AttachFilePath,
                        'FileName', AttachFileName,
                        'RealName', AttachRealFileName,
                        'Filesize', AttachFileSize
                    )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['twoway_board_2']}
            left join {$this->_table['lms_member']} as m on b.RegMemIdx = m.MemIdx
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 게시글 조회
     * @param $board_idx
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findBoard($board_idx,$arr_condition=[],$column='*',$limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $from = "
            FROM {$this->_table['twoway_board_find']} AS b
            left join {$this->_table['lms_member']} as m on b.RegMemIdx = m.MemIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
    }

    /**
     * 강사게시판
     * @param $is_count
     * @param $site_code
     * @param $prof_idx
     * @param array $arr_condition
     * @param $cate_code
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForProf($is_count, $site_code, $prof_idx, $arr_condition=[], $cate_code, $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', BoardFileIdx,				
                        'FileType', AttachFiletype,
                        'FilePath', AttachFilePath,
                        'FileName', AttachFileName,
                        'RealName', AttachRealFileName,
                        'Filesize', AttachFileSize
                    )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['twoway_board_2']}
            left join {$this->_table['lms_member']} as m on b.RegMemIdx = m.MemIdx
            
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
            
            INNER JOIN (
                SELECT ProfIdx
                FROM {$this->_table['lms_professor']}
                WHERE wProfIdx = (
                    SELECT wProfIdx
                    FROM {$this->_table['lms_professor']}
                    WHERE ProfIdx = '{$prof_idx}'
                )
            ) AS p ON b.ProfIdx = p.ProfIdx
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 사이트 그룹에 속한 게시글 조회
     * @param $site_code
     * @param $board_idx
     * @param array $arr_condition
     * @param string $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function findBoardForSiteGroup($site_code, $board_idx, $arr_condition=[], $column='*', $limit = null, $offset = null, $order_by = [])
    {
        $arr_condition = array_merge_recursive($arr_condition,[
            'EQ' => [
                'b.BoardIdx' => $board_idx,
            ]
        ]);

        $from = "
            FROM {$this->_table['twoway_board_find']}
            INNER JOIN (
                SELECT SiteGroupCode
                FROM {$this->_table['site']}
                WHERE SiteCode = '{$site_code}'
            ) AS s ON b.SiteGroupCode = s.SiteGroupCode
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();

        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->row_array();
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
                /*'RegMemId'=> $this->session->userdata('mem_id'),
                'RegMemName'=> $this->session->userdata('mem_name'),*/
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($board_data)->insert($this->_table['lms_board']) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            /*if ($board_data['SiteCode'] != config_item('app_intg_site_code')) {*/
            if (empty($board_category_data['site_category']) === false) {
                $set_board_category_data['BoardIdx'] = $board_idx;
                $set_board_category_data['CateCode'] = $board_category_data['site_category'];
                $set_board_category_data['RegMemIdx'] = $this->session->userdata('mem_idx');
                $set_board_category_data['RegIp'] = $this->input->ip_address();
                if ($this->addBoardCategory($set_board_category_data) === false) {
                    throw new \Exception('게시판 등록에 실패했습니다.');
                }
            }
            /*}*/

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
            /*$uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($board_idx), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite'].',max_size:'.$this->upload_file_rule['max_size']);*/
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($board_idx), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

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

    /**
     * 게시판 글 수정
     * @param array $inputData
     * @param $idx
     * @return array|bool
     */
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

            if ($result['RegType'] == '0' && $result['IsPublic'] == 'N' && $result['RegMemIdx'] != $this->session->userdata('mem_idx')) {
                throw new \Exception('잘못된 접근 입니다.');
            }

            $board_data = array_merge($board_data,[
                'UpdMemIdx' => $this->session->userdata('admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($board_data)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table['lms_board']) === false) {
                throw new \Exception('게시판 수정에 실패했습니다.');
            }

            // 카테고리
            if ($result['SiteCode'] != config_item('app_intg_site_code')) {
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

    /**
     * 조건에 따른 카운트 값 리턴
     * @param $arr_condition
     * @return mixed
     */
    public function getCountBoard($arr_condition)
    {
        $column = 'count(*) AS numrows';

        $from = "
            from {$this->_table['twoway_board_find']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where);

        return $query->row(0)->numrows;
    }

    /**
     * 등록 게시글의 교수 정보 조회
     * @param $arr_condition
     * @return array
     */
    public function getProfForMemberList($arr_condition)
    {
        $column = 'ProfIdx, ProfName';
        $from = "
            from {$this->_table['twoway_board_2']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $group_by = '
            GROUP BY ProfIdx
        ';
        // 쿼리 실행
        $data = $this->_conn->query('select ' .$column .$from .$where .$group_by)->result_array();
        return array_pluck($data, 'ProfName', 'ProfIdx');
    }

    /**
     * 등록 게시글의 과목 정보 조회
     * @param $arr_condition
     * @return array
     */
    public function getSubjectForMemberList($arr_condition)
    {
        $column = 'SubjectIdx, SubjectName';
        $from = "
            from {$this->_table['twoway_board_find']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $group_by = '
            GROUP BY ProdCode
        ';
        // 쿼리 실행
        $data = $this->_conn->query('select ' .$column .$from .$where .$group_by)->result_array();
        return array_pluck($data, 'SubjectName', 'SubjectIdx');
    }

    /**
     * 회원별 과제 노출 총 수
     * @param array $arr_condition
     * @return mixed
     */
    public function listTotalCountForAssignment($arr_condition = [])
    {
        $column = 'count(*) AS numrows';
        $from = "
            FROM {$this->_table['lms_board_assignment_r_schedule_date']}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $query = $this->_conn->query('select ' . $column . $from . $where);
        return $query->row(0)->numrows;
    }

    /**
     * 회원별 과제 목록
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForAssignment($arr_condition=[], $column = null, $limit = null, $order_by = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
        $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit)->getMakeLimitOffset();

        $query = "
            SELECT (@rownum := @rownum + 1) AS rownum, t.*
            FROM (
            SELECT {$column}
            FROM {$this->_table['twoway_board_2']}
            LEFT JOIN {$this->_table['lms_board_assignment']} AS a ON a.BoardIdx = b.BoardIdx AND a.MemIdx = {$this->session->userdata('mem_idx')} AND a.IsStatus = 'Y'
            ,(SELECT @rownum := 0) AS tmp
            {$where}
            {$order_by_offset_limit}
            ) AS t
            ORDER BY rownum DESC
        ";
        return $this->_conn->query($query)->result_array();
    }

    /**
     * 과제 상세 정보
     * @param string $join_type
     * @param array $arr_condition
     * @param null $column
     * @return mixed
     */
    public function findBoardForAssignment($join_type = 'INNER', $arr_condition=[], $column = null)
    {
        $sub_where = ($join_type == 'INNER') ? $sub_where = ' AND a.IsStatus = "Y"' : '';
        $from = "
            FROM {$this->_table['twoway_board_2']}
            {$join_type} JOIN {$this->_table['lms_board_assignment']} AS a ON a.BoardIdx = b.BoardIdx AND a.MemIdx = {$this->session->userdata('mem_idx')} {$sub_where}
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select STRAIGHT_JOIN '.$column .$from .$where)->row_array();
    }

    /**
     * 과제 제출
     * @param array $inputData
     * @return array|bool
     */
    public function addBoardForAssignment($inputData = [])
    {
        $this->_conn->trans_begin();
        try {
            if ($this->_conn->set($inputData)->insert($this->_table['lms_board_assignment']) === false) {
                throw new \Exception('과제 등록에 실패했습니다.');
            }
            $ba_idx = $this->_conn->insert_id();

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
            $upload_sub_dir = config_item('upload_prefix_dir') . '/board/88/' . date('Y') . '/' . date('md');
            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->getAttachImgNames($ba_idx), $upload_sub_dir
                ,'allowed_types:'.$this->upload_file_rule['allowed_types'].',overwrite:'.$this->upload_file_rule['overwrite']);

            if (is_array($uploaded) === false) {
                throw new \Exception('파일 등록에 실패했습니다.');
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['BaIdx'] = $ba_idx;
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

    /**
     * 과제 임시 저장 시 내용 수정
     * @param $input
     * @param $ba_idx
     * @return array|bool
     */
    public function modifyBoardForAssignment($input = [], $ba_idx) {
        $this->_conn->trans_begin();
        try {
            /*$board_idx = element('board_idx', $input);*/
            $board_idx = element('BoardIdx', $input);

            $result = $this->findBoard($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $input = array_merge($input,[
                'IsStatus' => 'Y',
                'UpdMemIdx' => $this->session->userdata('mem_idx'),
                'UpdDatm' => date('Y-m-d H:i:s'),
                'UpIp' => $this->input->ip_address()
            ]);

            $this->_conn->set($input)->where('BaIdx', $ba_idx);
            if ($this->_conn->update($this->_table['lms_board_assignment']) === false) {
                throw new \Exception('제출된 과제 수정에 실패했습니다');
            }

            $reg_type = 0;              //0:일반유저등록, 1:관리자등록
            $attach_file_type = 0;      //0 - 본문글 첨부파일, 1 - 본문내 답변글 첨부파일
            $is_attach = $this->modifyBoardAttachForAssignment($ba_idx, $reg_type, $attach_file_type);
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
     * 모의고사별 이의제기 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForMockTest($is_count, $arr_condition=[], $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', BoardFileIdx,				
                        'FileType', AttachFiletype,
                        'FilePath', AttachFilePath,
                        'FileName', AttachFileName,
                        'RealName', AttachRealFileName,
                        'Filesize', AttachFileSize
                    )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['twoway_board_2']}
            left join {$this->_table['lms_member']} as m on b.RegMemIdx = m.MemIdx
            LEFT JOIN {$this->_table['lms_order_product']} AS op ON op.ProdCode = b.ProdCode AND b.RegMemIdx = op.MemIdx
            LEFT JOIN {$this->_table['lms_mock_register']} AS mr ON op.OrderProdIdx = mr.OrderProdIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 1:1 상담게시판 리스트
     * @param $is_count
     * @param array $arr_condition
     * @param $cate_code
     * @param null $column
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBoardForQna($is_count, $arr_condition=[], $cate_code, $column = 'b.BoardIdx', $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $def_column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $def_column = "
                m.*,
                IFNULL((
                    SELECT
                    CONCAT('[', GROUP_CONCAT(JSON_OBJECT(
                        'FileIdx', BoardFileIdx,				
                        'FileType', AttachFiletype,
                        'FilePath', AttachFilePath,
                        'FileName', AttachFileName,
                        'RealName', AttachRealFileName,
                        'Filesize', AttachFileSize
                    )), ']') AS AttachData	
                    
                    FROM lms_board_attach
                    WHERE BoardIdx=m.BoardIdx AND IsStatus='Y'
                ),'N') AS AttachData
            ";
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['twoway_board_2']}
            left join {$this->_table['lms_member']} as m on b.RegMemIdx = m.MemIdx
        ";

        if (empty($cate_code) === false) {
            $from .= "
                inner join {$this->_table['lms_board_r_category']} as c
                    on b.BoardIdx = c.BoardIdx and c.IsStatus = 'Y'
                inner join {$this->_table['lms_sys_category']} as d
                    on c.CateCode = d.CateCode and d.IsStatus = 'Y'
            ";

            $arr_condition = array_merge($arr_condition,[
                'RAW' => [
                    'c.CateCode = ' => (empty($cate_code) === true) ? '\'\'' : $cate_code
                ]
            ]);
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $set_query = ' FROM ( select ' . $column;
        $set_query .= $from . $where . $order_by_offset_limit;
        $set_query .= ') AS m ';
        $query = $this->_conn->query('select ' . $def_column . $set_query);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 파일 삭제
     * @param $attach_idx
     * @return array|bool
     */
    public function removeFile($attach_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_data = $this->_findBoardAttach($attach_idx)[0];
            if (empty($arr_data) === true) {
                throw new \Exception('삭제할 데이터가 없습니다.');
            }

            $file_path = $arr_data['AttachFilePath'].$arr_data['AttachFileName'];
            $this->load->helper('file');
            $real_file_path = public_to_upload_path($file_path);
            /*if (@unlink($real_file_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }*/

            $data = ['IsStatus'=>'N'];
            $this->_conn->set($data)->where('BoardFileIdx', $attach_idx);

            if($this->_conn->update($this->_table['lms_board_attach'])=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 파일 식별자 기준 파일 목록 조회
     * @param $attach_idx
     * @return array|int
     */
    private function _findBoardAttach($attach_idx)
    {
        $column = 'BoardFileIdx, BoardIdx, AttachFilePath, AttachFileName, AttachFileSize';
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'BoardFileIdx' => $attach_idx]];
        $data = $this->_conn->getListResult($this->_table['lms_board_attach'], $column, $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);

        return $data;
    }
}