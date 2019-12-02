<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Exam extends BaseMocktest
{
    protected $temp_models = array('common/searchProfessor', 'mocktestNew/regExam');
    protected $helpers = array();

    public function __construct()
    {
        $this->models = array_merge($this->models, $this->temp_models);
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = key($arr_site_code);

        $arr_base['cateD1'] = $this->getCategoryArray();
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['subject'] = $this->getSubjectArray();

        $this->load->view('mocktestNew/base/exam/index', [
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock'),
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base,
            'professor' => $this->searchProfessorModel->professorList('', '', '', false)
        ]);
    }

    public function listAjax()
    {
        $condition = [
            'EQ' => [
                'MP.SiteCode' => $this->input->post('search_site_code'),
                'MB.CateCode' => $this->input->post('search_cateD1'),
                'MB.Ccd' => $this->input->post('search_cateD2'),
                'MS.SubjectIdx' => $this->input->post('search_subject'),
                'MP.ProfIdx' => $this->input->post('search_professor'),
                'MP.Year' => $this->input->post('search_year'),
                'MP.RotationNo' => $this->input->post('search_round'),
                'MP.IsUse' => $this->input->post('search_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'MP.PapaerName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'SC.CcdName' => $this->input->post('search_fi', true),
                    'SJ.SubjectName' => $this->input->post('search_fi', true),
                    'PMS.wProfName' => $this->input->post('search_fi', true),
                ]
            ],
        ];

        $list = [];
        $count = $this->regExamModel->mainList(true, $condition);
        if ($count > 0) {
            $list = $this->regExamModel->mainList(false, $condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }


    public function create($params = [])
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = '';
        $data = $question_data = $professor = $areaList = null;
        $cate_data = [];

        if (empty($params[0]) === true) {
            $method = 'POST';
        } else {
            $method = 'PUT';
            //문제지 기본데이터
            $data = $this->regExamModel->findExamData(['EQ' => ['MP.MpIdx' => $params[0],'MP.IsStatus' => 'Y']]);
            if (empty($data) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
            }
            $def_site_code = $data['SiteCode'];

            //문항정보
            $question_data = $this->regExamModel->listExamQuestions(['EQ' => ['MQ.MpIdx' => $params[0],'MQ.IsStatus' => 'Y']]);

            //등록된 카테고리정보
            $column = "
                MB.MmIdx, MS.*, A.wAdminName, S.SiteCode, C1.CateCode AS CateCode1, SC.Ccd AS CateCode2,
                CONCAT(S.SiteName, ' > ', C1.CateName, ' > ', SC.CcdName, ' > ', SJ.SubjectName, ' [', IF(MS.SubjectType = 'E', '필수', '선택'), '] - ', MA.QuestionArea) AS CateRouteName,
                IF(MS.Isuse = 'N' OR SJ.IsUse = 'N' OR MB.IsUse = 'N' OR S.IsUse = 'N' OR C1.IsUse = 'N' OR SC.IsUse = 'N' OR MA.IsUse = 'N', 'N', 'Y') AS BaseIsUse,
                MC.MrcIdx
            ";
            $cate_data = $this->mockCommonModel->moCateListAll($column, false, ['IN' => ['MC.MrcIdx' => explode(',',$data['MrcIdxs'])]], true, 'Y');

            //등록된 교수정보 로드
            $professorDB = $this->searchProfessorModel->professorList(['EQ' => ['P.ProfIdx' => $data['ProfIdx']]], '', '', false, false);
            if (empty($professorDB) === true) {
                $this->json_error('데이터 조회에 실패했습니다.');
            }
            foreach ($professorDB as $it) {
                $professor[] = array(
                    'code' => $it['ProfIdx'],
                    'txt' => $it['wProfName'] .' | '. $it['ProfIdx'] .' | '. $it['wProfId'] .' | '. (($it['BaseIsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>')
                );
            }
            $areaList = $this->regExamModel->getAreaList(['EQ' => ['MA.MaIdx' => $data['MaIdx'], 'MA.IsStatus' => 'Y']]);
        }

        $this->load->view('mocktestNew/base/exam/create', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'method' => $method,
            'data' => $data,
            'question_data' => $question_data,
            'cate_data' => $cate_data,
            'professor' => $professor,
            'areaList' => $areaList,
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock') . $data['MpIdx'] .'/',
            'upImgUrlQ' => $this->config->item('upload_url_mock', 'mock') . $data['MpIdx'] . $this->config->item('upload_path_mockQ', 'mock'),
            'isDeny' => !empty($qData) ? true : false,  // 개별 문제가 등록된 경우 카테고리, 문제등록옵션, 총점 변경 불가
        ]);
    }

    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'moLink[]', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'area_code', 'label' => '문제영역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PapaerName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'Year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]']
        ];

        if (empty($this->_reqP('idx')) === true) {
            $rules = array_merge($rules, [
                ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'],
                ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
                ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]']
            ]);
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'idx', 'label' => '문제지식별자', 'rules' => 'trim|required|is_natural_no_zero']
            ]);
            if(empty($this->input->post('isDeny')) === true) {
                $rules = array_merge($rules, [
                    ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'],
                    ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
                    ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]']
                ]);
            }
        }
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->{$method . 'Exam'}($this->_reqP(null));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }
}