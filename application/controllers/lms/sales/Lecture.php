<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseStats.php';

class Lecture extends BaseStats
{
    public function __construct()
    {
        parent::__construct('lecture', '단강좌', 'on_lecture', 'on_lecture', [
            'cate_code', 'school_year', 'lec_type_ccd', 'course_idx', 'subject_idx', 'prof_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['대비학년도', '강좌유형', '과정', '과목', '교수', '진행상태', '판매가', '정상가', '판매상태'];
        $column = 'PL.SchoolYear, CLT.CcdName as LecTypeCcdName, PCO.CourseName, PSU.SubjectName, VPP.wProfName_String
            , concat(VCL.wProgressCcd_Name, " (", VCL.wUnitCnt, "/", VCL.wUnitLectureCnt, ")") as wProgressCcd_Name, PS.RealSalePrice, PS.SalePrice, CSS.CcdName as SaleStatusCcdName';

        parent::_excel($headers, $column);
    }
}
