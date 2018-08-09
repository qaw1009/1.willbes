<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', '_lms/sys/site', 'memberF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('Password', 'Change', 'ChangeProc', 'ChangePhone', 'ChangePhoneSms');

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

        // 로그인 페이지를 호출한 페이지
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
                show_alert('아이디와 비밀번호를 정확하게 입력해주십시요.', app_url("/Member/LoginForm/", "www")."/?rtnUrl=".rawurlencode($rtnUrl), false);
            }
        }

        // 아이디와 비밀번호로 로그인가능한 회원 갯수 구하기
        $count = $this->memberFModel->getMemberForLogin($id, $pwd, true);

        // 로그인 가능한 회원갯수가 1 개가 아니면 오류 
        if($count != 1){
            if($chklogin === true){
                return $this->json_error("아이디 혹은 비밀번호가 일치하지 않습니다.");
            } else {
                show_alert("아이디 혹은 비밀번호가 일치하지 않습니다.", "/Member/LoginForm/", false);
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
                if($data['IsStatus'] == 'S'){
                    // 활동상태가 휴면회원
                    return $this->load->view('member/login/sleep', [
                        'MemName' => $data['MemName']
                    ]);

                } else if($data['IsStatus'] == 'P'){
                    // 활동상태가 비밀번호 오래 안바꿈

                } else {
                    // 알수없는 활동상태
                }
                
            }

            if($data['IsChange'] !== 'Y') {
                // 아이디가 통합상태가 아니면
                $this->session->set_userdata('combine_id', $data['MemId']);
                redirect('/Member/Combine/');
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
                show_alert('로그인에 실패했습니다. 다시시도해 주십시요.', app_url("/Member/LoginForm/", "www")."/?rtnUrl=".rawurlencode($rtnUrl), false);
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
        $this->session->sess_destroy();
        show_alert("로그아웃 되었습니다.", "/", false);
        // TODO : 로그아웃시에 로그를 남길 것인지.
    }



    /**
     * 회원가입 본인인증 페이지
     */
    public function Join()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }
        
        // 이메일 코드
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 암호화애서 넘어온 전화번호와 post 로 넘어온 전화번호가 다르면 오류
                if($phone !== $phonenumber){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
        }
    }


    
    /**
     * 사용가능한 아이디 인지 검색
     * @return CI_Output
     */
    public function checkID()
    {
        // 가입페이지에서 호출
        $MemId = $this->_req('MemId');
        // 통합회원 전환페이지에서 호출
        $ChangeId = $this->_req('ChangeId');

        if(empty($MemId) === true){
            $MemId = $ChangeId;
        }

        // 호출 아이디 없으면 사용불가 반환
        if(empty($MemId) === true){
            echo "0001";
            exit(0);
        }

        // 검색 쿼리
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemId' => $MemId
            ]
        ]);

        // 해당 아이디가 존재하면 사용 불가 반환
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
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $input = $this->_reqp(null);

        // 인증정보 검사
        if(empty($input['CertifiedInfoTypeCcd']) === true || empty($input['enc_data']) === true ){
            show_alert('인증정보가 없습니다..','/Member/Join');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
                }

                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $data_arr = explode("^", $plainText);
                $phone = $data_arr[1];
                $name = $data_arr[2];

                // 인증정보 불일치
                if($input['MemName'] != $name || $input['Phone'] != $phone) {
                    show_alert("인증정보가 일치하지 않습니다.", '/Member/Join');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
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
                    show_alert("인증정보가 일치하지 않습니다.", '/Member/Join');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Join');
            }

        } else {
            show_alert('인증정보가 없습니다.','/Member/Join');
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
        $this->validate($rules, '/Member/JoinError');

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

        // 실제 데이타 입력
        $result = $this->memberFModel->storeMember($input);

        if($result === true){
            // 회원정보 추가에 성공후 로그인 처리
            $data = $this->memberFModel->getMemberForLogin($input['MemId'], $input['MemPassword'], false);
            $result = $this->memberFModel->storeMemberLogin($data);
            
            redirect('/member/JoinSuccess');
        } else {
            // 실패시 오류 메세지 출력
            return $this->load->view('member/join/error');
        }
    }

    

    /**
     * 회원가입 완료 페이지
     */
    public function JoinSuccess()
    {
        // 사용하고 있는 사이트들 검색
        $site = $this->siteModel->listSite(['SiteName', 'SiteUrl'], ['EQ'=>['IsUse'=>'Y'], 'NOT'=>['SiteCode'=>'2000']]);

        $this->load->view('member/join/step3', [
            'MemId' => $this->session->userdata('mem_id'),
            'MemName' => $this->session->userdata('mem_name'),
            'Site' => $site
        ]);
    }



    /**
     * 가입오류 페이지
     * @return object|string
     */
    public function JoinError()
    {
        return $this->load->view('member/join/error');
    }




    /**
     * 회원정보 변경 페이지
     * @return object|string
     */
    public function Change()
    {
        $Password = $this->_req('Password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            return $this->load->view('member/change/info_check');
        }

        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/Member/Change/', false);
        }

        $codes = $this->codeModel->getCcdInArray(['661']);

        $this->load->library('encrypt');

        $data = $this->memberFModel->getMember(false, ['EQ'=>['Mem.MemIdx'=>$MemIdx]]);

        return $this->load->view('member/change/info', [
            'mail_domain_ccd' => $codes['661'],
            'password' => $this->encrypt->encode($Password),
            'data' => $data
        ]);
    }

    /**
     * 회원정보변경 처리
     */
    public function ChangeProc()
    {
        $Password = $this->_req('Password');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($Password) === true){
            show_alert('비밀번호를 다시 한번 입력해야 정보변경이 가능합니다.', '/Member/Change/', false);
        }

        $this->load->library('encrypt');
        $Password = $this->encrypt->decode($Password);
        if($this->memberFModel->checkMemberPassword($MemIdx, $Password) === false){
            show_alert('비밀번호가 일치하지 않습니다.', '/Member/Change/', false);
        }

        $data = [
            'Tel' => $this->_req('Tel1').$this->_req('Tel2').$this->_req('Tel3'),
            'Tel1' => $this->_req('Tel1'),
            'Tel2' => $this->_req('Tel2'),
            'Tel3' => $this->_req('Tel3'),
            'ZipCode' => $this->_req('ZipCode'),
            'Addr1' => $this->_req('Addr1'),
            'Addr2' => $this->_req('Addr2')
        ];

        if($this->memberFModel->setMember($MemIdx, $data) == false){
            show_alert('회원정보가 변경에 실패했습니다..', '/Member/Change/', false);
        }

        show_alert('회원정보가 변경되었습니다.', '/Classroom/', false);
    }

    public function ChangePhone()
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
    public function ChangeMailProc()
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
     * 비밀번호 변경 페이지
     * @return object|string
     */
    public function Password()
    {
        $oldPassword = $this->_req('oldPass');
        $newPassword = $this->_req('newPass');
        $newPasswordchk = $this->_req('newPasschk');
        $MemIdx = $this->session->userdata('mem_idx');

        if(empty($oldPassword) === false && empty($newPassword) === true){
            // 새로운 비밀번호 입력
            if($this->memberFModel->checkMemberPassword($MemIdx, $oldPassword) === false){
                show_alert('비밀번호가 일치하지 않습니다.', '/Member/Password/', false);
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
                show_alert('비밀번호가 일치하지 않습니다.', '/Member/Password/', false);
            }

            if($this->memberFModel->setMemberPassword(['MemIdx' => $MemIdx, 'MemPassword' => $newPassword, 'UpdTypeCcd' => '656001']) === false){
                show_alert('비밀번호 변경이 실패했습니다. 다시 시도해주십시요.', '/Member/Password/', false);
            } else {
                show_alert('비밀번호 변경이 완료되었습니다.', '/Classroom/', false);
            }
        }

        return $this->load->view('member/change/password', [
            'method' => 'check',
            'password' => ''
        ]);
    }




    /*
     * 아이디찾기 폼
     */
    public function FindID()
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
    public function FindIDProc()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
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
                    return $this->load->view('member/find/idproc', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
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
                    return $this->load->view('member/find/idproc', [
                        'MemId' => $result['MemId'],
                        'MemName' => $result['MemName'],
                        'JoinDate' => $result['JoinDate']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindID');
        }
    }



    /**
     * 비밀번호 찾기 폼
     */
    public function FindPWD()
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
    public function FindPWDForm()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
        }
    }



    /**
     * 비밀번호 변경 처리
     * @return object|string
     */
    public function FindPWDProc()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
                    }

                    redirect('/Member/setPwdSuccess');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
                    }

                    redirect('/Member/setPwdSuccess');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
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
                        show_alert("비밀번호 변경에 실패했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
                    }

                    // 비밀번호 변경후 인증메일 완료처리
                    $result = $this->memberFModel->updateMailAuth($enc_data);

                    redirect('/Member/setPwdSuccess');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/FindPWD');
        }

    }



    /**
     * 암호변경 완료페이지
     */
    public function setPwdSuccess()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $this->load->view('/member/find/pwdsuccess');
    }



    /**
     * 휴면회원처리 폼
     */
    public function Sleep()
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
    public function ActivateSleep()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
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
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep');
                    }
                    redirect('/Member/ActivateSleepSuccess');
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
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
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep');
                    }

                    redirect('/Member/ActivateSleepSuccess');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');
                
            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                // 암호화 해제 오류 발생
                if(empty($plainText)){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
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
                        show_alert("휴면회원 해제에 실패했습니다. 다시 시도해주십시요.", '/member/sleep');
                    }

                    // 비밀번호 변경후 인증메일 완료처리
                    $result = $this->memberFModel->updateMailAuth($enc_data);

                    redirect('/Member/ActivateSleepSuccess');
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/sleep');
        }
    }



    /**
     * 휴면회원 해제 완료페이지
     */
    public function ActivateSleepSuccess()
    {
        $this->load->view('member/find/sleepProc');
    }


    
    /**
     * 회원통합 페이지
     */
    public function Combine($params = [])
    {
        if(empty($params[0]) != true){
            $agree = $params[0];
        } else {
            $agree = 'N';
        }

        if(strtolower($agree) === 'agree'){
            $agree = 'Y';
        } else {
            $agree = 'N';
        }

        // 이메일코드
        $codes = $this->codeModel->getCcdInArray(['661']);
        
        // 아이핀 인증 데이타
        $this->load->library('NiceAuth');
        $data = $this->niceauth->ipinEnc();

        $this->load->view('member/find/combine', [
            'agree' => $agree,
            'mail_domain_ccd' => $codes['661'],
            'encData' => $data['encData']
        ]);
    }



    /**
     * 회원통합 데이타 입력페이지
     * @return object|string
     */
    public function CombineForm()
    {
        // 이미 로그인한 상태이면 초기 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 인증방법
        $enc_data = $this->_req("enc_data"); // 인증코드
        $MemId = $this->_req('var_id'); // 아이디

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);

                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
                }

                // 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    //가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/CombineForm', [
                        'MemId' => $MemId,
                        'Member' => $result,
                        'enc_data' => $enc_data,
                        'jointype' => $jointype,
                        'IsDup' => $result['IsDup']
                    ]);
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
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
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/CombineForm', [
                        'MemId' => $MemId,
                        'Member' => $result,
                        'enc_data' => $enc_data,
                        'jointype' => $jointype,
                        'IsDup' => $result['IsDup']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                // 인증메일 검색
                $result = $this->memberFModel->getMailAuth([
                    'EQ' => [
                        'certKey' => $enc_data,
                        'IsCert' => 'N'
                    ]]);

                if(empty($result) === true){
                    // 인증메일 없음
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
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
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/CombineForm', [
                        'MemId' => $MemId,
                        'Member' => $result,
                        'enc_data' => $enc_data,
                        'jointype' => $jointype,
                        'IsDup' => $result['IsDup']
                    ]);
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
        }
    }


    /**
     * 회원통합 처리
     * @return object|string
     */
    public function CombineProc()
    {
        // 이미 로그인한 상태이면 호출한 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 인증방법
        $enc_data = $this->_req("enc_data"); // 인증데이타
        $MemId = $this->_req('MemId'); // 회원 아이디
        $ChangeID = $this->_req('ChangeId'); // 변경할 아이디
        $ChangePassword = $this->_req('ChangePassword'); // 변경할 암호
        $TrustStatus = $this->_req('agree4'); // 선택동의여부

        // 선택동의여부 체크
        if($TrustStatus != 'Y'){
            $TrustStatus = 'N';
        }

        if($jointype === "655001") {
            // 아이핀인증
            try {
                // 복호화
                $this->load->library('NiceAuth');
                $data = $this->niceauth->ipinDec($enc_data);

                // 정상 복호화
                if($data['rtnCode'] != 1){
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
                }

                // 고유번호
                $dupInfo = $data['dupInfo'];

                // 검색쿼리
                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.CertifiedInfo' => $dupInfo,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                // 검색
                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                    } else {
                        // 아이디가 중복상태이므로 아이디 암호 변경
                        //
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            // 변경할 아이디나 암호없음
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        // 아이디 검색
                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 이미 사용하고 있는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }
                    }
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];
                $MemId = $data_arr[3];

                $where = [
                    'EQ' => [
                        'MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                    } else {
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 존재하는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }
                    }
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else if($jointype === "655003") {
            // mail 인증
            try {
                $result = $this->memberFModel->getMailAuth([
                    'EQ' => [
                        'certKey' => $enc_data,
                        'IsCert' => 'N'
                    ]]);

                if(empty($result) === true){
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.1", '/Member/Combine');
                }

                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.2", '/Member/Combine');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^메일주소^이름^회원아이디^0000-00-00 00:00:00
                $mail = $data_arr[1];
                $name = $data_arr[2];
                $MemId = $data_arr[3];

                $where = [
                    'EQ' => [
                        'MemId' => $MemId,
                        'Mem.MailEnc' => $this->memberFModel->getEncString($mail),
                        'Mem.MemName' => $name,
                        'Mem.CertifiedInfoTypeCcd' => $jointype,
                        'Mem.IsChange' => 'N'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count > 0){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];
                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                    } else {
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 존재하는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/Member/Combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            // 비밀번호 변경후 인증메일 완료처리
                            $result = $this->memberFModel->updateMailAuth($enc_data);

                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/CombineSuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/Member/Combine');
                        }
                    }
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/Member/Combine');
        }

    }




    /**
     * 회원가입 sms 인증
     * @return CI_Output
     */
    public function JoinSms()
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
                'Mem.IsStatus' => 'D'
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
     * 아이디찾기 SmS 인증
     * @return CI_Output
     */
    public function FindIDSms()
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
                'Mem.IsStatus' => 'D'
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
    public function FindPWDSms()
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
                'Mem.IsStatus' => 'D'
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
     * 휴면회원 해제 SMS
     * @return CI_Output
     */
    public function SleepSms()
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
     * 핸드폰번호변경 SMS
     * @return CI_Output
     */
    public function ChangPhoneSms()
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
     * 통합회원 전환 SMS
     * @return CI_Output
     */
    public function CombineSms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_id = $this->_req('var_id');
        $sms_stat = $this->_req('sms_stat');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberFModel->getEncString($phonenumber);
        $count = $this->memberFModel->getMember(true, [
            'EQ' => [
                'Mem.MemId' => $sms_id,
                'Mem.PhoneEnc' => $phoneEnc,
                'Mem.CertifiedInfoTypeCcd' => '655002'
            ],
            'NOT' => [
                'Mem.IsStatus' => 'D'
            ]
        ]);

        if($count == 0){
            // 가입된정보없음
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
     * 회원가입 메일인증 
     * @return CI_Output
     */
    public function JoinMail()
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
                'Mem.IsStatus' => 'D'
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
     * 아이디찾기 메일 인증
     * @return CI_Output
     */
    public function FindIDMail()
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
                'Mem.IsStatus' => 'D'
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
    public function FindPWDMail()
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


    

    /**
     * 휴면회원 해지메일
     * @return CI_Output
     */
    public function SleepMail()
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




    /**
     * 이메일주소 변경 메일
     * @return CI_Output
     */
    public function ChangeMail()
    {
        $mailid = $this->_req('mail_id');
        $maildomain = $this->_req('mail_domain');
        $idx = $this->session->userdata('mem_idx');

        $mail = $mailid.'@'.$maildomain;

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $mail,
            'MemIdx' => $idx,
            'typeccd' => 'UPDMAIL' // 회원가입인증메일
        ]);
    }




    /**
     * 통합회원 전환 메일 전송
     * @return CI_Output
     */
    public function CombineMail()
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
            // 가입정보없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        $data = $this->memberFModel->getMember(false, $data);

        // 인증메일 전송
        return $this->sendMail([
            'mail' => $data['Mail'],
            'MemIdx' => $data['MemIdx'],
            'typeccd' => 'COMBINE' // 회원가입인증메일
        ]);
    }

    


    /**
     * 핸드폰 번호로 인증번호를 보내거나 해당 핸드폰으로 보낸 인증번호가 맞는지 체크
     */
    private function sendSms($param = [])
    {
        $phone = element('phone', $param);
        $code = element('code', $param);
        $name = element('name', $param);
        $id = element('id', $param);
        $new = element('isnew', $param);

        // 전화번호체크
        if (empty($phone) === true) {
            return $this->json_error("전화번호를 정확하게 입력해주십시요.");

        } else {
            // 전화번호 패턴 체크
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
                empty($this->session->tempdata('sms_code')) === true  ) {
                return $this->json_error("입력시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 전화번호가 일치하는지 체크
            if($phone != $sms_phone){
                return $this->json_error("인증번호를 발송한 전화번호와 일치하지 않습니다. 인증번호 받기를 다시 진행해 주세요.");
            }

            // 입력코드가 정확한지 체크
            if($code == $sms_code){
                // 인증코드가 일치하면 전화번호와 이름을 암호화 해서 넘긴다.`

                // 메세지전송

                // 비밀번호 찾기를 위해 아이디 필드 추가
                // 0000-00-00 00:00:00^전화번호^이름^회원아이디^0000-00-00 00:00:00
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
    private function sendMail($param = [])
    {
        $typeccd = element('typeccd', $param);
        $mail = element('mail', $param);
        $name = element('name', $param);
        $id = element('id', $param);
        $MemIdx = element('MemIdx', $param);

        // 이메일체크
        if(empty($mail) === true){
            return $this->json_error("이메일 주소를 입력해주십시요.");

        } else {
            // 이메일 패턴체크
            $pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
            if(!preg_match($pattern, $mail)){
                // 전화번호 패턴 오류
                return $this->json_error("이메일 주소를 정확하게 입력해주십시요.");
            }
        }

        // 인증키 암호화 
        // 0000-00-00 00:00:00^메일주소^이름^회원아이디^0000-00-00 00:00:00
        $var_data = Date('YmdHis')."^{$mail}^{$name}^{$id}^".Date('YmdHis');
        $this->load->library('encrypt');
        $enc_data = $this->encrypt->encode($var_data);

        // 전송한인증메일 정보 DB저장
        $result = $this->memberFModel->storeMailAuth([
            'MemIdx' => $MemIdx,
            'CertKey' => $enc_data,
            'CertMail' => $mail,
            'MailCertTypeCcd' => $typeccd
        ]);

        // 메일 발송 실패
        if($result === false){
            return $this->json_error("메일발송에 실패했습니다. 다시 시도해주십시요.");
        }

        // 성공리턴
        return $this->json_result(true, "인증메일을 발송했습니다.\n발송된 메일의 인증링크를 30분 안에 클릭해 주세요. ");
    }




    /**
     * 메일인증
     * @param array $params
     * @return object|string
     */
    public function mailAuth($params = [])
    {
        // 파라미터체크
        if(empty($params[0]) === true || empty($params[1]) === true){
            return $this->load->view('auth/certMail_Error', [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        // 주소/인증키/인증메일
        $certKey = $params[0];
        $certMail = $params[1];

        // 검색쿼리
        $result = $this->memberFModel->getMailAuth([
            'EQ' => [
                'certKey' => $certKey,
                'certMail' => $certMail
            ]]);

        if(empty($result) === true){
            // 검색정보 없음
            return $this->load->view("auth/certMail_Error", [
                'msg' => '인증정보가 올바르지 않습니다.'
            ]);
        }

        // 시간체크
        $now = strtotime(date('Y-m-d H:i:s')); // 지금 시간
        $sendDate = strtotime($result['MailSendDatm'].'+30 minutes'); // 보낸시간 더하기 30분

        // 인증시간 초과 보내고나서 30분
        if($now > $sendDate){
            return $this->load->view("auth/certMail_Error", [
                'code' => 'over',
                'msg' => '인증시간이 초과했습니다.',
                'returnurl' => $this->_urlFromMailAuthCcd[$result['MailCertTypeCcd']]
            ]);
        }

        // 이미 사용한 인증키
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




    /**
     * 아이핀 결과 반환 페이지
     */
    public function ipinRtn()
    {
        $this->load->library('NiceAuth');

        $sReservedParam1 = $this->_req('param_r1'); // 아이핀을 사용 구분
        $sReservedParam2 = $this->_req('param_r2'); // 필요할때 아이디
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
}

