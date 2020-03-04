<?php
    require './messagedb.php';
    $Message = $_POST['message'];
    echo $Message;
    $database = new message();
    //$database->setImage($Country ,"jpg",$data);
    $error = $database->insertMessage($Message);//画像挿入
    echo $error;
?>
