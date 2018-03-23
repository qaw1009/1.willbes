<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email config
| -------------------------------------------------------------------------
*/
$config['protocol'] = 'sendmail'; // mail/sendmail/smtp
$config['smtp_host'] = '127.0.0.1';
$config['smtp_user'] = '';
$config['smtp_pass'] = '';
$config['smtp_port'] = '25';
$config['smtp_crypto'] = 'ssl'; // SMTP Encryption. Can be null, tls or ssl.
$config['mailtype'] = 'html';
$config['mail_from_name'] = '윌비스';  // 보내는 메일 이름
$config['mail_from_address'] = 'willbes@willbes.com';   // 보내는 메일 주소