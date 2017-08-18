<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */



if (isset($_GET['raw']) && true == (bool) $_GET['raw']) {
    $contentType = "text/html";
} else {
    $contentType = "application/pdf";
}

header("Content-type: {$contentType}");

echo file_get_contents("./files/github.pdf");