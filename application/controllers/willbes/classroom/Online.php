<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online extends \app\controllers\FrontController
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
     * 단강좌 리스트페이지
     */
    public function list($params = [])
    {
        if(empty($params) === true){
            $listType = "ongoing";
        } else {
            $listType = $params[0];
        }

        if($listType != 'standby' && $listType != 'ongoing' && $listType != 'pause' && $listType != 'end'){
            $listType = "ongoing";
        }

        $this->load->view('classroom/'.$listType, [
            'data' => [],
            'lecList' => [],
            'pkgList' => [],
            'freeList' => [],
            'adminList' => []
            ]);
    }


    
    /**
     * 실세 강의 상세페이지
     * @param array $params
     */
    public function view($params = [])
    {
        if(empty($params[0]) == true || empty($params[1]) == true || empty($params[1]) == true ){
            show_alert('수강정보가 정확하지 않습니다.', 'back');
        } else {
            $OrderIdx = $params[0];
            $ProdCode = $params[1];
            $subProdCode = $params[2];
        }

        $this->load->view('classroom/view');
    }

}