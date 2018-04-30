<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Set Global User Config
| -------------------------------------------------------------------
*/
// 프로파일러 사용 여부
$config['enable_profiler'] = false;

// 중복로그인 방지 사용 여부
$config['prevent_duplicate_login'] = true;

// 쿼리 로그 사용 여부
$config['sql_log_queries'] = true;
$config['sql_log_slow_queries'] = true;
$config['sql_log_slow_min_exec_second'] = 3;
$config['sql_log_path'] = config_item('log_path') . 'sql/';
