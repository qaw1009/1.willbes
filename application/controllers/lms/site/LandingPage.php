<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 약관동의 인덱스
     */
    public function index()
    {

    }

    /**
     * 약관동의 등록
     */
    public function create()
    {
        $this->load->view("site/landingPage/create", [
        ]);
    }
}