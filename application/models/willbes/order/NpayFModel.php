<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NpayFModel extends WB_Model
{
    private $_table = [
        'log' => 'lms_npay_api_log'
    ];

    public function __construct()
    {
        parent::__construct('lms');
    }

    /**
     * 네이버페이 연동로그 저장
     * @param string $api_type [API구분, OR : 주문등록]
     * @param array $data [입력데이터]
     * @return bool|string
     */
    public function addApiLog($api_type, $data = [])
    {
        try {
            $sess_mem_idx = get_var($this->session->userdata('mem_idx'), null);
            $sess_sess_id = $this->session->userdata('make_sessionid');
            $app_device = strtoupper(substr(APP_DEVICE, 0, 1));
            $reg_ip = $this->input->ip_address();

            // 로그 저장
            $data = array_merge_recursive($data, [
                'ApiType' => $api_type,
                'AppDevice' => $app_device,
                'MemIdx' => $sess_mem_idx,
                'SessId' => $sess_sess_id,
                'RegIp' => $reg_ip
            ]);

            $is_insert = $this->_conn->set($data)->insert($this->_table['log']);
            if ($is_insert === false) {
                throw new \Exception('네이버페이 연동로그 저장에 실패했습니다.');
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;
    }
}
