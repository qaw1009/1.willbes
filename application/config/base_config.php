<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Set Global User Config
| -------------------------------------------------------------------
*/
// 프로파일러 사용 여부
$config['enable_profiler'] = false;

// 쿼리 로그 사용 여부
$config['sql_log_queries'] = true;
$config['sql_log_slow_queries'] = true;
$config['sql_log_slow_min_exec_second'] = 3;
$config['sql_log_path'] = config_item('log_path') . 'sql/';

// WBS Config
$config['wbs'] = array(
    'site_name' => '월비스 온라인 컨텐츠 기반 시스템 (WBS)',
    'head_title' => '미래를 준비는 사람들! : willbes.net',
    'base_url' => '//' . ENV_CHAR . 'wbs.willbes.net',
    'home_url' => '/home/main',
);

// LMS Config
$config['lms'] = array(
    'site_name' => '학습 콘텐츠 통합관리 시스템 (LMS)',
    'head_title' => '미래를 준비는 사람들! : willbes.net',
    'base_url' => '//' . ENV_CHAR . 'lms.willbes.net',
    'home_url' => '/home/main',
);