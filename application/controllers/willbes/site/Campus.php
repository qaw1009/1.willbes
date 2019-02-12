<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function show($params = [])
    {
        $campus_code = element('code', $params);


    }
}