<?php
    if(!isset($_POST['email'])){
        header('Location: index.php?error=2');
    }

    $mysqli = new mysqli('localhost', 'root', '', 'moma');
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno){
        //echo "Conexión fallida";
        header('Location: index.php?error=3');
    }

    //echo "Conexión exitosa";
    $peticion1 = 'SELECT * FROM usuario WHERE mail="'.$_POST['email'].'"';
    $peticion2 = 'SELECT lastname FROM usuario WHERE mail="'.$_POST['email'].'"';
    // echo $peticion;
    $datos_usuario = $mysqli->query($peticion1);

    $_SESSION['usuario'] = $datos_usuario['lastname'] ;


?>