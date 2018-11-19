<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrder extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
    protected $_group_ccd = array();
    private $_is_refund_proc = false;

    public function __construct()
    {
        parent::__construct();

        $this->_group_ccd = $this->orderListModel->_group_ccd;
        $this->_is_refund_proc = strtolower($this->router->class) == 'refundproc' ? true : false;
    }

    /**
     * 주문내역 보기
     * @param array $params
     */
    protected function show($params = [])
    {
        // url segment 에서 숫자 값 리턴
        $order_idx = current(array_filter($params, function ($val) {
            return is_numeric($val);
        }));

        if (empty($order_idx) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 주문 조회
        $data = $this->orderListModel->listAllOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, [], ['delivery_info', 'refund']);
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

        // 환불정보
        $is_refund_data = false;
        $refund_data = [];
        if ($this->_is_refund_proc === true) {
            // 환불내역 데이터 가공 (환불처리에서만 사용)
            foreach ($data as $row) {
                if ($row['PayStatusCcd'] == $this->orderListModel->_pay_status_ccd['refund']) {
                    $refund_data[$row['RefundReqIdx']]['ProdTypeCcdName'][] = $row['ProdTypeCcdName'];
                    $refund_data[$row['RefundReqIdx']]['LearnPatternCcdName'][] = $row['LearnPatternCcdName'];
                    $refund_data[$row['RefundReqIdx']]['ProdName'][] = $row['ProdName'];
                    $refund_data[$row['RefundReqIdx']]['RefundPrice'][] = $row['RefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CardRefundPrice'][] = $row['CardRefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CashRefundPrice'][] = $row['CashRefundPrice'];

                    $refund_data[$row['RefundReqIdx']] = array_merge($refund_data[$row['RefundReqIdx']], [
                        'RefundDatm' => $row['RefundDatm'], 'PayStatusCcdName' => $row['PayStatusCcdName'], 'IsApproval' => $row['IsApproval'], 'IsBankRefund' => $row['IsBankRefund'],
                        'RefundReason' => $row['RefundReason'], 'RefundAdminName' => $row['RefundAdminName']
                    ]);
                }
            }

            empty($refund_data) === false && $is_refund_data = true;    // 환불 데이터 존재 여부
        } else {
            // 환불 데이터 존재 여부
            foreach ($data as $row) {
                if ($row['PayStatusCcd'] == $this->orderListModel->_pay_status_ccd['refund']) {
                    $is_refund_data = true;
                    break;
                }
            }
        }

        $this->load->view('pay/order/show', [
            'idx' => $order_idx,
            'data' => [
                'order' => $order_data,
                'order_prod' => $data,
                'refund_prod' => $refund_data,
                'mem' => $mem_data,
                'mem_point' => $point_data
            ],
            '_is_refund_proc' => $this->_is_refund_proc,
            '_is_refund_data' => $is_refund_data,
            '_prod_type_ccd' => $this->orderListModel->_prod_type_ccd,
            '_pay_status_ccd' => $this->orderListModel->_pay_status_ccd
        ]);
    }

    /**
     * 주문 취소
     * @param array $params
     */
    protected function cancel($params = [])
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

    /**
     * 목록 order by 배열 리턴
     * @return array
     */
    protected function _getListOrderBy()
    {
        return ['OrderIdx' => 'desc', 'OrderProdIdx' => 'asc'];
    }
}
