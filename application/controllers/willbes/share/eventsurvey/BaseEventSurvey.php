<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseEventSurvey extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'eventsurvey/survey');
    protected $helpers = array();

    // 중복투표
    private $_duplicate_type = [
        '0' => 'Y',     // 가능
        '1' => 'N'      // 불가능
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $sp_idx = $params[0];
        if(empty($sp_idx) === true || !is_numeric($sp_idx)){
            show_alert('잘못된 접근 입니다.','close');
            return;
        }

        $data_survey = $this->surveyModel->findSurvey($sp_idx);
        if(empty($data_survey) === true){
            show_alert('설문 기간이 아닙니다.','close');
            return;
        }

        if($data_survey['SpIsDuplicate'] == $this->_duplicate_type[1]){
            $count = $this->surveyModel->findSurveyAnswerInfo($sp_idx);
            if($count > 0){
                show_alert('이미 설문에 참여하셨습니다.','close');
                return;
            }
        }

        $data_question = $this->surveyModel->listSurveyForQuestion($sp_idx);
        if(empty($data_question) === true){
            show_alert('등록되지 않은 설문입니다.','close');
            return;
        }

        foreach ($data_question as $key => $val){
            $data_question[$key]['SqJsonData'] = json_decode($val['SqJsonData'],true);
        }

        $view_file = 'willbes/pc/eventsurvey/index';
        $this->load->view($view_file, [
            'data_survey' => $data_survey,
            'data_question' => $data_question
        ], false);
    }

    public function graph($params = [])
    {
        $idx = $params[0];

        $res = $this->surveyModel->answerCall($idx);

        $tempSq = '';
        $temptitle = '';
        $tempType = '';
        $tempCNT = '';
        $tempIsDisp = '';
        $resSet = array();
        $titleSet = array();
        $numberSet = array();
        $questionSet = array();
        $typeSet = array();
        $isDispSet = array();

        for($i = 1; $i <= 25; $i++){
            ${"num".$i} = 0;
        }

        $resCnt = count($res);
        $defnum = 0;
        foreach ($res as $key => $val){
            $SqIdx = $val['SqIdx'];
            $CNT = $val['CNT'];
            $Answer = $val['Answer'];
            $j = $key + 1;
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
                    $resSet[$defnum]['Answer'.$i] = (${"num".$i} > 0 && $tnum > 0) ? round(${"num".$i} / $tnum, 2) * 100 : 0;
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
                $isDispSet[] = $tempIsDisp;

                $questionSet[] = $this->surveyModel->questionSet($tempSq);
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
            $tempIsDisp = $val['IsDispResult'];
            $tempCNT = $CNT;
        }

        $view_file = 'willbes/pc/survey/graph';
        $this->load->view($view_file, [
            'resSet' => $resSet,
            'titleSet' => $titleSet,
            'typeSet' => $typeSet,
            'questionSet' => $questionSet,
            'numberSet' => $numberSet,
            'isDispSet' => $isDispSet,
            'SpIdx' => $idx
        ], false);
    }

    public function store()
    {
        $totalIdx = element('totalIdx', $this->_reqP(null, false));
        $totalType = element('totalType', $this->_reqP(null, false));

        //공통 과목만 체크한다.
        $tyn = 'N';
        foreach($totalIdx as $key => $val) {
            // 데이터 수정
            $snum = $val;
            $q = element('q' . $snum, $this->_reqP(null, false));
            $totaltype = $totalType[$key];
            if($tyn == 'N'){
                if(empty($q) === true){
                    $this->json_error('모든 문항을 입력해 주세요.');
                    return;
                }
            }
            if($totaltype == 'T') $tyn = 'Y';
        }
        $result = $this->surveyModel->storeSurvey($this->_reqP(null, false));
        $this->json_result($result, '저장되었습니다.', $result, $result);
    }

}

