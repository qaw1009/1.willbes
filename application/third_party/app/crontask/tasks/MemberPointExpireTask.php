<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

class MemberPointExpireTask extends \app\crontask\tasks\Task
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
     * 회원포인트 소멸
     * @return mixed|string
     */
    public function run()
    {
        $query = $this->_db->query('call sp_member_point_expire');
        $result = $query->row(0);

        $this->setOutput('MemberPointExpireTask complete.');

        return $result->ReturnMsg . ' (' . $result->ReturnCnt . ')';
    }
}
