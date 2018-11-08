<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

/**
 * 참조사이트 : https://github.com/lcobucci/jwt/blob/3.2/README.md
 * TODO : 모바일 앱 토큰생성방식 확인 필요
 */
class Jwt
{
    private $_token_data;
    private $_key = 'willbes';

    /**
     * 토큰데이터 셋팅
     * @param $member_id
     * @param $member_name
     */
    public function setTokenData($member_id, $member_name)
    {
        $this->_token_data = $member_id.$member_name;
    }

    /**
     * 토큰데이터 리턴
     * @return mixed
     */
    public function getTokenData()
    {
        return $this->_token_data;
    }

    public function getToken()
    {
        $signer = new Sha256();
        $Builder = new Builder();
        $token_data = $this->getTokenData();

        $token = $Builder->setIssuer('http://example.com') // Configures the issuer (iss claim)
        ->setAudience('http://example.org') // Configures the audience (aud claim)
        ->setId($token_data, true) // Configures the id (jti claim), replicating as a header item
        ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + 3600) // Configures the expiration time of the token (exp claim)
        ->set('uid', 1) // Configures a new claim, called "uid"
        ->sign($signer, $this->_key) // creates a signature using "testing" as key
        ->getToken(); // Retrieves the generated token

        return $token;
    }

}