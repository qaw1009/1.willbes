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
        $prod_tabs = array_filter(explode(',', $this->_req('prod_tabs')));  // 노출되는 상품 탭
        $hide_tabs = array_filter(explode(',', $this->_req('hide_tabs')));  // 비노출되는 상품 탭
        $is_event = get_var($this->_req('is_event'), 'N');  // change 이벤트 발생 여부
        $return_type = get_var($this->_req('return_type'), 'table');

        $data = [
            'prod_type' => 'book',
            'prod_tabs' => $prod_tabs,
            'hide_tabs' => $hide_tabs,
            'is_event' => $is_event,
            'site_code' => $this->_req('site_code'),
            'wbook_idx' => $this->_req('wbook_idx'),
            'return_type' => $return_type,
            'target_id' => get_var($this->_req('target_id'), 'bookList'),
            'target_field' => get_var($this->_req('target_field'), 'ProdCode_book'),
            'bookprovision_ccd' => []
        ];

        if ($return_type == 'table') {
            $data['ProdCode'] = $this->_req('ProdCode');
            $data['bookprovision_ccd'] = $this->codeModel->getCcd('610');
        }

        $this->load->view('common/search_book', $data);
    }

    /**
     * 교재 관리 목록 조회  // book 모델 사용
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'P.SiteCode' => $this->_reqP('site_code'),
                'B.wBookIdx' => $this->_reqP('wbook_idx')
            ],
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
