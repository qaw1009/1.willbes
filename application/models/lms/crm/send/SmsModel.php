<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmsModel extends WB_Model
{
    private $_table = 'lms_crm_send_sms';
    private $_table_r_send_info = 'lms_crm_send_r_all_content';
    private $_table_sys_admin = 'wbs_sys_admin';
    private $_table_sys_site = 'lms_site';

    public function __construct()
    {
        parent::__construct('lms');
    }

    public function listSms($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = '
                SMS.SendIdx, SMS.SiteCode, SMS.SendGroupTypeCcd, SMS.SendPatternCcd, SMS.SendTypeCcd, SMS.SendOptionCcd, SMS.SendStatusCcd,
                SMS.CsTel, SMS.Content, SMS.SendDatm, SMS.RegDatm, SMS.RegAdminIdx,
                LS.SiteName
                ADMIN.wRegAdminName
            ';
            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = "
            FROM {$this->_table} as SMS
            LEFT OUTER JOIN {$this->_table_sys_site} as LS ON SMS.SiteCode = LS.SiteCode
            LEFT OUTER JOIN {$this->_table_sys_admin} as ADMIN ON SMS.RegAdminIdx = ADMIN.wAdminIdx AND ADMIN.wIsStatus='Y'
        ";

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    public function addSms($input)
    {

    }
}