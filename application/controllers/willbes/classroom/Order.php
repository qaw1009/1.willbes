<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/orderListF', 'order/orderF', 'memberF', '_lms/sys/siteGroup');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 주문 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 디폴트 주문일자
        if (isset($arr_input['search_start_date']) === false) {
            $arr_input['search_end_date'] = date('Y-m-d');
            $arr_input['search_start_date'] = date('Y-m-d', strtotime($arr_input['search_end_date'] . ' -1 month'));
        }

        // 사이트그룹 코드 조회
        $arr_site_group = $this->siteGroupModel->getSiteGroupArray(false);

        // 검색조건
        $arr_condition = [
            'EQ' => [
                'O.MemIdx' => $sess_mem_idx,
                'S.SiteGroupCode' => element('site_group', $arr_input),
                'S.IsCampus' => element('is_pass', $arr_input)
            ],
            'NOT' => ['O.PayRouteCcd' => $this->orderListFModel->_pay_route_ccd['free']],   // 무료결제만 제외
            'BDT' => ['O.OrderDatm' => [element('search_start_date', $arr_input), element('search_end_date', $arr_input)]]
        ];

        // 교재주문만 조회
        if (element('is_book', $arr_input) == 'Y') {
            $raw_query = /** @lang text */ 'select 1 from ' . $this->orderListFModel->_table['order_product'] . ' as WOP
                    inner join ' . $this->orderListFModel->_table['product'] . ' as WP
                        on WOP.ProdCode = WP.ProdCode
                where WOP.OrderIdx = O.OrderIdx and WOP.MemIdx = "' . $sess_mem_idx . '" and WP.ProdTypeCcd = "' . $this->orderListFModel->_prod_type_ccd['book'] . '"';
            $arr_condition['RAW']['EXISTS ('] = $raw_query . ')';
        }

        $list = [];
        $count = $this->orderListFModel->getMyPageOrderList(true, $arr_condition);
        $paging = $this->pagination('/classroom/order/index?' . http_build_query($arr_input), $count, 10, 10,true);

        if ($count > 0) {
            $list = $this->orderListFModel->getMyPageOrderList(false, $arr_condition, $paging['limit'], $paging['offset'], ['O.OrderIdx' => 'desc']);

            foreach ($list as $idx => $row) {
                $list[$idx]['OrderProdData'] = json_decode($row['OrderProdData'], true);
            }
        }

        // 주문상품타입명 (그외 상품타입: 기타)
        $arr_match_prod_type_name = [
            '615001' => '강좌', '615002' => '패키지', '615003' => '패키지', '615004' => '패키지', '615005' => '강좌', '615006' => '강좌', '615007' => '종합반',
            '636003' => '교재', '636004' => '사은품', '636005' => '배송', '636006' => '배송', '636010' => '모의고사'
        ];

        // 주문상품타입클래스 (기본: waitBox_block)
        $arr_match_prod_type_class = ['패키지' => 'answerBox', '종합반' => 'answerBox', '교재' => 'finishBox', '사은품' => 'finishBox'];

        $this->load->view('/classroom/order/index', [
            'arr_input' => $arr_input,
            'arr_site_group' => $arr_site_group,
            'arr_match_prod_type_name' => $arr_match_prod_type_name,
            'arr_match_prod_type_class' => $arr_match_prod_type_class,
            'arr_delivery_status_ccd' => $this->orderListFModel->_delivery_status_ccd,
            'paging' => $paging,
            'data' => $list
        ]);
    }

    /**
     * 주문 상세내역
     * @param array $params
     */
    public function show($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));

        $sess_mem_idx = $this->session->userdata('mem_idx');
        $order_no = $this->_req('order_no');
        if (empty($order_no) === true) {
            show_alert('필수 파라미터 오류입니다.', 'back');
        }

        // 주문정보 조회
        $results['order'] = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);
        if (empty($results['order']) === true) {
            show_alert('주문정보 데이터가 없습니다.', 'back');
        }

        $order_idx = $results['order']['OrderIdx']; // 주문식별자
        $is_vbank = $results['order']['IsVBank'];   // 가상계좌 결제여부

        // PG사 결제완료일 경우 영수증 출력 URL 조회
        if ($results['order']['PayRouteCcd'] == $this->orderListFModel->_pay_route_ccd['pg'] && empty($results['order']['CompleteDatm']) === false) {
            $pay_log_data = $this->orderListFModel->getPaidOrderPaymentData($order_no, $results['order']['PgCcd'], $results['order']['PayMethodCcd']);
            $results['order']['ReceiptUrl'] = array_get($pay_log_data, 'PgReceiptUrl');
        }

        // 주문상품 목록 조회
        $results['order_product'] = $this->orderListFModel->listOrderProduct(false, ['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $sess_mem_idx]]
            , null, null, ['OP.OrderProdIdx' => 'asc']);

        // 주문배송정보 조회
        $results['order_delivery'] = $this->orderListFModel->findOrderDeliveryAddressByOrderIdx($order_idx, $sess_mem_idx);

        // 주문배송지 정보 수정가능여부 체크
        if (empty($results['order_delivery']) === false) {
            $results['order_delivery']['IsModifiable'] = $this->orderListFModel->checkModifiableOrderDeliveryAddress($order_idx, $sess_mem_idx);
        }

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        $this->load->view('/classroom/order/show', [
            'arr_input' => $arr_input,
            'arr_prod_type_name' => $this->orderListFModel->_cart_prod_type_name,
            'arr_prod_type_idx' => $this->orderListFModel->_cart_prod_type_idx,
            'arr_delivery_status_ccd' => $this->orderListFModel->_delivery_status_ccd,
            'query_string' => http_build_query(array_slice($arr_input, 1)),
            'results' => $results
        ]);
    }

    /**
     * 영수증 조회
     * @param array $params [주문번호 | 주문번호/type/영수증구분]
     */
    public function receipt($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $order_no = element('0', $params);
        $receipt_type = element('2', $params);  // 영수증구분 (receipt, cash-receipt)
        $ori_receipt_url = base64_decode($this->_req('receipt_url'));   // 영수증 URL

        if (empty($order_no) === true || empty($ori_receipt_url) === true) {
            show_alert('필수 파라미터 오류입니다.', 'close');
        }

        // 주문정보 조회
        $order_data = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);
        if (empty($order_data) === true) {
            show_alert('주문정보가 없습니다.', 'close');
        }

        // 디폴트 영수증 URL
        $receipt_url = $ori_receipt_url;

        if ($order_data['PgCcd'] == $this->orderListFModel->_pg_ccd['toss'] && $order_data['PayMethodCcd'] != $this->orderListFModel->_pay_method_ccd['card']) {
            // 토스 계좌이체, 가상계좌 결제일 경우만 PG사 결제정보 API 연동
            $this->load->driver('pg', ['driver' => 'toss']);
            $data = $this->pg->getPayInfo($order_data['PgMid'], ['order_no' => $order_no]);

            if ($data['ret_cd'] === true && empty($data['ret_data']) === false) {
                // 매출전표, 현금영수증URL 추출
                $sales_slip = array_get($data, 'ret_data.receipt.url'); // 매출전표
                $cach_receipt = array_get($data, 'ret_data.cashReceipt.receiptUrl');    // 현금영수증

                if ($receipt_type == 'cash-receipt' || empty($cach_receipt) === false) {
                    $receipt_url = $cach_receipt;
                } else {
                    $receipt_url = $sales_slip;
                }
            }
        }

        redirect(get_var($receipt_url, $ori_receipt_url));
    }

    /**
     * 주문배송지 정보 수정
     */
    public function modifyAddr()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[PUT]'],
            ['field' => 'order_idx', 'label' => '주문식별자', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver', 'label' => '받는사람이름', 'rules' => 'trim|required'],
            ['field' => 'zipcode', 'label' => '우편번호', 'rules' => 'trim|required|integer'],
            ['field' => 'addr1', 'label' => '주소', 'rules' => 'trim|required'],
            ['field' => 'addr2', 'label' => '상세주소', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $result = $this->orderFModel->modifyOrderDeliveryAddress($this->_reqP(null, false));

        $this->json_result($result, '수정되었습니다.', $result);
    }
}
