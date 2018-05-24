<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 전체쿠폰발급/사용현황 인덱스
     */
    public function index()
    {
        $this->load->view('service/coupon/issue_index', []);
    }

    /**
     * 전체쿠폰발급/사용현황 목록 조회
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
     * 쿠폰 발급폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->load->view('service/coupon/issue_create', [
            'idx' => 1,
            'method' => 'POST',
            'data' => null,
        ]);
    }
}
