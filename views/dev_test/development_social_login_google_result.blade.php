<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

    // init configuration
    $clientID = '382144842087-atgkk0fpvob01qnciall4i684kc09tcn.apps.googleusercontent.com';
    $clientSecret = 'wQ5B5uSX3TawyiHPyFreLzn2';
    $redirectUri = 'https://www.willbes.net/home/dev_test/development_social_login_google_result';

    // create Client Request to access Google API
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");

    // authenticate code from Google OAuth Flow
    // if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $id =  $google_account_info->id;
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    //print_r($google_account_info);
    echo 'id->'.$id;
    echo '<br/> name->'.$name;
    echo '<br/> email->'.$email;

    // now you can use this profile info to create account in your website and make user logged in.
    // } else {
    //   echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
    // }

?>