<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 업로드 하위 디렉토리
$config['upload_prefix_dir'] = 'willbes';

$config['lms'] = array(
    'site_name' => '학습 콘텐츠 통합관리 시스템 (LMS)',
    'head_title' => '미래를 준비는 사람들! : willbes.net',
    'home_url' => '/home/main',
);

// 모의고사
$config['mock'] = array(
    'sysCode_kind' => 686,     // 모의고사 직렬 운영코드 그룹값 (lms_sys_code)
);