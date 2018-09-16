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
            case 'standby':
                $this->standby();
                break;

            case 'ongoing':
                $this->ongoing();
                break;

            case 'pause':
                $this->pause();
                break;

            case 'end':
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

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'GT' => [
                'LecStartDate' => date("Y-m-d", time())
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

        // 나머지 선택 검색
        $cond_arr = [
            'GT' => [
                'LecStartDate' => date("Y-m-d", time())
            ],
            'EQ' => [
                'SubjectIdx' => $this->_req('subject_ccd'),
                'wProfIdx' => $this->_req('prof_ccd'),
                'CourseIdx' => $this->_req('course_ccd'),
                'MemIdx' => $this->session->userdata('mem_idx')
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'),
                    'subProdName' => $this->_req('search_text')
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615003'],
                'PayRouteCcd' => ['670001','670002']
            ]
        ];

        $leclist = $this->classroomFModel->getSingleLec($cond_arr);
        $pkglist = $this->classroomFModel->getPackage($cond_arr);

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
     *  수강중인강의
     */
    public function ongoing()
    {
        // 검색
        $input_arr = $this->_reqG(null);

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()),
                'lastPauseEndDate' => date("Y-m-d", time())
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time())
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx')
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

        // 나머지 선택 검색
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'SubjectIdx' => $this->_req('subject_ccd'),
                'wProfIdx' => $this->_req('prof_ccd'),
                'CourseIdx' => $this->_req('course_ccd')
            ],
            'LTE' => [
                'LecStartDate' => date("Y-m-d", time()),
                'lastPauseEndDate' => date("Y-m-d", time())
            ],
            'GTE' => [
                'RealLecEndDate' => date("Y-m-d", time())
            ],
            'ORG' => [
                'LKB' => [
                    'ProdName' => $this->_req('search_text'),
                    'subProdName' => $this->_req('search_text')
                ]
            ],
            'IN' => [
                'LearnPatternCcd' => ['615001','615003'],
                'PayRouteCcd' => ['670001','670002']
            ]
        ];

        $leclist = $this->classroomFModel->getSingleLec($cond_arr);
        $pkglist = $this->classroomFModel->getPackage($cond_arr);

        return $this->load->view('/classroom/on_ongoing', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist
        ]);
    }

    /**
     *  일시중지강의
     */
    public function pause()
    {
        // 검색
        $input_arr = $this->_reqG(null);

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'GT' => [
                'LecStartDate' => date("Y-m-d", time())
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






        $this->load->view('/classroom/on_pause', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => [],
            'pkgList' => []
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
            'GT' => [
                'LecStartDate' => date("Y-m-d", time())
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






        $this->load->view('/classroom/on_end', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => [],
            'pkgList' => []
        ]);
    }

    /**
     * 실세 강의 상세페이지
     * @param array $params
     */
    public function view()
    {
        $this->load->view('/classroom/on_view');
    }

}