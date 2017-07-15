<?php

$fName = isset($_GET['f'])
    ? $_GET['f']
    : "Stranger";

$lName = isset($_GET['l'])
    ? $_GET['l']
    : "";

echo "Hello {$fName} {$lName}" . PHP_EOL;