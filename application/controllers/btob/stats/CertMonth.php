<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/btob/stats/BaseStats.php';

class CertMonth extends BaseStats
{
    public function __construct()
    {
        parent::__construct('cert', 'month');
    }

    /**
     * 제휴사 통계 엑셀다운로드
     */
    public function excel()
    {
        $results = [];
        $file_name = '회원연계_월별통계_' . $this->_sess_btob_idx . '_' . date('Ymd');
        $headers = ['년월', '수강신청(인증신청)건수', '수강지급(승인완료) 건수', '승인반려 건수', '수강완료(승인만료) 건수'];

        // 결과 데이터 가공
        $data = parent::_getExcelData();

        $results[] = [
            '총 합계', (string) $data['sum_data']['tApprovalApplyCnt'], (string) $data['sum_data']['tApprovalCompleteCnt'],
            (string) $data['sum_data']['tApprovalRejectCnt'], (string) $data['sum_data']['tApprovalExpireCnt']
        ];

        foreach ($data['data'] as $row) {
            $results[] = [
                substr($row['RegYm'], 0, 4) . '년 ' . substr($row['RegYm'], 5) . '월',
                $row['ApprovalApplyCnt'], $row['ApprovalCompleteCnt'], $row['ApprovalRejectCnt'], $row['ApprovalExpireCnt']
            ];
        }

        parent::_excel($file_name, $results, $headers);
    }
}
