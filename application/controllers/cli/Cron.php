<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends \app\controllers\BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $scheduler = new app\crontask\Scheduler();

        $scheduler->addTasks([
            (new app\crontask\tasks\SampleTask())->setExpression('*/5 * * * *')
        ]);

        $scheduler->run();
    }
}
