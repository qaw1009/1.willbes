<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('banner')) {
    /**
     * 배너 script 리턴
     * @param string $section
     * @param string $css_class
     * @param string $site_code
     * @param string $cate_code
     * @return string
     */
    function banner($section, $css_class = '', $site_code = '', $cate_code = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        empty($cate_code) === true || strlen($cate_code) < 1 && $cate_code = config_app('CateCode');

        return '<script src="' . app_url('/banner/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . rawurlencode($section) . '&css_class=' . rawurlencode($css_class), 'www') . '"></script>';
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
