<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('_wbs/sys/code', '_wbs/sys/admin', '_lms/task/taskOrganization', '_lcms/auth/login');
    protected $helpers = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 운영자 신청 폼
     */
    public function create()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['102', '103', '109', '110']);

        $this->load->view('lcms/auth/create', [
            'phone1_ccd' => $codes['102'],
            'mail_domain_ccd' => $codes['103'],
            'dept_ccd' => $codes['109'],
            'position_ccd' => $codes['110'],
        ], false);
    }

    /**
     * 운영자 아이디 중복 체크
     * @return CI_Output
     */
    public function idCheck()
    {
        $rules = [
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = true;
        $is_duplicate = $this->adminModel->isDuplicateAdminId($this->_reqP('admin_id'));
        if ($is_duplicate === true) {
            return $this->json_error('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
        }

        return $this->json_result($result, '사용 가능한 아이디 입니다. 사용하시겠습니까?', $result);
    }

    /**
     * 운영자 정보수정 폼
     * @return mixed
     */
    public function edit()
    {
        // 사용하는 코드값 조회
        $codes = $this->codeModel->getCcdInArray(['102', '103', '109', '110']);

        // 운영자 정보 조회
        $data = $this->adminModel->findAdminForModify($this->session->userdata('admin_idx'));

        if (empty($data) === true) {
            return $this->json_error('데이터 조회에 실패했습니다.', _HTTP_NOT_FOUND);
        }

        // 조직 연결 정보 조회
        $data['org_data'] = $this->taskOrganizationModel->listAdminRelationOrganization(false, ['EQ' => ['A.wAdminIdx' => $this->session->userdata('admin_idx')]], null, null, null);

        $data['wAdminMailId'] = substr($data['wAdminMail'], 0, strpos($data['wAdminMail'], '@'));
        $data['wAdminMailDomain'] = substr($data['wAdminMail'], strpos($data['wAdminMail'], '@') + 1);
        $data['wAdminMailDomainCcd'] = (empty($codes['103'][$data['wAdminMailDomain']]) === true) ? '' : $data['wAdminMailDomain'];

        return $this->load->view('lcms/auth/edit', [
            'phone1_ccd' => $codes['102'],
            'mail_domain_ccd' => $codes['103'],
            'dept_ccd' => $codes['109'],
            'position_ccd' => $codes['110'],
            'data' => $data
        ], false);
    }

    /**
     * 운영자 신청 등록
     */
    public function store()
    {
        $rules = [
            ['field' => 'admin_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_passwd', 'label' => '비밀번호', 'rules' => 'trim|required|callback_validatePasswdVerify[admin_id]'],
            ['field' => 'admin_phone1', 'label' => '휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone2', 'label' => '휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone3', 'label' => '휴대폰번호3', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_mail_id', 'label' => '메일 아이디', 'rules' => 'trim|required'],
            ['field' => 'admin_mail_domain', 'label' => '메일 도메인', 'rules' => 'trim|required'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminModel->addAdmin($this->_reqP(null, false), 'apply');

        $this->json_result($result, '신청되었습니다. 담당자 승인 후 접속이 가능합니다.', $result);
    }

    /**
     * 운영자 개인정보 수정
     */
    public function update()
    {
        $rules = [
            ['field' => 'admin_name', 'label' => '이름', 'rules' => 'trim|required'],
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_passwd', 'label' => '비밀번호', 'rules' => 'callback_validatePasswdVerify[admin_id]'],
            ['field' => 'admin_phone1', 'label' => '휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone2', 'label' => '휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_phone3', 'label' => '휴대폰번호3', 'rules' => 'trim|required|integer'],
            ['field' => 'admin_mail_id', 'label' => '메일 아이디', 'rules' => 'trim|required'],
            ['field' => 'admin_mail_domain', 'label' => '메일 도메인', 'rules' => 'trim|required'],
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->adminModel->modifyAdmin($this->_reqP(null, false), 'my');

        $this->json_result($result, '수정 되었습니다.', $result);
    }

    /**
     * 비밀번호 강제변경 폼
     * @param array $params
     * @return mixed
     */
    public function forcedEditPasswd($params = [])
    {
        // 로그인 비밀번호 강제변경 프로세스를 통해서만 접근 가능
        $flash_forced_edit_passwd = $this->session->flashdata('forced_edit_passwd');
        if (empty($flash_forced_edit_passwd) === true) {
            return $this->json_error('잘못된 접근입니다.', _HTTP_BAD_REQUEST);
        }

        // 비밀번호 수정 보안용 임시 세션 생성 (관리자식별자)
        $this->session->set_tempdata('forced_update_passwd', $flash_forced_edit_passwd);

        return $this->load->view('lcms/auth/passwd_edit', [
            'admin_id' => element('0', $params, '')
        ], false);
    }

    /**
     * 비밀번호 강제변경
     * @return mixed
     */
    public function forcedUpdatePasswd()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'admin_id', 'label' => '아이디', 'rules' => 'trim|required|alpha_dash'],
            ['field' => 'admin_passwd', 'label' => '현재 비밀번호', 'rules' => 'trim|required'],
            ['field' => 'admin_new_passwd', 'label' => '새 비밀번호', 'rules' => 'trim|required|differs[admin_passwd]|callback_validatePasswdVerify[admin_id]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 로그인 비밀번호 수정 폼을 통해서만 접근 가능
        $flash_forced_update_passwd = $this->session->tempdata('forced_update_passwd');
        if (empty($flash_forced_update_passwd) === true) {
            return $this->json_error('잘못된 접근이거나 접근허용시간(5분)이 만료되었습니다.', _HTTP_BAD_REQUEST);
        }

        // 운영자 아이디/비밀번호 확인 (세션에 저장된 관리자식별자와 조회된 관리자식별자 일치여부 확인)
        $row = $this->loginModel->findAdminForLogin($this->_reqP('admin_id'), $this->_reqP('admin_passwd', false));
        if (empty($row) === true || $flash_forced_update_passwd != $row['wAdminIdx']) {
            return $this->json_error('일치하는 정보가 없습니다.', _HTTP_NOT_FOUND);
        }

        // 비밀번호 수정
        $result = $this->adminModel->modifyAdminPasswd($this->_reqP('admin_new_passwd', false), $row['wAdminIdx']);
        if ($result === true) {
            // 비밀번호 수정 보안용 임시 세션 삭제
            $this->session->unset_tempdata('forced_update_passwd');
        }

        return $this->json_result($result, '비밀번호가 변경되었습니다.', $result);
    }
}
