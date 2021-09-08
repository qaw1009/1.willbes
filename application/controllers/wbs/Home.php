<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\BaseController
{
    protected $models = array('sys/loginLog');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그인 페이지 이동
     */
    public function index()
    {
        if ($this->session->userdata('is_admin_login') === true) {
            redirect(config_app('home_url'));
        } else {
            redirect(site_url('/lcms/auth/login'));
        }
    }

    /**
     * 메인 페이지
     */
    public function main()
    {
        // 오늘 로그인 로그 조회
        $arr_condition = [
            'EQ' => ['L.wAdminId' => $this->session->userdata('admin_id')],
            'BDT' => ['L.wLoginDatm' => [date('Y-m-d'), date('Y-m-d')]]
        ];
        $list = $this->loginLogModel->listTopLoginLog($arr_condition, 15);

        $this->load->view('main', [
            'last_login_ip' => $this->input->ip_address(),
            'data' => $list
        ]);
    }
}
