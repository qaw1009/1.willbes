<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RestClient
{
    protected $_ci;

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

    protected $rest_server;
    protected $format;
    protected $mime_type;

    protected $http_realm = null;
    protected $http_auth = null;
    protected $http_user = null;
    protected $http_pass = null;
    
    protected $api_name  = 'X-API-KEY';
    protected $api_key   = null;

    protected $ssl_verify_peer  = null;
    protected $ssl_cainfo       = null;

    protected $send_cookies = null;
    protected $response_string;

    function __construct($config = 'rest')
    {
        $this->_ci =& get_instance();
        log_message('debug', 'Rest Client Class Initialized');

        $this->_ci->load->library('curl');

        // If a URL was passed to the library
        empty($config) OR $this->initialize($config);
    }

    function __destruct()
    {
        $this->_ci->curl->close();
    }

    /**
     * initialize
     * @param $config
     */
    public function initialize($config)
    {
        if (is_array($config) === false) {
            $this->_ci->load->config($config, TRUE, TRUE);
            $config = $this->_ci->config->config[$config];
        }

        $this->rest_server = $config['rest_server'];
        if (substr($this->rest_server, -1, 1) != '/')
        {
            $this->rest_server .= '/';
        }

        isset($config['rest_default_format']) && $this->format = $config['rest_default_format'];
        isset($config['allow_send_cookies']) && $this->send_cookies = $config['allow_send_cookies'];
        
        isset($config['rest_key_name']) && $this->api_name = $config['rest_key_name'];
        isset($config['rest_enable_keys']) && $this->api_key = $config['rest_enable_keys'];

        isset($config['rest_realm']) && $this->http_realm = $config['rest_realm'];
        isset($config['rest_auth']) && $this->http_auth = $config['rest_auth'];
        if (isset($config['rest_valid_logins'])) {
            $this->http_user = key($config['rest_valid_logins']);
            $this->http_pass = current($config['rest_valid_logins']);
        }

        isset($config['ssl_verify_peer']) && $this->ssl_verify_peer = $config['ssl_verify_peer'];
        isset($config['ssl_cainfo']) && $this->ssl_cainfo = $config['ssl_cainfo'];
    }

    /**
     * get
     * @param $uri
     * @param array $params
     * @param null $format
     * @return mixed
     */
    public function get($uri, $params = array(), $format = NULL)
    {
        if ($params)
        {
            $uri .= '?'.(is_array($params) ? http_build_query($params) : $params);
        }

        return $this->_call('get', $uri, NULL, $format);
    }

    /**
     * post
     * @param $uri
     * @param array $params
     * @param null $format
     * @return mixed
     */
    public function post($uri, $params = array(), $format = NULL)
    {
        return $this->_call('post', $uri, $params, $format);
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
     */
    public function api_key($key)
    {
        $this->api_key = $key;
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
     * @return mixed
     */
    protected function _call($method, $uri, $params = array(), $format = NULL)
    {
        $url = $this->rest_server.$uri;
        is_null($format) === true && $format = $this->format;

        $this->format($format);
        $this->http_header('Accept', $this->mime_type);
        $this->_ci->curl->setUserAgent($this->http_realm);

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
            $this->http_login($this->http_user, sha1($this->http_pass), $this->http_auth);
        }
        
        // If we have an API Key, then use it
        if ($this->api_key !== FALSE)
        {
            $this->http_header($this->api_name, $this->api_key);
        }

        // Send cookies with curl
        if ($this->send_cookies === TRUE)
        {
            $this->_ci->curl->setCookies($_COOKIE);
        }
        
        // Set the Content-Type (contributed by https://github.com/eriklharper)
        $this->http_header('Content-type', $this->mime_type);

        // We still want the response even if there is an error code over 400
        $this->_ci->curl->setOpt(CURLOPT_FAILONERROR, FALSE);

        // Error occured
        $this->_ci->curl->error(function($instance) {
            echo json_encode([$instance->errorCode => $instance->errorMessage]);
            exit(1);
        });

        // Call and Execute the correct method with parameters
        if ($method == 'delete') {
            $this->_ci->curl->{$method}($url, [], $params);
        } else {
            $this->_ci->curl->{$method}($url, $params);
        }

        // return the response from the REST server
        $response = $this->_ci->curl->rawResponse;

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
        return is_null($opt) === true ? $this->_ci->curl->getInfo() : $this->_ci->curl->getInfo($opt);
    }

    /**
     * option
     * Set custom CURL options
     * @param $option
     * @param $value
     */
    public function option($option, $value)
    {
        $this->_ci->curl->setOpt($option, $value);
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
        call_user_func_array(array($this->_ci->curl, 'setHeader'), $params);
    }

    /**
     * http_login
     * @param string $username
     * @param string $password
     * @param string $type
     */
    public function http_login($username = '', $password = '', $type = 'any')
    {
        $this->_ci->curl->{'set' . ucfirst($type) . 'Authentication'}($username, $password);
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
        return json_decode(trim($string));
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
        echo "=============================================<br/>\n";
        echo "<h2>REST Test</h2>\n";
        echo "=============================================<br/>\n";
        echo "<h3>Request</h3>\n";
        echo $this->_ci->curl->url."<br/>\n";
        echo "=============================================<br/>\n";
        echo "<h3>Response</h3>\n";

        if ($this->response_string) {
            echo "<code>".nl2br(htmlentities($this->response_string))."</code><br/>\n";
        } else {
            echo "No response<br/>\n";
        }

        echo "=============================================<br/>\n";

        if ($this->_ci->curl->error)
        {
            echo "<h3>Errors</h3>";
            echo "<strong>Code:</strong> ".$this->_ci->curl->errorCode."<br/>\n";
            echo "<strong>Message:</strong> ".$this->_ci->curl->errorMessage."<br/>\n";
            echo "=============================================<br/>\n";
        }

        echo "<h3>Call details</h3>";
        echo "<pre>";
        print_r($this->info());
        echo "</pre>";
    }
}
