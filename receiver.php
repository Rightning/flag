<?php
    require './database.php';
    $imageData = $_POST['img'];
    $Country = $_POST['country'];
    $Random = $_POST['random'];
    $filename = 'flag.jpg';
    $Data = explode(',',$imageData);
    $data = base64_decode($Data[1]);
    $database = new database();
    $Image = new image();
    $Image->setImage($Country ,"jpg",$data);//国名はとりあえずテストにしている
    $error = $database->insertImage($Image);//画像挿入
    $image = imagecreatefromstring($data);
    imagesavealpha($image, TRUE);
    imagejpeg($image, 'example.jpg');
    /*$fp = fopen($filename, 'w');
    fwrite($fp,$data);
    fclose($fp);*/

    ?>
