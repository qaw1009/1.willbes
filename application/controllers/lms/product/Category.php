<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 상품 카테고리 인덱스
     */
    public function index()
    {
        $this->load->view('product/category/index',[
            'data' => []
        ]);
    }

    /**
     * 상품 카테고리 등록/수정 폼
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
            //$group_menu_idx = ($menu_depth == 2) ? $parent_menu_idx : $this->menuModel->findMenuByMenuIdx($parent_menu_idx)['GroupMenuIdx'];
            $group_menu_idx = 0;
        }

        $this->load->view('product/category/create', [
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
     * 상품 카테고리 정렬변경
     */
    public function reorder()
    {

    }
}
