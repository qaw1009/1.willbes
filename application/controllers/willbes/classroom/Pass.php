<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass extends \app\controllers\FrontController
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
     * 기간제 강의실
     */
    public function index()
    {
        $this->load->view('/classroom/pass');
    }
}
