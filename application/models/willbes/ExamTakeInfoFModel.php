<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTakeInfoFModel extends WB_Model
{
    private $_table = [
        'sys_code' => 'lms_sys_code',
        'exam_take_info' => 'lms_exam_take_info'
    ];

    public function __construct()
    {
        parent::__construct('lms');
        $this->load->model('lms/sys/codeModel');
    }

    /**
     * 시험정보 과목공통코드
     * @return array
     */
    public function getSubjectForSelectBox()
    {
        return $this->codeModel->getCcd('733');
    }

    /**
     * 시험정보 과목공통코드
     * @return array
     */
    public function getSubjectForList()
    {
        return $this->codeModel->getCcd('733', '', ['EQ' => ['CcdEtc' => 'main']]);
    }

    /**
     * 과목별 데이터
     * @return array
     */
    public function totalExamInfo()
    {
        return [];
    }
}