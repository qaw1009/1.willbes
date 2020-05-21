<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuthHook
{
    protected $_CI;

    /**
     * TODO : 합격예측(predict) 자동 데이터 업데이트 경로 추가 (서비스 종류 후 삭제 검토)
     */
    // 관리자 로그인 체크 제외 URI
    protected $excepts = [
        '/lcms/auth/login',
        '/lcms/auth/regist/create',
        '/lcms/auth/regist/idCheck',
        '/lcms/auth/regist/store',
        '/crm/manageCs/noAuthList',
        '/crm/manageCs/noAuthListAjax',
        '/crm/manageCs/updateReadCnt',

        '/common/predictAutoUpdate/index',
        '/predict/gradeprocessing/scoreMakeStep1Ajax',
        '/predict/gradeprocessing/scoreMakeStep2Ajax',
        '/predict/gradeprocessing/scoreMakeStep3Ajax'
    ];

    // LMS 교수관리자 역할식별자
    private $_lms_prof_role_idx = '1011';

    // 메뉴 권한 체크 제외 URI - /{directory?}/{controller?}/{method?}
    protected $perm_excepts = [
        '/home/',
        '/common/',
        '/lcms/auth/regist/edit',
        '/lcms/auth/regist/update',
        '/lcms/common/searchOrganization/index',
        '/lcms/common/searchOrganization/listAjax',
        //'/lcms/logs/viewer/',     // 관리자관리 > 시스템관리 > 로그뷰어 메뉴 추가
        '/sys/adminSettings/',
        '/pay/order/listAjax',
        '/service/coupon/issue/listAjax',
        '/service/point/allStatus/listAjax',
        '/cms/lecture/player',
        '/crm/tm/TmAssign/consultListAjax',
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
        $vars = ['__auth' => [], '__settings' => [], '__menu' => []];

        if (empty(uri_string()) === false && starts_with('/' . uri_string(), $this->excepts) === false) {
            if ($this->_CI->session->userdata('is_admin_login') !== true) {
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
                    show_alert('운영자 인증에 실패했습니다.', site_url('/lcms/auth/login'), false);
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
                show_alert('운영자 권한이 없습니다.', site_url('/lcms/auth/login'), false);
            }

            if (SUB_DOMAIN == 'lms') {
                if ($role['Role']['RoleIdx'] == $this->_lms_prof_role_idx) {
                    show_alert('운영자 권한이 없습니다.', 'back');
                }

                if (empty($role['Site']) === true) {
                    show_alert('사이트 권한이 없습니다.', site_url('/lcms/auth/login'), false);
                }
            }

            // 관리자 권한 정보 설정
            $vars['__auth'] = $role;

            // 관리자 권한 세션 설정
            $adminAuthService->setSessionAdminAuthData($vars['__auth']);

            // 2. 권한유형별 메뉴 트리 조회
            $menus = $adminAuthService->getAuthMenu($role['Role']['RoleIdx']);

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

            // 3. 관리자별 환경설정 정보 조회
            $vars['__settings'] = $adminAuthService->getAdminSettings($menus);

            // 뷰 페이지로 전달할 메뉴 데이터 생성
            $vars['__menu'] = $adminAuthService->getViewAuthMenu($menus, element('GroupMenuIdx', $currents, 0));
            $vars['__menu']['CURRENT'] = $currents;

            // 현재 메뉴가 즐겨찾기 메뉴인지 여부 셋팅
            if (empty($vars['__menu']['CURRENT']) === false && isset($vars['__settings']['favorite']) === true) {
                $vars['__menu']['CURRENT']['IsFavorite'] = is_null(element($vars['__menu']['CURRENT']['MenuIdx'], $vars['__settings']['favorite'])) !== true;
            }

            // 4. LCMS 전환 로그인 로그 저장
            if (in_array(APP_NAME, $this->_CI->session->userdata('admin_conn_sites')) === false) {
                $adminAuthService->setTransLogin();

                // 현재 접속한 사이트 서브 도메인 세션 설정
                $adminAuthService->setSessionAdminConnSites();
            }
        }

        // 5. 메뉴, 관리자 환경설정 데이터를 뷰 페이지로 전달하기 위해 CI 전역변수에 저장
        $this->_CI->load->vars($vars);
    }
}
