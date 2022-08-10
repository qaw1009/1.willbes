<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'mode' => 'real',
    'test' => [
        'mid' => 'tvivarepublica',
        'client_key' => 'test_ck_D5GePWvyJnrK0W0k6q8gLzN97Eoq',
        'secret_key' => 'test_sk_zXLkKEypNArWmo50nX3lmeaxYG5R',
        'mert_key' => '9fd0de8489b4dc4af0dc40459958cd70',
        'success_method' => 'returns',
        'fail_method' => 'returns',
        'close_method' => 'close',
        'deposit_method' => 'deposit',
        'window_target' => 'iframe',    // iframe, self
        'card_max_installment' => '12',
        'escrow_delivery_regist_url' => 'https://pgweb.tosspayments.com:9091/pg/wmp/testadmin/jsp/escrow/rcvdlvinfo.jsp',
    ],
    'real' => [
        'mid' => '',
        'client_key' => '',
        'secret_key' => '',
        'mert_key' => '',
        'success_method' => 'returns',
        'fail_method' => 'returns',
        'close_method' => 'close',
        'deposit_method' => 'deposit',
        'window_target' => 'iframe',    // iframe, self
        'card_max_installment' => '12',
        'escrow_delivery_regist_url' => 'https://pgweb.tosspayments.com/pg/wmp/mertadmin/jsp/escrow/rcvdlvinfo.jsp',
    ],
    'view_path' => [
        'request' => 'pg/toss/request_form'
    ],
    'pay_method' => [
        '604001' => '카드',           // CARD
        '604002' => '계좌이체',     // TRANSFER
        '604003' => '가상계좌',     // VIRTUAL_ACCOUNT
        '604004' => '휴대폰',      // MOBILE_PHONE
    ],
    'pay_method_re' => [
        '카드' => 'Card',
        '간편결제' => 'ECard',
        '계좌이체' => 'Bank',
        '가상계좌' => 'VBank',
        '휴대폰' => 'Mobile',
    ],
    'delivery_comp' => [
        '606001' => 'CJ',   // 대한통운
        '606002' => 'HJ',   // 한진택배
    ],
    'allow_vbank_ip' => [
        '13.124.18.147', '13.124.108.35', '3.36.173.151', '3.38.81.32'
    ]
];
