<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WB_Email extends CI_Email
{
    public function __construct(array $config = array())
    {
        parent::__construct($config);

        // 보내는 메일주소 설정
        $this->from(element('mail_from_address', $config, 'willbes@willbes.com'), element('mail_from_name', $config, '윌비스'));
    }
}