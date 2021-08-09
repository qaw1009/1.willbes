<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RestClient
{
    protected $_CI;

    protected $_supported_formats = [
        'json'       => 'application/json',
        'csv'        => 'application/csv',
        'php'        => 'text/plain',
        'serialized' => 'application/vnd.php.serialized',
        'xml'        => 'application/xml'
    ];

    protected $_auto_detect_formats = [
        'application/json'  => 'json',
        'text/json'         => 'json',
        'text/csv'          => 'csv',
        'application/csv'   => 'csv',
        'text/plain'        => 'php',
        'application/vnd.php.serialized' => 'serialized',
        'application/xml'   => 'xml',
        'text/xml'          => 'xml'
    ];

    protected $config_file = 'rest';
    protected $rest_configs = [];
    protected $rest_server;
    protected $rest_format;
    protected $mime_type;

    protected $http_auth = null;
    protected $http_user = null;
    protected $http_pass = null;

    protected $api_key_name = null;
    protected $api_key = null;

    protected $ssl_verify_peer = false;
    protected $ssl_cainfo = null;
    protected $send_cookies = null;

    protected $response_string;

    /**
     * @var \Format
     */
    private $response_format;

    function __construct($config = [])
    {
        $this->_CI =& get_instance();
        log_message('debug', 'Rest Client Class Initialized');

        // Load curl library
        $this->_CI->load->library('curl');

        // Load format library
        $this->_CI->load->library('format', null, 'libraryFormat');
        $this->response_format = $this->_CI->libraryFormat;

        // REST Client initialize
        $this->initialize($config);
    }

    function __destruct()
    {
        $this->_CI->curl->close();
    }

    /**
     * REST Client initialize
     * @param array $config
     */
    public function initialize($config = [])
    {
        // get global config
        if (empty($this->rest_configs) === true) {
            $config_file = isset($config['config']) === true ? $config['config'] : $this->config_file;
            $this->_CI->load->config($config_file, true, true);
            $this->rest_configs = element($config_file, $this->_CI->config->config);
        }

        $this->rest_server = rtrim(isset($config['server']) === true ? $config['server'] : $this->rest_configs['rest_server'], '/');

        $this->http_auth = isset($config['http_auth']) === true ? $config['http_auth'] : $this->rest_configs['rest_auth'];
        $this->http_user = isset($config['http_user']) === true ? $config['http_user'] : key($this->rest_configs['rest_valid_logins']);
        $this->http_pass = isset($config['http_pass']) === true ? $config['http_pass'] : current($this->rest_configs['rest_valid_logins']);

        $this->api_key_name = isset($config['api_key_name']) === true ? $config['api_key_name'] : $this->rest_configs['rest_key_name'];
        isset($config['api_key']) === true && $this->api_key = $config['api_key'];

        isset($config['ssl_verify_peer']) === true && $this->ssl_verify_peer = $config['ssl_verify_peer'];
        isset($config['ssl_cainfo']) === true && $this->ssl_cainfo = $config['ssl_cainfo'];
        isset($config['send_cookies']) === true && $this->send_cookies = $config['send_cookies'];
    }

    /**
     * Call get api
     * @param string $uri
     * @param array $params
     * @param null|string $format
     */
    public function get($uri, $params = [], $format = null)
    {
        return $this->_call('get', $uri, $params, $format);
    }

    /**
     * Call post api
     * @param string $uri
     * @param array $params
     * @param null|string $format
     * @return mixed
     */
    public function post($uri, $params = [], $format = null)
    {
        return $this->_call('post', $uri, $params, $format);
    }

    /**
     * Call put api
     * @param string $uri
     * @param array $params
     * @param null|string $format
     * @return mixed
     */
    public function put($uri, $params = [], $format = null)
    {
        return $this->_call('put', $uri, $params, $format);
    }

    /**
     * Call patch api
     * @param string $uri
     * @param array $params
     * @param null|string $format
     * @return mixed
     */
    public function patch($uri, $params = [], $format = null)
    {
        return $this->_call('patch', $uri, $params, $format);
    }

    /**
     * Call delete api
     * @param string $uri
     * @param array $params
     * @param null|string $format
     * @return mixed
     */
    public function delete($uri, $params = [], $format = null)
    {
        return $this->_call('delete', $uri, $params, $format);
    }

    /**
     * Call api
     * @param string $method
     * @param string $uri
     * @param array $params
     * @param null|string $format
     * @return mixed
     */
    protected function _call($method, $uri, $params = [], $format = null)
    {
        if (filter_var($uri, FILTER_VALIDATE_URL) === false) {
            $uri = $this->rest_server . $uri;
        }

        if (empty($format) === false) {
            $this->format($format);
        }

        if (empty($this->mime_type) === true) {
            $this->format($this->rest_configs['rest_default_format']);
        }

        $this->http_header('Accept', $this->mime_type);

        // If using ssl set the ssl verification value and cainfo
        // contributed by: https://github.com/paulyasi
        if ($this->ssl_verify_peer === true) {
            $this->ssl_cainfo = getcwd() . $this->ssl_cainfo;
            $this->ssl(true, 2, $this->ssl_cainfo);
        } elseif ($this->ssl_verify_peer === false) {
            $this->ssl(false);
        }

        // If authentication is enabled use it
        if ($this->http_auth !== false && empty($this->http_user) === false) {
            if ($this->http_auth == 'token') {
                $this->http_token($this->http_user, $this->http_pass, $method, $uri, $params);
            } else {
                $this->http_login($this->http_user, $this->http_pass, $this->http_auth);
            }
        }

        // If we have an API Key, then use it
        if (empty($this->api_key) === false) {
            $this->api_key($this->api_key, $this->api_key_name);
        }

        // Send cookies with curl
        if ($this->send_cookies === true) {
            $this->_CI->curl->setCookies($_COOKIE);
        }

        // Set the Content-Type (contributed by https://github.com/eriklharper)
        $this->http_header('Content-type', $this->mime_type);

        // We still want the response even if there is an error code over 400
        $this->option(CURLOPT_FAILONERROR, false);

        // Call and Execute the correct method with parameters
        if ($method == 'delete') {
            $this->_CI->curl->{$method}($uri, [], $params);
        } else {
            $this->_CI->curl->{$method}($uri, $params);
        }

        // return the response from the REST server
        $response = $this->_CI->curl->rawResponse;

        // write log
        $this->_log_response($response, $this->status(), $method, $uri, $params, $format);

        // Format and return
        return $this->_format_response($response);
    }

    /**
     * Set output format
     * If a type is passed in that is not supported, use it as a mime type
     * @param string $format
     * @return $this
     */
    public function format($format)
    {
        if (array_key_exists($format, $this->_supported_formats) === true) {
            $this->rest_format = $format;
            $this->mime_type = $this->_supported_formats[$format];
        } else {
            $this->mime_type = $format;
        }

        return $this;
    }

    /**
     * Return HTTP status code
     * @return mixed
     */
    public function status()
    {
        return $this->info(CURLINFO_HTTP_CODE);
    }

    /**
     * Return curl info by specified key, or whole array
     * @param null|string $opt
     * @return mixed
     */
    public function info($opt = null)
    {
        return is_null($opt) === true ? $this->_CI->curl->getInfo() : $this->_CI->curl->getInfo($opt);
    }

    /**
     * Set curl option
     * @param string $option
     * @param string $value
     */
    public function option($option, $value)
    {
        $this->_CI->curl->setOpt($option, $value);
    }

    /**
     * Set API key
     * @param string $key
     * @param string $name
     */
    public function api_key($key, $name = '')
    {
        if (empty($name) === true) {
            $name = 'X-API-KEY';
        }

        $this->http_header($name, $key);
    }

    /**
     * Set language header
     * @param string $lang
     */
    public function language($lang)
    {
        if (is_array($lang) === true) {
            $lang = implode(', ', $lang);
        }

        $this->http_header('Accept-Language', $lang);
    }

    /**
     * Set header
     * @param string $header
     */
    public function header($header)
    {
        $this->http_header($header);
    }

    /**
     * Set http header
     * @param string $key
     * @param null|string $value
     */
    public function http_header($key, $value = null)
    {
        // Did they use a single argument or two?
        $params = $value ? array($key, $value) : explode(':', $key);

        // Pass these attributes on to the curl library
        call_user_func_array(array($this->_CI->curl, 'setHeader'), $params);
    }

    /**
     * Set http login (auth => basic, digest)
     * @param string $username
     * @param string $password
     * @param string $type
     */
    public function http_login($username, $password, $type = 'any')
    {
        $password = hash_hmac('sha256', $password, $username);
        $this->_CI->curl->{'set' . ucfirst($type) . 'Authentication'}($username, $password);
    }

    /**
     * Set http token (auth => token)
     * @param string $username
     * @param string $password
     * @param string $method
     * @param string $uri
     * @param array $params
     */
    public function http_token($username, $password, $method, $uri, $params = [])
    {
        $nonce = substr(uniqid(), -6) . time();
        $secret = hash_hmac('sha256', $password, $username . $nonce);

        $params_value = md5(implode('', array_values($params)));
        $md5 = md5(strtoupper($method) . ':' . parse_url($uri, PHP_URL_PATH) . ':' . $params_value);

        $token = $username . ':' . $nonce . ':' . $md5;
        $token = md5(hash_hmac('sha256', $token, $secret));

        $this->http_header($this->rest_configs['rest_user_name'], $username);
        $this->http_header($this->rest_configs['rest_nonce_name'], $nonce);
        $this->http_header($this->rest_configs['rest_token_name'], $token);
    }

    /**
     * Set http auth method
     * @param string $http_auth
     */
    public function http_auth($http_auth)
    {
        $this->http_auth = $http_auth;
    }

    /**
     * Set ssl option
     * @param bool $verify_peer
     * @param int $verify_host
     * @param null|string $path_to_cert
     */
    public function ssl($verify_peer = true, $verify_host = 2, $path_to_cert = null)
    {
        if ($verify_peer === true) {
            $this->option(CURLOPT_SSL_VERIFYPEER, true);
            $this->option(CURLOPT_SSL_VERIFYHOST, $verify_host);
            $this->option(CURLOPT_CAINFO, $path_to_cert);
        } else {
            $this->option(CURLOPT_SSL_VERIFYPEER, false);
        }
    }

    /**
     * Write REST Client log
     * @param string $response
     * @param int $http_code
     * @param string $method
     * @param string $uri
     * @param array $params
     * @param null|string $format
     */
    protected function _log_response($response, $http_code, $method, $uri, $params = [], $format = null)
    {
        if ($http_code != _HTTP_OK) {
            $log_msg = '[RestClient: ' . $uri . '] => ' . $response;
            $log_vars = ['method' => $method, 'params' => $params, 'format' => $format, 'http_code' => $http_code];
            logger($log_msg, $log_vars, 'error');
        }
    }

    /**
     * Return response format
     * @param string $response
     * @return mixed
     */
    protected function _format_response($response)
    {
        $this->response_string =& $response;

        // It is a supported format, so just run its formatting method
        if (array_key_exists($this->rest_format, $this->_supported_formats) === true) {
            return $this->response_format->{'_from_' . $this->rest_format}($response);
        }

        // Find out what format the data was returned in
        $returned_mime = $this->info('content_type');

        // If they sent through more than just mime, strip it off
        if (strpos($returned_mime, ';')) {
            list($returned_mime) = explode(';', $returned_mime);
        }
        $returned_mime = trim($returned_mime);

        if (array_key_exists($returned_mime, $this->_auto_detect_formats) === true) {
            return $this->response_format->{'_from_' . $this->_auto_detect_formats[$returned_mime]}($response);
        }

        return $response;
    }

    /**
     * debug
     */
    public function debug()
    {
        $output = '=============================================' . PHP_EOL;
        $output .= '<h2>REST Debug</h2>' . PHP_EOL;
        $output .= '=============================================' . PHP_EOL;
        $output .= '<h3>Request</h3>' . PHP_EOL;
        $output .= $this->_CI->curl->url . '<br/>' . PHP_EOL;
        $output .= '=============================================' . PHP_EOL;
        $output .= '<h3>Response</h3>' . PHP_EOL;

        if ($this->response_string) {
            $output .= '<code>'.nl2br(htmlentities($this->response_string)).'</code><br/>' . PHP_EOL;
        } else {
            $output .= 'No response<br/>' . PHP_EOL;
        }

        $output .= '=============================================<br/>' . PHP_EOL;

        if ($this->_CI->curl->error) {
            $output .= '<h3>Errors</h3>' . PHP_EOL;
            $output .= '<strong>Code:</strong> '.$this->_CI->curl->errorCode.'<br/>' . PHP_EOL;
            $output .= '<strong>Message:</strong> '.$this->_CI->curl->errorMessage.'<br/>' . PHP_EOL;
            $output .= '=============================================<br/>' . PHP_EOL;
        }

        $output .= '<h3>Call details</h3>' . PHP_EOL;
        $output .= '<pre>' . PHP_EOL;
        $output .= print_r($this->info(), true);
        $output .= '</pre>' . PHP_EOL;

        echo($output);
    }
}
