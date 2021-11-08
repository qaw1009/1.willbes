<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends WB_Model
{
    private $_table = 'wbs_sys_admin';
    private $_log_table = [
        'wbs' => 'wbs_sys_admin_login_log',
        'lms' => 'lms_sys_admin_login_log'
    ];

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
        $query = 'select wAdminIdx, wRoleIdx, wAdminId, wAdminName, wIsApproval, wProfIdx, wIsUse, ifnull(wCertType, "") as wCertType, ifnull(wLastLoginIp, "") as wLastLoginIp, if(wPasswdExpireDate <= current_date(), "Y", "N") as wIsPasswdExpired';
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
     * @param $admin_idx
     * @param string $cert_type
     * @return array|bool
     */
    public function modifyAdminCertInfo($admin_idx, $cert_type = 'Y')
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
            'LOCK' =>  ['117011', 'N'],
            'PASSWD_REQ' =>  ['117012', 'N']
        ];

        try {
            if (APP_NAME == 'lms') {
                $_table = $this->_log_table['lms'];
                $prefix = '';
            } else {
                $_table = $this->_log_table['wbs'];
                $prefix = 'w';
            }

            $data = [
                'wAdminId' => get_var($admin_id, '_empty_id'),
                $prefix . 'LoginIp' => $this->input->ip_address(),
                $prefix . 'IsLogin' => $log_ccds[$log_ccd_name][1],
                $prefix . 'LoginLogCcd' => $log_ccds[$log_ccd_name][0]
            ];

            if (APP_NAME == 'lms') {
                $data['ConnSubDomain'] = SUB_DOMAIN;
            }

            $this->{APP_NAME}->set($data)->set($prefix . 'LoginDatm', 'NOW()', false);

            if ($this->{APP_NAME}->insert($_table) === false) {
                throw new \Exception('관리자 로그인 로그 등록에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    /**
     * 로그인 잠금체크 및 로그인 실패횟수에 따른 잠금처리
     * @param string $admin_id
     * @return bool|string
     */
    public function checkLoginLock($admin_id)
    {
        $this->load->loadModels(['_wbs/sys/loginLock']);    // 로그인 잠금 모델 로드
        $login_fail_log_ccd = '117003';     // 로그인 실패체크 공통코드 (아이디/비밀번호 불일치)
        $login_fail_limit_cnt = 5;          // 잠금처리 기준 로그인 실패횟수

        try {
            // 로그인 잠금여부 조회
            $lock_results = $this->loginLockModel->isLoginLock($admin_id);
            if ($lock_results['ret_cd'] === true) {
                throw new \Exception($lock_results['ret_data']);
            } else {
                $login_fail_chk_datm = $lock_results['ret_data'];   // 로그인 실패횟수 체크 기준일시 (금일 0시 or 잠금해제일시)
            }

            // 로그인 실패횟수 조회 (WBS)
            $arr_condition = ['EQ' => ['wAdminId' => $admin_id, 'wLoginLogCcd' => $login_fail_log_ccd], 'GTE' => ['wLoginDatm' => $login_fail_chk_datm]];
            $login_fail_cnt = $this->wbs->getFindResult($this->_log_table['wbs'], true, $arr_condition);

            // 로그인 실패횟수 조회 (LMS)
            $arr_condition = ['EQ' => ['wAdminId' => $admin_id, 'LoginLogCcd' => $login_fail_log_ccd], 'GTE' => ['LoginDatm' => $login_fail_chk_datm]];
            $login_fail_cnt += $this->lms->getFindResult($this->_log_table['lms'], true, $arr_condition);

            // 로그인 실패횟수 초과시 잠금처리
            if ($login_fail_cnt >= $login_fail_limit_cnt) {
                // 잠금처리 데이터 저장
                $is_add_lock = $this->loginLockModel->addLoginLock($admin_id);
                if ($is_add_lock !== true) {
                    throw new \Exception($is_add_lock);
                }
                throw new \Exception('로그인 실패횟수 초과로 계정잠금 처리되었습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
