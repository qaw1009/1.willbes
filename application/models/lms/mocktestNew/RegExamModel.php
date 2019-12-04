<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegExamModel extends WB_Model
{
    private $_table = [
        'mock_base' => 'lms_mock',
        'mockExamBase' => 'lms_mock_paper_new',
        'mock_paper_r_category' => 'lms_mock_paper_r_category',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'mock_r_category' => 'lms_mock_r_category',
        'mock_r_subject' => 'lms_mock_r_subject',
        'product_subject' => 'lms_product_subject',
        'mock_register' => 'lms_mock_register',
        'mock_register_r_paper' => 'lms_mock_register_r_paper',
        'mock_questions' => 'lms_mock_questions',
        'mock_area' => 'lms_mock_area',
        'mock_area_list' => 'lms_mock_area_list',
        'admin' => 'wbs_sys_admin',
        'lms_site' => 'lms_site',
        'lms_sys_category' => 'lms_sys_category',
        'lms_sys_code' => 'lms_sys_code'
    ];

    private $upload_path;            // 업로드 기본경로
    private $upload_path_mock;       // 통파일 저장경로: ~/mocktest/{idx}/
    private $upload_path_mockQ;      // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    private $upload_path_mockBackup; // 백업파일 저장경로 {$uploadPath_mock}/bak_{date}/

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->config('upload');
        $this->upload_path = $this->config->item('upload_path');
        $this->upload_path_mock = $this->config->item('upload_path_mock', 'mock');
        $this->upload_path_mockQ = $this->config->item('upload_path_mockQ', 'mock');
        $this->upload_path_mockBackup = $this->config->item('upload_path_mockBackup', 'mock');
    }

    /**
     * 과목별문제 데이터 리스트
     * @param bool $is_count
     * @param array $add_condition
     * @param string $limit
     * @param string $offset
     * @return mixed
     */
    public function mainList($is_count = false, $add_condition = [], $limit = null, $offset = null)
    {
        if ($is_count === true) {
            $column = 'count(*) AS cnt';
            $order_by_offset_limit = '';
        } else {
            $column = "
                MP.*, A.wAdminName, PMS.wProfName, IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor,
                (SELECT COUNT(MemIdx) 
                    FROM {$this->_table['mock_register']} AS MR
                    JOIN {$this->_table['mock_register_r_paper']} AS RR ON MR.MrIdx = RR.MrIdx
                WHERE IsStatus = 'Y' AND IsTake = 'Y' AND MpIdx = MP.MpIdx AND TakeForm = (SELECT Ccd FROM {$this->_table['lms_sys_code']} WHERE CcdName = 'online')) AS OnlineCnt,
                (SELECT COUNT(MemIdx) 
                    FROM {$this->_table['mock_register']} AS MR
                    JOIN {$this->_table['mock_register_r_paper']} AS RR ON MR.MrIdx = RR.MrIdx 
                WHERE IsStatus = 'Y' AND IsTake = 'Y' AND MpIdx = MP.MpIdx AND TakeForm = (SELECT Ccd FROM {$this->_table['lms_sys_code']} WHERE CcdName = 'off(학원)')) AS OfflineCnt,
                (SELECT COUNT(*) FROM {$this->_table['mock_questions']} AS EQ WHERE MP.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
                (
                    SELECT GROUP_CONCAT(CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), ']')) AS CateRouteName
                    FROM {$this->_table['mock_paper_r_category']} AS MPRC
                    INNER JOIN {$this->_table['mock_r_category']} AS MC ON MPRC.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_r_subject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
                    INNER JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                    INNER JOIN {$this->_table['mock_base']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_site']} AS S ON MB.SiteCode = S.SiteCode AND S.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_sys_category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                    INNER JOIN {$this->_table['lms_sys_code']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                    WHERE MP.MpIdx = MPRC.MpIdx AND MPRC.IsStatus = 'Y'
                    GROUP BY MPRC.MpIdx
                ) AS CateRouteName
            ";
            $arr_order_by = ['MP.MpIdx' => 'DESC'];
            $order_by_offset_limit = $this->_conn->makeOrderBy($arr_order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $condition = [ 'IN' => ['MP.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        $condition = array_merge_recursive($condition, $add_condition);
        $where = $this->_conn->makeWhere($condition)->getMakeWhere(false);

        $from = "
            FROM {$this->_table['mockExamBase']} AS MP
            INNER JOIN {$this->_table['mock_paper_r_category']} AS MPC ON MP.MpIdx = MPC.MpIdx AND MPC.IsStatus = 'Y'
            INNER JOIN {$this->_table['mock_r_category']} AS MC ON MC.MrcIdx = MPC.MrcIdx AND MC.IsStatus = 'Y'
            INNER JOIN {$this->_table['mock_r_subject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            INNER JOIN {$this->_table['product_subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
            INNER JOIN {$this->_table['mock_base']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON MP.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MP.RegAdminIdx = A.wAdminIdx
        ";
        $group_by = ' GROUP BY MP.MpIdx';
        $query_string = 'SELECT '. (($is_count === true) ? 'COUNT(M.cnt) AS numrows ' : 'M.* ') . 'FROM (SELECT ' . $column . $from . $where . $group_by . $order_by_offset_limit . ') AS M';
        $query = $this->_conn->query($query_string);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 문제지 데이터 조회
     * @param array $arr_condition
     * @return mixed
     */
    public function findExamData($arr_condition = [])
    {
        $column = "
            MP.*
            , MA.QuestionArea, MA.IsUse AS AreaIsUse
            ,(SELECT GROUP_CONCAT(MPRC.MrcIdx) FROM {$this->_table['mock_paper_r_category']} AS MPRC WHERE MPRC.MpIdx = MP.MpIdx) AS MrcIdxs
            , ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS MP
            INNER JOIN {$this->_table['mock_area']} AS MA ON MP.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MP.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MP.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->row_array();
    }

    /**
     * 문항리스트
     * @param array $arr_condition
     * @return mixed
     */
    public function listExamQuestions($arr_condition = [])
    {
        $column = '*, ADMIN.wAdminName AS RegAdminName, ADMIN2.wAdminName AS UpdAdminName';
        $from = "
            FROM {$this->_table['mock_questions']} AS MQ
            INNER JOIN {$this->_table['mock_area_list']} AS MAL ON MQ.MalIdx = MAL.MalIdx
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN ON MQ.RegAdminIdx = ADMIN.wAdminIdx and ADMIN.wIsStatus='Y'
            LEFT OUTER JOIN {$this->_table['admin']} as ADMIN2 ON MQ.UpdAdminIdx = ADMIN2.wAdminIdx and ADMIN2.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 문제영역 조회
     * @param $arr_condition
     * @return mixed
     */
    public function getAreaList($arr_condition)
    {
        $column = 'ML.*';
        $from = "
            FROM {$this->_table['mock_area']} AS MA
            JOIN {$this->_table['mock_area_list']} AS ML ON MA.MaIdx = ML.MaIdx AND ML.IsStatus = 'Y' AND ML.IsUse = 'Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        return $this->_conn->query('select ' . $column . $from . $where)->result_array();
    }

    /**
     * 문제지 등록
     * @param $form_data
     * @return array|bool
     */
    public function addExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);

            // 데이터 저장
            $input_data = [
                'SiteCode' => element('siteCode', $form_data),
                'MaIdx' => element('area_code', $form_data),
                'ProfIdx' => element('ProfIdx', $form_data),
                'PapaerName' => element('PapaerName', $form_data),
                'Year' => element('Year', $form_data),
                'RotationNo' => element('RotationNo', $form_data),
                'QuestionOption' => element('QuestionOption', $form_data),
                'AnswerNum' => element('AnswerNum', $form_data),
                'TotalScore' => element('TotalScore', $form_data),
                'QuestionFile' => $names['QuestionFile']['name'],
                'RealQuestionFile' => $names['QuestionFile']['real'],
                'ExplanFile' => $names['ExplanFile']['name'],
                'RealExplanFile' => $names['ExplanFile']['real'],
                'IsUse' => element('IsUse', $form_data),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx')
            ];

            if ($this->_conn->set($input_data)->insert($this->_table['mockExamBase']) === false) {
                throw new Exception('기본정보 저장에 실패했습니다.');
            }
            $nowIdx = $this->_conn->insert_id();

            // 관련 카테고리 저장 (lms_mock_paper_r_category)
            $moLink = array_filter(element('moLink', $form_data));
            foreach ($moLink as $it) {
                $input_data = [
                    'MpIdx' => $nowIdx,
                    'MrcIdx' => $it,
                    'RegIp' => $this->input->ip_address(),
                    'RegDatm' => date("Y-m-d H:i:s"),
                    'RegAdminIdx' => $this->session->userdata('admin_idx'),
                ];
                if ($this->_conn->set($input_data)->insert($this->_table['mock_paper_r_category']) === false) {
                    throw new Exception('카테고리 저장에 실패했습니다.');
                }
            }

            // 파일 업로드
            $uploadSubPath = $this->upload_path_mock . $nowIdx;
            $isSave = $this->_uploadFileSave($uploadSubPath, $names);
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            // 데이터 수정
            $input_data = [
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/"
            ];
            $this->_conn->set($input_data)->where(['MpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['mockExamBase']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowIdx]];
    }

    /**
     * 문제지 수정
     * @param $form_data
     * @return array|bool
     */
    public function modifyExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $filePath = $this->upload_path . $this->upload_path_mock . element('idx', $form_data) . '/';
            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);
            $uploadSubPath = $this->upload_path_mock . $this->input->post('idx', $form_data);

            // 기존데이터 첨부파일 이름 추출
            $fileBackup = [];
            $beforeDB = $this->_conn->select('RealQuestionFile, RealExplanFile')
                ->where(['MpIdx' => element('idx', $form_data), 'IsStatus' => 'Y'])
                ->get($this->_table['mockExamBase'])->row_array();

            // 데이터 수정
            $input_data = [
                'MaIdx' => element('area_code', $form_data),
                'ProfIdx' => element('ProfIdx', $form_data),
                'PapaerName' => element('PapaerName', $form_data),
                'Year' => element('Year', $form_data),
                'RotationNo' => element('RotationNo', $form_data),
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/",
                'IsUse' => element('IsUse', $form_data),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            ];

            if(element('QuestionOption', $form_data)) $input_data['QuestionOption'] = element('QuestionOption', $form_data);
            if(element('AnswerNum', $form_data))      $input_data['AnswerNum'] = element('AnswerNum', $form_data);
            if(element('TotalScore', $form_data))     $input_data['TotalScore'] = element('TotalScore', $form_data);
            if( isset($names['QuestionFile']['error']) && $names['QuestionFile']['error'] === UPLOAD_ERR_OK && $names['QuestionFile']['size'] > 0 ) {
                $input_data['QuestionFile'] = $names['QuestionFile']['name'];
                $input_data['RealQuestionFile'] = $names['QuestionFile']['real'];
                if( !empty($beforeDB['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB['RealQuestionFile'];
            }

            if( isset($names['ExplanFile']['error']) && $names['ExplanFile']['error'] === UPLOAD_ERR_OK && $names['ExplanFile']['size'] > 0 ) {
                $input_data['ExplanFile'] = $names['ExplanFile']['name'];
                $input_data['RealExplanFile'] = $names['ExplanFile']['real'];
                if( !empty($beforeDB['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB['RealExplanFile'];
            }

            $this->_conn->set($input_data)->where(['MpIdx' => element('idx', $form_data)]);
            if ($this->_conn->update($this->_table['mockExamBase']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

           // 파일 업로드 (업로드파일이 있으면)
            if($fileBackup) {
                $isSave = $this->_uploadFileSave($uploadSubPath, $names, $fileBackup);
                if ($isSave !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => element('idx', $form_data)]];
    }

    /**
     * 데이터 복사
     * @param $idx
     * @return array|bool
     */
    public function copyData($idx)
    {
        $this->_conn->trans_begin();
        try {
            if (!preg_match('/^[0-9]+$/', $idx)) {
                throw new Exception('잘못된 식별자 입니다.');
            }

            $result = $this->_copyDataStep1($idx);
            if ($result['ret_cd'] === false || empty($result['nowIdx']) === true) {
                throw new \Exception('데이터 복사에 실패했습니다.(1)');
            }

            if ($this->_copyDataStep2($result['nowIdx'], $idx) === false) {
                throw new Exception('데이터 복사에 실패했습니다.(2)');
            }

            if ($this->_copyDataStep3($result['nowIdx'], $idx) === false) {
                throw new Exception('데이터 복사에 실패했습니다.(3)');
            }

            if ($this->_copyDataStep4($result['nowIdx'], $idx) === false) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 문항정보 등록,수정
     * (주의) 저장파일에 Q1_~ 로 번호 붙으나 삭제를 하게 되면 index가 변경됨으로 번호가 안 맞을 수도 있음 (중복은 안됨)
     * @param $form_data
     * @return array|bool
     */
    public function storeQuestion($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $this->load->library('upload');
            $filePath = $this->upload_path . $this->upload_path_mock . element('idx', $form_data) . $this->upload_path_mockQ;
            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);

            // 기존데이터 첨부파일 이름 추출
            $beforeDB = $fileBackup = $fileCopy = [];
            if( element('chapterExist', $form_data) || element('chapterDel', $form_data) ) {
                $beforeIn = array_unique(array_merge(element('chapterExist', $form_data), element('chapterDel', $form_data)));
                $bDB = $this->_conn->select('MqIdx,RealQuestionFile,RealExplanFile')
                    ->where_in($beforeIn)
                    ->get($this->_table['mock_questions'])->result_array();

                foreach ($bDB as $it) {
                    $beforeDB[$it['MqIdx']] = $it;
                }
                unset($bDB);
            }

            $dataReg = $dataMod = $dataDel = [];
            if(empty(element('chapterTotal', $form_data)) === false) {
                foreach (element('chapterTotal', $form_data) as $k => $v) {
                    if (empty(element('chapterExist', $form_data)) || !in_array($v, element('chapterExist', $form_data))) { // 신규등록
                        $dataReg[$k] = [
                            'MpIdx' => element('idx', $form_data),
                            'MalIdx' => element('MalIdx', $form_data)[$k],
                            'QuestionNO' => element('QuestionNO', $form_data)[$k],
                            'QuestionOption' => element('QuestionOption', $form_data)[$k],
                            'FilePath' => $this->upload->_upload_url . $this->upload_path_mock . element('idx', $form_data) . $this->upload_path_mockQ,
                            'RightAnswer' => element('RightAnswer', $form_data)[$k],
                            'RightAnswerRate' => 0,
                            'Scoring' => element('Scoring', $form_data)[$k],
                            'Difficulty' => element('Difficulty', $form_data)[$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                        if(element('regKind', $form_data)[$k] == 'call') { // 호출한 경우
                            $index = $k + 1;
                            $callRealQuestionFile = 'Q'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', element('callRealQuestionFile', $form_data)[$k]);
                            $callRealExplanFile = 'E'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', element('callRealExplanFile', $form_data)[$k]);

                            $dataReg[$k]['QuestionFile'] = element('callQuestionFile', $form_data)[$k];
                            $dataReg[$k]['RealQuestionFile'] = $callRealQuestionFile;
                            $dataReg[$k]['ExplanFile'] = element('callExplanFile', $form_data)[$k];
                            $dataReg[$k]['RealExplanFile'] = $callRealExplanFile;

                            // 복사할 파일
                            $src = element('callIdx', $form_data)[$k] . $this->upload_path_mockQ;
                            $dest = element('idx', $form_data) . $this->upload_path_mockQ;

                            $fileCopy[] = ['src' => $src . element('callRealQuestionFile', $form_data)[$k], 'dest' => $dest . $callRealQuestionFile];
                            $fileCopy[] = ['src' => $src . element('callRealExplanFile', $form_data)[$k], 'dest' => $dest . $callRealExplanFile];
                        } else {
                            if ( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                                $dataReg[$k]['QuestionFile'] = $names['QuestionFile']['name'][$k];
                                $dataReg[$k]['RealQuestionFile'] = $names['QuestionFile']['real'][$k];
                            }
                            if ( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                                $dataReg[$k]['ExplanFile'] = $names['ExplanFile']['name'][$k];
                                $dataReg[$k]['RealExplanFile'] = $names['ExplanFile']['real'][$k];
                            }
                        }
                    } else { // 수정
                        $dataMod[$k] = [
                            'MqIdx' => $v,
                            'MalIdx' => element('MalIdx', $form_data)[$k],
                            'QuestionNO' => element('QuestionNO', $form_data)[$k],
                            'QuestionOption' => element('QuestionOption', $form_data)[$k],
                            'FilePath' => $this->upload->_upload_url . $this->upload_path_mock . element('idx', $form_data) . $this->upload_path_mockQ,
                            'RightAnswer' => element('RightAnswer', $form_data)[$k],
                            'Scoring' => element('Scoring', $form_data)[$k],
                            'Difficulty' => element('Difficulty', $form_data)[$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        ];
                        if( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                            $dataMod[$k]['QuestionFile'] = $names['QuestionFile']['name'][$k];
                            $dataMod[$k]['RealQuestionFile'] = $names['QuestionFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                        }
                        if( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                            $dataMod[$k]['ExplanFile'] = $names['ExplanFile']['name'][$k];
                            $dataMod[$k]['RealExplanFile'] = $names['ExplanFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                        }
                    }
                }
            }

            // 삭제 (IsStatus Update)
            if(empty(element('chapterDel', $form_data)) === false) {
                foreach (element('chapterDel', $form_data) as $k => $v) {
                    $dataDel[] = [
                        'MqIdx' => $v,
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    ];

                    if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                    if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                }
            }

            if($dataReg) $this->_conn->insert_batch($this->_table['mock_questions'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mock_questions'], $dataMod, 'MqIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['mock_questions'], $dataDel, 'MqIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }

            // 파일 복사 (호출한 경우)
            if($fileCopy) {
                if ($this->_uploadFileCopy($fileCopy) !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            // 파일 업로드 & 백업이동
            $uploadSubPath = $this->upload_path_mock . element('idx', $form_data) . $this->upload_path_mockQ;
            $isSave = $this->_uploadFileSave($uploadSubPath, $names, $fileBackup, 'img');
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => element('idx', $form_data)]];
    }

    public function sort($sort_data)
    {
        $this->_conn->trans_begin();
        try {
            $sorting = @json_decode($sort_data, true);
            if(!is_array($sorting)) {
                throw new Exception('입력오류');
            }

            if( count($sorting) != count(array_unique(array_values($sorting))) ) {
                throw new Exception('문항번호가 중복되어 있습니다.');
            }

            $data = [];
            foreach ($sorting as $k => $v) {
                $data[] = [
                    'MqIdx' => $k,
                    'QuestionNO' => $v,
                    'UpdDatm' => date("Y-m-d H:i:s"),
                    'UpdAdminIdx' => $this->session->userdata('admin_idx')
                ];
            }

            if($data) $this->_conn->update_batch($this->_table['mock_questions'], $data, 'MqIdx');
            if ($this->_conn->trans_status() === false) {
                throw new Exception('정렬변경에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    public function callData($form_data)
    {
        /*$condition = [
            'EQ' => [
                'EB.siteCode' => $this->input->post('siteCode'),
                'EB.MaIdx' => $this->input->post('area_code'),
                'EB.ProfIdx' => $this->input->post('ProfIdx'),
                'EB.Year' => $this->input->post('qu_year'),
                'EB.RotationNo' => $this->input->post('qu_round'),
                'EQ.QuestionNO' => $this->input->post('qu_no'),
            ],
            'NOT' => [
                'EB.MpIdx' => $this->input->post('nowIdx')
            ],
        ];

        $sql = "
            SELECT EQ.*, MA.AreaName, EB.QuestionOption AS EB_QuestionOption, EB.AnswerNum AS EB_AnswerNum, A.wAdminName
            FROM {$this->_table['mockExamBase']} AS EB
            JOIN {$this->_table['mock_questions']} AS EQ ON EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y'
            JOIN {$this->_table['mock_area_list']} AS MA ON EQ.MalIdx = MA.MalIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON EQ.RegAdminIdx = A.wAdminIdx
            WHERE EB.IsStatus = 'Y'
        ";
        $sql .= $this->_conn->makeWhere($condition)->getMakeWhere(true);

        $data = $this->_conn->query($sql)->row();
        if($data) {
            $data->upImgUrlQ = $this->config->item('upload_url_mock', 'mock') . $data->MpIdx . $this->config->item('upload_path_mockQ', 'mock');
            $data->optSame = ($data->EB_AnswerNum == $this->input->post('AnswerNum')) ? 1 : 0;
        }*/

        $arr_condition = [
            'EQ' => [
                'EB.siteCode' => element('siteCode', $form_data),
                'EB.MaIdx' => element('area_code', $form_data),
                'EB.ProfIdx' => element('ProfIdx', $form_data),
                'EB.Year' => element('qu_year', $form_data),
                'EB.RotationNo' => element('qu_round', $form_data),
                'EQ.QuestionNO' => element('qu_no', $form_data),
            ],
            'NOT' => [
                'EB.MpIdx' => element('nowIdx', $form_data)
            ],
        ];
        $column = "
            EQ.*, MA.AreaName, EB.QuestionOption AS EB_QuestionOption, EB.AnswerNum AS EB_AnswerNum, A.wAdminName
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS EB
            JOIN {$this->_table['mock_questions']} AS EQ ON EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y'
            JOIN {$this->_table['mock_area_list']} AS MA ON EQ.MalIdx = MA.MalIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON EQ.RegAdminIdx = A.wAdminIdx
        ";
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);
        $data = $this->_conn->query('select ' . $column . $from . $where)->row_array();

        /*if($data) {
            $data->upImgUrlQ = $this->config->item('upload_url_mock', 'mock') . $data->MpIdx . $this->config->item('upload_path_mockQ', 'mock');
            $data->optSame = ($data->EB_AnswerNum == $this->input->post('AnswerNum')) ? 1 : 0;
        }*/

        if($data) {
            $data['upImgUrlQ'] = $this->config->item('upload_url_mock', 'mock') . $data['MpIdx'] . $this->config->item('upload_path_mockQ', 'mock');
            $data['optSame'] = ($data['EB_AnswerNum'] == element('AnswerNum', $form_data)) ? 1 : 0;
        }
        return ['ret_cd' => true, 'dt' => $data];
    }


    /**
     * 문제지 복사
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep1($idx)
    {
        try {
            $this->load->library('upload');
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['mockExamBase']}
                    (SiteCode, MaIdx, ProfIdx, PapaerName, Year, RotationNo, QuestionOption, AnswerNum, TotalScore, 
                     QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT SiteCode, MaIdx, ProfIdx, CONCAT('복사-', PapaerName), Year, RotationNo, QuestionOption, AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile, 'N', ?, ?, ?
                FROM {$this->_table['mockExamBase']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, [$RegIp, $RegAdminIdx, $RegDatm, $idx]);
            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(1)');
            }
            $nowIdx = $this->_conn->insert_id();
            $uploadSubPath = $this->upload_path_mock . $nowIdx;

            //복사 데이터 수정
            $addData = [
                'FilePath' => $this->upload->_upload_url . $uploadSubPath . "/"
            ];
            $this->_conn->set($addData)->where(['MpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['mockExamBase']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
        } catch (Exception $e) {
            return error_result($e);
        }
        return ['ret_cd' => true, 'nowIdx' => $nowIdx];
    }

    /**
     * 문제지 매핑 카테고리 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep2($nowIdx, $idx)
    {
        try {
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['mock_paper_r_category']}
                    (MpIdx, MrcIdx, IsStatus, RegIp, RegDatm, RegAdminIdx)
                SELECT ?, MrcIdx, IsStatus, ?, ?, ?
                FROM {$this->_table['mock_paper_r_category']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(2)');
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 문제항목 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep3($nowIdx, $idx)
    {
        try {
            $this->load->library('upload');
            $RegIp = $this->input->ip_address();
            $RegAdminIdx = $this->session->userdata('admin_idx');
            $RegDatm = date("Y-m-d H:i:s");

            $query = "
                {$this->_table['mock_questions']}
                    (MpIdx, MalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                     RightAnswer, Scoring, Difficulty, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                       RightAnswer, Scoring, Difficulty, ?, ?, ?
                FROM {$this->_table['mock_questions']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $result = $this->_conn->query('insert into' . $query, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));
            if ($result === false) {
                throw new Exception('데이터 복사에 실패했습니다.(3)');
            }

            // 데이터 수정
            $addData = ['FilePath' => $this->upload->_upload_url . $this->upload_path_mock . $nowIdx . $this->upload_path_mockQ];
            $this->_conn->set($addData)->where(['MpIdx' => $nowIdx]);
            if ($this->_conn->update($this->_table['mock_questions']) === false) {
                throw new \Exception('수정에 실패했습니다.');
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 파일 복사
     * @param $nowIdx
     * @param $idx
     * @return array|bool
     */
    private function _copyDataStep4($nowIdx, $idx)
    {
        try {
            $src = $this->upload_path . $this->upload_path_mock . $idx . "/";
            $dest = $this->upload_path . $this->upload_path_mock . $nowIdx . "/";

            if(is_dir($src) === true) {
                exec("cp -rf $src $dest");
                if(is_dir($dest) === false) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }
        } catch (Exception $e) {
            return error_result($e);
        }

        return true;
    }

    /**
     * 파일저장 및 수정
     * @param $uploadSubPath
     * @param $names
     * @param array $fileBackup
     * @param string $type
     * @return bool|string
     */
    private function _uploadFileSave($uploadSubPath, $names, $fileBackup = [], $type = 'file')
    {
        try {
            /*$this->load->library('upload');*/
            if (empty($uploadSubPath) === true) {
                throw new Exception('파라메타 오류');
            }

            $realFileNames = [];
            foreach ($names as $name) {
                if( is_array($name['real']) )
                    $realFileNames = array_merge($realFileNames, $name['real']);
                else
                    $realFileNames[] = $name['real'];
            }

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile($type, array_keys($names), $realFileNames, $uploadSubPath);
            if (is_array($uploaded) === false) {
                throw new Exception($uploaded);
            }

            // 수정, 삭제시 이미지 백업
            if(empty($fileBackup) === false) {
                $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($fileBackup), false, $this->upload_path_mockBackup);
                if ($is_bak_uploaded_file !== true) {
                    throw new Exception($is_bak_uploaded_file);
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 파일복사
     * @param $fileCopy
     * @return bool|string
     */
    private function _uploadFileCopy($fileCopy) {
        $mainPath = $this->upload_path . $this->upload_path_mock;
        $destPath = $mainPath . dirname($fileCopy[0]['dest']) . '/';

        try {
            if ( !is_dir($destPath) ) {
                if ( !mkdir($destPath, 0707, true) ) {
                    throw new Exception('디렉토리 생성에 실패했습니다.');
                }
            }

            foreach ($fileCopy as $it) {
                if ( !file_exists($mainPath . $it['src']) || !copy($mainPath . $it['src'], $mainPath . $it['dest']) ) {
                    throw new Exception('파일 복사에 실패했습니다.');
                }
            }
        }
        catch (Exception $e) {
            foreach ($fileCopy as $it) { // 롤백
                if ( file_exists($mainPath . $it['dest']) ) {
                    unlink($mainPath . $it['dest']);
                }
            }
            return $e->getMessage();
        }
        return true;
    }
}