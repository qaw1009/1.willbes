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

    ],
    'view_path' => [
        'request' => 'pg/inisis/request_form'
    ],
    'pay_method' => [
        '604001' => 'Card',
        '604002' => 'DirectBank',
        '604003' => 'VBank',
        '604004' => 'HPP',
    ]
];
