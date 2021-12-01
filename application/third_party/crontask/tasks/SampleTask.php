<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class SampleTask extends \crontask\tasks\Task
{
    public function __construct()
    {
        parent::__construct();

        $this->setLogId('SAM');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 샘플 작업
     * @return mixed|string
     */
    public function run()
    {
        $_db = $this->_CI->load->database('lms', true);

        try {
            $query = $_db->query('select NOW() as today');
            $result = $query->row(0)->today;

            $this->setOutput('SampleTask complete.');

            return $result;
        } catch (\Exception $e) {
            $this->setOutput('SampleTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        } finally {
            $_db->close();
        }
    }
}
