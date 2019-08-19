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
        //empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = get_var(config_app('CateCode'), config_app('DefCateCode'));
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = config_app('CateCode');

        return '<script src="' . front_app_url('/banner/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . rawurlencode($section) . '&css_class=' . rawurlencode($css_class) . '&set_class=' . rawurlencode($set_class), 'www') . '"></script>';
    }
}

if (!function_exists('banner_html')) {
    /**
     * 배너 HTML 리턴
     * @param $data
     * @param string $rolling_class
     * @param string $a_class
     * @param bool $is_desc
     * @return string
     */
    function banner_html($data, $rolling_class = '', $a_class = '', $is_desc = false)
    {
        $html = '';
        $rolling_start = '';
        $rolling_end = '';
        
        if (empty($data) === true) {
            return $html;
        }

        if ($data[0]['DispTypeCcd'] != '664002' || count($data) === 1) {
            $rolling_class = '';
        } else {
            empty($rolling_class) === true && $rolling_class = 'slider';
        }

        if ($data[0]['DispTypeCcd'] == '664003') {
            // 랜덤 노출일 경우
            shuffle($data);
        }

        // 롤링 class 있을 경우
        if (empty($rolling_class) === false) {
            $rolling_start = '<div class="' . $rolling_class . '">';
            $rolling_end = '</div>';
        } else {
            $end_banner = end($data);
            unset($data);
            $data[0] = $end_banner;
        }

        foreach ($data as $row) {
            $banner_img = '<img src="' . $row['BannerFullPath'] . $row['BannerImgName'] . '" alt="' . $row['BannerName'] . '">';
            $a_start = '';
            $a_end = '';

            if(empty($row['LinkUrl']) === false && $row['LinkUrl'] != '#') {
                if ($row['LinkType'] == 'layer') {
                    $link_url = app_to_env_url($row['LinkUrl']) . '/event/popupRegistCreateByBanner?banner_idx=' . $row['BIdx'];
                    $a_start = '<a href="#none" onclick="event_layer_popup(\'' . $link_url . '\');" class="' . $a_class . '">';
                    $a_end = '</a><div id="APPLYPASS" class="willbes-Layer-Black"></div>';
                } else {
                    $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                    $a_end = '</a>';

                    if ($row['LinkType'] == 'popup') {
                        $a_start = '<a href="#none" onclick="popupOpen(\'' . $link_url . '\', \'_bn_pop_' . $row['BIdx'] . '\', \'' . $row['PopWidth'] . '\', \'' . $row['PopHeight'] . '\', null, null, \'no\', \'no\');" class="' . $a_class . '">';
                    } else {
                        $a_start = '<a href="' . $link_url . '" target="_' . $row['LinkType'] . '" class="' . $a_class . '">';
                    }
                }
            }

            $html .= '<div>' . $a_start . $banner_img . $a_end . '</div>';

            if ($is_desc === true) {
                $html .= '<p>' . $row['BannerName'] . '</p>' . $row['Desc'];
            }
        }

        return $rolling_start . $html . $rolling_end;
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
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = get_var(config_app('CateCode'), config_app('DefCateCode'));

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
