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

                        /* 망취소 테스트
                        throw new AuthException('망취소 테스트');*/

                        /* 승인취소 테스트
                        $this->cancel([
                            'tid' => $auth_results['tid'],
                            'cancel_msg' => '취소 테스트'
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
                        'net_cancel_url' => $returns['netCancelUrl'],
                        'auth_params' => $auth_params
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
        try {
            $tid = element('tid', $params);

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
                $inipay->SetField('cancelmsg', element('cancel_msg', $params, ''));

                $inipay->startAction();

                $cancel_result = '(결과코드 : ' . $inipay->getResult('ResultCode') . ', 결과메시지 : ' . iconv('EUC-KR', 'UTF-8', $inipay->getResult('ResultMsg'));
                $cancel_result .= ', TID : ' . $tid . ', 취소날짜 : ' . $inipay->getResult('CancelDate') . ', 취소시간 : ' . $inipay->getResult('CancelTime') . ')';

                if (strcmp('00', $inipay->getResult('ResultCode')) == 0) {
                    // 취소성공
                    logger('결제 승인취소 성공 ' . $cancel_result, null, 'debug', $this->_log_path);
                } else {
                    throw new \Exception('결제 승인취소 실패 ' . $cancel_result);
                }
            } else {
                // 망취소
                $net_cancel_url = empty(element('net_cancel_url', $params)) === false ? element('net_cancel_url', $params) : $this->_net_cancel_url;
                $auth_params = empty(element('auth_params', $params)) === false ? element('auth_params', $params) : $this->_auth_params;

                // 망취소 API
                if ($this->_http_util->processHTTP($net_cancel_url, $auth_params)) {
                    logger('망취소 성공 (결과메시지 : ' . $this->_http_util->body . ')', null, 'debug', $this->_log_path);
                } else {
                    throw new \Exception('망취소 실패 (결과메시지 : ' . $this->_http_util->errormsg . ')');
                }
            }
        } catch (\Exception $e) {
            logger($e->getMessage(), null, 'error', $this->_log_path);
            return false;
        }

        return true;
    }
}

/**
 * 승인요청시 발생하는 Exception 클래스
 */
class AuthException extends \Exception {}
