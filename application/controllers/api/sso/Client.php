<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Single Sign On > Client
 */
class Client extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array('cookie');

    private $_algo = 'sha256';  // 암호화 알고리즘
    private $_client_id;        // 클라이언트 아이디
    private $_client_secret;    // 클라이언트 비밀키
    private $_redirect_uri;

    public function __construct()
    {
        parent::__construct();

        $this->_client_id = 'willbes';
        $this->_client_secret = 'f8a33fbaa737fa97c77bdd4d8f22cedcae01f9915db556dc2812a721970b9b01';
        $this->_redirect_uri = 'https:' . site_url('/sso/client/callback');
    }

    /**
     * sso 인증 요청
     * @example https://api.local.willbes.net/sso/client/authreq/code
     * @example https://api.local.willbes.net/sso/client/authreq/token
     * @param array $params
     */
    public function authreq($params = [])
    {
        $response_type = element('0', $params, 'code');
        $redirect_uri = rawurlencode($this->_redirect_uri);
        $nonce = time();
        $raw_state = $response_type . $this->_client_id . $redirect_uri . $nonce;
        $state = hash_hmac($this->_algo, $raw_state, $this->_client_secret);

        $authorize_url = site_url('/sso/oauth/authorize') . '?response_type=' . $response_type . '&client_id=' . $this->_client_id . '&redirect_uri=' . $redirect_uri . '&state=' . $state . '&nonce=' . $nonce;
        redirect($authorize_url);
    }

    /**
     * sso callback (토큰 발급요청 및 발급받은 토큰값 저장)
     * @return string|void
     */
    public function callback()
    {
        try {
            $code = $this->_reqG('code');           // 인증코드
            $error = $this->_reqG('error');         // 에러코드
            $error_msg = $this->_reqG('error_msg'); // 에러메시지

            if (empty($error) === false) {
                throw new \Exception($error_msg);
            }

            if (empty($code) === false) {
                // 토큰발급 요청 (authreq > response_type = code)
                $params = [
                    'grant_type' => 'authorization_code',
                    'client_id' => $this->_client_id,
                    'redirect_uri' => $this->_redirect_uri,
                    'code' => $code,
                ];

                $response = $this->_get_token($params);
                if (is_array($response) === false) {
                    throw new \Exception($response);
                }

                $token_type = $response['token_type'];
                $access_token = $response['access_token'];
                $issued_at = $response['issued_at'];
                $expired_at = $response['expired_at'];
                $refresh_token = $response['refresh_token'];
                $refresh_token_expired_at = $response['refresh_token_expired_at'];

                // refresh token 쿠키 생성 (클라이언트별 임의 저장)
                $this->_set_refresh_token($refresh_token, $issued_at, $refresh_token_expired_at);
            } else {
                // 발급받은 토큰 셋팅 (authreq > response_type = token)
                $token_type = $this->_reqG('token_type');
                $access_token = $this->_reqG('access_token');
                $issued_at = $this->_reqG('issued_at');
                $expired_at = $this->_reqG('expired_at');
            }

            // authorization 쿠키 생성 (클라이언트별 임의 저장)
            $this->_set_authorization($token_type, $access_token, $issued_at, $expired_at);

            redirect(site_url('/sso/client/index'));
        } catch (\Exception $e) {
            show_error($e->getMessage());
        }
    }

    /**
     * token 재발급 (access token 또는 refresh token값으로 인증요청)
     * @example https://api.local.willbes.net/sso/client/refresh/access
     * @example https://api.local.willbes.net/sso/client/refresh/refresh
     * @param array $params
     */
    public function refresh($params = [])
    {
        $grant_type = element('0', $params, 'access') . '_token';

        try {
            $params = [
                'grant_type' => $grant_type,
                'client_id' => $this->_client_id,
            ];

            if ($grant_type == 'refresh_token') {
                $params['refresh_token'] = get_cookie('api_oauth_refresh_token');
            }

            $headers = ['Authorization' => $this->_get_authorization()];

            // get access token
            $response = $this->_get_token($params, $headers);
            if (is_array($response) === false) {
                throw new \Exception($response);
            }

            $token_type = $response['token_type'];
            $access_token = $response['access_token'];
            $issued_at = $response['issued_at'];
            $expired_at = $response['expired_at'];
            $refresh_token = $response['refresh_token'];
            $refresh_token_expired_at = $response['refresh_token_expired_at'];

            // authorization 쿠키 생성 (클라이언트별 임의 저장)
            $this->_set_authorization($token_type, $access_token, $issued_at, $expired_at);

            // refresh token 쿠키 생성 (클라이언트별 임의 저장)
            $this->_set_refresh_token($refresh_token, $issued_at, $refresh_token_expired_at);

            redirect(site_url('/sso/client/index'));
        } catch (\Exception $e) {
            show_error($e->getMessage());
        }
    }

    /**
     * token type, access token 저장 (클라이언트별 임의 저장)
     * @param string $token_type
     * @param string $access_token
     * @param int $issued_at
     * @param int $expired_at
     */
    private function _set_authorization($token_type, $access_token, $issued_at, $expired_at)
    {
        $expire_time = $expired_at - $issued_at;
        set_cookie('api_oauth_token_type', $token_type, $expire_time, '', '/', '', true, true);
        set_cookie('api_oauth_access_token', $access_token, $expire_time, '', '/', '', true, true);
    }

    /**
     * refresh token 저장 (클라이언트별 임의 저장)
     * @param string $refresh_token
     * @param int $issued_at
     * @param int $expired_at
     */
    private function _set_refresh_token($refresh_token, $issued_at, $expired_at)
    {
        $refresh_token_expire_time = $expired_at - $issued_at;
        set_cookie('api_oauth_refresh_token', $refresh_token, $refresh_token_expire_time, '', '/', '', true, true);
    }

    /**
     * authorization header value 리턴
     * @return string
     */
    private function _get_authorization()
    {
        return ucfirst(get_cookie('api_oauth_token_type')) . ' ' . get_cookie('api_oauth_access_token');
    }

    /**
     * get token api
     * @param array $params
     * @param array $headers
     * @return array
     */
    private function _get_token($params = [], $headers = [])
    {
        $url = 'https:' . site_url('/sso/oauth/token');
        $response = $this->_exec_api($url, $params, $headers);
        if (is_array($response) === false) {
            return $response;
        }

        return element('ret_data', $response, []);
    }

    /**
     * api curl 통신
     * @param string $url
     * @param array $params
     * @param array $headers
     * @param bool $is_info
     * @return mixed|string
     */
    private function _exec_api($url, $params = [], $headers = [], $is_info = false)
    {
        $this->load->library('curl');

        try {
            $this->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
            $this->curl->setHeaders($headers);
            $this->curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $this->curl->setCookies($this->input->cookie());
            $this->curl->post($url, $params);
            $response = json_decode($this->curl->rawResponse, true);

            if ($this->curl->error === true) {
                throw new \Exception($response['ret_msg'] . '[' . $this->curl->errorMessage . ']');
            }

            if ($is_info === true) {
                logger('api oauth client curl info', $this->curl->getInfo());
            }

            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        } finally {
            $this->curl->close();
        }
    }

    /**
     * sample index
     */
    public function index()
    {
        var_dump($this->_get_authorization());
        var_dump(base64_decode(str_first_pos_after($this->_get_authorization(), ' ')));
        var_dump(get_cookie('api_oauth_refresh_token'));

        echo '<a href="' . site_url('/sso/client/data') . '">get data</a><br/>';
        echo '<a href="' . site_url('/sso/client/cdata') . '">get data (rest client)</a>';
    }

    /**
     * get sample data (자체 api 통신 사용)
     */
    public function data()
    {
        try {
            $url = 'https:' . site_url('/sso/oauth/data');
            $params = [];
            $headers = ['Authorization' => $this->_get_authorization()];

            // get data
            $response = $this->_exec_api($url, $params, $headers, true);
            if (is_array($response) === false) {
                throw new \Exception($response);
            }

            var_dump($response);
        } catch (\Exception $e) {
            show_error($e->getMessage());
        }
    }

    /**
     * get sample data (rest client 라이브러리)
     */
    public function cdata()
    {
        $this->load->library('restClient');
        $this->restclient->http_auth('oauth');

        $data = $this->restclient->post('/sso/oauth/cdata', []);
        var_dump($data);
        $this->restclient->debug();
    }
}
