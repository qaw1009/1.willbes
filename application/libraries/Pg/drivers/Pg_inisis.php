<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/pg/inisis/libs/INIStdPayUtil.php';
require_once APPPATH . 'third_party/pg/inisis/libs/HttpClient.php';

/**
 * 이니시스 결제
 */
class Pg_inisis extends CI_Driver
{
    private $_CI;

    /**
     * @var array 이니시스 config
     */
    protected $_config = [];

    /**
     * @var array 이니시스 테스트 또는 상용 config
     */
    protected $_mode_config = [];

    /**
     * @var INIStdPayUtil
     */
    protected $_util;

    /**
     * @var HttpClient
     */
    protected $_http_util;

    /**
     * @var string 망취소 API URL
     */
    protected $_net_cancel_url = '';
    
    /**
     * @var array 승인요청 파라미터
     */
    protected $_auth_params = [];

    /**
     * 이니시스 설정 로드 및 관련 라이브러리 로드
     */
    public function __construct()
    {
        // get ci instance
        $this->_CI =& get_instance();

        // load driver config
        if ($this->_CI->config->load('pg_inisis', true, true)) {
            $this->_config = $this->_CI->config->config['pg_inisis'];
        } else {
            log_message('error', '[결제모듈] 이니시스 결제 설정 파일 로드에 실패했습니다.');
            return;
        }

        // set mode config (test / real)
        $this->_mode_config = $this->_config[$this->_config['mode']];

        if (class_exists('INIStdPayUtil', false) === true) {
            $this->_util = new INIStdPayUtil();
        } else {
            log_message('error', '[결제모듈] 이니시스 결제 라이브러리 유틸 로드에 실패했습니다.');
            return;
        }

        if (class_exists('HttpClient', false) === true) {
            $this->_http_util = new HttpClient();
        } else {
            log_message('error', '[결제모듈] 이니시스 HTTP Client 라이브러리 유틸 로드에 실패했습니다.');
            return;
        }

        log_message('info', '[결제모듈] 이니시스 결제 모듈 로드에 성공했습니다.');
    }

    /**
     * 이니시스 결제요청 form 리턴
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

            $req_pay_price = element('req_pay_price', $params, 0);
            $return_prefix_url = $this->_CI->input->server('REQUEST_SCHEME') . ':' . element('return_prefix_url', $params, '');
            $timestamp = $this->_util->getTimestamp();
            $mkey = hash('sha256', $this->_mode_config['signkey']);
            $signature = $this->_util->makeSignature([
                'oid' => $order_no, 'price' => $req_pay_price, 'timestamp' => $timestamp
            ]);

            // 기타 옵션
            $accept_method = 'va_receipt:vbank(' . date('YmdHi', strtotime(date('Y-m-d H:i:s') . ' +' . config_get('vbank_expire_days', '7') . ' day')) . ')';
            if (element('is_escrow', $params, 'N') == 'Y') {
                $accept_method .= ':useescrow';
            }

            // 상점 데이터
            $return_data = empty(element('return_data', $params)) === false ? http_build_query(element('return_data', $params)) : '';

            // view 전달 데이터
            $data = [
                'version' => $this->_mode_config['version'],
                'mid' => $mid,
                'oid' => $order_no,
                'goodname' => element('repr_prod_name', $params, ''),
                'price' => $req_pay_price,
                'currency' => $this->_mode_config['currency'],
                'buyername' => element('order_name', $params, ''),
                'buyertel' => element('order_phone', $params, ''),
                'buyeremail' => element('order_mail', $params, ''),
                'gopaymethod' => $this->_config['pay_method'][element('pay_method_ccd', $params, '')],
                'timestamp' => $timestamp,
                'signature' => $signature,
                'mKey' => $mkey,
                'charset' => $this->_mode_config['charset'],
                'languageView' => $this->_mode_config['language'],
                'payViewType' => $this->_mode_config['view_type'],
                'closeUrl' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['close_method'],
                'popupUrl' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['popup_method'],
                'returnUrl' => trim($return_prefix_url, '/') . '/' . $this->_mode_config['return_method'],
                'nointerest' => $this->_mode_config['card_nointerest'],
                'quotabase' => $this->_mode_config['card_quotabase'],
                'acceptmethod' => $accept_method,
                'merchantData' => $return_data,
                'script_src' => $this->_mode_config['script_src']
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
     * 이니시스 결제 요청 취소
     * @param array $params
     * @return object|string
     */
    public function requestCancel($params = [])
    {
        $this->_parent->saveFileLog('결제 요청 취소 (주문번호 : ' . $params['order_no'] . ', 주문요청 데이터 삭제 : ' . $params['is_post_data_delete'] . ')');
        return $this->_CI->load->view('pg/inisis/close', [], false);
    }

    /**
     * 이니시스 결제 결과 검증 및 리턴
     * @param array $params
     * @return array
     */
    public function returnResult($params = [])
    {
        // 리턴 결과
        $returns = array_merge($this->_CI->input->get(null, false), $this->_CI->input->post(null, false));

        // 상점 데이터
        $return_data = [];
        empty($returns['merchantData']) === false && parse_str($returns['merchantData'], $return_data);

        try {
            // 불필요한 로그 내용 삭제 (authToken)
            $this->_parent->saveFileLog('결제 인증결과 리턴', array_replace($returns, ['authToken' => '__deleted']));

            if (strcmp('0000', $returns['resultCode']) == 0) {
                // 인증성공
                $timestamp = $this->_util->getTimestamp();
                $signature = $this->_util->makeSignature([
                    'authToken' => $returns['authToken'], 'timestamp' => $timestamp
                ]);

                // 승인요청 파라미터
                $auth_params = [
                    'mid' => $returns['mid'],
                    'authToken' => $returns['authToken'],
                    'signature' => $signature,
                    'timestamp' => $timestamp,
                    'charset' => $this->_mode_config['charset'],
                    'format' => $this->_mode_config['format'],
                ];

                // 망취소 관련 데이터 저장
                $this->_net_cancel_url = $returns['netCancelUrl'];
                $this->_auth_params = $auth_params;

                try {
                    // 승인요청
                    if ($this->_http_util->processHTTP($returns['authUrl'], $auth_params)) {
                        $auth_result = $this->_http_util->body;
                    } else {
                        throw new AuthException('결제 승인요청 실패 (결과메시지 : ' . $this->_http_util->errormsg . ')');
                    }

                    // 승인요청 결과
                    $auth_results = json_decode($auth_result, true);

                    // 승인일시
                    if (empty(element('applDate', $auth_results)) === false && empty(element('applTime', $auth_results)) === false) {
                        $auth_results['applDatm'] = date('Y-m-d H:i:s', strtotime(element('applDate', $auth_results) . ' ' . element('applTime', $auth_results)));
                    } else {
                        $auth_results['applDatm'] = date('Y-m-d H:i:s');
                    }

                    $this->_parent->saveFileLog('결제 승인결과 리턴', $auth_results);

                    // 승인요청 결과로그 저장
                    $this->_saveLog($auth_results);

                    // 승인결과 위변조 체크 파라미터
                    $auth_signature = $this->_util->makeSignatureAuth([
                        'mid' => $auth_results['mid'],
                        'tstamp' => $timestamp,
                        'MOID' => $auth_results['MOID'],
                        'TotPrice' => $auth_results['TotPrice']
                    ]);

                    // 승인결과 검증
                    if ((strcmp('0000', $auth_results['resultCode']) == 0) && (strcmp($auth_signature, $auth_results['authSignature']) == 0)) {
                        // 승인결과 리턴
                        $this->_parent->saveFileLog('결제 승인완료');

/*                        // 망취소 테스트
                        throw new AuthException('망취소 테스트');*/

/*                        // 승인취소 테스트
                        return $this->cancel([
                            'order_no' => $auth_results['MOID'],
                            'mid' => $auth_results['mid'],
                            'tid' => $auth_results['tid'],
                            'cancel_reason' => '취소 테스트'
                        ]);*/

                        $add_results = [];  // 결제방법별 추가 리턴 결과 배열

                        // 가상계좌 결제일 경우 추가 정보 리턴
                        if (element('payMethod', $auth_results) == 'VBank') {
                            if (empty(element('VACT_Date', $auth_results)) === false && empty(element('VACT_Time', $auth_results)) === false) {
                                $vbank_expire_datm = date('Y-m-d H:i:s', strtotime(element('VACT_Date', $auth_results) . ' ' . element('VACT_Time', $auth_results)));
                            } else {
                                $vbank_expire_datm = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' +' . config_get('vbank_expire_days', '7') . ' day'));
                            }

                            $add_results = [
                                'vbank_code' => element('VACT_BankCode', $auth_results, ''),
                                'vbank_name' => element('vactBankName', $auth_results, ''),
                                'vbank_account_no' => element('VACT_Num', $auth_results, ''),
                                'vbank_deposit_name' => element('VACT_InputName', $auth_results, ''),
                                'vbank_expire_datm' => $vbank_expire_datm
                            ];
                        }

                        return array_merge([
                            'result' => true,
                            'order_no' => $auth_results['MOID'],
                            'mid' => $auth_results['mid'],
                            'tid' => $auth_results['tid'],
                            'total_pay_price' => $auth_results['TotPrice'],
                            'approval_datm' => $auth_results['applDatm'],
                            'return_data' => $return_data
                        ], $add_results);
                    } else {
                        if (strcmp($auth_signature, $auth_results['authSignature']) != 0) {
                            throw new AuthException('결제 승인요청 위변조 체크 오류 발생');
                        } else {
                            throw new AuthException('결제 승인요청 실패 (결과코드 : ' . $auth_results['resultCode'] . ', 결과메시지 : ' . $auth_results['resultMsg'] . ', 주문번호 : ' . $auth_results['MOID'] . ', TID : ' . $auth_results['tid'] . ')');
                        }
                    }
                } catch (AuthException $e) {
                    // 망취소 API
                    $this->cancel([
                        'order_no' => $returns['orderNumber'],
                        'net_cancel_url' => $returns['netCancelUrl'],
                        'auth_params' => $auth_params,
                        'cancel_reason' => $e->getMessage()
                    ]);

                    throw new \Exception($e->getMessage());
                }
            } else {
                throw new \Exception('결제 인증요청 실패 (결과코드 : ' . $returns['resultCode'] . ', 결과메시지 : ' . $returns['resultMsg'] . ', 주문번호 : ' . $returns['orderNumber'] . ')');
            }
        } catch (\Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');

            return [
                'result' => false,
                'order_no' => $returns['orderNumber'],
                'return_data' => $return_data
            ];
        }
    }

    /**
     * 이니시스 결제 취소
     * @param array $params
     * @return bool
     */
    public function cancel($params = [])
    {
        $log_params = [];
        $_order_no = element('order_no', $params);

        try {
            if (empty($_order_no) === true) {
                throw new \Exception('결제취소에 필요한 주문번호가 없습니다.');
            }

            $_tid = element('tid', $params);
            $_cancel_reason = element('cancel_reason', $params, '');

            if (empty($_tid) === false) {
                // 관리자 취소
                $_mid = element('mid', $params);
                if (empty($_mid) === true) {
                    throw new \Exception('관리자 결제취소에 필요한 상점아이디가 없습니다.');
                }
                
                // 이니시스 라이브러리 로드
                require_once APPPATH . 'third_party/pg/inisis/libs/INILib.php';
                if (class_exists('INIpay50', false) === true) {
                    $inipay = new INIpay50();
                } else {
                    throw new \Exception('결제취소 라이브러리 유틸 로드 실패');
                }

                $inipay->SetField('inipayhome', APPPATH . 'third_party/pg/inisis');
                $inipay->SetField('type', 'cancel');
                $inipay->SetField('log', 'false');
                $inipay->SetField('debug', false);
                $inipay->SetField('mid', $_mid);
                $inipay->SetField('admin', $this->_mode_config['adminkey']);
                $inipay->SetField('tid', $_tid);
                $inipay->SetField('cancelmsg', $_cancel_reason);

                $inipay->startAction();

                $cancel_result_code = $inipay->getResult('ResultCode');
                $cancel_result_msg = iconv('EUC-KR', 'UTF-8', $inipay->getResult('ResultMsg'));
                
                // 승인취소 결과로그 전달 파라미터 설정
                $log_params = [
                    'cancel_result_code' => $cancel_result_code,
                    'cancel_result_msg' => $cancel_result_msg,
                    'cancel_reason' => $_cancel_reason
                ];

                // 로그 메시지
                $cancel_log_msg = '(결과코드 : ' . $cancel_result_code . ', 결과메시지 : ' . $cancel_result_msg;
                $cancel_log_msg .= ', 주문번호 : ' . $_order_no . ', TID : ' . $_tid . ', 취소날짜 : ' . $inipay->getResult('CancelDate') . ', 취소시간 : ' . $inipay->getResult('CancelTime') . ')';

                if (strcmp('00', $inipay->getResult('ResultCode')) == 0) {
                    // 취소성공
                    $this->_parent->saveFileLog('결제 승인취소 성공 ' . $cancel_log_msg);
                } else {
                    throw new \Exception('결제 승인취소 실패 ' . $cancel_log_msg);
                }
            } else {
                // 망취소
                $net_cancel_url = empty(element('net_cancel_url', $params)) === false ? element('net_cancel_url', $params) : $this->_net_cancel_url;
                $auth_params = empty(element('auth_params', $params)) === false ? element('auth_params', $params) : $this->_auth_params;

                // 망취소 API
                if ($this->_http_util->processHTTP($net_cancel_url, $auth_params)) {
                    $cancel_results = json_decode($this->_http_util->body, true);
                    $cancel_result_code = element('resultCode', $cancel_results);
                    $cancel_result_msg = element('resultMsg', $cancel_results);

                    if ($cancel_result_code != '416623') {
                        // 망취소 결과로그 전달 파라미터 설정 (해당거래 없음이 아닐 경우)
                        $log_params = [
                            'cancel_result_code' => $cancel_result_code,
                            'cancel_result_msg' => $cancel_result_msg,
                            'cancel_reason' => $_cancel_reason
                        ];
                    }

                    $this->_parent->saveFileLog('망취소 성공 (결과메시지 : ' . $this->_http_util->body . ')');
                } else {
                    // 망취소 결과로그 전달 파라미터 설정 (통신에러일 경우)
                    $log_params = [
                        'cancel_result_code' => $this->_http_util->errorcode,
                        'cancel_result_msg' => $this->_http_util->errormsg,
                        'cancel_reason' => $_cancel_reason
                    ];

                    throw new \Exception('망취소 실패 (결과메시지 : ' . $this->_http_util->errormsg . ')');
                }
            }
        } catch (\Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error');
            return false;
        } finally {
            // 로그 전달 파라미터가 있을 경우
            if (empty($log_params) === false) {
                $this->_saveLog($log_params, 'pay', $_order_no);
            }
        }

        return true;
    }

    /**
     * 가상계좌 입금 통보 처리 결과 리턴
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

            // 입금일시
            if (empty(element('dt_trans', $params)) === false && empty(element('tm_trans', $params)) === false) {
                $returns['dtm_trans'] = date('Y-m-d H:i:s', strtotime(element('dt_trans', $params) . ' ' . element('tm_trans', $params)));
            } else {
                $returns['dtm_trans'] = date('Y-m-d H:i:s');
            }

            $this->_parent->saveFileLog('가상계좌 입금통보 결과 데이터', $returns, 'debug', $log_type);

            // 전달 결과 저장
            $log_idx = $this->_saveLog($returns, $log_type);

            // TODO : 테스트 (실제 연동시 주석 삭제)
/*            // PG사 연동 IP 체크
            if (in_array($returns['reg_ip'], $this->_config['allow_vbank_ip']) === false) {
                throw new \Exception('ERR_IP');
            }*/

            // 전달 결과 체크
            if (empty($returns['no_oid']) === true || empty($returns['id_merchant']) === true || empty($returns['no_tid']) === true
                || empty($returns['no_vacct']) === true || empty($returns['amt_input']) === true) {
                throw new \Exception('ERR_PARAM');
            }

            return [
                'result' => true,
                'order_no' => $returns['no_oid'],   // 주문번호
                'seq' => $returns['no_msgseq'],     // 전문 일련번호
                'mid' => $returns['id_merchant'],   // 상점아이디
                'tid' => $returns['no_tid'],            // 거래번호
                'total_pay_price' => $returns['amt_input'],     // 입금금액
                'vbank_code' => $returns['cd_bank'],            // 가상계좌은행코드
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
                'order_no' => $returns['no_oid']
            ];
        }
    }

    /**
     * 가상계좌 입금 통보 처리 결과 리턴
     * @param bool $ret_cd
     * @param string $err_msg
     * @param string $log_idx
     */
    public function depositReturn($ret_cd, $err_msg = '', $log_idx = '')
    {
        $log_type = 'deposit';

        if ($ret_cd === true) {
            $this->_parent->saveFileLog('가상계좌 입금통보 처리 성공', null, 'debug', $log_type);
            $ret_msg = 'OK';
        } else {
            $this->_parent->saveFileLog('가상계좌 입금통보 처리 오류 발생 : ' . $err_msg, null, 'error', $log_type);

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
     * @param null|string $order_no [결제 : 주문번호, 가상계좌입금통보 : 입금식별자]
     * @return int|bool
     */
    private function _saveLog($params = [], $log_type = 'pay', $order_no = null)
    {
        $_db = $this->_CI->load->database('lms', true);   // load database

        try {
            if ($log_type == 'pay') {
                $_table = $this->_parent->_log_table;

                if (empty($order_no) === true) {
                    // 결제방법별 상세 코드 (신용카드, 은행)
                    $pay_detail_code = '';
                    if (empty(element('CARD_Code', $params)) === false) {
                        $pay_detail_code = element('CARD_Code', $params);
                    } else if (empty(element('ACCT_BankCode', $params)) === false) {
                        $pay_detail_code = element('ACCT_BankCode', $params);
                    } else if (empty(element('VACT_BankCode', $params)) === false) {
                        $pay_detail_code = element('VACT_BankCode', $params);
                    }

                    $data = [
                        'OrderNo' => element('MOID', $params),
                        'PgDriver' => 'inisis',
                        'PgMid' => element('mid', $params),
                        'PgTid' => element('tid', $params),
                        'ResultCode' => element('resultCode', $params),
                        'ResultMsg' => element('resultMsg', $params),
                        'ApprovalNo' => element('applNum', $params, ''),
                        'PayMethod' => element('payMethod', $params),
                        'PayDetailCode' => $pay_detail_code,
                        'RealPayPrice' => element('TotPrice', $params),
                        'ApprovalDatm' => element('applDatm', $params)
                    ];

                    if ($_db->set($data)->insert($_table) === false) {
                        throw new \Exception('결제 승인결과 로그 저장에 실패했습니다.');
                    }
                } else {
                    $data = [
                        'CancelResultCode' => element('cancel_result_code', $params),
                        'CancelResultMsg' => element('cancel_result_msg', $params),
                        'CancelReason' => element('cancel_reason', $params),
                    ];

                    if ($_db->set('CancelDatm', 'NOW()', false)->set($data)->where('OrderNo', $order_no)->update($_table) === false) {
                        throw new \Exception('결제취소 로그 업데이트에 실패했습니다.');
                    }
                }
            } elseif ($log_type == 'deposit') {
                $_table = $this->_parent->_log_deposit_table;

                if (empty($order_no) === true) {
                    $data = [
                        'OrderNo' => element('no_oid', $params),
                        'MsgSeq' => element('no_msgseq', $params),
                        'PgDriver' => 'inisis',
                        'PgMid' => element('id_merchant', $params),
                        'PgTid' => element('no_tid', $params),
                        'RealPayPrice' => element('amt_input', $params),
                        'VBankCode' => element('cd_bank', $params),
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
                    if ($_db->set('ErrorMsg', element('err_msg', $params))->where('DepositIdx', $order_no)->update($_table) === false) {
                        throw new \Exception('가상계좌 입금통보 에러 메시지 업데이트에 실패했습니다.');
                    }
                }
            }
        } catch (\Exception $e) {
            $this->_parent->saveFileLog($e->getMessage(), null, 'error', $log_type);
            return false;
        } finally {
            $_db->close();
        }

        return true;
    }
}

/**
 * 승인요청시 발생하는 Exception 클래스
 */
class AuthException extends \Exception {}
