<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class FrontController extends BaseController
{
    use InitController;

    public function __construct()
    {
        parent::__construct();

        $this->_init();

        // 프로파일러 실행
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(true);
        }
    }
}
