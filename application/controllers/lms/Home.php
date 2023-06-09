<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\BaseController
{
    protected $models = array('sys/loginLog', 'pay/orderList', 'board/board', '_lms/sys/admin', '_lms/sys/cron');
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
            'EQ' => ['L.wAdminId' => $this->session->userdata('admin_id'), 'L.ConnSubDomain' => SUB_DOMAIN],
            'BDT' => ['L.LoginDatm' => [$today, $today]]
        ];
        $list = $this->loginLogModel->listTopLoginLog($arr_condition, 15);

        // 사이트별 금일 주문환불처리 건수 조회
        $refund_data = [];
        if (SUB_DOMAIN == 'lms') {
            $refund_data = $this->orderListModel->getOrderRefundReqCntPerSite($today, $today);
        }

        $set_unAnswered = [];
        $result_unAnswered = $this->boardModel->getCounselUnAnswerForMainArray();
        foreach ($result_unAnswered as $row) {
            $set_unAnswered[$row['SiteGroupCode']]['SiteGroupName'] = $row['SiteGroupName'];
            $set_unAnswered[$row['SiteGroupCode']]['info'][$row['SiteOnOffName']] = $row['CounselCnt'];
        }

        $isSsam = 'N';
        if (SUB_DOMAIN == 'tzone') {
            // Tzone 페이지 사이트 권한에 임용온라인/임용학원 이있는지 체크
            $data = $this->adminModel->listAdminSiteCampus($this->session->userdata('admin_idx'));
            foreach ($data as $row) {
                if ($row['SiteCode'] == '2017' || $row['SiteCode'] == '2018') {
                    if($row['IsPermSite'] == 'Y') {
                        $isSsam = 'Y';
                        break;
                    }

                }
            }
        }

        $this->load->view('main_' . SUB_DOMAIN, [
            'last_login_ip' => $this->input->ip_address(),
            'data' => $list,
            'refund_data' => $refund_data,
            'unAnswered_data' => $set_unAnswered,
            'isSsam' => $isSsam
        ]);
    }

    /**
     * tzone 임용 강사 이전페이지 가기
     * @return object|string
     */
    public function gotoSsam()
    {
        $this->load->library('Crypto', ['license' => 'willbes^ssam^20201201']);
        $plaintext = '^'.$this->session->userdata('admin_id').'^'.date('Y-m-d H:i:s').'^';
        $enc_data = $this->crypto->encrypt($plaintext);

        return $this->load->view('gotoSsam', [
            'enc_data' => $enc_data,
            'param' => '201223'
        ]);
    }

    /**
     * 작업스케줄러 실행
     * @return mixed
     */
    public function runScheduler()
    {
        $today_his = date('His');
        $result = true;
        $succ_msg = '';

        // 작업스케줄러 실행 (시스템관리자 and 8 ~ 10시 30분 사이)
        if (is_sys_admin() === true) {
            // 로컬, 개발환경에서만 실행 (스테이지 환경에서 크론실행으로 대체)
            if (ENVIRONMENT == 'local' || ENVIRONMENT == 'development') {
                if ($today_his > '080000' && $today_his < '103000') {
                    $run_result = $this->cronModel->runScheduler();
                    if ($run_result === null) {
                        $succ_msg = '모든 작업이 이미 실행되었습니다.';
                    } else {
                        $result = $run_result;
                        $succ_msg = '정상적으로 작업이 실행되었습니다.';
                    }
                } else {
                    $succ_msg = '작업 실행시간이 아닙니다.';
                }
            }

            // 금일 작업스케줄러 실행로그 조회
            $log_data = $this->cronModel->getListRunSchedulerLog($this->cronModel->listTodayRunSchedulerLog());

            // 크론실행일 경우 메시지 셋팅
            if (empty($succ_msg) === true) {
                if (empty($log_data) === false) {
                    $succ_msg = '정상적으로 작업이 실행되었습니다.';
                } else {
                    $succ_msg = '작업 실행시간이 아닙니다.';
                }
            }

            return $this->json_result($result, $succ_msg, $result, $log_data);
        }

        return $this->json_result(true, '권한이 없습니다.');
    }

    /**
     * 수동 작업스케줄러 실행
     */
    public function manualRunScheduler()
    {
        if (is_sys_admin() === true) {
            $run_result = $this->cronModel->runScheduler();
            if ($run_result === null) {
                $result_msg = '모든 작업이 이미 실행되었습니다.';
            } else {
                $result_msg = '정상적으로 작업이 실행되었습니다.';
            }
        } else {
            $result_msg = '권한이 없습니다.';
        }

        var_dump($result_msg);
    }
}
