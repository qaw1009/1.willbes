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

        //캠퍼스'Y'상태 사이트 코드 조회
        $offLineSite_list = $this->siteModel->getOffLineSiteArray();

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
            'offLineSite_list' => $offLineSite_list,
            'mang_title' => $this->readingRoomModel->arr_mang_title[$mang_type],
            'default_query_string' => '&mang_type='.$mang_type,
            'arr_search_data' => $arr_search_data,
            'arr_seat_status_ccd' => $this->readingRoomModel->_arr_reading_room_seat_status_ccd
        ]);
    }

    public function listAjax()
    {
        $mang_type = $this->_req('mang_type');
        $search_value = $this->_reqP('search_value'); // 검색어
        $search_value_enc = $this->readingRoomModel->getEncString($search_value); // 검색어 암호화

        $arr_condition = [
            'EQ' => [
                'b.SiteCode' => $this->_reqP('search_site_code'),       //사이트
                'b.CampusCcd' => $this->_reqP('search_campus_ccd'),     //캠퍼스
                'op.PayStatusCcd' => $this->_reqP('search_pay_status'), //결제상태
                'b.StatusCcd' => $this->_reqP('search_seat_status'),    //배정여부
                'b.LrIdx' => $this->_reqP('search_readingroom_idx'),    //독서실명
                //예치금반환
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemName' => $search_value,
                    'm.MemID' => $search_value, // 아이디
                    'm.PhoneEnc' => $search_value_enc, // 암호화된 전화번호
                    'm.Phone2Enc' => $search_value_enc, // 암호화된 전화번호 중간자리
                    'm.Phone3' => $search_value, // 전화번호 뒷자리
                    'o.OrderNo' => $search_value, // 주문번호
                ]
            ]
        ];

        if (!empty($this->_reqP('search_start_date')) && !empty($this->_reqP('search_end_date'))) {
            switch ($this->_reqP('search_date_type')) {
                case "P" :  //결제완료일
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => ['o.OrderDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                        //'BDT' => ['b.CompleteDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                    ]);
                    break;
                case "R" :  //등록일 [자리등록일]
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => ['b.RegDatm' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                    ]);
                    break;
                case "S" :  //대여시작일
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => ['b.UseStartDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                    ]);
                    break;
                case "E" :  //대여종료일
                    $arr_condition = array_merge($arr_condition, [
                        'BDT' => ['b.UseEndDate' => [$this->_reqP('search_start_date'), $this->_reqP('search_end_date')]]
                    ]);
                    break;
            }
        }

        $list = [];
        $count = $this->readingRoomModel->listSeatDetail($mang_type,true, $arr_condition);

        if ($count > 0) {
            $order_by = ['o.OrderIdx' => 'DESC', 'b.StatusCcd' => 'ASC', 'b.UseEndDate' => 'ASC', 'b.RrudIdx' => 'DESC'];
            $list = $this->readingRoomModel->listSeatDetail($mang_type,false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), $order_by);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 좌석이동 레이어 팝업
     * @param array $params
     */
    public function modifySeatModal($params = [])
    {
        $prod_code = $params[0];
        $mang_type = $this->_req('mang_type');
        $now_order_idx = $this->_reqG('now_order_idx');
        $now_date = date('Ymd');
        $is_change_seat = 'Y';      //좌석변경여부 설정

        //좌석상태공통코드
        $arr_seat_status = $this->codeModel->getCcd($this->readingRoomModel->groupCcd['seat']);
        unset($arr_seat_status[$this->readingRoomModel->_arr_reading_room_status_ccd['N']]);

        //상품기본정보
        $data = $this->readingRoomModel->findReadingRoomForModify($now_order_idx, [], $mang_type);
        if (count($data) < 1) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $use_end_date = str_replace('-','',$data['UseEndDate']);
        if ($use_end_date < $now_date) {
            $is_change_seat = 'N';
        }

        //좌석정보
        $seat_data = $this->readingRoomModel->listSeat($prod_code);

        $this->load->view("pass/reading_room/issue/modify_seat_modal", [
            'prod_code' => $prod_code,
            'default_query_string' => '&mang_type='.$mang_type,
            'arr_seat_status' => $arr_seat_status,
            'data' => $data,
            'seat_data' => $seat_data,
            'is_change_seat' => $is_change_seat,
            'method' => 'modify'
        ]);
    }

    /**
     * 메모 리스트
     * @param array $params
     * @return CI_Output
     */
    public function ajaxListMemo($params = [])
    {
        $master_order_idx = $params[0];
        $memo_data = $this->readingRoomModel->getMemoListAll($master_order_idx);

        return $this->response([
            'recordsTotal' => count($memo_data),
            'recordsFiltered' => count($memo_data),
            'data' => $memo_data,
        ]);
    }

    /**
     * 메모 등록
     */
    public function storeMemo()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'master_order_idx', 'label' => '메인주문번호', 'rules' => 'trim|required|integer'],
            ['field' => 'memo_content', 'label' => '메모', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->readingRoomModel->addMemo($this->_reqP(null,false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 좌석변경처리
     */
    public function storeSeatChange()
    {
        $mang_type = $this->_req('mang_type');

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[modify]'],
            ['field' => 'now_order_idx', 'label' => '주문번호식별자', 'rules' => 'trim|required'],
            ['field' => 'rdr_seat_status', 'label' => '좌석상태', 'rules' => 'trim|required'],
            ['field' => 'set_seat', 'label' => '좌석번호', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->readingRoomModel->modifyReadingRoomSeat($this->_reqP(null,false), $mang_type);
        $this->json_result($result, '변경 되었습니다.', $result);
    }

    /**
     * 퇴실처리
     */
    public function storeSeatOut()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'lr_idx', 'label' => '상품식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'now_order_idx', 'label' => '현재주문번호식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'now_seat_num', 'label' => '좌석번호', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->readingRoomModel->modifyReadingRoomSeatForOut($this->_reqP(null,false));
        $this->json_result($result, '퇴실되었습니다.', $result);
    }
}