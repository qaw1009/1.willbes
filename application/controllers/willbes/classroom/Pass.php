<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'product/packageF', 'product/lectureF', 'order/orderListF');
    protected $helpers = array('download','file');
    protected $auth_controller = true;
    protected $auth_methods = array();

    protected $_LearnPatternCcd_pass = ['615004'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 기간제 패키지 강의실 메인
     * @param array $params
     * @return object|string
     */
    public function index($params = [])
    {
        $passidx = $this->_req("prodcode");
        $sitecode = $this->_req("sitecode");

        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
            ]
        ];

        $sitelist = $this->classroomFModel->getSiteList($cond_arr);
        foreach($sitelist AS $idx => $row){
            $sitelist[$idx]['SiteName'] = $this->getSiteCacheItem($row['SiteCode'], 'SiteGroupName');
        }

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SiteCode' => $sitecode // 해당사이트의 강좌만
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'lastStudyDate^DESC' : $orderby;


        // 학습형태 : 기간제패키지
        $passlist = $this->classroomFModel->getPackage($cond_arr, $orderby);

        // 선택된 패키지번호가 없다면 그냥 첫번째것으로
        if(empty($passidx) == true && empty($passlist) == false){
            $passidx = $passlist[0]['ProdCode'];
        }

        // 선택된 기간제패키지
        $passinfo = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'ProdCode' => [$passidx]
            ]
        ]), $orderby);

        // 해당패키지의 서브강좌
        if(empty($passinfo) == false ){
            $passinfo = $passinfo[0];
            //$passinfo['SiteUrl'] = app_to_env_url($this->getSiteCacheItem($passinfo['SiteCode'], 'SiteUrl'));

            // 셀렉트박스 구해오기
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode']
                ]
            ];

            // 셀렉트박스용 데이타
            $course_arr = $this->classroomFModel->getCourseList($cond_arr);
            $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
            $prof_arr = $this->classroomFModel->getProfList($cond_arr);

            // 즐겨찾기 이고 수강률이 100이 안된 강좌
            $leclist_like = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                    'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                    'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                    'IsDisp' => 'Y', // 숨기지않고
                    'IsLiked' => 'Y' // 즐겨찾기
                ],
                'LT' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ]
            ], $orderby);

            // 수강중인 모든 강좌
            $leclist_ing = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                    'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                    'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                    'IsDisp' => 'Y' // 숨지지않음
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            // 수강종료 강좌 는 수강율이 100 인 강좌
            $leclist_end = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                    'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                    'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'GTE' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            // 숨김강좌 이고 수강률이 100이 안된 강좌
            $leclist_nodisp = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                    'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                    'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                    'IsDisp' => 'N' // 숨긴강좌
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ],
                'LT' => [
                    'StudyRate' => 100 // 수강율이 100%
                ],
                'LKB' => [
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ], $orderby);

            $passinfo['TakeLecNum'] = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode']
                ],
                'NOT' => [
                    'ProdCode' => 'ProdCodeSub'
                ]
            ],'',true);

            $passinfo['LecNum'] = count($this->packageFModel->subListProduct('periodpack_lecture', $passinfo['ProdCode']));

        } else {
            $leclist_like = [];
            $leclist_ing = [];
            $leclist_end = [];
            $leclist_nodisp = [];

            $course_arr = [];
            $subject_arr = [];
            $prof_arr = [];
        }

        return $this->load->view('/classroom/pass/index', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'sitelist' => $sitelist,
            'passlist' => $passlist,
            'passinfo' => $passinfo,
            'leclist_like' => $leclist_like,
            'leclist_ing' => $leclist_ing,
            'leclist_end' => $leclist_end,
            'leclist_nodisp' => $leclist_nodisp
        ]);
    }

    /**
     * 강의 보기
     * @return object|string
     */
    public function view()
    {
        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('ps');

        if(empty($orderidx) === true || empty($prodcode) === true || empty($prodcodesub) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'GTE' => [
                'RealLecEndDate' => $today
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        if($lec['LearnPatternCcd'] == '615003'){
            $pkg = $this->classroomFModel->getPackage([
                'EQ' => [
                    'MemIdx' => $this->session->userdata('mem_idx'),
                    'OrderIdx' => $orderidx,
                    'ProdCode' => $prodcode
                ],
                'GTE' => [
                    'RealLecEndDate' => $today
                ]
            ], $orderby);

            $pkg = $pkg[0];

            $lec['lastPauseEndDate'] = $pkg['lastPauseEndDate'];
            $lec['lastPauseStartDate'] = $pkg['lastPauseStartDate'];
            $lec['PauseSum'] = $pkg['PauseSum'];
            $lec['PauseCount'] = $pkg['PauseCount'];
            $lec['ExtenSum'] = $pkg['ExtenSum'];
            $lec['ExtenCount'] = $pkg['ExtenCount'];
            $lec['IsRebuy'] = $pkg['IsRebuy'];
            $lec['RebuyCount'] = $pkg['RebuyCount'];
        }

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

        // 감사정보 디코딩
        $lec['ProfReferData'] = json_decode($lec['ProfReferData'], true);
        $lec['isstart'] = $isstart;
        $lec['ispause'] = $ispause;
        //$lec['SiteUrl'] = app_to_env_url($this->getSiteCacheItem($lec['SiteCode'], 'SiteUrl'));

        // 커리큘럼 읽어오기
        $curriculum = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx']
            ]
        ]);

        // 회차별 수강시간 체크
        foreach($curriculum AS $idx => $row){
            $curriculum[$idx]['isstart'] = $isstart;
            $curriculum[$idx]['ispause'] = $ispause;

            if(empty($lec['MultipleApply']) == true){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';
            }
            else if($lec['MultipleApply'] == '1'){
                // 무제한
                $curriculum[$idx]['timeover'] = 'N';
                $curriculum[$idx]['limittime'] = '무제한';
                $curriculum[$idx]['remaintime'] = '무제한';

            } elseif($lec['MultipleTypeCcd'] == '612001') {
                // 회차별 수강시간 체크

                // 수강시간은 초
                $studytime = intval($row['RealStudyTime']);

                // 제한시간 분 -> 초
                $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }

            } elseif($lec['MultipleTypeCcd'] == '612002') {
                // 패키치 수강시간 체크

                // 수강시간은 초
                $studytime = intval($lec['StudyTimeSum']);

                // 제한시간 분 -> 초
                $limittime = intval($lec['AllLecTime']) * 60;

                if($studytime > $limittime){
                    // 제한시간 초과
                    $curriculum[$idx]['timeover'] = 'Y';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = '0분';

                } else {
                    $curriculum[$idx]['timeover'] = 'N';
                    $curriculum[$idx]['limittime'] = round(intval($limittime) / 60).'분';
                    $curriculum[$idx]['remaintime'] = round(($limittime - $studytime)/60).'분';
                }
            }
        }

        // 사용자 가 BtoB 회원인지 체크
        $btob = $this->memberFModel->getBtobMember($this->session->userdata('mem_idx'));

        if(empty($btob) == false) {
            // BtoB 회원
            $lec['isBtob'] = 'Y';

            // 수강가능한 아이피인지 체크
            $btob_ip = $this->memberFModel->btobIpCheck($btob['BtobIdx']);

            if (empty($btob_ip) == true) {
                // 아이피 목록 없음
                $lec['enableIp'] = 'N';
            } elseif ($btob_ip['ApprovalIp'] == $this->input->ip_address()) {
                // 모델에서 확인했지만 다시한번
                $lec['enableIp'] = 'Y';
            } else {
                $lec['enableIp'] = 'N';
            }
        } else {
            $lec['isBtob'] = 'N';
            $lec['enableIp'] = 'Y';
        }

        return $this->load->view('/classroom/on/on_view', [
            'lec' => $lec,
            'curriculum' => $curriculum
        ]);
    }


    /**
     * 기간제패키지 강의 목록
     * @return object|string
     */
    public function ajaxMoreLecture()
    {
        $prodcode = $this->_req('ProdCode');
        $orderidx = $this->_req('OrderIdx');
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode
            ]
        ];
        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            $this->json_error('신청한 강좌정보가 없습니다.');
        }

        $passinfo = $passinfo[0];

        // 셀렉트박스 구해오기
        $cond_arr = [
            'EQ' => [
                'A.ProdCode' => $prodcode
            ]
        ];

        // 셀렉트박스용 데이타
        $course_arr = $this->classroomFModel->getPassSubLecture($cond_arr, 'DISTINCT C.CourseIdx, C.CourseName');
        $subject_arr = $this->classroomFModel->getPassSubLecture( $cond_arr,'DISTINCT C.SubjectIdx, C.SubjectName');
        $prof_arr = $this->classroomFModel->getPassSubLecture($cond_arr,'DISTINCT C.wProfIdx, C.wProfName');

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'A.ProdCode' => $prodcode,
                'C.SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'C.wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'C.CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정

            ],
            'LKB' => [
                'C.ProdName' => $this->_req('search_text') // 강의명 검색 (패키지명)
            ]
        ];

        $leclist = $this->classroomFModel->getPassSubLecture($cond_arr,'', ['EQ' => [
            'D.OrderIdx' => $passinfo['OrderIdx'],
            'D.OrderProdIdx' => $passinfo['OrderProdIdx']
        ]]);

        foreach($leclist as $idx => $row){
            $leclist[$idx]['ProdContents'] = $this->lectureFModel->findProductContents($row['ProdCode']);
            $leclist[$idx]['LectureUnits'] = $this->lectureFModel->findProductLectureUnits($row['ProdCode']);
        }

        return $this->load->view('/classroom/pass/layer/morelec', [
            'input_arr' => $input_arr,
            'passinfo' => $passinfo,
            'leclist' => $leclist,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr
        ]);
    }

    /**
     * 듣고 있는 강좌 교재 목록
     * @return object|string
     */
    public function ajaxMoreBook()
    {
        $orderidx = $this->_req("OrderIdx");
        $prodcode = $this->_req("ProdCode");

        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        $sess_mem_idx = $this->session->userdata('mem_idx');

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $sess_mem_idx, // 사용자번호
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode
            ]
        ];
        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            $this->json_error('신청한 강좌정보가 없습니다.');
        }

        $passinfo = $passinfo[0];

        // 수강중인 모든 강좌
        $data = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $passinfo['MemIdx'],
                'OrderIdx' => $passinfo['OrderIdx'],
                'ProdCode' => $passinfo['ProdCode'],
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
            ],
            'NOT' => [
                'ProdCode' => 'ProdCodeSub'
            ],
            'LKB' => [
                'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
            ]
        ]);

        foreach($data as $key => $row){
            if(empty($row['ProdBookData']) == false && $row['ProdBookData'] != 'N'){
                $booklist = json_decode($row['ProdBookData'], true);
                foreach($booklist as $idx => $book){
                    if($book['BookProvisionCcd'] == '610003'){
                        $book_paid_cnt = $this->orderListFModel->listOrderProduct(true, [
                            'EQ' => ['OP.MemIdx' => $sess_mem_idx, 'OP.ProdCode' => $book['ProdBookCode'], 'OP.PayStatusCcd' => '676001']
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

                $data[$key]['ProdBookData'] = $booklist;
            } else {
                $data[$key]['ProdBookData'] = [];
            }
        }

        return $this->load->view('/classroom/pass/layer/morebook', [
            'data' => $data
        ]);
    }

    /**
     * 내 디바이스 목록
     * @return object|string
     */
    public function layerMyDevice()
    {
        // PC등록수
        $data['pc_cnt'] = $this->classroomFModel->getMyDevice(true, ['EQ' => [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'DeviceType' => 'P',
            'IsUse' => 'Y'
        ]]);
        
        // 모바일 등록수
        $data['mobile_cnt'] = $this->classroomFModel->getMyDevice(true, ['EQ' => [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'DeviceType' => 'M',
            'IsUse' => 'Y'
        ]]);

        // 총 초기화 횟수
        $data['reset_cnt'] = $this->classroomFModel->getMyDevice(true, ['EQ' => [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'IsUse' => 'N'
        ]]);
        
        // 사용자 초기화 가능횟수
        $data['member_reset'] = ($data['reset_cnt'] == 0) ? 1 : 0;

        // 리스트
        $data['count'] = $this->classroomFModel->getMyDevice(true, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx')
            ]
        ]);

        return $this->load->view('/classroom/pass/layer/mydevice', ['data' => $data]);
    }


    public function ajaxMyDevice()
    {
        $pagesize = 5;

        $sdate = $this->_req('sdate');
        $edate = $this->_req('edate');
        $page = $this->_req('page');
        // 총 초기화 횟수
        $data['reset_cnt'] = $this->classroomFModel->getMyDevice(true, ['EQ' => [
            'MemIdx' => $this->session->userdata('mem_idx'),
            'IsUse' => 'N'
        ]]);

        // 리스트
        $data['count'] = $this->classroomFModel->getMyDevice(true, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx')
            ],
            'GT' => [
                'RegDatm' => $sdate
            ],
            'LT' => [
                'RegDatm' => $edate
            ]
        ]);
        if($data['count'] > 0) {


            if (is_numeric($page) == false) {
                $page = 1;
            } else if ($page < 1) {
                $page = 1;
            } elseif ($page > $data['count']) {
                $page = $data['count'];
            }

            $offset = ($page - 1) * $pagesize;
            $data['list'] = $this->classroomFModel->getMyDevice(false, [
                'EQ' => [
                    'MemIdx' => $this->session->userdata('mem_idx')
                ],
                'GT' => [
                    'RegDatm' => $sdate
                ],
                'LT' => [
                    'RegDatm' => $edate
                ]
            ], $pagesize, $offset);

            $data['page'] = $page;
            $data['totalpage'] = ceil($data['count'] / $pagesize);

        } else {
            $data['page'] = 1;
            $data['totalpage'] = 0;
            $data['list'] = [];
        }

        return $this->load->view('/classroom/pass/layer/ajax_mydevice', [
            'data' => $data
        ]);
    }

    public function delMyDevice()
    {
        $mdidx = $this->_req('mdidx');

        $list = $this->classroomFModel->getMyDevice(true, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'Mdidx' => $mdidx
            ]
        ]);

        if($list < 1){
            return $this->json_error('초기화할 기기 정보가 없습니다.');
        }

        $list = $this->classroomFModel->getMyDevice(true, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'IsUse' => 'N'
            ]
        ]);

        if($list > 0){
            return $this->json_error('사용자 초기화는 1번만 가능합니다.');
        }

        if($this->classroomFModel->delMyDevice($mdidx, $this->session->userdata('mem_idx')) == false){
            return $this->json_error('초기화에 실패했습니다.');
        }

        return $this->json_result(true, '성공');
    }


    /**
     * 강의 추가
     * @return CI_Output
     */
    public function addLecture()
    {
        $orderidx = $this->_req('OrderIdx');
        $prodcode = $this->_req('ProdCode');
        $prodcodesub = $this->_req('ProdCodeSub');

        $today = date("Y-m-d", time());

        if(is_array($prodcodesub) == false || empty($prodcodesub) == true){
            return $this->json_error('선택한강의가 없습니다.');
        }

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'ProdCode' => $prodcode,
                'OrderIdx' => $orderidx
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
            ]
        ];

        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            return $this->json_error('신청한 강좌정보가 없습니다.');
        }

        $passinfo = $passinfo[0];

        foreach($prodcodesub as $subcode){

            // 서브강좌 목록에 있는지 체크
            $leclist = $this->packageFModel->subListProduct('periodpack_lecture', $passinfo['ProdCode'], [
                'EQ' => [
                    'C.ProdCode' => $subcode
                ]
            ]);

            if(empty($leclist) == true){
                continue;
                //return $this->json_error('신청할수 없는 강좌입니다.');
            }

            // 이미 등록된 강좌인지 체크
            $count = $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $passinfo['MemIdx'],
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'ProdCodeSub' => $subcode
                ]
            ], [], true);

            if($count > 0){
                continue; // 이미 등록강좌 다음
                //return $this->json_error('이미 등록된 강좌입니다.');
            }

            if($this->classroomFModel->addPassLecture([
                    'OrderIdx' => $passinfo['OrderIdx'],
                    'OrderProdIdx' => $passinfo['OrderProdIdx'],
                    'ProdCode' => $passinfo['ProdCode'],
                    'ProdCodeSub' => $subcode,
                    'LecStartDate' => $passinfo['LecStartDate'],
                    'LecEndDate' => $passinfo['LecEndDate'],
                    'RealLecEndDate' => $passinfo['RealLecEndDate'],
                    'LecExpireDay' => $passinfo['LecExpireDay'],
                    'RealLecExpireDay' => $passinfo['RealLecExpireDay']
                ]) == false){
                continue; // 추가 실패 다음
                //return $this->json_error('강좌추가에 실패했습니다.\n다시 시도해주십시요.');
            }

        }

        return $this->json_result(true, '강좌를 추가했습니다.');
    }

    /**
     * 즐겨찾기/숨기기 설정
     * @param array $params
     * @return CI_Output
     */
    public function set($params = [])
    {
        if(empty($params[0]) == true){
            return $this->json_error('처리할수 없습니다.');
        }

        $cmd = $params[0];

        if($cmd == 'like') {
            $input = ['IsLiked' => 'Y'];
        } else if($cmd == 'hide') {
            $input = ['IsDisp' => 'N'];
        } else {
            return $this->json_error('처리할수 없습니다.');
        }

        $orderidx = $this->_req('OrderIdx');
        $orderprodidx = $this->_req('OrderProdIdx');
        $prodcode = $this->_req('ProdCode');
        $prodcodesub = $this->_req('ProdCodeSub');

        $cond = [
            'OrderIdx' => $orderidx,
            'OrderProdIdx' => $orderprodidx,
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub
        ];

        $today = date("Y-m-d", time());

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'ProdCode' => $prodcode,
                'OrderIdx' => $orderidx
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
            ]
        ];

        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            return $this->json_error('신청한 강좌정보가 없습니다.');
        }

        if($this->classroomFModel->setLikeHide($input, $cond) == true){
            return $this->json_result(true, '변경 처리했습니다.');
        } else {
            return $this->json_error('변경에 실패했습니다.\n다시 시도해주십시요.');
        }
    }

    /**
     * 즐겨찾기/숨기기 취소
     * @param array $params
     * @return CI_Output
     */
    public function unset($params = [])
    {
        if(empty($params[0]) == true){
            return $this->json_error('처리할수 없습니다.');
        }

        $cmd = $params[0];

        if($cmd == 'like') {
            $input = ['IsLiked' => 'N'];
        } else if($cmd == 'hide') {
            $input = ['IsDisp' => 'Y'];
        } else {
            return $this->json_error('처리할수 없습니다.');
        }

        $orderidx = $this->_req('OrderIdx');
        $orderprodidx = $this->_req('OrderProdIdx');
        $prodcode = $this->_req('ProdCode');
        $prodcodesub = $this->_req('ProdCodeSub');

        $cond = [
            'OrderIdx' => $orderidx,
            'OrderProdIdx' => $orderprodidx,
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub
        ];

        $today = date("Y-m-d", time());

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'ProdCode' => $prodcode,
                'OrderIdx' => $orderidx
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 학습방식 : 기간제패키지
            ]
        ];

        // 학습형태 : 기간제패키지
        $passinfo = $this->classroomFModel->getPackage($cond_arr);

        if(empty($passinfo) == true){
            return $this->json_error('신청한 강좌정보가 없습니다.');
        }

        if($this->classroomFModel->setLikeHide($input, $cond) == true){
            return $this->json_result(true, '변경 처리했습니다.');
        } else {
            return $this->json_error('변경에 실패했습니다.\n다시 시도해주십시요.');
        }
    }
}
