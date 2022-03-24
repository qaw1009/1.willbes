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

    /**
     * 합격예측 운영코드 관리
     */
    public function index()
    {

    }

    /**
     * 합격예측 과목코드 관리
     * @param array $params
     */
    public function listSubject($params = [])
    {
        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        $arr_base['code'] = $this->predictCodeModel->getPredictForSubjectAll($params[0]);
        $this->load->view('predict/baseCode/list_subject', [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 합격예측 과목코드 등록
     * @param array $params
     */
    public function createSubject($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $arr_base = [];
        $arr_base['predict_idx'] = $params[0];
        $arr_base['take_mock_part'] = $this->predictModel->getMockPartListForPredict($arr_base['predict_idx']);
        print_r($arr_base['take_mock_part']);

        $arr_base['codes'] = [
            ['ccd' => '100001','name' => '형사소송법']
            ,['ccd' => '100002','name' => '형소법']
            ,['ccd' => '100003','name' => '형법']
            ,['ccd' => '100004','name' => '경찰학개론']
        ];


        $this->load->view('predict/baseCode/create_subject', [
            'arr_base' => $arr_base
        ]);
    }

    /**
     * 합격예측 과목코드 삭제
     */
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