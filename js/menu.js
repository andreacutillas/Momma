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
} REGISTRO

function validar(){
  'use strict';
  console.log(document.getElementById('signup_psw').value);
  console.log(document.getElementById('signup_pswconfirm').value);
  if(document.getElementById('signup_psw').value === document.getElementById('signup_pswconfirm').value){
      return true;
  }
  else{
      
      document.getElementById('validaciones').style.display = 'block';
      return false;
  }
}

function ValidateEmail(inputText){
  var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(inputText.value.match(mailformat)){
    alert("Valid email address!");
    document.form1.text1.focus();
    return true;
    }
    else
    {
    alert("You have entered an invalid email address!");
    document.form1.text1.focus();
    return false;
  }
}

