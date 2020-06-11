<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 오시는 길 (사이트별로 뷰 파일 분리)
     * @param array $params
     */
    public function map($params = [])
    {
        $this->load->view('site/location/map_' . $this->_site_code, []);
    }
}
