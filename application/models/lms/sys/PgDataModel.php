<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PgDataModel extends WB_Model
{
    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * Pg 결제 내역 수집 목록
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listPay($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = ' 
                A.*
                ,E.SiteCode, E.SiteName, E.PgMid AS PgMid_Site
                ,B.OrderIdx,B.MemIdx,B.SiteCode AS Order_SiteCode, B.CompleteDatm
                ,C.OrderProdIdx, C.ProdCode, C.PayStatusCcd
                ,D.CcdName AS PaysStatusCcd_Name
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from lms_order_pg_data A
                LEFT JOIN lms_order B ON A.OrderNo = B.OrderNo 
                JOIN lms_order_product C ON B.OrderIdx = C.OrderIdx
                JOIN lms_sys_code D ON C.PayStatusCcd  = D.Ccd 
                JOIN lms_site E ON A.PgMid = E.PgMid 
            where A.PayStatus="완료"          
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);
        $query = $this->_conn->query('select ' . $column . $from . $where .$order_by_offset_limit);
        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}