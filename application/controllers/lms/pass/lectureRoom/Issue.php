<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'pass/lectureRoomRegist', 'pass/lectureRoomIssue');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);
        $arr_campus = $this->siteModel->getSiteCampusArray('');
        //마스터강의실정보
        $lecture_room_info['master'] = $this->lectureRoomRegistModel->listLectureRoom();
        //회차정보
        $lecture_room_info['unit'] = $this->lectureRoomRegistModel->listLectureRoomUnit();
        $arr_pay_status_ccd = $this->codeModel->getCcd('676');

        //회원좌석상태코드
        $arr_seat_member_ccd = $this->codeModel->getCcd($this->lectureRoomRegistModel->_seat_member_ccd);

        $this->load->view("pass/lecture_room/issue/index", [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_campus' => $arr_campus,
            'lecture_room_info' => $lecture_room_info,
            'arr_pay_status_ccd' => $arr_pay_status_ccd,
            'arr_seat_member_ccd' => $arr_seat_member_ccd
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'lrsr.OrderNum' => 1,   //1의 값만 노출
                'lr.SiteCode' => $this->_reqP('search_site_code'),
                'lr.CampusCcd' => explode('_', $this->_reqP('search_campus_ccd'))[0],
                'lr.LrCode' => $this->_reqP('search_lr_code'),
                'lrru.LrUnitcode' => $this->_reqP('search_lr_unit_code'),
                'op.PayStatusCcd' => $this->_reqP('search_pay_status'),
                'pl.LearnPatternCcd' => $this->_reqP('search_learn_pattern_ccd'),
                'lrsr.SeatStatusCcd' => $this->_reqP('search_seat_member_status')
            ],
            'ORG1' => [
                'LKB' => [
                    'mb.MemName' => $this->_reqP('search_member_value'),
                    'mb.MemId' => $this->_reqP('search_member_value'),
                    'mb.Phone3' => $this->_reqP('search_member_value'),
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'o.OrderIdx' => $this->_reqP('search_prod_value'),
                    'o.OrderNo' => $this->_reqP('search_prod_value'),
                    'p.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'p.ProdName' => $this->_reqP('search_prod_value')
                ]
            ]
        ];

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));
        switch ($this->_reqP('search_date_type')) {
            case 'paid' :
                $arr_condition['BDT'] = ['o.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'refund' :
                $arr_condition['BDT'] = ['opr.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'studyenddate' :
                $arr_condition['BDT'] = ['pl.StudyEndDate' => [$search_start_date, $search_end_date]];
                break;
        }

        $list = [];
        $count = $this->lectureRoomIssueModel->mainList(true, $arr_condition);
        if ($count > 0) {
            $list = $this->lectureRoomIssueModel->mainList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list,

        ]);
    }

    public function excel()
    {
        $headers = ['주문번호', '회원명', '연락처', '상품명', '강의실명', '좌석정보명', '좌석번호', '결제상태', '결제금액', '환불금액', '결제완료일', '환불완료일'];
        $file_name = '좌석신청현황_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        $arr_condition = [
            'EQ' => [
                'lrsr.OrderNum' => 1,   //1의 값만 노출
                'lr.SiteCode' => $this->_reqP('search_site_code'),
                'lr.CampusCcd' => explode('_', $this->_reqP('search_campus_ccd'))[0],
                'lr.LrCode' => $this->_reqP('search_lr_code'),
                'lrru.LrUnitcode' => $this->_reqP('search_lr_unit_code'),
                'op.PayStatusCcd' => $this->_reqP('search_pay_status')
            ],
            'ORG1' => [
                'LKB' => [
                    'mb.MemName' => $this->_reqP('search_member_value'),
                    'mb.MemId' => $this->_reqP('search_member_value'),
                    'mb.Phone3' => $this->_reqP('search_member_value'),
                ]
            ],
            'ORG2' => [
                'EQ' => [
                    'o.OrderIdx' => $this->_reqP('search_prod_value'),
                    'o.OrderNo' => $this->_reqP('search_prod_value'),
                    'p.ProdCode' => $this->_reqP('search_prod_value')
                ],
                'LKB' => [
                    'p.ProdName' => $this->_reqP('search_prod_value')
                ]
            ]
        ];

        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));
        switch ($this->_reqP('search_date_type')) {
            case 'paid' :
                $arr_condition['BDT'] = ['o.CompleteDatm' => [$search_start_date, $search_end_date]];
                break;
            case 'refund' :
                $arr_condition['BDT'] = ['opr.RefundDatm' => [$search_start_date, $search_end_date]];
                break;
        }

        $column = "
            o.OrderNo, mb.MemName, concat(mb.Phone1, '-', fn_dec(mb.Phone2Enc), '-', mb.Phone3) AS MemTel, p.ProdName, lr.LectureRoomName, lrru.UnitName, lrrurs.SeatNo
            ,fn_ccd_name(op.PayStatusCcd), o.RealPayPrice, fn_order_refund_price(o.OrderIdx, 0, 'refund') AS tRefundPrice, o.CompleteDatm, opr.RefundDatm
        ";

        $list = $this->lectureRoomIssueModel->excel($arr_condition, $column);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->lectureRoomIssueModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel($file_name, $list, $headers);
    }

    public function showMemberSeat($params = [])
    {
        if (empty($params[0]) === true || empty($params[1]) === true || empty($this->_reqG('order_idx')) === true || empty($this->_reqG('prod_code_sub')) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $lr_code = $params[0];
        $lr_unit_code = $params[1];
        $order_idx = $this->_reqG('order_idx');
        $prod_code_sub = $this->_reqG('prod_code_sub');

        $data = $this->lectureRoomIssueModel->findLectureRoomMemberInfo($lr_code, $lr_unit_code, $order_idx, $prod_code_sub);
        if (empty($data) === true) {
            show_error('조회된 회원 좌석 정보가 없습니다.');
        }
        $this->load->view("pass/lecture_room/issue/show_member_seat", [
            'data' => $data,
            /*'sub_data' => $sub_data*/
        ]);
    }

    public function listAjaxMemberProductSubData()
    {
        $order_idx = $this->_reqP('order_idx');
        $prod_code_sub_all = $this->_reqP('prod_code_sub_all');
        $data = $this->lectureRoomIssueModel->listLectureRoomMemberSeatForProdCodeSub($order_idx, $prod_code_sub_all);
        return $this->response([
            'data' => $data,
        ]);
    }

    /**
     * 좌석상태 모달창
     * @param array $params
     */
    public function modifyMemberSeatModal($params = [])
    {
        if (empty($params[0]) === true || empty($params[1]) === true || empty($this->_reqG('order_idx')) === true || empty($this->_reqG('prod_code_sub')) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $method = 'POST';
        $lr_code = $params[0];
        $lr_unit_code = $params[1];
        $order_idx = $this->_reqG('order_idx');
        $prod_code_sub = $this->_reqG('prod_code_sub');

        $arr_seat_unit_ccd = $this->codeModel->getCcd($this->lectureRoomRegistModel->_seat_unit_ccd);
        $arr_seat_member_ccd = $this->codeModel->getCcd($this->lectureRoomRegistModel->_seat_member_ccd);
        $arr_seat_all_ccd = $arr_seat_unit_ccd;
        foreach ($arr_seat_member_ccd as $key => $val) {
            $arr_seat_all_ccd[$key] = $val;
        }

        $data = $this->lectureRoomIssueModel->findLectureRoomMemberInfo($lr_code, $lr_unit_code, $order_idx, $prod_code_sub);
        if (empty($data) === true) {
            show_error('조회된 회원 좌석 정보가 없습니다.');
        }

        //강의실 회차별 좌석회원 등록정보
        $seat_data = $this->lectureRoomRegistModel->listLectureRoomUnitForRegister($lr_unit_code);

        $this->load->view("pass/lecture_room/issue/modify_member_seat_modal", [
            'method' => $method,
            'arr_seat_unit_ccd' => $arr_seat_unit_ccd,
            'arr_seat_all_ccd' => $arr_seat_all_ccd,
            'lr_code' => $lr_code,
            'lr_unit_code' => $lr_unit_code,
            'order_idx' => $order_idx,
            'prod_code_sub' => $prod_code_sub,
            'data' => $data,
            'seat_data' => $seat_data
        ]);
    }

    public function storeSeat()
    {
        $rules = [
            ['field' => 'lr_code', 'label' => '강의실코드', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_unit_code', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer'],
            ['field' => 'order_idx', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer'],
            ['field' => 'old_seat_no', 'label' => '기존좌석번호', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->lectureRoomIssueModel->modifyLectureRoomUnitSeat($this->_reqP(null, false));
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function deleteMemberSeat()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '식별자', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        $params = json_decode($this->_req('params'), true);
        $result = $this->lectureRoomIssueModel->deleteMemberSeatStatus($params);
        $this->json_result($result, '적용 되었습니다.', $result);
    }
}