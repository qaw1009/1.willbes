<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/profsales/BaseProfSales.php';

class OffLecture extends BaseProfSales
{
    public function __construct()
    {
        parent::__construct('offLecture', '단과반', [
            'cate_code', 'campus_ccd', 'course_idx', 'subject_idx', 'prof_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['캠퍼스', '대분류', '단과반코드', '단과반명', '과정', '과목', '교수', '개강일', '종강일', '수강료', '정상가', '결제건수', '환불건수', '매출현황'];
        parent::_excel($headers);
    }
}
