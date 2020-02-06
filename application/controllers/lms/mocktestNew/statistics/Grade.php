<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'controllers/lms/mocktestNew/BaseMocktest.php';

class Grade extends BaseMocktest
{
    protected $temp_models = array('mocktestNew/mockCommon', 'mocktestNew/regGrade');
    protected $helpers = array();

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

    public function detail($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $product_info = $this->regGradeModel->productInfo($params[0]);
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
        $arr_result = $this->regGradeModel->registerForSubjectDetail($params[0]);
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

        $arr_take_mock_part = $arr_subject_e = $arr_subject_s = [];
        foreach ($list_register_subject as $key => $row) {
            $arr_take_mock_part[$row['TakeMockPart']] = $row['TakeMockPartName'];
        }

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
            'arr_total_avg' => $arr_total_avg
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
}