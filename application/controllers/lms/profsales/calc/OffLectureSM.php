<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/calc/BaseCalcSM.php';

class OffLectureSM extends BaseCalcSM
{
    public function __construct()
    {
        parent::__construct('offLectureSM', '직강');
    }
}
