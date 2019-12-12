<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('public_to_upload_path')) {
    /**
     * public 경로에 해당하는 파일의 실제 경로 리턴
     * @param string $public_url
     * @return string
     */
    function public_to_upload_path($public_url = '')
    {
        if (empty($public_url) === true) {
            return '';
        }

        $_CI =& get_instance();
        $_CI->config->load('upload');

        // 파일 실제경로
        return $_CI->config->item('upload_path') . str_first_pos_after($public_url, $_CI->config->item('upload_url'));
    }
}

if (!function_exists('upload_path_to_public')) {
    /**
     * 파일의 실제 경로에 해당하는 public 경로 리턴
     * @param string $upload_path
     * @return string
     */
    function upload_path_to_public($upload_path = '')
    {
        if (empty($upload_path) === true) {
            return '';
        }

        $_CI =& get_instance();
        $_CI->config->load('upload');

        // 업로드 디렉토리명
        $upload_url = $_CI->config->item('upload_url');
        $upload_dir = DIRECTORY_SEPARATOR . str_first_pos_after($upload_url, PUBLICURL);

        // 파일 실제경로
        return $upload_url . str_first_pos_after($upload_path, $upload_dir);
    }
}