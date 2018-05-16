<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/message');
    protected $helpers = array();

    private $_send_type = 'message';

    // 메세지 발송 종류 (SMS,쪽지,메일)
    private $_send_type_ccd = [
        'sms' => '641001',
        'message' => '641002',
        'email' => '641003'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view("crm/message/index", [

        ]);
    }
}