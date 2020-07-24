<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobCorrectModel extends WB_Model
{
    public $_attach_img_cnt = 5;
    public $reg_type = [
        'user' => 0,    //유저 등록 정보
        'admin' => 1    //admin 등록 정보
    ];
    public $attach_file_type = [
        'default' => 0,     //본문글 첨부
        'reply' => 1        //본문 답변글첨부
    ];
    public $arr_assignment_status_ccd = [
        'R' => '698001',    //임시저장
        'S' => '698002',    //제출완료
        'M' => '698003'     //채점완료
    ];

    private $_table = [
        'lms_correct_unit' => 'lms_correct_unit',
        'lms_board_attach' => 'lms_board_attach',
        'lms_btob_admin' => 'lms_btob_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 회차리스트
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCorrectUnit($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                CU.CorrectIdx,CU.SiteCode,CU.ProdCode,CU.Title,CU.Price,CU.StartDate,CU.EndDate,CU.IsUse,CU.RegDatm,CU.RegAdminIdx,BA.AdminName
                ,IFNULL(fn_board_attach_data_correct(CU.CorrectIdx),NULL) AS AttachFileName
                ,DATEDIFF(CU.EndDate, DATE_FORMAT(NOW(), "%Y-%m-%d")) AS Date_Diff
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['lms_correct_unit']} AS CU
            INNER JOIN {$this->_table['lms_btob_admin']} AS BA ON CU.RegAdminIdx = BA.RegAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 회차정보 조회
     * @param string $column
     * @param array $arr_condition
     * @param array $arr_condition_file
     * @return mixed
     */
    public function findCorrectUnitForModify($column = '*', $arr_condition = [], $arr_condition_file = [])
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $where_file = $this->_conn->makeWhere($arr_condition_file);
        $where_file = $where_file->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lms_correct_unit']} AS CU
            LEFT JOIN (
                SELECT CorrectIdx, AttachFileType
                , GROUP_CONCAT(BoardFileIdx) AS AttachFileIdx
                , GROUP_CONCAT(AttachFilePath) AS AttachFilePath
                , GROUP_CONCAT(AttachFileName) AS AttachFileName
                , GROUP_CONCAT(AttachRealFileName) AS AttachRealFileName
                FROM {$this->_table['lms_board_attach']} {$where_file}
                GROUP BY CorrectIdx
            ) AS BAT ON CU.CorrectIdx = BAT.CorrectIdx
            LEFT OUTER JOIN {$this->_table['lms_btob_admin']} AS ADMIN ON CU.RegAdminIdx = ADMIN.AdminIdx AND ADMIN.IsStatus='Y'
            LEFT OUTER JOIN {$this->_table['lms_btob_admin']} AS ADMIN2 ON CU.UpdAdminIdx = ADMIN2.AdminIdx AND ADMIN2.IsStatus='Y'
        ";
        return $this->_conn->query('select ' . $column .$from .$where)->row_array();
    }

    /**
     * 회차등록/파일등록
     * @param $form_data
     * @return array|bool
     */
    public function addUnit($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $data = $this->_setData($form_data);
            $data = array_merge($data, [
                'RegAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'RegIp' => $this->input->ip_address()
            ]);

            // 데이터 등록
            if ($this->_conn->set($data)->insert($this->_table['lms_correct_unit']) === false) {
                throw new \Exception('회차 등록에 실패했습니다.');
            }
            // 등록된 첨삭 식별자
            $idx = $this->_conn->insert_id();

            $this->load->library('upload');
            $upload_sub_dir = 'willbes/correct/' . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $key => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['CorrectIdx'] = $idx;
                    $set_board_attach_data['RegType'] = 1;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    $set_board_attach_data['RegIp'] = $this->input->ip_address();
                }

                if ($this->_addBoardAttach($set_board_attach_data) === false) {
                    throw new \Exception('파일 등록에 실패했습니다.');
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
     * 회차정보/파일정보 수정
     * @param $form_data
     * @param $correct_idx
     * @return array|bool
     */
    public function modifyUnit($form_data, $correct_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ'=>[
                    'CU.SiteCode' => element('site_code', $form_data),
                    'CU.ProdCode' => element('prod_code', $form_data),
                    'CU.CorrectIdx' => $correct_idx,
                    'CU.IsStatus' => 'Y'
                ]
            ];
            $arr_condition_file = [
                'EQ'=>[
                    'CorrectIdx' => $correct_idx,
                    'RegType' => $this->reg_type['admin'],
                    'AttachFileType' => $this->attach_file_type['default'],
                    'IsStatus' => 'Y'
                ]
            ];
            $result = $this->findCorrectUnitForModify($column = '*', $arr_condition, $arr_condition_file);
            if (empty($result)) {
                throw new \Exception('조회된 데이터가 없습니다.');
            }

            // update
            $data = $this->_setData($form_data);
            $data = array_merge($data,[
                'UpdAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ]);
            $this->_conn->set($data)->where('CorrectIdx', $correct_idx);
            if ($this->_conn->update($this->_table['lms_correct_unit']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            // 파일 수정
            $reg_type = $this->reg_type['admin'];
            $attach_file_type = $this->attach_file_type['default'];
            $is_attach = $this->modifyBoardAttach($correct_idx, $reg_type, $attach_file_type);
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
     * 파일정보 수정
     * @param $correct_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|bool
     */
    public function modifyBoardAttach($correct_idx, $reg_type, $attach_file_type)
    {
        try {
            $board_attach_data = $_FILES['attach_file']['size'];
            $arr_board_attach = $this->_getBoardAttachArray($correct_idx, $reg_type, $attach_file_type);
            $arr_board_attach_keys = array_keys($arr_board_attach);

            $this->load->library('upload');
            $upload_sub_dir = 'willbes/correct/' . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($correct_idx), $upload_sub_dir);

            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($board_attach_data as $key => $val) {
                /*if (empty($val) === false && $val != 'blob') {*/
                if ($val > 0) {
                    if (empty($arr_board_attach_keys[$key]) === true) {
                        //ins
                        $set_board_attach_data['CorrectIdx'] = $correct_idx;
                        $set_board_attach_data['RegType'] = $reg_type;
                        $set_board_attach_data['AttachFileType'] = $attach_file_type;
                        $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                        $set_board_attach_data['AttachFileName'] = $uploaded[$key]['orig_name'];
                        $set_board_attach_data['AttachRealFileName'] = $uploaded[$key]['client_name'];
                        $set_board_attach_data['AttachFileSize'] = $uploaded[$key]['file_size'];
                        $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('btob.admin_idx');
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
            return error_result($e);
        }
        return true;
    }

    /**
     * 단일 파일 삭제
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
     * 회차정보 삭제
     * @param $correct_idx
     * @return array|bool
     */
    public function deleteUnit($correct_idx)
    {
        $this->_conn->trans_begin();
        try {
            $arr_condition = [
                'EQ'=>[
                    'CU.CorrectIdx' => $correct_idx,
                    'CU.IsStatus' => 'Y'
                ]
            ];
            $arr_condition_file = [
                'EQ'=>[
                    'CorrectIdx' => $correct_idx,
                    'RegType' => $this->reg_type['admin'],
                    'AttachFileType' => $this->attach_file_type['default'],
                    'IsStatus' => 'Y'
                ]
            ];
            $result = $this->findCorrectUnitForModify($column = '*', $arr_condition, $arr_condition_file);
            if (empty($result)) {
                throw new \Exception('조회된 데이터가 없습니다.');
            }

            $is_update = $this->_conn->set([
                'IsStatus' => 'N',
                'UpdAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'UpdDatm' => date('Y-m-d H:i:s')
            ])->where('CorrectIdx', $correct_idx)->where('IsStatus', 'Y')->update($this->_table['lms_correct_unit']);

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

    public function listCorrectAssignment($is_count = false, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        /*if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                CU.CorrectIdx,CU.SiteCode,CU.ProdCode,CU.Title,CU.Price,CU.StartDate,CU.EndDate,CU.IsUse,CU.RegDatm,CU.RegAdminIdx,BA.AdminName
                ,IFNULL(fn_board_attach_data_correct(CU.CorrectIdx),NULL) AS AttachFileName
                ,DATEDIFF(CU.EndDate, DATE_FORMAT(NOW(), "%Y-%m-%d")) AS Date_Diff
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = " FROM {$this->_table['lms_correct_unit']} AS CU
            INNER JOIN {$this->_table['lms_btob_admin']} AS BA ON CU.RegAdminIdx = BA.RegAdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();*/
    }

    /**
     * 첨삭 회차 식별자 기준 파일 목록 조회
     * @param $correct_idx
     * @param $reg_type
     * @param $attach_file_type
     * @return array|int
     */
    private function _getBoardAttachArray($correct_idx, $reg_type, $attach_file_type)
    {
        $arr_condition = [
            'EQ' => [
                'IsStatus' => 'Y',
                'CorrectIdx' => $correct_idx,
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
            $input['UpdAdminIdx'] = $this->session->userdata('btob.admin_idx');
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

    private function _setData($form_data)
    {
        $set_data = [
            'SiteCode' => element('site_code', $form_data),
            'ProdCode' => element('prod_code', $form_data),
            'Title' => element('title', $form_data),
            'Content' => element('board_content', $form_data),
            'Price' => element('price', $form_data),
            'StartDate' => element('start_date', $form_data),
            'EndDate' => element('end_date', $form_data),
            'IsUse' => element('is_use', $form_data),
        ];

        return $set_data;
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
     * 파일명 배열 생성
     * @param $idx
     * @return array
     */
    private function _getAttachImgNames($idx)
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 1; $i <= $this->_attach_img_cnt; $i++) {
            $attach_file_names[] = 'correct_' . $idx . '_0' . $i . '_' . $temp_time;
        }
        return $attach_file_names;
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