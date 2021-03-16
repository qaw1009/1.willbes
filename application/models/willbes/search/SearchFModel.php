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
     * 검색을 위한 사이트 목록 추출
     * @param $arr_condition
     */
    public function listSite($arr_condition) {
        $arr_condition = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        return $this->_conn->query('select SiteCode, SiteGroupCode, IsCampus '.' From lms_site where 1=1 '. $arr_condition . ' Order by SiteCode')->result_array();
    }

    /**
     * 검색 실행 및 결과 리턴 : 데이터, 쿼리
     * @param $learn_pattern
     * @param $column
     * @param $arr_condition
     * @param $order_by
     * @param null $limit
     * @return array|int
     */
    public function findSearchProduct($learn_pattern, $column, $arr_condition, $order_by, $limit=null)
    {
        $result_data = $this->listSalesProduct($learn_pattern, $column, $arr_condition, $limit,null, $order_by, '');
        return $result_data;
    }

    /**
     * 교재 검색 실행
     * @param $is_count
     * @param $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function findSearchBookStoreProduct($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $this->load->loadModels(['product/bookF']);
        $result_data = $this->bookFModel->listBookStoreProduct($is_count, $arr_condition, $limit, $offset, $order_by);
        return $result_data;
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
                'SiteType' => APP_DEVICE,
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
