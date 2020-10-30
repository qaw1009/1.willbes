<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Exam extends BaseMocktest
{
    protected $temp_models = array('common/searchProfessor', 'mocktestNew/regExam');
    protected $helpers = array('download');

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
                'MP.IsStatus' => 'Y',
                'MP.SiteCode' => $this->_reqP('search_site_code'),
                'MB.CateCode' => $this->_reqP('search_cateD1'),
                'MB.Ccd' => $this->_reqP('search_cateD2'),
                'MS.SubjectIdx' => $this->_reqP('search_subject'),
                'MP.ProfIdx' => $this->_reqP('search_professor'),
                'MP.Year' => $this->_reqP('search_year'),
                'MP.RotationNo' => $this->_reqP('search_round'),
                'MP.IsUse' => $this->_reqP('search_use'),
                'MS.SubjectType' => $this->_reqP('search_suType'),
            ],
            'ORG' => [
                'LKB' => [
                    'MP.PapaerName' => $this->_reqP('search_fi', true),
                    'A.wAdminName' => $this->_reqP('search_fi', true),
                    'SJ.SubjectName' => $this->_reqP('search_fi', true),
                    'PMS.wProfName' => $this->_reqP('search_fi', true),
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

    /**
     * 데이터 복사
     */
    public function copyData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->copyData($this->input->post('idx'));
        $this->json_result($result, '복사되었습니다.', $result);
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
            'isDeny' => empty($question_data) === false ? true : false,  // 개별 문제가 등록된 경우 카테고리, 문제등록옵션, 총점 변경 불가
        ]);
    }

    /**
     * 문제지 저장/수정
     */
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
            if(empty($this->_reqP('isDeny')) === true) {
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

    /**
     * 문제항목 저장/수정
     */
    public function storeQuestion()
    {
        $Info = json_decode($this->_reqP('Info'));
        if(is_object($Info) === false || isset($Info->chapterTotal) === false || isset($Info->chapterExist) === false || isset($Info->chapterDel) === false) {
            $this->json_error("입력오류");
            return;
        } else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'QuestionNO[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'MalIdx[]', 'label' => '문제영역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'QuestionOption[]', 'label' => '문제등록옵션', 'rules' => 'trim|required|in_list[S,M,J]'],
            ['field' => 'Scoring[]', 'label' => '배점', 'rules' => 'trim|required|numeric'],
            ['field' => 'Difficulty[]', 'label' => '난이도', 'rules' => 'trim|required|in_list[T,M,B]'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|numeric|less_than_equal_to[255]'],
            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'regKind[]', 'label' => 'Call등록타입', 'rules' => 'trim|in_list[call]'],
            ['field' => 'callIdx[]', 'label' => 'CallIdx', 'rules' => 'trim|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        // 조건체크
        if( count($this->_reqP('QuestionNO')) != count(array_unique($this->_reqP('QuestionNO'))) ) {
            $this->json_error('문항번호가 중복되어 있습니다.');
            return;
        }
        if( $this->_reqP('TotalScore') != array_reduce($this->_reqP('Scoring'), function ($sum, $v) { $sum += $v; return $sum; }, 0) ) {
            $this->json_error('문항별 배점의 합과 총점이 일치하지 않습니다.');
            return;
        }
        foreach ($this->_reqP('QuestionOption') as $k => $v) {
            if( $v != 'J' && !preg_match('/^[1-9,]+$/', $this->_reqP('RightAnswer')[$k]) ) {
                $this->json_error('정답을 선택하세요');
                return;
            }
        }

        $error = false;
        foreach ($this->_reqP('QuestionOption') as $k => $v) {
            $count = empty($this->_reqP("RightAnswer")[$k]) ? 0 : count(explode(',', $this->_reqP("RightAnswer")[$k]));
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
            if($error === true) {
                $this->json_error("정답갯수가 맞지 않습니다.\n\n객관식(단일): 정답 1개\n객관식(복수): 정답 2개 이상\n주관식:입력X");
                return;
            }
        }

        $result = $this->regExamModel->storeQuestion($this->_reqP(null));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 문항호출 폼
     */
    public function callIndex()
    {
        $this->load->view('mocktestNew/base/exam/questionCall', [
            'method' => 'GET',
        ]);
    }

    public function callData()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'siteCode', 'label' => '사이트', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_year', 'label' => '연도', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_round', 'label' => '회차', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'qu_no', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'nowIdx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'area_code', 'label' => '문제영역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'ProfIdx', 'label' => '교수', 'rules' => 'trim|required|is_natural_no_zero'],
            /*['field' => 'QuestionOption', 'label' => '문제등록옵션', 'rules' => 'trim|in_list[S,M,J]'],*/
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->callData($this->_reqP(null));
        $this->json_result($result['ret_cd'], '', $result, $result);
    }

    /**
     * 정렬변경
     */
    public function sort()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'sorting', 'label' => '문항정보', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->regExamModel->sort($this->_reqP('sorting'));
        $this->json_result($result, '정렬되었습니다.', $result);
    }

    /**
     * 과목조회
     */
    public function searchExam()
    {
        $arr_site_code = $this->getSiteCode();
        $def_site_code = $this->_reqG('siteCode');
        $cateD1Def = $this->_reqG('cateD1');
        $suType = $this->_reqG('suType');

        $arr_base['cateD1'] = $this->getCategoryArray($def_site_code);
        $arr_base['cateD2'] = $this->getMockKind(false);
        $arr_base['subject'] = $this->getSubjectArray();

        $this->load->view('mocktestNew/base/exam/search_mockExam_model', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'cateD1Def' => $cateD1Def,
            'suType' => $suType,
            'arr_base' => $arr_base,
            'professor' => $this->searchProfessorModel->professorList('', '', '', false),
        ]);
    }

    /**
     * 파일 다운로드
     */
    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }
}