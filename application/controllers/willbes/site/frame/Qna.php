<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class Qna extends SupportQna
{
    protected $_bm_idx = '48';       //bmidx : notice 게시판
    protected $_default_path = '/frame/qna';

    public function __construct()
    {
        parent::__construct();
    }

}