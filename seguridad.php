<?php
if(isset($_POST['email']))
{
    $mysqli = new mysqli('localhost', 'root', '', 'moma');
    $mysqli->set_charset('utf8');
    
    if($mysqli->connect_errno){
        //echo "Conexión fallida";
        header('Location: index.php?error=3');
    }
    else{
        //echo "Conexión exitosa";
        $peticion = 'SELECT pass FROM user WHERE mail="'.$_POST['email'].'"';
       // echo $peticion;
        $resultados = $mysqli->query($peticion);
        if($resultados->num_rows == 0)
        {
            header('Location: index.php?error=4');
        }
        else{
            $pass = $resultados->fetch_object()->clave;
            if($pass == $_POST['pass'])
            {
                session_start();
                $_SESSION['nombre'] = $_POST['email'];
                header('Location: index.php');
            }
            else{
                header('Location: index.php?error=5');
            }
        }
    }
    
}
else{
    header('Location: index.php?error=2');
}


?>