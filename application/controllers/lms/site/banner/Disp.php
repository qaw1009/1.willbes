<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disp extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo '1';
    }
}