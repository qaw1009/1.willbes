<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSupport extends \app\controllers\FrontController
{
    protected $helpers = array('download');

    public function __construct()
    {
        parent::__construct();
    }

    public function download($fileinfo=[])
    {
        public_download($fileinfo[0],$fileinfo[1]);
    }


}