<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

use Cron\CronExpression;
use app\crontask\interfaces\TaskInterface;

abstract class Task implements TaskInterface
{
    /**
     * @var \CI_Controller
     */
    protected $_CI;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $expression;

    /**
     * @var null|string|array
     */
    protected $output;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        // set cron id
        $this->setId();

        // get ci instance
        $this->_CI =& get_instance();
    }

    /**
     * @return mixed
     */
    abstract public function run();

    /**
     * Sets a task id
     * @return Task $this
     */
    public function setId()
    {
        $this->id = md5(get_class($this));

        return $this;
    }

    /**
     * Gets a task id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets a cron expression
     * @param string $expression
     * @return Task $this
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * Gets the current cron expression
     * @return string
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * Sets the output from the task
     * @param null|string|array $output
     * @return Task $this
     */
    public function setOutput($output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Gets the output from the task
     * @return null|string|array
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Checks whether the task is currently due
     * @return bool
     */
    public function isRequired()
    {
        $expression = $this->getExpression();

        if (! $expression) {
            return false;
        }

        $cron = CronExpression::factory($expression);

        return $cron->isDue();
    }
}
