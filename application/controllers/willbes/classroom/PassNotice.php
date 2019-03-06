<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportNotice.php';

class PassNotice extends SupportNotice
{
    protected $_bm_idx = '99';       //bmidx : 기간제패키지 공지사항
    protected $_default_path = '/classroom/passNotice';

    public function __construct()
    {
        parent::__construct();
    }
}