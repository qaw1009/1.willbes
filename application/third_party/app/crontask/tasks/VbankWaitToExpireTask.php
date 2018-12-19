<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

class VbankWaitToExpireTask extends \app\crontask\tasks\Task
{
    /**
     * @var \CI_DB_query_builder
     */
    private $_db;

    public function __construct()
    {
        parent::__construct();

        $this->_db = $this->_CI->load->database('lms', true);
    }

    public function __destruct()
    {
        $this->_db->close();
    }

    /**
     * 주문상품 입금대기 => 입금대기만료 업데이트 (오늘부터 31일 이전 주문건 대상)
     * @return mixed|string
     */
    public function run()
    {
        $query = $this->_db->query('call sp_order_vbank_wait_to_expire(?)', [31]);
        $result = $query->row(0);

        $this->setOutput('VbankWaitToExpireTask complete.');

        return $result->ReturnMsg . ' (' . $result->ReturnCnt . ')';
    }
}
