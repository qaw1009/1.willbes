<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseSales.php';

class MockTestSales extends BaseSales
{
    public function __construct()
    {
        parent::__construct('mockTest', '모의고사', ['mock_regi'], ['응시형태', '응시지역']);
    }
}
