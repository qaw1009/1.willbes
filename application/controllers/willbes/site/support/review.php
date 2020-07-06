<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportReview.php';

class Review extends SupportReview
{
    protected $_bm_idx = '91';       //bmidx : 수강평/합격수기관리 -> 합격수기
    protected $_default_path = '/support/review';

    public function __construct()
    {
        parent::__construct();
    }
}