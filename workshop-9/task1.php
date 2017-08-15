<?php

    function getCommonWords($input1, $input2)
    {
        $input1 = explode(" ", $input1);
        $input2 = explode(" ", $input2);
        return array_intersect($input1, $input2);
    }


    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];

    $intersection = [];
    $intersection = getCommonWords($text1, $text2);



    var_dump($intersection);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <textarea name="text1" id="t1" cols="30" rows="10"></textarea>
        <textarea name="text2" id="t2" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>
