<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseStats.php';

class OffPackageAdmin extends BaseStats
{
    public function __construct()
    {
        parent::__construct('offPackageAdmin', '종합반', 'off_lecture', 'off_pack_lecture', [
            'cate_code', 'campus_ccd', 'school_year', 'study_pattern_ccd'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['캠퍼스', '대비학년도', '수강형태', '개강년월', '판매가', '정상가', '개설여부', '접수상태'];
        parent::_excel($headers);
    }
}
