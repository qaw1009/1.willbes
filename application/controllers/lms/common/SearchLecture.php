<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLecture extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/lecture');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/search_lecture',[
            'site_code' => $this->_req('site_code')
            ,'LearnPatternCcd' => $this->_req('LearnPatternCcd')
            ,'ProdCode' => $this->_req('ProdCode')
        ]);
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {

        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $this->_reqP('LearnPatternCcd'),
                'A.SiteCode' => $this->_reqP('site_code'),
            ]
        ];

        $arr_condition = [
            'NOT' => [
                'A.ProdCode' => $this->_req('ProdCode'),
            ]
        ];



        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);

        $list = [];
        $count = $this->lectureModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->lectureModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
