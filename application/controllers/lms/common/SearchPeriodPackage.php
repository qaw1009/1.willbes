<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchPeriodPackage extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/packagePeriod');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected $prodtypeccd = '636001';  //온라인강좌
    protected $learnpatternccd = '615004'; //기간제 패키지

    public function index()
    {
        $this->load->view('common/search_period_package',[
            'site_code' => $this->_req('site_code')
            ,'locationid' => $this->_req('locationid')
        ]);
    }

    /**
     * 기간제패지키지 목록
     * @return CI_Output
     */
    public function listAjax()
    {

        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->prodtypeccd,
                'B.LearnPatternCcd' => $this->learnpatternccd,
                'A.SiteCode' => $this->_reqP('search_site_code'),
            ],
        ];

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
        ]);


        //var_dump($arr_condition);

        $list = [];
        $count = $this->packagePeriodModel->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->packagePeriodModel->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);

    }
}
