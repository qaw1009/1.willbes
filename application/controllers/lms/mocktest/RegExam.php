<?php
/**
 * ======================================================================
 * 모의고사등록 > 과목별 문제등록
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class RegExam extends \app\controllers\BaseController
{
    protected $models = array('sys/category', 'product/base/subject', 'common/searchProfessor', 'mocktest/mockCommon', 'mocktest/regExam');
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인
     */
    public function index()
    {
        $cateD1 = $this->categoryModel->getCategoryArray('', '', '', 1);
        $cateD2 = $this->mockCommonModel->getMockKind();

        list($data, $modata) = $this->regExamModel->list();

        $this->load->view('mocktest/reg/exam/index', [
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
            'data' => $data,
            'moData' => $modata,
        ]);
    }


    /**
     * 리스트
     */
    public function list($params = [])
    {

    }


    /**
     * 등록폼
     */
    public function create()
    {
        $this->load->view('mocktest/reg/exam/create', [
            'siteCodeDef' => '',
            'method' => 'POST',
            'exOpt' => $this->mockCommonModel->getSysCode($this->config->item('syscode_exOption', 'mock')),
        ]);
    }


    /**
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        $rules = [
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'moLink', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PapaerName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'Year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        if( $_FILES['QuestionFile']['error'] === UPLOAD_ERR_NO_FILE ) {
            $rules[] = ['field' => 'QuestionFile', 'label' => '문제통파일', 'rules' => 'required'];
        }
        if( $_FILES['ExplanFile']['error'] === UPLOAD_ERR_NO_FILE ) {
            $rules[] = ['field' => 'ExplanFile', 'label' => '해설지통파일', 'rules' => 'required'];
        }
        if ($this->validate($rules) === false) return;

        //TODO 업로드 이미지 저장

        $result = $this->regExamModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    /**
     * 기본정보 수정폼
     */
    public function edit($param = [])
    {
        list($data, $qData, $moCate_name, $moCate_isUse, $professor, $areaList) = $this->regExamModel->getExamBase($param[0]);
        if (!$data) {
            $this->json_error('데이터 조회에 실패했습니다.');
            return;
        }

        $this->load->view('mocktest/reg/exam/create', [
            'siteCodeDef' => $data['SiteCode'],
            'method' => 'PUT',
            'exOpt' => $this->mockCommonModel->getSysCode($this->config->item('syscode_exOption', 'mock')),
            'data' => $data,
            'qData' => $qData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'professor' => $professor,
            'areaList' => $areaList,
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'isCopy' => ( isset($param[1]) && $param[1] == 'copy' ) ? true : false,
        ]);
    }


    /**
     * 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'ProfIdx', 'label' => '교수명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PapaerName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'Year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if($this->input->post('isCopy')) {
            $rules[] = ['field' => 'moLink', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'];
        }
        if( $_FILES['QuestionFile']['error'] === UPLOAD_ERR_NO_FILE ) {
            $rules[] = ['field' => 'QuestionFile', 'label' => '문제통파일', 'rules' => 'required'];
        }
        if( $_FILES['ExplanFile']['error'] === UPLOAD_ERR_NO_FILE ) {
            $rules[] = ['field' => 'ExplanFile', 'label' => '해설지통파일', 'rules' => 'required'];
        }
        if ($this->validate($rules) === false) return;

        //TODO 업로드 이미지 변경

        $result = $this->regExamModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }



}
