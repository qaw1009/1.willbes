<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'pass/readingRoom');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실,사물함 등록/좌석현황 인덱스
     */
    public function index()
    {
        $mang_type = $this->_req('mang_type');

        // TODO : lms 방문결제페이지에 필요한 파라미터 차 후 삭제
        $rdr_master_order_idx = $this->_reqG('rdr_master_order_idx');
        $rdr_prod_code = $this->_reqG('rdr_prod_code');

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/reading_room/regist/index", [
            'mang_title' => $this->readingRoomModel->arr_mang_title[$mang_type],
            'prod_type' => $this->readingRoomModel->arr_prod_type[$mang_type],
            'default_query_string' => '&mang_type='.$mang_type,
            'arr_campus' => $arr_campus,
            'rdr_master_order_idx' => $rdr_master_order_idx,     //TODO : lms 방문결제페이지에 필요한 파라미터 차 후 삭제
            'rdr_prod_code' => $rdr_prod_code     //TODO : lms 방문결제페이지에 필요한 파라미터 차 후 삭제
        ]);
    }

    /**
     * 독서실,사물함 등록/좌석현황 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $mang_type = $this->_req('mang_type');

        $arr_condition = [
            'EQ' => [
                'a.IsStatus' => 'Y',
                'a.SiteCode' => $this->_reqP('search_site_code'),
                'a.CampusCcd' => $this->_reqP('search_campus_ccd'),
                'a.IsSmsUse' => $this->_reqP('search_is_sms_use'),
                'a.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'a.ReadingRoomName' => $this->_reqP('search_value'),
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
        $count = $this->readingRoomModel->listAllReadingRoom($mang_type,true, $arr_condition);

        if ($count > 0) {
            $list = $this->readingRoomModel->listAllReadingRoom($mang_type,false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['a.LrIdx' => 'desc']);
        }

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
        $mang_type = $this->_req('mang_type');

        $method = 'POST';
        $data = null;
        $lr_idx = '';

        //고객센터 전화번호 조회
        $site_csTel = json_encode($this->siteModel->getSiteArray(false,'CsTel'));

        //캠퍼스 조회
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $lr_idx = $params[0];
            $arr_condition = [
                'EQ' => [
                    'LrIdx' => $lr_idx,
                    'IsStatus' => 'Y'
                ]
            ];
            $tempData = $this->readingRoomModel->getReadingRoomInfo($arr_condition, 'ProdCode');
            $data = $this->readingRoomModel->findReadingRoom($tempData['ProdCode']);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("pass/reading_room/regist/create", [
            'method' => $method,
            'lr_idx' => $lr_idx,
            'mang_type' => $mang_type,
            'mang_title' => $this->readingRoomModel->arr_mang_title[$mang_type],
            'default_query_string' => '&mang_type='.$mang_type,
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
        $lr_idx = '';
        $mang_type = $this->_req('mang_type');

        $rules = [
            ['field' => 'mang_type', 'label' => $this->readingRoomModel->arr_mang_title[$mang_type].'타입', 'rules' => 'trim|required|in_list[R,L]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'rd_name', 'label' => $this->readingRoomModel->arr_mang_title[$mang_type].'명', 'rules' => 'trim|required|max_length[50]'],
            ['field' => 'lake_layer', 'label' => '강의실', 'rules' => 'trim|required|integer'],
            ['field' => 'use_start_date', 'label' => '사용기간시작일자', 'rules' => 'trim|required'],
            ['field' => 'use_end_date', 'label' => '사용기간종료일자', 'rules' => 'trim|required'],
            ['field' => 'use_qty', 'label' => $this->readingRoomModel->arr_mang_title[$mang_type].'총좌석수', 'rules' => 'trim|required|integer'],
            ['field' => 'transverse_num', 'label' => '가로수', 'rules' => 'trim|required|integer'],
            ['field' => 'start_no', 'label' => '좌석시작번호', 'rules' => 'trim|required|integer'],
            ['field' => 'end_no', 'label' => '좌석종료번호', 'rules' => 'trim|required|integer'],
            ['field' => 'sale_price', 'label' => '정상가', 'rules' => 'trim|required|integer'],
            ['field' => 'sale_rate', 'label' => '할인율', 'rules' => 'trim|required|integer'],
            ['field' => 'real_sale_price', 'label' => '판매가', 'rules' => 'trim|required|integer']
        ];

        if (empty($this->_reqP('lr_idx')) === false) {
            $method = 'modify';
            $lr_idx = $this->_reqP('lr_idx');
        } else {
            $rules = array_merge($rules,[
                ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required']
            ]);

        }

        if ($this->validate($rules) === false) {
            return;
        }

        //_addBoard, _modifyBoard
        $result = $this->readingRoomModel->{$method . 'ReadingRoom'}($this->_reqP(null, false), $lr_idx);
        $this->json_result($result, '저장 되었습니다.', $result);
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
        $rdr_prod_code = $this->_reqG('rdr_prod_code');
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
        if ($prod_code == $rdr_prod_code) {
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

        $this->load->view("pass/reading_room/regist/create_seat_modal", [
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


    /**
     * 독서실/사물함 방문결제 TEST
     * TODO : 방문결제 개발 시 해당 메소드 삭제
     */
    public function testStoreSeat()
    {
        $arr_input = [
            'prod_code' => $this->_reqP('rdr_prod_code'),
            'rdr_master_order_idx' => $this->_reqP('rdr_master_order_idx'),
            'rdr_is_extension' => $this->_reqP('rdr_is_extension'),
            'serial_num' => $this->_reqP('rdr_serial_num'),
            'seat_status' => $this->_reqP('rdr_seat_status'),
            'rdr_use_start_date' => $this->_reqP('rdr_use_start_date'),
            'rdr_use_end_date' => $this->_reqP('rdr_use_end_date'),
            'rdr_is_sub_price' => $this->_reqP('rdr_is_sub_price'),
            'rdr_memo' => $this->_reqP('rdr_memo')
        ];

        $order_idx = '63';      //임의 생성한 주문식별자
        //$order_idx = '96';      //임의 생성한 주문식별자

        $result = $this->readingRoomModel->testAddSeat($arr_input, $order_idx);
        print_r($result);
        return $result;
    }
}