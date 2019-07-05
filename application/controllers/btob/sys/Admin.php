<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends \app\controllers\BaseController
{
    protected $models = array('_lms/sys/btobCode', '_lms/sys/btobRole', '_lms/sys/code', 'sys/btobAdmin');
    protected $helpers = array();
    private $_sess_btob_idx = null;

    public function __construct()
    {
        parent::__construct();

        $this->_sess_btob_idx = $this->session->userdata('btob.btob_idx');   // 제휴사식별자
    }

    /**
     * 제휴사 운영자 정보관리 인덱스
     */
    public function index()
    {
        // 지역/지점 공통코드 조회
        $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
        $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');

        // 권한유형 조회
        $arr_role = $this->btobRoleModel->getRoleArray($this->_sess_btob_idx);

        $this->load->view('sys/admin/index', [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_role' => $arr_role
        ]);
    }

    /**
     * 제휴사 운영자 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.BtobIdx' => $this->_sess_btob_idx,
                'A.AdminAreaCcd' => $this->_reqP('search_area_ccd'),
                'A.AdminBranchCcd' => $this->_reqP('search_branch_ccd'),
                'A.RoleIdx' => $this->_reqP('search_role_idx'),
                'A.IsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'A.AdminId' => $this->_reqP('search_value'),
                    'A.AdminName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->btobAdminModel->listAdmin(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobAdminModel->listAdmin(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.AdminIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 운영자 아이디 중복 체크
     * @return mixed
     */
    public function idCheck()
    {
        $rules = [
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = true;
        $is_duplicate = $this->btobAdminModel->isDuplicateAdminId($this->_reqP('admin_id'));
        if ($is_duplicate === true) {
            return $this->json_error('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
        }

        return $this->json_result($result, '사용 가능한 아이디 입니다. 사용하시겠습니까?', $result);
    }

    /**
     * 제휴사 운영자 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        // 지역/지점 공통코드 조회
        $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($this->_sess_btob_idx);
        $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');

        // 권한유형 조회
        $arr_role = $this->btobRoleModel->getRoleArray($this->_sess_btob_idx);

        // 사용하는 코드값 조회
        $arr_tel1_ccd = $this->codeModel->getCcd('672');

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->btobAdminModel->findAdminForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        $this->load->view('sys/admin/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_tel1_ccd' => $arr_tel1_ccd,
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_role' => $arr_role
        ]);
    }

    /**
     * 제휴사 운영자 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'admin_phone1', 'label' => '연락처1', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone2', 'label' => '연락처2', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone3', 'label' => '연락처3', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_area_ccd', 'label' => '지역', 'rules' => 'trim|required'],
            ['field' => 'admin_branch_ccd', 'label' => '지점', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'is_approval', 'label' => '승인여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'role_idx', 'label' => '권한유형', 'rules' => 'trim|required'],
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobAdminModel->{$method . 'Admin'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}