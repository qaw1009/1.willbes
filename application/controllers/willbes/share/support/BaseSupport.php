<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseSupport extends \app\controllers\FrontController
{
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function download()
    {
        $file_path = $this->_reqG('path');
        $file_name = $this->_reqG('name');
        public_download($file_path, $file_name);
    }


}