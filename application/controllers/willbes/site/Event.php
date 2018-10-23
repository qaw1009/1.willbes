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
            case 'ongoing': // 수강중인강좌 ( 일지중지웅이 아님)
                $this->ongoing();
                break;

            case 'end': // 수강종료 강좌
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