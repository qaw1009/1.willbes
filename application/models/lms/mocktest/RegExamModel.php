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
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 메인리스트
     */
    public function list()
    {
        return array([],[]);
    }


    /**
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        try {
            $this->_conn->trans_start();

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

                'QuestionFile' => '',
                'RealQuestionFile' => '',
                'ExplanFile' => '',
                'RealExplanFile' => '',

                'IsUse' => $this->input->post('IsUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockExamBase'], $data);

            $nowMaIdx = $this->_conn->insert_id();

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('저장에 실패했습니다.');
            }
        }
        catch (Exception $e) {
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
            $this->_conn->trans_start();

            $data = array(
                'ProfIdx' => $this->input->post('ProfIdx'),
                'PapaerName' => $this->input->post('PapaerName', true),
                'Year' => $this->input->post('Year'),
                'RotationNo' => $this->input->post('RotationNo'),
                'QuestionOption' => $this->input->post('QuestionOption'),
                'AnswerNum' => $this->input->post('AnswerNum'),
                'TotalScore' => $this->input->post('TotalScore'),

                'QuestionFile' => '',
                'RealQuestionFile' => '',
                'ExplanFile' => '',
                'RealExplanFile' => '',

                'IsUse' => $this->input->post('IsUse'),
                'UpdDate' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            if($this->input->post('isCopy')) {
                $data['MrcIdx'] = $this->input->post('moLink');
            }
            $where = array('MpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockExamBase'], $data, $where);

            $this->_conn->trans_complete();
            if ($this->_conn->trans_status() === false) {
                throw new Exception('변경에 실패했습니다.');
            }
        }
        catch (Exception $e) {
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
}
