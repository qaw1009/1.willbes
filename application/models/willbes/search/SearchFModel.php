<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/product/ProductFModel.php';

class SearchFModel extends ProductFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 검색 실행 및 결과 리턴 : 데이터, 쿼리
     * @param $learn_pattern
     * @param $column
     * @param $arr_condition
     * @param $order_by
     * @param $result_data
     * @param $exec_query
     */
    public function findSearchProduct($learn_pattern, $column, $arr_condition, $order_by, &$result_data, &$exec_query)
    {
        $result_data = $this->listSalesProduct($learn_pattern, $column, $arr_condition, null,null, $order_by, '');
        //$this->_conn->save_queries = TRUE;
        $exec_query = $this->_conn->last_query();
    }

    /**
     * 검색 실행 결과 로그 저장
     * @param array $log_data
     * @return array|bool
     */
    public function saveSearchLog($log_data=[])
    {
        $this->load->library('user_agent');

        $save_data = array_merge($log_data, [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'ReferInfo' => get_var($this->input->server('HTTP_REFERER'), null),
                'UserPlatform' => $this->agent->platform(),
                'UserAgent' => substr($this->agent->agent_string(),0,199),
                'UserIp' => $this->input->ip_address(),
                'SessId' => $this->session->userdata('make_sessionid'),
        ]);

        try {
            if ($this->_conn->set($save_data)->insert('lms_search_log') === false) {
                throw new \Exception('로그 저장에 실패했습니다.');
            }
        } catch(\Exception $e) {
            return error_result($e);
        }
        return true;
    }

}
