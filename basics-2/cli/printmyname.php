<?php

$fName = isset($argv[1])
    ? $argv[1]
    : "Stranger";

$lName = isset($argv[2])
    ? $argv[2]
    : "";

echo "Hello {$fName} {$lName}" . PHP_EOL;