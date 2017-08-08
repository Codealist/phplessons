<?php

require_once "bootstrap.php";

if (isset($_POST['name']) && isset($_POST['comment'])){
    require_once LIB_DIR."storage.php";
    require_once LIB_DIR."formutils.php";

    $storage = \storage\connectForWrite(STORAGE_FILE);
    $comment = $_POST;
    $comment['comment'] = \form\censor(
        $comment['comment'], $restrictedWords);
    \storage\insertRow($storage, $comment, true);
}