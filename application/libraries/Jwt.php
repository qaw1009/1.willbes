<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Signer\Hmac\Sha256;

/**
 * 참조사이트 : https://github.com/lcobucci/jwt/blob/3.2/README.md
 * TODO : 모바일 앱 토큰생성방식 확인 필요
 */
class Jwt
{
    private $_token_data;
    private $_key = 'axissoft7173450';


    /**
     * 토큰데이터 셋팅
     * @param $member_id
     * @param $member_name
     */
    public function setTokenData($member_id, $member_name, $member_idx)
    {
        $this->_token_data = [
            'USER_ID' => $member_id,
            'USER_NM' => $member_name,
            'USER_IDX' => $member_idx
        ];
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

        $token = $Builder->set('USER_ID', $this->_token_data['USER_ID'])
            ->set('USER_NM', $this->_token_data['USER_NM'])
            ->set('USER_IDX', $this->_token_data['USER_IDX'])
            ->sign($signer, $this->_key)
            ->getToken();

        return $token;
    }


    /**
     *  넘어온 토큰값이 정상인지 확인
     * @param $token
     * @return bool
     */
    public function verify($token)
    {
        $signer = new Sha256();

        try{
            $token = (new Parser())->parse((string)$token);
        } catch (\Exception $e) {
            return false;
        }

        return $token->verify($signer, $this->_key);
    }


    /**
     *  토큰값을 풀어서 array 반환
     * @param $token
     * @return array
     */
    public function getClaims($token)
    {
        $token = (new Parser())->parse((string)$token);

        return [
            'USER_IDX' => $token->getClaim('USER_IDX', ''),
            'USER_ID' => $token->getClaim('USER_ID', ''),
            'USER_NM' => $token->getClaim('USER_NM', '')
        ];
    }
}