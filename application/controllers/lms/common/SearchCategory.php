<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchCategory extends \app\controllers\BaseController
{
    protected $models = array('common/searchCategory');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 카테고리 검색
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('common/search_category', [
            'site_code' => element('0', $params, '')
        ]);
    }

    /**
     * 카테고리 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => ['S.SiteCode' => $this->_reqP('site_code')],
            'ORG' => [
                'LKB' => [
                    'C.CateCode' => $this->_reqP('search_value'),
                    'C.CateName' => $this->_reqP('search_value')
                ]
            ]
            ,'IN' => ['S.SiteCode' => get_auth_site_codes()]    //사이트 권한 추가
        ];

        $list = [];
        $count = $this->searchCategoryModel->listSearchCategory(true, $arr_condition);

        if ($count > 0) {
            $list = $this->searchCategoryModel->listSearchCategory(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['C.RegDatm' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
