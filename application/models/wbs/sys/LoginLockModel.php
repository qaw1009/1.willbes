<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginLockModel extends WB_Model
{
    private $_table = [
        'admin_login_lock' => 'wbs_sys_admin_login_lock',
        'admin_role' => 'wbs_sys_admin_role',
        'admin' => 'wbs_sys_admin',
    ];

    public function __construct()
    {
        parent::__construct('wbs');
    }

    /**
     * 운영자계정잠금 목록 조회
     * @param bool|string $is_count
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return mixed
     */
    public function listLoginLock($is_count, $arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        if ($is_count === true) {
            $in_column = 'count(0) AS numrows';
            $column = 'numrows';
            $order_by_offset_limit = '';
        } else {
            $in_column = 'L.wLockIdx, L.wAdminId, L.wLockSubDomain, L.wLockDatm, L.wLockIp, L.wUnLockDatm, L.wUnLockAdminIdx
                , ifnull(A.wAdminName, "비운영자") as wAdminName, A.wRoleIdx, A.wIsUse
                , if(A.wAdminIdx is null, "X", if(L.wUnLockDatm is null, "N", "Y")) as wIsUnLock
                , R.wRoleName
                , UA.wAdminId as wUnLockAdminId, UA.wAdminName as wUnLockAdminName';

            if (is_bool($is_count) === true) {
                $column = '*';
            } else {
                $column = $is_count;
            }

            $order_by_offset_limit = $this->_conn->makeOrderBy($order_by)->getMakeOrderBy();
            $order_by_offset_limit .= $this->_conn->makeLimitOffset($limit, $offset)->getMakeLimitOffset();
        }

        $from = '
            from ' . $this->_table['admin_login_lock'] . ' as L
                left join ' . $this->_table['admin'] . ' as A
                    on L.wAdminId = A.wAdminId and A.wIsStatus = "Y"
                left join ' . $this->_table['admin_role'] . ' as R
                    on A.wRoleIdx = R.wRoleIdx and R.wIsStatus = "Y"
                left join ' . $this->_table['admin'] . ' as UA
                    on L.wUnLockAdminIdx = UA.wAdminIdx                    
        ';

        $where = $this->_conn->makeWhere($arr_condition)->getMakeWhere(false);

        // 쿼리 실행
        $query = $this->_conn->query('select ' . $column . ' from (select ' . $in_column . $from . $where . ') U ' . $order_by_offset_limit);

        return ($is_count === true) ? $query->row(0)->numrows : $query->result_array();
    }

    /**
     * 운영자계정잠금해제 업데이트
     * @param string $admin_id [관리자아이디]
     * @param int $lock_idx [잠금식별자]
     * @return array|bool
     */
    public function modifyLoginUnLock($admin_id, $lock_idx)
    {
        $this->_conn->trans_begin();

        try {
            // 잠금처리 데이터 확인
            $arr_condition = ['EQ' => ['L.wLockIdx' => $lock_idx, 'L.wAdminId' => $admin_id]];
            $row = array_get($this->listLoginLock(false, $arr_condition, 1, 0, ['wLockIdx' => 'desc']), '0');
            if (empty($row) === true) {
                throw new \Exception('잠금처리 데이터가 없습니다.', _HTTP_NOT_FOUND);
            } else {
                if ($row['wIsUnLock'] == 'Y') {
                    throw new \Exception('이미 잠금해제 처리되었습니다.');
                } elseif ($row['wIsUnLock'] == 'X') {
                    throw new \Exception('잠금해제 대상이 아닙니다.');
                }
            }

            // 잠금해제
            $data = [
                'wUnLockAdminIdx' => $this->session->userdata('admin_idx'),
                'wUnLockIp' => $this->input->ip_address()
            ];
            $is_update = $this->_conn->set($data)->set('wUnLockDatm', 'NOW()', false)
                ->where('wLockIdx', $lock_idx)
                ->where('wAdminId', $admin_id)
                ->where('wUnLockDatm is null')
                ->update($this->_table['admin_login_lock']);
            if ($is_update !== true) {
                throw new \Exception('잠금해제 처리에 실패하였습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * 운영자계정잠금여부 및 잠금여부 체크 기준일시 리턴 (true => 잠금상태)
     * @param string $admin_id [관리자아이디]
     * @return array
     */
    public function isLoginLock($admin_id)
    {
        $admin_id = get_var($admin_id, '_empty_id');
        $chk_datm = date('Y-m-d') . ' 00:00:00';    // 잠금여부 체크 기준일시

        // 로그인 잠금여부 조회
        $column = 'wLockIdx, wLockDatm, wUnLockDatm';
        $arr_condition = ['EQ' => ['wAdminId' => $admin_id]];

        // 접속도메인 조건 추가
        $op_sub_domain = SUB_DOMAIN == 'btob' ? 'EQ' : 'NOT';
        $arr_condition[$op_sub_domain]['wLockSubDomain'] = 'btob';

        $lock_row = array_get($this->_conn->getListResult($this->_table['admin_login_lock'], $column, $arr_condition, 1, 0, ['wLockIdx' => 'desc']), '0');
        if (empty($lock_row) === false && empty($lock_row['wUnLockDatm']) === true) {
            return ['ret_cd' => true, 'ret_data' => '로그인 실패횟수 초과로 계정잠금된 상태입니다.'];
        }

        // 잠금해제가 된 경우 잠금여부 체크 기준일시를 잠금해제일시로 변경
        if (empty($lock_row) === false && empty($lock_row['wUnLockDatm']) === false && $chk_datm < $lock_row['wUnLockDatm']) {
            $chk_datm = $lock_row['wUnLockDatm'];
        }

        return ['ret_cd' => false, 'ret_data' => $chk_datm];
    }

    /**
     * 운영자계정잠금 데이터 등록
     * @param string $admin_id [관리자아이디]
     * @return bool|string
     */
    public function addLoginLock($admin_id)
    {
        try {
            $data = [
                'wAdminId' => $admin_id,
                'wLockSubDomain' => SUB_DOMAIN,
                'wLockIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['admin_login_lock']) === false) {
                throw new \Exception('계정잠금 데이터 등록에 실패하였습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
