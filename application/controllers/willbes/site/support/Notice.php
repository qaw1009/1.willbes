<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportNotice.php';

class Notice extends SupportNotice
{
    protected $_bm_idx = '45';       //bmidx : notice 게시판
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }

}