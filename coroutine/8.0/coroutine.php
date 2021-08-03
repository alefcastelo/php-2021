<?php

//function routine() {
//    for ($i = 0; $i < 5; $i++) {
//        sleep(1);
//        echo "Routine: {$i}." . PHP_EOL;
//    }
//}
//
//routine();
//
//for ($i = 0; $i < 5; $i++) {
//    sleep(1);
//    echo "Main: {$i}." . PHP_EOL;
//}

function routine(): Generator {
    for ($i = 0; $i < 5; $i++) {
        sleep(1);
        echo "Routine: {$i}." . PHP_EOL;
        yield;
    }
}

$generator = routine();
$generator->rewind();

for ($i = 0; $i < 5; $i++) {
    sleep(1);
    echo "Main: {$i}." . PHP_EOL;

    $generator->next();
}