<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitTest extends \app\controllers\FrontController
{
    protected $models = array('order/orderF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * PG사 모바일 결제 테스트 [https://www.local.willbes.net/unitTest/requestMobile/card]
     * @param array $params
     */
    public function requestMobile($params = [])
    {
        $this->load->driver('pg', ['driver' => 'inisis_mobile'], 'pg_mobile');

        // 결제수단
        $pay_method = element('0', $params, 'vbank');
        $arr_pay_method_ccd = ['card' => '604001', 'bank' => '604002', 'vbank' => '604003'];
        $pay_method_ccd = array_get($arr_pay_method_ccd, $pay_method, '604003');

        // PG사 결제요청 폼 생성
        $order_no = $this->orderFModel->makeOrderNo();
        $data = [
            'mid' => 'INIpayTest',
            'order_no' => $order_no,
            'repr_prod_name' => '테스트상품 (' . $order_no . ')',
            'req_pay_price' => '1000',
            'order_name' => '홍길동',
            'order_phone' => '',
            'order_mail' => 'bsshin@willbes.com',
            'pay_method_ccd' => $pay_method_ccd,
            'is_escrow' => 'N',
            'return_prefix_url' => front_url('/unitTest/'),
            'return_data' => ''
        ];

        $form = $this->pg_mobile->requestForm($data);

        $this->output->_display($form);
    }

    /**
     * PG사 모바일 결제 테스트
     * @param array $params
     */
    public function returnsMobile($params = [])
    {
        $this->load->driver('pg', ['driver' => 'inisis_mobile'], 'pg_mobile');

        $result = $this->pg_mobile->returnResult();

        var_dump($result);
    }

    /**
     * PG사 모바일 결제 테스트
     * @param array $params
     */
    public function nothingMobile($params = [])
    {
        $this->load->driver('pg', ['driver' => 'inisis_mobile'], 'pg_mobile');

        $result = $this->pg_mobile->nothing();

        var_dump($result);
    }
}
