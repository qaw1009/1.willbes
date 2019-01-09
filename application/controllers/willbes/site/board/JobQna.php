<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class JobQna extends SupportQna
{
    protected $_bm_idx = '94';       //bmidx : 인적성/면담상담게시판
    protected $_default_path = '/board/jobQna';

    public function __construct()
    {
        parent::__construct();
    }
}