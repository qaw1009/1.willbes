<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchReadingRoom extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'pass/readingRoom');
    protected $helpers = array();
    protected $mang_type = 'R';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실 목록
     */
    public function index()
    {
        $prod_type = $this->_req('prod_type');
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view('common/search_reading_room',[
            'prod_type' => $prod_type,
            'arr_campus' => $arr_campus,
            'mang_title' => $this->readingRoomModel->arr_mang_title[$this->mang_type]
        ]);
    }

    /**
     * 독서실 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y',
                'a.IsUse' => 'Y',
                'a.SiteCode' => $this->_reqP('_search_site_code'),
                'a.CampusCcd' => $this->_reqP('_search_campus_ccd'),
                'a.IsSmsUse' => $this->_reqP('_search_is_sms_use')
            ],
            'ORG' =>[
                'LKB' => [
                    'a.ReadingRoomName' => $this->_reqP('_search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('_search_start_date')) && !empty($this->_reqP('_search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('_search_start_date'), $this->_reqP('_search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->readingRoomModel->listAllReadingRoom($this->mang_type,true, $arr_condition);

        if ($count > 0) {
            $list = $this->readingRoomModel->listAllReadingRoom($this->mang_type,false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.LrIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }
}