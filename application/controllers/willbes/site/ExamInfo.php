<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamInfo extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    /**
     * 시험제도
     * @param array $params
     */
    public function system($params = [])
    {
        $this->load->view('site/examinfo/system',[
        ]);
    }

    /**
     * 최근 10년동향
     * @param array $params
     */
    public function trend($params = [])
    {
        $this->load->view('site/examinfo/trend',[
        ]);
    }

    /**
     * 지역별 공고문
     * @param array $params
     */
    public function notice($params = [])
    {
        $this->load->view('site/examinfo/notice',[
        ]);
    }

}