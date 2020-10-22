<?php
// function gen()
// {
// 	for ($i = 0; $i < 2; $i++) { 
// 		$a = yield;
// 		echo $a . "<br>";
// 	}
// }

// $iterator = gen();
// $iterator->send("hello world");
// $iterator->send("taonian");

function gen() {
    yield 'foo';
    yield 'bar';
}

$gen = gen();
// var_dump($gen->send('something'));

$queue = new SplQueue();
$queue->enqueue("taonian");

$ret = $queue->dequeue();
var_dump($ret);