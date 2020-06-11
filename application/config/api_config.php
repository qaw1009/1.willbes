<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['api'] = array(

);

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