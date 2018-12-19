<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportExamAnnouncement.php';

class ExamAnnouncement extends SupportExamAnnouncement
{
    protected $_bm_idx = '54';       //bmidx : 수험정보 -> 시험공고 게시판
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }
}