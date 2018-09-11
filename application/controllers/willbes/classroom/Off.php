<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Off extends \app\controllers\FrontController
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
     * 학원강의 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/classroom/off/list/ongoing/');
        }

        switch($params[0]) {
            case 'ongoing':
                $this->ongoing();
                break;

            case 'end':
                $this->end();
                break;

            default:
                redirect('/classroom/off/list/ongoing/');
                break;
        }
    }

    /**
     *  수강중인 강의
     */
    public function ongoing()
    {
        $this->load->view('/classroom/off_ongoing', [
            'data' => [],
            'list' => []
        ]);
    }

    /**
     *  수강종료강의
     */
    public function end()
    {
        $this->load->view('/classroom/off_end', [
            'data' => [],
            'list' => []
        ]);
    }


}