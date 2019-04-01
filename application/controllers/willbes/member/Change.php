<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Change extends BaseMember
{
    protected $auth_controller = true;

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

    /**
     * @param array $params
     * @return object|string
     */
    public function index($params = [])
    {
        if(empty($params[0]) === true){
            redirect('/member/change/index/info/');
        }

        if($params[0] == 'info'){
            return $this->info();
        } else if($params[0] == 'password'){
            return $this->password();
        } else {
            redirect('/member/change/index/info/');
        }
    }

    /**
     * 회원정보 변경 페이지
     * @return object|string
     */
    public function info()
    {
        $Password = $this->_req('password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            return $this->load->view('member/change/info_check');
        }

        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/info/', false);
        }

        $codes = $this->codeModel->getCcdInArray(['661']);

        $this->load->library('encrypt');

        $data = $this->memberFModel->getMember(false, ['EQ'=>['Mem.MemIdx'=>$MemIdx]]);
        

        $today = date("Y-m-d", time());
        $memidx = $this->session->userdata('mem_idx');

        $cond_arr = [
            'EQ' => [
                'MemIdx' => $memidx
            ],
            'GTE' => [
                'RealLecEndDate' => $today // 종료일 >= 오늘
            ],
        ];

        // 수강중강좌 갯수
        // 기긴제갯수
        $data['on_cnt'] = $this->classroomFModel->getPackage(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_pass
            ]
        ]), null, true);
        // 단과갯수
        $data['on_cnt'] = $data['on_cnt'] + $this->classroomFModel->getLecture(array_merge($cond_arr, [
            'IN' => [
                'LearnPatternCcd' => $this->_LearnPatternCcd_dan
            ]
        ]), null, true);
        // 패키지갯수
        $data['on_cnt'] = $data['on_cnt'] + $this->classroomFModel->getPackage(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_pkg
                ]
            ]), null, true);

        // 단과갯수
        $data['on_free_cnt'] = $this->classroomFModel->getLecture(array_merge($cond_arr, [
                'IN' => [
                    'LearnPatternCcd' => $this->_LearnPatternCcd_free
                ]
            ]), null, true);

        // 수강중 학원강좌 갯수
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

        // 배송내역
        $data['shop_cnt'] = 0;
        
        // 모의고사
        $data['mock_cnt'] = $this->mockExamModel->listBoard(true, [
            'EQ' => [
                'MR.MemIdx'   => $memidx
            ]
        ]);

        // 포인트 쿠폰
        $member_point = $this->pointFModel->getMemberPoint();
        $data['lecture_point'] = element('lecture', $member_point, 0);
        $data['book_point'] = element('book', $member_point, 0);

        // 쿠폰갯수
        $data['coupon_cnt'] = $this->couponFModel->listMemberCoupon(true);

        return $this->load->view('member/change/info', [
            'mail_domain_ccd' => $codes['661'],
            'password' => $this->encrypt->encode($Password),
            'data' => $data
        ]);
    }

    /**
     * 비밀번호 변경 페이지
     * @return object|string
     */
    public function password()
    {
        $oldPassword = $this->_req('oldPass');
        $newPassword = $this->_req('newPass');
        $newPasswordchk = $this->_req('newPasschk');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($oldPassword) === false && empty($newPassword) === true){
            // 새로운 비밀번호 입력
            if($this->memberFModel->checkMemberPassword($MemIdx, $oldPassword) === false){
                show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/password/', false);
            }

            $this->load->library('encrypt');

            return $this->load->view('member/change/password', [
                'method' => 'change',
                'password' => $this->encrypt->encode($oldPassword)
            ]);

        } else if(empty($oldPassword) === false && empty($newPassword) === false){
            $this->load->library('encrypt');
            $oldPassword = $this->encrypt->decode($oldPassword);

            // 비밀번호 변경 프로세스
            if($this->memberFModel->checkMemberPassword($MemIdx, $oldPassword) === false){
                show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/password/', false);
            }

            if($this->memberFModel->setMemberPassword(['MemIdx' => $MemIdx, 'MemPassword' => $newPassword, 'UpdTypeCcd' => '656001']) === false){
                show_alert('비밀번호 변경이 실패했습니다. 다시 시도해주십시요.', '/member/change/index/password/', false);
            } else {
                show_alert('비밀번호 변경이 완료되었습니다.', '/classroom/home/', false);
            }
        }

        return $this->load->view('member/change/password', [
            'method' => 'check',
            'password' => ''
        ]);
    }

    /**
     * 회원정보변경 처리
     */
    public function proc()
    {
        $Password = $this->_req('Password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            show_alert('비밀번호를 다시 한번 입력해야 정보변경이 가능합니다.', '/member/change/index/info/', false);
        }

        $this->load->library('encrypt');
        $Password = $this->encrypt->decode($Password);
        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/member/change/index/info/', false);
        }

        $data = [
            'Tel' => $this->_req('Tel1').$this->_req('Tel2').$this->_req('Tel3'),
            'Tel1' => $this->_req('Tel1'),
            'Tel2' => $this->_req('Tel2'),
            'Tel3' => $this->_req('Tel3'),
            'ZipCode' => $this->_req('ZipCode'),
            'Addr1' => $this->_req('Addr1'),
            'Addr2' => $this->_req('Addr2'),
            'MailRcvStatus' => ($this->_req('MailRcvStatus') == 'Y' ? 'Y' : 'N'),
            'SmsRcvStatus' => ($this->_req('SmsRcvStatus') == 'Y' ? 'Y' : 'N')
        ];

        if($this->memberFModel->setMember($MemIdx, $data) == false){
            show_alert('회원정보가 변경에 실패했습니다..', '/member/change/index/info/', false);
        }

        show_alert('회원정보가 변경되었습니다.', '/classroom/home/', false);
    }

    /**
     * 회원정보 핸드폰번호 변경
     * @return CI_Output
     */
    public function phone()
    {
        $enc_data = $this->_req('enc_data');

        $this->load->library('encrypt');
        $plainText = $this->encrypt->decode($enc_data);

        // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
        $data_arr = explode("^", $plainText);
        $phone = $data_arr[1];
        $MemIdx = $data_arr[3];

        if($this->session->userdata('mem_idx') != $MemIdx){
            return $this->json_error('정보가 일치하지 않습니다.');
        }

        // 전화번호 나누기
        $phone1 = substr($phone,0,3);
        $phone2 = substr($phone,3,-4);
        $phone3 = substr($phone,-4);

        // 데이타에 추가
        $input = [
            'Phone' => $phone,
            'Phone1' => $phone1,
            'Phone2' => $phone2,
            'Phone3' => $phone3
        ];

        if($this->memberFModel->setMemberPhone($MemIdx, $input) == false){
            return $this->json_error('핸드폰번호 변경에 실패했습니다.');
        }

        return $this->json_result(true, '핸드폰번호가 변경되었습니다.', null, [
            'phone1' => $phone1,
            'phone2' => $phone2,
            'phone3' => $phone3
        ]);
    }


    /**
     * 메일주소변경 메일인증처리
     * @return object|string
     */
    public function mailproc()
    {
        // 주소/인증키/인증메일
        $certKey = $this->_req('enc_data');

        // 검색쿼리
        $result = $this->memberFModel->getMailAuth([
            'EQ' => [
                'certKey' => $certKey
            ]]);

        if(empty($result) === true){
            // 검색정보 없음
            show_alert('인증정보가 올바르지 않습니다.', '/', false);
        }

        // 시간체크
        $now = strtotime(date('Y-m-d H:i:s')); // 지금 시간
        $sendDate = strtotime($result['MailSendDatm'].'+30 minutes'); // 보낸시간 더하기 30분

        // 인증시간 초과 보내고나서 30분
        if($now > $sendDate){
            show_alert('인증시간이 초과했습니다.', '/', false);
        }

        // 이미 사용한 인증키
        if($result['IsCert'] == 'Y'){
            show_alert('이미 사용한 인증코드입니다.', '/', false);
        }

        $mailArr = explode('@', $result['CertMail']);
        $mailId = $mailArr[0];
        $mailDomain = $mailArr[1];

        $data = [
            'Mail' => $result['CertMail'],
            'MailId' => $mailId,
            'MailDomain' => $mailDomain
        ];

        if($this->memberFModel->setMemberMail($result['MemIdx'], $data) == false){
            show_alert('메일주소변경이 실패하였습니다. 다시 시도해주십시요.', '/', false);
        }

        // 해당 인증 메일 사용 처리
        $result = $this->memberFModel->updateMailAuth($certKey);

        show_alert('메일주소변경이 처리되었습니다.', '/', false);
    }

    /**
     * 핸드폰번호변경 SMS
     * @return CI_Output
     */
    public function phonesms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_stat = $this->_req('sms_stat');
        $MemIdx = $this->session->userdata('mem_idx');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // SMS 인증 처리
        return $this->sendSms([
            'phone' => $phonenumber,
            'code' => $authcode,
            'id' => $MemIdx,
            'isnew' => $isNew
        ]);
    }

    /**
     * 이메일주소 변경 메일
     * @return CI_Output
     */
    public function mail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $idx = $this->session->userdata('mem_idx');

        $data = [
            'Mail' => $mailid.'@'.$maildomain,
            'MailId' => $mailid,
            'MailDomain' => $maildomain
        ];

        if($this->memberFModel->setMemberMail($idx, $data) == false){
            return $this->json_error('메일주소변경이 실패하였습니다. 다시 시도해주십시요.');
        }

        return $this->json_result(true, '메일주소가 변경되었습니다.');

        /*
        // 인증메일 전송
        return $this->sendMail([
            'mail' => $mail,
            'MemIdx' => $idx,
            'typeccd' => 'UPDMAIL' // 회원가입인증메일
        ]);
        */
    }


    /**
     * 탈퇴 진행
     * @return CI_Output
     */
    public function draw()
    {
        $Password = $this->_req('pwd');
        $opinion = $this->_req('opinion');
        $reason = $this->_req('reason');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            return $this->json_error("비밀번호를 입력해주십시요.");
        }

        if(empty($reason) === true){
            return $this->json_error("탈퇴사유를 선택해주십시요.");
        }

        if(empty($opinion) === true){
            return $this->json_error("의견을 입력해주십시요.");
        }

        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            return $this->json_error("비밀번호가 일치하지 않습니다.");
        }

        if($this->memberFModel->drawMember([
                'MemIdx' => $MemIdx,
                'reason' => $reason,
                'opinion' => $opinion
            ]) == false){
            return $this->json_error("탈퇴처리에 실패했습니다.\n다시 시도해 주십시요.");
        }

        return $this->json_result(true,"탈퇴가 완료되었습니다.\n그동안 이용해주셔서 감사합니다.");

    }



}