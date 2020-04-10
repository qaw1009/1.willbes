<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsMember extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['718']);
        $this->load->view('stats/member/index',[
            'code_interest' => $codes['718'],
        ]);
    }
}