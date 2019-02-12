<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends \app\controllers\FrontController
{
    protected $models = array('classroomF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];

    // 강의형태 단과/사용자패키지/운영자패키지/무료
    protected $_LearnPatternCcd_dan = ['615001','615002'];
    protected $_LearnPatternCcd_free = ['615005'];
    protected $_LearnPatternCcd_pass = ['615004'];
    protected $_LearnPatternCcd_pkg = ['615003'];

    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
// 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
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
        $course_arr = $this->classroomFModel->getCourseList($cond_arr);
        $subject_arr = $this->classroomFModel->getSubjectList( $cond_arr);
        $prof_arr = $this->classroomFModel->getProfList($cond_arr);

        // 실제 리스트용
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd'), // 검색 : 과정
                'IsRebuy' => '0' // 재수강이 아닌강의
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
        $orderby = (empty($orderby) == true) ? 'lastStudyDate^DESC' : $orderby;
        // 최신순으로

        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        // 학습형태 : 기간제패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $passlist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass, // 기간제패키지
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd) // 온, 방
            ]
        ]), $orderby);

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLecture(array_merge($cond_arr, ['IN' => [
            'LearnPatternCcd' => $this->_LearnPatternCcd_dan, // 단과, 사용자
            'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd) // 온, 방
        ]]));

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $freelist = $this->classroomFModel->getLecture(array_merge($cond_arr, ['IN' => [
            'LearnPatternCcd' => $this->_LearnPatternCcd_free, // 무료강의
            'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd) // 온, 방
        ]]));

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg, // 운영자패키지
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd) // 온, 방
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

        return $this->load->view('/classroom/certificate/list', [
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'passList' => $passlist,
            'lecList' => $leclist,
            'pkgList' => $pkglist,
            'freeList' => $freelist
        ]);

    }

    public function view()
    {
        return $this->load->view('/classroom/certificate/view', ['data' => []]);
    }

}