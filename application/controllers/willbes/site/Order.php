<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF', 'order/orderListF', 'product/productF', 'memberF', 'pointF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    // 사용하는 그룹공통코드
    private $_group_ccd = ['Tel1' => '672', 'Phone1' => '673', 'PayMethod' => '604'];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 주문하기 폼
     * @param array $params
     */
    public function index($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $sess_cart_idx = $this->orderFModel->checkSessCartIdx();
        $cart_type = $this->_req('tab');    // 장바구니 구분
        $pay_type = get_var($this->_req('pay_type'), 'pg');    // 결제루트 구분
        $is_visit_pay = $pay_type == 'visit' ? 'Y' : 'N';     // 방문결제 여부
        $sess_aff_idx = $this->orderFModel->getSessAffIdx();  // 제휴할인식별자

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, $is_visit_pay);

        // 장바구니 데이터 가공 (전체주문금액, 배송비, 적립예정포인트 계산 등 필요 데이터 가공)
        $results = $this->orderFModel->getMakeCartReData('order', $cart_type, $cart_rows, [], 0, '', $sess_aff_idx);
        if (is_array($results) === false) {
            show_alert($results, front_url('/cart/index'), false);
        }

        // 장바구니 데이터 추출
        $arr_cart_idx = array_pluck($results['list'], 'CartIdx');   // 장바구니 식별자
        $arr_cart_prod_type = array_pluck($results['list'], 'CartProdType');    // 장바구니 상품타입

        // 온라인강좌일 경우 자동지급 사은품 조회
        $results['freebie'] = [];
        if ($results['is_except_sale_pattern'] === false && $cart_type == 'on_lecture' && empty($arr_cart_idx) === false) {
            $results['freebie'] = $this->cartFModel->getProductFreebieByCartIdx($arr_cart_idx, $sess_mem_idx, $this->_site_code);
        }

        // 제휴할인정보 조회
        $results['affiliate'] = [];
        if ($results['is_except_sale_pattern'] === false && in_array($cart_type, $arr_cart_prod_type) === true) {
            // 단강좌, 단과반, 교재, 모의고사 상품이 있을 경우만 조회 (재수강, 수강연장 제외)
            $results['affiliate'] = $this->productFModel->findAffiliateDiscInfo('readingroom', $this->_site_code, $cart_type);
        }
        
        // 지역번호, 휴대폰번호, 결제수단 공통코드 조회
        $codes = $this->codeModel->getCcdInArray(array_values($this->_group_ccd));

        // 결제수단공통코드 (사이트정보에 설정된 결제수단만 필터링)
        $arr_pay_method_ccd = array_filter_keys($codes[$this->_group_ccd['PayMethod']], explode(',', config_app('PayMethodCcds')));

        if ($cart_type == 'mock_exam') {
            // 모의고사 상품 결제일 경우 무통장입금 삭제
            unset($arr_pay_method_ccd[$this->orderFModel->_pay_method_ccd['vbank']]);
        }

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);
        
        // 전화번호 체크 (전화번호 양식이 아닐 경우 값 초기화)
        if (isset($codes[$this->_group_ccd['Tel1']][$results['member']['Tel1']]) === false) {
            $results['member']['Tel'] = '';
            $results['member']['Tel1'] = '';
            $results['member']['Tel2'] = '';
            $results['member']['Tel3'] = '';
        }

        // 회원 보유포인트
        $results['point_type_name'] = $this->orderFModel->_point_type_name[$cart_type];
        $results['point'] = $this->pointFModel->getMemberPoint($cart_type == 'book' ? 'book' : 'lecture');

        $this->load->view('site/order/index', [
            'cart_type' => $cart_type,
            'arr_tel1_ccd' => $codes[$this->_group_ccd['Tel1']],
            'arr_phone1_ccd' => $codes[$this->_group_ccd['Phone1']],
            'arr_pay_method_ccd' => $arr_pay_method_ccd,
            'results' => $results
        ]);
    }

    /**
     * 주문완료 페이지
     * @param array $params
     */
    public function complete($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $order_no = $this->_req('order_no');
        if (empty($order_no) === true) {
            show_alert('필수 파라미터 오류입니다.', front_url('/cart/index'), false);
        }
        
        // 주문정보 조회
        $results['order'] = $this->orderListFModel->findOrderByOrderNo($order_no, $sess_mem_idx);
        if (empty($results['order']) === true) {
            show_alert('주문정보 데이터가 없습니다.', front_url('/cart/index'), false);
        }

        $order_idx = $results['order']['OrderIdx']; // 주문식별자
        $is_vbank = $results['order']['IsVBank'];   // 가상계좌 결제여부

        // 가상계좌 결제가 아닐 경우 영수증 출력 URL 조회
        if ($results['order']['PayRouteCcd'] == $this->orderListFModel->_pay_route_ccd['pg'] && $is_vbank == 'N') {
            $pg_config_file = 'pg_' . config_app('PgDriver', 'inisis');
            $this->load->config($pg_config_file, true, true);

            $results['order']['ReceiptUrl'] = str_replace('{{$tid$}}', $results['order']['PgTid'], config_get($pg_config_file . '.receipt_url'));
        }

        // 주문상품 목록 조회
        $results['order_product'] = $this->orderListFModel->listOrderProduct(false
            , ['EQ' => ['O.OrderIdx' => $order_idx, 'O.MemIdx' => $sess_mem_idx]]
            , null, null, ['OP.OrderProdIdx' => 'asc']);

        // 주문배송정보 조회
        $results['order_delivery'] = $this->orderListFModel->findOrderDeliveryAddressByOrderIdx($order_idx, $sess_mem_idx);

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        $this->load->view('site/order/complete', [
            'arr_prod_type_name' => $this->orderListFModel->_cart_prod_type_name,
            'arr_prod_type_idx' => $this->orderListFModel->_cart_prod_type_idx,
            'results' => $results
        ]);
    }

    /**
     * 사용포인트 체크
     * @return mixed
     */
    public function checkUsePoint()
    {
        // 전달 폼 데이터
        $arr_input = $this->_reqP(null, false);
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 장바구니 식별자 세션 체크
        $sess_cart_idx = $this->cartFModel->checkSessCartIdx(false);
        if ($sess_cart_idx === false) {
            return $this->json_error('잘못된 접근입니다.');
        }

        // 제휴할인 식별자 세션 체크
        $sess_aff_idx = $this->cartFModel->checkSessAffIdx(element('aff_idx', $arr_input));
        if ($sess_aff_idx === false) {
            return $this->json_error('잘못된 접근입니다.[2]');
        }

        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[on_lecture,off_lecture,book,mock_exam]'],
            ['field' => 'use_point', 'label' => '사용포인트', 'rules' => 'trim|required|integer'],
            ['field' => 'coupon_detail_idx', 'label' => '쿠폰식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, 'N');
        
        // 사용자 쿠폰 식별자
        $arr_coupon_detail_idx = json_decode(element('coupon_detail_idx', $arr_input, []), true);
        
        $results = $this->orderFModel->getMakeCartReData('check_use_point', element('cart_type', $arr_input), $cart_rows, $arr_coupon_detail_idx
            , element('use_point', $arr_input), '', $sess_aff_idx
        );

        if (is_array($results) === false) {
            return $this->json_result(true, '', [], ['is_check' => $results]);
        }

        return $this->json_result(true, '', [], ['is_check' => true]);
    }

    /**
     * 제휴할인 적용/취소
     * @param array $params [적용취소구분 (type/apply : 적용, type/cancel : 취소)
     * @return mixed
     */
    public function choiceAffiliateDiscRate($params = [])
    {
        $type = element('type', $params, 'apply');

        if ($type == 'apply') {
            $rules = [
                ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
                ['field' => 'aff_idx', 'label' => '제휴할인식별자', 'rules' => 'trim|required|integer']
            ];

            if ($this->validate($rules) === false) {
                return null;
            }
            
            // 제휴할인 식별자 세션 생성
            $this->orderFModel->makeSessAffIdx($this->_reqP('aff_idx'));
            $succ_msg = '적용되었습니다.';
        } else {
            // 제휴할인 식별자 세션 초기화
            $this->orderFModel->makeSessAffIdx('0');
            $succ_msg = '취소되었습니다.';
        }

        return $this->json_result(true, $succ_msg);
    }

    /**
     * 회원 식별자 기준 최근 배송정보 조회
     */
    public function recentDeliveryAddress()
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        // 최근 배송정보 조회
        $arr_condition = ['EQ' => ['O.MemIdx' => $this->session->userdata('mem_idx')]];
        $list = $this->orderListFModel->listOrderDeliveryAddress(false, $arr_condition, 1, 0, ['O.OrderIdx' => 'desc']);
        $data = element('0', $list, []);

        $this->json_result(true, '', [], $data);
    }

    /**
     * 무료강좌 주문 저장
     * @param array $params
     * @return CI_Output
     */
    public function free($params = [])
    {
        $_learn_pattern = $this->_reqP('learn_pattern');
        $_prod_code = $this->_reqP('prod_code');

        if (empty($_prod_code) === true || empty($_learn_pattern) === true || $_learn_pattern != 'on_free_lecture') {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 배열이 아닐 경우 json decode
        is_array($_prod_code) === false && $_prod_code = json_decode($_prod_code, true);

        $result = $this->orderFModel->procFreeOrder($_prod_code, $this->_site_code);

        return $this->json_result($result, '', $result);
    }

    /**
     * 방문결제 주문 저장 (/order/visit/direct 일 경우 직접방문접수 진행)
     * @param array $params
     * @return CI_Output|null
     */
    public function visit($params = [])
    {
        $is_direct_pay = element('0', $params) == 'direct' ? 'Y' : 'N';
        $rules = [['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]']];
        $input = [];

        if ($is_direct_pay == 'Y') {
            $input = $this->_reqP(null, false);
            $rules = array_merge($rules, [
                ['field' => 'learn_pattern', 'label' => '학습형태', 'rules' => 'trim|required|in_list[off_lecture,off_lecture_before,off_pack_lecture]'],
                ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[off_lecture]'],
                ['field' => 'prod_code[]', 'label' => '상품선택', 'rules' => 'trim|required'],
                ['field' => 'prod_code_sub[]', 'label' => '과목선택', 'rules' => 'callback_validateRequiredIf[learn_pattern,off_pack_lecture]']
            ]);
        } else {
            $rules = array_merge($rules, [
                ['field' => 'agree', 'label' => '유의사항안내 동의여부', 'rules' => 'trim|required|in_list[Y]']
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        $result = $this->orderFModel->procVisitOrder($this->_site_code, $input);

        $succ_msg = '접수가 완료되었습니다.' . PHP_EOL . '* 학원으로 방문해 주시기 바랍니다.';
        $return_url = app_url('/classroom/order/index', 'www');

        return $this->json_result($result, $succ_msg, $result, ['ret_url' => $return_url]);
    }
}
