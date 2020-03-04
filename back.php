<?php
session_start();
$url="m_2.php";
$country = $_GET['country'];
$random = $_GET['random'];
$command="/usr/local/bin/python3 flagd/FlagDiscrimination.py";
exec($command,$output);
//$command="rm ".(string)$random.".jpg";
//exec($command);
if ($country == $output[0] ) {
  if(empty($_SESSION['score'])){
    $_SESSION['score']=(int)(($output[1]+0.05)*10.0);
    $_SESSION['num']=1;
  }else{
      $_SESSION['score']= $_SESSION['score']+(int)(($output[1]+0.05)*10.0);
      $_SESSION['num']= $_SESSION['num']+1;
  }
  $image="./image/true.png";
}else{
  if(empty($_SESSION['score'])){
    $_SESSION['score']=(int)($output[1]*0.0);
    $_SESSION['num']=1;
  }else{
      $_SESSION['score']=  $_SESSION['score']+($output[1]*0.0);
      $_SESSION['num']= $_SESSION['num']+1;
  }
  $image="./image/false.png";
}
if($_SESSION['num']<5){
}

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="back_php.css">
    <meta charset="utf-8">
    <title></title>
    <script src="back_php.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <h1><?php if($country == $output[0]){
      echo "成功";
    }else{
      echo $output[0];
      echo $output[1];
    } ?></h1>
    <img id ='i4' src="<?php echo $image?>" >
    <h2><?php echo '今回の得点:'.(int)(($output[1]+0.05)*10.0)*($country == $output[0])."点" ?></br><?php if ($_SESSION['num']<=4){  print("合計得点:".$_SESSION['score']."点");} ?></h2>
    <h3><?php if($_SESSION['num']<=4){
      echo  '<button id="next" >次の問題へ</button>';
    } elseif ($_SESSION['num']>=5) {
      $score=$_SESSION['score'];
      $_SESSION=array();
      echo  '<button id="finish" >結果</button>';
    }?></h3>
    <script>
    $("#next").click(function() {
  window.location.href = 'http://localhost/IteamFlag/m_1.php';
    });
    $("#finish").click(function(){
      var score =  <?php echo json_encode($score) ?>;
      window.location.href = 'http://localhost/IteamFlag/score.php?score='+score;

    });
    </script>
  </body>
</html>
