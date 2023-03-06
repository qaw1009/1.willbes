<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class VisitorStatsRegistTask extends \crontask\tasks\Task
{
    public function __construct()
    {
        parent::__construct();

        $this->setLogId('VSR');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 접속현황 통계 데이터 등록
     * @return mixed|string
     */
    public function run()
    {
        $_db = $this->_CI->load->database('lms', true);

        try {
            $query = $_db->query('call sp_visitor_stats_insert("", "")');
            if ($query === false) {
                throw new \Exception('방문자통계집계 작업 중 오류가 발생했습니다.');
            }
            $result = $query->row(0);

            $this->setOutput('VisitorStatsRegistTask complete.');
            return $result->ReturnMsg . '(' . $result->StartDate . ' ~ ' . $result->EndDate . ' : ' . $result->ReturnCnt . ')';
        } catch (\Exception $e) {
            $this->setOutput('VisitorStatsRegistTask error occured. [' . $e->getMessage() . ']');
            return 'Error(0)';
        } finally {
            $_db->close();
        }
    }
}
