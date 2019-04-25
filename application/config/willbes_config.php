<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// view 추가 경로
$config['view_add_path'] = '/' . APP_DEVICE;

// 이미지 경로
$config['img_base_path'] = PUBLICURL . 'img/' . APP_NAME . '/';

// 업로드 하위 디렉토리
$config['upload_prefix_dir'] = APP_NAME;

// URI 세그먼트 지정
$config['uri_segment_keys'] = ['site' => 'site', 'cate' => 'cate'];

// 사용 포인트 설정
$config['use_min_point'] = '2500';  // 최소 사용 포인트 (2500)
$config['use_point_unit'] = '1';    // 포인트 사용 단위 (1)
$config['use_max_point_rate'] = '100';   // 결제금액 대비 포인트 사용 가능 최대 비율 (80)

// 가상계좌결제
$config['vbank_account_name'] = '(주)윌비스';   // 예금주 명
$config['vbank_expire_days'] = '7'; // 입금시한 설정 일수

// 추가 배송료 추가 대상 우편번호 앞자리
$config['delivery_add_price_charge_zipcode'] = ['63', '69'];

if(ENVIRONMENT == "production" || ENVIRONMENT == "testing"){
    /*
    스타플레이어 모바일 라이센스 실서버용
    서비스도메인	https://www.willbes.net
    APP 이벤트	https://www.willbes.net/Player/StarplayerAPI/
    SCMS URL	http://mgt.hd.willbes.gscdn.com/scms/log.asp
    */
    $config['starplayer_license'] = '70FBCADA-CE5A-4786-BCD3-960EAC8B4EA1';
} else {
    /*
    스타플레이어 모바일 라이센스 테스트용
    서비스도메인	https://www.dev.willbes.net
    APP 이벤트	https://www.dev.willbes.net/Player/StarplayerAPI/
    */
    $config['starplayer_license'] = '5EDC454C-81A1-4434-A386-7314FCB74991';
}



// 통합사이트 설정
$config['www'] = array(

);

// 경찰사이트 설정
$config['police'] = array(

);

// 공무원사이트 설정
$config['pass'] = array(

);

// 임용사이트 설정
$config['ssam'] = array(

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
    'upload_url_predict' => PUBLICURL . 'uploads/' . $config['upload_prefix_dir'] . '/predict/', // 업로드이미지 URL
    'upload_url_predict_lms' => PUBLICURL . 'uploads/lms/predict/'
);