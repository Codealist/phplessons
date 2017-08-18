<?php
/**
 * Created by PhpStorm.
 * User: PHP
 * Date: 18.08.2017
 * Time: 20:30
 */
session_start();


$errorMessage = '';

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

$username = $_POST["username"];
$password = md5($_POST["password"]);


foreach ($users as $user) {
    if ($user['username'] == $username && $user["password"] == $password){
        $_SESSION["userid"] = $user["id"];
    }
}

if (isset($_SESSION["userid"])) {
    header("Location: /index.php");
} else {
    $errorMessage = "Wrong username or password";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div>
        <form method="post">
            <div><?= $errorMessage ?></div>
            <div>
                <input type="text" name="username" placeholder="Username"/>
            </div>
            <div>
                <input type="password" name="password" placeholder="Password"/>
            </div>
            <div>
                <input type="submit" value="Login"/>
            </div>
        </form>
    </div>
</body>
</html>
