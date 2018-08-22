<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pg extends CI_Driver_Library
{
    /**
     * @var array valid drivers
     */
    protected $valid_drivers = array(
        'inisis',
        'lgu'
    );

    /**
     * @var string this driver
     */
    protected $_driver = 'dummy';

    /**
     * @var string 상점 아이디 (mid)
     */
    protected $_mid = '';

    public function __construct($config = array())
    {
        isset($config['driver']) && $this->_driver = $config['driver'];
        isset($config['mid']) && $this->_mid = $config['mid'];

        if (in_array($this->_driver, $this->valid_drivers) === false) {
            log_message('error', '[결제모듈] 허용된 PG사 드라이버가 아닙니다.');
            return;
        }

        // get ci instance
        $_CI =& get_instance();

        // load driver config
        if ($_CI->config->load('pg_' . $this->_driver, true, true)) {
            $driver_config = $_CI->config->config['pg_' . $this->_driver];

            if (element('mode', $driver_config) === 'test') {
                $this->_mid = element('mid', $driver_config['test']);
            }
        }

        if (empty($this->_mid) === true) {
            log_message('error', '[결제모듈] 상점 아이디(mid)가 없습니다.');
            return;
        }
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
     * 결제 취소
     * @param array $params
     * @return mixed
     */
    public function cancel($params = [])
    {
        return $this->{$this->_driver}->cancel($params);
    }

    /**
     * 상점 아이디(mid) 리턴
     * @return string
     */
    public function getMid()
    {
        return $this->_mid;
    }
}
