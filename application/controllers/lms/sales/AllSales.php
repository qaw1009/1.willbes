<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseSales.php';

class AllSales extends BaseSales
{
    public function __construct()
    {
        parent::__construct('all', '전체');
    }
}
