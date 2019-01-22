<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrintCert extends \app\controllers\BaseController
{
    protected $models = array('pay/orderList');
    protected $helpers = array('text');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 수강증 출력 (상품구분 : off_lecture (학원) / mock_exam (모의고사))
     * @return object|string
     */
    public function index()
    {
        $prod_type = $this->_reqG('prod_type');
        $data = [];

        switch ($prod_type) {
            case 'off_lecture' :
                $order_idx = $this->_reqG('order_idx');
                $order_prod_idx = $this->_reqG('order_prod_idx');

                // 데이터 조회
                $data = $this->orderListModel->getPrintCertData($order_idx, $order_prod_idx);

                // 데이터 가공
                $data['SiteName'] = trim(str_replace('[학원]', '', $data['SiteName']));
                $data['ProdName'] = ellipsize($data['ProdName'], 20, 1, '...');
                $data['PayMethodCcdName'] = str_replace('결제(방문)', '', $data['PayMethodCcdName']);
                $data['MinLecStartDate'] = date('m/d', strtotime($data['MinLecStartDate']));
                $data['MaxLecEndDate'] = date('m/d', strtotime($data['MaxLecEndDate']));
                break;
            case 'mock_exam' :
                break;
            default :
                show_alert('필수 파라미터 오류입니다.', 'close');
                break;
        }

        // 데이터 없음
        if (is_array($data) === false) {
            show_alert($data, 'close');
        }

        return $this->load->view('common/print_cert/' . $prod_type, [
            'data' => $data
        ]);
    }
}
