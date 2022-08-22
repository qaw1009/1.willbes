<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SysLogModel extends WB_Model
{
    private $_table = [
        'admin_r_admin_role' => 'lms_sys_admin_r_admin_role',
        'admin_role' => 'lms_sys_admin_role',
        'admin_r_site_campus' => 'lms_sys_admin_r_site_campus',
        'site' => 'lms_site',
        'code' => 'lms_sys_code',
        'admin' => 'wbs_sys_admin',
    ];    

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 운영자 권한 변경 로그 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAdminRoleChangeLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $in_column = 'count(0) AS numrows';
            $column = 'numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'AR.ArIdx, AR.wAdminIdx, AR.RoleIdx, AR.IsStatus, AR.RegDatm, AR.RegAdminIdx, AR.RegIp, AR.UpdDatm, AR.UpdAdminIdx
                , A.wAdminId, A.wAdminName
                , fn_mask(A.wAdminId, "id", "Y") as wAdminIdMask
                , R.RoleName
                , RA.wAdminId as RegAdminId, RA.wAdminName as RegAdminName	
                , UA.wAdminId as UpdAdminId, UA.wAdminName as UpdAdminName
                , if(AR.IsStatus = "Y", "활성", "비활성") as IsActive                        
            ';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin_r_admin_role'] . ' as AR
                inner join ' . $this->_table['admin'] . ' as A
                    on AR.wAdminIdx = A.wAdminIdx
                inner join ' . $this->_table['admin_role'] . ' as R
                    on AR.RoleIdx = R.RoleIdx
                inner join ' . $this->_table['admin'] . ' as RA
                    on AR.RegAdminIdx = RA.wAdminIdx
                left join ' . $this->_table['admin'] . ' as UA
                    on AR.UpdAdminIdx = UA.wAdminIdx and AR.UpdAdminIdx is not null
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 사이트 캠퍼스 권한변경 로그 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listAdminSiteCampusChangeLog($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $in_column = 'count(0) AS numrows';
            $column = 'numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'SC.AsIdx, SC.wAdminIdx, SC.SiteCode, SC.CampusCcd, SC.IsStatus, SC.RegDatm, SC.RegAdminIdx, SC.RegIp, SC.UpdDatm, SC.UpdAdminIdx
                , A.wAdminId, A.wAdminName
                , fn_mask(A.wAdminId, "id", "Y") as wAdminIdMask
                , S.SiteName
                , CCA.CcdName as CampusCcdName
                , RA.wAdminId as RegAdminId, RA.wAdminName as RegAdminName	
                , UA.wAdminId as UpdAdminId, UA.wAdminName as UpdAdminName
                , if(SC.IsStatus = "Y", "활성", "비활성") as IsActive                        
            ';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin_r_site_campus'] . ' as SC
                inner join ' . $this->_table['admin'] . ' as A
                    on SC.wAdminIdx = A.wAdminIdx
                inner join ' . $this->_table['site'] . ' as S
                    on SC.SiteCode = S.SiteCode
                left join ' . $this->_table['code'] . ' as CCA
                    on SC.CampusCcd = CCA.Ccd and CCA.IsStatus = "Y"
                inner join ' . $this->_table['admin'] . ' as RA
                    on SC.RegAdminIdx = RA.wAdminIdx
                left join ' . $this->_table['admin'] . ' as UA
                    on SC.UpdAdminIdx = UA.wAdminIdx and SC.UpdAdminIdx is not null
        ';

        $where = $this->_conn->makeWhere($arr_condition);
        $where = $where->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }
}
