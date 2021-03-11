<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseConsultMember extends \app\controllers\BaseController
{
    protected $models = array('pass/consult', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();
    protected $_consult_name;
    protected $_consult_type;
    protected $_consult_status;
    protected $_default_path;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //학원 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();
        $offLineSite_def_code = key($offLineSite_list);

        $arr_campus = $this->siteModel->getSiteCampusArray('');
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("pass/consult/base/member/index", [
            'default_path' => $this->_default_path,
            'consult_name' => $this->_consult_name,
            'consult_status' => $this->_consult_status,
            'offLineSite_list' => $offLineSite_list,
            'offLineSite_def_code' => $offLineSite_def_code,
            'arr_campus' => $arr_campus,
            'arr_category' => $arr_category
        ]);
    }

    public function listAjax()
    {
        $arr_condition = $this->_getListConditions();

        $list = [];
        $count = $this->consultModel->listAllConsultMember(true, $arr_condition);
        if ($count > 0) {
            $list = $this->consultModel->listAllConsultMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CsmIdx' => 'desc'], $this->_consult_status);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 검색 조건 셋팅
     * @return array
     */
    private function _getListConditions()
    {
        $arr_condition = [
            'EQ' => [
                'C.SiteCode' => $this->_reqP('search_site_code'),
                'C.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'A.IsConsult' => $this->_reqP('search_is_consult'),
                'A.CateCode' => $this->_reqP('search_category'),
                'C.ConsultType' => $this->_consult_type
            ],
            'ORG' => [
                'LKB' => [
                    'D.MemId' => $this->_reqP('search_value'),
                    'D.MemName' => $this->_reqP('search_value'),
                    'D.Phone3' => $this->_reqP('search_value'),
                ]
            ]
        ];

        // 날짜 검색
        if ($this->_reqP('search_date_type') == 'I') {
            //상담일
            $arr_condition['BDT'] = ['A.ConsultDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        } else if($this->_reqP('search_date_type') == 'R') {
            //신청일
            $arr_condition['BDT'] = ['A.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        } else if($this->_reqP('search_date_type') == 'R') {
            //취소일
            $arr_condition['BDT'] = ['A.CancelDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]];
        }

        return $arr_condition;
    }
}