<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseEventSurvey extends \app\controllers\FrontController
{
    protected $models = array('eventsurvey/survey');
    protected $helpers = array();

    // 중복투표
    private $_duplicate_type = [
        '0' => 'Y',     // 가능
        '1' => 'N'      // 불가능
    ];

    //직렬별 선택과목 갯수
    private $_pick_sbj = [
        'list' => ['10'=>'2'],  // [SpIdx => 입력 갯수] 디폴트 3개
        'default' => '3',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $sp_idx = $params[0];
        if(empty($sp_idx) === true || !is_numeric($sp_idx)){
            show_alert('잘못된 접근 입니다.','close');
            return;
        }

        $data_survey = $this->surveyModel->findSurvey($sp_idx);
        if(empty($data_survey) === true){
            show_alert('설문 기간이 아닙니다.','close');
            return;
        }

        if($data_survey['SpIsDuplicate'] == $this->_duplicate_type[1]){
            $count = $this->surveyModel->findSurveyAnswer($sp_idx);
            if($count > 0){
                show_alert('이미 설문에 참여하셨습니다.','close');
                return;
            }
        }

        $data_question = $this->surveyModel->listSurveyForQuestion($sp_idx);
        if(empty($data_question) === true){
            show_alert('등록되지 않은 설문입니다.','close');
            return;
        }

        //직렬별 선택과목 갯수
        $pick_cnt = element($data_survey['SpIdx'],$this->_pick_sbj['list'],$this->_pick_sbj['default']);

        $total_cnt = 0;
        foreach ($data_question as $key => $val){
            if($val['SqType'] != 'T'){ // 복수형은 직렬별 선택과목 갯수 기준
                $total_cnt += count($data_question[$key]['SqJsonData']);
            }
        }
        $total_cnt += $pick_cnt; // 복수형 갯수 추가

        $view_file = 'willbes/pc/eventsurvey/index';
        $this->load->view($view_file, [
            'data_survey' => $data_survey,
            'data_question' => $data_question,
            'pick_cnt' => $pick_cnt,
            'total_cnt' => $total_cnt
        ], false);
    }

    public function graph($params = [])
    {
        $sp_idx = $params[0];
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($sp_idx);
        $question_info = $this->surveyModel->listSurveyForQuestion($sp_idx);

        echo '<pre>';
        print_r($answer_info);
        exit;


        // 설문 응답 비율 계산
        $data = $this->_mathAnswerSpreadData($question_info,$answer_info);

        $view_file = 'willbes/pc/eventsurvey/graph';
        $this->load->view($view_file, [
            'sp_idx' => $sp_idx,
            'data' => $data
        ],false);
    }

    public function store()
    {
        $sp_idx = $this->_reqP('sp_idx');
        $total_cnt = $this->_reqP('total_cnt');
        $input = element('s_type', $this->_reqP(null, false));

        if(empty($sp_idx) || empty($total_cnt)){
            $this->json_error('잘못된 접근 입니다.');
            return;
        }

        $inputData = $this->_setInputData($input,$total_cnt);
        if(empty($inputData) === true){
            $this->json_error('모든 문항을 입력해 주세요.');
            return;
        }

        $result = $this->surveyModel->storeSurvey($inputData,$sp_idx);
        $this->json_result($result, '저장 되었습니다.', $result, $result);
    }

    /**
     * 저장 데이터 셋팅
     * @param $input
     * @param integer $total_cnt
     * @return bool|mixed
     */
    private function _setInputData($input,$total_cnt){
        $ck_cnt = 0;
        foreach ($input as $data){
            $ck_cnt += count($data);
        }

        if($ck_cnt != $total_cnt){
            return false;
        }

        return $input;
    }

}

