<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/calc/BaseCalcSM.php';

class LectureStudSM extends BaseCalcSM
{
    public function __construct()
    {
        parent::__construct('lectureStudSM', '인강');
    }
}
