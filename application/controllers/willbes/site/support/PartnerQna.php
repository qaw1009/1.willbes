<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportQna.php';

class PartnerQna extends SupportQna
{
    protected $_bm_idx = '115';       //bmidx : 윌스토리 -> 업무제휴문의 게시판
    protected $_default_path = '/support/partnerQna';

    public function __construct()
    {
        parent::__construct();
    }
}