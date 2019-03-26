<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'memberF');
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
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free, $this->_LearnPatternCcd_pkg, $this->_LearnPatternCcd_pass), // 학습방식 : 단과, 사용자, 패키지, 무료
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd) // 결제루트 : 온, 방
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
        $orderby = (empty($orderby) == true) ? 'lastStudyDate^DESC' : $orderby;
        // 최신순으로
        @list($orderby, $asc_desc) = @explode("^", $orderby);
        if(empty($asc_desc) == false){
            $orderby = [
                $orderby => $asc_desc
            ];
        }

        // 학습형태 : 단광좌, 사용자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $leclist = $this->classroomFModel->getLectureBookmark(array_merge($cond_arr, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan,
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd)
            ]
        ]), $orderby);

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $pkglist = $this->classroomFModel->getPackageBookmark(array_merge($cond_arr, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg,
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd)
            ]
        ]), $orderby);
        foreach($pkglist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLectureBookmark([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        // 학습형태 : 관리자패키지
        // 결제방식 : 온라인결제, 학원방문결제
        $passlist = $this->classroomFModel->getPackageBookmark(array_merge($cond_arr, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass,
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd)
            ]
        ]), $orderby);
        foreach($passlist as $idx => $row){
            $pkgsublist =  $this->classroomFModel->getLectureBookmark([
                'EQ' => [
                    'MemIdx' => $row['MemIdx'],
                    'OrderIdx' => $row['OrderIdx'],
                    'ProdCode' => $row['ProdCode']
                ]
            ]);

            $passlist[$idx]['subleclist'] = $pkgsublist;
        }

        // 학습형태 : 무료강좌
        // 결제방식 : 모두
        $freelist = $this->classroomFModel->getLectureBookmark(array_merge($cond_arr, [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
                'SubjectIdx' => $this->_req('subject_ccd'), // 검색 : 과목
                'wProfIdx' => $this->_req('prof_ccd'), // 검색 : 강사
                'CourseIdx' => $this->_req('course_ccd') // 검색 : 과정
            ],
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_free // 무료
            ]
        ]), $orderby);

        return $this->load->view('/classroom/bookmark/list', [
            'sitegroup_arr' => $sitegroup_arr,
            'course_arr' => $course_arr,
            'subject_arr' => $subject_arr,
            'prof_arr' => $prof_arr,
            'input_arr' => $input_arr,
            'lecList' => $leclist,
            'pkgList' => $pkglist,
            'freeList' => $freelist,
            'passList' => $passlist
        ]);

    }

    public function view()
    {
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('ps');

        $ispause = 'N';
        $isstart = 'Y';
        $today = date("Y-m-d", time());

        $lec = $this->classroomFModel->getLecture([
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일이 <= 오늘
            ],
            'LT' => [
                'lastPauseEndDate' => $today // 일시중지종료일 < 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ]
        ]);

        if(count($lec) != 1){
            show_alert('강좌정보가 없습니다.', 'back');
        }

        $lec = $lec[0];

        $curriculum = $this->classroomFModel->getCurriculumBookmark([
            'EQ' => [
                'U.MemIdx' => $this->session->userdata('mem_idx'),
                'U.OrderIdx' => $orderidx,
                'U.ProdCode' => $prodcode,
                'U.ProdCodeSub' => $prodcodesub,
                'U.wLecIdx' => $lec['wLecIdx']
            ],
        ]);

        if($lec['LecStartDate'] > $today){
            $isstart = 'N';
        } else if ( $lec['lastPauseStartDate'] <= $today && $lec['lastPauseEndDate'] >= $today) {
            $isstart = 'N';
            $ispause = 'Y';
        } else {
            $isstart = 'Y';
        }

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

        return $this->load->view('/classroom/bookmark/view', [
            'lec' => $lec,
            'curriculum' => $curriculum
        ]);
    }

    public function updateBookmark()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $bmidx = $this->_req('bmidx');
        $memo = $this->_req('memo');
        $memidx = $this->session->userdata('mem_idx');

        if($this->classroomFModel->updateBookmark([
            'EQ' => [
                'MemIdx' => $memidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub,
                'bmIdx' => $bmidx
            ]

            ],['memo' => $memo]) == true){
            $this->json_result(true, '북마크 내용을 변경하였습니다.');
        } else {
            $this->json_error('북마크 내용 변경에 실패했습니다.');
        }
    }


    public function deleteBookmark()
    {
        $orderidx = $this->_req('orderidx');
        $prodcode = $this->_req('prodcode');
        $prodcodesub = $this->_req('prodcodesub');
        $bmidx = $this->_req('bmidx');
        $memo = $this->_req('memo');
        $memidx = $this->session->userdata('mem_idx');

        $cond = [
            'EQ' => [
                'MemIdx' => $memidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ],
            'IN' => [
                'bmIdx' =>$bmidx
            ]
        ];

        if($this->classroomFModel->deleteBookmark($cond) == false){
            $this->json_error('북마크 삭제에 실패했습니다.');
        } else {
            $this->json_result(true, '북마크를 삭제했습니다.');
        }
    }

}