<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseSupportFModel extends WB_Model
{
    protected $_table = [
        'board' => 'vw_board as b'
        ,'board_qna' => 'vw_board_qna'
        ,'menu' => 'lms_site_menu'
        ,'code' => 'lms_sys_code'
    ];

    public function __construct()
    {
        parent::__construct('lms');
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
     * Campus 값 추출
     */
    public function listCampusCcd($site_code)
    {
        $arr_condition=[
            'EQ' => ['A.SiteCode'=>$site_code]
        ];

        $column = 'B.SiteCode,B.CampusCcd,C.CcdName';

        $from  = '
            from 
                lms_site A 
                join lms_site_r_campus B on A.SiteCode = B.SiteCode
                join lms_sys_code C on B.CampusCcd = C.Ccd 
            WHERE 
                A.IsCampus=\'Y\' and A.IsStatus=\'Y\' and B.IsStatus=\'Y\' and C.IsStatus=\'Y\' and C.IsUse=\'Y\'
        ';
        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(true);

        $order_by = ' order by C.OrderNum ASC';

        $query = $this->_conn->query('select ' . $column . $from . $where. $order_by);
        return $query->result_array();
    }

}