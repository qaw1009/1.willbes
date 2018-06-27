<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = [])
    {
        $this->load->view('site/lecture/index' . $this->_pass_site_val);
    }

    public function show($params = [])
    {
        $this->load->view('site/lecture/show' . $this->_pass_site_val);
    }    
}