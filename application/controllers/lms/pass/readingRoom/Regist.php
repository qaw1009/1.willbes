<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 독서실등록관리 인덱스
     */
    public function index()
    {

    }

    public function modalTest()
    {
        $this->load->view("pass/reading_room/regist/modal_test", [
        ]);
    }
}