<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePassPredict extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'survey/survey', 'predict/predictF', 'eventF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('index','indexv2');

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
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

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        $filepath = $this->config->item('upload_url_predict', 'predict');
        $filepath = $filepath.$idx."/";
        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx;
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx,
            'mode' => $mode,
            'filepath' => $filepath,
            'data' => $data
        ], false);
    }

    public function indexv2($params = [])
    {
        $idx = $params[0];

        $memidx = $this->session->userdata('mem_idx');

        $openYn = $this->surveyModel->predictOpenTab2($idx);

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

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        //var_dump($scoredata);

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
        $ProdCode = $param['prodcode'];
        $PromotionCode = $param['promotioncode'];
        $data = $this->surveyModel->autocount($ProdCode, $PromotionCode);
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
        $ProdCode = $this->_req("ProdCode");
        $order = 'area';
        $data = $this->surveyModel->statisticsListLine($ProdCode, $order);
        return $this->response([
            'data' => $data
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

        $prodcode = element('prodcode', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = element('ppidx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($prodcode, $pridx);

        if(empty($ppidx) === false) {
            $ppidx = $ppidx;
        } else {
            $ppidx = $subject_list[0]['PpIdx'];
        }

        $filepath = $this->config->item('upload_url_predict_lms', 'predict');
        $filepath = $filepath.$ppidx."/";

        $question_list= $this->surveyModel->predictQuestionCall($ppidx, $prodcode, $pridx);
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
            'prodcode'      => $prodcode,
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);
        $pridx = element('pridx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($prodcode, $pridx);

        $ppidx = '';

        $question_list= $this->surveyModel->predictQuestionCall($ppidx, $prodcode, $pridx);

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

        $score1 = $this->surveyModel->getScore1($pridx, $prodcode);
        $score2 = $this->surveyModel->getScore2($pridx, $prodcode);
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

        $this->load->view('willbes/'.APP_DEVICE.'/predict/gradepop2', [
            'prodcode'      => $prodcode,
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);
        $pridx = element('pridx', $arr_input);

        $subject_list = $this->surveyModel->subjectList($prodcode, $pridx);
        $subject_grade = $this->surveyModel->orginGradeCall($pridx);

        $this->load->view('willbes/'.APP_DEVICE.'/predict/gradepop3', [
            'prodcode'      => $prodcode,
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
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);
        $pridx = element('pridx', $arr_input);
        $ppidx = '';

        $subject_list = $this->surveyModel->subjectList($prodcode, $pridx);
        $question_list = $this->surveyModel->predictQuestionCall($ppidx, $prodcode, $pridx);

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

        $score1 = $this->surveyModel->getScore1($pridx, $prodcode);
        $score2 = $this->surveyModel->getScore2($pridx, $prodcode);
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
            'prodcode' => $prodcode,
            'subject_list' => $subject_list,
            'question_list' => $question_list,
            'newQuestion' => $newQuestion,
            'scoreIs' => $scoreIs,
            'addscoreIs' => $addscoreIs,
            'scoreType' => $scoreType,
            'scoredata' => $scoredata
        ], false);

    }

    public function totalgraph(){
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $prodcode = element('prodcode', $arr_input);
        $spidx = element('spidx', $arr_input);

        $arealist = $this->surveyModel->areaList($prodcode);
        $gradelist = $this->surveyModel->gradeList();

        //한국사 영어 경찰학개론 국어 사회
        $gradeSet[0]['subject'] = $gradelist[0]['CcdName']."/".$gradelist[1]['CcdName']."/".$gradelist[5]['CcdName']."/".$gradelist[6]['CcdName']."/".$gradelist[8]['CcdName'];
        $gradeSet[0]['grade'] = "/".$gradelist[0]['Avg']."/".$gradelist[1]['Avg']."/".$gradelist[5]['Avg']."/".$gradelist[6]['Avg']."/".$gradelist[8]['Avg'];
        //한국사 영어 경찰학개론 형법 형사소송법
        $gradeSet[1]['subject'] = $gradelist[0]['CcdName']."/".$gradelist[1]['CcdName']."/".$gradelist[5]['CcdName']."/".$gradelist[2]['CcdName']."/".$gradelist[3]['CcdName'];
        $gradeSet[1]['grade'] = "/".$gradelist[0]['Avg']."/".$gradelist[1]['Avg']."/".$gradelist[5]['Avg']."/".$gradelist[2]['Avg']."/".$gradelist[3]['Avg'];
        //한국사 국어 영어 형법 과학
        $gradeSet[2]['subject'] = $gradelist[0]['CcdName']."/".$gradelist[5]['CcdName']."/".$gradelist[1]['CcdName']."/".$gradelist[2]['CcdName']."/".$gradelist[8]['CcdName'];
        $gradeSet[2]['grade'] = "/".$gradelist[0]['Avg']."/".$gradelist[5]['Avg']."/".$gradelist[1]['Avg']."/".$gradelist[2]['Avg']."/".$gradelist[8]['Avg'];

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
        }
        $res = $this->surveyModel->surveyAnswerCall($spidx);

        $tempSq = '';
        $temptitle = '';
        $tempType = '';
        $tempCNT = '';
        $resSet = array();
        $titleSet = array();
        $numberSet = array();
        $questionSet = array();
        $typeSet = array();
        for($i = 1; $i <= 25; $i++){
            ${"num".$i} = 0;
        }

        $resCnt = count($res);
        $defnum = 0;
        foreach ($res as $key => $val){
            $SqIdx = $val['SqIdx'];
            $CNT = $val['CNT'];
            $Answer = $val['Answer'];
            $Type = $val['Type'];
            $j = $key + 1;
            if($Type != 'T'){
                if(($key != 0 && $tempSq != $SqIdx) || $resCnt == $j){

                    $tnum = 0;
                    if($resCnt == $j){
                        ${"num".$Answer}++;
                    }

                    for($i = 1; $i <= $tempCNT; $i++) {
                        $tnum = $tnum + ${"num".$i};
                    }
                    $resSet[$defnum]['SubTitle'] = $temptitle;
                    for($i = 1; $i <= $tempCNT; $i++){
                        $resSet[$defnum]['Answer'.$i] = (${"num".$i} > 0 && $tnum > 0)? round(${"num".$i} / $tnum,2) * 100 : 0;
                    }
                    for($i = 1; $i <= $CNT; $i++){
                        if($Answer == $i){
                            if($val['Type'] == 'S') {
                                ${"num" . $i} = 1;
                            } else {
                                $AnswerArr = explode('/',$Answer);
                                for($i = 1; $i <= $CNT; $i++){
                                    ${"num".$i} = 0;
                                    for($j = 0; $j < count($AnswerArr); $j++){
                                        if($AnswerArr[$j] == $i){
                                            ${"num".$i}++;
                                        }
                                    }
                                }
                            }
                        } else {
                            if($val['Type'] == 'S') ${"num".$i} = 0;
                        }
                    }

                    $resSet[$defnum]['CNT'] = $tempCNT;
                    $titleSet[] = $temptitle;
                    $numberSet[] = $defnum;
                    $typeSet[] = $tempType;
                    $questionSet[] = $this->surveyModel->surveyQuestionSet($tempSq);
                    $defnum++;
                } else {
                    if($val['Type'] == 'S'){

                        for($i = 1; $i <= $CNT; $i++){
                            if($Answer == $i) ${"num".$i}++;
                        }
                    } else {
                        //TYPE == 'T'
                        $AnswerArr = explode('/',$Answer);
                        for($i = 1; $i <= $CNT; $i++){
                            for($j = 0; $j < count($AnswerArr); $j++){
                                if($AnswerArr[$j] == $i){
                                    ${"num".$i}++;
                                }
                            }
                        }
                    }
                }

                $tempSq = $SqIdx;
                $tempType = $val['Type'];
                $temptitle = $val['SubTitle'];
                $tempCNT = $CNT;
            }
        }

        $this->load->view('willbes/pc/predict/graph', [
            'prodcode' => $prodcode,
            'spidx' => $spidx,
            'areaList' => $dtSet,
            'gradeList' => $gradeSet,
            'gradelist2' => $gradelist,
            'spidx' => $spidx,
            'resSet' => $resSet,
            'titleSet' => $titleSet,
            'typeSet' => $typeSet,
            'questionSet' => $questionSet,
            'numberSet' => $numberSet
        ], false);
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

                $cnt6_1 = $this->predictFModel->getCntMyLecture('152583');   //최신판례특강
                $cnt6_2 = $this->predictFModel->getCntMyLecture('152582');   //최신판례특강
                $cnt6 = $cnt6_1 + $cnt6_2;

                $cnt7 = $this->predictFModel->getCntMyLecture('152580');     //봉투모의고사
                $cnt8 = $this->predictFModel->getCntMyLecture('152581');     //시크릿다운
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
        $event_pv = $this->predictFModel->getCntEventPV($data['event_idx']);

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

