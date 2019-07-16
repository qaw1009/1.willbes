<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/business/calc/BaseCalc.php';

class OffLecture extends BaseCalc
{
    public function __construct()
    {
        parent::__construct('offLecture', '학원강좌', 'OL', 'Y');
    }
}
