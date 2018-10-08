<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportExamNews.php';

class ExamNews extends SupportExamNews
{
    protected $_bm_idx = '57';       //bmidx : 수험정보 -> 수험뉴스 게시판
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }
}