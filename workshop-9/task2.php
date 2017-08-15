<?php

    function getTopWordsByLength($input1, $results = 3)
    {
        $input = explode(" ", $input1);
        $output = [];
        foreach ($input as $word) {
            $output[$word] = strlen($word);
        }

        arsort($output);
        return array_slice($output, 0, $results);
//        return $output;
    }


    $text1 = $_POST['text1'];

    $top3 = getTopWordsByLength($text1);



    var_dump($top3);


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
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>
