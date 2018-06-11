<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

class SampleTask extends \app\crontask\tasks\Task
{
    public function run()
    {
        $this->setOutput('SampleTask complete.');

        return 'SampleTask return values';
    }
}
