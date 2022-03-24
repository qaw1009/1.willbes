<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/Scheduler.php';
//require_once APPPATH . 'third_party/crontask/tasks/MemberPointExpireTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/VisitorStatsRegistTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/VbankWaitToExpireTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/MockGradeMakeTask.php';
require_once APPPATH . 'third_party/crontask/tasks/EduIfSalesMstTask.php';
require_once APPPATH . 'third_party/crontask/tasks/SampleTask.php';

class Cron extends \app\controllers\BaseController
{
    private $_memory_limit_size = '512M';     // 메모리 제한 설정값

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 스케줄러 실행
     * # crontab 설정 (개발환경에 맞게 CI_ENV 환경변수 설정 필요, /index.php 참조 요망)
     * # 10,40 0-5 * * * CI_ENV="testing" php /home/web/will/index.php cron index > /dev/null 2>&1 (매일 0시~5시 10, 40분에 실행)
     * # setExpression = 분 시 일 월 요일 (일요일 0 ~ 토요일 7)
     */
    public function index()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $scheduler = new crontask\Scheduler();

        $scheduler->addTasks([
            (new crontask\tasks\EduIfSalesMstTask())->setExpression('10 2 * * *')   // 매일 2시 10분 실행
            /* 사용안함
            , (new crontask\tasks\SampleTask())->setExpression('10 0 * * *')                // 매일 0시 10분 실행
            , (new crontask\tasks\MemberPointExpireTask())->setExpression('10 0 * * *')     // 매일 0시 10분 실행
            , (new crontask\tasks\VbankWaitToExpireTask())->setExpression('40 0 * * *')     // 매일 0시 40분 실행
            , (new crontask\tasks\MockGradeMakeTask())->setExpression('10 1 * * *')         // 매일 1시 10분 실행
            , (new crontask\tasks\VisitorStatsRegistTask())->setExpression('10 4 * * *')    // 매일 4시 10분 실행
            */
        ]);

        $scheduler->run();
    }

    /**
     * 테스트 실행
     * @param array $params [개별 프로세스명 (TeacherMst / ProductMst / ProductSch / OrderMst)]
     */
    public function testRun($params = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $run_name = element('0', $params);

        $task = new crontask\tasks\EduIfSalesMstTask();

        if (empty($run_name) === false) {
            $result = $task->testRunByName($run_name);
        } else {
            $result = $task->run();
        }

        var_dump($result);
    }

    /**
     * 테스트 커넥션
     */
    public function testConn()
    {
        $task = new crontask\tasks\EduIfSalesMstTask();
        $result = $task->testConn();

        var_dump($result);
    }
}
