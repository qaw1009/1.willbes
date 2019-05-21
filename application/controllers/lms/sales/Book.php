<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/sales/BaseStats.php';

class Book extends BaseStats
{
    public function __construct()
    {
        parent::__construct('book', '교재', 'book', 'book', [
            'cate_code', 'subject_idx', 'prof_idx', 'publ_idx', 'author_idx'
        ]);
    }

    /**
     * 엑셀다운로드
     */
    public function excel()
    {
        $headers = ['과목/교수', '출판사', '저자', '판매가', '정상가', '판매상태'];
        parent::_excel($headers);
    }
}
