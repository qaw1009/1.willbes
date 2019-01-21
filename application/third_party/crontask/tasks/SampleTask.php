<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class SampleTask extends \crontask\tasks\Task
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

    public function run()
    {
        try {
            $query = $this->_db->query('select NOW() as today');
            $result = $query->row(0)->today;

            $this->setOutput('SampleTask complete.');

            return $result;
        } catch (\Exception $e) {
            $this->setOutput('SampleTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        }
    }
}
