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
    ];

    public $upload_path_mock;       // 통파일 저장경로: ~/mocktest/{idx}/
    public $upload_path_mockQ;      // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    public $upload_path_mockBackup; // 개별 문제파일 저장경로 {$uploadPath_mock}/bak/{datetime}


    public function __construct()
    {
        parent::__construct('lms');

        $this->upload_path_mock = config_item('upload_prefix_dir') . '/mocktest/';
        $this->upload_path_mockQ = '/question/';
        $this->upload_path_mockBackup = '/bak_' . date("Ymd") . '/';
    }

    /**
     * 메인리스트
     */
    public function mainList($conditionAdd='', $limit='', $offset='')
    {
        $condition = [ 'IN' => ['MB.SiteCode' => get_auth_site_codes()] ];    //사이트 권한 추가
        if($conditionAdd) $condition = array_merge_recursive($condition, $conditionAdd);

        $offset_limit = (is_numeric($limit) && is_numeric($offset)) ? "LIMIT $offset, $limit" : "";


        $select = "
            SELECT EB.*, A.wAdminName, MB.SiteCode, MB.CateCode, MB.Ccd,
                   CONCAT(C1.CateName, ' > ', SC.CcdName) AS CateRouteName, SJ.SubjectName, PMS.wProfName,
                   (SELECT COUNT(*) FROM {$this->_table['mockExamQuestion']} AS EQ WHERE EB.MpIdx = EQ.MpIdx AND EQ.IsStatus = 'Y') AS ListCnt,
                   IF(MB.Isuse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N', 'N', 'Y') AS IsUseCate,
                   IF(MS.Isuse = 'N' OR SJ.IsUse = 'N', 'N', 'Y') AS IsUseSubject,
                   IF(P.Isuse = 'N' OR PMS.wIsUse = 'N', 'N', 'Y') AS IsUseProfessor
        ";
        $from = "
            FROM {$this->_table['mockExamBase']} AS EB
            JOIN {$this->_table['mockAreaCate']} AS MC ON EB.MrcIdx = MC.MrcIdx AND MC.IsStatus = 'Y'
            JOIN {$this->_table['mockSubject']} AS MS ON MC.MrsIdx = MS.MrsIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['subject']} AS SJ ON MS.SubjectIdx = SJ.SubjectIdx AND MS.IsStatus = 'Y'
            JOIN {$this->_table['mockBase']} AS MB ON MS.MmIdx = MB.MmIdx AND MB.IsStatus = 'Y'
            JOIN {$this->_table['category']} AS C1 ON MB.CateCode = C1.CateCode AND C1.CateDepth = 1 AND C1.IsStatus = 'Y'
            JOIN {$this->_table['sysCode']} AS SC ON MB.Ccd = SC.Ccd AND SC.IsStatus = 'Y'
            JOIN {$this->_table['professor']} AS P ON EB.ProfIdx = P.ProfIdx AND P.IsStatus = 'Y'
            JOIN {$this->_table['pms_professor']} AS PMS ON P.wProfIdx = PMS.wProfIdx AND PMS.wIsStatus = 'Y'
            LEFT JOIN {$this->_table['admin']} AS A ON MS.RegAdminIdx = A.wAdminIdx
        ";
        $selectCount = "SELECT COUNT(*) AS cnt";
        $where = "WHERE EB.IsStatus = 'Y'";
        $where .= $this->_conn->makeWhere($condition)->getMakeWhere(true)."\n";
        $order = "ORDER BY MB.SiteCode DESC\n";

        $data = $this->_conn->query($select . $from . $where . $order . $offset_limit)->result_array();
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
            $this->_conn->trans_start();

            // lms_mock_paper 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamBase']}
                    (SiteCode, MrsIdx, ProfIdx, PapaerName, Year, RotationNo, QuestionOption, AnswerNum, TotalScore, RegIp, RegAdminIdx, RegDate)
                SELECT SiteCode, MrsIdx, ProfIdx, CONCAT('복사-', PapaerName), Year, RotationNo, QuestionOption, AnswerNum, TotalScore, ?, ?, ?
                FROM {$this->_table['mockExamBase']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($RegIp, $RegAdminIdx, $RegDatm, $idx));

            $nowMaIdx = $this->_conn->insert_id();

            // lms_mock_questions 복사
            $sql = "
                INSERT INTO {$this->_table['mockExamQuestion']}
                    (MpIdx, MalIdx, OrderNum, QuestionOption, RightAnswer, Scoring, Difficulty, RegIp, RegAdminIdx, RegDatm)
                SELECT ?, MalIdx, OrderNum, QuestionOption, RightAnswer, Scoring, Difficulty, ?, ?, ?
                FROM {$this->_table['mockExamQuestion']}
                WHERE MpIdx = ? AND IsStatus = 'Y'";
            $this->_conn->query($sql, array($nowMaIdx, $RegIp, $RegAdminIdx, $RegDatm, $idx));

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('복사에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }


    /**
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(array('QuestionFile','ExplanFile'), 1);

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

                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            foreach ($names as $it) { // 업로드 정보
                if($it['input'] == 'QuestionFile') {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
                else if($it['input'] == 'ExplanFile') {
                    $data['ExplanFile'] = $it['name'];
                    $data['RealExplanFile'] = $it['real'];
                }
            }

            $this->_conn->insert($this->_table['mockExamBase'], $data);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('저장에 실패했습니다.');
            }

            $nowMaIdx = $this->_conn->insert_id();

            // 파일 업로드
            $isSave = $this->uploadFileSave($nowMaIdx, $names);
            if(!$isSave) {
                throw new Exception('파일 저장에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        }
        catch (Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return ['ret_cd' => true, 'dt' => ['idx' => $nowMaIdx]];
    }


    /**
     * 기본정보 수정 (lms_Mock_Paper)
     */
    public function update()
    {
        try {
            $this->_conn->trans_begin();

            $names = $this->mockCommonModel->makeUploadFileName(array('QuestionFile','ExplanFile'), 1);

            // 기존 업로드 파일명 추출 (업로드파일이 있으면)
            if($names) {
                $beDB = $this->_conn->select('RealQuestionFile, RealExplanFile')
                    ->where(array('MpIdx' => $this->input->post('idx'), 'IsStatus' => 'Y'))
                    ->get($this->_table['mockExamBase'])->row_array();
                if (empty($beDB)) {
                    throw new Exception('DB로드에 실패하였습니다.');
                }
            }

            // 데이터 수정
            $data = array(
                'MrcIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                //'QuestionOption' => $this->input->post('QuestionOption'),
                //'AnswerNum' => $this->input->post('AnswerNum'),
                //'TotalScore' => $this->input->post('TotalScore'),

                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            foreach ($names as $it) { // 업로드 정보
                if($it['input'] == 'QuestionFile') {
                    $data['QuestionFile'] = $it['name'];
                    $data['RealQuestionFile'] = $it['real'];
                }
                else if($it['input'] == 'ExplanFile') {
                    $data['ExplanFile'] = $it['name'];
                    $data['RealExplanFile'] = $it['real'];
                }
            }
            $where = array('MpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockExamBase'], $data, $where);
            if(!$this->_conn->affected_rows()) {
                throw new Exception('변경에 실패했습니다.');
            }

            // 파일 업로드 (업로드파일이 있으면)
            if($names) {
                $isSave = $this->uploadFileSave($this->input->post('idx'), $names, $beDB);
                if (!$isSave) {
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
     *  업로드 파일 저장 및 수정
     */
    public function uploadFileSave($idx, $names, $beDB='', $type='file')
    {
        $this->load->library('upload');

        try {
            if (!$idx || !$names) {
                throw new Exception('파라메타 오류');
            }

            $upload_sub_dir = $this->upload_path_mock . $idx;

            // 이미지 업로드
            $uploaded = $this->upload->uploadFile($type, array_unique(array_column($names, 'input')), array_column($names, 'real'), $upload_sub_dir);
            if (is_array($uploaded) === false) {
                throw new Exception($uploaded);
            }

            // 수정시 이미지 백업
            if($beDB) {
                $bak_uploaded_files = array();
                foreach ($names as $it) {
                    $bak_uploaded_files[] = $this->upload->_upload_path . $upload_sub_dir . '/' . $beDB[ 'Real'.$it['input'] ];
                }
                $is_bak_uploaded_file = $this->upload->bakUploadedFile(array_unique($bak_uploaded_files), false, $this->upload_path_mockBackup);
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
        $qData = $this->_conn->get_where($this->_table['mockExamQuestion'], $where)->result_array();


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
     * 업로드파일 삭제
     */
    public function fileDel($type, $idx, $name)
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

            // 파일 삭제
            if($type == 'base') $bak_uploaded_files = array($this->upload->_upload_path . $this->upload_path_mock . $idx .'/'. $bDB['Real'.$name]);
            else $bak_uploaded_files = array($this->upload->_upload_path . $this->upload_path_mock . $idx . $upload_path_mockQ . $bDB['Real'.$name]);

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
     */
    public function storeUnit()
    {
        $dataReg = $dataMod = $dataDel = array();

        if( !empty($this->input->post('chapterTotal')) ) {
            foreach ($this->input->post('chapterTotal') as $k => $v) {
                if ( empty($this->input->post('chapterExist')) || !in_array($v, $this->input->post('chapterExist')) ) { // 신규등록 데이터
                    $dataReg[] = array(
                        'MpIdx' => $this->input->post('idx'),
                        'MalIdx' => $_POST['MalIdx'][$k],
                        'OrderNum' => $_POST['orderNum'][$k],
                        'QuestionOption' => $_POST['QuestionOption'][$k],

                        'QuestionFile' => '',
                        'RealQuestionFile' => '',
                        'ExplanFile' => '',
                        'RealExplanFile' => '',

                        'RightAnswer' => implode('', $_POST['RightAnswer'][$k]),
                        'RightAnswerRate' => 0,
                        'Scoring' => $_POST['Scoring'][$k],
                        'Difficulty' => $_POST['Difficulty'][$k],
                        'RegIp' => $this->input->ip_address(),
                        'RegAdminIdx' => $this->session->userdata('admin_idx'),
                        'RegDatm' => date("Y-m-d H:i:s"),
                    );
                } else { // 수정 데이터
                    $dataMod[] = array(
                        'MqIdx' => $v,
                        'MpIdx' => $this->input->post('idx'),
                        'MalIdx' => $_POST['MalIdx'][$k],
                        'OrderNum' => $_POST['orderNum'][$k],
                        'QuestionOption' => $_POST['QuestionOption'][$k],

                        'QuestionFile' => '',
                        'RealQuestionFile' => '',
                        'ExplanFile' => '',
                        'RealExplanFile' => '',

                        'RightAnswer' => implode('', $_POST['RightAnswer'][$k]),
                        'RightAnswerRate' => 0,
                        'Scoring' => $_POST['Scoring'][$k],
                        'Difficulty' => $_POST['Difficulty'][$k],
                        'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                    );
                }
            }
        }

        // 삭제 데이터 (IsStatus Update)
        if( !empty($this->input->post('chapterDel')) ) {
            foreach ($this->input->post('chapterDel') as $k => $v) {
                $dataDel[] = array(
                    'MqIdx' => $v,
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $this->session->userdata('admin_idx'),
                );
            }
        }


        try {
            $this->_conn->trans_start();

            if($dataReg) $this->_conn->insert_batch($this->_table['mockExamQuestion'], $dataReg);
            if($dataMod) $this->_conn->update_batch($this->_table['mockExamQuestion'], $dataMod, 'MqIdx');
            if($dataDel) $this->_conn->update_batch($this->_table['mockExamQuestion'], $dataDel, 'MqIdx');

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
            return error_result($e);
        }

        return ['ret_cd' => true];
    }


    // 정렬변경
    public function sort($sorting) {

        $data = [];
        foreach ($sorting as $k => $v) {
            $data[] = array(
                'MqIdx' => $k,
                'OrderNum' => $v,
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

}
