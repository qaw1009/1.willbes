<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class Assignment extends BaseSupport
{
    protected $models = array('support/supportBoardTwoWayF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_bm_idx = '48';
    protected $_default_path = '/classroom/assignment';
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('classroom/assignment/index', [
        ]);
    }
}