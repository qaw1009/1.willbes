<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseEventSurvey extends \app\controllers\FrontController
{
    protected $models = array('eventsurvey/survey');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('index');

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
        $ss_idx = $params[0];
        if(empty($ss_idx) === true || !is_numeric($ss_idx)){
            show_alert('잘못된 접근 입니다.','close');
            return;
        }

        $survey_data = $this->surveyModel->findSurvey($ss_idx,$this->_site_code);
        if(empty($survey_data) === true){
            show_alert('설문 기간이 아닙니다.','close');
            return;
        }

        if($survey_data['IsDuplicate'] == $this->_duplicate_type[1]){
            $answer_count = $this->surveyModel->findSurveyForAnswer($ss_idx);
            if($answer_count > 0){
                show_alert('이미 설문에 참여하셨습니다.','close');
                return;
            }
        }

        $question_list = $this->surveyModel->listSurveyForQuestion($ss_idx);
        if(empty($question_list) === true){
            show_alert('등록되지 않은 설문입니다.','close');
            return;
        }

        // 응시직렬
        $series_data = $this->surveyModel->findSurveyBySeries($ss_idx);
        list($question_data,$question_count) = $this->_getQuestionData($question_list,$series_data);

        $view_file = 'willbes/pc/eventsurvey/index';
        $this->load->view($view_file, [
            'survey_data' => $survey_data,
            'question_data' => $question_data,
            'question_count' => $question_count,
            'is_series' => empty($series_data) ? 'N' : 'Y',
            'count' => count($question_data),
        ], false);
    }

    public function graph()
    {
        $ss_idx = $this->_reqG('ss_idx');
        $is_series = $this->_reqG('is_series');

        // 설문응답
        $answer_info = $this->surveyModel->listSurveyForAnswer($ss_idx);

        // 설문문항
        $question_info = $this->surveyModel->listSurveyForQuestion($ss_idx);

        // 설문 응답 비율 계산
        list($survey_levels,$survey_data) = $this->_mathAnswerSpreadData($question_info,$answer_info);

        $view_file = 'willbes/pc/eventsurvey/graph';
        $this->load->view($view_file, [
            'SsIdx' => $ss_idx,
            'survey_levels' => $survey_levels,
            'survey_data' => $survey_data,
            'is_series' => $is_series
        ],false);
    }

    public function store()
    {
        $ss_idx = $this->_reqP('ss_idx');
        $total_cnt = $this->_reqP('total_cnt');
        $input = element('s_type', $this->_reqP(null, false));

        if(empty($ss_idx) || empty($total_cnt)){
            $this->json_error('잘못된 접근 입니다.');
            return;
        }

        $inputData = $this->_setInputData($input,$total_cnt);

        if(empty($inputData) === true){
            $this->json_error('모든 문항을 입력해 주세요.');
            return;
        }

        $result = $this->surveyModel->storeSurvey($inputData,$ss_idx);
        $this->json_result($result, '저장 되었습니다.', $result, $result);
    }

    /**
     * 참고 함수
     * /share/passpredict/BasePassPredict.php totalgraph
     */
    public function totalgraph()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $SsIdx1 = element('SsIdx1', $arr_input);    // 이전 설문조사
        $SsIdx2 = element('SsIdx2', $arr_input);    // 진행 설문조사

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
        foreach ($arealist as $key => $val) {
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
        // 이전 설문
        $surveyStatisticsList['Prev'] = $this->surveyModel->listSurveyForStatistics($SsIdx1);

        // 진행중 설문
        $answer_info = $this->surveyModel->listSurveyForAnswer($SsIdx2);
        $question_info = $this->surveyModel->listSurveyForQuestion($SsIdx2);
        list($survey_levels, $surveyStatisticsList['Now']) = $this->_mathAnswerSpreadData($question_info, $answer_info);

        // 9. 직렬별 설문조사
        $series_data = $this->surveyModel->findSurveyBySeries($SsIdx2);
        $answer_data = $this->_matchingSeriesData($answer_info, $series_data);
        $survey_series_data = $this->_mathSeriesSpreadData($question_info, $answer_data);
        $surveyList = $this->_getGraphData($series_data,$survey_series_data,$question_info);

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
            'surveyStatisticsList' => $surveyStatisticsList,
            'wrongSubject' => $wrongSubject,
            'wrongList' => $wrongList,
            'surveyList' => $surveyList,
            'SsIdx2' => $SsIdx2,
            'series_data' => $series_data
        ], false);
    }

    /**
     * 설문조사 저장 데이터 셋팅
     * @param $input
     * @param integer $total_cnt
     * @return bool|mixed
     */
    private function _setInputData($input=[],$total_cnt=null)
    {
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
     * 설문조사 필수 답변 문항 갯수
     * @param $question_info
     * @return mixed
     */
    private function _recordsTotalCount($question_info=[])
    {
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

        return [$subject_cnt,$total_cnt];
    }

    /**
     * 설문조사 선택 문항 비율 계산
     * @param $question_info
     * @param $answer_info
     * @return mixed
     */
    private function _mathAnswerSpreadData($question_info=[],$answer_info=[])
    {
        // 선택 문항 초기화
        list($new_question_info,$reset_data) = $this->_resetSurveyRecords($question_info);

        // 선택 문항 카운트
        $answer_data = $this->_countSurveyRecords($answer_info,$reset_data);

        return $this->_matchingSurveyData($answer_data,$new_question_info);
    }

    /**
     * 설문조사 문항 초기화
     * @param $question_info
     * @return mixed
     */
    private function _resetSurveyRecords($question_info=[])
    {
        $new_question_info = [];
        $reset_data = [];
        foreach ($question_info as $key => $val){
            $new_question_info[$val['SsqIdx']] = $val;

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

        return [$new_question_info,$reset_data];
    }

    /**
     * 설문조사 선택 문항 카운트
     * @param $answer_info
     * @param $reset_data
     * @return mixed
     */
    private function _countSurveyRecords($answer_info=[],$reset_data=[])
    {
        foreach ($answer_info as $key => $val){
            foreach ($val['AnswerInfo'] as $question_key => $answer){
                if(empty($reset_data[$question_key]) === false && $reset_data[$question_key] != 'D'){ // 서술형 제외
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
     * @param $new_question_info
     * @return mixed
     */
    private function _matchingSurveyData($answer_data=[],$new_question_info=[])
    {
        $survey_levels = [];
        $reset_data = [];
        $new_answer_data = [];
        $survey_data = [];

        foreach ($answer_data as $question_key => $answer){
            $SqType = $new_question_info[$question_key]['SqType'];
            $SqTitle = $new_question_info[$question_key]['SqTitle'];

            if($SqType != 'D') { // 서술형 제외
                foreach ($answer as $key => $val) {
                    $question_info = $new_question_info[$question_key]['SqJsonData'][$key];
                    $item_sum = array_sum($val);

                    foreach ($val as $k => $v) {
                        if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형 초기화
                            $reset_data[$question_info['title']][$question_info['item'][$k]] = 0;
                            $new_answer_data[$question_key][$question_info['title']][$question_info['item'][$k]] = $v;
                        }else{ // 전체적인 시험난이도
                            if($item_sum > 0) {
                                $survey_levels[$SqTitle][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                            }
                        }
                    }
                }
            }
        }

        // 선택 카운트
        foreach ($new_answer_data as $question_key => $answer){
            foreach ($answer as $key => $val){
                foreach ($val as $item => $cnt){
                    $reset_data[$key][$item] += $cnt;
                }
            }
        }

        // 선택 비율계산
        foreach ($reset_data as $title => $answer){
            $item_sum = array_sum($answer);
            if($item_sum > 0) {
                foreach ($answer as $item => $cnt){
                    $survey_data[$title][$item] = round(($cnt / $item_sum) * 100, 0);
                }
            }

        }

        return [$survey_levels,$survey_data];
    }

    /**
     * 직렬 데이타 가공
     * @param $question_list
     * @param $series_data
     * @return mixed
     */
    private function _getQuestionData($question_list=[],$series_data=[])
    {
        $question_data = [];
        $question_count = [];
        if(empty($series_data) === false){
            foreach (array_value_first($series_data) as $key => $val){
                foreach ($question_list as $row){
                    if(empty($row['SeriesData']) === false && in_array($val,$row['SeriesData'])){
                        unset($row['SeriesData']);
                        $question_data[$key][] = $row;
                    }
                }
            }
        }else{
            $question_data[1] = $question_list;
        }

        // 응시과목 선택 갯수,전체 항목 갯수
        foreach ($question_data as $key => $val){
            list($question_count[$key]['subject_cnt'],$question_count[$key]['total_cnt']) = $this->_recordsTotalCount($val);
        }

        return [$question_data,$question_count];
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
     * @param $question_info
     * @param $answer_data
     * @return mixed
     */
    private function _mathSeriesSpreadData($question_info=[],$answer_data=[])
    {
        // 선택 문항 초기화
        list($new_question_info,$reset_data) = $this->_resetSurveyRecords($question_info);

        // 선택 문항 카운트
        $series_data = $this->_countSeriesRecords($answer_data,$reset_data);

        return $this->_matchingSurveySeriesData($series_data,$new_question_info);
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
                        if(empty($reset_data[$question_key]) === false){
                            if($reset_data[$question_key] == 'D'){ // 서술형 제외
                                unset($answer_data[$series_key][$key][$question_key]);
                            }else{
                                $series_data[$series_key][$question_key][$k] = $reset_data[$question_key][$k];
                            }
                        }
                    }
                }
            }
        }

        foreach ($answer_data as $series_key => $series_val){
            foreach ($series_val as $key => $val) {
                foreach ($val as $question_key => $answer) {
                    if(empty($series_data[$series_key][$question_key]) === false){
                        ksort($series_data[$series_key][$question_key]);
                        foreach ($answer as $k => $v) {
                            $series_data[$series_key][$question_key][$k][$v] += 1;
                        }
                    }
                }
            }
        }

        return $series_data;
    }

    /**
     * 직렬 데이타 매칭
     * @param $series_data
     * @param $new_question_info
     * @return mixed
     */
    private function _matchingSurveySeriesData($series_data=[],$new_question_info=[])
    {
        $survey_data = [];
        foreach ($series_data as $series_key => $series_val){
            foreach ($series_val as $question_key => $answer) {
                $SqType = $new_question_info[$question_key]['SqType'];
                $SqTitle = $new_question_info[$question_key]['SqTitle'];
                foreach ($answer as $answer_key => $answer_val) {
                    $question_info = $new_question_info[$question_key]['SqJsonData'][$answer_key];
                    $item_sum = array_sum($answer_val);

                    if($item_sum > 0){
                        foreach ($answer_val as $k => $v){
                            if(in_array($SqType,array('M','T'))) { // 선택형(그룹), 복수형
                                $survey_data[$series_key][$SqType][$SqTitle][$question_info['title']][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                            }else{
                                $survey_data[$series_key][$SqType][$SqTitle][$SqTitle][$question_info['item'][$k]] = round(($v / $item_sum) * 100, 0);
                            }

                        }
                    }
                }
            }
        }

        return $survey_data;
    }

    /**
     * 직렬별 데이타 체크 (설문결과 없을시 빈 그래프 노출)
     * @param $series_data
     * @param $survey_series_data
     * @param $question_info
     * @return mixed
     */
    private function _getGraphData($series_data=[],$survey_series_data=[],$question_info=[])
    {
        foreach ($series_data as $series_key => $series_val){
            foreach ($series_val as $series_k => $series_v) {
                if (empty($survey_series_data[$series_k]) === true) { // 해당 응시직렬에 설문결과 없을시 실행
                    foreach ($question_info as $key => $val){
                        if($val['IsSeries'] == 'N' && in_array($series_v,$val['SeriesData'])){
                            foreach ($val['SqJsonData'] as $item_key => $item_val){
                                foreach ($item_val['item'] as $item){
                                    if(in_array($val['SqType'],array('M','T'))) { // 선택형(그룹), 복수형
                                        $survey_series_data[$series_k][$val['SqType']][$val['SqTitle']][$item_val['title']][$item] = 0;
                                    }else{
                                        $survey_series_data[$series_k][$val['SqType']][$val['SqTitle']][$val['SqTitle']][$item] = 0;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $survey_series_data;
    }

}

