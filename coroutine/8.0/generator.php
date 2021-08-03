<?php

$stream = fopen('./users.csv', 'w');


fwrite($stream, implode(',', [
        "email",
        "firstName",
        "lastName",
    ]) . PHP_EOL);

for ($i = 1; $i <= 1000000; $i++) {
    fwrite($stream, implode(',', [
        "user{$i}@example.com",
        "FirstName{$i}",
        "LastName{$i}",
    ]) . PHP_EOL);
}