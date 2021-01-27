<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseStudent extends \app\controllers\BaseController
{
    protected $models = array( 'sys/wCode','sys/site','sys/code','sys/category','product/base/course'
        ,'product/base/subject','product/base/professor','student/student');
    protected $helpers = array();
    protected $LearnPattern = null;
    protected $ProdTypeCcd = null;
    protected $ProdType = [
        'lecture' => '636001',
        'userpkg' => '636001',
        'adminpkg' => '636001',
        'periodpkg' => '636001',
        'freelecture' => '636001',
        'offlecture' => '636002',
        'offpkg' => '636002',
    ];
    protected $LearnPatternCcd = [
        'lecture' => '615001',
        'userpkg' => '615002',
        'adminpkg' => '615003',
        'periodpkg' => '615004',
        'freelecture' => '615005',
        'offlecture' => '615006',
        'offpkg' => '615007',
    ];

    public function __construct($LearnPattern = 'lecture')
    {
        $this->LearnPattern = $LearnPattern;
        $this->ProdType = $this->ProdType[$LearnPattern];

        parent::__construct();
    }

    /**
     * 리스트페이지 레이아웃
     * @return object|string
     */
    public function index()
    {
        //공통코드
        $codes = $this->codeModel->getCcdInArray(['607','611','618','653','654','675']);
        // $arr_code['arr_site_code'] = $this->siteModel->getOffLineSiteArray('');
        $arr_code['arr_site_code'] = get_auth_on_off_site_codes('Y', true, false);
        $def_site_code = key($arr_code['arr_site_code']);

        // 캠퍼스
        $campusList = $this->siteModel->getSiteCampusArray('');

        $category_data = $this->categoryModel->getCategoryArray();
        $arr_category = [];
        foreach ($category_data as $row) {
            $arr_key = ($row['CateDepth'] == 1) ? 'LG' : 'MD';
            $arr_category[$arr_key][] = $row;
        }

        return $this->load->view('/student/list_'.$this->LearnPattern, [
            'lecType' => $this->LearnPattern,
            'arr_lg_category' => element('LG', $arr_category, []),
            'arr_md_category' => element('MD', $arr_category, []),
            'arr_subject' => $this->subjectModel->getSubjectArray(),
            'arr_course' => $this->courseModel->getCourseArray(),
            'arr_professor' => $this->professorModel->getProfessorArray(),
            'wProgress_ccd' => $this->wCodeModel->getCcd('105'),
            'LecType_ccd' => $codes['607'],
            'Multiple_ccd' => $codes['611'],
            'Sales_ccd' => $codes['618'],
            'studypattern_ccd' => $codes['653'],
            'studyapply_ccd' => $codes['654'],
            'accept_ccd' => $codes['675'],
            'campusList' => $campusList,
            'def_site_code' => $def_site_code,
            'arr_site_code' => $arr_code['arr_site_code']
        ]);
    }


    /**
     * 리스트페이지 실제 리스트
     * @return CI_Output
     */
    public function listAjax()
    {
        // 관리자 검색
        $prof_idx = $this->_reqP('search_prof_idx');

        // tzone 로그인중이면 검색 강사를 고정
        if($this->session->userdata('is_prof') == true){
            $prof_idx = $this->session->userdata('prof_idx');
        }

        $arr_condition = [
            'EQ' => [
                'A.ProdTypeCcd' => $this->ProdTypeCcd,
                'B.LearnPatternCcd' => $this->LearnPatternCcd[$this->LearnPattern],
                'A.SiteCode' => $this->_reqP('search_site_code'),
                'C.CateCode' => $this->_reqP('search_md_cate_code'),
                'B.SchoolYear' => $this->_reqP('search_schoolyear'),
                'B.SubjectIdx' => $this->_reqP('search_subject_idx'),
                'B.CourseIdx' => $this->_reqP('search_course_idx'),
                'B.LecTypeCcd' =>$this->_reqP('search_lectype_ccd'),
                'B.MultipleApply' =>$this->_reqP('search_multiple'),
                'Be.wProgressCcd' =>$this->_reqP('search_wprogress_ccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'A.IsNew' =>$this->_reqP('search_new'),
                'A.IsBest' =>$this->_reqP('search_best'),
                'A.SaleStatusCcd' =>$this->_reqP('search_sales_ccd'),
                'B.StudyPatternCcd' =>$this->_reqP('search_studypattern_ccd'),
                'B.StudyApplyCcd' =>$this->_reqP('search_studyapply_ccd'),
                'B.SchoolStartYear' =>$this->_reqP('search_schoolstartyear'),
                'B.SchoolStartMonth' =>$this->_reqP('search_schoolstartmonth'),
                'B.IsLecOpen' =>$this->_reqP('search_islecopen'),
                'B.AcceptStatusCcd' =>$this->_reqP('search_acceptccd'),
                'A.IsUse' =>$this->_reqP('search_is_use'),
                'B.CampusCcd' => $this->_reqP('search_campus_code')
            ],
            'LKR' => [
                'C.CateCode' => $this->_reqP('search_lg_cate_code'),
            ],
            'LKB' => [
                'E.ProfIdx_String' => $prof_idx,
            ]
        ];

        if ($this->_reqP('search_type') === 'wlec') {
            $arr_condition = array_merge($arr_condition,[
                'ORG2' => [
                    'LKB' => [
                        'Be.wLecIdx' => $this->_reqP('search_value_list'),
                        'Be.wLecName' => $this->_reqP('search_value_list')
                    ]
                ],
            ]);

        } elseif($this->LearnPattern == 'offlecture') {
            $arr_condition = array_merge($arr_condition,[
                'ORG1' => [
                    'LKB' => [
                        'A.ProdCode' => $this->_reqP('search_value_list'),
                        'A.ProdName' => $this->_reqP('search_value_list'),
                        'E.wProfName_String' => $this->_reqP('search_value_list')
                    ]
                ],
            ]);

        } else {
            $arr_condition = array_merge($arr_condition,[
                'ORG1' => [
                    'LKB' => [
                        'A.ProdCode' => $this->_reqP('search_value_list'),
                        'A.ProdName' => $this->_reqP('search_value_list')
                    ]
                ],
            ]);
        }

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    'A.RegDatm' => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        if (!empty($this->_reqP('search_sdate')) && !empty($this->_reqP('search_edate'))) {
            $arr_condition = array_merge($arr_condition, [
                'BDT' => [
                    $this->_reqP('search_date_type') => [$this->_reqP('search_sdate'), $this->_reqP('search_edate')]
                ],
            ]);
        }

        if( strlen($this->_req('search_calc')) > 0) {
            $whereOper = $this->_req('search_calc') === '0' ? 'EQ' : 'GTE';
            $arr_condition = array_merge_recursive($arr_condition,[
                $whereOper => [
                    'F.DivisionCount' => $this->_req('search_calc')
                ],
            ]);
        }

        $list = [];
        $count = $this->studentModel->getListLecture(true, $arr_condition,
            $this->_reqP('length'), $this->_reqP('start'));

        if($count > 0){
            $list = $this->studentModel->getListLecture(false, $arr_condition,
                $this->_reqP('length'), $this->_reqP('start'), ['A.ProdCode' => 'desc']);
        }

        return $this->response([
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => $list
        ]);
    }


    /**
     * 수강생보기 레이아웃
     * @return object|string
     */
    public function view($params = [])
    {
        if(empty($params[0]) == true){
            show_alert('강좌코드가 없습니다.', 'back');
        }

        $ProdCode = $params[0];

        $lec = $this->studentModel->getListLecture(false, ['EQ' => [ 'A.ProdCode' => $ProdCode]]);

        if(empty($lec) == true){
            show_alert('강좌정보가가 없습니다.', 'back');
        }

        $lec = $lec[0];

        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['670','604','694']);

        // 강좌 정보 읽어오기

        return $this->load->view('/student/view_'.$this->LearnPattern, [
            'lecType' => $this->LearnPattern,
            'lec' => $lec,
            'arr_pay_route_ccd' => $codes['670'],
            'arr_pay_method_ccd' => $codes['604'],
            'arr_pay_type_ccd' => $codes['694']
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

        switch($this->_req('search_pay_status_ccd')){
            case 'pay':
                $payStatus_arr = ['676001', '676007'];
                break;
            case 'refund':
                $payStatus_arr = ['676006'];
                break;
            default:
                $payStatus_arr = ['676001', '676006', '676007'];
                break;
        }

        // 학원 강의가 아니면 결제완료만 나오게
        if($this->LearnPattern != 'offlecture' && $this->LearnPattern != 'offpkg' ){
            $payStatus_arr = ['676001', '676007'];
        }

        if(is_array($ProdCode) == true){
            $arr_condition = [
                'IN' => [
                    'OP.ProdCode' => $ProdCode, // 강좌코드
                    'OP.PayStatusCcd' => $payStatus_arr
                ],
                'EQ' => [
                    'OP.SalePatternCcd' => $this->_req('search_pay_type_ccd'), // 상품구분
                    'O.PayRouteCcd' => $this->_req('search_pay_route_ccd'), // 결제루트
                    'O.PayMethodCcd' => $this->_req('search_pay_method_ccd'), // 결제수단
                    'MI.MailRcvStatus' => $this->_req('MailRcv'), // 이메일수신
                    'MI.SmsRcvStatus' => $this->_req('SmsRcv'), // Sms 수신
                ],
                'ORG' => [
                    'EQ' => [
                        'M.MemId' => $this->_req('search_value'),
                        'M.MemName' => $this->_req('search_value'),
                        'M.Phone3' => $this->_req('search_value')
                    ]
                ]
            ];

        } else {
            $arr_condition = [
                'EQ' => [
                    'OP.ProdCode' => $ProdCode, // 강좌코드
                    'OP.SalePatternCcd' => $this->_req('search_pay_type_ccd'), // 상품구분
                    'O.PayRouteCcd' => $this->_req('search_pay_route_ccd'), // 결제루트
                    'O.PayMethodCcd' => $this->_req('search_pay_method_ccd'), // 결제수단
                    'MI.MailRcvStatus' => $this->_req('MailRcv'), // 이메일수신
                    'MI.SmsRcvStatus' => $this->_req('SmsRcv'), // Sms 수신
                ],
                'IN' => [
                    'OP.PayStatusCcd' => $payStatus_arr
                ],
                'ORG' => [
                    'EQ' => [
                        'M.MemId' => $this->_req('search_value'),
                        'M.MemName' => $this->_req('search_value'),
                        'M.Phone3' => $this->_req('search_value')
                    ]
                ]
            ];
        }

        // 날짜 검색
        $search_start_date = $this->_req('search_start_date');
        $search_end_date = $this->_req('search_end_date');
        $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        // 강좌 수강중인 회원 읽어오기
        $list = [];
        $count = $this->studentModel->getStudentList(true, $arr_condition,
            $this->_req('length'), $this->_req('start'));

        if($count > 0){
            $list = $this->studentModel->getStudentList(false, $arr_condition,
                $this->_req('length'), $this->_req('start'));

            foreach($list as $key => $row){
                if(empty($list[$key]['OrderSubProdData']) == false) {
                    $list[$key]['OrderSubProdData'] = array_data_pluck(json_decode($row['OrderSubProdData'], true), ['ProdCode', 'ProdName']);
                    $list[$key]['OrderSubProdData'] = '[' . str_replace('::', '] ', implode('<br/>[', $list[$key]['OrderSubProdData']));
                }
            }
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
        $ProdCode  = $this->_reqP('ProdCode');
        if(empty($ProdCode) == true){
            show_alert('강좌코드를 선택해 주십시요.', 'back');
        }

        if($this->LearnPattern == 'lecture' ||
            $this->LearnPattern == 'freelecture' ||
            $this->LearnPattern == 'periodpkg' ) {

            $headers = ['회원번호', '회원명', '아이디', '상품구분', '주문번호', '결제루트', '결제수단', '결제금액',
                '결제자', '결제일', '종료일', '휴대폰', '이메일'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, EndDate, Phone, Mail';

        } else if($this->LearnPattern == 'adminpkg'){
            $headers = ['회원번호', '회원명', '아이디', '상품구분', '선택강좌', '주문번호', '결제루트', '결제수단', '결제금액',
                '결제자', '결제일', '종료일', '휴대폰', '이메일'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, OrderSubProdData, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, EndDate, Phone, Mail';

        } else if($this->LearnPattern == 'userpkg'){
            $headers = ['회원번호', '회원명', '아이디', '상품구분', '선택강좌', '주문번호', '결제루트', '결제수단', '결제금액',
                '결제자', '결제일', '휴대폰', '이메일'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, OrderSubProdData, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, Phone, Mail';

        } else if($this->LearnPattern == 'offpkg'){
            $headers = ['회원번호', '회원명', '아이디', '상품구분', '선택강좌', '주문번호', '주문상태', '수강증번호', '결제루트', '결제수단', '결제금액',
                '결제자', '결제일', '환불태일', '휴대폰', '이메일', '할인사유', '주문메모', '주소'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, OrderSubProdData, OrderIdx, PayStatusName, CertNo, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, RefundDatm, Phone, Mail, DiscReason, OrderMemo, CONCAT( \'(\', ZipCode, \') \', Addr1, \' \', Addr2) AS Addr';

        } else {
            $headers = [ '회원번호', '회원명', '아이디', '상품구분', '주문번호', '결제루트', '결제수단', '결제금액',
                '결제자', '결제일', '휴대폰', '이메일'];
            $column = 'MemIdx, MemName, MemId, SalePatternCcd_Name, OrderIdx, PayRouteCcd_Name, PayMethodCcd_Name, Price
            ,ifnull(AdminName, MemName) AS AdminName, PayDate, Phone, Mail';
        }

        switch($this->_reqP('search_pay_status_ccd')){
            case 'pay':
                $payStatus_arr = ['676001', '676007'];
                break;
            case 'refund':
                $payStatus_arr = ['676006'];
                break;
            default:
                $payStatus_arr = ['676001', '676006', '676007'];
                break;
        }

        // 학원 강의가 아니면 결제완료만 나오게
        if($this->LearnPattern != 'offlecture' && $this->LearnPattern != 'offpkg' ){
            $payStatus_arr = ['676001', '676007'];
        }

        // 강좌코드가 배열일때
        if(is_array($ProdCode) == true){
            $headers = array_merge(['강좌번호', '강좌명'], $headers);
            $column = 'ProdCode, ProdName,'.$column;

            $file_name = '수강생현황_'.$this->session->userdata('admin_idx').'_'.date("Y-m-d", time());
            if($this->LearnPattern == 'offpkg'){
                $arr_condition = [
                    'IN' => [
                        'OP.ProdCode' => $this->_reqP('ProdCode'), // 강좌코드
                        'OP.PayStatusCcd' => $payStatus_arr
                    ],
                    'EQ' => [
                        'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                        'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                        'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                        'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                        'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                    ],
                    'ORG' => [
                        'EQ' => [
                            'M.MemId' => $this->_req('search_value'),
                            'M.MemName' => $this->_req('search_value'),
                            'M.Phone3' => $this->_req('search_value')
                        ]
                    ]
                ];
            } else {
                if($this->LearnPattern == 'offpkg') {
                    $arr_condition = [
                        'IN' => [
                            'OP.ProdCode' => $this->_reqP('ProdCode'), // 강좌코드
                            'OP.PayStatusCcd' => $payStatus_arr
                        ],
                        'EQ' => [
                            'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                            'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                            'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                            'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                            'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                        ],
                        'ORG' => [
                            'EQ' => [
                                'M.MemId' => $this->_req('search_value'),
                                'M.MemName' => $this->_req('search_value'),
                                'M.Phone3' => $this->_req('search_value')
                            ]
                        ]
                    ];
                } else {
                    $arr_condition = [
                        'IN' => [
                            'OP.ProdCode' => $this->_reqP('ProdCode'), // 강좌코드
                            'OP.PayStatusCcd' => $payStatus_arr
                        ],
                        'EQ' => [
                            'OP.SalePatternCcd' => $this->_reqP('search_pay_type_ccd'), // 상품구분
                            'O.PayRouteCcd' => $this->_reqP('search_pay_route_ccd'), // 결제루트
                            'O.PayMethodCcd' => $this->_reqP('search_pay_method_ccd'), // 결제수단
                            'MI.MailRcvStatus' => $this->_reqP('MailRcv'), // 이메일수신
                            'MI.SmsRcvStatus' => $this->_reqP('SmsRcv') // Sms 수신
                        ],
                        'ORG' => [
                            'EQ' => [
                                'M.MemId' => $this->_req('search_value'),
                                'M.MemName' => $this->_req('search_value'),
                                'M.Phone3' => $this->_req('search_value')
                            ]
                        ]
                    ];
                }
            }

        } else {
            $lec = $this->studentModel->getListLecture(false, ['EQ' => [ 'A.ProdCode' => $ProdCode]]);
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
                ],
                'IN' => [
                    'OP.PayStatusCcd' => $payStatus_arr
                ],
                'ORG' => [
                    'EQ' => [
                        'M.MemId' => $this->_req('search_value'),
                        'M.MemName' => $this->_req('search_value'),
                        'M.Phone3' => $this->_req('search_value')
                    ]
                ]
            ];
        }

        // 날짜 검색
        $search_start_date = $this->_reqP('search_start_date');
        $search_end_date = $this->_reqP('search_end_date');
        $arr_condition['BDT'] = ['O.CompleteDatm' => [$search_start_date, $search_end_date]];

        $list = $this->studentModel->getStudentExcelList($column, $arr_condition);

        foreach($list as $key => $row){
            if(empty($list[$key]['OrderSubProdData']) == false) {
                $list[$key]['OrderSubProdData'] = array_data_pluck(json_decode($row['OrderSubProdData'], true), ['ProdCode', 'ProdName']);
                $list[$key]['OrderSubProdData'] = '[' . str_replace('::', '] ', implode("\n[", $list[$key]['OrderSubProdData']));
            }
        }

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