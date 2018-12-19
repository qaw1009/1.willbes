<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseAccess extends \app\controllers\FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $models = array('access/accessF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
}