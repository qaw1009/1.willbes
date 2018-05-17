<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends \app\controllers\BaseController
{
    protected $models = array('sys/code', 'sys/site', 'crm/send/sms');
    protected $helpers = array();

    private $_send_type = 'mail';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo '1';
    }
}