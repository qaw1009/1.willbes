<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/BaseProfSales.php';

class PackagePeriod extends BaseProfSales
{
    public function __construct()
    {
        parent::__construct('packagePeriod', '기간제(PASS)패키지', [
            'cate_code', 'pack_type_ccd', 'prof_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['대분류', '패키지코드', '패키지명', '패키지유형', '교수', '수강기간', '수강료', '정상가', '결제건수', '환불건수'];
        parent::_excel($headers);
    }
}
