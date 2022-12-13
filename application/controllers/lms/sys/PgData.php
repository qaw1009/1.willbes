<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PgData extends \app\controllers\BaseController
{
    protected $models = array('sys/pgData', 'sys/code', 'sys/site');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 인덱스
     */
    public function index() {
        $arr_condition = [
            'IN' => ['SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];
        $site_mid = $this->siteModel->listSite('SiteCode, SiteName, PgMid', $arr_condition);
        $this->load->view('sys/pg_data/index', [
            'site_mid' => $site_mid
        ]);
    }

    /**
     * 결제내역 수집 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.PgMid' => $this->_reqP('search_mid'),
            ],
            'ORG' => [
                'LKB' => [
                    'A.OrderNo' => $this->_reqP('search_value'),
                    'A.PgMid' => $this->_reqP('search_value'),
                    'A.MemName' => $this->_reqP('search_value'),
                    'B.MemIdx' => $this->_reqP('search_value'),
                    'B.OrderIdx' => $this->_reqP('search_value'),
                    'C.OrderProdIdx' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $match_condition = ( ($this->_reqP('search_match') === 'Y') ? 'EQ' : ( ($this->_reqP('search_match') === 'N') ? 'NOT' : '') );
        $arr_condition = array_merge_recursive($arr_condition, [
            $match_condition => [
                'C.PayStatusCcd' => '676001'
            ]
        ]);

        $list = [];
        $count = $this->pgDataModel->listPay(true, $arr_condition);

        if ($count > 0) {
            $list = $this->pgDataModel->listPay(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.OrderNo' => 'DESC']);
        }
        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}