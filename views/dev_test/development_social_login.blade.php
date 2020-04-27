<?php
    //session_start();
    /************************
     *     Naver
     ************************/
    $naverClientID = "KfwZkPOqgdTMK5oPqpet";        //TODO config
    $naverCallbackUrl = urlencode("https://www.willbes.net/home/dev_test/development_social_login_naver_result");
    $naverState = "RAMDOM_STATE";
    $naverLoginUrl = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$naverClientID."&redirect_uri=".$naverCallbackUrl."&state=".$naverState;

    /************************
     *     Kakao
     ************************/

    $kakaoClientID = 'ff88e7137e85ee0a4ad3a7f7a0a58ba0';      //TODO config
    $kakaoClientSecret = '';                                  //TODO config
    $kakaoCallbackUrl = 'https://www.willbes.net/home/dev_test/development_social_login_kakao_result';
    $kakaoState = md5(microtime() . mt_rand()); // 보안용 값
    $_SESSION['kakao_state'] = $kakaoState;
    $kakaoLoginUrl = "https://kauth.kakao.com/oauth/authorize?client_id=".$kakaoClientID."&redirect_uri=".urlencode($kakaoCallbackUrl)."&response_type=code&state=".$kakaoState;

    /************************
     *     Facebook
     ************************/
    //require_once __DIR__ . '/facebookSdk/autoload.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';
    $fb = new Facebook\Facebook([
        'app_id' => '156556302428278',                        //TODO config
        'app_secret' => '0582775004ae76efc995ef54c68246da',   //TODO config
        'default_graph_version' => 'v3.2',
    ]);
    $facebookHelper = $fb->getRedirectLoginHelper();
    $facebookPermissions = ['email']; // Optional permissions
    $facebookCallbackUrl = htmlspecialchars('https://www.willbes.net/home/dev_test/development_social_login_facebook_result');
    $facebookLoginUrl = $facebookHelper->getLoginUrl($facebookCallbackUrl, $facebookPermissions);

    /************************
     *     Google
     ************************/
    //require_once '/var/www/html/vendor/autoload.php';
    $googleClientID = '382144842087-atgkk0fpvob01qnciall4i684kc09tcn.apps.googleusercontent.com';   //TODO config
    $googleClientSecret = 'wQ5B5uSX3TawyiHPyFreLzn2';                                               //TODO config
    $googleRedirectUri = 'https://www.willbes.net/home/dev_test/development_social_login_google_result';

    $googleClient = new Google_Client();
    $googleClient->setClientId($googleClientID);
    $googleClient->setClientSecret($googleClientSecret);
    $googleClient->setRedirectUri($googleRedirectUri);
    $googleClient->addScope("email");
    $googleClient->addScope("profile");
    $googeLoginUrl = $googleClient->createAuthUrl();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <style type="text/css">
            .g-signin2 {text-align: center !important;}
        </style>

        <div style="text-align: center;">
            <h1>Willbes Social Login</h1>
            <a href="<?=$naverLoginUrl?>"><img src="/public/img/willbes/naver_login.png" width="222"></a>
            <br/>
            <a href="<?=$kakaoLoginUrl?>"><img src="/public/img/willbes/kakao_login.png" width="222"></a>
            <br/>
            <a href="<?=$facebookLoginUrl?>"><img src="/public/img/willbes/facebook_login.png" width="222"></a>
            <br/>
            <a href="<?=$googeLoginUrl?>"><img src="/public/img/willbes/google_login.png" width="222"></a>
        </div>
    </body>
</html>
