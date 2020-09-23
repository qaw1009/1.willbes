<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/classroom/BaseSchedule.php';

class Schedule extends BaseSchedule
{
    protected $_bm_idx = '82';  // 학원게시판 => 강의실배정표
    protected $_default_path = '/board/schedule';

    public function __construct()
    {
        parent::__construct();
    }
}