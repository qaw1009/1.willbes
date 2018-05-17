<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageModel extends WB_Model
{
    private $_table = 'lms_crm_send';
    private $_table_r_send_receive = 'lms_crm_send_r_receive_message';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';
    private $_table_member = 'lms_member';
    private $_table_member_otherinfo = 'lms_membr_otherinfo';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listMessage($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                MSG.SendIdx, MSG.SiteCode, MSG.SendPatternCcd, MSG.SendTypeCcd, MSG.SendOptionCcd, MSG.SendStatusCcd, MSG.CsTel,
                CONCAT(LEFT(MSG.Content, 20), IF (CHAR_LENGTH(MSG.Content) > 20, " ...", "") ) as Content,
                MSG.SendDatm, MSG.RegDatm, MSG.RegAdminIdx,
                LS.SiteName, ADMIN.wAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as MSG
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON MSG.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON MSG.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}