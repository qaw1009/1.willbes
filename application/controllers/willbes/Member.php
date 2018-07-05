<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array('_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();
    protected $encKey = "willbesjoinkey";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('restClient');
        $this->load->library('encrypt');

        //date_default_timezone_set('Asia/Seoul');
    }

    /**
     * 로그인페이지
     */
    public function Login()
    {
        $this->load->view('member/login/form', [ ]);
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
    public function Join($params = [])
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
        echo Date("Y/m/d H:i:s");
        $jointype = $this->_req("jointype");
        $enc_data = $this->_reqP("enc_data");

        $codes = $this->codeModel->getCcdInArray(['661']);

        if($jointype === "655002") {
            // 핸드폰 sms 인증
            $phonenumber = $this->_reqP('phone_number');

            try {
                $plainText = $this->encrypt->decode($enc_data, $this->encKey);

                if(empty($plainText)){
                    // 암호화 해제 오류 발생
                    show_error("인증정보에 오류가 발생했습니다. 다시 시도해주십시요.");
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
        $sms_stat = $this->_reqP('sms_stat');
        $phonenumber = $this->_reqP('var_phone');
        $authcode = $this->_reqP('var_auth');
        $sms_name = $this->_reqP('var_name');

        if (empty($phonenumber) === true) {
            return $this->json_result(true, "전화번호를 정확하게 입력해주십시요.", null, [
                'err_cd' => 1
            ]);

        } else {
            $pattern = "^01(?:0|1|[6-9])(?:\d{3}|\d{4})\d{4}$^";

            if(!preg_match($pattern, $phonenumber)){
                // 전화번호 패턴 오류
                return $this->json_result(true, "전화번호를 정확하게 입력해주십시요.", null, [
                    'err_cd' => 1
                ]);
            }
        }

        if(empty($authcode) === true) {
            if($sms_stat == 'OK'){
                return $this->json_result(true, '이미 인증번호를 발송했습니다.', null, [
                    'err_cd' => 9
                ]);
            }
            // 인증코드가 없으면 해당 전화번호로 인증코드를 보냅니다.
            // 인증번호 생성
            $this->load->helper('string');
            $auth_code = random_string('numeric', 6);

            $limit_date = Date("Y/m/d H:i:s", strtotime('+1 minutes '));

            //세션에 인증코드와 인증 시간을 기록한다.
            $this->session->set_tempdata('sms_auth_number', $phonenumber, 180);
            $this->session->set_tempdata('sms_auth_code', $auth_code, 180);
            $this->session->set_tempdata('sms_name', $sms_name, 180);

            return $this->json_result(true, '인증번호를 발송하였습니다.'.$auth_code, null, [
                'err_cd' => 0,
                'limit_date' => $limit_date
            ]);


        } else {
            // 인증코드가 있으면 해당 전화번호로 보낸 인증코드가 정확한지 체크합니다.
            $sms_phonenumber = $this->session->tempdata('sms_auth_number');
            $sms_auth_code = $this->session->tempdata('sms_auth_code');
            $sms_name =  $this->session->tempdata('sms_name');

            // 입력 시간이 초과했는지 체크
            if (empty($this->session->tempdata('sms_auth_number')) === true ||
                empty($this->session->tempdata('sms_auth_code')) === true  ||
                empty($this->session->tempdata('sms_name')) === true  ) {
                return $this->json_result(true, "입력시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.", null, [
                    'err_cd' => 1
                ]);
            }


            // 전화번호가 일치하는지 체크
            if($phonenumber != $sms_phonenumber){
                return $this->json_result(true, "인증번호를 발송한 전화번호와 일치하지 않습니다. 인증번호 받기를 다시 진행해 주세요.", null, [
                    'err_cd' => 1,
                    ]);
            }

            // 입력코드가 정확한지 체크
            if($authcode == $sms_auth_code){
                // 인증코드가 일치하면 전화번호와 이름을 암호화 해서 넘긴다.
                // 0000-00-00 00:00:00^전화번호^이름^0000-00-00 00:00:00
                $var_data = Date('YmdHis')."^{$sms_phonenumber}^{$sms_name}^".Date('YmdHis');
                $enc_data = $this->encrypt->encode($var_data, $this->encKey);
                return $this->json_result(true, '인증번호가 확인되었습니다.', null, [
                    'err_cd' => 0,
                    'enc_data' => $enc_data,
                    'phone_number' => $sms_phonenumber
                ]);

            } else {
                // 인증번호 불일치
                return $this->json_result(true, '인증번호가 일치하지 않습니다. 확인후 다시 입력해주세요.', null, [
                    'err_cd' => 9
                ]);
            }

        }
    }
}
