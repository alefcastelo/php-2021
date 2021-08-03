<?php

$fiber = new Fiber(function() {
    for ($i = 0; $i <= 5; $i++) {
        echo "Routine: {$i}" . PHP_EOL;
        Fiber::suspend();
    }
});

$fiber->start();

for ($i = 0; $i <= 5; $i++) {
    echo "Main: {$i}" . PHP_EOL;
    $fiber->resume();
}
