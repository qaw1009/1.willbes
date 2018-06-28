<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array('willbes/MemberF');
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
        $authtype = 'ipin';
        $data = [];

        if(empty($params[0]) == false){
            $authtype = $params[0];
        }

        // 인증 방식이 없으면 아이핀으로 고정
        if($authtype != 'ipin' && $authtype != 'mail' && $authtype != 'phone' ){
            $authtype = 'ipin';
        }

        $this->load->view('member/join/step1', [
            'authtype' => $authtype
            ]);
    }

    /**
     * 회원가입 폼
     */
    public function JoinForm()
    {
        $joinType = $this->_req("jointype");

        if($joinType === "phone") {

        } else if($joinType === "email") {
            
        } else {
            // 오류발생
            //show_error('가입 인증 방식 없음');
        }

        $this->load->view('member/join/step2', [

        ]);
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
}
