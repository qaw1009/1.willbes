<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends \app\controllers\FrontController
{
    protected $models = array('classroomF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {

        return $this->load->view('/classroom/bookmark/list');

    }

    public function view()
    {
        return $this->load->view('/classroom/bookmark/view');
    }

}