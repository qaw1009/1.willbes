<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/restserver/libraries/REST_Controller.php';
require APPPATH . 'hooks/LogQueryHook.php';

abstract class RestController extends \restserver\libraries\REST_Controller
{
    use InitController;

    public function __construct()
    {
        parent::__construct();

        // 전역 초기화
        $this->_init();
        
        // REST API 초기화
        $this->_restInit();
    }

    public function __destruct()
    {
        parent::__destruct();

        // REST API는 별도로 동작하기 때문에 후킹이 되지 않음 => 수동 쿼리로그 저장 메소드 실행
        $query_log = new \LogQueryHook();
        $query_log->logQueries();
    }

    /**
     * REST API 초기화
     */
    private function _restInit()
    {
        // 프로파일러 disabled
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(false);
        }

        // load language helper
        $this->load->helper('language');
    }

    /**
     * REST API response
     * @param bool|string|int $ret_cd [리턴 결과 (true/false/code)]
     * @param string $ret_msg [리턴 메시지]
     * @param mixed $ret_data [리턴 데이터]
     * @param int $http_code [HTTP status code]
     * @return mixed|void
     */
    public function api_result($ret_cd, $ret_msg = '', $ret_data = [], $http_code = _HTTP_OK)
    {
        return $this->response([
            $this->config->item('rest_status_field_name') => $ret_cd,
            $this->config->item('rest_message_field_name') => $ret_msg,
            $this->config->item('rest_data_field_name') => $ret_data
        ], $http_code);
    }

    /**
     * REST API success response
     * @param mixed $succ_data [리턴 데이터]
     * @param string $succ_msg [성공 메시지]
     */
    public function api_success($succ_data = [], $succ_msg = '')
    {
        empty($succ_msg) === true && $succ_msg = lang('text_rest_success_msg');
        return $this->api_result(true, $succ_msg, $succ_data, _HTTP_OK);
    }

    /**
     * REST API error response
     * @param string $err_msg [에러 메시지]
     * @param int $err_code [에러 HTTP status code]
     * @param mixed $err_data [에러 데이터]
     */
    public function api_error($err_msg = '', $err_code = _HTTP_ERROR, $err_data = [])
    {
        empty($err_msg) === true && $err_msg = lang('text_rest_error_msg');
        return $this->api_result(false, $err_msg, $err_data, $err_code);
    }

    /**
     * REST API URI parameter error response
     * @param mixed $err_data [에러 데이터]
     */
    public function api_param_error($err_data = [])
    {
        return $this->api_error(lang('text_rest_validation_error'), _HTTP_VALIDATION_ERROR, $err_data);
    }

    /**
     * REST API parameter validation check
     * @param array $rules [validation rules]
     * @return bool
     */
    public function validate($rules = array())
    {
        $this->load->library('form_validation');
        $rule_fields = array_fill_keys(array_pluck($rules, 'field'), '');
        $method = $this->input->method();

        $this->form_validation->set_data(array_replace($rule_fields, $this->{$method}()));
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            $this->api_error(lang('text_rest_validation_error'), _HTTP_VALIDATION_ERROR, $this->form_validation->error_array());
            return false;
        }

        return true;
    }
}
