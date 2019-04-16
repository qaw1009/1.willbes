<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 업로드 하위 디렉토리
$config['upload_prefix_dir'] = 'willbes';

$config['lms'] = array(
    'site_name' => 'LMS',
    'site_title' => '학습 콘텐츠 통합관리 시스템 (LMS)',
    'head_title' => '미래를 준비는 사람들! : willbes.net',
    'home_url' => '/home/main',
);

$config['tzone'] = array(
    'site_name' => 'T-zone',
    'site_title' => 'T-zone',
    'head_title' => '미래를 준비는 사람들! : willbes.net',
    'home_url' => '/home/main',
);

// 모의고사
$config['mock'] = array(
    'sysCode_kind' => 686,             // 모의고사 직렬 운영코드 그룹값 (lms_sys_code)
    'sysCode_applyType' => 690,        // 모의고사 응시형태
    'sysCode_applyType_on' => 690001,  // 모의고사 응시형태(online)
    'sysCode_applyType_off' => 690002, // 모의고사 응시형태(offline)
    'sysCode_applyArea1' => 691,       // 모의고사 Off 응시지역1
    'sysCode_applyArea2' => 692,       // 모의고사 Off 응시지역2
    'sysCode_addPoint' => 693,         // 모의고사 가산점 ( 운영코드DB IsValueUse=Y)
    'sysCode_ProdTypeCcd' => 636010,   // lms_Product > 상품타입코드 입력값 (모의고사)
    'sysCode_SaleStatusCcd' => 618001, // lms_Product > 판매상태코드 입력값 (판매가능)
    'sysCode_PointApplyCcd' => 635002, // lms_Product > 포인트적용코드 입력값 (전체)
    'sysCode_SaleTypeCcd' => 613001,   // lms_Product_Sale > 판매타입코드 입력값 (PC+모바일)
    'sysCode_paymentStatus' => 676,    // 결제상태
    'sysCode_acceptStatus' => 675,        // 접수상태

    'upload_path_mock' => $config['upload_prefix_dir'] . '/mocktest/', // 통파일 저장경로: ~/mocktest/{idx}/
    'upload_path_mockQ' => '/question/',                               // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    'upload_path_mockBackup' => 'bak_' . date("Ymd"),                  // 백업파일 저장경로 {$uploadPath_mock}/bak_{date}/
    'upload_url_mock' => PUBLICURL . 'uploads/' . $config['upload_prefix_dir'] . '/mocktest/' // 업로드이미지 URL
);

$config['predict'] = array(
    'sysCode_Area' => '712',
    'upload_path_predict' => $config['upload_prefix_dir'] . '/predict/', // 응시표인증파일: ~/predict/{idx}/
    'upload_url_predict' => PUBLICURL . 'uploads/' . $config['upload_prefix_dir'] . '/predict/' // 업로드이미지 URL
);