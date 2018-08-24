<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/supportregulation.php';

class Regulation extends SupportRegulation
{
    public function __construct()
    {
        parent::__construct();
    }
}