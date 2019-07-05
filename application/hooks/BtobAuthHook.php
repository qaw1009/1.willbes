<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobAuthHook
{
    protected $_CI;

    // 관리자 로그인 체크 제외 URI
    protected $excepts = [
        '/auth/login'
    ];

    // 메뉴 권한 체크 제외 URI - /{directory?}/{controller?}/{method?}
    protected $perm_excepts = [
        '/home/',
        '/common/',
        '/auth/regist/edit',
        '/auth/regist/update'
    ];

    public function __construct()
    {
        $this->_CI = &get_instance();
    }

    /**
     * 관리자 로그인 세션 체크
     */
    public function authenticate()
    {
        // CI 전역변수 초기화
        $vars = ['__auth' => [], '__menu' => []];

        if (empty(uri_string()) === false && starts_with('/' . uri_string(), $this->excepts) === false) {
            if ($this->_CI->session->userdata('btob.is_admin_login') !== true || empty($this->_CI->session->userdata('btob.btob_idx')) === true) {
                if ($this->_CI->input->is_ajax_request() === true) {
                    // return ajax error
                    $this->_CI->output->set_content_type('application/json')
                        ->set_status_header(_HTTP_UNAUTHORIZED)
                        ->set_output(json_encode([
                            'ret_cd' => false,
                            'ret_msg' => '운영자 인증에 실패했습니다.',
                            'ret_status' => _HTTP_UNAUTHORIZED
                        ], JSON_UNESCAPED_UNICODE))
                        ->_display();
                    exit(1);
                } else {
                    //show_error('운영자 인증에 실패했습니다.', _HTTP_UNAUTHORIZED, '운영자 인증 실패');
                    show_alert('운영자 인증에 실패했습니다.', site_url('/auth/login'), false);
                }
            }

            // 현재 URI의 /{directory}/{controller}/{method}
            $uri_str = '/' . str_replace(APP_NAME . '/', '', $this->_CI->router->directory) . $this->_CI->router->class . '/' . $this->_CI->router->method;

            // 관리자 권한 서비스 로드
            $class_name = ucfirst(APP_NAME) . 'AuthService';

            require_once $class_name . '.php';
            $adminAuthService = new $class_name();

            // 1. 관리자별 권한유형 정보 조회
            $role = $adminAuthService->getAdminRole();
            if (is_null($role) === true || empty(element('Role', $role)) === true) {
                //show_error('운영자 권한이 없습니다.', _HTTP_UNAUTHORIZED, '운영자 권한 없음');
                show_alert('운영자 권한이 없습니다.', site_url('/auth/login'), false);
            }

            // 관리자 권한 정보 설정
            $vars['__auth'] = $role;

            // 관리자 권한 세션 설정
            $adminAuthService->setSessionAdminAuthData($vars['__auth']);

            // 2. 권한유형별 메뉴 트리 조회
            $menus = $adminAuthService->getAuthMenu($role['Role']['RoleIdx'], $role['Role']['RoleType']);

            // 메뉴권한 체크 제외 URI 체크
            $currents = [];
            if (starts_with($uri_str, $this->perm_excepts) === false) {
                // 메뉴권한 체크 및 현재 메뉴의 MenuIdx, GroupMenuIdx 조회
                $currents = $adminAuthService->getCurrentMenuInfo($menus, $uri_str, $this->_CI->input->get());
            }

            if ($currents === false) {
                //show_error('메뉴 권한이 없습니다.', _HTTP_NO_PERMISSION, '메뉴 권한 없음');
                show_alert('메뉴 권한이 없습니다.', 'back');
            }

            // 뷰 페이지로 전달할 메뉴 데이터 생성
            $vars['__menu'] = $adminAuthService->getViewAuthMenu($menus, element('GroupMenuIdx', $currents, 0));
            $vars['__menu']['CURRENT'] = $currents;
        }

        // 3. 메뉴, 관리자 환경설정 데이터를 뷰 페이지로 전달하기 위해 CI 전역변수에 저장
        $this->_CI->load->vars($vars);
    }
}
