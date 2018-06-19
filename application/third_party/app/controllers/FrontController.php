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
    protected $__site_id = null;
    // 학원(오프라인) 사이트 여부
    protected $__is_pass_site = false;

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
        // 사이트 설정
        $this->setSiteConfig();
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
     * 사이트 정보 환경설정
     */
    public function setSiteConfig()
    {
        $this->__site_id = SUB_DOMAIN;

        // 사이트 정보 캐쉬 조회
        $site_cache = $this->getCacheItem('site');
        // 사이트 메뉴 캐쉬 조회
        $site_menu_cache = $this->getCacheItem('site_menu');
        // 사이트 과목+교수 연결정보
        $site_subject_professor_cache = [];

        if (in_array(SUB_DOMAIN, config_item('front_sub_domains')) === true) {
            $pass_site_prefix = config_item('pass_site_prefix');    // 학원 사이트 구분값
            
            // 학원 사이트일 경우
            if (strtolower($this->uri->segment(1)) == $pass_site_prefix) {
                $this->__site_id .= $pass_site_prefix;
                $this->__is_pass_site = true;
            }

            // 사이트 과목+교수 연결정보 캐쉬 조회
            $site_subject_professor_cache = $this->getCacheItem('site_subject_professor');
        }

        // 환경설정 추가
        $site_cache = element($this->__site_id, $site_cache, []);

        $configs = array_merge(
                        config_item(SUB_DOMAIN),
                        $site_cache,
                        ['IsPassSite' => $this->__is_pass_site],
                        ['NavMenu' => element('www', $site_menu_cache, [])],
                        ['SiteMenu' => ($this->__site_id == 'www') ? [] : element($this->__site_id, $site_menu_cache, [])],
                        ['Subject2Professor' => element(element('SiteCode', $site_cache), $site_subject_professor_cache, [])]
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
}
