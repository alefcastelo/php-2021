<?php
$startMemory = memory_get_usage();

function routine(): Generator {
    $filename = './users.csv';

    $stream = fopen($filename, 'r');
    $headers = fgetcsv($stream);

    $users = [];

    while ($line = fgetcsv($stream)) {
        $users[] = array_combine($headers, $line);

        if (count($users) % 10000 !== 0) {
            continue;
        }

        yield $users;
        $users = [];
    }
}

$generator = routine();

$filename = 'users.txt';
$generator->rewind();

$stream = fopen($filename, 'w');
while ($generator->valid() !== false) {
    $users = $generator->current();

    foreach ($users as $user) {
        fwrite($stream, json_encode($user) . PHP_EOL);
    }

    $generator->next();
}

echo number_format((((memory_get_usage() - $startMemory) / 1024) / 1024), 4), " MB" . PHP_EOL;