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
            echo "<script>alert('등록되지 않은 설문입니다.');</script>";
            return;
        }
        $data = $this->surveyModel->questionSetCall($SqsIdx);
        $question = array();
        $questionD = array();
        $questionD2 = array();

        $tempGn = '';
        foreach ($data as $key => $val){
            $gn         = $val['GroupNumber'];
            $question[$gn]['SqIdx'][] = $val['SqIdx'];
            $question[$gn]['GroupNumber'][] = $val['GroupNumber'];
            $question[$gn]['SubTitle'][] = trim($val['SubTitle']);
            if($tempGn != $gn){
                $question[$gn]['GroupTitle'] = trim($val['GroupTitle']);
            }

            $sqidx      = $val['SqIdx'];
            $res = $this->surveyModel->questionCall($sqidx);
            $questionD[$sqidx]['question'] = $res;
            $questionD2[] = $res;
            $tempGn = $val['GroupNumber'];
        }

        $res = $this->surveyModel->surveyIs($idx);

        if($res['CNT'] > 0){
            $Is = 'Y';
        } else {
            $Is = 'N';
        }

        $TypeT = array();
        foreach($questionD2 as $key => $val){
            if($val['Type'] == 'T'){
                if(empty(trim($val['Comment1']))===false) $TypeT[] = trim($val['Comment1']);
                if(empty(trim($val['Comment2']))===false) $TypeT[] = trim($val['Comment2']);
                if(empty(trim($val['Comment3']))===false) $TypeT[] = trim($val['Comment3']);
                if(empty(trim($val['Comment4']))===false) $TypeT[] = trim($val['Comment4']);
                if(empty(trim($val['Comment5']))===false) $TypeT[] = trim($val['Comment5']);
                if(empty(trim($val['Comment6']))===false) $TypeT[] = trim($val['Comment6']);
                if(empty(trim($val['Comment7']))===false) $TypeT[] = trim($val['Comment7']);
                if(empty(trim($val['Comment8']))===false) $TypeT[] = trim($val['Comment8']);
                if(empty(trim($val['Comment9']))===false) $TypeT[] = trim($val['Comment9']);
                if(empty(trim($val['Comment10']))===false) $TypeT[] = trim($val['Comment10']);
            }
        }

        $view_file = 'willbes/pc/survey/index'.$idx;
        $this->load->view($view_file, [
            'Title' => $product['SpTitle'],
            'question' => $question,
            'questionD' => $questionD,
            'StartDate' => $product['StartDate'],
            'EndDate' => $product['EndDate'],
            'TypeT' => $TypeT,
            'SpIdx' => $idx,
            'Is' => $Is
        ], false);
    }

    public function graph($params = [])
    {
        $idx = $params[0];

        $res = $this->surveyModel->answerCall($idx);

        $tempSq = '';
        $temptitle = '';
        $resSet = array();
        $titleSet = array();
        $numberSet = array();
        $tnum = 0; $num1 = 0; $num2 = 0; $num3 = 0; $num4 = 0; $num5 = 0; $num6 = 0; $num7 = 0; $num8 = 0; $num9 = 0; $num10 = 0;
        $resCnt = count($res);
        $defnum = 0;
        foreach ($res as $key => $val){
            $SqIdx = $val['SqIdx'];
            $j = $key + 1;

            if(($key != 0 && $tempSq != $SqIdx) || $resCnt == $j){
                $tnum = $num1 + $num2 + $num3 + $num4 + $num5 + $num6 + $num7 + $num8 + $num9 + $num10;
                $resSet[$defnum]['SubTitle'] = $temptitle;
                $resSet[$defnum]['Answer1'] = ($num1 > 0 && $tnum > 0)? round($num1 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer2'] = ($num2 > 0 && $tnum > 0)? round($num2 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer3'] = ($num3 > 0 && $tnum > 0)? round($num3 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer4'] = ($num4 > 0 && $tnum > 0)? round($num4 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer5'] = ($num5 > 0 && $tnum > 0)? round($num5 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer6'] = ($num6 > 0 && $tnum > 0)? round($num6 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer7'] = ($num7 > 0 && $tnum > 0)? round($num7 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer8'] = ($num8 > 0 && $tnum > 0)? round($num8 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer9'] = ($num9 > 0 && $tnum > 0)? round($num9 / $tnum,2) * 100 : 0;
                $resSet[$defnum]['Answer10'] = ($num10 > 0 && $tnum > 0)? round($num10 / $tnum,2) * 100 : 0;
                $num1 = 0; $num2 = 0; $num3 = 0; $num4 = 0; $num5 = 0; $num6 = 0; $num7 = 0; $num8 = 0; $num9 = 0; $num10 = 0;
                $titleSet[] = $temptitle;
                $numberSet[] = $defnum;
                $defnum++;
            } else {
                if($val['Answer'] == 1) $num1++;
                if($val['Answer'] == 2) $num2++;
                if($val['Answer'] == 3) $num3++;
                if($val['Answer'] == 4) $num4++;
                if($val['Answer'] == 5) $num5++;
                if($val['Answer'] == 6) $num6++;
                if($val['Answer'] == 7) $num7++;
                if($val['Answer'] == 8) $num8++;
                if($val['Answer'] == 9) $num9++;
                if($val['Answer'] == 10) $num10++;
            }
            $tempSq = $SqIdx;
            $temptitle = $val['SubTitle'];
        }

        $view_file = 'willbes/pc/survey/graph'.$idx;
        $this->load->view($view_file, [
            'resSet' => $resSet,
            'titleSet' => $titleSet,
            'numberSet' => $numberSet
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

