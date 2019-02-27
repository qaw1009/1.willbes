<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/business/advance/BaseAdvance.php';

class OffLecture extends BaseAdvance
{
    public function __construct()
    {
        parent::__construct('offLecture', '학원강좌');
    }
}
