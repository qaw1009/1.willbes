<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Join extends BaseMember
{
    protected $_join_coupon = [
        '2001' => [ // 경찰
            ['type' => 'coupon', 'no' => '30'], // 온라인 모의고사쿠폰
            ['type' => 'coupon', 'no' => '71'], // 단과10%
            ['type' => 'coupon', 'no' => '135'], // PASS 1만원
            ['type' => 'coupon', 'no' => '129'], // 교재무료배송
        ],
        '2003' => [ // 공무원
            ['type' => 'coupon', 'no' => '130'], // 온라인 모의고사쿠폰
            ['type' => 'coupon', 'no' => '119'], // 단과10%
            ['type' => 'coupon', 'no' => '111'], // PASS 1만원
            ['type' => 'coupon', 'no' => '116'], // 교재무료배송
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원가입 본인인증 페이지
     */
    public function index()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        // 모바일 페이지에서 넘어온것인지 세션에 저장
        $ismoblie = ($this->_req('ismobile') == '1') ? '1' : '0';
        $this->session->set_userdata('join_mobile', $ismoblie);

        // 회원가입버튼 누른 사이트코드 세션에 저장 해서 회원가입할때 같이 넣어줌
        $sitecode = $this->_req('sitecode');
        $sitecode = (empty($sitecode) == true) ? '2000' : $sitecode;
        $this->session->set_userdata('join_sitecode', $ismoblie);

        // 이메일 코드
        $codes = $this->codeModel->getCcdInArray(['661']);

        $this->load->view('member/join/step1', [
            'mail_domain_ccd' => $codes['661']
        ]);
    }

    /**
     * 회원가입 폼
     */
    public function form()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 가입인증 방법
        $enc_data = $this->_req("enc_data"); // 가입인증 암호화 데이타

        // 이메일 코드
        $codes = $this->codeModel->getCcdInArray(['661']);

        if($jointype === "655002") {
            // 핸드폰 sms 인증
            // 앞에서 넘어온 전화번호
            $phonenumber = $this->_req('phone_number');

            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 암호화애서 넘어온 전화번호와 post 로 넘어온 전화번호가 다르면 오류
                if($phone !== $phonenumber){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                // 가입한 정보가 있는지 검색
                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                // 이미 가입정보가 있을경우
                if($count > 0){
                    // 실제데이타를 뽑아서 기가입되어있음 로드
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/join/already', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }

                //그렇지 않으면 가입 페이지 로드
                return $this->load->view('member/join/step2', [
                    'mail_domain_ccd' => $codes['661'],
                    'jointype' => $jointype,
                    'enc_data' => $enc_data,
                    'phone' => $phone,
                    'memName' => $name,
                    'MailId' => '',
                    'MailDomain' => ''
                ]);

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $mail = $data_arr[1];
                $name = $data_arr[2];

                $mailArr = explode('@', $mail);
                $mailId = $mailArr[0];
                $mailDomain = $mailArr[1];

                // 가입한 정보있는지 검색
                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                // 이미 가입정보가 있을경우
                if($count > 0){
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/join/already', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }

                return $this->load->view('member/join/step2', [
                    'mail_domain_ccd' => $codes['661'],
                    'jointype' => $jointype,
                    'enc_data' => $enc_data,
                    'memName' => $name,
                    'MailId' => $mailId,
                    'MailDomain' => $mailDomain,
                    'phone' => ''
                ]);

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
        }
    }

    /**
     * 회원가입 처리페이지
     */
    public function proc()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $input = $this->_reqp(null);

        // 인증정보 검사
        if(empty($input['CertifiedInfoTypeCcd']) === true || empty($input['enc_data']) === true ){
            show_alert('인증정보가 없습니다..','/member/join');
        }

        $enc_data = $input['enc_data'];
        $CertifiedInfoTypeCcd = $input['CertifiedInfoTypeCcd'];

        if($CertifiedInfoTypeCcd == '655002') {
            // 핸드폰 인증 정상인지 체크
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 인증정보 불일치
                if($input['MemName'] != $name || $input['Phone'] != $phone) {
                    show_alert("인증정보가 일치하지 않습니다.", '/member/join');
                }

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $CertifiedInfoTypeCcd
                    ]
                ];

                // 이미 가입한 정보인지 체크
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우 오류페이지 출력
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/join/already', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
            }

        } else if($CertifiedInfoTypeCcd == '655003') {
            // 이메일인증정보 정상인지 체크
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $mail = $data_arr[1];
                $name = $data_arr[2];

                $mailArr = explode('@', $mail);
                $mailId = $mailArr[0];
                $mailDomain = $mailArr[1];

                // 인증정보 불일치
                if($input['MemName'] != $name || $input['MailId'] != $mailId || $input['MailDomain'] != $mailDomain) {
                    show_alert("인증정보가 일치하지 않습니다.", '/member/join');
                }

                // 회원가입처리후 메일 인증 사용 처리
                $result = $this->memberFModel->updateMailAuth($enc_data);

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $CertifiedInfoTypeCcd
                    ]
                ];

                // 이미 있는 정보인지 체크
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/join/already', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
            }

        } else {
            show_alert('인증정보가 없습니다.','/member/join');
        }

        // 중요 파라미터검사
        $rules = [
            ['field' => 'Sex', 'label' => '성별', 'rules' => 'trim|required'],
            ['field' => 'BirthDay', 'label' => '생년월일', 'rules' => 'trim|required'],
            ['field' => 'Phone', 'label' => '전화번호', 'rules' => 'trim|required'],
            ['field' => 'MemId', 'label' => '아이디', 'rules' => 'trim|required'],
            ['field' => 'MemPassword', 'label' => '비밀번호', 'rules' => 'trim|required'],
            ['field' => 'MemName', 'label' => '이름', 'rules' => 'trim|required']
        ];

        // 파라미터오류발생시 오류페이지로 넘겨버림
        $this->validate($rules, '/member/join/error');

        // 전화번호 나누기
        $Phone = $input['Phone'];
        $Phone1 = substr($Phone,0,3);
        $Phone2 = substr($Phone,3,-4);
        $Phone3 = substr($Phone,-4);

        // 데이타에 추가
        $input = array_merge($input, [
            'Phone1' => $Phone1,
            'Phone2' => $Phone2,
            'Phone3' => $Phone3
        ]);

        // 이메일주소 합치기
        if(empty($input['MailId']) == true || empty($input['MailDomain']) == true){
            $input = array_merge($input, ['Mail' => '']);
        } else {
            $input = array_merge($input, [
                'Mail' => $input['MailId'].'@'.$input['MailDomain']
            ]);
        }

        // 가입페이지로 넘어올때 생성된 세션에서 사이트코드 얻어오기
        $SiteCode = $this->session->userdata('join_sitecode');
        $SiteCode = (empty($SiteCode) == true) ? '2000' : $SiteCode;
        $input = array_merge($input, [
            'Sitecode' => $SiteCode
        ]);

        // 실제 데이타 입력
        $result = $this->memberFModel->storeMember($input);

        if($result === true){
            // 회원정보 추가에 성공후 로그인 처리
            $data = $this->memberFModel->getMemberForLogin($input['MemId'], $input['MemPassword'], false);
            $result = $this->memberFModel->storeMemberLogin($data);

            // 회원가입하고 넘어감
            $this->session->set_userdata('is_join', true);
            redirect('/member/join/success');
        } else {
            // 실패시 오류 메세지 출력
            return $this->load->view('member/join/error');
        }
    }

    /**
     * 회원가입 완료 페이지
     */
    public function success()
    {
        if($this->session->userdata("is_join") != true){
            redirect('/');
        }

        // 사용하고 있는 사이트들 검색
        $site = $this->siteModel->listSite(['SiteName', 'SiteUrl'], ['EQ'=>['IsUse'=>'Y'], 'NOT'=>['SiteCode'=>'2000']]);
        
        // 모바일에서 회원가입을 들어온것인지
        $ismobile = ($this->session->userdata("join_mobile") == '1') ? true : false ;

        $this->load->view('member/join/step3', [
            'MemId' => $this->session->userdata('mem_id'),
            'MemName' => $this->session->userdata('mem_name'),
            'Site' => $site,
            'ismobile' => $ismobile
        ]);
    }

    /**
     * 가입오류 페이지
     * @return object|string
     */
    public function error()
    {
        return $this->load->view('member/join/error');
    }

    /**
     * 회원가입 sms 인증
     * @return CI_Output
     */
    public function sms()
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

        if($count > 0){
            // 가입된 정보임
            return $this->json_error("이미 가입된 회원입니다. 아이디/비밀번호 찾기를 이용해주십시요.");
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
     * 회원가입 메일인증
     * @return CI_Output
     */
    public function mail()
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

        if($count > 0){
            // 이미 가입된 정보임
            return $this->json_error("이미 가입된 회원입니다. 아이디 비밀번호 찾기를 이용해주십시요.");
        }

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $mail,
            'name' => $name,
            'typeccd' => 'JOIN' // 회원가입인증메일
        ]);
    }


    /**
     * 회원가입후 이벤트로 각종 쿠폰 발급
     * @return CI_Output
     */
    public function event()
    {
        if($this->session->userdata("is_join") != true) {
            return $this->json_error('회원가입시에만 이벤트 신청이 가능합니다.');
        }

        $sitecode = $this->_req('sitecode');

        if($this->session->userdata('is_login') != true || empty($sitecode) == true){
            return $this->json_error('이벤트적용이 불가능합니다.');
        }

        $cnt = 0;
        // 사이트에 따라서 쿠폰 발급
        foreach($this->_join_coupon[$sitecode] as $key => $row){
            $result = $this->couponFModel->addMemberCoupon($row['type'],$row['no']);
            if($result['ret_cd'] == true){ $cnt++;}
        }

        // 회원가입 축하 상품을 추가
        $this->pointFModel->addSavePoint('lecture', 2000, [
            'site_code' => $sitecode,
            'etc_reason' => '가입축하포인트',
            'reason_type' => 'join'
        ]); // 강좌포인트 2000
        $this->pointFModel->addSavePoint('book', 1000, [
            'site_code' => $sitecode,
            'etc_reason' => '가입축하포인트',
            'reason_type' => 'join'
        ]); // 교재포인트 2000

        $this->session->set_userdata('is_join', false);
        return $this->json_result(true,$cnt.'개의 쿠폰이 발급되었습니다.');
    }


}