<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLog extends \app\controllers\BaseController
{
    protected $models = array('_wbs/sys/code', 'sys/loginLog');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 접속관리 인덱스
     */
    public function index()
    {
        $this->load->view('sys/login_log/index');
    }

    /**
     * 운영자 접속관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'BDT' => ['L.LoginDatm' => [$this->input->post('search_start_date'), $this->input->post('search_end_date')]],
            'ORG' => [
                'LKB' => [
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'L.wAdminId' => $this->_reqP('search_value'),
                    'L.LoginIp' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $list = [];
        $count = $this->loginLogModel->listLoginLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->loginLogModel->listLoginLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['L.LogIdx' => 'desc']);

            // 사용하는 코드값 조회
            $codes = $this->codeModel->getCcdInArray(['109', '110', '117']);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wAdminDeptCcdName' => ['wAdminDeptCcd' => $codes['109']],
                'wAdminPositionCcdName' => ['wAdminPositionCcd' => $codes['110']],
                'LoginLogCcdName' => ['LoginLogCcd' => $codes['117']]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}