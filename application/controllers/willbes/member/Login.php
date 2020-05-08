<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Login extends BaseMember
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그인페이지
     */
    public function index()
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
        if($this->session->userdata('is_login') === true && $this->_is_app == false){
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
    public function proc()
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
                show_alert('아이디와 비밀번호를 정확하게 입력해주십시요.', front_app_url("/member/login/", "www")."?rtnUrl=".rawurlencode($rtnUrl), false);
            }
        }

        // 아이디와 비밀번호로 로그인가능한 회원 갯수 구하기
        $count = $this->memberFModel->getMemberForLogin($id, $pwd, true);

        // 로그인 가능한 회원갯수가 1 개가 아니면 오류
        if($count != 1){
            if($count > 1){
                // 동일한 아이디와 비밀번호로 출돌이 난 경우 본인 인증으로 넘어간다.
                if($chklogin === true){
                    // 동일 아이디/암호 의 회원이 1개 이상일 경우  chklogin 에서는 로그인으로 처리하고
                    return $this->json_result(true, "");
                } else {
                    // chklogin 아닌 진짜 로그인 이면 중복 처리 페이지로 이동
                    $this->session->set_userdata('combine_id', $id);
                    redirect('/member/combine/dup');
                }
            }

            if($chklogin === true){
                return $this->json_error("아이디 혹은 비밀번호가 일치하지 않습니다.");
            } else {
                show_alert("아이디 혹은 비밀번호가 일치하지 않습니다.", "/member/login/", false);
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
                if($data['IsStatus'] == 'D'){
                    // 활동상태가 휴면회원
                    return $this->load->view('member/login/sleep', [
                        'MemName' => $data['MemName']
                    ]);

                } else if($data['IsStatus'] == 'P'){
                    // 활동상태가 비밀번호 오래 안바꿈

                } else {
                    // 알수없는 활동상태
                    show_alert('정상회원이 아닙니다.\n관리자에게 문의 바랍니다.', 'back');
                }

            }

            if($data['IsChange'] != 'Y') {
                // 아이디가 통합상태가 아니면
                $this->session->set_userdata('combine_id', $data['MemId']);
                $this->session->set_userdata('combine_idx', $data['MemIdx']);
                if($this->_is_app == true){
                    show_alert('아이디 통합회원 전환이 필요합니다.\n통합회원 전환은 PC에서 가능합니다.', 'back');
                } else {
                    // 아이디 통합으로 이동
                    redirect('/member/combine/');
                }
            }

            // 실제 로그인처리하기 로그인 처리및 로그저장
            if($this->_is_app == true){
                $loginType = 'APP';
            } else {
                $loginType = 'NORMAL';
            }

            $result = $this->memberFModel->storeMemberLogin($data, $loginType);

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

                if($this->_is_app == true){
                    $this->load->library('Jwt');
                    $this->jwt->setTokenData($data['MemId'],$data['MemName'], $data['MemIdx']);
                    $token = $this->jwt->getToken();

                    return $this->load->view('/member/login/app', [
                        'token' => $token,
                        'rtnUrl' => rawurlencode($rtnUrl)
                    ]);
                } else {
                    show_alert('로그인 되었습니다.', $rtnUrl, false);
                }

            } else {
                show_alert('로그인에 실패했습니다. 다시시도해 주십시요.', front_app_url("/member/login/", "www")."?rtnUrl=".rawurlencode($rtnUrl), false);
            }
        }
    }

}