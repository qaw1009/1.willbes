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
$config['use_min_point'] = '2500';  // 최소 사용 포인트
$config['use_point_unit'] = '1';    // 포인트 사용 단위
$config['use_max_point_rate'] = '80';   // 결제금액 대비 포인트 사용 가능 최대 비율

// 가상계좌결제
$config['vbank_account_name'] = '(주)윌비스';   // 예금주 명
$config['vbank_expire_days'] = '7'; // 입금시한 설정 일수

// 통합사이트 설정
$config['www'] = array(

);

// 경찰사이트 설정
$config['cop'] = array(

);

// 공무원사이트 설정
$config['gosi'] = array(

);

// 임용사이트 설정
$config['ssam'] = array(

);