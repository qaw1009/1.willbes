<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 외부 서버에서 접근시 REST API 토큰 발급 Sample
 */
class Token extends \app\controllers\RestController
{
    protected $methods = [
        'index_get' => ['token' => false],
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 토큰 발급 샘플 메소드
     * http://api.local.willbes.net/token/?username=willbes&password=f8a33fbaa737fa97c77bdd4d8f22cedcae01f9915db556dc2812a721970b9b01&method=post&uri=/server
     */
    public function index_get()
    {
        // api 설정
        $valid_logins = (array) $this->config->item('rest_valid_logins');

        // 파라미터 validation rule
        $rules = [
            ['field' => 'username', 'label' => '사용자명', 'rules' => 'trim|required'],
            ['field' => 'password', 'label' => '비밀번호', 'rules' => 'trim|required'],
            ['field' => 'method', 'label' => '전송방식', 'rules' => 'trim|required'],
            ['field' => 'uri', 'label' => 'URI', 'rules' => 'trim|required'],
        ];

        // 파라미터 체크
        if ($this->validate($rules) === false) {
            return;
        }

        // 수신 파라미터
        $username = $this->get('username');
        $password = $this->get('password');
        $method = $this->get('method');
        $uri = $this->get('uri');

        // 사용자명 체크
        if (array_key_exists($username, $valid_logins) === false) {
            $this->api_error($this->lang->line('text_rest_unauthorized'), [], _HTTP_UNAUTHORIZED);
        }

        // 비밀번호 체크
        $_password = hash_hmac('sha256', $valid_logins[$username], $username);
        if (strcasecmp($_password, $password) !== 0) {
            $this->api_error($this->lang->line('text_rest_invalid_credentials'), [], _HTTP_UNAUTHORIZED);
        }

        // token 생성
        $unique_id = uniqid();
        $nonce = substr($unique_id, 0, 7) . time() . substr($unique_id, 7);

        $token = $username . ':' . $nonce . ':' . $password . ':' . strtoupper($method) . ':' . $uri;
        $token = md5(hash_hmac('sha256', $token, $nonce));

        $results = [
            $this->config->item('rest_user_name') => $username,
            $this->config->item('rest_nonce_name') => $nonce,
            $this->config->item('rest_token_name') => $token
        ];

        $this->api_success(null, $results);
    }
}