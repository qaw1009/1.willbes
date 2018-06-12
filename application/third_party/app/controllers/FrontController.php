<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class FrontController extends BaseController
{
    // 컨트롤러 로그인 필수 여부
    protected $auth_controller = false;
    // 로그인 필수 메소드 배열
    protected $auth_methods = array();
    // 프런트 사이트 아이디
    protected $site_id = null;
    // 학원(오프라인) 사이트 여부
    protected $is_pass_site = false;

    public function __construct()
    {
        parent::__construct();

        // 로그인 체크
        $this->_checkLogin();

        // 프런트 초기화
        $this->_frontInit();
    }

    /**
     * 프런트 초기화
     */
    private function _frontInit()
    {
        // 사이트 아이디, 학원 사이트 여부 설정
        $this->setSiteId();

        // 프런트 사이트일 경우 사이트 정보, 사이트 메뉴 캐쉬 데이터 환경 설정 셋팅
        if (is_null($this->site_id) === false) {
            $site_cache = $this->getCacheItem('site', null, $this->site_id);
            $site_menu_cache = $this->getSiteMenu(element('SiteGroupCode', $site_cache), element('SiteCode', $site_cache));
            $site_cfg = array_merge(config_item(SUB_DOMAIN), $site_cache, ['IsPassSite' => $this->is_pass_site], $site_menu_cache);

            // set site config
            $this->config->set_item(SUB_DOMAIN, $site_cfg);
        }
    }

    /**
     * 컨트롤러 클래스, 메소드별 로그인 체크
     */
    private function _checkLogin()
    {
        if ($this->auth_controller === true || in_array($this->router->method, $this->auth_methods) === true) {
            if ($this->isLogin() !== true) {
                show_error('접근 권한이 없습니다.', _HTTP_UNAUTHORIZED, '접근 권한 없음');
            }
        }
    }

    /**
     * 로그인 여부 리턴
     * @return bool
     */
    public function isLogin()
    {
        return $this->session->userdata('is_login');
    }

    /**
     * 프런트 사이트 아이디, 학원 사이트 여부 설정
     */
    public function setSiteId()
    {
        if (in_array(SUB_DOMAIN, config_item('front_sub_domains')) === true) {
            $this->site_id = SUB_DOMAIN;
            // 학원 사이트일 경우
            if (strtolower($this->uri->segment(1)) == 'pass') {
                $this->site_id .= 'pass';
                $this->is_pass_site = true;
            }
        }
    }

    /**
     * 캐쉬 데이터 리턴
     * @param string $adapter [캐쉬명]
     * @param null|string $key [캐쉬 데이터 배열 키값]
     * @param string $site_id [캐쉬 데이터 최상위 배열 키값, 사이트 코드]
     * @return mixed
     */
    public function getCacheItem($adapter, $key = null, $site_id = 'all')
    {
        $this->load->driver('caching');
        if (($items = $this->caching->{$adapter}->get()) === false) {
            $items = [];
        }

        return $site_id == 'all' ? array_get($items, $key) : array_get(element($site_id, $items, []), $key);
    }

    /**
     * 해당 사이트의 메뉴 데이터 리턴 (동일 사이트 그룹 사이트 코드, 사이트명 포함)
     * @param $group_code
     * @param $site_code
     * @return array
     */
    public function getSiteMenu($group_code, $site_code)
    {
        if (is_null($group_code) === true || is_null($site_code) === true) {
            return [];
        }
        
        // 사이트 메뉴 캐쉬 데이터 조회
        $items = $this->getCacheItem('site_menu', null, $group_code);

        $site_menus = [];
        foreach ($items as $s => $row) {
            if ($s == $site_code) {
                $site_menus['SiteMenu'] = element('SiteMenu', $row, []);
            } else {
                $site_menus['GroupMenu'][$row['SiteCode']] = $row['SiteName'];
            }
        }

        return $site_menus;
    }
}
