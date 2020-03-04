window.addEventListener('load',()=>{
  RoalStart();
  function RoalStart(){
    $('#score').fadeIn(1000);
    /*$('#score').animate({
      "fontSize":"15vw"
    });*/
    $('#score').css({
      "transform":"rotate(0deg)"
    });
  }
});
