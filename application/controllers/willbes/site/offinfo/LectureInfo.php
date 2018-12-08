<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/support/SupportOffLectureInfo.php';

class LectureInfo extends SupportOffLectureInfo
{
    protected $_default_path = '/support';

    public function __construct()
    {
        parent::__construct();
    }

}