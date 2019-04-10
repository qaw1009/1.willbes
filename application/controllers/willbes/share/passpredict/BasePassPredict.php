<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasePassPredict extends \app\controllers\FrontController
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

        $res = $this->surveyModel->predictResistYn($idx, $this->session->userdata('mem_idx'));

        if ($res == 'Y') {
            if(APP_DEVICE == 'pc'){
                show_alert('이미 등록하였습니다.', 'close');
            } else {
                show_alert('이미 등록하였습니다.', 'back');
            }
        }

        $serial = $this->surveyModel->getSerial(0);
        $sysCode_Area = $this->config->item('sysCode_Area', 'predict');
        $area = $this->surveyModel->getArea($sysCode_Area);

        $view_file = 'willbes/'.APP_DEVICE.'/predict/'.$idx;
        $this->load->view($view_file, [
            'serial' => $serial,
            'area' => $area,
            'idx' => $idx
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
     * 기본정보 등록 (lms_Mock_Paper)
     */
    public function store()
    {
        $rules = [
            ['field' => 'TakeMockPart', 'label' => '응시직렬', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeArea', 'label' => '응시지역', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'AddPoint', 'label' => '가산점', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'TakeNumber', 'label' => '응시번호', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'LectureType', 'label' => '수강여부', 'rules' => 'trim|required|is_natural_no_zero'],
            ['field' => 'Period', 'label' => '시험준비기간', 'rules' => 'trim|required|is_natural_no_zero'],
        ];
        if( $_FILES['RealConfirmFile']['error'] !== UPLOAD_ERR_OK || $_FILES['RealConfirmFile']['size'] == 0 ) {
            $rules[] = ['field' => 'RealConfirmFile', 'label' => '인증파일', 'rules' => 'required'];
        }

        if ($this->validate($rules) === false) return;

        $result = $this->surveyModel->store();
        $this->json_result($result['ret_cd'], '저장되었습니다.', $result, $result);
    }

}

