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
  if(document.getElementById('pasw').value === document.getElementById('pasw2').value){
      return false;
  }
  else{
      document.getElementById('validaciones').style.display = 'block';
      return true;
  }
}

