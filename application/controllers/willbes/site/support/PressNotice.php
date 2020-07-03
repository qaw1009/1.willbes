<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportNotice.php';

class PressNotice extends SupportNotice
{
    protected $_bm_idx = '113';       //bmidx : 윌스토리 -> 출판사 게시판
    protected $_default_path = '/support/pressnotice';

    public function __construct()
    {
        parent::__construct();
    }

}