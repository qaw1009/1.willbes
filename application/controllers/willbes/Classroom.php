<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 내강의실 인덱스페이지
     */
    public function index()
    {

        $this->load->view('/classroom/index');
    }


    /**
     * 단강좌 리스트페이지
     */
    public function lecture()
    {
        
    }    
}