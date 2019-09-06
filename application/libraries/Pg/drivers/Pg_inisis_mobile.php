<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/pg/inisis/libs/HttpClient.php';

/**
 * 이니시스 모바일 결제
 */
class Pg_inisis_mobile extends CI_Driver
{
    private $_CI;

    /**
     * @var array 이니시스 모바일 config
     */
    protected $_config = [];

    /**
     * @var array 이니시스 모바일 테스트 또는 상용 config
     */
    protected $_mode_config = [];

    /**
     * @var HttpClient
     */
    protected $_http_util;

    /**
     * 이니시스 모바일 설정 로드 및 관련 라이브러리 로드
     */
    public function __construct()
    {
        // get ci instance
        $this->_CI =& get_instance();

        // load driver config
        if ($this->_CI->config->load('pg_inisis_mobile', true, true)) {
            $this->_config = $this->_CI->config->config['pg_inisis_mobile'];
        } else {
            log_message('error', '[결제모듈] 이니시스 모바일 결제 설정 파일 로드에 실패했습니다.');
            return;
        }

        // set mode config (test / real)
        $this->_mode_config = $this->_config[$this->_config['mode']];

        if (class_exists('HttpClient', false) === true) {
            $this->_http_util = new HttpClient();
        } else {
            log_message('error', '[결제모듈] 이니시스 모바일 HTTP Client 라이브러리 유틸 로드에 실패했습니다.');
            return;
        }

        log_message('info', '[결제모듈] 이니시스 모바일 결제 모듈 로드에 성공했습니다.');
    }

    /**
     * 이니시스 모바일 결제요청 form 리턴
     * @param array $params
     * @return bool|string
     */
    public function requestForm($params = [])
    {
        try {
            $this->_parent->saveFileLog('결제 요청 시작');

            // 상점 아이디 (테스트 모드일 경우 자동 테스트 상점 아이디 셋팅)
            $mid = $this->_config['mode'] == 'test' ? $this->_mode_config['mid'] : element('mid', $params);
            if (empty($mid) === true) {
                throw new \Exception('상점아이디가 없습니다.');
            }

            $order_no = element('order_no', $params);
            if (empty($order_no) === true) {
                throw new \Exception('주문번호가 없습니다.');
            }

            $pay_method_ccd = element('pay_method_ccd', $params);
            if (empty($pay_method_ccd) === true) {
                throw new \Exception('결제수단 코드값이 없습니다.');
            }

            $req_pay_price = element('req_pay_price', $params, 0);
            $return_prefix_url = $this->_CI->input->server('REQUEST_SCHEME') . ':' . element('return_prefix_url', $params, '');

            // 가상계좌 입금기한
            $vbank_datm = date('YmdHi', strtotime(date('Y-m-d H:i:s') . ' +' . config_get('vbank_expire_days', '7') . ' day'));

            // 기타 옵션
            $option = $this->_mode_config['option'];
            if (element('is_escrow', $params, 'N') == 'Y') {
                $option .= '&useescrow=Y';
            }

            // 상점 데이터
            $return_data = 'order_no=' . $order_no . '&' . 'mid=' . $mid;
            if (empty(element('return_data', $params)) === false) {
                $return_data .= '&' . http_build_query(element('return_data', $params));
            }

            // view 전달 데이터
            $data = [
                'type' => $this->_mode_config['type'],
                'mid' => $mid,
                'oid' => $order_no,
                'goodname' => element('repr_prod_name', $params, ''),
                'price' => $req_pay_price,
                'buyername' => element('order_name', $params, ''),
                'buyertel' => element('order_phone', $params, ''),
                'buyeremail' => element('order_mail', $params, ''),
                'next_url' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['next_method'],
                'noti_url' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['noti_method'],
                'return_url' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['return_method'],
                'cancel_url' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['cancel_method'],
                'quotabase' => $this->_mode_config['card_quotabase'],
                'vbank_dt' => substr($vbank_datm, 0, 8),
                'vbank_tm' => substr($vbank_datm, 8),
                'charset' => $this->_mode_config['charset'],
                'option' => $option,
                'return_data' => base64_encode($return_data),
                'return_data_dec' => $return_data,
                'request_url' => $this->_mode_config['request_url'] . $this->_config['pay_method'][$pay_method_ccd] . '/'
            ];

            $this->_parent->saveFileLog('결제 요청 데이터', $data);
            $this->_parent->saveFileLog('결제 요청 완료');

            return $this->_CI->load->view($this->_config['view_path']['request'], ['data' => $data], false, true);
        } catch (\Exception $e) {
            $this->_parent->saveFileLog('결제 요청 실패 : ' . $e->getMessage(), null, 'error');
            return false;
        }
    }

    /**
     * 이니시스 모바일 결제 결과 검증 및 리턴
     * @param array $params
     * @return array
     */
    public function returnResult($params = [])
    {
        // 리턴 결과
        $returns = array_merge($this->_CI->input->get(null, false), $this->_CI->input->post(null, false));

        // 리턴 메시지
        $return_msg = '';

        // 상점 데이터
        $return_data = [];
        if (empty($returns['P_NOTI']) === false) {
            $returns['P_NOTI_DEC'] = base64_decode($returns['P_NOTI']);
            parse_str($returns['P_NOTI_DEC'], $return_data);
        }

        try {
            $this->_parent->saveFileLog('결제 인증결과 리턴', $returns);

            if ($returns['P_STATUS'] == '00') {
                // 인증성공
                if (empty($return_data['order_no']) === true || empty($return_data['mid']) === true || empty($returns['P_TID']) === true || empty($returns['P_REQ_URL']) === true) {
                    $return_msg = '결제 인증결과 파라미터 오류입니다.';
                    throw new \Exception('결제 인증결과 파라미터 오류');
                }

                // 승인요청 파라미터
                $auth_params = [
                    'P_TID' => $returns['P_TID'],
                    'P_MID' => $return_data['mid']
                ];

                // 승인요청
                if ($this->_http_util->processHTTP($returns['P_REQ_URL'], $auth_params)) {
                    $auth_result = $this->_http_util->body;
                } else {
                    $return_msg = '결제 승인요청에 실패했습니다.';
                    throw new \Exception('결제 승인요청 실패 (결과메시지 : ' . $this->_http_util->errormsg . ')');
                }

                // 승인요청 결과
                $auth_results = [];
                parse_str($auth_result, $auth_results);

                // 승인일시
                if (empty(element('P_AUTH_DT', $auth_results)) === false) {
                    $auth_results['AuthDatm'] = date('Y-m-d H:i:s', strtotime(element('P_AUTH_DT', $auth_results)));
                } else {
                    $auth_results['AuthDatm'] = date('Y-m-d H:i:s');
                }

                // 결제방법별 상세코드 (신용카드, 은행)
                $auth_results['PayDetailCode'] = null;
                if (empty(element('P_CARD_ISSUER_CODE', $auth_results)) === false) {
                    $auth_results['PayDetailCode'] = element('P_CARD_ISSUER_CODE', $auth_results);
                } else if (empty(element('P_FN_CD1', $auth_results)) === false) {
                    $auth_results['PayDetailCode'] = element('P_FN_CD1', $auth_results);
                } else if (empty(element('P_VACT_BANK_CODE', $auth_results)) === false) {
                    $auth_results['PayDetailCode'] = element('P_VACT_BANK_CODE', $auth_results);
                }

                // 상점 데이터 디코딩
                $auth_results['P_NOTI_DEC'] = base64_decode($auth_results['P_NOTI']);

                // 승인요청 결과로그 저장
                $this->_parent->saveFileLog('결제 승인결과 리턴', $auth_results);
                $this->_saveLog($auth_results);

                if ($auth_results['P_STATUS'] == '00') {
                    // 승인결과 리턴
                    $this->_parent->saveFileLog('결제 승인완료');

                    $add_results = [];  // 결제방법별 추가 리턴 결과 배열

                    // 가상계좌 결제일 경우 추가 정보 리턴
                    if ($auth_results['P_TYPE'] == 'VBANK') {
                        if (empty(element('P_VACT_DATE', $auth_results)) === false && empty(element('P_VACT_TIME', $auth_results)) === false) {
                            $vbank_expire_datm = date('Y-m-d H:i:s', strtotime(element('P_VACT_DATE', $auth_results) . ' ' . element('P_VACT_TIME', $auth_results)));
                        } else {
                            $vbank_expire_datm = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +' . config_get('vbank_expire_days', '7') . ' day'));
                        }

                        $add_results = [
                            'vbank_code' => element('P_VACT_BANK_CODE', $auth_results, ''),
                            'vbank_name' => '',
                            'vbank_account_no' => element('P_VACT_NUM', $auth_results, ''),
                            'vbank_deposit_name' => element('P_UNAME', $auth_results, ''),      // 주문자명 (송금자명 없음)
                            'vbank_expire_datm' => $vbank_expire_datm
                        ];
                    }

                    return array_merge([
                        'result' => true,
                        'result_msg' => $auth_results['P_RMESG1'],
                        'order_no' => $auth_results['P_OID'],
                        'mid' => $auth_results['P_MID'],
                        'tid' => $auth_results['P_TID'],
                        'total_pay_price' => $auth_results['P_AMT'],
                        'pay_detail_code' => $auth_results['PayDetailCode'],
                        'approval_datm' => $auth_results['AuthDatm'],
                        'return_data' => $return_data
                    ], $add_results);
                } else {
                    $return_msg = $auth_results['P_RMESG1'];
                    throw new \Exception('결제 승인요청 실패 (결과코드 : ' . $auth_results['P_STATUS'] . ', 결과메시지 : ' . $auth_results['P_RMESG1'] . ', 주문번호 : ' . $auth_results['P_OID'] . ', TID : ' . $auth_results['P_TID'] . ')');
                }
            } else {
                $return_msg = $returns['P_RMESG1'];
                throw new \Exception('결제 인증요청 실패 (결과코드 : ' . $returns['P_STATUS'] . ', 결과메시지 : ' . $returns['P_RMESG1'] . ', 주문번호 : ' . $return_data['order_no'] . ')');
            }
        } catch (\Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');

            return [
                'result' => false,
                'result_msg' => $return_msg,
                'order_no' => element('order_no', $return_data),
                'return_data' => $return_data
            ];
        }
    }

    /**
     * 이니시스 모바일 승인결과 통보 검증 및 리턴
     * @param array $params
     * @return array
     */
    public function depositResult($params = [])
    {
        // 전달 결과
        $returns = array_merge($this->_CI->input->get(null, false), $this->_CI->input->post(null, false));
        $log_type = 'deposit';
        $log_idx = '';

        try {
            $returns['reg_ip'] = $this->_CI->input->ip_address();   // 연동 아이피

            // 승인일시 (입금일시)
            if (empty(element('P_AUTH_DT', $returns)) === false) {
                $returns['dtm_trans'] = date('Y-m-d H:i:s', strtotime(element('P_AUTH_DT', $returns)));
            } else {
                $returns['dtm_trans'] = date('Y-m-d H:i:s');
            }

            // 전달 결과 파일로그 저장
            $this->_parent->saveFileLog('결제 승인결과 통보 데이터', $returns, 'debug', $log_type);

            // 가상계좌 입금통보가 아니라면 처리사항 없음
            if (($returns['P_TYPE'] == 'VBANK' && $returns['P_STATUS'] != '02') || $returns['P_TYPE'] != 'VBANK') {
                $this->_parent->saveFileLog('결제 승인결과 통보 처리 해당없음', null, 'debug', $log_type);
                $this->depositReturn(true);

                return [
                    'result' => true,
                    'result_msg' => '해당없음',
                    'next_method' => '',
                    'order_no' => $returns['P_OID']
                ];
            }

            // 전문번호, 가상계좌번호, 입금은행명, 입금자명 설정
            $returns['no_msgseq'] = 'M' . date('YmdHis') . str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
            $returns['no_vacct'] = '';
            $returns['nm_inputbank'] = '';
            $returns['nm_input'] = '';

            // 전달 결과 저장
            $log_idx = $this->_saveLog($returns, $log_type);

            // 로컬서버가 아닐 경우 체크 ==> TODO : 서버 환경별 실행
            if (ENVIRONMENT != 'local') {
                // PG사 연동 IP 체크
                if (in_array($returns['reg_ip'], $this->_config['allow_vbank_ip']) === false) {
                    throw new \Exception('ERR_IP');
                }
            }

            // 전달 결과 체크
            if (empty($returns['P_OID']) === true || empty($returns['P_MID']) === true || empty($returns['P_TID']) === true
                || empty($returns['P_AMT']) === true) {
                throw new \Exception('ERR_PARAM');
            }

            return [
                'result' => true,
                'result_msg' => '정상완료',
                'next_method' => 'DepositComplete', // 다음 실행 메소드
                'order_no' => $returns['P_OID'],    // 주문번호
                'seq' => $returns['no_msgseq'],     // 전문 일련번호
                'mid' => $returns['P_MID'],   // 상점아이디
                'tid' => $returns['P_TID'],            // 거래번호
                'total_pay_price' => $returns['P_AMT'],     // 입금금액
                'vbank_code' => $returns['P_FN_CD1'],            // 가상계좌은행코드
                'vbank_account_no' => $returns['no_vacct'],     // 가상계좌번호
                'deposit_bank_name' => $returns['nm_inputbank'],       // 입금은행명
                'deposit_name' => $returns['nm_input'],   // 입금자명
                'deposit_datm' => $returns['dtm_trans'],   // 거래일시
                'log_idx' => $log_idx       // 로그 테이블 입금식별자
            ];
        } catch (\Exception $e) {
            // 오류 결과 리턴
            $this->depositReturn(false, $e->getMessage(), $log_idx);

            return [
                'result' => false,
                'result_msg' => $e->getMessage(),
                'next_method' => '',
                'order_no' => $returns['P_OID']
            ];
        }
    }

    /**
     * 이니시스 모바일 승인결과 통보 처리 결과 리턴
     * @param bool $ret_cd
     * @param string $err_msg
     * @param string $log_idx
     */
    public function depositReturn($ret_cd, $err_msg = '', $log_idx = '')
    {
        $log_type = 'deposit';

        if ($ret_cd === true) {
            $this->_parent->saveFileLog('결제 승인결과 통보 처리 성공', null, 'debug', $log_type);
            $ret_msg = 'OK';
        } else {
            $this->_parent->saveFileLog('결제 승인결과 통보 처리 오류 발생 : ' . $err_msg, null, 'error', $log_type);

            // 로그 에러 메시지 업데이트
            $this->_saveLog(['err_msg' => $err_msg], $log_type, $log_idx);

            $ret_msg = strpos($err_msg, 'ERR_') === false ? 'ERR_DB' : $err_msg;
        }

        echo $ret_msg;
    }

    /**
     * 로그 저장
     * @param array $params
     * @param string $log_type
     * @param null|int $log_idx [가상계좌입금통보 : 입금식별자]
     * @return bool
     */
    private function _saveLog($params = [], $log_type = 'pay', $log_idx = null)
    {
        $_db = $this->_CI->load->database('lms', true);   // load database

        try {
            if ($log_type == 'pay') {
                $_table = $this->_parent->_log_table;

                $data = [
                    'OrderNo' => element('P_OID', $params),
                    'PayType' => 'MP',
                    'PgDriver' => 'inisis',
                    'PgMid' => element('P_MID', $params),
                    'PgTid' => element('P_TID', $params),
                    'PayMethod' => element('P_TYPE', $params),
                    'PayDetailCode' => element('PayDetailCode', $params),
                    'ReqPayPrice' => element('P_AMT', $params),
                    'ApprovalNo' => element('P_AUTH_NO', $params),
                    'ApprovalDatm' => element('AuthDatm', $params),
                    'ResultCode' => element('P_STATUS', $params, ''),
                    'ResultMsg' => element('P_RMESG1', $params, '')
                ];

                if ($_db->set($data)->insert($_table) === false) {
                    throw new \Exception('결제 로그 저장에 실패했습니다.');
                }
            } elseif ($log_type == 'deposit') {
                $_table = $this->_parent->_log_deposit_table;

                if (empty($log_idx) === true) {
                    $data = [
                        'OrderNo' => element('P_OID', $params),
                        'MsgSeq' => element('no_msgseq', $params),
                        'PgDriver' => 'inisis',
                        'PgMid' => element('P_MID', $params),
                        'PgTid' => element('P_TID', $params),
                        'RealPayPrice' => element('P_AMT', $params),
                        'VBankCode' => element('P_FN_CD1', $params),
                        'VBankAccountNo' => element('no_vacct', $params),
                        'DepositBankName' => element('nm_inputbank', $params),
                        'DepositName' => element('nm_input', $params),
                        'DepositDatm' => element('dtm_trans', $params),
                        'RegIp' => element('reg_ip', $params)
                    ];

                    if ($_db->set($data)->insert($_table) === false) {
                        throw new \Exception('가상계좌 입금통보 결과 로그 저장에 실패했습니다.');
                    }

                    // 예외적으로 입금식별자 리턴
                    return $_db->insert_id();
                } else {
                    if ($_db->set('ErrorMsg', element('err_msg', $params))->where('DepositIdx', $log_idx)->update($_table) === false) {
                        throw new \Exception('가상계좌 입금통보 에러 메시지 업데이트에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');
            return false;
        } finally {
            $_db->close();
        }

        return true;
    }
}
