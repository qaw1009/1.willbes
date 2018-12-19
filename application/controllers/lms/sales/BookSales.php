<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseSales.php';

class BookSales extends BaseSales
{
    public function __construct()
    {
        parent::__construct('book', '교재');
    }
}
