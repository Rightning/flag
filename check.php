<?php
//動作検証用のファイル
session_start();
//require './image.php';
require './database.php';
$database = new database();
$Image = $database->GetImage();//画像挿入
$size = count($Image);

?>
<html lang = "ja">
<head>
  <meta charset = "utf-8">
  <title>test</title>
</head>
<body>
  <form action='test.php' enctype="multipart/form-data" method = "post">
    <?php
    for ($i = 0 ;$i < $size;$i++){
      $filename = $Image[$i]['country'].$Image[$i]['id'];
      //header('Content-Disposition: filename="'.$filename.'"');
      $data = base64_encode($Image[$i]['data']);
      echo '<img id="'.$filename.'" src="data:image/'.$Image[$i]['extension'].';base64,'.$data.'" ></br>';
      //echo '<img src="./file.'.$Image[$i]['extension'].'">';
    }
     ?>
  </form>
</body>
</html>
