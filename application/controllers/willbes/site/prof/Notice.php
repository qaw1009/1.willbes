<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportProfNotice.php';

class Notice extends SupportProfNotice
{
    protected $_bm_idx = '63';       //bmidx : notice 게시판
    protected $_default_path = '/prof';

    public function __construct()
    {
        parent::__construct();
    }

}