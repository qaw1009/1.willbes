<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/business/advance/BaseAdvance.php';

class Lecture extends BaseAdvance
{
    public function __construct()
    {
        parent::__construct('lecture', '온라인강좌');
    }
}
