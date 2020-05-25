<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsVisitor extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 방문자 통계 인덱스
     */
    public function index()
    {
        $this->load->view('stats/visitor/index', [
        ]);
    }
}
