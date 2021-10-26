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
}
