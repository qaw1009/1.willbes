<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_w_sys_admin')) {
    /**
     * 시스템관리자 여부 리턴
     */
    function is_w_sys_admin()
    {
        return array_get(sess_data('admin_auth_data'), 'Role.IsSysRole', false);
    }
}
