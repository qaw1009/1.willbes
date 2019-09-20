<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/lms/student/BaseStudent.php';

class Offlecture extends BaseStudent
{
    public function __construct()
    {
        parent::__construct('offlecture');
    }


    /**
     * 수강생보기 레이어 팝업
     */
    public function viewLayer()
    {
        $ProdCode = $this->_req("ProdCode");

        return $this->load->view('/student/layer/layer_offlecture', [
            'ProdCode' => $ProdCode
        ]);
    }


    /**
     * 수강생보기 리스트
     * @return CI_Output
     */
    public function viewAjax()
    {
        $ProdCode  = $this->_req('ProdCode');

        if(empty($ProdCode) == true){
            return $this->json_error('강좌코드를 입력해주십시요.');
        }

        /*
        if(is_array($ProdCode) == true){
            $arr_condition = [
                'IN' => [
                    'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                ],
                'EQ' => [
                    'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                    'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                    'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                    'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                    'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                ]
            ];

        } else {
            $arr_condition = [
                'EQ' => [
                    'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                    'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                    'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                    'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                    'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                    'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                ]
            ];
        }
        */

        // 날짜 검색
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        //$arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        $ProdCode_arr = $this->studentModel->getProdCode($ProdCode);// 해당 단과가 속한 종합반 코드

        if(empty($ProdCode_arr) == true){
            // 종합반이 없으면
            if(is_array($ProdCode) == true){
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                    ],
                    'EQ' => [
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];

            } else {
                $arr_condition = [
                    'EQ' => [
                        'OP.ProdCode' => $ProdCode,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];
            }

        } else {
            // 종합반 코드가 있으면
            if(is_array($ProdCode) == true){
                $ProdCode_tmp = $ProdCode;
            } else {
                $ProdCode_tmp = [$ProdCode];
            }

            foreach($ProdCode_arr AS $row){
                $ProdCode_tmp = array_merge($ProdCode_tmp, [$row['ProdCode']]);
            }
            if(is_array($ProdCode) == true){
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode_tmp,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                    ],
                    'EQ' => [
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]

                ];

            } else {
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode_tmp
                    ],
                    'EQ' => [
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];
            }
        }

        // 강좌 수강중인 회원 읽어오기
        $list = [];
        $count = $this->studentModel->getOffStudentList(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'));

        if($count > 0){
            $list = $this->studentModel->getOffStudentList(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'));
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }


    /**
     * 엑셀 읽어오기
     */
    public function excel()
    {
        $ProdCode = $this->_req('ProdCode');

        if(is_array($ProdCode) == true){
            $file_name = '수강생현황_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d", time());

            $headers = [ '회원번호', '회원명', '아이디', '상품구분', '종합반여부', '강좌명', '강좌번호', '주문번호', '결제루트', '결제수단',
                '결제금액', '결제자', '결제일', '휴대폰', '이메일', '할인사유', '주문메모'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, IsPkg, ProdNameSub, ProdCodeSub, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, 
            Price, ifnull(AdminName, MemName) AS AdminName, PayDate, Phone, Mail, DiscReason, OrderMemo';

        } else {
            $lec = $this->studentModel->getListLecture(false, ['EQ' => [ 'A.ProdCode' => $ProdCode]]);
            $lec = $lec[0];
            $file_name = '수강생현황('.$lec['ProdCode'].')_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d", time());

            $headers = [ '회원번호', '회원명', '아이디', '상품구분', '종합반여부', '강좌명', '주문번호', '결제루트', '결제수단',
                '결제금액', '결제자', '결제일', '휴대폰', '이메일', '할인사유', '주문메모'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, IsPkg, ProdName, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, 
            Price, ifnull(AdminName, MemName) AS AdminName, PayDate, Phone, Mail, DiscReason, OrderMemo';
        }

        /*
        $arr_condition = [
            'EQ' => [
                'ML.ProdCodeSub' => $this->_reqP('ProdCode'), // 강좌코드
                'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
            ]
        ];
        */
        // 날짜 검색
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        $ProdCode_arr = $this->studentModel->getProdCode($ProdCode);

        if(empty($ProdCode_arr) == true){
            // 종합반이 없으면
            if(is_array($ProdCode) == true){
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                    ],
                    'EQ' => [
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];

            } else {
                $arr_condition = [
                    'EQ' => [
                        'OP.ProdCode' => $ProdCode,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];
            }

        } else {
            // 종합반 코드가 있으면
            if(is_array($ProdCode) == true){
                $ProdCode_tmp = $ProdCode;
            } else {
                $ProdCode_tmp = [$ProdCode];
            }

            foreach($ProdCode_arr AS $row){
                $ProdCode_tmp = array_merge($ProdCode_tmp, [$row['ProdCode']]);
            }
            if(is_array($ProdCode) == true){
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode_tmp,
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                    ],
                    'EQ' => [
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]

                ];

            } else {
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $ProdCode_tmp
                    ],
                    'EQ' => [
                        'ML.ProdCodeSub' => $ProdCode, // 강좌코드
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'BDT' => [
                        'O.CompleteDatm' => [$search_start_date, $search_end_date]
                    ]
                ];
            }
        }

        $list = $this->studentModel->getOffStudentExcelList($column, $arr_condition);

        /*----  다운로드 정보 저장  ----*/
        $download_query = $this->studentModel->getLastQuery();
        $this->load->library('approval');
        if($this->approval->SysDownLog($download_query, $file_name, count($list)) !== true) {
            show_alert('로그 저장 중 오류가 발생하였습니다.','back');
        }
        /*----  다운로드 정보 저장  ----*/

        // export excel
        $this->load->library('excel');
        $this->excel->exportHugeExcel($file_name, $list, $headers);
    }


}