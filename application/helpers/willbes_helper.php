<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('banner')) {
    /**
     * 배너 script 리턴
     * @param string $section
     * @param string $css_class
     * @param string $site_code
     * @param string $cate_code
     * @param string $set_class
     * @return string
     */
    function banner($section, $css_class = '', $site_code = '', $cate_code = '', $set_class = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = config_app('CateCode');

        return '<script src="' . front_app_url('/banner/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . rawurlencode($section) . '&css_class=' . rawurlencode($css_class) . '&set_class=' . rawurlencode($set_class), 'www') . '"></script>';
    }
}

if (!function_exists('popup')) {
    /**
     * 팝업 script 리턴
     * @param string $section
     * @param string $site_code
     * @param string $cate_code
     * @return string
     */
    function popup($section, $site_code = '', $cate_code = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = config_app('CateCode');

        return '<script src="' . app_url('/popup/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . $section, 'www') . '"></script>';
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

if (!function_exists('hpSubString')) {
    /**
     * 문자열 치환 함수
     * @param $string
     * @param $start
     * @param $length
     * @param $sing
     * @param null $charset
     * @return string
     */
    function hpSubString($string, $start, $length, $sing, $charset=NULL) {
        if($charset==NULL) {
            $charset = 'UTF-8';
        }
        $str_len=mb_strlen($string,'UTF-8');
        if($str_len>$length) {
            $string=mb_substr($string, $start, $length, $charset);
            $string.=$sing;
        }
        return $string;
    }
}
