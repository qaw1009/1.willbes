<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/business/calc/BaseCalc.php';

class MockTest extends BaseCalc
{
    public function __construct()
    {
        parent::__construct('mockTest', '모의고사', 'MT', 'Y');
    }
}
