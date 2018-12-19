<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfTpass.php';

class Tpass extends SupportProfTpass
{
    protected $_bm_idx = '87';       //bmidx : 강사게시판 -> T-pass
    protected $_default_path = '/prof/tpass';

    public function __construct()
    {
        parent::__construct();
    }

}