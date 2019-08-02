<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Offpkg extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('offpkg');
    }


    /**
     * 엑셀 읽어오기

    public function excel()
    {
        $headers = [ '회원번호', '회원명', '아이디', '상품구분', '주문번호', '결제루트', '결제수단', '결제금액',
            '결제자', '결제일', '휴대폰', '이메일', '강좌1', '강좌2', '강좌3', '강좌4', '강좌5', '강좌6','강좌7', '강좌8', '강좌9', '강좌10'];
        $column = "MemIdx, MemName, MemId, SalePatternCcd_Name, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, Phone, Mail,
            ( 
            SELECT group_concat(p.ProdName SEPARATOR '^')
            FROM lms_order AS o
                INNER JOIN lms_order_product AS op ON op.OrderIdx = o.OrderIdx 
                INNER JOIN lms_order_sub_product AS osp ON osp.OrderProdIdx = op.OrderProdIdx 
                INNER JOIN lms_product AS p ON p.ProdCode = osp.ProdCodeSub
            WHERE o.OrderIdx = U.OrderIdx 
            AND op.OrderProdIdx = U.OrderProdIdx
            AND op.ProdCode = U.ProdCode
            ) AS SubProdArr
            ";

        $lec = $this->studentModel->getListLecture(false, ['EQ' => [ 'A.ProdCode' => $this->_reqP('ProdCode')]]);
        $lec = $lec[0];
        $file_name = '수강생현황('.$lec['ProdCode'].')_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d", time());
        $arr_condition = [
            'EQ' => [
                'OP.ProdCode' => $this->_reqP('ProdCode'), // 강좌코드
                'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
            ]
        ];
        // 날짜 검색
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        $list = $this->studentModel->getStudentExcelList($column, $arr_condition);
        foreach ($list as $key => $row){
            $subArr = @explode('^', $row['SubProdArr']);
            unset($row['SubProdArr']);
            $list[$key] = array_merge($row, $subArr);
        }

        /*----  다운로드 정보 저장  ----
        $download_query = $this->studentModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $list, $headers);
    } */
}