<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseProfRecruit extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('profrecruit/show', []);
    }
}