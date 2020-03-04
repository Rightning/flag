window.addEventListener('load', () => {
  $('#send').click(function() {
      // body部パラメーター
      var message=document.getElementById("Message").value;
      var re = confirm("ご意見を送信しますか？");
      if(re) {
      $.ajax({
          url: './SendMessage.php',
          type: 'POST',
          data: {message:message},
          dataType: 'json',
        })
      .then(
        function(data){

      },
    function(jqXHR, textStatus, errorThrown) {
      });
        message.innerHTML = "";
          } else {
            //いいえを選んだときの処理
        }
//      initEventHandler();
    });
});
