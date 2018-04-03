<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WCodeModel extends WB_Model
{
    private $_table = 'wbs_sys_code';

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 그룹공통코드에 해당하는 공통코드 조회
     * @param $group_ccd
     * @return array
     */
    public function getCcd($group_ccd)
    {
        $data = $this->_conn->getListResult($this->_table, 'if(wIsValueUse = "N", wCcd, wCcdValue) as wCcd, wCcdName', [
            'EQ' => ['wGroupCcd' => $group_ccd, 'wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wOrderNum' => 'asc'
        ]);

        return array_pluck($data, 'wCcdName', 'wCcd');
    }

    /**
     * 그룹공통코드 배열에 해당하는 공통코드 조회
     * @param array $group_ccds
     * @return array
     */
    public function getCcdInArray($group_ccds = [])
    {
        $data = $this->_conn->getListResult($this->_table, 'wGroupCcd, if(wIsValueUse = "N", wCcd, wCcdValue) as wCcd, wCcdName', [
            'IN' => ['wGroupCcd' => $group_ccds],
            'EQ' => ['wIsUse' => 'Y', 'wIsStatus' => 'Y']
        ], null, null, [
            'wGroupCcd' => 'asc', 'wOrderNum' => 'asc'
        ]);

        $codes = [];
        foreach ($data as $rows) {
            $codes[$rows['wGroupCcd']][(string) $rows['wCcd']] = $rows['wCcdName'];
        }

        return $codes;
    }
}
