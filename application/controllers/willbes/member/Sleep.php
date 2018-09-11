<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Sleep extends BaseMember
{
    protected $auth_controller = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 휴면회원처리 폼
     */
    public function index()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        // 메일코드 로ㄱ드
        $codes = $this->codeModel->getCcdInArray(['661']);

        // 아이디찾기용 아이핀 정보 생성
        $this->load->library('NiceAuth');
        $data = $this->niceauth->ipinEnc();

        $this->load->view('member/find/sleep', [
            'mail_domain_ccd' => $codes['661'],
            'encData' => $data['encData']
        ]);
    }



    /**
     * 휴면회원 정상화 처리
     */
    public function activate()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 인증방법
        $enc_data = $this->_req("enc_data"); // 인증데이타
        $MemId = $this->_req('var_id'); // 아이디

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);

                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
                }

                // 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo,
                        'Mem.IsStatus' => 'S'
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 휴면회원 복구처리
                    $result = $this->memberFModel->ActivateSleepMember($result['MemIdx']);

                    if($result == false){
                        // 복구 실패
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep/');
                    }
                    redirect('/member/sleep/activate-success/');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $MemId = $data_arr[3];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsStatus' => 'S'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 휴면회원 활성화처리
                    $result = $this->memberFModel->ActivateSleepMember($result['MemIdx']);

                    if($result == false){
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep/');
                    }

                    redirect('/member/activate-success');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                // 인증 메일 검색
                $result = $this->memberFModel->getMailAuth([
                    'EQ' => [
                        'certKey' => $enc_data,
                        'IsCert' => 'N'
                    ]]);

                // 이증메일 없음
                if(empty($result) === true){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
                }

                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $mail = $data_arr[1];
                $MemId = $data_arr[3];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsStatus' => 'S'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 활성화
                    $result = $this->memberFModel->ActivateSleepMember($result['MemIdx']);

                    if($result == false){
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep/');
                    }

                    // 비밀번호 변경후 인증메일 완료처리
                    $result = $this->memberFModel->updateMailAuth($enc_data);

                    redirect('/member/activate-success/');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep/');
        }
    }



    /**
     * 휴면회원 해제 완료페이지
     */
    public function activate-success()
    {
        $this->load->view('member/find/sleepProc');
    }



    /**
     * 휴면회원 해제 SMS
     * @return CI_Output
     */
    public function sms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_id = $this->_req('var_id');
        $sms_stat = $this->_req('sms_stat');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberFModel->getEncString($phonenumber);
        // 검색쿼리
        $data =  [
            'EQ' => [
                'Mem.MemId' => $sms_id,
                'Mem.PhoneEnc' => $phoneEnc,
                'Mem.CertifiedInfoTypeCcd' => '655002'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'D'
            ]
        ];

        $count = $this->memberFModel->getMember(true, $data);

        if($count == 0){
            // 가입된정보없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        $result = $this->memberFModel->getMember(false, $data);

        if($result['IsStatus'] != 'S'){
            return $this->json_error("휴면회원이 아닙니다.");
        }

        // SMS 인증 처리
        return $this->sendSms([
            'phone' => $phonenumber,
            'code' => $authcode,
            'id' => $sms_id,
            'isnew' => $isNew
        ]);
    }



    /**
     * 휴면회원 해지메일
     * @return CI_Output
     */
    public function mail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $id = $this->_req('var_id');

        $mail = $mailid.'@'.$maildomain;

        // 이미 가입된 정보 검색
        $mailEnc = $this->memberFModel->getEncString($mail);

        // 검색쿼리
        $data = [
            'EQ' => [
                'Mem.MemId' => $id,
                'Mem.MailEnc' => $mailEnc,
                'Mem.CertifiedInfoTypeCcd' => '655003'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'D'
            ]
        ];

        $count = $this->memberFModel->getMember(true, $data);

        if($count == 0){
            // 가입 정보없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        $data = $this->memberFModel->getMember(false, $data);

        if($data['IsStatus'] != 'S'){
            return $this->json_error("휴면회원이 아닙니다.");
        }

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $data['Mail'],
            'MemIdx' => $data['MemIdx'],
            'typeccd' => 'UNSLEEP' // 회원가입인증메일
        ]);
    }

}