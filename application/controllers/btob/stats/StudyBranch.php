<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/btob/stats/BaseStats.php';

class StudyBranch extends BaseStats
{
    public function __construct()
    {
        parent::__construct('study', 'branch');
    }

    /**
     * 제휴사 통계 엑셀다운로드
     */
    public function excel()
    {
        $results = [];
        $file_name = '회원수강_누적통계_' . $this->_sess_btob_idx . '_' . date('Ymd');
        $headers = ['[지역] 지점', '진도율', '실제 수강건수'];

        // 결과 데이터 가공
        $data = parent::_getExcelData();

        $results[] = ['총 합계', (string) $data['sum_data']['tAvgStudyRate'], (string) $data['sum_data']['tRealStudyCnt']];

        foreach ($data['data'] as $row) {
            $results[] = ['[' . $row['AreaCcdName'] . '] ' . $row['BranchCcdName'], $row['AvgStudyRate'], $row['RealStudyCnt']];
        }

        parent::_excel($file_name, $results, $headers);
    }
}
