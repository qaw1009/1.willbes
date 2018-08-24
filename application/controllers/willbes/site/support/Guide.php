<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/supportguide.php';

class Guide extends SupportGuide
{
    public function __construct()
    {
        parent::__construct();
    }
}