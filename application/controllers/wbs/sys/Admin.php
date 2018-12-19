<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/role', 'sys/admin');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 정보관리 인덱스
     */
    public function index()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['109', '110']);

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        $this->load->view('sys/admin/index', [
            'dept_ccd' => $codes['109'],
            'position_ccd' => $codes['110'],
            'roles' => $roles
        ]);
    }

    /**
     * 운영자 정보관리 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'A.wAdminDeptCcd' => $this->_reqP('search_dept_ccd'),
                'A.wAdminPositionCcd' => $this->_reqP('search_position_ccd'),
                'A.wRoleIdx' => $this->_reqP('search_role_idx'),
                'A.wIsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'A.wAdminId' => $this->_reqP('search_value'),
                    'A.wAdminName' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = [];
        $count = $this->adminModel->listAdmin(true, $arr_condition);

        if ($count > 0) {
            $list = $this->adminModel->listAdmin(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['A.wAdminIdx' => 'desc']);

            // 사용하는 코드값 조회
            $codes = $this->codeModel->getCcdInArray(['109', '110']);

            // 코드값에 해당하는 코드명을 배열 원소로 추가
            $list = array_data_fill($list, [
                'wAdminDeptCcdName' => ['wAdminDeptCcd' => $codes['109']],
                'wAdminPositionCcdName' => ['wAdminPositionCcd' => $codes['110']]
            ], true);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 운영자 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['102', '103', '109', '110']);

        // 권한유형 조회
        $roles = $this->roleModel->getRoleArray();

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->adminModel->findAdminForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            $data['wAdminMailId'] = substr($data['wAdminMail'], 0, strpos($data['wAdminMail'], '@'));
            $data['wAdminMailDomain'] = substr($data['wAdminMail'], strpos($data['wAdminMail'], '@') + 1);
            $data['wAdminMailDomainCcd'] = (empty($codes['103'][$data['wAdminMailDomain']]) === true) ? '' : $data['wAdminMailDomain'];
        }

        $this->load->view('sys/admin/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'phone1_ccd' => $codes['102'],
            'mail_domain_ccd' => $codes['103'],
            'dept_ccd' => $codes['109'],
            'position_ccd' => $codes['110'],
            'roles' => $roles
        ]);
    }

    /**
     * 운영자 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'admin_phone1', 'label' => '휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone2', 'label' => '휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone3', 'label' => '휴대폰번호3', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_mail_id', 'label' => '메일 아이디', 'rules' => 'trim|required'],
            ['field' => 'admin_mail_domain', 'label' => '메일 도메인', 'rules' => 'trim|required'],
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

        $result = $this->adminModel->{$method . 'Admin'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}