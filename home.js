window.addEventListener('load', () => {

  //ーーーーーーーーーーーー画面が開いたときのアニメーションの処理ーーーーーーーーーーーーーー

  setTransition();
  setPosition();
  function setTransition(){//各要素ごとにアニメーションの時間指定
    var time = '1.6s';
    $("img").css('transition','1.2s');
    $("button").css('transition',time);
    $("h1").css('transition',time);
    $("body").css('transition',time);
  }

  function setPosition(){//各要素をそれぞれの正しい位置へ移動
    $("#i1").css('top','0%');
    $("#i2").css('top','15%');
    $("#i3").css('top','50%');
    $("button").css('top','60%');
    $("h1").css('top','10%');
    $("body").css('background-color','#77D8FF');
  }


//ーーーーーーーーーーーーボタンにマウスが乗ったときの色変化の処理ーーーーーーーーーーーーーー




});
