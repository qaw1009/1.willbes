<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Off extends \app\controllers\FrontController
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

            $pkglist[$idx]['subleclist'] = $pkgsublist;
        }

        return $this->load->view('/classroom/off/off_ongoing', [
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

        $today = date("Y-m-d", time());
        $sub_prod_data = null;
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

        return $this->load->view('/classroom/off/layer/assign_prof',[
            'pkginfo' => $pkginfo,
            'unpaidinfo' => $UnPaidInfo,
            'unpaid_data' => $unpaid_data,
            'sublec' => $sub_prod_data
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


}