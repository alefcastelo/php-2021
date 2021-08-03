<?php
$startMemory = memory_get_usage();

function routine(): array {
    $filename = './users.csv';

    $stream = fopen($filename, 'r');
    $headers = fgetcsv($stream);

    $users = [];
    while ($line = fgetcsv($stream)) {
        $users[] = array_combine($headers, $line);
    }

    return $users;
}

$filename = 'users.txt';
$stream = fopen($filename, 'w');

$users = routine();
foreach ($users as $user) {
    fwrite($stream, json_encode($user) . PHP_EOL);
}

echo number_format((((memory_get_usage() - $startMemory) / 1024) / 1024), 4), " MB" . PHP_EOL;