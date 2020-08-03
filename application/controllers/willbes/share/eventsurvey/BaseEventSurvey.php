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

        // 응시과목 선택 갯수,전체 항목 갯수
        list($subject_cnt,$total_cnt) = $this->_recordsTotalCount($data_question);

        $view_file = 'willbes/pc/eventsurvey/index';
        $this->load->view($view_file, [
            'data_survey' => $data_survey,
            'data_question' => $data_question,
            'subject_cnt' => $subject_cnt,
            'total_cnt' => $total_cnt
        ], false);
    }

    public function graph($params = [])
    {
        $sp_idx = $params[0];
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($sp_idx);
        $question_info = $this->surveyModel->listSurveyForQuestion($sp_idx);

        // 설문 응답 비율 계산
        list($survey_title,$survey_data) = $this->_mathAnswerSpreadData($question_info,$answer_info);

        $view_file = 'willbes/pc/eventsurvey/graph';
        $this->load->view($view_file, [
            'SpIdx' => $sp_idx,
            'survey_title' => $survey_title,
            'survey_data' => $survey_data
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

    public function totalgraph()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $spidx1 = element('spidx1', $arr_input);    // 이전 설문조사
        $spidx2 = element('spidx2', $arr_input);    // 진행 설문조사

        // 1. 지역별 현황
        // 직렬코드 조회
        $arr_serial_ccd = array_pluck($this->surveyModel->getSerial(0), 'CcdName', 'Ccd');

        // 합격예측 직렬 데이터 조회
        $arr_predict_mock_part = explode(',', element('MockPart', $this->surveyModel->findPredictData(['EQ' => ['PredictIdx' => $PredictIdx]], 'MockPart'), ''));

        // 합격예측 직렬 데이터 가공
        $serialList = array_filter_keys($arr_serial_ccd, $arr_predict_mock_part);

        // 지역별 응시 데이터 조회 (line)
        $arealist = $this->surveyModel->areaList($PredictIdx);

        $dtSet = array();
        foreach ($arealist as $key => $val){
            $Areaname = $val['Areaname'];
            $Serialname = $val['Serialname'];
            $TakeMockPart = $val['TakeMockPart'];
            $TakeArea = $val['TakeArea'];
            $PickNum = $val['PickNum'];
            $TakeNum = $val['TakeNum'];
            $CompetitionRateNow = $val['CompetitionRateNow'];
            $CompetitionRateAgo = $val['CompetitionRateAgo'];
            $PassLineAgo = $val['PassLineAgo'];
            $AvrPointAgo = $val['AvrPointAgo'];
            $StabilityAvrPoint = $val['StabilityAvrPoint'];
            $StabilityAvrPointRef = $val['StabilityAvrPointRef'];
            $StabilityAvrPercent = $val['StabilityAvrPercent'];
            $StrongAvrPoint1 = $val['StrongAvrPoint1'];
            $StrongAvrPoint1Ref = $val['StrongAvrPoint1Ref'];
            $StrongAvrPoint2 = $val['StrongAvrPoint2'];
            $StrongAvrPoint2Ref = $val['StrongAvrPoint2Ref'];
            $StrongAvrPercent = $val['StrongAvrPercent'];
            $ExpectAvrPoint1 = $val['ExpectAvrPoint1'];
            $ExpectAvrPoint1Ref = $val['ExpectAvrPoint1Ref'];
            $ExpectAvrPoint2 = $val['ExpectAvrPoint2'];
            $ExpectAvrPoint2Ref = $val['ExpectAvrPoint2Ref'];
            $ExpectAvrPercent = $val['ExpectAvrPercent'];
            $IsUse = $val['IsUse'];
            $AvrPoint = $val['AvrPoint'];

            $dtSet[$TakeMockPart][$TakeArea]['TakeMockPart'] = $TakeMockPart;
            $dtSet[$TakeMockPart][$TakeArea]['TakeArea'] = $TakeArea;
            $dtSet[$TakeMockPart][$TakeArea]['Areaname'] = $Areaname;
            $dtSet[$TakeMockPart][$TakeArea]['Serialname'] = $Serialname;
            $dtSet[$TakeMockPart][$TakeArea]['PickNum'] = $PickNum;
            $dtSet[$TakeMockPart][$TakeArea]['TakeNum'] = $TakeNum;
            $dtSet[$TakeMockPart][$TakeArea]['CompetitionRateNow'] = $CompetitionRateNow;
            $dtSet[$TakeMockPart][$TakeArea]['CompetitionRateAgo'] = $CompetitionRateAgo;
            $dtSet[$TakeMockPart][$TakeArea]['PassLineAgo'] = $PassLineAgo;
            $dtSet[$TakeMockPart][$TakeArea]['AvrPointAgo'] = $AvrPointAgo;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPoint'] = $StabilityAvrPoint;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPointRef'] = $StabilityAvrPointRef;
            $dtSet[$TakeMockPart][$TakeArea]['StabilityAvrPercent'] = $StabilityAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1'] = $StrongAvrPoint1;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint1Ref'] = $StrongAvrPoint1Ref;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2'] = $StrongAvrPoint2;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPoint2Ref'] = $StrongAvrPoint2Ref;
            $dtSet[$TakeMockPart][$TakeArea]['StrongAvrPercent'] = $StrongAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1'] = $ExpectAvrPoint1;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint1Ref'] = $ExpectAvrPoint1Ref;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2'] = $ExpectAvrPoint2;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPoint2Ref'] = $ExpectAvrPoint2Ref;
            $dtSet[$TakeMockPart][$TakeArea]['ExpectAvrPercent'] = $ExpectAvrPercent;
            $dtSet[$TakeMockPart][$TakeArea]['IsUse'] = $IsUse;
            $dtSet[$TakeMockPart][$TakeArea]['AvrPoint'] = $AvrPoint;
        }

        // 2. 과목별 원점수 평균 (origin, 0점 제외)
        $gradedata = $this->surveyModel->gradeList($PredictIdx);
        $gradelist = array_pluck($gradedata, 'Avg', 'SubjectCode');
        $gradesubject = array_pluck($gradedata, 'SubjectName', 'SubjectCode');

        // 3. 과목별 원점수 평균 그래프 (과목별 원점수 평균 데이터 활용)
        $arr_grade_subject = [
            ['100100', '100200', '100300', '100500', '100400'],  // 한국사/영어/형법/경찰학개론/형사소송법
            ['100100', '100200', '100300', '100600', '100400'],  // 한국사/영어/형법/국어/형사소송법
            ['100100', '100200', '100500', '100800', '100600'],  // 한국사/영어/경찰학개론/사회/국어
        ];

        $gradeSet = [];
        $idx = 0;
        foreach ($arr_grade_subject as $arr) {
            $is_set = true;
            $tmp_subject = '';
            $tmp_grade = '';

            foreach ($arr as $subject_code) {
                if (array_key_exists($subject_code, $gradelist) === false) {
                    $is_set = false;
                    break;
                }

                $tmp_subject .= '/' . $gradesubject[$subject_code];
                $tmp_grade .= '/' . $gradelist[$subject_code];
            }

            if ($is_set === true) {
                $gradeSet[$idx]['subject'] = substr($tmp_subject, 1);
                $gradeSet[$idx]['grade'] = $tmp_grade;
                $idx++;
            }
        }

        // 4. 총점성적분포 (origin, 0점 포함)
        $pointList = $this->surveyModel->pointArea($PredictIdx);

        // 5. 과목별성적분포 (origin, 0점 제외)
        $subjectPointList = $this->surveyModel->getSubjectPoint($PredictIdx);

        // 6. 과목별단일선호도 (origin, 0점 제외)
        $bestList = $this->surveyModel->bestSubject($PredictIdx);

        // 7. 과목별조합선호도 (origin, 0점 제외)
        $bestCombList = $this->surveyModel->bestCombineSubject($PredictIdx);

        // 8. 과목별 체감난이도
        // (이전 설문 결과)
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($spidx1);
        $question_info = $this->surveyModel->listSurveyForQuestion($spidx1);
        list($survey_title,$spSubjectList['Prev']) = $this->_mathAnswerSpreadData($question_info,$answer_info);
        
        // (진행중 설문 결과)
        $answer_info = $this->surveyModel->findSurveyForAnswerInfo($spidx2);
        $question_info = $this->surveyModel->listSurveyForQuestion($spidx2);
        list($survey_title,$spSubjectList['Now']) = $this->_mathAnswerSpreadData($question_info,$answer_info);

        // 9. 직렬별 설문조사 결과
        $surveyList = $this->_matchingQuestionData($question_info,$answer_info);

        // 10. 과목별 오답랭킹
        $wrongData = $this->surveyModel->wrongRank($PredictIdx);
        $wrongSubject = array_unique(array_pluck($wrongData, 'PaperName', 'PpIdx'));
        $wrongList = [];
        foreach ($wrongData as $row) {
            $wrongList[$row['PpIdx']][] = $row;
        }

        $view_file = 'willbes/pc/eventsurvey/total_graph';
        $this->load->view($view_file, [
            'PredictIdx' => $PredictIdx,
            'serialList' => $serialList,
            'areaList' => $dtSet,
            'gradelist2' => $gradedata,
            'gradeList' => $gradeSet,
            'pointList' => $pointList,
            'subjectPointList' => $subjectPointList,
            'bestList' => $bestList,
            'bestCombList' => $bestCombList,
            'spSubjectList' => $spSubjectList,
            'wrongSubject' => $wrongSubject,
            'wrongList' => $wrongList,
            'survey_title' => $survey_title,
            'surveyList' => $surveyList,
            'spidx2' => $spidx2
        ], false);
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

    /**
     * 설문응답 비율 계산
     * @param $question_info
     * @param $answer_info
     * @return mixed
     */
    private function _mathAnswerSpreadData($question_info=[],$answer_info=[]){
        $title_data = [];
        $data = [];
        $new_question_info = [];
        $new_answer_info = [];

        foreach ($question_info as $key => $val){
            $new_question_info[$val['SqIdx']] = $val;

            if($val['SqType'] == 'D'){ // 서술형
                $new_answer_info[$val['SqIdx']] = 'D';
            }else{ // 데이타 초기화
                foreach ($val['SqJsonData'] as $answer_key => $answer){
                    foreach ($answer['item'] as $k => $v){
                        $new_answer_info[$val['SqIdx']][$answer_key][$k] = 0;
                    }
                }
            }
        }

        // 선택 항목 카운트
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
            $SqType = $new_question_info[$question_key]['SqType'];
            $SqTitle = $new_question_info[$question_key]['SqTitle'];

            if($SqType != 'D'){ // 서술형 제외
                foreach ((array)$answer as $key => $val){
                    $question_info = $new_question_info[$question_key]['SqJsonData'][$key];
                    $item_sum = array_sum($val);

                    if($item_sum > 0){
                        foreach ($val as $k => $v){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $data[$question_info['title']][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                            }else{
                                $title_data[$SqTitle][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                            }
                        }
                    }
                }
            }
        }

        return array($title_data,$data);
    }

    /**
     * 설문응답 비율 계산
     * @param $question_info
     * @return mixed
     */
    private function _recordsTotalCount($question_info=[]){
        $total_cnt = 0;
        $subject_cnt = 0;
        foreach ($question_info as $key => $val){
            if($val['SqType'] == 'T'){ // 복수형은 선택과목 갯수 기준
                $subject_cnt = $val['SqSubjectCnt'];
                $total_cnt += $subject_cnt;
            }else{
                $total_cnt += count($question_info[$key]['SqJsonData']);
            }
        }

        return array($subject_cnt,$total_cnt);
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
        $new_answer_info = [];
        $new_answer_data = [];

        // 설문문항 키 재조합
        foreach ($question_info as $key => $val){
            $new_question_info[$val['SqIdx']] = $val;
        }
        
        // 일반공채/전의경경채/101단 등 문항별 분류
        foreach ($answer_data as $key => $val){
            foreach ($val['AnswerInfo'] as $answer_key => $answer){
                if($answer_key == array_key_first($val['AnswerInfo'])){
                    foreach ($answer as $k => $v){
                        unset($val['AnswerInfo'][array_key_first($val['AnswerInfo'])]);
                        $question_data = $new_question_info[$answer_key]['SqJsonData'][$k];
                        $new_answer_info[$question_data['item'][$v]][] = $val['AnswerInfo'];
                    }
                    break;
                }
            }
        }

        // 데이타 초기화
        foreach ($new_answer_info as $title => $arr){
            foreach ($arr[0] as $question_key => $answer) {
                foreach ($answer as $k => $v) {
                    $question_data = $new_question_info[$question_key]['SqJsonData'];
                    foreach ($question_data as $k2 => $v2) {
                        foreach ($v2['item'] as $k3 => $v3){
                            $new_answer_data[$title][$question_key][$k2][$k3] = 0;
                        }
                    }
                }
            }
        }

        // 선택 항목 카운트
        foreach ($new_answer_info as $title => $arr){
            foreach ($arr as $key => $val) {
                foreach ($val as $question_key => $answer) {
                    foreach ($answer as $k => $v) {
                        $new_answer_data[$title][$question_key][$k][$v] += 1;
                    }
                }
            }
        }

        // 데이타 매칭
        foreach ($new_answer_data as $title => $arr){
            foreach ($arr as $question_key => $answer) {
                $SqType = $new_question_info[$question_key]['SqType'];
                $SqTitle = $new_question_info[$question_key]['SqTitle'];
                foreach ($answer as $k => $v) {
                    $question_info = $new_question_info[$question_key]['SqJsonData'][$k];
                    $item_sum = array_sum($v);

                    if($item_sum > 0){
                        foreach ($v as $k2 => $v2){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $data[$title][$SqType][$question_info['title']][$question_info['item'][$k2]] = round(($v2 / $item_sum) * 100, 0);
                            }else{
                                $data[$title][$SqType][$SqTitle][$question_info['item'][$k2]] = round(($v2 / $item_sum) * 100, 0);
                            }
                        }
                    }
                }
            }
        }

        return $data;
    }

}

