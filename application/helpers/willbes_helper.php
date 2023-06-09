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
     * @param string $campus_code
     * @return string
     */
    function banner($section, $css_class = '', $site_code = '', $cate_code = '', $set_class = '', $campus_code = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        //empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = get_var(config_app('CateCode'), config_app('DefCateCode'));
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = config_app('CateCode');

        return '<script src="' . front_app_url('/banner/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . rawurlencode($section) . '&css_class=' . rawurlencode($css_class) . '&set_class=' . rawurlencode($set_class), 'www') . '&campus_code=' . $campus_code . '"></script>';
    }
}

if (!function_exists('banner_html')) {
    /**
     * 배너 HTML 리턴
     * @param $data
     * @param string $rolling_class
     * @param string $a_class
     * @param false $is_desc
     * @param string $view_html
     * @param string $view_html_class
     * @param string $title_class
     * @param false $top_title 상단 배너명
     * @param false $bottom_title 하단 배너명
     * @param false $banner_group 배너그룹
     * @return string
     */
    function banner_html($data, $rolling_class = '', $a_class = '', $is_desc = false
        , $view_html = '', $view_html_class = '', $title_class = '', $top_title = false, $bottom_title = false, $banner_group = false)
    {
        $html = '';
        $rolling_start = '';
        $rolling_end = '';
        $rolling_id = '';
        $rolling_script = '';
        
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
            // 배너노출섹션 롤링 대기시간 적용 class 앞부분 '_' 추가
            if(substr($rolling_class,0,1) == '_') {
                // 롤링방식
                $arr_rolling_type = ['665001' => 'bSlider', '665002' => 'cSlider', '665003' => 'nSlider', '665004' => 'vSlider', '_num' => 'numSlider'];

                $rolling_class_chop = substr($rolling_class,0,4);
                if($rolling_class_chop == '_num') {
                    // 기본가로형 => 페이징가로형 변경 
                    $rolling_key = $rolling_class_chop;
                } else {
                    $rolling_key = $data[0]['DispRollingTypeCcd'];
                }
                $rolling_type = element($rolling_key, $arr_rolling_type);
                $rolling_time = element('DispRollingTime', $data[0], 3);

                $rolling_script = '<script>';
                $rolling_script .= '$(function() {';
                $rolling_script .= 'slider("' . $rolling_class . '", "' . $rolling_type . '", "' . $rolling_time . '")';
                $rolling_script .= '});';
                $rolling_script .= '</script>';

                $rolling_id = $rolling_class;
            }

            $rolling_start = '<div class="' . $rolling_class . '" id="' . $rolling_id . '">';
            $rolling_end = '</div>';
        } else {
            $end_banner = end($data);
            unset($data);
            $data[0] = $end_banner;
        }

        $map_data = '';
        foreach ($data as $row) {
            $add_span_open = '';
            $add_span_close = '';
            $a_start = '';
            $a_end = '';
            $tag_html = '';

            if ($row['IsUseViewHtml'] == 'Y') {
                $add_span_open = '<span>';
                $add_span_close = '</span>';
            }
            $banner_img = $add_span_open.'<img src="' . $row['BannerFullPath'] . $row['BannerImgName'] . '" alt="' . $row['BannerName'] . '" usemap="#BannerImgMap' . $row['BIdx'] . '">'.$add_span_close;

            if(empty($row['LinkUrl']) === false && $row['LinkUrl'] != '#') {
                if ($row['LinkType'] == 'layer') {
                    $link_url = app_to_env_url($row['LinkUrl']) . '/event/popupRegistCreateByBanner?banner_idx=' . $row['BIdx'];
                    $a_start = $tag_html.'<a href="#none" onclick="event_layer_popup(\'' . $link_url . '\');" class="' . $a_class . '">';
                    $a_end = '</a><div id="APPLYPASS" class="willbes-Layer-Black"></div>';

                } else if ($row['LinkType'] == 'youtube') {
                    $link_url = $row['LinkUrl'];
                    $a_start = $tag_html.'<a href="javascript:void(0);" class="' . $a_class . ' btnYoutubeLayerBox" data-youtube-code="'.$link_url.'">';
                    $a_end = '</a>';

                } else {
                    $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                    $a_end = '</a>';

                    if ($row['LinkType'] == 'popup') {
                        $a_start = $tag_html.'<a href="#none" onclick="popupOpen(\'' . $link_url . '\', \'_bn_pop_' . $row['BIdx'] . '\', \'' . $row['PopWidth'] . '\', \'' . $row['PopHeight'] . '\', null, null, \'no\', \'no\');" class="' . $a_class . '">';
                    } else {
                        $a_start = $tag_html.'<a href="' . $link_url . '" target="_' . $row['LinkType'] . '" class="' . $a_class . '">';
                    }
                }
            } else {
                $a_start = '<a href="javascript:void(0);">';
                $a_end = '</a>';
            }
            $a_start .= ($row['IsUseViewHtml'] == 'Y') ? $row['ViewHtml'] : '';

            if (empty($row['BannerImgMapData']) === false) {
                $map_data .= "<map name='BannerImgMap{$row['BIdx']}' id='BannerImgMap{$row['BIdx']}'>";
                $arr_img_map_data = json_decode($row['BannerImgMapData'], true);
                foreach ($arr_img_map_data as $map_row) {
                    $map_link = "href='#none'";
                    if (empty($map_row['LinkUrl']) === false && $map_row['LinkUrl'] != '#') {
                        if ($map_row['LinkUrlType'] == 'J') {
                            $map_link .= ' onclick="'.$map_row['LinkUrl'].'"';
                        } else {
                            if ($row['LinkType'] == 'layer') {
                                $set_map_link_url = app_to_env_url($map_row['LinkUrl']) . '/event/popupRegistCreateByBanner?banner_idx=' . $row['BIdx'];
                                $map_link .= ' onclick="event_layer_popup(\'' . $set_map_link_url . '\');"';
                            } else {
                                $set_map_link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($map_row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                                if ($row['LinkType'] == 'popup') {
                                    $map_link .= ' onclick="popupOpen(\'' . $set_map_link_url . '\');"';
                                } else {
                                    $map_link = 'href="' . $set_map_link_url . '" target=' . $row['LinkType'];
                                }
                            }
                        }
                    }
                    $map_data .= "<area shape='{$map_row['ImgType']}' coords='{$map_row['ImgArea']}' {$map_link} style='cursor: hand'/>";
                }
                $map_data .= '</map>';
            }

            if ($top_title === true) {
                $a_start .= '<div class="tag">'.$row['BannerName'].'</div>'.$a_start;
            }

            if ($banner_group === true) {
                $html .= '<div class="banner-group">';
            }
            if(empty($view_html) === false) {
                if($view_html == 'none') {
                    $html .= $a_start . $banner_img . $a_end;
                } else {
                    $html .= '<' . $view_html . ' class="' . (empty($view_html_class) === false ? $view_html_class : '' ) . '" >' . $a_start . $banner_img . $a_end . '</' . $view_html . '>';
                }
            } else {
                // div 기본
                $html .= '<div class="' . (empty($view_html_class) === false ? $view_html_class : '' ) . '">' . $a_start . $banner_img . $a_end . '</div>';
            }
            if ($is_desc === true) {
                $html .= '<p>' . $row['BannerName'] . '</p>' . $row['Desc'];
            }
            if (empty($title_class) === false) {
                $html .= '<div class="' . $title_class . '">' . $row['BannerName'] . '</div>';
            }

            if ($bottom_title === true) {
                $html = $html.'<p>'.$row['BannerName'].'</p>';
            }
            if ($banner_group === true) {
                $html .= '</div>';
            }
        }
        return $rolling_start . $html . $rolling_end . $map_data . $rolling_script;
    }
}

if (!function_exists('popup')) {
    /**
     * 팝업 script 리턴
     * @param string $section
     * @param string $site_code
     * @param string $cate_code
     * @param string $campus_ccd
     * @param string $prof_idx
     * @return string
     */
    function popup($section, $site_code = '', $cate_code = '', $campus_ccd = '', $prof_idx = '')
    {
        empty($site_code) === true && $site_code = config_app('SiteCode');
        empty($cate_code) === true && strlen($cate_code) < 1 && $cate_code = get_var(config_app('CateCode'), config_app('DefCateCode'));

        return '<script src="' . front_app_url('/popup/show/?site_code=' . $site_code . '&cate_code=' . $cate_code . '&section=' . $section . '&campus_ccd=' . $campus_ccd  . '&prof_idx=' . $prof_idx, 'www') . '"></script>';
    }
}

if (!function_exists('login_check_inner_script')) {
    /**
     * javascript 내 로그인 여부 적용
     * @param string $msg  - 경고 메세지
     * @param string $move - 로그인 페이지로 이동여부 : Y 이동
     * @param string $rtn_url - 리턴 url
     */
    function login_check_inner_script($msg='', $move='', $rtn_url='')
    {
        if (sess_data('is_login') !== true) {
            $output = '';
            if (empty($msg) === false) {
                $output .= 'alert("' . $msg . '");' . PHP_EOL;
            }

            if ($move === 'Y') {
                if (empty($rtn_url) === false) {
                    $output .= 'location.href = "' . app_url('/member/login/?rtnUrl=' . rawurlencode($rtn_url), 'www') . '";' . PHP_EOL;
                }else{
                    $output .= 'location.href = "' . app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www') . '";' . PHP_EOL;
                }
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

if(!function_exists('isMobile')) {
    /**
     * 사용자 환경이 모바일인지
     * @return bool
     */
    function isMobile()
    {
        $_CI =& get_instance();
        $_CI->load->library('user_agent');
        return $_CI->agent->is_mobile();
    }
}

if(!function_exists('get_ck_recent_products')) {
    /**
     * 최근 본 상품 쿠키값 리턴
     * @return array
     */
    function get_ck_recent_products()
    {
        return get_arr_var(json_decode(base64_decode(get_cookie('recent_vw_products')), true), []);
    }
}
