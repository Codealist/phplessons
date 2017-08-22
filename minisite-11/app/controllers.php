<?php
/**
 * @author Dmytro Samchuk <codealist@gmail.com>
 */
namespace controllers;

include_once "bootstrap.php";
require_once LIB_DIR."storage.php";
require_once LIB_DIR."render.php";
include_once LIB_DIR."formutils.php";
require_once LIB_DIR."storage.php";

/**
 * Route r=index
 *
 * @param $response
 * @param $params
 * @return array
 */
function indexAction($response, $params)
{
    \kernel\checkLogin("userid");
    $content = \renderTemplate(VIEW_DIR."index.phtml");
    if ($content) {
        $response['code'] = 200;
    }
    $response['body'] = \getFullHtml($content, VIEW_DIR."layout.phtml", ['title' => 'Main page']);

    return $response;
}

/**
 * Route r=articles
 *
 * @param $response
 * @param $params
 * @return array
 */
function articlesAction($response, $params)
{
    global $request;

    $restrictedWords = [
        "Idiot", "Asshole", "Дурень",
        "Дебилоид"
    ];

    if (isset($request['body']['name']) && isset($request['body']['comment'])){
        require_once LIB_DIR."storage.php";
        require_once LIB_DIR."formutils.php";

        $storage = \storage\connectForWrite(STORAGE_DIR."comments.stg");
        $comment = $request['body'];
        $comment['comment'] = \form\censor(
            $comment['comment'], $restrictedWords);
        \storage\insertRow($storage, $comment, true);
    }

    $storage = \storage\connectForRead(STORAGE_DIR."comments.stg");

    $comments = [];

    while ($line = fgets($storage)){
        $data = unserialize($line);
        $data['comment'] = \form\escapeTags($data['comment']);
        array_push($comments, $data);
    }

    \storage\closeConnection($storage);

    $context = ['comments' => $comments];
    $context['user'] = isset($_SESSION['username'])
        ? $_SESSION['username']
        : null;

    $content = \renderTemplate(VIEW_DIR."comments.phtml", $context);
    if ($content) {
        $response['code'] = 200;
    }
    $response['body'] = \getFullHtml($content, VIEW_DIR."layout.phtml", ['title' => 'Comments']);

    return $response;
}

/**
 * Route r=login
 *
 * @param $response
 * @param $params
 * @return array
 */
function loginAction($response, $params)
{
    global $request;

    $username = isset($request['body']["username"])
        ? $request['body']["username"]
        : null;
    $password = isset($request['body']["password"])
        ? md5($request['body']["password"])
        : null;

    if ($username && $password) {
        $stg = \storage\connectForRead(STORAGE_DIR."users.stg");

        while ($line = fgets($stg)){
            $user = unserialize($line);
            if ($user['username'] == $username && $user["password"] == $password){
                $request['session']["userid"] = $user["id"];
                $request['session']["username"] = $user["username"];
            }
        }
        \storage\closeConnection($stg);
    }

    $errorMessage = '';
    if (isset($_SESSION["userid"])) {
        $response['headers'][REDIRECT] = "/index.php?r=index";
        $response['code'] = 302;
    } else {
        $errorMessage = "Wrong username or password";
    }

    $content = \renderTemplate(VIEW_DIR."login.phtml", ['errorMessage' => $errorMessage]);
    $response['body'] = \getFullHtml($content, VIEW_DIR."layout.phtml", ['title' => 'Login']);
    $response['code'] = 200;

    return $response;
}

/**
 * Route r=logout
 *
 * @param $response
 * @param $params
 */
function logoutAction($response, $params)
{
    \kernel\checkLogin("userid");
    session_destroy();
    $redirect = sprintf("%s: %s", REDIRECT, "index.php?r=login");
    header($redirect);
}