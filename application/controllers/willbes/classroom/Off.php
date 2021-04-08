<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Off extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'order/orderListF', 'product/lectureF', 'order/orderF');
    protected $helpers = array('download');
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 학원강의 리스트 분기
     * @param array $params
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/classroom/off/list/ongoing/');
        }

        switch($params[0]) {
            case 'ongoing':
                $this->ongoing();
                break;

            case 'end':
                $this->end();
                break;

            default:
                redirect('/classroom/off/list/ongoing/');
                break;
        }
    }


    /**
     *  수강중인 강의
     */
    public function ongoing()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());
        $tab = (empty($this->_req("tab")) == true) ? '' : $this->_req("tab");

        // 셀렉트박스 수해오기
        $cond_arr = [
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr, true);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr, true);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr, true);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr, true);

        // 실제 단과반 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => ['615006'] // 학원단과
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'OrderDate^ASC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        $leclist = $this->classroomFModel->getLecture($cond_arr, $orderby,false, true);

        foreach ($leclist as $idx => $row){
            $booklist = $this->classroomFModel->getBooklist([
                'EQ' => [
                    'ProdCode' => $row['ProdCodeSub']
                ]
            ]);
            if(empty($booklist) == true){
                $leclist[$idx]['isbook'] = 'N';
            } else {
                $leclist[$idx]['isbook'] = 'Y';
            }
        }

        //강의실좌석정보[단과]
        $listLectureRoom = $this->_getLectureRoom($leclist, 'List');

        // 학원 종합반 목록 읽어오기
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
        ];

        $pkglist = $this->classroomFModel->getPackage($cond_arr, $orderby, false, true);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ], $orderby, false, true);

            foreach ($pkgsublist as $idx2 => $row2){
                $booklist = $this->classroomFModel->getBooklist([
                    'EQ' => [
                        'ProdCode' => $row2['ProdCodeSub']
                    ]
                ]);
                if(empty($booklist) == true){
                    $pkgsublist[$idx2]['isbook'] = 'N';
                } else {
                    $pkgsublist[$idx2]['isbook'] = 'Y';
                }
            }
            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        //강의실좌석정보[종합반]
        $pkgLectureRoom = $this->_getLectureRoom($pkglist, 'Pkg');

        //종합반 첨삭가능여부
        $isPkgCorrectAssignment = $this->_isPkgCorrectAssignment($pkglist);

        return $this->load->view('/classroom/off/off_ongoing', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'list' => $leclist,
            'pkglist' => $pkglist,
            'listLectureRoom' => $listLectureRoom,
            'pkgLectureRoom' => $pkgLectureRoom,
            'isPkgCorrectAssignment' => $isPkgCorrectAssignment,
            'tab' => $tab
        ]);
    }


    /**
     *  수강종료강의
     */
    public function end()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        if(array_key_exists('search_start_date',$input_arr) == false
            && empty(element('search_start_date', $input_arr)) == true){
            $input_arr['search_start_date'] = date("Y-m-d", strtotime("-1 months"));
            $input_arr['search_end_date'] = $today;
        }

        // 셀렉트박스 수해오기
        $cond_arr = [
            'LT' => [
                'StudyEndDate' => $today // 종료일 < 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr, true);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr, true);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr, true);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr, true);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'LT' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => ['615006'] // 학습방식 : 학원단과
            ],
            'GTE' => [
                'StudyEndDate' => element('search_start_date', $input_arr)
            ],
            'LTE' => [
                'StudyEndDate' => element('search_end_date', $input_arr)
            ]
        ];

        $orderby = element('orderby', $input_arr);
       $orderby = (empty($orderby) == true) ? 'StudyEndDate^DESC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        $leclist = $this->classroomFModel->getLecture($cond_arr, $orderby, false, true);

        // 패키지 강좌 읽어오기
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자번호
            ],
            'LT' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
/*            'GTE' => [
                'StudyEndDate' => element('search_start_date', $input_arr)
            ],
            'LTE' => [
                'StudyEndDate' => element('search_end_date', $input_arr)
            ]
*/
        ];
        $pkglist = $this->classroomFModel->getPackage($cond_arr, $orderby, false, true);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ], $orderby, false, true);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        return $this->load->view('/classroom/off/off_end', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'list' => $leclist,
            'pkglist' => $pkglist
        ]);
    }


    /**
     * 강사배정 layer
     * @return CI_Output|object|string
     */
    public function AssignProf()
    {
        $OrderIdx = $this->_req('orderidx');
        $OrderProdIdx = $this->_req('orderprodidx');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($OrderIdx) == true || empty($OrderProdIdx) == true){
            return $this->json_error("정보가 올바르지 않습니다.");
        }

        $today = date("Y-m-d H:i:s", time());
        $sub_prod_data = [];
        $UnPaidInfo = [];
        $unpaid_data = [];

        // 강의 신청정보 읽어오기
        $pkginfo = $this->classroomFModel->getPackage([
            'EQ' => [
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'OrderProdIdx' => $OrderProdIdx
            ]
        ],[], false, true);
        if(count($pkginfo) != 1){
            return $this->json_error('강좌신청정보가 없습니다.');
        }
        $pkginfo = $pkginfo[0];

        // 서브상품코드 추출
        $pkginfo['OrderSubProdCodes'] = [];
        if (empty($pkginfo['OrderSubProdData']) === false) {
            $pkginfo['OrderSubProdCodes'] = array_pluck(json_decode($pkginfo['OrderSubProdData'], true), 'ProdCode');
        }

        if($pkginfo['IsUnPaid'] == 'Y'){
            // 결제정보 읽어오기
            $UnPaidInfo = $this->classroomFModel->getUnPaidInfo($pkginfo['ProdCode'], $MemIdx, $pkginfo['UnPaidIdx']);
            if (empty($UnPaidInfo) === true) {
                return $this->json_error('미수금정보 조회에 실패했습니다.', _HTTP_NOT_FOUND);
            }

            // 상품정보
            $unpaid_data = element('0', $UnPaidInfo);
            $unpaid_data['tRealPayPrice'] = array_sum(array_pluck($UnPaidInfo, 'RealPayPrice')); // 총기결제금액
            $unpaid_data['tRefundPrice'] = array_sum(array_pluck($UnPaidInfo, 'RefundPrice'));   // 총기환불금액
            $unpaid_data['tRealUnPaidPrice'] = $unpaid_data['OrgPayPrice'] - ($unpaid_data['tRealPayPrice'] - $unpaid_data['tRefundPrice']);    // 최종미납금액
        }

        // 선택강좌 정보 읽어오기
        $sub_prod_rows = $this->classroomFModel->getOffPackageSubLectgure([
            'EQ' => [
                'PS.ProdCode' => $pkginfo['ProdCode']
            ],
            'LTE' => [
                'VP.ProfChoiceStartDate' => $today
            ],
            'GTE' => [
                'VP.ProfChoiceEndDate' => $today
            ]
        ]);

        foreach ($sub_prod_rows as $row) {
            $arr_key = $row['IsEssential'] == 'Y' ? 'ess' : 'choice';
            if($row['ProfChoiceStartDate'] <= $today && $today <= $row['ProfChoiceEndDate']){
                $row['IsChoice'] = 'Y';
            } else {
                $row['IsChoice'] = 'N';
            }
            $sub_prod_data[$arr_key][] = $row;
        }

        $notassign = false;
        if(empty($UnPaidInfo) == false){
            if($UnPaidInfo[0]['PayStatusCcd'] == '676006'){
                // $notassign = true;
                // 메인 주문 환불이 아니면 그냥 처리가능한게
            }
        }

        return $this->load->view('/classroom/off/layer/assign_prof',[
            'pkginfo' => $pkginfo,
            'unpaidinfo' => $UnPaidInfo,
            'unpaid_data' => $unpaid_data,
            'sublec' => $sub_prod_data,
            'notassign' => $notassign
            ]);
    }


    /**
     * 배정한 강사 목록 보기
     * @return CI_Output|object|string
     */
    public function ViewAssignProf()
    {
        $OrderIdx = $this->_req('orderidx');
        $OrderProdIdx = $this->_req('orderprodidx');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($OrderIdx) == true || empty($OrderProdIdx) == true){
            return $this->json_error("정보가 올바르지 않습니다.");
        }

        $today = date("Y-m-d H:i:s", time());
        $sub_prod_data = [];
        $UnPaidInfo = [];
        $unpaid_data = [];

        // 강의 신청정보 읽어오기
        $pkginfo = $this->classroomFModel->getPackage([
            'EQ' => [
                'MemIdx' => $MemIdx,
                'OrderIdx' => $OrderIdx,
                'OrderProdIdx' => $OrderProdIdx
            ]
        ],[], false, true);
        if(count($pkginfo) != 1){
            return $this->json_error('강좌신청정보가 없습니다.');
        }
        $pkginfo = $pkginfo[0];

        // 서브상품코드 추출
        $pkginfo['OrderSubProdCodes'] = [];
        if (empty($pkginfo['OrderSubProdData']) === false) {
            $pkginfo['OrderSubProdCodes'] = array_pluck(json_decode($pkginfo['OrderSubProdData'], true), 'ProdCode');
        }

        // 선택강좌 정보 읽어오기
        $sub_prod_rows = $this->classroomFModel->getOffPackageSubLectgure([
            'EQ' => [
                'PS.ProdCode' => $pkginfo['ProdCode']
            ],
            'IN' => [
                'PS.ProdCodeSub' => $pkginfo['OrderSubProdCodes']
            ]
        ]);

        foreach($sub_prod_rows as $idx => $row){
            $booklist = $this->classroomFModel->getBooklist([
                'EQ' => [
                    'ProdCode' => $row['ProdCodeSub']
                ]
            ]);
            if(empty($booklist) == true){
                $sub_prod_rows[$idx]['isbook'] = 'N';
            } else {
                $sub_prod_rows[$idx]['isbook'] = 'Y';
            }
        }

        foreach ($sub_prod_rows as $row) {
            $arr_key = $row['IsEssential'] == 'Y' ? 'ess' : 'choice';
            if($row['ProfChoiceStartDate'] <= $today && $today <= $row['ProfChoiceEndDate']){
                $row['IsChoice'] = 'Y';
            } else {
                $row['IsChoice'] = 'N';
            }
            $sub_prod_data[$arr_key][] = $row;
        }

        return $this->load->view('/classroom/off/layer/view_assign_prof',[
            'pkginfo' => $pkginfo,
            'sublec' => $sub_prod_data,
        ]);
    }


    /**
     * 선택한 강좌 적용
     * @return CI_Output
     */
    public function AssignProfStore()
    {
        $MemIdx = $this->session->userdata('mem_idx');
        $ProdCode = $this->_req("prod_code");
        $OrderIdx = $this->_req("order_idx");
        $OrderProdIdx = $this->_req("order_prod_idx");
        $ProdCodeSub = $this->_req("prod_code_sub");

        if(empty($ProdCode) == true || empty($OrderIdx) == true || empty($OrderProdIdx) == true || empty($ProdCodeSub) == true ){
            return $this->json_error("정보가 올바르지 않습니다.");
        }

        empty($ProdCodeSub) === false && $ProdCodeSub = array_values(array_unique(explode(',', $ProdCodeSub)));

        $result = $this->classroomFModel->storeOffLectureSub($MemIdx, $OrderIdx, $OrderProdIdx, $ProdCode, $ProdCodeSub);

        return $this->json_result($result, '강사배정이 적용되었습니다.', $result);
    }


    /**
     * 강의실좌석배정 폼
     * @return object|string
     */
    public function AssignSeat()
    {
        if ($this->_is_mobile === true) {
            $orderidx = $this->_reqG('orderidx',true);
            $orderprodidx = $this->_reqG('orderprodidx');
            $pkg_yn = $this->_reqG('pkg_yn');
            $prod_code = $this->_reqG('prod_code');
            $prod_code_sub = $this->_reqG('prod_code_sub');
            $lr_code = $this->_reqG('lr_code');
            $lr_unit_code = $this->_reqG('lr_unit_code');

            if (empty($orderidx) === true || empty($orderprodidx) === true || empty($pkg_yn) === true
                || empty($prod_code) === true || empty($prod_code_sub) === true || empty($lr_code) === true || empty($lr_unit_code) === true) {
                show_alert('정보가 올바르지 않습니다.','back');
            }
            $form_data = $this->_reqG(null);
        } else {
            $rules = [
                ['field' => 'orderidx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'orderprodidx', 'label' => '주문상품식별자', 'rules' => 'trim|required|integer'],
                ['field' => 'pkg_yn', 'label' => '상품타입', 'rules' => 'trim|required|in_list[Y,N]'],
                ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
                ['field' => 'prod_code_sub', 'label' => '상품코드서브', 'rules' => 'trim|required|integer'],
                ['field' => 'lr_code', 'label' => '강의실코드', 'rules' => 'trim|required|integer'],
                ['field' => 'lr_unit_code', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer'],
            ];

            if ($this->validate($rules) === false) {
                return $this->json_error("정보가 올바르지 않습니다.");
            }
            $form_data = $this->_reqP(null);
        }

        $lec_data = $this->classroomFModel->getLectureRoomForProduct($form_data);
        if (empty($lec_data) === true) {
            if ($this->_is_mobile === true) {
                show_alert('조회된 강의실 정보가 없습니다.','back');
            } else {
                return $this->json_error('조회된 강의실 정보가 없습니다.', _HTTP_NOT_FOUND);
            }
        }

        $seat_data = $this->classroomFModel->getLectureRoomSeat($form_data);
        if (empty($seat_data) === true) {
            if ($this->_is_mobile === true) {
                show_alert('조회된 강의실 좌석 정보가 없습니다.','back');
            } else {
                return $this->json_error('조회된 강의실 좌석 정보가 없습니다.', _HTTP_NOT_FOUND);
            }
        }

        return $this->load->view('/classroom/off/layer/assign_seat',[
            'form_data' => $form_data,
            'lec_data' => $lec_data,
            'seat_data' => $seat_data
        ]);
    }

    /**
     * 강의실좌석배정
     * @return CI_Output
     */
    public function AssignSeatStore()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST,PUT]'],
            ['field' => 'pkg_yn', 'label' => '상품타입', 'rules' => 'trim|required|in_list[Y,N]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'order_prod_idx', 'label' => '주문상품식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code', 'label' => '상품코드', 'rules' => 'trim|required|integer'],
            ['field' => 'prod_code_sub', 'label' => '상품코드서브', 'rules' => 'trim|required|integer'],
            ['field' => 'arr_prod_code_sub', 'label' => '종합반서브상품코드', 'rules' => 'callback_validateRequiredIf[pkg_yn,Y]'],
            ['field' => 'lr_code', 'label' => '강의실코드', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_unit_code', 'label' => '강의실회차코드', 'rules' => 'trim|required|integer'],
            ['field' => 'lr_rurs_idx', 'label' => '강의실회차좌석식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'seat_num', 'label' => '강의실회차좌석번호', 'rules' => 'trim|required|integer']
        ];

        $_mode = 'add';
        if (empty($this->_reqP('old_lrsr_idx')) === false) {
            $_mode = 'modify';
            $rules = array_merge($rules, [
                ['field' => 'old_arr_lrsr_idx', 'label' => '다중 강의실회차회원좌석식별자', 'rules' => 'trim|required']
            ]);
        }

        if ($this->validate($rules) === false) {
            return $this->json_error("정보가 올바르지 않습니다.");
        }

        $result = $this->classroomFModel->{$_mode.'LectureRoomSeatRegister'}($this->_reqP(null));
        return $this->json_result($result, '좌석배정이 적용되었습니다.', $result);
    }

    /**
     * 좌석배치도 팝업창 (사용안함)
     * @param array $param
     * @return CI_Output|object|string
     */
    public function showSeatMap($param = [])
    {
        if (empty($param) === true) {
            return $this->json_error('잘못된 접근 입니다.', _HTTP_NOT_FOUND);
        }
        $seat_map_info = $this->classroomFModel->getLectureRoomSeatForMap($param[0]);

        return $this->load->view('/classroom/off/layer/seat_map_popup',[
            'seat_map_info' => $seat_map_info
        ]);
    }

    /**
     * 강의실회차 좌석배치도 첨부파일 다운로드
     * @param array $param
     * @return CI_Output
     */
    public function seatMapDownload($param = [])
    {
        if (empty($param) === true) {
            return $this->json_error('잘못된 접근 입니다.', _HTTP_NOT_FOUND);
        }
        $lr_unit_code = $param[0];
        $seat_map_info = $this->classroomFModel->getLectureRoomSeatForMap($lr_unit_code);
        if (empty($seat_map_info) === true) {
            show_alert('등록된 파일을 찾지 못했습니다.','close','');
        }
        $this->classroomFModel->seatMapDownloadLog($lr_unit_code);

        $file_path = $seat_map_info['SeatMapFileRoute'];
        $file_name = $seat_map_info['SeatMapFileName'];
        public_download($file_path, $file_name);

        show_alert('등록된 파일을 찾지 못했습니다.','close','');
    }

    public function layerBooklist()
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        $ProdCode = $this->_req("ProdCode");
        $ProdCodeSub = $this->_req("ProdCodeSub");

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $sess_mem_idx,
                'ProdCode' => $ProdCode,
                'ProdCodeSub' => $ProdCodeSub
            ]
        ], null, false, true);

        if(empty($lec) == true){
            return $this->json_error('수강중인 강의가 없습니다.');
        } else {
            $lec = $lec[0];
        }

        $booklist = $this->classroomFModel->getBooklist([
            'EQ' => [
                'ProdCode' => $ProdCodeSub
            ]
        ]);

        foreach($booklist as $idx => $row){
            if($row['BookProvisionCcd'] == '610003'){
                $book_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
                    'EQ' => ['OP.MemIdx' => $sess_mem_idx, 'OP.ProdCode' => $row['ProdBookCode'], 'OP.PayStatusCcd' => '676001']
                ]);

                if($book_paid_cnt > 0){
                    $booklist[$idx]['Paid'] = true;
                } else {
                    $booklist[$idx]['Paid'] = false;
                }
            } else {
                $booklist[$idx]['Paid'] = false;
            }
        }

        return $this->load->view('/classroom/off/layer/booklist', [
            'booklist' => $booklist,
            'SiteUrl' => app_to_env_url($this->getSiteCacheItem($lec['SiteCode'], 'SiteUrl'))
        ]);
    }


    /**
     * 학원수강강의 보강 신청 레이어
     * @return CI_Output|object|string
     */
    public function layerBogang()
    {
        $OrderIdx = $this->_req('o');
        $OrderProdIdx = $this->_req('op');
        $ProdCode = $this->_req('p');
        $ProdCodeSub = $this->_req('ps');
        $Type = $this->_req('t');

        $sess_mem_idx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        if($Type == 'P'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode
                ],
                'GTE' => [
                    'StudyEndDate' => $today // 종료일 >= 오늘
                ]
            ], false, true, true);
            if(empty($pkg) == true){
                return $this->json_error('수강중인 강의가 없습니다.');
            }

            $lec = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub
                ]
            ], [],false, true);

        } else {
            $lec = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub
                ],
                'GTE' => [
                    'StudyEndDate' => $today // 종료일 >= 오늘
                ]
            ], [],false, true);
        }

        if(empty($lec) == true){
            return $this->json_error('수강중인 강의가 없습니다.');
        } else {
            $lec = $lec[0];
        }

        // 보강 설정 확인
        if(empty($lec['SuppProdCode']) == true || $lec['SuppIsUse'] == 'N'){
            return $this->json_error('보강신청이 불가능한 강의입니다.');
        }

        // 보강 강좌 정보 가져오기
        $bogang_lec = $this->lectureFModel->findProductByProdCode('on_lecture', $lec['SuppProdCode'], '', ['EQ' => ['IsUse' => 'Y']]);
        if(empty($bogang_lec) == true){
            return $this->json_error('보강신청이 불가능합니다.');
        }

        // 강좌 커리큘럼
        $curr = $this->lectureFModel->findProductLectureUnits($lec['SuppProdCode']);

        foreach ($curr as $key => $row){
            if($row['wUnitLectureNum'] == 1){
                $bogang_curr[$row['wUnitNum'] -1]['UnitArr'] = $row['wUnitIdx'];
                $result = preg_match('/^\d{1,2}월[\s]*\d{1,2}일/', $row['wUnitName'], $unitname);
                if($result > 0){
                    $bogang_curr[$row['wUnitNum'] -1]['UnitName'] = $row['wUnitNum'].'회차 - '.$unitname[0];
                } else {
                    $bogang_curr[$row['wUnitNum'] -1]['UnitName'] = $row['wUnitNum'].'회차 - '.$row['wUnitName'];
                }

            } else {
                $bogang_curr[$row['wUnitNum'] -1]['UnitArr'] = $bogang_curr[$row['wUnitNum'] -1]['UnitArr'].','.$row['wUnitIdx'];
            }
        }
        // 보강 주문 갯수 가져오기
        $bogang_list = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $sess_mem_idx,
                'TargetOrderIdx' => $OrderIdx,
                'TargetProdCode' => $ProdCode,
                'TargetProdCodeSub' => $ProdCodeSub
            ]
        ], ['OrderDate'=>'DESC'],false, false);

        return $this->load->view('/classroom/off/layer/bogang', [
            'lec' => $lec,
            'bogang_lec' => $bogang_lec,
            'bogang_curr' => $bogang_curr,
            'bogang_list'=> $bogang_list
        ]);
    }

    /**
     * 보강 신청 처리
     * @return CI_Output
     */
    public function takeBogang()
    {
        $OrderIdx = $this->_req('o');
        $OrderProdIdx = $this->_req('op');
        $ProdCode = $this->_req('p');
        $ProdCodeSub = $this->_req('ps');
        $Type = $this->_req('t');
        $UnitIdxs = $this->_req('u');
        $reason = $this->_req('reason');

        $sess_mem_idx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        if($Type == 'P'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode
                ],
                'GTE' => [
                    'StudyEndDate' => $today // 종료일 >= 오늘
                ]
            ], false, false, true);
            if(empty($pkg) == true){
                return $this->json_error('수강중인 강의가 없습니다.');
            }

            $lec = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub
                ]
            ], [],false, true);

        } else {
            $lec = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $sess_mem_idx,
                    'OrderIdx' => $OrderIdx,
                    'OrderProdIdx' => $OrderProdIdx,
                    'ProdCode' => $ProdCode,
                    'ProdCodeSub' => $ProdCodeSub
                ],
                'GTE' => [
                    'StudyEndDate' => $today // 종료일 >= 오늘
                ]
            ], [],false, true);
        }

        if(empty($lec) == true){
            return $this->json_error('수강중인 강의가 없습니다.');
        } else {
            $lec = $lec[0];
        }

        // 보강 설정 확인
        if(empty($lec['SuppProdCode']) == true || $lec['SuppIsUse'] == 'N'){
            return $this->json_error('보강신청이 불가능한 강의입니다.');
        }

        // 보강 강좌 정보 가져오기
        $bogang_lec = $this->lectureFModel->findProductByProdCode('on_lecture', $lec['SuppProdCode'], '', ['EQ' => ['IsUse' => 'Y']]);
        if(empty($bogang_lec) == true){
            return $this->json_error('보강신청이 불가능합니다.');
        }

        // 강좌 커리큘럼
        $curr = $this->lectureFModel->findProductLectureUnits($lec['SuppProdCode']);

        // 보강 주문 갯수 가져오기
        $bogang_cnt = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $sess_mem_idx,
                'TargetOrderIdx' => $OrderIdx,
                'TargetProdCode' => $ProdCode,
                'TargetProdCodeSub' => $ProdCodeSub
            ]
        ], [],true, false);

        if($bogang_cnt >= $lec['SuppAbleCnt']) {
            return $this->json_error('보강신청횟수를 초과하였습니다.');
        }

        if($this->orderFModel->procAutoOrder('bogang', $bogang_lec['ProdCode'], [
            'wunit_idx' => $UnitIdxs,
            'study_period' => $lec['SuppPeriod'],
            'etc_reason' => $reason,
            'target_order_idx' => $lec['OrderIdx'],
            'target_prod_code' => $lec['ProdCode'],
            'target_prod_code_sub' => $lec['ProdCodeSub']
        ]) !== true){
            return $this->json_error('보강신청중 오류가 발생하였습니다.');
        }

        return $this->json_result(true, '신청되었습니다. 내강의실 > 학원강좌 > 보강동영상 메뉴에서 수강해 주세요.');
    }

    /**
     * 강의실좌석정보조회
     * @param array $data
     * @param string $mode
     * @return mixed
     */
    private function _getLectureRoom($data = [], $mode = 'List')
    {
        return $this->{'_get'.$mode.'LectureRoom'}($data);
    }

    /**
     * 강의실좌석정보조회 : 단과반
     * @param array $data
     * @return array
     */
    private function _getListLectureRoom($data = [])
    {
        $MemIdx = $this->session->userdata('mem_idx');
        $_temp_arr_data = [];
        foreach ($data as $idx => $row) {
            //개강일, 종강일 날짜 체크
            /*if ($row['StudyStartDate'] <= date('Y-m-d') && $row['StudyEndDate'] >= date('Y-m-d')) {
                $_temp_arr_data[$idx]['order_idx'] = $row['OrderIdx'];
                $_temp_arr_data[$idx]['order_prod_idx'][] = $row['OrderProdIdx'];
                $_temp_arr_data[$idx]['prod_code_master'] = $row['ProdCode'];
                $_temp_arr_data[$idx]['prod_code_sub'][] = $row['ProdCodeSub'];
            }*/
            if ($row['StudyEndDate'] >= date('Y-m-d')) {
                $_temp_arr_data[$idx]['order_idx'] = $row['OrderIdx'];
                $_temp_arr_data[$idx]['order_prod_idx'][] = $row['OrderProdIdx'];
                $_temp_arr_data[$idx]['prod_code_master'] = $row['ProdCode'];
                $_temp_arr_data[$idx]['prod_code_sub'][] = $row['ProdCodeSub'];
            }
        }

        $list = [];
        foreach($_temp_arr_data as $idx => $row){
            $result =  $this->classroomFModel->getLectureRoom(
                $MemIdx,
                $row['order_idx'],
                $row['order_prod_idx'],
                $row['prod_code_master'],
                $row['prod_code_sub']
            );
            if (empty($result[0]['ProdCodeMaster']) === false) {
                $list[$result[0]['ProdCodeMaster']] = $result[0];
            }
        }
        return $list;
    }

    /**
     * 강의실좌석정보조회 : 종합반
     * @param array $data
     * @return array
     */
    private function _getPkgLectureRoom($data = [])
    {
        $MemIdx = $this->session->userdata('mem_idx');
        $_temp_arr_data = [];
        foreach ($data as $idx => $row) {
            foreach ($row['subleclist'] as $sb_idx => $sb_row) {
                //개강일, 종강일 날짜 체크
                /*if ($sb_row['StudyStartDate'] <= date('Y-m-d') && $sb_row['StudyEndDate'] >= date('Y-m-d')) {
                    $_temp_arr_data[$idx]['order_idx'] = $row['OrderIdx'];
                    $_temp_arr_data[$idx]['order_prod_idx'][] = $sb_row['OrderProdIdx'];
                    $_temp_arr_data[$idx]['prod_code_master'] = $row['ProdCode'];
                    $_temp_arr_data[$idx]['prod_code_sub'][] = $sb_row['ProdCodeSub'];
                }*/
                if ($row['StudyEndDate'] >= date('Y-m-d')) {
                    $_temp_arr_data[$idx]['order_idx'] = $row['OrderIdx'];
                    $_temp_arr_data[$idx]['order_prod_idx'][] = $sb_row['OrderProdIdx'];
                    $_temp_arr_data[$idx]['prod_code_master'] = $row['ProdCode'];
                    $_temp_arr_data[$idx]['prod_code_sub'][] = $sb_row['ProdCodeSub'];
                }
            }
        }

        $list = [];
        $temp_result = [];
        foreach($_temp_arr_data as $idx => $row){
            $result =  $this->classroomFModel->getLectureRoom(
                $MemIdx,
                $row['order_idx'],
                $row['order_prod_idx'],
                $row['prod_code_master'],
                $row['prod_code_sub']
            );
            if (empty($result[0]['ProdCodeMaster']) === false) {
                $temp_result[$result[0]['ProdCodeMaster']] = $result;
            }
        }

        foreach ($temp_result as $key => $row) {
            foreach ($row as $sKey => $sVal) {
                $list[$key][$sVal['ProdCodeSub']] = $sVal;
            }
        };
        return $list;
    }

    /**
     * 종합반 첨삭 가능여부
     * 종합반에 속한 단과의 첨삭여부 체크 : 하나라도 가능인경우 true
     * @param array $data
     * @return array
     */
    private function _isPkgCorrectAssignment($data = [])
    {
        $return = [];

        foreach ($data as $idx => $row) {
            $return[$idx]['isCorrectAssignment'] = false;
            foreach ($row['subleclist'] as $sb_idx => $sb_row) {
                //개강일, 종강일 날짜 체크
                if ($sb_row['StudyStartDate'] <= date('Y-m-d') && $sb_row['StudyEndDate'] >= date('Y-m-d') && in_array('731001',explode(',',$sb_row['OptionCcds']))) {
                    $return[$idx]['isCorrectAssignment'] = true;
                    break;
                }
            }
        }
        return $return;
    }
}