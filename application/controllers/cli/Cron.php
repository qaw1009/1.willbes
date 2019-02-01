<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'third_party/crontask/Scheduler.php';
require_once APPPATH . 'third_party/crontask/tasks/MemberPointExpireTask.php';
require_once APPPATH . 'third_party/crontask/tasks/VbankWaitToExpireTask.php';
//require_once APPPATH . 'third_party/crontask/tasks/MockGradeMakeTask.php';


class Cron extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 스케줄러 실행
     * # crontab 설정 (개발환경에 맞게 CI_ENV 환경변수 설정 필요, /index.php 참조 요망)
     * # 10,40 0-6 * * * CI_ENV="production" php /home/web/will/index.php cron index > /dev/null 2>&1 (매일 0시~6시 10, 40분에 실행)
     * # setExpression = 분 시 일 월 요일 (일요일 0 ~ 토 7)
     */
    public function index()
    {
        $scheduler = new crontask\Scheduler();

        $scheduler->addTasks([
            //(new crontask\tasks\MockGradeMakeTask())->setExpression('* * * * *')  // 매일 0시 20분 실행
            (new crontask\tasks\MemberPointExpireTask())->setExpression('10 0 * * *'),  // 매일 0시 10분 실행
            (new crontask\tasks\VbankWaitToExpireTask())->setExpression('40 0 * * *')   // 매일 0시 40분 실행
        ]);

        $scheduler->run();
    }
}
