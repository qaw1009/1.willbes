<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class MockGradeMakeTask extends \crontask\tasks\Task
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
    }

    /**
     * 모의고사 성적관리 (성적오픈일에 맞춰 성적 자동생성)
     * @return mixed|string
     */
    public function run()
    {
        try {
            $this->_CI->load->model('lms/mocktest/regGradeModel');
            $result = $this->_CI->regGradeModel->todayScoreMake();

            if($result == 1) {
                $result = '정상등록';
            } else {
                $result = '오류발생';
            }

            return $result;
        } catch (\Exception $e) {
            $this->setOutput('MockGradeMakeTask error occured. [' . $e->getMessage() . ']');

            return 'Error (0)';
        }
    }
}
