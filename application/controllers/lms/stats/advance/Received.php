<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Received extends \app\controllers\BaseController
{
    protected $models = array('sys/code');
    protected $helpers = array();


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 선수금관리
     */
    public function index()
    {
        $this->load->view('stats/advanced/received', []);
    }


}
