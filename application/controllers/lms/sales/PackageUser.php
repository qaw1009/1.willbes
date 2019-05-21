<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseStats.php';

class PackageUser extends BaseStats
{
    public function __construct()
    {
        parent::__construct('packageUser', '사용자패키지', 'on_lecture', 'userpack_lecture', [
            'cate_code', 'school_year'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['대비학년도', '판매상태'];
        parent::_excel($headers);
    }
}
