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
    public function Login()
    {
        $this->load->view('member/login/form', [ ]);
    }

    /*
     * 회원가입 페이지
     */
    public function Join()
    {
        $this->load->library('NiceAuth');

        $step = $this->_req('step');
        $ipinData = $this->niceauth->ipinEnc();
        $cpData = $this->niceauth->cpEnc('join');

        if($step == 1){
            $this->load->view('member/join/step1', [
                'ipinData' => $ipinData,
                'cpData' => $cpData
                ]);

        } else if($step == 2){
            $this->load->view('member/join/step2', [

            ]);

        } else {
            $this->load->view('member/join/step1', [
                'ipinData' => $ipinData,
                'cpData' => $cpData
                ]);
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
