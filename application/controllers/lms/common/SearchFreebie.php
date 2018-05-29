<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchFreebie extends \app\controllers\BaseController
{
    protected $models = array('product/etc/freebie');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('common/search_freebie',[
            'site_code' => $this->_req('site_code')
            ,'ProdCode' => $this->_req('ProdCode')
        ]);
    }

    /**
     * 사은품 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => ['A.SiteCode' => $this->_reqP('site_code')],
            'ORG' =>[
                'LKB' => [
                    'A.FreebieIdx' => $this->_reqP('search_value'),
                    'A.FreebieName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->freebieModel->listFreebie(true,$arr_condition);

        if($count > 0) {
            $list = $this->freebieModel->listFreebie(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.FreebieIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}