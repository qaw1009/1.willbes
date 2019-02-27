<?php
namespace crontask\interfaces;

defined('BASEPATH') OR exit('No direct script access allowed');

interface TaskInterface
{
    /**
     * Run task
     */
    public function run();

    /**
     * Gets the current cron expression
     */
    public function getExpression();

    /**
     * Gets the output from the task
     */
    public function getOutput();

    /**
     * Checks whether the task is currently due
     */
    public function isRequired();
}
