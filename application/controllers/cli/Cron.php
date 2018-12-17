<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 스케줄러 실행
     * # crontab 설정
     * # 10,40 0-6 * * * CI_ENV="local" php /home/web/will/index.php cron index > /dev/null 2>&1 (매일 0시~6시 10, 40분에 실행)
     */
    public function index()
    {
        $scheduler = new app\crontask\Scheduler();

        $scheduler->addTasks([
            (new app\crontask\tasks\MemberPointExpireTask())->setExpression('10 0 * * *'),  // 매일 0시 10분 실행   
            (new app\crontask\tasks\VbankWaitToExpireTask())->setExpression('40 0 * * *')   // 매일 0시 40분 실행
        ]);

        $scheduler->run();
    }
}
