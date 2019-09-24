<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'mode' => 'real',
    'test' => [
        'mid' => 'INIpayTest',
        'type' => 'web',
        'charset' => 'utf8',
        'next_method' => 'returns',
        'noti_method' => 'notiMobile',
        'return_method' => 'nothingMobile',
        'cancel_method' => 'nothingMobile',
        'card_quotabase' => '02:03:04:05:06:07:08:09:10:11:12',
        'option' => 'twotrs_isp=Y&block_isp=Y&twotrs_isp_noti=N&twotrs_bank=Y&ismart_use_sign=Y&vbank_receipt=Y&bank_receipt=N&apprun_check=Y',
        'request_url' => 'https://mobile.inicis.com/smart/'
    ],
    'real' => [
        'mid' => '',
        'type' => 'web',
        'charset' => 'utf8',
        'next_method' => 'returns',
        'noti_method' => 'notiMobile',
        'return_method' => 'nothingMobile',
        'cancel_method' => 'nothingMobile',
        'card_quotabase' => '02:03:04:05:06:07:08:09:10:11:12',
        'option' => 'twotrs_isp=Y&block_isp=Y&twotrs_isp_noti=N&twotrs_bank=Y&ismart_use_sign=Y&vbank_receipt=Y&bank_receipt=N&apprun_check=Y',
        'request_url' => 'https://mobile.inicis.com/smart/'
    ],
    'view_path' => [
        'request' => 'pg/inisis/request_form_mobile'
    ],
    'pay_method' => [
        '604001' => 'wcard',
        '604002' => 'bank',
        '604003' => 'vbank',
        '604004' => 'mobile',
    ],
    'allow_ip' => [
        '203.238.37.15', '118.129.210.25', '183.109.71.153'
    ],
    'receipt_url' => 'https://iniweb.inicis.com/mall/cr/cm/mCmReceipt_head.jsp?noMethod=1&noTid={{$tid$}}'
];
