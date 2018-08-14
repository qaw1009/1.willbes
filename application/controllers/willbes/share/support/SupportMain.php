<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * 고객센터 공용으로 사용하기 위한 기본 컨트롤 (메인 및 각 사이트 공용사용)
 */
class SupportMain extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $list = [];

        $this->load->view('support/main', [
            'list'=>$list
        ]);
    }

}