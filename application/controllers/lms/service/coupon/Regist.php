<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 쿠폰등록/발급 인덱스
     */
    public function index()
    {
        $this->load->view('service/coupon/index', []);
    }

    /**
     * 쿠폰등록/발급 목록 조회
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
     * 쿠폰 등록/수정폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->load->view('service/coupon/create', [
            'idx' => 1,
            'method' => 'POST',
            'data' => null,
        ]);
    }
}
