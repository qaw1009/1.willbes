<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchaAnalysisModel extends WB_Model
{
    private $_table = [
        'searcha_analysis' => 'lsm_searcha_analysis',
        'site' => 'lms_site',
        'sys_category' => 'lms_sys_category'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 검색어관리
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAllSearchaAnalysis($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
            A.SaIdx, A.SiteCode, A.CateCode, A.SearchWord, A.FirstSearchDatm, A.LastSearchDatm, A.ReadCnt,
            B.SiteName, C.CateName
            ';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }
        $from = "
            FROM {$this->_table['searcha_analysis']} AS A
            INNER JOIN {$this->_table['site']} AS B ON A.SiteCode = B.SiteCode
            INNER JOIN {$this->_table['sys_category']} AS C ON A.CateCode = C.CateCode
        ";

        $arr_condition['IN']['A.SiteCode'] = get_auth_site_codes(false, true);
        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}