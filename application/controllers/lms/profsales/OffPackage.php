<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/BaseProfSales.php';

class OffPackage extends BaseProfSales
{
    public function __construct()
    {
        parent::__construct('offPackage', '종합반', [
            'cate_code', 'campus_ccd', 'prof_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['캠퍼스', '대분류', '종합반코드', '종합반명', '교수', '최초개강일', '최종종강일', '수강료', '정상가', '결제건수', '환불건수'];
        parent::_excel($headers);
    }
}
