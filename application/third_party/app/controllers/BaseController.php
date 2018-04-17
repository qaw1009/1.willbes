<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends \CI_Controller
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

    /**
     * 컨트롤러 메소드에 배열 파라미터 전달
     * @param $method
     * @param array $params
     * @return mixed
     */
    public function _remap($method, $params = array())
    {
        // uri string parameter urldecode
        $params = array_map('urldecode', $params);

        if (method_exists($this, $method) === true) {
            return $this->{$method}($params);
        } else {
            show_404(strtolower(get_class($this)) . '/' . $method);
        }
    }

    /**
     * response output
     * @param $data
     * @param $http_code
     * @param string $format
     * @return \CI_Output
     */
    public function response($data, $http_code = _HTTP_OK, $format = 'json')
    {
        // 프로파일러 disabled
        if (config_item('enable_profiler') === true) {
            $this->output->enable_profiler(false);
        }

        $formats = [
            'json' => 'application/json',
            'html' => 'text/html',
            'php' => 'text/plain',
            'xml' => 'application/xml'
        ];

        $this->load->library('format');

        return $this->output
            ->set_content_type($formats[$format])
            ->set_status_header($http_code)
            ->set_output(
                $this->format->{'to_' . $format}($data)
            );
    }

    /**
     * return ajax error result
     * @param $err_msg
     * @param int $err_code
     * @return \CI_Output
     */
    public function json_error($err_msg, $err_code = _HTTP_ERROR)
    {
        return $this->json_result(false, '', [
            'ret_cd' => false, 'ret_msg' => $err_msg, 'ret_status' => $err_code
        ]);
    }

    /**
     * return ajax result
     * @param $ret_cd
     * @param string $succ_msg
     * @param array $err_data
     * @param array $return_data
     * @return \CI_Output
     */
    public function json_result($ret_cd, $succ_msg = '', $err_data = [], $return_data = [])
    {
        if ($ret_cd === true) {
            return $this->response([
                'ret_cd' => true,
                'ret_msg' => $succ_msg,
                'ret_data' => $return_data
            ], _HTTP_OK);
        } else {
            if (is_array($err_data) === false || count($err_data) < 1) {
                $err_data = [
                    'ret_cd' => false,
                    'ret_msg' => '에러가 발생하였습니다.',
                    'ret_status' => _HTTP_ERROR
                ];
            }

            return $this->response([
                'ret_cd' => $err_data['ret_cd'],
                'ret_msg' => $err_data['ret_msg'],
                'ret_data' => $return_data
            ], $err_data['ret_status']);
        }
    }

    /**
     * form validation check
     * @param array $rules
     * @param string $format
     * @return bool
     */
    public function validate($rules = array(), $format = 'json')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            if ($format == 'json') {
                $this->response($this->form_validation->error_array(), _HTTP_VALIDATION_ERROR);
            } else {
                $this->session->set_flashdata('form_errors', validation_errors());
                redirect(site_url($format));
            }

            return false;
        }

        return true;
    }
}
