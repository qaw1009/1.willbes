<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobLoginModel extends WB_Model
{
    private $_table = [
        'btob_admin' => 'lms_btob_admin',
        'btob_admin_role' => 'lms_btob_admin_role',
        'btob_admin_login_log' => 'lms_btob_admin_login_log',
        'btob' => 'lms_btob',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 운영자 로그인 정보 조회
     * @param $admin_id
     * @param $admin_passwd
     * @return array
     */
    public function findAdminForLogin($admin_id, $admin_passwd)
    {
        $query = 'select A.AdminIdx, A.BtobIdx, A.RoleIdx, A.AdminId, A.AdminName, A.IsApproval, A.IsUse, ifnull(A.CertType, "") as CertType, ifnull(A.LastLoginIp, "") as LastLoginIp';
        $query .= '     , (select RoleType from ' . $this->_table['btob_admin_role'] . ' where RoleIdx = A.RoleIdx and IsUse = "Y" and IsStatus = "Y") as RoleType';
        $query .= ' from ' . $this->_table['btob_admin'] . ' as A';
        $query .= ' where A.AdminId = ? and A.AdminPasswd = fn_hash(?) and A.IsStatus = "Y"';

        $result = $this->_conn->query($query, [$admin_id, $admin_passwd]);

        return $result->row_array();
    }

    /**
     * LMS 운영자 식별자 조회
     * @return mixed
     */
    public function getLmsAdminIdx()
    {
        return element('wAdminIdx', $this->_conn->getFindResult($this->_table['admin'], 'wAdminIdx', ['EQ' => ['wAdminId' => 'btob_user']]), 0);
    }

    /**
     * 로그인 결과 저장
     * @param $admin_idx
     * @return array|bool
     */
    public function modifyAdminLoginInfo($admin_idx)
    {
        $this->_conn->trans_begin();

        try {
            // set
            $this->_conn->set('LastLoginIp', $this->input->ip_address())->set('LastLoginDatm', 'NOW()', false);

            // where 조건
            $this->_conn->where('AdminIdx', $admin_idx);

            // 데이터 수정
            if ($this->_conn->update($this->_table['btob_admin']) === false) {
                throw new \Exception('데이터 수정에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 최근 로그인 로그 목록 조회
     * @param array $arr_condition
     * @param null $limit
     * @return array
     */
    public function listTopLoginLog($arr_condition = [], $limit = null)
    {
        $column = 'LogIdx, AdminId, LoginDatm, LoginIp, IsLogin, LoginLogCcd';

        return $this->_conn->getListResult($this->_table['btob_admin_login_log'], $column, $arr_condition, $limit, 0, ['LogIdx' => 'desc']);
    }

    /**
     * 로그인 로그 저장
     * @param $admin_id
     * @param $log_ccd_name
     * @return bool|string
     */
    public function addLoginLog($admin_id, $log_ccd_name)
    {
        // 로그인 로그 공통코드
        $log_ccds = [
            'SUCCESS' => ['117001', 'Y'],
            'EX_SUCCESS' => ['117002', 'Y'],
            'NO_MATCH' => ['117003', 'N'],
            'NO_AUTH' => ['117004', 'N'],
            'CERT_FIRST_REQ' => ['117005', 'N'],
            'CERT_IP_REQ' => ['117006', 'N'],
            'CERT_SUCCESS' => ['117007', 'N'],
            'LOGOUT' =>  ['117008', 'N'],
        ];

        try {
            $data = [
                'AdminId' => get_var($admin_id, '_empty_id'),
                'LoginIp' => $this->input->ip_address(),
                'IsLogin' => $log_ccds[$log_ccd_name][1],
                'LoginLogCcd' => $log_ccds[$log_ccd_name][0]
            ];

            $this->_conn->set($data)->set('LoginDatm', 'NOW()', false);

            if ($this->_conn->insert($this->_table['btob_admin_login_log']) === false) {
                throw new \Exception('관리자 로그인 로그 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
