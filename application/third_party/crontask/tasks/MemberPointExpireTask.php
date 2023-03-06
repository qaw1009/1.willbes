<?php
namespace crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/tasks/Task.php';

class MemberPointExpireTask extends \crontask\tasks\Task
{
    public function __construct()
    {
        parent::__construct();

        $this->setLogId('MPE');     // cron 실행로그 작업구분 컬럼값
    }

    /**
     * 회원포인트 소멸 (프로시저에서 트랜잭션 처리)
     * @return mixed|string
     */
    public function run()
    {
        $_db = $this->_CI->load->database('lms', true);

        try {
            $query = $_db->query('call sp_member_point_expire');
            if ($query === false) {
                throw new \Exception('회원포인트소멸 작업 중 오류가 발생했습니다.');
            }
            $result = $query->row(0);

            $this->setOutput('MemberPointExpireTask complete.');
            return $result->ReturnMsg . '(' . $result->ReturnCnt . ')';
        } catch (\Exception $e) {
            $this->setOutput('MemberPointExpireTask error occured. [' . $e->getMessage() . ']');
            return 'Error(0)';
        } finally {
            $_db->close();
        }
    }
}
