<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportRemote.php';

class Remote extends SupportRemote
{
    public function __construct()
    {
        parent::__construct();
    }
}