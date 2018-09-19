<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class On extends \app\controllers\FrontController
{
    protected $models = array('classroomF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

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

        // 셀렉트박스 구해오기
        $cond_arr = [
            'GT' => [
                'LecStartDate' => date("Y-m-d", time()) // 시작일 > 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615002','615003','615005'] // 학습형태
            ]
        ];

        // 셀렉트박스용 데이타
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 목록 뽑아오기
        $cond_arr = [
            'GT' => [
                'LecStartDate' => date("Y-m-d", time()) // 시작일 > 오늘
            ],
            'EQ' => [
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 검색 : 패키지이름 
                    'subProdName' => $this->_req('search_text') // 검색 : 단과이름
                ]
            ]
        ];

        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => ['615001','615002'], // 단과, 사용자
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));

        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));
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

        return $this->load->view('/classroom/on_standby', [
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

        // 셀렉트박스 수해오기
        $cond_arr = [
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()), // 시작일이 <= 오늘
                'lastPauseEndDate' => date("Y-m-d", time()) // 일시정지종료일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time()) // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615002','615003','615005'], // 학습방식 : 단과, 사용자, 패키지, 무료
                'PayRouteCcd' => ['670001','670002'] // 결제루트 : 온, 방
            ]
        ];

        // 셀렉트박스용 데이타
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()), // 시작일 <= 오늘
                'lastPauseEndDate' => date("Y-m-d", time()) // 일시중지종료일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time()) // 종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => ['615001','615002'], // 단과, 사용자
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));
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
                'LearnPatternCcd' => ['615005'] // 무료
            ]
        ]));

        // 학습형태 : 단과반
        // 결제방식 : 0월결제, 무료결제\, 제휴사 결제
        $adminlistLec = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => ['615001','615002'], // 단과, 사용자
                'PayRouteCcd' => ['670003','670004','670005'] // 0원, 무료, 제휴사
            ]
        ]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 0월결제, 무료결제\, 제휴사 결제
        $adminlistPkg = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => ['670003','670004','670005'] // 0원, 무료, 제휴사
            ]
        ]));
        foreach($adminlistPkg as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLecture([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $adminlistPkg[$idx]['subleclist'] = $pkgsublist;
        }

        // 관리자부여 : lec + pkg
        $adminlist = [ 'lec' => $adminlistLec, 'pkg' => $adminlistPkg ];

        return $this->load->view('/classroom/on_ongoing', [
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

        $cond_arr = [
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()) // 시작일이 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time()), // 종료일 >= 오늘
                'lastPauseEndDate' => date("Y-m-d", time()) // 일시정지종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx') // 사용자 아이디
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615002'], // 학습방식 : 단과, 사용자
                'PayRouteCcd' => ['670001','670002'] // 결제루트 : 온, 방
            ]
        ];

        // 셀렉트박스용 데이타
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()) // 시작일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time()), // 종료일 >= 오늘
                'lastPauseEndDate' => date("Y-m-d", time()) // 일시중지종료일 >= 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (사용자패키지일때 패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, ['IN' => [
            'LearnPatternCcd' => ['615001','615002'], // 단과, 사용자
            'PayRouteCcd' => ['670001','670002'] // 온, 방
        ]]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));
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

        return $this->load->view('/classroom/on_pause', [
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
        // 검색
        $input_arr = $this->_reqG(null);

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'LT' => [
                'RealLecEndDate' => date("Y-m-d", time()) // 종료날짜 < 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615002','615003','615005'],
                'PayRouteCcd' => ['670001','670002']
            ]
        ];

        // 셀렉트박스용 데이타
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'LT' => [
                'RealLecEndDate' => date("Y-m-d", time()), // 종료일 < 오늘
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'), // 강의명 검색 (사용자패키지일때 패키지명)
                    'subProdName' => $this->_req('search_text') // 강의명 검색 (실제 강좌명)
                ]
            ]
        ];

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, ['IN' => [
            'LearnPatternCcd' => ['615001','615002'], // 단과, 사용자
            'PayRouteCcd' => ['670001','670002'] // 온, 방
        ]]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'PayRouteCcd' => ['670001','670002'] // 온, 방
            ]
        ]));
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

        return $this->load->view('/classroom/on_end', [
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
        $today = date('Y-m-d');
        $ispause = 'N';

        // 강좌정보 읽어오기
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodsub');
        $prodcodesub = $this->_req('prodcodesub');

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ]);

        if(empty($lec) === true){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        if($lec['LecStartDate'] > $today){
            $canTake = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $canTake = 'N';
            $ispause = 'Y';
        } else {
            $canTake = 'Y';
        }

        $lec['ProfReferData'] = json_decode($lec['ProfReferData'], true);

        // 커리큘럼 읽어오기

        $data = [
            'cantake' => $canTake,
            'ispause' => $ispause
        ];

        return $this->load->view('/classroom/on_view', [
            'data' => $data,
            'lec' => $lec,
            'curriculum' => []
        ]);
    }

}