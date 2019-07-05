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
