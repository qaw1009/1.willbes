<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_auth_branch_ccd')) {
    /**
     * 제휴사 관리자 지점공통코드 리턴 (true일 경우 전체지점 조회 가능)
     * @return bool|string
     */
    function get_auth_branch_ccd()
    {
        $_CI =& get_instance();
        $sess_auth_branch_ccd = array_get($_CI->session->userdata('btob.admin_auth_data'), 'Role.AuthBranchCcd', '999999');

        return $sess_auth_branch_ccd == 'A' ? true : $sess_auth_branch_ccd;
    }
}

if (!function_exists('get_auth_role_type')) {
    /**
     * 제휴사 관리자 역할구분 리턴
     * @return mixed
     */
    function get_auth_role_type()
    {
        $_CI =& get_instance();
        return array_get($_CI->session->userdata('btob.admin_auth_data'), 'Role.RoleType');
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