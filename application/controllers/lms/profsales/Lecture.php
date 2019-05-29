<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/BaseProfSales.php';

class Lecture extends BaseProfSales
{
    public function __construct()
    {
        parent::__construct('lecture', '단강좌', [
            'cate_code', 'course_idx', 'subject_idx', 'prof_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['대분류', '단강좌코드', '단강좌명', '과정', '과목', '교수', '수강기간', '수강료', '정상가', '결제건수', '환불건수', '매출현황'];
        parent::_excel($headers);
    }
}
