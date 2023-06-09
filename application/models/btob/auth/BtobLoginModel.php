<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BtobLoginModel extends WB_Model
{
    private $_table = [
        'btob_admin' => 'lms_btob_admin',
        'btob_admin_role' => 'lms_btob_admin_role',
        'btob_admin_login_log' => 'lms_btob_admin_login_log',
        'btob' => 'lms_btob',
        'admin' => 'wbs_sys_admin',
        'wcode' => 'wbs_sys_code'
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
        $column = 'L.LogIdx, L.AdminId, L.LoginDatm, L.LoginIp, L.IsLogin, L.LoginLogCcd, WCL.wCcdName as LoginLogCcdName';

        return $this->_conn->getJoinListResult($this->_table['btob_admin_login_log'] . ' as L', 'left', $this->_table['wcode'] . ' as WCL'
            , 'L.LoginLogCcd = WCL.wCcd and WCL.wIsStatus = "Y"'
            , $column, $arr_condition, $limit, 0, ['L.LogIdx' => 'desc']);
    }

    /**
     * 로그인 로그 저장
     * @param int $btob_idx [제휴사식별자]
     * @param string $admin_id [관리자아이디]
     * @param string $log_ccd_name [로그인결과코드]
     * @return bool|string
     */
    public function addLoginLog($btob_idx, $admin_id, $log_ccd_name)
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
            $data = [
                'AdminId' => get_var($admin_id, '_empty_id'),
                'BtobIdx' => get_var($btob_idx, 0),
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

            // 로그인 실패횟수 조회
            $arr_condition = ['EQ' => ['AdminId' => $admin_id, 'LoginLogCcd' => $login_fail_log_ccd], 'GTE' => ['LoginDatm' => $login_fail_chk_datm]];
            $login_fail_cnt = $this->_conn->getFindResult($this->_table['btob_admin_login_log'], true, $arr_condition);

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
