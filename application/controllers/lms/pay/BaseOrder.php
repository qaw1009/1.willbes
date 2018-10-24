<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrder extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
    protected $_group_ccd = array();

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderListModel->_group_ccd;
    }

    /**
     * 주문내역 보기
     * @param array $params
     */
    public function show($params = [])
    {
        $order_idx = $params[0];
        if (empty($order_idx) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 주문 조회
        $data = $this->orderListModel->listAllOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, [], ['delivery_address', 'delivery_info']);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $order_data = element('0', $data, []);

        // 가상계좌 결제가 아닐 경우 영수증 출력 URL 조회
        if ($order_data['PayRouteCcd'] === $this->orderListModel->_pay_route_ccd['pg'] && $order_data['IsVBank'] == 'N') {
            $pg_config_file = 'pg_' . $order_data['PgDriver'];
            $this->load->config($pg_config_file, true, true);
            $order_data['ReceiptUrl'] = str_replace('{{$tid$}}', $order_data['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 회원정보
        $mem_data = $this->manageMemberModel->getMember($order_data['MemIdx']);

        // 회원포인트 조회
        $point_data = $this->pointModel->getMemberPoint($order_data['MemIdx']);

        $this->load->view('pay/order/order/show', [
            'idx' => $order_idx,
            'data' => [
                'order' => $order_data,
                'order_prod' => $data,
                'mem' => $mem_data,
                'mem_point' => $point_data
            ],
        ]);
    }

    /**
     * 주문 취소
     * @param array $params
     */
    public function cancel($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }
        
        switch ($params[0]) {
            case 'vbank' :
                $result = $this->orderModel->cancelVbankOrder($this->_reqP('order_idx'));
                break;
            default :
                show_error('잘못된 접근 입니다.');
                break;
        }

        $this->json_result($result, '취소 되었습니다.', $result);
    }
}
