<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends \app\controllers\BaseController
{
    protected $models = array('site/survey');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 설문통계
     */
    public function index()
    {
        //$condition = ['EQ' => ['A.IsStatus' => 'Y']];
        //$old_survey_count = $this->surveyModel->listAllSurveyStatistics(true, $condition);

        $arr_site_code = get_auth_on_off_site_codes('N', true);
        $def_site_code = key($arr_site_code);

        $this->load->view('site/survey/survey_statistics', [
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_site_code,
        ]);
    }

    /**
     * 설문통계 리스트
     */
    public function listAjax()
    {
        $list = [];

        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
            ],
            'ORG1' => [
                'LKB' => [
                    'A.SurveyTitle' => $this->_reqP('search_value'),
                    'A.SubIdx' => $this->_reqP('search_value')
                ]
            ],
        ];

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BET' => [
                    'A.StartDate' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')],
                    'A.EndDate' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        // 설문 제목
        $survey_title_info = $this->surveyModel->listSurveyStatisticsTitle($this->_reqP('search_site_code'));

        $count = $this->surveyModel->listGroupSurveyStatistics(true, $arr_condition);
        if ($count > 0) {
            $list = $this->surveyModel->listGroupSurveyStatistics(false, $arr_condition, $this->input->post('length'), $this->input->post('start'), ['A.SubIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
            'survey_title_info' => $survey_title_info
        ]);
    }

    /**
     * 설문통계 업데이트
     * @param array $params
     */
    public function storeSurveyStatistics($params=[])
    {
        $method = 'add';
        $ss_idx = $params[0];

        if (empty($ss_idx) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
            return;
        }

        // 전체 응시인원
        $answer_total_count = $this->surveyModel->countSurveyForAnswer($ss_idx);
        if ($answer_total_count == 0) {
            show_alert('설문응답 내역을 찾을 수 없습니다.', 'back');
            return;
        }

        // 해당 설문 저장 여부 확인
        $arr_condition = ['EQ' => ['SubIdx' => $ss_idx, 'IsStatus' => 'Y']];
        $sub_idx_count = $this->surveyModel->listAllSurveyStatistics(true,$arr_condition);
        if ($sub_idx_count > 0) {
            $method = 'modify';
        }

        // 설문제목
        $survey_info = $this->surveyModel->findSurveyByTitle($ss_idx);

        // 설문응답
        $answer_info = $this->surveyModel->listAnswerGraphData($ss_idx);

        // 설문문항
        $question_data = $this->surveyModel->listSurveyForQuestion($ss_idx);

        // 설문 응답 비율 계산
        $input_data = $this->_mathAnswerSpreadData($question_data,$answer_info);

        $survey_data = $this->_setSurveyInfo($survey_info,$ss_idx,$answer_total_count);
        $result = $this->surveyModel->storeSurveyStatistics($input_data,$survey_data,$method);

        if($result === true){
            show_alert('업데이트 되었습니다.','back');
            return;
        }
    }

    /**
     * 설문통계 그래프 팝업
     */
    public function statisticsGraphPopup()
    {
        $sub_idx = $this->_reqG('sub_idx');

        // 설문응답
        $arr_condition = ['EQ' => ['SubIdx' => $sub_idx, 'IsStatus' => 'Y']];
        $statistics_data = $this->surveyModel->listAllSurveyStatistics(false,$arr_condition);
        $data = $this->_statisticsPopupSpreadData($statistics_data);

        $this->load->view('site/survey/statistics_graph_popup', [
            'sub_idx' => $sub_idx,
            'data' => $data
        ]);
    }

    /**
     * 설문통계 데이터 팝업
     */
    public function statisticsDataPopup()
    {
        $sub_idx = $this->_reqG('sub_idx');

        // 설문응답
        $arr_condition = ['EQ' => ['SubIdx' => $sub_idx, 'IsStatus' => 'Y']];
        $statistics_data = $this->surveyModel->listAllSurveyStatistics(false,$arr_condition);
        $data = $this->_statisticsPopupSpreadData($statistics_data);

        $this->load->view('site/survey/statistics_data_popup', [
            'sub_idx' => $sub_idx,
            'data' => $data
        ]);
    }

    /**
     * 설문통계 그래프 데이타
     * @param $statistics_data
     * @return mixed
     */
    private function _statisticsPopupSpreadData($statistics_data=[])
    {
        $data = [];
        foreach ($statistics_data as $key => $val){
            if(empty($val['SurveyQuestion']) === false && empty($val['SurveyItem']) === false){
                $data[$val['SurveyQuestion']][$val['SurveyItem']]['spread'] = $val['AnswerRate'];
                $data[$val['SurveyQuestion']][$val['SurveyItem']]['count'] = $val['AnswerCount'];
            }
        }

        return $data;
    }

    /**
     * 설문통계 저장
     * @param array $survey_info
     * @param integer $ss_idx
     * @param integer $total_count
     * @return mixed
     */
    private function _setSurveyInfo($survey_info=[],$ss_idx=null,$total_count=null)
    {
        $data = [
            'site_code' => $survey_info['SiteCode'],
            'ss_idx' => $ss_idx,
            'survey_title' => $survey_info['SurveyTitle'],
            'StartDate' => $survey_info['StartDate'],
            'EndDate' => $survey_info['EndDate'],
            'total_count' => $total_count,
        ];

        return $data;
    }

    /**
     * 설문조사 선택 문항 비율 계산
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
     * old 설문통계 데이타 등록 (한번만 실행)
     */
    public function runOnce()
    {
        // 설문조사
        $old_survey_info = $this->surveyModel->listOldSurvey();
        foreach ($old_survey_info as $key => $val){
            // 전체 응시인원
            $total_count = $this->surveyModel->countOldSurveyAnswer($val['SpIdx']);

            if($total_count > 0){
                $val['total_count'] = $total_count;

                // 설문결과
                $input_data = $this->surveyModel->listOldSurveyAnswer($val['SpIdx']);

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

}
