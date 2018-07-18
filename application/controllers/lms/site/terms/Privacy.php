<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 개인정보처리방침 인덱스
     */
    public function index()
    {

    }

    /**
     * 개인정보처리방침 등록
     */
    public function create()
    {
        $this->load->view("site/terms/privacy/create", [
        ]);
    }
}