<?php

use Workerman\Worker;

require_once './vendor/autoload.php';

$httpWorker = new Worker("http://0.0.0.0:80");

$httpWorker->count = 12;

$httpWorker->onMessage = function($connection) {
    $connection->send('<h1>Hello World!</h1>');
};

Worker::runAll();