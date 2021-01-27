<?php
if(isset($_POST['email']))
{
    $mysqli = new mysqli('localhost', 'root', '', 'moma');
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno){
        //echo "Conexión fallida";
        header('Location: create_account.php?error=3');
    }
    else{
        //echo "Conexión exitosa";
        $peticion = 'SELECT mail FROM user WHERE mail="'.$_POST['email'].'"';
       // echo $peticion;
        $resultados = $mysqli->query($peticion);
        if($resultados->num_rows == 0)
        {
            //INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`) VALUES (NULL, 'Manolo', '5555');
            $peticionEscritura = 'INSERT INTO user (idUser, idName, lastname, mail, pass) VALUES (NULL, "'.$_POST['first_name'].'" , "'.$_POST['last_name'].'", "'.$_POST['email'].'" , "'.$_POST['psw'].'")' ;
            //echo $peticionEscritura;
            $mysqli->query($peticionEscritura);
            
            session_start();
            $_SESSION['nombre'] = $_POST['email'];
            header('Location: home.php');
        }
        
        else{
            header('Location: create_account.php?error=4');
        }
    }
    
}
else{
    header('Location: create_account.php?error=2');
}


?>