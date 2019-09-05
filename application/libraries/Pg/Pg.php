<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pg extends CI_Driver_Library
{
    /**
     * @var array valid drivers
     */
    protected $valid_drivers = array(
        'inisis',
        'inisis_mobile',
        'lgu'
    );

    /**
     * @var string this driver
     */
    protected $_driver = 'dummy';

    /**
     * @var string log directory
     */
    protected $_log_dir = '';

    /**
     * @var string 결제연동 결과 저장 테이블
     */
    public $_log_table = 'lms_order_payment';

    /**
     * @var string 가상계좌 입금통보 결과 저장 테이블
     */
    public $_log_deposit_table = 'lms_order_deposit';

    /**
     * Pg constructor.
     * @param array $config
     */
    public function __construct($config = array())
    {
        isset($config['driver']) && $this->_driver = $config['driver'];

        if (in_array($this->_driver, $this->valid_drivers) === false) {
            log_message('error', '[결제모듈] 허용된 PG사 드라이버가 아닙니다.');
            return;
        }

        // log directory
        $this->_log_dir = STORAGEPATH . 'logs/pg/' . $this->_driver . '/';
    }

    /**
     * 결제요청 form 리턴
     * @param array $params
     * @return mixed
     */
    public function requestForm($params = [])
    {
        return $this->{$this->_driver}->requestForm($params);
    }

    /**
     * 결제요청 취소
     * @param array $params
     * @return mixed
     */
    public function requestCancel($params = [])
    {
        return $this->{$this->_driver}->requestCancel($params);
    }

    /**
     * 결제 결과 검증 및 리턴
     * @param array $params
     * @return mixed
     */
    public function returnResult($params = [])
    {
        return $this->{$this->_driver}->returnResult($params);
    }

    /**
     * 부분취소
     * @param array $params
     * @param string $is_vbank [가상계좌여부 : Y/N]
     * @return mixed
     */
    public function repay($params = [], $is_vbank = 'N')
    {
        return $this->{$this->_driver}->repay($params, $is_vbank);
    }

    /**
     * 결제취소
     * @param array $params
     * @param string $is_vbank [가상계좌여부 : Y/N]
     * @return mixed
     */
    public function cancel($params = [], $is_vbank = 'N')
    {
        return $this->{$this->_driver}->cancel($params, $is_vbank);
    }

    /**
     * 가상계좌 입금 통보 수신
     * @param array $params
     * @return mixed
     */
    public function depositResult($params = [])
    {
        return $this->{$this->_driver}->depositResult($params);
    }

    /**
     * 가상계좌 입금 통보 처리 결과 리턴 (to PG사)
     * @param bool $ret_cd
     * @param string $err_msg
     * @param string $log_idx
     * @return mixed
     */
    public function depositReturn($ret_cd, $err_msg = '', $log_idx = '')
    {
        return $this->{$this->_driver}->depositReturn($ret_cd, $err_msg, $log_idx);
    }

    /**
     * save file log
     * @param $msg
     * @param null $vars
     * @param string $log_level
     * @param string $log_type
     */
    public function saveFileLog($msg, $vars = null, $log_level = 'debug', $log_type = 'pay')
    {
        $log_path = $this->_log_dir . ($log_type != 'pay' ? $log_type : 'log') . '-' . date('Y-m-d') . '.log';

        logger($msg, $vars, $log_level, $log_path);
    }
}
