<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/pass/readingRoom/BaseSearchReadingRoom.php';

class SearchReadingRoom extends BaseSearchReadingRoom
{
    protected $models = array('sys/site', 'sys/code', 'pass/readingRoom');
    protected $helpers = array();
    protected $mang_type = 'R';

    public function __construct()
    {
        parent::__construct();
    }
}