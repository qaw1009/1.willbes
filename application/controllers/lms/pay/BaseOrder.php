<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseOrder extends \app\controllers\BaseController
{
    protected $models = array();
    protected $helpers = array();
    protected $_order_type = '';
    protected $_group_ccd = array();
    private $_is_refund = false;
    private $_is_refund_proc = false;
    private $_memory_limit_size = '512M';     // 엑셀파일 다운로드 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();

        $this->_order_type = strtolower($this->router->class);
        $this->_group_ccd = $this->orderListModel->_group_ccd;
        $this->_is_refund = starts_with($this->_order_type, 'refund');
        $this->_is_refund_proc = $this->_order_type == 'refundproc' ? true : false;
    }

    /**
     * 주문내역 보기
     * @param array $params
     */
    protected function show($params = [])
    {
        // add join array
        $_show_add_join = ['delivery_info', 'refund', 'refund_proc', 'my_lecture', 'subproduct', 'visit_card'];
        if (in_array($this->_order_type, ['order', 'visit']) === true) {
            $_show_add_join[] = 'campus';
        }

        // url segment 에서 숫자 값 리턴
        $order_idx = current(array_filter($params, function ($val) {
            return is_numeric($val);
        }));

        if (empty($order_idx) === true) {
            show_error('필수 파라미터 오류입니다.');
        }

        // 주문 조회
        $data = $this->orderListModel->listAllOrder(false, ['EQ' => ['O.OrderIdx' => $order_idx]], null, null, [], $_show_add_join);
        if (empty($data) === true) {
            show_error('데이터 조회에 실패했습니다.');
        }

        $order_data = element('0', $data, []);

        // PG사 결제완료일 경우 영수증 출력 URL 조회
        if ($order_data['PayRouteCcd'] === $this->orderListModel->_pay_route_ccd['pg'] && empty($order_data['CompleteDatm']) === false) {
            $pg_config_file = 'pg_' . $order_data['PgDriver'];
            $this->load->config($pg_config_file, true, true);
            $order_data['ReceiptUrl'] = str_replace('{{$tid$}}', $order_data['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 회원정보
        $mem_data = $this->manageMemberModel->getMember($order_data['MemIdx']);

        // 회원포인트 조회
        $point_data = $this->pointModel->getMemberPoint($order_data['MemIdx']);

        // 환불, 관리자결제 정보 조회
        $is_refund_data = false;
        $refund_data = [];
        $admin_pay_data = [];
        $delivery_addr = [];

        foreach ($data as $idx => $row) {
            if ($row['PayStatusCcd'] == $this->orderListModel->_pay_status_ccd['refund']) {
                // 환불내역 데이터 가공 (환불 관련 메뉴에서만 사용)
                if ($this->_is_refund === true) {
                    $refund_data[$row['RefundReqIdx']]['ProdTypeCcdName'][] = $row['ProdTypeCcdName'];
                    $refund_data[$row['RefundReqIdx']]['LearnPatternCcdName'][] = $row['LearnPatternCcdName'];
                    $refund_data[$row['RefundReqIdx']]['ProdName'][] = $row['ProdName'];
                    $refund_data[$row['RefundReqIdx']]['RefundPrice'][] = $row['RefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CardRefundPrice'][] = $row['CardRefundPrice'];
                    $refund_data[$row['RefundReqIdx']]['CashRefundPrice'][] = $row['CashRefundPrice'];

                    $refund_data[$row['RefundReqIdx']] = array_merge($refund_data[$row['RefundReqIdx']], [
                        'RefundDatm' => $row['RefundDatm'], 'PayStatusCcdName' => $row['PayStatusCcdName'], 'IsApproval' => $row['IsApproval'], 'RefundType' => $row['RefundType'],
                        'RefundReason' => $row['RefundReason'], 'RefundAdminName' => $row['RefundAdminName']
                    ]);
                }

                // 환불 데이터 존재 여부
                if ($is_refund_data === false) {
                    $is_refund_data = true;
                }
            }

            // 환불산출금액이 0보다 작을 경우 0으로 셋팅
            if ($this->_is_refund_proc === true) {
                $row['CalcCardRefundPrice'] < 0 && $data[$idx]['CalcCardRefundPrice'] = 0;
            }

            // 관리자결제 상품 데이터 셋팅
            if (empty($admin_pay_data) === true) {
                if (in_array(array_search($order_data['PayRouteCcd'], $this->orderListModel->_pay_route_ccd), ['zero', 'alliance', 'admin_pay']) === true
                        && $row['ProdTypeCcd'] != $this->orderListModel->_prod_type_ccd['delivery_price']) {
                    $admin_pay_data = $row;
                }
            }

            // 주문상품서브 데이터 셋팅
            if (empty($row['OrderSubProdData']) === false) {
                $data[$idx]['OrderSubProdList'] = array_data_pluck(json_decode($row['OrderSubProdData'], true), ['ProdCode', 'ProdName']);
                $data[$idx]['OrderSubProdList'] = '[' . str_replace('::', '] ', implode('<br/>[', $data[$idx]['OrderSubProdList']));
            }
        }

        // 관리자결제 정보 조회
        if (empty($admin_pay_data) === false) {
            if ($order_data['IsDelivery'] == 'Y') {
                // 배송주소 조회
                $delivery_addr = $this->orderListModel->findOrderDeliveryAddressByOrderIdx($order_data['OrderIdx']);

                // 배송료 관련 메모 조회
                $this->load->loadModels(['pay/orderMemo']);
                $delivery_addr['OrderMemo'] = array_get($this->orderMemoModel->listOrderMemo('OM.OrderMemo', [
                    'EQ' => ['OM.OrderIdx' => $order_data['OrderIdx'], 'OM.MemoTypeCcd' => $this->orderMemoModel->_order_memo_type_ccd['delivery_price']]
                ], 1, 0, ['OM.OrderMemoIdx' => 'desc']), '0.OrderMemo');
            }
            
            // 나의 강좌정보 조회
            empty($admin_pay_data['MyLecData']) === false && $admin_pay_data['MyLecData'] = element('0', json_decode($admin_pay_data['MyLecData'], true));

            // 회차정보 조회
            if (empty($admin_pay_data['MyLecData']['wUnitIdxs']) === false) {
                $this->load->loadModels(['pay/salesProduct']);
                $admin_pay_data['MyLecData']['wUnitData'] = $this->salesProductModel->findLectureUnitByUnitIdx(explode(',', $admin_pay_data['MyLecData']['wUnitIdxs']));
            }
        }

        $this->load->view('pay/order/show', [
            'idx' => $order_idx,
            'data' => [
                'order' => $order_data,
                'order_prod' => $data,
                'refund_prod' => $refund_data,
                'admin_prod' => $admin_pay_data,
                'delivery_addr' => $delivery_addr,
                'mem' => $mem_data,
                'mem_point' => $point_data
            ],
            '_order_type' => $this->_order_type,
            '_is_refund' => $this->_is_refund,
            '_is_refund_proc' => $this->_is_refund_proc,
            '_is_refund_data' => $is_refund_data,
            '_prod_type_ccd' => $this->orderListModel->_prod_type_ccd,
            '_learn_pattern_ccd' => $this->orderListModel->_learn_pattern_ccd,
            '_pay_route_ccd' => $this->orderListModel->_pay_route_ccd,
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
        return ['OrderIdx' => 'desc'];
    }

    /**
     * @param string $file_name [확장자를 제외한 생성파일명]
     * @param array $list [엑셀내용]
     * @param array $headers [엑셀헤더]
     * @param bool $is_huge [대용량 다운로드 메소드 사용여부]
     * @param string $query [엑셀다운로드 쿼리]
     */
    protected function _makeExcel($file_name, $list, $headers, $is_huge = true, $query = '')
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        // 파일명 가공
        $file_name = $file_name . '_' . $this->session->userdata('admin_idx') . '_' . date('Y-m-d');

        // download log
        $this->load->library('approval');
        if($this->approval->SysDownLog($query, $file_name, count($list)) !== true) {
            show_alert('엑셀파일 다운로드 로그 저장 중 오류가 발생하였습니다.', 'back');
        }

        // export excel
        $this->load->library('excel');

        if ($is_huge === true) {
            $result = $this->excel->exportHugeExcel($file_name, $list, $headers);
        } else {
            $result = $this->excel->exportExcel($file_name, $list, $headers);
        }

        if ($result !== true) {
            show_alert('엑셀파일 생성 중 오류가 발생하였습니다.', 'back');
        }
    }
}
