<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchProfessor extends \app\controllers\BaseController
{
    protected $models = array('common/searchWProfessor');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 교수 검색
     */
    public function index()
    {
        $this->load->view('common/search_professor', [
        ]);
    }

    /**
     * 교수 검색 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'ORG' => [
                'LKB' => [
                    'P.wProfIdx' => $this->_reqP('search_value'),
                    'P.wProfId' => $this->_reqP('search_value'),
                    'P.wProfName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->searchWProfessorModel->listSearchProfessor(true, $arr_condition);

        if ($count > 0) {
            $list = $this->searchWProfessorModel->listSearchProfessor(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.wProfIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
