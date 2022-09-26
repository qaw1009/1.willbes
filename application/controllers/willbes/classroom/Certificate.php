<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'memberF', 'order/orderListF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006','670007'];
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

    /**
     * 수강중인 강의 목록
     * @return object|string
     */
    public function list()
    {
        // 검색
        $input_arr = $this->_reqG(null);
        $today = date("Y-m-d", time());

        // 기본 검색옵션 시작일이 오늘 보다 크면 수강대기강의
        $cond_arr = [
            'IN' => [
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free, $this->_LearnPatternCcd_pkg),
                'PayRouteCcd' => array_merge($this->_payroute_normal_ccd, $this->_payroute_admin_ccd)
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
                'OrderDate' => element('search_start_date', $input_arr)
            ],
            'LTE' => [
                'OrderDate' => element('search_end_date', $input_arr)
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
            'sitegroup_arr' => $sitegroup_arr,
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

    /**
     * 수강확인증 출력
     * @return object|string
     */
    public function view()
    {
        $orderidx = $this->_req('o');
        $prodcode = $this->_req('p');
        $prodcodesub = $this->_req('ps');
        $type = $this->_req('t');

        $cond = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'),
                'OrderIdx' => $orderidx,
                'ProdCode' => $prodcode,
                'ProdCodeSub' => $prodcodesub
            ]
        ];

        if($type == 'P'){
            $data = $this->classroomFModel->getPackage($cond);
        } elseif($type = 'S'){
            $data = $this->classroomFModel->getLecture($cond);
        } else {
            show_alert('수강정보가 없습니다.');
        }

        if(count($data) != 1){
            show_alert('수강정보가 없습니다.');
        }

        $lec = $data[0];

        $member = $this->memberFModel->getMember(false, [
            'EQ' => [
                'Mem.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ]);

        return $this->load->view('/classroom/certificate/view', [
            'lec' => $lec,
            'member' => $member,
            'type' => $type
        ]);
    }

    /**
     * 학원강좌 수강증 보기
     * @return object|string
     */
    public function offLecture()
    {
        $order_idx = $this->_req('o');
        $order_prod_idx = $this->_req('op');
        $prod_code = $this->_req('p');
        $prod_code_sub = $this->_req('ps');
        $sess_mem_idx = $this->session->userdata('mem_idx');

        if (empty($order_idx) === true || empty($order_prod_idx) === true || empty($prod_code) === true || empty($prod_code_sub) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 수강정보 조회
        $arr_condition = [
            'EQ' => [
                'OrderIdx' => $order_idx,
                'OrderProdIdx' => $order_prod_idx,
                'ProdCode' => $prod_code,
                'ProdCodeSub' => $prod_code_sub,
                'MemIdx' => $sess_mem_idx
            ]
        ];

        $data = $this->classroomFModel->getLecture($arr_condition, [],false, true, 1, 0);
        if (empty($data) === true) {
            show_alert('수강정보가 없습니다.', 'back');
        }
        $data = element('0', $data);

        // 경찰학원
        if ($data['SiteCode'] == '2002') {
            // 주문정보 조회
            $order_data = $this->orderListFModel->findOrderByOrderIdx($order_idx, $sess_mem_idx);
            if (empty($order_data) === true) {
                show_alert('주문정보가 없습니다.', 'back');
            }

            $cert_data = [
                'SiteCode' => $data['SiteCode'],
                'ProdName' => get_var($data['subProdNameShort'], $data['subProdName']),
                'MinStudyStartDate' => date('m/d', strtotime($data['StudyStartDate'])),
                'MaxStudyEndDate' => date('m/d', strtotime($data['StudyEndDate'])),
                'OrderNo' => $order_data['OrderNo'],
                'PayMethodCcdName' => str_replace_array(['결제(방문)', '실시간 ', '입금(가상계좌)', '(간편결제)'], '', $order_data['PayMethodCcdName']),
                'RealPayPrice' => $order_data['RealPayPrice'],
            ];
        } else {
            $cert_data = $data;
        }

        return $this->load->view('/classroom/certificate/off_lecture', [
            'data' => $cert_data
        ]);
    }

    /**
     * 학원강좌 종합반 수강증 보기 (경찰 : 종합반, 임용 : 서브강좌)
     * @return object|string
     */
    public function offPackage()
    {
        $order_idx = $this->_req('o');
        $order_prod_idx = $this->_req('op');
        $prod_code = $this->_req('p');
        $prod_code_sub = $this->_req('ps');
        $sess_mem_idx = $this->session->userdata('mem_idx');

        if (empty($order_idx) === true || empty($order_prod_idx) === true || empty($prod_code) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 수강정보 조회
        $arr_condition = [
            'EQ' => [
                'OrderIdx' => $order_idx,
                'OrderProdIdx' => $order_prod_idx,
                'ProdCode' => $prod_code,
                'MemIdx' => $sess_mem_idx
            ]
        ];

        $pkg_data = element('0', $this->classroomFModel->getPackage($arr_condition, [], false, true));
        if (empty($pkg_data) === true) {
            show_alert('수강정보가 없습니다.', 'back');
        }

        // 경찰학원
        if ($pkg_data['SiteCode'] == '2002') {
            // 주문정보 조회
            $order_data = $this->orderListFModel->findOrderByOrderIdx($order_idx, $sess_mem_idx);
            if (empty($order_data) === true) {
                show_alert('주문정보가 없습니다.', 'back');
            }

            // 서브강좌 수강정보 조회
            $sub_lec_data = $this->classroomFModel->getLecture($arr_condition, [],false, true);
            if (empty($sub_lec_data) === true) {
                show_alert('서브강좌 수강정보가 없습니다.', 'back');
            }

            // 서브강좌의 최소 수강시작일, 최대 수강종료일 조회
            $min_study_start_date = date('m/d', strtotime(min(array_pluck($sub_lec_data, 'StudyStartDate'))));
            $max_study_end_date = date('m/d', strtotime(max(array_pluck($sub_lec_data, 'StudyEndDate'))));
            
            $cert_data = [
                'SiteCode' => $pkg_data['SiteCode'],
                'ProdName' => get_var($pkg_data['ProdNameShort'], $pkg_data['ProdName']),
                'MinStudyStartDate' => $min_study_start_date,
                'MaxStudyEndDate' => $max_study_end_date,
                'OrderNo' => $order_data['OrderNo'],
                'PayMethodCcdName' => str_replace_array(['결제(방문)', '실시간 ', '입금(가상계좌)', '(간편결제)'], '', $order_data['PayMethodCcdName']),
                'RealPayPrice' => $order_data['RealPayPrice'],
                'CertTitle' => '종합반'
            ];
        } else {
            if (empty($prod_code_sub) === true) {
                show_alert('필수 파라미터 오류입니다.', 'back');
            }

            // 서브강좌 상품명 조회
            $sub_lec_data = array_pluck(json_decode($pkg_data['OrderSubProdData'], true), 'ProdName', 'ProdCode');

            $cert_data = [
                'SiteCode' => $pkg_data['SiteCode'],
                'CertNo' => $pkg_data['CertNo'],
                'ProdName' => element($prod_code_sub, $sub_lec_data),
                'CertTitle' => '단과반'
            ];
        }

        return $this->load->view('/classroom/certificate/off_lecture', [
            'data' => $cert_data
        ]);
    }
}
