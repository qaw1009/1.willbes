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
    private $_is_pass_site = false;

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
        // 학원 사이트 여부
        $this->uri->segment(1) == 'pass' && $this->_is_pass_site = true;

        // 프런트 사이트일 경우 사이트 정보 캐쉬 데이터 환경 설정 셋팅
        if (in_array(SUB_DOMAIN, config_item('front_sub_domains')) === true) {
            $cfg = array_merge(config_item(SUB_DOMAIN), $this->getSiteCacheItem(null));
            $cfg['IsPassSite'] = $this->_is_pass_site;

            $this->config->set_item(SUB_DOMAIN, $cfg);
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
     * @param null|string $key [사이트 캐쉬 데이터 하위 배열 키값, null 일 경우 해당 사이트의 전체 캐쉬 데이터 리턴, $site_id = all && $key = null 일 경우 캐쉬 전체 데이터 리턴]
     * @param string $site_id [전체 사이트 캐쉬 데이터에서 조회할 경우 : all, 온라인 사이트일 경우 : 서브 도메인, 학원 사이트일 경우 : 서브 도메인 + pass]
     * @return mixed
     */
    public function getSiteCacheItem($key = '', $site_id = '')
    {
        $this->load->driver('caching');
        $items = $this->caching->site->get();

        if (empty($site_id) === true) {
            $site_id = SUB_DOMAIN;
            $this->_is_pass_site === true && $site_id .= 'pass';
        }

        return $site_id == 'all' ? array_get($items, $key) : array_get(element($site_id, $items), $key);
    }
}
