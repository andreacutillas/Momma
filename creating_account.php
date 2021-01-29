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
        $peticion = 'SELECT mail FROM usuario WHERE mail="'.$_POST['email'].'"';
       // echo $peticion;
        $resultados = $mysqli->query($peticion);
        if($resultados->num_rows == 0)
        {
            $pass = $_POST['psw'];
            $pass2 = $_POST['psw2'];

            if($pass == $pass2){

                //INSERT INTO `usuarios` (`idUsuario`, `usuario`, `clave`) VALUES (NULL, 'Manolo', '5555');
                $peticionEscritura = 'INSERT INTO usuario (idUser, idName, lastname, mail, pass) VALUES (NULL, "'.$_POST['first_name'].'" , "'.$_POST['last_name'].'", "'.$_POST['email'].'" , "'.$_POST['psw'].'")' ;
                //echo $peticionEscritura;
                $mysqli->query($peticionEscritura);
                
                session_start();
                $_SESSION['nombre'] = $_POST['email'];
                header('Location: index.php');
            }

            else {
                header('Location: create_account.php?error2=6');
            }
            
        }
        
        else{
            header('Location: create_account.php?error2=9');
        }
    }
}
else{
    header('Location: create_account.php?error2=7');
}


?>