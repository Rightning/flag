<?php
$plus="./";
foreach(glob("flag/*.*") as $file) {
    $result[] = $plus.$file;
    $file=$file = str_replace('flag/', '', $file);
    $file=$file = str_replace('.png', '', $file);
    $flag_name[]=$file;
}
$num=rand(0,39);
$flag_japan_name=array("ブラジル","カナダ","コンゴ","スイス","コートジボアール","中国","コロンビア","キューバ","ドイツ","フランス","ギリシア","オーストラリア","インドネシア","アイルランド","インド","アイスランド","イタリア","ジャマイカ","ヨルダン","日本","北朝鮮","韓国","ラオス",
"モロッコ","モーリタニア","ナイジェリア","オランダ","ノルウェー","ニュージーランド","パナマ","ポーランド","ロシア","イギリス","タイ","トルコ","台湾","ウクライナ","アメリカ","ベトナム","南アフリカ");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./image/icon.png">
  <link rel="stylesheet" href="./main.css">
  <link rel="stylesheet" href="./mondai.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お絵かきアプリ</title>

</head>
<body>
  <div>
  <h1>問題</h1>
  <h2><?php echo $flag_japan_name[$num]."を描いてください"; ?></h2>
  <div style="float:left">


  <canvas
    id="draw-area"
    width="600px"
    height="400px"
    style="border: 1px solid #000000;"></canvas>
    </div>
      <!-- <div style="float:left">
        <img border="1" src=<?php echo $result[$num] ?> width="600" height="400" >
      </div> -->
  <div style="clear:both">
    </br>
  <button id="clear-button">全消し</button>
  </br>
    <form id="stamp_draw">
      <input type="button"  value="ペン" id="change_pen">
      <input type="button"  value="スタンプ" id="change_stamp">
    </form>
    </br>
    </br>
    <!--スタンプの内容 -->
    <div id ='stamp'>
    <div>スタンプの形</div>
    <form id="stamp_kind">
      <input type="radio" name="st_k" value="star" checked id="five"><label for="five">星</label>
      <input type="radio" name="st_k" value="seven" id="seven"><label for="seven">七芒星</label>
    </form>
    <!-- スタンプのサイズ-->
    <div>スタンプの大きさ</div>
    <form id="stamp_size">
      <input type="radio" name="S_size" value=3 id="dai"><label for="dai">大</label>
      <input type="radio" name="S_size" value=2 id="tyu"><label for="tyu">中</label>
      <input type="radio" name="S_size" value=0.5 checked id="syou"><label for="syou">小</label>
    </form>
  </div>
  <div id ='pen'>
    <div>ペンの大きさ</div>
    <form id="line">
      <input name="Line" type="radio" value=70 id="ls70"><label for="ls70">極太</label>
      <input name="Line" type="radio" value=50 id="ls50"><label for="ls50">太い</label>
      <input name="Line" type="radio" value=35 id="ls35"><label for="ls35"> 普通</label>
    	<input name="Line" type="radio" value=25 checked id="ls25"><label for="ls25">細い</label>
    	<input name="Line" type="radio" value=10 id="ls10"><label for="ls10"> 極細</label>
      <input name="Line" type="radio" value=3 id="ls3"><label for="ls3"> 超極細</label>
    </form>
  </div>
    <form id="color">
      <div>色</div>
      <input name="iro" type="radio" value="black" id="black"><label for="black"> 黒</label>
      <input name="iro" type="radio" value="white" id="white"><label for="white"> 白</label>
      <input name="iro" type="radio" value="red" checked id="red"><label for="red"> 赤</label>
      <input name="iro" type="radio" value="orange" id="orange"><label for="orange">橙</label>
      <input name="iro" type="radio" value="yellow" id="yellow"><label for="yellow"> 黄</label>
      <input name="iro" type="radio" value="green" id="green"><label for="green"> 緑</label>
      <input name="iro" type="radio" value="darkgreen" id="darkgreen"><label for="darkgreen"> 深緑</label>
      <input name="iro" type="radio" value="blue" id="blue"><label for="blue"> 青</label>
      <input name="iro" type="radio" value="midnightblue" id="midnightblue"><label for="midnightblue"> 深青</label>
      <input name="iro" type="radio" value="white" id="erase"><label for="erase">消しゴム</label>
    </form>
  </br>
<button id="save" >完成</button>
<script>
var Flag = "<?php echo $flag_name[$num] ?>";
</script>
<h3>ご意見をお聞かせください</h3>
<form onsubmit="return false;">
<input id="Message" type="text" name="Message" value="" size="80">
<br/>
<button id="send">送信</button>
  </form>
  <script type="text/javascript"></script>
  </script>

</form>
<script>
//初期表示は非表示
document.getElementById("stamp").style.display="none";
document.getElementById("color").style.display="none";
document.getElementById("pen").style.display ="none";
//document.getElementById("stamp_size").style.visibility="hidden";
</script>
</div>
<img id="output" src="">
<script src="js/jquery-3.4.1.min.js"></script>
  <script src="./m_2.js"></script>
  <script src="./SendMessage.js">

  </script>
</div>
</body>
</html>
