<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 18.08.2017
 * Time: 20:02
 */
session_start();

if (!isset($_SESSION["userid"])){
    header("Location: /login.php");
}

if ( isset($_GET["lang"])
     && in_array($_GET["lang"], ["ua", "ru"])
) {
    setcookie("language", $_GET["lang"]);
} else {
    if (!isset($_COOKIE["language"])){
        setcookie("language", "ua");
    }
}

switch ($_COOKIE["language"]) {
    case "ru":
        include "page_ru.html";
        break;
    case "ua":
    default:
        include "page_ua.html";
}




