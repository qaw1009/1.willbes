<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'pass/readingRoom');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실신청현황/연장 인덱스
     */
    public function index()
    {
        $mang_type = $this->_req('mang_type');
        $arr_search_data = [];

        //캠퍼스 조회
        $arr_search_data['campus'] = $this->siteModel->getSiteCampusArray('');

        //결제상태
        $arr_search_data['pay_status'] = $this->codeModel->getCcd($this->readingRoomModel->groupCcd['payStatus']);

        //예치금반환

        //배정여부
        $arr_search_data['seat_status'] = $this->codeModel->getCcd($this->readingRoomModel->groupCcd['seatStatus']);

        //독서실명(정보 LrIdx)
        $arr_condition = [
            'IsStatus' => 'Y'
        ];
        $reading_info = $this->readingRoomModel->listReadingRoomInfo($arr_condition, 'LrIdx, Name AS ReadingRoomName');
        $arr_search_data['readingroom'] = array_pluck($reading_info, 'ReadingRoomName', 'LrIdx');

        $this->load->view("pass/reading_room/issue/index", [
            'mang_title' => $this->readingRoomModel->arr_mang_title[$mang_type],
            'default_query_string' => '&mang_type='.$mang_type,
            'arr_search_data' => $arr_search_data
        ]);
    }

    public function listAjax()
    {
        $mang_type = $this->_req('mang_type');

        $arr_condition = [
            'EQ' => [
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.CampusCcd' => $this->_reqP('search_campus_ccd'),
            ],
            'ORG' => [
                'LKB' => [
                    'a.Name' => $this->_reqP('search_value'),
                    'a.ProdCode' => $this->_reqP('search_value'),
                    'a.LakeLayer' => $this->_reqP('search_value'),
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => ['a.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
            ]);
        }

        $list = [];
        $count = $this->readingRoomModel->listSeatDetail($mang_type,true, $arr_condition);

        if ($count > 0) {
            $list = $this->readingRoomModel->listSeatDetail($mang_type,false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.LrIdx' => 'desc', 'c.RrudIdx' => 'asc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 좌석이동
     */
    public function modifySeatModal()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/issue/modify_seat_modal", [
            'arr_campus' => $arr_campus,
        ]);
    }
}