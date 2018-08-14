<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class FrontController extends BaseController
{
    // 컨트롤러 로그인 필수 여부
    protected $auth_controller = false;
    // 로그인 필수 메소드 배열
    protected $auth_methods = array();
    // 프런트 사이트 코드
    protected $_site_code = null;
    // 프런트 사이트 아이디
    protected $_site_id = null;
    // 프런트 사이트 카테고리 코드
    protected $_cate_code = null;
    // 학원(오프라인) 사이트 여부
    protected $_is_pass_site = false;
    // 학원(오프라인) 사이트 구분값
    protected $_pass_site_val = '';

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
     * 컨트롤러 메소드에 배열 파라미터 전달 (프런트 전용)
     * @param $method
     * @param array $params
     * @return mixed
     */
    public function _remap($method, $params = array())
    {
        // uri string parameter urldecode
        $params = array_map('urldecode', $params);

        if (count($params) % 2 == 0) {
            // uri string parameter를 키와 값의 배열 형태로 변경 (ex. cate => 3001)
            $params = array_pluck(array_chunk($params, 2), '1', '0');
        }

        if (method_exists($this, $method) === true) {
            return $this->{$method}($params);
        } else {
            show_404(strtolower(get_class($this)) . '/' . $method);
        }
    }

    /**
     * 멤버 변수 설정
     */
    private function _setSiteVars()
    {
        // 기본 사이트 아이디
        $this->_site_id = SUB_DOMAIN;

        // 사이트별 예외 설정 조회
        $app_except_config = element(SUB_DOMAIN, config_item('app_except_config'), []);

        // 프런트 사이트일 경우
        if (empty(element('route_add_path', $app_except_config)) === false) {
            $mobile_site_prefix = config_item('app_mobile_site_prefix');    // 모바일 사이트 구분값
            $pass_site_prefix = config_item('app_pass_site_prefix');    // 학원 사이트 구분값

            // 학원 사이트일 경우
            if ((strtolower($this->uri->segment(1)) == $pass_site_prefix)
                || (strtolower($this->uri->segment(1)) == $mobile_site_prefix && strtolower($this->uri->segment(2)) == $pass_site_prefix)) {
                $this->_site_id .= $pass_site_prefix;
                $this->_is_pass_site = true;
                $this->_pass_site_val = '_' . $pass_site_prefix;
            }
        }
    }

    /**
     * 사이트 환경설정
     */
    private function _setSiteConfig()
    {
        // 사이트 정보 캐쉬 key
        $site_key = SUB_DOMAIN . '>' . $this->_site_id;

        // URL 세그먼트 배열 (key => value 형태)
        $uri_segments = $this->uri->ruri_to_assoc();

        // 전체 사이트 캐쉬
        $all_site_cache = $this->getCacheItem('site');

        // 현재 사이트 정보 캐쉬
        $site_cache = element($site_key, $all_site_cache, []);

        // 현재 사이트 코드
        $this->_site_code = element('SiteCode', $site_cache);

        // 사이트 코드 (URL 세그먼트 배열에 site 값이 있다면 site 값 우선)
        $site_code = isset($uri_segments[config_get('uri_segment_keys.site')]) === true ? $uri_segments[config_get('uri_segment_keys.site')] : $this->_site_code;

        // 전체 사이트 메뉴 캐쉬 조회
        $site_menu_cache = $this->getCacheItem('site_menu');

        // 사이트 메뉴
        $site_tree_menu = array_get($site_menu_cache, 'SiteTreeMenus.' . $site_code, []);

        // 일반 사이트 접근시 Active 되는 GNB 그룹메뉴 아이디 (서브 도메인과 동일)
        $gnb_active_group_id = '';
        if (empty($site_tree_menu) === false) {
            $gnb_active_group_id = str_first_pos_before(element($site_code, element('SiteKeys', $all_site_cache)), '>');
        }

        // 사이트 과목+교수 연결정보 캐쉬 조회, Active 사이트 메뉴 정보
        //$site_subject_professors = [];
        $site_active_menu = [];

        if (empty($site_tree_menu) === false) {
            // 사이트 전체 메뉴 URL
            $site_menu_urls = array_get($site_menu_cache, 'SiteMenuUrls.' . $site_code, []);
            $site_menu_tmp_urls = $site_menu_urls;

            // 현재 사이트의 카테고리 코드
            $this->_cate_code = element(config_get('uri_segment_keys.cate'), $uri_segments, '');

            // 현재 URL의 디렉토리/컨트롤러까지의 URI (/{directory}/{controller}/)
            $check_menu_prefix = '/' . str_first_pos_before(uri_string(), $this->router->class . '/' . $this->router->method) . $this->router->class . '/';

            foreach ($site_menu_urls as $menu_route_idx => $menu_url) {
                // 동일한 메뉴 URL이 다음 루프에서 존재하는지 여부를 체크하기 위해 맨처음 배열 원소부터 차례로 시프트
                array_shift($site_menu_tmp_urls);
                if (array_search($menu_url, $site_menu_tmp_urls) != false) {
                    continue;   // 동일한 URL이 존재한다면 continue
                }

                // 1depth 메뉴 제외
                if (strpos($menu_route_idx, '>') > -1) {
                    $menu_path = parse_url($menu_url, PHP_URL_PATH);

                    // controller check
                    if (empty($menu_path) === false && starts_with($menu_path, $check_menu_prefix) === true) {
                        // method를 제외한 uri params check (cate/{cate value}/pack/{pack value} ...)
                        $check_menu_postfix = str_first_pos_after(str_first_pos_after($menu_path, $check_menu_prefix), '/');

                        if (strpos(uri_string(), $check_menu_postfix) !== false) {
                            $site_active_menu = array_get($site_tree_menu, str_replace('>', '.Children.', $menu_route_idx));
                            $site_active_menu['IsDefault'] = false;
                            break;
                        }
                    }
                }
            }

            // 일치하는 사이트 메뉴가 없을 경우 디폴트 메뉴정보 설정
            if (empty($site_active_menu) === true) {
                $site_active_menu = current(current($site_tree_menu)['Children']);
                $site_active_menu['IsDefault'] = true;
            }

            // router name 배열
            $site_active_menu['UrlRouteNames'] = explode('>', $site_active_menu['UrlRouteName']);
            unset($site_active_menu['Children']);

            // site active 메뉴가 소속된 site tree menu 조회 (2 depth 메뉴까지는 제외 처리)
            $site_tree_menu = array_get($site_tree_menu, implode('.Children.', array_slice(explode('>', $site_active_menu['UrlRouteIdx']), 0, 2)) . '.Children');

            // 사이트 과목+교수 연결정보 캐쉬 조회 (교수진 소개에서 API를 통해 데이터 조회)
            //$site_subject_professors = array_get($this->getCacheItem('site_subject_professor'), $site_code . '.' . $this->_cate_code);
        }

        $configs = array_merge(
                        $site_cache,
                        ['CateCode' => $this->_cate_code, 'IsPassSite' => $this->_is_pass_site, 'PassSiteVal' => substr($this->_pass_site_val, 1)],
                        config_item(SUB_DOMAIN),
                        ['GnbActiveGroupId' => $gnb_active_group_id],
                        ['GnbTreeMenu' => element('GnbTreeMenus', $site_menu_cache, [])],
                        ['SiteTreeMenu' => $site_tree_menu],
                        ['SiteActiveMenu' => $site_active_menu]
                        //['Subject2Professor' => $site_subject_professors]
            );
        $this->config->set_item(SUB_DOMAIN, $configs);
    }

    /**
     * 컨트롤러 클래스, 메소드별 로그인 체크
     */
    private function _checkLogin()
    {
        if ($this->auth_controller === true || in_array($this->router->method, $this->auth_methods) === true) {
            if ($this->isLogin() !== true) {
                if ($this->input->is_ajax_request() === true) {
                    $this->json_error('로그인 후 이용해 주십시오.', _HTTP_UNAUTHORIZED);
                    $this->output->_display();
                    exit(_HTTP_UNAUTHORIZED);
                } else {
                    //show_error('접근 권한이 없습니다.', _HTTP_UNAUTHORIZED, '접근 권한 없음');
                    redirect(app_url('/member/loginForm/?rtnUrl=' . rawurlencode(app_url('/' . uri_string(), SUB_DOMAIN)), 'www'));
                }
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
