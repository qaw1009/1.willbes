<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/restserver/libraries/REST_Controller.php';

class RestController extends \app\restserver\libraries\REST_Controller
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

    /**
     * api parameter validation check
     * @param array $rules
     * @param string $format
     * @return bool
     */
    public function validate($rules = array(), $format = 'json')
    {
        $this->load->library('form_validation');
        $rule_fields = array_fill_keys(array_pluck($rules, 'field'), '');
        $method = $this->input->method();

        $this->form_validation->set_data(array_replace($rule_fields, $this->{$method}()));
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            $this->response($this->form_validation->error_array(), _HTTP_VALIDATION_ERROR);
            return false;
        }

        return true;
    }
}