// MENU

function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

// VALIDAR REGISTRO

function validar(){
  'use strict';
  if(document.getElementById('psw').value === document.getElementById('psw2').value){
      return true;
  }
  else{
      document.getElementById('validaciones').style.display = 'block';
      return false;
  }
}

