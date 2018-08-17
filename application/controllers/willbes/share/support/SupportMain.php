<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportMain extends BaseSupport
{
    protected $models = array('support/supportMainF');
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
        //dd(config_app("TabMenu.ActiveMenu"));
        $this->load->view('support/main', [
            'list'=>$list
        ]);
    }

}