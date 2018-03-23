<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends \app\controllers\BaseController
{
    protected $models = array('sys/role');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 권한유형 관리 인덱스
     */
    public function index()
    {
        $list = $this->roleModel->listRole([], null, null, ['R.RoleIdx' => 'asc']);

        $this->load->view('sys/role/index', [
            'data' => $list
        ]);
    }

    /**
     * 권한유형 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->roleModel->findRoleForModify($idx);

            if (count($data) < 1) {
                show_error('데이터 조회에 실패했습니다.');
            }
        }

        // 권한유형별 메뉴 목록 조회
        $menus = $this->roleModel->listRoleMenu($idx);

        $this->load->view('sys/role/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'menus' => $menus
        ]);
    }

    /**
     * 권한유형 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'role_name', 'label' => '권한유형명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
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

        $result = $this->roleModel->{$method . 'Role'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}