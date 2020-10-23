<?php
use Classcore\Scheduler;

$scheduler = new Scheduler();

$task1 = task1();
$scheduler->newTask($task1);
$scheduler->newTask(task2());

$scheduler->run();