<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class On extends \app\controllers\FrontController
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
     *  강좌리스트 분기
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/classroom/on/list/ongoing/');
        }

        switch($params[0]) {
            case 'standby':
                $this->standby();
                break;

            case 'ongoing':
                $this->ongoing();
                break;

            case 'pause':
                $this->pause();
                break;

            case 'end':
                $this->end();
                break;

            default:
                redirect('/classroom/on/list/ongoing/');
                break;
        }
    }

    /**
     *  수강대기강의
     */
    public function standby()
    {
        $this->load->view('/classroom/on_standby', [
            'data' => [],
            'lecList' => [],
            'pkgList' => [],
            'freeList' => [],
            'adminList' => []
        ]);
    }
    
    /**
     *  수강중인강의
     */
    public function ongoing()
    {
        $this->load->view('/classroom/on_ongoing', [
            'data' => [],
            'lecList' => [],
            'pkgList' => [],
            'freeList' => [],
            'adminList' => []
        ]);
    }

    /**
     *  일시중지강의
     */
    public function pause()
    {
        $this->load->view('/classroom/on_pause', [
            'data' => [],
            'lecList' => [],
            'pkgList' => [],
            'freeList' => [],
            'adminList' => []
        ]);
    }

    /**
     *  수강종료 강의
     */
    public function end()
    {
        $this->load->view('/classroom/on_end', [
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

        $this->load->view('/classroom/on_view');
    }

}