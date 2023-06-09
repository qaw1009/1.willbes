<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends \app\controllers\FrontController
{
    protected $models = array('order/cartF', 'order/orderF');
    protected $helpers = array();
    protected $auth_controller = false;
    protected $auth_methods = array('request', 'returns', 'close', 'cancel');

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * load PG Driver
     * @param string $load_type [PG드라이버 로드구분 (auto/pc/mobile)]
     * @param bool $is_cancel [결제취소사용여부]
     * @return string [PG드라이버 object명]
     */
    private function _loadPgDriver($load_type = 'auto', $is_cancel = false)
    {
        $driver = config_app('PgDriver', 'inisis');

        if ($driver == 'inisis') {
            return $this->_loadPgInisisDriver($load_type, $is_cancel);
        } else {
            return $this->_loadPgNormalDriver($driver);
        }
    }

    /**
     * load PG Normal Driver
     * @param string $driver [PG드라이버]
     * @return string [PG드라이버 object명]
     */
    private function _loadPgNormalDriver($driver)
    {
        $this->load->driver('pg', ['driver' => $driver]);
        return 'pg';
    }

    /**
     * load PG Inisis Driver
     * @param string $load_type [PG드라이버 로드구분 (auto/pc/mobile)]
     * @param bool $is_cancel [결제취소사용여부]
     * @return string [PG드라이버 object명]
     */
    private function _loadPgInisisDriver($load_type = 'auto', $is_cancel = false)
    {
        $driver = 'inisis';
        $is_mobile = false;
        $object_name = 'pg';

        if ($load_type == 'auto') {
            if (APP_DEVICE != 'pc') {
                $is_mobile = true;
            }
        } else {
            if ($load_type == 'mobile') {
                $is_mobile = true;
            }
        }

        if ($is_mobile === true) {
            // 모바일 드라이버 로드
            $object_name = 'pg_mobile';
            $this->load->driver('pg', ['driver' => $driver . '_mobile'], $object_name);

            // 모바일 환경일 경우 결제취소는 PC용 드라이버 사용
            if ($is_cancel === true) {
                $this->load->driver('pg', ['driver' => $driver], 'pg');
            }
        } else {
            // PC 드라이버 로드
            $this->load->driver('pg', ['driver' => $driver]);
        }

        return $object_name;
    }

    /**
     * PG사 결제요청 (PC/모바일 공통)
     * @param array $params
     * @return mixed
     */
    public function request($params = [])
    {
        // 전달 폼 데이터
        $arr_input = $this->_reqP(null, false);
        $sess_mem_idx = $this->session->userdata('mem_idx');

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
            ['field' => 'cart_type', 'label' => '장바구니구분', 'rules' => 'trim|required|in_list[on_lecture,off_lecture,book,mock_exam]'],
            ['field' => 'cart_idx[]', 'label' => '장바구니식별자', 'rules' => 'trim|required'],
            //['field' => 'pay_method_ccd', 'label' => '결제수단', 'rules' => 'trim|required|integer'],     // PG결제와 0원결제 혼용
            ['field' => 'agree1', 'label' => '개인정보활용안내 동의여부', 'rules' => 'trim|required|in_list[Y]'],
            ['field' => 'agree2', 'label' => '환불정책안내 동의여부', 'rules' => 'trim|required|in_list[Y]']
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
        if (empty($sess_mem_idx) === true || $sess_cart_idx === false || empty(array_diff((array) $sess_cart_idx, element('cart_idx', $arr_input))) === false) {
            return $this->json_error('잘못된 접근입니다.');
        }

        // 제휴할인 식별자 세션 체크
        $sess_aff_idx = $this->cartFModel->checkSessAffIdx(element('aff_idx', $arr_input));
        if ($sess_aff_idx === false) {
            return $this->json_error('잘못된 접근입니다.[2]');
        }

        // 장바구니 조회
        $cart_rows = $this->cartFModel->listValidCart($sess_mem_idx, $this->_site_code, null, $sess_cart_idx, null, null, 'N', false, element('cart_sub_type', $arr_input));

        // 장바구니 식별자 세션 수와 조회된 장바구니 데이터 수 비교
        if (empty($cart_rows) === true || count($sess_cart_idx) != count($cart_rows)) {
            return $this->json_error('장바구니 데이터 수가 일치하지 않습니다.');
        }

        // 장바구니 데이터 가공 (전체결제금액 리턴)
        $results = $this->orderFModel->getMakeCartReData('pay', element('cart_type', $arr_input), $cart_rows, element('coupon_detail_idx', $arr_input, [])
            , element('use_point', $arr_input, 0), element('zipcode', $arr_input, ''), $sess_aff_idx
        );

        if (is_array($results) === false) {
            return $this->json_error($results);
        }

        // 로컬서버일 경우 결제금액 고정 ==> TODO : 서버 환경별 실행
        if (ENVIRONMENT == 'local') {
            $results['total_pay_price'] = $results['total_pay_price'] > 0 ? 1000 : 0;
        }

        if ($results['total_pay_price'] > 0 && empty(element('pay_method_ccd', $arr_input)) === true) {
            return $this->json_error('결제수단 필드는 필수입니다.');
        }

        // 주문번호 생성
        $order_no = $this->orderFModel->makeOrderNo();

        // 주문요청 데이터 저장
        $is_post_data = $this->orderFModel->addOrderPostData([
            'order_no' => $order_no,
            'cart_type' => $results['cart_type'],
            'cart_idxs' => $sess_cart_idx,
            'site_code' => $this->_site_code,
            'pg_ccd' => $results['total_pay_price'] > 0 ? config_app('PgCcd') : '',
            'pay_method_ccd' => element('pay_method_ccd', $arr_input, ''),
            'repr_prod_name' => $results['repr_prod_name'],
            'order_prod_price' => $results['total_prod_order_price'],
            'req_pay_price' => $results['total_pay_price'],
            'delivery_price' => $results['delivery_price'],
            'delivery_add_price' => $results['delivery_add_price'],
            'coupon_disc_price' => $results['total_coupon_disc_price'],
            'use_point' => $results['use_point'],
            'save_lec_point' => $results['total_save_lec_point'],
            'save_book_point' => $results['total_save_book_point'],
            'user_coupon_idx_json' => json_encode($results['user_coupon_idxs'])
        ], $arr_input);

        if ($is_post_data !== true) {
            return $this->json_error($is_post_data['ret_msg']);
        }

        if ($results['total_pay_price'] > 0) {
            // PG 드라이버 로드
            $pg_object = $this->_loadPgDriver();

            // PG사 결제요청 폼 생성
            $data = [
                'mid' => $results['cart_type'] == 'book' ? config_app('PgBookMid') : config_app('PgMid'),
                'order_no' => $order_no,
                'repr_prod_name' => $results['repr_prod_name'],
                'req_pay_price' => $results['total_pay_price'],
                'order_name' => $this->session->userdata('mem_name'),
                'order_phone' => $this->session->userdata('mem_phone'),
                'order_mail' => $this->session->userdata('mem_mail'),
                'pay_method_ccd' => element('pay_method_ccd', $arr_input),
                'is_escrow' => element('is_escrow', $arr_input),
                'return_prefix_url' => front_url('/payment/'),
                'return_data' => ''
            ];

            $form = $this->{$pg_object}->requestForm($data);
            if ($form === false) {
                return $this->json_error('결제요청 중 오류가 발생하였습니다.');
            } else {
                // 주문번호 세션생성
                $this->orderFModel->makeSessOrderNo($order_no);

                return $this->json_result(true, '', [], $form);
            }
        } else {
            // 온라인 0원결제
            // 주문번호 세션생성
            $this->orderFModel->makeSessOrderNo($order_no);

            // 결제 프로세스 실행
            $result = $this->orderFModel->procOrder([
                'order_no' => $order_no,
                'total_pay_price' => $results['total_pay_price']
            ]);

            if ($result['ret_cd'] === true) {
                // 결제완료 SMS 발송
                $this->orderFModel->sendOrderSms($result['ret_data']);

                // 결제완료 페이지 이동
                return $this->json_result(true, '', [], ['ret_url' => front_url('/order/complete?order_no=' . $result['ret_data'])]);
            } else {
                // 결제오류
                return $this->json_result(true, $result['ret_msg'], [], ['ret_url' => $this->_getErrUrl()]);
            }            
        }
    }

    /**
     * PG사 결제완료 (PC/모바일 공통)
     */
    public function returns()
    {
        // PG 드라이버 로드
        $pg_object = $this->_loadPgDriver('auto', true);

        // 결제연동 결과 리턴
        $pay_results = $this->{$pg_object}->returnResult();
        if ($pay_results['result'] === false) {
            $err_msg = '결제연동 중 오류가 발생하였습니다.\n(' . array_get($pay_results, 'result_msg', '알수 없는 오류') . ')';
            show_alert($err_msg, $this->_getErrUrl(), false);
        }

        // 결제 프로세스 실행
        $result = $this->orderFModel->procOrder($pay_results);

        // 수동 쿼리 로그 저장 (후킹 안됨)
        $this->save_log_queries();

        if ($result['ret_cd'] === true) {
            // 결제완료 SMS 발송
            $this->orderFModel->sendOrderSms($result['ret_data']);

            // 결제완료 페이지 이동
            redirect(front_url('/order/complete?order_no=' . $result['ret_data']));
        } else {
            // 결제취소
            $this->pg->cancel(['order_no' => $pay_results['order_no'], 'mid' => $pay_results['mid'], 'tid' => $pay_results['tid'], 'cancel_reason' => $result['ret_msg']]);
            show_alert($result['ret_msg'], $this->_getErrUrl(), false);
        }
    }

    /**
     * PG사 결제요청 취소 (이니시스 PC 전용, 토스 PC/모바일 공통)
     * @param array $params
     * @return mixed
     */
    public function close($params = [])
    {
        // PG 드라이버 로드
        $pg_object = $this->_loadPgDriver('pc');

        // 주문요청 데이터 삭제
        $order_no = $this->orderFModel->checkSessOrderNo();
        $is_delete = $this->orderFModel->removeOrderPostData($order_no, $this->session->userdata('mem_idx'));
        
        // 주문번호 세션삭제
        $this->orderFModel->destroySessOrderNo();

        return $this->{$pg_object}->requestCancel(['order_no' => $order_no, 'is_post_data_delete' => $is_delete]);
    }

    /**
     * 가상계좌 주문취소 (PG사 연동없음)
     * @param array $params
     * @return CI_Output
     */
    public function cancel($params = [])
    {
        $order_no = $this->_reqP('order_no');

        if (empty($order_no) === true) {
            return $this->json_error('필수 파라미터 오류입니다.', _HTTP_BAD_REQUEST);
        }

        $result = $this->orderFModel->cancelOrder($order_no);

        return $this->json_result($result, '취소되었습니다.', $result);
    }

    /**
     * 가상계좌 입금통보 (토스 전용)
     * @param array $params [드라이버구분 (driver/toss)]
     * @return mixed
     */
    public function deposit($params = [])
    {
        // 드라이버 구분
        $driver = element('driver', $params, 'toss');

        // PG 드라이버 로드
        $pg_object = $this->_loadPgNormalDriver($driver);

        // 가상계좌 입금통보 처리
        return $this->_procDeposit($pg_object);
    }

    /**
     * 가상계좌 입금통보 (이니시스 모바일 전용)
     * @return mixed
     */
    public function notiMobile()
    {
        // PG 드라이버 로드
        $pg_object = $this->_loadPgInisisDriver('mobile');

        // 가상계좌 입금통보 처리
        return $this->_procDeposit($pg_object);
    }

    /**
     * 가상계좌 입금통보 처리
     * @param string $pg_object [PG드라이버 object명]
     * @return mixed
     */
    private function _procDeposit($pg_object)
    {
        // 가상계좌 입금통보 결과 리턴
        $deposit_results = $this->{$pg_object}->depositResult();

        if ($deposit_results['result'] === true) {
            if ($deposit_results['next_method'] == 'DepositComplete') {
                // 가상계좌 결제완료 프로세스 진행
                $result = $this->orderFModel->procDepositComplete($deposit_results);

                if ($result['ret_cd'] === true) {
                    return $this->{$pg_object}->depositReturn(true);
                } else {
                    return $this->{$pg_object}->depositReturn(false, $result['ret_msg'], $deposit_results['log_idx']);
                }
            }
        }

        return null;
    }

    /**
     * 이니시스 모바일 결제연동 미사용 메소드 (프로세스 확인용)
     * @param array $params
     */
    public function nothingMobile($params = [])
    {
        $result = array_merge($this->input->get(null, false), $this->input->post(null, false));

        // 로그 저장
        logger('모바일 > Payment > 이니시스 모바일 > nothingMobile', $result, 'error');

        // 결제오류 페이지 이동
        show_alert('모바일 결제연동 중 허용되지 않는 경로로 접근하였습니다.', $this->_getErrUrl(), false);
    }

    /**
     * 결제 프로세스 오류 URL 리턴
     * @return string
     */
    private function _getErrUrl()
    {
        return front_url('/cart/index');
    }
}
