<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends \app\controllers\FrontController
{
    protected $models = array();
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /*
     * 로그인페이지
     */
    public function LoginForm()
    {
        $this->load->view('member/login/form', [ ]);
    }

    /*
     * 로그인처리
     */
    public function Login()
    {

    }

    /*
     * 로그아웃처리
     */
    public function Logout()
    {

    }

    /*
     * 회원가입 본인인증 페이지
     */
    public function Join()
    {
        $this->load->library('NiceAuth');

        $ipinData = $this->niceauth->ipinEnc();
        $cpData = $this->niceauth->cpEnc('join');

       $this->load->view('member/join/step1', [
            'ipinData' => $ipinData,
            'cpData' => $cpData
            ]);
    }

    /*
     * 회원가입 정보 입력 폼
     */
    public function Join2()
    {
        $this->load->library('NiceAuth');

        $joinType = $this->_req("join_type");
        $encData = $this->_req("enc_data");

        if($joinType === "IPIN") {
            $decData = $this->niceauth->ipinDec($encData);

            if($decData['rtnCode'] != 1) {
                echo "인증데이타 오류발생";
                return;
            }

            $this->load->view('member/join/step2', [
                'encData' => $encData,
                'decData' => $decData
            ]);
            
        } else if($joinType === "CP") {
            $decData = $this->niceauth->cpDec($encData);
            
            if($ipinData['rtnCode'] != 1) {
                echo "인증데이타 오류발생";
                return;
            }

            $this->load->view('member/join/step2', [
                'encData' => $encData,
                'decData' => $decData
            ]);
            
        } else if($joinType === "EMAIL") {
            
        } else {
            // 오류발생
        }
    }

    /*
     * 회원가입처리페이지
     */
    public function JoinProcess()
    {
        $this->load->view('member/join/step3', [ ]);
    }

    /*
     * 아이디찾기
     */
    public function FindID()
    {

    }

    /*
     * 비밀번호 찾기
     */
    public function FindPW()
    {

    }

}
