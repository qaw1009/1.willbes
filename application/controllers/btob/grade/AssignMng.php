<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/btob/grade/BaseAssign.php';
class AssignMng extends BaseAssign
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * tm 배정 폼
     */
    public function index()
    {
        $method='POST';
        $lecture_data = $this->getLectureData();
        $assign_admin = $this->getAssignAdmin();
        $this->load->view("grade/assign/create",[
            'method' => $method,
            'lecture_data' => $lecture_data,
            'assign_admin' => $assign_admin
        ]);
    }

    /**
     * 배정이력
     */
    public function list()
    {
        $lecture_data = $this->getLectureData();
        $assign_admin = $this->getAssignAdmin();
        $this->load->view("grade/assign/list",[
            'lecture_data' => $lecture_data,
            'assign_admin' => $assign_admin
        ]);
    }

    /**
     * 배정이력 Ajax
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'cu.CorrectIdx' => $this->_reqP('search_correct_idx')
            ]
        ];

        $list = [];
        $count = $this->btobAssignModel->assignList(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobAssignModel->assignList(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['cu.CorrectIdx' => 'Desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 배정내역
     */
    public function assignInfoModal($params=[])
    {
        if (empty($params[0]) === true) {
            show_error('잘못된 접근 입니다.');
        }
        $correct_idx = $params[0];
        $data = $this->btobAssignModel->findCorrectAssign('ca.RegDatm,a.AdminName', $correct_idx, ['ca.CaIdx' => 'ASC']);

        $this->load->view('grade/assign/assign_info_modal',[
            'data' => $data,
            'correct_idx'=>$correct_idx
        ]);
    }

    public function assignInfoModalForAjax()
    {
        $arr_condition = [
            'EQ' => [
                'ca.CorrectIdx' => $this->_reqP('search_correct_idx')
            ]
        ];

        $list = [];
        $count = $this->btobAssignModel->listCorrectAssign(true,$arr_condition);

        if($count > 0) {
            $list = $this->btobAssignModel->listCorrectAssign(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['cu.CorrectIdx' => 'Desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    public function search()
    {
        $rules = [
            ['field'=>'search_prod_code', 'label'=>'강좌명', 'rules'=>'trim|required'],
            ['field'=>'search_correct_idx', 'label'=>'회차명', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCorrectModel->getUnitMember(true, $this->_req('search_correct_idx'));
        $this->json_result(true, '','',$result);
    }

    /**
     * 회원 배정 처리
     * @return CI_Output|void
     */
    public function store()
    {
        $rules = [
            ['field'=>'search_prod_code', 'label'=>'강좌명', 'rules'=>'trim|required'],
            ['field'=>'search_correct_idx', 'label'=>'회차명', 'rules'=>'trim|required'],
            ['field'=>'MemCnt', 'label'=>'검색건수', 'rules'=>'trim|required']
        ];

        if($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobAssignModel->addAssign($this->_reqP(null));
        if($result['ret_cd'] === true) {
            return $this->json_result($result['ret_cd'], '', '', $result['ret_data']);
        } else {
            return $this->json_result($result['ret_cd'], '', $result);
        }
    }
}