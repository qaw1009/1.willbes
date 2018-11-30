<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends WB_Model
{
    private $_table = 'wbs_sys_admin';

    public function __construct()
    {
        parent::__construct(['wbs', 'lms']);
    }

    /**
     * 운영자 로그인 정보 조회
     * @param $admin_id
     * @param $admin_passwd
     * @return array
     */
    public function findAdminForLogin($admin_id, $admin_passwd)
    {
        $query = 'select wAdminIdx, wRoleIdx, wAdminId, wAdminName, wIsApproval, wIsUse, ifnull(wCertType, "") as wCertType, ifnull(wLastLoginIp, "") as wLastLoginIp';
        $query .= ' from ' . $this->_table;
        $query .= ' where wAdminId = ? and wAdminPasswd = fn_hash(?) and wIsStatus = "Y"';
        $result = $this->_conn->query($query, [$admin_id, $admin_passwd]);

        return $result->row_array();
    }

    /**
     * LMS 운영자 역할식별자 조회
     * @param $admin_idx
     * @return string
     */
    public function getLmsRoleIdx($admin_idx)
    {
        $arr_condition = [
            'EQ' => ['wAdminIdx' => $admin_idx, 'IsStatus' => 'Y']
        ];

        return get_var($this->lms->getFindResult('lms_sys_admin_r_admin_role', 'RoleIdx', $arr_condition)['RoleIdx'], 0);
    }

    /**
     * 운영자 본인 인증 결과 수정
     * @param string $cert_type
     * @param $admin_idx
     * @return array|bool
     */
    public function modifyAdminCertInfo($cert_type = 'Y', $admin_idx)
    {
        $this->_conn->trans_begin();

        try {
            $data = [
                'wCertType' => $cert_type,
                'wUpdAdminIdx' => $admin_idx,
                'wLastLoginIp' => $this->input->ip_address()
            ];
            $this->_conn->set($data)->set('wCertDatm', 'NOW()', false);

            // where 조건
            $this->_conn->where('wAdminIdx', $admin_idx);

            // 데이터 수정
            if ($this->_conn->update($this->_table) === false) {
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
     * 로그인 결과 저장
     * @param $admin_idx
     * @return array|bool
     */
    public function modifyAdminLoginInfo($admin_idx)
    {
        $this->_conn->trans_begin();

        try {
            // set
            $this->_conn->set('wLastLoginIp', $this->input->ip_address())->set('wLastLoginDatm', 'NOW()', false);

            // where 조건
            $this->_conn->where('wAdminIdx', $admin_idx);

            // 데이터 수정
            if ($this->_conn->update($this->_table) === false) {
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
            if (APP_NAME == 'lms') {
                $_table = 'lms_sys_admin_login_log';
                $prefix = '';
            } else {
                $_table = 'wbs_sys_admin_login_log';
                $prefix = 'w';
            }

            $data = [
                'wAdminId' => $admin_id,
                $prefix . 'LoginIp' => $this->input->ip_address(),
                $prefix . 'IsLogin' => $log_ccds[$log_ccd_name][1],
                $prefix . 'LoginLogCcd' => $log_ccds[$log_ccd_name][0]
            ];
            $this->{APP_NAME}->set($data)->set($prefix . 'LoginDatm', 'NOW()', false);

            if ($this->{APP_NAME}->insert($_table) === false) {
                throw new \Exception('관리자 로그인 로그 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
