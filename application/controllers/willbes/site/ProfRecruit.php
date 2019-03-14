<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfRecruit extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $_view_path = $this->_site_code;
        $this->load->view('site/profrecruit/show_'. $_view_path, [
        ]);
    }
}