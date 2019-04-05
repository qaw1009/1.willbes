<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class On extends \app\controllers\FrontController
{
    protected $models = array('classroomF' , 'order/orderListF', 'memberF');
    protected $helpers = array('download','file');
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];

    // 강의형태 단과/사용자패키지/운영자패키지/무료
    protected $_LearnPatternCcd_dan = ['615001','615002'];
    protected $_LearnPatternCcd_free = ['615005'];
    protected $_LearnPatternCcd_pkg = ['615003'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  강좌리스트 분기
     */
    public function list($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/classroom/on/list/ongoing/');
        }

        switch($params[0]) {
            case 'standby': // 수강대기강좌
                $this->standby();
                break;

            case 'ongoing': // 수강중인강좌 ( 일지중지웅이 아님)
                $this->ongoing();
                break;

            case 'pause': // 수강중인강좌중 일시중지중인 강좌
                $this->pause();
                break;

            case 'end': // 수강종료 강좌
                $this->end();
                break;

            default:
                redirect('/classroom/on/list/ongoing/');
                break;
        }
    }


    /**
     * 수강대기 강의
     * @return object|string
     */
    public function standby()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 셀렉트박스 구해오기
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자
            ],
            'GT' => [
                'LecStartDate' => $today // 시작일 > 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free, $this->_LearnPatternCcd_pkg) // 학습형태
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 목록 뽑아오기
        $cond_arr = [
            'GT' => [
                'LecStartDate' => $today // 시작일 > 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 검색 : 패키지이름 
                    'subProdName' => $this->_req('search_text') // 검색 : 단과이름
                ]
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'OrderDate^DESC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
            ],
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ]
        ]));

        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자
            ],
            'IN' => [
                'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
            ]
        ]), $orderby);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        return $this->load->view('/classroom/on/on_standby', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist
        ]);
    }


    /**
     * 수강중인 강의
     * @return object|string
     */
    public function ongoing()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 셀렉트박스 수해오기
        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today // 시작일이 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ],
            'IN' => [
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free, $this->_LearnPatternCcd_pkg), // 학습방식 : 단과, 사용자, 패키지, 무료
                'PayRouteCcd' => $this->_payroute_normal_ccd // 결제루트 : 온, 방
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
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
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'OrderDate^DESC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan,
                'PayRouteCcd' => $this->_payroute_normal_ccd
            ],
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ]
        ]), $orderby);

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자번호
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg,
                'PayRouteCcd' => $this->_payroute_normal_ccd
            ]
        ]), $orderby);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        // 학습형태 : 무료강좌
        // 결제방식 : 모두
        $freelist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_free // 무료
            ],
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ]
        ]), $orderby);

        // 학습형태 : 단과반
        // 결제방식 : 0월결제, 무료결제\, 제휴사 결제
        $adminlistLec = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                'PayRouteCcd' => $this->_payroute_admin_ccd // 0원, 무료, 제휴사
            ],
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ]
        ]), $orderby);

        // 학습형태 : 관리자패키지
        // 결제방식 : 0월결제, 무료결제\, 제휴사 결제
        $adminlistPkg = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자번호
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg, // 단과, 사용자
                'PayRouteCcd' => $this->_payroute_admin_ccd // 0원, 무료, 제휴사
            ]
        ]), $orderby);
        foreach($adminlistPkg as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ], $orderby);

            $adminlistPkg[$idx]['subleclist'] = $pkgsublist;
        }

        // 관리자부여 : lec + pkg
        $adminlist = [ 'lec' => $adminlistLec, 'pkg' => $adminlistPkg ];

        return $this->load->view('/classroom/on/on_ongoing', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist,
            'freeList' => $freelist,
            'adminList' => $adminlist
        ]);
    }


    /**
     *  일시중지강의
     */
    public function pause()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today // 시작일이 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today, // 종료일 >= 오늘
                'lastPauseEndDate' => $today // 일시정지종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 학습방식 : 단과, 사용자
                'PayRouteCcd' => $this->_payroute_normal_ccd // 결제루트 : 온, 방
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today, // 종료일 >= 오늘
                'lastPauseEndDate' => $today // 일시중지종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (사용자패키지일때 패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'lastPauseStartDate^ASC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
            ],
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ]
        ]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'EQ' => [
                'SiteGroupCode' => $this->_req('sitegroup_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자번호
            ],
            'IN' => [
                'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
            ]
        ]), $orderby);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        return $this->load->view('/classroom/on/on_pause', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist
        ]);
    }


    /**
     *  수강종료 강의
     */
    public function end()
    {
        //app_to_env_url($this->getSiteCacheItem('2001', 'SiteUrl'));
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'LT' => [
                'RealLecEndDate' => $today // 종료날짜 < 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free, $this->_LearnPatternCcd_pkg),
                'PayRouteCcd' => $this->_payroute_normal_ccd
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자
                'IsRebuy' => '0' // 재수강이 아닌강의
            ]
        ];

        // 셀렉트박스용 데이타
        $sitegroup_arr = $this->classroomFModel->getSiteGroupList($cond_arr);
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'IsRebuy' => '0' // 재수강이 아닌강의
            ],
            'LT' => [
                'RealLecEndDate' => $today, // 종료일 < 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (사용자패키지일때 패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ],
            'GTE' => [
                'RealLecEndDate' => element('search_start_date', $input_arr)
            ],
            'LTE' => [
                'RealLecEndDate' => element('search_end_date', $input_arr)
            ]
        ];

        $orderby = element('orderby', $input_arr);
        $orderby = (empty($orderby) == true) ? 'OrderDate^DESC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, ['IN' => [
            'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
            'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
        ]]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
            ]
        ]), $orderby);

        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        return $this->load->view('/classroom/on/on_end', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist
        ]);
    }


    /**
     * 강의 상세페이지
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
            ]);

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

        // 회차 열어준경우 IN 생성
        if(empty($lec['wUnitIdxs']) == true){
            $wUnitIdxs = [];
        } else {
            $wUnitIdxs = explode(',', $lec['wUnitIdxs']);
        }

        // 커리큘럼 읽어오기
        $curriculum = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx']
            ],
            'IN' => [
                'wUnitIdx' => $wUnitIdxs
            ]
        ]);

        // 회차별 수강시간 체크
        foreach($curriculum AS $idx => $row){
            $curriculum[$idx]['isstart'] = $isstart;
            $curriculum[$idx]['ispause'] = $ispause;

            if(empty($row['wUnitAttachFile']) == false){
                $curriculum[$idx]['downcount'] = $this->classroomFModel->getDownLog([
                    'EQ' => [
                        'MemIdx' => $this->session->userdata('mem_idx'),
                        'OrderIdx' => $orderidx,
                        'ProdCode' => $prodcode,
                        'ProdCodeSub' => $prodcodesub,
                        'wLecIdx' => $lec['wLecIdx'],
                        'wUnitIdx' => $row['wUnitIdx']
                    ]
                ]);
            } else {
                $curriculum[$idx]['downcount'] = 0;
            }

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
                if($row['RealExpireTime'] == 0){
                    $limittime = intval($row['wRuntime']) * intval($lec['MultipleApply']) * 60;
                } else {
                    $limittime = intval($row['RealExpireTime']) * 60;
                }

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
                $limittime = intval($lec['RealExpireTime']) * 60;

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
        if(empty($btob['BtobIdx']) == false) {
            // BtoB 회원
            $lec['isBtob'] = 'Y';

            // 수강가능한 아이피인지 체크
            $btob_ip = $this->memberFModel->btobIpCheck($btob['BtobIdx']);

            if (empty($btob_ip['ApprovalIp']) == true) {
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
     * 수강시작일 변경 레이어
     * @return CI_Output|object|string
     */
    function layerStartDate()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        $cond_arr = [
            'GT' => [
                'LecStartDate' => $today // 시작일 > 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($lec['IsLecStart'] != 'Y'){
            return $this->json_error('시작일을 변경할 수 없는 강좌입니다.');
        }

        if($lec['ChgStartNum'] >= 3) {
            //return $this->json_error('시작일 변경횟수를 초과했습니다.');
        }

        $log = $this->classroomFModel->getStartDateLog([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ]
        ]);

        return $this->load->view('/classroom/on/layer/change_start_date', [
            'lec' => $lec,
            'log' => $log
        ]);
    }


    /**
     * 오늘부터 시작처리
     */
    function setStartToday()
    {
        $today = date("Y-m-d", time());
        $this->setStartDate($today);
    }


    /**
     * 시작일 설정
     * @param null $start_date
     * @return CI_Output
     */
    function setStartDate($start_date = null)
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');
        $today = date("Y-m-d", time());

        if(empty($start_date) === true){
            $start_date = $this->_req("startdate");
        }

        if(empty($start_date) === true){
            return $this->json_error('시작일이 잘못된 날짜 입니다.');
        }

        if(strtotime($start_date) == false){
            return $this->json_error('시작일이 잘못된 날짜 입니다.');
        }

        if($start_date < $today){
            return $this->json_error('시작일은 오늘 이후 날짜만 가능합니다.');
        }

        $cond_arr = [
            'GT' => [
                'LecStartDate' => $today // 시작일 > 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]), $orderby);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($lec['IsLecStart'] != 'Y'){
            return $this->json_error('시작일을 변경할 수 없는 강좌입니다.');
        }

        if($lec['ChgStartNum'] >= 3) {
            if($start_date != $today){
                return $this->json_error('시작일 변경횟수를 초과했습니다.');
            }
        }

        if($lec['IsRebuy'] > 0 || $lec['RebuyCount'] > 0){
            return $this->json_error('수강연장 강의는 시작일 변경이 불가능합니다.');
        }


        if($start_date > date("Y-m-d", strtotime(substr($lec['OrderDate'], 10).'+30day'))){
            return $this->json_error('시작일은 주문일로부터 30일 이내만 변경 가능합니다.');
        }

        if($this->classroomFModel->setStartDate([
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ], $start_date) === true){
            return $this->json_result(true);
        } else {
            return $this->json_error('강의 시작일 변경중에 오류가 발생했습니다.');
        }
    }


    /**
     * 일시중지 레이어
     * @return CI_Output|object|string
     */
    public function layerPause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today, // 시작일 <= 오늘
                'lastPauseEndDate' => $today // 일시중지종료일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($lec['IsPause'] != 'Y'){
            return $this->json_error('일시중지할 수 없는 강좌입니다.');
        }

        $PauseRemain = $lec['LecExpireDay'] - $lec['PauseSum'];

        if($PauseRemain < 0){
            $PauseRemain = 0;
        }

        if($PauseRemain > $lec['remainDays']){
            $PauseRemain = $lec['remainDays'];
        }

        $lec['PauseRemain'] = $PauseRemain;


        $log = $this->classroomFModel->getPauseLog([
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'OrderProdIdx' => $lec['OrderProdIdx']
            ]
        ]);

        return $this->load->view('/classroom/on/layer/pause', [
            'lec' => $lec,
            'log' => $log
        ]);
    }


    /**
     * 일시중지 처리
     * @return CI_Output
     */
    public function setPause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');
        $enddate = $this->_req("enddate");

        $today = date("Y-m-d", time());

        if(empty($enddate) === true){
            return $this->json_error('일시중지 종료일이 잘못된 날짜 입니다.');
        }

        if(strtotime($enddate) == false){
            return $this->json_error('일시중지 종료일이 잘못된 날짜 입니다.');
        }

        if($enddate < $today){
            return $this->json_error('일시중지 종료일이 오늘 이후 날짜만 가능합니다.');
        }

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today, // 시작일 <= 오늘
                'lastPauseEndDate' => $today // 일시중지종료일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]), $orderby);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($lec['IsPause'] != 'Y'){
            return $this->json_error('일시중지할 수 없는 강좌입니다.');
        }

        if($lec['IsRebuy'] > 0 || $lec['RebuyCount'] > 0){
            return $this->json_error('수강연장 강의는 일시중지가 불가능합니다.');
        }

        $PauseRemain = $lec['LecExpireDay'] - $lec['PauseSum'];

        if($PauseRemain > $lec['remainDays']){
            $PauseRemain = $lec['remainDays'];
        }

        if($PauseRemain <= 0){
            return $this->json_error('일시중지 기간을 초과했습니다.');
        }

        if($lec['RealLecEndDate'] < $enddate){
            return $this->json_error('일시중지 기간은 강의 종료일을 초과할 수 없습니다.');
        }

        // 날짜 계산
        $PauseDay = intval((strtotime($enddate)-strtotime($today))/86400) +1;

        if( $this->classroomFModel->setPause([
            'MemIdx' => $memidx,
            'OrderIdx' => $orderidx,
            'OrderProdIdx' => $lec['OrderProdIdx'],
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub,
            'lecstartdate' => $lec['LecStartDate'],
            'realecexpireday' => $lec['LecExpireDay'] + $PauseDay + $lec['PauseSum'] + $lec['ExtenSum'],
            'pausestartdate' => $today,
            'pauseenddate' => $enddate,
            'pauseday' => $PauseDay
            ]) == true){
            return $this->json_result(true,'일시중지 성공');
        } else {
            return $this->json_error('일시중지중 에러발생');
        }
    }


    /**
     * 일시중지해제처리
     * @return CI_Output
     */
    public function restartPause()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today, // 종료일 >= 오늘
                'lastPauseEndDate' => $today // 일시중지종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx, // 사용자
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($prodtype === 'S'){
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]));

        } else if($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => $this->_payroute_normal_ccd // 온, 방
                ]
            ]), $orderby);

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if(count($leclist) == 1){
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if($this->classroomFModel->setRestartPause([
            'MemIdx' => $memidx,
            'OrderIdx' => $orderidx,
            'OrderProdIdx' => $lec['OrderProdIdx'],
            'ProdCode' => $prodcode,
            'ProdCodeSub' => $prodcodesub,
            'lecstartdate' => $lec['LecStartDate'],
            'realecexpireday' => $lec['RealLecExpireDay']
        ]) == true){
            return $this->json_result(true, '일시정지가 해제되었습니다.');
        } else {
            return $this->json_error('일시정지 해제에 실패했습니다.');
        }
    }


    public function layerExtend()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $prodtype = $this->_req('prodtype');
        $memidx = $this->session->userdata('mem_idx');

        $today = date("Y-m-d", time());

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => $today, // 시작일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $memidx,
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if ($prodtype === 'S') {
            $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
                    'PayRouteCcd' => ['670001', '670002','670006'] // 온, 방
                ]
            ]));

        } else if ($prodtype === 'P') {
            $leclist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'PayRouteCcd' => ['670001', '670002','670006'] // 온, 방
                ]
            ]));

        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if (count($leclist) == 1) {
            $lec = $leclist[0];
        } else {
            return $this->json_error('신청강좌정보를 찾을수 없습니다.');
        }

        if ($lec['IsExten'] != 'Y') {
            return $this->json_error('연장신청을 할 수 없는 강좌입니다.');
        }

        $lec['ProdPriceData'] = json_decode($lec['ProdPriceData'], true);

        foreach ($lec['ProdPriceData'] as $key => $row) {
            if ($row['SaleTypeCcd'] == $lec['SaleTypeCcd']) {
                $lec['ExtenPrice'] = $row['SalePrice'];
            }
        }

        if ($lec['ExtenPrice'] <= 0) {
            return $this->json_error('연장신청을 할 수 없는 강좌입니다.');
        }

        $lec['ExtenLimit'] = round($lec['StudyPeriod'] / 2);
        $lec['ExtenPrice'] = floor($lec['ExtenPrice'] / $lec['StudyPeriod']);
        $lec['SiteUrl'] = app_to_env_url($this->getSiteCacheItem($lec['SiteCode'], 'SiteUrl'));

        if ($lec['IsRebuy'] > 0) {
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $memidx,
                    'TargetOrderIdx' => $lec['TargetOrderIdx'],
                    'TargetProdCode' => $lec['TargetProdCode'],
                    'TargetProdCodeSub' => $lec['TargetProdCodeSub'],
                ]
            ];

        } else {
            $cond_arr = [
                'EQ' => [
                    'MemIdx' => $memidx,
                    'TargetOrderIdx' => $orderidx,
                    'TargetProdCode' => $prodcode,
                    'TargetProdCodeSub' => $prodcodesub
                ]
            ];
        }

        // 재수강로그
        $log = $this->classroomFModel->getRebuyLog($cond_arr);

        return $this->load->view('/classroom/on/layer/extend', [
            'lec' => $lec,
            'log' => $log
        ]);
    }


    public function download($params = [])
    {

        $today = date("Y-m-d", time());
        $ispause = 'N';
        $isstart = 'Y';

        // 강좌정보 읽어오기
        $orderidx = $params[0];
        $prodcode = $params[1];
        $prodcodesub = $params[2];
        $lecidx = $params[3];
        $unitidx = $params[4];

        if(empty($orderidx) === true
            || empty($prodcode) === true
            || empty($prodcodesub) === true
            || empty($lecidx) === true
            || empty($unitidx) === true ){
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
            show_alert('아직 시작되지 않은 강의입니다.', 'back');
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            show_alert('일시중지중인 강의입니다.', 'back');
        }

        // 커리큘럼 읽어오기
        $curriculum = $this->classroomFModel->getCurriculum([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lec['wLecIdx'],
                'wUnitIdx' => $unitidx
            ]
        ]);

        if(empty($curriculum) == true){
            show_alert('회차정보가 존재하지 않습니다.', 'back');
        }
        $curriculum = $curriculum[0];

        $filepath = str_replace( '//', '/', $curriculum['wAttachPath'] .'/'. $curriculum['wUnitAttachFile']);
        $filename = $curriculum['wUnitAttachFileReal'];

        if(is_file(public_to_upload_path($filepath)) == false){
            show_alert('파일이 존재하지 않습니다.', 'back');
        }

        // 파일 다운로드 로그남기기
        $this->classroomFModel->storeDownloadLog(
            [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'wLecIdx' => $lecidx,
                'wUnitIdx' => $unitidx
            ]
        );
        
        // 실제로 파일 다운로드 처리
        public_download($filepath, $filename);
    }

    public function layerBooklist($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');

        $SiteCode = $this->_req("SiteCode");
        $ProdCode = $this->_req("ProdCode");

        $booklist = $this->classroomFModel->getBooklist([
            'EQ' => [
                'ProdCode' => $ProdCode
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

        return $this->load->view('/classroom/on/layer/booklist', [
            'booklist' => $booklist,
            'SiteUrl' => app_to_env_url($this->getSiteCacheItem($SiteCode, 'SiteUrl'))
        ]);
    }

}