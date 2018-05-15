<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class FrontController extends BaseController
{
    // 컨트롤러 로그인 필수 여부
    protected $auth_controller = false;
    // 로그인 필수 메소드 배열
    protected $auth_methods = array();
    // 학원(오프라인) 사이트 여부
    protected $__is_pass_site = false;
    // 프런트 사이트 설정 정보
    protected $__site_settings = array();

    use InitController;

    public function __construct()
    {
        parent::__construct();

        // 로그인 체크
        $this->_checkLogin();

        // 전역 초기화
        $this->_init();

        // 프런트 초기화
        $this->_frontInit();
    }

    /**
     * 프런트 초기화
     */
    private function _frontInit()
    {
        // 학원 사이트 여부
        $this->uri->segment(1) == 'pass' && $this->__is_pass_site = true;

        // 사이트 정보 셋팅 (사이트 테이블 + config 파일)
        if (in_array(SUB_DOMAIN, config_item('front_sub_domains')) === true) {
            $this->__site_settings = array_merge($this->getSiteItems(), config_item(SUB_DOMAIN));
        }

        // 프로파일러 실행
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(true);
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
     * 사이트 정보 캐쉬 데이터 리턴
     * @param string $key [해당 사이트 정보 2차 배열 키]
     * @param string $site_id [사이트 정보 배열 키]
     * @return mixed
     */
    public function getSiteItems($key = '', $site_id = '')
    {
        $this->load->driver('caching');
        $items = $this->caching->site->get();

        if (empty($site_id) === true) {
            $site_id = SUB_DOMAIN;
            $this->__is_pass_site === true && $site_id .= 'pass';
        }

        return empty($key) === true ? element($site_id, $items) : element($key, element($site_id, $items, []));
    }
}
