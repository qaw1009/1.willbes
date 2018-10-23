<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends \app\controllers\FrontController
{
    protected $models = array('eventF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 이벤트 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/pass/event/list/ongoing');
        }

        switch($params[0]) {
            case 'ongoing': // 진행중 이벤트
                $this->ongoing();
                break;

            case 'end': // 종료 이벤트
                $this->end();
                break;

            default:
                redirect('/pass/event/list/ongoing');
                break;
        }
    }

    private function ongoing()
    {
        $this->load->view('site/event/ongoing/index',[
        ]);
    }

    private function end()
    {

    }
}