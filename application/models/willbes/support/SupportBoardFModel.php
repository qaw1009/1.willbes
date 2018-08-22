<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/willbes/support/BaseSupportFModel.php';

class SupportBoardFModel extends BaseSupportFModel
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * FAQ 구분 값 추출
     */
    public function listFaqCcd()
    {
        $arr_condition = [
        ];
        $column = 'A.Ccd, A.GroupCcd, A.CcdName, B.subFaqData';

        $from  = '
            from 
                lms_sys_code A
                left outer join
                    (
                        SELECT 
                        GroupCcd,
                        CONCAT(\'[\', GROUP_CONCAT(JSON_OBJECT(
                                \'GroupCcd\', GroupCcd,
                                \'Ccd\', Ccd,
                                \'CcdName\', CcdName
                            )), \']\') AS subFaqData
                        FROM lms_sys_code 
                        WHERE CcdDesc=\'faq_use\' AND GroupCcd != 0 AND IsStatus=\'Y\' AND IsUse = \'Y\'  
                        GROUP BY GroupCcd
                        order by OrderNum ASC
                    ) B on A.Ccd = B.GroupCcd
            WHERE 
            A.CcdDesc=\'faq_use\' and A.GroupCcd=0 AND A.IsStatus=\'Y\' AND A.IsUse = \'Y\' 
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }

    /**
     * 게시판 글 목록 추출
     */
    public function listBoard($is_count, $arr_condition = [], $column = null, $limit = null, $offset = null, $order_by = [])
    {

        $column = ($is_count === true) ? $is_count :  $column;
        $result = $this->_conn->getListResult($this->_table['board'], $column, $arr_condition, $limit, $offset, $order_by);
        //echo $this->_conn->last_query();
        return $result;
    }

}