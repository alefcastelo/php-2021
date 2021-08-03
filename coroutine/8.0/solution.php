<?php
$startMemory = memory_get_usage();

function routine(): Generator {
    $filename = './users.csv';

    $stream = fopen($filename, 'r');
    $headers = fgetcsv($stream);

    while ($line = fgetcsv($stream)) {
        yield array_combine($headers, $line);
    }
}

$generator = routine();

$filename = 'users.txt';
$generator->rewind();

$stream = fopen($filename, 'w');
while ($generator->valid() !== false) {
    $user = $generator->current();
    fwrite($stream, json_encode($user) . PHP_EOL);

    $generator->next();
}

echo number_format((((memory_get_usage() - $startMemory) / 1024) / 1024), 4), " MB" . PHP_EOL;