<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('_lms/sys/btobCode', '_lms/sys/code', 'sys/btobAdmin');
    protected $helpers = array();
    private $_sess_btob_idx = null;

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
    }

    /**
     * 제휴사 운영자 정보수정 폼
     * @return mixed
     */
    public function edit()
    {
        // 지역/지점 공통코드 조회
        $arr_area_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
        $arr_branch_ccd = array_unique(array_pluck($arr_area_branch_ccd, 'BranchCcdName', 'BranchCcd'));
        $arr_area_ccd = array_unique(array_pluck($arr_area_branch_ccd, 'AreaCcdName', 'AreaCcd'));

        // 사용하는 코드값 조회
        $arr_tel1_ccd = $this->codeModel->getCcd('672');

        // 운영자 정보 조회
        $data = $this->btobAdminModel->findAdminForModify($this->session->userdata('btob.admin_idx'));

        if (empty($data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        return $this->load->view('auth/edit', [
            'arr_tel1_ccd' => $arr_tel1_ccd,
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'data' => $data
        ]);
    }

    /**
     * 제휴사 운영자 개인정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'admin_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_phone1', 'label' => '휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone2', 'label' => '휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone3', 'label' => '휴대폰번호3', 'rules' => 'trim|required|integer'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobAdminModel->modifyAdmin($this->_reqP(null, false), 'my');

        $this->json_result($result, '수정 되었습니다.', $result);
    }
}
