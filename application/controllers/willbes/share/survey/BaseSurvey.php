<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSurvey extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'survey/survey');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('index');

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $idx = $params[0];
        $product = $this->surveyModel->productCall($idx);
        $SqsIdx = $product['SqsIdx'];
        if(!$SqsIdx){
            show_alert('등록되지 않은 설문입니다.','close');
            return;
        }
        if(empty($product['StartDate']) === false && empty($product['EndDate']) === false){
            $today_now = time();
            if($today_now < strtotime($product['StartDate']) || $today_now > strtotime($product['EndDate'])) {
                show_alert('설문기간이 아닙니다.','close');
                return;
            }
        }
        $res = $this->surveyModel->surveyIs($idx);
        if($res['CNT'] > 0){
            show_alert('이미 설문에 참여하셨습니다.','close');
            return;
        }

        $data = $this->surveyModel->questionSetCall($SqsIdx);
        $question = array();
        $questionD = array();
        $questionD2 = array();
        $tempGn = '';
        foreach ($data as $key => $val){
            $gn = $val['GroupNumber'];
            $question[$gn]['SqIdx'][] = $val['SqIdx'];
            $question[$gn]['GroupNumber'][] = $val['GroupNumber'];
            $question[$gn]['SubTitle'][] = trim($val['SubTitle']);
            if($tempGn != $gn){
                $question[$gn]['GroupTitle'] = trim($val['GroupTitle']);
            }
            $sqidx = $val['SqIdx'];
            $res = $this->surveyModel->questionCall($sqidx);
            $questionD[$sqidx]['question'] = $res;
            $questionD2[] = $res;
            $tempGn = $val['GroupNumber'];
        }

        $TypeT = array();
        foreach($questionD2 as $key => $val){
            if($val['Type'] == 'T'){
                for($i = 1; $i <= 25; $i++){
                    if(empty(trim($val['Comment'.$i]))===false) $TypeT[] = trim($val['Comment'.$i]);
                }
            }
        }

        $view_file = 'willbes/pc/survey/index';
        $this->load->view($view_file, [
            'Title' => $product['SpTitle'],
            'question' => $question,
            'questionD' => $questionD,
            'StartDate' => $product['StartDate'],
            'EndDate' => $product['EndDate'],
            'TypeT' => $TypeT,
            'SpIdx' => $idx
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
            $tempCNT = $CNT;
        }

        $view_file = 'willbes/pc/survey/graph';
        $this->load->view($view_file, [
            'resSet' => $resSet,
            'titleSet' => $titleSet,
            'typeSet' => $typeSet,
            'questionSet' => $questionSet,
            'numberSet' => $numberSet,
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

