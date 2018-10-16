<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApply extends \app\controllers\FrontController
{
    protected $models = array('cert/certApplyF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store');


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 인증을 위한 테스트 페이지 호출
     */
    public function cert_test($params=[])
    {
        if (empty($params[0])) {
            show_alert('인증정보가 존재하지 않습니다.', '/');
        }

        $cert_idx = $params[0];

        $arr_condition['EQ'] = [
            'A.SiteCode' => $this->_site_code
        ];

        $data = $this->certApplyFModel->findCertByCertIdx($cert_idx,$arr_condition);




        $this->load->view('site/cert/cert_test', [
            'cert_idx' => $cert_idx,
            'data' => $data
        ]);




    }

    /**
     * 신청등록
     * @return CI_Output
     */
    public function store()
    {
        if (empty($this->_reqP('CertIdx'))) {
            return $this->json_error('인증정보가 존재하지 않습니다.');
        }
        $result = $this->certApplyFModel->addApply($this->_reqP(null));
        $this->json_result($result, '인증 신청이 완료되었습니다.', $result);
    }
}