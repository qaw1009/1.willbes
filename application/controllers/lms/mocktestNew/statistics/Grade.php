<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Grade extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/mockCommon', 'mocktestNew/regGrade');
    protected $helpers = array();
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

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
        $arr_base['applyType'] = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['applyType']);

        $this->load->view('mocktestNew/statistics/grade/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'PD.IsStatus' => 'Y',
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'PC.CateCode' => $this->_reqP('search_cateD1'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                'MP.AcceptStatusCcd' => $this->_reqP('search_AcceptStatus'),
                'MP.TakeType' => $this->_reqP('search_TakeType'),
                'PD.IsUse' => $this->_reqP('search_use'),
            ],
            'LKB' => [
                'MP.MockPart' => $this->_reqP('search_cateD2'),
                'MP.TakeFormsCcd' => $this->_reqP('search_TakeFormsCcd'),
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->_reqP('search_fi', true),
                    'PD.ProdCode' => $this->_reqP('search_fi', true)
                ]
            ],
        ];

        $list = [];
        $count = $this->regGradeModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->regGradeModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        // 데이터 가공
        $mockKindCode = $this->mockCommonModel->_groupCcd['sysCode_kind'];    //직렬 운영코드값
        $codes = $this->codeModel->getCcdInArray([$mockKindCode]);

        $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
        $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];

        foreach ($list as &$it) {
            $takeFormsCcds = explode(',', $it['TakeFormsCcd']);
            $it['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
            $it['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

            $mockPart = explode(',', $it['MockPart']);
            foreach ($mockPart as $mp) {
                if (!empty($codes[$mockKindCode][$mp])) $it['MockPartName'][] = $codes[$mockKindCode][$mp];
            }
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 통계페이지 : 조정점수처리,성적통계
     * @param array $params
     */
    public function detail($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $prod_code = $params[0];
        $product_info = $this->regGradeModel->productInfo($prod_code);
        if (empty($product_info) === true) {
            show_error('조회된 상품이 없습니다.');
        }

        //기본정보 가공
        $applyType_on = $this->mockCommonModel->_ccd['applyType_on'];
        $applyType_off = $this->mockCommonModel->_ccd['applyType_off'];
        $arr_mock_kind_code = $this->codeModel->getCcd($this->mockCommonModel->_groupCcd['sysCode_kind']);
        $arr_mock_part = explode(',', $product_info['MockPart']);
        foreach ($arr_mock_part as $key => $val) {
            $product_info['MockPartName'][] = $arr_mock_kind_code[$val];
        }
        $takeFormsCcds = explode(',', $product_info['TakeFormsCcd']);
        $product_info['TakePart_on'] = (in_array($applyType_on, $takeFormsCcds)) ? 'Y' : 'N';
        $product_info['TakePart_off'] = (in_array($applyType_off, $takeFormsCcds)) ? 'Y' : 'N';

        //직렬별 과목점수
        $list_register_subject = $data_total_avg = [];
        $arr_result = $this->regGradeModel->registerForSubjectDetail($prod_code);
        if (empty($arr_result['data']) === false) {
            $list_register_subject = $arr_result['data'];
            $data_total_avg = $arr_result['total_avg'];
        }

        $arr_total_avg = [];    //원점수기준 전체평균
        foreach ($data_total_avg as $key => $row) {
            $arr_total_avg[$row['TakeMockPart']]['전체평균'] = $row['AvgAvgOrgPoint'];
            $arr_total_avg[$row['TakeMockPart']]['최고점'] = $row['AvgMaxOrgPoint'];
            $arr_total_avg[$row['TakeMockPart']]['상위10%'] = $row['AvgTop10AvgOrgPoint'];
            $arr_total_avg[$row['TakeMockPart']]['상위30%'] = $row['AvgTop30AvgOrgPoint'];
            $arr_total_avg[$row['TakeMockPart']]['표준편차'] = $row['AvgStandardDeviation'];
            $arr_total_avg[$row['TakeMockPart']]['응시인원'] = $row['AvgMemCount'];
        }

        $arr_take_mock_part = $arr_subject = $arr_subject_e = $arr_subject_s = [];
        foreach ($list_register_subject as $key => $row) {
            $arr_take_mock_part[$row['TakeMockPart']] = $row['TakeMockPartName'];
        }

        foreach ($list_register_subject as $key => $row) {
            $arr_subject[$row['MpIdx']] = $row['SubjectName'];
            if ($row['MockType'] == 'E') {
                $arr_subject_e[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            } else {
                $arr_subject_s[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            }
        }

        $data_default_e = $data_default_s = $data_e = $data_s = [];
        foreach ($list_register_subject as $key => $val) {
            if ($val['MockType'] == 'E') {
                $data_e['전체평균'][$val['TakeMockPart']][$val['MpIdx']] = $val['AvgOrgPoint'];
                $data_e['최고점'][$val['TakeMockPart']][$val['MpIdx']] = $val['MaxOrgPoint'];
                $data_e['상위10%'][$val['TakeMockPart']][$val['MpIdx']] = $val['Top10AvgOrgPoint'];
                $data_e['상위30%'][$val['TakeMockPart']][$val['MpIdx']] = $val['Top30AvgOrgPoint'];
                $data_default_e['표준편차'][$val['TakeMockPart']][$val['MpIdx']] = $val['StandardDeviation'];
                $data_default_e['응시인원'][$val['TakeMockPart']][$val['MpIdx']] = $val['MemCount'];
            }

            if ($val['MockType'] == 'S') {
                $data_s['전체평균'][$val['TakeMockPart']][$val['MpIdx']]['org'] = $val['AvgOrgPoint'];
                $data_s['전체평균'][$val['TakeMockPart']][$val['MpIdx']]['adjust'] = $val['AvgAdjustPoint'];
                $data_s['최고점'][$val['TakeMockPart']][$val['MpIdx']]['org'] = $val['MaxOrgPoint'];
                $data_s['최고점'][$val['TakeMockPart']][$val['MpIdx']]['adjust'] = $val['MaxAdjustPoint'];
                $data_s['상위10%'][$val['TakeMockPart']][$val['MpIdx']]['org'] = $val['Top10AvgOrgPoint'];
                $data_s['상위10%'][$val['TakeMockPart']][$val['MpIdx']]['adjust'] = $val['Top10AvgAdjustPoint'];
                $data_s['상위30%'][$val['TakeMockPart']][$val['MpIdx']]['org'] = $val['Top30AvgOrgPoint'];
                $data_s['상위30%'][$val['TakeMockPart']][$val['MpIdx']]['adjust'] = $val['Top30AvgAdjustPoint'];
                $data_default_s['표준편차'][$val['TakeMockPart']][$val['MpIdx']] = $val['StandardDeviation'];
                $data_default_s['응시인원'][$val['TakeMockPart']][$val['MpIdx']] = $val['MemCount'];
            }
        }

        // 과목별, 문항별 마킹 통계
        $arr_answer_stats = [];
        $arr_answernum = $this->regGradeModel->PaperAnswerNumList($prod_code);
        $answer_stats = $this->regGradeModel->AnswerStatsList($prod_code);
        foreach ($answer_stats as $key => $row) {
            $arr_answer_stats[$row['MpIdx']][$row['QuestionNO']]['RightAnswer'] = $row['RightAnswer'];
            foreach ($arr_answernum as $answer_key => $answer_val) {
                if (empty($arr_answernum[$row['MpIdx']]) === false) {
                    for ($i=1; $i<=$answer_val; $i++) {
                        if ($i == $row['Answer']) {
                            $arr_answer_stats[$row['MpIdx']][$row['QuestionNO']]['Answer'][$i]['count'] = $row['AnsCount'];
                            $arr_answer_stats[$row['MpIdx']][$row['QuestionNO']]['Answer'][$i]['avg'] = $row['AnswerAvg'];
                        } else if ($row['Answer'] == 'N') {
                            $arr_answer_stats[$row['MpIdx']][$row['QuestionNO']]['Answer']['N']['count'] = $row['AnsCount'];
                            $arr_answer_stats[$row['MpIdx']][$row['QuestionNO']]['Answer']['N']['avg'] = $row['AnswerAvg'];
                        }
                    }
                }
            }
        }

        $this->load->view('mocktestNew/statistics/grade/detail', [
            'product_info' => $product_info,
            'list_register_subject' => $list_register_subject,
            'arr_take_mock_part' => $arr_take_mock_part,
            'arr_subject_e' => $arr_subject_e,
            'arr_subject_s' => $arr_subject_s,
            'data_e' => $data_e,
            'data_s' => $data_s,
            'data_default_e' => $data_default_e,
            'data_default_s' => $data_default_s,
            'arr_total_avg' => $arr_total_avg,
            'arr_subject' => $arr_subject,
            'arr_answernum' => $arr_answernum,
            'arr_answer_stats' => $arr_answer_stats
        ]);
    }

    public function scoreMultiAjax()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $formData = $this->_reqP(null, false);
        $prod_code = element('prod_code', $formData);
        $result = $this->regGradeModel->scoreMulti($prod_code);
        $this->json_result($result, '처리완료되었습니다.', $result);
    }

    /**
     * 답안 재검
     */
    public function reGradingAjax()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $formData = $this->_reqP(null, false);
        $prod_code = element('prod_code', $formData);
        $result = $this->regGradeModel->reGrading($prod_code);
        /*$this->json_result($result['ret_cd'], $result['ret_msg']);*/
        $this->json_result($result, $result['ret_msg'], $result);
    }

    /**
     * 정답제출
     */
    public function answerSaveAjax()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required'],
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->regGradeModel->answerSave($this->_reqP(null, false));
        $this->json_result($result, $result['ret_msg'], $result);
    }

    /**
     * 응시상태변경
     */
    public function storeIsTakeAjax()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required'],
            ['field' => 'mem_idx', 'label' => '회원식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->regGradeModel->updateForIsTake($this->_reqP(null, false));
        $this->json_result($result, $result['ret_msg'], $result);
    }

    /**
     * 조정점수반영
     */
    public function scoreMakeAjax()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $formData = $this->_reqP(null, false);
        $prod_code = element('prod_code', $formData);
        $result = $this->regGradeModel->scoreMake($prod_code, 'web');
        $this->json_result($result, '저장되었습니다.', $result);
    }


    /**
     * 통계페이지 : 문항,점수별 통계 (그래프)
     * @param array $params
     */
    public function detailScore($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $prod_code = $params[0];

        $product_info = $this->regGradeModel->productInfo($prod_code);
        if (empty($product_info) === true) {
            show_error('조회된 상품이 없습니다.');
        }

        $arr_totalStatistics = $this->_totalStatistics($prod_code);
        if (empty($arr_totalStatistics['base_statistisc']) === true) {
            show_alert('통계에 필요한 사용자 기본정보가 없습니다.', 'back');
        }

        $arr_pointForStatistics = $this->_pointForStatistics2($prod_code,$arr_totalStatistics['base_statistisc']['BaseScoring']);

        $avg_score_10 = $this->_pointAvgForRankStatistics($prod_code,'10','group');
        $avg_score_25 = $this->_pointAvgForRankStatistics($prod_code,'25','group');
        $avg_score_total = $this->_pointAvgForRankStatistics($prod_code,'total','group');

        $this->load->view('mocktestNew/statistics/grade/detail_score', [
            'product_info' => $product_info,
            'base_statistisc' => $arr_totalStatistics['base_statistisc'],
            'data_total_statistics' => $arr_totalStatistics['data_total_statistics'],
            'data_total_point_statistics' => $arr_pointForStatistics['data_total_point_statistics'],
            'data_total_point_chart' => $arr_pointForStatistics['data_total_point_chart'],
            'data_max_cnt' => $arr_pointForStatistics['data_max_cnt'],
            'data_avg_score_10' => $avg_score_10,
            'data_avg_score_25' => $avg_score_25,
            'data_avg_score_total' => $avg_score_total
        ]);
    }

    /**
     * 통계페이지 : 문항별 상세 통계 (테이블)
     * @param array $params
     */
    public function detailScore2($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $prod_code = $params[0];

        $product_info = $this->regGradeModel->productInfo($prod_code);
        if (empty($product_info) === true) {
            show_error('조회된 상품이 없습니다.');
        }

        $arr_totalStatistics = $this->_totalStatistics($prod_code);
        if (empty($arr_totalStatistics['base_statistisc']) === true) {
            show_alert('통계에 필요한 사용자 기본정보가 없습니다.','back');
        }

        $arr_question_data = [];
        $result_data = $this->regGradeModel->totalStatistics2($prod_code);
        foreach ($result_data as $row) {
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['TakeMockPart'] = $row['TakeMockPart'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['AreaName'] = $row['AreaName'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['SubjectName'] = $row['SubjectName'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['MpIdx'] = $row['MpIdx'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['MockType'] = $row['MockType'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['MqIdx'] = $row['MqIdx'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['QuestionNO'] = $row['QuestionNO'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['RightAnswer'] = $row['RightAnswer'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['Scoring'] = $row['Scoring'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['Difficulty'] = $row['Difficulty'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['QAVR_Top10'] = $row['QAVR_Top10'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['QAVR_Top25'] = $row['QAVR_Top25'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['QAVR_Total'] = $row['QAVR_Total'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['marking_cnt_num_1'] = $row['marking_cnt_num_1'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['marking_cnt_num_2'] = $row['marking_cnt_num_2'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['marking_cnt_num_3'] = $row['marking_cnt_num_3'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['marking_cnt_num_4'] = $row['marking_cnt_num_4'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['marking_cnt_num_5'] = $row['marking_cnt_num_5'];
            $arr_question_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']]['total_marking_cnt'] = $row['total_marking_cnt'];
        }

        $this->load->view('mocktestNew/statistics/grade/detail_score2', [
            'product_info' => $product_info,
            'base_statistisc' => $arr_totalStatistics['base_statistisc'],
            'data_total_statistics' => $arr_totalStatistics['data_total_statistics'],
            'arr_question_data' => $arr_question_data
        ]);
    }

    /**
     * 회원별 마킹정보 엑셀다운로드
     */
    public function answerDataExcel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        if (empty($this->_reqP('prod_code')) === true) {
            show_alert('필수 값 누락','back');
        }

        $prod_code = $this->_reqP('prod_code');
        $headers = ['직렬','과목','응시번호','이름'];
        $number = [];
        for($i=1; $i<=40; $i++) {
            array_push($number, $i);
        }
        $headers = array_merge($headers, $number);
        $file_name = '회원별 마킹정보_' . $prod_code . '_' . date('Y-m-d');

        $arr_condition = ['EQ' => ['a.ProdCode' => $prod_code]];
        $list = $this->regGradeModel->answerDataExcel($arr_condition);

        $excel_data = [];
        foreach ($list as $key => $row) {
            $excel_data[$key]['TakeMockPartName'] = $row['TakeMockPartName'];
            $excel_data[$key]['SubjectName'] = $row['SubjectName'];
            $excel_data[$key]['TakeNumber'] = $row['TakeNumber'];
            $excel_data[$key]['MemName'] = $row['MemName'];
            $arr_answer = explode(',',$row['Answer']);
            foreach ($arr_answer as $a_key => $a_val) {
                $excel_data[$key][$a_key] = $a_val;
            }
        }

        $download_query = $this->regGradeModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($excel_data)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $excel_data, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }


    /**
     * 전체 평균
     * @param string $prod_code
     * @return array
     */
    private function _totalStatistics($prod_code = '')
    {
        $base_statistisc = []; //직렬,과목코드 셋팅
        $data_total_statistics = [];

        $result_total_statistics = $this->regGradeModel->totalStatistics($prod_code);
        foreach ($result_total_statistics as $row) {
            $base_statistisc['TakeMockPart'][$row['TakeMockPart']] = $row['TakeMockPartName'];
            $base_statistisc['MpIdx'][$row['MpIdx']] = $row['SubjectName'];
            $base_statistisc['TotalQuestionCount'][$row['MpIdx']] = $row['count_question'];
            $base_statistisc['BaseScoring'][$row['MpIdx']] = $row['BaseScoring'];

            $data_total_statistics[$row['TakeMockPart']][$row['MpIdx']]['sum_scoring'] = $row['sum_scoring'];
            $data_total_statistics[$row['TakeMockPart']][$row['MpIdx']]['reg_member_cnt'] = $row['reg_member_cnt'];
            $data_total_statistics[$row['TakeMockPart']][$row['MpIdx']]['avg_scoring'] = $row['avg_scoring'];
            $data_total_statistics[$row['TakeMockPart']][$row['MpIdx']]['max_scoring'] = $row['max_scoring'];
        }

        return [
            'base_statistisc' => $base_statistisc,
            'data_total_statistics' => $data_total_statistics,
        ];
    }

    /**
     * 점수별 분포표,인원,누계,백분률
     * @param string $prod_code
     * @param array $arr_base_scoring
     * @return array|null
     */
    private function _pointForStatistics2($prod_code = '', $arr_base_scoring = [])
    {
        $temp_data_2_5 = [];
        $temp_data_4 = [];
        $temp_data_5 = [];
        $result = [];

        foreach ($arr_base_scoring as $mock_key => $val) {
            switch ($val) {
                case "2.5":
                    $temp_data_2_5 = array_merge($temp_data_2_5, $this->regGradeModel->pointForStatistics_2_5($prod_code,$mock_key));
                    break;
                case "4":
                    $temp_data_4 = array_merge($temp_data_4, $this->regGradeModel->pointForStatistics_4($prod_code,$mock_key));
                    break;
                case "5":
                    $temp_data_5 = array_merge($temp_data_5, $this->regGradeModel->pointForStatistics_5($prod_code,$mock_key));
                    break;
                default;
                    $temp_data_2_5 = array_merge($temp_data_2_5, $this->regGradeModel->pointForStatistics_2_5($prod_code,$mock_key));
            }
        }

        $result_2_5 = $this->_get_total_point_chart_2_5($temp_data_2_5);
        $result_4 = $this->_get_total_point_chart_4($temp_data_4);
        $result_5 = $this->_get_total_point_chart_5($temp_data_5);

        $result = array_replace_recursive($result, $result_2_5);
        $result = array_replace_recursive($result, $result_4);
        $result = array_replace_recursive($result, $result_5);

        return $result;
    }

    /**
     * 2.5 배점
     * @param $result_point_statistics
     * @return array[]
     */
    private function _get_total_point_chart_2_5($result_point_statistics)
    {
        $temp_data_max_cnt = [];
        $data_max_cnt = [];
        $data_total_point_statistics = [];
        $data_total_point_chart = [];

        foreach ($result_point_statistics as $row) {
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] = $row['t_point'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['cnt'] = $row['cnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['sumCnt'] = $row['sumCnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['tavg'] = $row['tavg'];
            $temp_data_max_cnt[$row['listMockPart']][$row['MpIdx']][] = $row['cnt'];

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 7.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][0][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 7.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 17.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][1][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 17.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 27.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][2][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 27.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 37.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][3][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 37.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 47.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][4][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 47.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 57.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][5][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 57.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 67.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][6][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 67.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 77.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][7][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 77.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 87.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][8][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 87.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 97.5) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][9][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 97.5 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 100) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][10][$row['t_point']] = $row['cnt'];
            }
        }
        foreach ($temp_data_max_cnt as $m_key => $m_row) {
            foreach ($m_row as $p_key => $p_row) {
                $data_max_cnt[$m_key][$p_key] = max(array_values($p_row));
            }
        }

        return [
            'data_total_point_statistics' => $data_total_point_statistics,
            'data_total_point_chart' => $data_total_point_chart,
            'data_max_cnt' => $data_max_cnt,
        ];
    }

    /**
     * 4점 배점
     * @param $result_point_statistics
     * @return array[]
     */
    private function _get_total_point_chart_4($result_point_statistics)
    {
        $temp_data_max_cnt = [];
        $data_max_cnt = [];
        $data_total_point_statistics = [];
        $data_total_point_chart = [];

        foreach ($result_point_statistics as $row) {
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] = $row['t_point'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['cnt'] = $row['cnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['sumCnt'] = $row['sumCnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['tavg'] = $row['tavg'];
            $temp_data_max_cnt[$row['listMockPart']][$row['MpIdx']][] = $row['cnt'];

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 12) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][0][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 12 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 28) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][1][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 28 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 44) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][2][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 44 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 60) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][3][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 60 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 76) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][4][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 76 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 96) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][5][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 96 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 100) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][6][$row['t_point']] = $row['cnt'];
            }
        }
        foreach ($temp_data_max_cnt as $m_key => $m_row) {
            foreach ($m_row as $p_key => $p_row) {
                $data_max_cnt[$m_key][$p_key] = max(array_values($p_row));
            }
        }

        return [
            'data_total_point_statistics' => $data_total_point_statistics,
            'data_total_point_chart' => $data_total_point_chart,
            'data_max_cnt' => $data_max_cnt,
        ];
    }

    /**
     * 5점 배점
     * @param $result_point_statistics
     * @return array[]
     */
    private function _get_total_point_chart_5($result_point_statistics)
    {
        $temp_data_max_cnt = [];
        $data_max_cnt = [];
        $data_total_point_statistics = [];
        $data_total_point_chart = [];

        foreach ($result_point_statistics as $row) {
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] = $row['t_point'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['cnt'] = $row['cnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['sumCnt'] = $row['sumCnt'];
            $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['tavg'] = $row['tavg'];
            $temp_data_max_cnt[$row['listMockPart']][$row['MpIdx']][] = $row['cnt'];

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 15) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][0][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 15 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 35) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][1][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 35 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 55) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][2][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 55 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 75) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][3][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 75 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 95) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][4][$row['t_point']] = $row['cnt'];
            }

            if ($data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] > 95 &&
                $data_total_point_statistics[$row['listMockPart']][$row['MpIdx']][$row['t_point']]['t_point'] <= 100) {
                $data_total_point_chart[$row['listMockPart']][$row['MpIdx']][5][$row['t_point']] = $row['cnt'];
            }
        }
        foreach ($temp_data_max_cnt as $m_key => $m_row) {
            foreach ($m_row as $p_key => $p_row) {
                $data_max_cnt[$m_key][$p_key] = max(array_values($p_row));
            }
        }

        return [
            'data_total_point_statistics' => $data_total_point_statistics,
            'data_total_point_chart' => $data_total_point_chart,
            'data_max_cnt' => $data_max_cnt,
        ];
    }

    /**
     *
     * @param string $prod_code
     * @param string $rank
     * @return array
     */
    private function _pointAvgForRankStatistics($prod_code = '', $rank = 'total', $type = '')
    {
        $data = [];
        $result = $this->regGradeModel->pointAvgForRankStatistics($prod_code, $rank);

        if ($type == 'group') {
            $temp_data = [];
            foreach ($result as $row) {
                $temp_data[$row['TakeMockPart']][$row['MpIdx']][$row['QuestionNO']] = $row['AvgScore'];
            }

            $data = [];
            foreach ($temp_data as $key => $row) {
                foreach ($row as $q_num => $score) {
                    $data[$key][$q_num] = array_chunk($score,5);
                }
            }
        } else {
            foreach ($result as $row) {
                $data[$row['TakeMockPart']][$row['MpIdx']][] = $row['AvgScore'];
            }
        }
        return $data;
    }
}