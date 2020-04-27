<?php
    $client_id = "KfwZkPOqgdTMK5oPqpet";    //TODO config
    $client_secret = "UYI2wp5afz";          //TODO config
    $code = $_GET["code"];
    $state = $_GET["state"];
    $redirectURI = urlencode("https://www.willbes.net/home/dev_test/development_social_login_naver_result");
    $url = "https://nid.naver.com/oauth2.0/token?grant_type=authorization_code&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirectURI."&code=".$code."&state=".$state;
    $is_post = false;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, $is_post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $headers = array();
    $response = curl_exec ($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close ($ch);
    if($status_code == 200) {
        $arr_res = json_decode($response, true);
        if(empty($arr_res['access_token']) === false) {
            // *** 회원정보 요청 ***
            $token = $arr_res['access_token'];
            $header = "Bearer ".$token; // Bearer 다음에 공백 추가
            $url = "https://openapi.naver.com/v1/nid/me";
            $is_post = false;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, $is_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = array();
            $headers[] = "Authorization: ".$header;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response_member = curl_exec ($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close ($ch);
            if($status_code == 200) {
                $member_result = json_decode($response_member, true);
                print_r($member_result);

                //TODO 로그인 처리

            } else {
                echo "Error 내용:".$response_member;
            }
        }

    } else {
        echo "Error 내용:".$response;
    }
?>