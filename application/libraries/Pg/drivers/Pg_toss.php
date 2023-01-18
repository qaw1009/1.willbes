<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 토스 결제
 */
class Pg_toss extends CI_Driver
{
    private $_CI;

    /**
     * @var CI_DB_query_builder
     */
    private $_db;

    /**
     * @var array 토스 config
     */
    protected $_config = [];

    /**
     * @var array 토스 테스트 또는 상용 config
     */
    protected $_mode_config = [];

    /**
     * @var string 토스 드라이버명
     */
    private $_driver_name = 'toss';

    /**
     * @var string 결제요청 테이블
     */
    private $_pay_req_table = 'lms_order_post_data';

    /**
     * @var string API 연동키 테이블
     */
    private $_api_key_table = 'lms_sys_pg_key';

    /**
     * 토스 설정 로드 및 관련 라이브러리 로드
     */
    public function __construct()
    {
        // get ci instance
        $this->_CI =& get_instance();

        // load driver config
        if ($this->_CI->config->load('pg_toss', true, true)) {
            $this->_config = $this->_CI->config->config['pg_toss'];
        } else {
            log_message('error', '[결제모듈] 토스 결제 설정 파일 로드에 실패했습니다.');
            return;
        }

        // set mode config (test / real)
        $this->_mode_config = $this->_config[$this->_config['mode']];

        // curl library load
        $this->_CI->load->library('curl');

        // db connection open
        $this->_db = $this->_CI->load->database('lms', true);

        log_message('info', '[결제모듈] 토스 결제 모듈 로드에 성공했습니다.');
    }

    public function __destruct()
    {
        $this->_db->close();        // db connection close
        $this->_CI->curl->close();  // curl close

        log_message('info', '[결제모듈] 토스 결제 모듈 종료에 성공했습니다.');
    }

    /**
     * 토스 결제요청 form 리턴
     * @param array $params
     * @return bool|string
     */
    public function requestForm($params = [])
    {
        try {
            $this->_parent->saveFileLog('결제요청 시작');

            // 상점 아이디 (테스트 모드일 경우 테스트 상점 아이디 셋팅)
            $mid = $this->_config['mode'] == 'test' ? $this->_mode_config['mid'] : element('mid', $params);
            if (empty($mid) === true) {
                throw new Exception('상점아이디가 없습니다.');
            }

            // 클라이언트 키 (테스트 모드일 경우 테스트 클라이언트 키 셋팅)
            $client_key = $this->_getAPIKey($mid);
            if (empty($client_key) === true) {
                throw new Exception('클라이언트 키가 없습니다. (' . $mid . ')');
            }

            $order_no = element('order_no', $params);
            if (empty($order_no) === true) {
                throw new Exception('주문번호가 없습니다.');
            }

            $pay_method_ccd = element('pay_method_ccd', $params);
            if (empty($pay_method_ccd) === true) {
                throw new Exception('결제수단 코드값이 없습니다.');
            }

            $req_pay_price = element('req_pay_price', $params, 0);
            if (empty($req_pay_price) === true) {
                throw new Exception('결제요청금액이 없습니다.');
            }

            // 변수값 설정
            $return_prefix_url = rtrim($this->_CI->input->server('REQUEST_SCHEME') . ':' . element('return_prefix_url', $params, ''), '/') . '/';
            $is_escrow = element('is_escrow', $params, 'N');

            // 결제수단별 메소드, 파라미터 설정
            $pay_method = $this->_config['pay_method'][$pay_method_ccd];

            $pay_params = [
                'amount' => $req_pay_price,
                'orderId' => $order_no,
                'orderName' => element('repr_prod_name', $params, ''),
                'customerName' => element('order_name', $params, ''),
                'customerEmail' => element('order_mail', $params, ''),
                'customerMobilePhone' => element('order_phone', $params, ''),
                'successUrl' => $return_prefix_url . $this->_mode_config['success_method'] . '?mid=' . $mid,
                'failUrl' => $return_prefix_url . $this->_mode_config['fail_method'] . '?mid=' . $mid,
                'windowTarget' => $this->_mode_config['window_target'],
            ];

            if ($pay_method == '카드') {
                $pay_params['maxCardInstallmentPlan'] = $this->_mode_config['card_max_installment'];    // 할부 개월수
            } elseif ($pay_method == '가상계좌') {
                // 가상계좌 입금기한
                $vbank_expire_days = empty(config_item('vbank_expire_days')) === false ? config_item('vbank_expire_days') : '7';
                $pay_params['dueDate'] = date('Y-m-d\TH:i:sP', strtotime(date('Y-m-d H:i:s') . ' +' . $vbank_expire_days . ' day'));

                // 가상계좌 입금통보 URL
                if (empty($this->_mode_config['deposit_method']) === false) {
                    $pay_params['virtualAccountCallbackUrl'] = $return_prefix_url . $this->_mode_config['deposit_method'];
                }
            }

            if (in_array($pay_method, ['계좌이체', '가상계좌']) === true) {
                $pay_params['useEscrow'] = false;
                $pay_params['cashReceipt']['type'] = '소득공제';

                if ($is_escrow == 'Y') {
                    $pay_params['useEscrow'] = true;
                    // 에스크로 상품
                    $rand_num = substr($pay_params['orderId'], -6);
                    $pay_params['escrowProducts'][0] = [
                        'id' => $rand_num,
                        'name' => $pay_params['orderName'],
                        'code' => $rand_num,
                        'unitPrice' => $pay_params['amount'],
                        'quantity' => '1'
                    ];
                }
            }

            // view 전달 데이터
            $data = [
                'client_key' => $client_key,
                'pay_method' => $pay_method,
                'pay_params' => json_encode($pay_params, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
                'close_url' => $return_prefix_url . $this->_mode_config['close_method']
            ];

            $this->_parent->saveFileLog('결제요청 데이터', $data);
            $this->_parent->saveFileLog('결제요청 완료');

            return $this->_CI->load->view($this->_config['view_path']['request'], ['data' => $data], false, true);
        } catch (Exception $e) {
            $this->_parent->saveFileLog('결제요청 실패 : ' . $e->getMessage(), null, 'error');
            return false;
        }
    }

    /**
     * 토스 결제요청 취소
     * @param array $params
     */
    public function requestCancel($params = [])
    {
        $this->_parent->saveFileLog('결제요청 취소 (주문번호 : ' . $params['order_no'] . ', 주문요청 데이터 삭제 : ' . $params['is_post_data_delete'] . ')');
    }

    /**
     * 토스 결제요청 결과 확인 및 결제승인 요청
     * @param array $params
     * @return array
     */
    public function returnResult($params = [])
    {
        $returns = array_merge($this->_CI->input->get(null, false), $this->_CI->input->post(null, false));  // 리턴 결과
        $log_params = [];   // 결제로그 저장 데이터

        try {
            $this->_parent->saveFileLog('결제요청 결과 리턴', $returns);

            // 결제요청 결과 파라미터 체크
            if (empty($returns['orderId']) === true || empty($returns['mid']) === true) {
                throw new Exception('결제요청 결과 파라미터 오류입니다.');
            }

            // 결제요청실패
            if (empty($returns['code']) === false || empty($returns['message']) === false) {
                // 결제로그 저장 데이터
                $log_params = [
                    'result' => false,
                    'result_msg' => element('message', $returns),
                    'order_no' => $returns['orderId'],
                    'mid' => $returns['mid']
                ];

                throw new Exception('결제요청 실패 (결과메시지 : ' . element('code', $returns) . ' => ' . element('message', $returns) . ')');
            }

            // 결제요청금액 체크
            $chk_amount = $this->_getReqPayPrice($returns['orderId']);
            if ($chk_amount === false) {
                throw new Exception('결제요청금액 조회에 실패했습니다.');
            }

            if ($chk_amount != $returns['amount']) {
                throw new Exception('결제요청금액이 일치하지 않습니다.');
            }

            // 결제승인요청
            $this->_parent->saveFileLog('결제승인요청 시작');

            // 시크릿 키 (테스트 모드일 경우 테스트 시크릿 키 셋팅)
            $secret_key = $this->_getAPIKey($returns['mid'], 'secret_key');
            if (empty($secret_key) === true) {
                throw new Exception('시크릿 키가 없습니다. (' . $returns['mid'] . ')');
            }

            // 결제승인연동
            $auth_params = [
                'paymentKey' => $returns['paymentKey'],
                'amount' => $returns['amount'],
                'orderId' => $returns['orderId']
            ];
            $auth_results = $this->_execAPI('confirm', $auth_params, $secret_key);
            $this->_parent->saveFileLog('결제승인요청 결과 리턴', $auth_results);

            if ($auth_results['ret_cd'] !== true) {
                // 결제로그 저장 데이터
                $log_params = [
                    'result' => false,
                    'result_msg' => $auth_results['ret_msg'],
                    'order_no' => $returns['orderId'],
                    'mid' => $returns['mid'],
                    'tid' => $returns['paymentKey']
                ];

                throw new Exception('결제승인요청 실패 (결과메시지 : ' . $auth_results['ret_cd'] . ' => ' . $auth_results['ret_msg'] . ')');
            }

            $this->_parent->saveFileLog('결제승인 완료');

            // 결제승인 완료 결과 리턴
            $auth_data = $auth_results['ret_data'];

            $succ_data = [
                'result' => true,
                'result_msg' => '',
                'order_no' => $auth_data['orderId'],
                //'mid' => $auth_data['mId'],
                'mid' => $returns['mid'],
                'tid' => $auth_data['paymentKey'],
                'pay_method' => element($auth_data['method'], $this->_config['pay_method_re'], $auth_data['method']),
                'total_pay_price' => $auth_data['totalAmount'],
                'result_add_data' => ['receipt_url' => $auth_data['receipt']['url']]
            ];

            // 승인일시
            if (empty($auth_data['approvedAt']) === false) {
                $succ_data['approval_datm'] = date('Y-m-d H:i:s', strtotime($auth_data['approvedAt']));
            } else {
                $succ_data['approval_datm'] = date('Y-m-d H:i:s', strtotime($auth_data['requestedAt']));
            }

            if ($auth_data['method'] == '카드') {
                $succ_data['pay_detail_code'] = element('company', (array) $auth_data['card']);
                $succ_data['approval_no'] = element('approveNo', (array) $auth_data['card']);       // 승인번호
            } elseif ($auth_data['method'] == '간편결제') {
                $succ_data['pay_detail_code'] = element('provider', (array) $auth_data['easyPay']); // 간편결제수단
            } elseif ($auth_data['method'] == '계좌이체') {
                $succ_data['pay_detail_code'] = $auth_data['transfer']['bank'];
            } elseif ($auth_data['method'] == '가상계좌') {
                $succ_data['pay_detail_code'] = $auth_data['virtualAccount']['bank'];

                // 가상계좌 정보
                $succ_data['vbank_code'] = $auth_data['virtualAccount']['bank'];
                $succ_data['vbank_name'] = $auth_data['virtualAccount']['bank'];
                $succ_data['vbank_account_no'] = $auth_data['virtualAccount']['accountNumber'];
                $succ_data['vbank_deposit_name'] = $auth_data['virtualAccount']['customerName'];
                $succ_data['vbank_expire_datm'] = date('Y-m-d H:i:s', strtotime($auth_data['virtualAccount']['dueDate']));
                $succ_data['result_add_data']['vbank_secret'] = $auth_data['secret'];   // 가상계좌 입금통보 검증키
            }

            // 결제로그 저장 데이터
            $log_params = $succ_data;

            return $succ_data;
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');

            return [
                'result' => false,
                'result_msg' => isset($log_params['result_msg']) === true ? $log_params['result_msg'] : $e->getMessage(),
                'order_no' => $returns['orderId']
            ];
        } finally {
            // 결제로그 저장 데이터가 있을 경우
            if (empty($log_params) === false) {
                $this->_savePayLog('PA', $log_params);
            }
        }
    }

    /**
     * 토스 부분취소
     * @param array $params
     * @param string $is_vbank [가상계좌여부 : Y/N]
     * @return array
     */
    public function repay($params = [], $is_vbank = 'N')
    {
        $params['cancel_type'] = 'RP';  // 부분환불
        return $this->cancel($params, $is_vbank);
    }

    /**
     * 토스 결제취소
     * @param array $params
     * @param string $is_vbank [가상계좌여부 : Y/N]
     * @return array
     */
    public function cancel($params = [], $is_vbank = 'N')
    {
        $order_no = element('order_no', $params);   // 주문번호
        $cancel_type = element('cancel_type', $params, 'CA');   // 결제취소 구분
        $log_params = [];       // 결제취소로그 저장 데이터

        try {
            $this->_parent->saveFileLog('결제취소 요청 시작');
            $this->_parent->saveFileLog('결제취소 요청 데이터', $params);

            $mid = element('mid', $params);
            $tid = element('tid', $params);
            $cancel_reason = element('cancel_reason', $params, '');
            $cancel_price = element('cancel_price', $params);
            $total_remain_pay_price = element('total_remain_pay_price', $params);

            if (empty($cancel_price) === false) {
                $cancel_type = 'RP';    // 부분환불
            }

            if (empty($order_no) === true || empty($mid) === true || empty($tid) === true) {
                throw new Exception('필수 파라미터 오류입니다.');
            }

            if ($cancel_type == 'RP') {
                if (empty($cancel_price) === true || empty($total_remain_pay_price) === true) {
                    throw new Exception('결제취소 금액 또는 남은 금액이 없습니다.');
                }

                if (($total_remain_pay_price - $cancel_price) < 0) {
                    throw new Exception('결제취소 금액이 올바르지 않습니다.');
                }
            }

            // 결제취소 API 파라미터
            $api_params = [
                'paymentKey' => $tid,
                'cancelReason' => $cancel_reason
            ];

            // 결제취소금액
            if (empty($cancel_price) === false) {
                $api_params['cancelAmount'] = $cancel_price;
            }

            // 결제취소가능금액
            if (empty($total_remain_pay_price) === false) {
                $api_params['refundableAmount'] = $total_remain_pay_price;
            }

            if ($is_vbank == 'Y') {
                $refund_bank_code = element('refund_bank_code', $params, '');  // 환불은행코드
                $refund_account_no = str_replace('-', '', element('refund_account_no', $params, ''));  // 환불계좌번호 (숫자만 입력)
                $refund_deposit_name = element('refund_deposit_name', $params, '');  // 환불계좌 예금주명

                if (empty($refund_bank_code) === true || empty($refund_account_no) === true || empty($refund_deposit_name) === true) {
                    throw new Exception('가상계좌 환불계좌 정보가 없습니다.');
                }

                $api_params['refundReceiveAccount'] = [
                    'bank' => $refund_bank_code,
                    'accountNumber' => $refund_account_no,
                    'holderName' => $refund_deposit_name,
                ];
            }

            // 결제취소 연동
            // 시크릿 키 (테스트 모드일 경우 테스트 시크릿 키 셋팅)
            $secret_key = $this->_getAPIKey($mid, 'secret_key');
            if (empty($secret_key) === true) {
                throw new Exception('시크릿 키가 없습니다. (' . $mid . ')');
            }

            $cancel_results = $this->_execAPI('cancel', $api_params, $secret_key);
            $this->_parent->saveFileLog('결제취소 결과 리턴', $cancel_results);

            if ($cancel_results['ret_cd'] !== true) {
                // 결제취소로그 저장 데이터
                $log_params = [
                    'result' => false,
                    'result_msg' => $cancel_results['ret_msg'],
                    'order_no' => $order_no,
                    'mid' => $mid,
                    'tid' => $tid,
                    'req_reason' => $cancel_reason
                ];

                throw new Exception('결제취소 실패 (결과메시지 : ' . $cancel_results['ret_cd'] . ' => ' . $cancel_results['ret_msg'] . ')');
            }

            $this->_parent->saveFileLog('결제취소 완료');

            // 결제취소 완료 결과 리턴
            $cancel_data = $cancel_results['ret_data'];
            $cancels_last_data = end($cancel_data['cancels']);  // 마지막 결제취소 이력

            $succ_data = [
                'result' => true,
                'result_msg' => '',
                'order_no' => $order_no,
                'repay_tid' => $cancel_data['transactionKey']
            ];

            // 결제취소로그 저장 데이터
            $log_params = array_merge($succ_data, [
                'mid' => $mid,
                'tid' => $tid,
                'total_pay_price' => element('cancelAmount', $cancels_last_data),
                'repay_remain_price' => element('refundableAmount', $cancels_last_data),
                'approval_datm' => date('Y-m-d H:i:s', strtotime(element('canceledAt', $cancels_last_data))),
                'req_reason' => $cancel_reason
            ]);

            return $succ_data;
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');

            return [
                'result' => false,
                'result_msg' => isset($log_params['result_msg']) === true ? $log_params['result_msg'] : $e->getMessage(),
                'order_no' => $order_no
            ];
        } finally {
            // 결제취소로그 저장 데이터가 있을 경우
            if (empty($log_params) === false) {
                $this->_savePayLog($cancel_type, $log_params);
            }
        }
    }

    /**
     * 토스 가상계좌 입금통보 수신결과 리턴
     * @param array $params
     * @return array
     */
    public function depositResult($params = [])
    {
        // 전달 결과
        $returns = json_decode($this->_CI->input->raw_input_stream, true);
        $log_type = 'deposit';
        $log_idx = '';

        try {
            $this->_parent->saveFileLog('가상계좌 입금통보 요청 시작', null, 'debug', $log_type);

            $returns['reg_ip'] = $this->_CI->input->ip_address();   // 연동 아이피
            $returns['deposit_datm'] = date('Y-m-d H:i:s'); // 입금일시 (연동일시)

            $this->_parent->saveFileLog('가상계좌 입금통보 요청 데이터', $returns, 'debug', $log_type);

            // 로컬서버가 아닐 경우 체크 ==> TODO : 서버 환경별 실행
            if (ENVIRONMENT != 'local') {
                // PG사 연동 IP 체크
                if (in_array($returns['reg_ip'], $this->_config['allow_vbank_ip']) === false) {
                    throw new Exception('ERR_IP');
                }
            }

            // 전달 결과 체크
            if (empty($returns['orderId']) === true || empty($returns['status']) === true || empty($returns['secret']) === true) {
                throw new Exception('ERR_PARAM');
            }

            // 입금완료 상태가 아닐 경우
            if ($returns['status'] != 'DONE') {
                $this->_parent->saveFileLog('가상계좌 입금통보 처리대상 아님 (' . $returns['status'] . ')', null, 'debug', $log_type);
                $this->depositReturn(true);

                return [
                    'result' => false,
                    'result_msg' => '해당없음',
                    'next_method' => '',
                    'order_no' => $returns['orderId']
                ];
            }

            // 가상계좌 입금통보 로그 저장
            $log_idx = $this->_saveDepositLog($returns);

            // 가상계좌 인증키 체크
            $chk_secret = $this->_getVBankSecret($returns['orderId']);
            if ($chk_secret === false) {
                throw new Exception('가상계좌 인증키 조회에 실패했습니다.');
            }

            if ($chk_secret != $returns['secret']) {
                throw new Exception('가상계좌 인증키가 일치하지 않습니다.');
            }

            return [
                'result' => true,
                'result_msg' => '정상완료',
                'next_method' => 'DepositComplete',         // 다음 실행 메소드
                'order_no' => $returns['orderId'],          // 주문번호
                'seq' => $returns['secret'],                // 전문일련번호 (가상계좌인증키)
                'mid' => '',                                // 상점아이디
                'tid' => '',                                // 거래번호
                'deposit_datm' => $returns['deposit_datm'], // 거래일시
                'log_idx' => $log_idx                       // 로그 테이블 입금식별자
            ];
        } catch (Exception $e) {
            // 오류 결과 리턴
            $this->depositReturn(false, $e->getMessage(), $log_idx);

            return [
                'result' => false,
                'result_msg' => $e->getMessage(),
                'next_method' => '',
                'order_no' => element('orderId', $returns)
            ];
        }
    }

    /**
     * 토스 가상계좌 입금통보 처리결과 리턴
     * @param bool $ret_cd [성공여부]
     * @param string $err_msg [실패메시지]
     * @param string $log_idx [입금식별자]
     * @return bool|int|void
     */
    public function depositReturn($ret_cd, $err_msg = '', $log_idx = '')
    {
        $log_type = 'deposit';

        if ($ret_cd === true) {
            $this->_parent->saveFileLog('가상계좌 입금통보 처리 성공', null, 'debug', $log_type);
        } else {
            $this->_parent->saveFileLog('가상계좌 입금통보 처리 실패 : ' . $err_msg, null, 'error', $log_type);

            // 로그 에러 메시지 업데이트
            if (empty($log_idx) === false) {
                $this->_saveDepositLog(['err_msg' => $err_msg], $log_idx);
            }

            return http_response_code(_HTTP_ERROR);
        }
    }

    /**
     * 에스크로 배송등록
     * @param array $params
     * @return bool
     */
    public function escrowDeliveryRegist($params = [])
    {
        $log_type = 'escrow';

        try {
            $this->_parent->saveFileLog('에스크로 배송등록 시작', null, 'debug', $log_type);

            if (empty($params) === true || is_numeric(key($params)) === false) {
                throw new Exception('배송등록 데이터가 없습니다.');
            }

            // 상점키 조회 (상점아이디별 전체 상점키 조회, 테스트 모드일 경우 테스트 상점키 셋팅)
            $arr_mert_key = $this->_getAPIMertKeys();
            if (empty($arr_mert_key) === true) {
                throw new Exception('상점 키가 없습니다.');
            }

            $this->_parent->saveFileLog('에스크로 배송등록 데이터 저장 시작', null, 'debug', $log_type);

            // 에스크로 배송등록 데이터 저장 
            foreach ($params as $idx => $row) {
                $this->_parent->saveFileLog('에스크로 배송등록 데이터[' . $idx . ']', $row, 'debug', $log_type);

                if (empty(element('mid', $row)) === true) {
                    throw new Exception('상점아이디가 없습니다.[' . $idx . ']');
                }

                if (empty(element('order_no', $row)) === true) {
                    throw new Exception('주문번호가 없습니다.[' . $idx . ']');
                }

                if (empty(element('delivery_comp_ccd', $row)) === true || empty(element('invoice_no', $row)) === true || empty(element('delivery_send_datm', $row)) === true) {
                    throw new Exception('배송정보가 없습니다.[' . $idx . ']');
                }

                // 배송등록 로그 저장
                $escrow_log_idx = $this->_saveEscrowLog($row);
                if ($escrow_log_idx === false || is_numeric($escrow_log_idx) === false) {
                    throw new Exception('배송등록 로그 저장에 실패했습니다.[' . $idx . ']');
                }

                $params[$idx]['log_idx'] = $escrow_log_idx;
            }

            $this->_parent->saveFileLog('에스크로 배송등록 데이터 저장 완료', null, 'debug', $log_type);
            $this->_parent->saveFileLog('에스크로 배송등록 연동 시작', null, 'debug', $log_type);

            // 성공/실패 건수
            $succ_cnt = $fail_cnt = 0;
            
            // 에스크로 배송등록 연동 API 실행
            foreach ($params as $idx => $row) {
                $order_no = element('order_no', $row);
                $mid = element('mid', $row);
                $delivery_comp_ccd = element('delivery_comp_ccd', $row);
                $delivery_comp = element($delivery_comp_ccd, $this->_config['delivery_comp']);  // PG 택배사코드
                $invoice_no = element('invoice_no', $row);
                $delivery_send_datm = element('delivery_send_datm', $row);
                $log_idx = element('log_idx', $row);    // 로그식별자

                if (empty($log_idx) === true) {
                    throw new Exception('로그식별자가 없습니다.[' . $idx . ']');
                }

                // 배송등록 API 실행
                // 상점키 (테스트 모드일 경우 테스트 상점키 사용, 운영 모드일 경우 상점아이디별 상점키 사용)
                $mert_key = element($mid, (array)$arr_mert_key, $arr_mert_key);
                if (empty($mert_key) === true) {
                    throw new Exception('일치하는 상점 키가 없습니다.[' . $idx . ']');
                }

                $delivery_send_datm = date('YmdHi', strtotime($delivery_send_datm));   // 발송일시
                $hashdata = md5($mid . $order_no . $delivery_send_datm . $delivery_comp . $invoice_no . $mert_key);
                $api_params = [
                    'mid' => $mid,
                    'oid' => $order_no,
                    'dlvtype' => '03',
                    'dlvdate' => $delivery_send_datm,
                    'dlvcompcode' => $delivery_comp,
                    'dlvno' => $invoice_no,
                    'productid' => substr($order_no, -6),
                    'hashdata' => $hashdata
                ];

                $this->_parent->saveFileLog('에스크로 배송등록 연동 파라미터[' . $idx . ']', $api_params, 'debug', $log_type);

                $this->_CI->curl->setHeader('Content-Type', 'application/x-www-form-urlencoded');
                $this->_CI->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
                $this->_CI->curl->setOpt(CURLOPT_TIMEOUT, 10);
                $this->_CI->curl->post($this->_mode_config['escrow_delivery_regist_url'], $api_params);
                $response = iconv('EUC-KR', 'UTF-8', trim($this->_CI->curl->rawResponse));  // UTF-8 인코딩 변환

                // 연동결과 오류
                if ($this->_CI->curl->error === true) {
                    $fail_cnt++;
                    $response = 'FAIL : 실패 > ' . $this->_CI->curl->errorMessage;
                    $this->_parent->saveFileLog('에스크로 배송등록 연동 오류[' . $idx . ']', $this->_CI->curl->errorMessage, 'error', $log_type);
                } else {
                    // 연동결과 실패
                    if ($response != 'OK') {
                        $fail_cnt++;
                        $this->_parent->saveFileLog('에스크로 배송등록 연동 실패[' . $idx . ']', $response, 'error', $log_type);
                    } else {
                        $succ_cnt++;
                        $this->_parent->saveFileLog('에스크로 배송등록 연동 성공[' . $idx . ']', $response, 'debug', $log_type);
                    }
                }

                // 배송등록 로그 업데이트
                $this->_saveEscrowLog(['order_no' => $order_no, 'result' => $response], $log_idx);
            }

            $this->_parent->saveFileLog('에스크로 배송등록 연동 완료', ['성공건수' => $succ_cnt, '실패건수' => $fail_cnt], 'debug', $log_type);
            $this->_parent->saveFileLog('에스크로 배송등록 완료', null, 'debug', $log_type);

            return true;
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error', $log_type);
            return false;
        }
    }

    /**
     * 토스 API 실행
     * @param string $api_type [API 구분 (confirm, cancel)]
     * @param array $api_params [API 파라미터]
     * @param string $secret_key [시크릿키]
     * @return array
     */
    private function _execAPI($api_type, $api_params, $secret_key)
    {
        try {
            $credential = base64_encode($secret_key . ':');

            if ($api_type == 'confirm') {
                $url = 'https://api.tosspayments.com/v1/payments/confirm';
            } else {
                $url = 'https://api.tosspayments.com/v1/payments/' . $api_params['paymentKey'] . '/cancel';
            }

            $this->_CI->curl->setHeader('Content-Type', 'application/json');
            $this->_CI->curl->setHeader('Authorization', 'Basic ' . $credential);
            $this->_CI->curl->setOpt(CURLOPT_RETURNTRANSFER, true);
            $this->_CI->curl->setOpt(CURLOPT_ENCODING, '');
            $this->_CI->curl->setOpt(CURLOPT_MAXREDIRS, 10);
            $this->_CI->curl->setOpt(CURLOPT_TIMEOUT, 30);
            $this->_CI->curl->setOpt(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            $this->_CI->curl->post($url, json_encode($api_params, JSON_UNESCAPED_UNICODE));
            $response = json_decode($this->_CI->curl->rawResponse, true);

            // 연동결과 실패
            $is_success = $this->_CI->curl->getInfo(CURLINFO_HTTP_CODE) == 200;
            if ($is_success === false) {
                return [
                    'ret_cd' => $response['code'],
                    'ret_msg' => $response['message']
                ];
            }

            // 연동결과 오류
            if ($this->_CI->curl->error === true) {
                throw new Exception($this->_CI->curl->errorMessage);
            }

            return [
                'ret_cd' => true,
                'ret_data' => $response
            ];
        } catch (Exception $e) {
            return [
                'ret_cd' => $e->getCode(),
                'ret_msg' => $e->getMessage()
            ];
        }
    }

    /**
     * API 키 리턴
     * @param string $mid [상점아이디]
     * @param string $key_name [키명 (client_key|secret_key|mert_key)]
     * @return mixed|string|null
     */
    private function _getAPIKey($mid, $key_name = 'client_key')
    {
        // 테스트 모드일 경우 테스트 키 리턴
        if ($this->_config['mode'] == 'test') {
            return element($key_name, $this->_mode_config);
        }

        if (empty($mid) === true) {
            return '';
        }

        // 운영 모드일 경우 연동키 테이블 조회
        switch ($key_name) {
            case 'secret_key' :
                $col_name = 'SecretKey';
                break;
            case 'mert_key' :
                $col_name = 'MertKey';
                break;
            default :
                $col_name = 'ClientKey';
                break;
        }

        $arr_condition = [
            'PgMid' => $mid,
            'PgDriver' => $this->_driver_name,
            'IsUse' => 'Y',
            'IsStatus' => 'Y'
        ];
        $result = $this->_db->where($arr_condition)->from($this->_api_key_table)->select($col_name)->get()->row_array();
        if (empty($result) === true) {
            return '';
        }

        return element($col_name, $result);
    }

    /**
     * API 상점키 리턴 (에스크로 배송등록용, 테스크 상점키 또는 상점아이디별 상점키 배열 리턴)
     * @return mixed
     */
    private function _getAPIMertKeys()
    {
        // 테스트 모드일 경우 테스트 키 리턴
        if ($this->_config['mode'] == 'test') {
            return element('mert_key', $this->_mode_config);
        }

        // 운영 모드일 경우 연동키 테이블 조회
        $arr_condition = [
            'PgDriver' => $this->_driver_name,
            'IsUse' => 'Y',
            'IsStatus' => 'Y'
        ];
        $result = $this->_db->where($arr_condition)->from($this->_api_key_table)->select('PgMid, MertKey')->get()->result_array();
        if (empty($result) === true) {
            return '';
        }

        return array_column($result, 'MertKey', 'PgMid');
    }

    /**
     * 결제요청금액 리턴
     * @param string $order_no [주문번호]
     * @return int|false
     */
    private function _getReqPayPrice($order_no)
    {
        try {
            if (empty($order_no) === true) {
                throw new Exception('주문번호가 없습니다.');
            }

            // 결제요청 테이블 조회
            $result = $this->_db->where('OrderNo', $order_no)->from($this->_pay_req_table)->select('ReqPayPrice')->get()->row_array();
            if (empty($result) === true) {
                throw new Exception('결제요청금액 조회에 실패했습니다.');
            }

            return $result['ReqPayPrice'];
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 가상계좌 인증키 리턴
     * @param string $order_no [주문번호]
     * @return false|mixed
     */
    private function _getVBankSecret($order_no)
    {
        $_table = $this->_parent->_log_table;

        try {
            if (empty($order_no) === true) {
                throw new Exception('주문번호가 없습니다.');
            }

            // 결제로그 테이블 조회
            $arr_condition = [
                'OrderNo' => $order_no,
                'PayType' => 'PA',
                'PgDriver' => $this->_driver_name,
                'PayMethod' => 'VBank',
                'ResultCode' => '0000'
            ];
            $result = $this->_db->where($arr_condition)->from($_table)->select('json_value(ResultAddData, "$.vbank_secret") as VBankSecret')->get()->row_array();
            if (empty($result) === true) {
                throw new Exception('가상계좌 인증키 조회에 실패했습니다.');
            }

            return $result['VBankSecret'];
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * 결제로그 저장
     * @param string $pay_type [결제구분 (PA, CA, RP)]
     * @param array $params [로그데이터]
     * @return bool
     */
    private function _savePayLog($pay_type, $params)
    {
        $_table = $this->_parent->_log_table;

        try {
            // 결과추가 데이터
            $result_add_data = element('result_add_data', $params);
            if (empty($result_add_data) === false) {
                $result_add_data = json_encode($result_add_data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);    // 유니코드 변환안함, 역슬래시 추가안함
            }

            $data = [
                'OrderNo' => element('order_no', $params),
                'PayType' => $pay_type,
                'PgDriver' => $this->_driver_name,
                'PgMid' => element('mid', $params, ''),
                'PgTid' => element('tid', $params),
                'PayMethod' => element('pay_method', $params),
                'PayDetailCode' => element('pay_detail_code', $params),
                'ReqPayPrice' => element('total_pay_price', $params),
                'ApprovalNo' => element('approval_no', $params),
                'ApprovalDatm' => element('approval_datm', $params),
                'ResultCode' => (element('result', $params) === true ? '0000' : '9999'),
                'ResultMsg' => element('result_msg', $params, ''),
                'ResultPgTid' => element('repay_tid', $params),
                'ResultPayPrice' => element('repay_remain_price', $params),
                'ResultAddData' => $result_add_data,
                'ReqReason' => element('req_reason', $params)
            ];

            if ($this->_db->set($data)->insert($_table) === false) {
                throw new Exception('결제로그 저장에 실패했습니다.');
            }
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');
            return false;
        }

        return true;
    }

    /**
     * 가상계좌 입금통보 로그 저장
     * @param array $params [로그데이터]
     * @param null|int $log_idx [입금식별자]
     * @return bool|int
     */
    private function _saveDepositLog($params, $log_idx = null)
    {
        $_table = $this->_parent->_log_deposit_table;

        try {
            if (empty($log_idx) === true) {
                $data = [
                    'OrderNo' => element('orderId', $params),
                    'MsgSeq' => element('secret', $params),
                    'PgDriver' => $this->_driver_name,
                    'PgMid' => '',
                    'PgTid' => '',
                    'RealPayPrice' => '',
                    'VBankCode' => '',
                    'VBankAccountNo' => '',
                    'DepositBankName' => '',
                    'DepositName' => '',
                    'DepositDatm' => element('deposit_datm', $params),
                    'RegIp' => element('reg_ip', $params)
                ];

                if ($this->_db->set($data)->insert($_table) === false) {
                    throw new Exception('가상계좌 입금통보 로그 저장에 실패했습니다.');
                }

                return $this->_db->insert_id();
            } else {
                if ($this->_db->set('ErrorMsg', element('err_msg', $params))->where('DepositIdx', $log_idx)->update($_table) === false) {
                    throw new Exception('가상계좌 입금통보 에러 메시지 업데이트에 실패했습니다.');
                }
            }
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error', 'deposit');
            return false;
        }

        return true;
    }

    /**
     * 에스크로 로그 저장
     * @param array $params [로그데이터]
     * @param string $log_idx [에스크로식별자]
     * @return bool|int
     */
    private function _saveEscrowLog($params, $log_idx = null)
    {
        $_table = $this->_parent->_log_escrow_table;

        try {
            if (empty($log_idx) === true) {
                $data = [
                    'OrderNo' => element('order_no', $params),
                    'PgDriver' => $this->_driver_name,
                    'PgMid' => element('mid', $params, ''),
                    'EscrowType' => 'DR',
                    'EscrowParam1' => element('delivery_comp_ccd', $params),
                    'EscrowParam2' => element('invoice_no', $params),
                    'EscrowDatm' => date('Y-m-d H:i:s', strtotime(element('delivery_send_datm', $params))),
                    'RegIp' => $this->_CI->input->ip_address()
                ];

                if ($this->_db->set($data)->insert($_table) === false) {
                    throw new Exception('에스크로 로그 저장에 실패했습니다.');
                }

                return $this->_db->insert_id();
            } else {
                $result = trim($params['result']);

                if ($result == 'OK') {
                    $result_code = '0000';
                    $result_msg = null;
                } else {
                    $result_code = '9999';
                    $result_msg = trim(str_replace(['FAIL : 실패 > ', 'FAIL : 실패', 'FAIL : '], ' ', $result));
                }

                $is_update = $this->_db->set('ResultCode', $result_code)->set('ResultMsg', $result_msg)
                    ->where('EscrowIdx', $log_idx)->where('OrderNo', $params['order_no'])
                    ->update($_table);
                if ($is_update === false) {
                    throw new Exception('에스크로 로그 업데이트에 실패했습니다.');
                }
            }
        } catch (Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error', 'escrow');
            return false;
        }

        return true;
    }
}
