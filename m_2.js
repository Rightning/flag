// ページの読み込みが完了したらコールバック関数が呼ばれる
// ※コールバック: 第2引数の無名関数(=関数名が省略された関数)
window.addEventListener('load', () => {

  const canvas = document.querySelector('#draw-area');
  // contextを使ってcanvasに絵を書いていく
  const context = canvas.getContext('2d');
  const ctx=context;
  //ボタンの値取得
  const stamp_blind = document.getElementById("stamp");
  const color_blind = document.getElementById("color");
  const pen_bind = document.getElementById("pen");
  //const size_blind = document.getElementById("stamp_size");
  var draw_stamp_check;
  ctx.fillStyle="#ffffff";
  //白色設定をし、最初からcanvasを白塗りする。(白塗りしないとjpegにしたとき色がないところが黒くなるため)
  context.fillStyle= '#ffffff';
  //最初にcanvasを白塗りする。
  context.fillRect(0,0, canvas.width,canvas.height);
  // 直前のマウスのcanvas上のx座標とy座標を記録する
  const lastPosition = { x: null, y: null };

  // マウスがドラッグされているか(クリックされたままか)判断するためのフラグ
  let isDrag = false;

  // 絵を書く
  function draw(x, y) {
    // マウスがドラッグされていなかったら処理を中断する。
    // ドラッグしながらしか絵を書くことが出来ない。
    if(!isDrag) {
      return;
    }
    if(draw_stamp_check=="pen"){
    var color= document.getElementById("color");
    var element = document.getElementById( "line" ) ;

    // form要素内のラジオボタングループ(Line)を取得
    var radioNodeList1 = element.Line ;
    var size = radioNodeList1.value ;
    // 選択状態の値(色)の取得
    var radioNodeList2 = color.iro;
    var color_1 = radioNodeList2.value;
    // 「context.beginPath()」と「context.closePath()」を都度draw関数内で実行するよりも、
    // 線の描き始め(dragStart関数)と線の描き終わり(dragEnd)で1回ずつ読んだほうがより綺麗に線画書ける

    // 線の状態を定義する
    // MDN CanvasRenderingContext2D: https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/lineJoin
    context.lineCap = 'round'; // 丸みを帯びた線にする
    context.lineJoin = 'round'; // 丸みを帯びた線にする
    context.lineWidth = size; // 線の太さ
    context.strokeStyle = color_1;//線の色
     // 線の色

    // 書き始めは lastPosition.x, lastPosition.y の値はnullとなっているため、
    // クリックしたところを開始点としている。
    // この関数(draw関数内)の最後の2行で lastPosition.xとlastPosition.yに
    // 現在のx, y座標を記録することで、次にマウスを動かした時に、
    // 前回の位置から現在のマウスの位置まで線を引くようになる。
    if (lastPosition.x === null || lastPosition.y === null) {
      // ドラッグ開始時の線の開始位置
      context.moveTo(x, y);
    } else {
      // ドラッグ中の線の開始位置
      context.moveTo(lastPosition.x, lastPosition.y);
    }
    // context.moveToで設定した位置から、context.lineToで設定した位置までの線を引く。
    // - 開始時はmoveToとlineToの値が同じであるためただの点となる。
    // - ドラッグ中はlastPosition変数で前回のマウス位置を記録しているため、
    //   前回の位置から現在の位置までの線(点のつながり)となる
    context.lineTo(x, y);

    // context.moveTo, context.lineToの値を元に実際に線を引く
    context.stroke();

    // 現在のマウス位置を記録して、次回線を書くときの開始点に使う
    lastPosition.x = x;
    lastPosition.y = y;

  }
};
  // canvas上に書いた絵を全部消す
  function clear() {
    //白塗りで全消しをする。

    ctx.fillRect(0,0, canvas.width,canvas.height);
  }
  //canvas内のデータを画像化
    $('#save').click(function() {

        // body部パラメーター
        var data = {};
        // Canvasのデータをbase64でエンコードした文字列を取得
        var image_canvas = document.getElementById('draw-area');
        var canvasData=image_canvas.toDataURL("image/jpeg");
        var r = Math.floor(Math.random()*10000);
        // 不要な情報を取り除く
        //canvasData = canvasData.replace(/^data:image\/png;base64,/, '');
        var res = confirm("これでいいですか？");
        console.log(canvasData);

       if(res) {
        //はいを選んだときの処理
        $.ajax({
            url: './receiver.php',
            type: 'POST',
            data: {img:canvasData,country:Flag},
            dataType: 'json',
          })
        .then(
          function(data){
              alert("成功")

        },
      function(jqXHR, textStatus, errorThrown) {
            // 失敗時の処理

        });
        window.location.href = 'http://localhost/IteamFlag/back.php?country='+Flag;
        //location.reload(true);
            } else {
              //いいえを選んだときの処理
          }
    });
    //スタンプ
    function stamp(x_s,y_s){
      if(draw_stamp_check=="stamp"){

        // 選択状態の値(色)の取得
        var radioNodeList2 = color.iro;
        var color_1 = radioNodeList2.value;
        //サイズの取得
        var radioNodeList3 = stamp_size.S_size;
        var size = radioNodeList3.value;
        //どのスタンプかを判別するための値
        var radioNodeList4=stamp_kind.st_k;
        var kind=radioNodeList4.value;
        console.log(kind);
        if(kind=="star"){
          context.fillStyle=color_1;
          context.moveTo(x_s-25*size,y_s);
          context.lineTo(x_s+25*size,y_s);
          context.lineTo(x_s-15*size,y_s+25*size);
          context.lineTo(x_s,y_s-15*size);
          context.lineTo(x_s+15*size,y_s+25*size);
          context.lineTo(x_s-25*size,y_s);
          context.fill();
        }else if(kind=="seven"){
          context.fillStyle=color_1;
          ctx.moveTo(x_s,y_s-23*size);
          ctx.lineTo(x_s-5*size,y_s-5*size);
          ctx.lineTo(x_s-20*size,y_s-15*size);
          ctx.lineTo(x_s-10*size,y_s+5*size);
          ctx.lineTo(x_s-28*size,y_s+12*size);
          ctx.lineTo(x_s-7*size,y_s+14*size);
          ctx.lineTo(x_s-15*size,y_s+33*size);
          ctx.lineTo(x_s,y_s+20*size);
          ctx.lineTo(x_s+15*size,y_s+33*size);
          ctx.lineTo(x_s+7*size,y_s+14*size);
          ctx.lineTo(x_s+28*size,y_s+12*size);
          ctx.lineTo(x_s+10*size,y_s+5*size);
          ctx.lineTo(x_s+20*size,y_s-15*size);
          ctx.lineTo(x_s+5*size,y_s-5*size);
          ctx.lineTo(x_s,y_s-23*size);
          ctx.fill();
        }

            context.fillStyle="#ffffff";
          }
    };
  //canvasに書いた絵の保存

  // マウスのドラッグを開始したらisDragのフラグをtrueにしてdraw関数内で
  // お絵かき処理が途中で止まらないようにする
  function dragStart(event) {
    // これから新しい線を書き始めることを宣言する
    // 一連の線を書く処理が終了したらdragEnd関数内のclosePathで終了を宣言する

    context.beginPath();

    isDrag = true;
  }
  // マウスのドラッグが終了したら、もしくはマウスがcanvas外に移動したら
  // isDragのフラグをfalseにしてdraw関数内でお絵かき処理が中断されるようにする
  function dragEnd(event) {
    // 線を書く処理の終了を宣言する

    context.closePath();
    isDrag = false;

    // 描画中に記録していた値をリセットする
    lastPosition.x = null;
    lastPosition.y = null;
  }
  //ペン選択ボタンを押した時のそれぞれのボタンの出現の変化
  function change_pen(){


  	if(pen_bind.style.display=="none"){
  		// hiddenで非表示
      document.getElementById("change_pen").style.backgroundColor = '#555555';
      document.getElementById("change_pen").style.color = 'white';
      document.getElementById("change_stamp").style.backgroundColor = 'white';
      document.getElementById("change_stamp").style.color = '#555555';

      color_blind.style.display="block";
      pen_bind.style.display="block";
      stamp_blind.style.display="none";
      //size_blind.style.visibility="hidden";
      //size_blind.style.opacity = 0;
      draw_stamp_check="pen";
  	}
  };
  //スタンプ選択ボタンを押した時のそれぞれのボタンの出現の変化
  function change_stamp(){


    if(stamp_blind.style.display=="none"){
      document.getElementById("change_stamp").style.backgroundColor = '#555555';
      document.getElementById("change_stamp").style.color = 'white';
      document.getElementById("change_pen").style.backgroundColor = 'white';
      document.getElementById("change_pen").style.color = '#555555';
  		// hiddenで非表示
      color_blind.style.display="block";
      pen_bind.style.display="none";
      stamp_blind.style.display="block";
      //size_blind.style.visibility="visible";
      //size_blind.style.opacity = 1;
      draw_stamp_check="stamp";
  	}
  };

  // マウス操作やボタンクリック時のイベント処理を定義する
  function initEventHandler() {
    const clearButton = document.querySelector('#clear-button');
    const save_btn=document.querySelector('#save');
    const change_pen_button=document.querySelector("#change_pen");
    const change_stamp_button=document.querySelector("#change_stamp");
    change_pen_button.addEventListener('click',change_pen);
    change_stamp_button.addEventListener('click',change_stamp);
    clearButton.addEventListener('click', clear);
    canvas.addEventListener('mousedown', dragStart);
    canvas.addEventListener('mouseup', dragEnd);
    canvas.addEventListener('mouseout', dragEnd);
    canvas.addEventListener('mousemove', (event) => {
      // eventの中の値を見たい場合は以下のようにconsole.log(event)で、
      // デベロッパーツールのコンソールに出力させると良い
      draw(event.layerX, event.layerY);
    });
    canvas.addEventListener('click',(event)=>{
      stamp(event.layerX,event.layerY);
    });
  }

  // イベント処理を初期化する
  initEventHandler();
});
