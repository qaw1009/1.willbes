<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'memberF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    protected $_urlFromMailAuthCcd = [
        '662001' => '/member/join',
        '662002' => '/member/findid',
        '662003' => '/member/findpwd',
        '662004' => '/member/sleep',
        '662005' => '/'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그인페이지
     */
    public function LoginForm()
    {
        // 쿠키에 저장된 아이디
        $saved_member_id = get_cookie('saved_member_id');
        if (empty($saved_member_id) === false) {
            // 아이디 복호화
            $this->load->library('encrypt');
            $saved_member_id = $this->encrypt->decode($saved_member_id);
        }

        // 로그인 페이지를 호출함 페이지
        $rtnUrl = rawurldecode($this->_req('rtnUrl'));
        if(empty($rtnUrl)){
            $rtnUrl = '/';
        }

        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', $rtnUrl, false);
            return;
        }

        // 로그인페이지 호출
        $this->load->view('member/login/form', [
            'islogin' => true,
            'saved_member_id' => $saved_member_id,
            'rtnUrl' => rawurlencode($rtnUrl)
        ]);
    }

    /**
     * 로그인처리
     */
    public function Login()
    {
        $id = $this->_req('id');
        $pwd = $this->_req('pwd');
        $chklogin = $this->_req('chklogin');
        $rtnUrl = rawurldecode($this->_req('rtnUrl'));
        $isSaveId = $this->_req('isSaveId');

        if(empty($rtnUrl) === true){
            $rtnUrl = "/";
        }

        $chklogin = ($chklogin == 1) ? true : false;

        // 아이디나 비밀번호가 비어있으면 오류
        if(empty($id) || empty($pwd)){
            if($chklogin === true) {
                return $this->json_error('아이디와 비밀번호를 정확하게 입력해주십시요.');
            } else {
                show_alert('아이디와 비밀번호를 정확하게 입력해주십시요.', app_url("/member/loginform/", "www")."/?rtnUrl=".rawurlencode($rtnUrl), false);
            }
        }

        // 아이디와 비밀번호로 로그인가능한 회원 갯수 구하기
        $count = $this->memberFModel->getMemberForLogin($id, $pwd, true);

        // 로그인 가능한 회원갯수가 1 개가 아니면 오류 
        if($count != 1){
            if($chklogin === true){
                return $this->json_error("아이디 혹은 비밀번호가 일치하지 않습니다.");
            } else {
                show_alert("아이디 혹은 비밀번호가 일치하지 않습니다.", "/Member/loginForm/", false);
            }
        }


        if($chklogin === true){
            // 로그인 페이지에서 ajax를 이용해 로그인 가능한지 찔러보기
            return $this->json_result(true, '');

        } else {
            // 실제로 post 로 form submit
            $data = $this->memberFModel->getMemberForLogin($id, $pwd, false);

            if($data['IsStatus'] != 'Y'){
                // 활동상태가 정상이 아니면 인데.. 머머 체크해야할지..
            }

            if($data['IsDup'] === 'Y'){
                // 아이디가 중복상태이면 회원 통합/아이디변경 페이지로 이동한다.
            }

            // 실제 로그인처리하기 로그인 처리및 로그저장
            $result = $this->memberFModel->storeMemberLogin($data);

            if($result === true){
                // 아이디 저장 쿠키 생성/삭제
                if ($isSaveId == 'Y') {
                    // 쿠키값 암호화
                    $this->load->library('encrypt');
                    $enc_member_id = $this->encrypt->encode($data['MemId']);

                    // expire : 30 days
                    set_cookie('saved_member_id', $enc_member_id, 86400 * 30);
                } else {
                    delete_cookie('saved_member_id');
                }

                show_alert('로그인 되었습니다.', $rtnUrl, false);

            } else {
                show_alert('로그인에 실패했습니다. 다시시도해 주십시요.', app_url("/member/loginform/", "www")."/?rtnUrl=".rawurlencode($rtnUrl), false);
            }
        }
    }

    /**
     * 로그아웃처리
     */
    public function Logout()
    {
        $this->session->set_userdata('mem_idx', '');
        $this->session->set_userdata('mem_id', '');
        $this->session->set_userdata('mem_name', '');
        $this->session->set_userdata('is_login', false);

        show_alert("로그아웃 되었습니다.", "/", false);
    }

    /**
     * 회원가입 본인인증 페이지
     */
    public function Join()
    {
        $codes = $this->codeModel->getCcdInArray(['661']);
        $this->load->view('member/join/step1', [
            'mail_domain_ccd' => $codes['661']
        ]);
    }

    /**
     * 회원가입 폼
     */
    public function JoinForm()
    {
        $jointype = $this->_req("jointype");
        $enc_data = $this->_req("enc_data");

        $codes = $this->codeModel->getCcdInArray(['661']);

        if($jointype === "655002") {
            // 핸드폰 sms 인증
            $phonenumber = $this->_req('phone_number');

            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];

                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

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

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $mail = $data_arr[1];
                $name = $data_arr[2];

                $mailArr = explode('@', $mail);
                $mailId = $mailArr[0];
                $mailDomain = $mailArr[1];

                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

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
     * 회원가입시 사용가능한 아이디인지 체크
     * @return CI_Output
     */
    public function checkID()
    {
        $MemId = $this->_req('MemId');

        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemId' => $MemId
            ]
        ]);

        if($count > 0){
            echo "0001";
            exit(0);
        } else {
            echo "0000";
            exit(0);
        }
    }

    /**
     * 회원가입 처리페이지
     */
    public function JoinProc()
    {
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

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 인증정보 불일치
                if($input['MemName'] != $name || $input['Phone'] != $phone) {
                    show_alert("인증정보가 일치하지 않습니다.", '/member/join');
                }

                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $CertifiedInfoTypeCcd
                    ]
                ];

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

        } else if($CertifiedInfoTypeCcd == '655002') {
            // 이메일인증정보 정상인지 체크
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/join');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $mail = $data_arr[1];
                $name = $data_arr[2];

                $mailArr = explode('@', $mail);
                $mailId = $mailArr[0];
                $mailDomain = $mailArr[1];

                // 인증정보 불일치
                if($input['MemName'] != $name || $input['MailId'] != $mailId || $input['MailDomain'] != $mailDomain) {
                    show_alert("인증정보가 일치하지 않습니다.", '/member/join');
                }

                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $CertifiedInfoTypeCcd
                    ]
                ];

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
        // 파라미터검사
        
        // Phone 나누기
        $Phone = $input['Phone'];
        $Phone1 = substr($Phone,0,3);
        $Phone2 = substr($Phone,3,-4);
        $Phone3 = substr($Phone,-4);

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

        // 실제 데이타 입력
        $result = $this->memberFModel->storeMember($input);

        if($result === true){
            // 입력성공후 로그인처리
            $data = $this->memberFModel->getMemberForLogin($input['MemId'], $input['MemPassword'], false);
            $result = $this->memberFModel->storeMemberLogin($data);
            
            redirect('/member/JoinSuccess');
        } else {
            // 실패시 오류 메세지 출력
            $this->load->view('member/join/error', [ ]);
        }
    }

    /**
     * 회원가입 완료
     */
    public function JoinSuccess()
    {
        // 완료 뷰페이지
        $site = $this->siteModel->listSite(['SiteName', 'SiteUrl'], ['EQ'=>['IsUse'=>'Y'], 'NOT'=>['SiteCode'=>'2000']]);

        $this->load->view('member/join/step3', [
            'MemId' => $this->session->userdata('mem_id'),
            'MemName' => $this->session->userdata('mem_name'),
            'Site' => $site
        ]);
    }

    /*
     * 아이디찾기 폼
     */
    public function FindID()
    {
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
    public function FindIDProc()
    {
        $jointype = $this->_req("jointype");
        $enc_data = $this->_req("enc_data");

        if($jointype === "655001") {
            // 아이핀인증
            try {
                $this->load->library('NiceAuth');
                // 복호화
                $data = $this->niceauth->ipinDec($enc_data);
                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
                }
                // 고유번호                
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
                    // 이미 가입정보가 있을경우
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];

                $where = [
                    'EQ' => [
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
                $mail = $data_arr[1];
                $name = $data_arr[2];

                $where = [
                    'EQ' => [
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/findid');
        }
    }

    /**
     * 비밀번호 찾기 폼
     */
    public function FindPWD()
    {
        $this->load->view('member/find/pwd', [
        ]);
    }

    /**
     * 비밀번호찾기 처리
     */
    public function FindPWDProc()
    {
        $this->load->view('member/find/pwdProc', [
        ]);
    }

    /**
     * 휴면회원처리 폼
     */
    public function Sleep()
    {
        $this->load->view('member/find/sleep', [
        ]);
    }

    /**
     * 휴면회원 정상화 처리
     */
    public function ActivateSleep()
    {
        $this->load->view('member/find/sleepProc', [
        ]);
    }

    /**
     * 회원통합 페이지
     */
    public function MergeMember()
    {

    }

    /**
     * 아이핀 결과 반환 페이지
     */
    public function ipinRtn()
    {
        $this->load->library('NiceAuth');

        $sReservedParam1 = $this->_req('param_r1'); // 아이핀을 사용 구분
        $sReservedParam2 = $this->_req('param_r2');
        $sReservedParam3 = $this->_req('param_r3');
        $sResponseData = $this->_req('enc_data');

        $decData = $this->niceauth->ipinDec($sResponseData);

        if($decData['rtnCode'] != 1){
            $this->load->view('auth/Error', [ 'msg' => $decData['rtnMsg'] ]);

        } else if( $sReservedParam1 == ''){
            $this->load->view('auth/Error', [ 'msg' => '입력값이 잘못 되었습니다.' ]);

        } else {
            $this->load->view('auth/ipin_' . $sReservedParam1, [
                'sResponseData' => $sResponseData,
                'sReservedParam1' => $sReservedParam1,
                'sReservedParam2' => $sReservedParam2,
                'sReservedParam3' => $sReservedParam3
            ]);
        }
    }

    /**
     * 회원가입 sms 인증
     * @return CI_Output
     */
    public function joinSms()
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
                'Mem.PhoneEnc' => $phoneEnc
            ]
        ]);

        if($count > 0){
            // 이미 가입된 정보임
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
     * 아이디찾기 SmS 인증
     * @return CI_Output
     */
    public function findidSms()
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
            ]
        ]);

        if($count == 0){
            // 이미 가입된 정보임
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
     * 회원가입 메일인증 
     * @return CI_Output
     */
    public function joinMail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $name = $this->_req('var_name');

        $mail = $mailid.'@'.$maildomain;

        // 이미 가입된 정보 검색
        $mailEnc = $this->memberFModel->getEncString($mail);
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemName' => $name,
                'Mem.MailEnc' => $mailEnc
            ]
        ]);

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
     * 아이디찾기 메일 인증
     * @return CI_Output
     */
    public function findidMail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $name = $this->_req('var_name');

        $mail = $mailid.'@'.$maildomain;

        // 이미 가입된 정보 검색
        $mailEnc = $this->memberFModel->getEncString($mail);
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemName' => $name,
                'Mem.MailEnc' => $mailEnc,
                'Mem.CertifiedInfoTypeCcd' => '655003'
            ]
        ]);

        if($count == 0){
            // 이미 가입된 정보임
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
     * 핸드폰 번호로 인증번호를 보내거나 해당 핸드폰으로 보낸 인증번호가 맞는지 체크
     */
    public function sendSms($param = [])
    {
        $phone = element('phone', $param);
        $code = element('code', $param);
        $name = element('name', $param);
        $id = element('id', $param);
        $new = element('isnew', $param);

        if (empty($phone) === true) {
            return $this->json_error("전화번호를 정확하게 입력해주십시요.");

        } else {
            $pattern = "^01(?:0|1|[6-9])(?:\d{3}|\d{4})\d{4}$^";
            if(!preg_match($pattern, $phone)){
                // 전화번호 패턴 오류
                return $this->json_error("전화번호를 정확하게 입력해주십시요.");
            }
        }

        if($new == true) {
            // 새로인증시작 코드이면
            // 인증번호 생성
            $this->load->helper('string');
            $code = random_string('numeric', 6);
            $limit_date = Date("Y/m/d H:i:s", strtotime('+3 minutes '));

            //세션에 인증코드와 인증 시간을 기록한다.
            $this->session->set_tempdata('sms_phone', $phone, 180);
            $this->session->set_tempdata('sms_code', $code, 180);
            $this->session->set_tempdata('sms_name', $name, 180);
            $this->session->set_tempdata('sms_id', $id, 180);

            return $this->json_result(true,"인증번호를 발송하였습니다. {$code}",
                null, [
                    'limit_date' => $limit_date
                ]);

        } else {
            // 인증코드가 있으면 해당 전화번호로 보낸 인증코드가 정확한지 체크합니다.
            $sms_phone = $this->session->tempdata('sms_phone');
            $sms_code = $this->session->tempdata('sms_code');
            $sms_name = $this->session->tempdata('sms_name');
            $sms_id = $this->session->tempdata('sms_id');

            // 입력 시간이 초과했는지 체크
            if (empty($this->session->tempdata('sms_phone')) === true ||
                empty($this->session->tempdata('sms_code')) === true  ||
                empty($this->session->tempdata('sms_name')) === true  ) {
                return $this->json_error("입력시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 전화번호가 일치하는지 체크
            if($phone != $sms_phone){
                return $this->json_error("인증번호를 발송한 전화번호와 일치하지 않습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 입력코드가 정확한지 체크
            if($code == $sms_code){
                // 인증코드가 일치하면 전화번호와 이름을 암호화 해서 넘긴다.


                // 메세지전송


                // 비밀번호 찾기를 위해 아이디 필드 추가
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $var_data = Date('YmdHis')."^{$sms_phone}^{$sms_name}^{$sms_id}^".Date('YmdHis');
                $this->load->library('encrypt');
                $enc_data = $this->encrypt->encode($var_data);
                return $this->json_result(true,"인증번호가 확인되었습니다.",
                    null, [
                        'err_cd' => 0,
                        'enc_data' => $enc_data,
                        'phone_number' => $sms_phone
                    ]);

            } else {
                // 인증번호 불일치
                return $this->json_error("인증번호가 일치하지 않습니다. 확인후 다시 입력해주세요.");
            }

        }
    }

    /**
     * 인증 이메일 보내기
     * @param array $param
     * @return CI_Output
     */
    public function sendMail($param = [])
    {
        $typeccd = element('typeccd', $param);
        $mail = element('mail', $param);
        $name = element('name', $param);
        $MemIdx = element('MemIdx', $param);

        if(empty($mail) === true){
            return $this->json_error("이메일 주소를 입력해주십시요.");

        } else {
            $pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
            if(!preg_match($pattern, $mail)){
                // 전화번호 패턴 오류
                return $this->json_error("이메일 주소를 정확하게 입력해주십시요.");
            }
        }

        // 인증키 암호화 
        // 0000-00-00 00:00:00^메일주소^이름^회원번호^0000-00-00 00:00:00
        $var_data = Date('YmdHis')."^{$mail}^{$name}^{$MemIdx}^".Date('YmdHis');
        $this->load->library('encrypt');
        $enc_data = $this->encrypt->encode($var_data);

        // 인증메일전송


        
        // 전송한인증메일 정보 DB저장
        $result = $this->memberFModel->storeMailAuth([
            'CertKey' => $enc_data,
            'CertMail' => $mail,
            'MailCertTypeCcd' => $typeccd
        ]);

        // 메일 발송 실패
        if($result === false){
            return $this->json_error("메일발송에 실패했습니다. 다시 시도해주십시요.");
        }

        // 성공리턴
        return $this->json_result(true, "인증메일을 발송했습니다.");
    }

    /**
     * 메일인증
     * @param array $params
     * @return object|string
     */
    public function mailAuth($params = [])
    {
        if(empty($params[0]) === true || empty($params[1]) === true){
            return $this->load->view('auth/certMail_Error', [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        $certKey = $params[0];
        $certMail = $params[1];

        $result = $this->memberFModel->getMailAuth([
            'EQ' => [
                'certKey' => $certKey,
                'certMail' => $certMail
            ]]);

        if(empty($result) === true){
            return $this->load->view("auth/certMail_Error", [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        $now = strtotime(date('Y-m-d H:i:s')); // 지금 시간
        $sendDate = strtotime($result['MailSendDatm'].'+30 minutes'); // 보낸시간 더하기 30분

        if($now > $sendDate){
            return $this->load->view("auth/certMail_Error", [
                'code' => 'over',
                'msg' => '인증시간이 초과했습니다.',
                'returnurl' => $this->_urlFromMailAuthCcd[$result['MailCertTypeCcd']]
            ]);
        }

        if($result['IsCert'] == 'Y'){
            return $this->load->view("auth/certMail_Error", [
                'code' => 'used',
                'msg' => '이미 사용한 인증코드입니다.',
                'returnurl' => $this->_urlFromMailAuthCcd[$result['MailCertTypeCcd']]
            ]);
        }

        return $this->load->view("auth/certMail_success", [
            'enc_data' => $result['CertKey'],
            'CertTypeCcd' => $result['MailCertTypeCcd']
        ]);

    }
}
