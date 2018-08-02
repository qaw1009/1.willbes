<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('banner')) {
    /**
     * 배너 script 리턴
     * @param string $section
     * @param string $site_code
     * @param string $cate_code
     * @return string
     */
    function banner($section, $site_code = '', $cate_code = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        empty($cate_code) === true && $cate_code = config_app('CateCode');

        return '<script src="' . app_url('/banner/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . rawurlencode($section), 'www') . '"></script>';
    }
}