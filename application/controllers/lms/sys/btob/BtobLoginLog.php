<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobLoginLog extends \app\controllers\BaseController
{
    protected $models = array('sys/btob', 'sys/btobLoginLog');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 제휴사관리자 접속관리 인덱스
     */
    public function index()
    {
        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        $this->load->view('sys/btob/login_log/index', [
            'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사관리자 접속관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $list = [];
        $arr_condition = $this->_getListConditions();
        $count = $this->btobLoginLogModel->listBtobLoginLog(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobLoginLogModel->listBtobLoginLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['LogIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사관리자 접속관리 검색조건 리턴
     * @return array
     */
    private function _getListConditions()
    {
        return [
            'BDT' => [
                'LoginDatm' => [
                    get_var($this->_reqP('search_start_date'), date('Y-m-d')),
                    get_var($this->_reqP('search_end_date'), date('Y-m-d'))
                ]
            ],
            'EQ' => [
                'BtobIdx' => $this->_reqP('search_btob_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'AdminName' => $this->_reqP('search_value'),
                    'AdminId' => $this->_reqP('search_value'),
                    'LoginIp' => $this->_reqP('search_value'),
                ]
            ]
        ];
    }
}
