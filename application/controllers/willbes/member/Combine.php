<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Combine extends BaseMember
{
    protected $auth_controller = false;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 회원통합 페이지
     */
    public function index($params = [])
    {
        $MemIdx = $this->session->userdata('combine_idx');
        $MemId = $this->session->userdata('combine_id');

        if(empty($MemIdx) === true || empty($MemId)){
            show_alert("회원통합을 진행할 정보가 없습니다.", '/');
        }

        $data = $this->memberFModel->getMember(false, ['EQ' => [
            'Mem.MemIdx' => $MemIdx,
            'Mem.MemId' => $MemId,
            ]]);

        if(empty($data) === true){
            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/');
        }

        $agree = $this->_req('agree');

        // 아이디가 중복 상태이면 본인 확인을 거쳐야합니다.
        if($data['IsDup'] == 'Y'){
            // 아이디가 중복이면 본인인증
            $agree = 'Y';
        } else {
            // 아이디가 중복이 안이면 그냥 확인만
            $agree = 'N';
        }

        // 이메일코드
        $codes = $this->codeModel->getCcdInArray(['661']);

        // 아이핀 인증 데이타
        $this->load->library('NiceAuth');
        $ipin = $this->niceauth->ipinEnc();

        $this->load->view('member/find/combine', [
            'agree' => $agree,
            'mail_domain_ccd' => $codes['661'],
            'encData' => $ipin['encData'],
            'jointype' => $data['CertifiedInfoTypeCcd']
        ]);
    }


    /**
     * 중복으로 인해 오류 사용자 본인인증 페이지
     * @return object|string
     */
    public function dup()
    {
        $MemId = $this->session->userdata('combine_id');
        if(empty($MemId) === true){
            redirect('/');
        }

        return $this->load->view('member/find/dup_cert',[
            'id' => $MemId
        ]);
    }


    /**
     * 회원 통합 정보 변경 페이지
     * @return object|string
     */
    public function dupform()
    {
        // 이미 로그인한 상태이면 초기 페이지로 돌려보낸다.
        if($this->session->userdata('is_login') === true){
            show_alert('이미 로그인 상태입니다.', '/', false);
        }

        $jointype = $this->_req("jointype"); // 인증방법
        $enc_data = $this->_req("enc_data"); // 인증코드
        $MemId = $this->_req('var_id'); // 아이디

        // 핸드폰 sms 인증
        try {
            // 복호화
            $this->load->library('encrypt');
            $plainText = $this->encrypt->decode($enc_data);

            if(empty($plainText)){
                // 암호화 해제 오류 발생
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
            }

            // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
            $data_arr = explode("^", $plainText);
            $phone = $data_arr[1];
            $MemId = $data_arr[3];

            // 검색쿼리 해당 아이디에 전화번호 확인
            $where = [
                'EQ' => [
                    'MemId' => $MemId,
                    'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone)
                ]
            ];

            $count = $this->memberFModel->getMember(true, $where);

            if($count == 1){
                // 가입정보가 있을경우
                $result = $this->memberFModel->getMember(false, $where);
                if($result['IsDup'] == 'Y') {
                    return $this->load->view('member/find/dup_form1', [
                        'MemId' => $MemId,
                        'Member' => $result,
                        'enc_data' => $enc_data,
                        'jointype' => $jointype
                    ]);
                } else {
                    return $this->load->view('member/find/dup_form2', [
                        'MemId' => $MemId,
                        'Member' => $result,
                        'enc_data' => $enc_data,
                        'jointype' => $jointype
                    ]);
                }

            }
            // 가입정보 없음
            return $this->load->view('member/find/dup_notfind');

        } catch(Exception $e) {
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine/dup');
        }
    }


    /**
     * 회원 통합 처리 페이지
     */
    public function dupproc()
    {
        $enc_data = $this->_req("enc_data"); // 인증데이타
        $ChangeID = $this->_req('ChangeId'); // 변경할 아이디
        $ChangePassword = $this->_req('ChangePassword'); // 변경할 암호
        $TrustStatus = $this->_req('agree4'); // 선택동의여부
        $chgid = $this->_req('chgid'); // 아이디변경여부

        if($chgid == 'Y'){ // 아이디변경
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];
                $MemId = $data_arr[3];

                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.IsDup' => 'Y',
                        'Mem.IsChange' => 'N'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count == 1){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if(empty($ChangeID) == true || empty($ChangePassword) == true){
                        show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/member/combine');
                    }

                    $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                    if($result > 0){
                        // 존재하는 아이디
                        show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/member/combine');
                    }

                    // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                    $result = $this->memberFModel->setCombineMember($MemIdx, [
                        'MemId' => $ChangeID,
                        'MemPassword' => $ChangePassword,
                        'TrustStatus' => $TrustStatus
                    ], true );

                    if($result === true){
                        $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);

                        $this->session->set_tempdata('com_idx', $MemIdx, 60);

                        redirect('member/combine/dupsuccess');

                    } else {
                        show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine/dup');
                    }
                }
                // 가입정보 없음
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine/dup');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine/dup');
            }

        } else { // 비밀번호만 변경
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
                }

                $data_arr = explode("^", $plainText);
                // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
                $phone = $data_arr[1];
                $name = $data_arr[2];
                $MemId = $data_arr[3];

                $where = [
                    'EQ' => [
                        'Mem.MemId' => $MemId,
                        'Mem.PhoneEnc' => $this->memberFModel->getEncString($phone),
                        'Mem.IsDup' => 'N',
                        'Mem.IsChange' => 'Y'
                    ]
                ];

                $count = $this->memberFModel->getMember(true, $where);

                if($count == 1){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if(empty($ChangePassword) == true){
                        show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/member/combine');
                    }

                    // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                    $result = $this->memberFModel->setCombineMember($MemIdx, [
                        'MemId' => $ChangeID,
                        'MemPassword' => $ChangePassword,
                        'TrustStatus' => $TrustStatus
                    ], false );

                    if($result === true){
                        $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);

                        $this->session->set_tempdata('com_idx', $MemIdx, 60);

                        redirect('member/combine/dupsuccess');

                    } else {
                        show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine/dup');
                    }
                }
                // 가입정보 없음
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine/dup');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine/dup');
            }
        }


    }


    /**
     * 회원통합 완료 페이지
     * @return object|string
     */
    public function dupsuccess()
    {
        $MemIdx = $this->session->tempdata('com_idx');

        if(empty($MemIdx) == true){
            redirect('/');
        }

        $data = $this->memberFModel->getMember(false, [ 'EQ' => ['Mem.MemIdx' => $MemIdx]]);
        if(empty($data) == true){
            redirect('/');
        }

        return $this->load->view('member/find/dup_success',[
            'MemId' => $data['MemId'],
            'MemName' => $data['MemName'],
            'ChgDate' => $data['ChangeDate']
        ]);
    }

    /**
     * 읻전에 사용하던 비밀번호인지 체크
     *
     */
    public function checkPWD()
    {
        try {
            $enc_data = $this->_req("enc_data"); // 인증데이타
            $pwd = $this->_req("ChangePassword"); // 인증데이타

            $this->load->library('encrypt');
            $plainText = $this->encrypt->decode($enc_data);
            $data_arr = explode("^", $plainText);
            // 0000-00-00 00:00:00^전화번호^이름^회원번호^0000-00-00 00:00:00
            $MemId = $data_arr[3];

            // 해당 아이디/비번으로 로그인 가능한 정보가 있는지
            $count = $this->memberFModel->getMemberForLogin($MemId, $pwd, true);

            // 로그인 가능한 정보가 있다면 사용할수 없는 아이디임
            if ($count > 0) {
                echo "0001";
                exit(0);

            } else {
                echo "0000";
                exit(0);
            }
        } catch(Exception $e) {
            echo "0001";
            exit(0);
        }
    }


    /**
     * 통홥회원 전환 동의 하면 그냥 처리
     * @return object|string
     */
    public function agree()
    {
        $MemIdx = $this->session->userdata('combine_idx');
        if(empty($MemIdx) === true){
            redirect('/');
        }

        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
        $result = $this->memberFModel->setCombineMember($MemIdx, [ 'TrustStatus' => 'Y' ], false);

        if($result === true) {
            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);

            $this->session->set_userdata('combine_id', '');
            $this->session->set_userdata('combine_idx', '');

            return $this->load->view('member/find/combinesuccess', [
                'MemName' => $data['MemName'],
                'MemId' => $data['MemId'],
                'ChangeDate' => $data['ChangeDate']
            ]);
        } else {
            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
        }
    }


    /**
     * 회원통합 데이타 입력페이지
     * @return object|string
     */
    public function form()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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

                if($count == 1){
                    //가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/combineform', [
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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

                if($count == 1){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/combineform', [
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
                }

                // 복호화
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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

                if($count == 1){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    return $this->load->view('member/find/combineform', [
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
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
        }
    }

    /**
     * 회원통합 처리
     * @return object|string
     */
    public function proc()
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
                    show_alert("아이핀 인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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

                if($count == 1){
                    // 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                    } else {
                        // 아이디가 중복상태이므로 아이디 암호 변경
                        //
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            // 변경할 아이디나 암호없음
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        // 아이디 검색
                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 이미 사용하고 있는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($MemIdx, [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }
                    }
                }

                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
            }

        } else if($jointype === "655002") {
            // 핸드폰 sms 인증
            try {
                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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

                if($count == 1){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];

                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                    } else {
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 존재하는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($MemIdx, [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }
                    }
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
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
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.1", '/member/combine');
                }

                $this->load->library('encrypt');
                $plainText = $this->encrypt->decode($enc_data);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.2", '/member/combine');
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

                if($count == 1){
                    // 이미 가입정보가 있을경우
                    $result = $this->memberFModel->getMember(false, $where);
                    $MemIdx = $result['MemIdx'];
                    if($result['IsDup'] === 'N'){
                        //아이디 중복상태가 아니므로 통합회원으로 플래그만 변경
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [ 'TrustStatus' => $TrustStatus ], false);

                        if($result === true){
                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                    } else {
                        if(empty($ChangeID) == true || empty($ChangePassword) == true){
                            show_alert("정보가 정확하지않습니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        $result = $this->memberFModel->getMember(true, ['EQ'=>['MemId'=>$ChangeID]]);
                        if($result > 0){
                            // 존재하는 아이디
                            show_alert("사용할수없는 아이디입니다. 다시 시도해주십시요.", '/member/combine');
                        }

                        // 아이디가 중복 상태이므로 아이디 비밀번호 변경
                        $result = $this->memberFModel->setCombineMember($MemIdx, [
                            'MemId' => $ChangeID,
                            'MemPassword' => $ChangePassword,
                            'TrustStatus' => $TrustStatus
                        ], true );

                        if($result === true){
                            // 비밀번호 변경후 인증메일 완료처리
                            $result = $this->memberFModel->updateMailAuth($enc_data);

                            $data = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $MemIdx]]);
                            return $this->load->view('member/find/combinesuccess', [
                                'MemName' => $data['MemName'],
                                'MemId' => $data['MemId'],
                                'ChangeDate' => $data['ChangeDate']
                            ]);
                        } else {
                            show_alert("통합회원처리에 실패했습니다. 다시 시도해주십시요.", '/member/combine');
                        }
                    }
                }
                // 가입정보 없음
                return $this->load->view('member/find/notfind');

            } catch(Exception $e) {
                show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
            }

        } else {
            // 오류발생
            show_alert("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.", '/member/combine');
        }

    }


    /**
     * 통합회원 전환 SMS
     * @return CI_Output
     */
    public function sms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_id = $this->_req('var_id');
        $sms_stat = $this->_req('sms_stat');
        $isall = $this->_req('isall');

        $isNew = ($sms_stat == "NEW" ? true : false);

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberFModel->getEncString($phonenumber);

        // 가입 방삭에 관계없이 모두 검색
        if($isall == 'Y') {
            $count = $this->memberFModel->getMember(true, [
                'EQ' => [
                    'Mem.MemId' => $sms_id,
                    'Mem.PhoneEnc' => $phoneEnc
                ],
                'NOT' => [
                    'Mem.IsStatus' => 'N'
                ]
            ]);
        } else {
            $count = $this->memberFModel->getMember(true, [
                'EQ' => [
                    'Mem.MemId' => $sms_id,
                    'Mem.PhoneEnc' => $phoneEnc,
                    'Mem.CertifiedInfoTypeCcd' => '655002'
                ],
                'NOT' => [
                    'Mem.IsStatus' => 'N'
                ]
            ]);
        }


        if($count == 0){
            // 가입된정보없음
            return $this->json_error("가입된 정보가 없습니다.\n정보를 다시 확인하시거나 회원가입을 진행해주십시요.");
        }

        if($count != 1){
            // 가입된정보가 2개 이상임 오류
            return $this->json_error("가입된 정보에 문제가 있습니다.\n고객센터로 연락주시기 바랍니다.");
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
     * 통합회원 전환 메일 전송
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
                'Mem.IsStatus' => 'N'
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



}