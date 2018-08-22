<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/pg/inisis/libs/INIStdPayUtil.php';
require_once APPPATH . 'third_party/pg/inisis/libs/HttpClient.php';

/**
 * 이니시스 결제
 */
class Pg_inisis extends CI_Driver
{
    /**
     * @var CI_Controller
     */
    protected $_CI;

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
     * @var string log full path
     */
    protected $_log_path = '';

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

        // log full path
        $this->_log_path = STORAGEPATH . 'logs/pg/inisis/log-' . date('Y-m-d') . '.log';

        // set config
        $this->_config = $this->_CI->config->config['pg_inisis'];
        $this->_mode_config = $this->_config[$this->_config['mode']];

        if (class_exists('INIStdPayUtil', false) === true) {
            $this->_util = new INIStdPayUtil();
        } else {
            logger('결제 라이브러리 유틸 로드 실패', null, 'error', $this->_log_path);
            return;
        }

        if (class_exists('HttpClient', false) === true) {
            $this->_http_util = new HttpClient();
        } else {
            logger('HTTP Client 라이브러리 유틸 로드 실패', null, 'error', $this->_log_path);
            return;
        }

        logger('결제 모듈 로드 완료', null, 'debug', $this->_log_path);
    }

    /**
     * 이니시스 결제요청 form 리턴
     * @param array $params
     * @return bool|string
     */
    public function requestForm($params = [])
    {
        try {
            logger('결제 요청 시작', null, 'debug', $this->_log_path);

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
            $accept_method = element('is_escrow', $params, 'N') == 'Y' ? 'useescrow' : '';
            // 상점 데이터
            $return_data = empty(element('return_data', $params)) === false ? http_build_query(element('return_data', $params)) : '';

            // view 전달 데이터
            $data = [
                'version' => $this->_mode_config['version'],
                'mid' => $this->_parent->getMid(),
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

            logger('결제 요청 데이터', $data, 'debug', $this->_log_path);
            logger('결제 요청 완료', null, 'debug', $this->_log_path);
            
            return $this->_CI->load->view($this->_config['view_path']['request'], ['data' => $data], false, true);
        } catch (\Exception $e) {
            logger('결제 요청 실패 : ' . $e->getMessage(), null, 'error', $this->_log_path);
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
        logger('결제 요청 취소 (주문번호 : ' . $params['order_no'] . ', 주문요청 데이터 삭제 : ' . $params['is_post_data_delete'] . ')', null, 'debug', $this->_log_path);
        return $this->_CI->load->view('pg/inisis/close', [], false);
    }

    /**
     * 이니시스 결제 결과 검증 및 리턴
     * @param array $params
     * @return bool|array
     */
    public function returnResult($params = [])
    {
        // 리턴 결과
        $returns = array_merge($this->_CI->input->get(null, false), $this->_CI->input->post(null, false));

        try {
            // 불필요한 로그 내용 삭제 (authToken)
            logger('결제 인증결과 리턴', array_replace($returns, ['authToken' => '__deleted']), 'debug', $this->_log_path);

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

                    logger('결제 승인결과 리턴', $auth_results, 'debug', $this->_log_path);

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
                        logger('결제 승인완료', null, 'debug', $this->_log_path);

/*                        // 망취소 테스트
                        throw new AuthException('망취소 테스트');*/

/*                        // 승인취소 테스트
                        $this->cancel([
                            'order_no' => $auth_results['MOID'],
                            'tid' => $auth_results['tid'],
                            'cancel_reason' => '취소 테스트'
                        ]);*/
                        
                        return [
                            'order_no' => $auth_results['MOID'],
                            'repr_prod_name' => $auth_results['goodsName'],
                            'req_pay_price' => $auth_results['TotPrice'],
                            'mid' => $auth_results['mid'],
                            'tid' => $auth_results['tid']
                        ];
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
            logger($e->getMessage(), null, 'error', $this->_log_path);
            return false;
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
        $order_no = element('order_no', $params);

        try {
            if (empty($order_no) === true) {
                throw new \Exception('결제취소에 필요한 주문번호가 없습니다.');
            }

            $tid = element('tid', $params);
            $cancel_reason = element('cancel_reason', $params, '');

            if (empty($tid) === false) {
                // 관리자 취소
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
                $inipay->SetField('mid', $this->_parent->getMid());
                $inipay->SetField('admin', $this->_mode_config['adminkey']);
                $inipay->SetField('tid', $tid);
                $inipay->SetField('cancelmsg', $cancel_reason);

                $inipay->startAction();

                $cancel_result_code = $inipay->getResult('ResultCode');
                $cancel_result_msg = iconv('EUC-KR', 'UTF-8', $inipay->getResult('ResultMsg'));
                
                // 승인취소 결과로그 전달 파라미터 설정
                $log_params = [
                    'cancel_result_code' => $cancel_result_code,
                    'cancel_result_msg' => $cancel_result_msg,
                    'cancel_reason' => $cancel_reason
                ];

                // 로그 메시지
                $cancel_log_msg = '(결과코드 : ' . $cancel_result_code . ', 결과메시지 : ' . $cancel_result_msg;
                $cancel_log_msg .= ', 주문번호 : ' . $order_no . ', TID : ' . $tid . ', 취소날짜 : ' . $inipay->getResult('CancelDate') . ', 취소시간 : ' . $inipay->getResult('CancelTime') . ')';                

                if (strcmp('00', $inipay->getResult('ResultCode')) == 0) {
                    // 취소성공
                    logger('결제 승인취소 성공 ' . $cancel_log_msg, null, 'debug', $this->_log_path);
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
                            'cancel_reason' => $cancel_reason
                        ];
                    }

                    logger('망취소 성공 (결과메시지 : ' . $this->_http_util->body . ')', null, 'debug', $this->_log_path);
                } else {
                    // 망취소 결과로그 전달 파라미터 설정 (통신에러일 경우)
                    $log_params = [
                        'cancel_result_code' => $this->_http_util->errorcode,
                        'cancel_result_msg' => $this->_http_util->errormsg,
                        'cancel_reason' => $cancel_reason
                    ];

                    throw new \Exception('망취소 실패 (결과메시지 : ' . $this->_http_util->errormsg . ')');
                }
            }
        } catch (\Exception $e) {
            logger($e->getMessage(), null, 'error', $this->_log_path);
            return false;
        } finally {
            // 로그 전달 파라미터가 있을 경우
            if (empty($log_params) === false) {
                $is_log = $this->_saveLog($log_params, $order_no);
            }
        }

        return true;
    }

    /**
     * 로그 저장
     * @param array $params
     * @param null|string $order_no
     * @return bool
     */
    private function _saveLog($params = [], $order_no = null)
    {
        $_db = $this->_CI->load->database('lms', true);   // load database
        $_table = 'lms_pg_inisis_log';

        try {
            if (empty($order_no) === true) {
                $data = [
                    'OrderNo' => element('MOID', $params),
                    'PgMid' => element('mid', $params),
                    'PgTid' => element('tid', $params),
                    'ResultCode' => element('resultCode', $params),
                    'ResultMsg' => element('resultMsg', $params),
                    'ApprovalNo' => element('applNum', $params),
                    'PayMethod' => element('payMethod', $params),
                    'RealPayPrice' => element('TotPrice', $params)
                ];

                if (empty(element('applDate', $params)) === false && empty(element('applTime', $params)) === false) {
                    $_db->set('ApprovalDatm', date('Y-m-d H:i:s', strtotime(element('applDate', $params) . ' ' . element('applTime', $params))));
                } else {
                    $_db->set('ApprovalDatm', NOW(), false);
                }

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
        } catch (\Exception $e) {
            logger($e->getMessage(), null, 'error', $this->_log_path);
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
