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
            $column = 'count(*) AS numrows';
            $group_by = '';
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
            $group_by = ' GROUP BY MP.MpIdx';
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

        $query = $this->_conn->query('select ' . $column . $from . $where . $group_by . $order_by_offset_limit);
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
     * 문제등록
     * @param $form_data
     * @return array|bool
     */
    public function addExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
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

    public function modifyExam($form_data)
    {
        $this->_conn->trans_begin();
        try {
            $filePath = $this->upload_path . $this->upload_path_mock . element('idx', $form_data) . '/';
            $names = $this->mockCommonModel->makeUploadFileName(['QuestionFile','ExplanFile'], 1);
            $uploadSubPath = $this->upload_path_mock . $this->input->post('idx', $form_data);

            // 기존데이터 첨부파일 이름 추출
            $fileBackup = [];
            $beforeDB = $this->_conn->select('RealQuestionFile, RealExplanFile')
                ->where(array('MpIdx' => element('idx', $form_data), 'IsStatus' => 'Y'))
                ->get($this->_table['mockExamBase'])->row_array();

            // 데이터 수정
            $input_data = [
                'MaIdx' => element('area_code', $form_data),
                'ProfIdx' => element('ProfIdx', $form_data),
                'PapaerName' => element('PapaerName', $form_data),
                'Year' => element('Year', $form_data),
                'RotationNo' => element('RotationNo', $form_data),
                'FilePath' => PUBLICURL . 'uploads/' . $uploadSubPath . "/",
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
     * 파일저장 및 수정
     * @param $uploadSubPath
     * @param $names
     * @param array $fileBackup
     * @param string $type
     * @return bool|string
     */
    private function _uploadFileSave($uploadSubPath, $names, $fileBackup = [], $type='file')
    {
        $this->load->library('upload');

        try {
            if (empty($uploadSubPath) === true) {
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
}