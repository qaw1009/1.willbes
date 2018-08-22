<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site');
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
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/issue/index", [
            'arr_campus' => $arr_campus
        ]);
    }

    public function listAjax()
    {
        $count = 2;
        $list = [
            '0' => [
                'Idx' => '1',
                'OrderNo' => '2018000001',
                'MemName' => '홍길동',
                'MemPhone' => '010-1234-1234',
                '결제완료일' => '2018-01-01 10:00:00',
                'CampusName' => '신림',
                'ReadingRoomName' => '1층 A',
                '결제금액' => '10000',
                '결제상태' => '결제완료',
                '좌석번호' => '',
                '예치금' => '',
                '대여시작일' => '',
                '대여종료일' => '',
                'AssingIsUse' => 'N',
                '좌석상태' => '신규',
                'RegAdminName' => '',
                'RegDatm' => '',
                'aaa' => '배정',
                'bbb' => ''
            ],
            '1' => [
                'Idx' => '1',
                'OrderNo' => '2018000001',
                'MemName' => '홍길동',
                'MemPhone' => '010-1234-1234',
                '결제완료일' => '2018-01-01 10:00:00',
                'CampusName' => '신림',
                'ReadingRoomName' => '1층 A',
                '결제금액' => '10000',
                '결제상태' => '결제완료',
                '좌석번호' => '3',
                '예치금' => '반환',
                '대여시작일' => '2018-01-01 10:00:00',
                '대여종료일' => '2018-01-01 10:00:00',
                '배정여부' => 'Y',
                '좌석상태' => '연장',
                'RegAdminName' => '관리자명',
                'RegDatm' => '2018-01-01 10:00:00',
                'aaa' => '배정',
                'bbb' => '연장'
            ]
        ];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 좌석배정
     */
    public function createIssueSeatModal()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/create_issue_seat_modal", [
            'arr_campus' => $arr_campus,
        ]);
    }
}