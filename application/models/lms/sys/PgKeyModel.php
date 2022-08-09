<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PgKeyModel extends WB_Model
{
    private $_table = [
        'pg_key' => 'lms_sys_pg_key',
        'admin' => 'wbs_sys_admin'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * PG키 목록 조회
     * @param array $arr_condition
     * @param null|int $limit
     * @param null|int $offset
     * @param array $order_by
     * @return array|int
     */
    public function listPgKey($arr_condition = [], $limit = null, $offset = null, $order_by = [])
    {
        $column = 'PgKeyIdx, PgDriver, PgMid, PgMName, ClientKey, SecretKey, MertKey, IsUse, RegDatm, fn_admin_name(RegAdminIdx) as RegAdminName';
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getListResult($this->_table['pg_key'], $column, $arr_condition, $limit, $offset, $order_by);
    }

    /**
     * PG키 데이터 조회
     * @param string $column
     * @param array $arr_condition
     * @return array
     */
    public function findPgKey($column = '*', $arr_condition = [])
    {
        $arr_condition['EQ']['IsStatus'] = 'Y';

        return $this->_conn->getFindResult($this->_table['pg_key'], $column, $arr_condition);
    }

    /**
     * PG키 수정 폼을 위한 데이터 조회
     * @param int $pg_key_idx [PG키식별자]
     * @return array
     */
    public function findPgKeyForModify($pg_key_idx)
    {
        $column = 'PgKeyIdx, PgDriver, PgMid, PgMName, ClientKey, SecretKey, MertKey, PgKeyDesc, IsUse, RegDatm, UpdDatm
            , fn_admin_name(RegAdminIdx) as RegAdminName, if(UpdAdminIdx is null, "", fn_admin_name(UpdAdminIdx)) as UpdAdminName';
        $arr_condition = ['EQ' => ['PgKeyIdx' => get_var($pg_key_idx, '0'), 'IsStatus' => 'Y']];

        return $this->_conn->getFindResult($this->_table['pg_key'], $column, $arr_condition);
    }

    /**
     * PG상점아이디 중복 체크
     * @param string $pg_driver [PG드라이버]
     * @param string $pg_mid [PG상점아이디]
     * @param int $pg_key_idx [PG키식별자]
     * @return bool|string
     */
    private function _isDuplicatePgMid($pg_driver, $pg_mid, $pg_key_idx = null)
    {
        $arr_condition = [
            'EQ' => [
                'PgDriver' => get_var($pg_driver, '__empty'),
                'PgMid' => get_var($pg_mid, '__empty'),
                'IsUse' => 'Y'
            ],
            'NOT' => [
                'PgKeyIdx' => $pg_key_idx
            ]
        ];
        $chk_cnt = $this->findPgKey(true, $arr_condition);

        return $chk_cnt > 0 ? 'PG별 중복된 상점 아이디가 존재합니다.' : false;
    }

    /**
     * PG키 등록
     * @param array $input
     * @return array|bool
     */
    public function addPgKey($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $pg_driver = element('pg_driver', $input);
            $pg_mid = element('pg_mid', $input);

            // PG 상점아이디 중복 체크
            $is_duplicate = $this->_isDuplicatePgMid($pg_driver, $pg_mid);
            if ($is_duplicate !== false) {
                throw new \Exception($is_duplicate);
            }

            // 데이터 저장
            $data = [
                'PgDriver' => $pg_driver,
                'PgMid' => $pg_mid,
                'PgMName' => element('pg_mname', $input),
                'ClientKey' => element('client_key', $input),
                'SecretKey' => element('secret_key', $input),
                'MertKey' => element('mert_key', $input),
                'PgKeyDesc' => element('pg_key_desc', $input),
                'IsUse' => element('is_use', $input),
                'RegAdminIdx' => $this->session->userdata('admin_idx'),
                'RegIp' => $this->input->ip_address()
            ];

            if ($this->_conn->set($data)->insert($this->_table['pg_key']) === false) {
                throw new \Exception('PG키 정보 등록에 실패했습니다.');
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }

    /**
     * PG키 수정
     * @param array $input
     * @return array|bool
     */
    public function modifyPgKey($input = [])
    {
        $this->_conn->trans_begin();

        try {
            $pg_key_idx = element('idx', $input);
            $client_key = element('client_key', $input);
            $secret_key = element('secret_key', $input);
            $mert_key = element('mert_key', $input);
            $sess_admin_idx = $this->session->userdata('admin_idx');

            // 기존정보 조회
            $row = $this->findPgKeyForModify($pg_key_idx);
            if (empty($row) === true) {
                throw new \Exception('기존 PG키 정보 조회에 실패했습니다.');
            }

            if ($client_key != $row['ClientKey'] || $secret_key != $row['SecretKey'] || $mert_key != $row['MertKey']) {
                // 키값이 변경된 경우 기존 데이터 삭제 후 재등록
                $data = [
                    'IsStatus' => 'N',
                    'UpdAdminIdx' => $sess_admin_idx
                ];

                $is_update = $this->_conn->set($data)->where('PgKeyIdx', $pg_key_idx)->update($this->_table['pg_key']);
                if ($is_update === false) {
                    throw new \Exception('PG키 정보 삭제에 실패했습니다.');
                }

                // 재등록
                $data = [
                    'PgDriver' => $row['PgDriver'],
                    'PgMid' => $row['PgMid'],
                    'PgMName' => element('pg_mname', $input),
                    'ClientKey' => $client_key,
                    'SecretKey' => $secret_key,
                    'MertKey' => $mert_key,
                    'PgKeyDesc' => element('pg_key_desc', $input),
                    'IsUse' => element('is_use', $input),
                    'RegAdminIdx' => $sess_admin_idx,
                    'RegIp' => $this->input->ip_address()
                ];

                if ($this->_conn->set($data)->insert($this->_table['pg_key']) === false) {
                    throw new \Exception('PG키 정보 등록에 실패했습니다.');
                }
            } else {
                // 데이터 수정
                $data = [
                    'PgMName' => element('pg_mname', $input),
                    'PgKeyDesc' => element('pg_key_desc', $input),
                    'IsUse' => element('is_use', $input),
                    'UpdAdminIdx' => $sess_admin_idx
                ];

                $is_update = $this->_conn->set($data)->where('PgKeyIdx', $pg_key_idx)->update($this->_table['pg_key']);
                if ($is_update === false) {
                    throw new \Exception('PG키 정보 수정에 실패했습니다.');
                }
            }

            $this->_conn->trans_commit();
        } catch (\Exception $e) {
            $this->_conn->trans_rollback();
            return error_result($e);
        }

        return true;
    }
}
