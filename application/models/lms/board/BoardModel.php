<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends WB_Model
{
    private $_table = 'lms_board';
    private $_table_r_category = 'lms_board_r_category';
    private $_table_attach = 'lms_board_attach';
    private $_table_sys_site = 'lms_site';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_code = 'lms_sys_code';
    private $_table_sys_category = 'lms_sys_category';
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
     * @param $sub_query_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @param string $colum
     * @return mixed
     */
    public function listAllBoard($is_count, $arr_condition = [], $sub_query_condition = [], $limit = null, $offset = null, $order_by = [], $colum = '*')
    {
        if ($is_count === true) {
            $colum = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $sub_query_where = $this->_conn->makeWhere($sub_query_condition);
        $sub_query_where = $sub_query_where->getMakeWhere(false);

        $from = "
            FROM {$this->_table} as LB
            INNER JOIN (
                select subLBrC.BoardIdx, GROUP_CONCAT(CONCAT(subLSC.CateName,'[',subLBrC.CateCode,']')) AS CateCode
                from {$this->_table_r_category} as subLBrC
                LEFT OUTER JOIN {$this->_table_sys_category} as subLSC ON subLBrC.CateCode = subLSC.CateCode
                {$sub_query_where}
                group by subLBrC.BoardIdx
            ) as LBC ON LB.BoardIdx = LBC.BoardIdx
            LEFT OUTER JOIN (
                select BoardIdx, AttachFileType, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName
                from {$this->_table_attach}
                where IsStatus = 'Y'
                GROUP BY BoardIdx
            ) as LBA ON LB.BoardIdx = LBA.BoardIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as B ON LB.RegAdminIdx = B.wAdminIdx and B.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
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
        $board_category_data = $inputData['board_r_category']['site_category'];

        $this->_conn->trans_begin();
        try {
            $board_data = array_merge($board_data,[
                'RegAdminIdx'=> $this->session->userdata('admin_idx')
            ]);

            // 데이터 등록
            if ($this->_conn->set($board_data)->insert($this->_table) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
            // 등록된 게시판 식별자
            $board_idx = $this->_conn->insert_id();

            foreach ($board_category_data as $key => $val) {
                $set_board_category_data['BoardIdx'] = $board_idx;
                $set_board_category_data['CateCode'] = $val;
                $set_board_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $set_board_category_data['RegIp'] = $this->input->ip_address();
                if ($this->_addBoardCategory($set_board_category_data) === false) {
                    throw new \Exception('게시판 등록에 실패했습니다.');
                }
            }

            $this->load->library('upload');
            //$upload_sub_dir = SUB_DOMAIN . '/professor/' . $prof_idx;
            $upload_sub_dir = SUB_DOMAIN . '/board/' . $board_data['BmIdx'] . '/' . date('Ymd');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx), $upload_sub_dir);
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

    /**
     * 게시판 수정
     * @param $inputData
     * @return array|bool
     */
    public function modifyBoard($inputData = [], $idx)
    {
        $this->_conn->trans_begin();
        try {
            $board_idx = $idx;
            $board_data = $inputData['board'];
            $board_category_data = $inputData['board_r_category']['site_category'];

            $result = $this->_findBoardData($board_idx);
            if (empty($result)) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            // board update
            $this->_conn->set($board_data)->where('BoardIdx', $board_idx);
            if ($this->_conn->update($this->_table) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 카테고리
            $is_category = $this->_modifyBoardCategory($board_idx, $board_category_data);
            if ($is_category !== true) {
                throw new \Exception($is_category);
            }

            // 파일 수정
            $is_attach = $this->_modifyBoardAttach($board_idx, $board_data);
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
     * 게시글 복제
     * @param $board_idx
     * @return array|bool
     */
    public function boardCopy($board_idx)
    {
        $admin_idx = $this->session->userdata('admin_idx');
        $reg_ip = $this->input->ip_address();

        $this->_conn->trans_begin();
        try {
            $arr_board_category = $this->_getBoardCategoryArray($board_idx);

            if (count($arr_board_category) <= 0) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }

            $insert_column = '
                BmIdx, SiteCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeGroupCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, ProfIdx, SubjectCcd, LecIdx, Title, Content, ReadCnt, SettingReadCnt, OrderNum, IsUse, IsStatus, RegMemIdx, 
                RegAdminIdx, RegIp, UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $select_column = '
                BmIdx, SiteCode, CampusCcd, RegType, FaqGroupTypeCcd, FaqTypeCcd, TypeGroupCcd, TypeCcd, IsBest, IsPublic, 
                VocCcd, AreaCcd, ProfIdx, SubjectCcd, LecIdx,
                CONCAT("복사본-", IF(LEFT(Title,4)="복사본-", REPLACE(Title, LEFT(Title,4), ""), Title)) AS Title,
                Content, ReadCnt, SettingReadCnt, OrderNum, 
                CASE IsUse WHEN "Y" THEN "N" ELSE "N" END AS IsUse,
                IsStatus, RegMemIdx,
                REPLACE(RegAdminIdx, RegAdminIdx, "'.$admin_idx.'") AS RegAdminIdx,
                REPLACE(RegIp, RegIp, "'.$reg_ip.'") AS RegIp,
                UpdDatm, UpdAdminIdx, ReplyStatusCcd, ReplyContent, ReplyRegDatm, ReplyAdminIdx, ReplyRegIp, ReplyUpdDatm, ReplyUpdAdminIdx
            ';
            $query = "insert into {$this->_table} ({$insert_column})
                select {$select_column} from {$this->_table}
                where BoardIdx = {$board_idx}";
            $result = $this->_conn->query($query);
            $insert_board_idx = $this->_conn->insert_id();

            if ($result === true) {
                foreach ($arr_board_category as $key => $val) {
                    $set_board_category_data['BoardIdx'] = $insert_board_idx;
                    $set_board_category_data['CateCode'] = $val;
                    $set_board_category_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_category_data['RegIp'] = $this->input->ip_address();
                    if ($this->_addBoardCategory($set_board_category_data) === false) {
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
     * 게시판 수정 폼을 위한 데이터 조회
     * @param $board_idx
     * @return mixed
     */
    public function findBoardForModify($board_idx, $column)
    {
        $from = "
            FROM {$this->_table} as LB
            INNER JOIN (
                select subLBrC.BoardIdx, GROUP_CONCAT(subLBrC.CateCode) AS CateCode
                from {$this->_table_r_category} as subLBrC
                LEFT OUTER JOIN {$this->_table_sys_category} as subLSC ON subLBrC.CateCode = subLSC.CateCode
                WHERE subLBrC.IsStatus = 'Y'
                group by subLBrC.BoardIdx
            ) as LBC ON LB.BoardIdx = LBC.BoardIdx
            LEFT OUTER JOIN (
                select BoardIdx, AttachFileType, GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx, GROUP_CONCAT(AttachFilePath) AS AttachFilePath, GROUP_CONCAT(AttachFileName) AS AttachFileName
                from {$this->_table_attach}
                where IsStatus = 'Y'
                GROUP BY BoardIdx
            ) as LBA ON LB.BoardIdx = LBA.BoardIdx
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON LB.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as B ON LB.RegAdminIdx = B.wAdminIdx and B.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table_sys_code} as LSC ON LB.CampusCcd = LSC.Ccd
        ";
        $where = $this->_conn->makeWhere([
            /*'EQ'=>['LB.BoardIdx'=>$board_idx,'A.IsStatus'=>'Y']*/
            'EQ'=>['LB.BoardIdx'=>$board_idx]
        ]);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * Best 상태 update
     * @param array $params
     * @return array|bool
     */
    public function boardIsBest($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            $set_data_Y = ['IsBest'=>'Y'];
            $str_board_idx_Y = implode(',', array_keys($params));
            $arr_board_idx_Y = explode(',', $str_board_idx_Y);
            $this->_conn-> set($set_data_Y)->where_in('boardIdx',$arr_board_idx_Y);

            if($this->_conn->update($this->_table)=== false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

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
            if (@unlink($real_file_path) === false) {
                throw new \Exception('이미지 삭제에 실패했습니다.');
            }

            $data = ['IsStatus'=>'N'];
            $this->_conn->set($data)->where('BoardFileIdx', $attach_idx);

            if($this->_conn->update($this->_table_attach)=== false) {
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
     * 게시판 카테고리 조회
     * @param $board_idx
     * @return array|int
     */
    private function _getBoardCategoryArray($board_idx)
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'BoardIdx' => $board_idx]];
        $data = $this->_conn->getListResult($this->_table_r_category, 'BoardSiteCateIdx, CateCode', $arr_condition, null, null, [
            'BoardSiteCateIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'CateCode', 'BoardSiteCateIdx');
        return $data;
    }

    /**
     * 카테고리 등록
     * @param $inputData
     * @return bool
     */
    private function _addBoardCategory($inputData)
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
     * 카테고리 수정
     * @param $board_idx
     * @param $board_category_data
     * @return bool|string
     */
    private function _modifyBoardCategory($board_idx, $board_category_data)
    {
        try {
            // 기존 카테고리 조회
            $arr_board_category = array_values($this->_getBoardCategoryArray($board_idx));
            $up_arr_category_data = array_diff($arr_board_category, $board_category_data);     //N 업데이트
            $ins_arr_category_data = array_diff($board_category_data, $arr_board_category);     //insert

            $up_cate_data = [];
            foreach ($up_arr_category_data as $key => $val) {
                $up_cate_data['BoardIdx'] = $board_idx;
                $up_cate_data['CateCode'] = $val;
                if ($this->_updateBoardCategory($up_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }

            $ins_cate_data = [];
            foreach ($ins_arr_category_data as $key => $val) {
                $ins_cate_data['BoardIdx'] = $board_idx;
                $ins_cate_data['CateCode'] = $val;
                $ins_cate_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                $ins_cate_data['RegIp'] = $this->input->ip_address();
                if ($this->_addBoardCategory($ins_cate_data) === false) {
                    throw new \Exception('게시판 등록(카테고리)에 실패했습니다.');
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }

    /**
     * 카테고리 업데이트
     * @param $whereData
     * @return bool
     */
    private function _updateBoardCategory($whereData)
    {
        try {
            $input['IsStatus'] = 'N';
            $input['UpdAdminIdx'] = $this->session->userdata('admin_idx');
            $input['UpdDatm'] = date('Y-m-d H:i:s');

            $this->_conn->set($input)->where($whereData);

            if ($this->_conn->update($this->_table_r_category) === false) {
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
    private function _addBoardAttach($inputData)
    {
        try {
            if ($this->_conn->set($inputData)->insert($this->_table_attach) === false) {
                throw new \Exception('게시판 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 파일 수정
     * 파일 등록 상태에 따른 DB insert, update 분기 처리
     * update 발생 시 파일 삭제 처리
     * @param $board_idx
     * @param $board_data
     * @return array|bool
     */
    private function _modifyBoardAttach($board_idx, $board_data)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['name'];
            $arr_board_attach = $this->_getBoardAttachArray($board_idx);
            $arr_board_attach_keys = array_keys($arr_board_attach);

            $this->load->library('upload');
            $upload_sub_dir = SUB_DOMAIN . '/board/' . $board_data['BmIdx'] . '/' . date('Ymd');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($board_idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($board_attach_data as $key => $val) {
                if (empty($val) === false) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['BoardIdx'] = $board_idx;
                        $set_board_attach_data['RegType'] = 1;
                        $set_board_attach_data['AttachFileType'] = 0;
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
                        if (@unlink($real_img_path) === false) {
                            throw new \Exception('이미지 삭제에 실패했습니다.');
                        }

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

            if ($this->_conn->update($this->_table_attach) === false) {
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

    /**
     * 게시판 식별자 기준 파일 목록 조회
     * @param $board_idx
     * @return array|int
     */
    private function _getBoardAttachArray($board_idx)
    {
        $arr_condition = ['EQ' => ['IsStatus' => 'Y', 'BoardIdx' => $board_idx]];
        $data = $this->_conn->getListResult($this->_table_attach, 'BoardFileIdx, CONCAT(AttachFilePath, AttachFileName) AS FileInfo', $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);
        $data = array_pluck($data, 'FileInfo', 'BoardFileIdx');

        return $data;
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
        $data = $this->_conn->getListResult($this->_table_attach, $column, $arr_condition, null, null, [
            'BoardFileIdx' => 'asc'
        ]);

        return $data;
    }

    /**
     * 단일 데이터 조회(데이터 update 발생 시 idx 검증)
     * @param $idx
     * @return mixed
     */
    private function _findBoardData($idx)
    {
        $colum = 'BoardIdx';
        $from = "
            FROM {$this->_table}
        ";
        $where = $this->_conn->makeWhere([
            'EQ' => [
                'BoardIdx' => $idx
            ]
        ]);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $colum . $from . $where);
        $query = $query->result_array();

        return $query;
    }
}