<?php
namespace crontask;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/interfaces/TaskInterface.php';

use crontask\interfaces\TaskInterface;

class Scheduler
{
    /**
     * @var \CI_Controller
     */
    protected $_CI;

    /**
     * @var array
     */
    protected $tasks = [];

    /**
     * task lock file store directory
     * @var string
     */
    protected $lockFileDir = STORAGEPATH . 'cli/task/';

    /**
     * task log file store directory
     * @var string
     */
    protected $logFileDir = STORAGEPATH . 'logs/cron/';

    /**
     * Scheduler constructor
     */
    public function __construct()
    {
        // get ci instance
        $this->_CI =& get_instance();
    }

    /**
     * Create new tasks list
     * @param array $tasks
     */
    public function addTasks($tasks)
    {
        foreach ($tasks as $task) {
            $this->addTask($task);
        }
    }

    /**
     * Adds a new task to the list
     * @param TaskInterface $task
     * @return Scheduler $this
     */
    public function addTask(TaskInterface $task)
    {
        $this->tasks[] = $task;

        return $this;
    }

    /**
     * Get Tasks
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Runs any due task, returning an array containing the output from each task
     * @return array
     */
    public function run()
    {
        $output = [];

        foreach ($this->tasks as $task) {
            if ($task->isRequired()) {
                $task_id = $task->getId();

                // remove old lock file
                $this->_removeOldLockFile($task_id);

                if ($this->_isOverlapping($task_id) === false) {
                    // create lock file
                    $this->_createLockFile($task_id);

                    // start time
                    $start_time = microtime(true);

                    // run task
                    $result = $task->run();

                    // run time
                    $run_time = round(microtime(true) - $start_time, 2);

                    // set output
                    $output[] = [
                        'task'      => get_class($task),
                        'output'    => $task->getOutput(),
                        'result'    => $result,
                        'logid'     => $task->getLogId(),
                        'runtime'   => $run_time
                    ];

                    // remove lock file
                    $this->_removeLockFile($task_id);
                }
            }
        }

        $this->_writeLog($output);
        $this->_writeDBLog($output);

        return $output;
    }

    /**
     * Checks whether the task is overlapping run
     * @param string $id
     * @return bool
     */
    private function _isOverlapping($id = '')
    {
        $lock_file = $this->lockFileDir . $id . '.lock';

        return file_exists($lock_file);
    }

    /**
     * Create task lock file
     * @param string $id
     * @return bool
     */
    private function _createLockFile($id = '')
    {
        $this->_CI->load->helper('file');
        $lock_file = $this->lockFileDir . $id . '.lock';

        return write_file($lock_file, 'running');
    }

    /**
     * Remove task lock file
     * @param string $id
     * @return bool
     */
    private function _removeLockFile($id = '')
    {
        $lock_file = $this->lockFileDir . $id . '.lock';

        return file_exists($lock_file) && unlink($lock_file);
    }

    /**
     * Remove old task lock file
     * @param string $id
     * @return null
     */
    private function _removeOldLockFile($id = '')
    {
        $lock_file = $this->lockFileDir . $id . '.lock';
        $chk_time = 3600; // 삭제 기준 (1시간, 초단위)

        if (file_exists($lock_file) === true) {
            $life_time = time() - filemtime($lock_file);

            if ($chk_time < $life_time) {
                unlink($lock_file);
            }
        }

        return null;
    }

    /**
     * Write log
     * @param array $output
     * @return null
     */
    public function _writeLog($output = [])
    {
        if (empty($output) === false) {
            $log_path = $this->logFileDir . 'log-' . date('Y-m-d') . '.log';
            logger('Cron run log', $output, 'debug', $log_path);
        }

        return null;
    }

    /**
     * Write DB log
     * @param array $output
     * @return null
     */
    private function _writeDBLog($output = [])
    {
        if (empty($output) === true) {
            return null;
        }

        $_db = $this->_CI->load->database('lms', true);
        $_table = 'lms_cron_exec_log';
        $today = date('Ymd');

        try {
            foreach ((array) $output as $row) {
                $data = [
                    'TaskType' => get_var($row['logid'], 'NOS'),
                    'ExecDate' => $today,
                    'RunTime' => $row['runtime'],
                    'ResultCode' => (stripos($row['result'], 'Err') !== false ? 'N' : 'Y'),
                    'ResultMsg' => $row['result'],
                    'RegAdminIdx' => '1000'
                ];

                if ($_db->set($data)->insert($_table) === false) {
                    throw new \Exception('Failed to write db log.');
                }
            }
        } catch (\Exception $e) {
            $this->_writeLog($e->getMessage());
        } finally {
            $_db->close();
        }

        return null;
    }
}
