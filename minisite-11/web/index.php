<?php
session_start();
require_once __DIR__."/../app/bootstrap.php";
require_once LIB_DIR."http.php";
require_once APP_DIR."kernel.php";

$request = http\getRequest();
$headers[CONTENT_TYPE] = HTML;
$response = http\makeResponse('Unknown error', 500, $headers);

kernel\handleRequest($request, $response);

http\sendResponse($response);