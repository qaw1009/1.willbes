<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/Scheduler.php';
require_once APPPATH . 'third_party/crontask/tasks/MemberPointExpireTask.php';
require_once APPPATH . 'third_party/crontask/tasks/VisitorStatsRegistTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/VbankWaitToExpireTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/MockGradeMakeTask.php';
require_once APPPATH . 'third_party/crontask/tasks/EduIfSalesMstTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/SampleTask.php';

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
     * # 10,40 0-6 * * * CI_ENV="testing" php /home/web/will/index.php cron index > /dev/null 2>&1 (매일 0시~6시 10, 40분에 실행)
     * # setExpression = 분 시 일 월 요일 (일요일 0 ~ 토요일 7)
     */
    public function index()
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $scheduler = new crontask\Scheduler();
        $tasks = [
            /* 사용안함
            , (new crontask\tasks\SampleTask())->setExpression('10 0 * * *')                // 매일 0시 10분 실행
            , (new crontask\tasks\VbankWaitToExpireTask())->setExpression('40 0 * * *')     // 매일 0시 40분 실행
            , (new crontask\tasks\MockGradeMakeTask())->setExpression('40 1 * * *')         // 매일 1시 40분 실행
            */
        ];

        $scheduler->_writeLog('Start scheduler');

        // 스테이지 환경에서만 실행
        if (ENVIRONMENT == 'testing') {
            $tasks[] = (new crontask\tasks\EduIfSalesMstTask())->setExpression('10 1 * * *');       // 매출통합데이터이관 (매일 1시 10분 실행)
            $tasks[] = (new crontask\tasks\MemberPointExpireTask())->setExpression('10 4 * * *');   // 회원포인트소멸 (매일 4시 10분 실행)
            $tasks[] = (new crontask\tasks\VisitorStatsRegistTask())->setExpression('10 5 * * *');  // 방문자통계집계 (매일 5시 10분 실행)
        }

        if (empty($tasks) === false) {
            $scheduler->addTasks($tasks);
            $scheduler->run();
        } else {
            $scheduler->_writeLog('No tasks');
        }

        $scheduler->_writeLog('End scheduler');
    }

    /**
     * 테스트 실행
     * @example https://cli.local.willbes.net/cron/testRun/2022-03-28/2022-03-28
     * @param array $params [인터페이스 시작일자, 종료일자]
     */
    public function testRun($params = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $if_sdate = element('0', $params);
        $if_edate = element('1', $params);

        // start time
        $start_time = microtime(true);

        // run
        $task = new crontask\tasks\EduIfSalesMstTask();
        $result = $task->run($if_sdate, $if_edate);

        // run time
        $run_time = round(microtime(true) - $start_time, 2);

        var_dump($result, $run_time . 's');
    }

    /**
     * 개별 프로세스 별도 실행
     * @example https://cli.local.willbes.net/cron/testRunOne/OrderMst/2022-03-28/2022-03-28
     * @param array $params [개별 프로세스명 (TeacherMst / ProductMst / ProductSch / OrderMst), 인터페이스 시작일자, 종료일자]
     */
    public function testRunOne($params = [])
    {
        set_time_limit(0);
        ini_set('memory_limit', $this->_memory_limit_size);

        $run_name = element('0', $params);
        $if_sdate = element('1', $params);
        $if_edate = element('2', $params);

        // start time
        $start_time = microtime(true);

        $task = new crontask\tasks\EduIfSalesMstTask();
        $result = $task->testRunOne($run_name, $if_sdate, $if_edate);

        // run time
        $run_time = round(microtime(true) - $start_time, 2);

        var_dump($result, $run_time . 's');
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
