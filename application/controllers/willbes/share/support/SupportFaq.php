<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/basesupport.php';

class SupportFaq extends BaseSupport
{
    protected $models = array('support/supportBoardF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {
        $faq_ccd = $this->supportBoardFModel->listFaqCcd();

        foreach ($faq_ccd as $idx=>$row) {
            $faq_ccd[$idx]['subFaqData']  = json_decode($row['subFaqData'], true);
        }

        $list = [];

        $s_faq = '625';
        $s_sub_faq = '624001';

        $this->load->view('support/faq', [
            'faq_ccd' => $faq_ccd,
            's_faq' => $s_faq,
            'list'=>$list
        ]);
    }



}