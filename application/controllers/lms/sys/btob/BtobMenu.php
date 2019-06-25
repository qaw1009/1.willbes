<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobMenu extends \app\controllers\BaseController
{
    protected $models = array('sys/btob', 'sys/btobMenu');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 제휴사 메뉴 관리 인덱스
     */
    public function index()
    {
        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        $this->load->view('sys/btob/menu/index', [
            'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사 메뉴 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'U.BtobIdx' => $this->_reqP('search_btob_idx'),
                'U.LastIsUse' => $this->_reqP('search_is_use')
            ],
            'ORG' => [
                'LKB' => [
                    'U.BMenuName' => $this->_reqP('search_value'),
                    'U.MMenuName' => $this->_reqP('search_value'),
                    'U.SMenuName' => $this->_reqP('search_value'),
                    'U.LastMenuUrl' => $this->_reqP('search_value')
                ]
            ]
        ];

        $list = $this->btobMenuModel->listAllMenu($arr_condition);
        $count = count($list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 제휴사 자식메뉴 조회
     */
    public function children()
    {
        $data = $this->btobMenuModel->listMenu(['EQ' => ['ParentMenuIdx' => $this->_reqP('menu_idx')]], null, null, ['OrderNum' => 'asc']);
        $this->json_result(true, '', [], array_pluck($data, 'MenuName', 'MenuIdx'));
    }

    /**
     * 제휴사 메뉴 등록/수정 폼
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
            $btob_idx = $params[2];
        } else {
            // 메뉴 수정
            $method = 'PUT';
            $idx = $params[0];

            $data = $this->btobMenuModel->findMenuForModify($idx);
            if (empty($data) === true) {
                return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $menu_depth = $data['MenuDepth'];
            $parent_menu_idx = $data['ParentMenuIdx'];
            $group_menu_idx = $data['GroupMenuIdx'];
            $btob_idx = $data['BtobIdx'];
        }

        if ($menu_depth > 1) {
            // GNB 메뉴 목록 조회
            $parent_menus['GNB'] = $this->btobMenuModel->listMenu(['EQ' => ['ParentMenuIdx' => 0]], null, null, ['OrderNum' => 'asc']);
        }

        if ($menu_depth > 2) {
            // LNB 메뉴 목록 조회
            $parent_menus['LNB'] = $this->btobMenuModel->listSameDepthMenu($parent_menu_idx);
        }

        if (isset($group_menu_idx) === false) {
            // GroupMenuIdx 조회
            $group_menu_idx = ($menu_depth == 2) ? $parent_menu_idx : $this->btobMenuModel->findMenuByMenuIdx($parent_menu_idx)['GroupMenuIdx'];
        }

        // 제휴사 목록
        $arr_btob_idx = $this->btobModel->getCompanyArray();

        $this->load->view('sys/btob/menu/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'menu_depth' => $menu_depth,
            'group_menu_idx' => $group_menu_idx,
            'parent_menu_idx' => $parent_menu_idx,
            'parent_menus' => $parent_menus,
            'btob_idx' => $btob_idx,
            'arr_btob_idx' => $arr_btob_idx
        ]);
    }

    /**
     * 제휴사 메뉴 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'menu_name', 'label' => '메뉴명', 'rules' => 'trim|required']
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
        } else {
            $method = 'add';
            $rules = array_merge($rules, [
                ['field' => 'btob_idx', 'label' => '제휴사', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobMenuModel->{$method . 'Menu'}($this->_reqP(null, false));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 제휴사 메뉴 정렬변경
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

        $result = $this->btobMenuModel->modifyMenusReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }
}