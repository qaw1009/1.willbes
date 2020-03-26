<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStatsModel extends WB_Model
{
    protected $_table = [
        'base_date' => 'vw_sys_base_date',
        'code' => 'lms_sys_code',
        'member' => 'lms_member',
        'member_other' => 'lms_member_otherinfo',
        'member_out' => 'lms_member_out_log',
        'member_login' => 'lms_member_login_log',

        'order' => 'lms_order',
        'order_product' => 'lms_order_product',
        'order_refund' => 'lms_order_product_refund',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }
}