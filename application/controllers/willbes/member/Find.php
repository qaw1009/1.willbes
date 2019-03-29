<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Find extends BaseMember
{
    public function __construct()
    {
        parent::__construct();
    }


    /*
     * 아이디찾기 폼
     */
    public function id()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $codes = $this->codeModel->getCcdInArray(['661']);

        // 아이디찾기용 아이핀 정보 생성
        $this->load->library('NiceAuth');
        $data = $this->niceauth->ipinEnc();

        $this->load->view('member/find/id', [
            'mail_domain_ccd' => $codes['661'],
            'encData' => $data['encData']
        ]);
    }



    /**
     * 아이디찾기 처리
     */
    public function idproc()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 검색방법
        $enc_data = $this->_req("enc_data"); // 검색 암호화 데이타

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);

                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
                }

                // 아이핀 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/idproc', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 검색 쿼리
                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/idProc', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
                }

                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $mail = $data_arr[1];
                $name = $data_arr[2];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                // 해당 인증 메일 사용 처리
                $result = $this->memberFModel->updateMailAuth($enc_data);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/idProc', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/id/');
        }
    }



    /**
     * 비밀번호 찾기 폼
     */
    public function pwd()
    {
        // 이미 로그인한 상태이면 초기페이지로 이동
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        // 이메일 코드
        $codes = $this->codeModel->getCcdInArray(['661']);

        // 아이디찾기용 아이핀 정보 생성
        $this->load->library('NiceAuth');
        $data = $this->niceauth->ipinEnc();

        $this->load->view('member/find/pwd', [
            'mail_domain_ccd' => $codes['661'],
            'encData' => $data['encData']
        ]);
    }



    /**
     * 비밀번호찾기 처리
     */
    public function pwdform()
    {
        // 이미 로그인한 상태이면 초기페이지로 이동
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 검색방법
        $enc_data = $this->_req("enc_data"); // 검색 암호화 데이타
        $MemId = $this->_req('var_id'); // 검색한 아이디

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);

                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }
                // 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/pwdform', [
                        'MemId' => $MemId,
                        'MemName' => $result['MemName'],
                        'enc_data' => $enc_data,
                        'jointype' => $jointype
                    ]);
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $MemId = $data_arr[3];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/pwdform', [
                        'MemId' => $MemId,
                        'MemName' => $result['MemName'],
                        'enc_data' => $enc_data,
                        'jointype' => $jointype
                    ]);
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                // 발송한 이메일 검색
                $result = $this->memberFModel->getMailAuth([
                    'EQ' => [
                        'certKey' => $enc_data,
                        'IsCert' => 'N'
                    ]]);

                if(empty($result) === true){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }

                // 0000-00-00 00:00:00^메일주소^이름^회원아이디^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $mail = $data_arr[1];
                $MemId = $data_arr[3];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'MemId' => $MemId,
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    //가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/pwdform', [
                        'MemId' => $MemId,
                        'MemName' => $result['MemName'],
                        'enc_data' => $enc_data,
                        'jointype' => $jointype
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
        }
    }



    /**
     * 비밀번호 변경 처리
     * @return object|string
     */
    public function pwdproc()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 인증방법
        $enc_data = $this->_req("enc_data"); // 인증데이타
        $MemId = $this->_req('MemId'); // 회원 아이디

        $MemPassword = $this->_req('MemPassword'); // 변경할 암호

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);
                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }
                // 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 비밀번호 변경
                    $result = $this->memberFModel->setMemberPassword([
                        'MemIdx' => $result['MemIdx'],
                        'MemPassword' => $MemPassword,
                        'UpdTypeCcd' => '656002'
                    ]);

                    // 변경실패
                    if($result == false){
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                    }

                    redirect('/member/find/setpwd/');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $MemId = $data_arr[3];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 비밀번호 변경
                    $result = $this->memberFModel->setMemberPassword([
                        'MemIdx' => $result['MemIdx'],
                        'MemPassword' => $MemPassword,
                        'UpdTypeCcd' => '656002'
                    ]);

                    if($result == false){
                        // 변경 실패
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                    }

                    redirect('/member/find/setpwd/');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                // 인증 이메일 정보 구해오기
                $result = $this->memberFModel->getMailAuth([
                    'EQ' => [
                        'certKey' => $enc_data,
                        'IsCert' => 'N'
                    ]]);

                if(empty($result) === true){
                    // 인증 이메일 없음
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
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
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);

                    // 암호 변경
                    $result = $this->memberFModel->setMemberPassword([
                        'MemIdx' => $result['MemIdx'],
                        'MemPassword' => $MemPassword,
                        'UpdTypeCcd' => '656002'
                    ]);

                    if($result == false){
                        // 변경실패
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
                    }

                    // 비밀번호 변경후 인증메일 완료처리
                    $result = $this->memberFModel->updateMailAuth($enc_data);

                    redirect('/member/find/setpwd/');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/find/pwd/');
        }

    }



    /**
     * 암호변경 완료페이지
     */
    public function setpwd()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $this->load->view('/member/find/pwdsuccess');
    }




    /**
     * 아이디찾기 SmS 인증
     * @return CI_Output
     */
    public function idsms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_name = $this->_req('var_name');
        $sms_stat = $this->_req('sms_stat');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberFModel->getEncString($phonenumber);
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemName' => $sms_name,
                'Mem.PhoneEnc' => $phoneEnc,
                'Mem.CertifiedInfoTypeCcd' => '655002'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'N'
            ]
        ]);

        if($count == 0){
            // 가입된정보 없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        // SMS 인증 처리
        return $this->sendSms([
            'phone' => $phonenumber,
            'code' => $authcode,
            'name' => $sms_name,
            'isnew' => $isNew
        ]);
    }




    /**
     * 회원비밀번호 찾기 SMS
     * @return CI_Output
     */
    public function pwdsms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_id = $this->_req('var_id');
        $sms_stat = $this->_req('sms_stat');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberFModel->getEncString($phonenumber);
        $data =  [
            'EQ' => [
                'Mem.MemId' => $sms_id,
                'Mem.PhoneEnc' => $phoneEnc,
                'Mem.CertifiedInfoTypeCcd' => '655002'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'N'
            ]
        ];

        $count = $this->memberFModel->getMember(true, $data);

        if($count == 0){
            // 가입된 정보 없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
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
     * 아이디찾기 메일 인증
     * @return CI_Output
     */
    public function idmail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $name = $this->_req('var_name');

        $mail = $mailid.'@'.$maildomain;

        // 이미 가입된 정보 검색
        $mailEnc = $this->memberFModel->getEncString($mail);
        // 검색쿼리
        $data = [
            'EQ' => [
                'Mem.MemName' => $name,
                'Mem.MailEnc' => $mailEnc,
                'Mem.CertifiedInfoTypeCcd' => '655003'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'N'
            ]
        ];

        $count = $this->memberFModel->getMember(true, $data);

        if($count == 0){
            // 가입정보없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $mail,
            'name' => $name,
            'typeccd' => 'FINDID' // 회원가입인증메일
        ]);
    }

    /**
     * 비밀번호찾기 이메일
     * @return CI_Output
     */
    public function pwdmail()
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
                'Mem.IsStatus' => 'N'
            ]
        ];

        $count = $this->memberFModel->getMember(true, $data);

        if($count == 0){
            // 가입 정보 없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        $data = $this->memberFModel->getMember(false, $data);

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $data['Mail'],
            'MemIdx' => $data['MemIdx'],
            'typeccd' => 'FINDPWD' // 회원가입인증메일
        ]);
    }


}