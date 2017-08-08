<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */
namespace controller;

include_once "bootstrap.php";
require_once LIB_DIR."storage.php";
include_once LIB_DIR."formutils.php";

$storage = \storage\connectForRead(STORAGE_FILE);

$comments = [];

while ($line = fgets($storage)){
    $data = unserialize($line);
    array_push($comments, \form\escapeTags($data));
}

\storage\closeConnection($storage);