<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/lecture_room/issue/index", [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_campus' => $arr_campus
        ]);
    }

    public function listAjax()
    {
        $count = 0;
        $list = [];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,

        ]);
    }
}