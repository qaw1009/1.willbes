<?php
/**
 * ======================================================================
 * 합격예측 코드 관리
 * ======================================================================
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseCode extends \app\controllers\BaseController
{
    protected $models = array('predict/predict', 'predict/predictCode');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function code($params = [])
    {
        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        /*$arr_base['code'] = $this->predictCodeModel->getPredictForSubjectAll($params[0]);*/

        $arr_base['predict_data'] = $this->predictModel->getProduct($arr_base['predict_idx']);
        print_r($arr_base['predict_data']);


        $arr_base['codes'] = [
            ['ccd' => '100001','name' => '형사소송법']
            ,['ccd' => '100002','name' => '형소법']
            ,['ccd' => '100003','name' => '형법']
            ,['ccd' => '100004','name' => '경찰학개론']
        ];


        $this->load->view('predict/baseCode/code_index', [
            'arr_base' => $arr_base
        ]);
    }

    public function subject($params = [])
    {
        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        $arr_base['code'] = $this->predictCodeModel->getPredictForSubjectAll($params[0]);
        $this->load->view('predict/baseCode/subject_index', [
            'arr_base' => $arr_base
        ]);
    }

    public function deleteSubject()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'prs_idx', 'label' => '식별자', 'rules' => 'trim|required|integer']
        ];
        if ($this->validate($rules) === false) return;

        $result = $this->predictCodeModel->deleteSubjectCode($this->_reqP(null));
        $this->json_result($result, '저장 되었습니다.', $result);
    }
}