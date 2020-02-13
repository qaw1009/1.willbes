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
                //'MP.IsStatus' => 'Y',
                'MR.MemIdx'   => $this->session->userdata('mem_idx'),
                'OP.PayStatusCcd' => '676001',
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
            'productInfo' => $productInfo,
            'gradeInfo' => $gradeInfo,
            'selectivityInfo' => $selectivityInfo,
            'subject_graph' => $subject_result,
            'subject_data' => $subject_data
        ]);
    }

    public function winStatSubject()
    {
        $prod_code = $this->_reqG("prod_code");
        $mr_idx = $this->_reqG("mr_idx");
        if (empty($prod_code) === true || empty($mr_idx) === true) {
            show_alert('잘못된 접근입니다.', 'close');
        }

        
    }

    /**
     * 데이터 가공
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
}