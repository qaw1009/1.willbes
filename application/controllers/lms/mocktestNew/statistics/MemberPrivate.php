<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class MemberPrivate extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/memberPrivate');
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
        $arr_base['subject'] = $this->getSubjectArray();

        $applyArea1 = $this->mockCommonModel->_groupCcd['applyArea1'];
        $applyArea2 = $this->mockCommonModel->_groupCcd['applyArea2'];
        $codes = $this->codeModel->getCcdInArray([$applyArea1, $applyArea2]);
        $applyAreaTmp1 = array_map(function($v) { return '[지역1] '. $v; }, $codes[$applyArea1]);
        $applyAreaTmp2 = array_map(function($v) { return '[지역2] '. $v; }, $codes[$applyArea2]);
        $arr_base['applyArea'] = $applyAreaTmp1 + $applyAreaTmp2;

        $this->load->view('mocktestNew/statistics/memberPrivate/index', [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_base' => $arr_base
        ]);
    }

    public function listAjax()
    {
        $arr_condition_1 = [
            'EQ' => [
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'MR.TakeForm' => $this->_reqP('search_TakeFormsCcd'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                'C1.CateCode' => $this->_reqP('search_cateD1'),
                'MR.TakeMockPart' => $this->_reqP('search_cateD2'),
                'S.SubjectIdx' => $this->_reqP('search_subject'),
                'MR.TakeArea' => $this->_reqP('search_takeArea')
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->_reqP('search_fi', true),
                    'PD.ProdCode' => $this->_reqP('search_fi', true)
                ]
            ]
        ];

        $arr_condition_2 = [
            'ORG' => [
                'LKB' => [
                    'searchMem.MemId' => $this->_reqP('search_member_fi', true),
                    'searchMem.MemName' => $this->_reqP('search_member_fi', true)
                ]
            ]
        ];

        $list = [];
        $count = $this->memberPrivateModel->mainList(true, $arr_condition_1, $arr_condition_2);

        if ($count > 0) {
            $list = $this->memberPrivateModel->mainList(false, $arr_condition_1, $arr_condition_2, $this->_reqP('length'), $this->_reqP('start'), ['MP.ProdCode' => 'DESC', 'MR.RegDatm' => 'DESC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_condition_1 = [
            'EQ' => [
                'PD.SiteCode' => $this->_reqP('search_site_code'),
                'MR.TakeForm' => $this->_reqP('search_TakeFormsCcd'),
                'MP.MockYear' => $this->_reqP('search_year'),
                'MP.MockRotationNo' => $this->_reqP('search_round'),
                'C1.CateCode' => $this->_reqP('search_cateD1'),
                'MR.TakeMockPart' => $this->_reqP('search_cateD2'),
                'S.SubjectIdx' => $this->_reqP('search_subject'),
                'MR.TakeArea' => $this->_reqP('search_takeArea')
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $this->_reqP('search_fi', true),
                    'PD.ProdCode' => $this->_reqP('search_fi', true)
                ]
            ]
        ];

        $arr_condition_2 = [
            'ORG' => [
                'LKB' => [
                    'searchMem.MemId' => $this->_reqP('search_member_fi', true),
                    'searchMem.MemName' => $this->_reqP('search_member_fi', true)
                ]
            ]
        ];
        $results = $this->memberPrivateModel->mainList('excel', $arr_condition_1, $arr_condition_2);
        $file_name = '개인별성적통계_'.date('Ymd');
        $headers = ['회원명', '연락처', '응시번호', '응시형태', '연도', '회차', '모의고사명', '카테고리', '직렬', '과목', '응시지역', '총점', '등록일'];

        $last_query = $this->memberPrivateModel->getLastQuery();
        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($last_query, $file_name, count($results)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }

    /**
     * 개인성적확인
     * @param array $params
     */
    public function memberGrades($params = [])
    {
        if (empty($params) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $arr_base['prod_code'] = $params[0];
        $arr_base['mr_idx'] = $params[1];
        $privateExamInfo = $this->memberPrivateModel->privateExamInfo($arr_base['prod_code'], $arr_base['mr_idx']);

        //회원과목별점수
        $arr_result = $this->memberPrivateModel->registerForSubjectDetail($arr_base['prod_code'], $arr_base['mr_idx']);

        //전체과목평균
        $sumRank = $this->memberPrivateModel->subjectAllAvg($arr_base['prod_code'], $arr_base['mr_idx']);
        $arr_data = $this->_setData($arr_result, $sumRank);

        $this->load->view('mocktestNew/statistics/memberPrivate/member_grades', [
            'arr_base' => $arr_base,
            'privateExamInfo' => $privateExamInfo,
            'arr_subject_e' => $arr_data['arr_subject_e'],
            'arr_subject_s' => $arr_data['arr_subject_s'],
            'data_e' => $arr_data['data_e'],
            'data_s' => $arr_data['data_s'],
            'data_default_e' => $arr_data['data_default_e'],
            'data_default_s' => $arr_data['data_default_s'],
            'arr_total_avg' => $arr_data['arr_total_avg']
        ]);
    }

    /**
     * 전체성적분석
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
                //'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        //기본정보
        $productInfo = $this->memberPrivateModel->registerInfo($arr_condition);
        if (empty($productInfo) === true) {
            show_alert('조회된 기본정보가 없습니다.', 'close');
        }

        //종합분석
        $gradeInfo = $this->memberPrivateModel->gradeInfo($prod_code, $mr_idx);

        //평균점수 분포
        $selectivityInfo = $this->memberPrivateModel->selectivity($prod_code);

        //과목별 점수
        $subject_result = $this->memberPrivateModel->registerForSubjectDetail($prod_code, $mr_idx);
        $subject_data = $this->_setSubjectData($subject_result['data']);

        $this->load->view('mocktestNew/statistics/memberPrivate/stat_total', [
            'page_type' => 'total',
            'productInfo' => $productInfo,
            'gradeInfo' => $gradeInfo,
            'selectivityInfo' => $selectivityInfo,
            'subject_graph' => $subject_result['data'],
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

        $arr_condition = [
            'EQ' => [
                'mr.ProdCode' => $prod_code,
                'mr.MrIdx' => $mr_idx,
                /*'mr.MemIdx' => $this->session->userdata('mem_idx')*/
            ]
        ];

        //기본정보
        $productInfo = $this->memberPrivateModel->registerInfo($arr_condition);
        if (empty($productInfo) === true) {
            show_alert('조회된 기본정보가 없습니다.', 'close');
        }

        //과목별,문항별 분석데이터
        $data = $this->memberPrivateModel->gradeSubjectDetail($prod_code, $mr_idx);
        $subject_detail_data = $this->_setGradeSubjectDetailData($data);

        //과목별, 문제영역별 데이터
        $data = $this->memberPrivateModel->gradeSubjectAreaData($prod_code, $mr_idx);
        $arr_area_data = $this->_setGradeSubjectAreaData($data);

        $this->load->view('mocktestNew/statistics/memberPrivate/stat_subject', [
            'page_type' => 'subject',
            'productInfo' => $productInfo,
            'subject_detail_data' => $subject_detail_data,
            'subject_data' => $arr_area_data['arr_subject_data'],
            'area_data' => $arr_area_data['arr_area_data']
        ]);
    }

    /**
     * 데이터 가공
     * @param $arr_result
     * @param $sum_rank : 전체석차
     * @return array
     */
    private function _setData($arr_result, $sum_rank)
    {
        $list_register_subject = $data_total_avg = [];

        if (empty($arr_result['data']) === false) {
            $list_register_subject = $arr_result['data'];
            $data_total_avg = $arr_result['total_avg'];
        }

        $arr_total_avg = [];    //원점수기준 전체평균
        $arr_sum_rank = explode("/",$sum_rank);
        foreach ($data_total_avg as $key => $row) {
            $arr_total_avg['본인'] = $row['AvgMyOrgPoint'];
            $arr_total_avg['전체평균'] = $row['AvgAvgAdjustPoint'];
            $arr_total_avg['과목석차'] = $sum_rank;
            $arr_total_avg['백분위'] = (empty($sum_rank) === false) ? round(($arr_sum_rank[0] / $arr_sum_rank[1]) * 100,2).'%' : '';
            $arr_total_avg['최고점'] = $row['AvgMaxAdjustPoint'];
            $arr_total_avg['상위10%'] = $row['AvgTop10AvgAdjustPoint'];
            $arr_total_avg['상위30%'] = $row['AvgTop30AvgAdjustPoint'];
            $arr_total_avg['표준편차'] = $row['AvgStandardDeviation'];
        }

        $arr_subject_e = $arr_subject_s = [];
        foreach ($list_register_subject as $key => $row) {
            if ($row['MockType'] == 'E') {
                $arr_subject_e[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            } else {
                $arr_subject_s[$row['MpIdx']]['subject_name'] = $row['SubjectName'];
            }
        }

        $data_default_e = $data_default_s = $data_e = $data_s = [];
        foreach ($list_register_subject as $key => $val) {
            if ($val['MockType'] == 'E') {
                $data_e['본인'][$val['MpIdx']] = $val['MyOrgPoint'];
                $data_e['전체평균'][$val['MpIdx']] = $val['AvgOrgPoint'];
                $data_e['과목석차'][$val['MpIdx']] = $val['MyRank'].'/'.$val['TotalRank'].' ['.$val['MemCount'].']';
                $data_e['백분위'][$val['MpIdx']] = $val['tpct'].'%';
                $data_e['최고점'][$val['MpIdx']] = $val['MaxOrgPoint'];
                $data_e['상위10%'][$val['MpIdx']] = $val['Top10AvgOrgPoint'];
                $data_e['상위30%'][$val['MpIdx']] = $val['Top30AvgOrgPoint'];
                $data_default_e['표준편차'][$val['MpIdx']] = $val['StandardDeviation'];
            }

            if ($val['MockType'] == 'S') {
                $data_s['본인'][$val['MpIdx']]['org'] = $val['MyOrgPoint'];
                $data_s['본인'][$val['MpIdx']]['adjust'] = $val['MyAdjustPoint'];
                $data_s['전체평균'][$val['MpIdx']]['org'] = $val['AvgOrgPoint'];
                $data_s['전체평균'][$val['MpIdx']]['adjust'] = $val['AvgAdjustPoint'];
                $data_s['과목석차'][$val['MpIdx']]['org'] = $val['MyRank'].'/'.$val['TotalRank'].' ['.$val['MemCount'].']';
                $data_s['과목석차'][$val['MpIdx']]['adjust'] = $val['MyRank'].'/'.$val['TotalRank'].' ['.$val['MemCount'].']';
                $data_s['백분위'][$val['MpIdx']]['org'] = $val['tpct'].'%';
                $data_s['백분위'][$val['MpIdx']]['adjust'] = $val['tpct'].'%';
                $data_s['최고점'][$val['MpIdx']]['org'] = $val['MaxOrgPoint'];
                $data_s['최고점'][$val['MpIdx']]['adjust'] = $val['MaxAdjustPoint'];
                $data_s['상위10%'][$val['MpIdx']]['org'] = $val['Top10AvgOrgPoint'];
                $data_s['상위10%'][$val['MpIdx']]['adjust'] = $val['Top10AvgAdjustPoint'];
                $data_s['상위30%'][$val['MpIdx']]['org'] = $val['Top30AvgOrgPoint'];
                $data_s['상위30%'][$val['MpIdx']]['adjust'] = $val['Top30AvgAdjustPoint'];
                $data_default_s['표준편차'][$val['MpIdx']] = $val['StandardDeviation'];
            }
        }

        return [
            'arr_total_avg' => $arr_total_avg,
            'arr_subject_e' => $arr_subject_e,
            'arr_subject_s' => $arr_subject_s,
            'data_default_e' => $data_default_e,
            'data_default_s' => $data_default_s,
            'data_e' => $data_e,
            'data_s' => $data_s
        ];
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