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
     * 설문통계
     */
    public function surveyStatistics()
    {
        $condition = ['EQ' => ['A.IsStatus' => 'Y']];

        $statistics_title_list = $this->surveyModel->listSurveyStatisticsTitle();
        $count = $this->surveyModel->listAllSurveyStatistics(true, $condition);

        $this->load->view('site/survey/survey_statistics', [
            'count' => $count,
            'statistics_title_list' => $statistics_title_list,
        ]);
    }

    /**
     * old 설문통계 데이타 등록 (한번만 실행)
     */
    public function runOnce(){
        $input_data = [];
        $old_answer_data = [];
        $new_answer_info = [];

        // 설문조사
        $old_survey_info = $this->surveyModel->listOldSurvey();
        foreach ($old_survey_info as $key => $val){

            // 설문결과
            $old_answer_info = $this->surveyModel->listOldSurveyAnswer($val['SpIdx']);
            if(empty($old_answer_info) === false){


                // 초기화
                foreach ($old_answer_info as $answer_val){
                    $new_answer_info[$answer_val['SqIdx']] = $answer_val;
                    for($i=1;$i<25;$i++){
                        if(empty(trim($answer_val['Comment'.$i])) === false){
                            $old_answer_data[$answer_val['SqIdx']][$i] = 0;
                        }
                    }
                }

                // 결과 카운트
                foreach ($old_answer_info as $answer_val){
                    $old_answer_data[$answer_val['SqIdx']][$answer_val['Answer']] += 1;
                }

                // 통계 저장 배열
                foreach ($old_answer_data as $answer_key => $answer_val){
                    $item_sum = array_sum($answer_val);

                    if($item_sum > 0){
                        foreach ($answer_val as $k => $v){
                            $input_data[$new_answer_info[$answer_key]['SqTitle']][$new_answer_info[$answer_key]['Comment'.$k]]['spread'] = round(($v / $item_sum) * 100, 0);
                            $input_data[$new_answer_info[$answer_key]['SqTitle']][$new_answer_info[$answer_key]['Comment'.$k]]['count'] = $v;
                        }
                    }
                }

                $result = $this->surveyModel->addOldSurveyData($input_data,$val);

                if($result !== true){
                    show_alert('업데이트 실패했습니다.');
                    return;
                }
            }
        }

        show_alert('업데이트 되었습니다.','back');
        return;
    }

    /**
     * 설문통계 리스트
     */
    public function surveyStatisticsList()
    {
        $list = [];
        $condition = ['EQ' => ['A.IsStatus' => 'Y']];

        $count = $this->surveyModel->listAllSurveyStatistics(true, $condition);
        if ($count > 0) {
            $list = $this->surveyModel->listAllSurveyStatistics(false, $condition, $this->input->post('length'), $this->input->post('start'), ['A.SubIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 설문 등록/수정
     * @param array $params
     */
    public function eventSurveyCreate($params = [])
    {
        $method = 'POST';
        $survey_data = [];
        $question_data = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $ss_idx = $params[0];

            $survey_data = $this->surveyModel->findSurveyForModify($ss_idx);
            $question_data = $this->surveyModel->listSurveyForQuestion($ss_idx);
        }

        $this->load->view('site/survey/event_survey_create', [
            'method' => $method,
            'survey_data' => $survey_data,
            'question_data' => $question_data,
        ]);
    }

    /**
     * 설문 등록/수정
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

        if (empty($this->_reqP('ss_idx')) === false) {
            $method = 'modify';
        }

        $result = $this->surveyModel->{$method . 'EventSurvey'}($this->_reqP(null, false));
        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 정렬순서, 사용유무 적용
     */
    public function storeUseOrderNum()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->surveyModel->modifyQuestionUseOrderNum(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '적용 되었습니다.', $result);
    }

    /**
     * 설문조사 문항 등록/수정 레이어
     */
    public function questionCreateModal()
    {
        $method = 'POST';
        $sq_cnt = 25;       // 답변항목 갯수
        $sq_item_cnt = 10;  // 복수형 항목 갯수
        $arr_param = $this->_reqG(null);
        $ss_idx = element('ss_idx', $arr_param);
        $ssq_idx = element('ssq_idx', $arr_param);
        $series_idx = element('series_idx', $arr_param);
        $series_data = element('series_data', $arr_param,[]);
        $sq_data = [];

        if(empty($ss_idx) === true || !is_numeric($ss_idx)){
            show_alert("잘못된 접근 입니다.");
        }

        if(empty($ssq_idx) === false){
            $method = 'PUT';
            $sq_data = $this->surveyModel->findQuestionForModify($ssq_idx);
            $sq_data['SqJsonData']= json_decode($sq_data['SqJsonData'],true);
            $SeriesData = element('SeriesData',$sq_data,[]);
            $sq_data['SeriesData']= json_decode($SeriesData,true);
        }

        $this->load->view('site/survey/question_create_modal', [
            'method' => $method,
            'ss_idx' => $ss_idx,
            'sq_cnt' => $sq_cnt,
            'sq_item_cnt' => $sq_item_cnt,
            'arr_type' => $this->surveyModel->_selection_type,
            'sq_data' => $sq_data,
            'series_idx' => $series_idx,
            'series_data' => $series_data
        ]);
    }

    /**
     * 설문조사 문항 등록/수정
     */
    public function surveyQuestionStore()
    {
        $method = 'add';

        $rules = [
            ['field' => 'SsIdx', 'label' => '설문정보없음', 'rules' => 'trim|required|integer'],
            ['field' => 'sq_title', 'label' => '문항제목', 'rules' => 'trim|required|max_length[100]'],
            ['field' => 'sq_is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'sq_type', 'label' => '답변유형', 'rules' => 'trim|required|in_list[S,M,T,D]'],
            ['field' => 'sq_cnt', 'label' => '항목갯수', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('ssq_idx')) === false) {
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
        $list = [];
        $condition = ['EQ' => ['A.IsStatus' => 'Y']];

        $count = $this->surveyModel->listAllSurvey(true,$condition);
        if ($count > 0) {
            $list = $this->surveyModel->listAllSurvey(false, $condition, $this->input->post('length'), $this->input->post('start'), ['SsIdx' => 'desc']);

            foreach ($list as $key => $val){
                $list[$key]['link'] = 'https://www.'.ENVIRONMENT.'.willbes.net/eventSurvey/index/'.$val['SsIdx'];
                $list[$key]['include'] = "프로모션 페이지 URL + /spidx /".$val['SsIdx'];
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 설문조사 문항 삭제
     */
    public function delSurveyQuestion()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'ssq_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->surveyModel->removeSurveyQuestion($this->_reqP('ssq_idx'));
        $this->json_result($result, '삭제 처리 되었습니다.', $result);
    }

    /**
     * 설문응답 그래프 팝업
     */
    public function surveyGraphPopup()
    {
        $ss_idx = $this->_reqG('ss_idx');
        
        // 설문응답
        $answer_info = $this->surveyModel->listAnswerGraphData($ss_idx);
        
        // 설문문항
        $question_data = $this->surveyModel->listSurveyForQuestion($ss_idx);
        
        // 직렬
        $series_data = $this->surveyModel->findSurveyBySeries($ss_idx);

        // 설문 응답 비율 계산
        if(empty($series_data) === false){
            $answer_data = $this->_matchingSeriesData($answer_info,$series_data);
            $data = $this->_mathSeriesSpreadData($question_data,$answer_data,array_value_first($series_data));
        }else{
            $data[0] = $this->_mathAnswerSpreadData($question_data,$answer_info);
        }


        $this->load->view('site/survey/survey_graph_popup', [
            'ss_idx' => $ss_idx,
            'data' => $data,
            'is_series' => empty($series_data) ? 'N' : 'Y',
        ]);
    }

    /**
     * 설문응답 데이터 팝업
     */
    public function surveyDataPopup()
    {
        $ss_idx = $this->_reqG('ss_idx');

        // 설문응답
        $answer_data = $this->surveyModel->listAnswerPopupData($ss_idx);

        // 설문문항
        $question_data = $this->surveyModel->listSurveyForQuestion($ss_idx);

        // 설문 항목 매칭
        foreach ($answer_data as $key => $val){
            $answer_data[$key]['AnswerInfo'] = $this->_matchingQuestionData($question_data,$val['AnswerInfo']);
        }

        $this->load->view('site/survey/survey_data_popup', [
            'ss_idx' => $ss_idx,
            'data' => $answer_data
        ]);
    }

    /**
     * 설문응답 문항 매칭
     * @param $question_data
     * @param $answer_data
     * @return mixed
     */
    private function _matchingQuestionData($question_data=[],$answer_data=[]){
        $data = [];
        $new_question_info = [];

        foreach ($question_data as $key => $val){
            $new_question_info[$val['SsqIdx']] = $val;
        }

        foreach ($answer_data as $question_key => $answer){
            $SqTitle = $new_question_info[$question_key]['SqTitle'];
            $SqType = $new_question_info[$question_key]['SqType'];
            $typeName = $this->surveyModel->_selection_type[$SqType];

            foreach ((array)$answer as $key => $val){
                $question_data = $new_question_info[$question_key]['SqJsonData'][$key];

                if($SqType == 'D'){ // 서술형
                    $question_data['item'][$val] = $val;
                }else if(in_array($SqType,array('M','T'))){ // 선택형(그룹), 복수형
                    $typeName = $question_data['title'];
                }

                $data[$SqTitle][$SqType][$typeName] = $question_data['item'][$val];
            }
        }

        return $data;
    }

    /**
     * 설문응답 선택 문항 비율 계산
     * @param $question_data
     * @param $answer_info
     * @return mixed
     */
    private function _mathAnswerSpreadData($question_data=[],$answer_info=[]){
        // 선택 문항 초기화
        list($new_question_data,$reset_data) = $this->_resetSurveyRecords($question_data);

        // 선택 문항 카운트
        $answer_data = $this->_countSurveyRecords($answer_info,$reset_data);

        return $this->_matchingSurveyData($answer_data,$new_question_data);
    }

    /**
     * 설문조사 문항 초기화
     * @param $question_data
     * @return mixed
     */
    private function _resetSurveyRecords($question_data=[])
    {
        $new_question_data = [];
        $reset_data = [];
        foreach ($question_data as $key => $val){
            $new_question_data[$val['SsqIdx']] = $val;

            if($val['SqType'] == 'D'){ // 서술형
                $reset_data[$val['SsqIdx']] = 'D';
            }else{
                foreach ($val['SqJsonData'] as $answer_key => $answer){
                    foreach ($answer['item'] as $k => $v){
                        $reset_data[$val['SsqIdx']][$answer_key][$k] = 0;
                    }
                }
            }
        }

        return [$new_question_data,$reset_data];
    }

    /**
     * 설문조사 선택 문항 카운트
     * @param $answer_data
     * @param $reset_data
     * @return mixed
     */
    private function _countSurveyRecords($answer_data=[],$reset_data=[])
    {
        foreach ($answer_data as $key => $val){
            foreach ($val['AnswerInfo'] as $question_key => $answer){
                if($reset_data[$question_key] != 'D'){ // 서술형 제외
                    foreach ($answer as $k => $v){
                        $reset_data[$question_key][$k][$v] += 1;
                    }
                }
            }
        }

        return $reset_data;
    }

    /**
     * 설문조사 데이타 매칭
     * @param $answer_data
     * @param $new_question_data
     * @return mixed
     */
    private function _matchingSurveyData($answer_data=[],$new_question_data=[])
    {
        $data = [];
        foreach ($answer_data as $question_key => $answer){
            $SqType = $new_question_data[$question_key]['SqType'];
            $SqTitle = $new_question_data[$question_key]['SqTitle'];
            if($SqType != 'D'){ // 서술형 제외
                foreach ((array)$answer as $key => $val){
                    $question_info = $new_question_data[$question_key]['SqJsonData'][$key];
                    $item_sum = array_sum($val);

                    if($item_sum > 0){
                        foreach ($val as $k => $v){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $data[$SqTitle][$question_info['title']][$question_info['item'][$k]]['spread'] = round(($v / $item_sum) * 100, 0);
                                $data[$SqTitle][$question_info['title']][$question_info['item'][$k]]['count'] = $v;
                            }else{
                                $data[$SqTitle][$SqType][$question_info['item'][$k]]['spread'] = round(($v / $item_sum) * 100, 0);
                                $data[$SqTitle][$SqType][$question_info['item'][$k]]['count'] = $v;
                            }
                        }
                    }
                }
            }
        }

        return $data;
    }

    /**
     * 직렬 데이타 매칭
     * @param $answer_info
     * @param $series_data
     * @return mixed
     */
    private function _matchingSeriesData($answer_info=[],$series_data=[])
    {
        $data = [];
        foreach ($answer_info as $key => $val){
            foreach ($val['AnswerInfo'] as $question_key => $answer){
                $arr_series = element($question_key,$series_data);
                if(empty($arr_series) === false){
                    foreach ($answer as $k => $v){
                        unset($val['AnswerInfo'][$question_key]);
                        $data[$v][] = $val['AnswerInfo'];
                    }
                }
            }
        }

        return $data;
    }

    /**
     * 직렬 선택 문항 비율 계산
     * @param $question_data
     * @param $answer_data
     * @param $series_info
     * @return mixed
     */
    private function _mathSeriesSpreadData($question_data=[],$answer_data=[],$series_info=[])
    {
        // 선택 문항 초기화
        list($new_question_data,$reset_data) = $this->_resetSurveyRecords($question_data);

        // 선택 문항 카운트
        $series_data = $this->_countSeriesRecords($answer_data,$reset_data);

        return $this->_matchingSurveySeriesData($series_data,$new_question_data,$series_info);
    }

    /**
     * 직렬 선택 문항 카운트
     * @param $answer_data
     * @param $reset_data
     * @return mixed
     */
    private function _countSeriesRecords($answer_data=[],$reset_data=[])
    {
        $series_data = [];
        foreach ($answer_data as $series_key => $series_val){
            foreach ($series_val as $key => $val) {
                foreach ($val as $question_key => $answer) {
                    foreach ($answer as $k => $v){
                        if($reset_data[$question_key] == 'D'){ // 서술형 제외
                            unset($answer_data[$series_key][$key][$question_key]);
                        }else{
                            $series_data[$series_key][$question_key][$k] = $reset_data[$question_key][$k];
                        }
                    }
                }
            }
        }

        foreach ($answer_data as $series_key => $series_val){
            foreach ($series_val as $key => $val) {
                foreach ($val as $question_key => $answer) {
                    ksort($series_data[$series_key][$question_key]);
                    foreach ($answer as $k => $v) {
                        $series_data[$series_key][$question_key][$k][$v] += 1;
                    }
                }
            }
        }

        return $series_data;
    }

    /**
     * 직렬 데이타 매칭
     * @param $series_data
     * @param $new_question_data
     * @param $series_info
     * @return mixed
     */
    private function _matchingSurveySeriesData($series_data=[],$new_question_data=[],$series_info=[])
    {
        $survey_data = [];
        foreach ($series_data as $series_key => $series_val){
            foreach ($series_val as $question_key => $answer) {
                $SqType = $new_question_data[$question_key]['SqType'];
                $SqTitle = $new_question_data[$question_key]['SqTitle'];

                foreach ($answer as $answer_key => $answer_val) {
                    $question_info = $new_question_data[$question_key]['SqJsonData'][$answer_key];
                    $item_sum = array_sum($answer_val);

                    if($item_sum > 0){
                        foreach ($answer_val as $k => $v){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $survey_data[$series_info[$series_key]][$SqTitle][$question_info['title']][$question_info['item'][$k]]['spread'] = round(($v / $item_sum) * 100, 0);
                                $survey_data[$series_info[$series_key]][$SqTitle][$question_info['title']][$question_info['item'][$k]]['count'] = $v;
                            }else{
                                $survey_data[$series_info[$series_key]][$SqTitle][$SqType][$question_info['item'][$k]]['spread'] = round(($v / $item_sum) * 100, 0);
                                $survey_data[$series_info[$series_key]][$SqTitle][$SqType][$question_info['item'][$k]]['count'] = $v;
                            }
                        }
                    }
                }
            }
        }

        return $survey_data;
    }

}
