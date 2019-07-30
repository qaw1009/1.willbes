<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_auth_site_codes')) {
    /**
     * 운영자 권한이 있는 사이트 코드 리턴
     * @param bool $is_with_name [코드명을 포함할지 여부, true : key = 사이트 코드, value = 코드명, false : value = 사이트 코드]
     * @param bool $is_intg_site_use [통합사이트 사용 여부, true = 사용]
     * @return array [사이트 코드 배열]
     */
    function get_auth_site_codes($is_with_name = false, $is_intg_site_use = false)
    {
        $_CI =& get_instance();
        $sess_auth_site_codes = element('Site', $_CI->session->userdata('admin_auth_data'), []);

        if ($is_intg_site_use === false) {
            // 통합사이트 코드 제외
            unset($sess_auth_site_codes[config_item('app_intg_site_code')]);
        }

        return $is_with_name === false ? array_keys($sess_auth_site_codes) : array_pluck($sess_auth_site_codes, 'SiteName', 'SiteCode');
    }
}

if (!function_exists('get_auth_on_off_site_codes')) {
    /**
     * 운영자 권한이 있는 온라인/학원 사이트 코드 리턴
     * @param string $is_off_site [학원 사이트 구분, Y => 학원 사이트, N => 온라인 사이트]
     * @param bool $is_with_name [코드명을 포함할지 여부, true : key = 사이트 코드, value = 코드명, false : value = 사이트 코드]
     * @param bool $is_intg_site_use [통합사이트 사용 여부, true = 사용]
     * @return array
     */
    function get_auth_on_off_site_codes($is_off_site = 'Y', $is_with_name = false, $is_intg_site_use = false)
    {
        $_CI =& get_instance();
        $sess_auth_site_codes = element('Site', $_CI->session->userdata('admin_auth_data'), []);
        $auth_site_codes = [];

        if ($is_intg_site_use === false) {
            // 통합사이트 코드 제외
            unset($sess_auth_site_codes[config_item('app_intg_site_code')]);
        }

        foreach ($sess_auth_site_codes as $site_code => $row) {
            if ($row['IsCampus'] == $is_off_site) {
                $auth_site_codes[$site_code] = $row;
            }
        }

        return $is_with_name === false ? array_keys($auth_site_codes) : array_pluck($auth_site_codes, 'SiteName', 'SiteCode');
    }
}

if (!function_exists('get_auth_campus_ccds')) {
    /**
     * 운영자 권한이 있는 사이트별 캠퍼스 코드 리턴
     * @param int $site_code [사이트 코드]
     * @param bool $is_with_name [캠퍼스명을 포함할지 여부, true : key = 캠퍼스 코드, value = 캠퍼스 명, false : value = 캠퍼스 코드]
     * @return array [캠퍼스 공통코드 배열]
     */
    function get_auth_campus_ccds($site_code, $is_with_name = false)
    {
        $_CI =& get_instance();
        $sess_auth_site_codes = element('Site', $_CI->session->userdata('admin_auth_data'), []);
        $sess_auth_campus_ccds = array_get($sess_auth_site_codes, $site_code . '.CampusCcds', []);

        return $is_with_name === false ? array_keys($sess_auth_campus_ccds) : $sess_auth_campus_ccds;
    }
}

if (!function_exists('get_auth_all_campus_ccds')) {
    /**
     * 운영자 권한이 있는 전체 캠퍼스 공통코드 리턴
     * @return array [사이트코드에 포함된 캠퍼스 공통코드 2차 배열]
     */
    function get_auth_all_campus_ccds()
    {
        $campus_auth_ccds = [];

        $_CI =& get_instance();
        $sess_auth_site_codes = element('Site', $_CI->session->userdata('admin_auth_data'), []);
        $sess_auth_campus_ccds = array_pluck($sess_auth_site_codes, 'CampusCcds', 'SiteCode');

        foreach ($sess_auth_campus_ccds as $site_key => $campus_codes) {
            foreach ($campus_codes as $key => $val) {
                $campus_auth_ccds[$site_key][] = $key;
            }
        }
        return $campus_auth_ccds;
    }
}

if (!function_exists('get_auth_all_unique_campus_ccds')) {
    /**
     * 사이트코드 구분없이 운영자 권한이 있는 전체 캠퍼스 공통코드 리턴 (중복제거)
     * @return array [사이트코드 구분없이 캠퍼스 공통코드 1차 배열]
     */
    function get_auth_all_unique_campus_ccds()
    {
        $campus_auth_ccds = [];

        $_CI =& get_instance();
        $sess_auth_site_codes = element('Site', $_CI->session->userdata('admin_auth_data'), []);
        $sess_auth_campus_ccds = array_pluck($sess_auth_site_codes, 'CampusCcds');

        foreach ($sess_auth_campus_ccds as $campus_codes) {
            if (empty($campus_codes) === false) {
                $campus_auth_ccds = array_merge($campus_auth_ccds, array_keys($campus_codes));
            }
        }

        return array_unique($campus_auth_ccds);
    }
}

if (!function_exists('html_site_select')) {
    /**
     * 사이트 select box HTML 리턴
     * @param string $site_code [선택될 사이트 코드]
     * @param string $ele_id [select box id]
     * @param string $ele_name [select box name]
     * @param string $class [select box에 추가되는 css class]
     * @param string $title [select box title]
     * @param string $required [select box required value]
     * @param string $disabled [select box disabled value]
     * @param bool $is_intg_site_use [통합사이트 사용 여부, true = 사용]
     * @param array $site_codes [사이트 코드 배열, 특정 사이트만 노출할 경우, ex) ['2001' => '온라인 경찰', '2002' => '경찰']
     * @return string [select box HTML]
     */
    function html_site_select($site_code = '', $ele_id = 'site_code', $ele_name = 'site_code', $class = '', $title = '운영 사이트', $required = 'required', $disabled = '', $is_intg_site_use = false, $site_codes = [])
    {
        // 운영자 권한이 있는 사이트 코드 목록
        empty($site_codes) === true && $site_codes = get_auth_site_codes(true, $is_intg_site_use);

        //
        $return_html = '<select class="form-control ' . $class . '" id="' . $ele_id . '" name="' . $ele_name . '" title="' . $title . '"';
        empty($required) === false && $return_html .= ' required="' . $required . '"';
        empty($disabled) === false && $return_html .= ' disabled="' . $disabled . '"';
        $return_html .= '>' . PHP_EOL;
        $return_html .= '<option value="">사이트선택</option>' . PHP_EOL;

        foreach ($site_codes as $key => $val) {
            $return_html .= '<option value="' . $key . '"' . (($key == $site_code) ? ' selected="selected"' : '') . '>' . $val . '</option>' . PHP_EOL;
        }

        $return_html .= '</select>' . PHP_EOL;

        return $return_html;
    }
}

if (!function_exists('html_site_tabs')) {
    /**
     * 사이트 탭 HTML 리턴 (사이트 코드 초기값 없음)
     * @param string $ele_id [element id]
     * @param string $tab_type [탭 구분 => tab : 탭, self : 링크]
     * @param bool $is_all_tab [전체 탭 노출 여부 => true : 노출, false : 노출안함]
     * @param array $tab_data [탭 우측에 표기되는 데이터, ex) 게시판 건수]
     * @param bool $is_intg_site_use [통합사이트 사용 여부, true = 사용]
     * @param array $site_codes [사이트 코드 배열, 특정 사이트만 노출할 경우, ex) ['2001' => '온라인 경찰', '2002' => '경찰']
     * @return string [탭 HTML]
     */
    function html_site_tabs($ele_id, $tab_type = 'tab', $is_all_tab = true, $tab_data = [], $is_intg_site_use = false, $site_codes = [])
    {
        return html_def_site_tabs('', $ele_id, $tab_type, $is_all_tab, $tab_data, $is_intg_site_use, $site_codes);
    }
}

if (!function_exists('html_def_site_tabs')) {
    /**
     * 사이트 탭 HTML 리턴
     * @param string $site_code [초기 사이트 코드값]
     * @param string $ele_id [element id]
     * @param string $tab_type [탭 구분 => tab : 탭, self : 링크]
     * @param bool $is_all_tab [전체 탭 노출 여부 => true : 노출, false : 노출안함]
     * @param array $tab_data [탭 우측에 표기되는 데이터, ex) 게시판 건수]
     * @param bool $is_intg_site_use [통합사이트 사용 여부, true = 사용]
     * @param array $site_codes [사이트 코드 배열, 특정 사이트만 노출할 경우, ex) ['2001' => '온라인 경찰', '2002' => '경찰']
     * @return string [탭 HTML]
     */
    function html_def_site_tabs($site_code = '', $ele_id, $tab_type = 'tab', $is_all_tab = true, $tab_data = [], $is_intg_site_use = false, $site_codes = [])
    {
        // 변수 설정
        $_CI =& get_instance();
        $qs = $_CI->input->server('QUERY_STRING');
        $site_code = (empty($site_code) === true) ? $_CI->input->get('site_code') : $site_code;

        $tab_attr = $tab_active = '';
        $tab_base_txt = count($tab_data) > 0 ? ' <span class="red">({{tab_data}})</span>' : '';
        $tab_base_url = '#none';

        // 운영자 권한이 있는 사이트 코드 목록
        empty($site_codes) === true && $site_codes = get_auth_site_codes(true, $is_intg_site_use);

        //
        if ($tab_type == 'tab') {
            $tab_attr = 'role="tab" data-toggle="tab"';
        } else {
            $tab_base_qs = preg_replace('/&?site_code=(\d*)/', '', $qs);
            $tab_base_url = './' . (empty($tab_base_qs) === true ? '?' : '?' . $tab_base_qs . '&') . 'site_code=';
        }

        //
        $return_html = '<ul id="' . $ele_id . '" class="tabs-site-code nav nav-tabs bar_tabs mt-30" role="tablist">' . PHP_EOL;

        // 전체 탭 추가
        if ($is_all_tab === true) {
            empty($site_code) === true && $tab_active = 'active';
            $tab_txt = str_replace('{{tab_data}}', element('all', $tab_data, 0), $tab_base_txt);
            $return_html .= '<li role="presentation" class="' . $tab_active . '"><a href="' . $tab_base_url . '" ' . $tab_attr . ' data-site-code=""><strong>전체</strong>' . $tab_txt . '</a></li>' . PHP_EOL;
        }

        // 사이트 코드 탭 추가
        foreach ($site_codes as $key => $val) {
            $tab_active = ($key == $site_code) ? 'active' : '';
            $tab_url = ($tab_type == 'tab') ? $tab_base_url : $tab_base_url . $key;
            $tab_txt = str_replace('{{tab_data}}', element($key, $tab_data, 0), $tab_base_txt);
            $return_html .= '<li role="presentation" class="' . $tab_active . '"><a href="' . $tab_url . '" ' . $tab_attr . ' data-site-code="' . $key . '"><strong>' . $val . '</strong>' . $tab_txt . '</a></li>' . PHP_EOL;
        }

        $return_html .= '</ul>' . PHP_EOL;

        return $return_html;
    }

    if (!function_exists('html_callback_num_select')) {
        /**
         * 발신번호 select box HTML 리턴
         * Ccd에 매핑된 발신번호 값(CcdValue) 가공처리
         * @param array $arr_send_callback_ccd  [발신번호 공통코드 배열 값]
         * @param string $value [selected 값]
         * @param string $ele_id [select box id]
         * @param string $ele_name [select box name]
         * @param string $class [select box에 추가되는 css class]
         * @param string $title [select box title]
         * @param string $required [select box required value]
         * @param string $disabled [select box disabled value]
         * @return string [select box HTML]
         */
        function html_callback_num_select($arr_send_callback_ccd = [], $value = '', $ele_id = 'send_tel', $ele_name = 'send_tel', $class = '', $title = '발신번호', $required = 'required', $disabled = '')
        {
            $return_html = '<select class="form-control ' . $class . '" id="' . $ele_id . '" name="' . $ele_name . '" title="' . $title . '"';
            empty($required) === false && $return_html .= ' required="' . $required . '"';
            empty($disabled) === false && $return_html .= ' disabled="' . $disabled . '"';
            $return_html .= '>' . PHP_EOL;
            $return_html .= '<option value="">발송번호선택</option>' . PHP_EOL;

            if (is_array($arr_send_callback_ccd) === true && empty($arr_send_callback_ccd) === false) {
                foreach ($arr_send_callback_ccd as $key => $val) {
                    $arr_temp_val = explode(':', $val);
                    $selected = ($arr_temp_val[1] == $value) ? 'selected = "selected"' : '';
                    $return_html .= "<option value='{$arr_temp_val[1]}' {$selected}>{$arr_temp_val[0]} ({$arr_temp_val[1]})</option>";
                }
            }

            $return_html .= '</select>' . PHP_EOL;

            return $return_html;
        }
    }
}