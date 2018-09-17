<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'pass/readingRoom');
    protected $helpers = array();
    protected $mang_type;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실,사물함 등록/좌석현황 인덱스
     */
    public function index()
    {
        $this->mang_type = $this->_req('mang_type');

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/index", [
            'mang_title' => $this->readingRoomModel->arr_mang_title[$this->mang_type],
            'default_query_string' => '&mang_type='.$this->mang_type,
            'arr_campus' => $arr_campus
        ]);
    }

    /**
     * 독서실,사물함 등록/좌석현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $count = 1;
        $list = [
            '0' => [
                'Idx' => '1',
                'SiteName' => '학원경찰',
                'CampusName' => '신림',
                'ReadingRoomCode' => '1',
                'ReadingRoomName' => '1층 A',
                'ClassRoomName' => '101',
                '예치금' => '10000',
                '판매가' => '20000',
                '좌석현황' => '10/100',
                '잔여석' => '90',
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
     * 독서실,사물함 등록/좌석현황 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $this->mang_type = $this->_req('mang_type');

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
            'mang_type' => $this->mang_type,
            'mang_title' => $this->readingRoomModel->arr_mang_title[$this->mang_type],
            'default_query_string' => '&mang_type='.$this->mang_type,
            'arr_campus' => $arr_campus,
            'site_csTel' => $site_csTel,
            'data' => $data
        ]);
    }

    /**
     * 독서실,사물함 등록/좌석현황 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $idx = '';
        $this->mang_type = $this->_req('mang_type');

        $rules = [
            ['field' => 'mang_type', 'label' => $this->readingRoomModel->arr_mang_title[$this->mang_type].'타입', 'rules' => 'trim|required|in_list[R,L]'],
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'rd_name', 'label' => $this->readingRoomModel->arr_mang_title[$this->mang_type].'명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'lake_layer', 'label' => '강의실', 'rules' => 'trim|required|integer'],
            ['field' => 'use_start_date', 'label' => '사용기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'use_end_date', 'label' => '사용기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'use_qty', 'label' => $this->readingRoomModel->arr_mang_title[$this->mang_type].'총좌석수', 'rules' => 'trim|required|integer'],
            ['field' => 'transverse_num', 'label' => '가로수', 'rules' => 'trim|required|integer'],
            ['field' => 'start_no', 'label' => '좌석시작번호', 'rules' => 'trim|required|integer'],
            ['field' => 'end_no', 'label' => '좌석종료번호', 'rules' => 'trim|required|integer'],
            ['field' => 'sale_price', 'label' => '정상가', 'rules' => 'trim|required|integer'],
            ['field' => 'sale_rate', 'label' => '할인율', 'rules' => 'trim|required|integer'],
            ['field' => 'real_sale_price', 'label' => '판매가', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $idx = $this->_reqP('idx');
        }

        //_addBoard, _modifyBoard
        $result = $this->readingRoomModel->{$method . 'ReadingRoom'}($this->_reqP(null, false), $idx);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 독서실등록/좌석현황 배정관리
     */
    public function assignManageList($params = [])
    {
        $post_data = null;
        $post_data['search_site_code'] = $this->_reqP('search_site_code');

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/assign_manage_list", [
            'idx' => $params[0],
            'arr_campus' => $arr_campus,
            'post_data' => $post_data,
        ]);
    }


    /**
     * 좌석배정
     */
    public function createSeatModal()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/create_seat_modal", [
            'arr_campus' => $arr_campus,
        ]);
    }

    /**
     * 좌석변경
     */
    public function modifySeatModal()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/modify_seat_modal", [
            'arr_campus' => $arr_campus,
        ]);
    }


    /**
     * 좌석 버튼 TEST
     */
    public function testPage()
    {
        $post_data = null;

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/test/page", [
            'idx' => 1,
            'post_data' => $post_data,
            'arr_campus' => $arr_campus
        ]);
    }
    /**
     * 좌석 버튼 TEST
     */
    public function testPopup()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/test/popup", [
            'arr_campus' => $arr_campus,
        ]);
    }
}