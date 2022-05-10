<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Single Sign On > OAuth
 */
class Oauth extends \app\controllers\RestController
{
    protected $models = array();
    protected $helpers = array('cookie');
    protected $methods = [
        'authorize_get' => ['auth' => false],
        'token_post' => ['auth' => false],
        'data_post' => ['auth' => false],
        'cdata_post' => ['auth' => 'oauth'],
    ];

    private $_algo = 'sha256';              // 암호화 알고리즘
    private $_valid_logins;                 // 클라이언트 ID/PWD 정보
    private $_client_info;                  // 클라이언트 정보
    private $_text_invalid_credentials;     // 잘못된 자격 증명
    private $_enable_refresh_token;         // refresh token 사용여부

    public function __construct()
    {
        parent::__construct();

        $this->_valid_logins = (array) config_item('rest_valid_logins');
        $this->_client_info = (array) config_item('rest_oauth_client_info');
        $this->_text_invalid_credentials = lang('text_rest_invalid_credentials');
        $this->_enable_refresh_token = config_item('rest_oauth_enable_refresh_token');

        // db connection open
        if ($this->_enable_refresh_token === true && (empty($this->rest->db) === true)) {
            $this->rest->db = $this->load->database(config_item('rest_database_group'), true);
        }
    }

    public function __destruct()
    {
        parent::__destruct();

        // db connection close
        if (empty($this->rest->db) === false) {
            $this->rest->db->close();
        }
    }

    /**
     * 인증코드 발급 또는 토큰 발급 (response_type값에 따라 프로세스 진행)
     * @return void|null
     */
    public function authorize_get()
    {
        // 수신 파라미터
        $response_type = $this->_reqG('response_type');
        $client_id = $this->_reqG('client_id');
        $redirect_uri = $this->_reqG('redirect_uri');
        $state = $this->_reqG('state');
        $nonce = $this->_reqG('nonce');

        // 파라미터 체크
        $rules = [
            ['field' => 'response_type', 'label' => '응답구분', 'rules' => 'trim|required|in_list[code,token]'],
            ['field' => 'client_id', 'label' => '클라이언트 아이디', 'rules' => 'trim|required'],
            ['field' => 'redirect_uri', 'label' => '리다이렉트URI', 'rules' => 'trim|required'],
            ['field' => 'state', 'label' => '상태값', 'rules' => 'trim|required'],
            ['field' => 'nonce', 'label' => '임의값', 'rules' => 'trim|required'],
        ];

        $chk_validate = $this->validate($rules, 'error_msg');
        if ($chk_validate !== true) {
            $this->_authorize_error_callback($redirect_uri, 'validation_error', $chk_validate);
        }

        // 클라이언트 유효성 체크
        $valid_client = $this->_check_valid_client($client_id, $redirect_uri, $response_type);
        if ($valid_client !== true) {
            $this->_authorize_error_callback($redirect_uri, 'access_denied', $valid_client);
        }

        // 클라이언트 비밀키
        $client_secret = $this->_get_client_secret($client_id);

        // 상태값 체크
        $raw_state = $response_type . $client_id . rawurlencode($redirect_uri) . rawurlencode($nonce);
        $chk_state = hash_hmac($this->_algo, $raw_state, $client_secret);
        if (hash_equals($state, $chk_state) === false) {
            $this->_authorize_error_callback($redirect_uri, 'access_denied', $this->_text_invalid_credentials . '[AU01]');
        }

        // 사용자 로그인 체크
        if ($this->_check_user_login() !== true) {
            $return_url = site_url('/sso/oauth/authorize?' . http_build_query($this->_reqG(null, false)));
            redirect(app_url('/lcms/auth/login?return_url=' . rawurlencode($return_url), 'wbs'));
        }

        // 인증결과 리턴
        if ($response_type == 'token') {
            return $this->_response_token($response_type, $client_id, $client_secret, $redirect_uri);
        } else {
            // 인증코드 생성
            $code = $this->_generate_code();

            // 인증코드 저장 (유효기간 2분)
            //set_cookie('api_oauth_authorize_code', $code, 120, '', '/', '', true, true);
            $this->session->set_tempdata('api.oauth.authorize.code', $code, 120);     // 임시세션 생성
            
            redirect($redirect_uri . '?code=' . $code . '&state=' . $state);
        }
    }

    /**
     * authorize 에러 콜백
     * @param string $redirect_uri [리다이렉트URI]
     * @param string $error [에러코드]
     * @param string $error_msg [에러메시지]
     */
    private function _authorize_error_callback($redirect_uri, $error, $error_msg)
    {
        redirect($redirect_uri . '?error=' . $error . '&error_msg=' . rawurlencode($error_msg));
    }

    /**
     * token (재)발급
     * @return mixed|void|null
     */
    public function token_post()
    {
        // 파라미터 체크
        $rules = [
            ['field' => 'grant_type', 'label' => '인증구분', 'rules' => 'trim|required|in_list[authorization_code,refresh_token,access_token]'],
            ['field' => 'client_id', 'label' => '클라이언트 아이디', 'rules' => 'trim|required'],
            ['field' => 'redirect_uri', 'label' => '리다이렉트URI', 'rules' => 'trim|callback_validateRequiredIf[grant_type,authorization_code]'],
            ['field' => 'code', 'label' => '인증코드', 'rules' => 'trim|callback_validateRequiredIf[grant_type,authorization_code]'],
            ['field' => 'refresh_token', 'label' => 'Refresh token', 'rules' => 'trim|callback_validateRequiredIf[grant_type,refresh_token]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 수신 파라미터
        $grant_type = $this->_reqP('grant_type');
        $client_id = $this->_reqP('client_id');
        $redirect_uri = $this->_reqP('redirect_uri');
        $code = $this->_reqP('code');
        $refresh_token = $this->_reqP('refresh_token');

        // 클라이언트 유효성 체크
        $valid_client = $this->_check_valid_client($client_id, $redirect_uri);
        if ($valid_client !== true) {
            return $this->api_error($valid_client, _HTTP_UNAUTHORIZED);
        }

        // 클라이언트 비밀키
        $client_secret = $this->_get_client_secret($client_id);

        // 인증코드 체크
        if ($grant_type == 'authorization_code') {
            //$chk_code = get_cookie('api_oauth_authorize_code');
            $chk_code = $this->session->tempdata('api.oauth.authorize.code');     // 임시세션
            if (empty($chk_code) === true || $code != $chk_code) {
                return $this->api_error($this->_text_invalid_credentials . '[AC01]', _HTTP_UNAUTHORIZED);
            }
        }

        // access token 체크
        if ($grant_type == 'access_token') {
            //$chk_access_token = $this->_check_local_access_token();
            $chk_access_token = $this->_check_access_token(true);
            if ($chk_access_token !== true) {
                return $this->api_error($chk_access_token, _HTTP_UNAUTHORIZED);
            }
        }

        // refresh token 체크
        if ($grant_type == 'refresh_token') {
            $chk_refresh_token = $this->_check_refresh_token($client_id, $refresh_token);
            if ($chk_refresh_token !== true) {
                return $this->api_error($chk_refresh_token, _HTTP_UNAUTHORIZED);
            }
        }

        // token 발급결과 리턴
        return $this->_response_token($grant_type, $client_id, $client_secret);
    }

    /**
     * token 발급결과
     * @param string $response_type [응답구분 (authorization_code, token, refresh_token, access_token)]
     * @param string $client_id [클라이언트 아이디]
     * @param string $client_secret [클라이언트 비밀키]
     * @param null|string $redirect_uri [리다이렉트URI]
     * @return mixed|void
     */
    private function _response_token($response_type, $client_id, $client_secret, $redirect_uri = null)
    {
        $token_type = config_item('rest_oauth_token_type');
        $access_token_limit_time = 1800;        // 30분 (60 * 30)
        $refresh_token_limit_time = 604800;     // 7일 (60 * 60 * 24 * 7)
        $issued_at = time();
        $expired_at = $issued_at + $access_token_limit_time;
        $refresh_token_expired_at = $issued_at + $refresh_token_limit_time;

        // access token
        $access_token = $client_id . '.' . $this->_generate_code() . '.' . $issued_at . '.' . $expired_at;
        $access_token = base64_encode($access_token . '.' . hash_hmac($this->_algo, $access_token, $client_secret));

        // refresh token
        $refresh_token = $access_token . '.' . $this->_generate_code();
        $refresh_token = hash_hmac($this->_algo, $refresh_token, $client_secret);
        $refresh_token = substr($refresh_token, 0, config_item('rest_key_length'));

        // refresh token 저장
        if (in_array($response_type, ['authorization_code', 'refresh_token']) === true) {
            $is_refresh_token_update = $this->_update_refresh_token($client_id, $refresh_token, $refresh_token_expired_at);
            if ($is_refresh_token_update !== true) {
                return $this->api_error($is_refresh_token_update);
            }
        }

        // token 발급결과 응답
        if ($response_type == 'token') {
            // Implicit Grant (암묵적 승인 방식, refresh token 사용안함)
            redirect($redirect_uri . '?token_type=' . $token_type . '&access_token=' . $access_token . '&issued_at=' . $issued_at . '&expired_at=' . $expired_at);
        } else {
            // Authorization Code Grant (권한 부여 승인 코드 방식), refresh token 재발급
            $results = [
                'token_type' => $token_type,
                'access_token' => $access_token,
                'issued_at' => $issued_at,
                'expired_at' => $expired_at,
                'refresh_token' => $refresh_token,
                'refresh_token_expired_at' => $refresh_token_expired_at,
                'scope' => ''
            ];

            return $this->api_success($results);
        }
    }

    /**
     * 사용자 로그인 체크 (WBS)
     * @return bool
     */
    private function _check_user_login()
    {
        return $this->session->userdata('is_admin_login') === true;
    }

    /**
     * 클라이언트 유효성 체크 (클라이언트 아이디, 상세정보 체크)
     * @param string $client_id [클라이언트 아이디]
     * @param null|string $redirect_uri [리다이렉트URI]
     * @param null|string $response_type [권한부여요청 응답구분]
     * @return bool|string
     */
    private function _check_valid_client($client_id, $redirect_uri = null, $response_type = null)
    {
        if (array_key_exists($client_id, $this->_valid_logins) === false) {
            return $this->_text_invalid_credentials . '[CO01]';
        }

        if (array_key_exists($client_id, $this->_client_info) === false) {
            return $this->_text_invalid_credentials . '[CO02]';
        }

        if (empty($redirect_uri) === false && element('callback_url', $this->_client_info[$client_id]) != $redirect_uri) {
            return $this->_text_invalid_credentials . '[CO03]';
        }

        if (empty($response_type) === false && element('response_type', $this->_client_info[$client_id]) != $response_type) {
            return $this->_text_invalid_credentials . '[CO04]';
        }

        return true;
    }

    /**
     * 클라이언트 비밀키 리턴
     * @param string $client_id [클라이언트 아이디]
     * @return false|string
     */
    private function _get_client_secret($client_id)
    {
        return hash_hmac($this->_algo, $this->_valid_logins[$client_id], $client_id);
    }

    /**
     * 임의코드 생성
     * @return false|string
     */
    private function _generate_code()
    {
        $rand = $this->security->get_random_bytes(64);
        $salt = ($rand === false)
            ? hash($this->_algo, time() . mt_rand())
            : bin2hex($rand);

        return substr($salt, 0, config_item('rest_key_length'));
    }

    /**
     * access token 체크
     * @return bool|string
     */
    private function _check_local_access_token()
    {
        // Authorization header value
        $http_auth = $this->input->server('HTTP_AUTHORIZATION') ?: $this->head('Authorization');
        if (empty($http_auth) === true) {
            return $this->_text_invalid_credentials . '[AT01]';
        }

        $token_type = strtolower(substr($http_auth, 0, strpos($http_auth, ' ')));
        $access_token = base64_decode(substr($http_auth, strpos($http_auth, ' ') + 1));

        // 토큰 타입 체크
        if ($token_type != config_item('rest_oauth_token_type')) {
            return $this->_text_invalid_credentials . '[AT02]';
        }

        // access token 체크
        if (substr_count($access_token, '.') != 4) {
            return $this->_text_invalid_credentials . '[AT03]';
        }
        
        // access token 세부값 셋팅
        list($client_id, $code, $issued_at, $expired_at, $signature) = explode('.', $access_token);

        // 클라이언트 아이디 체크
        if (array_key_exists($client_id, $this->_valid_logins) === false) {
            return $this->_text_invalid_credentials . '[AT04]';
        }

        // access token signature값 체크
        $client_secret = $this->_get_client_secret($client_id); // 비밀키
        $chk_signature = hash_hmac($this->_algo, str_last_pos_before($access_token, '.'), $client_secret);
        if (hash_equals($signature, $chk_signature) === false) {
            return $this->_text_invalid_credentials . '[AT05]';
        }
        
        // access token 유효기간 체크
        $mktime = time();
        if ($mktime < $issued_at || $mktime > $expired_at) {
            return $this->_text_invalid_credentials . '[AT06]';
        }
        
        return true;
    }

    /**
     * refresh token 체크
     * @param string $client_id [클라이언트 아이디]
     * @param string $refresh_token [refresh token]
     * @return bool|string
     */
    private function _check_refresh_token($client_id, $refresh_token)
    {
        try {
            if ($this->_enable_refresh_token !== true) {
                throw new \Exception($this->_text_invalid_credentials . '[RT01]');
            }

            // refresh token 정보 조회
            $chk_row = $this->rest->db
                ->select('refresh_token_expired_at')
                ->from(config_item('rest_oauth_client_table'))
                ->where('client_id', $client_id)->where('refresh_token', $refresh_token)
                ->get()->row_array();
            
            if (empty($chk_row) === true) {
                throw new \Exception($this->_text_invalid_credentials . '[RT02]');
            }
            
            // refresh token 만료시간 체크
            if ($chk_row['refresh_token_expired_at'] < time()) {
                throw new \Exception($this->_text_invalid_credentials . '[RT03]');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        return true;
    }

    /**
     * refresh token 업데이트
     * @param string $client_id [클라이언트 아이디]
     * @param string $refresh_token [refresh token]
     * @param int $refresh_token_expired_at [refresh token 만료시간]
     * @return bool|string
     */
    private function _update_refresh_token($client_id, $refresh_token, $refresh_token_expired_at)
    {
        try {
            if ($this->_enable_refresh_token !== true) {
                return true;
            }

            $is_update = $this->rest->db
                ->set('refresh_token', $refresh_token)
                ->set('refresh_token_expired_at', $refresh_token_expired_at)
                ->where('client_id', $client_id)
                ->update(config_item('rest_oauth_client_table'));

            if ($is_update !== true) {
                throw new \Exception('Refresh token 업데이트 실패');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        return true;
    }

    /**
     * server api sample (자체 access token 유효성 체크)
     * @return mixed|void
     */
    public function data_post()
    {
        // access token 체크
        $chk_result = $this->_check_local_access_token();
        if ($chk_result !== true) {
            return $this->api_error($chk_result, _HTTP_UNAUTHORIZED);
        }

        $data = ['name' => '홍길동'];

        return $this->api_success($data);
    }

    /**
     * server api sample (rest 라이브러리 사용)
     * @return mixed|void
     */
    public function cdata_post()
    {
        $data = ['name' => '홍길동'];

        return $this->api_success($data);
    }
}
