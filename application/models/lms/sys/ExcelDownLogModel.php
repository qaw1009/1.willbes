<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelDownLogModel extends WB_Model
{
    private $_table = [
        'down_log' => 'lms_sys_download_log',
        'admin' => 'wbs_sys_admin',
        'code' => 'lms_sys_code',
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 엑셀 다운로드 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listDownLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                a.*
                ,b.wAdminId,b.wAdminName
                ,c.CcdName,c.CcdValue,c.CcdDesc
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['down_log'] . ' as a 
                left join ' . $this->_table['admin'] . ' as b on a.RegAdminIdx = b.wAdminIdx and b.wIsStatus=\'Y\'
                join ' . $this->_table['code'] . ' as c on a.DownloadTypeCcd = c.Ccd and c.IsStatus=\'Y\'
        ';


        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
