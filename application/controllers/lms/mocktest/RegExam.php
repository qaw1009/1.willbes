<?php
/**
 * ======================================================================
 * 모의고사등록 > 과목별 문제등록
 * ======================================================================
 *
 * 보기형식 - S:객관식(단일정답), M:객관식(복수정답), J:주관식
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

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $arrtab = array();

        $this->load->view('mocktest/reg/exam/index', [
//            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[0]['SiteCode'],
            'siteCodeDef' => $this->input->get('search_site_code') ? $this->input->get('search_site_code') : $cateD1[5]['SiteCode'],
            'cateD1' => $cateD1,
            'cateD2' => $cateD2,
            'subject' => $this->subjectModel->getSubjectArray(),
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock'),
            'arrsite' => $arrsite,
            'arrtab' => $arrtab
        ]);
    }


    /**
     * 리스트
     */
    public function list()
    {
        $rules = [
            ['field' => 'search_site_code', 'label' => '사이트', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD1', 'label' => '카테고리', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_cateD2', 'label' => '직렬', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_subject', 'label' => '과목', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_professor', 'label' => '교수', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_year', 'label' => '연도', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_round', 'label' => '회차', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'search_use', 'label' => '사용여부', 'rules' => 'trim|in_list[Y,N]'],
            ['field' => 'search_fi', 'label' => '검색', 'rules' => 'trim'],
            ['field' => 'length', 'label' => 'Length', 'rules' => 'trim|numeric'],
            ['field' => 'start', 'label' => 'Start', 'rules' => 'trim|numeric'],
        ];
        if ($this->validate($rules) === false) return;

        $condition = [
            'EQ' => [
                'EB.SiteCode' => $this->input->post('search_site_code'),
                'MB.CateCode' => $this->input->post('search_cateD1'),
                'MB.Ccd' => $this->input->post('search_cateD2'),
                'MS.SubjectIdx' => $this->input->post('search_subject'),
                'EB.ProfIdx' => $this->input->post('search_professor'),
                'EB.Year' => $this->input->post('search_year'),
                'EB.RotationNo' => $this->input->post('search_round'),
                'EB.IsUse' => $this->input->post('search_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'EB.PapaerName' => $this->input->post('search_fi', true),
                    'A.wAdminName' => $this->input->post('search_fi', true),
                    'SC.CcdName' => $this->input->post('search_fi', true),
                    'SJ.SubjectName' => $this->input->post('search_fi', true),
                    'PMS.wProfName' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->regExamModel->mainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }


    /**
     * 데이터 복사
     */
    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->copyData($this->input->post('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }


    /**
     * 등록폼
     */
    public function create()
    {
        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        $this->load->view('mocktest/reg/exam/create', [
            'siteCodeDef' => '',
            'method' => 'POST',
            'arrsite' => $arrsite
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
            ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];
        /*
        if( $_FILES['QuestionFile']['error'] !== UPLOAD_ERR_OK || $_FILES['QuestionFile']['size'] == 0 ) {
            $rules[] = ['field' => 'QuestionFile', 'label' => '문제통파일', 'rules' => 'required'];
        }
        if( $_FILES['ExplanFile']['error'] !== UPLOAD_ERR_OK  || $_FILES['ExplanFile']['size'] == 0 ) {
            $rules[] = ['field' => 'ExplanFile', 'label' => '해설지통파일', 'rules' => 'required'];
        }*/
        if ($this->validate($rules) === false) return;

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

        $arrsite = ['2002' => '경찰[학원]', '2004' => '공무원[학원]'];
        
        $this->load->view('mocktest/reg/exam/create', [
            'siteCodeDef' => $data['SiteCode'],
            'method' => 'PUT',
            'data' => $data,
            'qData' => $qData,
            'moCate_name' => $moCate_name,
            'moCate_isUse' => $moCate_isUse,
            'professor' => $professor,
            'areaList' => $areaList,
            'adminName' => $this->mockCommonModel->getAdminNames(),
            'upImgUrl' => $this->config->item('upload_url_mock', 'mock') . $data['MpIdx'] .'/',
            'upImgUrlQ' => $this->config->item('upload_url_mock', 'mock') . $data['MpIdx'] . $this->config->item('upload_path_mockQ', 'mock'),
            'isDeny' => !empty($qData) ? true : false,  // 개별 문제가 등록된 경우 카테고리, 문제등록옵션, 총점 변경 불가
            'arrsite' => $arrsite
        ]);
    }


    /**
     * 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'moLink', 'label' => '카테고리', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PapaerName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'Year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RotationNo', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if(!$this->input->post('isDeny')) {
            $rules[] = ['field' => 'QuestionOption', 'label' => '보기형식', 'rules' => 'trim|in_list[S,M,J]'];
            $rules[] = ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'];
            $rules[] = ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'];
        }
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->update();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }


    /**
     * 업로드파일 삭제
     */
//    public function fileDel()
//    {
//        $rules = [
//            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
//            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
//            ['field' => 'type', 'label' => 'TYPE', 'rules' => 'trim|required|in_list[base,sub]'],
//            ['field' => 'name', 'label' => 'NAME', 'rules' => 'trim|required|in_list[QuestionFile,ExplanFile]'],
//        ];
//        if ($this->validate($rules) === false) return;
//
//        $result = $this->regExamModel->uploadFileDel($this->input->post('type'), $this->input->post('idx'), $this->input->post('name'));
//        $this->json_result($result['ret_cd'], '삭제되었습니다.', $result, $result);
//    }


    /**
     * 문항정보 등록,수정
     */
    public function storeQuestion()
    {
        $Info = @json_decode($this->input->post('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'QuestionNO[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MalIdx[]', 'label' => '문제영역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption[]', 'label' => '문제등록옵션', 'rules' => 'trim|required|in_list[S,M,J]'],
            ['field' => 'Scoring[]', 'label' => '배점', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Difficulty[]', 'label' => '난이도', 'rules' => 'trim|required|in_list[T,M,B]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],

            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'regKind[]', 'label' => 'Call등록타입', 'rules' => 'trim|in_list[call]'],
            ['field' => 'callIdx[]', 'label' => 'CallIdx', 'rules' => 'trim|is_natural_no_zero'],
        ];
        foreach ($this->input->post('chapterTotal') as $k => $v) {
            if(!$v && $_POST['regKind'][$k] != 'call') {
                if (isset($_FILES['QuestionFile']['error'][$k]) && ($_FILES['QuestionFile']['error'][$k] !== UPLOAD_ERR_OK || $_FILES['QuestionFile']['size'][$k] == 0)) {
                    $rules[] = ['field' => 'QuestionFile', 'label' => '문제파일', 'rules' => 'required'];
                    break;
                }
                /*
                if (isset($_FILES['ExplanFile']['error'][$k]) && ($_FILES['ExplanFile']['error'][$k] !== UPLOAD_ERR_OK  || $_FILES['ExplanFile']['size'][$k] == 0)) {
                    $rules[] = ['field' => 'ExplanFile', 'label' => '해설지파일', 'rules' => 'required'];
                    break;
                }
                */
            }
        }
        if ($this->validate($rules) === false) return;

        foreach ($this->input->post('regKind') as $k => $v) {
            if($v == 'call') {
                if( empty($_POST['callQuestionFile'][$k]) || empty($_POST['callExplanFile'][$k]) ||
                    empty($_POST['callRealQuestionFile'][$k]) || !preg_match('/^[a-z0-9_]+\.{1}[a-z0-9]+$/i', $_POST['callRealQuestionFile'][$k]) ||
                    empty($_POST['callRealExplanFile'][$k]) || !preg_match('/^[a-z0-9_]+\.{1}[a-z0-9]+$/i', $_POST['callRealExplanFile'][$k]) ) {
                    $this->json_error("호출이 잘못되었습니다. 다시 시도해 주세요.");
                    return;
                }
                $_POST['callQuestionFile'][$k] = $this->security->xss_clean(trim($_POST['callQuestionFile'][$k]));
                $_POST['callExplanFile'][$k] = $this->security->xss_clean(trim($_POST['callExplanFile'][$k]));
            }
        }

        // 조건체크
        if( count($this->input->post('QuestionNO')) != count(array_unique($this->input->post('QuestionNO'))) ) {
            $this->json_error('문항번호가 중복되어 있습니다.');
            return;
        }
        if( $this->input->post('TotalScore') != array_reduce($this->input->post('Scoring'), function ($sum, $v) { $sum += $v; return $sum; }, 0) ) {
            $this->json_error('문항별 배점의 합과 총점이 일치하지 않습니다.');
            return;
        }
        foreach ($this->input->post('QuestionOption') as $k => $v) {
            if( $v != 'J' && !preg_match('/^[1-9,]+$/', $_POST['RightAnswer'][$k]) ) {
                $this->json_error('정답을 선택하세요');
                return;
            }
        }

        $error = false;
        foreach ($this->input->post('QuestionOption') as $k => $v) {
            $count = empty($_POST["RightAnswer"][$k]) ? 0 : count( explode(',', $_POST["RightAnswer"][$k]) );

            switch ($v) {
                case 'S': // 객관식 단일
                    if($count !== 1) $error = true;
                    break;
                case 'M': // 객관식 복수
                    if($count < 2) $error = true;
                    break;
                case 'J': // 주관식
                    if($count !== 0) $error = true;
                    break;
            }
            if($error) {
                $this->json_error("정답갯수가 맞지 않습니다.\n\n객관식(단일): 정답 1개\n객관식(복수): 정답 2개 이상\n주관식:입력X");
                return;
            }
        }

        $result = $this->regExamModel->storeQuestion();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }


    // 정렬변경
    public function sort()
    {
        $sorting = @json_decode($this->input->post('sorting'));
        if(!is_object($sorting)) {
            $this->json_error("입력오류");
            return;
        }
        else {
            $_POST['tmp_key'] = array_keys((array) $sorting);
            $_POST['tmp_val'] = array_values((array) $sorting);
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'tmp_key[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'tmp_val[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        if( count($_POST['tmp_val']) != count(array_unique($_POST['tmp_val'])) ) {
            $this->json_error('문항번호가 중복되어 있습니다.');
            return;
        }

        $result = $this->regExamModel->sort($sorting);
        $this->json_result($result['ret_cd'], '정렬되었습니다.', $result, $result);
    }


    // 문항호출 폼
    public function callIndex()
    {
        $this->load->view('mocktest/reg/exam/questionCall', [
            'method' => 'GET',
        ]);
    }


    // 문항호출
    public function call()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[GET]'],
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_round', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_no', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'nowIdx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'moLink', 'label' => '과목', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption', 'label' => '문제등록옵션', 'rules' => 'trim|in_list[S,M,J]'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->call();
        $this->json_result($result['ret_cd'], '', $result, $result);
    }
}
