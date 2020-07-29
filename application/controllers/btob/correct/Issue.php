<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/btob/grade/BaseAssign.php';
class Issue extends BaseAssign
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $lecture_data = $this->getLectureData();
        $assign_admin = $this->getAssignAdmin();
        $assign_admin = array_pluck($assign_admin,'AdminName', 'AdminIdx');

        $this->load->view("correct/issue/index",[
            'lecture_data' => $lecture_data,
            'assign_admin' => $assign_admin
        ]);
    }

    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'cua.IsStatus' => 'Y'
                ,'cad.IsStatus' => 'Y'
                ,'cu.ProdCode' => $this->_reqP('search_prod_code')
                ,'cu.CorrectIdx' => $this->_reqP('search_correct_idx')
                ,'ba.AdminIdx' => $this->_reqP('search_admin_idx')
                ,'cua.IsReply' => $this->_reqP('search_is_reply')
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemId' => $this->_reqP('search_value')
                    ,'m.MemName' => $this->_reqP('search_value')
                ]
            ]
        ];

        if ($this->_sess_btob_role_idx != '6004') {
            $arr_condition['EQ']['cad.AssignAdminIdx'] = $this->session->userdata('btob.admin_idx');
        }

        // 날짜검색
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        if (empty($search_date_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition['BDT'] = [$search_date_type => [$search_start_date, $search_end_date]];
        }

        $list = [];
        $count = $this->btobCorrectModel->listCorrectAssignment(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobCorrectModel->listCorrectAssignment(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['cua.CuaIdx' => 'Desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}