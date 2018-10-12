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
        'mockExamBase' => 'lms_Mock_Paper',
        'mockExamQuestion' => 'lms_Mock_Questions',
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
                'MrsIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('wprof_idx'),
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

                'IsUse' => $this->input->post('isUse'),
                'RegIp' => $this->input->ip_address(),
                'RegDate' => date("Y-m-d H:i:s"),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $this->_conn->insert($this->_table['mockExamBase'], $data);

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
            $data = array(
                'SiteCode' => $this->input->post('siteCode'),
                'MrsIdx' => $this->input->post('moLink'),
                'ProfIdx' => $this->input->post('wprof_idx'),
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

                'IsUse' => $this->input->post('isUse'),
                'UpdDatm' => date("Y-m-d H:i:s"),
                'UpdAdminIdx' => $this->session->userdata('admin_idx'),
            );
            $where = array('MpIdx' => $this->input->post('idx'));

            $this->_conn->update($this->_table['mockExamBase'], $data, $where);

            if ( !$this->_conn->affected_rows() ) {
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


        return array($data, $chData, $moCate);
    }
}
