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
    }

    /**
     * REST API Response
     * @param bool $is_success 성공 여부 (true/false)
     * @param string $ret_msg 리턴 메시지
     * @param array $ret_data 리턴 데이터
     * @param int $http_code HTTP status code
     */
    public function api_result($is_success, $ret_msg = '', $ret_data = [], $http_code = _HTTP_OK)
    {
        return $this->response([
            $this->config->item('rest_status_field_name') => $is_success,
            $this->config->item('rest_message_field_name') => $ret_msg,
            $this->config->item('rest_http_code_field_name') => $http_code,
            $this->config->item('rest_data_field_name') => $ret_data
        ], $http_code);
    }

    /**
     * REST API Success Response
     * @param string $succ_msg 성공 메시지
     * @param array $succ_data 리턴 데이터
     */
    public function api_success($succ_msg = '', $succ_data = [])
    {
        empty($succ_msg) === true && $succ_msg = $this->lang->line('text_rest_success_msg');
        return $this->api_result(true, $succ_msg, $succ_data, _HTTP_OK);
    }

    /**
     * REST API Error Response
     * @param string $err_msg 에러 메시지
     * @param array $err_data 에러 데이터
     * @param int $http_code HTTP status code
     */
    public function api_error($err_msg = '', $err_data = [], $http_code = _HTTP_ERROR)
    {
        empty($err_msg) === true && $err_msg = $this->lang->line('text_rest_error_msg');
        return $this->api_result(false, $err_msg, $err_data, $http_code);
    }

    /**
     * REST API URI Param Error Response
     * @param null $err_data
     */
    public function api_param_error($err_data = null)
    {
        return $this->api_error('필수 파라미터 오류입니다.', $err_data, _HTTP_BAD_REQUEST);
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
            $this->api_error($this->lang->line('text_rest_validation_error'), $this->form_validation->error_array(), _HTTP_VALIDATION_ERROR);
        }

        return true;
    }
}
