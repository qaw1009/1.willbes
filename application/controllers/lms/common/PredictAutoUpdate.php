<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PredictAutoUpdate extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * TODO : 프로모션 심험통계처리 자동 처리 페이지
     * 스크립트 분단위 실행
     * 원점수입력 -> 조정점수입력 -> 시험통계처리 순으로 호출
     * @param array $params
     * @return object|string
     */
    public function index($params = [])
    {
        $predict_idx = (empty($params[0]) === true) ? '100004' : $params[0];
        $timer = (empty($params[1]) === true) ? '60' : (int)$params[1];
        $timer = ($timer < 10) ? '10' : $timer;
        return $this->load->view('predict/gradeprocess/data_auto_update_script',[
            'predict_idx' => $predict_idx
            ,'timer' => $timer
        ]);
    }
}