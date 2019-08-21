<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePassPredict extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'survey/survey', 'predict/predictF', 'eventF', 'cert/certApplyF', 'order/orderF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('createGradeMember', 'createGradeMember2','storeFinalPoint', 'storeFinalPoint2','predictMyInfo');

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주세요.', 'back');
        }

        if (empty($params) === true) {
            show_alert('잘못된 접근 입니다.', 'back');
        }

        $idx = $params[0];
        $memidx = $this->session->userdata('mem_idx');

        $res = $this->surveyModel->predictResist($idx, $memidx);
        if(empty($res) === false){
            $mode = 'MOD';
            $subject = '';
            foreach ($res as $key => $val){
                $data['PrIdx'] = $val['PrIdx'];
                $data['TakeNumber'] = $val['TakeNumber'];
                $data['TakeMockPart'] = $val['TakeMockPart'];
                $data['TakeArea'] = $val['TakeArea'];
                $data['AddPoint'] = $val['AddPoint'];
                $data['LectureType'] = $val['LectureType'];
                $data['Period'] = $val['Period'];
                $data['ConfirmFile'] = $val['ConfirmFile'];
                $data['RealConfirmFile'] = $val['RealConfirmFile'];
                $subject .= $val['SubjectCode'].',';
            }
            $subject = substr($subject,0,strlen($subject)-1);
            $data['SubjectCode'] = $subject;

        } else {
            $mode = 'NEW';
            $data = array();
            $data['TakeMockPart'] = '';
            $data['SubjectCode'] = '';
            $data['PrIdx'] = '';
        }

        $column = 'PredictIdx, MockPart';
        $column .= ',DATE_FORMAT(PreServiceSDatm, \'%Y%m%d%H%i\') AS PreServiceSDatm, DATE_FORMAT(PreServiceEDatm, \'%Y%m%d%H%i\') AS PreServiceEDatm';
        $column .= ',DATE_FORMAT(ServiceSDatm, \'%Y%m%d%H%i\') AS ServiceSDatm, DATE_FORMAT(ServiceEDatm, \'%Y%m%d%H%i\') AS ServiceEDatm';
        $arr_condition = ['EQ' => ['PredictIdx' => $idx,'IsUse' => 'Y']];
        $arr_base['predict_data'] = $this->predictFModel->findPredictData($arr_condition, $column);
        if (empty($arr_base['predict_data']) === true) {
            show_alert('조회된 합격예측 서비스 정보가 없습니다.', 'back');
        }

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        //직렬가공처리
        $temp_mock_part = array_flip(explode(',', $arr_base['predict_data']['MockPart']));
        $mock_part_ccd = $this->surveyModel->getSerial(0);
        $temp_mock_part_ccd = array_pluck($mock_part_ccd,'CcdName','Ccd');
        $arr_base['arr_mock_part'] = array_intersect_key($temp_mock_part_ccd, $temp_mock_part);

        $filepath = $this->config->item('upload_url_predict', 'predict');
        $filepath = $filepath.$idx."/";
        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx;
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx,
            'mode' => $mode,
            'filepath' => $filepath,
            'data' => $data,
            'arr_base' => $arr_base
        ], false);
    }

    public function indexv2($params = [])
    {
        $idx = $params[0];
        $memidx = $this->session->userdata('mem_idx');
        $openYn = $this->surveyModel->predictOpenTab2($idx);

        $column = 'PredictIdx, MockPart';
        $column .= ',DATE_FORMAT(PreServiceSDatm, \'%Y%m%d%H%i\') AS PreServiceSDatm, DATE_FORMAT(PreServiceEDatm, \'%Y%m%d%H%i\') AS PreServiceEDatm';
        $column .= ',DATE_FORMAT(ServiceSDatm, \'%Y%m%d%H%i\') AS ServiceSDatm, DATE_FORMAT(ServiceEDatm, \'%Y%m%d%H%i\') AS ServiceEDatm';
        $arr_condition = ['EQ' => ['PredictIdx' => $idx,'IsUse' => 'Y']];
        $predict_data = $this->predictFModel->findPredictData($arr_condition, $column);
        $res = $this->surveyModel->predictResist($idx, $memidx);

        if(empty($res) === false){
            $mode = 'MOD';
            $subject = '';
            $PrIdx = '';
            foreach ($res as $key => $val){
                $PrIdx = $val['PrIdx'];
                $data['PrIdx'] = $val['PrIdx'];
                $data['TakeNumber'] = $val['TakeNumber'];
                $data['TakeMockPart'] = $val['TakeMockPart'];
                $data['TakeArea'] = $val['TakeArea'];
                $data['AddPoint'] = $val['AddPoint'];
                $data['LectureType'] = $val['LectureType'];
                $data['Period'] = $val['Period'];
                $data['ConfirmFile'] = $val['ConfirmFile'];
                $data['RealConfirmFile'] = $val['RealConfirmFile'];
                $subject .= $val['SubjectCode'].',';
            }
            $subject = substr($subject,0,strlen($subject)-1);
            $data['SubjectCode'] = $subject;


            $score1 = $this->surveyModel->getScore1($PrIdx, $idx);
            $score2 = $this->surveyModel->getScore2($PrIdx, $idx);
            $scoredata = array();
            $scoreIs = 'N';
            $addscoreIs = 'N';
            $scoreType = '';
            if(empty($score1)===false){
                $scoreType = 'EACH';
                foreach ($score1 as $key => $val){
                    $scoredata['subject'][]  = $val['SubjectName'];
                    $scoredata['score'][]    = $val['OrgPoint'];
                    $scoredata['addscore'][] = $val['AdjustPoint'];
                }
                $scoreIs = 'Y';
                if($score1[0]['AdjustPoint']){
                    $addscoreIs = 'Y';
                } else {
                    $addscoreIs = 'N';
                }
            }

            if(empty($score2)===false){
                $scoreType = 'DIRECT';
                foreach ($score2 as $key => $val){
                    $scoredata['subject'][]  = $val['SubjectName'];
                    $scoredata['score'][]    = $val['OrgPoint'];
                    $scoredata['addscore'][] = $val['AdjustPoint'];
                }
                $scoreIs = 'Y';
                if($score2[0]['AdjustPoint']){
                    $addscoreIs = 'Y';
                } else {
                    $addscoreIs = 'N';
                }
            }
            $subject_list = $this->surveyModel->subjectList($idx, $PrIdx);
        } else {
            $mode = 'NEW';
            $scoreIs = 'N';
            $addscoreIs = 'N';
            $scoreType = '';
            $data = array();
            $data['TakeMockPart'] = '';
            $data['SubjectCode'] = '';
            $data['PrIdx'] = '';
            $scoredata = array();
            $subject_list = array();

        }

        //직렬가공처리
        $temp_mock_part = array_flip(explode(',', $predict_data['MockPart']));
        $mock_part_ccd = $this->surveyModel->getSerial(0);
        $temp_mock_part_ccd = array_pluck($mock_part_ccd,'CcdName','Ccd');
        $serial = array_intersect_key($temp_mock_part_ccd, $temp_mock_part);

        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx."_v2";
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx,
            'mode' => $mode,
            'data' => $data,
            'scoredata' => $scoredata,
            'scoreIs' => $scoreIs,
            'addscoreIs' => $addscoreIs,
            'openYn' => $openYn,
            'subject_list' => $subject_list,
            'scoreType' => $scoreType
        ], false);
    }

    /**
     * 영역선택 ajax
     * @return object|string
     */
    public function getSerialAjax()
    {
        $GroupCcd = $this->_req("GroupCcd");

        $list = $this->surveyModel->getSerial($GroupCcd);

        return $this->response([
            'data' => $list
        ]);

    }

    /**
     * 기본정보 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'TakeMockPart', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if($this->input->post('img_pass') !== 'Y' ) {         //응시표 인증파일 무시일 경우
            if ($_FILES['RealConfirmFile']['error'] !== UPLOAD_ERR_OK || $_FILES['RealConfirmFile']['size'] == 0) {
                $rules[] = ['field' => 'RealConfirmFile', 'label' => '인증파일', 'rules' => 'required'];
            }
        }

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->store();

        /**
         * 자동지급 강좌 처리
         */
        if($result['ret_cd'] == true) {
            // 데이터 1개만 추출
            $prod_data = $this->surveyModel->getPredictProduct($this->input->post('PredictIdx'));
            if(empty($prod_data) == false) {
                $prod_code = array($prod_data['ProdCode']);
                if(empty($prod_code) == false) {
                    $this->orderFModel->procAutoOrder('predict', $prod_code);
                }
            }
        }

        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 기본정보 등록
     */
    public function storeV2()
    {
        $rules = [
            ['field' => 'TakeMockPart', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->storeV2();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

    /**
     * 기본정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->update();
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /**
     * 기본정보 수정
     */
    public function updateV2()
    {
        $rules = [
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->updateV2();
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /*
     * 합격예측서비스인원
     */
    public function autocount($param){
        $PredictIdx = $param['PredictIdx'];
        $PromotionCode = $param['promotioncode'];
        $data = $this->surveyModel->autocount($PredictIdx, $PromotionCode);
        $CNT = $data['CNT'];
        $PRECNT = $data['PRECNT'];
        $RCNT = $data['RCNT'];

        $TOTCNT = 0;
        for($i = 1; $i <= $CNT; $i++){
            $TOTCNT = $TOTCNT + 6;
        }

        $cnt = $TOTCNT + $PRECNT + $RCNT;
        $cnt = number_format($cnt);
        $this->load->view('willbes/pc/predict/autocount', [
            'cnt' => $cnt
        ], false);
    }

    /*
     * 합격예측 실시간 입력자평균
     */
    public function areaAvrAjax(){
        $PredictIdx = $this->_req("PredictIdx");
        $order = 'area';
        $data = $this->surveyModel->statisticsListLine($PredictIdx, $order);
        $results = [];

        // 지역별 데이터 가공
        foreach ($data as $row) {
            $results[$row['TakeArea'] . ':' . $row['TakeAreaName']][$row['TakeMockPartName']] = $row['StabilityAvrPoint'];
        }

        return $this->response([
            'data' => $results
        ]);
    }

    /*
     * 합격예측 실시간 입력자평균
     */
    public function noticeListAjax(){
        $BoardIdx = $this->_req("BoardIdx");

        $data = $this->surveyModel->noticeList($BoardIdx);
        return $this->response([
            'data' => $data
        ]);
    }

    /**
 * 합격예측채점팝업
 * @return object|string
 */
    public function popwin1()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = element('ppidx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($PredictIdx, $pridx);

        if(empty($ppidx) === false) {
            $ppidx = $ppidx;
        } else {
            $ppidx = $subject_list[0]['PpIdx'];
        }

        $filepath = $this->config->item('upload_url_predict_lms', 'predict');
        $filepath = $filepath.$ppidx."/";

        $question_list= $this->surveyModel->predictQuestionCall($ppidx, $PredictIdx, $pridx);
        foreach ($subject_list as $key => $val){
            $tMpIdx[] =  $val['PpIdx'];
        }

        $arr_condition2 = [
            'IN' => [
                'pp.PpIdx' => $tMpIdx
            ]
        ];

        $qtCntList = $this->surveyModel->questionTempCnt($arr_condition2, $pridx);
        $etcALLYN = "YES";
        foreach ($qtCntList as $key => $val) {
            $mpIdx = $val['PpIdx'];
            $qtList[$mpIdx]['CNT'] =  $val['CNT'];
            $qtList[$mpIdx]['TCNT'] =  $val['TCNT'];

            if($ppidx != $mpIdx){
                if($val['CNT'] != $val['TCNT']) $etcALLYN = "NO";
            }
        }

        $this->load->view('willbes/pc/predict/gradepop1', [
            'PredictIdx'      => $PredictIdx,
            'ppidx'         => $ppidx,
            'subject_list'  => $subject_list,
            'question_list' => $question_list,
            'filepath'      => $filepath,
            'arr_input'     => $arr_input,
            'pridx'         => $pridx,
            'etcALLYN'      => $etcALLYN
        ], false);

    }

    /**
     * 임시저장 전체
     * @return object|string
     */
    public function tempSaveAjax()
    {
        ////////////////////////////////////////////////
        $result = $this->surveyModel->answerTempAllSave($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examSendAjax()
    {
        $result = $this->surveyModel->examSend($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examDeleteAjax()
    {
        $PrIdx = $this->_reqP('PrIdx');
        $result = $this->surveyModel->examDelete($PrIdx);
        $this->json_result($result, '삭제되었습니다.', $result, $result);
    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin2()
    {
        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주세요.', 'back');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $PredictIdx = element('PredictIdx', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = '';
        $subject_list = $this->surveyModel->subjectList($PredictIdx, $pridx);
        if (empty($subject_list) === true) {
            show_alert('조회된 기본 정보가 없습니다.','back');
        }
        $question_list= $this->surveyModel->predictQuestionCall($ppidx, $PredictIdx, $pridx);

        $j = 1;
        $newQuestion = array();
        $numArr = array();
        $numstr = '';

        foreach($question_list as $key => $val){
            $PpIdx = $val['PpIdx'];
            $Answer = $val['Answer'];
            $isPP = 'N';
            foreach($subject_list as $key2 => $val2){
                if($PpIdx == $val2['PpIdx']) $isPP = 'Y';
            }
            if($isPP == 'Y'){
                $numArr[] = $j;
                if($Answer) $numstr .= $Answer;
                if($j % 5 == 0){
                    $newQuestion['numset'][$PpIdx][] = min($numArr). "~" .max($numArr);
                    $newQuestion['answerset'][$PpIdx][] = $numstr;
                    unset($numArr);
                    $numstr = '';
                    if($j == 20) $j = 0;
                }
                $j++;
            }
        }

        $score1 = $this->surveyModel->getScore1($pridx, $PredictIdx);
        $score2 = $this->surveyModel->getScore2($pridx, $PredictIdx);
        $scoredata = array();
        $scoreIs = 'N';
        $addscoreIs = 'N';
        $scoreType = '';
        if(empty($score1)===false){
            $scoreType = 'EACH';
            foreach ($score1 as $key => $val){
                $scoredata['subject'][]  = $val['SubjectName'];
                $scoredata['score'][]    = $val['OrgPoint'];
                $scoredata['addscore'][] = $val['AdjustPoint'];
            }
            $scoreIs = 'Y';
            if($score1[0]['AdjustPoint']){
                $addscoreIs = 'Y';
            } else {
                $addscoreIs = 'N';
            }
        }

        if(empty($score2)===false){
            $scoreType = 'DIRECT';
            foreach ($score2 as $key => $val){
                $scoredata['subject'][]  = $val['SubjectName'];
                $scoredata['score'][]    = $val['OrgPoint'];
                $scoredata['addscore'][] = $val['AdjustPoint'];
            }
            $scoreIs = 'Y';
            if($score2[0]['AdjustPoint']){
                $addscoreIs = 'Y';
            } else {
                $addscoreIs = 'N';
            }
        }

        if ($scoreIs == 'Y') {
            //결과보기페이지로 이동
            redirect(front_url('/predict/popwin4/') . '?PredictIdx=' . $PredictIdx . '&pridx=' . $pridx);
        }

        $this->load->view('willbes/'.APP_DEVICE.'/predict/gradepop2', [
            'PredictIdx'      => $PredictIdx,
            'subject_list'  => $subject_list,
            'question_list' => $question_list,
            'arr_input'     => $arr_input,
            'pridx'         => $pridx,
            'newQuestion'   => $newQuestion,
            'scoreIs'       => $scoreIs,
            'addscoreIs'    => $addscoreIs,
            'scoreType'     => $scoreType
        ], false);
    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examSendAjax2()
    {
        $AnswerArr = $this->_reqP('Answer');

        for($i = 0; $i < count($AnswerArr); $i++){
            $Answer = $AnswerArr[$i];

            if(strlen($Answer) != 5) {
                $this->json_error('정답이 모두 입력되지 않았습니다.');
                return ;
            }
        }

        $result = $this->surveyModel->examSend2($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin3()
    {
        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주세요.', 'back');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $pridx = element('pridx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($PredictIdx, $pridx);
        $subject_grade = $this->surveyModel->orginGradeCall($pridx);

        $this->load->view('willbes/'.APP_DEVICE.'/predict/gradepop3', [
            'PredictIdx'      => $PredictIdx,
            'subject_list'  => $subject_list,
            'subject_grade'  => $subject_grade,
            'arr_input'     => $arr_input,
            'pridx'         => $pridx
        ], false);

    }

    /**
     * 정답제출
     * @return object|string
     */
    public function examSendAjax3()
    {
        $ScoreArr = $this->_reqP('Score');

        for($i = 0; $i < count($ScoreArr); $i++){
            $Score = $ScoreArr[$i];
            if(empty($Score) == true){
                $this->json_error('점수가 모두 입력되지 않았습니다.');
            }
        }

        $result = $this->surveyModel->examSend3($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

    /**
     * 합격예측채점팝업
     * @return object|string
     */
    public function popwin4()
    {
        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주세요.', 'back');
        }

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = '';

        $subject_list = $this->surveyModel->subjectList($PredictIdx, $pridx);
        $question_list = $this->surveyModel->predictQuestionCall($ppidx, $PredictIdx, $pridx);

        foreach($question_list as $key => $val){
            $PpIdx = $val['PpIdx'];
            $Answer = $val['Answer'];
            $RightAnswer = $val['RightAnswer'];
            $QuestionNO = $val['QuestionNO'];
            $IsWrong = $val['IsWrong'];
            $OrgPoint = $val['OrgPoint'];
            $isPP = 'N';
            foreach($subject_list as $key2 => $val2){
                if($PpIdx == $val2['PpIdx']) $isPP = 'Y';
            }
            if($isPP == 'Y'){
                if($IsWrong == 'Y'){
                    $IsWrong = "<span class='tx-blue'>O</span>";
                } else {
                    $IsWrong = "<span class='tx-red'>X</span>";
                }
                $newQuestion['QuestionNO'][$PpIdx][] = $QuestionNO;
                $newQuestion['Answer'][$PpIdx][] = $Answer;
                $newQuestion['RightAnswer'][$PpIdx][] = $RightAnswer;
                $newQuestion['IsWrong'][$PpIdx][] = $IsWrong;
                $newQuestion['OrgPoint'][$PpIdx][] = $OrgPoint;
            }
        }

        $score1 = $this->surveyModel->getScore1($pridx, $PredictIdx);
        $score2 = $this->surveyModel->getScore2($pridx, $PredictIdx);
        $scoredata = array();
        $scoreIs = 'N';
        $addscoreIs = 'N';
        $scoreType = '';
        if(empty($score1)===false){
            $scoreType = 'EACH';
            foreach ($score1 as $key => $val){
                $scoredata['subject'][]  = $val['SubjectName'];
                $scoredata['score'][]    = $val['OrgPoint'];
                $scoredata['addscore'][] = $val['AdjustPoint'];
            }
            $scoreIs = 'Y';
            if($score1[0]['AdjustPoint']){
                $addscoreIs = 'Y';
            } else {
                $addscoreIs = 'N';
            }
        }

        if(empty($score2)===false){
            $scoreType = 'DIRECT';
            foreach ($score2 as $key => $val){
                $scoredata['subject'][]  = $val['SubjectName'];
                $scoredata['score'][]    = $val['OrgPoint'];
                $scoredata['addscore'][] = $val['AdjustPoint'];
            }
            $scoreIs = 'Y';
            if($score2[0]['AdjustPoint']){
                $addscoreIs = 'Y';
            } else {
                $addscoreIs = 'N';
            }
        }

        $this->load->view('willbes/'.APP_DEVICE.'/predict/gradepop4', [
            'PredictIdx' => $PredictIdx,
            'subject_list' => $subject_list,
            'question_list' => $question_list,
            'newQuestion' => $newQuestion,
            'scoreIs' => $scoreIs,
            'addscoreIs' => $addscoreIs,
            'scoreType' => $scoreType,
            'scoredata' => $scoredata,
            'pridx' => $pridx
        ], false);

    }

    public function totalgraph()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $PredictIdx = element('PredictIdx', $arr_input);
        $spidx1 = element('spidx1', $arr_input);    // 이전 설문조사
        $spidx2 = element('spidx2', $arr_input);    // 진행 설문조사

        // 1. 지역별 현황 (line)
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

        // 3. 과목별 원점수 평균 그래프
        $arr_grade_subject = [
            ['100100', '100200', '100300', '100500', '100400'],  // 한국사/영어/형법/경찰학개론/형사소송법
            ['100100', '100200', '100300', '100600', '100400'],  // 한국사/영어/형법/국어/형사소송법
            ['100100', '100500', '100300', '100800', '100600'],  // 한국사/영어/경찰학개론/사회/국어
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

        // 4. 총점성적분포 (grade)
        $pointList = $this->surveyModel->pointArea($PredictIdx);

        // 5. 과목별성적분포 (origin, 0점 제외)
        $subjectPointList = $this->surveyModel->getSubjectPoint($PredictIdx);

        // 6. 과목별단일선호도 (origin, 0점 제외)
        $bestList = $this->surveyModel->bestSubject($PredictIdx);

        // 7. 과목별조합선호도 (origin, 0점 제외)
        $bestCombList = $this->surveyModel->bestCombineSubject($PredictIdx);

        // 8. 과목별 체감난이도 (설문)
        $arr_sq_idx = [29, 28, 20, 19, 43, 27, 8, 6, 7];  // 비교대상 설문항목
        $spNowList = $this->surveyModel->surveyAnswerCall($spidx2, $arr_sq_idx);    // 진행설문결과
        $spPrevList = $this->surveyModel->surveyAnswerCall($spidx1, $arr_sq_idx);   // 이전설문결과
        $spInterList = array_intersect(array_pluck($spNowList, 'SqIdx'), array_pluck($spPrevList, 'SqIdx'));    // 비교 설문항목식별자 교집합
        $spSubjectList = [];

        // 진행 설문항목결과 셋팅
        foreach ($spNowList as $row) {
            if (in_array($row['SqIdx'], $spInterList) === true) {
                $spSubjectList['Now'][] = $row;
            }
        }

        // 이전 설문항목결과 셋팅
        foreach ($spPrevList as $row) {
            if (in_array($row['SqIdx'], $spInterList) === true) {
                $spSubjectList['Prev'][] = $row;
            }
        }

        // 9. 과목별 오답랭킹
        $wrongData = $this->surveyModel->wrongRank($PredictIdx);
        $wrongSubject = array_unique(array_pluck($wrongData, 'PaperName', 'PpIdx'));
        $wrongList = [];
        foreach ($wrongData as $row) {
            $wrongList[$row['PpIdx']][] = $row;
        }

        // 10. 직렬별 설문조사 결과
        $surveyData = $this->surveyModel->surveyAnswerCallBySerial($spidx2, '1');

        // 설문조사 결과 데이터 가공
        $surveyList = [];
        if (empty($surveyData) === false) {
            $tmp_serial_answer = '';
            foreach ($surveyData as $row) {
                $tmp_group_key = 'Group' . $row['GroupNumber'];

                // 직렬명 추가
                if ($tmp_serial_answer != $row['SerialAnswer']) {
                    $surveyList[$row['SerialAnswer']]['SerialName'] = $row['SerialAnswerName'];
                }

                // 설문항목 추가
                $surveyList[$row['SerialAnswer']][$tmp_group_key]['Title'][] = $row['SqTitle'];

                // 설문보기 추가
                if (isset($surveyList[$row['SerialAnswer']][$tmp_group_key]['Data']) === false) {
                    $surveyList[$row['SerialAnswer']][$tmp_group_key]['Comment'] = [$row['Comment1'], $row['Comment2'], $row['Comment3'], $row['Comment4'], $row['Comment5']];
                }

                // 설문데이터 추가
                $surveyList[$row['SerialAnswer']][$tmp_group_key]['Data'][] = [$row['AnswerRatio1'], $row['AnswerRatio2'], $row['AnswerRatio3'], $row['AnswerRatio4'], $row['AnswerRatio5']];

                $tmp_serial_answer = $row['SerialAnswer'];
            }
        }

        $this->load->view('willbes/pc/predict/graph', [
            'PredictIdx' => $PredictIdx,
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
            'surveyList' => $surveyList,
            'spidx2' => $spidx2
        ], false);
    }

    public function private($params = [])
    {
        $idx = $params[0];
        $memidx = $this->session->userdata('mem_idx');

        $data = $this->surveyModel->predictResist($idx, $memidx);

        if($data){
            $dataIs = 'Y';
        } else {
            $dataIs = 'N';
        }

        if($dataIs == 'Y'){
            $pridx = $data[0]['PrIdx'];
            $TakeMockPart = $data[0]['TakeMockPart'];
            $TakeArea = $data[0]['TakeArea'];

            $data2 = $this->surveyModel->getSumAvg($pridx, $idx);
            $dataline =$this->surveyModel->getGradeLine($idx,$TakeMockPart,$TakeArea);

            $score1 = $this->surveyModel->getScore1($pridx, $idx);
            $score2 = $this->surveyModel->getScore2($pridx, $idx);
            $scoredata = array();

            if(empty($score1)===false){
                foreach ($score1 as $key => $val){
                    $scoredata[$key]['subject']  = $val['SubjectName'];
                    $scoredata[$key]['score']    = $val['OrgPoint'];
                    $scoredata[$key]['addscore'] = '집계중';
                    $scoredata[$key]['Rank'] = '집계중';
                    $scoredata[$key]['FivePerPoint'] = '집계중';
                    $scoredata[$key]['AvrPoint'] = '집계중';
                }
            }

            $AdjustPointIs = 'N';
            if(empty($score2)===false){
                foreach ($score2 as $key => $val){
                    $scoredata[$key]['subject']  = $val['SubjectName'];
                    $scoredata[$key]['score']    = $val['OrgPoint'];
                    $AdjustPoint = $val['AdjustPoint'];
                    if($val['Rank'] == ''){
                        $AdjustPoint = '집계중';
                        $AdjustPointIs = 'N';
                    } else {
                        $AdjustPointIs = 'Y';
                    }
                    $scoredata[$key]['addscore'] = $AdjustPoint;
                    $scoredata[$key]['Rank'] = ROUND($val['Rank'] / $val['TakeNum'] * 100,2);
                    $scoredata[$key]['FivePerPoint'] = $val['FivePerPoint'];
                    $scoredata[$key]['AvrPoint'] = $val['AvrPoint'];
                }
            }

            $arrSum = array();
            $mysum = "";
            $mydataIs = 'N';
            $arrPointSection = array();
            foreach($data2 as $key => $val){
                $SUM = (float)$val['SUM'];
                $Memidx = $val['MemIdx'];
                $arrSum[] = (float)$SUM;

                if($Memidx == $memidx){
                    $mydataIs = 'Y';
                    $mysum = (float)$SUM;

                }

                if($SUM <= 50){
                    $arrPointSection['50'][] = $SUM;
                } else if($SUM > 50 && $SUM <= 100) {
                    $arrPointSection['100'][] = $SUM;
                } else if($SUM > 100 && $SUM <= 150) {
                    $arrPointSection['150'][] = $SUM;
                } else if($SUM > 150 && $SUM <= 200) {
                    $arrPointSection['200'][] = $SUM;
                } else if($SUM > 200 && $SUM <= 250) {
                    $arrPointSection['250'][] = $SUM;
                } else if($SUM > 250 && $SUM <= 300) {
                    $arrPointSection['300'][] = $SUM;
                } else if($SUM > 300 && $SUM <= 350) {
                    $arrPointSection['350'][] = $SUM;
                } else if($SUM > 350 && $SUM <= 400) {
                    $arrPointSection['400'][] = $SUM;
                } else if($SUM > 400 && $SUM <= 450) {
                    $arrPointSection['450'][] = $SUM;
                } else {
                    $arrPointSection['500'][] = $SUM;
                }
            }

            $arrPoint = "";
            $num = 0;
            foreach ($arrPointSection as $key => $val){
                if($num == 0){
                    $arrPoint = '"'.$key.'" : '. ROUND(COUNT($arrPointSection[$key])/COUNT($data2)*100,2);
                } else {
                    $arrPoint .= ',"'.$key.'" : '. ROUND(COUNT($arrPointSection[$key])/COUNT($data2)*100,2);
                }
                $num++;
            }

            $cnt = ROUND(COUNT($data2) * 0.05);
            if($cnt < 0){
                $cnt = 1;
            }
            $fiveperSum = $arrSum[$cnt];
            $onePerRank = (empty($dataline) === true) ? 0 : ROUND(((float)$dataline['PickNum'] / (float)$dataline['TakeNum']),2);
            $cnt2 = ROUND(COUNT($data2) * $onePerRank);
            if($cnt2 < 0){
                $cnt2 = 1;
            }
            $onePerSum = $arrSum[$cnt2];

            $subjectStr = '';
            foreach ($data as $key => $val) {
                if($key == 0){
                    $subjectStr = $val['subject'];
                } else {
                    $subjectStr .= " | ".$val['subject'];
                }
            }

            //평균
            $avg = (float)$data2[0]['AVG'];
            $avgper = ROUND(($avg / 500) * 100,2);
            //5퍼
            $fiveperPer = ROUND(($fiveperSum / 500) * 100,2);
            //1배수컷
            $onePerPer = ROUND(($onePerSum / 500) * 100,2);
            //내점수
            $OnePerCut = (float)$dataline['OnePerCut'];
            $OnePer = ROUND(($OnePerCut / 500) * 100,2);

            if($AdjustPointIs == 'Y'){
                if($mysum != 0){
                    $mysumPer = ROUND(($mysum / 500) * 100,2);
                } else {
                    $mysumPer = 0;
                    $mysum = 0;
                }
            } else {
                $mysumPer = "집계중";
                $mysum = "집계중";
            }

            $ExpectAvrPoint1 = $dataline['ExpectAvrPoint1']?(float)$dataline['ExpectAvrPoint1']:(float)$dataline['ExpectAvr1Ref'];
            $ExpectAvrPoint2 = $dataline['ExpectAvrPoint2']?(float)$dataline['ExpectAvrPoint2']:(float)$dataline['ExpectAvr2Ref'];
            $StrongAvrPoint1 = $dataline['StrongAvrPoint1']?(float)$dataline['StrongAvrPoint1']:(float)$dataline['StrongAvr1Ref'];
            $StrongAvrPoint2 = $dataline['StrongAvrPoint2']?(float)$dataline['StrongAvrPoint2']:(float)$dataline['StrongAvr2Ref'];
            $StabilityAvrPoint = $dataline['StabilityAvrPoint']?(float)$dataline['StabilityAvrPoint']:(float)$dataline['StabilityAvrRef'];

            $str = "현재기준";
            if($ExpectAvrPoint1 < $mysum && $ExpectAvrPoint2 > $mysum){
                $str .= "<span class='tx-red'>합격 기대권</span>입니다.";
            } else if ($StrongAvrPoint1 < $mysum && $StrongAvrPoint2 > $mysum){
                $str .= "<span class='tx-red'>합격 유력권</span>입니다.";
            } else if ($StabilityAvrPoint< $mysum){
                $str .= "<span class='tx-red'>합격 안정권</span>입니다.";
            } else {
                $str = " - ";
            }

            $this->load->view('willbes/pc/predict/private', [
                'PredictIdx' => $idx,
                'subjectStr' => $subjectStr,
                'data' => $data,
                'scoreList' => $scoredata,
                'avg' => $avg,
                'avgper' => $avgper,
                'fiveper' => $fiveperSum,
                'fiveperPer' => $fiveperPer,
                'onePerSum' => $onePerSum,
                'onePerPer' => $onePerPer,
                'mysum' => $mysum,
                'mysumPer' => $mysumPer,
                'gradeLine' => $dataline,
                'str'       => $str,
                'arrPoint' => $arrPoint,
                'mydataIs' => $mydataIs,
                'oneper' => $OnePer,
                'dataIs' => $dataIs
            ], false);
        } else {
            $this->load->view('willbes/pc/predict/private', [
                'dataIs' => $dataIs,
                'arrPoint' => ""
            ], false);
        }
    }

    public function cntForPromotion()
    {
        $type = element('type', $this->_reqG(null));    //산술 타입
        $promotion_code = element('promotion_code', $this->_reqG(null));    //프로모션코드
        $event_idx = element('event_idx', $this->_reqG(null));      //이벤트코드
        $predict_idx = element('predict_idx', $this->_reqG(null));  //합격예측코드
        $sp_idx = element('sp_idx', $this->_reqG(null));    //설문코드

        $data = [
            'type' => $type,
            'promotion_code' => $promotion_code,
            'event_idx' => $event_idx,
            'predict_idx' => $predict_idx,
            'sp_idx' => $sp_idx
        ];

        $real_cnt = $this->_getPromotionForCnt($data);

        $result = number_format($real_cnt);

        $this->json_result(true, '조회 성공', '', $result);
    }

    /**
     * 합격예측 성적 입력 폼
     */
    public function createGradeMember()
    {
        $arr_base['predict_idx'] = element('predict', $this->_reqG(null));
        $arr_base['cert_idx'] = element('cert', $this->_reqG(null));
        $arr_base['METHOD'] = 'POST';

        $arr_condition = ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx'), 'a.PredictIdx' => $arr_base['predict_idx'], 'a.CertIdx' => $arr_base['cert_idx'], 'a.IsStatus' => 'Y']];
        $member_ins_type = $this->predictFModel->findPredictFinalMember($arr_condition);
        if (empty($member_ins_type) === false) {
            /*show_alert('등록된 정보가 있습니다. 실시간 참여현황에서 확인해 주세요.', site_url('/predict/predictMyInfo?predict='.$arr_base['predict_idx'].'&cert='.$arr_base['cert_idx']));*/
        }

        $add_condition = ['IN' => ['ApprovalStatus' => ['A','Y']]];
        $apply_result = $this->certApplyFModel->findApplyByCertIdx($arr_base['cert_idx'], $add_condition);
        if(empty($apply_result) === true) {
            show_alert('인증 후 등록 가능합니다.', 'close');
        }

        $column = 'PredictIdx, MockPart';
        $arr_condition = ['EQ' => ['PredictIdx' => $arr_base['predict_idx'],'IsUse' => 'Y'],'LKB' => ['CertIdxArr' => $arr_base['cert_idx']]];
        $arr_base['predict_data'] = $this->predictFModel->findPredictData($arr_condition, $column);
        if (empty($arr_base['predict_data']) === true) {
            show_alert('조회된 합격예측 서비스 정보가 없습니다.', 'close');
        }

        //직렬가공처리
        $temp_mock_part = array_flip(explode(',', $arr_base['predict_data']['MockPart']));
        $mock_part_ccd = $this->surveyModel->getSerial(0);
        $temp_mock_part_ccd = array_pluck($mock_part_ccd,'CcdName','Ccd');
        $arr_base['arr_mock_part'] = array_intersect_key($temp_mock_part_ccd, $temp_mock_part);

        //응시지역
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $arr_area = $this->surveyModel->getArea($sysCode_Area);
        $arr_base['arr_area'] = array_pluck($arr_area,'CcdName','Ccd');
        unset($arr_base['arr_area']['712018']);     //'전국'값 제거

        //필수과목
        $add_condition = ['EQ' => ['Type' => 'P']];
        $arr_base['arr_subject_ccd']['P'] = $this->surveyModel->getCcdInArray(array_keys($temp_mock_part), $add_condition);

        //선택과목
        $add_condition = ['EQ' => ['Type' => 'S']];
        $arr_base['arr_subject_ccd']['S'] = $this->surveyModel->getCcdInArray(array_keys($temp_mock_part), $add_condition);

        $this->load->view('predict/1242_pop1', [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 최종합격예측 회원 점수 등록
     */
    public function storeFinalPoint()
    {
        $mock_part = element('mock_part', $this->_reqP(null));

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict', 'label' => '합격예측코드', 'rules' => 'trim|required|integer'],
            ['field' => 'cert', 'label' => '인증코드', 'rules' => 'trim|required|integer'],
            ['field' => 'mock_part', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'take_area', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
        ];

        //응시직렬에 따른 필수과목/점수 유효성검사
        if (empty($this->_reqP('subject_p_code')[$mock_part]) === true) {
            $rules = array_merge($rules, [
                ['field' => 'subject_p_code', 'label' => '공통과목코드', 'rules' => 'trim|required']
            ]);
        } else {
            foreach ($this->_reqP('subject_p_code')[$mock_part] as $key => $val_p) {
                if (empty($this->_reqP('subject_p')[$val_p]) === true) {
                    $rules = array_merge($rules, [
                        ['field' => 'subject_p', 'label' => '공통과목점수', 'rules' => 'trim|required']
                    ]);
                }
            }
        }

        //응시직렬에 따른 선택과목 유효성검사 [전의경경채 제외]
        if ($mock_part != 300) {
            if (empty($this->_reqP('subject_s')[$mock_part]) === true) {
                $rules = array_merge($rules, [
                    ['field' => 'subject_s', 'label' => '선택과목', 'rules' => 'trim|required']
                ]);
            } else {
                foreach ($this->_reqP('subject_s')[$mock_part] as $key => $val_s) {
                    if (empty($val_s) === true) {
                        $rules = array_merge($rules, [
                            ['field' => 'subject_s', 'label' => '선택과목', 'rules' => 'trim|required']
                        ]);
                    }
                }
            }

            //응시직렬에 따른 선택과목점수 유효성검사
            if (empty($this->_reqP('point')[$mock_part]) === true) {
                $rules = array_merge($rules, [
                    ['field' => 'point', 'label' => '선택과목점수', 'rules' => 'trim|required']
                ]);
            } else {
                foreach ($this->_reqP('point')[$mock_part] as $key => $val_s) {
                    $arr_point = explode('.', $val_s);
                    if (empty($val_s) === true) {
                        $rules = array_merge($rules, [
                            ['field' => 'point', 'label' => '선택과목점수', 'rules' => 'trim|required']
                        ]);
                    }

                    //소수점체크 [전의경경채 제외]
                    if (($mock_part != $this->predictFModel->_mock_part_exception_ccd && empty($arr_point[1]) === true) || strlen($arr_point[1]) != 2) {
                        $rules = array_merge($rules, [
                            ['field' => 'point', 'label' => '선택과목 소수점(2자리)', 'rules' => 'trim|required|decimal']
                        ]);
                    }
                }
            }
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictFModel->addPredictForMemberPoint($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 최종합격예측 실시간 참여현황
     */
    public function predictInfo()
    {
        $data = [];
        $arr_base['predict_idx'] = element('predict', $this->_reqG(null));
        $arr_base['cert_idx'] = element('cert', $this->_reqG(null));

        $column = 'PredictIdx, MockPart';
        $arr_condition = ['EQ' => ['PredictIdx' => $arr_base['predict_idx'],'IsUse' => 'Y'],'LKB' => ['CertIdxArr' => $arr_base['cert_idx']]];
        $arr_base['predict_data'] = $this->predictFModel->findPredictData($arr_condition, $column);
        if (empty($arr_base['predict_data']) === true) {
            show_alert('조회된 합격예측 서비스 정보가 없습니다.', 'close');
        }

        //직렬가공처리
        $temp_mock_part = array_flip(explode(',', $arr_base['predict_data']['MockPart']));
        $mock_part_ccd = $this->surveyModel->getSerial(0);
        $temp_mock_part_ccd = array_pluck($mock_part_ccd,'CcdName','Ccd');
        $arr_base['arr_mock_part'] = array_intersect_key($temp_mock_part_ccd, $temp_mock_part);

        //응시지역
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $get_arr_area = $this->surveyModel->getArea($sysCode_Area);
        $arr_base['arr_area'] = array_pluck($get_arr_area,'CcdName', 'Ccd');
        unset($arr_base['arr_area']['712018']);

        $arr_condition = ['EQ' => ['PredictIdx' => $arr_base['predict_idx'], 'CertIdx' => $arr_base['cert_idx'], 'IsStatus' => 'Y']];
        $result_total_count = $this->predictFModel->countFinalMockPartForArea($arr_condition, 'total');
        $arr_total_count = array_pluck($result_total_count, 'cnt', 'TakeMockPart');
        $result = $this->predictFModel->countFinalMockPartForArea($arr_condition);
        foreach ($result as $row) {
            $data[$row['TakeMockPart']][$row['TakeAreaCcd']] = $row['cnt'];
        }

        $this->load->view('predict/1242_pop2', [
            'arr_base' => $arr_base,
            'arr_total_count' => $arr_total_count,
            'data' => $data
        ]);
    }

    /**
     * 최종합격예측 [나의 위치 파악]
     */
    public function predictMyInfo()
    {
        $arr_base['predict_idx'] = element('predict', $this->_reqG(null));
        $arr_base['cert_idx'] = element('cert', $this->_reqG(null));

        $arr_condition = ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx'), 'a.PredictIdx' => $arr_base['predict_idx'], 'a.CertIdx' => $arr_base['cert_idx'], 'a.IsStatus' => 'Y']];
        $data = $this->predictFModel->findPredictFinalMember($arr_condition, 'PfIdx, c.Ccd as TakeMockPartCcd, c.CcdValue AS TakeMockPartCcdName, TakeAreaCcd, fn_ccd_name(TakeAreaCcd) AS TakeAreaCcdName, b.TakeNo');
        if (empty($data) === true) {
            show_alert('조회된 성적 데이터가 없습니다. 성적 입력 후 확인해 주세요.', site_url('/predict/createGradeMember?predict='.$arr_base['predict_idx'].'&cert='.$arr_base['cert_idx']));
        }

        //서비스이용자, 내등수 조회
        $arr_condition = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'PredictIdx' => $arr_base['predict_idx'],
                'CertIdx' => $arr_base['cert_idx'],
                'TakeMockPart' => $data['TakeMockPartCcd'],
                'TakeAreaCcd' => $data['TakeAreaCcd'],
                'IsStatus' => 'Y'
            ]
        ];
        $result_final_count = $this->predictFModel->getFinalData($arr_condition);

        $arr_base['arrAllFinal'] = $this->_arrAllFinal();   //합격자 수 셋팅
        $arr_base['service_count'] = $result_final_count['Total'];
        $arr_base['my_rownum'] = $result_final_count['Rownum'];
        $arr_base['my_percentage'] = $result_final_count['MyPercentage'];

        $this->load->view('predict/1242_pop3', [
            'arr_base' => $arr_base,
            'data' => $data
        ]);
    }

    /**
     * 회원점수 등록 폼
     */
    public function createGradeMember2()
    {
        $arr_base['predict_idx'] = element('predict', $this->_reqG(null));
        $arr_base['METHOD'] = 'POST';

        if (empty($arr_base['predict_idx']) === true) {
            show_alert('잘못된 접근 입니다.', 'close');
        }

        $arr_condition = ['EQ' => ['a.MemIdx' => $this->session->userdata('mem_idx'), 'a.PredictIdx' => $arr_base['predict_idx'], 'a.IsStatus' => 'Y']];
        $member_ins_type = $this->predictFModel->findPredictFinalMember($arr_condition, 'a.PfIdx', false);
        if (empty($member_ins_type) === false) {
            show_alert('등록된 정보가 있습니다.', 'close');
        }

        $column = 'PredictIdx, MockPart';
        $arr_condition = ['EQ' => ['PredictIdx' => $arr_base['predict_idx'],'IsUse' => 'Y']];
        $arr_base['predict_data'] = $this->predictFModel->findPredictData($arr_condition, $column);
        if (empty($arr_base['predict_data']) === true) {
            show_alert('조회된 합격예측 서비스 정보가 없습니다.', 'close');
        }

        //직렬가공처리
        $temp_mock_part = array_flip(explode(',', $arr_base['predict_data']['MockPart']));
        $mock_part_ccd = $this->surveyModel->getSerial(0);
        $temp_mock_part_ccd = array_pluck($mock_part_ccd,'CcdName','Ccd');
        $arr_base['arr_mock_part'] = array_intersect_key($temp_mock_part_ccd, $temp_mock_part);

        //필수과목
        $add_condition = ['EQ' => ['Type' => 'P']];
        $data_subject_p = $this->surveyModel->getCcdInArray(array_keys($temp_mock_part), $add_condition);
        $arr_base['arr_subject_ccd']['P'] = (empty($data_subject_p) === false) ? $data_subject_p['500'] : [];

        //선택과목
        $add_condition = ['EQ' => ['Type' => 'S']];
        $data_subject_s = $this->surveyModel->getCcdInArray(array_keys($temp_mock_part), $add_condition);
        $arr_base['arr_subject_ccd']['S'] = (empty($data_subject_s) === false) ? $data_subject_s['500'] : [];

        $this->load->view('predict/1244_pop', [
            'arr_base' => $arr_base
        ]);
    }

    public function storeFinalPoint2()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'predict', 'label' => '합격예측코드', 'rules' => 'trim|required|integer'],
            ['field' => 'announcement_type', 'label' => '공고유형', 'rules' => 'trim|required'],
            ['field' => 'mock_part', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'subject_p[]', 'label' => '필수과목', 'rules' => 'trim|required|integer'],
            ['field' => 'point_p[]', 'label' => '필수과목점수', 'rules' => 'trim|required'],
            ['field' => 'subject_s[]', 'label' => '선택과목', 'rules' => 'trim|required|integer'],
            ['field' => 'point_s[]', 'label' => '선택과목점수', 'rules' => 'trim|required'],
            ['field' => 'etc_values[]', 'label' => '윌비스 풀케어 서비스 경로', 'rules' => 'trim|required'],
        ];

        //체감 난이도 유효성검사
        foreach ($this->_reqP('subject_p') as $key => $val) {
            if (empty($this->_reqP('level_p')[$val]) === true) {
                $rules = array_merge($rules, [
                    ['field' => 'level_p', 'label' => '난이도', 'rules' => 'trim|required']
                ]);
            }
        }

        foreach ($this->_reqP('subject_s') as $key => $val) {
            if (empty($this->_reqP('level_s')[$val]) === true) {
                $rules = array_merge($rules, [
                    ['field' => 'level_s', 'label' => '난이도', 'rules' => 'trim|required']
                ]);
            }
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->predictFModel->addPredictForMemberPoint2($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 과목별 점수,난이도 평균값 조회
     * @return CI_Output
     */
    public function getPredictPointAvg()
    {
        $arr_base['predict_idx'] = element('predict', $this->_reqG(null));

        $arr_condition_main = [
            'EQ' => [
                'PC.GroupCcd' => '500',
                'PC.IsUse' => 'Y'
            ]
        ];
        $arr_condition_sub = [
            'EQ' => [
                'PredictIdx' => $arr_base['predict_idx'],
                'IsStatus' => 'Y'
            ]
        ];
        $data = $this->predictFModel->getFinalAvg($arr_condition_main, $arr_condition_sub);

        $result = [];
        /*foreach ($data as $key => $row) {
            $result[$row['Type']][$key]['SubjectName'] = $row['CcdName'];
            $result[$row['Type']][$key]['AvgPoint'] = $row['AvgPoint'];
            $result[$row['Type']][$key]['AvgLevel'] = $row['AvgLevel'];
            $result[$row['Type']][$key]['CountSubject'] = $row['CountSubject'];
        }*/
        foreach ($data as $key => $row) {
            $result[$row['AnnouncementType']][$row['Type']][$key]['SubjectName'] = $row['CcdName'];
            $result[$row['AnnouncementType']][$row['Type']][$key]['AvgPoint'] = $row['AvgPoint'];
            $result[$row['AnnouncementType']][$row['Type']][$key]['AvgLevel'] = $row['AvgLevel'];
            $result[$row['AnnouncementType']][$row['Type']][$key]['CountSubject'] = $row['CountSubject'];
        }
        $this->json_result(true, '', [], $result);
    }

    /**
     * 전국 합격자 수 데이터 셋팅
     * @return array
     */
    private function _arrAllFinal()
    {
        $arr_total_final = [
            '100' => [
                '712001' => '345',
                '712002' => '54',
                '712003' => '51',
                '712004' => '175',
                '712005' => '366',
                '712006' => '44',
                '712007' => '60',
                '712008' => '131',
                '712009' => '27',
                '712010' => '22',
                '712011' => '24',
                '712012' => '15',
                '712013' => '36',
                '712014' => '116',
                '712015' => '26',
                '712016' => '103',
                '712017' => '96'
            ],
            '200' => [
                '712001' => '140',
                '712002' => '20',
                '712003' => '20',
                '712004' => '78',
                '712005' => '152',
                '712006' => '27',
                '712007' => '22',
                '712008' => '53',
                '712009' => '13',
                '712010' => '12',
                '712011' => '15',
                '712012' => '10',
                '712013' => '13',
                '712014' => '45',
                '712015' => '12',
                '712016' => '40',
                '712017' => '40'
            ],
            '300' => [
                '712001' => '56',
                '712002' => '10',
                '712003' => '13',
                '712004' => '27',
                '712005' => '65',
                '712006' => '10',
                '712007' => '13',
                '712008' => '20',
                '712009' => '9',
                '712010' => '10',
                '712011' => '8',
                '712012' => '8',
                '712013' => '8',
                '712014' => '24',
                '712015' => '9',
                '712016' => '17',
                '712017' => '15'
            ],
            '400' => [
                '712001' => '192'
            ]
        ];

        return $arr_total_final;
    }


    /**
     * 특정프로모션별 카운트조회 구분
     * @param $data
     * @return mixed|string
     */
    private function _getPromotionForCnt($data)
    {
        $promotion_data = $this->eventFModel->findEventForPromotion($data['promotion_code'],'');
        if (empty($promotion_data['PromotionCnt']) === true || $promotion_data['PromotionCnt'] < 1) {
            $cnt_type = 1;
        } else {
            $cnt_type = 2;
        }

        if ($cnt_type == 1) {
            $result = $this->_promotion_cnt_type_1($data);
        } else {
            $result = $this->_promotion_cnt_type_2($data, $promotion_data['PromotionCnt']);
        }

        return $result;
    }

    /**
     * 최초 카운트 저장 로직
     * @param $data
     * @return int|mixed|string
     */
    private function _promotion_cnt_type_1($data)
    {
        $event_pv = '0'; $cnt1 = '0'; $cnt2 = '0'; $cnt3 = '0'; $cnt4 = '0'; $cnt5 = '0'; $cnt6 = '0'; $cnt7 = '0'; $cnt8 = '0'; $random = '0';

        switch ($data['type']) {
            case "1":
                $cnt2 = $this->predictFModel->getCntPreregist('1187');      //사전접수
                $cnt3 = $this->predictFModel->getCntScore('');              //채점
                $cnt4 = $this->predictFModel->getCntEventComment('1187');     //소문내기
                $event_pv = $this->predictFModel->getCntEventPV($data['event_idx']);
                break;
            case "2":
                $cnt1 = $this->predictFModel->getCntSurvey($data['sp_idx']);            //설문
                $cnt2 = $this->predictFModel->getCntPreregist('1187');      //사전접수
                $cnt3 = $this->predictFModel->getCntScore('');              //채점
                $cnt4 = $this->predictFModel->getCntEventComment('1187');     //소문내기
                $cnt5 = $this->predictFModel->getCntEventComment('1199');     //적중

                $cnt6_1 = $this->predictFModel->getCntMyLecture('152583');   //최신판례특강
                $cnt6_2 = $this->predictFModel->getCntMyLecture('152582');   //최신판례특강
                $cnt6 = $cnt6_1 + $cnt6_2;
                $cnt7 = $this->predictFModel->getCntMyLecture('152580');    //봉투모의고사
                $cnt8 = $this->predictFModel->getCntMyLecture('152581');    //시크릿다운
                $event_pv = $this->predictFModel->getCntEventPV($data['event_idx']);
                $random = mt_rand(1, 10);
                break;
            case "3":
                $cnt1 = $this->predictFModel->getCntSurvey($data['sp_idx']);            //설문
                $cnt2 = $this->predictFModel->getCntPreregist('1187');      //사전접수
                $cnt3 = $this->predictFModel->getCntScore('');              //채점
                $cnt4 = $this->predictFModel->getCntEventComment('1187');     //소문내기
                $cnt5 = $this->predictFModel->getCntEventComment('1199');     //적중
                $random = mt_rand(1, 10);
                break;
        }
        $real_cnt = $cnt1 + $cnt2 + $cnt3 + $cnt4 + $cnt5 + $cnt6 + $cnt7 + $cnt8;

        $ins_cnt = $real_cnt + $random; //DB 저장 데이터
        $result = $event_pv + $ins_cnt;

        $up_data = ['PromotionCnt' => $ins_cnt];
        if (empty($data['promotion_code']) === false) {
            $this->predictFModel->updCnt($data['promotion_code'], $up_data);
        }
        return $result;
    }

    /**
     * 카운트값이 DB에 있을 경우
     * @param $data
     * @param $reg_cnt
     * @return int|mixed
     */
    private function _promotion_cnt_type_2($data, $reg_cnt)
    {
        switch ($data['type']) {
            case "1":
            case "2":
                $event_pv = $this->predictFModel->getCntEventPV($data['event_idx']);
                break;
            case "3":
                $event_pv = 0;
                break;
            default:
                $event_pv = 0;
                break;
        }

        $random = mt_rand(1, 10);
        $ins_cnt = $reg_cnt + $random; //DB 저장 데이터
        $result = $event_pv + $ins_cnt;

        $up_data = ['PromotionCnt' => $ins_cnt];
        if (empty($data['promotion_code']) === false) {
            $this->predictFModel->updCnt($data['promotion_code'], $up_data);
        }
        return $result;
    }
}

