<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestClient
{
    protected $_CI;

    protected $supported_formats = array(
        'xml'               => 'application/xml',
        'json'              => 'application/json',
        'serialize'         => 'application/vnd.php.serialized',
        'php'               => 'text/plain',
        'csv'               => 'text/csv'
    );

    protected $auto_detect_formats = array(
        'application/xml'   => 'xml',
        'text/xml'          => 'xml',
        'application/json'  => 'json',
        'text/json'         => 'json',
        'text/csv'          => 'csv',
        'application/csv'   => 'csv',
        'application/vnd.php.serialized' => 'serialize'
    );

    protected $config_file = 'rest';
    protected $rest_configs = [];
    protected $rest_server;
    protected $format;
    protected $mime_type;

    protected $http_realm = null;
    protected $http_auth = null;
    protected $http_user = null;
    protected $http_pass = null;
    
    protected $api_key_name = null;
    protected $api_key = null;

    protected $api_user_name = null;
    protected $api_token_name = null;
    protected $api_nonce_name = null;

    protected $ssl_verify_peer = null;
    protected $ssl_cainfo = null;

    protected $send_cookies = null;
    protected $response_string;

    function __construct($config = [])
    {
        $this->_CI =& get_instance();
        log_message('debug', 'Rest Client Class Initialized');

        $this->_CI->load->library('curl');

        // If a URL was passed to the library
        $this->initialize($config);
    }

    function __destruct()
    {
        $this->_CI->curl->close();
    }

    /**
     * initialize
     * @param $config
     */
    public function initialize($config)
    {
        // get global config
        $this->_CI->load->config($this->config_file, TRUE, TRUE);
        $this->rest_configs = element($this->config_file, $this->_CI->config->config);

        // set member variables
        $this->rest_server = isset($config['server']) ? $config['server'] : element('rest_server', $this->rest_configs);
        if (substr($this->rest_server, -1, 1) != '/') {
            $this->rest_server .= '/';
        }

        $this->format = isset($config['format']) ? $config['format'] : element('rest_default_format', $this->rest_configs);
        isset($config['send_cookies']) && $this->send_cookies = $config['send_cookies'];

        isset($config['api_key']) && $this->api_key = element('api_key', $config);
        $this->api_key_name = isset($config['api_key_name']) ? $config['api_key_name'] : element('rest_key_name', $this->rest_configs, 'X-API-KEY');

        $this->api_user_name = isset($config['api_user_name']) ? $config['api_user_name'] : element('rest_user_name', $this->rest_configs, 'X-API-USER');
        $this->api_token_name = isset($config['api_token_name']) ? $config['api_token_name'] : element('rest_token_name', $this->rest_configs, 'X-API-TOKEN');
        $this->api_nonce_name = isset($config['api_nonce_name']) ? $config['api_nonce_name'] : element('rest_nonce_name', $this->rest_configs, 'X-API-NONCE');

        $this->http_realm = isset($config['http_realm']) ? $config['http_realm'] : element('rest_realm', $this->rest_configs);
        $this->http_auth = isset($config['http_auth']) ? $config['http_auth'] : element('rest_auth', $this->rest_configs);
        $this->http_user = isset($config['http_user']) ? $config['http_user'] : key(element('rest_valid_logins', $this->rest_configs));
        $this->http_pass = isset($config['http_pass']) ? $config['http_pass'] : current(element('rest_valid_logins', $this->rest_configs));

        $this->ssl_verify_peer = isset($config['ssl_verify_peer']) ? $config['ssl_verify_peer'] : element('ssl_verify_peer', $this->rest_configs);
        $this->ssl_cainfo = isset($config['ssl_cainfo']) ? $config['ssl_cainfo'] : element('ssl_cainfo', $this->rest_configs);
    }

    /**
     * get
     * @param $uri
     * @param array $params
     * @param null $format
     * @param $uri_add_server
     * @return mixed
     */
    public function get($uri, $params = array(), $format = NULL, $uri_add_server = true)
    {
        if ($params)
        {
            $uri .= '?'.(is_array($params) ? http_build_query($params) : $params);
        }

        return $this->_call('get', $uri, NULL, $format, $uri_add_server);
    }

    /**
     * get data from get api
     * @param string $uri
     * @param array $params
     * @return mixed
     */
    public function getDataJson($uri, $params = array())
    {
        $result = $this->get($uri, $params, 'json');
        if ($this->status() != _HTTP_OK) {
            $result[element('rest_uri_field_name', $this->rest_configs, 'uri')] = $uri;
            return $result;
        }

        return $result[element('rest_data_field_name', $this->rest_configs, 'data')];
    }

    /**
     * get data from gets api
     * @param array $uri_params
     * @return array
     */
    public function getsDataJson($uri_params = array())
    {
        $results = [];
        foreach ($uri_params as $idx => $uri_param) {
            $result = $this->getDataJson($uri_param['uri'], $uri_param['params']);
            if (isset($result[element('rest_status_field_name', $this->rest_configs, 'status')]) === true) {
                return $result;
            }

            $results[$uri_param['name']] = $result;
        }

        return $results;
    }

    /**
     * post
     * @param $uri
     * @param array $params
     * @param null $format
     * @param $uri_add_server
     * @return mixed
     */
    public function post($uri, $params = array(), $format = NULL, $uri_add_server = true)
    {
        return $this->_call('post', $uri, $params, $format, $uri_add_server);
    }

    /**
     * put
     * @param $uri
     * @param array $params
     * @param null $format
     * @return mixed
     */
    public function put($uri, $params = array(), $format = NULL)
    {
        return $this->_call('put', $uri, $params, $format);
    }

    /**
     * patch
     * @param $uri
     * @param array $params
     * @param null $format
     * @return mixed
     */
    public function patch($uri, $params = array(), $format = NULL)
    {
        return $this->_call('patch', $uri, $params, $format);
    }

    /**
     * delete
     * @param $uri
     * @param array $params
     * @param null $format
     * @return mixed
     */
    public function delete($uri, $params = array(), $format = NULL)
    {
        return $this->_call('delete', $uri, $params, $format);
    }

    /**
     * api_key
     * @param $key
     * @param bool $name
     */
    public function api_key($key, $name = FALSE)
    {
        $this->api_key  = $key;

        if ($name !== FALSE) {
            $this->api_key_name = $name;
        }
    }

    /**
     * language
     * @param $lang
     */
    public function language($lang)
    {
        if (is_array($lang))
        {
            $lang = implode(', ', $lang);
        }

        $this->http_header('Accept-Language', $lang);
    }

    /**
     * header
     * @param $header
     */
    public function header($header)
    {
        $this->http_header($header);
    }

    /**
     * _call
     * @param $method
     * @param $uri
     * @param array $params
     * @param null $format
     * @param $uri_add_server
     * @return mixed
     */
    protected function _call($method, $uri, $params = array(), $format = NULL, $uri_add_server = true)
    {
        if($uri_add_server === true){
            $url = $this->rest_server.$uri;
        } else {
            $url = $uri;
        }

        is_null($format) === true && $format = $this->format;

        $this->format($format);
        $this->http_header('Accept', $this->mime_type);
        $this->_CI->curl->setUserAgent($this->http_realm);

        // If using ssl set the ssl verification value and cainfo
        // contributed by: https://github.com/paulyasi
        if ($this->ssl_verify_peer === FALSE)
        {
            $this->ssl(FALSE);
        }
        elseif ($this->ssl_verify_peer === TRUE)
        {
            $this->ssl_cainfo = getcwd() . $this->ssl_cainfo;
            $this->ssl(TRUE, 2, $this->ssl_cainfo);
        }

        // If authentication is enabled use it
        if ($this->http_auth !== FALSE && $this->http_user != '')
        {
            if ($this->http_auth == 'token') {
                $this->http_token($this->http_user, $this->http_pass, $method, $uri);
            } else {
                $this->http_login($this->http_user, $this->http_pass, $this->http_auth);
            }
        }

        // If we have an API Key, then use it
        if (empty($this->api_key) === FALSE)
        {
            $this->http_header($this->api_key_name, $this->api_key);
        }

        // Send cookies with curl
        if ($this->send_cookies === TRUE)
        {
            $this->_CI->curl->setCookies($_COOKIE);
        }
        
        // Set the Content-Type (contributed by https://github.com/eriklharper)
        $this->http_header('Content-type', $this->mime_type);

        // We still want the response even if there is an error code over 400
        $this->_CI->curl->setOpt(CURLOPT_FAILONERROR, FALSE);

        // Call and Execute the correct method with parameters
        if ($method == 'delete') {
            $this->_CI->curl->{$method}($url, [], $params);
        } else {
            $this->_CI->curl->{$method}($url, $params);
        }

        // return the response from the REST server
        $response = $this->_CI->curl->rawResponse;

        // write log
        $this->_log_response($response, $this->status(), $method, $uri, $params, $format);

        // Format and return
        return $this->_format_response($response);
    }

    /**
     * initialize
     * If a type is passed in that is not supported, use it as a mime type
     * @param $format
     * @return $this
     */
    public function format($format)
    {
        if (array_key_exists($format, $this->supported_formats))
        {
            $this->format = $format;
            $this->mime_type = $this->supported_formats[$format];
        }
        else
        {
            $this->mime_type = $format;
        }

        return $this;
    }

    /**
     * status
     * Return HTTP status code
     * @return mixed
     */
    public function status()
    {
        return $this->info(CURLINFO_HTTP_CODE);
    }

    /**
     * info
     * Return curl info by specified key, or whole array
     * @param null $opt
     * @return mixed
     */
    public function info($opt = null)
    {
        return is_null($opt) === true ? $this->_CI->curl->getInfo() : $this->_CI->curl->getInfo($opt);
    }

    /**
     * option
     * Set custom CURL options
     * @param $option
     * @param $value
     */
    public function option($option, $value)
    {
        $this->_CI->curl->setOpt($option, $value);
    }

    /**
     * http_header
     * @param $key
     * @param null $value
     */
    public function http_header($key, $value = NULL)
    {
        // Did they use a single argument or two?
        $params = $value ? array($key, $value) : explode(':', $key);

        // Pass these attributes on to the curl library
        call_user_func_array(array($this->_CI->curl, 'setHeader'), $params);
    }

    /**
     * http_login
     * @param string $username
     * @param string $password
     * @param string $type
     */
    public function http_login($username = '', $password = '', $type = 'any')
    {
        $password = hash_hmac('sha256', $password, $username);
        $this->_CI->curl->{'set' . ucfirst($type) . 'Authentication'}($username, $password);
    }

    /**
     * http_token
     * @param string $username
     * @param string $password
     * @param string $method
     * @param string $uri
     */
    public function http_token($username = '', $password = '', $method = '', $uri = '')
    {
        $unique_id = uniqid();
        $nonce = substr($unique_id, 0, 7) . time() . substr($unique_id, 7);
        $password = hash_hmac('sha256', $password, $username);

        $token = $username . ':' . $nonce . ':' . $password . ':' . strtoupper($method) . ':' . $uri;
        //$token = $username . ':' . $nonce . ':' . $password . ':' . strtoupper($this->http_realm) . ':' . strtoupper($this->http_auth);
        $token = md5(hash_hmac('sha256', $token, $nonce));

        $this->http_header($this->api_user_name, $username);
        $this->http_header($this->api_nonce_name, $nonce);
        $this->http_header($this->api_token_name, $token);
    }

    /**
     * ssl
     * @param bool $verify_peer
     * @param int $verify_host
     * @param null $path_to_cert
     */
    public function ssl($verify_peer = TRUE, $verify_host = 2, $path_to_cert = NULL)
    {
        if ($verify_peer)
        {
            $this->option(CURLOPT_SSL_VERIFYPEER, TRUE);
            $this->option(CURLOPT_SSL_VERIFYHOST, $verify_host);
            $this->option(CURLOPT_CAINFO, $path_to_cert);
        }
        else
        {
            $this->option(CURLOPT_SSL_VERIFYPEER, FALSE);
        }
    }

    /**
     * write rest client log
     * @param $response
     * @param $http_code
     * @param $method
     * @param $uri
     * @param array $params
     * @param null $format
     */
    protected function _log_response($response, $http_code, $method, $uri, $params = array(), $format = NULL)
    {
        if ($http_code != _HTTP_OK) {
            $log_msg = '[RestClient: ' . $uri . '] => ' . $response;
            $log_vars = [
                'method' => $method, 'params' => $params, 'format' => $format, 'http_code' => $http_code
            ];

            logger($log_msg, $log_vars, 'error');
        }
    }

    /**
     * _format_response
     * @param $response
     * @return mixed
     */
    protected function _format_response($response)
    {
        $this->response_string =& $response;

        // It is a supported format, so just run its formatting method
        if (array_key_exists($this->format, $this->supported_formats))
        {
            return $this->{"_".$this->format}($response);
        }

        // Find out what format the data was returned in
        $returned_mime = $this->info('content_type');

        // If they sent through more than just mime, strip it off
        if (strpos($returned_mime, ';'))
        {
            list($returned_mime) = explode(';', $returned_mime);
        }

        $returned_mime = trim($returned_mime);

        if (array_key_exists($returned_mime, $this->auto_detect_formats))
        {
            return $this->{'_'.$this->auto_detect_formats[$returned_mime]}($response);
        }

        return $response;
    }

    /**
     * _xml
     * Format XML for output
     * @param $string
     * @return array
     */
    protected function _xml($string)
    {
        return $string ? (array) simplexml_load_string($string, 'SimpleXMLElement', LIBXML_NOCDATA) : array();
    }

    /**
     * _csv
     * Format HTML for output.  This function is DODGY! Not perfect CSV support but works
     * with my REST_Controller (https://github.com/philsturgeon/codeigniter-restserver)
     * @param $string
     * @return array
     */
    protected function _csv($string)
    {
        $data = array();

        // Splits
        $rows = explode("\n", trim($string));
        $headings = explode(',', array_shift($rows));
        foreach( $rows as $row )
        {
            // The substr removes " from start and end
            $data_fields = explode('","', trim(substr($row, 1, -1)));

            if (count($data_fields) === count($headings))
            {
                $data[] = array_combine($headings, $data_fields);
            }

        }

        return $data;
    }

    /**
     * _json
     * Encode as JSON
     * @param $string
     * @return mixed
     */
    protected function _json($string)
    {
        return json_decode(trim($string), true);
    }

    /**
     * _serialize
     * Encode as Serialized array
     * @param $string
     * @return mixed
     */
    protected function _serialize($string)
    {
        return unserialize(trim($string));
    }

    /**
     * _php
     * Encode raw PHP
     * @param $string
     * @return array
     */
    protected function _php($string)
    {
        $string = trim($string);
        $populated = array();
        eval("\$populated = \"$string\";");
        return $populated;
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

        if ($this->_CI->curl->error)
        {
            $output .= '<h3>Errors</h3>' . PHP_EOL;
            $output .= '<strong>Code:</strong> '.$this->_CI->curl->errorCode.'<br/>' . PHP_EOL;
            $output .= '<strong>Message:</strong> '.$this->_CI->curl->errorMessage.'<br/>' . PHP_EOL;
            $output .= '=============================================<br/>' . PHP_EOL;
        }

        $output .= '<h3>Call details</h3>' . PHP_EOL;
        $output .= '<pre>' . PHP_EOL;
        $output .= print_r($this->info(), true);
        $output .= '</pre>' . PHP_EOL;

        echo $output;
    }
}
