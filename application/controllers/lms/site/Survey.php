<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'sys/category', 'predict/predict');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('site/survey/index', [

        ]);
    }

    /**
     * 설문등록
     */
    public function surveyCreate()
    {
        $method = 'POST';

        $this->load->view('site/survey/survey_create', [
            'method' => $method,
        ]);
    }

    /**
     * 설문항목 등록
     */
    public function questionCreate()
    {
        $method = 'POST';

        $this->load->view('site/survey/question_create', [
            'method' => $method,
        ]);
    }

    /**
     * 답변유형 호출
     */
    public function questionItem()
    {
        $SqType = $this->_reqG('SqType');
        $SqAction = $this->_reqG('SqAction');
        $IsObj = $this->_reqG('IsObj');

        $this->load->view('site/survey/question_item_modal', [
            'SqType' => $SqType,
            'SqAction' => $SqAction,
            'IsObj' => $IsObj
        ]);
    }


    /**
     * 리스트
     */
    public function questionList()
    {
        $condition = [
            'EQ' => [

            ],
        ];

        return $this->response([

        ]);
    }



}
