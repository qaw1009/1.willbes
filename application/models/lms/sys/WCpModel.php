<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WCpModel extends WB_Model
{
    private $_table = 'vw_role_cp_list';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * CP사 코드 목록 조회
     * @return array
     */
    public function getCpArray()
    {
        $data = $this->_conn->getListResult($this->_table, 'wCpIdx, wCpName', [
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wCpIdx' => 'asc'
        ]);

        return array_pluck($data, 'wCpName', 'wCpIdx');
    }

    /**
     * 관리자 권한별 CP사 코드목록 조회
     * @return array
     */
    public function getRoleCpArray()
    {
        return $this->_conn->getListResult($this->_table, 'wCpIdx,wCpName', [
            'EQ' => ['wAdminIdx' => $this->session->userdata('admin_idx')]
        ], null, null, [
            'wCpName' => 'asc'
        ]);
    }
}