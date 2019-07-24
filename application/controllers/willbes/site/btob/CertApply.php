<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApply extends \app\controllers\FrontController
{
    protected $models = array('btob/btobCertF', '_lms/sys/btobCode');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store');
    private $_arr_approval_status = ['X' => '미신청', 'N' => '신청완료', 'R' => '승인반려', 'Y' => '승인완료', 'C' => '승인취소', 'E' => '승인만료'];
    private $_arr_approval_msg = [
        'X' => '인증 신청을 진행해 주세요.', 'N' => '운영자가 미승인한 상태로 지점정보, 신청강좌 변경이 가능합니다.',
        'R' => '운영자가 승인 반려한 상태로 재인증 신청 가능합니다.', 'Y' => '운영자가 승인 완료한 상태로 내강의실에서 신청강좌를 수강하실 수 있습니다.',
        'C' => '운영자가 승인 취소한 상태로 재인증 신청 가능합니다.', 'E' => '신청강좌에 대한 수강이 자동 만료된 상태로 재인증 신청 가능합니다.'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 제휴사 인증신청 폼 (/btob/certApply/index/id/zaksim)
     * @param array $params
     */
    public function index($params = [])
    {
        // 로그인 체크
        if ($this->isLogin() !== true) {
            show_alert('로그인 후 이용해 주십시오.', 'close');
        }

        $btob_id = strtolower(element('id', $params));
        if (empty($btob_id) === true) {
            show_alert('필수 파라미터 오류입니다.', 'close');
        }

        // 제휴사 정보 조회
        $data = $this->btobCertFModel->findBtobByBtobId($btob_id);
        if (empty($btob_id) === true) {
            show_alert('제휴사 정보가 없습니다.', 'close');
        }

        // 지역/지점 공통코드 조회
        $arr_branch_ccd = $this->btobCodeModel->getAreaBranchCcd($data['BtobIdx']);
        $arr_area_ccd = array_pluck($arr_branch_ccd, 'AreaCcdName', 'AreaCcd');

        // 수험직렬 공통코드 조회
        $arr_take_kind_ccd = element('takekind', $this->btobCodeModel->getCcdInArrayByConnValue($data['BtobIdx'], ['takekind'], 'ConnValue'));

        // 제휴사 연결 상품 조회
        $arr_product = $this->btobCertFModel->getBtobProduct($data['BtobIdx']);

        // 회원별 최종 제휴사 신청정보 조회
        $apply_data = $this->btobCertFModel->getLastCertApply($data['BtobIdx'], $this->session->userdata('mem_idx'));

        // 신청정보가 없을 경우 미신청 상태
        empty($apply_data) === true && $apply_data['ApprovalStatus'] = 'X';

        // 신청상태명, 신청상태 메시지 추가
        $apply_data['ApprovalStatusName'] = $this->_arr_approval_status[$apply_data['ApprovalStatus']];
        $apply_data['ApprovalStatusMsg'] = $this->_arr_approval_msg[$apply_data['ApprovalStatus']];

        // 신청정보 등록/수정 메소드
        $apply_idx = null;
        if ($apply_data['ApprovalStatus'] == 'N') {
            $method = 'PUT';
            $apply_idx = $apply_data['ApplyIdx'];
        } elseif ($apply_data['ApprovalStatus'] == 'Y') {
            $method = '';
        } else {
            $method = 'POST';
        }

        $this->load->view('btob/cert/cert_' . $btob_id, [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_take_kind_ccd' => $arr_take_kind_ccd,
            'arr_product' => $arr_product,
            'btob_id' => $btob_id,
            'method' => $method,
            'apply_idx' => $apply_idx,
            'data' => $apply_data
        ]);
    }

    /**
     * 제휴사 인증신청 등록/수정
     */
    public function store()
    {
        $arr_input = array_merge($this->_reqP(null, false));

        $rules = [
            ['field' => 'btob_id', 'label' => '제휴사아이디', 'rules' => 'trim|required'],
            ['field' => 'area_ccd', 'label' => '지역', 'rules' => 'trim|required'],
            ['field' => 'branch_ccd', 'label' => '지점', 'rules' => 'trim|required'],
            ['field' => 'take_kind_ccd', 'label' => '수험직렬', 'rules' => 'trim|required'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '신청강좌', 'rules' => 'trim|required|integer'],
            ['field' => 'agree', 'label' => '콘텐츠/개인정보이용안내 동의여부', 'rules' => 'trim|required|in_list[Y]']
        ];

        if (empty($arr_input['apply_idx']) === true) {
            $method = 'add';
            $method_name = '신청';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]']
            ]);
        } else {
            $method = 'modify';
            $method_name = '수정';
            $rules = array_merge($rules, [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
                ['field' => 'apply_idx', 'label' => '인증식별자', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCertFModel->{$method . 'CertApply'}($arr_input);

        $this->json_result($result, $method_name . ' 되었습니다.', $result);
    }
}
