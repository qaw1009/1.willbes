<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchList extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/category', 'site/search');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_category = $this->categoryModel->getCategoryArray('','','',1);
        $arr_m_category = $this->categoryModel->getCategoryArray('','','',2);

        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if(empty($arr_input)) {
            $arr_input['search_start_date'] = date("Y-m-d");
            $arr_input['search_end_date'] = date("Y-m-d");
        }

        $arr_condition = $this->_common_condition($arr_input);
        $add_condition = empty($arr_input['search_except_will_ip']) ? [] : ['search_except_will_ip'=>$arr_input['search_except_will_ip']];

        $data = [];
        $get_type = ['cate','site','word','cloud','os'];

        foreach ($get_type as $type) {
            $data[$type] = $this->searchModel->getGroupByData($arr_condition, $type, ['count(*)' => 'DESC'], $add_condition);
        }

        $this->load->view('site/search/index',[
            'arr_category' => $arr_category,
            'arr_m_category' => $arr_m_category,
            'arr_input' => $arr_input,
            'data' => $data
        ]);
    }

    public function listAjax()
    {
        $list = [];
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        if(empty($arr_input)) {
            $arr_input['search_start_date'] = date("Y-m-d");
            $arr_input['search_end_date'] = date("Y-m-d");
        }

        $arr_condition = $this->_common_condition($arr_input);
        $add_condition = empty($arr_input['search_except_will_ip']) ? [] : ['search_except_will_ip'=>$arr_input['search_except_will_ip']];

        $order_by = ['sl.SlIdx' => 'DESC', 'sl.SearchWord' => 'ASC'];

        $count = $this->searchModel->listSearch(true, $arr_condition, null, null,$order_by, $add_condition);

        if($count > 0) {
            $list = $this->searchModel->listSearch(false, $arr_condition, element('length',$arr_input), element('start',$arr_input), $order_by, $add_condition);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    private function _common_condition($arr_input)
    {
        $search_cate = empty(element('search_md_category', $arr_input)) ?  element('search_category', $arr_input) : element('search_md_category', $arr_input) ;
        $arr_condition = [
            'EQ' => [
                'sl.SiteCode' => element('search_site_code', $arr_input),
                'sl.CateCode' => $search_cate
            ]
        ];

        if(!empty(element('search_value', $arr_input))) {
            $arr_condition = array_merge($arr_condition, [
                'ORG' => [
                    'LKB' => [
                        'sl.SearchWord' => $arr_input['search_value'],
                    ]
                ]
            ]);
        }
        if(!empty($arr_input['search_start_date'] ) && !empty($arr_input['search_end_date'] )) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'sl.RegDatm' => [$arr_input['search_start_date'] , $arr_input['search_end_date'] ]
                ],
            ]);
        }

        return $arr_condition;
    }
}