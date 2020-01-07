<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/willbes/share/member/BaseMember.php';

class Logout extends BaseMember
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그아웃처리
     */
    public function index()
    {
        $login_key = $this->session->userdata('login_key');

        $this->session->set_userdata('mem_idx', '');
        $this->session->set_userdata('mem_id', '');
        $this->session->set_userdata('mem_name', '');
        $this->session->set_userdata('mem_mail', '');
        $this->session->set_userdata('mem_phone', '');
        $this->session->set_userdata('login_key', '');
        $this->session->set_userdata('is_login', false);
        $this->session->set_userdata('free_bogang_prod_codes', '');
        $this->session->set_userdata('mem_hanlimid', '');

        // 로그아웃시에 로그를 남김
        $this->memberFModel->setMemberLogout($login_key);

        //  $this->session->sess_destroy();
        if($this->_is_app == true) {
            $this->load->view('member/logout/app');
        } else {
            show_alert("로그아웃 되었습니다.", front_app_url('/', 'www'), false);
        }
    }
}