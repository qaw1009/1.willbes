<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('/classroom/index');
    }

    public function view($params = [])
    {
        if(empty($params[0]) === true){
            $view = "event";
        } else {
            $view = $params[0];
        }

        $this->load->view('/classroom/temp/'.$view);
    }
}
