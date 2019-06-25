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
}