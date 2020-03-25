<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends \app\controllers\BaseController
{
    protected $models = array('sys/site', 'sys/code', 'pass/lectureRoomIssue');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_site_code = get_auth_on_off_site_codes('Y', true);
        $def_site_code = key($arr_site_code);
        $def_site_code = 2004;
        $arr_campus = $this->siteModel->getSiteCampusArray('');
        $arr_pay_status_ccd = $this->codeModel->getCcd('676');

        $this->load->view("pass/lecture_room/issue/index", [
            'arr_site_code' => $arr_site_code,
            'def_site_code' => $def_site_code,
            'arr_campus' => $arr_campus,
            'arr_pay_status_ccd' => $arr_pay_status_ccd
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'lrsr.OrderNum' => 1,   //1의 값만 노출
                'lr.SiteCode' => $this->_reqP('search_site_code'),
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

    public function modifyMemberSeatModal($params = [])
    {
        if (empty($params[0]) === true || empty($params[1]) === true || empty($this->_reqG('order_idx')) === true) {
            show_error('잘못된 접근 입니다.');
        }

        $lr_code = $params[0];
        $lr_unit_code = $params[1];
        $order_idx = $this->_reqG('order_idx');

        $data = $this->lectureRoomIssueModel->findLectureRoomMemberInfo($lr_code, $lr_unit_code, $order_idx);
        if (empty($data) === true) {
            show_error('조회된 회원 좌석 정보가 없습니다.');
        }

        print_r($data);

        $this->load->view("pass/lecture_room/issue/modify_member_seat_modal", [
            'lr_code' => $lr_code,
            'lr_unit_code' => $lr_unit_code,
            'data' => $data
        ]);
    }
}