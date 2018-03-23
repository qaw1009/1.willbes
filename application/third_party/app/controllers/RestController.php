<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/restserver/libraries/REST_Controller.php';

class RestController extends \restserver\libraries\REST_Controller
{
    use InitController;

    public function __construct()
    {
        parent::__construct();

        $this->_init();

        // 프로파일러 disabled
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(false);
        }
    }
}