<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/btob/grade/BaseAssign.php';
class Issue extends BaseAssign
{
    protected $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

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
                'cu.ProdCode' => $this->_reqP('search_prod_code')
                ,'cu.CorrectIdx' => $this->_reqP('search_correct_idx')
                ,'ba.AdminIdx' => $this->_reqP('search_admin_idx')
                ,'cua.IsReply' => $this->_reqP('search_is_reply')
                /*,'cua.IsStatus' => 'Y'*/
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemId' => $this->_reqP('search_value')
                    ,'m.MemName' => $this->_reqP('search_value')
                ]
            ]
        ];

        if ($this->_sess_btob_role_idx == '6005') {
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
        $count = $this->btobCorrectModel->listCorrectAssignment('LEFT', true,$arr_condition);

        if($count > 0) {
            $list = $this->btobCorrectModel->listCorrectAssignment('LEFT', false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['cua.CuaIdx' => 'Desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function excel()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $arr_condition = [
            'EQ' => [
                'cu.ProdCode' => $this->_reqP('search_prod_code')
                ,'cu.CorrectIdx' => $this->_reqP('search_correct_idx')
                ,'ba.AdminIdx' => $this->_reqP('search_admin_idx')
                ,'cua.IsReply' => $this->_reqP('search_is_reply')
                /*,'cua.IsStatus' => 'Y'*/
            ],
            'ORG' => [
                'LKB' => [
                    'm.MemId' => $this->_reqP('search_value')
                    ,'m.MemName' => $this->_reqP('search_value')
                ]
            ]
        ];

        if ($this->_sess_btob_role_idx == '6005') {
            $arr_condition['EQ']['cad.AssignAdminIdx'] = $this->session->userdata('btob.admin_idx');
        }

        // 날짜검색
        $search_date_type = $this->_reqP('search_date_type');
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        if (empty($search_date_type) === false && empty($search_start_date) === false && empty($search_end_date) === false) {
            $arr_condition['BDT'] = [$search_date_type => [$search_start_date, $search_end_date]];
        }
        $results = $this->btobCorrectModel->listCorrectAssignment('LEFT', 'excel', $arr_condition, null, null, ['cua.CuaIdx' => 'Desc']);

        $file_name = '전체첨삭현황'.$this->session->userdata('btob.admin_idx').'_'.date('Y-m-d');
        $headers = ['강좌명','회차명','등록자','제출기간','제출일','배정일','담당자','관리자채점','채점여부','채점일','점수','채점료'];

        // export excel
        $this->load->library('excel');
        if ($this->excel->exportHugeExcel($file_name, $results, $headers) !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}