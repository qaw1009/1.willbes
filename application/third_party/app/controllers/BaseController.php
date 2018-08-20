<?php
namespace app\controllers;

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class BaseController extends \CI_Controller
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
     * @param int $http_code
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
            ->set_output($this->format->{'to_' . $format}($data)
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
     * return API result
     * @param array $results
     * @param string $return_method
     * @param null $return_url
     * @return \CI_Output
     */
    public function api_to_result($results = [], $return_method = 'redirect', $return_url = null)
    {
        // rest config item
        $field_status = config_get('rest.rest_status_field_name');
        $field_msg = config_get('rest.rest_message_field_name');
        $field_data = config_get('rest.rest_data_field_name');

        if ($results[$field_status] === true) {
            if ($return_method == 'redirect') {
                redirect($return_url);
            } else {
                return $this->json_result(true, $results[$field_msg], null, $results[$field_data]);
            }
        } else {
            return $this->api_to_error($results, $return_method);
        }
    }

    /**
     * return API error
     * @param array $results
     * @param string $error_method
     * @return \CI_Output
     */
    public function api_to_error($results = [], $error_method = 'redirect')
    {
        // rest config item
        $field_uri = config_get('rest.rest_uri_field_name');
        $field_msg = config_get('rest.rest_message_field_name');
        $field_http_code = config_get('rest.rest_http_code_field_name');

        if ($error_method == 'redirect') {
            show_error($results[$field_msg], $results[$field_http_code], 'API Error - ' . element($field_uri, $results, $results[$field_http_code]));
        } else {
            return $this->json_error($results[$field_msg], $results[$field_http_code]);
        }
    }

    /**
     * return API get method data
     * @param array $results
     * @param string $error_method
     * @return array|\CI_Output
     */
    public function api_get_data($results = [], $error_method = 'redirect')
    {
        // rest config item
        $field_status = config_get('rest.rest_status_field_name');
        $field_data = config_get('rest.rest_data_field_name');

        if (isset($results[$field_status]) === true) {
            if ($results[$field_status] === true) {
                // use get method
                return $results[$field_data];
            } else {
                return $this->api_to_error($results, $error_method);
            }
        }
        // use getDataJson, getsDataJson
        return $results;
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

    /**
     * pagination 설정 및 값 리턴
     * @param string $base_url [페이징 링크 기본 URI]
     * @param int $total_rows   [전체 데이터 건수]
     * @param int $limit [페이지 당 노출될 데이터 건수]
     * @param int $show_page_num [노출되는 페이지 수]
     * @param bool $page_query_string [페이지 번호 query string 사용 여부]
     * @return array
     */
    public function pagination($base_url, $total_rows, $limit = 20, $show_page_num = 10, $page_query_string = true)
    {
        $this->load->library('pagination');

        // set pagination config
        $config['base_url'] = $base_url;    // 페이징 링크 기본 URI
        $config['total_rows'] = $total_rows;    // 전체 데이터 건수
        $config['per_page'] = $limit;   // 페이지 당 노출될 데이터 건수
        $config['fixed_page_num'] = $show_page_num;     // 노출되는 페이지 수

        if ($page_query_string === true) {
            $config['use_first_page_number'] = true;    // 첫번째 페이지 번호 사용 여부
            $config['page_query_string'] = true;    // 페이지 번호 query string 사용 여부
            $config['query_string_segment'] = 'page';   // 페이지 번호 get 파라미터 명
        } else {
            $config['uri_segment'] = substr_count($config['base_url'], '/');    // 페이지 번호가 위치한 세그먼트
        }

        // set pagination view config
        $config['full_tag_open'] = '<ul class="pagination mt5">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<span>처음</span>';  // &laquo;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<span>마지막</span>';  // &raquo;
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = '<span>이전</span>';   // &lsaquo;
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<span>다음</span>';   // &rsaquo;
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#none">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        // create pagination
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();

        $offset = 0;
        $rownum = 0;
        if ($config['total_rows'] > 0) {
            $offset = ($this->pagination->cur_page - 1) * $this->pagination->per_page;
            $rownum = $config['total_rows'] - $offset;
        }

        return [
            'pagination' => $pagination,
            'page' => $this->pagination->cur_page,
            'offset' => $offset,
            'limit' => $this->pagination->per_page,
            'rownum' => $rownum
        ];
    }
}
