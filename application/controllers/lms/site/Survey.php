<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends \app\controllers\BaseController
{
    protected $models = array('site/survey');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('site/survey/index', [

        ]);
    }

    /**
     * 설문 등록/수정
     * @param array $params
     */
    public function eventSurveyCreate($params = [])
    {
        $method = 'POST';

        //설문정보
        //$survey_list = $this->surveyModel->listEventSurvey();

        $data_survey = [];
        $data_question = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $sp_idx = $params[0];

            $data_survey = $this->surveyModel->findSurveyForModify($sp_idx);
            $data_question = $this->surveyModel->listSurveyForQuestion($sp_idx);
        }

        $this->load->view('site/survey/event_survey_create', [
            'method' => $method,
            //'survey_list' => $survey_list,
            'data_survey' => $data_survey,
            'data_question' => $data_question,
        ]);
    }

    /**
     * 설문조사 등록/수정
     */
    public function eventSurveyStore()
    {
        $method = 'add';

        $rules = [
            ['field' => 'sp_title', 'label' => '제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'sp_is_duplicate', 'label' => '중복투표', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'sp_is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'register_start_datm', 'label' => '접수기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'register_end_datm', 'label' => '접수기간종료일자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('sp_idx')) === false) {
            $method = 'modify';
        }

        $result = $this->surveyModel->{$method . 'EventSurvey'}($this->_reqP(null, false));
        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 설문조사 항목 등록/수정 레이어
     * @param array $params
     */
    public function questionCreateModal()
    {
        $method = 'POST';
        $sq_cnt = 25;       // 답변항목 갯수
        $sq_item_cnt = 10;  // 복수형 항목 갯수
        $arr_param = $this->_reqG(null);
        $sp_idx = element('sp_idx', $arr_param);
        $sq_data = element('sq_data', $arr_param);

        if(empty($sp_idx) === true || !is_numeric($sp_idx)){
            show_alert("잘못된 접근 입니다.");
        }

        if(empty($sq_data) === false){
            $method = 'PUT';
        }

        $this->load->view('site/survey/question_create_modal', [
            'method' => $method,
            'sp_idx' => $sp_idx,
            'sq_cnt' => $sq_cnt,
            'sq_item_cnt' => $sq_item_cnt,
            'arr_type' => $this->surveyModel->_selection_type,
            'sq_data' => $sq_data
        ]);
    }

    /**
     * 설문조사 항목 등록/수정
     */
    public function surveyQuestionStore()
    {
        $method = 'add';

        $rules = [
            ['field' => 'SpIdx', 'label' => '설문정보없음', 'rules' => 'trim|required|integer'],
            ['field' => 'sq_title', 'label' => '문항제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'sq_is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'sq_type', 'label' => '답변유형', 'rules' => 'trim|required|in_list[S,M,T,D]'],
            ['field' => 'sq_cnt', 'label' => '항목갯수', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('sq_idx')) === false) {
            $method = 'modify';
        }

        $result = $this->surveyModel->{$method . 'SurveyQuestion'}($this->_reqP(null, false));
        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 설문조사 리스트
     */
    public function eventSurveyList()
    {
        $condition = [];
        $list = [];

        $count = $this->surveyModel->eventSurveyList(true);
        if ($count > 0) {
            $list = $this->surveyModel->eventSurveyList(false, $condition, $this->input->post('length'), $this->input->post('start'), ['SpIdx' => 'desc']);

            foreach ($list as $key => $val){
                $list[$key]['link'] = 'https://www.'.ENVIRONMENT.'.willbes.net/eventSurvey/index/'.$val['SpIdx'];
                $list[$key]['include'] = "프로모션 페이지 URL + /spidx/".$val['SpIdx'];
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 설문조사 항목 삭제
     */
    public function delSurveyQuestion()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'sq_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->surveyModel->removeSurveyQuestion($this->_reqP('sq_idx'));
        $this->json_result($result, '삭제 처리 되었습니다.', $result);
    }

    /**
     * 설문응답 그래프 팝업
     */
    public function surveyGraphPopup()
    {
        $sp_idx = $this->_reqG('sp_idx');
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($sp_idx);
        $question_info = $this->surveyModel->listSurveyForQuestion($sp_idx);

        // 설문 응답 비율 계산
        $data = $this->_mathAnswerSpreadData($question_info,$answer_info);

        $this->load->view('site/survey/survey_graph_popup', [
            'sp_idx' => $sp_idx,
            'data' => $data
        ]);
    }

    /**
     * 설문응답 데이터 팝업
     */
    public function surveyDataPopup()
    {
        $sp_idx = $this->_reqG('sp_idx');
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($sp_idx);
        $question_info = $this->surveyModel->listSurveyForQuestion($sp_idx);

        // 설문 항목 매칭
        foreach ($answer_info as $key => $answer_data){
            $answer_info[$key]['AnswerInfo'] = $this->_matchingQuestionData($question_info,$answer_data['AnswerInfo']);
        }

        $this->load->view('site/survey/survey_data_popup', [
            'sp_idx' => $sp_idx,
            'data' => $answer_info
        ]);
    }

    /**
     * 설문응답 항목 매칭
     * @param $question_info
     * @param $answer_data
     * @return mixed
     */
    private function _matchingQuestionData($question_info=[],$answer_data=[]){
        $data = [];
        $new_question_info = [];

        foreach ($question_info as $key => $val){
            $new_question_info[$val['SqIdx']] = $val;
        }

        foreach ($answer_data as $question_key => $answer){
            $SqTitle = $new_question_info[$question_key]['SqTitle'];
            $SqType = $new_question_info[$question_key]['SqType'];
            foreach ((array)$answer as $key => $val){
                $question_info = $new_question_info[$question_key]['SqJsonData'][$key];
                if($SqType == 'D'){ // 서술형
                    $data[$SqTitle][$key] = $question_info['title'];
                }else if(in_array($SqType,array('M','T'))){ // 선택형(그룹), 복수형
                    $data[$question_info['title']][$key] = $question_info['item'][$val];
                }else{
                    $data[$SqTitle][$key] = $question_info['item'][$val];
                }
            }
        }

        return $data;
    }

    /**
     * 설문응답 비율 계산
     * @param $question_info
     * @param $answer_info
     * @return mixed
     */
    private function _mathAnswerSpreadData($question_info=[],$answer_info=[]){
        $data = [];
        $new_question_info = [];
        $new_answer_info = [];

        foreach ($question_info as $key => $val){
            $new_question_info[$val['SqIdx']] = $val;

            if($val['SqType'] == 'D'){ // 서술형
                $new_answer_info[$val['SqIdx']] = 'D';
            }else{
                foreach ($val['SqJsonData'] as $answer_key => $answer){
                    foreach ($answer['item'] as $k => $v){
                        $new_answer_info[$val['SqIdx']][$answer_key][$k] = 0; // 초기화
                    }
                }
            }
        }

        // 카운트
        foreach ($answer_info as $key => $val){
            foreach ($val['AnswerInfo'] as $question_key => $answer){
                if($new_answer_info[$question_key] != 'D'){ // 서술형 제외
                    foreach ($answer as $k => $v){
                        $new_answer_info[$question_key][$k][$v] += 1;
                    }
                }
            }
        }

        // 데이타 매칭
        foreach ($new_answer_info as $question_key => $answer){
            $SqTitle = $new_question_info[$question_key]['SqTitle'];
            $SqType = $new_question_info[$question_key]['SqType'];

            if($SqType != 'D'){ // 서술형 제외
                foreach ((array)$answer as $key => $val){
                    $question_info = $new_question_info[$question_key]['SqJsonData'][$key];
                    $item_sum = array_sum($val);

                    if($item_sum > 0){
                        foreach ($val as $k => $v){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $SqTitle = $question_info['title'];
                            }
                            $data[$SqTitle][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                        }
                    }
                }
            }
        }

        return $data;
    }

}
