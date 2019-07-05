<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobRole extends \app\controllers\BaseController
{
    protected $models = array('sys/btob', 'sys/btobRole');
    protected $helpers = array('text');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 제휴사 권한유형 인덱스
     */
    public function index()
    {
        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        // 제휴사 권한유형 조회
        $list = $this->btobRoleModel->listRole([], null, null, ['R.RoleIdx' => 'asc']);

        // 권한유형 설명 문자열 자르기 데이터 추가
        $list = array_map(function ($row) {
            $row['RoleShortDesc'] = ellipsize(str_replace(PHP_EOL, '', $row['RoleDesc']), 30);
            return $row;
        }, $list);

        $this->load->view('sys/btob/role/index', [
            'data' => $list,
            'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사 권한유형 등록/수정 폼
     * @param array $params
     */
    public function create($params = [])
    {
        $method = 'POST';
        $idx = null;
        $data = null;
        $menus = [];

        if (empty($params[0]) === false) {
            $method = 'PUT';
            $idx = $params[0];
            $data = $this->btobRoleModel->findRoleForModify($idx);

            if (empty($data) === true) {
                show_error('데이터 조회에 실패했습니다.');
            }

            // 권한유형별 메뉴 목록 조회
            $menus = $this->btobRoleModel->listRoleMenu($data['BtobIdx'], $idx);
        }

        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        $this->load->view('sys/btob/role/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'arr_btob_idx' => $arr_btob_idx,
            'menus' => $menus
        ]);
    }

    /**
     * 제휴사 권한유형 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'role_name', 'label' => '권한유형명', 'rules' => 'trim|required'],
            ['field' => 'role_type', 'label' => '전체조회가능여부', 'rules' => 'trim|required|in_list[A,B]'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === false) {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        } else {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'btob_idx', 'label' => '제휴사', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobRoleModel->{$method . 'Role'}($this->_reqP(null, false));

        if ($result['ret_cd'] === true) {
            $this->json_result(true, '저장 되었습니다.', [], ['role_idx' => $result['ret_data']]);
        } else {
            $this->json_error($result['ret_msg'], $result['ret_status']);
        }
    }

    /**
     * 제휴사 시스템 운영자 등록 폼
     */
    public function createAdmin()
    {
        $this->load->view('sys/btob/role/create_admin');
    }

    /**
     * 제휴사 시스템 운영자 등록
     */
    public function storeAdmin()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'admin_id', 'label' => '기존 운영자 아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'btob_admin_id', 'label' => '신규 운영자 아이디', 'rules' => 'trim|required|alpha_dash']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobRoleModel->addSystemAdmin($this->_reqP(null, false));

        $this->json_result($result, '등록 되었습니다.', $result);
    }

    /**
     * 제휴사 시스템 운영자 목록
     * @return CI_Output
     */
    public function listAdminAjax()
    {
        $arr_condition = [];

        $list = [];
        $count = $this->btobRoleModel->listSystemAdmin(true, $arr_condition);

        if ($count > 0) {
            $list = $this->btobRoleModel->listSystemAdmin(false, $arr_condition, $this->_reqP('length'), $this->_reqP('start'), ['BA.AdminIdx' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }
}
