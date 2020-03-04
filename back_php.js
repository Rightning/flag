

window.addEventListener('load', () => {

  //ーーーーーーーーーーーー画面が開いたときのアニメーションの処理ーーーーーーーーーーーーーー

  setTransition();
  setPosition();
  function setTransition(){//各要素ごとにアニメーションの時間指定
    var time = '1.6s';
    $("#i4").css('transition','1.2s');
    $("button").css('transition',time);
    $("h1").css('transition',time);
    $("h2").css('transition',time);
    $("body").css('transition',time);
  }

  function setPosition(){//各要素をそれぞれの正しい位置へ移動
    $("#i4").css('top','0%');
    $("#i2").css('top','15%');
    $("#i3").css('top','50%');
    $("button").css('top','80%');
    $("h1").css('top','5%');
    $("h2").css('top','50%');
    $("body").css('background-color','#77D8FF');
  }


//ーーーーーーーーーーーーボタンにマウスが乗ったときの色変化の処理ーーーーーーーーーーーーーー


  $("button").hover(function() {
        $("#b1").css('transition','0.4s');
        $("#b1").css('background-color','#FF00FF');
        $("#b1").css('color','white');
    }, function(){
       $("#b1").css('background-color','white');
       $("#b1").css('color','black');
 });


});
