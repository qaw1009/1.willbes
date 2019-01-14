<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockReceipt extends \app\controllers\FrontController
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
        $this->load->view('/classroom/mock/receipt/');
    }

}
