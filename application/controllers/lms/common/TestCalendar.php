<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestCalendar extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * TEST 기간 달력
     */
    public function index($params = [])
    {
        $this->load->view('common/_test_calendar', []);
    }
}