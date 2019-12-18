<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSearchReadingRoom extends \app\controllers\BaseController
{
    protected $mang_type;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실 목록
     */
    public function index()
    {
        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray($this->_req('site_code'));

        $prod_type = $this->_req('prod_type');
        $prod_tabs = array_filter(explode(',', $this->_req('prod_tabs')));  // 노출되는 상품 탭
        $hide_tabs = array_filter(explode(',', $this->_req('hide_tabs')));  // 비노출되는 상품 탭
        $is_event = get_var($this->_req('is_event'), 'N');  // change 이벤트 발생 여부
        $is_single = get_var($this->_req('is_single'), '');  // 단일선택 여부
        $return_type = get_var($this->_req('return_type'), 'table');

        $data = [
            'arr_campus' => $arr_campus,
            'mang_title' => $this->readingRoomModel->arr_mang_title[$this->mang_type],
            'prod_type' => $prod_type,
            'prod_tabs' => $prod_tabs,
            'hide_tabs' => $hide_tabs,
            'is_event' => $is_event,
            'is_single' => $is_single,
            'site_code' => $this->_req('site_code'),
            'return_type' => $return_type,
            'target_id' => get_var($this->_req('target_id'), 'bookList'),
            'target_field' => get_var($this->_req('target_field'), 'ProdCode_book'),
            'bookprovision_ccd' => []
        ];

        $this->load->view('common/search_reading_room',$data);
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
                'a.SiteCode' => $this->_reqP('site_code'),
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

    /**
     * 좌석배정/연장 레이어 팝업
     * @param array $params
     */
    public function createSeatModal($params = [])
    {
        $is_extension = false;  //연장여부 기본 설정
        $prod_code = $params[0];
        $rdr_master_order_idx = $this->_reqG('rdr_master_order_idx');
        $now_date = date('Ymd');

        //좌석상태공통코드
        $arr_seat_status = $this->codeModel->getCcd($this->readingRoomModel->groupCcd['seat']);
        unset($arr_seat_status[$this->readingRoomModel->_arr_reading_room_status_ccd['N']]);

        //상품기본정보
        $data = $this->readingRoomModel->findReadingRoom($prod_code);
        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        //좌석정보
        $seat_data = $this->readingRoomModel->listSeat($prod_code);

        //연장일 경우
        if (empty($rdr_master_order_idx) === false) {
            $is_extension = true;
            $master_order_idx = $rdr_master_order_idx;

            //좌석정보 조회
            $arr_condition = [
                'EQ' => [
                    'MasterOrderIdx' => $master_order_idx,
                    'StatusCcd' => $this->readingRoomModel->_arr_reading_room_status_ccd['Y']
                ]
            ];
            $arr_use_seat_data = $this->readingRoomModel->getReadingRoomMst($arr_condition, 'SerialNumber, StatusCcd, UseEndDate');

            $use_end_date = str_replace('-','',$arr_use_seat_data['UseEndDate']);
            if ($use_end_date < $now_date) {
                $use_start_date = date('Y-m-d');
            } else {
                $use_start_date = $arr_use_seat_data['UseEndDate'];
            }

        } else {
            $arr_use_seat_data = null;
            $master_order_idx = '';
            $use_start_date = '';
        }

        //기준주문식별자 메모 데이터 조회
        $memo_data = $this->readingRoomModel->getMemoListAll($master_order_idx);

        $this->load->view("common/search_reading_room_seat", [
            'prod_code' => $prod_code,
            'arr_seat_status' => $arr_seat_status,
            'data' => $data,
            'seat_data' => $seat_data,
            'memo_data' => $memo_data,
            'rdr_master_order_idx' => $rdr_master_order_idx,
            'is_extension' => $is_extension,
            'arr_use_seat_data' => $arr_use_seat_data,
            'use_start_date' => $use_start_date     //대여기간 시작일 초기 값
        ]);
    }
}