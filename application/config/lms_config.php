<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 업로드 하위 디렉토리
$config['upload_prefix_dir'] = 'willbes';

$config['lms'] = array(
    'site_name' => 'LMS',
    'site_title' => '학습 콘텐츠 통합관리 시스템 (LMS)',
    'head_title' => '미래를 준비하는 사람들! : willbes.net',
    'home_url' => '/home/main',
);

$config['tzone'] = array(
    'site_name' => 'T-zone',
    'site_title' => 'T-zone',
    'head_title' => '미래를 준비하는 사람들! : willbes.net',
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
    'upload_path_predict' => 'lms/predict/', // 응시표인증파일: ~/predict/{idx}/
    'upload_url_predict' => PUBLICURL . 'uploads/lms/predict/' // 업로드이미지 URL
);

$config['predict2'] = array(
    'upload_path_predict2' => $config['upload_prefix_dir'] . '/predict2/', // 통파일 저장경로: ~/mocktest/{idx}/
    'upload_path_predict2Q' => '/question/',                               // 개별 문제파일 저장경로 {$uploadPath_mock}/question/
    'upload_path_predict2Backup' => 'bak_' . date("Ymd"),                  // 백업파일 저장경로 {$uploadPath_mock}/bak_{date}/
    'upload_url_predict2' => PUBLICURL . 'uploads/' . $config['upload_prefix_dir'] . '/predict2/' // 업로드이미지 URL
);

$config['sys_role_idx'] = '1030';   // 시스템관리자
$config['prof_role_idx'] = ['1011', '1062', '1063'];    // 교수관리자 권한, 임용_교수관리자, 교수관리자(임용 및 타직렬 겸용)
$config['wca_tel'] = '1544-5006';   // W.C.A 대표번호

/*
    관리자 페이지용 모바일 스타플레이어 라이센스
*/
if(ENVIRONMENT == "production" || ENVIRONMENT == "testing"){
    /*
    스타플레이어 모바일 라이센스 실서버용
    서비스도메인	https://lms.willbes.net
    APP 이벤트	https://api.willbes.net/Starplayer/Admin
    SCMS URL	http://mgt.hd.willbes.gscdn.com/scms/log.asp
    */
    $config['starplayer_license_admin'] = '1542FE3F-BEE5-403C-A11F-2FF000FD1619';
} else {
    /*
    스타플레이어 모바일 라이센스 테스트용
    서비스도메인	https://lms.dev.willbes.net
    APP 이벤트	https://api.dev.willbes.net/Starplayer/Admin
    */
    $config['starplayer_license_admin'] = 'A8FB1258-DF98-403F-B07A-7D047D3F7368';
}