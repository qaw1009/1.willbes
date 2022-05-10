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
     * @example https://api.local.willbes.net/token/issue?client_id=willbes&method=get&uri=/sample/server/index&nonce=xyz
     */
    public function issue_get()
    {
        // 사용자 정보
        $valid_logins = (array) config_item('rest_valid_logins');

        // 파라미터 체크
        $rules = [
            ['field' => 'client_id', 'label' => '클라이언트ID', 'rules' => 'trim|required'],
            ['field' => 'method', 'label' => '전송방식', 'rules' => 'trim|required'],
            ['field' => 'uri', 'label' => 'URI', 'rules' => 'trim|required'],
            //['field' => 'state', 'label' => '상태값', 'rules' => 'trim|required'],
            //['field' => 'nonce', 'label' => '임의값', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 수신 파라미터
        $client_id = $this->_reqG('client_id');
        $method = $this->_reqG('method');
        $uri = $this->_reqG('uri');
        $state = $this->_reqG('state');
        $nonce = get_var($this->_reqG('nonce'), time());    // timestamp 값

        // 암호화 알고리즘
        $algo = 'sha256';

        // 사용자명 체크
        if (array_key_exists($client_id, $valid_logins) === false) {
            $this->api_error(lang('text_rest_unauthorized'), _HTTP_UNAUTHORIZED);
        }

        // 비밀키
        $client_secret = hash_hmac($algo, $valid_logins[$client_id], $client_id);

        // 토큰 상태값
        $chk_state = md5($client_id . ':' . strtoupper($method) . ':' . parse_url($uri, PHP_URL_PATH) . ':' . $nonce);
        $chk_state = hash_hmac($algo, $chk_state, $client_secret);

        // 상태값 비교
        if (empty($state) === false && $state !== $chk_state) {
            $this->api_error(lang('text_rest_invalid_credentials'), _HTTP_UNAUTHORIZED);
        }

        // 토큰 생성
        $token = base64_encode($client_id . ':' . $nonce . ':' . $chk_state);

        $results = [
            'Authorization' => config_item('rest_realm') . ' ' . $token
        ];

        return $this->api_success($results);
    }
}
