<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSurvey extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'survey/survey');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $idx = $params[0];
        $product = $this->surveyModel->productCall($idx);
        $data = $this->surveyModel->questionSetCall($product['SqsIdx']);
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
            'TypeT' => $TypeT,
            'SpIdx' => $idx,
            'Is' => $Is
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

