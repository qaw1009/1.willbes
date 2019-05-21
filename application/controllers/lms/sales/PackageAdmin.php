<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseStats.php';

class PackageAdmin extends BaseStats
{
    public function __construct()
    {
        parent::__construct('packageAdmin', '운영자패키지', 'on_lecture', 'adminpack_lecture', [
            'cate_code', 'school_year', 'pack_type_ccd'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['대비학년도', '패키지유형', '판매가', '정상가', '판매상태'];
        parent::_excel($headers);
    }
}
