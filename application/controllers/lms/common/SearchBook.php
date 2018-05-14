<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchBook extends \app\controllers\BaseController
{
    protected $models = array('bms/book','sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['610']);    //교재제공구분

        $this->load->view('common/search_book',[
            'site_code' => $this->_req('site_code')
            ,'ProdCode' => $this->_req('ProdCode')
            ,'bookprovision_ccd' => $codes['610']
        ]);
    }

    /**
     * 교재 관리 목록 조회  // book 모델 사용
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
           'EQ' => ['P.SiteCode' => $this->_reqP('site_code')],
            'ORG' =>[
                'LKB' => [
                    'P.ProdCode' => $this->_reqP('search_value'),
                    'P.ProdName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->bookModel->listBook(true,$arr_condition);

        if($count > 0) {
            $list = $this->bookModel->listBook(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['P.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
