<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict', 'predict/predictCode' , 'mocktest/mockCommon');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();

        $this->applyType = $this->config->item('sysCode_applyType', 'mock');
        $this->applyArea1 = $this->config->item('sysCode_applyArea1', 'mock');
        $this->applyArea2 = $this->config->item('sysCode_applyArea2', 'mock');
        $this->addPoint = $this->config->item('sysCode_addPoint', 'mock');
        $this->applyType_on = $this->config->item('sysCode_applyType_on', 'mock');
        $this->applyType_off = $this->config->item('sysCode_applyType_off', 'mock');
        $this->acceptStatus = $this->config->item('sysCode_acceptStatus', 'mock');

        // 공통코드 셋팅
        //$this->_groupCcd = $this->regGoodsModel->_groupCcd;
    }

    /**
     * 메인
     */
    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $condition = [
            'EQ' => [
                'PP.IsUse' => 'Y'
            ]
        ];
        list($data, $count) = $this->predictModel->mainList($condition);

        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart();

        //합격예측별 직렬별 과목 전체 리스트
        $arr_subject_list = $this->predictCodeModel->getPredictForSubjectAll();

        $this->load->view('predict/question/index', [
            'default_file_path' => $this->predictModel->upload_url_predict,
            'predictList' => $data,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'arr_subject_list' => $arr_subject_list,
            'upImgUrl' => $this->config->item('upload_url_predict', 'predict'),
        ]);
    }

    /**
     * 리스트
     */
    public function list()
    {
        $condition = [
            'EQ' => [
                'PD.SiteCode' => $this->input->post('search_site_code'),
                'PD.PredictIdx' => $this->input->post('search_PredictIdx'),
                'PP.TakeMockPart' => $this->input->post('search_take_mock_part'),
                'PP.SubjectCode' => $this->input->post('search_subject_code'),
                'PP.IsUse' => $this->input->post('search_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'PP.PaperName' => $this->input->post('search_fi', true),
                ]
            ],
        ];
        list($data, $count) = $this->predictModel->QuestionMainList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 등록폼
     */
    public function create($param)
    {
        if($param){
            $idx = $param[0];
        } else {
            $idx = '0';
        }

        $search_site_code = get_var($this->_reqG('search_site_code'), array_get(json_decode(base64_decode($this->_reqG('q')), true), 'search_site_code'));
        if (empty($search_site_code) === true) {
            $search_site_code = '2001';
        }

        //합격예측 기본정보호출
        $productList = $this->predictModel->getProductALL();

        //직렬리스트
        $arr_take_mock_part_list = $this->predictCodeModel->getPredictForTakeMockPart();

        //합격예측별 직렬별 과목 전체 리스트
        $arr_subject_list = $this->predictCodeModel->getPredictForSubjectAll();

        $data = null;
        if(empty($idx) === true){
            $method = "POST";
            $subject = "";
            $PredictIdx = "";
            $filepath = "";
            $arr_question_type_count = null;
        } else {
            $method = "PUT";

            $data = $this->predictModel->getExamBase($param[0]);
            if (!$data) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
            $subject = $data['SubjectCode'];
            $PredictIdx = $data['PredictIdx'];
            $filepath = $this->config->item('upload_url_predict', 'predict');
            $filepath = $filepath.$idx."/";

            //문항정보 카운트수
            $arr_question_type_count = $this->predictModel->countExamQuestions($idx);
        }

        $this->load->view('predict/question/question_create', [
            'search_site_code' => $search_site_code,
            'method' => $method,
            'siteCodeDef' => '',
            'productList' => $productList,
            'arr_take_mock_part_list' => $arr_take_mock_part_list,
            'arr_subject_list' => $arr_subject_list,
            'subject' => $subject,
            'PredictIdx' => $PredictIdx,
            'data' => $data,
            'filepath' => $filepath,
            'arr_question_type_count' => $arr_question_type_count,
            'isDeny' => (empty($arr_question_type_count['QuestionType1']) === true && empty($arr_question_type_count['QuestionType2']) === true) ? false : true

        ]);
    }

    /**
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        $rules = [
            ['field' => 'PaperName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'PredictIdx', 'label' => '합격예측명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'take_mock_part', 'label' => '직렬', 'rules' => 'trim|required|integer'],
            ['field' => 'SubjectCode', 'label' => '시험지명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'RegistAvgPoint', 'label' => '입력-평균', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'RegistStandard', 'label' => '입력-표준편차', 'rules' => 'trim|required|max_length[50]'],
        ];

        /*if( $_FILES['QuestionFile']['error'] !== UPLOAD_ERR_OK || $_FILES['QuestionFile']['size'] == 0 ) {
            $rules[] = ['field' => 'QuestionFile', 'label' => '문제통파일', 'rules' => 'required'];
        }*/

        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->storePaper($this->_reqP(null));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'PaperName', 'label' => '과목문제지명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'PredictIdx', 'label' => '합격예측명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'take_mock_part', 'label' => '직렬', 'rules' => 'trim|required|integer'],
            ['field' => 'SubjectCode', 'label' => '시험지명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'RegistAvgPoint', 'label' => '입력-평균', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'RegistStandard', 'label' => '입력-표준편차', 'rules' => 'trim|required|max_length[50]'],
        ];
        if(!$this->input->post('isDeny')) {
            $rules[] = ['field' => 'AnswerNum', 'label' => '보기갯수', 'rules' => 'trim|required|is_natural_no_zero'];
            $rules[] = ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'];
        }
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->updatePaper($this->_reqP(null));
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
    }

    /**
     * 문제문항리스트 모달팝업
     */
    public function questionListModal()
    {
        if (empty($this->_reqG('pp_idx')) === true || empty($this->_reqG('question_type')) === true || empty($this->_reqG('total_score')) === true) {
            show_error('잘못된 접근입니다.');
        }

        $method = 'PUT';
        $pp_idx = $this->_reqG('pp_idx');
        $question_type = $this->_reqG('question_type');
        $total_score = $this->_reqG('total_score');

        //문항정보
        $question_data = $this->predictModel->listExamQuestions(['EQ' => ['PQ.PpIdx' => $pp_idx,'PQ.QuestionType' => $question_type,'PQ.IsStatus' => 'Y']]);

        $this->load->view('predict/question/question_modal', [
            'method' => $method
            ,'pp_idx' => $pp_idx
            ,'question_type' => $question_type
            ,'total_score' => $total_score
            ,'question_data' => $question_data
        ]);
    }

    /**
     * 문항정보 등록,수정
     */
    public function storeQuestion()
    {
        $Info = @json_decode($this->input->post('Info'));
        if(!is_object($Info) || !isset($Info->chapterTotal) || !isset($Info->chapterExist) || !isset($Info->chapterDel)) {
            $this->json_error("입력오류");
            return;
        } else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'QuestionNO[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Scoring[]', 'label' => '배점', 'rules' => 'trim|required'],
            ['field' => 'idx', 'label' => 'IDX', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],

            ['field' => 'chapterTotal[]', 'label' => 'tIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterExist[]', 'label' => 'eIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'chapterDel[]', 'label' => 'dIDX', 'rules' => 'trim|is_natural_no_zero'],
            ['field' => 'regKind[]', 'label' => 'Call등록타입', 'rules' => 'trim|in_list[call]'],
            ['field' => 'callIdx[]', 'label' => 'CallIdx', 'rules' => 'trim|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        // 조건체크
        if( count($this->input->post('QuestionNO')) != count(array_unique($this->input->post('QuestionNO'))) ) {
            $this->json_error('문항번호가 중복되어 있습니다.');
            return;
        }
        if( $this->input->post('TotalScore') != array_reduce($this->input->post('Scoring'), function ($sum, $v) { $sum += $v; return $sum; }, 0) ) {
            $this->json_error('문항별 배점의 합과 총점이 일치하지 않습니다.');
            return;
        }
        //print_r($_POST);
        /*foreach ($this->input->post('RightAnswerTmp') as $k => $v) {
            if( !preg_match('/^[1-9,]+$/', $_POST['RightAnswerTmp'][$k]) ) {
                $this->json_error('정답을 선택하세요');
                return;
            }
        }*/

        $result = $this->predictModel->storePPQuestion();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 문항 전체 삭제
     */
    public function deleteQuestion()
    {
        $rules = [
            ['field' => 'idx', 'label' => '과목식별자', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'question_type', 'label' => '문제유형', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->deleteQuestion($this->_reqP('idx'), $this->_reqP('question_type'));
        $this->json_result($result, '삭제되었습니다.', $result);
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

        $result = $this->predictModel->copyData($this->input->post('idx'));
        $this->json_result($result['ret_cd'], '복사되었습니다.', $result, $result);
    }

    /**
     * 영역선택 ajax
     * @return object|string
     */
    public function getSerialAjax()
    {

        $GroupCcd = $this->_req("GroupCcd");

        $list = $this->predictModel->getSerial($GroupCcd);

        return $this->response([
            'data' => $list
        ]);

    }

    public function getSubjectAjax(){
        $PredictIdx = $this->_req("PredictIdx");
        $list = $this->predictModel->getSubject($PredictIdx);
        return $this->response([
            'data' => $list
        ]);
    }


}