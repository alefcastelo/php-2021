<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$server = new Server("0.0.0.0", 80);

$server->set([
    'log_level' => 5,
]);

$server->on('Request', fn (Request $request, Response $response) => $response->end('<h1>Hello World!</h1>'));

$server->start();