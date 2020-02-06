<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends \app\controllers\FrontController
{
    protected $models = array('downloadF','_lms/sys/code','mocktestNew/mockExamF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = 45;
    protected $_default_path = '/classroom/mocktest/exam';
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
        $arr_input = array_merge($this->_reqG(null));
        $get_params = http_build_query($arr_input);

        $s_is_take = element('s_is_take',$arr_input);
        $s_keyword = element('s_keyword',$arr_input);

        $get_page_params = 's_is_take='.$s_is_take;
        $get_page_params .= 's_keyword='.$s_keyword;

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx'   => $this->session->userdata('mem_idx'),
                'MR.IsTake' => $s_is_take
            ],
            'ORG' => [
                'LKB' => [
                    'PD.ProdName' => $s_keyword
                ]
            ]
        ];

        $column = 'MP.*, MR.IsTake, MR.MrIdx,
                   (SELECT SiteGroupName FROM lms_site_group WHERE SiteGroupCode = (SELECT SiteGroupCode FROM lms_site WHERE SiteCode = PD.SiteCode)) AS SiteName,
                   MR.RegDatm AS IsDate,
                   PD.ProdName, PD.SaleStartDatm, PD.SaleEndDatm, PS.SalePrice, PS.RealSalePrice,
                   C1.CateName, C1.IsUse AS IsUseCate, TakeStartDatm, TakeEndDatm';

        if (APP_DEVICE == 'pc') {
            $paging_count = $this->_paging_count;
        } else {
            $paging_count = $this->_paging_count_m;
        }

        $total_rows = $this->mockExamFModel->listExam(true, $arr_condition);
        $paging = $this->pagination($this->_default_path.'/index?'.$get_page_params, $total_rows, $this->_paging_limit, $paging_count,true);

        if ($total_rows > 0) {
            $list = $this->mockExamFModel->listExam(false, $arr_condition, $column, $paging['limit'], $paging['offset'], ['O.CompleteDatm'=>'DESC', 'MP.ProdCode'=>'DESC']);
        }

        $this->load->view('/classroom/mocktestNew/exam/index', [
            'page_type' => 'exam',
            'arr_input' => $arr_input,
            'get_params' => $get_params,
            'list' => $list,
            'paging' => $paging,
        ]);
    }

    public function winpopupstep1()
    {
        $arr_input = array_merge($this->_reqG(null));
        $prod_code = element('prod_code',$arr_input);
        $mr_idx = element('mr_idx',$arr_input);
        $examData = $this->_baseExamData($prod_code, $mr_idx);

        $this->load->view('/classroom/mocktestNew/exam/winpopup_step1', [
            'productInfo' => $examData['productInfo'],
            'arr_input' => $arr_input,
            'p_cnt' => count($examData['p_subject']),
            's_cnt' => count($examData['s_subject']),
            'p_subject' => $examData['p_subject'],
            's_subject' => $examData['s_subject'],
            'qtList' => $examData['qtList']
        ]);
    }

    /**
     * 시험시작
     */
    public function storeLogToStartExam()
    {
        $prod_code = $this->_reqP("prod_code");
        $mr_idx = $this->_reqP("mr_idx");

        $arr_condition = [
            'EQ' => [
                'MR.MemIdx' => $this->session->userdata('mem_idx'),
                'MR.ProdCode' => $prod_code
            ]
        ];

        $productInfo = $this->mockExamFModel->registerInfo($arr_condition);
        if(empty($productInfo) === true){
            $this->json_error('조회된 시험정보가 없습니다.');
        }
        $result = $this->mockExamFModel->makeExamLog($productInfo['RemainSec'], $mr_idx);
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    public function winPopupStep2()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'log_idx', 'label' => '로그식별자', 'rules' => 'trim|required|integer']
        ];
        if($this->validate($rules) === false) {show_alert('잘못된 접근 입니다.', 'close');}

        $arr_input = $this->_reqP(null);
        $prod_code = element('prod_code',$arr_input);
        $mr_idx = element('mr_idx',$arr_input);
        $log_idx = element('log_idx',$arr_input);
        $remain_sec = element('remain_sec',$arr_input);

        $examData = $this->_baseExamData($prod_code, $mr_idx);
        $questionData = $this->mockExamFModel->listQuestion($prod_code, $examData['productInfo']['MpIdx']);
        $timeData = $this->mockExamFModel->callRemainTime($mr_idx);

        if (empty($remain_sec) === true) {
            if (empty($timeData['RemainSec']) === true) {
                $set_remain_sec = $examData['productInfo']['RemainSec'];
            } else {
                $set_remain_sec = $timeData['RemainSec'];
            }
        } else {
            $set_remain_sec = $remain_sec;
        }
        $this->mockExamFModel->saveTime($log_idx, $set_remain_sec);

        $this->load->view('/classroom/mocktestNew/exam/winpopup_step2', [
            'method' => 'PUT',
            'arr_input' => $arr_input,
            'examData' => $examData,
            'remain_sec' => $timeData['RemainSec'],
            'questionData' => $questionData,
        ]);
    }

    /**
     * 온라인 모의고사 팝업페이지 3단계(정답제출)
     */
    public function winpopupstep3()
    {
        $rules = [
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'log_idx', 'label' => '로그식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'remain_sec', 'label' => '남은시간', 'rules' => 'trim|required|integer']
        ];
        if($this->validate($rules) === false) {show_alert('잘못된 접근 입니다.', 'close');}

        $arr_input = $this->_reqP(null);
        $prod_code = element('prod_code',$arr_input);
        $mr_idx = element('mr_idx',$arr_input);
        $log_idx = element('log_idx',$arr_input);
        $remain_sec = element('remain_sec',$arr_input);

        $examData = $this->_baseExamData($prod_code, $mr_idx);
        if (empty($examData) === true) {show_alert('조회된 모의고사 상품이 없습니다.', 'close');}

        $timeData = $this->mockExamFModel->callRemainTime($mr_idx);
        $sec = (empty($timeData['RemainSec']) === true) ? $remain_sec : $timeData['RemainSec'];

        $arr_result = $this->_endExamValidateForReturnData($examData, $sec);
        if ($arr_result['result'] !== true) {
            $form_data = [
                'prod_code' => $prod_code,
                'mr_idx' => $mr_idx,
                'log_idx' => $log_idx
            ];
            form_data_submit($form_data, $arr_result['msg'], front_url('/classroom/mocktest/exam/winpopupstep2'));
        }

        //답안제출
        $result = $this->mockExamFModel->answerSave($this->_reqP(null, false));
        if ($result !== true) {
            show_alert($result['ret_msg'], 'close');
        }

        $this->load->view('/classroom/mocktestNew/exam/winpopup_step3', [
            'method' => 'PUT',
            'arr_input' => $arr_input,
            'productInfo' => $examData['productInfo'],
            'p_subject' => $examData['p_subject'],
            's_subject' => $examData['s_subject'],
            'p_cnt' => count($examData['p_subject']),
            's_cnt' => count($examData['s_subject']),
            'qtList' => $examData['qtList'],
            'end_time' => $arr_result['data']['end_time']
        ]);
    }

    /**
     * 시간저장
     * @return object|string
     */
    public function timeSaveAjax()
    {
        $arr_input = $this->_reqP(null);
        $LogIdx = element('log_idx',$arr_input);
        $RemainSec = element('remain_sec',$arr_input);
        $result = $this->mockExamFModel->saveTime($LogIdx, $RemainSec);
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 문항별 임시저장
     */
    public function storeRowAnswer()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'log_idx', 'label' => '로그식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'mp_idx', 'label' => '과목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'mq_idx', 'label' => '항목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'answer', 'label' => '답안', 'rules' => 'trim|required|integer'],
            ['field' => 'remain_sec', 'label' => '남은시간', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $result = $this->mockExamFModel->answerTempSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /**
     * 임시저장 전체
     */
    public function storeAnswerTemp()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'mr_idx', 'label' => '모의고사식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'log_idx', 'label' => '로그식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'mp_idx', 'label' => '과목식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'remain_sec', 'label' => '남은시간', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->mockExamFModel->answerTempAllSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /**
     * 시험종료
     * @return object|string
     */
    public function examEndAjax()
    {
        $result = $this->mockExamFModel->examEnd($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result);
    }

    /**
     * 응시한 모의고사 상품 기본정보
     * @param $prod_code
     * @param $mr_idx
     * @return array
     */
    private function _baseExamData($prod_code, $mr_idx)
    {
        if(empty($prod_code) === true || empty($mr_idx) === true){
            show_alert('잘못된 접근 입니다.', 'close');
        }

        $data = [];
        $data['p_subject'] = $data['s_subject'] = [];
        $arr_condition = [
            'EQ' => [
                'mr.ProdCode' => $prod_code,
                'mr.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ];

        $data['productInfo'] = $this->mockExamFModel->registerInfo($arr_condition);
        if(empty($data['productInfo']) === true){
            show_alert('조회된 모의고사 상품이 없습니다.', 'close');
        }

        $temp_subject_depth1 = explode(',', $data['productInfo']['subject_names']);
        $temp_subject_depth2 = [];
        foreach ($temp_subject_depth1 as $key => $val) {
            $temp_subject_depth2[] = explode('|', $val);
        }

        foreach ($temp_subject_depth2 as $rows) {
            $arr_temps = explode('@',$rows[1]);
            if ($rows[0] == 'E') {
                $data['p_subject'][$arr_temps[0]] = $arr_temps[1];
            } else if ($rows[0] == 'S') {
                $data['s_subject'][$arr_temps[0]] = $arr_temps[1];
            }
        }

        $arr_condition2 = ['IN' => ['MP.MpIdx' => explode(',', $data['productInfo']['MpIdx'])]];
        $qtCntList = $this->mockExamFModel->questionTempCnt($arr_condition2, $mr_idx);
        if(empty($qtCntList)==true){
            show_alert('문항이 등록되지 않았습니다.', 'close');
        }
        foreach ($qtCntList as $key => $val) {
            $mp_idx = $val['MpIdx'];
            $data['qtList'][$mp_idx]['CNT'] =  $val['CNT'];
            $data['qtList'][$mp_idx]['TCNT'] =  $val['TCNT'];
        }

        return $data;
    }

    /**
     * 정답제출데이터 체크 및 가공
     * @param $examData
     * @param $remain_sec
     * @return array
     */
    private function _endExamValidateForReturnData($examData = [], $remain_sec = 0)
    {
        foreach ($examData['qtList'] as $key => $val) {
            if ($val['CNT'] != $val['TCNT']) {
                return ['result' => 'error_1', 'msg' => '고민중이거나 풀지 않은 문항이 있습니다'];
            }
        }

        if (empty($remain_sec) === true) {
            if (empty($timeData['RemainSec']) === true) {
                $set_remain_sec = $examData['productInfo']['RemainSec'];
            } else {
                $set_remain_sec = $timeData['RemainSec'];
            }
        } else {
            $set_remain_sec = $remain_sec;
        }
        $hour = floor($set_remain_sec / 3600);
        $min = floor(($set_remain_sec % 3600) / 60);
        $sec = floor($set_remain_sec % 60);

        $hour = ($hour < 10) ? '0'.$hour : $hour;
        $min = ($min < 10) ? '0'.$min : $min;
        $sec = ($sec < 10) ? '0'.$sec : $sec;
        $data['end_time'] = $hour . ':' . $min . ':' . $sec;
        return ['result' => true, 'data' => $data];
    }
}