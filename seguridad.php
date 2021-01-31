
<?php
    if(!isset($_POST['email'])){
        header('Location: '.$_SESSION['nameurl'].'?error=2');
    }

    $mysqli = new mysqli('localhost', 'root', '', 'moma');
    $mysqli->set_charset('utf8');

    if($mysqli->connect_errno){
        //echo "Conexión fallida";
        header('Location: index.php?error=3');
    }

    //echo "Conexión exitosa";
    $peticion = 'SELECT pass FROM usuario WHERE mail="'.$_POST['email'].'"';
    // echo $peticion;
    $resultados = $mysqli->query($peticion);

    if($resultados->num_rows == 0)
    {
        header('Location: '.$_SESSION['nameurl'].'.?error=4');
    }

    $pass = $resultados->fetch_object()->pass;

    if($pass == $_POST['psw'])
    {
        session_start();
        $_SESSION['nombre'] = $_POST['email'];

        header("Location: ".$_SESSION['nombreurl']); 
    }

    else{

        header('Location: '.$_SESSION['nameurl'].'?error=5');
    }


?>