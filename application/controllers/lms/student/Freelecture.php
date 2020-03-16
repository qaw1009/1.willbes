<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Freelecture extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('freelecture');
    }

    /**
     * 엑셀 읽어오기
     */
    public function excel()
    {
        $headers = [ '회원번호', '회원명', '아이디', '주문번호', '결제일', '휴대폰', '이메일'];
        $column = 'MemIdx, MemName, MemId, OrderIdx, PayDate, Phone, Mail';

        $lec = $this->studentModel->getListLecture(false, ['EQ' => [ 'A.ProdCode' => $this->_reqP('ProdCode')]]);
        $lec = $lec[0];

        $arr_condition = [
            'EQ' => [
                'OP.ProdCode' => $this->_reqP('ProdCode'), // 강좌코드
                'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
            ],
            'IN' => [
                'OP.PayStatusCcd' => ['676001', '676007']
            ]
        ];
        // 날짜 검색
        $search_start_date = get_var($this->_reqP('search_start_date'), date('Y-m-01'));
        $search_end_date = get_var($this->_reqP('search_end_date'), date('Y-m-t'));
        $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        $list = $this->studentModel->getStudentExcelList($column, $arr_condition);

        // export excel
        $this->load->library('excel');
        $this->excel->exportExcel('수강생현황('.$lec['ProdCode'].')_'.date("Ymd", time()), $list, $headers);
    }
}