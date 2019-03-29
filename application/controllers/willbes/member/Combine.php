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

        if($agree === 'Y'){
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

                if($count > 0){
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

                if($count > 0){
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

                if($count > 0){
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

                if($count > 0){
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
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
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

                if($count > 0){
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
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
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

                if($count > 0){
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
                        $result = $this->memberFModel->setCombineMember($result['MemIdx'], [
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
                'Mem.IsStatus' => 'N'
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