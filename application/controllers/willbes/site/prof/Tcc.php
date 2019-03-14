<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfTcc.php';

class Tcc extends SupportProfTcc
{
    protected $_bm_idx = '101';       //bmidx : 강사게시판 -> TCC
    protected $_default_path = '/prof/tpass';

    public function __construct()
    {
        parent::__construct();
    }

}