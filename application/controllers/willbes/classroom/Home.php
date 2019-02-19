<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $today = date("Y-m-d", time());
        $memidx = $this->session->userdata('mem_idx');
        $data = [];
        //온라인 강좌 갯수
        // 기간제
        // 수강중
        // 수강대기

        // 학원강좌

        //강좌포인트

        // 교재포인트

        // 쿠폰갯수

        // 최근수강강좌 3개

        // 등록된 학습기기

        $this->load->view('/classroom/index', [
            'data' => $data
        ]);
    }

}
