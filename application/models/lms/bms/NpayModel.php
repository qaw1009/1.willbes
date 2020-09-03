<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayModel extends WB_Model
{
    private $_table = [
        'log' => 'lms_npay_api_log'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 네이버페이 연동로그 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return array|int
     */
    public function listNpayLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = $is_count;

        if (is_bool($is_count) === true && $is_count === false) {
            $column = 'ApiLogIdx, ApiType, ApiPattern, ApiParams, AppDevice, MemIdx, SessId, ResultCode, ResultMsg, RegDatm, RegIp';
        }

        return $this->_conn->getListResult($this->_table['log'], $column, $arr_condition, $limit, $offset, $order_by);
    }
}
