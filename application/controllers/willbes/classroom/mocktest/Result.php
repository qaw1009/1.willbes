<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends \app\controllers\FrontController
{
    protected $models = array('downloadF','_lms/sys/code','mocktestNew/mockResultF', 'mocktestNew/mockExamF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/mocktest/result';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_paging_count_m = 5;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $list = [];
        $total_img_path = PUBLICURL."uploads/willbes/mocktest/";
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);

        $s_keyword = element('s_keyword',$arr_input);
        $get_page_params = 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx'   => $this->session->userdata('mem_idx'),
                'MR.IsStatus' => 'Y'
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $s_keyword
                ]
            ]
        ];

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockResultFModel->listExam(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index?'.$get_page_params, $total_rows, $this->_paging_limit, $paging_count,true);

        if ($total_rows > 0) {
            $list = $this->mockResultFModel->listExam(false, $arr_condition, $paging['limit'], $paging['offset'], ['O.CompleteDatm'=>'DESC', 'MP.ProdCode'=>'DESC']);
        }

        $this->load->view('/classroom/mocktestNew/result/index', [
            'page_type' => 'result',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'total_img_path' => $total_img_path,
            'list' => $list,
            'paging' => $paging,
            'userid' => $this->session->userdata('mem_id')
        ]);
    }

    /**
     * 과목파일 정보 리스트
     * @return CI_Output
     */
    public function findSubjectFileAjax()
    {
        $prod_code = $this->_req("prod_code");
        $list = $this->mockResultFModel->findSubjectFile($prod_code);
        return $this->response([
            'data' => $list
        ]);
    }

    /**
     * 전체 성적 분석
     */
    public function winStatTotal()
    {
        $prod_code = $this->_reqG("prod_code");
        $mr_idx = $this->_reqG("mr_idx");
        if (empty($prod_code) === true || empty($mr_idx) === true) {
            show_alert('잘못된 접근입니다.', 'close');
        }

        $arr_condition = [
            'EQ' => [
                'mr.ProdCode' => $prod_code,
                'mr.MrIdx' => $mr_idx,
                'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        //기본정보
        $productInfo = $this->mockExamFModel->registerInfo($arr_condition);
        if (empty($productInfo) === true) {
            show_alert('조회된 기본정보가 없습니다.', 'close');
        }

        //종합분석
        $gradeInfo = $this->mockResultFModel->gradeInfo($prod_code, $mr_idx);

        //평균점수 분포
        $selectivityInfo = $this->mockResultFModel->selectivity($prod_code);

        //과목별 점수
        $subject_result = $this->mockResultFModel->registerForSubjectDetail($prod_code, $mr_idx);
        $subject_data = $this->_setSubjectData($subject_result);

        $this->load->view('/classroom/mocktestNew/result/stat_total', [
            'page_type' => 'total',
            'productInfo' => $productInfo,
            'gradeInfo' => $gradeInfo,
            'selectivityInfo' => $selectivityInfo,
            'subject_graph' => $subject_result,
            'subject_data' => $subject_data
        ]);
    }

    /**
     * 과목별 문항분석
     */
    public function winStatSubject()
    {
        $prod_code = $this->_reqG("prod_code");
        $mr_idx = $this->_reqG("mr_idx");
        if (empty($prod_code) === true || empty($mr_idx) === true) {
            show_alert('잘못된 접근입니다.', 'close');
        }

        $arr_condition = [
            'EQ' => [
                'mr.ProdCode' => $prod_code,
                'mr.MrIdx' => $mr_idx,
                'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        //기본정보
        $productInfo = $this->mockExamFModel->registerInfo($arr_condition);
        if (empty($productInfo) === true) {
            show_alert('조회된 기본정보가 없습니다.', 'close');
        }

        //과목별,문항별 분석데이터
        $data = $this->mockResultFModel->gradeSubjectDetail($prod_code, $mr_idx);
        $subject_detail_data = $this->_setGradeSubjectDetailData($data);

        //과목별, 문제영역별 데이터
        $data = $this->mockResultFModel->gradeSubjectAreaData($prod_code, $mr_idx);
        $arr_area_data = $this->_setGradeSubjectAreaData($data);

        $this->load->view('/classroom/mocktestNew/result/stat_subject', [
            'page_type' => 'subject',
            'productInfo' => $productInfo,
            'subject_detail_data' => $subject_detail_data,
            'subject_data' => $arr_area_data['arr_subject_data'],
            'area_data' => $arr_area_data['arr_area_data']
        ]);
    }

    /**
     * 오답노트
     */
    public function winAnswerNote()
    {
        $prod_code = $this->_reqG("prod_code");
        $mr_idx = $this->_reqG("mr_idx");
        if (empty($prod_code) === true || empty($mr_idx) === true) {
            show_alert('잘못된 접근입니다.', 'close');
        }

        $arr_condition = [
            'EQ' => [
                'mr.ProdCode' => $prod_code,
                'mr.MrIdx' => $mr_idx,
                'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        //기본정보
        $productInfo = $this->mockExamFModel->registerInfo($arr_condition);
        if (empty($productInfo) === true) {
            show_alert('조회된 기본정보가 없습니다.', 'close');
        }

        $arr_base['subject_data'] = $this->_setSubjectForSelectBoxData($productInfo['subject_names']);
        $arr_base['area_data'] = $this->mockResultFModel->areaList($arr_base['subject_data']);

        $this->load->view('/classroom/mocktestNew/result/wrong_answer_note', [
            'page_type' => 'answer',
            'productInfo' => $productInfo,
            'arr_base' => $arr_base,
        ]);
    }

    /**
     * 오답노트 리스트
     */
    public function areaListHtml()
    {
        $arr_input = $this->_reqP(null);
        $prod_code = element('prod_code',$arr_input);
        $mr_idx = element('mr_idx',$arr_input);
        $mp_idx = element('mp_idx',$arr_input);
        $is_wrong_type = element('is_wrong_type',$arr_input);
        $question_view_type = element('question_view_type',$arr_input, '');
        $mal_idx = element('mal_idx',$arr_input);
        $wrong_note_type = element('wrong_note_type',$arr_input);

        if (empty($prod_code) === true || empty($mr_idx) === true || empty($mp_idx) === true) {
            show_error('잘못된 접근입니다.');
        }

        $arr_condition = [
            'EQ' => [
                'MP.MpIdx' => $mp_idx,
                'AP.IsWrong' => $is_wrong_type,
            ],
            'IN' => [
                'MQ.MalIdx' => $mal_idx
            ]
        ];

        $answer_note_list = $this->mockResultFModel->answerForNoteList($prod_code, $mr_idx, $arr_condition, $wrong_note_type);
        $this->load->view('/classroom/mocktestNew/result/area_list_html', [
            'question_view_type' => $question_view_type,
            'answer_note_list' => $answer_note_list
        ]);
    }

    /**
     * 오답노트 저장
     */
    public function addNoteAjax()
    {
        $rules = [
            ['field' => 'regi_prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_mr_idx', 'label' => '모의고사접수식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_mp_idx', 'label' => '과목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'regi_mq_idx', 'label' => '문항식별자', 'rules' => 'trim|required|integer']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->mockResultFModel->addNote($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    public function deleteNoteAjax()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'memo_id', 'label' => '메모식별자', 'rules' => 'trim|required|integer']
        ];
        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->mockResultFModel->deleteNote($this->_reqP(null, false));
        $this->json_result($result, '삭제되었습니다.', $result);
    }

    /**
     * 과목데이터 추출
     * @param $subject_data
     * @return array
     */
    private function _setSubjectForSelectBoxData($subject_data)
    {
        $temp_subject_depth1 = explode(',', $subject_data);
        $temp_subject_depth2 = [];
        foreach ($temp_subject_depth1 as $key => $val) {
            $temp_subject_depth2[] = explode('|', $val);
        }

        $arr_subject = [];
        foreach ($temp_subject_depth2 as $rows) {
            $arr_temps = explode('@',$rows[1]);
            $arr_subject[$arr_temps[0]] = $arr_temps[1];
        }

        return $arr_subject;
    }

    /**
     * 과목별 점수 데이터 가공
     * @param $subject_result
     * @return array
     */
    private function _setSubjectData($subject_result)
    {
        $arr_subject_e = $arr_subject_s = [];
        foreach ($subject_result as $key => $row) {
            if ($row['MockType'] == 'E') {
                $arr_subject_e[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            } else {
                $arr_subject_s[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            }
        }

        $data_default_e = $data_default_s = $data_e = $data_s = [];
        foreach ($subject_result as $key => $val) {
            if ($val['MockType'] == 'E') {
                $data_e['본인'][$val['MpIdx']] = $val['MyOrgPoint'];
                $data_e['전체'][$val['MpIdx']] = $val['AvgOrgPoint'];
                $data_e['최고점'][$val['MpIdx']] = $val['MaxOrgPoint'];
                $data_e['과목석차'][$val['MpIdx']] = $val['MyRank'].'/'.$val['TotalRank'];
                $data_e['상위10%'][$val['MpIdx']] = $val['Top10AvgOrgPoint'];
                $data_e['상위30%'][$val['MpIdx']] = $val['Top30AvgOrgPoint'];
                /*$data_default_e['표준편차'][$val['MpIdx']] = $val['StandardDeviation'];*/
            }

            if ($val['MockType'] == 'S') {
                $data_s['본인'][$val['MpIdx']]['org'] = $val['MyOrgPoint'];
                $data_s['본인'][$val['MpIdx']]['adjust'] = $val['MyAdjustPoint'];
                $data_s['전체'][$val['MpIdx']]['org'] = $val['AvgOrgPoint'];
                $data_s['전체'][$val['MpIdx']]['adjust'] = $val['AvgAdjustPoint'];
                $data_s['최고점'][$val['MpIdx']]['org'] = $val['MaxOrgPoint'];
                $data_s['최고점'][$val['MpIdx']]['adjust'] = $val['MaxAdjustPoint'];
                $data_s['과목석차'][$val['MpIdx']]['org'] = $val['MyRank'].'/'.$val['TotalRank'];
                $data_s['과목석차'][$val['MpIdx']]['adjust'] = $val['MyRank'].'/'.$val['TotalRank'];
                $data_s['상위10%'][$val['MpIdx']]['org'] = $val['Top10AvgOrgPoint'];
                $data_s['상위10%'][$val['MpIdx']]['adjust'] = $val['Top10AvgAdjustPoint'];
                $data_s['상위30%'][$val['MpIdx']]['org'] = $val['Top30AvgOrgPoint'];
                $data_s['상위30%'][$val['MpIdx']]['adjust'] = $val['Top30AvgAdjustPoint'];
                /*$data_default_s['표준편차'][$val['MpIdx']] = $val['StandardDeviation'];*/
            }
        }

        return [
            'arr_subject_e' => $arr_subject_e,
            'arr_subject_s' => $arr_subject_s,
            'data_default_e' => $data_default_e,
            'data_default_s' => $data_default_s,
            'data_e' => $data_e,
            'data_s' => $data_s
        ];
    }

    /**
     * 과목별,문항별 데이터 가공
     * @param $data
     * @return array
     */
    private function _setGradeSubjectDetailData($data)
    {
        $arr_data = [];
        foreach ($data as $key => $row) {
            $arr_data[$row['SubjectName']]['right_answer'][] = $row['RightAnswer'];
            $arr_data[$row['SubjectName']]['answer'][] = $row['Answer'];
            $arr_data[$row['SubjectName']]['is_wrong'][] = $row['IsWrong'];
            $arr_data[$row['SubjectName']]['QAVR'][] = $row['QAVR'];
            $arr_data[$row['SubjectName']]['difficulty'][] = $row['Difficulty'];
        }

        return $arr_data;
    }

    /**
     * 과목별, 문제영역별 데이터 가공
     * @param $data
     * @return array
     */
    private function _setGradeSubjectAreaData($data)
    {
        $arr_subject_data = $arr_area_data = [];
        foreach ($data as $key => $row) {
            $arr_subject_data[$row['MpIdx']] = $row['SubjectName'];
            $arr_area_data[$row['MpIdx']][$row['MalIdx']]['area_name'] = $row['AreaName'];
            $arr_area_data[$row['MpIdx']][$row['MalIdx']]['cnt'] = $row['sumMyYcnt'].' / '.$row['TotalCnt'];
            $arr_area_data[$row['MpIdx']][$row['MalIdx']]['avg'] = $row['avgMq'];
            $arr_area_data[$row['MpIdx']][$row['MalIdx']]['question_no'] = $row['gQuestionNo'];
            $arr_area_data[$row['MpIdx']][$row['MalIdx']]['n_question_no'] = (empty($row['nQuestionNo']) === true ? '없음' : $row['nQuestionNo']);
        }
        return [
            'arr_subject_data' => $arr_subject_data,
            'arr_area_data' => $arr_area_data
        ];
    }
}