<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportAnonymous.php';

class Anonymous extends SupportAnonymous
{
    protected $_bm_idx = '112';       //bmidx : Anonymous 게시판
    protected $_default_path = '/board/anonymous';

    public function __construct()
    {
        parent::__construct();
    }

}