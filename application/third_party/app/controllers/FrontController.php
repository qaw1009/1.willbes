<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class FrontController extends BaseController
{
    // 컨트롤러 로그인 필수 여부
    protected $auth_controller = false;
    // 로그인 필수 메소드 배열
    protected $auth_methods = array();
    // 프런트 사이트 그룹 아이디
    protected $_site_group_id = null;
    // 프런트 사이트 아이디
    protected $_site_id = null;
    // 학원(오프라인) 사이트 여부
    protected $_is_pass_site = false;

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
        // 멤버 변수 설정
        $this->_setSiteVars();

        // 사이트 환경설정
        $this->_setSiteConfig();
    }

    /**
     * 멤버 변수 설정
     */
    private function _setSiteVars()
    {
        $this->_site_group_id = SUB_DOMAIN;
        $this->_site_id = $this->_site_group_id;

        // 사이트별 예외 설정 조회
        $app_except_config = element(SUB_DOMAIN, config_item('app_except_config'), []);

        // 프런트 사이트일 경우
        if (empty(element('route_add_path', $app_except_config)) === false) {
            $pass_site_prefix = config_item('app_pass_site_prefix');    // 학원 사이트 구분값

            // 학원 사이트일 경우
            if (strtolower($this->uri->segment(1)) == $pass_site_prefix) {
                $this->_site_id .= $pass_site_prefix;
                $this->_is_pass_site = true;
            }
        }
    }

    /**
     * 사이트 환경설정
     */
    private function _setSiteConfig()
    {
        // 사이트 정보 캐쉬 key
        $site_key = $this->_site_group_id . '>' . $this->_site_id;

        // URL 세그먼트 배열 (key => value 형태)
        $uri_segments = $this->uri->ruri_to_assoc();

        // 전체 사이트 정보 캐쉬 조회
        $total_site_cache = $this->getCacheItem('site');

        // 전체 사이트 코드 배열 (사이트 코드 => 사이트 그룹 아이디 + '>' + 사이트 아이디)
        $site_keys = element('SiteKeys', $total_site_cache, []);

        // 현재 사이트 정보 캐쉬
        $site_cache = element($site_key, $total_site_cache, []);

        // 사이트 코드 (URL 세그먼트 배열에 site 값이 있다면 site 값 우선)
        $site_code = isset($uri_segments[config_get('uri_segment_keys.site')]) === true ? $uri_segments[config_get('uri_segment_keys.site')] : element('SiteCode', $site_cache);

        // 전체 사이트 메뉴 캐쉬 조회
        $site_menu_cache = $this->getCacheItem('site_menu');

        // GNB 메뉴
        $gnb_tree_menu = element('GnbTreeMenus', $site_menu_cache, []);
        
        // Active GNB 메뉴
        $gnb_active_group_id = str_first_pos_before($site_keys[$site_code], '>');

        // 사이트 메뉴
        $site_tree_menu = array_get($site_menu_cache, 'SiteTreeMenus.' . $site_code, []);

        // 사이트 과목+교수 연결정보 캐쉬 조회, Active 사이트 메뉴 정보
        $site_subject_professor_cache = [];
        $site_active_menu = [];
        if (empty($site_tree_menu) === false) {
            // 사이트 과목+교수 연결정보 캐쉬 조회
            $site_subject_professor_cache = element($site_code, $this->getCacheItem('site_subject_professor'), []);

            // Active 사이트 메뉴 정보 (/{directory}/{controller}/, /cate/{cate_code})
            $check_menu_prefix = '/' . str_first_pos_before(uri_string(), $this->router->class . '/' . $this->router->method) . $this->router->class . '/';
            $check_menu_postfix = '/' . config_get('uri_segment_keys.cate') . '/' . element('cate', $uri_segments, '');

            foreach (array_get($site_menu_cache, 'SiteMenuUrls.' . $site_code, []) as $menu_route_idx => $menu_url) {
                // 1depth 메뉴 제외
                if (strpos($menu_route_idx, '>') > -1) {
                    $menu_path = parse_url($menu_url, PHP_URL_PATH);
                    if (empty($menu_path) === false && starts_with($menu_path, $check_menu_prefix) === true && ends_with($menu_path, $check_menu_postfix) === true) {
                        $site_active_menu = array_get($site_tree_menu, str_replace('>', '.Children.', $menu_route_idx));
                        $site_active_menu['IsDefault'] = false;
                        break;
                    }
                }
            }

            if (empty($site_active_menu) === true) {
                // 일치하는 사이트 메뉴가 없을 경우 디폴트 메뉴정보 설정
                $site_active_menu = current(current($site_tree_menu)['Children']);
                $site_active_menu['IsDefault'] = true;
            }
            // router name 배열
            $site_active_menu['UrlRouteNames'] = explode('>', $site_active_menu['UrlRouteName']);
            unset($site_active_menu['Children']);

            // site tree menu 2 depth까지 제외
            $site_tree_menu = current(current($site_tree_menu)['Children'])['Children'];
        }

        $configs = array_merge(
                        $site_cache,
                        ['IsPassSite' => $this->_is_pass_site],
                        config_item(SUB_DOMAIN),
                        ['GnbActiveGroupId' => $gnb_active_group_id],
                        ['GnbTreeMenu' => $gnb_tree_menu],
                        ['SiteTreeMenu' => $site_tree_menu],
                        ['SiteActiveMenu' => $site_active_menu],
                        ['Subject2Professor' => $site_subject_professor_cache]
            );
        $this->config->set_item(SUB_DOMAIN, $configs);
    }

    /**
     * 캐쉬 데이터 리턴
     * @param string $driver [캐쉬명]
     * @param null|string $key [캐쉬 데이터 배열 키값]
     * @param string $site_id [캐쉬 데이터 최상위 배열 키값, 사이트 코드]
     * @return mixed
     */
    public function getCacheItem($driver, $key = null, $site_id = 'all')
    {
        $this->load->driver('caching');
        if (($items = $this->caching->{$driver}->get()) === false) {
            $items = [];
        }

        return $site_id == 'all' ? array_get($items, $key) : array_get(element($site_id, $items, []), $key);
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
}
