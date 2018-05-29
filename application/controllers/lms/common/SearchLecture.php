<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLecture extends \app\controllers\BaseController
{
    protected $models = array('sys/code');
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
            'EQ' => ['B.SiteCode' => $this->_req('site_code')],
            'ORG' =>[
                'LKB' => [
                    'B.BookIdx' => $this->_req('search_value'),
                    'B.BookName' => $this->_req('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->bookModel->listBook(true,$arr_condition);

        if($count > 0) {
            $list = $this->bookModel->listBook(false,$arr_condition,$this->_req('length'),$this->_req('start'),['bookIdx'=>'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
