<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('onAirF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //OnAir 조회
        $arr_base['onAirData'] = $this->onAirFModel->getLiveOnAir($this->_site_code, '');

        $this->load->view('site/main_' . SUB_DOMAIN, [
            'arr_base' => $arr_base,
        ]);
    }
}
