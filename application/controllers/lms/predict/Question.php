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
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict' , 'mocktest/mockCommon');
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

        list($data, $count) = $this->predictModel->mainList();

        $this->load->view('predict/question/index', [
            'predictList' => $data,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
            'upImgUrl' => $this->config->item('upload_url_predict', 'predict'),
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
//                'PP.SiteCode' => $this->input->post('search_site_code'),
//                'MB.CateCode' => $this->input->post('search_cateD1'),
//                'MB.Ccd' => $this->input->post('search_cateD2'),
//                'MS.SubjectIdx' => $this->input->post('search_subject'),
//                'EB.ProfIdx' => $this->input->post('search_professor'),
//                'EB.Year' => $this->input->post('search_year'),
//                'EB.RotationNo' => $this->input->post('search_round'),
                'PP.IsUse' => $this->input->post('search_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'PP.PapaerName' => $this->input->post('search_fi', true),
//                    'A.wAdminName' => $this->input->post('search_fi', true),
//                    'SC.CcdName' => $this->input->post('search_fi', true),
//                    'SJ.SubjectName' => $this->input->post('search_fi', true),
//                    'PMS.wProfName' => $this->input->post('search_fi', true),
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

        //합격예측 기본정보호출
        $productList = $this->predictModel->getProductALL();

        if(empty($idx) === true){
            $method = "CREATE";
            $data = array();
            $qData = array();
            $subject = "";
            $PredictIdx = "";
            $filepath = "";
        } else {
            $method = "PUT";

            list($data, $qData) = $this->predictModel->getExamBase($param[0]);
            if (!$data) {
                $this->json_error('데이터 조회에 실패했습니다.');
                return;
            }
            $subject = $data['SubjectCode'];
            $PredictIdx = $data['PredictIdx'];
            $filepath = $this->config->item('upload_url_predict', 'predict');
            $filepath = $filepath.$idx."/";
        }

        $this->load->view('predict/question/question_create', [
            'method' => $method,
            'siteCodeDef' => '',
            'productList' => $productList,
            'subject' => $subject,
            'PredictIdx' => $PredictIdx,
            'data' => $data,
            'qData' => $qData,
            'filepath' => $filepath,
            'isDeny' => !empty($qData) ? true : false

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
            ['field' => 'SubjectCode', 'label' => '시험지명', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TotalScore', 'label' => '총점', 'rules' => 'trim|required|is_natural_no_zero|less_than_equal_to[255]'],
            ['field' => 'IsUse', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'RegistAvgPoint', 'label' => '입력-평균', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'RegistStandard', 'label' => '입력-표준편차', 'rules' => 'trim|required|max_length[50]'],
        ];

        if( $_FILES['QuestionFile']['error'] !== UPLOAD_ERR_OK || $_FILES['QuestionFile']['size'] == 0 ) {
            $rules[] = ['field' => 'QuestionFile', 'label' => '문제통파일', 'rules' => 'required'];
        }

        if ($this->validate($rules) === false) return;

        $result = $this->predictModel->storePaper();
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

        $result = $this->predictModel->updatePaper();
        $this->json_result($result['ret_cd'], '변경되었습니다.', $result, $result);
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
        }
        else {
            $_POST['chapterTotal'] = $Info->chapterTotal;
            $_POST['chapterExist'] = $Info->chapterExist;
            $_POST['chapterDel'] = $Info->chapterDel;
        }

        $rules = [
            ['field' => 'QuestionNO[]', 'label' => '문항번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Scoring[]', 'label' => '배점', 'rules' => 'trim|required|is_natural_no_zero'],
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
        foreach ($this->input->post('RightAnswerTmp') as $k => $v) {
            if( !preg_match('/^[1-9,]+$/', $_POST['RightAnswerTmp'][$k]) ) {
                $this->json_error('정답을 선택하세요');
                return;
            }
        }

        $result = $this->predictModel->storePPQuestion();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
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