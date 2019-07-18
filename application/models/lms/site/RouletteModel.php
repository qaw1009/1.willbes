<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouletteModel extends WB_Model
{
    private $_table = [
        'member' => 'lms_member',
        'roulette' => 'lms_roulette',
        'roulette_otherinfo' => 'lms_roulette_otherinfo',
        'roulette_member' => 'lms_roulette_member',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listAllRoulette($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.RouletteCode, a.Title, a.CountType, a.MemberLimitCount, a.MaxLimitCount, a.NewMemberJoinType, a.NewMemberJoinStartDate, a.NewMemberJoinEndDate, a.RouletteStartDatm, a.RouletteEndDatm, a.ProbabilityType, a.IsUse, a.IsStatus, a.Memo, a.RegDatm, a.RegAdminIdx
                ,b.wAdminName AS RegAdminName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['roulette']} AS a
            INNER JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx AND b.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS c ON a.UpdAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 단일 데이터 검색
     * @param array $arr_condition
     * @return mixed
     */
    public function findRouletteForModify($arr_condition = [])
    {
        $column = '
                a.RouletteCode, a.Title, a.CountType, a.MemberLimitCount, a.MaxLimitCount, a.NewMemberJoinType, a.NewMemberJoinStartDate, a.NewMemberJoinEndDate, a.RouletteStartDatm, a.RouletteEndDatm, a.ProbabilityType, a.IsUse, a.IsStatus, a.Memo, a.RegDatm, a.RegAdminIdx, a.UpdDatm
                ,DATE_FORMAT(A.RouletteStartDatm, \'%Y-%m-%d\') AS RouletteStartDay, DATE_FORMAT(A.RouletteStartDatm, \'%H\') AS RouletteStartHour, DATE_FORMAT(A.RouletteStartDatm, \'%i\') AS RouletteStartMin
                ,DATE_FORMAT(A.RouletteEndDatm, \'%Y-%m-%d\') AS RouletteEndDay, DATE_FORMAT(A.RouletteEndDatm, \'%H\') AS RouletteEndHour, DATE_FORMAT(A.RouletteEndDatm, \'%i\') AS RouletteEndMin
                ,b.wAdminName AS RegAdminName, c.wAdminName AS UpdAdminName
            ';

        $from = "
            FROM {$this->_table['roulette']} AS a
            INNER JOIN {$this->_table['admin']} AS b ON a.RegAdminIdx = b.wAdminIdx AND b.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} AS c ON a.UpdAdminIdx = c.wAdminIdx AND c.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        return $this->_conn->query('select '.$column .$from .$where)->row_array();
    }

    /**
     * 룰렛 부가정보 데이터 [리스트]
     * @param $roulette_code
     * @return mixed
     */
    public function listRouletteOtherInfo($roulette_code)
    {
        $column = 'RroIdx, RouletteCode, ProdName, FileFullPath, FileRealName, FinishFileFullPath, FinishFileRealName, ProdQty, ProdWinTurns, ProdProbability, OrderNum, IsUse';
        $arr_condition = [
            'EQ' => [
                'RouletteCode' => $roulette_code
            ]
        ];

        $from = " FROM {$this->_table['roulette_otherinfo']} ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $order_by_offset_limit = ' order by OrderNum asc, RroIdx asc';
        return $this->_conn->query('select '.$column .$from .$where . $order_by_offset_limit)->result_array();
    }

    /**
     * 룰렛 등록
     * @param array $input
     * @return array|bool
     */
    public function addRoulette($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');

            $rouletteCode = $this->_setRouletteCode();

            if (empty(element('roulette_start_datm', $input)) === true) {
                $roulette_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $roulette_start_datm = element('roulette_start_datm', $input) . ' ' . element('roulette_start_hour', $input) . ':' . element('roulette_start_min', $input) . ':00';
            }
            if (empty(element('roulette_end_datm', $input)) === true) {
                $roulette_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $roulette_end_datm = element('roulette_end_datm', $input) . ' ' . element('roulette_end_hour', $input) . ':' . element('roulette_end_min', $input) . ':00';
            }

            $data = [
                'RouletteCode' => $rouletteCode,
                'Title' => element('roulette_title', $input),
                'CountType' => element('count_type', $input),
                'MemberLimitCount' => element('member_limit_count', $input),
                'MaxLimitCount' => element('max_limit_count', $input),
                'NewMemberJoinType' => element('new_member_join_type', $input),
                'NewMemberJoinStartDate' => element('new_member_join_start_date', $input),
                'NewMemberJoinEndDate' => element('new_member_join_end_date', $input),
                'RouletteStartDatm' => $roulette_start_datm,
                'RouletteEndDatm' => $roulette_end_datm,
                'ProbabilityType' => element('probability_type', $input),
                'IsUse' => element('is_use', $input),
                'Memo' => element('roulette_memo', $input),
                'RegAdminIdx' => $admin_idx,
                'RegIp' => $this->input->ip_address()
            ];

            //등록
            if ($this->_conn->set($data)->insert($this->_table['roulette']) === false) {
                throw new \Exception('룰렛 등록에 실패했습니다.');
            }

            //부가정보저장
            if ($this->_addRouletteOtherInfo($rouletteCode, $input) === false) {
                throw new \Exception('부가정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 룰렛 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyRoulette($input = [])
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $roulette_code = element('roulette_code', $input);

            //당첨자데이터 체크
            $arr_condition = ['EQ' => ['a.RouletteCode' => $roulette_code]];
            $win_member_cnt = $this->listWinMember(true, $arr_condition);

            //정보 조회
            $row = $this->findRoulette('RouletteCode', ['EQ' => ['RouletteCode' => $roulette_code]]);
            if (empty($row) === true) {
                throw new \Exception('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            if (empty(element('roulette_start_datm', $input)) === true) {
                $roulette_start_datm = date('Y-m-d') . ' ' . '00:00:00';
            } else {
                $roulette_start_datm = element('roulette_start_datm', $input) . ' ' . element('roulette_start_hour', $input) . ':' . element('roulette_start_min', $input) . ':00';
            }
            if (empty(element('roulette_end_datm', $input)) === true) {
                $roulette_end_datm = '2100-12-31' . ' ' . '23:59:59';
            } else {
                $roulette_end_datm = element('roulette_end_datm', $input) . ' ' . element('roulette_end_hour', $input) . ':' . element('roulette_end_min', $input) . ':00';
            }

            $data = [
                'Title' => element('roulette_title', $input),
                'NewMemberJoinType' => element('new_member_join_type', $input),
                'NewMemberJoinStartDate' => element('new_member_join_start_date', $input),
                'NewMemberJoinEndDate' => element('new_member_join_end_date', $input),
                'RouletteStartDatm' => $roulette_start_datm,
                'RouletteEndDatm' => $roulette_end_datm,
                'IsUse' => element('is_use', $input),
                'Memo' => element('roulette_memo', $input),
                'UpdAdminIdx' => $admin_idx
            ];

            if (empty($win_member_cnt) === true) {
                $data = array_merge($data, [
                    'CountType' => element('count_type', $input),
                    'MemberLimitCount' => element('member_limit_count', $input),
                    'MaxLimitCount' => element('max_limit_count', $input),
                    'ProbabilityType' => element('probability_type', $input)
                ]);
            }

            if ($this->_conn->set($data)->where('RouletteCode', $roulette_code)->update($this->_table['roulette']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            //부가정보수정
            if (empty($win_member_cnt) === true) {
                if ($this->_addRouletteOtherInfo($roulette_code, $input) === false) {
                    throw new \Exception('부가정보 수정에 실패했습니다.');
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
     * 단일검색
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findRoulette($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['roulette'], $column, $arr_condition);
    }

    /**
     * 룰렛 부가정보 여부사용값 수정
     * @param $rro_idx
     * @param $is_use
     * @return array|bool
     */
    public function updateOtherInfoIsUse($rro_idx, $is_use)
    {
        $this->_conn->trans_begin();
        try {
            $admin_idx = $this->session->userdata('admin_idx');
            $data = [
                'IsUse' => $is_use,
                'UpdAdminIdx' => $admin_idx
            ];
            if ($this->_conn->set($data)->where('RroIdx', $rro_idx)->update($this->_table['roulette_otherinfo']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * 당첨자 명단
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listWinMember($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            if ($is_count == 'excel') {
                $column = '
                    b.ProdName, a.RegDatm, m.MemName, m.MemId, fn_dec(m.PhoneEnc) AS Phone, fn_dec(m.MailEnc) AS Mail, m.JoinDate
                ';
            } else {
                $column = '
                    a.RmIdx, a.MemIdx, a.RegDatm, a.IsUse, a.UseDatm, b.ProdName, m.MemId, m.MemName, fn_dec(m.PhoneEnc) AS Phone
                ';
            }
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        $from = "
            FROM {$this->_table['roulette_member']} AS a
            INNER JOIN {$this->_table['roulette_otherinfo']} AS b ON a.RroIdx = b.RroIdx
            INNER JOIN {$this->_table['member']} AS m ON a.MemIdx = m.MemIdx
        ";

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * IsUse 업데이트
     * @param array $params
     * @return array|bool
     */
    public function storeIsUse($params = [])
    {
        $this->_conn->trans_begin();

        try {
            if (count($params) < 1) {
                throw new \Exception('필수 파라미터 오류입니다.');
            }

            foreach ($params as $rm_idx => $columns) {
                $this->_conn->set($columns)->set('UpdAdminIdx', $this->session->userdata('admin_idx'))->set('UseDatm', date('Y-m-d H:i:s'))->where('RmIdx', $rm_idx);

                if ($this->_conn->update($this->_table['roulette_member']) === false) {
                    throw new \Exception('지급 상태 수정에 실패했습니다.');
                }
                //echo $this->_conn->last_query();
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }

    /**
     * IsUse 업데이트
     * @param $roulette_code
     * @return array|bool
     */
    public function storeIsUseAll($roulette_code)
    {
        $this->_conn->trans_begin();

        try {
            $this->_conn->set('IsUse', 'Y')
                ->set('UpdAdminIdx', $this->session->userdata('admin_idx'))
                ->set('UseDatm', date('Y-m-d H:i:s'))
                ->where('IsUse', 'N')
                ->where('RouletteCode', $roulette_code);

            if ($this->_conn->update($this->_table['roulette_member']) === false) {
                throw new \Exception('지급 상태 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }
        return true;
    }


    /**
     * 부가정보 저장 / 수정
     * @param $rouletteCode
     * @param array $input
     * @return array|bool
     */
    private function _addRouletteOtherInfo($rouletteCode, $input = [])
    {
        try {
            //파일 저장
            $this->load->library('upload');
            $upload_dir = config_item('upload_prefix_dir') . '/roulette/' . date('Y') . '/' . date('md');
            $file_cnt = (empty($_FILES['roulette_attach_file']) === true) ? '0' : count($_FILES['roulette_attach_file']['name']);
            $uploaded = $this->upload->uploadFile('file', ['roulette_attach_file'], $this->_getAttachImgNames($file_cnt), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }
            $set_attach_data = [];
            foreach ($uploaded as $idx => $attach_files) {
                if (empty($attach_files) === false) {
                    $set_attach_data['FileFullPath'][$idx] = $this->upload->_upload_url . $upload_dir . '/' . $attach_files['orig_name'];
                    $set_attach_data['FileRealName'][$idx] = $attach_files['client_name'];
                }
            }

            $file_cnt = (empty($_FILES['roulette_attach_finish_file']) === true) ? '0' : count($_FILES['roulette_attach_finish_file']['name']);
            $uploaded = $this->upload->uploadFile('file', ['roulette_attach_finish_file'], $this->_getAttachImgNames($file_cnt,'_finish'), $upload_dir);
            if (is_array($uploaded) === false) {
                throw new \Exception($uploaded);
            }
            $set_attach_finish_data = [];
            foreach ($uploaded as $idx => $attach_files) {
                if (empty($attach_files) === false) {
                    $set_attach_finish_data['FinishFileFullPath'][$idx] = $this->upload->_upload_url . $upload_dir . '/' . $attach_files['orig_name'];
                    $set_attach_finish_data['FinishFileRealName'][$idx] = $attach_files['client_name'];
                }
            }

            /**
             * 부가정보 저장
             * rro_idx 값으로 insert, update 구분
             */
            foreach ($input['rro_idx'] as $key => $val) {
                if (empty($input['roulette_prod_win_turns'][$key]) === true) {
                    $win_turns = 0;
                } else {
                    $win_turns = json_encode(explode(',', $input['roulette_prod_win_turns'][$key]));
                }

                $inputData['RouletteCode'] = $rouletteCode;
                $inputData['ProdName'] = (empty($input['roulette_prod_name'][$key]) === false) ? $input['roulette_prod_name'][$key] : null;
                $inputData['ProdQty'] = (empty($input['roulette_prod_qty'][$key]) === false) ? $input['roulette_prod_qty'][$key] : null;
                $inputData['ProdProbability'] = (empty($input['roulette_prod_probability'][$key]) === false) ? $input['roulette_prod_probability'][$key] : null;
                $inputData['OrderNum'] = (empty($input['roulette_order_num'][$key]) === false) ? $input['roulette_order_num'][$key] : null;
                $inputData['RegIp'] = $this->input->ip_address();
                $inputData['ProdWinTurns'] = $win_turns;

                if(empty($set_attach_data['FileFullPath'][$key]) === false) {
                    $inputData['FileFullPath'] = $set_attach_data['FileFullPath'][$key];
                    $inputData['FileRealName'] = $set_attach_data['FileRealName'][$key];
                } else {
                    unset($inputData['FileFullPath']);
                    unset($inputData['FileRealName']);
                }

                if(empty($set_attach_finish_data['FinishFileFullPath'][$key]) === false) {
                    $inputData['FinishFileFullPath'] = $set_attach_finish_data['FinishFileFullPath'][$key];
                    $inputData['FinishFileRealName'] = $set_attach_finish_data['FinishFileRealName'][$key];
                } else {
                    unset($inputData['FinishFileFullPath']);
                    unset($inputData['FinishFileRealName']);
                }

                if (empty($val) === true) {
                    $inputData['RegAdminIdx'] = $this->session->userdata('admin_idx');
                    if ($this->_conn->set($inputData)->insert($this->_table['roulette_otherinfo']) === false) {
                        throw new \Exception('부가정보 등록에 실패했습니다.');
                    }
                } else {
                    //기존파일삭제
                    if(empty($input['roulette_file_full_path'][$key]) === false && empty($inputData['FileFullPath']) === false) {
                        $this->load->helper('file');
                        $file_path = public_to_upload_path(urldecode($input['roulette_file_full_path'][$key]));
                        if (@unlink($file_path) === false) {
                            /*throw new \Exception('이미지 삭제에 실패했습니다.');*/
                        }
                    }

                    $inputData['UpdAdminIdx'] = $this->session->userdata('admin_idx');
                    if ($this->_conn->set($inputData)->where('RroIdx', $val)->update($this->_table['roulette_otherinfo']) === false) {
                        throw new \Exception('부가정보 수정에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            return error_result($e);
        }
        return true;
    }

    /**
     * 룰렛 코드 생성
     * @return mixed
     */
    private function _setRouletteCode()
    {
        $row = $this->_conn->getFindResult($this->_table['roulette'], 'ifnull(max(RouletteCode) + 1, 1001) as RouletteCode');
        return $row['RouletteCode'];
    }

    /**
     * 파일명 배열 생성
     * @param $cnt
     * @param string $add_name
     * @return array
     */
    private function _getAttachImgNames($cnt, $add_name = '')
    {
        $attach_file_names = [];
        $temp_time = date('YmdHis');
        for ($i = 0; $i < $cnt; $i++) {
            $attach_file_names[] = 'roulette_' . $add_name . $i . '_' . $temp_time;
        }
        return $attach_file_names;
    }
}