<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportStudyComment.php';

class StudyComment extends SupportStudyComment
{
    protected $_bm_idx = 85;

    public function __construct()
    {
        parent::__construct();
    }
}