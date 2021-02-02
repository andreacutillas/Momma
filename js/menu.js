// MENU

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function abrirmenu() {
  "use strict";
  
  var mimenu = document.getElementById("menu");
  var btnmenuuno = document.getElementById("linea1");
  var btnmenudos = document.getElementById("linea2");


  var header = document.getElementById("headerIndex");


  if ( mimenu.style.left === "0%" ) {

      console.log(mimenu.style.left);

      mimenu.style.left= "-100%";
      
      btnmenuuno.style.transform = "translateY(-7px)";
      btnmenudos.style.transform = "translateY(7px)";
      btnmenudos.style.background = 'black';
      btnmenuuno.style.background = 'black'; 
      btnmenuuno.style.transition = '0.5s'; 
      btnmenudos.style.transition = '0.5s'; 

  }
      
  else {

      console.log(mimenu.style.left);

      mimenu.style.left= "0%";

      btnmenuuno.style.transform = " rotate(-45deg)";
      btnmenuuno.style.background = 'white';
      btnmenudos.style.transform = " rotate(45deg)";   
      btnmenudos.style.background = 'white';   
  }
} 

// RESPONSIVE

$(window).on('load',function(){

  $(".logo").click(function (){
      $(location).attr('href',"index.php")
  });

$(".btn-store").click(function (){
      $(location).attr('href',"store.php")
  });
  
  $(".btn-about").click(function (){
      $(location).attr('href',"about.php")
  });
  
  $(".btn-cart").click(function (){
      $(location).attr('href',"cart.php")
  });

});