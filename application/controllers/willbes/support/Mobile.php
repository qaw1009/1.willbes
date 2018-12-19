<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportMobile.php';

class Mobile extends SupportMobile
{
    public function __construct()
    {
        parent::__construct();
    }
}