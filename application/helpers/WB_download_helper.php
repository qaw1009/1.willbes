<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('public_download')) {
    /**
     * public url 경로의 파일 다운로드
     * @param string $public_url [public url 경로]
     * @param string $filename [다운로드 파일명]
     * @param	bool $set_mime [파일명의 확장자로 MIME TYPE을 지정할지 여부]
     * @return void
     */
    function public_download($public_url = '', $filename = '', $set_mime = false)
    {
        if (empty($public_url) === true) {
            return;
        }

        $_CI =& get_instance();
        $_CI->load->helper('file');

        // 파일 실제경로
        $real_file_path = public_to_upload_path($public_url);

        // 파일 다운로드
        empty($filename) === true ? force_download($real_file_path, null, $set_mime) : rename_download($real_file_path, $filename, $set_mime);
    }
}

if (!function_exists('rename_download')) {
    /**
     * 지정한 파일명으로 다운로드
     * @param	string	$filepath [다운로드 파일 실제 경로]
     * @param	string	$filename [다운로드 파일명]
     * @param	bool $set_mime [파일명의 확장자로 MIME TYPE을 지정할지 여부]
     * @return	void
     */
    function rename_download($filepath = '', $filename = '', $set_mime = false)
    {
        if ($filepath === '' || $filename === '') {
            return;
        }

        if (!@is_file($filepath) || ($filesize = @filesize($filepath)) === false) {
            return;
        }

        // Set the default MIME type to send
        $mime = 'application/octet-stream';

        $x = explode('.', $filename);
        $extension = end($x);

        if ($set_mime === true) {
            if (count($x) === 1 || $extension === '') {
                /* If we're going to detect the MIME type,
                 * we'll need a file extension.
                 */
                return;
            }

            // Load the mime types
            $mimes =& get_mimes();

            // Only change the default MIME if we can find one
            if (isset($mimes[$extension])) {
                $mime = is_array($mimes[$extension]) ? $mimes[$extension][0] : $mimes[$extension];
            }
        }

        /* It was reported that browsers on Android 2.1 (and possibly older as well)
         * need to have the filename extension upper-cased in order to be able to
         * download it.
         *
         * Reference: http://digiblog.de/2011/04/19/android-and-the-download-file-headers/
         */
        $add_disposition = '';
        if (count($x) !== 1 && isset($_SERVER['HTTP_USER_AGENT']))
        {
            if (preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT'])) {
                $x[count($x) - 1] = strtoupper($extension);
                $filename = implode('.', $x);
            }

            if(!preg_match('/iPhone*/', $_SERVER['HTTP_USER_AGENT'])
                && !preg_match('/iPad*/', $_SERVER['HTTP_USER_AGENT'])
                && !preg_match('/iPod Touch*/', $_SERVER['HTTP_USER_AGENT'])
                && !preg_match('/Macintosh*/', $_SERVER['HTTP_USER_AGENT'])) {
                /**
                1. Edge 특정버전, Android 파이어폭스, Android app, IOS 사파리, IOS 크롬 등에서 한글파일명이 깨지는것을 방지하기 위한 로직. 이것 때문에 그외 다른 환경에서 문제가 될시 삭제 필요.
                2. IOS 사파리에서 UA가 Macintosh로 나와서 Mac과 구분 불가능. Macintosh 조건으로 IOS 사파리는 개선되지만 Mac 크롬, Mac 파이어폭스는 여전히 한글 깨짐. 추후 다른 방법이 있다면 개선 필요.
                 */
                $add_disposition = '; filename*=utf-8\'\''. rawurlencode($filename) .';';
            }
        }

        if (($fp = @fopen($filepath, 'rb')) === false) {
            return;
        }

        // Clean output buffer
        if (ob_get_level() !== 0 && @ob_end_clean() === false) {
            @ob_clean();
        }

        // Generate the server headers
        header('Content-Type: '.$mime);
//        header('Content-Disposition: attachment; filename="'.iconv('UTF-8','EUC-KR', $filename).'"');
//        header('Content-Disposition: attachment; filename="'. iconv('UTF-8', 'EUC-KR', $filename) .'"; filename*=utf-8\'\''. rawurlencode($filename) .';');
//        header('Content-Disposition: attachment; filename="'. iconv('UTF-8', 'EUC-KR', $filename) .'"' . $add_disposition);
        header('Content-Disposition: attachment; filename="'.rawurlencode($filename).'"');
        header('Expires: 0');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: '.$filesize);
        header('Cache-Control: private, no-transform, no-store, must-revalidate');

        // Flush 1MB chunks of data
        while (!feof($fp) && ($data = fread($fp, 1048576)) !== false) {
            echo $data;
        }

        fclose($fp);
        exit;
    }
}
