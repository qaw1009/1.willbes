<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\BaseController
{
    protected $models = array('auth/btobLogin', '_lms/sys/wCode');
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
            'EQ' => ['AdminId' => $this->session->userdata('btob.admin_id')],
            'BDT' => ['LoginDatm' => [$today, $today]]
        ];

        $list = $this->btobLoginModel->listTopLoginLog($arr_condition, 15);
        if (count($list) > 0) {
            // 사용하는 코드값 조회
            $login_log_ccds = $this->wCodeModel->getCcd('117');

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'LoginLogCcdName' => ['LoginLogCcd' => $login_log_ccds]
            ], true);
        }

        $this->load->view('main', [
            'last_login_ip' => $this->input->ip_address(),
            'data' => $list
        ]);
    }
}
