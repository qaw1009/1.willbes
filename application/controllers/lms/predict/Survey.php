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
