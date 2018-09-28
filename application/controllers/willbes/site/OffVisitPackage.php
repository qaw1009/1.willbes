<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/site/OffPackage.php';

class OffVisitPackage extends OffPackage
{
    protected $auth_controller = true;

    public function __construct()
    {
        parent::__construct();
    }

}
