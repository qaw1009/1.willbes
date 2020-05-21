<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends \app\controllers\BaseController
{
    protected $models = array('_wbs/sys/code', '_wbs/sys/admin', '_wbs/sys/organization');
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
            return;
        }

        $result = true;
        $is_duplicate = $this->adminModel->isDuplicateAdminId($this->_reqP('admin_id'));
        if ($is_duplicate === true) {
            return $this->json_error('이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.', _HTTP_CONFLICT);
        }

        $this->json_result($result, '사용 가능한 아이디 입니다. 사용하시겠습니까?', $result);
    }

    /**
     * 운영자 정보수정 폼
     * @return CI_Output
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
        $data['org_data'] = $this->organizationModel->listAdminRelationOrganization(false, ['EQ' => ['ARO.wAdminIdx' => $this->session->userdata('admin_idx'), 'ARO.wIsStatus' => 'Y']], null, null, null);

        $data['wAdminMailId'] = substr($data['wAdminMail'], 0, strpos($data['wAdminMail'], '@'));
        $data['wAdminMailDomain'] = substr($data['wAdminMail'], strpos($data['wAdminMail'], '@') + 1);
        $data['wAdminMailDomainCcd'] = (empty($codes['103'][$data['wAdminMailDomain']]) === true) ? '' : $data['wAdminMailDomain'];

        $this->load->view('lcms/auth/edit', [
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
            ['field' => 'admin_passwd', 'label' => '비밀번호', 'rules' => 'trim|required'],
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
}