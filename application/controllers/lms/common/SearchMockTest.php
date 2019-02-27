<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchMockTest extends \app\controllers\BaseController
{
    protected $models = array('common/searchMockTest','sys/code');
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
            'prod_type' => 'mock_exam',
            'prod_tabs' => $prod_tabs,
            'hide_tabs' => $hide_tabs,
            'is_event' => $is_event,
            'site_code' => $this->_req('site_code'),
            'return_type' => $return_type,
            'target_id' => get_var($this->_req('target_id'), 'bookList'),
            'target_field' => get_var($this->_req('target_field'), 'ProdCode_book'),
        ];

        if ($return_type == 'table') {
            $data['ProdCode'] = $this->_req('ProdCode');
            $data['bookprovision_ccd'] = $this->codeModel->getCcd('610');
        }

        $this->load->view('common/search_mocktest', $data);
    }

    /**
     * 모의고사 관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => ['PD.SiteCode' => $this->_reqP('site_code')],
            'ORG' =>[
                'LKB' => [
                    'PD.ProdCode' => $this->_reqP('search_value'),
                    'PD.ProdName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->searchMockTestModel->listMockTest(true,$arr_condition);

        if($count > 0) {
            $list = $this->searchMockTestModel->listMockTest(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['PD.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
