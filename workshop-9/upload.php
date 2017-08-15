<?php

    //var_dump($_FILES);

    /**
     * @param string $storage
     * @return array
     */
    function getAllPictures($storage)
    {
        $images = array_filter(
            scandir($storage),
            function ($item){
                if ('.' == $item || '..' == $item){
                    return false;
                }
                return true;
            });
        return $images;
    }

    /**
     * @param string $storage - destination
     * @param string $htmlName - value of attribute "name" in form
     * @return void
     */
    function uploadAllPictures($storage, $htmlName)
    {
        $filesInfo = $_FILES[$htmlName];
        for ($i = 0; $i < count($filesInfo['name']); $i++) {
            move_uploaded_file(
                $filesInfo['tmp_name'][$i],
                $storage.$filesInfo['name'][$i]);
        }
    }

    uploadAllPictures(__DIR__."/gallery", 'uploadedfile');

    $images = getAllPictures(__DIR__."/gallery");

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
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadedfile[]" multiple="true"/>
        <input type="submit"/>
    </form>
    <div>
        <ul>
            <?php foreach ($images as $imagePath) { ?>
                <li>
                    <img src="<?php echo "gallery/".$imagePath; ?>" alt="aisud" width="200">
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
