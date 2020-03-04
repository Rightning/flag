<?php
    require './messagedb.php';
    $database = new message();
    //$database->setImage($Country ,"jpg",$data);
    $list = $database->getMessage($Message);//画像挿入
    $size = count($list);
?>
<html lang = "ja">
<head>
  <meta charset = "utf-8">
  <title>GetMessage</title>
</head>
<body>
<?php
    for ($i = 0 ;$i < $size;$i++){
      //header('Content-Disposition: filename="'.$filename.'"');
      echo '<a>'.$list[$i]["id"].":".$list[$i]["message"].'</a></br>';
      //echo '<img src="./file.'.$Image[$i]['extension'].'">';
    }
?>
</body>
</html>
