<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApply extends \app\controllers\FrontController
{
    protected $models = array('cert/certApplyF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('store','checkCert');


    public function __construct()
    {
        parent::__construct();
    }

    public function index($params=[])
    {

        if(empty($params) === true) {
            show_alert('인증정보가 존재하지 않습니다.', 'close');
        }

        //페이지 정보
        $cert_page = element('page',$params);
        //인증회차 정보
        $cert_idx = element('cert',$params);

        //echo $cert_page.' -'.$cert_idx;exit;

        $cert_data = $this->certApplyFModel->findCertByCertIdx($cert_idx);

        $arr_condition = [];

        $arr_condition['EQ'] = [
            'A.SiteCode' => $this->_site_code
        ];

        $data = $this->certApplyFModel->findCertByCertIdx($cert_idx,$arr_condition);
        $product_list = $this->certApplyFModel->listProductByCertIdx($cert_idx,$arr_condition);

        $this->load->view('site/cert/cert_'.$cert_page,[
            'cert_idx' => $cert_idx,
            'data' => $data,
            'product_list' => $product_list
        ]);

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
        $product_list = $this->certApplyFModel->listProductByCertIdx($cert_idx,$arr_condition);

        $this->load->view('site/cert/cert_test', [
            'cert_idx' => $cert_idx,
            'data' => $data,
            'product_list' => $product_list
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

        //echo var_dump($result);
        $this->json_result($result, '인증 신청이 완료되었습니다.', $result);
    }


    /**
     * 상품코드 - 인증상품 여부, 인증했는지 여부
     * @return CI_Output
     */
    public function checkCertApply()
    {
        if (empty($this->_reqP('prod_code'))) {
            return $this->json_error('상품정보가 존재하지 않습니다.');
        }
        $cert_result = $this->certApplyFModel->findCertByProduct($this->_reqP(null));
        if(empty($cert_result)) {   //인증상품이 아닐경우
            $this->json_result(true, '', '','');

        } else {    //인증상품일 경우 인증이 완료됐는지 여부

            $apply_result = $this->certApplyFModel->findApplyByCertIdx($cert_result['CertIdx']);
            if (empty($apply_result)) {
                return $this->json_error('인증 신청을 하신 후 구매하여 주십시오. ');
            }

            $this->json_result(true, '','',$apply_result);
        }

    }

}