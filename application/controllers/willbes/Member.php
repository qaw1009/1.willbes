<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code', 'member');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();

        $this->load->library('restClient');
    }

    /**
     * 로그인페이지
     */
    public function Login()
    {
        $this->load->view('member/login/form', [
            ]);
    }

    /**
     * 로그인처리
     */
    public function LoginProc()
    {

    }

    /**
     * 로그아웃처리
     */
    public function LogoutProc()
    {

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
                $plainText = $this->encrypt->decode($enc_data, $this->encKey);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_error("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.".$enc_data);
                    return;
                }

                $data_arr = explode("^", $plainText);
                // temp^전화번호^이름^temp
                $phone = $data_arr[1];
                $name = $data_arr[2];

                if($phone != $phonenumber){

                }


                return $this->load->view('member/join/step2', [
                    'mail_domain_ccd' => $codes['661'],
                    'jointype' => $jointype,
                    'enc_data' => $enc_data,
                    'phone' => $phone,
                    'memName' => $name
                ]);
            } catch(Exception $e) {
                show_error("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.");
                return;
            }


        } else if($jointype === "655003") {
            // email 인증
            
        } else {
            // 오류발생
            show_error("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.");
            return;
        }
    }

    /**
     * 회원가입시 사용가능한 아이디인지 체크
     * @return CI_Output
     */
    public function checkID()
    {
        $MemId = $this->_req('MemId');

        $count = $this->memberModel->getMember(true, [
            'EQ' => [
                'Mem.MemId' => $MemId
            ]
        ]);

        if($count > 0){
            return $this->json_result(true, '이미 사용중인 아이디 입니다. 다른 아이디를 선택해 주십시요.', null, [
                'err_cd' => 1
            ]);
        } else {
            return $this->json_result(true, '사용가능한 아이디입니다.', null, [
                'err_cd' => 0
            ]);
        }
    }

    /*
     * 회원가입 처리
     */
    public function JoinProc()
    {
        $this->load->view('member/join/step3', [ ]);
    }

    /*
     * 아이디찾기 폼
     */
    public function FindID()
    {
        $this->load->view('member/find/id', [
        ]);
    }

    /**
     * 아이디찾기 처리
     */
    public function FindIDProc()
    {

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

    }

    /**
     * 휴면회원처리 폼
     */
    public function FindSleep()
    {
        $this->load->view('member/find/sleep', [
        ]);
    }

    /**
     * 휴면회원 정상화 처리
     */
    public function ActivateSleep()
    {

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
     * 핸드폰 번호로 인증번호를 보내거나 해당 핸드폰으로 보낸 인증번호가 맞는지 체크
     * @param string $phonenumber
     * @param string $authcode
     */
    public function sms()
    {
        $phonenumber = $this->_req('var_phone');
        $authcode = $this->_req('var_auth');
        $sms_name = $this->_req('var_name');

        // 이미 가입된 정보 검색
        $phoneEnc = $this->memberModel->getEncString($phonenumber);
        $count = $this->memberModel->getMember(true, [
            'EQ' => [
                'Mem.MemName' => $sms_name,
                'Mem.PhoneEnc' => $phoneEnc
            ]
        ]);

        if($count > 0){
            // 이미 가입된 정보임
            return $this->json_result(true, '이미 가입된 회원입니다. 아이디 비밀번호 찾기를 이용해주십시요.', null, [
                'err_cd' => 8
            ]);
        }
        // SMS 인증 처리
        $data = $this->api_get_data(
            $this->restclient->getDataJson('member/certify/sms/' , [
            'phone' => $phonenumber,
            'code' => $authcode,
            'name' => $sms_name
        ])
        );

        echo var_dump($data);
        return;

        return $this->json_result(true, $data['ret_msg'], null, [
            'ret_data' => $ret_data
        ]);
    }
}
