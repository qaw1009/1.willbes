<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/site/marketing/CommonStat.php';
class GatewayStat extends CommonStat
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->GatewayIndex();
    }
}
