<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/business/calc/BaseCalc.php';

class Lecture extends BaseCalc
{
    public function __construct()
    {
        parent::__construct('lecture', '온라인강좌', 'LE', 'N');
    }
}
