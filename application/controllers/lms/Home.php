<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\BaseController
{
    protected $models = array('sys/wCode', 'sys/loginLog', 'pay/orderList');
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
        $today = date('Y-m-d');

        // 금일 로그인 로그 조회
        $arr_condition = [
            'EQ' => ['wAdminId' => $this->session->userdata('admin_id'), 'ConnSubDomain' => SUB_DOMAIN],
            'BDT' => ['LoginDatm' => [$today, $today]]
        ];

        $list = $this->loginLogModel->listTopLoginLog($arr_condition, 15);
        if (count($list) > 0) {
            // 사용하는 코드값 조회
            $login_log_ccds = $this->wCodeModel->getCcd('117');

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'LoginLogCcdName' => ['LoginLogCcd' => $login_log_ccds]
            ], true);
        }

        // 사이트별 금일 주문환불처리 건수 조회
        $refund_data = [];
        if (SUB_DOMAIN == 'lms') {
            $refund_data = $this->orderListModel->listOrderRefundReqCntPerSite($today, $today);
        }

        $this->load->view('main_' . SUB_DOMAIN, [
            'last_login_ip' => $this->input->ip_address(),
            'data' => $list,
            'refund_data' => $refund_data
        ]);
    }
}