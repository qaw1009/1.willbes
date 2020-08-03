<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class VisitorStatsRegistTask extends \crontask\tasks\Task
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
     * 접속현황 통계 데이터 등록
     * @return mixed|string
     */
    public function run()
    {
        try {
            $query = $this->_db->query('call sp_visitor_stats_insert("", "")');
            $result = $query->row(0);

            $this->setOutput('VisitorStatsRegistTask complete.');

            return $result->ReturnMsg . ' (' . $result->StartDate . ' ~ ' . $result->EndDate . ' : ' . $result->ReturnCnt . ')';
        } catch (\Exception $e) {
            $this->setOutput('VisitorStatsRegistTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        }
    }
}
