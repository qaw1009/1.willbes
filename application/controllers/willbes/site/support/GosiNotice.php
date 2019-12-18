<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportNotice.php';

class GosiNotice extends SupportNotice
{
    protected $_bm_idx = '108';       //bmidx : GosiNotice 게시판
    protected $_default_path = '/support/gosiNotice';

    public function __construct()
    {
        parent::__construct();
    }

}