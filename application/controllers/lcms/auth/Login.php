<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends \app\controllers\BaseController
{
    protected $models = array('_lcms/auth/login', '_wbs/sys/admin', '_lms/product/base/professor', '_lms/crm/send/sms');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 로그인 폼
     */
    public function index()
    {
        // 저장된 운영자 아이디
        $saved_admin_id = get_cookie('saved_admin_id');
        if (empty($saved_admin_id) === false) {
            // 아이디 복호화
            $this->load->library('encrypt');
            $saved_admin_id = $this->encrypt->decode($saved_admin_id);
        }

        $this->load->view('lcms/auth/login', [
            'saved_admin_id' => $saved_admin_id
        ], false);
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
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $admin_id = $this->_reqP('admin_id');
        $wbs_prof_role_idx = '1013';    // WBS 교수관리자 역할식별자
        $lms_prof_role_idx = '1011';    // LMS 교수관리자 역할식별자

        // 관리자 아이디/비밀번호 확인
        $row = $this->loginModel->findAdminForLogin($admin_id, $this->_reqP('admin_passwd', false));
        if (empty($row) === true) {
            // 로그인 로그 저장
            $this->loginModel->addLoginLog($admin_id, 'NO_MATCH');

            return $this->json_error('일치하는 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 관리자 접근권한 확인
        $is_auth = true;
        if ($row['wIsApproval'] != 'Y' || $row['wIsUse'] != 'Y') {
            $is_auth = false;
        } else if (APP_NAME == 'wbs') {
            // 권한설정이 없거나 교수관리자 권한일 경우 wbs 접근 금지
            if (empty($row['wRoleIdx']) === true || $row['wRoleIdx'] == $wbs_prof_role_idx) {
                $is_auth = false;
            }
        } else if (APP_NAME == 'lms') {
            $lms_role_idx = $this->loginModel->getLmsRoleIdx($row['wAdminIdx']);
            if (empty($lms_role_idx) === true) {
                $is_auth = false;
            }

            // 교수관리자 권한으로 lms 접근 금지
            if (SUB_DOMAIN == 'lms' && $lms_role_idx == $lms_prof_role_idx) {
                $is_auth = false;
            }
        }

        // T-zone 일 경우 WBS 접근 권한 확인, WBS,LMS 교수 정보 확인
        if (SUB_DOMAIN == 'tzone') {
            /*if (empty($row['wRoleIdx']) === true || $row['wRoleIdx'] != $wbs_prof_role_idx) {
                $is_auth = false;
            } else {
                $arr_prof_idx = array_keys($this->professorModel->getProfessorArray('all', $row['wProfIdx']));
                if (empty($arr_prof_idx) === true) {
                    $is_auth = false;
                }
            }*/
            $arr_prof_idx = array_keys($this->professorModel->getProfessorArray('all', $row['wProfIdx']));
            if (empty($arr_prof_idx) === true) {
                $is_auth = false;
            }
        }

        if ($is_auth === false) {
            // 로그인 로그 저장
            $this->loginModel->addLoginLog($admin_id, 'NO_AUTH');

            return $this->json_error('운영자 권한이 없습니다.', _HTTP_UNAUTHORIZED);
        }

        // 본인인증 여부 확인
        if ($row['wCertType'] != 'E') {
            $is_cert = false;
            $log_ccd_name = '';
            if ($row['wCertType'] != 'Y') {
                $is_cert = true;
                $log_ccd_name = 'CERT_FIRST_REQ';
            } elseif ($row['wLastLoginIp'] != $this->input->ip_address()) {
                // 로컬서버가 아닐 경우 체크 ==> TODO : 서버 환경별 실행
                if (ENVIRONMENT != 'local') {
                    $is_cert = true;
                    $log_ccd_name = 'CERT_IP_REQ';
                }
            }

            if ($is_cert === true) {
                // 로그인 로그 저장
                $this->loginModel->addLoginLog($admin_id, $log_ccd_name);

                return $this->json_error('본인 인증 후 로그인 하실 수 있습니다.', _HTTP_NO_PERMISSION);
            }
        }

        // 아이디 저장
        $row['IsSaveAdminId'] = $this->_reqP('is_save_admin_id');
        // 로그인 성공
        $this->_loginSucceed($row);

        return $this->json_result(true);
    }

    /**
     * 본인인증 폼/인증번호 확인, 로그인 성공 처리
     * @param array $params
     * @return CI_Output
     */
    public function certification($params = [])
    {
        if ($this->_reqP('_method') == 'POST') {
            $rules = [
                ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
                ['field' => 'auth_number', 'label' => '인증번호', 'rules' => 'trim|required|numeric'],
            ];

            if ($this->validate($rules) === false) {
                return;
            }

            // 운영자 정보 조회
            $row = $this->adminModel->findAdmin('wAdminIdx, wAdminId, wAdminName', [
                'EQ' => ['wAdminId' => $this->_reqP('admin_id')]
            ]);

            if (empty($row) === true) {
                return $this->json_error('일치하는 정보가 없습니다.', _HTTP_NOT_FOUND);
            }

            // 인증번호 확인
            if (empty($this->session->tempdata('auth_number')) === true) {
                return $this->json_error('인증번호 입력 제한시간이 초과되었습니다. 인증번호 받기를 다시 진행해 주세요.', _HTTP_REQUEST_TIMEOUT);
            } elseif ($this->session->tempdata('auth_number') != $this->_reqP('auth_number')) {
                return $this->json_error('인증번호가 일치하지 않습니다.', _HTTP_BAD_REQUEST);
            }

            // 인증성공 결과 업데이트
            $result = $this->loginModel->modifyAdminCertInfo($row['wAdminIdx'], 'Y');

            // 로그인 로그 저장
            $this->loginModel->addLoginLog($row['wAdminId'], 'CERT_SUCCESS');

            $this->json_result($result, '인증되었습니다. 다시 로그인해 주세요.', $result);
        } else {
            $this->load->view('lcms/auth/certification', [
                'admin_id' => $params[0]
            ], false);
        }
    }

    /**
     * 인증번호 발송
     * @return CI_Output
     */
    public function sendAuthNumber()
    {
        // 운영자 정보 조회
        $row = $this->adminModel->findAdmin('wAdminPhone1, wAdminPhone2, wAdminPhone3, wAdminMail', [
            'EQ' => ['wAdminId' => $this->_reqP('admin_id')]
        ]);

        if (empty($row) === true) {
            return $this->json_error('운영자 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        $is_match = true;
        $type = $this->_reqP('cert_type');

        if ($type == 'sms') {
            $to = $row['wAdminPhone1'] . '-' . $row['wAdminPhone2'] . '-' . $row['wAdminPhone3'];
            /*$cert_phone = $this->_reqP('cert_phone1') . '-' . $this->_reqP('cert_phone2') . '-' . $this->_reqP('cert_phone3');*/
            $cert_phone = $this->_reqP('cert_phone');

            if ($to != $cert_phone) {
                $is_match = false;
            }

            //발송번호 특수문자제거
            $to = str_replace('-', '', $to);
        } else {
            $to = $row['wAdminMail'];

            if ($to != $this->_reqP('cert_mail')) {
                $is_match = false;
            }
        }

        if ($is_match === false) {
            return $this->json_error('휴대폰 번호 또는 메일주소가 운영자 정보와 일치하지 않습니다.', _HTTP_BAD_REQUEST);
        }
        
        // 인증번호 생성
        $this->load->helper('string');
        $auth_number = random_string('numeric', 6);
        $this->session->set_tempdata('auth_number', $auth_number, 180);
        
        // 인증번호 발송
        $is_send = $this->{'_send' . ucfirst($type) . 'AuthNumber'}($to, $auth_number);
        if ($is_send === false) {
            return $this->json_error('인증번호 전송에 실패했습니다.');
        }

        return $this->json_result(true, '인증번호를 발송하였습니다.');
    }

    /**
     * 인증번호 메일 발송
     * @param $to
     * @param $auth_number
     * @return bool
     */
    private function _sendMailAuthNumber($to, $auth_number)
    {
        try {
            $this->load->library('email');
            $this->email->to($to);
            $this->email->subject('운영자 본인 인증용 인증번호 발송');

            $body = $this->load->view('emails/auth_number', [
                'auth_number' => $auth_number
            ], true, true);

            $this->email->message($body);
            $this->email->send();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 인증번호 SMS 발송
     * @param $to
     * @param $auth_number
     * @return bool
     */
    private function _sendSmsAuthNumber($to, $auth_number)
    {
        try {
//            $this->load->library('sendSms');
//            if($this->sendsms->send($to, '윌비스 본인 인증 번호입니다. ['.$auth_number.']를 입력해 주십시요.', '1544-5006') === false){
            if($this->smsModel->addKakaoMsg($to, null, null, 'KAT', 'cert001', [['#{회사명}' => '윌비스', '#{인증번호}' => $auth_number]]) === false) {
                throw new \Exception('메세지 발송에 실패했습니다.\n다시 한번 시도해 주십시요.');
            }
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 로그인 성공일 경우 후 처리 (세션 생성, 아이디 저장 쿠키 생성)
     * @param $data
     */
    private function _loginSucceed($data)
    {
        // 중복 로그인 방지 (이전 세션 데이터 삭제)
        $this->session->removePrevSession($data['wAdminIdx'], 'A');

        // 로그인 세션 저장
        $this->session->sess_regenerate(true);
        $this->session->set_userdata('admin_idx', $data['wAdminIdx']);
        $this->session->set_userdata('admin_id', $data['wAdminId']);
        $this->session->set_userdata('admin_name', $data['wAdminName']);
        $this->session->set_userdata('admin_conn_sites', [APP_NAME]);
        $this->session->set_userdata('is_admin_login', true);

        // 아이디 저장 쿠키 생성/삭제
        if ($data['IsSaveAdminId'] == 'Y') {
            // 쿠키값 암호화
            $this->load->library('encrypt');
            $enc_admin_id = $this->encrypt->encode($data['wAdminId']);

            // expire : 30 days
            set_cookie('saved_admin_id', $enc_admin_id, 86400 * 30);
        } else {
            delete_cookie('saved_admin_id');
        }
        
        // tzone으로 접근할 경우 사이트별 교수식별자 조회 및 세션 생성
        if (SUB_DOMAIN == 'tzone' && empty($data['wProfIdx']) === false) {
            $arr_prof_idx = array_keys($this->professorModel->getProfessorArray('all', $data['wProfIdx']));

            $this->session->set_userdata('admin_wprof_idx', $data['wProfIdx']);
            $this->session->set_userdata('admin_prof_idxs', $arr_prof_idx);
        }

        // 최종 로그인 일시, IP 저장
        $this->loginModel->modifyAdminLoginInfo($data['wAdminIdx']);

        // 로그인 로그 저장
        $this->loginModel->addLoginLog($data['wAdminId'], ($data['wCertType'] == 'Y') ? 'SUCCESS' : 'EX_SUCCESS');

        // 세션 로그인 테이블에 이력 저장
        $this->session->addSessionLogin($data['wAdminIdx'], 'A');
    }
    
    /**
     * 로그아웃
     */
    public function logout()
    {
        // 로그아웃 로그 저장
        $this->loginModel->addLoginLog($this->session->userdata('admin_id'), 'LOGOUT');

        // 로그인 세션 삭제
        $this->session->sess_destroy();
        redirect(site_url('/lcms/auth/login'));
    }
}