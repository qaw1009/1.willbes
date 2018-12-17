<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메인 페이지
     * @return mixed
     */
    public function index()
    {
        // 앱일경우 토큰을 얻어서
        if($this->_is_app === true){
            $token = $this->_req('token');
            return $this->load->view('main', [
                'token' => $token
            ]);
        }

        return $this->load->view('main');
    }

    /**
     * 뷰 페이지 확인
     */
    public function html()
    {
        $view_file = explode('/', uri_string(), 3)[2];
        $view_file = 'html/' . $view_file;

        $this->load->view($view_file, [], false);
    }
}
