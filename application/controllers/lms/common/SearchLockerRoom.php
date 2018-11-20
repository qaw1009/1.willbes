<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pass/readingRoom/BaseSearchReadingRoom.php';

class SearchLockerRoom extends BaseSearchReadingRoom
{
    protected $models = array('sys/site', 'sys/code', 'pass/readingRoom');
    protected $helpers = array();
    protected $mang_type = 'L';

    public function __construct()
    {
        parent::__construct();
    }
}