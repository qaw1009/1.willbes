<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('public_download')) {
    /**
     * public url 경로의 파일 다운로드
     * @param string $public_url
     * @return void
     */
    function public_download($public_url = '')
    {
        if (empty($public_url) === true) {
            return;
        }

        $_CI =& get_instance();
        $_CI->load->helper('file');

        // 파일 실제경로
        $real_file_path = public_to_upload_path($public_url);

        // 파일 다운로드
        force_download($real_file_path, null);
    }
}