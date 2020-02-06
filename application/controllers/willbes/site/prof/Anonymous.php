<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfAnonymous.php';

class Anonymous extends SupportProfAnonymous
{
    protected $_bm_idx = '111';       //bmidx : Anonymous 게시판
    protected $_default_path = '/prof/anonymous';

    public function __construct()
    {
        parent::__construct();
    }

}