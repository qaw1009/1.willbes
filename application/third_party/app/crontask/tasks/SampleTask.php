<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

class SampleTask extends \app\crontask\tasks\Task
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
        $query = $this->_db->query('select NOW() as today');
        $result = $query->row(0)->today;

        $this->setOutput('SampleTask complete.');

        return $result;
    }
}
