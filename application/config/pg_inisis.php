<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'mode' => 'test',
    'test' => [
        'mid' => 'INIpayTest',
        'signkey' => 'SU5JTElURV9UUklQTEVERVNfS0VZU1RS',
        'adminkey' => '1111',
        'version' => '1.0',
        'currency' => 'WON',
        'language' => 'ko',
        'charset' => 'UTF-8',
        'format' => 'JSON',
        'view_type' => 'overlay',
        'close_method' => 'close',
        'popup_method' => 'popup',
        'return_method' => 'returns',
        'card_nointerest' => '',
        'card_quotabase' => '',
        'script_src' => 'https://stgstdpay.inicis.com/stdjs/INIStdPay.js'
    ],
    'real' => [
        'mid' => '',
        'signkey' => 'azZidWxyK2w2NStsd3dJcHlIZDh1dz09',
        'adminkey' => '1111',
        'version' => '1.0',
        'currency' => 'WON',
        'language' => 'ko',
        'charset' => 'UTF-8',
        'format' => 'JSON',
        'view_type' => 'overlay',
        'close_method' => 'close',
        'popup_method' => 'popup',
        'return_method' => 'returns',
        'card_nointerest' => '',
        'card_quotabase' => '',
        'script_src' => 'https://stdpay.inicis.com/stdjs/INIStdPay.js'
    ],
    'view_path' => [
        'request' => 'pg/inisis/request_form'
    ],
    'pay_method' => [
        '604001' => 'Card',
        '604002' => 'DirectBank',
        '604003' => 'VBank',
        '604004' => 'HPP',
    ],
    'allow_vbank_ip' => [
        '203.238.37.3', '203.238.37.15', '203.238.37.16', '203.238.37.25', '39.115.212.9'
    ],
    'receipt_url' => 'https://iniweb.inicis.com/mall/cr/cm/mCmReceipt_head.jsp?noMethod=1&noTid={{$tid$}}'
];
