<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends \app\controllers\FrontController
{
    protected $models = array('classroomF', 'pointF', 'couponF', 'support/supportBoardF', 'support/supportBoardTwoWayF', 'crm/messageF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();
    // 결제루트코드 온라인/학원방문/0원/무료/제휴사/온라인0원
    protected $_payroute_normal_ccd = ['670001','670002','670006'];
    protected $_payroute_admin_ccd = ['670003','670004','670005'];

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
        $data['ing_list'] = $this->classroomFModel->getLecture($cond_arr, ['lastStudyDate' => 'DESC'], false, false, 3);

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
                'LearnPatternCcd' => ['615006','615007'] // 학원종합, 학원단과
            ]
        ];
        $data['off_cnt'] = $this->classroomFModel->getLecture($cond_arr, null,true, true);

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
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 48, 'b.RegMemIdx' => $memidx,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.Title, b.ReplyStatusCcd, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['counsel'] = $this->supportBoardTwoWayFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 나의 학습Q&A
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 66, 'b.RegMemIdx' => $memidx,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.Title, b.ReplyStatusCcd, b.ProfIdx, b.SubjectIdx, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['qna'] = $this->supportBoardTwoWayFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 공지사항
        $order_by = ['b.IsBest' => 'Desc', 'b.BoardIdx' => 'Desc'];
        $arr_condition = ['EQ' => ['b.BmIdx' => 45,'b.SiteCode' => $this->_site_code,'b.IsUse' => 'Y']];
        $column = 'b.BoardIdx, b.Title, DATE_FORMAT(b.RegDatm, \'%Y-%m-%d\') as RegDatm';
        $data['notice'] = $this->supportBoardFModel->listBoard(false, $arr_condition, '', $column, 4, 0, $order_by);

        // 쪽지
        $data['msg_list'] = $this->messageFModel->listMessage(false, [], $memidx,
            2, null, ['a.SendIdx' => 'DESC']);

        $this->load->view('/classroom/index', [
            'data' => $data
        ]);
    }

}
