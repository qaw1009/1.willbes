<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteMenu
{
    private $_CI;

    public function __construct()
    {
        $this->_CI =& get_instance();

        // load model
        $this->_CI->load->loadModels(['sys/siteMenu', 'sys/site']);
    }

    /**
     * 사이트 메뉴 인덱스
     */
    public function index()
    {
        $list = $this->_CI->siteMenuModel->listAllSiteMenu();

        $this->_CI->load->view('sys/site_menu/index', [
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

        if (isset($params[2]) === true) {
            // 메뉴 등록
            $method = 'POST';
            $idx = null;
            $menu_depth = $params[1];
            $parent_menu_idx = $params[2];

            if ($menu_depth > 1) {
                $row = $this->_CI->siteMenuModel->findSiteMenuWithRouteName($parent_menu_idx);
                if (count($row) < 1) {
                    return $this->_CI->json_error('부모 메뉴 데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
                }

                $site_code = $row['SiteCode'];
                $menu_route_name = $row['MenuRouteName'];
            }
        } else {
            // 메뉴 수정
            $method = 'PUT';
            $idx = $params[1];

            $data = $this->_CI->siteMenuModel->findSiteMenuForModify($idx);
            if (count($data) < 1) {
                return $this->_CI->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }
            $site_code = $data['SiteCode'];
            $menu_depth = $data['MenuDepth'];
            $parent_menu_idx = $data['ParentMenuIdx'];
            $menu_route_name = $data['MenuRouteName'];
        }

        $this->_CI->load->view('sys/site_menu/create', [
            'method' => $method,
            'idx' => $idx,
            'data' => $data,
            'site_code' => $site_code,
            'menu_depth' => $menu_depth,
            'parent_menu_idx' => $parent_menu_idx,
            'menu_route_name' => $menu_route_name
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

        if (empty($this->_CI->_reqP('idx')) === true) {
            $method = 'add';
            if ($this->_CI->_reqP('parent_menu_idx') == 0) {
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

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->siteMenuModel->{$method . 'SiteMenu'}($this->_CI->_reqP(null, false));

        // 사이트 메뉴 캐쉬 저장
        $this->_saveSiteMenuCache($result);

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
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

        if ($this->_CI->validate($rules) === false) {
            return;
        }

        $result = $this->_CI->siteMenuModel->modifySiteMenusReorder(json_decode($this->_CI->_reqP('params'), true));

        $this->_CI->json_result($result, '저장 되었습니다.', $result);
    }

    /**
     * 사이트 메뉴 캐쉬 저장
     * @param $is_success
     */
    private function _saveSiteMenuCache($is_success)
    {
        if ($is_success === true) {
            $this->_CI->load->driver('caching');
            $this->_CI->caching->site_menu->save();
        }
    }
}