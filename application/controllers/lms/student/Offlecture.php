<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Offlecture extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('offlecture');
    }
}