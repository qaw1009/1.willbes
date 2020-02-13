<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends \app\controllers\FrontController
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
        var_dump('unit test controller method')
    }

    public function test()
    {
        $cnt = count($arr);
        var_dump($cnt);
    }
}
