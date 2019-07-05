<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApply extends \app\controllers\FrontController
{
    protected $models = array('btob/btobCertF', '_lms/sys/btobCode');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store');

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

        $this->load->view('btob/cert/cert_' . $btob_id, [
            'arr_area_ccd' => $arr_area_ccd,
            'arr_branch_ccd' => $arr_branch_ccd,
            'arr_take_kind_ccd' => $arr_take_kind_ccd,
            'arr_product' => $arr_product,
            'btob_id' => $btob_id
        ]);
    }

    /**
     * 제휴사 인증신청 등록
     */
    public function store()
    {
        $arr_input = array_merge($this->_reqP(null, false));

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'btob_id', 'label' => '제휴사아이디', 'rules' => 'trim|required'],
            ['field' => 'area_ccd', 'label' => '지역', 'rules' => 'trim|required'],
            ['field' => 'branch_ccd', 'label' => '지점', 'rules' => 'trim|required'],
            ['field' => 'take_kind_ccd', 'label' => '수험직렬', 'rules' => 'trim|required'],
            ['field' => 'site_code', 'label' => '사이트코드', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '신청강좌', 'rules' => 'trim|required|integer'],
            ['field' => 'agree', 'label' => '콘텐츠/개인정보이용안내 동의여부', 'rules' => 'trim|required|in_list[Y]']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->btobCertFModel->addCertApply($arr_input);

        $this->json_result($result, '신청 되었습니다.', $result);
    }
}
