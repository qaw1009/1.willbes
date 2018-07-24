<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF', 'memberF', '_lms/sys/wCode');
    protected $helpers = array();
    protected $auth_controller = true;
    protected $auth_methods = array();

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
        $is_delivery_info = false;

        // 장바구니 조회
        $list = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, $this->_cate_code, $sess_cart_idx);

        $results = [];
        $total_price = 0;
        $arr_is_freebies_trans = [];
        foreach ($list as $idx => $row) {
            // 장바구니 구분과 실제 상품구분 값 비교 (강좌 : on_lecture, 교재 : book)
            if ($cart_type != $row['CartType']) {
                show_alert('필수 파라미터 오류입니다.', site_url('/cart/index/cate/' . $this->_cate_code), false);
            }

            // 상품구분명 / 상품구분명 색상 class 번호 (단강좌 : on_lecture / 1, 패키지: on_package / 2, 교재 : book / 3)
            $row['CartProdTypeName'] = $this->orderFModel->_cart_prod_type_name[$row['CartProdType']];
            $row['CartProdTypeNum'] = array_flip(array_keys($this->orderFModel->_cart_prod_type_name))[$row['CartProdType']] + 1;

            // 강좌시작일 설정
            $row['DefaultStudyStartDate'] = $row['DefaultStudyEndDate'] = $row['IsStudyStartDate'] = '';
            if ($row['IsLecStart'] == 'Y') {
                if (empty($row['StudyStartDate']) === false && date('Y-m-d') < $row['StudyStartDate']) {
                    // 개강일이 오늘 날짜보다 이후 인 경우 (개강하지 않은 상품)
                    $row['DefaultStudyStartDate'] = $row['StudyStartDate'];
                    $row['IsStudyStartDate'] = 'N';
                } else {
                    // 이미 개강한 상품
                    $row['DefaultStudyStartDate'] = date('Y-m-d', strtotime(date('Y-m-d') . ' +8 day'));
                    $row['IsStudyStartDate'] = 'Y';
                }
                $row['DefaultStudyEndDate'] = date('Y-m-d', strtotime($row['DefaultStudyStartDate'] . ' +' . ($row['StudyPeriod'] - 1) . ' day'));
            }

            // 강좌상품일 경우 사은품/무료교재 배송료 부과여부
            if ($row['CartProdType'] == 'on_lecture') {
                $arr_is_freebies_trans[] = $row['IsFreebiesTrans'];
            }
            
            // 배송정보 입력 여부
            if ($is_delivery_info === false && $row['IsDeliveryInfo'] == 'Y') {
                $is_delivery_info = true;
            }

            // 전체 주문금액
            $total_price += $row['RealSalePrice'];

            $results['list'][] = $row;
        }

        // 배송료 계산
        if ($cart_type === 'on_lecture') {
            $results['delivery_price'] = $this->orderFModel->getLectureDeliveryPrice($arr_is_freebies_trans);
        } else {
            $results['delivery_price'] = $this->orderFModel->getBookDeliveryPrice($results['price']);
        }

        $results['cart_type'] = $cart_type;     // 장바구니 구분
        $results['cart_type_name'] = $this->orderFModel->_cart_type_name[$cart_type];   // 장바구니 구분명
        $results['total_price'] = $total_price;     // 전체 주문금액
        $results['is_delivery_info'] = $is_delivery_info;   // 배송정보 입력 여부

        // 회원정보 조회
        $results['member'] = $this->memberFModel->getMember(false, ['EQ' => ['Mem.MemIdx' => $sess_mem_idx]]);

        // 지역번호, 휴대폰번호 공통코드 조회
        $codes = $this->wCodeModel->getCcdInArray(['101', '102']);

        $this->load->view('site/order/index', [
            'arr_tel1_ccd' => $codes['101'],
            'arr_phone1_ccd' => $codes['102'],
            'results' => $results
        ]);
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
        $data = $this->orderFModel->getRecentDeliveryAddress($this->session->userdata('mem_idx'));

        $this->json_result(true, '', [], $data);
    }
}
