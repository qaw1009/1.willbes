<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PassPackage extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/passPackageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }
}
