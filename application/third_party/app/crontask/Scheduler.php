<?php
namespace app\crontask;

defined('BASEPATH') OR exit('No direct script access allowed');

use app\crontask\interfaces\TaskInterface;

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
                if ($this->_isOverlapping($task_id) === false) {
                    // create lock file
                    $this->_createLockFile($task_id);

                    // run task
                    $result = $task->run();

                    // set output
                    $output[] = [
                        'task'   => get_class($task),
                        'output' => $task->getOutput(),
                        'result' => $result,
                    ];

                    // remove lock file
                    $this->_removeLockFile($task_id);
                }
            }
        }

        $this->_writeLog($output);

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
     * Write log
     * @param array $output
     * @return null
     */
    private function _writeLog($output = [])
    {
        if (empty($output) === false) {
            logger('Cron run log: ', $output);
        }

        return null;
    }
}
