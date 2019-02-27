<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
if (in_array(APP_NAME, ['wbs', 'lms']) === true) {
    // 관리자 로그인 인증
    $hook['post_controller_constructor'][] = array(
        'class' => 'AdminAuthHook',
        'function' => 'authenticate',
        'filename' => 'AdminAuthHook.php',
        'filepath' => 'hooks'
    );
}

if (in_array(APP_NAME, ['api']) === false) {
    // 실서버가 아닐 경우만 실행 ==> TODO : 서버 환경별 실행
    if (ENVIRONMENT !== 'production') {
        // 쿼리빌더를 사용하여 실행한 쿼리 로그 저장 (API는 수동으로 쿼리 로그 저장)
        $hook['post_system'][] = array(
            'class' => 'LogQueryHook',
            'function' => 'logQueries',
            'filename' => 'LogQueryHook.php',
            'filepath' => 'hooks'
        );
    }
}
