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
        'lms_correct_unit_assignment' => 'lms_correct_unit_assignment',
        'lms_board_attach' => 'lms_board_attach',
        'lms_correct_assign' => 'lms_correct_assign',
        'lms_correct_assign_detail' => 'lms_correct_assign_detail',
        'lms_btob_admin' => 'lms_btob_admin',
        'lms_product' => 'lms_product',
        'lms_member' => 'lms_member',
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
    public function listCorrectUnit($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [], $is_authority = true, $arr_condition_authority = [])
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
            INNER JOIN {$this->_table['lms_btob_admin']} AS BA ON CU.RegAdminIdx = BA.AdminIdx
        ";

        if ($is_authority === false) {
            $where_authority = $this->_conn->makeWhere($arr_condition_authority);
            $where_authority = $where_authority->getMakeWhere(false);

            $from .= "
                INNER JOIN (
                    SELECT CorrectIdx
                    FROM {$this->_table['lms_correct_assign']} AS a
                    INNER JOIN {$this->_table['lms_correct_assign_detail']} AS b ON a.CaIdx = b.CaIdx
                    {$where_authority}
                    GROUP BY a.CorrectIdx
                ) AS assign ON assign.CorrectIdx = CU.CorrectIdx
            ";
        }

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

    /**
     * 첨삭현황 리스트
     * @param $join_type
     * @param false $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listCorrectAssignment($join_type = 'INNER', $is_count = false, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'cua.CuaIdx,cua.CorrectIdx,cua.IsReply,cua.RegDatm,cua.ReplyRegDatm,cua.ReplyScore,cua.AssignmentStatusCcd
                ,p.ProdName,cu.Title,cu.StartDate,cu.EndDate,cu.Price,ba.AdminName AS AssignAdminName,m.MemName,m.MemId
                ,ca.RegDatm AS AssignRegDate,cua.IsStatus
                ,IFNULL(fn_board_attach_data_correct_assignment(cua.CuaIdx,0),NULL) AS AttachAssignmentData_User
                ,DATEDIFF(cu.EndDate, DATE_FORMAT(NOW(), "%Y-%m-%d")) AS Date_Diff
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table['lms_correct_unit_assignment']} AS cua
            INNER JOIN {$this->_table['lms_correct_unit']} AS cu ON cua.CorrectIdx = cu.CorrectIdx
            INNER JOIN {$this->_table['lms_product']} AS p ON cu.ProdCode = p.ProdCode
            INNER JOIN {$this->_table['lms_member']} AS m ON cua.MemIdx = m.MemIdx
            {$join_type} JOIN {$this->_table['lms_correct_assign_detail']} AS cad ON cua.CuaIdx = cad.CuaIdx AND cad.IsStatus = 'Y'
            {$join_type} JOIN {$this->_table['lms_correct_assign']} AS ca ON cad.CaIdx = ca.CaIdx
            {$join_type} JOIN {$this->_table['lms_btob_admin']} AS ba ON cad.AssignAdminIdx = ba.AdminIdx
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        //echo 'select ' . $column . $from . $where . $order_by_offset_limit;        exit;
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 첨삭게시판 상세 정보 조회
     * @param $arr_condition
     * @return mixed
     */
    public function findCorrectAssignment($arr_condition)
    {
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $column = '
            a.CuaIdx, b.Title, p.ProdName,
            f.MemName, f.MemId, fn_dec(f.PhoneEnc) AS MemPhone, f2.SmsRcvStatus,
            ReplyADMIN.AdminName AS ReplyAdminName, a.RegDatm, a.IsReply, a.ReplyScore, a.ReplyRegDatm, a.ReplyIsStatus,
            b.Content AS ProfContent, a.Content AS MemContent, a.ReplyContent
            ,fn_board_attach_data_correct(a.CorrectIdx) AS adminFiles
            ,fn_board_attach_data_correct_assignment(a.CuaIdx,0) AS userFiles
            ,fn_board_attach_data_correct_assignment(a.CuaIdx,1) AS replyAdminFiles
        ';

        $from = "
            FROM (
                SELECT CuaIdx, CorrectIdx, Content, ReplyContent, MemIdx, IsReply, ReplyScore, RegDatm, ReplyRegDatm, ReplyRegAdminIdx, IsStatus AS ReplyIsStatus
                FROM lms_correct_unit_assignment {$where}
            ) AS a
            INNER JOIN lms_correct_unit AS b ON a.CorrectIdx = b.CorrectIdx
            INNER JOIN lms_product AS p ON b.ProdCode = p.ProdCode
            INNER JOIN lms_member AS f ON a.MemIdx = f.MemIdx
            INNER JOIN lms_member_otherinfo AS f2 ON a.MemIdx = f2.MemIdx
            LEFT OUTER JOIN lms_btob_admin AS ReplyADMIN ON a.ReplyRegAdminIdx = ReplyADMIN.AdminIdx AND ReplyADMIN.IsStatus='Y'
        ";
        return $this->_conn->query('select ' . $column . $from)->row_array();
    }

    /**
     * 회차별 등록된 첨삭 회원
     * @param bool $is_count
     * @param $correct_idx
     * @return mixed
     */
    public function getUnitMember($is_count = true, $correct_idx = '')
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
        } else {
            $column = 'CuaIdx, MemIdx';
        }

        $arr_condition = [
            'EQ' => [
                'CorrectIdx' => $correct_idx,
                'IsReply' => 'N',
                'IsStatus' => 'Y'
            ],
            'RAW' => [
                "CuaIdx NOT IN" => "(SELECT b.CuaIdx FROM {$this->_table['lms_correct_assign']} AS a 
                                        INNER JOIN {$this->_table['lms_correct_assign_detail']} AS b ON a.CaIdx = b.CaIdx and b.IsStatus = 'Y'
                                        WHERE a.CorrectIdx = '{$correct_idx}' AND a.IsStatus = 'Y')"
            ]
        ];
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['lms_correct_unit_assignment']}
        ";
        $query = $this->_conn->query('select ' . $column .$from .$where);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 첨삭등록
     * @param $form_data
     */
    public function modifyAssignmentBoard($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $cua_idx = element('cua_idx', $form_data);
            if (empty($cua_idx) === true) {
                throw new \Exception('필수 데이터 누락입니다.');
            }

            $result_data = $this->findCorrectAssignment(['EQ' => ['CuaIdx' => $cua_idx]]);
            if (empty($result_data) === true) {
                throw new \Exception('조회된 첨삭 회원 데이터가 없습니다.');
            }

            $board_data = [
                'IsReply' => 'Y',
                'AssignmentStatusCcd' => $this->arr_assignment_status_ccd['M'],
                'ReplyContent' => element('board_content', $form_data),
                'ReplyScore' => element('reply_score', $form_data),
                'ReplyRegDatm' => date('Y-m-d H:i:s'),
                'ReplyRegAdminIdx' => $this->session->userdata('btob.admin_idx'),
                'ReplyRegIp' => $this->input->ip_address()
            ];

            $this->_conn->set($board_data)->where('CuaIdx', $cua_idx);
            if ($this->_conn->update($this->_table['lms_correct_unit_assignment']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            //파일저장
            $this->load->library('upload');
            $upload_sub_dir = 'willbes/correct/' . '/' . date('Y') . '/' . date('md');

            $uploaded = $this->upload->uploadFile('file', ['attach_file'], $this->_getAttachImgNames($cua_idx), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }

            foreach ($uploaded as $idx => $attach_files) {
                if (count($attach_files) > 0) {
                    $set_board_attach_data['CuaIdx'] = $cua_idx;
                    $set_board_attach_data['RegType'] = 1;
                    $set_board_attach_data['AttachFileType'] = 0;
                    $set_board_attach_data['AttachFilePath'] = $this->upload->_upload_url . $upload_sub_dir . '/';
                    $set_board_attach_data['AttachFileName'] = $attach_files['orig_name'];
                    $set_board_attach_data['AttachRealFileName'] = $attach_files['client_name'];
                    $set_board_attach_data['AttachFileSize'] = $attach_files['file_size'];
                    $set_board_attach_data['RegAdminIdx'] = $this->session->userdata('btob.admin_idx');
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