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
        $lecture_data = $this->getLectureData(false);
        $assign_admin = $this->getAssignAdmin(false);
        $assign_admin = array_pluck($assign_admin,'AdminName', 'AdminIdx');

        $this->load->view("grade/issue/index",[
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

    /**
     * 첨삭모달페이지
     */
    public function managerAssignmentModal()
    {
        $arr_condition = [
            'EQ' => [
                'CuaIdx' => $this->_reqG('cua_idx')
            ]
        ];
        $data = $this->btobCorrectModel->findCorrectAssignment($arr_condition);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }
        $data['arrAdminFiles'] = json_decode($data['adminFiles'],true);
        $data['arrUserFiles'] = json_decode($data['userFiles'],true);
        $data['arrReplyAdminFiles'] = json_decode($data['replyAdminFiles'],true);

        $this->load->view("grade/issue/manager_modal", [
            'method' => 'PUT',
            'data' => $data,
            'attach_file_cnt' => 5,
        ]);
    }

    /**
     * 첨삭데이터 등록
     */
    public function storeReply()
    {
        $rules = [
            ['field' => 'cua_idx', 'label' => '첨삭게시판식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'reply_score', 'label' => '점수', 'rules' => 'trim|required|integer'],
            ['field' => 'board_content', 'label' => '내용', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        //_addBoard, _modifyBoard
        $result = $this->btobCorrectModel->modifyAssignmentBoard($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('fname');

        public_download($file_path, $file_name);
    }

    /**
     * 첨부파일 삭제
     */
    public function destroyFile()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'attach_idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCorrectModel->removeFile($this->_reqP('attach_idx'));
        $this->json_result($result, '삭제 되었습니다.', $result);
    }
}