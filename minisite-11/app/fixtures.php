<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */

include_once __DIR__."/bootstrap.php";
include_once LIB_DIR."/storage.php";

$users = [
    [
        "username" => "dmytro",
        "password" => "956dfec748aad6a7d331ced69bbb1898",
        "id" => 92384
    ],
    [
        "username" => "afanasiy",
        "password" => "10cac3e72a96453bfbca1595de4073ee",
        "id" => 97345
    ]
];

$stg = storage\connectForWrite(STORAGE_DIR."/users.stg");
foreach ($users as $user) {
    storage\insertRow($stg, $user);
}
storage\closeConnection($stg);
