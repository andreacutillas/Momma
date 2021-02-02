// REGISTRO

function check(){
  if (document.getElementById('signup_psw').value ==
    document.getElementById('signup_pswconfirm').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

function ValidateEmail() {
  var email_valor = document.getElementById('signup_email').value;
  var valido = document.getElementById('emailOK');

  var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if (email_valor.match(mailformat)) {
      valido.style.color ='green';
      valido.innerText = "Valid email address!";
  } else { 
      valido.innerText = "You have entered an invalid email address!";
  } 
}

function validar(){
  var psw_1 = document.getElementById('signup_psw').value;
  var psw_2 = document.getElementById('signup_pswconfirm').value;
  var email_valor= document.getElementById('signup_email').value;

  var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var match;

  if (email_valor.match(mailformat)) {
      match = "yes";
  } else { 
      match = "no";
  } 

  'use strict';
  if ((psw_1 != psw_2) && (match == "no")){
      document.getElementById('validaciones').style.display = 'block';
      document.getElementById('validaciones2').style.display = 'block';
      return false;
    
  } else if(psw_1 != psw_2){
      document.getElementById('validaciones').style.display = 'block';
      return false;

  } else if(match == "no") {
      document.getElementById('validaciones2').style.display = 'block';
      return false;
  } else {
    return true;
  }
}

function Trash_Error(){
    document.getElementById('validaciones').style.display= 'none';
    document.getElementById('validaciones2').style.display= 'none';

}