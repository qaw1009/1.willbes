<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportPredictNotice.php';

class PredictNotice extends SupportPredictNotice
{
    protected $_bm_idx = '102';             //bmidx : 합격예측 공지 게시판
    protected $_event_bm_idx = '106';       //bmidx : 이벤트 공지 게시판
    protected $_default_path = '/support/predictNotice';

    public function __construct()
    {
        parent::__construct();
    }
}