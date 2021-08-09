<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 외부 서버에서 접근시 REST API 토큰 발급 Sample
 */
class Token extends \app\controllers\RestController
{
    protected $methods = [
        'issue_get' => ['auth' => false],
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 토큰 발급 샘플 메소드
     * https://api.local.willbes.net/token/issue?username=willbes&password=f8a33fbaa737fa97c77bdd4d8f22cedcae01f9915db556dc2812a721970b9b01&method=get&uri=/sample/server/index&params=acbd18db4cc2f85cedef654fccc4a4d8
     * password = hash_hmac('sha256', 'password', 'username')
     * params = md5('파라미터값연결') = md5('foo')
     */
    public function issue_get()
    {
        // 사용자 정보
        $valid_logins = (array) config_item('rest_valid_logins');

        // 파라미터 체크
        $rules = [
            ['field' => 'username', 'label' => '사용자명', 'rules' => 'trim|required'],
            ['field' => 'password', 'label' => '비밀번호', 'rules' => 'trim|required'],
            ['field' => 'method', 'label' => '전송방식', 'rules' => 'trim|required'],
            ['field' => 'uri', 'label' => 'URI', 'rules' => 'trim|required'],
            ['field' => 'params', 'label' => '파라미터값', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 수신 파라미터
        $username = $this->_reqG('username');
        $password = $this->_reqG('password');
        $method = $this->_reqG('method');
        $uri = $this->_reqG('uri');
        $params = $this->_reqG('params');

        // 사용자명 체크
        if (array_key_exists($username, $valid_logins) === false) {
            $this->api_error(lang('text_rest_unauthorized'), _HTTP_UNAUTHORIZED);
        }

        // 비밀번호 체크
        $valid_password = hash_hmac('sha256', $valid_logins[$username], $username);
        if (strcasecmp($valid_password, $password) !== 0) {
            $this->api_error(lang('text_rest_invalid_credentials'), _HTTP_UNAUTHORIZED);
        }

        // 토큰 생성
        $nonce = substr(uniqid(), -6) . time();
        $secret = hash_hmac('sha256', $valid_logins[$username], $username . $nonce);
        $md5 = md5(strtoupper($method) . ':' . parse_url($uri, PHP_URL_PATH) . ':' . $params);

        $token = $username . ':' . $nonce . ':' . $md5;
        $token = md5(hash_hmac('sha256', $token, $secret));

        $results = [
            config_item('rest_user_name') => $username,
            config_item('rest_nonce_name') => $nonce,
            config_item('rest_token_name') => $token
        ];

        return $this->api_success($results);
    }
}
