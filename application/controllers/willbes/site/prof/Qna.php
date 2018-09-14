<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class Qna extends SupportQna
{
    protected $_bm_idx = '66';       //bmidx : 강사게시판 -> 학습Q&A
    protected $_default_path = '/prof';

    public function __construct()
    {
        parent::__construct();
    }

}