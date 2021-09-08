<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\BaseController
{
    protected $models = array('auth/btobLogin');
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
        if ($this->session->userdata('btob.is_admin_login') === true) {
            redirect(config_app('home_url'));
        } else {
            redirect(site_url('/auth/login'));
        }
    }

    /**
     * 메인 페이지
     */
    public function main()
    {
        $today = date('Y-m-d');

        // 금일 로그인 로그 조회
        $arr_condition = [
            'EQ' => ['L.AdminId' => $this->session->userdata('btob.admin_id'), 'L.BtobIdx' => $this->session->userdata('btob.btob_idx')],
            'BDT' => ['L.LoginDatm' => [$today, $today]]
        ];
        $list = $this->btobLoginModel->listTopLoginLog($arr_condition, 15);

        $this->load->view('main', [
            'last_login_ip' => $this->input->ip_address(),
            'data' => $list
        ]);
    }
}
