<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends \app\controllers\BaseController
{
    protected $models = array('site/landingPage', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {
        $this->load->view('site/landingPage/index',[
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->landingPageModel->listAllLandingPage(true, $arr_condition);
        if ($count > 0) {
            $list = $this->landingPageModel->listAllLandingPage(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['LIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 약관동의 등록
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;
        $l_idx = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $l_idx = $params[0];
            $arr_condition = ([
                'EQ'=>[
                    'A.LIdx' => $l_idx,
                    'A.IsStatus' => 'Y'
                ]
            ]);

            $data = $this->landingPageModel->findLandingPageForModify($arr_condition);
            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 카테고리 연결 데이터 조회
            $arr_cate_code = $this->landingPageModel->listLandingPageCategory($l_idx);
            $data['CateCodes'] = $arr_cate_code;
            $data['CateNames'] = implode(', ', array_values($arr_cate_code));
        }


        $this->load->view("site/landingPage/create", [
            'method' => $method,
            'data' => $data,
            'l_idx' => $l_idx
        ]);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'A.IsStatus' => 'Y',
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG1' => [
                'LKB' => [
                    'A.Title' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            // 유효기간 검색
            $arr_condition['BET'] = [
                'A.DispStartDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
                'A.DispEndDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')],
            ];
        } elseif ($this->_reqP('search_date_type') == 'R') {
            // 등록일 기간 검색
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}