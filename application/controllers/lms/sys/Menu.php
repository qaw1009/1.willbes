<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends \app\controllers\BaseController
{
    protected $models = array('sys/menu');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 메뉴 관리 인덱스
     */
    public function index()
    {
        $list = $this->menuModel->listAllMenu();

        $this->load->view('sys/menu/index', [
            'data' => $list
        ]);
    }

    /**
     * 자식메뉴 조회
     */
    public function children()
    {
        $data = $this->menuModel->listMenu(['EQ' => ['ParentMenuIdx' => $this->_reqP('menu_idx')]], null, null, ['OrderNum' => 'asc']);
        $this->json_result(true, '', [], array_pluck($data, 'MenuName', 'MenuIdx'));
    }

    /**
     * 메뉴 등록/수정 폼
     * @param array $params 등록 : MenuDepth/ParentMenuIdx / 수정 : MenuIdx
     * @return CI_Output
     */
    public function create($params = [])
    {
        $data = null;
        $parent_menus = null;

        if (isset($params[1]) === true) {
            // 메뉴 등록
            $method = 'POST';
            $idx = null;
            $menu_depth = intval($params[0]);
            $parent_menu_idx = $params[1];
        } else {
            // 메뉴 수정
            $method = 'PUT';
            $idx = $params[0];

            $data = $this->menuModel->findMenuForModify($idx);
            if (count($data) < 1) {
                return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $menu_depth = $data['MenuDepth'];
            $parent_menu_idx = $data['ParentMenuIdx'];
            $group_menu_idx = $data['GroupMenuIdx'];
        }

        if ($menu_depth > 1) {
            // GNB 메뉴 목록 조회
            $parent_menus['GNB'] = $this->menuModel->listMenu(['EQ' => ['ParentMenuIdx' => 0]], null, null, ['OrderNum' => 'asc']);
        }

        if ($menu_depth > 2) {
            // LNB 메뉴 목록 조회
            $parent_menus['LNB'] = $this->menuModel->listSameDepthMenu($parent_menu_idx);
        }

        if (isset($group_menu_idx) === false) {
            // GroupMenuIdx 조회
            $group_menu_idx = ($menu_depth == 2) ? $parent_menu_idx : $this->menuModel->findMenuByMenuIdx($parent_menu_idx)['GroupMenuIdx'];
        }

        $this->load->view('sys/menu/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'menu_depth' => $menu_depth,
            'group_menu_idx' => $group_menu_idx,
            'parent_menu_idx' => $parent_menu_idx,
            'parent_menus' => $parent_menus
        ]);
    }

    /**
     * 메뉴 등록/수정
     */
    public function store()
    {
        $method = 'add';
        $rules = [
            ['field' => 'menu_name', 'label' => '메뉴명', 'rules' => 'trim|required'],
        ];

        if (is_null($this->_reqP('parent_menu_idx')) === false) {
            $rules = array_merge($rules, [
                ['field' => 'group_menu_idx', 'label' => '그룹메뉴식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'parent_menu_idx', 'label' => '부모메뉴식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'is_use', 'label' => '노출여부', 'rules' => 'trim|required|in_list[Y,N]'],
            ]);
        }

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

        $result = $this->menuModel->{$method . 'Menu'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 메뉴 정렬변경
     */
    public function reorder()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '정렬순서', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->menuModel->modifyMenusReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}