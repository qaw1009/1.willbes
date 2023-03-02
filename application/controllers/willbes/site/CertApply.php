<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CertApply extends \app\controllers\FrontController
{
    protected $models = array('cert/certApplyF','_lms/sys/code','order/orderF');
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

        //$cert_data = $this->certApplyFModel->findCertByCertIdx($cert_idx);
        //echo var_dump($cert_data);

        $arr_condition = [];

        $arr_condition['EQ'] = [
            'A.SiteCode' => $this->_site_code
        ];

        $data = $this->certApplyFModel->findCertByCertIdx($cert_idx,$arr_condition);
        $product_list = $this->certApplyFModel->listProductByCertIdx($cert_idx,$arr_condition);

        if(empty($data)){
            show_alert('인증 설정 정보가 존재하지 않습니다.', 'close');
        }
        //경찰시험직렬,경찰시험지역
        $data['kind_ccd'] = $this->codeModel->getCcd('711','', ['EQ' => ['CcdEtc' => config_app('SiteGroupCode')]]);
        $data['area_ccd'] = $this->codeModel->getCcd('712');

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
     * 상품코드 - 상품기준 -> 인증상품 여부, 인증상품이면 인증했는지 여부
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

    /**
     * 응시번호 확인 : 1.실제응시번호 2.사용여부
     */
    public function checkTakeNumber()
    {
        if (empty($this->_reqP('CertIdx'))) {
            return $this->json_error('입력 정보가 비정상입니다.');
        }

        //인증식별자
        $cert_idx = $this->_reqP('CertIdx');

        if(empty($this->_reqP('AddContent1')) === false && $this->_reqP('AddContent1') == 'youtube'){ // 유튜브 구독 인증
            $add_condition=[
                'EQ'=>[
                    'CertIdx'=>$cert_idx
                    ,'AddContent1'=>$this->_reqP('AddContent1')
                    ,'MemIdx' => $this->session->userdata('mem_idx')
                ]
            ];

            $err_msg = '이미 인증하신 내역이 존재합니다.';
        }else{
            if (empty($this->_reqP('TakeKind')) || empty($this->_reqP('TakeArea')) || empty($this->_reqP('TakeNo')) ) {
                return $this->json_error('입력 정보가 비정상입니다.');
            }

            //합격자 응시번호 여부 파악
            if(empty($this->_reqP('check_take_no')) === true || $this->_reqP('check_take_no') != 'N'){
                $take_result = $this->certApplyFModel->findPassTakeNumber($this->_reqP(null));
                if($take_result == "0") {
                    return $this->json_error('정상적인 응시번호가 아닙니다. ');
                }
            }

            $add_condition=[
                'EQ'=>[
                    'CertIdx'=>$cert_idx
                    ,'TakeKind'=>$this->_reqP('TakeKind')
                    ,'TakeArea'=>$this->_reqP('TakeArea')
                    ,'TakeNo'=>$this->_reqP('TakeNo')
                ]
            ];

            $err_msg = '이미 등록 사용된 응시번호입니다.';
        }

        //기등록된 응시번호 여부 파악
        $reg_result = $this->certApplyFModel->findApply($add_condition);
        if($reg_result > 0) {
            return $this->json_error($err_msg);
        }

        //인증 등록 처리 프로세스
        $result = $this->certApplyFModel->addApply($this->_reqP(null));

        if($result === true) {

            //인증에 엮인 상품 존재 여부
            $arr_condition['EQ'] = [
                'A.CertConditionCCd' => '685004',           //상품지급 코드
                //'A.SiteCode' => $this->_site_code
            ];
            $product_list = $this->certApplyFModel->listProductByCertIdx($cert_idx, $arr_condition);

            //상품지급 메소드 호출
            if(empty($product_list) === false) {
                if($this->orderFModel->procAutoOrder('cert', $cert_idx) !== true) {
                    return $this->json_error('제공상품이 처리되지 않았습니다.');
                }
            }
        }

        $this->json_result(true, '','',true);
    }

}