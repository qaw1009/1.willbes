<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/BaseSupport.php';

class SupportProfTpass extends BaseSupport
{
    protected $models = array('support/supportBoardF', 'downloadF');
    protected $helpers = array('download');
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx;       //bmidx : 강사게시판 -> 학습자료실
    protected $_default_path;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return 1;
    }
}