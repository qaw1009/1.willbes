<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchWProfessor extends \app\controllers\BaseController
{
    protected $models = array('common/searchWProfessor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수 검색
     * @param array $params
     */
    public function index($params = [])
    {
        $this->load->view('common/search_wprofessor', [
            '_search_type' => element(0, $params, ''),
            '_site_code' => element(1, $params, '')
        ]);
    }

    /**
     * 교수 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $_search_type = $this->_reqP('_search_type');
        $_site_code = $this->_reqP('_site_code');
        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'WP.wProfIdx' => $this->_reqP('search_value'),
                    'WP.wProfId' => $this->_reqP('search_value'),
                    'WP.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->searchWProfessorModel->listSearchProfessor($_search_type, $_site_code, true, $arr_condition);

        if ($count > 0) {
            $list = $this->searchWProfessorModel->listSearchProfessor($_search_type, $_site_code, false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['WP.wProfIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
