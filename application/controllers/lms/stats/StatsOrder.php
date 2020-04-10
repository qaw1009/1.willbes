<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/stats/BaseStats.php';

class StatsOrder extends BaseStats
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $codes = $this->codeModel->getCcdInArray(['604','636','669','670']);
        $this->load->view('stats/order/index',[
            'code_pay_method' => $codes['604'],
            'code_prod_type' => $codes['636'],
            'code_pay_channel' => $codes['669'],
            'code_pay_route' => (array_diff_key($codes['670'], array_flip(['670003', '670004']))),
        ]);
    }
}