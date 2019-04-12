<?php
/**
 * ======================================================================
 * 모의고사등록 > 과목별 문제등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegExamModel extends WB_Model
{
    private $_table = [
        'admin' => 'wbs_sys_admin',
        'mockExamBase' => 'lms_mock_paper',
        'mockExamQuestion' => 'lms_mock_questions',
        'mockSubject' => 'lms_mock_r_subject',
        'mockAreaCate' => 'lms_Mock_R_Category',
        'mockArea' => 'lms_mock_area',
        'mockAreaList' => 'lms_mock_area_list',
        'mockBase' => 'lms_mock',
        'category' => 'lms_sys_category',
        'sysCode' => 'lms_sys_code',
        'subject' => 'lms_product_subject',
        'professor' => 'lms_professor',
        'pms_professor' => 'wbs_pms_professor',
        'mockRegisterR' => 'lms_mock_register_r_paper',
        'mockRegister' => 'lms_mock_register',
    ];

    public $upload_path;            // 업로드 기본경로
    public $upload_path_mock;       // 통파일 저장경로: ~/mocktest/{idx}/
    public $upload_path_mockQ;      // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    public $upload_path_mockBackup; // 백업파일 저장경로 {$uploadPath_mock}/bak_{date}/


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
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['MB.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $column = "
            EB.*, A.wAdminName, MB.CateCode, MB.Ccd, MS.SubjectType, EB.FilePath,
            CONCAT(C1.CateName, ' > ', SC.CcdName) AS CateRouteName, SJ.SubjectName, PMS.wProfName,
            (SELECT COUNT(MemIdx) 
              FROM lms_mock_register AS MR
                   JOIN lms_mock_register_r_paper AS RR ON MR.MrIdx = RR.MrIdx
              WHERE IsStatus = 'Y' AND IsTake = 'Y' AND MpIdx = EB.MpIdx AND TakeForm = (SELECT Ccd FROM lms_sys_code Where CcdName = 'online')) AS OnlineCnt,
            (SELECT COUNT(MemIdx) 
              FROM lms_mock_register AS MR
                   JOIN lms_mock_register_r_paper AS RR ON MR.MrIdx = RR.MrIdx 
              WHERE IsStatus = 'Y' AND IsTake = 'Y' AND MpIdx = EB.MpIdx AND TakeForm = (SELECT Ccd FROM lms_sys_code Where CcdName = 'off(학원)')) AS OfflineCnt,
            (SELECT COUNT(*) FROM {$this->_table['mockExamQuestion']} AS EQ WHERE EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
            IF(MB.Isuse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS IsUseCate,
            IF(MS.Isuse = 'N' OR SJ.IsUse = 'N', 'N', 'Y') AS IsUseSubject,
            IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor
        ";
        $from = "
            FROM 
                {$this->_table['mockExamBase']} AS EB
                JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
                JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
                JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND SJ.IsStatus = 'Y'
                JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
                JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
                JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
                JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
                JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
                LEFT JOIN {$this->_table['admin']} AS A ON EB.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE EB.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY EB.MpIdx DESC\n";
        //echo "<pre>". 'select' . $column . $from . $where . $order . "</pre>";
        $data = $this->_conn->query('SELECT '.$column . $from . $where . $order . $offset_limit)->result_array();
        $count = $this->_conn->query($selectCount . $from . $where)->row()->cnt;

        // TODO 응시현황 추가

        return array($data, $count);
    }

    /**
     * 데이터 복사
     */
    public function copyData($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $RegIp = $this->input->ip_address();
        $RegAdminIdx = $this->session->userdata('admin_idx');
        $RegDatm = date("Y-m-d H:i:s");

        try {
            $this->_conn->trans_begin();

            // lms_mock_paper 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamBase']}
                    (SiteCode, MrcIdx, ProfIdx, PapaerName, Year, RotationNo, QuestionOption, AnswerNum, TotalScore, 
                     QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile, IsUse, RegIp, RegAdminIdx, RegDate)
                SELECT SiteCode, MrcIdx, ProfIdx, CONCAT('복사-', PapaerName), Year, RotationNo, QuestionOption, AnswerNum, TotalScore,
                       QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile, 'N', ?, ?, ?
                FROM {$this->_table['mockExamBase']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowIdx = $this->_conn->insert_id();

            $uploadSubPath = $this->upload_path_mock . $nowIdx;

            // 데이터 수정
            $addData = [
                'FilePath' => PUBLICURL . 'uploads/' . $uploadSubPath . "/"
            ];

            $this->_conn->set($addData)->where(['MpIdx' => $nowIdx])->update($this->_table['mockExamBase']);

            if (!$this->_conn->affected_rows()) {
                throw new Exception('수정에 실패했습니다.');
            }

            // lms_mock_questions 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamQuestion']}
                    (MpIdx, MalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                     RightAnswer, Scoring, Difficulty, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MalIdx, QuestionNO, QuestionOption, QuestionFile, RealQuestionFile, ExplanFile, RealExplanFile,
                       RightAnswer, Scoring, Difficulty, ?, ?, ?
                FROM {$this->_table['mockExamQuestion']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));


            // 데이터 수정
            $addData = [
                'FilePath' => PUBLICURL . 'uploads/' . $this->upload_path_mock . $nowIdx . $this->upload_path_mockQ,
            ];

            $this->_conn->set($addData)->where(['MpIdx' => $nowIdx])->update($this->_table['mockExamQuestion']);

            if (!$this->_conn->affected_rows()) {
                throw new Exception('수정에 실패했습니다.');
            }

            // 파일 복사
            $src = $this->upload_path . $this->upload_path_mock . $idx . "/";
            $dest = $this->upload_path . $this->upload_path_mock . $nowIdx . "/";

            exec("cp -rf $src $dest");
            if(is_dir($dest) === false) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
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
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);

            // 데이터 저장
            $data = array(
                'SiteCode' => $this->input->post('siteCode'),
                'MrcIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                'QuestionOption' => $this->input->post('QuestionOption'),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'TotalScore' => $this->input->post('TotalScore'),

                'QuestionFile' => $names['QuestionFile']['name'],
                'RealQuestionFile' => $names['QuestionFile']['real'],
                'ExplanFile' => $names['ExplanFile']['name'],
                'RealExplanFile' => $names['ExplanFile']['real'],

                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );

            $this->_conn->insert($this->_table['mockExamBase'], $data);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('저장에 실패했습니다.');
            }

            $nowIdx = $this->_conn->insert_id();

            // 파일 업로드
            $uploadSubPath = $this->upload_path_mock . $nowIdx;

            $isSave = $this->uploadFileSave($uploadSubPath, $names);
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            // 데이터 수정
            $addData = [
                'FilePath' => PUBLICURL . 'uploads/' . $uploadSubPath . "/"
            ];

            $this->_conn->set($addData)->where(['MpIdx' => $nowIdx])->update($this->_table['mockExamBase']);

            if (!$this->_conn->affected_rows()) {
                throw new Exception('수정에 실패했습니다.');
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
     * 기본정보 수정 (lms_Mock_Paper)
     */
    public function update()
    {
        $filePath = $this->upload_path . $this->upload_path_mock . $this->input->post('idx') . '/';
        $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);

        try {
            $this->_conn->trans_begin();

            $uploadSubPath = $this->upload_path_mock . $this->input->post('idx');

            // 기존데이터 첨부파일 이름 추출
            $fileBackup = array();
            $beforeDB = $this->_conn->select('RealQuestionFile, RealExplanFile')
                                    ->where(array('MpIdx' => $this->input->post('idx'), 'IsStatus' => 'Y'))
                                    ->get($this->_table['mockExamBase'])->row_array();

            // 데이터 수정
            $data = array(
                'MrcIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                'FilePath' => PUBLICURL . 'uploads/' . $uploadSubPath . "/",
                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            if($this->input->post('QuestionOption')) $data['QuestionOption'] = $this->input->post('QuestionOption');
            if($this->input->post('AnswerNum'))      $data['AnswerNum'] = $this->input->post('AnswerNum');
            if($this->input->post('TotalScore'))     $data['TotalScore'] = $this->input->post('TotalScore');

            if( isset($names['QuestionFile']['error']) && $names['QuestionFile']['error'] === UPLOAD_ERR_OK && $names['QuestionFile']['size'] > 0 ) {
                $data['QuestionFile'] = $names['QuestionFile']['name'];
                $data['RealQuestionFile'] = $names['QuestionFile']['real'];

                if( !empty($beforeDB['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB['RealQuestionFile'];
            }
            if( isset($names['ExplanFile']['error']) && $names['ExplanFile']['error'] === UPLOAD_ERR_OK && $names['ExplanFile']['size'] > 0 ) {
                $data['ExplanFile'] = $names['ExplanFile']['name'];
                $data['RealExplanFile'] = $names['ExplanFile']['real'];

                if( !empty($beforeDB['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB['RealExplanFile'];
            }

            $where = array('MpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockExamBase'], $data, $where);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('변경에 실패했습니다.');
            }

            // 파일 업로드 (업로드파일이 있으면)
            if($fileBackup) {

                $isSave = $this->uploadFileSave($uploadSubPath, $names, $fileBackup);
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

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }


    /**
     * 기본정보, 문항정보 조회
     */
    public function getExamBase($idx)
    {
        if (!preg_match('/^[0-9]+$/', $idx)) return false;

        $where = array('MpIdx' => $idx, 'IsStatus' => 'Y');

        // 기본정보
        $data = $this->_conn->get_where($this->_table['mockExamBase'], $where)->row_array();
        if(empty($data)) return false;

        // 문항정보
        $qData = $this->_conn->order_by('QuestionNO ASC')->get_where($this->_table['mockExamQuestion'], $where)->result_array();


        // 등록된 카테고리정보 로드
        $moCate_name = $moCate_isUse = array();
        $condition = [
            'EQ' => ['MC.MrcIdx' => $data['MrcIdx']]
        ];
        $moCate = $this->mockCommonModel->moCateListAll($condition, '', '', false, true);
        if(empty($moCate)) return false;

        $moCate_name = array_column($moCate, 'CateRouteName', 'MrcIdx');
        $moCate_isUse = array_column($moCate, 'BaseIsUse', 'MrcIdx');


        // 등록된 교수정보 로드
        $professor = array();
        $condition = [
            'EQ' => ['P.ProfIdx' => $data['ProfIdx']]
        ];
        $professorDB = $this->searchProfessorModel->professorList($condition, '', '', false, false);
        if(empty($professorDB)) return false;

        foreach ($professorDB as $it) {
            $professor[] = array(
                'code' => $it['ProfIdx'],
                'txt' => $it['wProfName'] .' | '. $it['ProfIdx'] .' | '. $it['wProfId'] .' | '. (($it['BaseIsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>')
            );
        }

        // 문제영역 로드
        $areaList = $this->getAreaList($data['MrcIdx']);

        return array($data, $qData, $moCate_name, $moCate_isUse, $professor, $areaList);
    }


    /**
     *  문제영역 로드 (lms_mock_area_list)
     */
    public function getAreaList($idx)
    {
        $sql = "
            SELECT ML.*
            FROM {$this->_table['mockAreaCate']} AS MC
            JOIN {$this->_table['mockArea']} AS MA ON MC.MaIdx = MA.MaIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            JOIN {$this->_table['mockAreaList']} AS ML ON MA.MaIdx = ML.MaIdx AND ML.IsStatus = 'Y' AND ML.IsUse = 'Y'
            WHERE MC.MrcIdx = $idx AND MC.IsStatus = 'Y'
            ORDER BY ML.OrderNum ASC";

        return $this->_conn->query($sql)->result_array();
    }


    /**
     *  파일저장 및 수정
     */
    public function uploadFileSave($uploadSubPath, $names, $fileBackup=array(), $type='file')
    {
        $this->load->library('upload');

        try {
            if (!$uploadSubPath) {
                throw new Exception('파라메타 오류');
            }

            $realFileNames = array();
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
            if($fileBackup) {
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


    // 파일복사
    public function uploadFileCopy($fileCopy) {
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


    /**
     * 업로드 파일 삭제
     */
    public function uploadFileDel($type, $idx, $name)
    {
        $this->load->library('upload');

        try {
            $this->_conn->trans_begin();

            if($type == 'base') {
                $whereKey = 'MpIdx';
                $table = $this->_table['mockExamBase'];
            }
            else {
                $whereKey = 'MqIdx';
                $table = $this->_table['mockExamQuestion'];
            }

            $bDB = $this->_conn->select('Real'.$name)->get_where($table, array($whereKey => $idx, 'IsStatus' => 'Y'))->row_array();
            if(empty($bDB))  {
                throw new Exception('DB로드에 실패하였습니다.');
            }

            $data = array(
                $name => '',
                'Real'.$name => '',
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array($whereKey => $idx);

            $this->_conn->update($table, $data, $where);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('파일 삭제에 실패했습니다.');
            }

            // 파일 삭제(백업)
            if($type == 'base') $bak_uploaded_files = array($this->upload_path . $this->upload_path_mock . $idx .'/'. $bDB['Real'.$name]);
            else $bak_uploaded_files = array($this->upload_path . $this->upload_path_mock . $idx . $this->upload_path_mockQ . $bDB['Real'.$name]);

            $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), false, $this->upload_path_mockBackup);
            if ($is_bak_uploaded_file !== true) {
                throw new Exception($is_bak_uploaded_file);
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    /**
     * 문항정보 등록,수정
     *
     * (주의) 저장파일에 Q1_~ 로 번호 붙으나 삭제를 하게 되면 index가 변경됨으로 번호가 안 맞을 수도 있음 (중복은 안됨)
     */
    public function storeQuestion()
    {
        $filePath = $this->upload_path . $this->upload_path_mock . $this->input->post('idx') . $this->upload_path_mockQ;
        $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);

        try {
            $this->_conn->trans_begin();

            // 기존데이터 첨부파일 이름 추출
            $beforeDB = $fileBackup = $fileCopy = array();
            if( $this->input->post('chapterExist') || $this->input->post('chapterDel') ) {
                $beforeIn = array_unique(array_merge($this->input->post('chapterExist'), $this->input->post('chapterDel')));

                $bDB = $this->_conn->select('MqIdx,RealQuestionFile,RealExplanFile')
                                   ->where_in($beforeIn)
                                   ->get($this->_table['mockExamQuestion'])->result_array();

                foreach ($bDB as $it) {
                    $beforeDB[$it['MqIdx']] = $it;
                }
                unset($bDB);
            }

            if( !empty($this->input->post('chapterTotal')) ) {
                foreach ($this->input->post('chapterTotal') as $k => $v) {
                    if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록

                        $dataReg = array(
                            'MpIdx' => $this->input->post('idx'),
                            'MalIdx' => $_POST['MalIdx'][$k],
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'QuestionOption' => $_POST['QuestionOption'][$k],
                            'FilePath' => PUBLICURL . 'uploads/' . $this->upload_path_mock . $this->input->post('idx') . $this->upload_path_mockQ,
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'RightAnswerRate' => 0,
                            'Scoring' => $_POST['Scoring'][$k],
                            'Difficulty' => $_POST['Difficulty'][$k],
                            'RegIp' => $this->input->ip_address(),
                            'RegDatm' => date("Y-m-d H:i:s"),
                            'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                        if($_POST['regKind'][$k] == 'call') { // 호출한 경우
                            $index = $k + 1;
                            $callRealQuestionFile = 'Q'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', $_POST['callRealQuestionFile'][$k]);
                            $callRealExplanFile = 'E'. $index . '_'. md5(uniqid(mt_rand())) . preg_replace('/^.+(\.[a-z0-9]+)$/i', '$1', $_POST['callRealExplanFile'][$k]);

                            $dataReg['QuestionFile'] = $_POST['callQuestionFile'][$k];
                            $dataReg['RealQuestionFile'] = $callRealQuestionFile;
                            $dataReg['ExplanFile'] = $_POST['callExplanFile'][$k];
                            $dataReg['RealExplanFile'] = $callRealExplanFile;

                            // 복사할 파일
                            $src = $_POST['callIdx'][$k] . $this->upload_path_mockQ;
                            $dest = $this->input->post('idx') . $this->upload_path_mockQ;

                            $fileCopy[] = array('src' => $src . $_POST['callRealQuestionFile'][$k], 'dest' => $dest . $callRealQuestionFile);
                            $fileCopy[] = array('src' => $src . $_POST['callRealExplanFile'][$k], 'dest' => $dest . $callRealExplanFile);
                        }
                        else {
                            if ( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                                $dataReg['QuestionFile'] = $names['QuestionFile']['name'][$k];
                                $dataReg['RealQuestionFile'] = $names['QuestionFile']['real'][$k];
                            }
                            if ( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                                $dataReg['ExplanFile'] = $names['ExplanFile']['name'][$k];
                                $dataReg['RealExplanFile'] = $names['ExplanFile']['real'][$k];
                            }
                        }

                        $this->_conn->insert($this->_table['mockExamQuestion'], $dataReg);
                        if(!$this->_conn->affected_rows()) {
                            throw new Exception('저장에 실패했습니다(1).');
                        }
                    }
                    else { // 수정
                        $dataMod = array(
                            'MalIdx' => $_POST['MalIdx'][$k],
                            'QuestionNO' => $_POST['QuestionNO'][$k],
                            'QuestionOption' => $_POST['QuestionOption'][$k],
                            'FilePath' => PUBLICURL . 'uploads/' . $this->upload_path_mock . $this->input->post('idx') . $this->upload_path_mockQ,
                            'RightAnswer' => $_POST['RightAnswer'][$k],
                            'Scoring' => $_POST['Scoring'][$k],
                            'Difficulty' => $_POST['Difficulty'][$k],
                            'UpdDatm' => date("Y-m-d H:i:s"),
                            'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                        );
                        if( isset($names['QuestionFile']['error'][$k]) && $names['QuestionFile']['error'][$k] === UPLOAD_ERR_OK && $names['QuestionFile']['size'][$k] > 0 ) {
                            $dataMod['QuestionFile'] = $names['QuestionFile']['name'][$k];
                            $dataMod['RealQuestionFile'] = $names['QuestionFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                        }
                        if( isset($names['ExplanFile']['error'][$k]) && $names['ExplanFile']['error'][$k] === UPLOAD_ERR_OK && $names['ExplanFile']['size'][$k] > 0 ) {
                            $dataMod['ExplanFile'] = $names['ExplanFile']['name'][$k];
                            $dataMod['RealExplanFile'] = $names['ExplanFile']['real'][$k];

                            if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                        }

                        $where = array('MqIdx' => $v);
                        $this->_conn->update($this->_table['mockExamQuestion'], $dataMod, $where);

                        if(!$this->_conn->affected_rows()) {
                            throw new Exception('저장에 실패했습니다(2).');
                        }
                    }
                }
            }

            // 삭제 (IsStatus Update)
            if( !empty($this->input->post('chapterDel')) ) {
                foreach ($this->input->post('chapterDel') as $k => $v) {
                    $dataDel = array(
                        'IsStatus' => 'N',
                        'UpdDatm' => date("Y-m-d H:i:s"),
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );

                    $where = array('MqIdx' => $v);
                    $this->_conn->update($this->_table['mockExamQuestion'], $dataDel, $where);
                    if(!$this->_conn->affected_rows()) {
                        throw new Exception('저장에 실패했습니다(3).');
                    }

                    if( !empty($beforeDB[$v]['RealQuestionFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealQuestionFile'];
                    if( !empty($beforeDB[$v]['RealExplanFile']) ) $fileBackup[] = $filePath . $beforeDB[$v]['RealExplanFile'];
                }
            }

            // 파일 복사 (호출한 경우)
            if($fileCopy) {
                if ($this->uploadFileCopy($fileCopy) !== true) {
                    throw new Exception('파일 저장에 실패했습니다.');
                }
            }

            // 파일 업로드 & 백업이동
            $uploadSubPath = $this->upload_path_mock . $this->input->post('idx') . $this->upload_path_mockQ;
            $isSave = $this->uploadFileSave($uploadSubPath, $names, $fileBackup, 'img');
            if($isSave !== true) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }


    // 정렬변경
    public function sort($sorting)
    {
        $data = [];
        foreach ($sorting as $k => $v) {
            $data[] = array(
                'MqIdx' => $k,
                'QuestionNO' => $v,
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
        }

        try {
            $this->_conn->trans_start();

            if($data) $this->_conn->update_batch($this->_table['mockExamQuestion'], $data, 'MqIdx');

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('정렬변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $this->input->post('idx')]];
    }


    // 호출
    public function call()
    {
        $condition = [
            'EQ' => [
                'EB.siteCode' => $this->input->post('siteCode'),
                'EB.MrcIdx' => $this->input->post('moLink'),
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
            JOIN {$this->_table['mockExamQuestion']} AS EQ ON EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y'
            JOIN {$this->_table['mockAreaList']} AS MA ON EQ.MalIdx = MA.MalIdx AND MA.IsStatus = 'Y' AND MA.IsUse = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON EQ.RegAdminIdx = A.wAdminIdx
            WHERE EB.IsStatus = 'Y'
        ";
        $sql .= $this->_conn->makeWhere($condition)->getMakeWhere(true);

        $data = $this->_conn->query($sql)->row();
        if($data) {
            $data->upImgUrlQ = $this->config->item('upload_url_mock', 'mock') . $data->MpIdx . $this->config->item('upload_path_mockQ', 'mock');
            $data->optSame = ($data->EB_AnswerNum == $this->input->post('AnswerNum')) ? 1 : 0;
        }

        return ['ret_cd' => true, 'dt' => $data];
    }
}
