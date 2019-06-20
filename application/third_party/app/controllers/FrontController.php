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
    // 프런트 사이트 키
    protected $_site_key = null;
    // 프런트 사이트 카테고리 코드
    protected $_cate_code = null;
    // 학원(오프라인) 사이트 여부
    protected $_is_pass_site = false;
    // 모바일 사이트 여부
    protected $_is_mobile = false;
    // 앱 사이트 여부
    protected $_is_app = false;

    public function __construct()
    {
        parent::__construct();

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

        // user agnet 체크
        $this->_checkUserAgent();

        // 로그인 체크
        $this->_checkLogin();

        if (APP_DEVICE == 'pc') {
            // 프런트 사이트 환경설정
            $this->_setFrontSiteConfig();
        } else {
            // 모바일, 앱 사이트 환경설정
            $this->_setMobileSiteConfig();
        }
        
        // 접속별 고유 세션아이디 생성
        $this->_setMakeSessionId();
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

        $pass_site_prefix = config_item('app_pass_site_prefix');    // 학원 사이트 구분값
        $app_front_site_except = element(SUB_DOMAIN, config_item('app_front_site_except'), []);     // 프런트 사이트별 예외 설정 조회

        // 모바일 사이트 여부
        if (APP_DEVICE == config_item('app_mobile_site_prefix')) {
            $this->_is_mobile = true;
        } elseif (APP_DEVICE == config_item('app_app_site_prefix')) {
            $this->_is_app = true;
        }

        // 프런트 사이트일 경우
        if (empty(element('route_add_path', $app_front_site_except)) === false) {
            // 학원 사이트일 경우
            if ((strtolower($this->uri->segment(1)) == $pass_site_prefix)
                || (APP_DEVICE != 'pc' && strtolower($this->uri->segment(2)) == $pass_site_prefix)) {
                $this->_site_id .= $pass_site_prefix;
                $this->_is_pass_site = true;
            }
        }

        // 사이트 키 (사이트 캐쉬 키 값)
        $this->_site_key = SUB_DOMAIN . '>' . $this->_site_id;
    }

    /**
     * 프런트 사이트 환경설정
     */
    private function _setFrontSiteConfig()
    {
        // URL 세그먼트 배열 (key => value 형태)
        $uri_segments = $this->uri->ruri_to_assoc();

        // 전체 사이트 캐쉬
        $all_site_cache = $this->getCacheItem('site');

        // 현재 사이트 정보 캐쉬
        $site_cache = element($this->_site_key, $all_site_cache, []);

        // 현재 사이트 코드
        $this->_site_code = element('SiteCode', $site_cache);

        // 사이트 코드 (URL 세그먼트 배열에 site 값이 있다면 site 값 우선)
        $site_code = isset($uri_segments[config_get('uri_segment_keys.site')]) === true ? $uri_segments[config_get('uri_segment_keys.site')] : $this->_site_code;

        // 현재 사이트의 카테고리 코드
        $this->_cate_code = element(config_get('uri_segment_keys.cate'), $uri_segments, '');

        // 전체 사이트 메뉴 캐쉬 조회
        $all_site_menu_cache = $this->getCacheItem('site_menu');

        // 전체 트리 메뉴
        $all_site_tree_menus = element('TreeMenus', $all_site_menu_cache, []);

        // 전체 메뉴 URL
        $all_site_menu_urls_cache = element('MenuUrls', $all_site_menu_cache, []);

        // 메뉴 정보 배열
        $front_menus = [];
        $tab_menus = [];
        $uri_string = $this->getFinalUriString();

        // 현재 URL의 디렉토리/컨트롤러까지의 URI (/{directory}/{controller}/)
        $check_menu_prefix = '/' . str_first_pos_before($uri_string, $this->router->class . '/' . $this->router->method) . $this->router->class . '/';

        foreach (['GNB', $site_code] as $group_menu_key) {
            // Active 메뉴 route idx
            $_active_route_idx = '';

            // GNB, 접근 사이트 메뉴 URL
            $menu_urls = element($group_menu_key, $all_site_menu_urls_cache, []);
            $menu_tmp_urls = $menu_urls;

            foreach ($menu_urls as $menu_route_idx => $menu_url) {
                // 동일한 메뉴 URL이 다음 루프에서 존재하는지 여부를 체크하기 위해 맨처음 배열 원소부터 차례로 시프트
                array_shift($menu_tmp_urls);
                if (array_search($menu_url, $menu_tmp_urls) != false) {
                    continue;   // 동일한 URL이 존재한다면 continue
                }

                // controller check
                $menu_parse_url = parse_url($menu_url);
                $menu_path = element('path', $menu_parse_url);

                if (empty($menu_path) === false && strpos(current_url(), $menu_parse_url['host']) !== false && starts_with($menu_path, $check_menu_prefix) === true) {
                    // 현재 URL의 후위 uri string
                    $uri_post_string = urldecode(str_first_pos_after($uri_string, substr($check_menu_prefix, 1) . $this->router->method . '/', ''));

                    // 메뉴 URL에서 method를 제외한 uri params check (cate/{cate value}/pack/{pack value} ...)
                    $check_menu_postfix = str_first_pos_after(str_first_pos_after($menu_path, $check_menu_prefix), '/', '');

                    // controller 만으로 체크 가능 || controller + 후위 uri string 으로 체크
                    if ((empty($check_menu_postfix) === true)
                        || (empty($check_menu_postfix) === false && strpos($uri_post_string, $check_menu_postfix) !== false)) {
                        $_active_route_idx = $menu_route_idx;
                        break;
                    }
                }
            }

            $_tree_menu = element($group_menu_key, $all_site_tree_menus, []);
            $_active_menu = [];
            $_active_group_menu_idx = null;

            if (empty($_active_route_idx) === false) {
                $_active_menu = array_get($all_site_tree_menus, $_active_route_idx, []);
                $_active_group_menu_idx = explode('.', $_active_route_idx)[1];
            }

            if ($group_menu_key != 'GNB') {
                if (empty($_tree_menu) === false) {
                    if (empty($_active_route_idx) === false) {
                        if (is_numeric($_active_group_menu_idx) === true) {
                            // 사이트 일반 메뉴
                            $_tree_menu = array_get($all_site_tree_menus, implode('.', array_slice(explode('.', $_active_route_idx), 0, 4)) . '.Children');
                        } else {
                            // 사이트 예외메뉴 (불필요한 배열 초기화)
                            //$_tree_menu = current(current($_tree_menu)['Children'])['Children'];
                            $_tree_menu = [];
                        }
                    } else {
                        // 일치하는 사이트 메뉴가 없을 경우 디폴트 메뉴정보 설정
                        if ($this->_is_pass_site === false) {
                            // 온라인 사이트일 경우 카테고리 > 메인 페이지를 기준으로 조회
                            $_not_match_cate_code = empty($this->_cate_code) === false ? $this->_cate_code : element('DefCateCode', $site_cache);
                            $_not_match_route_val = '//' . parse_url(current_url(), PHP_URL_HOST) . '/home/index/' . config_get('uri_segment_keys.cate') . '/' . $_not_match_cate_code;
                            $_not_match_route_idx = str_first_pos_after(array_search($_not_match_route_val, array_slice($menu_urls, 1)), '.');
                            $_active_menu = array_get($_tree_menu, $_not_match_route_idx);
                        }

                        if (empty($_active_menu) === true) {
                            $_active_menu = current(current($_tree_menu)['Children']);
                        }
                        $_tree_menu = element('Children', $_active_menu);
                    }
                }
            }

            if (empty($_active_menu) === false) {
                $_active_menu['UrlRouteNames'] = explode('>', $_active_menu['UrlRouteName']);
                unset($_active_menu['Children']);
            }

            // GNB, Site 메뉴
            $front_menus[$group_menu_key] = [
                'ActiveMenu' => $_active_menu,
                'TreeMenu' => $_tree_menu
            ];

            // 탭 메뉴
            if (empty($_active_group_menu_idx) === false && is_numeric($_active_group_menu_idx) === false) {
                if (config_item('app_intg_site_code') == $this->_site_code) {
                    $tab_menus['ActiveMenu'] = $front_menus['GNB']['ActiveMenu'];
                    $tab_menus['TreeMenu'] = $front_menus['GNB']['TreeMenu'][$_active_group_menu_idx];
                } else {
                    $tab_menus['ActiveMenu'] = $front_menus[$this->_site_code]['ActiveMenu'];
                    $tab_menus['TreeMenu'] = array_get($all_site_tree_menus, $this->_site_code . '.' . $_active_group_menu_idx);
                }
            }
        }

        // GNB 메뉴에서 Active 되는 그룹메뉴 식별자
        $front_menus['GNB']['ActiveGroupMenuIdx'] = array_get($all_site_menu_cache, 'GNBGroupMenuIdxs.' . SUB_DOMAIN);

        $configs = array_merge(
            $site_cache,
            ['CateCode' => $this->_cate_code, 'IsPassSite' => $this->_is_pass_site, 'IsMobile' => $this->_is_mobile, 'IsApp' => $this->_is_app],
            config_get(SUB_DOMAIN, []),
            ['GNBMenu' => $front_menus['GNB']],
            ['SiteMenu' => $front_menus[$this->_site_code]],
            ['TabMenu' => $tab_menus]
        );
        $this->config->set_item(SUB_DOMAIN, $configs);
    }

    /**
     * 모바일 사이트 환경설정
     */
    private function _setMobileSiteConfig()
    {
        // URL 세그먼트 배열 (key => value 형태)
        $uri_segments = $this->uri->ruri_to_assoc();

        // 전체 사이트 캐쉬
        $all_site_cache = $this->getCacheItem('site');

        // 현재 사이트 정보 캐쉬
        $site_cache = element($this->_site_key, $all_site_cache, []);

        // 현재 사이트 코드
        $this->_site_code = element('SiteCode', $site_cache);

        // 현재 사이트의 카테고리 코드
        $this->_cate_code = element(config_get('uri_segment_keys.cate'), $uri_segments, '');

        $configs = array_merge(
            $site_cache,
            ['CateCode' => $this->_cate_code, 'IsPassSite' => $this->_is_pass_site, 'IsMobile' => $this->_is_mobile, 'IsApp' => $this->_is_app],
            config_item(SUB_DOMAIN)
        );
        $this->config->set_item(SUB_DOMAIN, $configs);
    }

    /**
     * UserAgent 체크
     */
    private function _checkUserAgent()
    {
        // 로컬서버가 아닐 경우만 체크 ==> TODO : 서버 환경별 실행
        if (ENVIRONMENT != 'local' && $this->_is_app === true) {
            $user_agent = strtolower($this->input->server('HTTP_USER_AGENT'));

            if (strpos($user_agent, 'starplayer') === false) {
                redirect(app_url('/home/index', 'www'));
            }
        }
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
                    if($this->_is_app === true){
                        redirect(app_url('/app/member/login/?rtnUrl=' . rawurlencode(app_url('/' . uri_string(), SUB_DOMAIN)), 'www'));
                    } else {
                        redirect(app_url('/member/login/?rtnUrl=' . rawurlencode(app_url('/' . uri_string(), SUB_DOMAIN)), 'www'));
                    }

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

    /**
     * uri string 리턴 (index 메소드와 같이 생략된 내용 추가하여 리턴)
     * @return string
     */
    public function getFinalUriString()
    {
        $diff = array_diff($this->uri->rsegments, $this->uri->segments);

        if (empty($diff) === true) {
            return uri_string();
        } else {
            return implode('/', array_merge($this->uri->segments, $diff));
        }
    }

    /**
     * 사이트 캐쉬 값 리턴
     * @param int $site_code [사이트 코드]
     * @param string $item_key [해당 사이트 배열 키 값]
     * @return mixed
     */
    public function getSiteCacheItem($site_code, $item_key)
    {
        // 전체 사이트 캐쉬
        $all_site_cache = $this->getCacheItem('site');
        $site_key = element($site_code, $all_site_cache['SiteKeys'], 'none');

        return array_get($all_site_cache, $site_key . '.' . $item_key, '');
    }

    /**
     * pagination 설정 및 값 리턴
     * @param string $base_url [페이징 링크 기본 URI]
     * @param int $total_rows   [전체 데이터 건수]
     * @param int $limit [페이지 당 노출될 데이터 건수]
     * @param int $show_page_num [노출되는 페이지 수]
     * @param bool $page_query_string [페이지 번호 query string 사용 여부]
     * @return array
     */
    public function pagination($base_url, $total_rows, $limit = 10, $show_page_num = 10, $page_query_string = true)
    {
        $this->load->library('pagination');

        // set pagination config
        $config['base_url'] = $this->input->server('REQUEST_SCHEME').'://'.front_url($base_url);    // 페이징 링크 기본 URI
        $config['total_rows'] = $total_rows;    // 전체 데이터 건수
        $config['per_page'] = $limit;   // 페이지 당 노출될 데이터 건수
        $config['fixed_page_num'] = $show_page_num;     // 노출되는 페이지 수

        if ($page_query_string === true) {
            $config['use_first_page_number'] = true;    // 첫번째 페이지 번호 사용 여부
            $config['page_query_string'] = true;    // 페이지 번호 query string 사용 여부
            $config['query_string_segment'] = 'page';   // 페이지 번호 get 파라미터 명
        } else {
            $config['uri_segment'] = substr_count($config['base_url'], '/');    // 페이지 번호가 위치한 세그먼트
        }

        // set pagination view config
        $config['full_tag_open'] = '<div class="Paging"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = false;
        $config['first_tag_open'] = '';
        $config['first_tag_close'] = '';
        $config['last_link'] = false;
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['prev_link'] = '<img src="' . img_url('paging/paging_prev.png') . '">';
        $config['prev_tag_open'] = '<li class="Prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<img src="' . img_url('paging/paging_next.png') . '">';
        $config['next_tag_open'] = '<li class="Next">';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="on" href="#none">';
        $config['cur_tag_close'] = '</a><span class="row-line">|</span></li>';
        $config['num_tag_open'] = '<li><a href="#none">';
        $config['num_tag_close'] = '</a><span class="row-line">|</span></li>';

        // create pagination
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        $offset = 0;
        $rownum = 0;
        if ($config['total_rows'] > 0) {
            $offset = ($this->pagination->cur_page - 1) * $this->pagination->per_page;
            $rownum = $config['total_rows'] - $offset;
        }

        return [
            'pagination' => $pagination,
            'page' => $this->pagination->cur_page,
            'offset' => $offset,
            'limit' => $this->pagination->per_page,
            'rownum' => $rownum
        ];
    }

    /**
     * 접속시 세션아이디 생성 : 학원수강신청 시 사용 및 기타 사용을 위한 값
     */
    public function _setMakeSessionId()
    {
        if(empty($this->session->userdata('make_sessionid'))){
            $this->session->set_userdata('make_sessionid', time().substr(microtime(), 2, 6).rand(1000, 9999)); //15373248440179507411  (20자리)
        }
    }

    /**
     * PC 화면 접속시 디바이스가 모바일이면 모바일로 redirect 시키고
     * 사용자가 pc 보겠다고 viewPC=1 을 달고 오면 그냥 PC를 보여준다.
     */
    protected function _redirectMobile()
    {
        if(APP_DEVICE == 'pc'){ // PC 화면일때
        //if($this->_is_mobile == false && $this->_is_app == false) {
            $this->load->library('user_agent');
            if ($this->agent->is_mobile() == true) { // 모바일 이면
                $viewPC = $this->_req("viewPC");
                if ($viewPC == 1) { // PC 보기 파라미터가 있으면
                    $this->session->set_userdata('viewPC', 1);
                } else { // 파람이 없으면
                    $viewPC = $this->session->userdata('viewPC');
                    if ($viewPC != 1) { // 세션이 있으면
                        redirect(front_url('/m/home/index'));
                    }
                }
            }
        }
    }
}
