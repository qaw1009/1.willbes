<?php
namespace app\crontask\tasks;

defined('BASEPATH') OR exit('No direct script access allowed');

class Shell extends Task
{
    /**
     * @var string
     */
    protected $command;

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * Run task
     * @return mixed
     */
    public function run()
    {
        $output = null;
        exec($this->getCommand().' '.implode(' ', $this->arguments), $output, $result);

        $this->setOutput($output);

        return $result;
    }

    /**
     * Sets a shell command
     * @param string $command
     * @return $this
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Gets the current shell command
     * @return string
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Adds a shell command argument
     * @param mixed $argument
     * @return $this
     */
    public function addArgument($argument)
    {
        $this->arguments[] = $argument;

        return $this;
    }

    /**
     * Gets the current shell command argument
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }
}