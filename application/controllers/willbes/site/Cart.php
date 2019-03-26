<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'product/packageF', 'order/orderListF');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 장바구니 목록
     * @param array $params
     */
    public function index($params = [])
    {
        // input parameter
        $arr_input = array_merge($this->_reqG(null), $this->_reqP(null));
        $sess_mem_idx = $this->session->userdata('mem_idx');

        // 장바구니 조회
        $list = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code);

        $results = [];
        foreach ($list as $idx => $row) {
            // 상품 갯수, 상품 금액 배열 키 (on_lecture : 단강좌, on_pack_lecture : 패키지, book : 교재)
            $count_key = 'count.' . $row['CartProdType'];
            $price_key = 'price.' . $row['CartProdType'];

            // 상품 갯수
            array_set($results, $count_key, array_get($results, $count_key, 0) + 1);

            // 상품 금액
            array_set($results, $price_key, array_get($results, $price_key, 0) + $row['RealSalePrice']);

            // 강좌, 교재 목록 구분, 배송료 배열 키 (on_lecture : 온라인강좌, book : 교재)
            $results['list'][$row['CartType']][] = $row;

            if ($idx == 0) {
                $results['recent_cate_code'] = substr($row['CateCode'], 0, 4);
            }
        }

        // 온라인 강좌 배송료
        $results['delivery_price']['on_lecture'] = $this->cartFModel->getLectureDeliveryPrice(array_pluck(array_get($results, 'list.on_lecture', []), 'IsFreebiesTrans'));

        // 교재 배송료
        $results['delivery_price']['book'] = isset($results['count']['book']) === true ? $this->cartFModel->getBookDeliveryPrice(array_get($results, 'price.book', 0)) : 0;

        $this->load->view('site/cart/index', [
            'arr_input' => $arr_input,
            'results' => $results
        ]);
    }

    /**
     * 상품정보 상세 (레이어 팝업)
     * @param array $params
     * @return CI_Output
     */
    public function info($params = [])
    {
        $sess_mem_idx = $this->session->userdata('mem_idx');
        $cart_idx = $this->_req('cart_idx');
        if (empty($cart_idx) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        // 장바구니 조회
        $cart_data = $this->cartFModel->findCartByCartIdx($cart_idx, $sess_mem_idx);

        if (empty($cart_data['ProdCodeSub']) === false) {
            // 서브강좌코드 배열 생성
            $cart_data['ProdCodeSub'] = explode(',', $cart_data['ProdCodeSub']);
        }

        // 패키지 서브강좌 조회
        $list = $this->packageFModel->findProductSubLectures($cart_data['ProdCode'], $cart_data['ProdCodeSub']);

        $this->load->view('site/cart/info_modal', [
            'ele_id' => $this->_req('ele_id'),
            'arr_learn_pattern_ccd' => $this->cartFModel->_learn_pattern_ccd,
            'arr_adminpack_lecture_type_ccd' => $this->cartFModel->_adminpack_lecture_type_ccd,
            'results' => ['data' => $cart_data, 'list' => $list]
        ]);        
    }

    /**
     * 수강생교재 구매시 연결부모상품 주문여부 및 장바구니 확인
     * @param array $params
     */
    public function checkStudentBook($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'learn_pattern', 'label' => '학습형태', 'rules' => 'trim|required'],
            ['field' => 'prod_code', 'label' => '상품 식별자', 'rules' => 'trim|required'],
            ['field' => 'parent_prod_code', 'label' => '부모상품 식별자', 'rules' => 'trim|required'],
            ['field' => 'group_prod_code', 'label' => '그룹상품 식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        $learn_pattern = $this->_reqP('learn_pattern');
        $prod_book_code = $this->_reqP('prod_code');
        $parent_prod_code = $this->_reqP('parent_prod_code');
        $group_prod_code = $this->_reqP('group_prod_code');
        $input_prod_code = json_decode($this->_reqP('input_prod_code'), true);

        if ($learn_pattern == 'adminpack_lecture') {
            // 운영자 일반형 패키지 연결 단강좌 조회
            $pack_data = $this->packageFModel->findProductByProdCode('adminpack_lecture', $group_prod_code, '', ['EQ' => ['IsUse' => 'Y']]);
            if (empty($pack_data) === false && $pack_data['PackTypeCcd'] === $this->cartFModel->_adminpack_lecture_type_ccd['normal']) {
                $input_prod_code = explode(',', $pack_data['ProdCodeSub']);
            }
        }

        // 수강생교재 주문가능여부 확인
        $returns['is_check'] = $this->cartFModel->checkStudentBook($this->_site_code, $prod_book_code, $parent_prod_code, $input_prod_code);

        $this->json_result(true, '', [], $returns);
    }

    /**
     * 주문 페이지 이동 (장바구니 페이지에서 결제하기 버튼 클릭)
     * @param array $params
     * @return mixed
     */
    public function toOrder($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[POST]'],
            ['field' => 'cart_idx[]', 'label' => '장바구니 식별자', 'rules' => 'trim|required'],
            ['field' => 'cart_type', 'label' => '장바구니 구분', 'rules' => 'trim|required|in_list[on_lecture,off_lecture,book,mock_exam]'],
        ];

        if ($this->validate($rules) === false) {
            return null;
        }
        
        $cart_type = $this->_reqP('cart_type'); // 장바구니 구분값
        $arr_cart_idx = $this->_reqP('cart_idx');   // 선택한 장바구니 식별자 배열
        $pay_type = get_var($this->_req('pay_type'), 'pg');    // 결제루트 구분
        $return_url = front_url('/order/index?tab=' . $cart_type);  // 리턴 URL

        if ($pay_type == 'pg') {
            // 배송료가 부가되는지 여부 체크 후 배송료 상품 장바구니 추가
            $result = $this->cartFModel->addCartForDeliveryPrice($this->_site_code, $cart_type, $arr_cart_idx);
            if ($result['ret_cd'] === false) {
                return $this->json_error($result['ret_msg'], $result['ret_status']);
            } else {
                // 추가된 배송료 상품이 있을 경우
                if (empty($result['ret_data']) === false) {
                    $arr_cart_idx[] = $result['ret_data'];
                }
            }
        } else {
            $return_url .= '&pay_type=' . $pay_type;
        }

        // 장바구니 식별자 세션 생성
        $this->cartFModel->makeSessCartIdx($arr_cart_idx);

        return $this->json_result(true, '', [], ['ret_url' => $return_url]);
    }

    /**
     * 장바구니 저장
     * @param array $params
     * @return CI_Output
     */
    public function store($params = [])
    {
        $is_ajax = $this->input->is_ajax_request();

        if (empty($this->_reqP('learn_pattern')) === false) {
            $data = $this->_getAddNormalData();
        } else {
            $data = $this->_getAddPatternData();
        }

        if (is_array($data) === false) {
            if ($is_ajax === true) {
                return $this->json_error($data, _HTTP_BAD_REQUEST);
            } else {
                show_alert($data, 'back');
            }
        }

        // 장바구니 저장
        $result = $this->cartFModel->addCart($data['learn_pattern'], $data['add_data']);

        // 바로결제일 경우 장바구니 식별자 세션 생성
        if ($result['ret_cd'] === true && $data['add_data']['is_direct_pay'] == 'Y') {
            $arr_cart_idx = $result['ret_data'];

            // 배송료가 부가되는지 여부 체크 후 배송료 상품 장바구니 추가
            $add_result = $this->cartFModel->addCartForDeliveryPrice($data['add_data']['site_code'], $data['cart_type'], $arr_cart_idx);
            if ($add_result['ret_cd'] === false) {
                return $this->json_error($add_result['ret_msg'], $add_result['ret_status']);
            } else {
                // 추가된 배송료 상품이 있을 경우
                if (empty($add_result['ret_data']) === false) {
                    $arr_cart_idx[] = $add_result['ret_data'];
                }
            }

            $this->cartFModel->makeSessCartIdx($arr_cart_idx);
        }

        if ($is_ajax === true) {
            return $this->json_result($result['ret_cd'], '', $result, ['ret_url' => $data['ret_url']]);
        } else {
            if ($result['ret_cd'] === true) {
                redirect($data['ret_url']);
            } else {
                show_alert($result['ret_msg'], 'back');
            }
        }
    }

    /**
     * 장바구니 저장 데이터 리턴 (일반)
     * @return array|string
     */
    private function _getAddNormalData()
    {
        $learn_pattern = $this->_reqP('learn_pattern');
        $cart_type = $this->_reqP('cart_type');
        $prod_code = $this->_reqP('prod_code');
        $is_direct_pay = $this->_reqP('is_direct_pay');
        $site_code = $this->_site_code;
        $arr_subject_prof_idx = $this->_reqP('subject_prof');
        $is_visit_pay = 'N';
        $ret_url = '';
        $post_data = null;

        if (empty($cart_type) === true || empty($prod_code) === true || empty($is_direct_pay) === true) {
            return '필수 파라미터 오류입니다.';
        }

        // 학원강좌 방문접수 (학원상품이면서 바로결제가 아닌 경우 방문접수)
        if (starts_with($learn_pattern, 'off') === true && $is_direct_pay == 'N') {
            $is_visit_pay = 'Y';
        }

        // 기간제선택형패키지 과목/교수 정보
        if ($learn_pattern == 'periodpack_lecture' && empty($arr_subject_prof_idx) === false) {
            $post_data['subject_prof_idx'] = (array) $arr_subject_prof_idx;
            $post_data = json_encode($post_data);
        }

        // 모의고사상품 선택정보
        if ($learn_pattern == 'mock_exam') {
            $post_data['mock_exam'] = [
                'take_form' => $this->_reqP('TakeForm'),
                'take_area' => $this->_reqP('TakeArea'),
                'take_part' => $this->_reqP('TakeMockPart'),
                'subject_ess' => $this->_reqP('subject_ess'),
                'subject_sub' => $this->_reqP('subject_sub'),
                'add_point' => $this->_reqP('AddPoint')
            ];
            $post_data = json_encode($post_data);
        }

        $add_data = [
            'prod_code' => $prod_code,
            'prod_code_sub' => $this->_reqP('prod_code_sub'),
            'site_code' => $site_code,
            'is_direct_pay' => $is_direct_pay,
            'is_visit_pay' => $is_visit_pay,
            'ca_idx' => $this->_reqP('ca_idx'),
            'post_data' => $post_data
        ];

        // 리턴 URL 지정
        if ($is_visit_pay == 'N') {
            $ret_url = $is_direct_pay == 'Y' ? front_url('/order/index?tab=' . $cart_type) : front_url('/cart/index?tab=' . $cart_type);
        }

        return [
            'learn_pattern' => $learn_pattern,
            'cart_type' => $cart_type,
            'add_data' => $add_data,
            'ret_url' => $ret_url
        ];
    }

    /**
     * 장바구니 저장 데이터 리턴 (수강연장, 재수강)
     * @return array|string
     */
    private function _getAddPatternData()
    {
        $sale_pattern = $this->_reqP('sale_pattern');
        $target_order_idx = $this->_reqP('target_order_idx');
        $target_prod_code = $this->_reqP('target_prod_code');
        $target_prod_code_sub = get_var($this->_reqP('target_prod_code_sub'), $target_prod_code);
        $extend_day = $this->_reqP('extend_day');
        $cart_type = 'on_lecture';
        $is_direct_pay = 'Y';
        $is_visit_pay = 'N';

        if (isset($this->cartFModel->_sale_pattern_ccd[$sale_pattern]) === false || empty($target_order_idx) === true || empty($target_prod_code) === true) {
            return '필수 파라미터 오류입니다.';
        }

        // 주문상품 조회
        $order_prod_row = $this->orderListFModel->findOrderProductByAllProdCode([
            'EQ' => [
                'OPU.OrderIdx' => $target_order_idx, 'OPU.MemIdx' => $this->session->userdata('mem_idx'), 'OPU.ProdCode' => $target_prod_code_sub,
                'OPU.PayStatusCcd' => $this->cartFModel->_pay_status_ccd['paid']
            ]
        ]);

        if (empty($order_prod_row) === true) {
            return '주문내역이 없습니다.';
        }

        // 온라인 단강좌 상품 여부 체크
        $learn_pattern = $this->cartFModel->getLearnPattern($order_prod_row['ProdTypeCcd'], $order_prod_row['LearnPatternCcd']);
        if ($learn_pattern != 'on_lecture') {
            return '온라인 단강좌 상품만 신청이 가능합니다.';
        }

        $site_code = $order_prod_row['SiteCode'];
        $prod_code = [$order_prod_row['ProdCode'] . ':' . $order_prod_row['SaleTypeCcd'] . ':' . $order_prod_row['ProdCode']];

        $add_data = [
            'prod_code' => $prod_code,
            'site_code' => $site_code,
            'is_direct_pay' => $is_direct_pay,
            'is_visit_pay' => $is_visit_pay,
            'sale_pattern' => $sale_pattern,
            'target_order_idx' => $target_order_idx,
            'target_prod_code' => $target_prod_code,
            'target_prod_code_sub' => $target_prod_code_sub,
            'extend_day' => $extend_day
        ];

        // 리턴 URL 지정
        $ret_url = front_app_url('/order/index?tab=' . $cart_type, $this->getSiteCacheItem($site_code, 'SiteGroupId'));

        return [
            'learn_pattern' => $learn_pattern,
            'cart_type' => $cart_type,
            'add_data' => $add_data,
            'ret_url' => $ret_url
        ];
    }

    /**
     * 장바구니 선택삭제/개별삭제
     * @param array $params
     */
    public function destroy($params = [])
    {
        $rules = [
            ['field' => '_method', 'label' => '전송방식', 'rules' => 'trim|required|in_list[DELETE]'],
            ['field' => 'cart_idx', 'label' => '장바구니 식별자', 'rules' => 'trim|required']
        ];

        if ($this->validate($rules) === false) {
            return;
        }

        if($this->_reqP('_del_type') === 'each') {  //cartIdx 개별삭제
            $_method_name = 'removeCartByCartIdx';
        } else {
            $_method_name = 'removeCart';
        }

        $result = $this->cartFModel->$_method_name(json_decode($this->_reqP('cart_idx'), true));

        $this->json_result($result, '삭제 되었습니다.', $result);        
    }
}
