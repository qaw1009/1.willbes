<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchLectureAll extends \app\controllers\BaseController
{
    protected $models = array('sys/code','product/on/lecture','product/on/packageAdmin','product/on/packagePeriod','product/off/offLecture','product/off/offPackageAdmin');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $prod_type = $this->_req('prod_type');
        $LearnPatternCcd = $this->_req('LearnPatternCcd');
        $prod_tabs = array_filter(explode(',', $this->_req('prod_tabs')));  // 노출되는 상품 탭
        $hide_tabs = array_filter(explode(',', $this->_req('hide_tabs')));  // 비노출되는 상품 탭
        $is_event = get_var($this->_req('is_event'), 'N');  // change 이벤트 발생 여부
        $is_single = get_var($this->_req('is_single'), '');  // 단일선택 여부

        if($prod_type === 'on' && empty($LearnPatternCcd) ) {
            $LearnPatternCcd = '615001';        //단강좌
        } elseif($prod_type === 'off' && empty($LearnPatternCcd) ) {
            $LearnPatternCcd = '615006';        //단과반
        }

        $this->load->view('common/search_lecture_all',[
            'prod_type' => $prod_type
            ,'prod_tabs' => $prod_tabs
            ,'hide_tabs' => $hide_tabs
            ,'is_event' => $is_event
            ,'is_single' => $is_single
            ,'site_code' => $this->_req('site_code')
            ,'return_type' => $this->_req('return_type')
            ,'target_id' => $this->_req('target_id')
            ,'target_field' => $this->_req('target_field')
            ,'LearnPatternCcd' => $LearnPatternCcd
        ]);
    }

    /**
     * 강좌 목록
     * @return CI_Output
     */
    public function listAjax()
    {
        $LearnPatternCcd = $this->_reqP('LearnPatternCcd');

        $arr_condition = [
            'EQ' => [
                'B.LearnPatternCcd' => $LearnPatternCcd,
                'A.SiteCode' => $this->_reqP('site_code'),
            ]
        ];

        if($this->_reqP('locationid') === 'tar') {      //대상강좌일경우 ... 선수강으로 설정 된 놈만
            $arr_condition = array_merge_recursive($arr_condition,[
                'EQ' => [
                    'B.LecSaleType' => 'B',
                ],
            ]);
        }

        $arr_condition = array_merge($arr_condition,[
            'ORG1' => [
                'LKB' => [
                    'A.ProdCode' => $this->_reqP('search_value'),
                    'A.ProdName' => $this->_reqP('search_value')
                ]
            ],
            'ORG2' => [
                'LKB' => [
                    'E.ProfIdx_String' => $this->_reqP('search_prof_value'),
                    'E.wProfName_String' => $this->_reqP('search_prof_value')
                ]
            ],
        ]);

        if($LearnPatternCcd === '615001') {
            $modelname = "lectureModel";
        } elseif($LearnPatternCcd === '615003') {
            $modelname = "packageAdminModel";
        } elseif($LearnPatternCcd === '615004') {
            $modelname = "packagePeriodModel";
        } elseif($LearnPatternCcd === '615006') {
            $modelname = "offLectureModel";
        } elseif($LearnPatternCcd === '615007') {
            $modelname = "offPackageAdminModel";
        }

        $list = [];
        $count = $this->{$modelname}->listLecture(true, $arr_condition);

        if ($count > 0) {
            $list = $this->{$modelname}->listLecture(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
