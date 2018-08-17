<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSupport extends \app\controllers\FrontController
{
    protected $models = array('support/baseSupportF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

}