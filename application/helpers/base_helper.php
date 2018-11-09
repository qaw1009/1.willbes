<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('app_url')) {
    /**
     * 서브 도메인 (wbs, lms ...)에 맞는 전체 (도메인 포함) URL 리턴
     * @param $uri
     * @param $sub_domain
     * @return string
     */
    function app_url($uri, $sub_domain)
    {
        return '//' . $sub_domain . ENV_DOMAIN . '.' . config_item('base_domain') . $uri;
    }
}

if (!function_exists('app_to_env_url')) {
    /**
     * 실제 URL을 시스템 환경에 맞는 URL로 변환 후 리턴
     * @param $url
     * @return string
     */
    function app_to_env_url($url)
    {
        return substr($url, 0, strpos($url, '.')) . ENV_DOMAIN . '.' . substr($url, strpos($url, '.') + 1);
    }
}

if (!function_exists('config_app')) {
    /**
     * 서브 도메인별 (wbs, lms ...) dot(.) 표기법으로 $key에 해당하는 config 값 리턴
     * @example config_app('SiteCode'), 사이트 (서브 도메인) 하위의 설정 값 리턴
     * @param $key
     * @param $default
     * @return mixed
     */
    function config_app($key, $default = null)
    {
        return array_get(config_item(SUB_DOMAIN), $key, $default);
    }
}

if (!function_exists('config_get')) {
    /**
     * dot(.) 표기법으로 config.php에 설정된 $key에 해당하는 config 값 리턴
     * @example config_get('cop.SiteCode'), 전체 설정값에서 해당 키에 해당하는 설정값 리턴
     * @param $key
     * @param $default
     * @return mixed
     */
    function config_get($key, $default = null)
    {
        return array_get(get_config(), $key, $default);
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

if (!function_exists('front_url')) {
    /**
     * site_url 대체 헬퍼 (모바일 사이트, 학원 사이트 여부를 판별하여 URI 생성)
     * @param $uri
     * @return string
     */
    function front_url($uri)
    {
        $uri_prefix = '';
        config_app('IsMobile') === true && $uri_prefix .= '/' . config_item('app_mobile_site_prefix');
        config_app('IsPassSite') === true && $uri_prefix .= '/' . config_item('app_pass_site_prefix');

        return site_url($uri_prefix . $uri);
    }
}

if (!function_exists('front_app_url')) {
    /**
     * app_url 대체 헬퍼 (모바일 사이트, 학원 사이트 여부를 판별하여 URI 생성)
     * @param $uri
     * @param $sub_domain
     * @return string
     */
    function front_app_url($uri, $sub_domain)
    {
        $uri_prefix = '';
        config_app('IsMobile') === true && $uri_prefix .= '/' . config_item('app_mobile_site_prefix');
        config_app('IsPassSite') === true && $uri_prefix .= '/' . config_item('app_pass_site_prefix');

        return app_url($uri_prefix . $uri, $sub_domain);
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
     * 어플리케이션 (CI_Controller)에 설정된 변수 리턴
     * @param $key
     * @return mixed
     */
    function get_app_var($key)
    {
        $_CI =& get_instance();
        return $_CI->load->get_var('__' . $key);
    }
}

if (!function_exists('img_url')) {
    /**
     * 이미지 경로 리턴
     * @param string $img_path [img_base_path 이후의 이미지 경로, 맨앞 / 제외]
     * @return string
     */
    function img_url($img_path)
    {
        return config_item('img_base_path') . $img_path;
    }
}

if (!function_exists('logger')) {
    /**
     * log message
     * @param $msg
     * @param null|mixed $vars
     * @param string $log_level
     * @param string $log_path
     */
    function logger($msg, $vars = null, $log_level = 'debug', $log_path = '')
    {
        //$msg .= is_array($vars) === true && empty($vars) === false ? ' ' . json_encode($vars, JSON_UNESCAPED_UNICODE) : '';
        $msg .= empty($vars) === false ? ' : ' . var_export($vars, true) : '';

        if (empty($log_path) === true) {
            log_message($log_level, $msg);
        } else {
            $_CI =& get_instance();
            $_CI->load->helper('file');

            $msg = strtoupper($log_level) . ' - ' . date('Y-m-d H:i:s') . ' --> ' . $msg . PHP_EOL;

            if(write_file($log_path, $msg, 'a+') === false) {
                log_message('debug', 'Unable to write the custom log file');
            }
        }
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

if (!function_exists('remove_utf8_bom')) {
    /**
     * 텍스트(txt) 파일 내용의 utf8-bom 값이 있을 경우 삭제 후 리턴
     * @param string $str
     * @return string
     */
    function remove_utf8_bom($str)
    {
        if (substr(bin2hex($str), 0, 6) == 'efbbbf') {
            $str = substr($str, 3);
        }    
        return $str;
    }
}

if (!function_exists('query_string_to_array')) {
    /**
     * return array from query string
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

if (!function_exists('show_alert')) {
    /**
     * javascript alert
     * @param string $msg
     * @param string $url [리턴 URL, back : 이전 페이지, url : url 이동, empty : only alert]
     * @param bool $is_href [URL 이동 방식 (true : href, false : replace)]
     */
    function show_alert($msg, $url = '', $is_href = true)
    {
        $_CI =& get_instance();

        $output = '<meta http-equiv="Content-Type" content="text/html; charset=' . $_CI->config->item('charset') . '">' . PHP_EOL;
        $output .= '<script type="text/javascript">' . PHP_EOL;
        $output .= 'alert("' . $msg . '");' . PHP_EOL;
        if (empty($url) === false) {
            if ($url == 'back') {
                $output .= 'history.back();' . PHP_EOL;
            } else if($url == 'close') {
                $output .= 'window.close();' . PHP_EOL;
            } else {
                if ($is_href === true) {
                    $output .= 'location.href = "' . $url . '";' . PHP_EOL;
                } else {
                    $output .= 'location.replace("' . $url . '");' . PHP_EOL;
                }
            }
        }
        $output .= '</script>' . PHP_EOL;

        echo($output);
        exit(1);
    }
}

if (!function_exists('login_check_inner_script')) {
    /**
     * javascript 내 로그인 여부 적용
     * @param string $msg  - 경고 메세지
     * @param string $move - 로그인 페이지로 이동여부 : Y 이동
     */
    function login_check_inner_script($msg='', $move='')
    {
        if (sess_data('is_login') !== true) {
            $output = '';
            if (empty($msg) === false) {
                $output .= 'alert("' . $msg . '");' . PHP_EOL;
            }

            if ($move === 'Y') {
                $output .= 'location.href = "' . app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www') . '";' . PHP_EOL;
            }

            if(empty($msg) === false || empty($move) === false) {
                $output .= 'return;';
            }
            echo($output);
        }
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
        return strpos($haystack, $needle) === false ? $haystack : substr($haystack, 0, strpos($haystack, $needle));
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
        return strpos($haystack, $needle) === false ? $haystack : substr($haystack, strpos($haystack, $needle) + strlen($needle));
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