// MENU

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
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

function abrirmenu() {
  "use strict";
  
  var mimenu = document.getElementById("menu");
  var btnmenuuno = document.getElementById("linea1");
  var btnmenudos = document.getElementById("linea2");


  var header = document.getElementById("headerIndex");

  // header.classList.contains('abro');

  if ( mimenu.style.left === "0%" ) {
      
    // header.classList.remove('abro');

      // alert('cierro');
      console.log(mimenu.style.left);

      mimenu.style.left= "-100%";
      
      btnmenuuno.style.transform = "translateY(-7px)";
      btnmenudos.style.transform = "translateY(7px)";

  }
      
  else {

    // header.classList.add('abro');

    // alert('abro');
      console.log(mimenu.style.left);

      mimenu.style.left= "0%";

      btnmenuuno.style.transform = " rotate(-45deg)";
      btnmenudos.style.transform = " rotate(45deg)";
      
  }
}

// VALIDAR REGISTRO

function validar(){
  'use strict';
  if(document.getElementById('pasw').value === document.getElementById('pasw2').value){
      return false;
  }
  else{
      document.getElementById('validaciones').style.display = 'block';
      return true;
  }
}

