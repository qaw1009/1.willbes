<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfQna.php';

class AssignmentQna extends SupportProfQna
{
    protected $_bm_idx = '119';       //bmidx : 강사게시판 -> 학습Q&A
    protected $_default_path = '/prof/assignmentQna';

    public function __construct()
    {
        parent::__construct();
    }

}