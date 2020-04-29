<?php

class Todo
{

    private $task;
    private $isDone;

    public function __construct($task)
    {
        $this->task = $task;
        $this->isDone = false;
    }

    public function getTaskName()
    {
        return $this->task;
    }

    public function getStatus()
    {
        return $this->isDone;
    }

    public function setStatus()
    {
        $this->isDone = !$this->isDone;
    }
}
