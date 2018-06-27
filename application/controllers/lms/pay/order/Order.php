<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 전체결제현황 인덱스
     */
    public function index()
    {
        $this->load->view('pay/order/order/index', []);
    }

    /**
     * 전체결제현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'U.SiteCode' => $this->_reqP('search_site_code'),
                'U.IsUse' => $this->_reqP('search_is_use'),
                'U.wIsUse' => $this->_reqP('search_w_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'U.ProfIdx' => $this->_reqP('search_value'),
                    'U.wProfId' => $this->_reqP('search_value'),
                    'U.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = 0;

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 전체결제현황 수정폼
     * @param array $params
     */
    public function edit($params = [])
    {
        $this->load->view('pay/order/order/edit', [
            'idx' => 1,
            'data' => [],
        ]);
    }
}
