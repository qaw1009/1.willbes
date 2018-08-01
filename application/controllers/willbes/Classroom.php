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
    public function Standby()
    {
        $this->load->view('classroom/standby', []);
    }

    public function Ongoing()
    {

        $this->load->view('classroom/ongoing', []);
    }

    public function pause()
    {
        $this->load->view('classroom/pause', []);
    }

    public function end()
    {

        $this->load->view('classroom/end', []);
    }


    public function offline($params = [])
    {
        if(empty($params[0]) === true){
            $listType = 'ing';
        } else {
            $listType = strtolower($params[0]);
        }

        if($listType != 'ing' && $listType != 'end'){
           $listType = 'ing';
        }


        $this->load->view('classroom/offline_'.$listType, []);
    }

}