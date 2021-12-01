<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class VbankWaitToExpireTask extends \crontask\tasks\Task
{
    public function __construct()
    {
        parent::__construct();

        $this->setLogId('VWE');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 주문상품 입금대기 => 입금대기만료 업데이트 (오늘부터 8일 이전 주문건 대상) (프로시저에서 트랜잭션 처리)
     * @return mixed|string
     */
    public function run()
    {
        $_db = $this->_CI->load->database('lms', true);

        try {
            $query = $_db->query('call sp_order_vbank_wait_to_expire(?)', [8]);
            $result = $query->row(0);

            $this->setOutput('VbankWaitToExpireTask complete.');

            return $result->ReturnMsg . ' (' . $result->ReturnCnt . ')';
        } catch (\Exception $e) {
            $this->setOutput('VbankWaitToExpireTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        } finally {
            $_db->close();
        }
    }
}
