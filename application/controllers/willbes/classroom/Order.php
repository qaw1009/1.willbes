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
        $count = $this->orderListFModel->listOrder(true, $arr_condition);
        $paging = $this->pagination('/classroom/order/index?' . http_build_query($arr_input), $count, 10, 10,true);

        if ($count > 0) {
            $list = $this->orderListFModel->listOrder(false, $arr_condition, $paging['limit'], $paging['offset'], ['O.OrderIdx' => 'desc']);
        }

        $this->load->view('/classroom/order/index', [
            'arr_input' => $arr_input,
            'arr_site_group' => $arr_site_group,
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
            $pg_config_file = 'pg_' . config_app('PgDriver', 'inisis');
            $this->load->config($pg_config_file, true, true);

            $results['order']['ReceiptUrl'] = str_replace('{{$tid$}}', $results['order']['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 주문상품 목록 조회
        $results['order_product'] = $this->orderListFModel->listOrderProduct(false, ['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $sess_mem_idx]]
            , null, null, ['OP.OrderProdIdx' => 'asc']);

        // 주문배송정보 조회
        $results['order_delivery'] = $this->orderListFModel->findOrderDeliveryAddressByOrderIdx($order_idx, $sess_mem_idx);

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
}
