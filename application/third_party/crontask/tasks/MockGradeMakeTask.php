<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class MockGradeMakeTask extends \crontask\tasks\Task
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
     * 회원포인트 소멸 (프로시저에서 트랜잭션 처리)
     * @return mixed|string
     */
    public function run()
    {
        try {
            $query = $this->_db->query('call sp_member_point_expire');
            $result = $query->row(0);

            $this->setOutput('MemberPointExpireTask complete.');

            return $result->ReturnMsg . ' (' . $result->ReturnCnt . ')';
        } catch (\Exception $e) {
            $this->setOutput('MemberPointExpireTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        }
        /*
        try {
            //$this->_CI->load->model('mocktest/regGrade')->todayScoreMake();
            //$this->_CI->load->model('mocktest/regGrade');
            //$result = $this->regGrade->todayScoreMake();
            if($result == 1) $result = "정상등록";
            else             $result = "오류발생";

            return $result;
        } catch (\Exception $e) {
            $this->setOutput('SampleTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        }*/
    }
}
