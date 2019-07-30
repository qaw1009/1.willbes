<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\BaseController
{
    protected $models = array('pass/consult', 'sys/site', 'sys/category', 'sys/code');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();
        $offLineSite_def_code = key($offLineSite_list);

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        //카테고리 조회(구분)
        $arr_category = $this->categoryModel->getCategoryArray('');

        $this->load->view("pass/consult/member/index", [
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
            $list = $this->consultModel->listAllConsultMember(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.CsmIdx' => 'desc']);
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
                'A.CateCode' => $this->_reqP('search_category')
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