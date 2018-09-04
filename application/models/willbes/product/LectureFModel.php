<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/product/ProductFModel.php';

class LectureFModel extends ProductFModel
{
    public function __construct()
    {
        parent::__construct();
    }
}
