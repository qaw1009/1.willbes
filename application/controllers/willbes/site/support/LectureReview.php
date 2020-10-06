<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportLectureReview.php';

class LectureReview extends SupportLectureReview
{
    protected $_bm_idx = '85';       //bmidx : 수강평/합격수기관리 -> 수강후기
    protected $_default_path = '/support/LectureReview';

    public function __construct()
    {
        parent::__construct();
    }
}