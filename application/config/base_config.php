<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Set Global User Config
| -------------------------------------------------------------------
*/
// 통합 사이트 코드
$config['site_intg_code'] = '2000';

// 사이트별 예외 뷰 경로 설정
$config['view_except_path'] = [
    'www' => 'willbes/www/' . APP_DEVICE,
    'front' => 'willbes/front/' . APP_DEVICE,
];

// blade mode 설정 ((optional) 1 = forced (test), 2 = run fast (production), 0 = automatic, default value)
//defined('BLADEONE_MODE') OR define('BLADEONE_MODE', 2);

// 프로파일러 사용 여부
$config['enable_profiler'] = false;

// 중복로그인 방지 사용 여부
$config['prevent_duplicate_login'] = false;

// 쿼리 로그 사용 여부
$config['sql_log_queries'] = true;
$config['sql_log_slow_queries'] = true;
$config['sql_log_slow_min_exec_second'] = 3;
$config['sql_log_path'] = config_item('log_path') . 'sql/';
