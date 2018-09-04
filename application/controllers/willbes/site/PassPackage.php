<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PassPackage extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/packageF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    private $_learn_pattern = '';  //기간제 패지키
}
