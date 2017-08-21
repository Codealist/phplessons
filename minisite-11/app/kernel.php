<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */
namespace kernel;

/**
 * Public
 * @param array $request
 * @param array $response
 */
function handleRequest(array $request, array &$response)
{
    $route = parseRoute($request);

    $action = sprintf("controllers\\%s", $route['action']);

    require_once APP_DIR."controllers.php";

    $response = call_user_func($action, $response, $route['params']);
}

/**
 * Private
 * @param array $request
 * @return array
 */
function parseRoute(array $request)
{
    $action = "index";

    if (isset($request['params']['r'])) {
        $action = strtolower($request['params']['r']);
    }
    $action .= "Action";
    $params = $request['params'];

    return [
        'action' => $action,
        'params' => $params
    ];
}

/**
 * @param $sessKey
 * @param string $loginPath
 */
function checkLogin($sessKey, $loginPath = "/index.php?r=login")
{
    if (!isset($_SESSION[$sessKey]) || !$_SESSION[$sessKey]) {
        header("Location: {$loginPath}");
    }
}