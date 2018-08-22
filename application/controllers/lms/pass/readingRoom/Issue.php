<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실신청현황/연장 인덱스
     */
    public function index()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/issue/index", [
            'arr_campus' => $arr_campus
        ]);
    }
}