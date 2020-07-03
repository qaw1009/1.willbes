<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportExamErrata.php';

class ExamErrata extends SupportExamErrata
{
    protected $_bm_idx = '114';       //bmidx : 윌스토리 -> 정오표/추록 게시판
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }
}