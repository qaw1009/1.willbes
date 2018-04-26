<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('app_url')) {
    /**
     * app name에 맞는 URL 리턴
     * @param $uri
     * @param $app_name
     * @return string
     */
    function app_url($uri, $app_name)
    {
        return '//' . ENV_CHAR . $app_name . '.' . config_item('base_domain') . $uri;
    }
}

if (!function_exists('config_app')) {
    /**
     * 사이트별 $key에 해당하는 config 값 리턴
     * @param $key
     * @return mixed
     */
    function config_app($key)
    {
        return array_get(config_item(APP_NAME), $key);
    }
}

if (!function_exists('config_get')) {
    /**
     * dot(.) 표기법으로 $key에 해당하는 config 값 리턴
     * @param $key
     * @return mixed
     */
    function config_get($key)
    {
        return array_get(get_config(), $key);
    }
}

if (!function_exists('csrf_field')) {
    /**
     * get csrf token input html
     * @return string
     */
    function csrf_field()
    {
        return form_hidden(csrf_token_name(), csrf_token());
    }
}

if (!function_exists('csrf_token')) {
    /**
     * get csrf token
     * @return string
     */
    function csrf_token()
    {
        $_CI =& get_instance();
        return $_CI->security->get_csrf_hash();
    }
}

if (!function_exists('csrf_token_name')) {
    /**
     * get csrf token name
     * @return string
     */
    function csrf_token_name()
    {
        $_CI =& get_instance();
        return $_CI->security->get_csrf_token_name();
    }
}


if (!function_exists('dd')) {
    /**
     * pretty display var_dump and die
     */
    function dd()
    {
        array_map(function($var) {
            echo '<pre style="background: #141115 !important; color: #56d32e; font-weight: bold; border: 1px #ff0000 solid; padding: 15px; z-index: 999999; position: relative;">';
            var_dump($var);
            echo '</pre>';
        }, func_get_args());

        die(1);
    }
}

if (!function_exists('ends_with')) {
    /**
     * haystack(대상 문자열)이 needles(찾을 문자열 배열)로 끝나는지 여부 체크
     * @param $haystack
     * @param $needles
     * @return bool
     */
    function ends_with($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ((string) $needle === substr($haystack, -strlen($needle))) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('error_result')) {
    /**
     * return exception error
     * @param \Exception $e
     * @param bool $is_bool_return
     * @return array|bool
     */
    function error_result($e, $is_bool_return = false)
    {
        logger($e->getFile() . ' : ' . $e->getLine() . ' line : ' . $e->getMessage(), [], 'error');

        return ($is_bool_return === true) ? false : [
                'ret_cd' => false,
                'ret_msg' => $e->getMessage(),
                'ret_status' => ($e->getCode() == 0) ? 500 : $e->getCode()
            ];
    }
}

if (!function_exists('flash_data')) {
    /**
     * get flash session data
     * @param $key
     * @return mixed
     */
    function flash_data($key)
    {
        $_CI =& get_instance();
        return $_CI->session->flashdata($key);
    }
}

if (!function_exists('form_errors')) {
    /**
     * return validation check error
     * @return string
     */
    function form_errors()
    {
        $err_msg = flash_data('form_errors');

        return empty($err_msg) === false ? '<div id="form-errors" class="alert alert-danger"><ul>' . $err_msg . '</ul></div>' : '';
    }
}

if (!function_exists('get_var')) {
    /**
     * 변수값이 빈값일 경우 default 값 리턴
     * @param $var
     * @param $default
     * @return mixed
     */
    function get_var($var, $default = '')
    {
        return (strlen($var) > 0) ? $var : $default;
    }
}

if (!function_exists('get_app_var')) {
    /**
     * 어플리케이션에 설정된 변수 리턴
     * @param $key
     * @return mixed
     */
    function get_app_var($key)
    {
        $_CI =& get_instance();
        return $_CI->load->get_var('__' . $key);
    }
}

if (!function_exists('logger')) {
    /**
     * log message
     * @param $msg
     * @param array $vars
     * @param string $log_level
     */
    function logger($msg, $vars = array(), $log_level = 'debug')
    {
        $msg .= (is_array($vars) === true && count($vars) > 0) ? ' ' . json_encode($vars, JSON_UNESCAPED_UNICODE) : '';
        log_message($log_level, $msg);
    }
}

if (!function_exists('method_field')) {
    /**
     * get _method input html
     * @param $method
     * @return string
     */
    function method_field($method)
    {
        return form_hidden('_method', $method);
    }
}

if (!function_exists('query_string_to_array')) {
    /**
     * return query string to array
     * @param $haystack
     * @return array
     */
    function query_string_to_array($haystack)
    {
        $array = [];
        if ($haystack != '') {
            $query_strings = explode('&', $haystack);
            foreach ($query_strings as $query_string) {
                if (empty($query_string) === false) {
                    $key_values = explode('=', $query_string);
                    $array[$key_values[0]] = element(1, $key_values, '');
                }
            }
        }

        return $array;
    }
}

if (!function_exists('sess_data')) {
    /**
     * get session data
     * @param $key
     * @return mixed
     */
    function sess_data($key)
    {
        $_CI =& get_instance();
        return $_CI->session->userdata($key);
    }
}

if (!function_exists('starts_with')) {
    /**
     * haystack(대상 문자열)이 needles(찾을 문자열 배열)로 시작하는지 여부 체크
     * @param $haystack
     * @param $needles
     * @return bool
     */
    function starts_with($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle != '' && strpos($haystack, $needle) === 0) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('str_first_pos_before')) {
    /**
     * haystack(대상 문자열)에서 첫번째 needle(찾을 문자열)의 위치 이전까지의 문자열 리턴
     * @param $haystack
     * @param $needle
     * @return string
     */
    function str_first_pos_before($haystack, $needle)
    {
        return substr($haystack, 0, strpos($haystack, $needle));
    }
}

if (!function_exists('str_first_pos_after')) {
    /**
     * haystack(대상 문자열)에서 첫번째 needle(찾을 문자열)의 위치 다음부터의 문자열 리턴
     * @param $haystack
     * @param $needle
     * @return string
     */
    function str_first_pos_after($haystack, $needle)
    {
        return substr($haystack, strpos($haystack, $needle) + strlen($needle));
    }
}

if (!function_exists('str_last_pos_before')) {
    /**
     * haystack(대상 문자열)에서 마지막 needle(찾을 문자열)의 위치 이전까지의 문자열 리턴
     * @param $haystack
     * @param $needle
     * @return string
     */
    function str_last_pos_before($haystack, $needle)
    {
        return substr($haystack, 0, strrpos($haystack, $needle));
    }
}

if (!function_exists('str_last_pos_after')) {
    /**
     * haystack(대상 문자열)에서 마지막 needle(찾을 문자열)의 위치 다음부터의 문자열 리턴
     * @param $haystack
     * @param $needle
     * @return string
     */
    function str_last_pos_after($haystack, $needle)
    {
        return substr($haystack, strrpos($haystack, $needle) + strlen($needle));
    }
}

if (!function_exists('value')) {
    /**
     * 인자값이 Closure 일 경우 Closure 결과값이 리턴
     * @param $value
     * @return mixed
     */
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}