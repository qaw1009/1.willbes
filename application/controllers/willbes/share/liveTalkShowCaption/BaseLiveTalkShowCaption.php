<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseLiveTalkShowCaption extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $arr_input = [];

        $this->load->view('liveTalkShowCaption/index', [
            'arr_input' => $arr_input
        ]);
    }
}