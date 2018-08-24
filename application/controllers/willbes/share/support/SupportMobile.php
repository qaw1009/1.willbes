<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportMobile extends BaseSupport
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
        $this->load->view('support/mobile', [
        ]);
    }
}