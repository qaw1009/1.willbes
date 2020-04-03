<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('sys/site','sys/code','pass/lectureRoomRegist','pass/lectureRoomIssue');
    protected $helpers = array('download');
    protected $_groupCcd = [
        'SmsSendCallBackNum' => '706'   //SMS 발송번호
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);
        //캠퍼스
        $arr_campus = $this->siteModel->getSiteCampusArray('');

        $this->load->view("pass/lecture_room/regist/index", [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_campus' => $arr_campus
        ]);
    }

    public function listAjax()
    {
        $arr_condition_1 = [
            'EQ' => [
                'IsStatus' => 'Y',
                'SiteCode' => $this->_reqP('search_site_code'),
                'CampusCcd' => $this->_reqP('search_campus_ccd'),
                'IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LectureRoomName' => $this->_reqP('search_value'),
                    'LrCode' => $this->_reqP('search_value')
                ]
            ]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'LU.IsSmsUse' => $this->_reqP('search_is_sms_use'),
            ]
        ];
        if (!empty($this->_reqP('seat_choice_start_date')) && !empty($this->_reqP('seat_choice_end_date'))) {
            $arr_condition_2 = array_merge($arr_condition_2,[
                'ORG' => [
                    'BET' => [
                        'LU.SeatChoiceStartDate' => [$this->_reqP('seat_choice_start_date'), $this->_reqP('seat_choice_end_date')],
                        'LU.SeatChoiceEndDate' => [$this->_reqP('seat_choice_start_date'), $this->_reqP('seat_choice_end_date')]
                    ],
                    'RAW' => [
                        '(LU.SeatChoiceStartDate < "' => $this->_reqP('seat_choice_start_date') . '" AND LU.SeatChoiceEndDate > "' . $this->_reqP('seat_choice_end_date') . '")'
                    ]
                ]
            ]);
        }

        $list = [];
        $count = $this->lectureRoomRegistModel->mainList(true, $arr_condition_1, $arr_condition_2);
        if ($count > 0) {
            $list = $this->lectureRoomRegistModel->mainList(false, $arr_condition_1, $arr_condition_2, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function create($params = [])
    {
        $method = 'POST';
        $lr_code = '';
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $arr_campus = $this->siteModel->getSiteCampusArray('');
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $lr_code = $params[0];
            $arr_condition = [
                'EQ'=>[
                    'LrCode' => $lr_code,
                    'IsStatus' => 'Y'
                ]
            ];
            $data = $this->lectureRoomRegistModel->findLectureRoom($arr_condition);
            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view("pass/lecture_room/regist/create", [
            'method' => $method,
            'lr_code' => $lr_code,
            'arr_site_code' => $arr_site_code,
            'arr_campus' => $arr_campus,
            'data' => $data
        ]);
    }

    public function store()
    {
        $method = 'add';
        $idx = '';

        $rules = [
            ['field' => 'site_code', 'label' => '운영사이트', 'rules' => 'trim|required|integer'],
            ['field' => 'campus_ccd', 'label' => '캠퍼스', 'rules' => 'trim|required|integer'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'room_name', 'label' => '강의실명', 'rules' => 'trim|required|max_length[50]']
        ];

        if (empty($this->_reqP('lr_code')) === false) {
            $method = 'modify';
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureRoomRegistModel->{$method . 'LectureRoom'}($this->_reqP(null, false), $idx);
        $this->json_result($result['ret_cd'], '저장 되었습니다.', $result, $result);
    }

    /**
     * 강의실회차 Ajax
     * @return CI_Output
     */
    public function listAjaxUnit()
    {
        $arr_condition = [
            'EQ' => [
                'LU.IsStatus' => 'Y',
                'LU.LrCode' => $this->_reqP('lr_code'),
                'LU.IsUse' => $this->_reqP('search_is_use'),
            ],
            'ORG' => [
                'LKB' => [
                    'LU.UnitName' => $this->_reqP('search_value'),
                    'LU.LrUnitCode' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->lectureRoomRegistModel->unitList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->lectureRoomRegistModel->unitList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    /**
     * 강의실회차 등록/수정 모달 창
     * @param array $params
     */
    public function createUnitModal($params = [])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $method = 'POST';
        $lr_code = $params[0];
        $lr_unit_code = '';

        //발신번호조회
        $arr_send_callback_ccd = $this->codeModel->getCcd($this->_groupCcd['SmsSendCallBackNum'], 'CcdValue');

        $data = null;
        if (empty($params[1]) === false) {
            $method = 'PUT';
            $lr_unit_code = $params[1];
            $data = $this->lectureRoomRegistModel->findLectureRoomUnit($lr_code, $lr_unit_code);
        }

        $this->load->view("pass/lecture_room/regist/unit_modal", [
            'method' => $method,
            'lr_code' => $lr_code,
            'lr_unit_code' => $lr_unit_code,
            'arr_send_callback_ccd' => $arr_send_callback_ccd,
            'data' => $data
        ]);
    }

    /**
     * 강의실회차 등록/수정
     */
    public function storeUnit()
    {
        $method = 'add';
        $rules = [
            ['field' => 'lr_code', 'label' => '강의실코드', 'rules' => 'trim|required|integer'],
            ['field' => 'unit_name', 'label' => '좌석정보명', 'rules' => 'trim|required'],
            ['field' => 'use_qty', 'label' => '강의실총좌석수', 'rules' => 'trim|required|integer'],
            ['field' => 'transverse_num', 'label' => '가로수', 'rules' => 'trim|required|integer'],
            ['field' => 'seat_choice_start_date', 'label' => '좌석선택기간', 'rules' => 'trim|required'],
            ['field' => 'seat_choice_end_date', 'label' => '좌석선택기간', 'rules' => 'trim|required']
        ];

        if (empty($this->_reqP('lr_unit_code')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'lr_unit_code', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer']
            ]);
        } else {
            $rules = array_merge($rules, [
                ['field' => 'start_no', 'label' => '좌석시작번호', 'rules' => 'trim|required|integer'],
                ['field' => 'end_no', 'label' => '좌석종료번호', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureRoomRegistModel->{$method . 'LectureRoomUnit'}($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 좌석상세정보 모달 창
     * @param array $params
     */
    public function infoSeatModal($params = [])
    {
        if (empty($params[0]) === true || empty($params[1]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $method = 'POST';
        $lr_code = $params[0];
        $lr_unit_code = $params[1];

        $arr_seat_unit_ccd = $this->codeModel->getCcd($this->lectureRoomRegistModel->_seat_unit_ccd);
        $arr_seat_member_ccd = $this->codeModel->getCcd($this->lectureRoomRegistModel->_seat_member_ccd);
        $arr_seat_all_ccd = $arr_seat_unit_ccd;
        foreach ($arr_seat_member_ccd as $key => $val) {
            $arr_seat_all_ccd[$key] = $val;
        }

        $data = $this->lectureRoomRegistModel->findLectureRoomUnit($lr_code, $lr_unit_code);
        if (empty($data) === true) {
            show_error('조회된 좌석 정보가 없습니다.');
        }

        $seat_data = $this->lectureRoomRegistModel->listLectureRoomUnitForRegister($lr_unit_code);
        $this->load->view("pass/lecture_room/regist/unit_seat_modal", [
            'method' => $method,
            'lr_code' => $lr_code,
            'lr_unit_code' => $lr_unit_code,
            'arr_seat_unit_ccd' => $arr_seat_unit_ccd,
            'arr_seat_all_ccd' => $arr_seat_all_ccd,
            'seat_data' => $seat_data,
            'data' => $data
        ]);
    }

    /**
     * 강의실회차좌석정보 수정
     */
    public function storeSeat()
    {
        $rules = [
            ['field' => 'lr_code', 'label' => '강의실코드', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_unit_code', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_rurs_idx', 'label' => '강의실회차좌석식별자', 'rules' => 'trim|required'],
            ['field' => 'choice_serial_num', 'label' => '좌석번호', 'rules' => 'trim|required'],
            ['field' => 'seat_status', 'label' => '좌석상태', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureRoomRegistModel->modifyLectureRoomUnitSeat($this->_reqP(null, false));
        $return_error = [];
        if ($result !== true) {
            $return_error['ret_cd'] = false;
            $return_error['ret_msg'] = $result['ret_msg'];
            $return_error['ret_status'] = 200;
        }
        $this->json_result($result, '저장 되었습니다.', $return_error);
    }

    /**
     * 강의실 좌석변경 로그
     * @return CI_Output
     */
    public function listAjaxForLectureLog()
    {
        $arr_condition = [
            'EQ' => [
                'lg.LrCode' => $this->_reqP('lr_code'),
                'lg.LrUnitCode' => $this->_reqP('lr_unit_code'),
                'lg.OrderProdIdx' => $this->_reqP('order_prod_idx'),
                'lg.SeatStatusCcd' => $this->_reqP('seat_status_ccd'),
            ],
            'ORG' => [
                'EQ' => [
                    'lg.BeforeSeatNo' => $this->_reqP('search_seat_no'),
                    'lg.AfterSeatNo' => $this->_reqP('search_seat_no')
                ],
                'LKB' => [
                    'mem.MemName' => $this->_reqP('search_value'),
                    'mem.MemId' => $this->_reqP('search_value'),
                    'lg.OrderProdIdx' => $this->_reqP('search_value'),
                    'lg.desc' => $this->_reqP('search_value'),
                ]
            ]
        ];

        $list = [];
        $count = $this->lectureRoomRegistModel->listLectureRoomLog(true, $arr_condition);
        if ($count > 0) {
            $list = $this->lectureRoomRegistModel->listLectureRoomLog(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,
        ]);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');
        public_download($file_path, $file_name);
    }

    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'lr_code', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_unit_code', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureRoomRegistModel->removeFile($this->_reqP('lr_code'), $this->_reqP('lr_unit_code'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}