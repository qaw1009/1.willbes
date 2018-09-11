<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class Qna extends SupportQna
{
    protected $_bm_idx = '48';       //bmidx : 상담게시판
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }
}