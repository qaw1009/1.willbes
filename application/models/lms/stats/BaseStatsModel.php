<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStatsModel extends WB_Model
{
    protected $_table = [
        /*공통*/
        'base_date' => 'vw_sys_base_date',
        'code' => 'lms_sys_code',
        'category' => 'lms_sys_category',
        'willbes_ip' => 'lms_willbes_ip',

        /*공통-사이트*/
        'site' => 'lms_site',
        'site_group' => 'lms_site_group',

        /*회원*/
        'member' => 'lms_member',
        'member_other' => 'lms_member_otherinfo',
        'member_out' => 'lms_member_out_log',
        'member_login' => 'lms_member_login_log',

        /*주문*/
        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_refund' => 'lms_order_product_refund',

        /*검색*/
        'search_log' => 'lms_search_log',

        /*배너*/
        'banner' => 'lms_banner',
        'banner_log' => 'lms_banner_access_log',

    ];

    public function __construct()
    {
        parent::__construct('lms');
    }
}