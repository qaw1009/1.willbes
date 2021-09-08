<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLog extends \app\controllers\BaseController
{
    protected $models = array('sys/loginLog');
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
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->loginLogModel->listLoginLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->loginLogModel->listLoginLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['L.wLogIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자 접속관리 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'BDT' => [
                'L.wLoginDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-d')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-d'))
                ]
            ],
            'ORG' => [
                'LKB' => [
                    'A.wAdminName' => $this->_reqP('search_value'),
                    'L.wAdminId' => $this->_reqP('search_value'),
                    'L.wLoginIp' => $this->_reqP('search_value'),
                ]
            ]
        ];
    }
}
