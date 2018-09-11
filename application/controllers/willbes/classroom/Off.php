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
     * 학원강의 신청목록
     * @param array $params
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            $listType = 'ongoing';
        } else {
            $listType = strtolower($params[0]);
        }

        if($listType != 'ongoing' && $listType != 'end'){
            $listType = 'ongoing';
        }


        $this->load->view('/classroom/off_'.$listType, [
            'data' => [],
            'list' => []
        ]);
    }


}