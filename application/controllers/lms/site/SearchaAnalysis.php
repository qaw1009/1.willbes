<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchaAnalysis extends \app\controllers\BaseController
{
    protected $models = array('site/searchaAnalysis', 'sys/category');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 검색어관리
     */
    public function index()
    {
        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray();

        $this->load->view('site/searchaAnalysis/index',[
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->searchaAnalysisModel->listAllSearchaAnalysis(true, $arr_condition);
        if ($count > 0) {
            $list = $this->searchaAnalysisModel->listAllSearchaAnalysis(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ReadCnt' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
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
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'A.CateCode' => $this->_reqP('search_category'),
            ],
            'ORG1' => [
                'LKB' => [
                    'A.SearchWord' => $this->_reqP('search_value')
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'F') {
            //최초조회일자
            $arr_condition['BDT'] = ['A.FirstSearchDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        } elseif ($this->_reqP('search_date_type') == 'L') {
            //최근조회일자
            $arr_condition['BDT'] = ['A.LastSearchDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }
        return $arr_condition;
    }
}