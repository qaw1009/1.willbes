<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMenu extends \app\controllers\BaseController
{
    protected $models = array('site/siteMenu', 'sys/site');
    protected $helpers = array('text');

    private $_menu_type_code = [
        'GN' => '일반메뉴', 'GA' => '일반메뉴 (학원)', 'PS' => '예외메뉴 (고객센터)', 'PC' => '예외메뉴 (내강의실)'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 사이트 메뉴 인덱스
     */
    public function index()
    {
        $def_site_code = config_item('app_intg_site_code');

        $this->load->view('site/site_menu/index', [
            'def_site_code' => $def_site_code
        ]);
    }

    /**
     * 사이트 메뉴 목록 조회
     * @return CI_Output
     */
    public function listAjax()
    {
        $arr_condition = [
            'EQ' => [
                'M.SiteCode' => $this->_reqP('search_site_code'),
                'M.IsUse' => $this->_reqP('search_is_use')
            ],
            'LKB' => [
                'M.MenuName' => $this->_reqP('search_value')
            ]
        ];

        $list = $this->siteMenuModel->listAllSiteMenu($arr_condition);
        $count = count($list);

        // 메뉴타입명 추가
        $list = array_map(function ($row) {
            $row['MenuTypeName'] = $this->_menu_type_code[$row['MenuType']];
            return $row;
        }, $list);

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }

    /**
     * 사이트 메뉴 등록/수정 폼
     * @param array $params 등록 : SiteCode/CateDepth/ParentCateCode / 수정 : CateCode
     * @return CI_Output
     */
    public function create($params = [])
    {
        $data = null;
        $site_code = '';
        $menu_route_name = null;

        if (isset($params[1]) === true) {
            // 메뉴 등록
            $method = 'POST';
            $idx = null;
            $menu_depth = $params[0];
            $parent_menu_idx = $params[1];

            if ($menu_depth > 1) {
                $row = $this->siteMenuModel->findSiteMenuWithRouteName($parent_menu_idx);
                if (empty($row) === true) {
                    return $this->json_error('부모 메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $site_code = $row['SiteCode'];
                $menu_route_name = $row['MenuRouteName'];
            }
        } else {
            // 메뉴 수정
            $method = 'PUT';
            $idx = $params[0];

            $data = $this->siteMenuModel->findSiteMenuForModify($idx);
            if (empty($data) === true) {
                return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $site_code = $data['SiteCode'];
            $menu_depth = $data['MenuDepth'];
            $parent_menu_idx = $data['ParentMenuIdx'];
            $menu_route_name = $data['MenuRouteName'];
        }

        $this->load->view('site/site_menu/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'site_code' => $site_code,
            'menu_depth' => $menu_depth,
            'parent_menu_idx' => $parent_menu_idx,
            'menu_route_name' => $menu_route_name,
            'menu_type_code' => $this->_menu_type_code
        ]);
    }

    /**
     * 사이트 메뉴 등록/수정
     */
    public function store()
    {
        $rules = [
            ['field' => 'parent_menu_idx', 'label' => '부모메뉴코드', 'rules' => 'trim|required|integer'],
            ['field' => 'menu_name', 'label' => '메뉴명', 'rules' => 'trim|required'],
            ['field' => 'is_use', 'label' => '사용여부', 'rules' => 'trim|required|in_list[Y,N]'],
        ];

        if (empty($this->_reqP('idx')) === true) {
            $method = 'add';
            if ($this->_reqP('parent_menu_idx') == 0) {
                $rules = array_merge($rules, [
                    ['field' => 'site_code', 'label' => '운영 사이트', 'rules' => 'trim|required|integer'],
                ]);
            }
        } else {
            $method = 'modify';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'idx', 'label' => '식별자', 'rules' => 'trim|required|integer'],
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->siteMenuModel->{$method . 'SiteMenu'}($this->_reqP(null, false));

        // 사이트 메뉴 캐쉬 저장 (빈번한 캐쉬수정 방지, 수동캐시저장 버튼 활용)
        //$this->_saveSiteMenuCache($result);

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 메뉴 정렬변경
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

        $result = $this->siteMenuModel->modifySiteMenusReorder(json_decode($this->_reqP('params'), true));

        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 메뉴 캐쉬 수동 저장
     */
    public function saveCache()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = true;
        $this->_saveSiteMenuCache($result);
        $this->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 메뉴 캐쉬 저장
     * @param $is_success
     */
    private function _saveSiteMenuCache($is_success)
    {
        if ($is_success === true) {
            $this->load->driver('caching');
            $this->caching->site_menu->save();
        }
    }
}