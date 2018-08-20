<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('sys/site');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실등록관리 인덱스
     */
    public function index()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/index", [
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 독서실등록관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $count = 1;
        $list = [
            '0' => [
                'Idx' => '1',
                'SiteName' => '학원경찰',
                'ReadingRoomCode' => '1',
                'ReadingRoomName' => '1층 A',
                'ClassRoomName' => '101',
                '예치금' => '10000',
                '판매가' => '20000',
                '좌석현황' => '10/100',
                '잔여석' => '90',
                '마감여부' => '진행중',
                '자동문자' => '사용',
                'IsUse' => 'Y',
                'RegAdminName' => '관리자명',
                'RegDatm' => '2018-01-01 10:00:00',
                'aaa' => '배정'
            ]
        ];

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 독서실등록관리 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $data = null;

        //고객센터 전화번호 조회
        $site_csTel = json_encode($this->siteModel->getSiteArray(false,'CsTel'));

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
        }

        $this->load->view("pass/reading_room/regist/create", [
            'method' => $method,
            'arr_campus' => $arr_campus,
            'site_csTel' => $site_csTel,
            'data' => $data
        ]);
    }

    /**
     * 독서실등록관리 독서실 신청현황 리스트
     */
    public function applyMemberList()
    {
        $room_data = [];

        $this->load->view("pass/reading_room/regist/apply_member_list", [
            'room_data' => $room_data
        ]);
    }

    /**
     * 독서실등록관리 독서실 신청현황 리스트 조회
     */
    public function applyMemberListAjax()
    {
        $count = 1;
        $list = [
            '0' => [
                'Idx' => '1',
                'OrderNum' => '1020103040',
                'MemName' => '홍길동',
                'MemId' => 'dlumjjang',
                'MemTel' => '010-1234-1234',
                '결제수단' => '카드',
                '결제완료일' => '2018-01-01 10:00:00',
                '독서실명' => '1층 A',
                '결제금액' => '100000',
                '결제상태' => '결제완료',
                '좌석배정' => '미배정',
                'aaa' => '배정'
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
    public function createMemberModal()
    {
        $this->load->view("pass/reading_room/regist/create_member_modal", [
        ]);
    }
}