<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends \app\controllers\BaseController
{
    protected $models = array('auth/btobLogin', '_lms/sys/btob');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그인 폼
     * @param array $params
     */
    public function index($params = [])
    {
        // 제휴사 아이디
        $btob_id = element('0', $params);

        // 저장된 운영자 아이디
        $saved_admin_id = get_cookie('btob_saved_admin_id');
        if (empty($saved_admin_id) === false) {
            // 아이디 복호화
            $this->load->library('encrypt');
            $saved_admin_id = $this->encrypt->decode($saved_admin_id);
        }

        $this->load->view('auth/login', [
            'saved_admin_id' => $saved_admin_id,
            'btob_id' => $btob_id
        ]);
    }

    /**
     * 로그인 실행
     * @return CI_Output
     */
    public function login()
    {
        $rules = [
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_passwd', 'label' => '비밀번호', 'rules' => 'trim|required'],
            ['field' => 'btob_id', 'label' => '제휴사아이디', 'rules' => 'trim|required|alpha_dash']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $admin_id = $this->_reqP('admin_id');
        $btob_id = $this->_reqP('btob_id');
        $is_no_match = false;

        // 제휴사 정보 조회
        $btob_row = $this->btobModel->findCompany('BtobIdx, BtobName', ['EQ' => ['BtobId' => $btob_id, 'IsUse' => 'Y']]);
        if (empty($btob_row) === true) {
            return $this->json_error('일치하는 제휴사 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 관리자 아이디/비밀번호 확인
        $row = $this->btobLoginModel->findAdminForLogin($admin_id, $this->_reqP('admin_passwd', false));
        if (empty($row) === true) {
            $is_no_match = true;
        } else {
            if ($row['RoleType'] != 'S' && $row['BtobIdx'] != $btob_row['BtobIdx']) {
                $is_no_match = true;
            }
        }

        if ($is_no_match === true) {
            // 로그인 로그 저장
            $this->btobLoginModel->addLoginLog($admin_id, 'NO_MATCH');
            return $this->json_error('일치하는 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 관리자 접근권한 확인
        if ($row['IsApproval'] != 'Y' || $row['IsUse'] != 'Y' || empty($row['RoleIdx']) === true) {
            // 로그인 로그 저장
            $this->btobLoginModel->addLoginLog($admin_id, 'NO_AUTH');
            return $this->json_error('운영자 권한이 없습니다.', _HTTP_UNAUTHORIZED);
        }

        // 추가 데이터
        $row['IsSaveAdminId'] = $this->_reqP('is_save_admin_id');   // 아이디 저장
        $row['BtobIdx'] = $btob_row['BtobIdx'];     // 제휴사식별자
        $row['BtobId'] = $btob_id;                  // 제휴사아이디
        $row['BtobName'] = $btob_row['BtobName'];   // 제휴사명
        $row['LmsAdminIdx'] = $this->btobLoginModel->getLmsAdminIdx();  // LMS 운영자 식별자

        // 로그인 성공
        $this->_loginSucceed($row);

        return $this->json_result(true);
    }

    /**
     * 로그인 성공일 경우 후 처리 (세션 생성, 아이디 저장 쿠키 생성)
     * @param $data
     */
    private function _loginSucceed($data)
    {
        // 중복 로그인 방지 (이전 세션 데이터 삭제)
        $this->session->removePrevSession($data['AdminIdx'], 'B');

        // 로그인 세션 저장
        $this->session->sess_regenerate(true);
        $this->session->set_userdata('btob.btob_idx', $data['BtobIdx']);
        $this->session->set_userdata('btob.btob_id', $data['BtobId']);
        $this->session->set_userdata('btob.btob_name', $data['BtobName']);
        $this->session->set_userdata('btob.admin_idx', $data['AdminIdx']);
        $this->session->set_userdata('btob.admin_id', $data['AdminId']);
        $this->session->set_userdata('btob.admin_name', $data['AdminName']);
        $this->session->set_userdata('btob.is_admin_login', true);

        // LMS 운영자 식별자
        $this->session->set_userdata('btob.lms_admin_idx', $data['LmsAdminIdx']);

        // 아이디 저장 쿠키 생성/삭제
        if ($data['IsSaveAdminId'] == 'Y') {
            // 쿠키값 암호화
            $this->load->library('encrypt');
            $enc_admin_id = $this->encrypt->encode($data['AdminId']);

            // expire : 30 days
            set_cookie('btob_saved_admin_id', $enc_admin_id, 86400 * 30);
        } else {
            delete_cookie('btob_saved_admin_id');
        }
        
        // 최종 로그인 일시, IP 저장
        $this->btobLoginModel->modifyAdminLoginInfo($data['AdminIdx']);

        // 로그인 로그 저장
        $this->btobLoginModel->addLoginLog($data['AdminId'], 'SUCCESS');

        // 세션 로그인 테이블에 이력 저장
        $this->session->addSessionLogin($data['AdminIdx'], 'B');
    }
    
    /**
     * 로그아웃
     */
    public function logout()
    {
        // 제휴사 아이디
        $sess_btob_id = $this->session->userdata('btob.btob_id');

        // 로그아웃 로그 저장
        $this->btobLoginModel->addLoginLog($this->session->userdata('btob.admin_id'), 'LOGOUT');

        // 로그인 세션 삭제
        $this->session->sess_destroy();
        redirect(site_url('/auth/login/index/' . $sess_btob_id));
    }
}
