<?php
namespace http;

define("CONTENT_TYPE", "Content-type");
define("JSON", "application/json");
define("HTML", "text/html");


/**
 * @Public
 *
 */
function &getRequest()
{
    $request = [];
    $request['server'] = $_SERVER;
    $request['session'] = &$_SESSION;
    $request['cookies'] = $_COOKIE;
    $request['params'] = $_GET;
    $request['body'] = unpackBody();

    return $request;
}

/**
 * @Private
 *
 * Gets request payload (body) from input stream
 * For POST, PUT, PATCH, DELETE
 *
 * @return array
 */
function unpackBody()
{
    $rawBody = file_get_contents("php://input");
    $arrBody = [];
    parse_str($rawBody, $arrBody);
    cleanBody($arrBody);

    return $arrBody;
}

/**
 * @Private
 *
 * Fit array to cannonical form:
 * if it contains more/eq than 1 element (pair key=val) - keeps as is
 * if it contains exactly 1 element without key - flips to form [0 => "sent data"]
 *
 * @param array &$arrBody
 * @return void
 */
function cleanBody(array &$arrBody)
{
    if (1 == count($arrBody) && !current($arrBody)) {
        $arrBody[] = $tempKey = key($arrBody);
        unset($arrBody[$tempKey]);
    }
}

/**
 * @Public
 *
 *
 * @param $content
 * @param int $code - HTTP status code
 * @param array $headers
 * @return array
 */
function &makeResponse($content, $code = 200, array $headers = [])
{
    $response = [];

    $response['body'] = $content;
    $response['code'] = $code;
    $response['headers'] = $headers;

    return $response;
}

/**
 * @param array $response
 * @return void
 */
function sendResponse(array $response)
{
    if (!array_key_exists('code', $response)
        || !array_key_exists('headers', $response)
        || !array_key_exists('body', $response)
    ) {
        die("Response should be in cannonical format");
    }

    http_response_code($response['code']);
    foreach ($response['headers'] as $header => $value) {
        $stringHeader = sprintf("%s: %s", $header, $value);
        header($stringHeader);
    }

    echo $response['body'];
}