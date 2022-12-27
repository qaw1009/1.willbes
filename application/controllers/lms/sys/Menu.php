<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends \app\controllers\BaseController
{
    protected $models = array('sys/menu', 'sys/wCode', 'sys/role');
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
            if (empty($data) === true) {
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

    /**
     * 권한설정 인덱스
     * @return CI_Output|void
     */
    public function authority()
    {
        $menu_idx = $this->_reqG('menu_idx');
        $menu_route = rawurldecode($this->_reqG('menu_route'));

        if(empty($menu_idx)) {
            return $this->json_error('메뉴 식별자가 존재하지 않습니다.', _HTTP_NOT_FOUND);
        }

        // role 목록
        $role_list = $this->roleModel->getRoleArray();
        // 소속, 직급 목록
        $wccds = $this->wCodeModel->getCcdInArray(['109', '110']);

        $this->load->view('sys/menu/authority_create', [
            'menu_idx' => $menu_idx,
            'menu_route' => $menu_route,
            'position_ccd' => $wccds['110'],
            'dept_ccd' => $wccds['109'],
            'role_list' => $role_list
        ]);
    }

    /**
     * 메뉴별 관리자 접근권한 목록
     * @return CI_Output
     */
    public function authorityListAjax()
    {
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $arr_condition = [
            'EQ' => [
                'a.MenuIdx' => element('menu_idx', $arr_input),
                'a.IsStatus' => 'Y',
                'e.wAdminDeptCcd' => element('search_dept', $arr_input),
                'e.wAdminPositionCcd' => element('search_position', $arr_input),
                'c.RoleIdx' => element('search_role', $arr_input),
                'e.wIsUse' => element('search_is_use', $arr_input),
                'h.IsWrite' => element('search_is_write', $arr_input),
                'h.IsExcel' => element('search_is_excel', $arr_input),
                'h.IsMasking' => element('search_is_masking', $arr_input),
            ],
            'ORG' => [
                'LKB' => [
                    'e.wAdminId' => element('search_value', $arr_input),
                    'e.wAdminName' => element('search_value', $arr_input),
                ]
            ]
        ];

        $list = $this->menuModel->listMenuAdminAuthority($arr_condition);
        return $this->response([
            'data' => $list
        ]);
    }

    /**
     * 메뉴별 권한 처리
     */
    public function authorityStore()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'params', 'label' => '상태값', 'rules' => 'trim|required']
        ];
        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->menuModel->addMenuAdminAuthority(json_decode($this->_reqP('params'), true));
        $this->json_result($result, '설정한 권한이 적용되었습니다.', $result);
    }
}