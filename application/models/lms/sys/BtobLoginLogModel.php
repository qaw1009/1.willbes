<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobLoginLogModel extends WB_Model
{
    private $_table = [
        'btob_admin_login_log' => 'lms_btob_admin_login_log',
        'btob_admin_role' => 'lms_btob_admin_role',
        'btob_admin' => 'lms_btob_admin',
        'btob_code' => 'lms_btob_code',
        'btob' => 'lms_btob',
        'wcode' => 'wbs_sys_code'
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 제휴사 로그인 로그 목록 조회
     * @param $is_count
     * @param array $arr_condition
     * @param null $limit
     * @param null $offset
     * @param array $order_by
     * @return mixed
     */
    public function listBtobLoginLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $column = 'count(*) AS numrows';
            $order_by_offset_limit = '';
        } else {
            $column = 'LogIdx, AdminId, AdminName, LoginDatm, LoginIp, IsLogin, LoginLogCcd, LoginLogCcdName, IsUse
                , BtobIdx, BtobId, BtobName, RoleName, RoleType, AdminAreaCcdName, AdminBranchCcdName';

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from (
                select BL.LogIdx, BL.AdminId, BL.LoginDatm, BL.LoginIp, BL.IsLogin, BL.LoginLogCcd, WCL.wCcdValue as LoginLogCcdName
                    , ifnull(BL.BtobIdx, BA.BtobIdx) as BtobIdx, ifnull(B1.BtobId, B2.BtobId) as BtobId, ifnull(B1.BtobName, B2.BtobName) as BtobName
                    , ifnull(BA.AdminName, "비운영자") as AdminName, BA.IsUse
                    , BR.RoleName, BR.RoleType
                    , ifnull(CAA.CcdValue, "") as AdminAreaCcdName, ifnull(CAB.CcdValue, "") as AdminBranchCcdName                    
                from ' . $this->_table['btob_admin_login_log'] . ' as BL
                    left join ' . $this->_table['btob_admin'] . ' as BA
                        on BL.AdminId = BA.AdminId
                    left join ' . $this->_table['btob'] . ' as B1
                        on BA.BtobIdx = B1.BtobIdx
                    left join ' . $this->_table['btob'] . ' as B2
                        on BL.BtobIdx = B2.BtobIdx		
                    left join ' . $this->_table['btob_admin_role'] . ' as BR
                        on BA.RoleIdx = BR.RoleIdx and BR.IsStatus = "Y"
                    left join ' . $this->_table['btob_code'] . ' as CAA
                        on BA.AdminAreaCcd = CAA.Ccd and CAA.IsStatus = "Y"		
                    left join ' . $this->_table['btob_code'] . ' as CAB
                        on BA.AdminBranchCcd = CAB.Ccd and CAB.IsStatus = "Y"
                    left join ' . $this->_table['wcode'] . ' as WCL
                        on BL.LoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y"                        
            ) as U                        
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . $from . $where . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
