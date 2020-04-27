<?php
//session_start();
define('KAKAO_CLIENT_ID', 'ff88e7137e85ee0a4ad3a7f7a0a58ba0');
define('KAKAO_CLIENT_SECRET', '');
define('KAKAO_CALLBACK_URL', 'https://www.willbes.net/home/dev_test/development_social_login_kakao_result');

if ($_SESSION['kakao_state'] != $_GET['state']) {
    die('잘못된 접근입니다.');
}

if ($_GET["code"]) {
    //사용자 토큰 받기
    $code   = $_GET["code"];
    $params = sprintf( 'grant_type=authorization_code&client_id=%s&redirect_uri=%s&code=%s', KAKAO_CLIENT_ID, KAKAO_CALLBACK_URL, $code);

    $TOKEN_API_URL = "https://kauth.kakao.com/oauth/token";
    $opts = array(
        CURLOPT_URL => $TOKEN_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1, // TLS
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false
    );

    $curlSession = curl_init();
    curl_setopt_array($curlSession, $opts);
    $accessTokenJson = curl_exec($curlSession);
    curl_close($curlSession);

    $responseArr = json_decode($accessTokenJson, true);
    $_SESSION['kakao_access_token'] = $responseArr['access_token'];
    $_SESSION['kakao_refresh_token'] = $responseArr['refresh_token'];
    $_SESSION['kakao_refresh_token_expires_in'] = $responseArr['refresh_token_expires_in'];

    //사용자 정보 가저오기
    $USER_API_URL= "https://kapi.kakao.com/v2/user/me";
    $opts = array(
        CURLOPT_URL => $USER_API_URL,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSLVERSION => 1,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $responseArr['access_token']
        )
    );

    $curlSession = curl_init();
    curl_setopt_array($curlSession, $opts);
    $accessUserJson = curl_exec($curlSession);
    curl_close($curlSession);

    $me_responseArr = json_decode($accessUserJson, true);

    if ($me_responseArr['id']) {
        print_r($me_responseArr);
    } else {
        die('회원정보를 가져오지 못했습니다.');
    }
}
?>