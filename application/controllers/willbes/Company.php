<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();

    }

    public function sub_01_01()
    {
        return $this->load->view('/company/sub_01_01');
    }

    public function sub_01_02()
    {
        return $this->load->view('/company/sub_01_02');
    }

    public function sub_01_03()
    {
        return $this->load->view('/company/sub_01_03');
    }

    public function sub_02_01()
    {
        return $this->load->view('/company/sub_02_01');
    }

    public function sub_02_02()
    {
        return $this->load->view('/company/sub_02_02');
    }

    public function sub_03_01()
    {
        return $this->load->view('/company/sub_03_01');
    }

    public function sub_04_01()
    {
        return $this->load->view('/company/sub_04_01');
    }

    public function sub_05_01()
    {
        return $this->load->view('/company/sub_05_01');
    }

    public function sub_06_01()
    {
        return $this->load->view('/company/sub_06_01');
    }
}
