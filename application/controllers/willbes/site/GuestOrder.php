<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuestOrder extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'product/productF', '_lms/sys/code');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array();

    // 사용하는 그룹공통코드
    private $_group_ccd = ['Tel1' => '672', 'Phone1' => '673', 'PayMethod' => '604'];

    public function __construct()
    {
        parent::__construct();
        
        // 실서비스일 경우 접금금지 처리
        redirect(app_url('/', 'www'));
    }

    /**
     * 비회원 주문하기 폼
     * @param array $params
     */
    public function index($params = [])
    {
        $sess_prod_code = $this->cartFModel->checkSessCartIdx();
        $cart_type = $this->_req('tab');    // 장바구니 구분

        // 장바구니 조회
        $results = $this->cartFModel->listGuestCart($this->_site_code, $sess_prod_code, true);
        if (empty($results) === true) {
            show_alert('장바구니 데이터가 없습니다.', front_url('/cart/index'), false);
        }

        // 유료결제만 가능
        if ($results['total_pay_price'] < 1) {
            show_alert('유료결제만 가능합니다.', front_url('/cart/index'), false);
        }

        // 지역번호, 휴대폰번호, 결제수단 공통코드 조회
        $codes = $this->codeModel->getCcdInArray(array_values($this->_group_ccd));

        // 결제수단공통코드 (사이트정보에 설정된 결제수단만 필터링)
        $arr_pay_method_ccd = array_filter_keys($codes[$this->_group_ccd['PayMethod']], explode(',', config_app('PayMethodCcds')));
        $arr_pay_method_ccd = array_unset($arr_pay_method_ccd, $this->cartFModel->_pay_method_ccd['vbank']);   // 무통장입금 사용안함

        $this->load->view('site/order/guest', [
            'cart_type' => $cart_type,
            'arr_tel1_ccd' => $codes[$this->_group_ccd['Tel1']],
            'arr_phone1_ccd' => $codes[$this->_group_ccd['Phone1']],
            'arr_pay_method_ccd' => $arr_pay_method_ccd,
            'results' => $results
        ]);
    }

    /**
     * 비회원 PG사 결제요청
     * @param array $params
     * @return mixed
     */
    public function request($params = [])
    {
        // 전달 폼 데이터
        $arr_input = $this->_reqP(null, false);

        // 모바일 접근시 디바이스 체크
        if ($this->_is_mobile === true) {
            $this->load->library('user_agent');
            if ($this->agent->is_mobile() == false) {
                return $this->json_error('허용된 디바이스가 아닙니다. 모바일 기기로 다시 시도해 주세요.');
            }
        }

        // 주문요청 폼 데이터 유효성 검증
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[book]'],
            ['field' => 'prod_code[]', 'label' => '상품코드', 'rules' => 'trim|required'],
            ['field' => 'pay_method_ccd', 'label' => '결제수단', 'rules' => 'trim|required|integer'],
            ['field' => 'agree1', 'label' => '유의사항안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'agree2', 'label' => '개인정보활용안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'agree3', 'label' => '환불정책안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'receiver', 'label' => '받는사람 이름', 'rules' => 'trim|required'],
            ['field' => 'zipcode', 'label' => '받는사람 우편번호', 'rules' => 'trim|required|integer'],
            ['field' => 'addr1', 'label' => '받는사람 주소', 'rules' => 'trim|required'],
            ['field' => 'addr2', 'label' => '받는사람 상세주소', 'rules' => 'trim|required'],
            ['field' => 'receiver_mail', 'label' => '받는사람 메일주소', 'rules' => 'trim|required|valid_email'],
            ['field' => 'receiver_phone1', 'label' => '받는사람 휴대폰번호1', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver_phone2', 'label' => '받는사람 휴대폰번호2', 'rules' => 'trim|required|integer'],
            ['field' => 'receiver_phone3', 'label' => '받는사람 휴대폰번호3', 'rules' => 'trim|required|integer']
        ];

        if ($this->validate($rules) === false) {
            return null;
        }

        // 장바구니 상품코드 세션 체크
        $sess_prod_code = $this->cartFModel->checkSessCartIdx(false);
        if ($sess_prod_code === false || empty(array_diff((array) $sess_prod_code, element('prod_code', $arr_input))) === false) {
            return $this->json_error('잘못된 접근입니다.');
        }

        // 장바구니 조회
        $results = $this->cartFModel->listGuestCart($this->_site_code, $sess_prod_code, true);
        if (empty($results) === true) {
            return $this->json_error('장바구니 데이터가 없습니다.');
        }

        // 장바구니 상품코드 세션 수와 조회된 장바구니 데이터 수 비교
        if (count($sess_prod_code) != $results['total_prod_cnt']) {
            return $this->json_error('장바구니 데이터 수가 일치하지 않습니다.1');
        }

        // 유료결제만 가능
        if ($results['total_pay_price'] < 1) {
            return $this->json_error('유료결제만 가능합니다.');
        }

        // 추가 배송료 합산
        $results['total_pay_price'] += $this->cartFModel->getDeliveryAddPrice($this->_reqP('zipcode'));

        // 주문번호 생성
        $order_no = $this->cartFModel->makeOrderNo();

        // PG 드라이버 로드
        $pg_object = $this->_loadPgDriver();

        // PG사 결제요청 폼 생성
        $data = [
            'mid' => $results['cart_type'] == 'book' ? config_app('PgBookMid') : config_app('PgMid'),
            'order_no' => $order_no,
            'repr_prod_name' => $results['repr_prod_name'],
            'req_pay_price' => $results['total_pay_price'],
            'order_name' => element('receiver', $arr_input),
            'order_phone' => element('receiver_phone1', $arr_input) . element('receiver_phone2', $arr_input) . element('receiver_phone3', $arr_input),
            'order_mail' => element('receiver_mail', $arr_input),
            'pay_method_ccd' => element('pay_method_ccd', $arr_input),
            'is_escrow' => element('is_escrow', $arr_input),
            'return_prefix_url' => front_url('/guestOrder/'),
            'return_data' => ''
        ];

        $form = $this->{$pg_object}->requestForm($data);
        if ($form === false) {
            return $this->json_error('결제요청 중 오류가 발생하였습니다.');
        } else {
            return $this->json_result(true, '', [], $form);
        }
    }

    /**
     * 비회원 PG사 결제요청 취소 (PC 전용)
     * @param array $params
     * @return mixed
     */
    public function close($params = [])
    {
        // PG 드라이버 로드
        $pg_object = $this->_loadPgDriver();

        return $this->pg->requestCancel(['order_no' => 'GuestOrder', 'is_post_data_delete' => '']);
    }

    /**
     * 비회원 PG사 결제완료
     */
    public function returns()
    {
        show_alert('결제연동 중 오류가 발생하였습니다.', front_url('/home/index'));
    }

    /**
     * 비회원 주문완료 페이지
     * @param array $params
     */
    public function complete($params = [])
    {
        show_alert('결제가 성공적으로 완료되었습니다.', front_url('/home/index'));
    }

    /**
     * load PG Driver
     * @return string [PG 드라이버 object명]
     */
    private function _loadPgDriver()
    {
        $driver = config_app('PgDriver', 'inisis');
        $object_name = 'pg';

        if (APP_DEVICE == 'pc') {
            // PC 드라이버 로드
            $this->load->driver('pg', ['driver' => $driver]);
        } else {
            // 모바일 드라이버 로드
            $object_name = 'pg_mobile';
            $this->load->driver('pg', ['driver' => $driver . '_mobile'], $object_name);
        }

        return $object_name;
    }
}
