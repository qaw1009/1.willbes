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

        /*광고*/
        'gateway_cont' => 'lms_gateway_contract',
        'gateway' => 'lms_gateway',
        'gateway_log' => 'lms_gateway_access_log',

    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function _setDateDiffCheck($arr_input)
    {
        if(diff_days($arr_input['search_end_date'],$arr_input['search_start_date']) > 730) { //2년이 넘어갈경우 년단위로 변환
            return '%Y';
        }else if(diff_days($arr_input['search_end_date'],$arr_input['search_start_date']) > 93) { //3달이 넘어갈경우 월단위로 변환
            return '%Y-%m';
        } else {
            return null;
        }
    }
}