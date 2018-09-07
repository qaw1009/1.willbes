<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudyComment extends \app\controllers\FrontController
{
    protected $models = array('support/supportBoardTwoWayF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_bm_idx = 85;
    protected $_paging_limit = 10;
    protected $_paging_count = 10;
    protected $_reg_type = 0;    //등록타입

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $arr_input = array_merge($this->_reqG(null));

        $this->load->view('site/professor/study_comment_list', [
            'arr_input' => $arr_input
        ]);
    }
}