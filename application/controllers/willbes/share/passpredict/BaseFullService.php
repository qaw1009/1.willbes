<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseFullService extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', 'predict/fullServiceF', 'survey/fullServiceSurveyF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    private $_arr_member_step = [
        '2' => 'off'
        ,'3' => 'off'
        ,'4' => 'off'
    ];  //회원단계 초기화

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 고등고시용 합격예측
     * 기본정보 및 답안입력 탭(2)
     */
    public function ajaxHtml2()
    {
        $arr_base = [];
        $arr_base['method'] = 'POST';
        $arr_input = $this->_reqG(null);
        $predict_idx = element('predict_idx', $arr_input);
        $ss_idx = element('ss_idx', $arr_input);

        if (empty((int)$predict_idx) === true) {
            show_alert('합격예측코드가 없습니다.','back');
        }

        $arr_condition = ['EQ' => ['PredictIdx' => $predict_idx,'IsUse' => 'Y']];
        $predict_data = $this->fullServiceFModel->findPredictData($arr_condition);
        if (empty($predict_data) === true) {
            show_alert('조회된 합격예측 정보가 없습니다.','back');
        }
        $predict_idx = $predict_data['PredictIdx'];

        //직렬
        $arr_base['arr_mock_part'] = $this->fullServiceFModel->listMockPartForPredict($predict_idx);

        //직렬별 응시번호 체크 값 셋팅
        $arr_base['arr_mock_part_takenum'] = [];
        if (empty($arr_base['arr_mock_part']) === false) {
            foreach ($arr_base['arr_mock_part'] as $row) {
                $arr_base['arr_mock_part_takenum'][$row['Ccd']]['ValidateLengthTakeNum'] = $row['ValidateLengthTakeNum'];
                $arr_base['arr_mock_part_takenum'][$row['Ccd']]['ValidateGroupTakeNum'] = $row['ValidateGroupTakeNum'];
            }
        }

        //지역
        $get_area_code = $this->config->item('sysCode_Area', 'predict');
        $arr_base['arr_area'] = $this->codeModel->getCcd($get_area_code);
        array_pop($arr_base['arr_area']);   //전국값 제외

        //직렬별 과목 조회, 직렬별 과목이 정해져있음. 프론트에서 별도 선택X
        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx
                ,'a.IsUse' => 'Y'
            ]
        ];
        $arr_base['arr_subject'] = $this->fullServiceFModel->getSubjectCode($arr_condition);

        $regi_data = null;          //기본정보
        $regi_subject_data = [];    //기본정보의 과목
        $list_question = [];        //과목의 항목 리스트
        $regi_question_data = [];   //과목별,항목별 통계
        $survey_data = [];          //설문정보
        $member_answer_data = [];   //회원 설문 응답 내역

        if ($this->isLogin() === true) {
            $mem_idx = $this->session->userdata('mem_idx');
            //기본정보
            $arr_condition = [
                'EQ' => [
                    'a.PredictIdx' => $predict_idx
                    ,'a.MemIdx' => $mem_idx
                    ,'a.IsStatus' => 'Y'
                ]
            ];
            $regi_data = $this->fullServiceFModel->findRegisterData($arr_condition);

            if (empty($regi_data) === false) {
                $arr_base['method'] = 'MOD';

                //설문데이터 조회 (2단계) /** todo : 3단계 오픈 임의 설정, 설문데이터 개발 완료 후 조건 추가 */
                $this->_arr_member_step[2] = 'on';
                if(empty($ss_idx) === false){
                    $survey_data = $this->_getSurveyQuestion($ss_idx);
                    $member_answer_data = $this->_getMemberSurveyAnswer($ss_idx);

                    if(empty($member_answer_data) === false){
                        $this->_arr_member_step[3] = 'on';
                    }
                }
                
                //답안입력 (3단계)
                if ($this->_arr_member_step[3] == 'on') {
                    //과목조회
                    $arr_condition = [
                        'EQ' => [
                            'a.PrIdx' => $regi_data['PrIdx']
                            , 'a.PredictIdx' => $predict_idx
                            , 'a.IsStatus' => 'Y'
                        ]
                    ];
                    $regi_subject_data = $this->fullServiceFModel->findRegisterSubjectData($arr_condition);
                    $list_question = $this->_listQuestionForRegister($predict_idx, $regi_data['PrIdx'], $regi_subject_data);
                }

                if ($this->_arr_member_step[4] == 'on') {
                    $regi_question_data = $this->_regi_question_data($predict_idx, $regi_data['PrIdx']);
                }
            }
        }

        $this->load->view('fullService/predict_tab2', [
            'predict_idx' => $predict_idx
            ,'predict_data' => $predict_data
            ,'ss_idx' => $ss_idx
            ,'arr_member_step' => $this->_arr_member_step
            ,'arr_base' => $arr_base
            ,'regi_data' => $regi_data
            ,'regi_subject_data' => $regi_subject_data
            ,'list_question' => $list_question
            ,'regi_question_data' => $regi_question_data
            ,'survey_data' => $survey_data
            ,'member_answer_data' => $member_answer_data
        ]);
    }

    /**
     * 고등고시용 합격예측
     * 성적확인 및 분석 탭(3)
     */
    public function ajaxHtml3()
    {
        $predict_idx = (int)$this->_reqG('predict_idx');
        $pr_idx = (int)$this->_reqG('pr_idx');
        $ss_idx = (int)$this->_reqG('ss_idx');
        $mem_idx = $this->session->userdata('mem_idx');
        
        if (empty($predict_idx) === true || empty($pr_idx) === true) {
            show_alert('잘못된 접근 입니다.');
        }

        //전체직렬, 동일직렬 체점자 수
        $add_column = "
            ,(
                SELECT IF(CEIL(COUNT(*) * (1+10 / 100)) < 100, 100, CEIL(COUNT(*) * (1+10 / 100))) AS total
                FROM ( SELECT PrIdx FROM lms_predict_grades_origin WHERE PredictIdx = {$predict_idx} GROUP BY PrIdx ) AS cnt
            ) AS MaxForTotalChart
            ,(
                SELECT IF(CEIL(COUNT(*) * (1+10 / 100)) < 100, 100, CEIL(COUNT(*) * (1+10 / 100))) AS total
                FROM ( SELECT PrIdx FROM lms_predict_grades_origin WHERE PredictIdx = {$predict_idx}
                    AND TakeMockPart = (
                        SELECT TakeMockPart FROM lms_predict_register WHERE PredictIdx = {$predict_idx} AND PrIdx = {$pr_idx}
                    )
                    GROUP BY PrIdx
                ) AS cnt
            ) AS MaxForTakeMockPartChart
        ";
        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx
                ,'a.PrIdx' => $pr_idx
                ,'a.MemIdx' => $mem_idx
                ,'a.IsStatus' => 'Y'
            ]
        ];
        $regi_data = $this->fullServiceFModel->findRegisterData($arr_condition, $add_column);

        if (empty($regi_data) === true) {
            show_alert('조회된 기본 정보가 없습니다.');
        }
        $arr_statsForGradesData = $this->fullServiceFModel->statsForGradesData($predict_idx, $pr_idx);

        $arr_subject[0] = '전체평균';
        foreach ($arr_statsForGradesData['list'] as $row) {
            $arr_subject[$row['GroupBy']] = $row['SubjectName'];
        }
        $arr_subjectForPoints = $arr_subject;
        $arr_subjectForPoints[0] = '전체평균';

        $arr_subjectForStats = $arr_subject;
        $arr_subjectForStats[0] = 'PSAT평균';

        //그래프 데이터 : 전체직렬, 회원의 직렬 데이터
        $arr_statsForChartData = $this->_statsForChartData($predict_idx, $pr_idx);

        //전체 직렬별 나의 성적 위치
        $arr_statsForTotalAvgData = $this->_statsForAvgData($predict_idx, $pr_idx, 'total');

        //동일 직렬별 나의 성적 위치 (회원 기준 직렬)
        $arr_statsForTakeMockPartAvgData = $this->_statsForAvgData($predict_idx, $pr_idx, 'takemockpart');

        //설문 데이터
        $arr_surveyChartData = $this->_getSurveyChartData($ss_idx);

        $this->load->view('fullService/predict_tab3', [
            'regi_data' => $regi_data
            ,'arr_statsForGradesData' => $arr_statsForGradesData
            ,'arr_subjectForPoints' => $arr_subjectForPoints
            ,'arr_subjectForStats' => $arr_subjectForStats
            ,'arr_statsForChartData' => $arr_statsForChartData
            ,'arr_statsForTotalAvgData' => $arr_statsForTotalAvgData
            ,'arr_statsForTakeMockPartAvgData' => $arr_statsForTakeMockPartAvgData
            ,'arr_surveyChartData' => $arr_surveyChartData
        ]);
    }

    public function ajaxHtml4()
    {
        $predict_idx = (int)$this->_reqG('predict_idx');
        $pr_idx = (int)$this->_reqG('pr_idx');
        $mem_idx = $this->session->userdata('mem_idx');

        if (empty($predict_idx) === true || empty($pr_idx) === true) {
            show_alert('잘못된 접근 입니다.');
        }

        $arr_condition = [
            'EQ' => [
                'a.PredictIdx' => $predict_idx
                ,'a.PrIdx' => $pr_idx
                ,'a.MemIdx' => $mem_idx
                ,'a.IsStatus' => 'Y'
            ]
        ];
        $regi_data = $this->fullServiceFModel->findRegisterData($arr_condition);

        if (empty($regi_data) === true) {
            show_alert('조회된 기본 정보가 없습니다.');
        }

        $fullservice_data = $this->fullServiceFModel->fullServiceForResult($predict_idx, $pr_idx);

        $this->load->view('fullService/predict_tab4', [
            'fullservice_data' => $fullservice_data
        ]);
    }

    /**
     * 기본정보 저장
     */
    public function storeRegister()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,MOD]'],
            ['field' => 'take_mock_part', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'subject_p[]', 'label' => '공통과목', 'rules' => 'trim|required'],
            ['field' => 'take_area', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'add_point', 'label' => '가산점', 'rules' => 'callback_validateRequiredIf[is_add_point,Y]'],
            ['field' => 'take_number', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'lecture_type', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'question_type', 'label' => '책형', 'rules' => 'callback_validateRequiredIf[is_question_type,Y]'],
            ['field' => 'pr_idx', 'label' => '기본정보 식별자', 'rules' => 'callback_validateRequiredIf[_method,MOD]'],
        ];

        if ($this->validate($rules) === false) return;

        $method = $this->_reqP('_method') == 'POST' ? 'add' : 'modify';
        $result = $this->fullServiceFModel->{$method . 'Register'}($this->_reqP(null, false));
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 정답제출
     */
    public function storeAnswerPaper()
    {
        $rules = [
            ['field' => 'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'pr_idx', 'label' => '기본정보 아이디', 'rules' => 'trim|required|integer'],
            ['field' => 'pp_idx[]', 'label' => '과목코드', 'rules' => 'trim|required']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->fullServiceFModel->storeAnswerPaper($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 설문제출
     */
    public function storeSurveyAnswer()
    {
        $rules = [
            ['field' => 'ss_idx', 'label' => '설문조사식별자', 'rules' => 'trim|required|integer'],
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->fullServiceSurveyFModel->storeSurvey($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    public function examDeleteAjax()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[MOD]'],
            ['field' => 'predict_idx', 'label' => '합격예측식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'pr_idx', 'label' => '기본정보 아이디', 'rules' => 'trim|required|integer']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->fullServiceFModel->examDelete($this->_reqP(null, false));
        $this->json_result($result, '삭제되었습니다.', $result, $result);
    }


    /**
     * 회원정보 > 문항데이터조회 (가공처리)
     * 4단계 'on' 여부 설정
     * @param $predict_idx
     * @param $pr_idx
     * @param $regi_subject_data
     * @return array
     */
    private function _listQuestionForRegister($predict_idx, $pr_idx, $regi_subject_data)
    {
        $get_pp_cnt = array_pluck($regi_subject_data, 'QuestionCnt', 'PpIdx');
        $arr_condition = [
            'EQ' => [
                'rc.PredictIdx' => $predict_idx
                ,'rc.PrIdx' => $pr_idx
            ]
        ];
        $result = $this->fullServiceFModel->listQuestionForRegister($arr_condition);
        if (empty($result) === false) {
            //등록된 답안 입력 정보가 있다면 (4단계 => on)
            if (empty($result[0]['Answer']) === false) {
                $this->_arr_member_step[4] = 'on';
            }
        }

        $j = 1; $numstr = ''; $list_question = []; $numArr = [];
        foreach($result as $key => $val){
            $PpIdx = $val['PpIdx'];
            $Answer = $val['Answer'];
            $numArr[] = $j;
            if($Answer) $numstr .= $Answer;
            if($j % 5 == 0){
                $list_question['question_no'][$PpIdx][] = min($numArr). "~" .max($numArr);
                $list_question['answer'][$PpIdx][] = $numstr;
                unset($numArr);
                $numstr = '';
                $j = ($j == $get_pp_cnt[$PpIdx]) ? 0 : $j;
            }
            $j++;
        }
        return $list_question;
    }

    /**
     * 과목별 문항별 통계 데이터 가공
     * @param $predict_idx
     * @param $pr_idx
     * @return array
     */
    private function _regi_question_data($predict_idx, $pr_idx)
    {
        $return = [];
        $result = $this->fullServiceFModel->listStatsAnswerPaperForQuestion($predict_idx, $pr_idx);
        if (empty($result) === false) {
            foreach ($result as $row) {
                $max_val = max($row['answer_1'], $row['answer_2'], $row['answer_3'], $row['answer_4'], $row['answer_5']);
                $return[$row['PpIdx']][] = [
                    'PqIdx' => $row['PqIdx']
                    ,'QuestionNO' => $row['QuestionNO']
                    ,'RightAnswer' => $row['RightAnswer']
                    ,'Answer' => $row['Answer']
                    ,'IsWrong' => $row['IsWrong']
                    ,'rightAnswerAvg' => $row['rightAnswerAvg']
                    ,'answer_1' => $row['answer_1']
                    ,'answer_2' => $row['answer_2']
                    ,'answer_3' => $row['answer_3']
                    ,'answer_4' => $row['answer_4']
                    ,'answer_5' => $row['answer_5']
                    ,'max' => $max_val
                ];
            }
        }
        return $return;
    }

    /**
     * 그래프 데이터 : 전체직렬, 회원의 직렬 데이터
     * @param $predict_idx
     * @param $pr_idx
     * @return array
     */
    private function _statsForChartData($predict_idx, $pr_idx)
    {
        $temp = $sort = $return = [];
        $result = $this->fullServiceFModel->statsForChartData($predict_idx, $pr_idx, 'total');
        foreach ($result as $row) {
            $temp['total'][$row['GroupBy']][] = [
                'title' => $row['title']
                ,'cntSection' => $row['cntSection']
                ,'avgSection' => $row['avgSection']
                ,'cntCumsum' => $row['cntCumsum']
                ,'avgCumsum' => $row['avgCumsum']
                ,'my_OrgPoint' => $row['my_OrgPoint']
            ];
        }

        $result = $this->fullServiceFModel->statsForChartData($predict_idx, $pr_idx, 'takemockpart');
        foreach ($result as $row) {
            $temp['takemockpart'][$row['GroupBy']][] = [
                'title' => $row['title']
                ,'cntSection' => $row['cntSection']
                ,'avgSection' => $row['avgSection']
                ,'cntCumsum' => $row['cntCumsum']
                ,'avgCumsum' => $row['avgCumsum']
                ,'my_OrgPoint' => $row['my_OrgPoint']
            ];
        }

        //테이블 데이터(배열셋팅), 차트 데이터(배열정렬수정)
        foreach ($temp['total'] as $key => $row) {
            foreach ($row as $data_key => $data) {
                if ($data_key <= 14) {
                    $return['total'][$key][$data_key] = [
                        'title' => $data['title']
                        ,'avgSection' => $data['avgSection']
                        ,'cntCumsum' => $data['cntCumsum']
                        ,'avgCumsum' => $data['avgCumsum']
                        ,'my_OrgPoint' => $data['my_OrgPoint']
                    ];
                }
                $sort[$data_key] = $data_key;
            }
            array_multisort($sort, SORT_DESC, $temp['total'][$key]);
        }

        $sort = [];
        foreach ($temp['takemockpart'] as $key => $row) {
            foreach ($row as $data_key => $data) {
                if ($data_key <= 14) {
                    $return['takemockpart'][$key][$data_key] = [
                        'title' => $data['title']
                        ,'avgSection' => $data['avgSection']
                        ,'cntCumsum' => $data['cntCumsum']
                        ,'avgCumsum' => $data['avgCumsum']
                        ,'my_OrgPoint' => $data['my_OrgPoint']
                    ];
                }
                $sort[$data_key] = $data_key;
            }
            array_multisort($sort, SORT_DESC, $temp['takemockpart'][$key]);
        }

        $return['chart_total'] = $temp['total'];
        $return['chart_takemockpart'] = $temp['takemockpart'];
        return $return;
    }

    private function _statsForAvgData($predict_idx, $pr_idx, $query_type = 'total')
    {
        $result1 = $this->fullServiceFModel->statsForAvgData($predict_idx, $pr_idx, $query_type, 'myself');
        $result2 = $this->fullServiceFModel->statsForAvgData($predict_idx, $pr_idx, $query_type, 'high_rank');
        $result3 = $this->fullServiceFModel->statsForAvgData($predict_idx, $pr_idx, $query_type, 'low_rank');

        $return = array_merge($result2, $result1, $result3);
        return $return;
    }

    /**
     * 설문항목 조회
     * @param integer $ss_idx
     * @return mixed
     */
    private function _getSurveyQuestion($ss_idx)
    {
        $data = [];

        // 설문
        $data['survey'] = $this->fullServiceSurveyFModel->findSurvey($ss_idx,$this->_site_code);
        if(empty($data['survey']) === true){
            show_alert('설문 기간이 아닙니다.','back');
        }

        // 설문항목
        $arr_condition = ['EQ' => ['A.SsIdx' => $ss_idx, 'A.IsStatus' => 'Y', 'A.IsUse' => 'Y']];
        $data['question'] = $this->fullServiceSurveyFModel->listSurveyForQuestion($arr_condition);
        if(empty($data['question']) === true){
            show_alert('등록되지 않은 설문입니다.','back');
        }

        $data['total_cnt'] = 0;
        foreach ($data['question'] as $key => $row){
            $data['question'][$key]['SqJsonData'] = json_decode($row['SqJsonData'], true);

            // 설문 총 갯수
            $data['total_cnt'] += count($data['question'][$key]['SqJsonData']);
        }

        return $data;
    }

    /**
     * 회원별 설문응답 내역 조회
     * @param integer $ss_idx
     * @return mixed
     */
    private function _getMemberSurveyAnswer($ss_idx)
    {
        $data = $this->fullServiceSurveyFModel->findSurveyForAnswer($ss_idx);

        if(empty($data) == false){
            $data['AnswerInfo'] = json_decode($data['AnswerInfo'], true);
        }

        return $data;
    }

    /**
     * 설문응답 차트 데이타 가공
     * @param integer $ss_idx
     * @return mixed
     */
    private function _getSurveyChartData($ss_idx)
    {
        $arr_decode_question = [];
        $arr_question_title = [];
        $arr_reset_question = []; // 문항 초기화
        $answer_rate_data = []; // 최종 응답 비율

        // 그래프 노출 문항
        $arr_condition = [
            'EQ' => ['A.SsIdx' => $ss_idx, 'A.IsStatus' => 'Y', 'A.IsUse' => 'Y'],
            'IN' => ['A.SqComment' => ['graph1','graph2']]
        ];
        $question_data = $this->fullServiceSurveyFModel->listSurveyForQuestion($arr_condition);

        // 문항 초기화
        foreach ($question_data as $question_key => $question_val){
            $question_decode_data = json_decode($question_val['SqJsonData'], true);

            foreach ($question_decode_data as $item_k => $item_v){
                foreach ($item_v['item'] as $k => $v){
                    $arr_reset_question[$question_val['SqComment']][$question_val['SsqIdx']][$item_k][$k] = 0;
                }
            }

            $arr_decode_question[$question_val['SsqIdx']] = $question_decode_data;
            $arr_question_title[$question_val['SsqIdx']] = $question_val['SqTitle'];
        }

        // 설문응답 내역
        $arr_condition = ['EQ' => ['A.SsIdx' => $ss_idx, 'A.IsStatus' => 'Y']];
        $answer_data = $this->fullServiceSurveyFModel->listSurveyForAnswer($arr_condition);

        foreach ($answer_data as $key => $row){
            $answer_data[$key] = json_decode($row['AnswerInfo'], true);
        }

        // 응답횟수 누적
        foreach ($arr_reset_question as $graph_key => $graph_val){
            foreach ($answer_data as $answer_key => $answer_val){
                foreach ($answer_val as $item_k => $item_v){
                    if(empty($arr_reset_question[$graph_key][$item_k]) === false){
                        foreach ($item_v as $k => $v){
                            $arr_reset_question[$graph_key][$item_k][$k][$v] += 1;
                        }
                    }
                }
            }
        }

        // 응답 비율 계산
        foreach ($arr_reset_question as $graph_key => $graph_val){
            foreach ($graph_val as $question_key => $question_val){
                foreach ($question_val as $item_k => $item_v) {
                    $arr_sum_question = array_sum($item_v);

                    foreach ($item_v as $k => $v) {
                        $question_title = $arr_question_title[$question_key];
                        $question_item = $arr_decode_question[$question_key][$item_k]['item'][$k];
                        $answer_rate_data[$graph_key][$question_title][$item_k][$question_item] = round(($v / $arr_sum_question) * 100, 0);
                    }
                }
            }
        }

        return $answer_rate_data;
    }
    
}