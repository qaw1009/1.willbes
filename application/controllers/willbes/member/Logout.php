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
        $this->session->set_userdata('mem_idx', '');
        $this->session->set_userdata('mem_id', '');
        $this->session->set_userdata('mem_name', '');
        $this->session->set_userdata('is_login', false);
        $this->session->sess_destroy();
        show_alert("로그아웃 되었습니다.", "/", false);
        // TODO : 로그아웃시에 로그를 남길 것인지.
    }
}