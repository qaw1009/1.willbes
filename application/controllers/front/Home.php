<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('professor');

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('main');
    }

    public function professor()
    {
        echo '교수 소개 페이지';
    }
}