<?php
$score=$_GET['score'];
//$score=10;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="score.js"></script>
    <link rel="stylesheet" href="score.css">
    <link rel="stylesheet" href="main.css">
    <title></title>
  </head>
  <body>
<h1 id='text'>あなたの点数は</h1>
<h1 id='score'><a id = num><?php echo $score;?></a><a id = ten>点！！</a></h1>
<!-- <h2><a href='http://localhost/IteamFlag/m_2.php'>戻る</h2> -->
  <input type="button" onclick="location.href='http://localhost/IteamFlag/home.html'" value="戻る">
  <img id='img' src="./image/final.png" >
  </body>
</html>
