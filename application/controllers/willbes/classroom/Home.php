<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'pointF', 'couponF', 'support/supportBoardF', 'support/supportBoardTwoWayF', 'crm/messageF', 'supportersF', 'memberF', 'personalityAptitudeExamF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();
    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];
    protected $_payroute_bogang_ccd = ['670008']; // 보강결제

    // 강의형태 단과/사용자패키지/운영자패키지/무료
    protected $_LearnPatternCcd_dan = ['615001','615002'];
    protected $_LearnPatternCcd_free = ['615005'];
    protected $_LearnPatternCcd_pkg = ['615003'];
    protected $_LearnPatternCcd_pass = ['615004'];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $today = date("Y-m-d", time());
        $memidx = $this->session->userdata('mem_idx');
        $data = [];
        //온라인 강좌 갯수
        // 기간제 갯수
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx
            ],
            'LTE' => [
                'LecStartDate' => $today // 시작일 <= 오늘
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
        ];
        $data['pass_cnt'] = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass
            ]
        ]), null, true);

        // 수강중
        $data['ing_cnt'] = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => array_merge($this->_LearnPatternCcd_dan, $this->_LearnPatternCcd_free)
            ]
        ]), null, true);
        $data['ing_cnt'] = $data['ing_cnt'] + $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg
            ]
        ]), null, true);

        // 최근수강강좌 3개
        $data['ing_list'] = $this->classroomFModel->getLecture($cond_arr, ['lastStudyDate' => 'DESC'], false, false, 7);

        // 수강대기 갯수
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx
            ],
            'GT' => [
                'LecStartDate' => $today // 시작일 > 오늘
            ]
        ];
        $data['standby_cnt'] = $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan,
            ]
        ]), null, true);
        $data['standby_cnt'] = $data['standby_cnt'] + $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pkg,
            ]
        ]), null, true);

        // 학원강좌 갯수
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx
            ],
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
            'IN' => [
                'LearnPatternCcd' => ['615006'] // 학원종합, 학원단과
            ]
        ];
        $data['off_cnt'] = $this->classroomFModel->getLecture($cond_arr, null,true, true);

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx
            ],
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ]
        ];
        $data['off_cnt'] += $this->classroomFModel->getPackage($cond_arr, null,true, true);

        // 보강동영상
        $data['bogang_cnt'] = $this->classroomFModel->getLecture([
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan,
                'PayRouteCcd' => $this->_payroute_bogang_ccd
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx')
            ]
        ], null, true);

        // 포인트
        $member_point = $this->pointFModel->getMemberPoint();
        $data['lecture_point'] = element('lecture', $member_point, 0);
        $data['book_point'] = element('book', $member_point, 0);

        // 쿠폰갯수
        $data['coupon_cnt'] = $this->couponFModel->listMemberCoupon(true, [
            'EQ' => [
                'CD.ValidStatus' => 'Y',
                'CD.IsUse' => 'N'
            ],
            'RAW' => [
                'NOW() between ' => 'CD.IssueDatm and CD.ExpireDatm'
            ]
        ]);
        
        // 등록 기기정보 리스트
        $data['device_list'] = $this->classroomFModel->getMyDevice(false, [
            'EQ' => [
                'MemIdx' => $memidx,
                'IsUse' => 'Y'
            ]
        ]);

        // 나의 상담내역
        $order_by = ['IsBest' => 'Desc', 'BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 48, 'b.RegMemIdx' => $memidx,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.IsBest, b.Title, b.ReplyStatusCcd, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['counsel'] = $this->supportBoardTwoWayFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 나의 학습Q&A
        $order_by = ['IsBest' => 'Desc', 'BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 66, 'b.RegMemIdx' => $memidx,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.IsBest, b.Title, b.ReplyStatusCcd, b.ProfIdx, b.SubjectIdx, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['qna'] = $this->supportBoardTwoWayFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 공지사항
        $order_by = ['IsBest' => 'Desc', 'BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 45,'b.SiteCode' => $this->_site_code,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.IsBest, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['notice'] = $this->supportBoardFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 쪽지
        $data['msg_list'] = $this->messageFModel->listMessage(false, [], $memidx,2, null, ['a.SendIdx' => 'DESC']);

        // 서포터즈회원조회
        $data['supporters'] = $this->_isSupporters();

        // 학원강의 신청목록 조회
        // 학원 단과
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
        $data['off_lec_list'] = $this->classroomFModel->getLecture($cond_arr, ['OrderDate' => 'ASC'],false, true);

        // 학원 종합반 목록 읽어오기
        $cond_arr = [
            'EQ' => [
                'MemIdx' => $this->session->userdata('mem_idx'), // 사용자번호
            ],
            'GTE' => [
                'StudyEndDate' => $today // 종료일 >= 오늘
            ],
        ];
        $data['off_pkg_list'] = $this->classroomFModel->getPackage($cond_arr, ['OrderDate' => 'ASC'], false, true);

        //인적성검사 상품구매리스트 조회
        $arr_condition = [
            'EQ' => [
                'o.MemIdx' => $memidx
                ,'mstp.ProdTypeCcd' => $this->personalityAptitudeExamFModel->prodTypeCcd
                ,'mstpl.ExternalCorpCcd' => $this->personalityAptitudeExamFModel->externalCorpCcd
            ],
            'IN' => [
                'op.PayStatusCcd' => $this->personalityAptitudeExamFModel->payStatusCcd
            ]
        ];
        $data['personalityAptitudeExam_list'] = $this->personalityAptitudeExamFModel->listProduct($arr_condition,null,1);

        $this->load->view('/classroom/index', [
            'data' => $data
        ]);
    }

    /**
     * 한림 사이트로 리다이렉트
     */
    public function gotoHanlim()
    {
        $site = $this->_req('site');
        $param = $this->_req('param');

        switch($site){
            case '2':
            case '3':
                $url = 'http://prevalue.willbes.net';
                break;

            case '4':
                $url = 'http://precop.willbes.net';
                break;

            case '1':
            default:
                $url = 'http://pregosi.willbes.net';
                break;

        }

        $this->load->library('Crypto', ['license' => 'willbes-open-20200113']);

        $data = $this->memberFModel->getMember(false, [
            'EQ' => [
                'Mem.MemIdx' => $this->session->userdata('mem_idx')
            ]
        ]);

        $plaintext = '^'.$data['HanlimID'].'^'.date('Y-m-d H:i:s').'^';
        $enc_data = $this->crypto->encrypt($plaintext);

        return $this->load->view('classroom/gotohanlim', [
            'enc_data' => $enc_data,
            'url' => $url,
            'param' => $param
        ]);
    }

    /**
     * 임용고시 이전 사이트 가기
     */
    public function gotoSsam()
    {
        $param = $this->_req('param');

        $this->load->library('Crypto', ['license' => 'willbes^ssam^20201201']);

        $data = $this->memberFModel->getMember(false, [
            'EQ' => [
                'Mem.MemIdx' => $this->session->userdata('mem_idx'),
                'Mem.IsStatus' => 'Y'
            ]
        ]);

        if(empty($data['ssamID']) == true){
            // 임용고시 아이디가 가 없으면
            show_alert('임용고시 회원이 아닙니다.', 'close', false);
        }

        $plaintext = '^'.$data['ssamID'].'^'.date('Y-m-d H:i:s').'^';
        $enc_data = $this->crypto->encrypt($plaintext);

        return $this->load->view('classroom/gotossam', [
            'enc_data' => $enc_data,
            'param' => $param
        ]);
    }

    /**
     * 서포터즈회원 여부
     * @return bool : true 회원, false 비회원
     */
    private function _isSupporters()
    {
        $column = 'a.SupportersIdx, a.SiteCode, a.SupportersTypeCcd';
        $arr_condition_1 = [
            'EQ' => [
                'IsUse' => 'Y'
            ],
            'LTE' => ['StartDate' => date('Y-m-d')],
            'GTE' => ['EndDate' => date('Y-m-d')],
            'RAW' => [
                '(SiteCode = ' => '2001 OR SiteCode = 2003)'
            ]
        ];

        $arr_condition_2 = [
            'EQ' => [
                'b.MemIdx' => $this->session->userdata('mem_idx'),
                'b.SupportersStatusCcd' => '720001',
                'b.IsStatus' => 'Y'
            ]
        ];
        $data = $this->supportersFModel->findSupporters($arr_condition_1, $arr_condition_2, $column);
        return $data;
    }

}
