<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecture extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo '단강좌 메인';
    }

    public function show()
    {
        echo '단강좌 상세';
    }    
}