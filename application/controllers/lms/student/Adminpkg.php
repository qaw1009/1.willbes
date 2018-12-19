<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Adminpkg extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('adminpkg');
    }
}