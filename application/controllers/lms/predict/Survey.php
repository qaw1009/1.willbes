<?php
/**
 * ======================================================================
 * 모의고사등록 > 모의고사상품등록
 * ======================================================================
 *
 * lms_Product_Mock, lms_Product_Mock_R_Paper, lms_Product, lms_Product_R_Category, lms_Product_Sale, lms_Product_Sms DB에 나눠서 분리 저장
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 문항메인
     */
    public function addquestion()
    {
        $this->load->view('predict/survey/add_question', [

        ]);
    }

    /**
     * 리스트
     */
    public function questionlist()
    {

        $condition = [
            'EQ' => [

            ],
        ];

        list($data, $count) = $this->predictModel->surveyQuestionList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 문항세트메인
     */
    public function addquestionset()
    {
        $this->load->view('predict/survey/question_set', [

        ]);
    }

    /**
     * 리스트
     */
    public function questionsetlist()
    {

        $condition = [
            'EQ' => [

            ],
        ];

        list($data, $count) = $this->predictModel->surveyQuestionSetList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 설문등록메인
     */
    public function addsurvey()
    {
        $this->load->view('predict/survey/add_survey', [

        ]);
    }

    /**
     * 설문리스트
     */
    public function surveylist()
    {

        $condition = [
            'EQ' => [

            ],
        ];

        list($data, $count) = $this->predictModel->surveyList($condition, $this->input->post('length'), $this->input->post('start'));

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $data,
        ]);
    }

    /**
     * 설문결과
     */
    public function surveyResult()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $spidx = element('spidx',$arr_input);

        $res = $this->predictModel->answerCall($spidx);

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
                    $questionSet[] = $this->predictModel->questionSet($tempSq);
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
        //var_dump($resSet);
        $this->load->view('predict/survey/winpopup_survey_result', [
            'spidx' => $spidx,
            'resSet' => $resSet,
            'titleSet' => $titleSet,
            'typeSet' => $typeSet,
            'questionSet' => $questionSet,
            'numberSet' => $numberSet
        ]);
    }

    /**
     * 설문응답데이터
     */
    public function surveyData()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $spidx = element('spidx',$arr_input);

        $res = $this->predictModel->answerCallDetail($spidx);

        $res2 = $this->predictModel->questionSetAll($spidx);
        $questionSet = array();
        foreach ($res2 as $key => $val){
            $sqidx = $val['SqIdx'];
            for($i = 1; $i <= 25; $i++){
                $str = 'Comment'.$i;
                $questionSet[$sqidx][$str] = $val[$str];
            }
        }

        foreach ($res as $key => $val){
            if($val['TYPE'] == 'S'||$val['TYPE'] == 'T'){
                $Answer = $val['Answer'];
                $arrAnswer = explode('/',$Answer);
                $ResStr = "";
                for($i=0; $i < count($arrAnswer); $i++){
                    $num = $arrAnswer[$i];
                    $sqidx = $val['SqIdx'];
                    $str = 'Comment'.$num;
                    $ResStr .= trim($questionSet[$sqidx][$str]).",";
                }
                $ResStr = substr($ResStr, 0, strlen($ResStr) - 1);
                $res[$key]['ResStr'] = $ResStr;
            } else {
                $res[$key]['ResStr'] = $val['Comment'];
            }
        }

        $this->load->view('predict/survey/winpopup_survey_data', [
            'spidx' => $spidx,
            'data' => $res,
            'questionSet' => $questionSet
        ]);
    }


    /**
     * 질문등록
     */
    public function addquestionCreate()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $idx = element('idx',$arr_input);

        $res = '';
        $lastNum = 1;

        if(empty($idx)){
            $method = "create";
            $type = '';
        } else {
            $method = "update";
            $res = $this->predictModel->questionCall($idx);
            $type = $res['Type'];
            $lastNum = $res['Cnt'];
        }

        $this->load->view('predict/survey/question_create', [
            'method'=>$method,
            'data'=>$res,
            'idx'=>$idx,
            'lastNum'=>$lastNum,
            'type'=>$type
        ]);
    }

    /**
     * 질문세트등록
     */
    public function addquestionsetCreate()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $idx = element('idx',$arr_input);

        $data2 = array();
        $arrKey = array();
        $arrGroupTitle = array();
        $arrGroupNumber = array();

        if(empty($idx)){
            $method = "create";
        } else {
            $method = "update";
            $data2 = $this->predictModel->questionSetCall($idx);

            foreach ($data2 as $key => $val){
                $arrKey[] = $val['SqIdx'];
                $arrGroupTitle[] = $val['GroupTitle'];
                $arrGroupNumber[] = $val['GroupNumber'];
            }

            $arrGroupTitle = array_values(array_unique($arrGroupTitle));
        }

        $data = $this->predictModel->questionCallAll();

        $this->load->view('predict/survey/question_set_create', [
            'method'=>$method,
            'data'=>$data,
            'data2'=>$data2,
            'idx'=>$idx,
            'arrGroupTitle'=>$arrGroupTitle,
            'arrKey'=>$arrKey,
            'arrGroupNumber'=>$arrGroupNumber
        ]);
    }

    /**
     * 설문등록
     */
    public function surveyCreate()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $idx = element('idx',$arr_input);

        $data2 = array();

        if(empty($idx)){
            $method = "create";
        } else {
            $method = "update";
            $data2 = $this->predictModel->surveyCall($idx);
        }

        $data = $this->predictModel->questionSetCallAll();

        $this->load->view('predict/survey/survey_create', [
            'method'=>$method,
            'data'=>$data,
            'data2'=>$data2,
            'idx'=>$idx
        ]);
    }

    /**
     * 문항등록
     */
    public function storeQuestion()
    {
        $rules = [
            ['field' => 'SqTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'Type',    'label' => '유형', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $SqTitle = element('SqTitle',$arr_input);
        $Type = element('Type',$arr_input);
        $SqComment = element('SqComment',$arr_input);
        $Comment1  = element('Comment1',$arr_input);
        $Comment2  = element('Comment2',$arr_input);
        $Comment3  = element('Comment3',$arr_input);
        $Comment4  = element('Comment4',$arr_input);
        $Comment5  = element('Comment5',$arr_input);
        $Comment6  = element('Comment6',$arr_input);
        $Comment7  = element('Comment7',$arr_input);
        $Comment8  = element('Comment8',$arr_input);
        $Comment9  = element('Comment9',$arr_input);
        $Comment10 = element('Comment10',$arr_input);
        $Comment11 = element('Comment11',$arr_input);
        $Comment12 = element('Comment12',$arr_input);
        $Comment13 = element('Comment13',$arr_input);
        $Comment14 = element('Comment14',$arr_input);
        $Comment15 = element('Comment15',$arr_input);
        $Comment16 = element('Comment16',$arr_input);
        $Comment17 = element('Comment17',$arr_input);
        $Comment18 = element('Comment18',$arr_input);
        $Comment19 = element('Comment19',$arr_input);
        $Comment20 = element('Comment20',$arr_input);
        $Comment21 = element('Comment21',$arr_input);
        $Comment22 = element('Comment22',$arr_input);
        $Comment23 = element('Comment23',$arr_input);
        $Comment24 = element('Comment24',$arr_input);
        $Comment25 = element('Comment25',$arr_input);

        $Hint1     = element('Hint1',$arr_input);
        $Hint2     = element('Hint2',$arr_input);
        $Hint3     = element('Hint3',$arr_input);
        $Hint4     = element('Hint4',$arr_input);
        $Hint5     = element('Hint5',$arr_input);
        $Hint6     = element('Hint6',$arr_input);
        $Hint7     = element('Hint7',$arr_input);
        $Hint8     = element('Hint8',$arr_input);
        $Hint9     = element('Hint9',$arr_input);
        $Hint10    = element('Hint10',$arr_input);
        $Hint11    = element('Hint11',$arr_input);
        $Hint12    = element('Hint12',$arr_input);
        $Hint13    = element('Hint13',$arr_input);
        $Hint14    = element('Hint14',$arr_input);
        $Hint15    = element('Hint15',$arr_input);
        $Hint16    = element('Hint16',$arr_input);
        $Hint17    = element('Hint17',$arr_input);
        $Hint18    = element('Hint18',$arr_input);
        $Hint19    = element('Hint19',$arr_input);
        $Hint20    = element('Hint20',$arr_input);
        $Hint21    = element('Hint21',$arr_input);
        $Hint22    = element('Hint22',$arr_input);
        $Hint23    = element('Hint23',$arr_input);
        $Hint24    = element('Hint24',$arr_input);
        $Hint25    = element('Hint25',$arr_input);
        $SqUseYn   = element('SqUseYn',$arr_input);
        $Cnt       = element('Cnt',$arr_input);

        $data = array(
            'SqTitle'       => addslashes($SqTitle),
            'Type'          => $Type,
            'SqComment'     => addslashes($SqComment),
            'Comment1'      => addslashes($Comment1),
            'Comment2'      => addslashes($Comment2),
            'Comment3'      => addslashes($Comment3),
            'Comment4'      => addslashes($Comment4),
            'Comment5'      => addslashes($Comment5),
            'Comment6'      => addslashes($Comment6),
            'Comment7'      => addslashes($Comment7),
            'Comment8'      => addslashes($Comment8),
            'Comment9'      => addslashes($Comment9),
            'Comment10'     => addslashes($Comment10),
            'Comment11'     => addslashes($Comment11),
            'Comment12'     => addslashes($Comment12),
            'Comment13'     => addslashes($Comment13),
            'Comment14'     => addslashes($Comment14),
            'Comment15'     => addslashes($Comment15),
            'Comment16'     => addslashes($Comment16),
            'Comment17'     => addslashes($Comment17),
            'Comment18'     => addslashes($Comment18),
            'Comment19'     => addslashes($Comment19),
            'Comment20'     => addslashes($Comment20),
            'Comment21'     => addslashes($Comment21),
            'Comment22'     => addslashes($Comment22),
            'Comment23'     => addslashes($Comment23),
            'Comment24'     => addslashes($Comment24),
            'Comment25'     => addslashes($Comment25),
            'Hint1'         => addslashes($Hint1),
            'Hint2'         => addslashes($Hint2),
            'Hint3'         => addslashes($Hint3),
            'Hint4'         => addslashes($Hint4),
            'Hint5'         => addslashes($Hint5),
            'Hint6'         => addslashes($Hint6),
            'Hint7'         => addslashes($Hint7),
            'Hint8'         => addslashes($Hint8),
            'Hint9'         => addslashes($Hint9),
            'Hint10'        => addslashes($Hint10),
            'Hint11'        => addslashes($Hint11),
            'Hint12'        => addslashes($Hint12),
            'Hint13'        => addslashes($Hint13),
            'Hint14'        => addslashes($Hint14),
            'Hint15'        => addslashes($Hint15),
            'Hint16'        => addslashes($Hint16),
            'Hint17'        => addslashes($Hint17),
            'Hint18'        => addslashes($Hint18),
            'Hint19'        => addslashes($Hint19),
            'Hint20'        => addslashes($Hint20),
            'Hint21'        => addslashes($Hint21),
            'Hint22'        => addslashes($Hint22),
            'Hint23'        => addslashes($Hint23),
            'Hint24'        => addslashes($Hint24),
            'Hint25'        => addslashes($Hint25),
            'SqUseYn'       => $SqUseYn,
            'Cnt'           => $Cnt,
        );

        $result = $this->predictModel->storeQuestion($data);
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);

    }

    /**
     * 문항수정
     */
    public function updateQuestion()
    {
        $rules = [
            ['field' => 'SqTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'Type',    'label' => '유형', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $SqTitle = element('SqTitle',$arr_input);
        $Type = element('Type',$arr_input);
        $idx = element('idx',$arr_input);
        $SqComment = element('SqComment',$arr_input);
        $Comment1  = element('Comment1',$arr_input);
        $Comment2  = element('Comment2',$arr_input);
        $Comment3  = element('Comment3',$arr_input);
        $Comment4  = element('Comment4',$arr_input);
        $Comment5  = element('Comment5',$arr_input);
        $Comment6  = element('Comment6',$arr_input);
        $Comment7  = element('Comment7',$arr_input);
        $Comment8  = element('Comment8',$arr_input);
        $Comment9  = element('Comment9',$arr_input);
        $Comment10 = element('Comment10',$arr_input);
        $Comment11 = element('Comment11',$arr_input);
        $Comment12 = element('Comment12',$arr_input);
        $Comment13 = element('Comment13',$arr_input);
        $Comment14 = element('Comment14',$arr_input);
        $Comment15 = element('Comment15',$arr_input);
        $Comment16 = element('Comment16',$arr_input);
        $Comment17 = element('Comment17',$arr_input);
        $Comment18 = element('Comment18',$arr_input);
        $Comment19 = element('Comment19',$arr_input);
        $Comment20 = element('Comment20',$arr_input);
        $Comment21 = element('Comment21',$arr_input);
        $Comment22 = element('Comment22',$arr_input);
        $Comment23 = element('Comment23',$arr_input);
        $Comment24 = element('Comment24',$arr_input);
        $Comment25 = element('Comment25',$arr_input);

        $Hint1     = element('Hint1',$arr_input);
        $Hint2     = element('Hint2',$arr_input);
        $Hint3     = element('Hint3',$arr_input);
        $Hint4     = element('Hint4',$arr_input);
        $Hint5     = element('Hint5',$arr_input);
        $Hint6     = element('Hint6',$arr_input);
        $Hint7     = element('Hint7',$arr_input);
        $Hint8     = element('Hint8',$arr_input);
        $Hint9     = element('Hint9',$arr_input);
        $Hint10    = element('Hint10',$arr_input);
        $Hint11    = element('Hint11',$arr_input);
        $Hint12    = element('Hint12',$arr_input);
        $Hint13    = element('Hint13',$arr_input);
        $Hint14    = element('Hint14',$arr_input);
        $Hint15    = element('Hint15',$arr_input);
        $Hint16    = element('Hint16',$arr_input);
        $Hint17    = element('Hint17',$arr_input);
        $Hint18    = element('Hint18',$arr_input);
        $Hint19    = element('Hint19',$arr_input);
        $Hint20    = element('Hint20',$arr_input);
        $Hint21    = element('Hint21',$arr_input);
        $Hint22    = element('Hint22',$arr_input);
        $Hint23    = element('Hint23',$arr_input);
        $Hint24    = element('Hint24',$arr_input);
        $Hint25    = element('Hint25',$arr_input);
        $SqUseYn   = element('SqUseYn',$arr_input);
        $Cnt       = element('Cnt',$arr_input);

        $data = array(
            'SqTitle'       => addslashes($SqTitle),
            'Type'          => $Type,
            'SqComment'     => addslashes($SqComment),
            'Comment1'      => addslashes($Comment1),
            'Comment2'      => addslashes($Comment2),
            'Comment3'      => addslashes($Comment3),
            'Comment4'      => addslashes($Comment4),
            'Comment5'      => addslashes($Comment5),
            'Comment6'      => addslashes($Comment6),
            'Comment7'      => addslashes($Comment7),
            'Comment8'      => addslashes($Comment8),
            'Comment9'      => addslashes($Comment9),
            'Comment10'     => addslashes($Comment10),
            'Comment11'     => addslashes($Comment11),
            'Comment12'     => addslashes($Comment12),
            'Comment13'     => addslashes($Comment13),
            'Comment14'     => addslashes($Comment14),
            'Comment15'     => addslashes($Comment15),
            'Comment16'     => addslashes($Comment16),
            'Comment17'     => addslashes($Comment17),
            'Comment18'     => addslashes($Comment18),
            'Comment19'     => addslashes($Comment19),
            'Comment20'     => addslashes($Comment20),
            'Comment21'     => addslashes($Comment21),
            'Comment22'     => addslashes($Comment22),
            'Comment23'     => addslashes($Comment23),
            'Comment24'     => addslashes($Comment24),
            'Comment25'     => addslashes($Comment25),
            'Hint1'         => addslashes($Hint1),
            'Hint2'         => addslashes($Hint2),
            'Hint3'         => addslashes($Hint3),
            'Hint4'         => addslashes($Hint4),
            'Hint5'         => addslashes($Hint5),
            'Hint6'         => addslashes($Hint6),
            'Hint7'         => addslashes($Hint7),
            'Hint8'         => addslashes($Hint8),
            'Hint9'         => addslashes($Hint9),
            'Hint10'        => addslashes($Hint10),
            'Hint11'        => addslashes($Hint11),
            'Hint12'        => addslashes($Hint12),
            'Hint13'        => addslashes($Hint13),
            'Hint14'        => addslashes($Hint14),
            'Hint15'        => addslashes($Hint15),
            'Hint16'        => addslashes($Hint16),
            'Hint17'        => addslashes($Hint17),
            'Hint18'        => addslashes($Hint18),
            'Hint19'        => addslashes($Hint19),
            'Hint20'        => addslashes($Hint20),
            'Hint21'        => addslashes($Hint21),
            'Hint22'        => addslashes($Hint22),
            'Hint23'        => addslashes($Hint23),
            'Hint24'        => addslashes($Hint24),
            'Hint25'        => addslashes($Hint25),
            'SqUseYn'       => $SqUseYn,
            'Cnt'           => $Cnt,
        );

        $result = $this->predictModel->updateQuestion($data, $idx);
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /**
     * 문항세트등록
     */
    public function storeQuestionSet()
    {
        $rules = [
            ['field' => 'SqsTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'SqIdx[]',    'label' => '문항추가', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $SqsTitle    = element('SqsTitle',$arr_input);
        $SqsComment  = element('SqsComment',$arr_input);
        $SqsUseYn    = element('SqsUseYn',$arr_input);

        $data = array(
            'SqsTitle'      => $SqsTitle,
            'SqsComment'    => $SqsComment,
            'SqsUseYn'      => $SqsUseYn
        );

        $result = $this->predictModel->storeQuestionSet($data, $arr_input);
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);

    }

    /**
     * 문항세트수정
     */
    public function updateQuestionSet()
    {
        $rules = [
            ['field' => 'SqsTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'SqIdx[]',    'label' => '문항추가', 'rules' => 'trim|required'],
        ];
        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $SqsTitle    = element('SqsTitle',$arr_input);
        $SqsComment  = element('SqsComment',$arr_input);
        $SqsUseYn    = element('SqsUseYn',$arr_input);
        $idx         = element('idx',$arr_input);

        $data = array(
            'SqsTitle'      => $SqsTitle,
            'SqsComment'    => $SqsComment,
            'SqsUseYn'      => $SqsUseYn
        );

        $result = $this->predictModel->updateQuestionSet($data, $arr_input, $idx);
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }

    /**
     * 문항등록
     */
    public function storeSurvey()
    {
        $rules = [
            ['field' => 'SpTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'StartDate', 'label' => '설문시작일', 'rules' => 'trim|required'],
            ['field' => 'EndDate', 'label' => '설문종료일', 'rules' => 'trim|required'],
            ['field' => 'SqsIdx', 'label' => '문항세트', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $SpTitle   = element('SpTitle',$arr_input);
        $SqsIdx    = element('SqsIdx',$arr_input);
        $StartDate = element('StartDate',$arr_input);
        $EndDate   = element('EndDate',$arr_input);
        $SpComment = element('SpComment',$arr_input);
        $SpUseYn   = element('SpUseYn',$arr_input);

        $data = array(
            'SpTitle'      => addslashes($SpTitle),
            'SqsIdx'       => $SqsIdx,
            'StartDate'    => $StartDate,
            'EndDate'      => $EndDate,
            'SpComment'    => addslashes($SpComment),
            'SpUseYn'      => $SpUseYn,
        );

        $result = $this->predictModel->storeSurvey($data);
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);

    }

    /**
     * 문항수정
     */
    public function updateSurvey()
    {
        $rules = [
            ['field' => 'SpTitle', 'label' => '제목', 'rules' => 'trim|required'],
            ['field' => 'StartDate', 'label' => '설문시작일', 'rules' => 'trim|required'],
            ['field' => 'EndDate', 'label' => '설문종료일', 'rules' => 'trim|required'],
            ['field' => 'SqsIdx', 'label' => '문항세트', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) return;

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $idx       = element('idx',$arr_input);
        $SpTitle   = element('SpTitle',$arr_input);
        $SqsIdx    = element('SqsIdx',$arr_input);
        $StartDate = element('StartDate',$arr_input);
        $EndDate   = element('EndDate',$arr_input);
        $SpComment = element('SpComment',$arr_input);
        $SpUseYn   = element('SpUseYn',$arr_input);

        $data = array(
            'SpTitle'      => addslashes($SpTitle),
            'SqsIdx'       => $SqsIdx,
            'StartDate'    => $StartDate,
            'EndDate'      => $EndDate,
            'SpComment'    => addslashes($SpComment),
            'SpUseYn'      => $SpUseYn,
        );

        $result = $this->predictModel->updateSurvey($data, $idx);
        $this->json_result($result['ret_cd'], '수정되었습니다.', $result, $result);
    }



}
