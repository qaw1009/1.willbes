<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OffLecture extends \app\controllers\FrontController
{
    protected $models = array('product/baseProductF', 'product/lectureF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }
}
