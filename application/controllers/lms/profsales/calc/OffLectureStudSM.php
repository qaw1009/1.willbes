<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/calc/BaseCalcSM.php';

class OffLectureStudSM extends BaseCalcSM
{
    public function __construct()
    {
        parent::__construct('offLectureStudSM', '직강');
    }
}
