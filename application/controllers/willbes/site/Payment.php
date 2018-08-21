<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    private $_pg_driver = null;    // PG driver

    public function __construct()
    {
        parent::__construct();
        
        // pg 라이브러리 로드
        $this->_pg_driver = config_app('PgDriver', 'inisis');
        $this->load->driver('pg', ['driver' => $this->_pg_driver, 'mid' => config_app('PgMid')]);
    }

    /**
     * PG사 결제요청
     * @param array $params
     * @return mixed
     */
    public function request($params = [])
    {
        // 전달 폼 데이터
        $arr_input = $this->_reqP(null, false);
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 주문요청 폼 데이터 유효성 검증
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[on_lecture,book]'],
            ['field' => 'cart_idx[]', 'label' => '장바구니식별자', 'rules' => 'trim|required'],
            ['field' => 'pay_method_ccd', 'label' => '결제수단', 'rules' => 'trim|required|integer'],
            ['field' => 'agree1', 'label' => '유의사항안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'agree2', 'label' => '개인정보활용안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'agree3', 'label' => '환불정책안내 동의여부', 'rules' => 'trim|required|in_list[Y]']
        ];

        if (isset($arr_input['receiver']) === true) {
            $rules = array_merge($rules, [
                ['field' => 'receiver', 'label' => '받는사람 이름', 'rules' => 'trim|required'],
                ['field' => 'zipcode', 'label' => '받는사람 우편번호', 'rules' => 'trim|required|integer'],
                ['field' => 'addr1', 'label' => '받는사람 주소', 'rules' => 'trim|required'],
                ['field' => 'addr2', 'label' => '받는사람 상세주소', 'rules' => 'trim|required'],
                ['field' => 'receiver_phone1', 'label' => '받는사람 휴대폰번호1', 'rules' => 'trim|required|integer'],
                ['field' => 'receiver_phone2', 'label' => '받는사람 휴대폰번호2', 'rules' => 'trim|required|integer'],
                ['field' => 'receiver_phone3', 'label' => '받는사람 휴대폰번호3', 'rules' => 'trim|required|integer']
            ]);
        }

        if ($this->validate($rules) === false) {
            return null;
        }

        // 장바구니 식별자 세션 체크
        $sess_cart_idx = $this->cartFModel->checkSessCartIdx(false);
        if ($sess_cart_idx === false || empty(array_diff((array) $sess_cart_idx, element('cart_idx', $arr_input))) === false) {
            return $this->json_error('잘못된 접근입니다.');
        }

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, null);

        // 장바구니 데이터 가공 (전체결제금액 리턴)
        $results = $this->orderFModel->getMakeCartReData(
            'pay', element('cart_type', $arr_input), $cart_rows, element('coupon_detail_idx', $arr_input, []), element('use_point', $arr_input)
        );
        if (is_array($results) === false) {
            return $this->json_error($results);
        }

        // 주문번호 생성
        $order_no = $this->orderFModel->makeOrderNo();

        // 주문요청 데이터 저장
        $is_post_data = $this->orderFModel->addOrderPostData([
            'order_no' => $order_no,
            'site_code' => $this->_site_code,
            'cate_code' => $this->_cate_code,
            'pg_ccd' => config_app('PgCcd'),
            'repr_prod_name' => $results['repr_prod_name'],
            'req_pay_price' => $results['total_pay_price']
        ], $arr_input);

        if ($is_post_data !== true) {
            return $this->json_error($is_post_data['ret_msg']);
        }

        // PG사 결제요청 폼 생성
        $data = [
            'order_no' => $order_no,
            'repr_prod_name' => $results['repr_prod_name'],
            'req_pay_price' => $results['total_pay_price'],
            'order_name' => $this->session->userdata('mem_name'),
            'order_phone' => $this->session->userdata('mem_phone'),
            'order_mail' => $this->session->userdata('mem_mail'),
            'pay_method_ccd' => element('pay_method_ccd', $arr_input),
            'is_escrow' => element('is_escrow', $arr_input),
            'return_prefix_url' => site_url('/payment/'),
            'return_data' => ''
        ];

        $form = $this->pg->requestForm($data);
        if ($form === false) {
            $this->json_error('결제요청 중 오류가 발생하였습니다.');
        } else {
            // 주문번호 세션생성
            $this->orderFModel->makeSessOrderNo($order_no);

            $this->json_result(true, '', [], $form);
        }
    }

    public function returns()
    {
        $result = $this->pg->returnResult();

        dd($result);
    }

    /**
     * PG사 결제요청 취소
     * @param array $params
     * @return mixed
     */
    public function close($params = [])
    {
        // 주문요청 데이터 삭제
        $order_no = $this->orderFModel->checkSessOrderNo();
        $is_delete = $this->orderFModel->removeOrderPostData($order_no, $this->session->userdata('mem_idx'));
        
        // 주문번호 세션삭제
        $this->orderFModel->destroySessOrderNo();

        return $this->pg->requestCancel(['order_no' => $order_no, 'is_post_data_delete' => $is_delete]);
    }
}
