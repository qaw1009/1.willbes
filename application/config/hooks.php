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
} else {
    /*// custom autoload
    $hook['pre_system'][] = array(
        'class' => 'AutoloadHook',
        'function' => 'autoload',
        'filename' => 'AutoloadHook.php',
        'filepath' => 'hooks',
        'params' => ''
    );*/
}

// 쿼리빌더를 사용하여 실행한 쿼리 로그 저장
$hook['post_system'][] = array(
    'class' => 'LogQueryHook',
    'function' => 'logQueries',
    'filename' => 'LogQueryHook.php',
    'filepath' => 'hooks'
);